<?php
require "./extra/class/user.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-image: linear-gradient(120deg, #84fab0 40%, #8fd3f4 100%);;">

        <img src="./image/logo.png" width="40" height="40">
        <a class="navbar-brand" href="landing.php">Workify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="massage.php">My Jobs</a>
                </li> -->

                <?php
                    
                if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
                {   
                    $sesvar = $_SESSION['uid'];
                    $sesutype = $_SESSION['utype'];
                
                    if($sesutype == 2)
                    {
                        echo '<li class="nav-item">
                            <a class="nav-link" href="mycontracts.php">My Contracts</a>
                            </li>';
                        // echo '<li class="nav-item">
                        //     <a class="nav-link" href="myjobs.php">My Jobs</a>
                        //     </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item">
                            <a class="nav-link" href="createjob.php">Create Job</a>
                            </li>';
                        echo '<li class="nav-item">
                            <a class="nav-link" href="myjobs.php">My Jobs</a>
                            </li>';
                    }
                    // echo '<li class="nav-item">
                    //     <a class="nav-link" href="myjobs.php">My Jobs</a>
                    //     </li>';
                }
                ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                    </li> -->
                </ul>

                <?php
            if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
            {   
                echo '<form action="./extra/logoutex.php" method="post">
                <button type="submit" class="btn btn-outline-dark"name="logoutbtn">Logout</button>
                    </form>';
                    // echo $sesutype;
            }
            else
            {
                echo '<form action="./extra/loginex.php" method="post">
                <input type="text" name="mailuid" placeholder="Username/Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" class="btn btn-outline-dark" name="loginbtn">Login</button>
                </form>
                <a class="btn btn-default nva-link" href="signup.php">Signup</a>';
                
            }
            ?>

        </div>
    </nav>

</body>
</html>