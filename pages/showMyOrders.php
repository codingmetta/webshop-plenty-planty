<?php
session_start();
if (isset($_SESSION['username']))
{
    $loggeduser = $_SESSION['username'];
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
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Plants
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="showAllProducts.php">All Plants</a>
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
                '<li class="nav-item dropdown active">' . 
                    '<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    ' My Profile' .
                    '</a>' .
                    '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' .
                    '<a class="dropdown-item active" href="showMyOrders.php">My Orders</a>'.
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

<div ="container" style="max-width:75%; padding: 3%">
<!--Card displaying all Orders of the user-->
    <div class="card d-flex bg-light justify-content-center" id="order-card" style="max_width:78%; padding: 3.5%" >
        <div class="card-head">
            <br> <br>
            <h1 class="text-center"> Welcome back <?php echo $loggeduser; ?>!</h1>
        </div>
        <div class="card-body">
            <br> 
            <h3><i class="fas fa-shopping-cart" style="margin:1%"></i>  Your Orders </h3>
            <br>
            <table class="table table-striped table-bordered" id="productList" style="width:99%">
                <thead> 
                    <tr>
                        <th>Order ID</th>
                        <th>Productname</th>
                        <th>Price in € p.P.</th>
                        <th>Ordered Amount</th>
                        <th>Review</th>
                        <th>Date of Order</th>
                    </tr>
                </thead>

                <?php
                require '../scripts/login.php';

                $conn = new mysqli($servername, $username, $password, $dbname);
                                
                $sql = "SELECT order_id, product_name, product_price, order_amount, review, order_date FROM Orders WHERE username='$loggeduser'";
                $result = $conn->query($sql);
                ?>

                <tbody>

                <?php
                if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        echo ' <tr>
                        <td>' . $row[0] .  '</td>
                        <td>' . $row[1] .  '</td>
                        <td>' . $row[2] .  '</td>
                        <td>' . $row[3] .  '</td>
                        <td>' . $row[4] .  '</td>
                        <td>' . $row[5] .  '</td>
                        <tr>';
                    } 
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
            <br>
            <hr>

            <!--Input Fields to review a certain order-->
            <div id="review-group" class="card text-white bg-secondary  p-2" style="max-width: 30%">
                <div class="card-header">
                <h5> Review your Order </h5>       
                </div>
                <div class="card-body">
                    <form name= "alterProductReview" action="../scripts/alterProductReview-submit.php" method="post">
                    <label for="order_id">
                    <input type="text" placeholder="Order ID" name="order_id" required>
                    </label> 
                    <p style="text-size: 6px">Was the ordered product as described? Tell us!</p>
                    <textarea type="text" name="review" id="review" rows="5" cols="42" style="width: 98%" required>
                    </textarea>                           
                    <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-sync-alt" style="margin:2%"></i> Send </button>
                    </form>
                </div>
            </div>

        </div>
    </div>    
    </div>
</body>
</html>