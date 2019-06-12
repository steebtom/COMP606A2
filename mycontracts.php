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
    $query = "SELECT  coid, tcost, labour, material, date, status FROM CONTRACT WHERE uid = '$uid';";
    $prepCheck = $connection->conn->prepare($query);
    $res = $prepCheck->execute();

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

        if(!$res)
        // if(!$row = $res -> fetch_assoc())
        {
            echo "<script>alert('SQL Error!');</script>";
            header("Location: ../mycontracts.php?error=sqlerror");
            exit();
        }
        else
        {
?>
                    <table class = "table table-hover">
                            <thead>
                    <tr>
                    <th>Contract ID</th>
                        <th>Total Cost</th>
                        <th>Labour Cost</th>
                        <th>Material Cost</th>
                        <th>Contract Expiry</th>
                        <th>Contract Status</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
            while($contract = $prepCheck->fetch(PDO::FETCH_ASSOC))
            {
                $_SESSION['coid'] = $contract['coid'];

            ?>

                <div class="container-fluid">
                  <tr>
                  <td><?= $contract['coid']; ?> </td>
                  <td><?= $contract['tcost']; ?> </td>
                  <td><?= $contract['labour']; ?> </td>
                  <td><?= $contract['material']; ?> </td>
                  <td><?= $contract['date']; ?> </td>
                  

                <?php
                if($contract['status'] == 1)
                {
                    echo '<td>Accepted</td>';
                    ?>
                    <td><button type="button" class="btn btn-outline-dark" name="confcbtn"><a href = "message.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a></button></td>
                    <?php

                }
                else if($contract['status'] == 2)
                {
                    echo '<td>Rejected</td>';
                }
                else
                {
                    echo '<td>Processing</td>';
                    ?>
                    <td><button type="button" class="btn btn-outline-dark" name="confcbtn"><a href = "message.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a></button></td></tr>
                    <?php
                }
                ?>
  
              </div>
              <?php
            }
            ?>
            </tbody>
            </table>
            <?php
        }  
    }
    else
    echo "Not Tradesman";
            ?>
            
            
