<?php
	/*
	require_once '/twilio-php-master/Twilio/autoload.php';
	use Twilio\Rest\Client;
	*/

	include "smsGateway.php";

  $username = 'projectTW';
  $password = 'PROJECTTW';
  $connection_string = 'localhost/xe';
  $conn = oci_connect( $username, $password, $connection_string);

  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $stid = oci_parse($conn, 'SELECT * FROM earthquakes WHERE id = 4523');
  oci_execute($stid);

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
   	$msg = $row['LOCATION'];
  }

	oci_close($connection);

	function email(){
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: CriC <project.cric@gmail.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

		$subj = $_POST['alert-id'];
		//$msg = $_POST['alert-area'];
		$email = "alexandru.gabriel009@gmail.com";
		mail($email, $subj, "$msg", $headers);
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
		$message = $_POST['alert-id'] . " " . $_POST['alert-area'];

		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);


	}
	if($_POST['alert-sms'] == "sms")
		sms();
	if($_POST['alert-email'] == "email")
		email();


?>
