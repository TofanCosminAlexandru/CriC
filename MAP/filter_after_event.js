$(document).ready(function() {
  
	$("#event").change(function() { // daca se inregistreaza vreo schimbare in selectul ce evenimente
    
		var element = $(this); // preluam elementul
    
		if(element.val() == "cutremur" ) { // ii luam valoarea
		
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('earthquakes') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE'); // ii luam restul atributelor ce vor fi afisate in tooltip
							var magnitude = markerElem.getAttribute('MAGNITUDE');
							var surface = markerElem.getAttribute('SURFACE');
							var depth = markerElem.getAttribute('DEPTH');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location = markerElem.getAttribute('LOCATION');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');
							var location1 = continent.concat(" ", country, " ", location);

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>" + "<strong>Event: </strong>" + "Earthquakes" + "<br>" + "<strong>Event date: </strong>" + eventDate + "<br>" +
							"<strong>Location: </strong>" + location1 + "<br>" + "<strong>Magnitude: </strong>" + magnitude + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade + "\"<br>" + "</div>"; // mesajul din tool-tip
							
							var image = "../MAP/mapIcons/cracked-ground-between-houses.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		else if(element.val() == "incendiu" ) {
			
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('fires') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE');
							var surface = markerElem.getAttribute('SURFACE');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location = markerElem.getAttribute('LOCATION');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');
							var location1 = continent.concat(" ", country, " ", location);

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>" + "<strong>Event: </strong>" + "Fires" + "<br>" + "<strong>Event date: </strong>" + eventDate + "<br>" +
							"<strong>Location: </strong>" + location1 + "<br>" + "<strong>Surface: </strong>" + surface + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade + "\"<br>" + "</div>";	
							
							var image = "../MAP/mapIcons/flame.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		else if(element.val() == "inundatie" ) {
			
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('floods') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE');
							var surface = markerElem.getAttribute('SURFACE');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location = markerElem.getAttribute('LOCATION');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');
							var location1 = continent.concat(" ", country, " ", location);

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>" + "<strong>Event: </strong>" + "Floods" + "<br>" + "<strong>Event date: </strong>" + eventDate+"<br>" +
							"<strong>Location: </strong>" + location1 + "<br>" + "<strong>Surface: </strong>" + surface + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade + "\"<br>" + "</div>";
							
							var image = "../MAP/mapIcons/flood.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		else if(element.val() == "tshunami" ) {
			
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('tshunamis') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE');
							var area = markerElem.getAttribute('AREA');
							var magnitude = markerElem.getAttribute('MAGNITUDE');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location = markerElem.getAttribute('LOCATION');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>" + "<strong>Event: </strong>" + "Tshunami" + "<br>" + "<strong>Event date: </strong>" + eventDate + "<br>" +
							"<strong>Location: </strong>" + location + "<br>" + "<strong>Magnitude: </strong>" + magnitude + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade+"\"<br>" + "</div>";
							
							var image = "../MAP/mapIcons/tsunami.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		else if(element.val() == "vulcan" ) {
			
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('eruptions') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE');
							var volcanoName = markerElem.getAttribute('VOLCANO_NAME');
							var volcanoType = markerElem.getAttribute('VOLCANO_TYPE');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location = markerElem.getAttribute('LOCATION');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');
							var location1 = continent.concat(" ", country, " ", location);

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>" + "<strong>Event: </strong>" + "Eruptions" +" <br>" + "<strong>Event date: </strong>" + eventDate+"<br>" +
							"<strong>Location: </strong>" + location1 + "<br>" + "<strong>Volcano name: </strong>" + volcanoName + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade + "\"<br>" + "</div>";
							
							var image = "../MAP/mapIcons/volcano.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		else if(element.val() == "avalansa" ) {
			
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

						var eventType = markerElem.getAttribute('EVENTTYPE'); // ii luam tipul

						if(eventType.localeCompare('avalanches') == 0) {
							
							var eventDate = markerElem.getAttribute('EVENT_DATE');
							var continent = markerElem.getAttribute('CONTINENT');
							var country = markerElem.getAttribute('COUNTRY');
							var location1 = markerElem.getAttribute('LOCATION');
							var mountains = markerElem.getAttribute('MOUNTAINS');
							var riscGrade = markerElem.getAttribute('RISC_GRADE');
							var location = continent.concat(" ", country, " ", location1, " ", mountains);

							var lat = getCoordonatesLat(location);
							var lng = getCoordonatesLng(location);
							
							var point = new google.maps.LatLng(lat.responseText, lng.responseText); // pozitia marker-ului pe harta

							var message = "<div>"+"<strong>Event: </strong>" + "Avalanches" + "<br>" + "<strong>Event date: </strong>" + eventDate + "<br>" +
							"<strong>Location: </strong>" + location + "<br>" + "<strong>Mountains: </strong>" + mountains + "<br>" + "<strong>Risc grade: </strong>" +
							"<img src=\"../" + riscGrade + "\"<br>" + "</div>"
							
							var image = "../MAP/mapIcons/avalanche.png";
							
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
			
			initMap(); // reactualizare harta filtrata dupa eveniment = cutremur
		}
		
		function getCoordonatesLat (location) {
			return $.ajax({
				url:"../MAP/getCoordonatesLat.php",
				type: "post", //request type,
				data: {location: location},
				async:    false,
				success:function(result) {
				  return result;
				}
			});
		};

		function getCoordonatesLng (location) {
			return $.ajax({
				url:"../MAP/getCoordonatesLng.php",
				type: "post", //request type,
				data: {location: location},
				async:    false,
				success:function(result) {
				  return result;
				}
			});
		};

		function downloadUrl(url, callback) {
			var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

			request.onreadystatechange = function() {
				if (request.readyState == 4) {
					request.onreadystatechange = doNothing;
					callback(request, request.status);
				}
			};

			request.open('GET', url, true);
			request.send(null);
		};
		
		function doNothing() {}
	
	});
});