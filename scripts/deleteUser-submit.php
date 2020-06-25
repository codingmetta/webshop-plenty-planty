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

//Script checks if user is admin and has the permission to delete a user
if ($loggedin && $role='admin'){
    delete_user_credentials($conn, $delete);
    delete_user($conn, $delete);
} else {
    echo "Restricted area. Please <a href='../index.php'>click here</a> to go back to the Homepage.";
}


/** @fn     'Delete User' 
 * @brief   Deletes User by given User ID from table 'Users'
 */
function delete_user($conn, $del)
{
$sql = "DELETE FROM Users WHERE username='$del'";
if ($conn->query($sql) === TRUE) {
  echo "User successfully deleted.Please <a href='../pages/modifyUserList.php'>click here</a> to reload.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

function delete_user_credentials($conn, $del)
{
$query = "DELETE FROM Orders WHERE username='$del'";
if ($conn->query($query) === TRUE) {
  //echo "User successfully deleted.";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}

 ?>