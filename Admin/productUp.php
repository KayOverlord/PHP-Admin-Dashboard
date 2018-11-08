
<div class="col-lg offset-lg mt-3 rounded bg-light text-center ">
   <table class="table">
       <thead>
           <tr class="btn-success">
               <th>ID</th>
               <th>Category</th>
               <th>Brand</th>
               <th>Title</th>
               <th>Price</th>
               <th>Description</th>
               <th>Image</th>
               <th>EDIT</th>
               <th>DELETE</th>
           </tr>
       </thead>
       <?php 

       include 'config.php';

       $sql= "SELECT * FROM products";

       $result= mysqli_query($conn,$sql);

       if($row=mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
		   
				$product_image = $row["product_image"];
               $imageURL = '<img class="img-responsive" src="product_images/'.$product_image.'" width=100 height=100/>';
           

       ?>
       <tbody>
           <tr>
            <td><?=$row['product_id']?></td>
            <td><?=$row['product_cat']?></td>
            <td><?=$row['product_brand']?></td>
            <td><?=$row['product_title']?></td>
            <td><?=$row['product_price']?></td>
            <td><?=$row['product_desc']?></td>	
            <td><?=$imageURL?></td>
            <td><a href="productEdit.php?id=<?=$row['product_id']?>" class="btn btn-primary">EDIT</a></td>
            <td><a href="productDelete.php?id=<?=$row['product_id']?>" class="btn btn-danger">DELETE</a></td>
           </tr>
           <?php }
		} ?>
       </tbody>
   </table>

</div>

  <div>