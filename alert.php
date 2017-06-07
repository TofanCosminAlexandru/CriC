<?php
	/*
	require_once '/twilio-php-master/Twilio/autoload.php';
	use Twilio\Rest\Client;
	*/
	
	

	include "smsGateway.php";
	function email(){
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: CriC <project.cric@gmail.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
		$subj = "ALERT!";
		if($_POST['event-type'] == "Cutremur"){
			$msg = 'Id Eveniment: ' . $_POST['event-id'];
			$msg .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$msg .= ' | Tip eveniment: ' . $_POST['event-type'];
			$msg .= ' | Magnitudine: ' . $_POST['event-magnitude'];
			$msg .= ' | Adancime: ' . $_POST['event-adancime'];
			$msg .= ' | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Incendiu" || $_POST['event-type'] == "Inundatie"){
			$msg = 'Id Eveniment: ' . $_POST['event-id'];
			$msg .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$msg .= ' | Tip eveniment: ' . $_POST['event-type'];
			$msg .= ' | Suprafata: ' . $_POST['event-suprafata'];
			$msg .= 'mp | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Tshunami"){
			$msg = 'Id Eveniment: ' . $_POST['event-id'];
			$msg .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$msg .= ' | Tip eveniment: ' . $_POST['event-type'];
			$msg .= ' | Arie: ' . $_POST['event-arie'];
			$msg .= ' | Magnitudine: ' . $_POST['event-magnitude'];
			$msg .= ' | Suprafata: ' . $_POST['event-suprafata'];
			$msg .= 'mp | Locatie: ' . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Vulcan"){
			$msg = 'Id Eveniment: ' . $_POST['event-id'];
			$msg .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$msg .= ' | Tip eveniment: ' . $_POST['event-type'];
			$msg .= ' | Nume Vulcan: ' . $_POST['event-name'];
			$msg .= ' | Tip Vulcan: ' . $_POST['event-vtype'];
			$msg .= ' | Index explozivitate: ' . $_POST['event-index'];
			$msg .= ' | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Avalansa"){
			$msg = 'Id Eveniment: ' . $_POST['event-id'];
			$msg .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$msg .= ' | Tip eveniment: ' . $_POST['event-type'];
			$msg .= ' | Munte: ' . $_POST['event-munte'];
			$msg .= 'mp | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		define ('FEED', 'population.xml');
		define ('XPATH', '/humans/human');               // expresia XPath utilizată

		try {
		  // încărcăm documentul XML pe baza URL-ului furnizat
		  $xml = @simplexml_load_file (FEED);
		  foreach ($xml->xpath (XPATH) as $population) {
		  	 $email = $population->email;
		  	 $number = $population->phone;
		  	 $hm_location = $population->location;
		  	 $hm_country = $population->country;
		  	 $hm_continent = $population->continent;
		  	 if($_POST['alert-area'] == "Global")
		  	 	mail($email, $subj, $msg, $headers);
		  	 else if($_POST['alert-area'] == "Continental")
		  	 	if($hm_continent == $_POST['event-continent'])
		  	 		mail($email, $subj, $msg, $headers);
		  	 	else if($_POST['alert-area'] == "National")
		  	 		if($hm_country == $_POST['event-country'])
		  	 			mail($email, $subj, $msg, $headers);
			  	 	else if($_POST['alert-area'] == "Local")
			  	 		if($hm_location == $_POST['event-location'])
			  	 			mail($email, $subj, $msg, $headers);
		  }
		}
		catch (RuntimeException $e) { 
		    echo $e->getMessage();  // a survenit o excepție
		}
		
	}
	function sms(){
		/*$sid = 'AC44cb62b46356beae0ae690aefb043cec';
		$token = '138e8ea6572a0c36efb2d835ec0a0a06';
		$client = new Client($sid, $token);

		$client->messages->create(
		    '+40755533313',
		    array(
		        'from' => '+12512552122',
		        'body' => "THIS IS A SMS MOTHERFUCKER - CRIC LA PUTERE!"
		    )
		);*/
		
		$smsGateway = new SmsGateway('alexandru.gabriel@outlook.com', '0742623487gG');

		$deviceID = 49855;
		//$number = '+40755533313';
		//$message = $_POST['event-id'] . " " . $_POST['alert-area'];
		if($_POST['event-type'] == "Cutremur"){
			$message = 'Id Eveniment: ' . $_POST['event-id'];
			$message .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$message .= ' | Tip eveniment: ' . $_POST['event-type'];
			$message .= ' | Magnitudine: ' . $_POST['event-magnitude'];
			$message .= ' | Adancime: ' . $_POST['event-adancime'];
			$message .= ' | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Incendiu" || $_POST['event-type'] == "Inundatie"){
			$message = 'Id Eveniment: ' . $_POST['event-id'];
			$message .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$message .= ' | Tip eveniment: ' . $_POST['event-type'];
			$message .= ' | Suprafata: ' . $_POST['event-suprafata'];
			$message .= 'mp | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Tshunami"){
			$message = 'Id Eveniment: ' . $_POST['event-id'];
			$message .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$message .= ' | Tip eveniment: ' . $_POST['event-type'];
			$message .= ' | Arie: ' . $_POST['event-arie'];
			$message .= ' | Magnitudine: ' . $_POST['event-magnitude'];
			$message .= ' | Suprafata: ' . $_POST['event-suprafata'];
			$message .= 'mp | Locatie: ' . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Vulcan"){
			$message = 'Id Eveniment: ' . $_POST['event-id'];
			$message .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$message .= ' | Tip eveniment: ' . $_POST['event-type'];
			$message .= ' | Nume Vulcan: ' . $_POST['event-name'];
			$message .= ' | Tip Vulcan: ' . $_POST['event-vtype'];
			$message .= ' | Index explozivitate: ' . $_POST['event-index'];
			$message .= ' | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}
		if($_POST['event-type'] == "Avalansa"){
			$message = 'Id Eveniment: ' . $_POST['event-id'];
			$message .= ' | Nivel alerta: ' . $_POST['alert-area'];
			$message .= ' | Tip eveniment: ' . $_POST['event-type'];
			$message .= ' | Munte: ' . $_POST['event-munte'];
			$message .= 'mp | Locatie: ' . $_POST['event-continent'] . "," . $_POST['event-country'] . "," . $_POST['event-location'];
		}

		
		define ('FEED', 'population.xml');
		define ('XPATH', '/humans/human');               // expresia XPath utilizată

		try {
		  // încărcăm documentul XML pe baza URL-ului furnizat
		  $xml = @simplexml_load_file (FEED);
		  foreach ($xml->xpath (XPATH) as $population) {
		  	 $email = $population->email;
		  	 $number = $population->phone;
		  	 $hm_location = $population->location;
		  	 $hm_country = $population->country;
		  	 $hm_continent = $population->continent;
		  	 if($_POST['alert-area'] == "Global")
		  	 	$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
		  	 else if($_POST['alert-area'] == "Continental")
		  	 	if($hm_continent == $_POST['event-continent'])
		  	 		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
		  	 	else if($_POST['alert-area'] == "National")
		  	 		if($hm_country == $_POST['event-country'])
		  	 			$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
			  	 	else if($_POST['alert-area'] == "Local")
			  	 		if($hm_location == $_POST['event-location'])
			  	 			$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

		  	 	
		  }
		}
		catch (RuntimeException $e) { 
		    echo $e->getMessage();  // a survenit o excepție
		}


	}
	if($_POST['alert-sms'] == "sms")
		sms();
	if($_POST['alert-email'] == "email")
		email();


?>
