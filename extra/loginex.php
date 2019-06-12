<?php
session_start();

include_once("class/user.php");
if(isset($_POST['loginbtn']))
{
    $email = $_POST['mailuid'];
    $pw = $_POST['pwd'];

    if ((!empty($email)) && (!empty($pw)))
    {       
        $user = new User();
        $result = $user->login($email, $pw);
        if($result)
        {
            // echo "<script>alert('Registered Successfull'); </script>";
            header("Location:../landing.php?success=loginsuccess");
        }
        else
        {
            header("Location:../index.php?error=loginfailed");
        }
            
    }
    else
    {
        header("Location:../index.php?error=emptylogin");
        echo "<script>alert('Insert all the Details'); </script>";
    }
}

else
{
    header("Location:../index.php?error=logindberror");
    echo "<script>alert('Could not Connect'); </script>";  
}
