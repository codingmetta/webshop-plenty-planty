<?php 
/**@file        deleteUser-submit.php
 * @brief      Script connects to database and deletes a certain Product 
 *             from the database, depending on the submitted User ID by admin.
 *
 * @author     Talia Deckardt
 */
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete= $_POST['remove'];

session_start();
    if (isset($_SESSION['username']))
    {
        $loggedin = TRUE;
        $role = $_SESSION['role'];
    }
    else $loggedin = FALSE;

    if ($loggedin && $role='admin'){
        delete_user($conn, $delete);
    } else {
        echo "Restricted area. Please <a href='../index.php'>click here</a> to go back to the Homepage.";
    }


/** @fn     'Delete Product' 
 * @brief   Deletes  Product by Product ID from table 'Products'
 */
function delete_user($conn, $del)
{
$sql = "DELETE FROM Users WHERE user_id='$del'";
if ($conn->query($sql) === TRUE) {
  echo "User successfully deleted.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>