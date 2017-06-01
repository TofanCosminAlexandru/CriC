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
	<link rel="stylesheet" href="profile.css">
  
  <body>
    
	<header>
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
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">

	<main>
	
		<div class="left-panel">
			<img class="profile_image" src="images/profile.jpg" alt="Cric">
			<p>Grigorescu V. Ionel</p>
			<p>Grad: <em>General Cric</em></p>
			<p>Detașamentul de Pompieri <strong>Flacara albastra</strong></p>
        </div>
		
		<div class="right-panel">
			<ul class="menu-list">
				<li class="nav-items"> <a href="profile.html">My Profile</a> </li>
				<li class="nav-items"> <a href="data.html">My data</a> </li>
				<li class="nav-items"> <button type="button" class="edit-data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit Data</button> </li>
				<li class="nav-items"> <button type="button" class="change-picture btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Change Profile Picture</button> </li>
			</ul>
			
			<div class="my-profile">
				<iframe height="400px" width="100%" src="my_profile.html" name="iframe_a"></iframe>
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