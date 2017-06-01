<?php
	$dbtype	= 'oracle';	
	$dbhost	= 'localhost';
	$dbuser	= 'FACULTATE';
	$dbpass	= 'STUDENT';
	$dbpath = ''; //this is for sqlite;

	switch($dbtype){
		case 'oracle':
			$dbconn = "oci:dbname=//localhost:1521/xe";
			break;
	}
	
	try{
		$conn = new PDO($dbconn, $dbuser, $dbpass);
		
	}
	catch(PDOException  $pe){
		 die('Error connecting to database: ' . $pe->getMessage());
	}
?>