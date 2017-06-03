<?php
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


  //Oracle DB user name
  $username = 'projectTW';

  // Oracle DB user password
  $password = 'PROJECTTW';

  // Oracle DB connection string
  $connection_string = 'localhost/xe';



  //Connect to an Oracle database
  $conn = oci_connect( $username, $password,  $connection_string  );

  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM AVALANCHES ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("CONTINENT", $row['CONTINENT']);
    $newnode->setAttribute("COUNTRY", $row['COUNTRY']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("MOUNTAINS", $row['MOUNTAINS']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }

  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM EARTHQUAKES ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("MAGNITUDE", $row['MAGNITUDE']);
    $newnode->setAttribute("SURFACE", $row['SURFACE']);
    $newnode->setAttribute("DEPTH", $row['DEPTH']);
    $newnode->setAttribute("CONTINENT", $row['CONTINENT']);
    $newnode->setAttribute("COUNTRY", $row['COUNTRY']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }

  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM ERUPTIONS ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("VOLCANO_NAME", $row['VOLCANO_NAME']);
    $newnode->setAttribute("VOLCANO_TYPE", $row['VOLCANO_TYPE']);
    $newnode->setAttribute("EXPLOSIVITY_INDEX", $row['EXPLOSIVITY_INDEX']);
    $newnode->setAttribute("CONTINENT", $row['CONTINENT']);
    $newnode->setAttribute("COUNTRY", $row['COUNTRY']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }
  
  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM fires ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("SURFACE", $row['SURFACE']);
    $newnode->setAttribute("CONTINENT", $row['CONTINENT']);
    $newnode->setAttribute("COUNTRY", $row['COUNTRY']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }

  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM FLOODS ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("SURFACE", $row['SURFACE']);
    $newnode->setAttribute("CONTINENT", $row['CONTINENT']);
    $newnode->setAttribute("COUNTRY", $row['COUNTRY']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }

  $stid = oci_parse($conn, 'SELECT * FROM ( SELECT * FROM TSHUNAMIS ) WHERE ROWNUM <= 5');
  oci_execute($stid);

  header("Content-type: text/xml");
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("ID",$row['ID']);
    $newnode->setAttribute("USER_CRIC_CODE",$row['USER_CRIC_CODE']);
    $newnode->setAttribute("EVENT_DATE", $row['EVENT_DATE']);
    $newnode->setAttribute("AREA", $row['AREA']);
    $newnode->setAttribute("MAGNITUDE", $row['MAGNITUDE']);
    $newnode->setAttribute("SURFACE", $row['SURFACE']);
    $newnode->setAttribute("LOCATION", $row['LOCATION']);
    $newnode->setAttribute("RISC_GRADE", $row['RISC_GRADE']);
    $newnode->setAttribute("SAFE_DATE", $row['SAFE_DATE']);
    $newnode->setAttribute("EVACUATED", $row['EVACUATED']);
    $newnode->setAttribute("DISAPPEARED", $row['DISAPPEARED']);
    $newnode->setAttribute("DEATHS", $row['DEATHS']);
    $newnode->setAttribute("EVENTTYPE", $row['EVENTTYPE']);
  }

  echo $dom->saveXML();
  oci_close($conn);
?>




