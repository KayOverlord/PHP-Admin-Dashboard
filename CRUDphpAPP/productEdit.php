<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $productcat =$_POST['productcat'];
     $productbrand =$_POST['productbrand'];
     $producttitle =$_POST['producttitle'];
     $productprice =$_POST['productprice'];
     $productdesc =$_POST['productdesc'];
     $productkeywords =$_POST['productkeywords'];
     $productimage =basename($_FILES['file']['name']);


     $targetFolder = "upload/";
   
     move_uploaded_file($_FILES['file']['tmp_name'],$targetFolder.$productimage);

     $sql="UPDATE products SET product_cat='$productcat',product_brand='$productbrand',product_title='$producttitle',product_price='$productprice',product_desc='$productdesc',product_image='$productimage',product_keywords='$productkeywords' WHERE product_id='$id'";
     
 if(mysqli_query($conn,$sql)){
    header("location:product.php");
}
 }




?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">
<div class="container">
   <div class="row">

       <div class="col-lg-10 bg-light text-dark text-center mt-4 offset-1 rounded">

       <form method="POST" enctype="multipart/form-data" action="">

           <div class="form-group">
             <label for="productcat">Category</label>
             <input type="number" min="1" max="4" name="productcat" class="form-control" value="<?=$row['product_cat'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="productbrand">Brand Number</label>
             <input type="number" min="1" max="4" name="productbrand" id="" class="form-control" value="<?=$row['product_brand'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="producttitle">Product Title</label>
             <input type="text" name="producttitle" id="" class="form-control" value="<?=$row['product_title'] ?>">
          
           </div>

           <div class="form-group">
             <label for="productprice">Price</label>
             <input type="text" name="productprice" id="" class="form-control" value="<?=$row['product_price'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="productdesc">Product Description</label>
             <input type="text" name="productdesc" id="" class="form-control" value="<?=$row['product_desc'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="productkeywords">Key Words</label>
             <input type="text" name="productkeywords" id="" class="form-control" value="<?=$row['product_keywords'] ?>" >
         
           </div>

           <div class="form-group">
           <img src='./upload/<?=$row['product_image']?>'width=100 height=100/>
             <label >Update Image</label>
             <input type="file" name="file">
         
           </div>

           <div class="form-group">
           <input type="submit" name="submit" id="" class="btn btn-primary w-100" value="Update" >
           </div>
           


       </form>

       </div>

   </div>
</div>
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
</html>