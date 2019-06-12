<?php
    //require "./extra/class/db.php";
    //$connection = new Database();
if (isset($_GET['loc']) && $_GET['loc']!="") 
{

    $username = "root";
    $password = "";
    $servername = "localhost";
    $conn = new PDO("mysql:host=$servername;dbname=php2", $username, $password);


    $loc = $_GET['loc'];
    $query = "SELECT * FROM JOBS WHERE loc = '$loc'";
    $prepCheck = $conn->prepare($query);
    $res = $prepCheck->execute();

    if($res)
    {
    while($row = $prepCheck->fetch(PDO::FETCH_ASSOC))
    {
	$jid = $row['jid'];
	$descrip = $row['descr'];
	$date = $row['jdate'];
	$val = response($jid, $descrip, $date);

    }
}
    else
    {
		response(NULL, 200,"No Record Found");
    }
    echo $val;
}
else
{
	response(NULL, 400,"Invalid Request");
}
 
function response($jid, $descrip, $date)
{

	$response['jid'] = $jid;
	$response['descrip'] = $descrip;
	$response['date'] = $date;
	
	$json_response = json_encode($response);
    echo $json_response;
    
}
?>