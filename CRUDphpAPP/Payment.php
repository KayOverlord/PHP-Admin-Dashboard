<?php 
include 'config.php';
$result='';

if(isset($_POST['submit'])){
  $userid = type_input($_POST['Userid']);
  $amount = type_input($_POST['amount']);
  $fullname = type_input($_POST['fullname']);
  $email = type_input($_POST['email']);
  $address = type_input($_POST['address']);
  $namecard = type_input($_POST['namecard']);
  $numbercard = type_input($_POST['numbercard']);
  $expmonth = type_input($_POST['expmonth']);
  $cvv = type_input($_POST['cvv']);


  $sql = "INSERT INTO payment(User_id,Amount,Full_name,Email,Address,Name_on_Card,Card_Number,Exp_Month,CVV) VALUES(' $userid','$amount','$fullname','$email','$address','$namecard','$numbercard','$expmonth','$cvv')";
  
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
          <a href="main.php"  class="nav-link">|ADD/UPDATE user|</a>
      </li>
      <li class="nav-item">
        <a href="product.php" class="nav-link">|ADD/UPDATE products|</a>
      </li>
      <li class="nav-item disabled">
        <a href="orders.php" class="nav-link">|ADD/UPDATE orders|</a>
      </li>
      <li class="nav-item ">
        <a href="Cart.php"  class="nav-link ">|ADD/UPDATE cart|</a>
      </li>
      <li class="nav-item">
        <a href="FeedBack.php" class="nav-link">|ADD/UPDATE feedback|</a>
      </li>
      <li class="nav-item">
        <a href="#" onclick="switchFunction()"  class="nav-link active">|ADD/UPDATE payment|</a>
      </li>
    </ul>

  <div class="container">
  <div class="row" id="addproTable">

  <div class="col bg-light rounded mt-2  text-dark">
  <h3 class="text-center p-2">ADD Payment</h3>

<form action="" method="POST"  enctype="multipart/form-data">

  <div class="form-group">
    <label for="userid">User ID</label>
    <input type="text" name="Userid" class="form-control" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="amount">Amount</label>
    <input type="text" name="amount" class="form-control"  aria-describedby="helpId" required>
  </div>


   <div class="form-group">
    <label for="fullname">Full Name</label>
    <input type="text" name="fullname" class="form-control" placeholder="" aria-describedby="helpId"  required>
  </div>

  
  <div class="form-group">
    <label for="subject">Email</label>
    <input type="email" name="email" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
 

   <div class="form-group">
    <label for="ProductDescription">Address</label>
    <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="ProductDescription">Name of Card</label>
    <input type="text" name="namecard" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  
  <div class="form-group">
    <label for="ProductDescription">Card Number</label>
    <input type="text" name="numbercard" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="ProductDescription">Expiration Month</label>
    <input type="date" name="expmonth" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>
  <div class="form-group">
    <label for="ProductDescription">CVV</label>
    <input type="text" name="cvv" class="form-control" placeholder="" aria-describedby="helpId" required>
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
  <div id="infoTable" style="display:none"}><?php include 'PaymentUp.php' ?></div>
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