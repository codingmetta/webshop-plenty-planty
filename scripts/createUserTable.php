<?php

require_once 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


//SQL to create table for Users
$sql = "CREATE TABLE Users (
        role VARCHAR(10) NOT NULL,
        forename VARCHAR(30) NOT NULL,
        surname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(32) NOT NULL
        )";

if ($conn->query($sql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();

?>