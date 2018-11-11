<!--<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">-->
<div class="nbutton d-flex justify-content-center mt-3">
   <button type="button" onclick="switchlistAll()" class="btn btn-secondary m-2" btn-lg btn-block">All</button>
   <button type="button" onclick="switchlist()" class="btn btn-secondary m-2" btn-lg btn-block">New</button>
</div>


<div class="col-lg offset-lg mt-3 rounded bg-light text-center " id="allusers"  style="display:block">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>Date</th>
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
               
   
            $mydate= strtolower($row['user_time']);
            $month = date('m', strtotime($mydate));
            $current_month=date('m');

            
   
       ?>
       <tbody>
           
           <tr>
            <td><?=$row['user_time']?></td>
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

<div class="col-lg offset-lg mt-3 rounded bg-light text-center " id="newusers" style="display:none">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>Date</th>
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
       //$mydate= strtolower($row['user_time']);
       //$month = date('m', strtotime($mydate));
       //$current_month=date('m');
       $usertime = date('Y-m-d');

       $sql= "SELECT * FROM user_info WHERE user_time = '$usertime' ";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
               
   
          

            
   
       ?>
       <tbody>
           
           <tr class="bg-warning">
            <td><?=$row['user_time']?></td>
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

<script>
  
    function switchlist() {
    var x = document.getElementById("allusers");
    var y = document.getElementById("newusers")
    if (x.style.display === "block") {
        y.style.display = "block"
        x.style.display = "none";
    }
   
}
function switchlistAll() {
    var x = document.getElementById("allusers");
    var y = document.getElementById("newusers")
    if (x.style.display === "none") {
        y.style.display = "none"
        x.style.display = "block";
    }
    }
</script>
 


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
</html>-->