<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");



$jid = $_GET['jid']; 
$connection = new Database();
$query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM jobs where jid = '$jid';";
$prepLogin = $connection->conn->prepare($query);
$res = $prepLogin->execute();

  if(!$res)
  {
      echo "<script>alert('SQL Error!');</script>";
      header("Location: ../index.php?error=sqlerror");
      exit();
  }
  else
  {
      
       
      
      while($job = $prepLogin->fetch(PDO::FETCH_ASSOC)){
        $id = $job['jid'];
        ?>
        
        <div class="container-fluid">
        
            <h2>
            <h2><?= $job['jid']; ?> </h2>
            <h2><?= $job['loc']; ?> </h2>
            <h2><?= $job['descr']; ?> </h2>
            <h2><?= $job['estcost']; ?> </h2>
            <h2><?= $job['jdate']; ?> </h2>
            <h2><?= $job['ldate']; ?> </h2> 
      
      
      
        </div>
        
        <?php 
        
      }
    }
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
    <p class="lead">Post a Contract for this Job.</p>

    <div class="wrapper-main">                                          
        <section class="section-default">

                                                                                     
            <form action="extra/createcontractex.php" class="signup-form" method="post">
            <div><input class="createcontract" type="text" name="tcost" placeholder="Total Cost"></div>
            <div><input class="createcontract" type="text" name="labour" placeholder="Labout Cost"></div>
            <div><input class="createcontract" type="text" name="material" placeholder="Material Cost"></div>
            <div><input class="createcontract" type="date" name="date" placeholder="Job Date"></div>
            <div><button class="createcontract" type="submit" class="btn btn-outline-dark" name="createcontractbtn">Signup</button></div>
            
            </form>
        </section>

    </div>
                <?php 
                }
                ?>

              <div class="wrapper-main">
                <section class="section-default">
                <?php
                $uid = $_SESSION['uid'];
                $query = "SELECT  coid, tcost, labour, material, date FROM CONTRACT where jid = '$jid' AND uid = '$uid';";
                $prepLogin = $connection->conn->prepare($query);
                $res = $prepLogin->execute();

                if(!$res)
                {
                    echo "<script>alert('SQL Error!');</script>";
                    header("Location: ../landing.php?error=sqlerror");
                    exit();
                }
                else
                {
                
                // mysqli_stmt_execute($stmt);                                         //SQL Statement Execution
                // $result = mysqli_stmt_get_result($stmt);    
                

                while($contract = $prepLogin->fetch(PDO::FETCH_ASSOC)){
                  // $id = $contract['jid'];
                  ?>
                  
                  <div class="container-fluid">
                  
                      <h2>
                      <h2><?= $contract['coid']; ?> </h2>
                      <h2><?= $contract['tcost']; ?> </h2>
                      <h2><?= $contract['labour']; ?> </h2>
                      <h2><?= $contract['material']; ?> </h2>
                      <h2><?= $contract['date']; ?> </h2>
                      <!-- <h2><?= $job['jdate']; ?> </h2>
                      <h2><?= $job['ldate']; ?> </h2>  -->
                
                
                
              </div>
                  
                  <?php 
        
      }}
    }
        ?>

      </section>
    
    
    
    </div>


  </div>
</div>
</main>
</body>