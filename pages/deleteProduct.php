<!DOCTYPE html>
<html>
<body>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>

<div class="container">
<h2> Product List </h2>
<table class="table table-striped table-bordered" id="productList">
    <thead> 
        <tr>
            <th>Product ID</th>
            <th>Productname</th>
            <th>Price in €</th>
            <th>Amount in Stock</th>
        </tr>
    </thead>

<?php
 require '../scripts/login.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT product_id, name, price, amount FROM Products";
$result = $conn->query($sql);

/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Product ID: ". $row["product_id"]. " | Name: ". $row["name"]. " | Price in €: " . $row["price"]. " | Amount in Stock: " . $row["amount"] ."<br>";
    }
} else {
    echo "0 results";
}*/
?>
<tbody>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo "<tr> 
        <td>" . $row[0] .  "</td>
        <td>" . $row[1] .  "</td>
        <td>" . $row[2] .  "</td>
        <td>" . $row[3] .  "</td>
        </tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</tbody>
</table>



</div>
</body>
</html>