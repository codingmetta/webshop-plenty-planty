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

$salt1    = "qm&h*";
$salt2    = "pg!@";

$role = 'admin';
$forename = 'Talia';
$surname  = 'Deckardt';
$email = 'talia.deckardt@stud.hs-ruhrwest.de';

//LogIn Data for admin
$un = 'admin';
$passw = 'letmein';


$token = hash('ripemd128', "$salt1$passw$salt2");


add_user($conn, $role, $forename, $surname, $email, $un, $token);


function add_user($conn, $rl, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (role, forename, surname, email, username, password) VALUES ('$rl','$fn','$sn','$em', '$un', '$pw')";
$result = $conn->exec($sql);
if (!$result) die($conn->error);
}

 ?>