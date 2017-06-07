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
		<link rel="stylesheet" href="my_data.css">
	</head>
  
  <body>
    
		<div class="table">
			<table class="cutremur">
				<thead>
					<tr>
						<th scope="row" colspan="4">Evenimente introduse</th>
					</tr>
					<tr>
						<th scope="col">Eveniment</th>
						<th scope="col">Data</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
					
						$count = 0;
						
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
						
						$query = "select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from earthquakes where user_cric_code = (select cric_code from cric_code where id = :id) union
								select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from fires where user_cric_code = (select cric_code from cric_code where id = :id) union
								select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from floods where user_cric_code = (select cric_code from cric_code where id = :id) union
								select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from tshunamis where user_cric_code = (select cric_code from cric_code where id = :id) union
								select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from eruptions where user_cric_code = (select cric_code from cric_code where id = :id) union
								select EVENTTYPE, EVENT_DATE, LOCATION, RISC_GRADE from avalanches where user_cric_code = (select cric_code from cric_code where id = :id) order by event_date desc";
					
						$parsed_query = oci_parse($connection, $query); // parsarea selectului
						oci_bind_by_name($parsed_query, ":id", $_SESSION['id']); // asignarea de variabile php variabilelor legate din interogare
						$result = @oci_execute($parsed_query); // executarea selectului
						
						if (!$result) { // in caz de a aparut exceptie
							$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
							echo 'Error ';
							$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
							echo $list[1];
						}
						else {
						
							while (($row = oci_fetch_array($parsed_query, OCI_ASSOC)) != false) {
								echo '<tr>';
									switch ($row['EVENTTYPE']) {
										case "earthquakes":
											echo '<td>' . 'Cutremur' . '</td>';
											break;
										case "fires":
											echo '<td>' . 'Incendiu' . '</td>';
											break;
										case "floods":
											echo '<td>' . 'Inundatie' . '</td>';
											break;
										case "tshunamis":
											echo '<td>' . 'Tshunami' . '</td>';
											break;
										case "eruptions":
											echo '<td>' . 'Eruptie vulcanica' . '</td>';
											break;
										case "avalanches":
											echo '<td>' . 'Avalansa' . '</td>';
											break;
										default:
											break;
									}
									echo '<td>' . $row['EVENT_DATE'] . '</td>';
									echo '<td>' . $row['LOCATION'] . '</td>';
									echo '<td> <img id = risc alt = Risc width = 20% src = ' . $row['RISC_GRADE'] . '> </td>';
								echo '</tr>';
								$count++;
							}
							
						}
						
						// inchiderea conexiunii
						oci_close($connection);
					
					?>
				</tbody>
				<tfoot>
					<tr>
						<td scope="row" colspan="3">Nr. total evenimente introduse</td>
						<td> <?php echo $count; ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
	
  </body>
  
</html>