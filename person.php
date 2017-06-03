<?php 
    require_once('./back-end/connDB.php');
    

    $id = $_REQUEST['id'];
    $sql = "SELECT id,first_name,last_name,age,sex,email,phone_number,street_name,neighborhood,city,zip_code,
    home_country,DBMS_LOB.substr(description,2000),photo from person_finder where id=$id";

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
    $q->bindColumn(14, $photo);
    


?>


<!DOCTYPE html>
<html>
<title>CriC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<body>


<div class="header-back" style="width: 100%; background: #616161; height: 70px; ">
	<a href="search.php?search=<?php echo $_REQUEST['search'];?>"><img src="images/back_arrow.png" width="54" height="54" style="padding: 6px;"></a>
</div>

<div class="w3-container">
  
  <br><br>
  <div class="w3-card-4" style="width:60%">
  	<?php while($row = $q->fetch()): ?>
    <header class="w3-container w3-light-grey">
      <h3><?php echo $row[1].' '.$row[2]; ?></h3>
    </header>
    <div class="w3-container">
      <br>
      <p>Source of this record:</p>
      <hr>
      
      <table style="width: 100%">
      <tr>
      <td>
      <ul>
      	<li><b>Age</b>: <?php echo $row[3]; ?></li>
      	<li><b>Sex</b>: <?php echo $row[4]; ?></li>
      	<li><b>Email</b>: <?php echo $row[5]; ?></li>
      	<li><b>Phone number</b>: <?php echo $row[6]; ?></li>
      	<li><b>Street name</b>: <?php echo $row[7]; ?></li>
      	<li><b>Neighborhood</b>: <?php echo $row[8]; ?></li>
      	<li><b>City</b>: <?php echo $row[9]; ?></li>
      	<li><b>Zip code</b>: <?php echo $row[10]; ?></li>
      	<li><b>Home country</b>: <?php echo $row[11]; ?></li>
        <hr>
      	<li><b>Description(how to identify this person)</b>: <?php echo $row[12]; ?></li>
      </ul>
      </td>
      <td>
          <img src="<?php echo $row[13]; ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:300px">
      </td>
      </tr>
      </table>
      <br>
    </div>
   
     <?php endwhile; ?>
     <button type="button" class="w3-button w3-block w3-dark-grey" data-toggle="modal" data-target="#myModal">A possible location for this person</button>
  
  </div>
</div>

 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Location</h4>
        </div>
        <div class="modal-body">
          <p>Aici va fi o harta :))</p>
        </div>
        <div class="modal-footer">
          <button style="background: #616161;" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

