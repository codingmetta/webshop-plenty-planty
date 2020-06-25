<?php

/**@file         createProductTable.php
 * @brief       Script connects to database and creates table 'Products'
 *
 * @author      Talia Deckardt
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
  product_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(30) NOT NULL,
  description VARCHAR(255) NOT NULL,
  price FLOAT(50),
  img_path VARCHAR(255),
  rating_counter INT,
  rating_sum INT,
  amount INT(30) 
  )";


if ($conn->query($sql) === TRUE) {
  echo "Table Products successfully created";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

?>