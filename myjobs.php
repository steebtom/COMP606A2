<?php

require "header.php";
// include_once("./extra/class/db.php");
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
    <h1 class="display-4">My Jobs.</h1>
    <?php

$connection = new Database();
$uid = $_SESSION['uid'];


$query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM JOBS WHERE uid = '$uid';";
$prepCheck = $connection->conn->prepare($query);
$res = $prepCheck->execute();
// $row = fetch_assoc($res);
// $row = $res -> fetch_assoc();

    if(!$res)
    // if(!$row = $res -> fetch_assoc())
    {
        echo "<script>alert('SQL Error!');</script>";
        header("Location: ../index.php?error=sqlerror");
        exit();
    }
    else
    {
        
        // mysqli_stmt_execute($stmt);                                         //SQL Statement Execution
        // $result = mysqli_stmt_get_result($stmt);                            //Getting Results and Displaying data in table


        while($jobs = $prepCheck->fetch(PDO::FETCH_ASSOC))
        {
          $_SESSION['sjid'] = $jobs['jid'];
          // $sjid = $_SESSION['sjid'];
          
            // echo "id: " . $row["tcost"]. " - Name: " . $row["lcost"]. " " . $row["mcost"];
        ?>

    
    
    <div class="container-fluid">
                  
                     <!-- <?php echo $sjid;?> -->
                  <!-- <h2>Job Id :<?= $jobs['jid']; ?> </h2> -->
                  <a href = "./jobcontracts.php?jid=<?php echo $_SESSION['sjid']; ?>"><?= $jobs['jid']; ?></a> 
                  <h2><?= $jobs['loc']; ?> </h2>
                  <h2><?= $jobs['descr']; ?> </h2>
                  <h2><?= $jobs['estcost']; ?> </h2>
                  <h2><?= $jobs['jdate']; ?> </h2>
                  <h2><?= $jobs['ldate']; ?> </h2>
                  
            
            
            
          </div>
          <?php
        }
        // echo $uid;
    } 
  }
  else
  echo "Session not set"; 
        ?>


  </div>
</div>
</main>
</body>