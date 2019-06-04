<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");



$coid = $_GET['coid']; 
$connection = new Database();
$query = "SELECT  tcost, labour, material, date, uid FROM CONTRACT where coid = '$coid';";
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
        // $id = $job['jid'];
        ?>
        
        <div class="container-fluid">
        
            <h2>
            <h2><?= $job['tcost']; ?> </h2>
            <h2><?= $job['labour']; ?> </h2>
            <h2><?= $job['material']; ?> </h2>
            <h2><?= $job['date']; ?> </h2>
            <h2><?= $job['uid']; ?> </h2>
          
            
      
      
      
        </div>
        
        <?php 
        
      }
    }
        

?>