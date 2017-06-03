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
	
	$event = $_REQUEST["type_disaster_for_update"];
	$event_ID = $_REQUEST["type_safe_event_id"];
	$safe_date = $_REQUEST["type_safe_date"];
	$safe_date = ($safe_date == null) ? null : explode('T', $safe_date);
	$safe_date = ($safe_date == null) ? null : $safe_date[0] . ' ' . $safe_date[1];
	$evacuated = $_REQUEST["type_evacuated"];
	$disappeared = $_REQUEST["type_disappeared"];
	$deaths = $_REQUEST["type_deaths"];
	
	if($safe_date != null){
		// updatare safe_date in baza de date
		if($event == "Cutremur") {
			$query = 'update earthquakes set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		elseif($event == "Incendiu") {
			$query = 'update fires set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		elseif($event == "Inundatie") {
			$query = 'update floods set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		elseif($event == "Tshunami") {
			$query = 'update tsunamis set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		elseif($event == "Eruptie vulcanica") {
			$query = 'update eruptions set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		elseif($event == "Avalansa") {
			$$query = 'update avalanches set safe_date = to_date(:safe_date, \'yyyy-mm-dd hh24:mi\') where id = :id';
		}
		
		$parsed_query = oci_parse($connection, $query);
		oci_bind_by_name($parsed_query, ":id", $event_ID);
		oci_bind_by_name($parsed_query, ":safe_date", $safe_date);
		$result = @oci_execute($parsed_query); // executarea update-ului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
	}
	if($evacuated != null){
		// updatare evacuated in baza de date
		if($event == "Cutremur") {
			$query = 'update earthquakes set evacuated = :evacuated where id = :id';
		}
		elseif($event == "Incendiu") {
			$query = 'update fires set evacuated = :evacuated where id = :id';
		}
		elseif($event == "Inundatie") {
			$query = 'update floods set evacuated = :evacuated where id = :id';
		}
		elseif($event == "Tshunami") {
			$query = 'update tsunamis set evacuated = :evacuated where id = :id';
		}
		elseif($event == "Eruptie vulcanica") {
			$query = 'update eruptions set evacuated = :evacuated where id = :id';
		}
		elseif($event == "Avalansa") {
			$$query = 'update avalanches set evacuated = :evacuated where id = :id';
		}
		
		$parsed_query = oci_parse($connection, $query);
		oci_bind_by_name($parsed_query, ":id", $event_ID);
		oci_bind_by_name($parsed_query, ":evacuated", $evacuated);
		$result = @oci_execute($parsed_query); // executarea update-ului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
	}
	if($disappeared != null){
		// updatare disappeared in baza de date
		if($event == "Cutremur") {
			$query = 'update earthquakes set disappeared = :disappeared where id = :id';
		}
		elseif($event == "Incendiu") {
			$query = 'update fires set disappeared = :disappeared where id = :id';
		}
		elseif($event == "Inundatie") {
			$query = 'update floods set disappeared = :disappeared where id = :id';
		}
		elseif($event == "Tshunami") {
			$query = 'update tsunamis set disappeared = :disappeared where id = :id';
		}
		elseif($event == "Eruptie vulcanica") {
			$query = 'update eruptions set disappeared = :disappeared where id = :id';
		}
		elseif($event == "Avalansa") {
			$$query = 'update avalanches set disappeared = :disappeared where id = :id';
		}
		
		$parsed_query = oci_parse($connection, $query);
		oci_bind_by_name($parsed_query, ":id", $event_ID);
		oci_bind_by_name($parsed_query, ":disappeared", $disappeared);
		$result = @oci_execute($parsed_query); // executarea update-ului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
	}
	if($deaths != null){
		// updatare deaths in baza de date
		if($event == "Cutremur") {
			$query = 'update earthquakes set deaths = :deaths where id = :id';
		}
		elseif($event == "Incendiu") {
			$query = 'update fires set deaths = :deaths where id = :id';
		}
		elseif($event == "Inundatie") {
			$query = 'update floods set deaths = :deaths where id = :id';
		}
		elseif($event == "Tshunami") {
			$query = 'update tsunamis set deaths = :deaths where id = :id';
		}
		elseif($event == "Eruptie vulcanica") {
			$query = 'update eruptions set deaths = :deaths where id = :id';
		}
		elseif($event == "Avalansa") {
			$$query = 'update avalanches set deaths = :deaths where id = :id';
		}
		
		$parsed_query = oci_parse($connection, $query);
		oci_bind_by_name($parsed_query, ":id", $event_ID);
		oci_bind_by_name($parsed_query, ":deaths", $deaths);
		$result = @oci_execute($parsed_query); // executarea update-ului
		
		if (!$result) { // in caz de a aparut exceptie
			$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
			echo 'Error ';
			$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
			echo $list[1];
		}
	}
	
	// reafisare informatii cele mai recente
	if($event == "Cutremur") {
		$query = 'select * from (select * from earthquakes order by event_date desc) where rownum <= 5';
	}
	elseif($event == "Incendiu") {
		$query = 'select * from (select * from fires order by event_date desc) where rownum <= 5';
	}
	elseif($event == "Inundatie") {
		$query = 'select * from (select * from floods order by event_date desc) where rownum <= 5';
	}
	elseif($event == "Tshunami") {
		$query = 'select * from (select * from tshunamis order by event_date desc) where rownum <= 5';
	}
	elseif($event == "Eruptie vulcanica") {
		$query = 'select * from (select * from eruptions order by event_date desc) where rownum <= 5';
	}
	elseif($event == "Avalansa") {
		$$query = 'select * from (select * from avalanches order by event_date desc) where rownum <= 5';
	}
	$parsed_query = oci_parse($connection, $query);
	
	$result = @oci_execute($parsed_query); // executarea selectului
	
	if (!$result) { // in caz de a aparut exceptie
		$exception = oci_error($parsed_query); // preluam intregul text de eroare din baza de date
		echo 'Error ';
		$list = explode("ORA", $exception['message']); // ne intereseaza doar codul si mesajul de eroare
		echo $list[1];
	}
		
	libxml_use_internal_errors(true);
	$doc = new DOMDocument('1.0', 'utf-8'); // cream documentul DOM corespunzator fisierului HTML
	$doc->validateOnParse = true;
	$doc->loadHTMLFile('fushion-tables_on.php');
	
	while (($row = oci_fetch_array($parsed_query, OCI_ASSOC)) != false) {
		
		// adaugam elementele care vor constitui o linie din tabela
		$body = $doc->getElementById("earthquakes_tbody");
		$tr = $doc->createElement("tr");
		
		$node = $doc->createElement("th", $row['ID']);
		$tr->appendChild($node);
		
		$node = $doc->createElement("th", $row['EVENT_DATE']);
		$tr->appendChild($node);
		
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
	if($event == "Cutremur") {
		$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from earthquakes';
	}
	elseif($event == "Incendiu") {
		$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from fires';
	}
	elseif($event == "Inundatie") {
		$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from floods';
	}
	elseif($event == "Tshunami") {
		$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from tshunamis';
	}
	elseif($event == "Eruptie vulcanica") {
		$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from eruptions';
	}
	elseif($event == "Avalansa") {
		$$query = 'select count(*) as "nr", sum(evacuated) as "nre", sum(disappeared) as "nrdi", sum(deaths) as "nrde" from avalanches';
	}
	$parsed_query = oci_parse($connection, $query);
	oci_define_by_name($parsed_query, 'nr', $nr);
	oci_define_by_name($parsed_query, 'nre', $nre);
	oci_define_by_name($parsed_query, 'nrdi', $nrdi);
	oci_define_by_name($parsed_query, 'nrde', $nrde);
	$result = @oci_execute($parsed_query); // executarea selectului
	oci_fetch($parsed_query);
	
	$body = $doc->getElementById("total_nr_earthquakes");
	$node = $doc->createElement("td", $nr);
	$body->appendChild($node);
	
	$body = $doc->getElementById("evacuated_earthquakes");
	$node = $doc->createElement("td", $nre);
	$body->appendChild($node);
	
	$body = $doc->getElementById("disappeared_earthquakes");
	$node = $doc->createElement("td", $nrdi);
	$body->appendChild($node);
	
	$body = $doc->getElementById("nr_deaths_earthquakes");
	$node = $doc->createElement("td", $nrde);
	$body->appendChild($node);
	
	oci_free_statement($parsed_query);
	
	echo $doc->saveHTML(); // salvam modificarea
	
	// inchiderea conexiunii
	oci_close($connection);
?>