<?php
	$dbtype	= 'oracle';	
	$dbhost	= 'localhost';
<<<<<<< HEAD
	$dbuser	= 'FACULTATE';
	$dbpass	= 'STUDENT';
=======
	$dbuser	= 'student_project';
	$dbpass	= 'STUDENT_PROJECT';
>>>>>>> 55aabcba37d4b9f10cc65f40bbc60d1869e602c2
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