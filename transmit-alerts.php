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
	<script src="events.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="transmit-alerts.css">
  </head>
  
  <body>
    
	<header>
		<h3 class="header-title" >Crisis Containment Service</h3>
	</header>
	
	<label for="show-menu" class="show-menu">Meniu</label>
	<input type="checkbox" id="show-menu" role="button">
	
	  <label for="show-menu" class="show-menu">Meniu</label>
	<input type="checkbox" id="show-menu" role="button">
	
	<div class="menu" id="menu">
		<ul class="menu-list">
			<li class="nav-items"> <a href="home_on.php">Home</a> </li>
			<li class="nav-items"> <a href="map_on.php">Map</a> </li>
			<li class="nav-items"> <a href="person-finder_on.php">Person Finder</a> </li>
			<li class="nav-items"> <a href="fushion-tables_on.php">Fushion Tables</a> </li>
			<li class="nav-items"> <a href="transmit-alerts_on.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
	</div>
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">
	
	<main>
	
		<div class="wrapper1-header">
				<h4 class="wrapper1-title">Selectati evenimentul pe care doriti sa-l transmiteti</h4>
		</div>
		
		<div class="table">
			<table class="Cutremur">
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
					</tr>
				</thead>
				
				<tbody id = "earthquakes_tbody">
					
				</tbody>
				
				
			</table>
		</div>
		
		<div class="table">
			<table class="Incendiu">
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
					</tr>
				</thead>
				
				<tbody id = "fires_tbody">
					
				</tbody>
				
				
			</table>
		</div>
		
		<div class="table">
			<table class="Inundatie">
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
					</tr>
				</thead>
				
				<tbody id = "floods_tbody">
					
				</tbody>
				
				
			</table>
		</div>
		
		<div class="table">
			<table class="Tshunami">
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
					</tr>
				</thead>
				
				<tbody id = "tshunamis_tbody">
					
				</tbody>
				
				
			</table>
		</div>
		
		<div class="table">
			<table class="Vulcan">
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
					</tr>
				</thead>
				
				<tbody id = "eruptions_tbody">
					
				</tbody>
				
				
			</table>
		</div>
		
		<div class="table">
			<table class="Avalansa">
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
					</tr>
				</thead>
				
				<tbody id = "avalanches_tbody">
					
				</tbody>
				
				
			</table>
		</div>
				

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Transmit Alert</h4>
					</div>
							
					<div class="modal-body">
						<form id="alert-form">
							<div class="alert-body" id="alert-body">
								<div class="event-id">
									<input type="hidden" name="event-id" class="hidden-id" value="">
								</div>
								<div class="event-type">
									<input type="hidden" name="event-type" class="hidden-type" value="">
								</div>

								<div class="alert-type">
									<h4 class="alert-title">Selectati modurile de alertare</h4>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="alert-sms" value="sms"> SMS
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="alert-email" value="email"> E-Mail
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="alert-sound" value="sound"> Alarma sonora publica
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="alert-tv" value="tv"> Televiziune
										</label>
									</div>
								</div>
								<div class="alert-area">
									<h4 class="alert-title">Selectati raza de alertare</h4>
									<div class="radio">
										<label>
											<input type="radio" name="alert-area" value="Local"> Local
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="alert-area" value="Regional"> Regional
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="alert-area" value="National"> National
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="alert-area" value="Continental"> Continental
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="alert-area" value="Global"> Global
										</label>
									</div>
								</div>
							
								<div>
									<button type="button" class="btn btn-danger btn-lg" id="alert-btn">ALERT!</button>
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>	
		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>
							
					<div class="modal-body">
						<div class="alert-body" id="alert-body2">
							
						<h4 class="success-msg">Alerta a fost transmisa.</h4>
						</div>
					</div>
					
				</div>
			</div>
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