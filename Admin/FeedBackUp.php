

<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>Name</th>
               <th>Phone number</th>
               <th>Email</th>
               <th>Subject</th>
               <th>Message</th>
             
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM feedback";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr>
           <td><?=$row['feedback_id']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Phonenumber']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['Subject']?></td>
            <td><?=$row['Message']?></td>
        
            <td><a href="FeedBackDelete.php?id=<?=$row['feedback_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }} ?>
       </tbody>
   </table>

</div>

  <div>
  <script>
  function switchlistAll() {
    var x = document.getElementById("allusers");
    var y = document.getElementById("newusers")
    if (x.style.display === "none") {
        y.style.display = "none"
        x.style.display = "block";
    }
    }
  </script>