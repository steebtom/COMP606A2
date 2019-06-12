<?php

include_once("class/db.php");

if(isset($_GET['wid']) && isset($_GET['coid']) && isset($_GET['jid']))
{
$wid = $_GET['wid'];
echo $wid;
$cid =$_GET['coid'];
echo $cid;
$jid =$_GET['jid'];
echo $jid;
 $connection = new Database();
$query = "UPDATE jobs set workerid = '$wid' where jid = '$jid'";
$prepLogin = $connection->conn->prepare($query);
$res = $prepLogin->execute();
  if($res)
  {
    $query = "UPDATE contract set status = 1 where coid = '$cid'";
    $prepLogin = $connection->conn->prepare($query);
    $res = $prepLogin->execute();

        if($res)
        {
        $query = "UPDATE contract set status = 2 where status = 0 AND jid = '$jid'";
        $prepLogin = $connection->conn->prepare($query);
        $res1 = $prepLogin->execute();
        header("location:../myjobs.php?jid=$jid&success=statusupdated");
        }
      
  }
  else
  {
   echo "<script>alert('SQL error');</script>";
}
}




?>
