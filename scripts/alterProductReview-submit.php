<?php 
/**@file        alterProductReview-submit.php
 * @brief      Script connects to database and alters the review of an order 
 *             made by a user by its id
 *
 * @author     Talia Deckardt
 */
require 'login.php';

$conn = new mysqli($servername, $username, $password, $dbname);

$review= $_POST['review'];
$order_id= $_POST['order_id'];


session_start();
    if (isset($_SESSION['username']))
    {
        $loggedin = TRUE;
        $role = $_SESSION['role'];
    }
    else $loggedin = FALSE;

    //Script checks if user is loggedin and has role 'user' to review an already ordered product
    if ($loggedin && $role='user'){
        update_review($conn, $order_id, $review);
    } else {
        echo "Restricted area. Please <a href='../index.php'>click here</a> to go back to the Homepage.";
    }

/** @fn 'Update Product Amount' 
 * @brief Updates Amount  'Admin' to table 'Users'
 */
function update_review($conn, $oid, $rev)
{
$sql = "UPDATE Orders SET review='$rev' WHERE order_id='$oid'";
if ($conn->query($sql) === TRUE) {
  echo "Thank you for your review.Please <a href='../index.php'>click here</a> to go back to the Homepage.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>