<div class="nbutton d-flex justify-content-center mt-3">
   <button type="button" onclick="switchlistAll()" class="btn btn-secondary m-2" btn-lg btn-block">All</button>
   <button type="button" onclick="switchlist()" class="btn btn-secondary m-2" btn-lg btn-block">New</button>
</div>

<div class="col-lg offset-lg mt-3 rounded bg-light text-center "  id="allusers"  style="display:block">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Product ID</th>
               <th>Quantity</th>
               <th>trxid</th>
               <th>Status</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM orders";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr>
            <td><?=$row['order_id']?></td>
            <td><?=$row['user_id']?></td>
            <td><?=$row['product_id']?></td>
            <td><?=$row['qty']?></td>
            <td><?=$row['trx_id']?></td>
            <td><?=$row['p_status']?></td>
            <td><a href="orderEdit.php?id=<?=$row['order_id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="orderdelete.php?id=<?=$row['order_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

<div class="col-lg offset-lg mt-3 rounded bg-light text-center "  id="new"  style="display:none">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Product ID</th>
               <th>Quantity</th>
               <th>trxid</th>
               <th>Status</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';
       $usertime = date('Y-m-d');

       $sql= "SELECT * FROM orders WHERE date = '$usertime'";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr class="bg-warning">
            <td><?=$row['order_id']?></td>
            <td><?=$row['user_id']?></td>
            <td><?=$row['product_id']?></td>
            <td><?=$row['qty']?></td>
            <td><?=$row['trx_id']?></td>
            <td><?=$row['p_status']?></td>
            <td><a href="orderEdit.php?id=<?=$row['order_id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="orderdelete.php?id=<?=$row['order_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

    <script>
 
 function switchlist() {
    var x = document.getElementById("allusers");
    var y = document.getElementById("new");
    if (x.style.display === "block") {
        y.style.display = "block"
        x.style.display = "none";
    }
   
}
    function switchlistAll() {
    var x = document.getElementById("allusers");
    var y = document.getElementById("new");
    if (x.style.display === "none") {
        y.style.display = "none"
        x.style.display = "block";
    }
    }
  </script>