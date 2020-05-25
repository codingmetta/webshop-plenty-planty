<?php
require_once 'login.php';
require 'insertUserToDB.php';


//Create PDO Connection to DB "plantytest"
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$salt1    = "qm&h*";
$salt2    = "pg!@";


$forename = 'Sarah';
$surname  = 'Bender';
$email = 'hello@sarah.de';
$username = 'sahara';
$password = 'mysecret';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $forename, $surname, $email, $username, $token);





?>

