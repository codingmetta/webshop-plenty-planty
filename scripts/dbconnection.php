<?php

$servername= "localhost";
$username= "root";
$password="";
$dbname= "plantytest";

/*
//MSQLi  Object Oriented Connection
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/


//Create PDO Connection to DB "plantytest"
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully PDO"; 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


/*
try{

//SQL to create table for products
$sql = "CREATE TABLE Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(30) NOT NULL,
  description VARCHAR(30) NOT NULL,
  price FLOAT(50),
  rating VARCHAR(50)
  )";

// use exec() because no results are returned
$conn->exec($sql);
  echo "Table Products created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
*/

$conn = null;


?>