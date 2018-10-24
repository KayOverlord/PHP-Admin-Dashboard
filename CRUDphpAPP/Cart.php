<?php 
include 'config.php';
$result='';

if(isset($_POST['submit'])){

  $pid = type_input($_POST['pid']);
  $userid = type_input($_POST['userid']);
  $qty = type_input($_POST['qty']);





  $sql = "INSERT INTO cart(p_id,user_id,qty,) VALUES (' $pid','$userid','  $qty ')";
  
   if(mysqli_query($conn,$sql)){
     $result="YOUR Product HAS BEEN CREATED";
   }else{
     echo("somthing went wrong");
   };
}

function type_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);

  return $data;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Motoserve</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">
    <ul class="nav nav-tabs nav-stacked bg-light">
      <li class="nav-item">
          <a href="index.php"  class="nav-link">|ADD/UPDATE user|</a>
      </li>
      <li class="nav-item">
        <a href="product.php" class="nav-link">|ADD/UPDATE products|</a>
      </li>

      <li class="nav-item ">
        <a href="orders.php" class="nav-link ">|ADD/UPDATE orders|</a>
      </li>
     
      <li class="nav-item ">
        <a href="#"  onclick="switchFunction()" class="nav-link active">|ADD/UPDATE cart|</a>
      </li>
      <li class="nav-item">
        <a href="FeedBack.php" class="nav-link">|ADD/UPDATE feedback|</a>
      </li>
      <li class="nav-item">
        <a href="Payment.php"class="nav-link">|ADD/UPDATE payment|</a>
      </li>
    </ul>

  <div class="container">
  <div class="row" id="addproTable">

  <div class="col bg-light rounded mt-2  text-dark">
  <h3 class="text-center p-2">ADD Cart</h3>

<form action="" method="POST"  enctype="multipart/form-data">

  <div class="form-group">
    <label for="pid">Product id</label>
    <input type="number"  name="pid" class="form-control" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="userid">User id</label>
    <input type="number" name="userid" class="form-control"  aria-describedby="helpId" required>
  </div>


   <div class="form-group">
    <label for="qty">Quantity</label>
    <input type="number" name="qty" class="form-control" placeholder="" aria-describedby="helpId"  required>
  </div>


  <div class="form-group">
 <input name="submit"  class="btn btn-primary" type="submit" value="Insert">
  </div>

  <div class="form-group text-center">
 <h1><?= $result; ?></h1>
  </div>

</form>
  </div>
  </div>
  <div id="infoTable" style="display:none"}><?php include 'CartUp.php' ?></div>
  </div>
 
  <script>
    function switchFunction() {
    var x = document.getElementById("infoTable");
    var y = document.getElementById("addproTable")
    if (x.style.display === "none") {
        y.style.display = "none"
        x.style.display = "block";
    } else {
        y.style.display = "block"
        x.style.display = "none";
    }
}
  </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
  
</html>