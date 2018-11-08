<?php 
include 'config.php';
$result='';

if(isset($_POST['submit'])){

  $userid = type_input($_POST['userid']);
  $Productid = type_input($_POST['Productid']);
  $qty = type_input($_POST['qty']);
  $trxid = type_input($_POST['trxid']);
  $status = type_input($_POST['status']);




  $sql = "INSERT INTO orders(user_id,product_id,qty,trx_id,p_status) VALUES (' $userid','$Productid','  $qty ','$trxid ',' $status')";
  
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
    <title>Title</title>
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
      <li class="nav-item">
        <a href="Services.php"  class="nav-link">|UPDATE services|</a>
      </li>
      <li class="nav-item">
        <a href="Towing.php" class="nav-link">|UPDATE towing|</a>
      </li>
      <li class="nav-item ">
        <a href="#" class="nav-link active">|UPDATE orders|</a>
      </li>
      <li class="nav-item ">
        <a href="Cart.php"  class="nav-link ">|UPDATE cart|</a>
      </li>
		<li class="nav-item">
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
  <div id="infoTable" }><?php include 'ordersUp.php' ?></div>
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