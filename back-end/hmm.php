<?php
	require_once('connDB.php');

	$sql = "SELECT cric_code from cric_code";
	$q = $conn->prepare($sql);
    $q->execute();

    $q->bindcolumn(1,$cric_code);
    
    while($row = $q->fetch()){
    	echo $row[0];
    }



?>