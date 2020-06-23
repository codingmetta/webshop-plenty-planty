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

delete_user($conn, $delete);


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