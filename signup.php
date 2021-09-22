<?php
 $showAlert = false;
 $showErrorPassword=false;
 $showErrorLogin = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "partials/_dbconnect.php"; 
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    // Check whether data already exists or not.
    $exists_sql="SELECT * FROM `users` WHERE username='$username'";
    $res= mysqli_query($conn, $exists_sql);

    $numExistsRow = mysqli_num_rows($res);
    if($numExistsRow >0){
        
        if(($password == $cpassword )){
            $showErrorLogin =true;
        }

    }
    else{
        
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `users` ( `name`, `username`, `password`, `date`) VALUES ('$name', '$username', '$hash', current_timestamp())";
            
            $result = mysqli_query($conn,  $sql);
           ;
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showErrorPassword=true;
        
        }
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

    <title>Sign up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }
        body{
            background: linear-gradient(rgb(163, 190, 218),rgb(24, 43, 61));
            height: 100%;
        }
        .form {
            width: 50%;
            margin: auto;
           margin-top: 3rem!important;
            margin-bottom: 6rem!important;
            padding: 2.5rem 5rem 2.5rem 5rem;
            background-color: rgb(235, 238, 240);
           border-radius: 30px;
           box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
       
        .heading{
            
            font-size: 1.5rem!important;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            
        }
       
        
        .form-text{
            color: rgb(190, 183, 183);
        }
       
        input{
           border-radius: 12px!important;
        }
        @media only screen and (max-width: 736px) {

            .form {

            margin-bottom: 6rem!important;
            padding: 3.3rem;
            width: 85%;
            margin: auto;
           border-radius: 30px;
            
        }
        @media only screen and (max-width: 570px){
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
        if( $showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Done! </strong>Your account has been created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         
        }
        else if($showErrorPassword){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Your passwords do not match. </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          
          
        }
        else if($showErrorLogin){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Your account already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         

        }
        
        
    ?>

    <div class="container form ">
        <h2 class="heading">Sign up to our website</h2>
        <form action="/PHP_Online_Forum/signup.php" method="POST">
            <div class="mb-4 ">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">

            </div>
            <div class="mb-4 ">
                <label for="username" class="form-label">Email Id</label>
                <input name="username" type="email" class="form-control" id="username" aria-describedby="emailHelp">

            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
                <div id="emailHelp" class="form-text" style="font-size: 0.8rem;">We'll never share your password with anyone else.</div>
            </div>
            <div class="mb-4">
                <label for="cpassword" class="form-label">Confirm password</label>
                <input name="cpassword" type="password" class="form-control" id="cpassword">
                <div id="emailHelp" class="form-text" style="font-size: 0.8rem;">Make sure to type the same password.</div>
            </div>

            <button type="submit" style=" background-color: rgb(211, 99, 8);
            border: none;" class="btn btn-primary">Sign up</button>
        </form>

    </div>


    <?php require "partials/_footer.php";?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
<script>
    let signUp = document.getElementById("signUp");
   
    signUp.classList.add("active");
</script>
</body>

</html>