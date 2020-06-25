<?php
    require '../scripts/popover.php';
    session_start();

    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $loggedin = TRUE;
        $role     = $_SESSION['role'];
    }
    else $loggedin = FALSE;
?>    
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
<!--**************************** NOT WORKING YET: ********************************* 
    jQuery Script trying to fetch reviews from products by ajax call-->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        "html":true,
        "content": function(){
            return details();
        }
    });
});

function details(){
    //$.get('../scripts/popover.php');
    let string='supi';
    return string;
}
</script>
<!-- *****************************************************************************-->


<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
  <a class="navbar-brand" href="../index.php">Plenty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

<!-- Links -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Plants
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item active" href="showAllProducts.php">All Plants</a>
            <a class="dropdown-item" href="#">Easygoing</a>
            <a class="dropdown-item" href="#">Big Plants</a>
            <a class="dropdown-item" href="#">Air Cleaner</a>
            </div>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>
    </ul>


<!-- ******NOT WORKING YET: Trying to implement a dynamic search for products ****-->
    <script>
    /*
        $(function() {
        $("#search").autocomplete({
                    source:'../scripts/jquery-mysql.php',
            })
        });
    */
    </script>
    <form action="" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" id="search" type="search" onsearch="showHint(this.value)" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
<!-- *****************************************************************************-->


<?php
  if ($loggedin && $role=='user')
  {
    
    echo    '<ul class="navbar-nav navbar-right">' .
                '<li class="nav-item dropdown">' . 
                    '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    ' My Profile' .
                    '</a>' .
                    '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' .
                    '<a class="dropdown-item" href="showMyOrders.php">My Orders</a>'.
                    '<a class="dropdown-item" href="#">My Reviews</a>' .
                    '</div>' .
                '</li>'.
                '<li class="nav-item">' .
                '<a class="nav-link text-danger" href="../scripts/destroySession.php"> Log Out </a></li>' .
            '</ul>'; 
    } else {
        echo    '<ul class="navbar-nav navbar-right">' .
                '<li class = "nav-item">' .
                '<a  class="nav-link" href="loginUser.php">Log In</a>' .
                '</li>' .
                '<li class="nav-item">' .
                '<a class="nav-link text-success" href="registration.php"> Sign Up </a></li>' .
            '</ul>'; 
    } 
?>
</nav>
<br> <br><br> 

<!--Products listed as responsive cards retrieved from table 'Products'-->
<div class="container">
<div class="card-columns">

<?php
require '../scripts/login.php';
//Create Connection to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

//Query fetches data as associated array and individual cards for products are created
$sql = "SELECT name, price, description, amount, img_path, product_id FROM Products";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_assoc($resultset) ) {
?>
<div class="card hovercard">
    <div class="cardheader">
        <div class="avatar">
        <img class="img-fluid" alt="plant" src="<?php echo $record['img_path']; ?>" style="width:100%; height:17vw; object-fit:cover"> 
        </div>
    </div>
    
    
    <div class="card-body ">
        <div class="card-title">
            <h4><?php echo $record['name']; ?></h4>
        </div>
        <div class="card-text"> 
            <h6><?php echo $record['price']; ?> €</h6>
        </div>
        <hr>
        <div class="desc">
            <?php echo $record['description']; ?>
        </div>


        <!-- Placeholding implementation for star rating system -->
        <div class="rating d-flex justify-content-end">
            <ul class="row rating" style="list-style-type:none; margin-right:2%; margin-top:4%; margin-bottom: -1.5%">
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
            </ul> 
        </div>
        
        <div class="container  d-flex  justify-content-end" id="popup-request">
            <a href="#" id="review-popup" data-toggle="popover" data-trigger="focus" title="Reviews">Reviews</a>
        </div>
        

    </div>
    
    <!-- Data submitted hidden to php script to make a purchase and update product amount in stock-->
    <div class="card-footer">
        <div class="d-flex justify-content-between" style="display:flex">
            <div class="desc" id="btn-buy">
                    <form name="form" action="../scripts/order-submit.php" method="post">
                    <input type = "hidden" name ="product_price" value ="<?php echo $record['price']; ?>" />
                    <input type = "hidden" name ="product_name" value ="<?php echo $record['name']; ?>" />
                    <input type = "hidden" name ="product_id" value ="<?php echo $record['product_id']; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Buy</button>
                    </form>
            </div>
            <div class="desc" id="lbl-stock" style="margin-top:3%; font-size:14px">
                 <?php echo $record['amount']; ?> left in Stock
            </div>
        </div>
    </div>
    
</div>

<?php } ?>
</div>
</div>
</body>
</html>