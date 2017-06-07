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
	<link rel="stylesheet" href="data.css">
  
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
			<li class="nav-items"> <a href="transmit-alerts_on.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="index.php">Logout</a> </li>
		</ul>
	</div>
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">

	<main>
		<div class="left-panel">
			<img class="profile_image" src="<?php echo $_SESSION['profile_picture'] ?>" alt="Cric">
			<?php echo '<p>' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</p>' ?>
			<?php echo '<p>Grad: <em>' . $_SESSION['grade'] . '</em> </p>' ?>
			<?php echo '<p>Sectia: <strong> ' . $_SESSION['section'] . '</strong> </p>' ?>
        </div>
		
		<div class="right-panel">
			<ul class="menu-list">
				<li class="nav-items"><a href="profile.php">My Profile</a></li>
				<li class="nav-items"><a href="data.php">My data</a></li>
				<li class="nav-items"> <button type="button" class="edit-data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">Edit Data</button> </li>
				<li class="nav-items"> <button type="button" class="change-picture btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">Change Profile Picture</button> </li>
			</ul>
			
			<div class="my-profile">
				<iframe height="400px" width="100%" src="my_data.php" name="iframe_a"></iframe>
			</div>
			
        </div>
		
		<div class="modal fade" id="myModal5" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content modal-edit">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Edit Personal Data</h3>
					</div>
					
					<form action = "edit_user_data.php" method="post">
						<div class="modal-body">
								<p>
									<label for="email">Change email: </label>
									<input type="email" id="email" name="type_email" value="<?php echo $_SESSION['email']?>">
								</p>
								<p>
									<label for="country">Change country: </label>
									<input type="text" id="country" name="type_country" value="<?php echo $_SESSION['country']?>">
									<label for="city">Change city: </label>
									<input type="text" id="city" name="type_city" value="<?php echo $_SESSION['city']?>">
								</p>
								<p class="short_description">
									<label for="hobbies">Change description: </label>
									<textarea cols="30" rows="5" wrap="soft" maxlength="200" id="hobbies" name="type_hobbies" ><?php echo $_SESSION['hobbies']?></textarea>
								</p>
								<p>
									<label for="phone">Change phone number: </label>
									<input type="tel" id="phone" name="type_phone" value="<?php echo $_SESSION['phone_number']?>">
								</p>
								<p>
									<label for="password">Change password: </label>
									<input type="password" id="password" name="type_password">
								</p>
								<p>
									<label for="confirmed_password">Confirm changed password: </label>
									<input type="password" id="confirmed_password" name="type_confirmed_password">
								</p>
						</div>
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-default">Submit changes</button>
							<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="myModal6" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content modal-picture">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Change Profile Picture</h3>
					</div>
					
					<form action = "upload_picture.php" method = "POST" enctype = "multipart/form-data">
						<div class="modal-body">
								<p>
									<input type = "hidden" name = "MAX_FILE_SIZE" value = "300000">
								</p>
								<p>
									<input type = "file" id = "img" name = "img">
								</p>
								<p>
									<input type = "submit" value = "Upload Picture">
								</p>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
						</div>
					</form>
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