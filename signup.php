<?php
require "header.php"
?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
<main>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Signup and Join us.</h1>
    <p class="lead">Get all our exclusive member privilages.</p>

    <div class="wrapper-main">                                          
        <section class="section-default">

            <?php                                       //Checking header for errors
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == "emptyfields")
                    {
                        echo '<p class="signuperr">Fill in all details.</p>';
                    }
                    elseif($_GET['error'] == "invalidemailusername")
                    {
                        echo '<p class="signuperr">Invalid Username and Email.</p>';
                    }
                    elseif($_GET['error'] == "invalidusername")
                    {
                        echo '<p class="signuperr">Invalid Username.</p>';
                    }
                    elseif($_GET['error'] == "invalidemail")
                    {
                        echo '<p class="signuperr">Invalid Email.</p>';
                    }
                    elseif($_GET['error'] == "passwordmismatch")
                    {
                        echo '<p class="signuperr">Passwords do not match.</p>';
                    }
                    elseif($_GET['error'] == "useridexists")
                    {
                        echo '<p class="signuperr">Username already exists.</p>';
                    }
                    
                }
            ?>                                                                         
            <form action="extra/signupex.php" class="signup-form" method="post">
            <div><input class="signupinp" type="text" name="uname" placeholder="Username"></div>
            <div><input class="signupinp" type="text" name="fname" placeholder="Full Name"></div>
            <div><input class="signupinp" type="text" name="email" placeholder="Email"></div>
            <div><input class="signupinp" type="password" name="password" placeholder="Password"></div>
            <div><input class="signupinp" type="password" name="passwordrepeat" placeholder="Confirm Password"></div>
            <label name = "utypelabel1">Customer</label>
            <div><input class ="signupinp" type="radio" name = "utype" value ='1'></div>
            <label name = "utypelabel2">Tradesman</label>
            <div><input class = "signupinp" type = "radio" name = "utype" value = '2'></div>
            <div><button class="signupinp" type="submit" class="btn btn-outline-dark" name="signupbtn">Signup</button></div>
            
            </form>
        </section>

    </div>


  </div>
</div>
</main>
</body>
