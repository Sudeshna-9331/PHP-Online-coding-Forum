<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Log out</title>
    <style>
      *{
        padding: 0;
        margin: 0;
      }
      body{
        width: 100%;
        height: 100%;
      }
      .card{
        width: 40%; margin:auto;

      }
      .card-header{
        width: 100%!important;
      }
       @media only screen and (max-width: 736px) {
        .card{
          width: 80%;
         margin:auto;
        }
       }
    </style>
  </head>
  <body>

    

<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
        header("location:login.php");
        exit;
    }
    else{
        session_unset();
        session_destroy();
    }
  
?>
 <?php
  require "partials/_header.php";
  ?>
<div class="container my-5 text-center">
<div class="card">
    <div class="card-header text-center">
    You are logged out. 
    </div>
    <div class="card-body my-5 ">
        <h5 class="card-title my-5">You can login again to raise or answer queries...</h5>
       
        <a href="/PHP_Online_Forum/login.php" class="btn btn-primary">Login</a>
        <a href="/PHP_Online_Forum/index.php" class="btn btn-primary">Home</a>
    </div>
    </div>
</div>
   


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    
  </body>
</html>