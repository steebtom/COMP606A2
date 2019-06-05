<?php

require "header.php";
include_once("./extra/class/db.php");
include_once("./extra/class/user.php");
include_once("./extra/class/contracts.php");
$utype = $_SESSION['utype'];
if(isset($_SESSION['utype']) && $utype = '2')
{
        $connection = new Database();
    $uid = $_SESSION['uid'];
    $query = "SELECT  coid, tcost, labour, material, date FROM CONTRACT WHERE uid = '$uid';";
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


            while($contract = $prepCheck->fetch(PDO::FETCH_ASSOC))
            {

                // echo "id: " . $row["tcost"]. " - Name: " . $row["lcost"]. " " . $row["mcost"];
            ?>

                <div class="container-fluid">
                  
                <h2><?= $contract['coid']; ?> </h2>
                      <h2><?= $contract['tcost']; ?> </h2>
                      <h2><?= $contract['labour']; ?> </h2>
                      <h2><?= $contract['material']; ?> </h2>
                      <h2><?= $contract['date']; ?> </h2>
                      
                
                
                
              </div>
              <?php
            }
            echo $uid;
        }  
    }
    else
    echo "Not Tradesman";
            ?>
            
            
