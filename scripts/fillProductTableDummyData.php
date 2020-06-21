<?php
/**
 * Script connects to database and fills the Productcatalogue
 * with dummy data. 
 *
 * @author Talia Deckardt
 */
require 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO Products (name, description, price, amount, img_path)
VALUES ('Sanseviera', 'sansevieria trifasciata | oxygen producer | tropical asia and africa', '11.95','65', '../img/sanseviera.jpg'),
        ('Monstera', 'monstera deliciosa | air-cleansing | latin america', '23.95','42','../img/monstera.jpg'),
        ('Fiddle Leaf', 'ficus lyrata | big leaves | rainforest west-africa', '39.95','17','../img/ficus.jpg'),
        ('Monkey Mask', 'monstera adansoni | air-cleansing | latin america', '12.95','95','../img/monkeymask.jpg'),
        ('Ariod Palm', 'zamioculcas zamiifolia | beginner-friendly | tansania', '17.95','71','../img/zamio.jpg'),
        ('Money Tree', 'pachira aquatica | beginner-friendly | latin america', '23.95','111','../img/pachira.jpg'),
        ('Banana Plant', 'musa paradisiaca | fast-growing | subtropical asia', '8.95','21','../img/musa.jpg')";

if ($conn->query($sql) === TRUE) {
  echo "Productlist successfully filled with dummydata.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>