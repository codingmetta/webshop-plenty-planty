<?php 

/**
 * @file addAmin.php
 * Script adds user to database with role 'admin' when called
 *
 * @author Talia Deckardt
 */

require_once 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$salt1    = "qm&h*";
$salt2    = "pg!@";

$role = 'admin';
$forename = 'Talia';
$surname  = 'Deckardt';
$email = 'talia.deckardt@stud.hs-ruhrwest.de';

//LogIn Data for admin
$un = 'ADMIN';
$passw = 'LETMEIN';


$token = hash('ripemd128', "$salt1$passw$salt2");


add_user($conn, $role, $forename, $surname, $email, $un, $token);


function add_user($conn, $rl, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (role, forename, surname, email, username, password) VALUES ('$rl','$fn','$sn','$em', '$un', '$pw')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>