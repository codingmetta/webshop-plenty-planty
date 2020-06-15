<!DOCTYPE HTML>
<html>  
<head>
 <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>


<!--Products listed as responsive Cards retrieved from table "Products"  -->
<div class="container">
<div class="card-columns">
<?php
require '../scripts/login.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT product_id, name, price, description, amount, img_path FROM Products";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_assoc($resultset) ) {
?>
<div class="card hovercard">
    <div class="cardheader">
        <div class="avatar">
        <img alt="" src="<?php echo $record['img_path']; ?>"> 
        <!--<img alt="test" src="../img/fiddle_fig00_570x570.jpg" > --> 
        </div>
    </div>
    
    
    <div class="card-body ">
        <div class="title">
            <h3><?php echo $record['name']; ?></h3>
        </div>
        <div class="desc"> 
            <h5><?php echo $record['price']; ?> €</h5>
        </div>
        <hr>
        <div class="desc">
            <?php echo $record['description']; ?>
        </div>
        <!-- Placeholder only! Implementation for rating system not done yet -->
        <div class="rating d-flex justify-content-end">
            <ul class="row rating" style="list-style-type:none; margin-right:2%">
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
            </ul> 
        </div>
    </div>
    
    <div class="card-footer">
        <div class="d-flex justify-content-between" style="display:flex">
            <div class="desc" id="btn-buy">
                <form> 
                <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Buy</button>
                </form>
            </div>
            <div class="desc" id="lbl-stock" style="margin-top:3%; font-size:14px">
                 <?php echo $record['amount']; ?> left in Stock 
            </div>
        </div>
    </div>
    
<!--
<div class="card-footer bottom">
<a class="btn btn-primary btn-twitter btn-sm" href="<?php echo $record['twitter']; ?>">
<i class="fa fa-twitter"></i>
</a>
<a class="btn btn-danger btn-sm" rel="publisher"
href="<?php echo $record['gplus']; ?>">
<i class="fa fa-google-plus"></i>
</a>
<a class="btn btn-primary btn-sm" rel="publisher"
href="<?php echo $record['facebook']; ?>">
<i class="fa fa-facebook"></i>
</a>
</div>
-->
</div>

<?php } ?>
</div>
</div>
</body>
</html>