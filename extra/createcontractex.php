<?php
include_once("class/user.php");
include_once("class/contracts.php");

session_start();

if(isset($_POST['createcontractbtn']))
{   
        $tcost = $_POST['tcost'];
        $labour = $_POST['labour'];
        $material = $_POST['material'];
        $date = $_POST['date'];
        $sjid = $_SESSION['sjid'];
        $sesuser = $_SESSION['uid'];

    if((empty($tcost)) || (empty($labour)) || (empty($material)) || (empty($date)))
    {
        header("tcostation: ../jobdetails.php?error=emptyfields&username=email=");
        exit();
    }
    
    else
    {
        if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
            { 
                $contract = new Contracts();
                $result = $contract->createcontract($tcost, $labour, $material, $date, $sjid, $sesuser);
            }   
    }    
}

else
{
    echo "Could not create Contract";
}