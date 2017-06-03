<?php
	require_once('./back-end/connDB.php');
	session_start();
	$first_name = '';
	$last_name  = '';
	$email      = '';
	if(isset($_REQUEST['first_name']) && isset($_REQUEST['last_name'])){  
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$email = $_REQUEST['email'];
	}

	if(isset($_REQUEST['email_login']) && isset($_REQUEST['password_login'])){
		$sql = "SELECT * from users where trim(email) = :email and trim(password) = :password";
		$q = $conn->prepare($sql);
		$q->execute(
			array(
					':email'     => $_REQUEST['email_login'],
					':password'  => $_REQUEST['password_login']
				)
		);
		$row=$q->fetch();
		if($row!=null){

            $_SESSION['last_name'] = $row[1];
            $_SESSION['first_name'] = $row[2];
			$_SESSION['id'] = $row['ID'];
			$_SESSION['email'] = $row['EMAIL'];
			$_SESSION['country'] = $row['COUNTRY'];
			$_SESSION['city'] = $row['CITY'];
			$_SESSION['date_of_birth'] = $row['DATE_OF_BIRTH'];
			$_SESSION['hobbies'] = $row['HOBBIES'];
			$_SESSION['phone_number'] = $row['PHONE_NUMBER'];
			$_SESSION['grade'] = $row['GRADE'];
			$_SESSION['section'] = $row['SECTION'];
			$_SESSION['profile_picture'] = $row['PROFILE_PICTURE'];
           
			header("Location: home_on.php");
		}
		else if($_REQUEST['password_login']){
			$message = "Email or password is not good. Try again ! :)";
	   	    echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}	
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="utf-8">
    <title>Crisis Containment Service</title>
    
    <meta name="author" content="Mihalachi Bogdan-Marian, Tofan Cosmin-Alexandru, Leleu Alexandru-Ioan, Alexandru Gabriel">
    <meta name="description" content="Cric(Crisis Containment Service) este o platforma web ce permite gestionarea situatiilor de urgenta,
									  oferind informatii utile despre evenimentele petrecute, zonele afectate si eventuale persoane disparute.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="home.css">
  </head>
  
  <body>
    
	<header>
		<h3 class="header-title" >Crisis Containment Service</h3>
	</header>
	
	<label for="show-menu" class="show-menu">Meniu</label>
	<input type="checkbox" id="show-menu" role="button">
	
	<div class="menu" id="menu">
		<ul class="menu-list">
			<li class="nav-items"> <a href="index.php">Home</a> </li>
			<li class="nav-items"> <a href="map.html">Map</a> </li>
			<li class="nav-items"> <a href="person-finder.html">Person Finder</a> </li>
			<li class="nav-items"> <a href="fushion-tables.html">Fushion Tables</a> </li>
			<li class="nav-items"> <a href="contact.html">Contact</a> </li>
			<li class="nav-items"> <button id="login-button" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">Login</button> </li>
			<li class="nav-items"> <button id="register-button" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Register</button> </li>
		</ul>
	</div>
	
	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal1">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Login</h3>
				</div>
				
				<div class="modal-body">
					<form method="post">
						<p>Logare permisa doar persoanelor autorizate din cadrul CriC.</p>
						 <div class="input-group col-xs-8">
   						 <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
   						 <input id="email_login" type="text" class="form-control" name="email_login" placeholder="Email" required>
 						 </div>
						
						<div class="input-group col-xs-8">
  					    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    					<input id="password_login" type="password" class="form-control" name="password_login" placeholder="Password" required>
 					    </div>
 					    <br/>
						<input type="submit" class="btn btn-info btn-lg" value="Login">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal2">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create Account</h4>
				</div>
				
				<div class="modal-body">
					<form method="post">
						<p style="text-indent: 15px;">Crearea de cont este permisa doar persoanelor posesoare a unui cod oferit de o autoritate Cric.</p>
						<p>
							<label for="code">Cod Cric: </label>
							<input type="password" id="code" name="code" required="" oninvalid="this.setCustomValidity('Please Enter valid code CriC!')"
 								oninput="setCustomValidity('')">
						</p>
						<p>
							<label for="last_name">Nume de familie: </label>
							<input type="text" id="last_name" name="last_name" required value="<?php echo htmlentities($last_name) ;?>">
						</p>
						<p>
							<label for="first_name">Prenume: </label>
							<input type="text" id="first_name" name="first_name" required value="<?php echo htmlentities($first_name) ;?>">
						</p>
						<p>
							<label for="date_of_birth">Data de nastere: </label>
							<input type="date" id="date_of_birth" name="date_of_birth">
						</p>
						<p>
							<label for="email">Email: </label>
							<input type="email" id="email" name="email" required value="<?php echo htmlentities($email) ;?>">
						</p>
						<p>
							<label for="country">Tara: </label>
							<input type="text" id="country" name="country">
						</p>
						<p>
							<label for="city">Oras: </label>
							<input type="text" id="city" name="city">
						</p>
						<p class="short_description">
							<label for="hobbies">Hobby-uri(sau scurta descriere): </label>
							<textarea cols="30" rows="5" wrap="soft" maxlength="200" id="hobbies" name="hobbies"></textarea>
						</p>
						<p>
							<label for="phone">Numar de telefon: </label>
							<input type="tel" id="phone" name="phone">
						</p>
						<p>
							<label for="password">Parola: </label>
							<input type="password" id="password" name="password" required>
						</p>
						<p>
							<label for="confirmed_password">Confirmare parola: </label>
							<input type="password" id="confirmed_password" name="confirmed_password" required>
						</p>
						<button type="submit" class="btn btn-default">Create account</button>
					</form>
				</div>
				<div class="modal-footer">
					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	  
	<div class="modal fade" id="myModal3" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal3">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<div class="modal-body">
					<img src="images/earthquake.jpg" alt="Misiune de salvare dupa cutremur." width="100%">
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModal4" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal4">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<div class="modal-body">
					<img src="images/flood.jpg" alt="Misiune de salvare dupa cutremur." width="100%">
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModal5" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal5">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<div class="modal-body">
					<img src="images/fire.jpg" alt="Misiune de salvare dupa cutremur." width="100%">
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>  
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">
	
	<main>
		
		<div class="intro">
			<article>
				<h2>Cine suntem noi?</h2>
				<p>Noi suntem <strong>Cric</strong> si am venit sa va <strong>salvam!</strong></p>
				<p>Impanziti pe toata planeta cu <em>sedii stabile</em>, <em>oameni calificati</em> si <em>echipamente de ultima generatie</em>, 
				   scopul nostru este de a asigura <strong>siguranta persoanelor</strong> de pretutindeni in caz de dezastre naturale neprevazute precum 
				   <strong>cutremure</strong>, <strong>incendii</strong> sau <strong>inundatii</strong>.</p>
			</article>
		</div>
		
		<div class="crisis-map">
			<article>
				<h2>Crisis Map - observatorul Pamantului</h2>
				<p>Cu ajutorul <strong>Crisis Map</strong>, va puteti pune la curent cu zonele afectate de dezastre naturale pentru eventuala lor ocolire 
				   pana la calmarea si rezolvarea situatiei de urgenta.</p>
				<p>Zonele afectate sunt marcate cu galben, portocaliu si rosu in functie de gradul de afectare al fiecarui eveniment. Folosind
				   meniul din dreapta puteti filtra harta dupa diverse criterii legate de evenimentele petrecute si zonele afectate.</p>
			</article>
		</div>
		
		<div data-statistics="statistics1">
			<ul>
				<li>
					<div> <img src="images/aeronave_si_avioane.png" alt="Aeronave si avioane" width="3%"> </div>
					<div> <p>234</p> </div>
					<div> <p>aeronave si avioane</p> </div>
				</li>
				<li>
					<div> <img src="images/barci_de_salvare.png" alt="Barci de salvare" width="3%"> </div>
					<div> <p>678</p> </div>
					<div> <p>barci de salvare</p> </div>
				</li>
				<li>
					<div> <img src="images/autovehicule_de_salvare.png" alt="Autovehicule de salvare" width="3%"> </div>
					<div> <p>3067</p> </div>
					<div> <p>autovehicule de salvare</p> </div>
				</li>
				<li>
					<div> <img src="images/persoane_calificate.png" alt="Persoane calificate" width="3%"> </div>
					<div> <p>134067</p> </div>
					<div> <p>persoane calificate</p> </div>
				</li>
				<li>
					<div> <img src="images/echipaje_Cric.png" alt="Echipaje Cric" width="3%"> </div>
					<div> <p>2320</p> </div>
					<div> <p>echipaje Cric</p> </div>
				</li>
			</ul>
		</div>
		
		<div data-statistics="statistics2">
			<ul>
				<li>
					<div> <img src="images/ani_de_activitate.png" alt="Ani de activitate" width="3%"> </div>
					<div> <p>10</p> </div>
					<div> <p>ani de activitate</p> </div>
				</li>
				<li>
					<div> <img src="images/misiuni_aeriene.png" alt="Misiuni aeriene" width="3%"> </div>
					<div> <p>2056</p> </div>
					<div> <p>misiuni aeriene</p> </div>
				</li>
				<li>
					<div> <img src="images/interventii_de_urgenta.png" alt="Interventii de urgenta" width="3%"> </div>
					<div> <p>10345</p> </div>
					<div> <p>interventii de urgenta</p> </div>
				</li>
				<li>
					<div> <img src="images/misiuni_navale.png" alt="Misiuni navale" width="3%"> </div>
					<div> <p>2255</p> </div>
					<div> <p>misiuni navale</p> </div>
				</li>
				<li>
					<div> <img src="images/misiuni_terestre.png" alt="Misiuni terestre" width="3%"> </div>
					<div> <p>6034</p> </div>
					<div> <p>misiuni terestre</p> </div>
				</li>
			</ul>
		</div>
		
		<div class="chart">
			<img src="images/chart.png" alt="Chart distribution" width="20%">
			<div class="chart-data">
				<p>Misiuni realizate cu succes pe evenimente</p>
				<ul>
					<li>Incendiu - 34.78%</li>
					<li>Inundatie - 28.45%</li>
					<li>Cutremur - 18.52%</li>
					<li>Tsunami - 8.33%</li>
					<li>Vulcan - 5.19%</li>
					<li>Avalansa - 4.73%</li>
				</ul>
			</div>
		</div>
		
		<div class="person-finder">
			<article>
				<h2>Person Finder - pierdut? Stai linistit! Noi te gasim!</h2>
				<p>Serviciul Person Finder serveste la a gasi o anumita persoana <em>pierduta</em> (<em>inconstienta</em> sau <em>ranita</em>) in urma 
				   dezastrului.</p>
				<p>Poate fi folosit de catre dumneavoastra prin introducerea unor date despre persoana aflata in stare de urgenta 
				   (<strong>telefon</strong>, <strong>locatie aproximativa</strong>, etc.), dupa care <strong>echipajele Cric</strong> se pun in 
				   actiunea de cautare <em>imediat</em>, cat si de <strong>autoritati</strong> pe baza informatiilor detinute de 
				   persoane care nu au acces la Internet. De asemenea, puteti contribui la gasirea unei anumite persoane in cazul detinerii de 
				   <strong>informatii utile</strong>.</p>
			</article>
		</div>
		
		<div class="fushion-tables">
			<article>
				<h2>Fushion Tables - dovada lucrului bine facut</h2>
				<p>In cadrul Fushion Tables pot fi observate <em>misiunile, atat indepartate, cat si recente de salvare</em> impreuna cu informatiile 
				   aferente precum <strong>evenimentul perturbator</strong>, <strong>tara</strong> si <strong>locatia</strong> in care s-a produs, 
				   <strong>data</strong> la care s-a declarat zona ca fiind in posibila necesitate de evacuare.</p>
				<p>Tabelele sunt clasificate in functie de evenimente si astfel poseda si informatii specifice. Acestea pot fi filtrate dupa 
				   anumite criterii dupa cum veti puteti observa in sectiunea <strong>"Fushion Tables"</strong> din <strong>meniu</strong>.</p>   
			</article>
		</div>
		
		<div class="rescue-missions-photos">
			<aside>
				<h2>Fotografii de la misiunile de salvare incheiate cu succes</h2>
				<figure>
					<img src="images/earthquake.jpg" alt="Misiune de salvare dupa cutremur." width="75%"
					      class="btn btn-default" data-toggle="modal" data-target="#myModal3">
					<figcaption>Misiune de salvare dupa <strong>cutremur</strong>.</figcaption>
				</figure>
				<figure>
					<img src="images/flood.jpg" alt="Misiune de salvare dupa inundatie." width="75%"
					     class="btn btn-default" data-toggle="modal" data-target="#myModal4">
					<figcaption>Misiune de salvare dupa <strong>inundatie</strong>.</figcaption>
				</figure>
				<figure>
					<img src="images/fire.jpg" alt="Misiune de salvare dupa incendiu." width="75%"
					     class="btn btn-default" data-toggle="modal" data-target="#myModal5">
					<figcaption>Misiune de salvare dupa <strong>incendiu</strong>.</figcaption>
				</figure>
			</aside>
		</div>
		
		<div class="alerting-protocol">
			<article>
				<h2>Common Alerting Protocol - instiinteaza din timp si salveaza</h2>
				<p>Pe baza acestui serviciu de care dispune <em>asociatia Cric</em>, puteti transmite, fie <strong>notificari</strong> pe diverse 
				   <strong>retele</strong>, fie <strong>alerte</strong> in lumea reala, persoanelor din <em>zonele afectate direct</em> sau din 
				   <em>imprejurimi</em>. Acest lucru poate ajuta la o mai usoara mobilizare a <strong>evacuarii</strong>.</p>
			</article>
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



<?php


if(isset($_REQUEST['code'])){
$sql = "SELECT * from cric_code where cric_code = :code";
	$q = $conn->prepare($sql);
		$q->execute(
			array(
					':code'    => $_REQUEST['code'] 
				)
		);
	$row=$q->fetch();



	if($row >0){
	
	if($_REQUEST["confirmed_password"] != $_REQUEST['password']){
		$message = "Something is wrong...please check the password";
	    echo "<script type='text/javascript'>alert('$message');</script>";
		exit;
	}
	$sql = "INSERT INTO USERS(FIRST_NAME,LAST_NAME,PASSWORD,EMAIL,date_of_birth,country,city,hobbies,phone_number) VALUES (:first_name,:last_name,:password,:email,:date_of_birth,:country,:city,:hobbies,:phone_number)";
		$q = $conn->prepare($sql);
		$result = $q->execute(
			array( 
					':password'		=> $_POST['password'],
					':first_name'   => $_POST['first_name'],
					':last_name'    => $_POST['last_name'],
					':email'	    => $_POST['email'],
					':date_of_birth'=> $_POST['date_of_birth'],
					':country'		=> $_POST['country'],
					':city'			=> $_POST['city'],
					':hobbies'      => $_POST['hobbies'],
					':phone_number' => $_POST['phone']
					
				)
		);

	if($result){
		$message = "You create a new account!!! Congratulation!";
	    echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else{
		die("Execute query error, because: ". print_r($conn->errorInfo(), true));
	 }
  }



else if(isset($_REQUEST['code'])){
	$message = "Please insert a valid CRIC CODE!";
	    echo "<script type='text/javascript'>alert('$message');</script>";
}

}


?>




	
	