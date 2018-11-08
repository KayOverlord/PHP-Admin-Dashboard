

<!doctype html>
<html lang="en">
  <head>
    <title>Motoserve</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body class="bg-dark">
    <ul class="nav nav-tabs nav-stacked bg-light">
      <li class="nav-item">
          <a href="main.php"  class="nav-link">|ADD/UPDATE user|</a>
      </li>
      <li class="nav-item">
        <a href="product.php"  class="nav-link">|ADD/UPDATE products|</a>
      </li>
      <li class="nav-item">
        <a href="Services.php" class="nav-link">|UPDATE services|</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link active">|UPDATE towing|</a>
      </li>
      <li class="nav-item disabled">
        <a href="orders.php" class="nav-link">|UPDATE orders|</a>
      </li>
      <li class="nav-item ">
        <a href="Cart.php"  class="nav-link ">|UPDATE cart|</a>
      </li>
	  <li class="nav-item">
        <a href="FeedBack.php" class="nav-link">|UPDATE feedback|</a>
      </li>
      <li class="nav-item">
        <a href="Payment.php"class="nav-link">|UPDATE payment|</a>
      </li>
      <li class="nav-item">
        <a href="Reports.php" class="nav-link"><img src="./upload/33-dashboard-chart-report-annual-512.png" width="30" height="30"/></a>
      </li>
	  <li class="nav-item">
        <a href="../index.php" class="nav-link">|log out|</a>
      </li>
    </ul>

  <div class="container">
  
<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>User ID</th>
               <th>Location</th>
               <th>Car Type</th>
               <th>Insurance</th>
               <th>Date</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM towing";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
		   
           

       ?>
       <tbody>
           <tr>
            <td><?=$row['Towing_id']?></td>
            <td><?=$row['user_id']?></td>
            <td><?=$row['Location']?></td>
            <td><?=$row['Car_Type']?></td>
            <td><?=$row['insurance']?></td>
            <td><?=$row['Time']?></td>
            <td><a href="TowingEdit.php?id=<?=$row['Towing_id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="ServiceDelete.php?id=<?=$row['Towing_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }
		} ?>
       </tbody>
   </table>

</div>

  <div>
  <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px"></div>
  </div>
 
 


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
     <!--Google Maps-->
     <script src="https://maps.google.com/maps/api/js"></script>
    <!-- Google Maps settings -->
<script>
    // Regular map
    function regular_map() {
        var var_location = new google.maps.LatLng(-25.731340, 28.218370);
  
        var var_mapoptions = {
            center: var_location,
            zoom: 8
        };
  
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
  
        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }
  
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
  </script>
  </body>
  
</html>