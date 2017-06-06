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

	if(!$connection) {
		echo 'Conectare nereusita!';
	}
	
	libxml_use_internal_errors(true);
	$doc = new DOMDocument('1.0', 'utf-8'); // cream documentul DOM corespunzator fisierului HTML
	$doc->validateOnParse = true;
	$doc->loadHTMLFile('transmit-alerts.php');

	display_recent_events("earthquakes", $connection, $doc);
	display_recent_events("fires", $connection, $doc);
	display_recent_events("floods", $connection, $doc);
	display_recent_events("tshunamis", $connection, $doc);
	display_recent_events("eruptions", $connection, $doc);
	display_recent_events("avalanches", $connection, $doc);
	
	echo $doc->saveHTML(); // salvam modificarea
	
	// inchiderea conexiunii
	oci_close($connection);
	
	// functie care umple tabelele cu informatiile cele mai recente
	function display_recent_events($event, $connection, $doc) {
	
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

			
			oci_free_statement($parsed_query);
		}
	}
?>