<?php

$server="localhost";
$username="root";
$password="";
$database="tsf_bank";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
  die("<script>alert('Connection Failed!')</script>".mysqli_connect_error());
}

?>
