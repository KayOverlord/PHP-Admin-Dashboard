
<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Damage</th>
               <th>Collect</th>
               <th>Date</th>
             
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM servicing";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
		   
           

       ?>
       <tbody>
           <tr>
            <td><?=$row['service_id']?></td>
            <td><?=$row['User_id']?></td>
            <td><?=$row['damage']?></td>
            <td><?=$row['Collect']?></td>
            <td><?=$row['date']?></td>
            <td><a href="ServiceDelete.php?id=<?=$row['service_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }
		} ?>
       </tbody>
   </table>

</div>

  <div>