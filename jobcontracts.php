<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");
?>

<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
<main>
<form name = "cc" action = "contractaction.php" method = "post">
<?php
$jid = $_GET['jid']; 

$connection = new Database();
$query = "SELECT  coid, tcost, labour, material, date, jid, uid FROM CONTRACT where jid = '$jid';";
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
      
       
      
      while($jobcontracts = $prepLogin->fetch(PDO::FETCH_ASSOC))
      {
        // $id = $job['jid'];
        $_SESSION['coid'] = $jobcontracts['coid'];
        ?>
        
        
        <div class="container-fluid">
        <!-- <a href = "./contractdetails.php?coid=<?php echo $_SESSION['coid']; ?>"><?= $jobcontracts['coid']; ?></a> -->

        <!-- <a href = "./contractdetails.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a>         -->
            <h2><?= $jobcontracts['tcost']; ?> </h2>
            <h2><?= $jobcontracts['labour']; ?> </h2>
            <h2><?= $jobcontracts['material']; ?> </h2>
            <h2><?= $jobcontracts['date']; ?> </h2>
            <h2><?= $jobcontracts['jid']; ?> </h2>
            <h2><?= $jobcontracts['uid']; ?> </h2> 
            <button type="submit" class="btn btn-outline-dark" name="confbtn">Confirm</button>
            <button type="submit" class="btn btn-outline-dark" name="decbtn">Decline</button>
            <button type="button" class="btn btn-outline-dark" name="msgbtn"><a href = "./contractdetails.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a>   </button>
      
      
      
        </div>
        
        <?php 
        
      }
    }
        ?>
</form>
