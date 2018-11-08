<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM payment WHERE PaymentID='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $userid =$_POST['userid'];
     $amount =$_POST['amount'];
     $fullname =$_POST['fullname'];
     $email =$_POST['email'];
     $address =$_POST['address'];

     $sql="UPDATE payment SET User_id='$userid',Amount='$amount',Full_name='$fullname',Email='$email',Address='$address' WHERE PaymentID='$id'";
     
 if(mysqli_query($conn,$sql)){
    header("location:Payment.php");
}
 }




?>

<!doctype html>
<html lang="en">
  <head>
    <title>Motoserve</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">
<div class="container">
   <div class="row">

       <div class="col-lg-10 bg-light text-dark text-center mt-4 offset-1 rounded">

       <form method="POST" action="">

           <div class="form-group">
             <label for="userid">User ID</label>
             <input type="number" name="userid" class="form-control" value="<?=$row['User_id'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="amount">Amount</label>
             <input type="text"  name="amount" id="" class="form-control" value="<?=$row['Amount'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="fullname">Full Name</label>
             <input type="tel" name="fullname" id="" class="form-control" value="<?=$row['Full_name'] ?>">
          
           </div>

           <div class="form-group">
             <label for="email">Email</label>
             <input type="email" name="email" id="" class="form-control" value="<?=$row['Email'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="address">Address</label>
             <input type="text" name="address" id="" class="form-control" value="<?=$row['Address'] ?>" >
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