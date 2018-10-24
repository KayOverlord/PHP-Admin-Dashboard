
<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Amount</th>
               <th>Full Name</th>
               <th>Email</th>
               <th>Address</th>
               <th>Card Name</th>
               <th>Card Number</th>
               <th>Exp Month</th>
               <th>CVV</th>
               <th>Edit</th>
               <th>DELETE</th>
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
            <td><?=$row['Name_on_Card']?></td>
            <td><?=$row['Card_Number']?></td>
            <td><?=$row['Exp_Month']?></td>
            <td><?=$row['CVV']?></td>
            <td><a href="PaymentEdit.php?id=<?=$row['PaymentID']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="PaymentDelete.php?id=<?=$row['PaymentID']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

  <div>