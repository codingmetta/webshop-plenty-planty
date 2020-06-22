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

<!--Right Card displaying Products from db-->
    <div class="card d-flex bg-light justify-content-center" id="right-card" style="max_width:78%; padding: 3.5%" >
        <div class="card-head">
            <br> <br>
            <h1 class="text-center"> Welcome back <?php echo $loggeduser; ?>!</h1>
        </div>
        <div class="card-body">
            <br> 
            <h3><i class="fas fa-shopping-cart" style="margin:1%"></i>  Your Orders </h3>
            <br>
            <table class="table table-striped table-bordered" id="productList">
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
                        <td><a href="review.php">' . $row[0] .  '</a></td>
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
        </div>
    </div>
</body>
</html>