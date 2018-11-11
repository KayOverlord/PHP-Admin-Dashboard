<div class="nbutton d-flex justify-content-center mt-3">
   <button type="button" onclick="switchlistAll()" class="btn btn-secondary m-2" btn-lg btn-block">All</button>
   <button type="button" onclick="switchlist()" class="btn btn-secondary m-2" btn-lg btn-block">New</button>
</div>
<div class="col-lg mx-auto mt-3 rounded bg-light text-center " id="all"  style="display:block">
   <table class="table text-center">
       <thead>
           <tr class="btn-success">
               <th scope="col" >ID</th>
               <th scope="col">User ID</th>
               <th scope="col">Amount</th>
               <th scope="col">Full Name</th>
               <th scope="col">Email</th>
               <th scope="col">Address</th>
           
               <th scope="col">DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM payment";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr>
           <td><?=$row['PaymentID']?></td>
            <td><?=$row['User_id']?></td>
            <td><?=$row['Amount']?></td>
            <td><?=$row['Full_name']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['Address']?></td>
            <td><a href="PaymentDelete.php?id=<?=$row['PaymentID']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

<div class="col-lg mx-auto mt-3 rounded bg-light text-center "  id="new"  style="display:none">
   <table class="table text-center">
       <thead>
           <tr class="btn-success">
               <th scope="col" >ID</th>
               <th scope="col">User ID</th>
               <th scope="col">Amount</th>
               <th scope="col">Full Name</th>
               <th scope="col">Email</th>
               <th scope="col">Address</th>
           
               <th scope="col">DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';
       $usertime = date('Y-m-d');

       $sql= "SELECT * FROM payment WHERE date = '$usertime'";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr class="bg-warning">
           <td><?=$row['PaymentID']?></td>
            <td><?=$row['User_id']?></td>
            <td><?=$row['Amount']?></td>
            <td><?=$row['Full_name']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['Address']?></td>
            <td><a href="PaymentDelete.php?id=<?=$row['PaymentID']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

    <script>
 
 function switchlist() {
    var x = document.getElementById("all");
    var y = document.getElementById("new");
    if (x.style.display === "block") {
        y.style.display = "block"
        x.style.display = "none";
    }
   
}
    function switchlistAll() {
    var x = document.getElementById("all");
    var y = document.getElementById("new");
    if (x.style.display === "none") {
        y.style.display = "none"
        x.style.display = "block";
    }
    }
  </script>