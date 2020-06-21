<?php 
/**
 * Script connects to database and deletes a certain Product from the database, 
 * depending on the submitted Product ID by admin.
 *
 *
 * @author Talia Deckardt
 */
require'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$delete= $_POST['delete'];

delete_product($conn, $delete);

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