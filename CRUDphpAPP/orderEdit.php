<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM orders WHERE order_id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $orderid =$_POST['orderid'];
     $userid =$_POST['userid'];
     $productid =$_POST['productid'];
     $quantity =$_POST['qty'];
     $trx =$_POST['trxid'];
     $status =$_POST['status'];
   

     $sql="UPDATE orders SET order_id='$orderid',user_id='$userid',product_id='$productid',qty=' $quantity',trx_id='$trx',p_status=' $status' WHERE order_id='$id'";
     
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
             <label for="orderid">Order ID</label>
             <input type="number" name="orderid" class="form-control" value="<?=$row['order_id'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="userid">User ID</label>
             <input type="number" name="userid" id="" class="form-control" value="<?=$row['user_id'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="productid">Product ID</label>
             <input type="text" name="productid" id="" class="form-control" value="<?=$row['product_id'] ?>">
          
           </div>

           <div class="form-group">
             <label for="qty">Quantity</label>
             <input type="text" name="qty" id="" class="form-control" value="<?=$row['qty'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="trxid">Trx ID</label>
             <input type="text" name="trxid" id="" class="form-control" value="<?=$row['trx_id'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="status">Status</label>
             <input type="text" name="status" id="" class="form-control" value="<?=$row['p_status'] ?>" >
         
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