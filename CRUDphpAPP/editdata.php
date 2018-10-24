<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $firstname =$_POST['firstname'];
     $lastname =$_POST['lastname'];
     $email =$_POST['email'];
     $phone =$_POST['phone'];
     $address =$_POST['address'];

     $sql="UPDATE user_info SET first_name='$firstname',last_name='$lastname',email='$email',mobile='$phone',address1='$address' WHERE user_id='$id'";

     
 if(mysqli_query($conn,$sql)){
    header("location:index.php");
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

       <form method="POST">

           <div class="form-group">
             <label for="firstname">NAME</label>
             <input type="text" name="firstname" class="form-control" value="<?=$row['first_name'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="lastname">SURNAME</label>
             <input type="text" name="lastname" id="" class="form-control" value="<?=$row['last_name'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="email">EMAIL</label>
             <input type="email" name="email" id="" class="form-control" value="<?=$row['email'] ?>">
          
           </div>

           <div class="form-group">
             <label for="phone">PHONE</label>
             <input type="tel" name="phone" id="" class="form-control" value="<?=$row['mobile'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="address">Address</label>
             <input type="tel" name="address" id="" class="form-control" value="<?=$row['address1'] ?>" >
         
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