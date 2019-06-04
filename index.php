<?php
require "header.php";
?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<main>
    <div class=wrapper>
    
    <?php
    if(!isset($_SESSION['userid']))                                                             //Session Variable to Check Login
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Thank You for visiting us.</h1>
          <p class="lead">Log in to continue !</p>
        </div>
      </div>';
    }
    else                                                                                        //Executes if session variable not available
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Welcome back.</h1>
          <p class="lead">You are now logged in.</p>
        </div>
        </div>';
        
        if(isset($_GET['error']))                                                               //Error Check
                {
                    if($_GET['error'] == "emptyfields")
                    {
                        echo '<p class="bookerr">Fill in all details.</p>';
                    }
                    elseif($_GET['error'] == "sqlerrorbook1")
                    {
                        echo '<p class="bookerr">SQL Error. Try again.</p>';
                    }
                    elseif($_GET['error'] == "bookingslotunavailable")
                    {
                        echo '<p class="bookerr">Selected Booking Slot unavailable.</p>';
                    }
                    elseif($_GET['error'] == "sqlerrorbook2")
                    {
                        echo '<p class="bookerr">SQL Error. Try Again.</p>';
                    }
                    elseif($_GET['error'] == "sqlerrorbook3")
                    {
                        echo '<p class="bookerr">SQL Error. Try Again.</p>';
                    }
                    elseif($_GET['error'] == "sqlerrorcan1")
                    {
                        echo '<p class="bookerr">SQL Error. Try Again.</p>';
                    }
                    elseif($_GET['success'] == "booking")
                    {
                        echo '<p class="signuperr">Booking Successful.</p>';
                    }
                    
                    
                }


    }
    ?>
    </div>
</main>
