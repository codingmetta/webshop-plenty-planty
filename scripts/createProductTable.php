<?php

/**
 * Script connects to database and creates a table for products
 *
 * @author Talia Deckardt
 */

require_once 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


//SQL to create table for products
$sql = "CREATE TABLE Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(30) NOT NULL,
  description VARCHAR(30) NOT NULL,
  price FLOAT(50),
  rating_counter INT,
  rating_sum INT,
  amount INT(30) 
  )";


if ($conn->query($sql) === TRUE) {
  echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

?>