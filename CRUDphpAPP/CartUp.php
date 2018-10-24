
<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Product ID</th>
               <th>Quantity</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM cart";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr>
           <td><?=$row['id']?></td>
            <td><?=$row['user_id']?></td>
            <td><?=$row['p_id']?></td>
            <td><?=$row['qty']?></td>
            <td><a href="CartEdit.php?id=<?=$row['id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="CartDelete.php?id=<?=$row['id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

  <div>