<?php 
include 'config.php';
$res='';

if(isset($_POST['submit'])){

  $username = type_input($_POST['username']);
  $pass = type_input($_POST['pass']);
  $email = type_input($_POST['email']);





  $sql =mysqli_query($conn, "SELECT * FROM admin WHERE username ='$username' AND password ='$pass' AND email ='$email' ");

  
   if(mysqli_num_rows($sql) > 0){
     $res='<a name="" id="" class="btn btn-warning" href="main.php" role="button">DASHBOARD</a>';
   }else{
     $res = "somthing went wrong";
   };
}

function type_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);

  return $data;
}
function nextp(){
  header("location:index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="mainCSS.css">
  </head>
  <body class="bg-dark">

  <div class="container">
  <div class="row" id="addproTable">

  <div class="col-sm-6 offset-3 rounded mt-2  text-dark" id="logform">
  <h3 class="text-center p-2">ADMIN</h3>

<form action="" method="POST">

  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text"  name="username" class="form-control" aria-describedby="helpId" required>
  </div>

   <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" name="pass" class="form-control"  aria-describedby="helpId" required>
  </div>


   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" placeholder="" aria-describedby="helpId"  required>
  </div>


  <div class="form-group">
 <input name="submit"  class="btn btn-primary" type="submit" value="Login">
  </div>

  <div class="form-group text-center" >
   <?= $res; ?>
  </div>

</form>
  </div>
  </div>
  </div>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
  
</html>