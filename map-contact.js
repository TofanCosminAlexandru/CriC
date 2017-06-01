function myMap() {
    var myLatLng = {lat: 0, lng: 0};

    var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 2,
        center: myLatLng
    });

	var image = 'images/small_logo.png';
	var marker, markerToAdd;
	var infowindow = new google.maps.InfoWindow();
	
	var markers = [
		['Neinfricatii', 62.097, -120.678],
		['Aripi de Nisip', 31.342, -102.487],
		['Monkey Glory', -27.070, -63.112],
		['Onoare Africana', 8.345, 19.807],
		['Flacara Albastra', 44.408, 26.112],
		['Suedia Organizatie Cric Contra Dezastre Naturale', 62.320, 71.847],
		['Cu Topor la Cap', 60.985, 16.819],
		['Panda', 40.590, 108.425],
		['Bindi', 20.644, 74.675],
		['Tari ca Nuca de Cocos', -28.138, 147.096]
	];
	
	var contentStrings = [
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Neinfricatii</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office73975@cric.com</p>'+'<p style="font-size: 15px">Tel: +23 424 246 845</p>'+'<p style="font-size: 15px">Fax: +23 003-774-327</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Aripi de Nisip</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office47028@cric.com</p>'+'<p style="font-size: 15px">Tel: +78 249 133 023</p>'+'<p style="font-size: 15px">Fax: +78 245-987-235</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Monkey Glory</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office59015@cric.com</p>'+'<p style="font-size: 15px">Tel: +12 356 783 009</p>'+'<p style="font-size: 15px">Fax: +12 990-255-876</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Onoare Africana</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office60538@cric.com</p>'+'<p style="font-size: 15px">Tel: +09 134 774 109</p>'+'<p style="font-size: 15px">Fax: +09 145-543-009</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Flacara Albastra</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office18467@cric.com</p>'+'<p style="font-size: 15px">Tel: +12 674 982 098</p>'+'<p style="font-size: 15px">Fax: +12 123-456-789</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Cu Topor la Cap</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office99284@cric.com</p>'+'<p style="font-size: 15px">Tel: +53 642 887 999</p>'+'<p style="font-size: 15px">Fax: +53 000-982-880</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Suedia Organizatie Cric Contra Dezastre Naturale</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office06082@cric.com</p>'+'<p style="font-size: 15px">Tel: +89 098 362 985</p>'+'<p style="font-size: 15px">Fax: +89 126-889-245</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Panda</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office12340@cric.com</p>'+'<p style="font-size: 15px">Tel: +66 783 920 537</p>'+'<p style="font-size: 15px">Fax: +66 107-973-989</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Bindi</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office50283@cric.com</p>'+'<p style="font-size: 15px">Tel: +10 953 520 555</p>'+'<p style="font-size: 15px">Fax: +10 245-190-253</p>'+'</div>'+'</div>',
		'<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h1 id="firstHeading" class="firstHeading" style="font-size: 20px">Tari ca Nuca de Cocos</h1>'+'<div id="bodyContent">'+'<p style="font-size: 15px">Email: office14603@cric.com</p>'+'<p style="font-size: 15px">Tel: +67 314 980 264</p>'+'<p style="font-size: 15px">Fax: +67 248-098-125</p>'+'</div>'+'</div>'
	];
	
    for (var i = 0; i < markers.length; i++) {
		marker = markers[i];
		
		markerToAdd = new google.maps.Marker({
			position: {lat: marker[1], lng: marker[2]},
			map: map,
			title: marker[0],
			icon: image
		});
		
		google.maps.event.addListener(markerToAdd, 'click', (function(markerToAdd, i) {
			return function() {
				infowindow.setContent(contentStrings[i]);
				infowindow.open(map, markerToAdd);
			}
		})(markerToAdd, i));
	}
 }