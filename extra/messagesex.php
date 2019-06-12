<?php
require "class/messages.php";
session_start();


if(isset($_POST['msgbtn1']))
{
    if(isset($_SESSION['uid']) && isset($_SESSION['coid']))
    {
        date_default_timezone_set("Pacific/Auckland");
               
        $coid = $_SESSION['coid'];
        $uid = $_SESSION['uid'];
        $fname = $_SESSION['fname'];
        $msg = $_POST['msg'];
        $date = date("Y-m-d");
        $time = date("h:i");

        $msg1 = new Messages();
        $result = $msg1->insertmessage($coid, $uid, $msg, $date, $time, $fname);
    }
                
    else
    {
        echo "<script>alert('Session not Set'); </script>";
    }

}
else
{
    echo "<script>alert('Not Submitted'); </script>";
}
?>