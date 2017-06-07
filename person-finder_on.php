<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <title>Crisis Containment Service</title>
    
    <meta name="author" content="Mihalachi Bogdan-Marian, Tofan Cosmin-Alexandru, Leleu Alexandru-Ioan, Alexandru Gabriel">
    <meta name="description" content="Cric(Crisis Containment Service) este o platforma web ce permite gestionarea situatiilor de urgenta,
									  oferind informatii utile despre evenimentele petrecute, zonele afectate si eventuale persoane disparute.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles_on/main.css" />
  <link rel="stylesheet" href="./styles_on/style.css" />
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

	<div class="container">
  <br>
  <br>
	<div class="page-header">
	<h4>  Person Finder helps people reconnect with friends and loved ones in the aftermath of natural and humanitarian disasters. </h4>
	</div>

	<div class="jumbotron">

	<p>Serviciul Person Finder serveste la a gasi o anumita persoana pierduta (inconstienta sau ranita) in urma dezastrului.
			   Poate fi folosit de catre dumneavostra prin introducerea unor date despre persoana aflata in stare de urgenta (telefon, locatie 
			   aproximativa, etc.), dupa care echipajele Cric se pun in actiunea de cautare imediat, cat si de autoritati pe baza 
			   informatiilor detinute de persoane care nu au acces la Internet.</p>
		
	</div>



  <div class= "row">
  <div class="action-outer start">
  <div class="action-inner">
  	<a href="search_on.php"> I'm looking for someone</a>
  </div>
  </div>
  <div class="action-outer end">
  <div class="action-inner">
  	<a href="form_on.php"> I have information about someone </a>
  </div>
  </div>
  </div>

  </div>



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
