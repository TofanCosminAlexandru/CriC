<?php

	session_start();
	
	$username = 'projectTW';
	$password = 'PROJECTTW';
	$connection_string = 'localhost/xe';

	// conectarea la baza de date
	$connection = oci_connect(
		$username,
		$password,
		$connection_string
	);

	if(!$connection)
		echo 'Conectare nereusita!';
	
	$email = $_REQUEST["type_email"];
	$country = $_REQUEST["type_country"];
	$city = $_REQUEST["type_city"];
	$description = $_REQUEST["type_hobbies"];
	$phone_number = $_REQUEST["type_phone"];
	$password = $_REQUEST["type_password"];
	$confirmed_password = $_REQUEST["type_confirmed_password"];
	
	if($email != $_SESSION['email']) {
		
		// facem update-ul in baza de date
		$query = "update users set email = :email where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":email", $email);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select email from users where id = :id";
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			$row = oci_fetch_array($parsed_query, OCI_ASSOC);
			$_SESSION['email'] = $row["EMAIL"];
		}
	}
	
	if($country != $_SESSION['country']) {
		
		// facem update-ul in baza de date
		$query = "update users set country = :country where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":country", $country);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select country from users where id = :id";
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			$row = oci_fetch_array($parsed_query, OCI_ASSOC);
			$_SESSION['country'] = $row["COUNTRY"];
		}
	}
	
	if($city != $_SESSION['city']) {
		
		// facem update-ul in baza de date
		$query = "update users set city = :city where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":city", $city);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select city from users where id = :id";
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			$row = oci_fetch_array($parsed_query, OCI_ASSOC);
			$_SESSION['city'] = $row["CITY"];
		}
	}
	
	if($description != $_SESSION['hobbies']) {
		
		// facem update-ul in baza de date
		$query = "update users set hobbies = :hobbies where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":hobbies", $description);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select hobbies from users where id = :id";
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			$row = oci_fetch_array($parsed_query, OCI_ASSOC);
			$_SESSION['hobbies'] = $row["HOBBIES"];
		}
	}
	
	if($phone_number != $_SESSION['phone_number']) {
		
		// facem update-ul in baza de date
		$query = "update users set phone_number = :phone_number where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":phone_number", $phone_number);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select phone_number from users where id = :id";
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			$row = oci_fetch_array($parsed_query, OCI_ASSOC);
			$_SESSION['phone_number'] = $row["PHONE_NUMBER"];
		}
	}
	
	if($password != "" && $confirmed_password != "" && $password == $confirmed_password) {
		
		// facem update-ul in baza de date
		$query = "update users set password = :password where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		oci_bind_by_name($parsed_query, ":password", $confirmed_password);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
	}
	
	// inchiderea conexiunii
	oci_close($connection);
	
	header("Location: profile.php");
?>