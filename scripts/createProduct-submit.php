<?php 
/**
 * Script adds new product to database, when being called
 * by the submition of productdetails by admin.
 *
 *
 * @author Talia Deckardt
 */

require'login.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$productname = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$amount= $_POST['amount'];
$img_path=$_POST['img_path'];

add_product($conn, $productname, $description, $price, $amount, $img_path);

function add_product($conn, $pn, $dc, $pr, $am, $ip)
{
$sql = "INSERT INTO Products (name, description, price, amount, img_path) VALUES ('$pn','$dc','$pr','$am','$ip')";
if ($conn->query($sql) === TRUE) {
  echo "New record successfully added.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 ?>