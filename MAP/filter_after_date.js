$(document).ready(function() {
  
	$("#date").change(function() { // daca se inregistreaza vreo schimbare in selectul cu date calendaristice
    
		var element = $(this); // preluam elementul
		
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), { // initializarea hartii
				center: new google.maps.LatLng(49.590858, 14.127759),
				zoom: 4
			});
			var infoWindow = new google.maps.InfoWindow; // tooltip-ul

			downloadUrl('../MAP/generate_XML_file.php', function(data) { // aducere xml local
				var xml = data.responseXML;
				
				var markers = xml.documentElement.getElementsByTagName('marker'); // extragem elementele cu tag-ul marker
				
				Array.prototype.forEach.call(markers, function(markerElem) { // pentru fiecare

					var eventDate = markerElem.getAttribute('EVENT_DATE'); // ii luam data declararii riscului
					
					var date1 = eventDate.split("-");
					var date2 = document.getElementById("date").value.split("-");
					
					console.log(date1[0] + " " + date1[1] + " " + date1[2]);
					console.log(date2[0].slice(2, 4) + " " + date2[1] + " " + date2[2]);

					if(date1[0] == date2[2] && ((date1[1] == "JAN" && date2[1] == "01") || (date1[1] == "FEB" && date2[1] == "02") || (date1[1] == "MAR" && date2[1] == "03") ||
						(date1[1] == "APR" && date2[1] == "04") || (date1[1] == "MAY" && date2[1] == "05") || (date1[1] == "JUN" && date2[1] == "06") || (date1[1] == "JUL" && date2[1] == "07") ||
						(date1[1] == "AUG" && date2[1] == "08") || (date1[1] == "SEP" && date2[1] == "09") || (date1[1] == "OCT" && date2[1] == "10") || (date1[1] == "NOV" && date2[1] == "11") ||
						(date1[1] == "DEC" && date2[1] == "12")) && date1[2] == date2[0].slice(2, 4)) {
						
						var eventType = markerElem.getAttribute('EVENTTYPE');
						var location = markerElem.getAttribute('LOCATION');
						var riscGrade = markerElem.getAttribute('RISC_GRADE');

						var lat = getCoordonatesLat(location);
						var lng = getCoordonatesLng(location);
						
						var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

						var message = "<div>" + "<strong>Event: </strong>" + eventType + "<br>" + "<strong>Event date: </strong>" + eventDate + "<br>" +
						"<strong>Location: </strong>" + location + "<br>" + "<strong>Risc grade: </strong>" +
						"<img src=\"../" + riscGrade + "\"<br>" + "</div>"; // mesajul din tool-tip
						
						var image = "../MAP/mapIcons/natural-disaster.png";
						
						var marker = new google.maps.Marker({ // creare marker
							map: map,
							position: point,
							icon: image
						});

						var infowindow = new google.maps.InfoWindow({ // creare tool-tip
							content: message
						});

						google.maps.event.addListener(marker, 'click', function () { // adaugare listener pentru afisare tool-tip dupa apasare pe imaginea corespunzatoare marker-ului
							infowindow.open(map, marker);
						});

					}
				});
			});
		};
		
		initMap(); // reactualizare harta filtrata dupa data
	});
});