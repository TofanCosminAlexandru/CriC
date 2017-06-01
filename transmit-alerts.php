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
		<h4 style="text-align: right; color:#FE9C45; padding: 10px;"> <?php echo '<b>Welcome, </b>'.$_SESSION['first_name'].' '.$_SESSION['last_name']?></h4>
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
			<li class="nav-items"> <a href="transmit-alerts.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
	</div>
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">
	
	<main>
	
		<div class="wrapper1">
			<div class="wrapper1-header">
				<h4 class="wrapper1-title">Selectati tipul de eveniment pe care doriti sa-l transmiteti si bifati evenimentul:</h4>
			</div>
				
			<div class="wrapper1-body" id="wrapper1-body">
				<div class="wrapper1-form">
					<form>
						<p>
							<select id="disaster" name="disaster" class="form-control">
								<option disabled selected value></option>
								<option>Cutremur</option>
								<option>Incendiu</option>
								<option>Inundatie</option>
								<option>Tshunami</option>
								<option>Eruptie vulcanica</option>
								<option>Avalansa</option>
							</select>
						</p>
					</form>
				</div>

			</div>
		</div>
				

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Transmit Alert</h4>
					</div>
							
					<div class="modal-body">
						<div class="alert-body" id="alert-body">
							<div class="alert-type">
								<h4 class="alert-title">Selectati modurile de alertare</h4>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="alert-type" value="sms"> SMS
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="alert-type" value="email"> E-Mail
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="alert-type" value="sound"> Alarma sonora publica
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="alert-type" value="tv"> Televiziune
									</label>
								</div>
							</div>
							<div class="alert-area">
								<h4 class="alert-title">Selectati raza de alertare</h4>
								<div class="radio">
									<label>
										<input type="radio" name="alert-area" value="local"> Local
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="alert-area" value="county"> Regional
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="alert-area" value="nation"> National
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="alert-area" value="continent"> Continental
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="alert-area" value="global"> Global
									</label>
								</div>
							</div>
						
							<div>
								<button type="button" class="btn btn-danger btn-lg" id="alert-btn"">ALERT!</button>
							</div>

						</div>
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