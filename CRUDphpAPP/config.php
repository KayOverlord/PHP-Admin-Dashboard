<?php

$dbhost = "localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="motoserv";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("did not connect".mysqli_connect_error);
}


?>