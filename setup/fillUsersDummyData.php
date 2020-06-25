<?php 
/**@file        fillUsersDummyData.php 
 * @brief      Script connects to database and fills the table 'User'
 *             with dummy data. 
 *
 * @author     Talia Deckardt
 */

require_once '../scripts/login.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die($conn->connect_error);

$salt1    = "qm&h*";
$salt2    = "pg!@";


$role = 'user';
$forename = 'Sarah';
$surname  = 'Herb';
$email = 'hello@herb.de';
$username = 'user1';
$password = 'user1';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $role, $forename, $surname, $email,  $username, $token);


$role = 'user';
$forename = 'Emma';
$surname  = 'Bostian';
$email = 'hello@bostian.de';
$username = 'user2';
$password = 'user2';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $role, $forename, $surname, $email,  $username, $token);

$role = 'user';
$forename = 'Maria';
$surname  = 'Schwarz';
$email = 'hello@schwarz.de';
$username = 'user3';
$password = 'user3';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $role, $forename, $surname, $email,  $username, $token);


$role = 'user';
$forename = 'Pauline';
$surname  = 'Jaune';
$email = 'hello@jaune.de';
$username = 'user4';
$password = 'user4';
$token    = hash('ripemd128', "$salt1$password$salt2");

add_user($conn, $role, $forename, $surname, $email,  $username, $token);

function add_user($conn, $rl, $fn, $sn,  $em, $un, $pw)
{
$query  = "INSERT INTO Users (role, forename, surname, email, username, password) VALUES ('$rl','$fn', '$sn', '$em', '$un' ,'$pw')";
$result = $conn->query($query);
if (!$result) die($conn->error);
}


$conn->close();
?>