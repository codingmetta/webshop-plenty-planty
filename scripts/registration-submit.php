<?php 
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$salt1    = "qm&h*";
$salt2    = "pg!@";

$role = 'user';
$forename = $_POST['forename'];
$surname  = $_POST['surname'];
$email = $_POST['email'];
$un = $_POST['username'];
$passw = $_POST['password'];
$token = hash('ripemd128', "$salt1$passw$salt2");

add_user($conn, $role, $forename, $surname, $email, $un, $token);


function add_user($conn, $rl, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (role, forename, surname, email, username, password) VALUES ('$rl','$fn','$sn','$em', '$un', '$pw')";
if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>