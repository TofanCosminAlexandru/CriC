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
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="map_on.css">
  </head>
  
  <body>
    
	<header>
		<img class="logo-header" src="images/text_logo.png" alt="Cric">
		<h3 class="header-title" >Crisis Containment Service</h3>
		<h4 style="text-align: right; color:#FE9C45; padding: 10px;"> <?php echo '<b>Welcome, </b>'.$_SESSION['first_name'].' '.$_SESSION['last_name']?></h4>
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
	
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Login</h4>
        </div>
        
		<div class="modal-body">
			<form>
				<p>Logare permisa doar persoanelor autorizate din cadrul Cric.</p>
				<p>
					<label for="email">Email: </label>
					<input type="email" id="email" name="type_email">
				</p>
				
				<p>
					<label for="password">Password: </label>
					<input type="password" id="password" name="type_password">
				</p>
				<button type="submit">Log in</button>
			</form>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
	</div>
      
    </div>
	</div>
	
	<main>	
		<div class="filter">
			<div>
				<select name="event-type" form="event-type">
					<option value="incendiu">Incendiu</option>
					<option value="inundatie">Inundatie</option>
					<option value="cutremur">Cutremur</option>
					<option value="tsunami">Tsunami</option>
					<option value="vulcan">Vulcan</option>
					<option value="avalansa">Avalansa</option>
				</select>
			</div>
			
			<div>
				<input type="datetime-local" name="type_date" id="date">
			</div>
		</div>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3"></script>
		<div class="googft-mapCanvas" id="googft-mapCanvas"></div>
		<script type="text/javascript" src="map.js"></script>
	</main>
	
	<footer>
		<div class="footer">
		<img class="logo-footer" src="images/logo.png" alt="Cric">
		<p class="footer-details">© 2007–2017 Crisis Containment Service si contributii individuale. Design & tehnologie cu pasiune de la MTLA</p>
		</div>
	</footer>
	
  </body>
  
</html>