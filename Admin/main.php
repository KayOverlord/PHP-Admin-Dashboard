<?php 
include 'config.php';
$result='';

if(isset($_POST['submit'])){
  $usertime = date('Y-m-d');
  $first_name = type_input($_POST['name']);
  $last_name = type_input($_POST['surname']);
  $email = type_input($_POST['email']);
  $password = md5(type_input($_POST['password']));
  $mobile = type_input($_POST['phone']);
  $recoverykey = type_input($_POST['recoverykey']);
  $question = type_input($_POST['question']);
  $answer = type_input($_POST['answer']);
  $address = type_input($_POST['address']);

  $sql = "INSERT INTO user_info( first_name, last_name, email,password, mobile, address1,user_time,Recoverykey,question,answer) VALUES ('$first_name','$last_name','$email','$password','$mobile','$address','$usertime','$recoverykey','$question','$answer')";

   if(mysqli_query($conn,$sql)){
     $result="YOUR ACCOUNT HAS BEEN CREATED";
   }else{
     echo("somthing bad");
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


  </head>
  <body class="bg-dark">
    <ul class="nav nav-tabs nav-stacked bg-light">
      <li class="nav-item">
          <a href="#" onclick="switchFunction()" class="nav-link active">|ADD/UPDATE user|</a>
      </li>
      <li class="nav-item">
        <a href="product.php" class="nav-link">|ADD/UPDATE products|</a>
      </li>
      <li class="nav-item">
        <a href="Services.php"  class="nav-link">|UPDATE services|</a>
      </li>
      <li class="nav-item">
        <a href="Towing.php" class="nav-link">|UPDATE towing|</a>
      </li>
      <li class="nav-item disabled">
        <a href="orders.php" class="nav-link">|UPDATE orders|</a>
      </li>
      <li class="nav-item ">
        <a href="Cart.php" class="nav-link">|UPDATE cart|</a>
      </li>
      <li class="nav-item ">
        <a href="FeedBack.php" class="nav-link">|UPDATE feedback|</a>
      </li>
      <li class="nav-item">
        <a href="Payment.php"class="nav-link">|UPDATE payment|</a>
      </li>
      <li class="nav-item">
        <a href="Reports.php" class="nav-link"><img src="./upload/33-dashboard-chart-report-annual-512.png" width="30" height="30"/></a>
      </li>
	  <li class="nav-item">
        <a href="../index.php" class="nav-link">|log out|</a>
      </li>
    
    </ul>

  <div class="container">
  <div class="row" id="addUserTable">

  <div class="col-lg bg-light rounded mt-2 text-dark">
  <h3 class="text-center p-2">ADD USER</h3>

<form action="" method="POST">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control"  aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="phone">Surname</label>
    <input type="text" name="surname" class="form-control"  aria-describedby="helpId" required>
  </div>


   <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" aria-describedby="helpId"  required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control"  aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="password">Recoverykey</label>
    <input type="password" name="recoverykey" class="form-control"  aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="password">Question</label>
    <input type="question" name="question" class="form-control"  aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="answer">answer</label>
    <input type="text" name="answer" class="form-control"  aria-describedby="helpId">
  </div>
 
   <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" name="phone" class="form-control" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control"  aria-describedby="helpId" required>
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
<div id="infoTable" style="display:none"}><?php include 'view.php' ?></div>
  




  <script>
    function switchFunction() {
    var x = document.getElementById("infoTable");
    var y = document.getElementById("addUserTable")
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
    <script src="./js/bootstrap.bundle.min.js" ></script>
  </body>
  
</html>