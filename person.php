<?php 
    require_once('./back-end/connDB.php');
    

    $id = $_REQUEST['id'];
    $sql = "SELECT id,first_name,last_name,age,sex,email,phone_number,street_name,neighborhood,city,zip_code,
    home_country,DBMS_LOB.substr(description,2000) from person_finder where id=$id";

    $q = $conn->prepare($sql);
    $q->execute();

 
    $q->bindColumn(1, $id);
    $q->bindColumn(2, $first_name);
    $q->bindColumn(3, $last_name);
    $q->bindColumn(4, $age);
    $q->bindColumn(5, $sex);
    $q->bindColumn(6, $email);
    $q->bindColumn(7, $phone_number);
    $q->bindColumn(8, $street_name);
    $q->bindColumn(9, $neighborhood);
    $q->bindColumn(10, $city);
    $q->bindColumn(11, $zip_code);
    $q->bindColumn(12, $home_country);
    $q->bindColumn(13, $description);
    


?>


<!DOCTYPE html>
<html>
<title>CriC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>


<div class="header-back" style="width: 100%; background: #616161; height: 70px; ">
	<a href="search.php?search=<?php echo $_REQUEST['search'];?>"><img src="images/back_arrow.png" width="54" height="54" style="padding: 6px;"></a>
</div>

<div class="w3-container">
  
  <br><br><br>
  <div class="w3-card-4" style="width:60%">
  	<?php while($row = $q->fetch()): ?>
    <header class="w3-container w3-light-grey">
      <h3><?php echo $row[1].' '.$row[2]; ?></h3>
    </header>
    <div class="w3-container">
      <p>Source of this record:</p>
      <hr>
      <!-- <img src="img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
      <ul>
      	<li>Age: <?php echo $row[3]; ?></li>
      	<li>Sex: <?php echo $row[4]; ?></li>
      	<li>Email: <?php echo $row[5]; ?></li>
      	<li>Phone number: <?php echo $row[6]; ?></li>
      	<li>Street name: <?php echo $row[7]; ?></li>
      	<li>Neighborhood: <?php echo $row[8]; ?></li>
      	<li>City: <?php echo $row[9]; ?></li>
      	<li>Zip code: <?php echo $row[10]; ?></li>
      	<li>Home country: <?php echo $row[11]; ?></li>
      	<li>Description(how to identify this person): <?php echo $row[12]; ?></li>
      </ul>
      <br>
    </div>
    <button class="w3-button w3-block w3-dark-grey">A possible location for this person</button>
    <?php endwhile; ?>
  
  </div>
</div>
	

</body>
</html>









