<?php
session_start();

include_once("class/user.php");

if(isset($_POST['signupbtn']))
{
        $uname = $_POST['uname'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $utype = $_POST['utype'];
        $pwd = $_POST['password'];
        $pwdrepeat = $_POST['passwordrepeat'];
    if((empty($uname)) || (empty($fname)) || (empty($email)) || (empty($utype)))
    {
        header("Location: ../signup.php?error=emptyfields&username=".$uname."&email=".$email);
        exit();
    }
    elseif(empty($pwd) || empty($pwdrepeat))
    {
        header("Location: ../signup.php?error=emptypass&username=".$uname."&email=".$email);
        exit();
    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9]$/', $uname))
    {
        header("Location: ../signup.php?error=invalidemailusername");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidemail&username=".$uname);
        exit();
    }
    elseif(preg_match('/^[a-zA-Z0-9]$/', $uname))
    {
        header("Location: ../signup.php?error=invalidusername&email=".$email);
        exit();

    }
    elseif($pwd !== $pwdrepeat)
    {
        header("Location: ../signup.php?error=passwordmismatch&username=".$uname."&email=".$email);
        exit();
    }
    
    else
    {

        $user = new User();
        $result = $user->signup($uname, $fname, $email, $pwd, $utype);
        
        if($result)
        {
            echo "<script>alert('Registered Successfull'); </script>";
        //         // echo "<script>window.top.location='index.php'</script>";
        //         // echo "<script>window.location.href='index.php'</script>";
        //         header("Location:../index.php?signupsuccess");
        } 

        else
        {
            echo "<script>alert('Username or email already exists'); </script>";
        // //   echo "<script>window.location.href='index.php'</script>";
        //     header("Location:../signup.php?error=emailuserexist");
        }




    }
    
}

else
{
    echo "Could not signup";
}