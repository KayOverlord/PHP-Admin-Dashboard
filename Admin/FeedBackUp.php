
<div class="nbutton d-flex justify-content-center mt-3">
   <button type="button" onclick="switchlistAll()" class="btn btn-secondary m-2" btn-lg btn-block">All </button>
   <button type="button" onclick="switchlist()" class="btn btn-secondary m-2" btn-lg btn-block">New </button>
</div>
<div class="col-lg offset-lg mt-3 rounded bg-light text-center " id="allusers"  style="display:block">
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

<div class="col-lg offset-lg mt-3 rounded bg-light text-center " id="new"  style="display:none">
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
       $usertime = date('Y-m-d');

       $sql= "SELECT * FROM feedback WHERE date = '$usertime'";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             
           

       ?>
       <tbody>
           <tr class="bg-warning">
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