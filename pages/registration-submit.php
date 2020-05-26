<?php 
require'../scripts/login.php';

//Create PDO Connection to DB "plantytest"
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//echo $_POST['forename'];

$salt1    = "qm&h*";
$salt2    = "pg!@";

$forename = $_POST['forename'];
$surname  = $_POST['surname'];
$email = $_POST['email'];
$un = $_POST['username'];
$pw = $_POST['password'];
$token    = hash('ripemd128', "$salt1$password$salt2");


add_user($conn, $forename, $surname, $email, $un, $token);


function add_user($conn, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (forename, surname, email, username, password) VALUES ('$fn', '$sn','$em', '$un', '$pw')";
$result = $conn->exec($sql);
if (!$result) die($conn->error);
}

 ?>