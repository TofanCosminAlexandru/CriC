function initialize() {
	var x = screen.width;
	var y = screen.height;
	google.maps.visualRefresh = true;
	var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) || (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
	if (isMobile) {
		var viewport = document.querySelector("meta[name=viewport]");
		viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
	}
	
	var mapDiv = document.getElementById('googft-mapCanvas');
	mapDiv.style.width = isMobile ? '100%' : y;
	mapDiv.style.height = isMobile ? '100%' : "800px";
	var map = new google.maps.Map(mapDiv, { center: new google.maps.LatLng(-30.952410795458476, 169.77764519814457), zoom: 1, mapTypeId: google.maps.MapTypeId.ROADMAP});
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

	layer = new google.maps.FusionTablesLayer({ map: map, 
												heatmap: { enabled: false }, 
												query: { select: "col1", from: "1C6gryPKe0ION4z0k4JfcSTB2ShD6DfiVzGfckHkE",where: "" },
												options: { styleId: 2, templateId: 2}
											  });

	if (isMobile) {
		var legend = document.getElementById('googft-legend');
		var legendOpenButton = document.getElementById('googft-legend-open');
		var legendCloseButton = document.getElementById('googft-legend-close');
		legend.style.display = 'none';
		legendOpenButton.style.display = 'block';
		legendCloseButton.style.display = 'block';
		legendOpenButton.onclick = function() {	legend.style.display = 'block'; legendOpenButton.style.display = 'none'; }
		legendCloseButton.onclick = function() { legend.style.display = 'none'; legendOpenButton.style.display = 'block'; }
	}			
}
google.maps.event.addDomListener(window, 'load', initialize);