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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="home_on.css">
  </head>
  
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
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
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
