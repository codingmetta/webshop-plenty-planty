<?php 
/**@file        createProduct-submit.php
 * @brief      Script adds new product to database, when being called
 *             by the submition of productdetails by admin.
 *
 * @author     Talia Deckardt
 */

require 'login.php';

$conn = new mysqli($servername, $username, $password, $dbname);

$productname = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$amount= $_POST['amount'];
$img_path=$_POST['img_path'];


session_start();
if (isset($_SESSION['username']))
{
    $loggedin = TRUE;
    $role = $_SESSION['role'];
}
else $loggedin = FALSE;

//Script checks if user is admin and has the permission to create a product
if ($loggedin && $role='admin'){
    add_product($conn, $productname, $description, $price, $amount, $img_path);
} else {
    echo "Restricted area. Please <a href='../index.php'>click here</a> to go back to the Homepage.";
}


/** @fn 'Add new Product' 
 * @brief Inserts new row filled with given data to table 'Products'
 */
function add_product($conn, $pn, $dc, $pr, $am, $ip)
{
$sql = "INSERT INTO Products (name, description, price, amount, img_path) VALUES ('$pn','$dc','$pr','$am','$ip')";
if ($conn->query($sql) === TRUE) {
  echo "New record successfully added. Please <a href='../pages/modifyProductList.php'>click here</a> to go back to the Product Stock";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>