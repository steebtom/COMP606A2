<?php

class Database
{
  public $conn;

  public function  __construct()
  {
    
    $username = "root";
    $password = "";
    $servername = "localhost";

    try 
    {

      $this->conn = new PDO("mysql:host=$servername;dbname=php2", $username, $password);
    
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }
  }


}