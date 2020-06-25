<?php 
/**@file        loginUser-submit.php 
* @brief      Script connects to database and gets submitted username 
*             and password inserted to the login prompt by the user.
*             The script checks if the username exists and if the given
*             password is correct. If its correct the session gets filled
*             with the users credentials and the user is now logged in.
*
* 
* @author     Gordon Mueller, Talia Deckardt
*/
require_once 'login.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die($conn->connect_error);

if (isset($_SERVER['PHP_AUTH_USER']) &&
isset($_SERVER['PHP_AUTH_PW']))
{
$un_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
$pw_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);

$query = "SELECT * FROM Users WHERE username='$un_temp'";
$result = $conn->query($query);

if (!$result) die($conn->error);
elseif ($result->num_rows)
{
    $row = $result->fetch_array(MYSQLI_NUM);

    $result->close();

    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('ripemd128', "$salt1$pw_temp$salt2");
    
    if ($token == $row[6])
    {
        session_start();
        $_SESSION['username'] = $un_temp;
        $_SESSION['password'] = $pw_temp;
        $_SESSION['forename'] = $row[2];
        $_SESSION['surname']  = $row[3];
        $_SESSION['role'] = $row[1];
        echo "$row[2] $row[3] : Hi $row[2],
            you are now logged in as '$row[5]'";
        die ("<p><a href='../index.php'>Click here to continue</a></p>");
    }
    else die("Invalid username/password combination");
}
    else die("Invalid username/password combination");
} else {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
}

$conn->close();

 
/** @fn 'HTMLentities' 
* @brief Returns all signs as html code
* @author  Gordon Mueller
*/
function mysql_entities_fix_string($conn, $string){
    return htmlentities(mysql_fix_string($conn, $string));
}	

 
/** @fn 'Fix String' 
* @brief Deletes masking signs and whitespaces from String; 
*        get_magic-quotes_gpc() is deprecated since PHP 5.4.0.
* @author  Gordon Mueller
*/
function mysql_fix_string($conn, $string){
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $conn->real_escape_string($string);
}
?>