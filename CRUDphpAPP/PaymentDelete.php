<?php

include 'config.php';

$id=$_GET['id'];

$sql = "DELETE FROM payment WHERE PaymentID='$id'";

if(mysqli_query($conn,$sql)){
    $message = "ROW SUCCESSFULY DELETED";
    echo "<script type='text/javascript'>alert('$message'); document.location='Payment.php'</script>";
}else{
    echo("Somthing went wrong");
}

?>