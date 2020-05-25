<?php
require_once 'login.php';

//Create PDO Connection to DB "plantytest"
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/*
$salt1    = "qm&h*";
$salt2    = "pg!@";


$forename = 'Bill';
$surname  = 'Smith';
$email = 'hello@bill.de';
$username = 'smithi';
$password = 'mysecret';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $forename, $surname, $email, $username, $token);

$forename = 'Pauline';
$surname  = 'Jones';
$email = 'hello@pauline.de';
$username = 'pjonni';
$password = 'acrobat';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $forename, $surname, $email, $username, $token);
*/

function add_user($conn, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (forename, surname, email, username, password) VALUES ('$fn', '$sn','$em', '$un', '$pw')";
$result = $conn->exec($sql);
if (!$result) die($conn->error);
}


?>