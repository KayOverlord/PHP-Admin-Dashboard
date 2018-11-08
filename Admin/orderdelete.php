<?php

include 'config.php';

$id=$_GET['id'];

$sql = "DELETE FROM orders WHERE order_id='$id'";

if(mysqli_query($conn,$sql)){
    $message = "ROW SUCCESSFULY DELETED";
    echo "<script type='text/javascript'>alert('$message'); document.location='orders.php'</script>";
}else{
    echo("Somthing went wrong");
}

?>