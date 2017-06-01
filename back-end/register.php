<?php
require_once('connDB.php');

// $delivDate = date('d-m-Y h:i:s', strtotime($_POST['birth_date'])); 

// $time = strtotime($data);
// $datetime=date("Y-m-d",$time);

// //echo $username.' '.$password.' '.$first_name.' '.$last_name.' '.$delivDate.' '.$email.' '.$country.' '.$city;
// echo $_POST['code'].$_POST['password'].$_POST['first_name'].$_POST['last_name'].$_POST['email'].
//         $_POST['country'].$_POST['city'].$_POST['hobbies'].$_POST['phone'].$_POST['date_of_birth'];

$sql = "INSERT INTO USERS(CRIC_CODE,FIRST_NAME,LAST_NAME,PASSWORD,EMAIL,date_of_birth,country,city,hobbies,phone_number) VALUES (:cric_code,:first_name,:last_name,:password,:email,:date_of_birth,:country,:city,:hobbies,:phone_number)";
		$q = $conn->prepare($sql);
		$datetime=date("Y-m-d H:i:s");
		$result = $q->execute(
			array(
					':cric_code'    => $_POST['code'], 
					':password'		=> $_POST['password'],
					':first_name'   => $_POST['first_name'],
					':last_name'    => $_POST['last_name'],
					':email'	    => $_POST['email'],
					':date_of_birth'=> $_POST['date_of_birth'],
					':country'		=> $_POST['country'],
					':city'			=> $_POST['city'],
					':hobbies'      => $_POST['hobbies'],
					':phone_number' => $_POST['phone']
					//':datetime'	    => $datetime
				)
		);

if($result){
		echo "Successful. You insert data in DB!!";
		echo "<BR>";
	    echo "<a href='../index.html'>Back</a>";
	}
	else{
		die("Execute query error, because: ". print_r($conn->errorInfo(), true));
	}

?>