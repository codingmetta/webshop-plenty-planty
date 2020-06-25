<?php
/**@file         createOrderTable.php
 * @brief       Script connects to database and creates table 'Orders'
 *
 * @author      Talia Deckardt
 */

require_once '../scripts/login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


//SQL to create table for Orders

$sql = "CREATE TABLE Orders (
  order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) UNSIGNED,
  product_name VARCHAR(30),
  product_price FLOAT(50),
  username VARCHAR(50) NOT NULL,
  order_amount INT(6),
  review VARCHAR(1000),
  order_date DATE,
  FOREIGN KEY(username) REFERENCES Users(username),
  FOREIGN KEY(product_id) REFERENCES Products(product_id)
  )";


if ($conn->query($sql) === TRUE) {
  echo "Table Orders successfully created";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

?>