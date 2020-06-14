<!DOCTYPE html>
<html>
<body>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT product_id, name, price, amount FROM Products";
$result = $conn->query($sql);

?>
<tbody>
<?php
if ($result->num_rows > 0) {
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



<form name= "deleteProduct" action="../scripts/deleteProduct-submit.php" method="post">

<input type="text" placeholder="Product ID" name="delete" id="delete" required>
<button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Delete </button>
</form>

</div>
</body>
</html>