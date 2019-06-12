<?php

require "header.php";
if(isset($_GET['coid']) || isset($_POST['coid']))
{
    $coid = $_GET['coid'];
    $_SESSION['coid'] = $coid; 
    ?>

    <html>
    <head>
    <body>
    <form name = "msg" method = "POST" action = "extra/messagesex.php"> 
        <h4> Type your message</h4>
        <textarea name = "msg" rows = 5 cols = 100> </textarea><br>
        <!-- <button type = "submit" name = "submit">Send</button> -->
        <button type="submit" class="btn btn-outline-dark" name="msgbtn1">Send</button>
    </form>

   
    <?php

    $connection = new Database();
    $query = "SELECT  * from MESSAGE WHERE coid = '$coid' ORDER BY date,time";
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
        ?>
        <table class = "table table-hover">
            <thead>
      <tr>
      <th>From</th>
        <th>Messages</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
     
      
      
      <?php

        while($msg = $prepLogin->fetch(PDO::FETCH_ASSOC))
        {
           
            if($msg['fname'] == $_SESSION['fname'])
            {
                ?>
                 <tr><td>Me</td>
                <?php
            }
            else
            {
                ?>
                      <div class="container-fluid">
            
                <td><?= $msg['fname']; ?> </td> 
                <?php
            }
            ?>
      
     
                <td><?= $msg['msg']; ?> </td>
                <td><?= $msg['date']; ?> </td>
                <td><?= $msg['time']; ?> </td></tr>
                

            </div>

            <?php

        }
        ?>
        </tbody>
         </table>
         <?php
    }
}
?>