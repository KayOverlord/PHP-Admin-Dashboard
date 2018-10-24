<!--<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">-->



<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>Name</th>
               <th>Surname</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Address</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM user_info";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){

           

       ?>
       <tbody>
           <tr>
            <td><?=$row['user_id']?></td>
            <td><?=$row['first_name']?></td>
            <td><?=$row['last_name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['mobile']?></td>
            <td><?=$row['address1']?></td>
            <td><a href="editdata.php?id=<?=$row['user_id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="deletedata.php?id=<?=$row['user_id']?>"class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

  <div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
</html>-->