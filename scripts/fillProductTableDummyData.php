<?php
require 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Products (name, description, price, amount, img_path)
VALUES ('Sanseviera', 'sansevieria trifasciata | oxygen producer | tropical asia and africa', '11.95','65', '../img/fiddle_fig00_570x570.jpg'),
        ('Monstera', 'monstera deliciosa | air-cleansing | latin america', '23.95','42','../img/fiddle_fig00_570x570.jpg'),
        ('Fiddle Leaf', 'ficus lyrata | big leaves | rainforest west-africa', '39.95','17','../img/fiddle_fig00_570x570.jpg'),
        ('Monkey Mask', 'monstera adansoni | air-cleansing | latin america', '12.95','95','../img/fiddle_fig00_570x570.jpg'),
        ('Ariod Palm', 'zamioculcas zamiifolia | beginner-friendly | tansania', '17.95','71','../img/fiddle_fig00_570x570.jpg'),
        ('Money Tree', 'pachira aquatica | beginner-friendly | latin america', '23.95','111','../img/fiddle_fig00_570x570.jpg'),
        ('Banana Plant', 'musa | fast-growing | subtropical asia', '8.95','21','../img/fiddle_fig00_570x570.jpg')";

if ($conn->query($sql) === TRUE) {
  echo "Productlist successfully filled with dummydata.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>