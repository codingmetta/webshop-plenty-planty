<?php

require_once 'login.php';

//Create PDO Connection to DB "plantytest"
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully PDO"; 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

try{

//SQL to create table for Users
$sql = "CREATE TABLE Users (
  forename VARCHAR(30) NOT NULL,
  surname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL
  )";

// use exec() because no results are returned
$conn->exec($sql);
  echo "Table Users successfully created.";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}



$conn = null;


?>