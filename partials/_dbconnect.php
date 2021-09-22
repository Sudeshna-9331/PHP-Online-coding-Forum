<?php
// CONNECTING TO DATABASE FOR THREADS.
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "iCodeForum";

// CREATE A CONNECTION TO DATABASE
$conn = mysqli_connect($serverName,$userName,$password,$database);

// DIE IF CONNECTION WAS NOT SUCCESSFUL.
if(!$conn){
die("Connection failed!". mysqli_connect_error() );
}


 ?>
