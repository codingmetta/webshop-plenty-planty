<?php 
/**@file        registration-submit.php 
 * @brief      Script connects to database and registers a 
 *             new user with submitted data. 
 * 
 * @author     Talia Deckardt
 */
require'login.php';

$conn = new mysqli($servername, $username, $password, $dbname);

$salt1    = "qm&h*";
$salt2    = "pg!@";

$role = 'user';
$forename = $_POST['forename'];
$surname  = $_POST['surname'];
$email = $_POST['email'];
$un = $_POST['username'];
$passw = $_POST['password'];
$repassw = $_POST['password-repeat'];
$token = hash('ripemd128', "$salt1$passw$salt2");

$check_passed = check_password($passw, $repassw);

if ($check_passed){
    add_user($conn, $role, $forename, $surname, $email, $un, $token);
    echo 'You successfully signed up. Please <a href="../pages/loginUser.php">click here</a> to log in. ';
} else {
    echo 'Repeated Password is incorrect. Please try again.';
}

/** @fn 'Double Check Password' 
 * @brief Checks if both entered passwords are the same
 */
function check_password($pw, $rpw){
    if($pw == $rpw){
        return true;
    } else {
        return false;
    }
}

/** @fn 'Add User' 
 * @brief Adds user with given credentials to table 'Users'
 */
function add_user($conn, $rl, $fn, $sn, $em, $un, $pw)
{
$sql = "INSERT INTO Users (role, forename, surname, email, username, password) VALUES ('$rl','$fn','$sn','$em', '$un', '$pw')";
if ($conn->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>