<?php 
/**@file        alterProductAmount-submit.php
 * @brief      Script connects to database and alters the amount of a product in stock 
 *
 * @author     Talia Deckardt
 */
require 'login.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$newamount= $_POST['newamount'];
$product_id= $_POST['pid'];

update_amount($conn, $product_id, $newamount);

/** @fn 'Update Product Amount' 
 * @brief Updates Amount  'Admin' to table 'Users'
 */
function update_amount($conn, $pid, $nam)
{
$sql = "UPDATE Products SET amount='$nam' WHERE product_id='$pid'";
if ($conn->query($sql) === TRUE) {
  echo "Product Amount successfully updated.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>