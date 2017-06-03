<?php

	session_start();
	$username = 'projectTW';
	$password = 'PROJECTTW';
	$connection_string = 'localhost/xe';

	// conectarea la baza de date
	$connection = oci_connect(
		$username,
		$password,
		$connection_string
	);

	if(!$connection)
		echo 'Conectare nereusita!';
	
	$user_cric_code = "";
	$query = "select cric_code from cric_code where id = :id";
			
	$parsed_query = oci_parse($connection, $query); // parsarea selectului
	oci_bind_by_name($parsed_query, ':id', $_SESSION['id']);
	$result = @oci_execute($parsed_query); // executarea selectului
	
	if (!$result) { // in caz de a aparut exceptie
		$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
		echo 'Error ';
		$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
		echo $list[1];
	}
	else {
		$row = oci_fetch_array($parsed_query, OCI_ASSOC);
		$user_cric_code = $row['CRIC_CODE'];
	}
		
	$event = $_REQUEST["type_disaster"];
	$event_date = $_REQUEST["type_date"];
	$event_date = explode('T', $event_date);
	$event_date = $event_date[0] . ' ' . $event_date[1];
	$location = $_REQUEST["type_location"];
	$risc_number = $_REQUEST["type_risc-grade"];
	$risc_grade = "";
	if($risc_number == 1){
		$risc_grade = "images/grad_mic_de_risc.png";
	}
	elseif($risc_number == 2){
		$risc_grade = "images/grad_mediu_de_risc.png";
	}
	elseif($risc_number == 3){
		$risc_grade = "images/grad_mare_de_risc.png";
	}
	elseif($risc_number == 4){
		$risc_grade = "images/grad_urias_de_risc.png";
	}
	
	libxml_use_internal_errors(true);
	$doc = new DOMDocument('1.0', 'utf-8'); // cream documentul DOM corespunzator fisierului HTML
	$doc->validateOnParse = true;
	$doc->loadHTMLFile('fushion-tables_on.php');
	
	insert_event($event, $user_cric_code, $event_date, $location, $risc_grade, $connection, $doc);
	
	echo $doc->saveHTML(); // salvam modificarea
	
	// inchiderea conexiunii
	oci_close($connection);
	
	// functie care insereaza inregistrarea noua in baza de date in tabela corespunzatoare
	function insert_event($event, $user_cric_code, $event_date, $location, $risc_grade, $connection, $doc) {
		
		if($event == "Cutremur"){
			
			$magnitude = $_REQUEST["type_magnitude"];
			$surface = $_REQUEST["type_damaged-area"];
			$depth = $_REQUEST["type_depth"];
			$continent = $_REQUEST["type_continent"];
			$country = $_REQUEST["type_country"];
			
			$query = 'insert into earthquakes values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :magnitude, :surface, :depth, :continent, :country, :location, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'earthquakes\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":magnitude", $magnitude);
			oci_bind_by_name($parsed_query, ":surface", $surface);
			oci_bind_by_name($parsed_query, ":depth", $depth);
			oci_bind_by_name($parsed_query, ":continent", $continent);
			oci_bind_by_name($parsed_query, ":country", $country);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		
		}
		elseif($event == "Incendiu"){
			
			$surface = $_REQUEST["type_damaged-area"];
			$continent = $_REQUEST["type_continent"];
			$country = $_REQUEST["type_country"];
			
			$query = 'insert into fires values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :surface, :continent, :country, :location, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'fires\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":surface", $surface);
			oci_bind_by_name($parsed_query, ":continent", $continent);
			oci_bind_by_name($parsed_query, ":country", $country);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		}
		elseif($event == "Inundatie"){
			
			$surface = $_REQUEST["type_damaged-area"];
			$continent = $_REQUEST["type_continent"];
			$country = $_REQUEST["type_country"];
			
			$query = 'insert into floods values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :surface, :continent, :country, :location, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'floods\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":surface", $surface);
			oci_bind_by_name($parsed_query, ":continent", $continent);
			oci_bind_by_name($parsed_query, ":country", $country);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		}
		elseif($event == "Tshunami"){
			
			$area = $_REQUEST["type_area"];
			$magnitude = $_REQUEST["type_magnitude"];
			$surface = $_REQUEST["type_damaged-area"];
			
			$query = 'insert into tshunamis values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :area, :magnitude, :surface, :location, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'tshunamis\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":surface", $surface);
			oci_bind_by_name($parsed_query, ":magnitude", $magnitude);
			oci_bind_by_name($parsed_query, ":area", $area);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		}
		elseif($event == "Eruptie vulcanica"){
			
			$volcano_name = $_REQUEST["type_volcano-name"];
			$volcano_type = $_REQUEST["type_volcano-type"];
			$VEI = $_REQUEST["type_VEI"];
			$continent = $_REQUEST["type_continent"];
			$country = $_REQUEST["type_country"];
			
			$query = 'insert into eruptions values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :volcano_name, :volcano_type, :VEI, :continent, :country, :location, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'eruptions\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":volcano_name", $volcano_name);
			oci_bind_by_name($parsed_query, ":volcano_type", $volcano_type);
			oci_bind_by_name($parsed_query, ":VEI", $VEI);
			oci_bind_by_name($parsed_query, ":continent", $continent);
			oci_bind_by_name($parsed_query, ":country", $country);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		}
		elseif($event == "Avalansa"){
			
			$continent = $_REQUEST["type_continent"];
			$country = $_REQUEST["type_country"];
			$mountains = $_REQUEST["type_mountains"];
			
			$query = 'insert into avalanches values(:id, :user_cric_code, to_date(:event_date, \'yyyy-mm-dd hh24:mi\'), :continent, :country, :location, :mountains, :risc_grade, to_date(\'01-01-2000\',\'dd-mm-yyyy\'), 0, 0, 0, \'avalanches\')';
			$parsed_query = oci_parse($connection, $query);
			$id = rand(1, 10000);
		
			oci_bind_by_name($parsed_query, ":id", $id); // asignarea de variabile php variabilelor legate din interogare
			oci_bind_by_name($parsed_query, ":user_cric_code", $user_cric_code);
			oci_bind_by_name($parsed_query, ":event_date", $event_date);
			oci_bind_by_name($parsed_query, ":location", $location);
			oci_bind_by_name($parsed_query, ":risc_grade", $risc_grade);
			oci_bind_by_name($parsed_query, ":mountains", $mountains);
			oci_bind_by_name($parsed_query, ":continent", $continent);
			oci_bind_by_name($parsed_query, ":country", $country);
			$result = @oci_execute($parsed_query); // executarea insertului
			
			if (!$result) { // in caz de a aparut exceptie
				$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
				echo 'Error ';
				$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
				echo $list[1];
			}

			oci_free_statement($parsed_query); // eliberarea resurselor asociate query-ului
		}
		
		display_recent_events("Cutremur", $connection, $doc);
		display_recent_events("Inundatie", $connection, $doc);
		display_recent_events("Incendiu", $connection, $doc);
		display_recent_events("Tshunami", $connection, $doc);
		display_recent_events("Eruptie vulcanica", $connection, $doc);
		display_recent_events("Avalansa", $connection, $doc);
	}

	// functie care umple tabelele cu informatiile cele mai recente
	function display_recent_events($event, $connection, $doc) {
	
		if($event == "Cutremur")
			$event = "earthquakes";
		elseif($event == "Incendiu")
			$event = "fires";
		elseif($event == "Inundatie") 
			$event = "floods";
		elseif($event == "Tshunami") 
			$event = "tshunamis";
		elseif($event == "Eruptie vulcanica") 
			$event = "eruptions";
		elseif($event == "Avalansa") 
			$event = "avalanches";
			
		$query = "";
		if($event == "earthquakes")
			$query = 'select * from (select * from earthquakes order by event_date desc) where rownum <= 5';
		elseif($event == "fires")
			$query = 'select * from (select * from fires order by event_date desc) where rownum <= 5';
		elseif($event == "floods") 
			$query = 'select * from (select * from floods order by event_date desc) where rownum <= 5';
		elseif($event == "tshunamis") 
			$query = 'select * from (select * from tshunamis order by event_date desc) where rownum <= 5';
		elseif($event == "eruptions") 
			$query = 'select * from (select * from eruptions order by event_date desc) where rownum <= 5';
		elseif($event == "avalanches") 
			$query = 'select * from (select * from avalanches order by event_date desc) where rownum <= 5';
			
		$parsed_query = oci_parse($connection, $query); // parsarea selectului
		
		$result = @oci_execute($parsed_query); // executarea selectului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
		else {
			
			while (($row = oci_fetch_array($parsed_query, OCI_ASSOC)) != false) {
				
				// adaugam elementele care vor constitui o linie din tabela
				$body = $doc->getElementById($event . "_tbody");
				$tr = $doc->createElement("tr");
				
				$node = $doc->createElement("th", $row['ID']);
				$tr->appendChild($node);
				
				$node = $doc->createElement("th", $row['EVENT_DATE']);
				$tr->appendChild($node);
				
				if($event == "earthquakes") {
					
					$node = $doc->createElement("th", $row['MAGNITUDE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['SURFACE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['DEPTH']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['CONTINENT']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['COUNTRY']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['LOCATION']);
					$tr->appendChild($node);
				}
				elseif($event == "fires" || $event == "floods") {
					
					$node = $doc->createElement("th", $row['SURFACE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['CONTINENT']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['COUNTRY']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['LOCATION']);
					$tr->appendChild($node);
				}
				elseif($event == "tshunamis") {
					
					$node = $doc->createElement("th", $row['AREA']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['MAGNITUDE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['SURFACE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['LOCATION']);
					$tr->appendChild($node);
				}
				elseif($event == "eruptions") {
					
					$node = $doc->createElement("th", $row['VOLCANO_NAME']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['VOLCANO_TYPE']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['EXPLOSIVITY_INDEX']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['CONTINENT']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['COUNTRY']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['LOCATION']);
					$tr->appendChild($node);
				}
				elseif($event == "avalanches") {
					
					$node = $doc->createElement("th", $row['MOUNTAINS']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['CONTINENT']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['COUNTRY']);
					$tr->appendChild($node);
					
					$node = $doc->createElement("th", $row['LOCATION']);
					$tr->appendChild($node);
				}
				
				$node = $doc->createElement("th");
				$image = $doc->createElement("img");
				$image->setAttribute('src', $row['RISC_GRADE']);
				$image->setAttribute('width', "40%");
				$node->appendChild($image);
				$tr->appendChild($node);
				
				$node = $doc->createElement("th", ($row['SAFE_DATE'] == " ") ? " " : $row['SAFE_DATE']);
				$node->setAttribute('contenteditable', 'true');
				$tr->appendChild($node);
				$node = $doc->createElement("th", ($row['EVACUATED'] == " ") ? " " : $row['EVACUATED']);
				$node->setAttribute('contenteditable', 'true');
				$tr->appendChild($node);
				$node = $doc->createElement("th", ($row['DISAPPEARED'] == " ") ? " " : $row['DISAPPEARED']);
				$node->setAttribute('contenteditable', 'true');
				$tr->appendChild($node);
				$node = $doc->createElement("th", ($row['DEATHS'] == " ") ? " " : $row['DEATHS']);
				$node->setAttribute('contenteditable', 'true');
				$tr->appendChild($node);
				
				$body->appendChild($tr);
			}
			
			oci_free_statement($parsed_query);
			
			// completam statisticile din ultima linie a tabelei
			$query = "";
			if($event == "earthquakes")
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from earthquakes';
			elseif($event == "fires")
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from fires';
			elseif($event == "floods") 
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from floods';
			elseif($event == "tshunamis") 
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from tshunamis';
			elseif($event == "eruptions") 
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from eruptions';
			elseif($event == "avalanches") 
				$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from avalanches';
				
			$parsed_query = oci_parse($connection, $query);
			oci_define_by_name($parsed_query, 'nr', $nr);
			oci_define_by_name($parsed_query, 'nre', $nre);
			oci_define_by_name($parsed_query, 'nrdi', $nrdi);
			oci_define_by_name($parsed_query, 'nrde', $nrde);
			$result = @oci_execute($parsed_query); // executarea selectului
			oci_fetch($parsed_query);
			
			// adaugare informatii in ultima linie a tabelului corespunzator evenimentului
			$body = $doc->getElementById("total_nr_" . $event);
			$node = $doc->createElement("td", $nr);
			$body->appendChild($node);
			
			$body = $doc->getElementById("evacuated_" . $event);
			$node = $doc->createElement("td", $nre);
			$body->appendChild($node);
			
			$body = $doc->getElementById("disappeared_" . $event);
			$node = $doc->createElement("td", $nrdi);
			$body->appendChild($node);
			
			$body = $doc->getElementById("nr_deaths_". $event);
			$node = $doc->createElement("td", $nrde);
			$body->appendChild($node);
			
			oci_free_statement($parsed_query);
		}
	}
?>