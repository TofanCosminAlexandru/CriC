<?php
	/*
	require_once '/twilio-php-master/Twilio/autoload.php';
	use Twilio\Rest\Client;
	*/
	if($_POST['event-type'] == "Cutremur"){
		$magnitude = $_POST['event-magnitude'];
		$adancime = $_POST['event-adancime'];
		$continent = $_POST['event-continent'];
		$country = $_POST['event-country'];
		$location = $_POST['event-location'];
	}
	if($_POST['event-type'] == "Incendiu" || $_POST['event-type'] == "Inundatie"){
		$suprafata = $_POST['event-suprafata'];
		$continent = $_POST['event-continent'];
		$country = $_POST['event-country'];
		$location = $_POST['event-location'];
	}
	if($_POST['event-type'] == "Tshunami"){
		$arie = $_POST['event-arie'];
		$magnitude = $_POST['event-magnitude'];
		$suprafata = $_POST['event-suprafata'];
		$location = $_POST['event-location'];
	}
	if($_POST['event-type'] == "Vulcan"){
		$name = $_POST['event-name'];
		$vtype = $_POST['event-vtype'];
		$index = $_POST['event-index'];
		$continent = $_POST['event-continent'];
		$country = $_POST['event-country'];
		$location = $_POST['event-location'];
	}
	if($_POST['event-type'] == "Avalansa"){
		$munte = $_POST['event-munte'];
		$continent = $_POST['event-continent'];
		$country = $_POST['event-country'];
		$location = $_POST['event-location'];
	}


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
		$email = "alexandru.gabriel009@gmail.com";
		mail($email, $subj, $msg, $headers);
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
		$number = '+40755533313';
		$message = $_POST['event-id'] . " " . $_POST['alert-area'];

		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);


	}
	if($_POST['alert-sms'] == "sms")
		sms();
	if($_POST['alert-email'] == "email")
		email();


?>
