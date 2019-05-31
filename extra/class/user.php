<?php

require "db.php";

class User extends Database
{
  
//   private $userId;
//   private $uname;
//   private $fname;
//   private $email;
//   private $password;
//   private $utype;


//   public function __construct($userId, $uname, $fname, $email, $password, $utype)
//   {
//     $this->userId = $userId;
//     $this->uname = $uname;
//     $this->fname = $fname;
//     $this->email = $email;
//     $this->password = $password;
//     $this->utype = $utype; 
//   }



    public function signup($uname, $fname, $email, $password, $utype)
    {
        $queryCheck="SELECT * FROM users WHERE email='$email' OR uname = '$uname'";
        $prepCheck = $this->conn->prepare($queryCheck);
        $prepCheck->execute();
        if($prepCheck->fetchColumn()) 
        {
            return false;
        }
        else
        {
        
            $query = "INSERT INTO users VALUES ('','$uname','$fname','$email','$password','$utype')";
            $prep = $this->conn->prepare($query);
            $res = $prep->execute();
            return $res;
        }
  
    }

    public function login($email, $password)
    {   

        
    $queryLogin="SELECT * FROM users WHERE email='$email'";
    $prepLogin = $this->conn->prepare($queryLogin);
    $prepLogin->execute();
    $res = $prepLogin->fetch(PDO::FETCH_ASSOC);
    //test if the request return something
    if($res)
    {
        if ($password == $res['password'])
        {


            //  $user = new user($res['uid'],
            //                 $res['uname'],
            //                       $res['fname'],
            //                       $res['email'],
            //                       $res['password'],
            //                       $res['utype']);   
           
            
                    $_SESSION['uid'] = $res['uid'];
                    $_SESSION['utype'] = $res['utype'];
                    

                    return true;

        } 
        else 
        {
            // echo $h;
            // echo "<script>alert('Incorrect Password'); </script>";
            return false;
            // echo var_dump($res);
        }

        // $queryCheck="SELECT * FROM users WHERE email='$email' OR uname = '$uname'";
        // $prepCheck = $this->conn->prepare($queryCheck);
        // $prepCheck->execute();
        // if($prepCheck->fetchColumn()) 
        // {
        //     return false;
        // }
        // else
        // {
        
        //     $query = "INSERT INTO users VALUES ('','$uname','$fname','$email','$password','$utype')";
        //     $prep = $this->conn->prepare($query);
        //     $res = $prep->execute();
        //     return $res;
        // }
  
    }

    else
    {

    }

    
}
}

?>




<!-- if($res['utype']=='1')
            {
                header("Location:../landing.php");
                exit();
            }
            else
            {
                    
                header("Location:../landing.php");
                exit();
            } -->