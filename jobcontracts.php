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
<form name = "cc"  method = "post">
<?php
$jid = $_GET['jid'];

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
$connection = new Database();
$query = "SELECT  coid, tcost, labour, material, date, jid, uid, status FROM CONTRACT where jid = '$jid' and status = 0;";
$prepLogin = $connection->conn->prepare($query);
$res = $prepLogin->execute();

  if(!$res)
  {
      echo "<script>alert('SQL Error!');</script>";
      header("Location: ../jobcontracts.php?error=sqlerror");
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
    <th>Tradesman ID</th>
  
    
  </tr>
</thead>
<tbody>
<?php
    echo '<h1>Non Confirmed Contracts</h1>';
      while($jobcontracts = $prepLogin->fetch(PDO::FETCH_ASSOC))
      {
        // $id = $job['jid'];
        $_SESSION['coid'] = $jobcontracts['coid'];
        $_SESSION['wid'] = $jobcontracts['uid'];
        $_SESSION['jid'] = $jobcontracts['jid'];
        ?>


        <div class="container-fluid">

        <tr>
        <td><?= $jobcontracts['coid']; ?> </td>
            <td><?= $jobcontracts['tcost']; ?> </td>
            <td><?= $jobcontracts['labour']; ?> </td>
            <td><?= $jobcontracts['material']; ?> </td>
            <td><?= $jobcontracts['date']; ?> </td>
            <td><?= $jobcontracts['uid']; ?> </td>
          
          
           <td><button type="button" class="btn btn-outline-dark" name="confcbtn"><a href = "./extra/contractactionex.php?wid=<?php echo $_SESSION['wid']; ?>&coid=<?php echo $_SESSION['coid']; ?>&jid=<?php echo $_SESSION['jid']; ?>">Confirm</a></button></td>
          
           <td><button type="button" class="btn btn-outline-dark" name="msgbtn"><a href = "message.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a></button></td>
           </tr>


        
        </div>
        
        <?php

      }
      ?>
      </tbody></table>
      <br>
        <br>
        <br>
        <br>
      <?php
    }

    
        $query = "SELECT  coid, tcost, labour, material, date, jid, uid, status FROM CONTRACT where jid = '$jid' and status = 1;";
        $prepLogin = $connection->conn->prepare($query);
        $res = $prepLogin->execute();

          if(!$res)
          {
              // echo "<script>alert('SQL Error!');</script>";
              header("Location: ../jobcontracts.php?error=sqlerror");
              exit();
          }
          else
          {

            echo '<h1>Confirmed Contracts</h1>';
            ?>
            <table class = "table table-hover">
                <thead>
          <tr>
          <th>Contract ID</th>
          <th>Total Cost</th>
          <th>Labour Cost</th>
          <th>Material Cost</th>
          <th>Contract Expiry</th>
          <th>Tradesman ID</th>
          </tr>
        </thead>
        <tbody>
        <?php

              while($jobcontracts = $prepLogin->fetch(PDO::FETCH_ASSOC))
              {
                $_SESSION['coid'] = $jobcontracts['coid'];
                $_SESSION['wid'] = $jobcontracts['uid'];
                $_SESSION['jid'] = $jobcontracts['jid'];
                ?>


                <div class="container-fluid">
                    <tr>
                    <td><?= $jobcontracts['coid']; ?> </td>
                    <td><?= $jobcontracts['tcost']; ?> </td>
                    <td><?= $jobcontracts['labour']; ?> </td>
                    <td><?= $jobcontracts['material']; ?> </td>
                    <td><?= $jobcontracts['date']; ?> </td>
                    <td><?= $jobcontracts['uid']; ?> </td>
                    <td><button type="button" class="btn btn-outline-dark" name="msgbtn"><a href = "message.php?coid=<?php echo $_SESSION['coid']; ?>">Message</a></button></td>
                    </tr>


        </div>

        <?php

      }
      ?>
      </tbody>
      </table>
      <br>
        <br>
        <br>
        <br>
      <?php
    }

    $query = "SELECT  coid, tcost, labour, material, date, jid, uid, status FROM CONTRACT where jid = '$jid' and status = 2;";
$prepLogin = $connection->conn->prepare($query);
$res = $prepLogin->execute();

  if(!$res)
  {
      // echo "<script>alert('SQL Error!');</script>";
      header("Location: ../index.php?error=sqlerror");
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
    <th>Tradesman ID</th>
  
    
  </tr>
</thead>
<tbody>
<?php
    echo '<h1>Declined Contracts</h1>';
      while($jobcontracts = $prepLogin->fetch(PDO::FETCH_ASSOC))
      {
        // $id = $job['jid'];
        $_SESSION['coid'] = $jobcontracts['coid'];
        $_SESSION['wid'] = $jobcontracts['uid'];
        $_SESSION['jid'] = $jobcontracts['jid'];
        ?>


        <div class="container-fluid">

        <tr>
        <td><?= $jobcontracts['coid']; ?> </td>
            <td><?= $jobcontracts['tcost']; ?> </td>
            <td><?= $jobcontracts['labour']; ?> </td>
            <td><?= $jobcontracts['material']; ?> </td>
            <td><?= $jobcontracts['date']; ?> </td>
            <td><?= $jobcontracts['uid']; ?> </td>
          
           </tr>


        
        </div>
        
        <?php

      }
      ?>
      </tbody></table>
      <br>
        <br>
        <br>
        <br>
      <?php
    }


        ?>
</form>
</main>
</body>