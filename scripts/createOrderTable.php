<?php

/**
 * Script connects to database and creates a table for orders purchased by users
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


//SQL to create table for Orders
$sql = "CREATE TABLE Orders (
  order_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT, 
  user_id INT UNSIGNED,
  order_amount INT,
  FOREIGN KEY(user_id) REFERENCES Users(user_id)
  )";


if ($conn->query($sql) === TRUE) {
  echo "Table Orders successfully created";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

?>