<?php
/**@file        order-submit.php 
 * @brief      Script connects to database and saves the order 
 *             purchased by the user to table 'Orders'. 
 * 
 * @author     Talia Deckardt
 */ 
require 'login.php';

session_start();
if (isset($_SESSION['username']))
{
    $usern = $_SESSION['username'];
    $loggedin = TRUE;
    $role = $_SESSION['role'];
}
else $loggedin = FALSE;

$conn = new mysqli($servername, $username, $password, $dbname);

//Fetch submitted data
$product_id = $_POST['product_id'];
$order_amount = 1;
$today = date("Y-m-d");
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];


//Check if the registered user has the role 'user'
if ($loggedin && $role='user'){
        update_orders($conn, $product_id, $product_name, $product_price, $usern, $order_amount, $today);
        update_individual_amount($conn, $product_id, $order_amount); 
} else {
//Attempt fails when user is not registered
    echo "Please <a href='../pages/loginUser.php'>Log In</a> to order a product.";
}
 
/** @fn 'Update Orders' 
* @brief Add new Order to table 'Orders' for individual user
*/
function update_orders($conn, $pid, $pn, $pp, $un, $oa, $td) {

    $sql = "INSERT INTO Orders (product_id, product_name, product_price ,username, order_amount, order_date) VALUES ('$pid','$pn','$pp','$un','$oa', '$td')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New Order sent.Go back to <a href='../pages/showAllProducts.php'>our Products</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

/** @fn 'Update Product Amount' 
 * @brief Updates Amount of a Product in Stock after an Order by a user
 */
function update_individual_amount($conn, $pid, $nam){

    //get old amount
    $query = "SELECT amount FROM Products WHERE product_id='$pid'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $old_amount =$row["amount"];
        }
    } else {
        echo "0 results";
    }

    //calculate new amount
    $new_amount = $old_amount-$nam;
    
    //push updated amount to column 'amount' in table 'Products'
    $sql = "UPDATE Products SET amount='$new_amount' WHERE product_id='$pid'";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>