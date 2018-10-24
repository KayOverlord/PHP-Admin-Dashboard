<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM cart WHERE id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $productid =$_POST['pid'];
     $userid =$_POST['userid'];
     $quantity =$_POST['qty'];

   

     $sql="UPDATE orders SET p_id='$productid',user_id='$userid',qty=' $quantity' WHERE id='$id'";
     
 if(mysqli_query($conn,$sql)){
    header("location:Cart.php");
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
             <label for="userid">User ID</label>
             <input type="number" name="userid" id="" class="form-control" value="<?=$row['user_id'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="pid">Product ID</label>
             <input type="number" name="pid" id="" class="form-control" value="<?=$row['p_id'] ?>">
          
           </div>

           <div class="form-group">
             <label for="qty">Quantity</label>
             <input type="number" name="qty" id="" class="form-control" value="<?=$row['qty'] ?>" >
         
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