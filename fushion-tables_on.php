<?php 
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
	<script src="event.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="fushion-tables_on.css">
  </head>
  
  <body>
    
	<header>
		<h3 class="header-title" >Crisis Containment Service</h3>
	</header>
	
	  <label for="show-menu" class="show-menu">Meniu</label>
	<input type="checkbox" id="show-menu" role="button">
	
	<div class="menu" id="menu">
		<ul class="menu-list">
			<li class="nav-items"> <a href="home_on.php">Home</a> </li>
			<li class="nav-items"> <a href="map_on.php">Map</a> </li>
			<li class="nav-items"> <a href="person-finder_on.php">Person Finder</a> </li>
			<li class="nav-items"> <a href="fushion-tables_on.php">Fushion Tables</a> </li>
			<li class="nav-items"> <a href="transmit-alerts.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
	</div>
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">
	
	<main>
	
		<form action = "show_info_on.php" method = "post">
			<button type="submit" class="show-info btn btn-info btn-lg">Show Info</button>
		</form>
		
		<div>
			<button type="button" class="add-event btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>
		</div>
		
		<div>
			<button type="button" class="update-info btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Update Info</button>
		</div>
		
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content modal-add">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Event</h4>
					</div>
					
					<form action = "fushion_tables.php" method = "post">		
						<div class="modal-body">
							<div class="add-event-header">
								<h5 class="add-event-title">Adaugarea unui nou eveniment ce prezinta un anumit grad de risc</h5>
							</div>
								
							<div class="add-event-body" id="add-event-body">
								<div class="add-event-form">
										<p>
											<label for="disaster">Eveniment: </label>
											<select id="disaster" name="type_disaster" required>
												<option disabled selected value></option>
												<option>Cutremur</option>
												<option>Incendiu</option>
												<option>Inundatie</option>
												<option>Tshunami</option>
												<option>Eruptie vulcanica</option>
												<option>Avalansa</option>
											</select>
										</p>
										<p>
											<label for="date">Data declarare risc: </label>
											<input type="datetime-local" name="type_date" id="date" required>
										</p>
										<p>
											<label for="location">Locatie: </label>
											<input type="text" id="location" name="type_location" required>
										</p>
										<p>
											<label for="risc-grade">Grad de risc: </label>
											<input type="number" min="1" max="4" step="1" id="risc-grade" name="type_risc-grade" required>
										</p>
								</div>
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-default" id="submit-add-event">Add event</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content modal-add">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Info</h4>
					</div>
					
					<form action = "update_info.php" method = "post">
						<div class="modal-body">
							<div class="add-event-header">
								<h5 class="add-event-title">Consemnarea statisticilor de pe urma evenimentului</h5>
							</div>
								
							<div class="add-event-body" id="add-event-body">
								<div class="add-event-form">
										<p>
											<label for="update_disaster">Eveniment: </label>
											<select id="update_disaster" name="type_disaster_for_update" required>
												<option disabled selected value></option>
												<option>Cutremur</option>
												<option>Incendiu</option>
												<option>Inundatie</option>
												<option>Tshunami</option>
												<option>Eruptie vulcanica</option>
												<option>Avalansa</option>
											</select>
										</p>
										<p>
											<label for="safe_event_id">ID-ul evenimentului declarat safe: </label>
											<input type="number" name="type_safe_event_id" id="safe_event_id" required>
										</p>
										<p>
											<label for="safe_date">Data declarare siguranta: </label>
											<input type="datetime-local" name="type_safe_date" id="safe_date">
										</p>
										<p>
											<label for="evacuated">Numar evacuati: </label>
											<input type="number" id="evacuated" name="type_evacuated">
										</p>
										<p>
											<label for="disappeared">Numar persoane fara de urma: </label>
											<input type="number" id="disappeared" name="type_disappeared">
										</p>
										<p>
											<label for="deaths">Numar decese: </label>
											<input type="number" id="deaths" name="type_deaths">
										</p>
								</div>
			
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-default" id="submit-update-info">Submit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="table">
			<table class="cutremur">
				<thead>
					<tr>
						<th scope="row" colspan="13">Cutremur</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Magnitudine</th>
						<th scope="col">Suprafata afectata(m<sup>2</sup>)</th>
						<th scope="col">Adancime</th>
						<th scope="col">Continent</th>
						<th scope="col">Tara</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "earthquakes_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_earthquakes">Nr. total cutremure</td>
						
						<td scope="row" colspan="2" id = "evacuated_earthquakes">Nr. total evacuati</td>
						
						<td scope="row" colspan="2" id = "disappeared_earthquakes">Nr. total disparuti</td>
						
						<td scope="row" colspan="2" id = "nr_deaths_earthquakes">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="13">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="incendiu">
				<thead>
					<tr>
						<th scope="row" colspan="11">Incendiu</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Suprafata afectata(m<sup>2</sup>)</th>
						<th scope="col">Continent</th>
						<th scope="col">Tara</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "fires_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_fires">Nr. total incendii</td>
						
						<td scope="row" colspan="2" id = "evacuated_fires">Nr. total evacuati</td>
						
						<td scope="row" colspan="1" id = "disappeared_fires">Nr. total disparuti</td>
						
						<td scope="row" colspan="1" id = "nr_deaths_fires">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="11">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="inundatie">
				<thead>
					<tr>
						<th scope="row" colspan="13">Inundatie</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Suprafata afectata(m<sup>2</sup>)</th>
						<th scope="col">Continent</th>
						<th scope="col">Tara</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "floods_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_floods">Nr. total inundatii</td>
						
						<td scope="row" colspan="2" id = "evacuated_floods">Nr. total evacuati</td>
						
						<td scope="row" colspan="1" id = "disappeared_floods">Nr. total disparuti</td>
						
						<td scope="row" colspan="1" id = "nr_deaths_floods">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="13">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="tshunami">
				<thead>
					<tr>
						<th scope="row" colspan="11">Tshunami</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Arie</th>
						<th scope="col">Magnitudine</th>
						<th scope="col">Suprafata afectata(m<sup>2</sup>)</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "tshunamis_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_tshunamis">Nr. total tshunami</td>
						
						<td scope="row" colspan="2" id = "evacuated_tshunamis">Nr. total evacuati</td>
						
						<td scope="row" colspan="1" id = "disappeared_tshunamis">Nr. total disparuti</td>
						
						<td scope="row" colspan="1" id = "nr_deaths_tshunamis">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="11">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="vulcan">
				<thead>
					<tr>
						<th scope="row" colspan="13">Eruptie vulcanica</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Nume vulcan</th>
						<th scope="col">Tip vulcan</th>
						<th scope="col">Index explozivitate vulcanica</th>
						<th scope="col">Continent</th>
						<th scope="col">Tara</th>
						<th scope="col">Locatie</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "eruptions_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_eruptions">Nr. total eruptii</td>
						
						<td scope="row" colspan="2" id = "evacuated_eruptions">Nr. total evacuati</td>
						
						<td scope="row" colspan="2" id = "disappeared_eruptions">Nr. total disparuti</td>
						
						<td scope="row" colspan="2" id = "nr_deaths_eruptions">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="13">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="avalansa">
				<thead>
					<tr>
						<th scope="row" colspan="11">Avalansa</th>
					</tr>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">Continent</th>
						<th scope="col">Tara</th>
						<th scope="col">Locatie</th>
						<th scope="col">Munti</th>
						<th scope="col">Grad de risc</th>
						<th scope="col">Data declarare siguranta</th>
						<th scope="col">Nr. evacuati</th>
						<th scope="col">Nr. disparuti</th>
						<th scope="col">Nr. decedati</th>
					</tr>
				</thead>
				
				<tbody id = "avalanches_tbody">
					
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="3" id = "total_nr_avalanches">Nr. total avalanse</td>
						
						<td scope="row" colspan="2" id = "evacuated_avalanches">Nr. total evacuati</td>
						
						<td scope="row" colspan="1" id = "disappeared_avalanches">Nr. total disparuti</td>
						
						<td scope="row" colspan="1" id = "nr_deaths_avalanches">Nr. total decedati</td>
						
					</tr>
					<tr>
						<td scope="row" colspan="11">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</main>
	
	
	<footer>
		<div class="footer">
			<img class="logo-footer" src="images/logo.png" alt="Cric">
			<p class="footer-details">© 2007–2017 Crisis Containment Service si contributii individuale. Design & tehnologie cu pasiune de la MTLA</p>
		</div>
	</footer>
	
	
  </body>
  
</html>