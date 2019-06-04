<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");

// session_start();

?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
<main>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <h1 class="display-4">Create and post a Job.</h1> -->
    <p class="lead">Landing Page.</p>
    <form action="sample.php" class="signup-form" method="post">
    <!-- <div class="wrapper-main">                                          
        <section class="section-default">

                                                                                     
            
            <div><input class="createcontract" type="text" name="tcost" placeholder="Total Cost"></div>
            <div><input class="createcontract" type="text" name="tcost" placeholder="Labout Cost"></div>
            <div><input class="createcontract" type="text" name="material" placeholder="Material Cost"></div>
            <div><button class="createcontract" type="submit" class="btn btn-outline-dark" name="signupbtn">Signup</button></div>
            
            </form>
        </section>

    </div> -->

    <?php


    

      $connection = new Database();
      $query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM jobs WHERE workerid = 0;";
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
            
            // mysqli_stmt_execute($stmt);                                         //SQL Statement Execution
            // $result = mysqli_stmt_get_result($stmt);    
            ?>                        
           
<?php
            while($job = $prepLogin->fetch(PDO::FETCH_ASSOC)){
              $_SESSION['sjid'] = $job['jid'];
              $sjid = $_SESSION['sjid'];
              ?>
              
              <div class="container-fluid">
              
                  <!-- <h2>
                  <h2><?= $job['jid']; ?> </h2>
                  <h2><?= $job['loc']; ?> </h2>
                  <h2><?= $job['descr']; ?> </h2>
                  <h2><?= $job['estcost']; ?> </h2>
                  <h2><?= $job['jdate']; ?> </h2>
                  <h2><?= $job['ldate']; ?> </h2> -->
            
              <a href = "./jobdetails.php?jid=<?php echo $sjid; ?>"><?= $job['descr']; ?></a> 
            
              </div>
              
              <?php 
              
            }
          }
              ?>


            <!-- // echo '<table class="table">
            //     <thead class="thead-dark">
            //       <tr>
                    
            //         <th scope="col">Booking ID</th>
            //         <th scope="col">User ID</th>
            //         <th scope="col">Massage Type</th>
            //         <th scope="col">Slot</th>
            //         <th scope="col">Date</th>
            //         <th scope="col">Desription</th>
            //         <th scope="col">Current Injuries</th>
            //         <th scope="col">Psychologycal Condition</th>
            //         <th scope="col">Booking Time</th>
                    
            //       </tr>
            //     </thead>
            //     <tbody>'; -->

            <!-- // while ($row = mysqli_fetch_assoc($result))                          //Executes if query returs any row
            // {
                                                                                    
            //   echo '<tr>';
            //   echo '<td>'.$row['bid'].'</td>';
            //   echo '<td>'.$row['usrid'].'</td>';
            //   echo '<td>'.$row['msg'].'</td>';
            //   echo '<td>'.$row['slot'].'</td>';
            //   echo '<td>'.$row['bdate'].'</td>';
            //   echo '<td>'.$row['descrip'].'</td>';
            //   echo '<td>'.$row['info1'].'</td>';
            //   echo '<td>'.$row['info2'].'</td>';
            //   echo '<td>'.$row['btime'].'</td>';
            //   echo '</tr>';

            
            // }
            // }
            // ?> -->

            <!-- </tr>
            </tbody>
            </table> -->



    


  </div>
</div>
</main>
</body>