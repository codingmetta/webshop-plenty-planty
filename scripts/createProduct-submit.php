<?php 
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$productname = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$amount= $_POST['amount'];

add_product($conn, $productname, $description, $price, $amount);

function add_product($conn, $pn, $dc, $pr, $am)
{
$sql = "INSERT INTO Products (name, description, price, amount) VALUES ('$pn','$dc','$pr','$am')";
if ($conn->query($sql) === TRUE) {
  echo "New record successfully added.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>