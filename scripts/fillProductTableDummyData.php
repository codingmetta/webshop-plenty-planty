<?php
require 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Products (name, description, price, amount)
VALUES ('Sanseviera', 'sansevieria trifasciata | oxygen producer | tropical asia and africa', '11.95','65'),('Monstera', 'monstera deliciosa | air-cleansing | latin america', '23.95','42'), ('Banana Plant', 'musa | fast-growing | subtropical asia', '8.95','21')";

if ($conn->query($sql) === TRUE) {
  echo "Productlist successfully filled with dummydata.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>