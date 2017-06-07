<?php 
    require_once('./back-end/connDB.php');
    
    if(!empty($_REQUEST['search'])){
    $search = strtolower($_REQUEST['search']);
    $sql = "SELECT id,first_name,last_name,status,photo from person_finder where lower(first_name) like '%$search%' or lower(last_name) like '%$search%' ";

    $q = $conn->prepare($sql);
    $q->execute();

 
    $q->bindColumn(1, $id);
    $q->bindColumn(2, $first_name);
    $q->bindColumn(3, $last_name);
    $q->bindColumn(4, $status); 
    $q->bindColumn(5, $photo); 
    }
?>

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

    input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}

  </style>
</head>

<body>


 <div class="card">

    <div class="page-header">
    <h3 style="color:#4285f4;">I'm looking for someone </h3>
    </div>

    <h4>Please insert last name:</h4>
    <form action="">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input type="text" name="search" id="search" placeholder="Search..">
    </div>
    </form>

    <br>
    <br>

    <div class="btn-group btn-group-justified">
    <a href="person-finder_on.php" class="btn btn-primary">Back</a>
    <a href="form_on.php" class="btn btn-primary">Create a new record</a> 
    </div>

 </div>
 <br>
 <div class="card">
    <?php $nr=1; ?>
    <?php 
    if(!empty($_REQUEST['search']))
    while($row = $q->fetch()): ?>
        <div class="list-group">
        <a href="person_on.php?id=<?php echo $row[0]; ?>&search=<?php echo $_REQUEST['search'] ?>" class="list-group-item active">
        <table style="width:100%">
        <tr>
        <td>
          <img src="<?php echo $row[4]?>" width="70" height="70">
        </td>
        <td>
        <h4 class="list-group-item-heading"><?php echo $row[1].' '.$row[2]; ?></h4>
        <p class="list-group-item-text"><?php  echo $row[3]; ?></p>
        </td>
        <td>
          <h4><?php echo $nr ?> </h4>
          <?php $nr++; ?>
        </td>
        </tr>
        </table>
    </a>
    </div>
    <?php endwhile; 
      if($nr == 1 && !empty($_REQUEST['search']))
        echo '<h4>No results found for: " '.$_REQUEST['search'].' "  :( </h4>';
    ?>



 </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>




