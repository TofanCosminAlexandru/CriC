<?php
	session_start();
	
	define ('IMGDIR', 'C:\\Apache24\\htdocs\\GITHub-Proiect-TW-CriC\\CriC\\images\\'); // numele directorului cu imagini

	try {
		
		$username = 'projectTW';
		$password = 'PROJECTTW';
		$connection_string = 'localhost/xe';

		// conectarea la baza de date
		$connection = oci_connect(
			$username,
			$password,
			$connection_string
		);

		if(!$connection) {
			echo 'Conectare nereusita!';
		}
		
		// prevenim transferuri periculoase
		if (!isset($_FILES['img']['error']) || is_array($_FILES['img']['error'])) {
			throw new RuntimeException ('Upload: parametri eronati!');
		}
		
		// verificam daca transferul e in regula
		switch ($_FILES['img']['error']) {
			case UPLOAD_ERR_OK:
				break;
			case UPLOAD_ERR_NO_FILE:
				throw new RuntimeException ('Upload: fisier netrimis!');
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				throw new RuntimeException ('Upload: fisier prea mare!');
			default:
				throw new RuntimeException ('Upload: eroare necunoscuta!');
		}

		// acceptam fisiere de maxim 100 MB
		if ($_FILES['img']['size'] > 1024 * 1024 * 100) {
			throw new RuntimeException ('Upload: fisier prea mare!');
		}
		
		// verificam daca a fost trimisa o imagine pe baza tipurilor MIME
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (FALSE === $ext = array_search ($finfo->file($_FILES['img']['tmp_name']),
			array ('jpg' => 'image/jpeg',
				   'png' => 'image/png',
				   'gif' => 'image/gif'), true)) {
			throw new RuntimeException ('Upload: format incorect!');
		}
		
		// adaugam noua imagine in directorul cu imagini
		$image_name = basename($_FILES['img']['name']);
		if (!move_uploaded_file ($_FILES['img']['tmp_name'], IMGDIR . $image_name)) {
			throw new RuntimeException ('Upload: eroare la salvare!');
		}
		
		// facem update-ul in baza de date
		$query = "update users set profile_picture = :picture where id = :id";
					
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
		$image_name = "images/" . $image_name;
		oci_bind_by_name($parsed_query, ":picture", $image_name);
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		
		$query = "select profile_picture from users where id = :id";
			
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
			$_SESSION['profile_picture'] = $row["PROFILE_PICTURE"];
		}
		
		// inchiderea conexiunii
		oci_close($connection);
		
		header('Location: profile.php');
		
	}	catch (RuntimeException $e) { // exceptie
			echo $e->getMessage();
	}
?>