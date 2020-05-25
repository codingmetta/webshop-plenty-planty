<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plantytest";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO Products (name, description, price)
  VALUES ('Monstera', 'Phildodendron', '29.95')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New Product added successfully to Productlist";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>