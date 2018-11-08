<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM towing WHERE Towing_id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $userid =$_POST['userid'];
     $location =$_POST['location'];
     $car =$_POST['car'];
     $insurance =$_POST['insure'];
     $time =$_POST['time'];

     $sql="UPDATE towing SET user_id='$userid',Location='$location',Car_Type='$car',insurance='$insurance',Time=$time WHERE Towing_id='$id'";
     
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
             <input type="number" name="userid" class="form-control" value="<?=$row['user_id'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="amount">Location</label>
             <input type="text"  name="location" id="" class="form-control" value="<?=$row['Location'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="fullname">Car Type</label>
             <input type="tel" name="car" id="" class="form-control" value="<?=$row['Car_Type'] ?>">
          
           </div>

           <div class="form-group">
             <label for="email">Insurance</label>
             <input type="text" name="insure" id="" class="form-control" value="<?=$row['insurance'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="address">Date</label>
             <input type="text" name="time" id="" class="form-control" value="<?=$row['Time'] ?>" >
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