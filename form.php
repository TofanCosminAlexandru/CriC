<?php 
    require_once('./back-end/connDB.php');
?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CriC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/main.css" />
 
  <style>
  	body{
  		background: #d6d6c2;
  	}
  </style>
</head>

<body>


 <div class="card">

 	<div class="page-header">
    <h3 style="color:#15a04a;">Identifying information | <a href="person-finder.html" style="color:#15a04a;">
    Back</a></h3>
    </div>

    <h4> I have information about someone </h4>
    <form action="" method="post" enctype = "multipart/form-data" class ="change-picture">
     <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  style="color: green" id="first_name" type="text" class="form-control" name="first_name" placeholder="First name of the person..." required>
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input style="color: green" id="last_name" type="text" class="form-control" name="last_name" placeholder="Last name of the person..." required >
    </div>
    <hr>
    <h4>More information to identify the person</h4>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
      <input id="birth_date" type="text" class="form-control" name="age" placeholder="Age">
    </div>
    <br>
    <div class="form-group">
      <label for="sel1">Sex:</label>
      <select class="form-control" id="sex" name="sex" required>
        <option>female</option>
        <option>male</option>
        <option>other</option>
        
      </select>
    <h4>Contact Information</h4>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      <input id="phone_number" type="text" class="form-control" name="phone_number" placeholder="Phone number">
    </div>
    <h4>Home Address</h4>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
      <input id="street" type="text" class="form-control" name="street" placeholder="Street name">
     </div>
     <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
      <input id="neighborhood" type="text" class="form-control" name="neighborhood" placeholder="Neighborhood">
      </div>
      
      <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
      <input id="city" type="text" class="form-control" name="city" placeholder="City" required>
      </div>
      <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
      <input id="postal" type="text" class="form-control" name="postal" placeholder="Postal or zip code">
      </div>
      <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
      <input id="country" type="text" class="form-control" name="country" placeholder="Home country">
      </div>
    </div>

    <h4>Description</h4>
    <div class="form-group">
    <label for="comment">Describe how to identify this person:</label>
 	 <textarea class="form-control" rows="5" id="description" name="description"></textarea>
	</div>

	<h4>Photo</h4>
  <h5><b>If you have a picture with this person please insert it</b></h5>
	<input type = "file" id = "img" name = "img">
    
    <hr>
    <hr>

    <div class="input-group">
      <span class="input-group-addon">Status</span>
      <input id="status" type="text" class="form-control" name="status" placeholder="A message for this person or others seeking this person..." required>
    </div>

    
    <hr>
    <!--  <input type="submit" name="submit" value="Submit me!" /> -->
     <button type="submit" class="btn btn-success btn-block">Submit</button>
     
 </form>
 </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
    
    if(isset($_POST['first_name']) && isset($_POST['last_name'])){
    $sql = "INSERT INTO PERSON_FINDER(FIRST_NAME,LAST_NAME,AGE,SEX,EMAIL,phone_number,street_name,neighborhood,city,zip_code,home_country,description,status) VALUES (:first_name,:last_name,:age,:sex,:email,:phone_number,:street_name,:neighborhood,:city,:zip_code,:home_country,:description,:status)";
    $q = $conn->prepare($sql);
    $result = $q->execute(
      array( 
          ':first_name'   => $_POST['first_name'],
          ':last_name'    => $_POST['last_name'],
          ':age'          => $_POST['age'],
          ':sex'          => $_POST['sex'],
          ':email'        => $_POST['email'],
          ':phone_number' => $_POST['phone_number'],
          ':street_name'  => $_POST['street'],
          ':neighborhood' => $_POST['neighborhood'],
          ':city'         => $_POST['city'],
          ':zip_code'     => $_POST['postal'],
          ':home_country' => $_POST['country'],
          ':description'  => $_POST['description'],
          ':status'  => $_POST['status']
        )
    );

 
  
  define ('IMGDIR', 'C:\\Apache24\\htdocs\\TW_PROJECT_GIT\\CriC\\images\\'); // numele directorului cu imagini

    // prevenim transferuri periculoase
    if (!isset($_FILES['img']['error']) || is_array($_FILES['img']['error'])) {
      throw new RuntimeException ('Upload: parametri eronati!');
    }
    
    // verificam daca transferul e in regula
    switch ($_FILES['img']['error']) {
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        throw new RuntimeException ('Upload: fisier netrimis!');
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        throw new RuntimeException ('Upload: fisier prea mare!');
      default:
        throw new RuntimeException ('Upload: eroare necunoscuta!');
    }

    // acceptam fisiere de maxim 100 MB
    if ($_FILES['img']['size'] > 1024 * 1024 * 100) {
      throw new RuntimeException ('Upload: fisier prea mare!');
    }
    
    // verificam daca a fost trimisa o imagine pe baza tipurilor MIME
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (FALSE === $ext = array_search ($finfo->file($_FILES['img']['tmp_name']),
      array ('jpg' => 'image/jpeg',
           'png' => 'image/png',
           'gif' => 'image/gif'), true)) {
      throw new RuntimeException ('Upload: format incorect!');
    }
    
    // adaugam noua imagine in directorul cu imagini
    $image_name = basename($_FILES['img']['name']);
    if (!move_uploaded_file ($_FILES['img']['tmp_name'], IMGDIR . $image_name)) {
      throw new RuntimeException ('Upload: eroare la salvare!');
    }

    $max_id = $conn -> query("select max(id) as max from PERSON_FINDER")->fetch()[0];
    $image_name = "images/" . $image_name;
    
    // facem update-ul in baza de date
    $sql = "UPDATE PERSON_FINDER set photo = :picture where id = :max_id";     
    $q = $conn->prepare($sql);
    $result1 = $q->execute(
      array( 
          ':picture'   => $image_name,
          ':max_id'    => $max_id
        )
    );


     if($result && $result1){
     $message = "You insert new account!!! Congratulation!";
      echo "<script type='text/javascript'>alert('$message');</script>";
     }
     else{
        die("Execute query error, because: ". print_r($conn->errorInfo(), true));
     }
 }
    

?>