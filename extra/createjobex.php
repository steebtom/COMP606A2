<?php
include_once("class/user.php");
include_once("class/jobs.php");

session_start();

if(isset($_POST['createjobbtn']))
{
        $loc = $_POST['loc'];
        $descrip = $_POST['descrip'];
        $estcost = $_POST['estcost'];
        $date = $_POST['date'];
        $lastdate = $_POST['lastdate'];
        // $pwdrepeat = $_POST['passwordrepeat'];

    if((empty($loc)) || (empty($descrip)) || (empty($estcost)) || (empty($date)) || (empty($lastdate)))
    {
        header("Location: ../signup.php?error=emptyfields&username=".$uname."&email=".$email);
        exit();
    }
   
    else
    {
        if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
            { 
                $job = new jobs();
                $result = $job->createjob($loc, $descrip, $estcost, $date, $lastdate);
                if($result)
                {
                    echo "<script>alert('Job Created Successfully'); </script>";
                    // echo "<script>window.top.location='index.php'</script>";
                    // echo "<script>window.location.href='index.php'</script>";
                    header("Location:../myjobs.php?success=jobcreated");
                }
                else
                {
                    echo "<script>alert('Couldnt Create the Job'); </script>";
                }

                
            }
    }    
}

else
{
    echo "Could not create Job";
}