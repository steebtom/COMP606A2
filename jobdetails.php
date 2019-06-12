<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");
include_once("./extra/class/jobs.php");

$jid = $_GET['jid']; 
$_SESSION['sjid'] = $jid;

$job = new Jobs();
$result = $job->displayjobdetails();
?>

<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
  <main>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">

    <?php

      if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
        {   
            $sesvar = $_SESSION['utype'];
            // $sesutype = $sesvar->getuType();
            // echo $sesutype;
            if($sesvar == 2)  
            {
              ?>
            <p class="lead"><h3>Post a Contract for this Job.</h3></p>

            <div class="wrapper-main">                                          
                <section class="section-default">

                                                                                            
                    <form action="extra/createcontractex.php" class="signup-form" method="post">
                    <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="text" name="tcost" placeholder="Total Cost" required></div></div>
                    <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="text" name="labour" placeholder="Labout Cost" required></div></div>
                    <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="text" name="material" placeholder="Material Cost" required></div></div>
                    <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="date" name="date" placeholder="Job Date" required></div></div>
                    <div><button class="btn btn-success" type="submit" class="btn btn-outline-dark" name="createcontractbtn">Post Contract</button></div><br>
                    <?php
                    if(isset($_GET['success'])){

                    
                     if($_GET['success'] == "contractcreated")
                     {
                       ?>
                    <div class="alert alert-success">
                   <strong>Success!</strong> Contract created Successfully !
                   </div>
                   <?php
                     }
                     

                     }
                     ?>
                    </form>
                </section>

            </div>
            </div>

</div>
</div>
            <?php 
            }
            ?>

            <div class="wrapper-main">
              <section class="section-default">
              <?php
              $uid = $_SESSION['uid'];
              $contract = new Contracts();
              if($sesvar == 1)
              {
                $result1 = $contract->displayjobcontracts($jid,$uid);
              }
              elseif($sesvar == 2)
              {
                $result1 = $contract->displayjobcontracts1($jid,$uid);
              }
              else
              {
                echo "No records";
              }
        }
        ?>
        </section>
  
    
  </main>
</body>