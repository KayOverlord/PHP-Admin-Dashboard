<?php 
 
 include 'config.php';

 $id=$_GET['id'];

 $result = mysqli_query($conn,"SELECT * FROM feedback WHERE feedback_id='$id'");
 $row=mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
     $id =$_GET['id'];
     $name =$_POST['Name'];
     $phonenumber =$_POST['Phonenumber'];
     $email =$_POST['Email'];
     $subject =$_POST['Subject'];
     $message =$_POST['Message'];
   
  


     $sql="UPDATE feedback SET Name='$name',Phonenumber='$phonenumber',Email='$email',Subject='$subject',Message='$message' WHERE feedback_id='$id'";
     
 if(mysqli_query($conn,$sql)){
    header("location:FeedBack.php");
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

       <form method="POST" enctype="multipart/form-data" action="">

           <div class="form-group">
             <label for="productcat">Name</label>
             <input type="text" min="1" max="4" name="Name" class="form-control" value="<?=$row['Name'] ?>" >
       
           </div>

            <div class="form-group">
             <label for="productbrand">Email</label>
             <input type="email" min="1" max="4" name="Email" id="" class="form-control" value="<?=$row['Email'] ?>" >
         
           </div>

           <div class="form-group">
             <label for="producttitle">Phone number</label>
             <input type="tel" name="Phonenumber" id="" class="form-control" value="<?=$row['Phonenumber'] ?>">
          
           </div>

           <div class="form-group">
             <label for="productprice">Subject</label>
             <input type="text" name="Subject" id="" class="form-control" value="<?=$row['Subject'] ?>" >
         
           </div>

            <div class="form-group">
             <label for="productdesc">Message</label>
             <input type="text" name="Message" id="" class="form-control" value="<?=$row['Message'] ?>" >


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