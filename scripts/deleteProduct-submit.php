<?php 
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$delete= $_POST['delete'];

delete_product($conn, $delete);

function delete_product($conn, $del)
{
$sql = "DELETE FROM Products WHERE product_id='$del'";
if ($conn->query($sql) === TRUE) {
  echo "Product successfully deleted.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>