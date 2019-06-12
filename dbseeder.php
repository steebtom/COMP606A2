<?php require("extra/dbconnect.php"); ?>
<?php

echo "<h3>*** DATABASE SEEDER RUNNING ***</h3>";
echo "creating table Users ...<br>";

$mysqli->query("DROP TABLE IF EXISTS users");

$sql = <<<EOD
CREATE TABLE `users`( `uid` int(11) AUTO_INCREMENT PRIMARY KEY, `uname` varchar(20) NOT NULL, `fname` varchar(20) NOT NULL, `email` varchar(20) NOT NULL, `password` varchar(40) NOT NULL, `utype` int(1) NOT NULL );
EOD;

$mysqli->query($sql);

echo "populating table Users ...<br>";

$sql = <<<EOD
INSERT INTO `users` (`uname`, `fname`, `email`, `password`, `utype`) VALUES
('cust1', 'cust1', 'cust1@gg.com', '123', '1'),
('cust2', 'cust2', 'cust2@gg.com', '123', '1'),
('cust3', 'cust3', 'cust3@gg.com', '123', '1'),
('trade1', 'trade1', 'trade1@gg.com', '123', '2'),
('trade2', 'trade2', 'trade2@gg.com', '123', '2'),
('trade3', 'trade3', 'trade3@gg.com', '123', '2');
EOD;

$mysqli->multi_query($sql);
echo "retrieving tables in $database ...<br>";

$sql2 = <<<EOD
CREATE TABLE `jobs`( `jid` int(11) AUTO_INCREMENT PRIMARY KEY, `loc` varchar(20) NOT NULL, `descr` varchar(250) NOT NULL, `estcost` varchar(10) NOT NULL, `jdate` varchar(16) NOT NULL, `ldate` varchar(16) NOT NULL,`workerid` int(5) NOT NULL, `uid` int(5) NOT NULL );
EOD;

$mysqli->query($sql2);

echo "populating table Jobs ...<br>";

$sql2 = <<<EOD
INSERT INTO `jobs` (`loc`, `descr`, `estcost`, `jdate`, `ldate`, `uid`) VALUES 
('Hamilton', 'Chef', '240', '2019-07-10', '2019-07-12', '1'), 
('Auckland', 'Electrician', '300', '2019-06-16', '2019-06-19', '1'), 
('Wellington', 'Plumber', '150', '2019-06-20', '2019-06-22', '1'), 
('Hamilton', 'Driver', '170', '2019-06-30', '2019-07-01', '2'), 
('Auckland', 'Chef', '160', '2019-06-14', '2019-06-17', '2'), 
('Wellington', 'Cleaner', '220', '2019-07-05', '2019-07-09', '2')
EOD;

// $mysqli->query($sql2);
$mysqli->multi_query($sql2);


$sql3 = <<<EOD
CREATE TABLE `contract`( `coid` int(5) AUTO_INCREMENT PRIMARY KEY, `tcost` varchar(10), `labour` varchar(10), `material` varchar(10), `date` varchar(16), `jid` int(5), `uid` int(5), `status` varchar(1), `ownerid` int(5));
EOD;

$mysqli->query($sql3);

$sql4 = <<<EOD
CREATE TABLE `message`( `coid` int(5), `uid` int(5), `msg` varchar(300), `date` varchar(16), `time` varchar(8), `fname` varchar(20));
EOD;

$mysqli->query($sql4);



echo "<h3>*** DATABASE SEEDER FINISHED ***</h3>";

?>