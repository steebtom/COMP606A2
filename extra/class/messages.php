<?php
include_once "db.php";
class Messages extends Database
{

    public function insertmessage($coid, $uid, $msg, $date, $time, $fname)
    {   

        $query = "INSERT INTO MESSAGE VALUES ('$coid', '$uid', '$msg', '$date', '$time', '$fname')";
        $prepCheck = $this->conn->prepare($query);
        $res = $prepCheck->execute();

        if($res)
            {
                echo "<script>alert('Contract Created Successfully'); </script>";
                header("location:../message.php?messagecreated&coid=".$coid);
                return true;
            }
        else
            {
                echo "<script>alert('Couldnt Create the Contract'); </script>";
                return false;
            }
    }
}
	
?>