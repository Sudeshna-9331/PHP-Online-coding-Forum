<?php
$login = false;
 $showError = false;
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "partials/_dbconnect.php"; 
    $username = $_POST["username"];
    $password = $_POST["password"];

        $sql = "Select * from users where username='$username'";
        
        $result = mysqli_query($conn,  $sql);
        $num = mysqli_num_rows($result);
       
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                $name = $row["name"];
                if(password_verify($password,$row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin']=  true;
                    $_SESSION['username']=  $username;
                    $_SESSION['password']=  $password;
                    header("location:welcome.php");
                }
                else{
                    $login =false;
                    $showError=true;
                }
            }
           
        }
       
        else{
            header("location:welcome.php");
            $login =false;
            $showError=true;
        }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
        body{
            background: linear-gradient(120deg, #f5efdb 0%, #f0a591 100%);
            height: 100vh;
        }

        .form {
            background-color: rgb(235, 238, 240);
            width: 50%;
            margin: auto;
           
            margin-top: 3rem !important;
            
            padding: 5rem;
       
            border-radius: 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .heading {

            font-size: 1.6rem !important;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-text {
            color: rgb(190, 183, 183);
        }
       
        input {
            border-radius: 12px !important;
        }

        @media only screen and (max-width: 736px) {

            .form {
                margin-top: 2rem!important;
                margin-bottom: 4rem!important;
                padding: 3.3rem;
                width: 85%;
                margin: auto;
               border-radius: 30px;

            }

        }
        
        @media only screen and (max-width: 570px){
            .form {
                margin-bottom: 6rem!important;
                padding: 1.7rem;
                width: 85%;
                margin: auto;
               border-radius: 30px;

            }
           .heading{
              margin-top: 0.6rem;
              margin-bottom: 0;
           }
         
            .heading{
            
            font-size: 1rem!important;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            
            }
            label{
                font-size: 0.9rem!important;
            }
        
            }
        }
    </style>
</head>

<body>
    <?php require "partials/_header.php"; ?>
    <?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            You are logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
        
        else if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Invalid credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        
    ?>

   
        <div class="container form">
            <h2 class="heading">Log in </h2>
            <form action="/PHP_Online_Forum/login.php" method="POST">
                <div class="mb-4 ">
                    <label for="username" class="form-label">Email id</label>
                    <input name="username" type="email" class="form-control" id="username" aria-describedby="emailHelp">

                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                    <div id="emailHelp" class="form-text"  style="font-size: 0.8rem;">We'll never share your password with anyone else.</div>
                </div>

                <button type="submit" style=" background-color: rgb(211, 99, 8);
                border: none;" class="btn btn-primary">Log in</button>
            </form>

        </div>
  


    <?php require "partials/_footer.php";?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>

</body>

</html>