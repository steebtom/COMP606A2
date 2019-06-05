
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

        
        // $pw =  password_hash($pwd,PASSWORD_BCRYPT);
        // $pw =  password_hash($pwd, PASSWORD_DEFAULT);

        

        // $connection = new Database();
        if(isset($_SESSION['uid']))                                      //Session Variable Check and Printing Page Layout
            { 
                $connection = new Database();
                // $sesvar = $_SESSION['user'];
                // $sesutype = $sesvar->getuType();
                // echo $sesutype;
                // $sesuser = $_SESSION['user'];
                // $sesuserid = $sesuser->getuserId();

                $query = "INSERT INTO CONTRACT VALUES ('', '$tcost', '$labour', '$material', '$date', '$sjid', '$sesuser')";
                $prepCheck = $connection->conn->prepare($query);
                $res = $prepCheck->execute();

                // $res = $prep->execute();
                if($res)
                    {
                        echo "<script>alert('Contract Created Successfully'); </script>";
                        // echo "<script>window.top.tcostation='index.php'</script>";
                        // echo "<script>window.tcostation.href='index.php'</script>";
                        header("location:../jobdetails.php?contractcreated");

                    }
                else
                    {
                        echo "<script>alert('Couldnt Create the Contract'); </script>";
                    }
            }
        
        // if($prepCheck->fetchColumn())
        // {
        //     echo "<script>alert('Username or email already exists'); </script>";
        // //   echo "<script>window.tcostation.href='index.php'</script>";
        //     header("tcostation:../signup.php?error=emailuserexist");
        // }
        // else
        // {


        //     $query = "INSERT INTO users VALUES ('','$uname','$fname','$email','$pwd','$utype')";

        //     $prep = $connection->conn->prepare($query);
        //     $res = $prep->execute();
        //     if($res)
        //     {
        //         echo "<script>alert('Registered Successfull'); </script>";
        //         // echo "<script>window.top.tcostation='index.php'</script>";
        //         // echo "<script>window.tcostation.href='index.php'</script>";
        //         header("tcostation:../index.php?signupsuccess");

        //     }
        // }
    }
    
}

else
{
    echo "Could not create Contract";
}