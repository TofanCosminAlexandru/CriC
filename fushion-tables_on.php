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
	<script src="event.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="fushion-tables_on.css">
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
			<li class="nav-items"> <a href="transmit-alerts.php">Transmit Alerts</a> </li>
			<li class="nav-items"> <a href="contact_on.php">Contact</a> </li>
			<li class="nav-items"> <a href="profile.php">Profile</a> </li>
			<li class="nav-items"> <a href="logout.php">Logout</a> </li>
		</ul>
	</div>
	
	<img class="logo-header" src="images/logo.png" alt="Cric" width="12%">
	
	<main>
	
		<div>
			<button type="button" class="add-event btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>
		</div>
		
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" class="modal-dialog modal-lg">
				<div class="modal-content modal-add">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Event</h4>
					</div>
							
					<div class="modal-body">
						<div class="add-event-header">
							<h5 class="add-event-title">Adaugarea unui nou eveniment ce prezinta un anumit grad de risc</h5>
						</div>
							
						<div class="add-event-body" id="add-event-body">
							<div class="add-event-form">
								<form>
									<p>
										<label for="disaster">Eveniment: </label>
										<select id="disaster" name="disaster">
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
										<input type="datetime-local" name="type_date" id="date">
									</p>
									<p>
										<label for="location">Locatie: </label>
										<input type="text" id="location" name="type_location">
									</p>
									<p>
										<label for="risc-grade">Grad de risc: </label>
										<input type="number" min="1" max="4" step="1" id="risc-grade" name="type_risc-grade">
									</p>
								</form>
							</div>
		
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" id="submit-add-event">Add event</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="table">
			<table class="cutremur">
				<thead>
					<tr>
						<th scope="row" colspan="12">Cutremur</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Aprilie 25 2017 06:46 AM</td>
						<td>5.1</td>
						<td>3408</td>
						<td>3.4</td>
						<td>Asia</td>
						<td>Rusia</td>
						<td>Sakhalin, Severo-Kuril&#39;sk</td>
						<td> <img id="risc" src="images/grad_mare_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
					</tr>
					<tr>
						<td>Aprilie 24 2017 03:12 PM</td>
						<td>2.0</td>
						<td>500</td>
						<td>1.2</td>
						<td>Australia</td>
						<td>Noua Zeelanda</td>
						<td>Te Kaha</td>
						<td> <img id="risc" src="images/grad_mic_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 24 2017 03:56 PM</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
					</tr>
					<tr>
						<td>Aprilie 23 2017 02:04 PM</td>
						<td>2.5</td>
						<td>890</td>
						<td>1.7</td>
						<td>America de Nord</td>
						<td>SUA</td>
						<td>Alaska, Manley Hot Springs</td>
						<td> <img id="risc" src="images/grad_mic_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 23 2017 03:02 PM</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
					</tr>
					<tr>
						<td>Aprilie 22 2017 12:39 PM</td>
						<td>4.5</td>
						<td>2080</td>
						<td>2.7</td>
						<td>Europa</td>
						<td>Italia</td>
						<td>Sicilia, Castel di Tusa</td>
						<td> <img id="risc" src="images/grad_mediu_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 22 2017 10:56 PM</td>
						<td contenteditable='true'>320</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>12</td>
					</tr>
					<tr>
						<td>Aprilie 18 2017 04:15 PM</td>
						<td>6.8</td>
						<td>5609</td>
						<td>4.5</td>
						<td>Asia</td>
						<td>Turcia</td>
						<td>Sakarya, Karasu</td>
						<td> <img id="risc" src="images/grad_urias_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 21 2017 07:02 PM</td>
						<td contenteditable='true'>1000</td>
						<td contenteditable='true'>20</td>
						<td contenteditable='true'>100</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total cutremure</td>
						<td>5</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>1320</td>
						<td scope="row" colspan="2">Nr. total disparuti</td>
						<td>20</td>
						<td scope="row" colspan="2">Nr. total decedati</td>
						<td>112</td>
					</tr>
					<tr>
						<td scope="row" colspan="12">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="incendiu">
				<thead>
					<tr>
						<th scope="row" colspan="10">Incendiu</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Aprilie 25 2017 02:05 AM</td>
						<td>3020</td>
						<td>America Centrala</td>
						<td>Mexic</td>
						<td>Guerrero, Pericotepec</td>
						<td> <img id="risc" src="images/grad_mare_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
					</tr>
					<tr>
						<td>Aprilie 24 2017 02:24 AM</td>
						<td>1509</td>
						<td>Europa</td>
						<td>Bulgaria</td>
						<td>Yambol, Bolyarovo</td>
						<td> <img id="risc" src="images/grad_mediu_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 24 2017 07:00 PM</td>
						<td contenteditable='true'>300</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>5</td>
					</tr>
					<tr>
						<td>Aprilie 23 2017 05:06 PM</td>
						<td>5090</td>
						<td>America de Sud</td>
						<td>Ecuador</td>
						<td>Manabi, Manta</td>
						<td> <img id="risc" src="images/grad_urias_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 24 2017 07:09 AM</td>
						<td contenteditable='true'>1780</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>480</td>
					</tr>
					<tr>
						<td>Aprilie 22 2017 01:40 PM</td>
						<td>370</td>
						<td>Europa</td>
						<td>Grecia</td>
						<td>Grecia Centrala, Afration</td>
						<td> <img id="risc" src="images/grad_mic_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 22 2017 05:56 PM</td>
						<td contenteditable='true'>190</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>12</td>
					</tr>
					<tr>
						<td>Aprilie 19 2017 06:34 PM</td>
						<td>600</td>
						<td>Asia</td>
						<td>Turcia</td>
						<td>Sakarya, Karasu</td>
						<td> <img id="risc" src="images/grad_mic_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 19 2017 07:29 PM</td>
						<td contenteditable='true'>70</td>
						<td contenteditable='true'>20</td>
						<td contenteditable='true'>88</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total incendii</td>
						<td>5</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>2340</td>
						<td scope="row" colspan="1">Nr. total disparuti</td>
						<td>20</td>
						<td scope="row" colspan="1">Nr. total decedati</td>
						<td>585</td>
					</tr>
					<tr>
						<td scope="row" colspan="10">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="inundatie">
				<thead>
					<tr>
						<th scope="row" colspan="12">Inundatie</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Aprilie 18 2017 06:44 AM</td>
						<td>4800</td>
						<td>America de Nord</td>
						<td>SUA</td>
						<td>California, Cobb</td>
						<td> <img id="risc" src="images/grad_mare_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'></td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
					</tr>
					<tr>
						<td>Aprilie 19 2017 09:45 AM</td>
						<td>3278</td>
						<td>Europa</td>
						<td>Grecia</td>
						<td>North Aegean, Mithymna</td>
						<td> <img id="risc" src="images/grad_mediu_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
					</tr>
					<tr>
						<td>Aprilie 25 2017 09:45 AM</td>
						<td>1020</td>
						<td>America de Nord</td>
						<td>SUA</td>
						<td>Oklahoma, Meno</td>
						<td> <img id="risc" src="images/grad_mic_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
						<td contenteditable='true'>&nbsp;</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total inundatii</td>
						<td>3</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>0</td>
						<td scope="row" colspan="1">Nr. total disparuti</td>
						<td>0</td>
						<td scope="row" colspan="1">Nr. total decedati</td>
						<td>0</td>
					</tr>
					<tr>
						<td scope="row" colspan="12">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="tshunami">
				<thead>
					<tr>
						<th scope="row" colspan="10">Tshunami</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Martie 16 2017 12:54 AM</td>
						<td>Oceanul Atlantic de Nord</td>
						<td>7.0</td>
						<td>6079</td>
						<td>Regiunea Dominican Republic</td>
						<td> <img id="risc" src="images/grad_urias_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Martie 20 2017 08:08 AM</td>
						<td contenteditable='true'>2053</td>
						<td contenteditable='true'>305</td>
						<td contenteditable='true'>908</td>
					</tr>
					<tr>
						<td>Martie 05 2017 10:55 PM</td>
						<td>Marea Solomon</td>
						<td>5.2</td>
						<td>4070</td>
						<td>West New Britain, Papua New Guinea</td>
						<td> <img id="risc" src="images/grad_mare_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Martie 09 2017 02:08 AM</td>
						<td contenteditable='true'>1890</td>
						<td contenteditable='true'>280</td>
						<td contenteditable='true'>378</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total tshunami</td>
						<td>2</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>3943</td>
						<td scope="row" colspan="1">Nr. total disparuti</td>
						<td>385</td>
						<td scope="row" colspan="1">Nr. total decedati</td>
						<td>1286</td>
					</tr>
					<tr>
						<td scope="row" colspan="10">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="vulcan">
				<thead>
					<tr>
						<th scope="row" colspan="12">Eruptie vulcanica</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Aprilie 10 2017 03:21 AM</td>
						<td>Poas</td>
						<td>Stratovulcan</td>
						<td>7</td>
						<td>America Centrala</td>
						<td>Costa Rica</td>
						<td>Alajuela Province</td>
						<td> <img id="risc" src="images/grad_mediu_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Aprilie 11 2017 05:09 AM</td>
						<td contenteditable='true'>1243</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
					</tr>
					<tr>
						<td>Ianuarie 28 2017 04:56 AM</td>
						<td>Katla</td>
						<td>Subglaciar</td>
						<td>7</td>
						<td>Europa</td>
						<td>Islanda</td>
						<td>Islanda de Sud</td>
						<td> <img id="risc" src="images/grad_mediu_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Ianuarie 30 2017 12:13 PM</td>
						<td contenteditable='true'>1242</td>
						<td contenteditable='true'>0</td>
						<td contenteditable='true'>0</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total eruptii</td>
						<td>2</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>2485</td>
						<td scope="row" colspan="2">Nr. total disparuti</td>
						<td>0</td>
						<td scope="row" colspan="2">Nr. total decedati</td>
						<td>0</td>
					</tr>
					<tr>
						<td scope="row" colspan="12">Informatiile sunt actualizate la fiecare 5 minute.</td>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="table">
			<table class="avalansa">
				<thead>
					<tr>
						<th scope="row" colspan="10">Avalansa</th>
					</tr>
					<tr>
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
				
				<tbody>
					<tr>
						<td>Ianuarie 15 2017 12:56 PM</td>
						<td>Europa</td>
						<td>Elvetia</td>
						<td>Stanserhorn</td>
						<td>Muntii Alpi</td>
						<td> <img id="risc" src="images/grad_mare_de_risc.png" alt="Risc" width="40%"> </td>
						<td contenteditable='true'>Ianuarie 15 2017 18:02 PM</td>
						<td contenteditable='true'>308</td>
						<td contenteditable='true'>12</td>
						<td contenteditable='true'>35</td>
					</tr>
				</tbody>
				
				<tfoot>
					<tr>
						<td scope="row" colspan="2">Nr. total avalanse</td>
						<td>1</td>
						<td scope="row" colspan="2">Nr. total evacuati</td>
						<td>308</td>
						<td scope="row" colspan="1">Nr. total disparuti</td>
						<td>12</td>
						<td scope="row" colspan="1">Nr. total decedati</td>
						<td>35</td>
					</tr>
					<tr>
						<td scope="row" colspan="10">Informatiile sunt actualizate la fiecare 5 minute.</td>
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