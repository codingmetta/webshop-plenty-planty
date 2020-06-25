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
<!--Card displaying Reviews from certain Products-->
    <div class="card d-flex bg-light justify-content-center" id="review-card" style="max_width:78%; padding: 3.5%" >
        <div class="card-head">
            <br> <br>
            <h1 class="text-center"> Reviews</h1>
        </div>
        
        <div class="card-body">
        <table class="table table-striped table-bordered" id="productList">

        <?php
        /**@file       showProductReview.php
        * @brief      Shows Review from certain user
        *
        * @author     Talia Deckardt
        */ 
        require 'login.php';

        $conn = new mysqli($servername, $username, $password, $dbname);
        //Query to get all reviews for one product that has already been ordered                
        $sql = "SELECT review FROM Orders INNER JOIN Products ON Orders.product_name= Products.name WHERE review IS NOT NULL";
        $result = $conn->query($sql);
        ?>
        <tbody>
        <?php
        
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_array($result)) {

                echo ' <tr>
                <td>"' . $row[0] .  '"</td>
                <tr>';
                
            } 
        } else {
            echo "0 results";
        }
                

        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>