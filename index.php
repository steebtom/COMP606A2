<?php
require "header.php";
?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<main>
    <div class=wrapper>
    
    <?php
   if(isset($_GET['success']))
   {   
           if($_GET['success'] == "signupsuccess")
           {
             ?>
          <div class="alert alert-success">
         <strong>Success!</strong> Signup Successful!
         </div>
         <?php
           }
    }

  if(isset($_GET['error']))                                                               //Error Check
      {
          if($_GET['error'] == "loginfailed")
          {
            ?>
            <div class="alert alert-danger">
            <strong>Error</strong> Login Failed !
            </div>
            <?php
          }

      }
        
   
   if(isset($_GET['error1']))
   {   
           if($_GET['error1'] == "signupnotsuccess")
           {
              ?>
              <div class="alert alert-danger">
              <strong>Error!</strong> User account already exists !
              </div>
              <?php
           }           

   }
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
        
        
                
               
          

        
    
    }
    ?>
    </div>
</main>
