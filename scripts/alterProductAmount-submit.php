<?php 
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$newamount= $_POST['newamount'];
$product_id= $_POST['pid'];

update_amount($conn, $product_id, $newamount);

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