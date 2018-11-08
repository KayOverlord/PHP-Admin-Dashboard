<?php

include 'config.php';

$id=$_GET['id'];

$sql = "DELETE FROM cart WHERE id='$id'";

if(mysqli_query($conn,$sql)){
    $message = "ROW SUCCESSFULY DELETED";
    echo "<script type='text/javascript'>alert('$message'); document.location='Cart.php'</script>";
}else{
    echo("Somthing went wrong");
}

?>