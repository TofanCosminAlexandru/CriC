<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Crisis Containment Service</title>
    
    <meta name="author" content="Mihalachi Bogdan-Marian, Tofan Cosmin-Alexandru, Leleu Alexandru-Ioan, Alexandru Gabriel">
    <meta name="description" content="Cric(Crisis Containment Service) este o platforma web ce permite gestionarea situatiilor de urgenta,
									  oferind informatii utile despre evenimentele petrecute, zonele afectate si eventuale persoane disparute.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
	<link rel="stylesheet" href="./styles_on/head&footer.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>


	<header>
		<img class="logo-header" src="./images/text_logo.png" alt="Cric">
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
			<li class="nav-items"> <a href="transmit-alerts_on.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="index.php">Logout</a> </li>
			<li class="nav-items"> <a href="home_on.html">Home</a> </li>
			<li class="nav-items"> <a href="map_on.html">Map</a> </li>
			<li class="nav-items"> <a href="person-finder_on.html">Person Finder</a> </li>
			<li class="nav-items"> <a href="fushion-tables_on.html">Fushion Tables</a> </li>
			<li class="nav-items"> <a href="transmit-alerts_on.html">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.html">Contact</a> </li>
			<li class="nav-items"> <a href="profile.html">Profile</a> </li>
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
	</div>
  

<div id="sidebar">
	<ul>
		<li><img src="./images/logo.png" width=120 height=120></li>
		<li><a href="person-finder_on.php">Test</a></li>
		<li><a href="about_on.php">About</a></li>
		<li><a href="#">Other</a></li>
		<li><a href="#">Tables</a></li>
	</ul>
	<div id="sidebar-btn">
		<span></span>
		<span></span>
		<span></span>		
	</div>

</div>
<br><br><br><br>

<div class="mainStory">
<div class="story">
	<div class="story-section">
		<table>
			<tbody>
				<tr>
					<td>
						<img src="./images/separated-81x80.png" width="81" height="80">
					</td>
					<td>
						<img src="./images/search-100x80.png" width="100" height="80">
					</td>
				</tr>
				<tr class="captions">
					<td>A crisis strikes and people get separated.</td>
					<td>They let the world know they are looking for someone.</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="story-section">
		<table>
			<tbody>
				<tr>
					<td>
						<img src="./images/post-90x80.png" width="90" height="80">
					</td>
					<td>
						<img src="./images/find-80x80.png" width="80" height="80">
					</td>
				</tr>
				<tr class="captions">
					<td>Individuals and organizations provide information.</td>
					<td>People find information about their friends and family.</td>
				</tr>
			</tbody>
		</table>	
	</div>
	</div>

	<div class="teasers">
	<div class="teasers-section">
		<h2>Responders</h2>
		"

     		 You can help people find each other in the aftermath of a disaster:
		"
		<ul>
			<li>Complete the <a href="form.html">form</a> if you have information!</li>
		</ul>	
	</div>

	<div class="teasers-section">
		<h2>Bla bla bla</h2>
		<li>We help people!</li>
		<li>Help us!!</li>
	</div>
		
	</div>

	</div>
	<br>
	<br>
	<br>
	<!-- <footer>
		<div class="footer">
			<img class="logo-footer" src="./images/logo.png" alt="Cric">
			<p class="footer-details"> Crisis Containment Service si contributii individuale. Design & tehnologie cu pasiune de la MTLA</p>
		</div>
	</footer> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$('#sidebar-btn').click(function(){
				$('#sidebar').toggleClass('visible');
		});
	});
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>