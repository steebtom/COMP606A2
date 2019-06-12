<?php

require "header.php";

include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");

if(isset($_SESSION['uid']))
{

?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>

<main>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <?php
  if(isset($_GET['success']))
   {   
           if($_GET['success'] == "jobcreated")
           {
             ?>
          <div class="alert alert-success">
         <strong>Success!</strong> Job Created Successful!
         </div>
         <?php
           }
           else if($_GET['success'] == "statusupdated")
           {
             ?>
          <div class="alert alert-success">
         <strong>Congratualtions ! </strong> Tradesman Confirmed for Job ID <?php echo $_GET['jid'];?>
         </div>
         <?php
           }
           

   }

   if(isset($_GET['error']))
   {   
           if($_GET['error'] == "sqlerror")
           {
              ?>
              <div class="alert alert-danger">
              <strong>Database Error!</strong>
              </div>
              <?php
           }}
   ?>

    <h1 class="display-4">My Jobs.</h1>
    <?php

$connection = new Database();
$uid = $_SESSION['uid'];


$query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM JOBS WHERE uid = '$uid';";
$prepCheck = $connection->conn->prepare($query);
$res = $prepCheck->execute();

    if(!$res)
    // if(!$row = $res -> fetch_assoc())
    {
        echo "<script>alert('SQL Error!');</script>";
        header("Location: ../myjobs.php?error=sqlerror");
        exit();
    }
    else
    {
        
?>
        <table class = "table table-hover">
        <thead>
  <tr>
  <th>View Job</th>
    <th>Job Location</th>
    <th>Job Description</th>
    <th>Job Estimate</th>
    <th>Start date</th>
    <th>End Date</th>
    
  </tr>
</thead>
<tbody>
 
  <?php
        while($jobs = $prepCheck->fetch(PDO::FETCH_ASSOC))
        {
          $_SESSION['sjid'] = $jobs['jid'];

        ?>

    <div class="container-fluid">
                  

                  <tr>
                  <td><a href = "./jobcontracts.php?jid=<?php echo $_SESSION['sjid']; ?>"><?= $jobs['jid']; ?></a> </td>
                  <td><?= $jobs['loc']; ?> </td>
                  <td><?= $jobs['descr']; ?> </td>
                  <td><?= $jobs['estcost']; ?> </td>
                  <td><?= $jobs['jdate']; ?> </td>
                  <td><?= $jobs['ldate']; ?> </td></tr>
                
            
          </div>
          <?php
        }
        ?>
        </tbody></table>
       <?php
    } 
  }
  else
  echo "Session not set"; 
        ?>


  </div>
</div>
</main>
</body>