<?php 
/**@file        deleteProduct-submit.php
 * @brief      Script connects to database and deletes a certain Product 
 *             from the database, depending on the submitted Product ID by admin.
 *
 * @author     Talia Deckardt
 */
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete= $_POST['delete'];

session_start();
if (isset($_SESSION['username']))
{
    $loggedin = TRUE;
    $role = $_SESSION['role'];
}
else $loggedin = FALSE;

//Script checks if user is admin and has the permission to delete a product
if ($loggedin && $role='admin'){
    delete_product($conn, $delete);
} else {
    echo "Restricted area. Please <a href='../index.php'>click here</a> to go back to the Homepage.";
}



/** @fn     'Delete Product' 
 * @brief   Deletes  Product by Product ID from table 'Products'
 */
function delete_product($conn, $del)
{
$sql = "DELETE FROM Products WHERE product_id='$del'";
if ($conn->query($sql) === TRUE) {
  echo "Product successfully deleted.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>