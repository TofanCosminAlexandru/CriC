<?php 
	function getCoordinatesLat($address){
		$address = str_replace(" ", "+", $address);
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyAm-9v_cbRk1TitOD51Wg-LeE-sBybSYow";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate an array of object from the response of web
		return ($json['results'][0]['geometry']['location']['lat']);
	}

    if (isset($_POST['location'])) {
        echo getCoordinatesLat($_POST['location']);
    }
 ?>