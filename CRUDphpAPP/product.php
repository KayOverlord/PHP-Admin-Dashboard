<?php 
include 'config.php';
$result='';

if(isset($_POST['submit'])){

  $productcat = type_input($_POST['productcat']);
  $ProductBrand = type_input($_POST['ProductBrand']);
  $ProductTitle = type_input($_POST['ProductTitle']);
  $ProductPrice = type_input($_POST['ProductPrice']);
  $ProductDescription = type_input($_POST['ProductDescription']);
  $ProductImage = basename($_FILES['file']['name']);
  $Productkeywords  = type_input($_POST['Productkeywords']);

 
  $targetFolder = "upload/";


 
   
  move_uploaded_file($_FILES['file']['tmp_name'],$targetFolder.$ProductImage);


  $sql = "INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES (' $productcat','$ProductBrand','$ProductTitle ','$ProductPrice','$ProductDescription','$ProductImage',' $Productkeywords')";
  
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
        <a href="#"  onclick="switchFunction()"  class="nav-link active">|ADD/UPDATE products|</a>
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
        <a href="Payment.php"class="nav-link">|ADD/UPDATE payment|</a>
      </li>
    </ul>

  <div class="container">
  <div class="row" id="addproTable">

  <div class="col bg-light rounded mt-2  text-dark">
  <h3 class="text-center p-2">ADD PRODUCT</h3>

<form action="" method="POST"  enctype="multipart/form-data">

  <div class="form-group">
    <label for="productcat">Product Cat</label>
    <input type="number" min="1" max="4" name="productcat" class="form-control" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="ProductBrand">Product Brand</label>
    <input type="number" min="1" max="4" name="ProductBrand" class="form-control"  aria-describedby="helpId" required>
  </div>


   <div class="form-group">
    <label for="ProductTitle">Product Title</label>
    <input type="text" name="ProductTitle" class="form-control" placeholder="" aria-describedby="helpId"  required>
  </div>

  
  <div class="form-group">
    <label for="ProductPrice">Product Price</label>
    <input type="text" name="ProductPrice" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
 

   <div class="form-group">
    <label for="ProductDescription">Product Description</label>
    <input type="tel" name="ProductDescription" class="form-control" placeholder="" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="Productkeywords">Product keywords</label>
    <input type="text" name="Productkeywords" class="form-control"  aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="ProductImage">Product Image</label>
    <input type="file" name="file" required>
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
  <div id="infoTable" style="display:none"}><?php include 'productUp.php' ?></div>
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