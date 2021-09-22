<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>iForum - Coding Forum</title>
    <style>
        .card-title a {
            text-decoration: none !important;

        }
        .card{
            border-radius: 20px;
        }
        .card img{
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        
        .card-title a:hover {
            color: rgb(70, 69, 69) !important;
            text-decoration: underline !important;

        }
        .view_thread{
            background-image: linear-gradient(to right, rgba(195, 210, 241, 0), rgb(191, 215, 245));
            border: none!important;
        }
        .card:hover{
            transform: scale(1.01,1.01);
        }
    
    </style>

</head>

<body>
    <?php require "partials/_header.php";?>
    <?php require "partials/_carousel.php";?>
    <?php require "partials/_dbconnect.php";?>

    <div class="section container-fluid">
        <h2 class="heading text-center">Welcome to <span> iCodeForum</span></h2>

        <div class="container body mb-5">
            <!-- Fetch all the categories from database -->
            <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);

                // Use loop to iterate through categories 
                while($row = mysqli_fetch_assoc($result)){

                echo '
                    <div class="card">
                        <img src="https://source.unsplash.com/500x400/?' .$row['category_name']. ',coding" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;"><a href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></h5>
                            <p class="card-text" style="font-size:15px;">
                            '.substr($row['category_description'],0,100).' ...</p>
                            <a href="threads.php?catid='.$row['category_id'].'" class="btn view_thread btn-primary">View Threads</a>
                        </div>
                    </div>';
                }

                ?>

        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script>
    let home = document.getElementById("home");

    home.classList.add("active");
    </script>
    <?php require "partials/_footer.php";?>


</body>

</html>