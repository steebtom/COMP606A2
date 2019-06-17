<?php

require "db.php";

class User extends Database
{



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

                    $_SESSION['uid'] = $res['uid'];
                    $_SESSION['utype'] = $res['utype'];
                    $_SESSION['fname'] = $res['fname'];
                    
                    return true;

        } 
        else 
        {
            return false;
        }

    }

    else
    {
        return false;
    }

    
}
}
