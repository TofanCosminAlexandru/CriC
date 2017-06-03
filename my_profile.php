<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

	<head>
		<meta charset="utf-8">
		<title>Crisis Containment Service</title>
    
		<meta name="author" content="Mihalachi Bogdan-Marian, Tofan Cosmin-Alexandru, Leleu Alexandru-Ioan, Alexandru Gabriel">
		<meta name="description" content="Cric(Crisis Containment Service) este o platforma web ce permite gestionarea situatiilor de urgenta,
									  oferind informatii utile despre evenimentele petrecute, zonele afectate si eventuale persoane disparute.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="shortcut icon" href="logo.png" type="image/x-icon">
		<link rel="stylesheet" href="head&footer.css">
		<link rel="stylesheet" href="my_profile.css">
	</head>
  
	<body>
    
		<h3>About</h3>
		<h4>Cod autoritate Cric:
			<?php
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
				
				$query = "select cric_code from cric_code where id = :id";
			
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
					echo $row['CRIC_CODE'];
				}
				// inchiderea conexiunii
				oci_close($connection);
			?>
		</h4>
        <div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Nume:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['last_name']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Prenume:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['first_name']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Email:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['email']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Tara:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['country']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Oras:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['city']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Data Nastere:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['date_of_birth']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Hobby:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['hobbies']?> </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row mgbt-xs-0">
              <label class="col-xs-5 control-label">Telefon:</label>
              <div class="col-xs-7 controls"> <?php echo $_SESSION['phone_number']?> </div>
            </div>
          </div>
        </div>
	
	</body>
	
</html>