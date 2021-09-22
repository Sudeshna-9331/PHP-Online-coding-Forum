<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>navbar</title>
    <style>
        nav {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 1px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .navbar-brand {
            margin-bottom: 0;
            font-size: 2rem;
        }
        .loggedIn{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            margin-left: 1rem;
            text-align: center;

        }

        #logIn {
            margin-left: 1rem;

        }

        #logIn,
        #signUp {
            color: orange !important;
            font-size: 1.1rem;

            padding: 0rem;
            width: 80px;

        }


        #signUp:hover {
            color: rgb(192, 128, 8) !important;
        }

        #logIn:hover {
            color: rgb(189, 125, 8) !important;
        }

        #user {
            color: white !important;
            text-transform: capitalize;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        #logOut {
            color: orange !important;
            
        }

        #logOut:hover {
            color: rgb(190, 126, 7) !important;
        }

        .nav-link {
            text-transform: uppercase;

        }

        .search {
            color: orange !important;
            border: 1px solid orange !important;
        }

        .search:hover {
            background-color: rgb(212, 139, 3) !important;
            border: none !important;
            color: white !important;
        }
       
        @media only screen and (max-width: 768px) {
            #logIn {

                margin-left: 0;
            }

            #logIn,
            #signUp {
                font-size: 1.1rem;
                width: 8rem;
                letter-spacing: 1px;
                padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            }

            #logOut {
                font-size: 1.1rem;
                margin-left: 0;

                padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            }

            #logOut:hover {
                color: rgb(190, 126, 7) !important;
            }

            #user {
                color: orange !important;
                font-size: 0.85rem;
                width: 8rem;
                margin: 2rem 0 0.2rem 0;
            }
        }
        @media only screen and (max-width: 420px){
            #user {
            color: white !important;
            text-transform: capitalize;
            font-size: 1rem;
            margin-top: 0;
           }
        }
    </style>

</head>

<body>
    <?php require "partials/_dbconnect.php";?>
    <!-- NAVBAR -->
    <?php
   $loggedin = false;

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
    $loggedin = true;
  }
    
    
    echo '<nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <p class="navbar-brand"><span>iCodeForum</span></p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a id="home" class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                   
                    <li class="nav-item mx-3">
                        <a id="about" class="nav-link" onclick="" href="about.php">About</a>
                    </li>

                    <li class="nav-item mx-3">
                        <a id="contact" class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>

                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary search" type="submit">Search</button>
                </form>';
                if(!$loggedin){
                    echo '<a id="logIn" class="nav-link" aria-current="page" href="/PHP_Online_Forum/login.php">Log in</a>';
                    
                    echo '<a id="signUp" class="nav-link" aria-current="page" href="/PHP_Online_Forum/signup.php">Sign Up</a>';
                
                }
                if($loggedin){
                    $username = $_SESSION['username'];
                     
                    $sql="SELECT `name` FROM `users` WHERE username='$username'";
                      $result = mysqli_query($conn,$sql);
                      $row=mysqli_fetch_assoc($result);
                    
                    echo '<div class="loggedIn">
                    <h1 id="user">Welcome '.$row['name'].'</h1>
                    <a id="logOut" class="nav-link mx-0" aria-current="page" href="/PHP_Online_Forum/logout.php">Log Out</a>
                    </div>';
                }


            echo '</div>
        </div>
    </nav>';


    ?>

</body>

</html>