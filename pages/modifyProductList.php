<!DOCTYPE html>
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
    <style>
    #delete-group {margin:25px;}
    #update-group {margin:25px;}
   
    </style>
</head>

<body>
<div class="container-fluid" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-item nav-link" href="#">Log Out</a>
            </li>
        </ul>
    </nav>

    <br> <br>

    <div class="container-fluid">
        <div class="card-columns d-flex flex-row justify-content-center">
            <!--Left Card to creates Products-->
            <div class="card bg-info text-light" id="left-card" style="max-width:22% ">
                <div class="card-header">
                <br>
                    <h2> <i class="fas fa-pencil-ruler" style="margin:3%"></i>Create Product</h2>
                        <br>
                        <p>Please fill out these fields to create a new product.</p>
                </div>
                <div class="card-body">
                    <form name= "form" action="../scripts/createProduct-submit.php" method="post">
                        <br>  
                        <label for="productname"><b>Productname    </b></label>
                        <input type="text" placeholder="e.g. Ufo Plant " name="product_name" id="product_name" required>
                        <br>
                        
                        <label for="price"><b>Price in €    </b></label>
                        <input type="text" placeholder="e.g. 12.95 " name="price" id="price" required> 
                        <br><br> 

                        <label for="amount"><b> Amount in Stock  <br> </b></label>
                        <br>
                        <input type="number"  name="amount" id="amount" required>
                         <br> <br><hr><br>

                        <label for="img_path"><b> Relative Image Path </b></label>
                        <input type="text" placeholder="e.g. ../img/pilea.jpg" name="img_path" id="img_path" required>
                    
                       
                        <br> <br>

                        <label for="description"><b>Description</b></label><br>
                        <p style="text-size: 6px">e.g. pilea peperomioides | beginner-friendly | southern china</p>
                        <textarea type="text" name="description" id="description" rows="4" cols="24" style="" required>
                        </textarea>
                          <br><br> <hr><br> <br>  
                        <button type="submit" class="btn btn-block btn-dark"><i class="fas fa-plus"></i>  Add Product</button>
                    </form>
                </div>
            </div>
        <div>

        

        <!--Right Card displaying Products from db-->
        <div class="card d-flex bg-light justify-content-center" id="right-card" style="min-width: 1100px;max_width:78%; padding: 3.5%" >
            <div class="card-head">
                <br> <br>
                <h1 class="text-center"> Welcome back, Admin! </h1>
            </div>
            <div class="card-body">
                <br> 
                <h3><i class="fas fa-th-list" style="margin:2%"></i>  Product List </h3>
                <br>
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
                <br>
                <hr>

                <div class="d-flex flex-row justify-content-between">
                    <div id="update-group" class="card text-white bg-secondary  p-2" style="max-width: 40%">
                        <div class="card-header">
                        <h5> Update Product Amount in Stock </h5>       
                        </div>
                        <div class="card-body">
                            <form name= "alterProductAmount" action="../scripts/alterProductAmount-submit.php" method="post">
                            <label for="pid">
                            <input type="text" placeholder="Product ID" name="pid" id="pid" required>
                            </label> 
                            <input type="number" placeholder="New Amount" name="newamount" id="newamount" required>
                            <hr> <br> 
                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-sync-alt"></i>  Update </button>
                            </form>
                        </div>
                    </div>
                
                    <div id="delete-group" class="card text-white bg-dark p-2" style="max-width: 25%" >
                        <div class="card-header">
                            <h5> Delete Product </h5>
                        </div>
                        <div class="card-body">
                            <label for="delete">
                      
                            <form name= "deleteProduct" action="../scripts/deleteProduct-submit.php" method="post">
                            <input type="text" placeholder="Product ID" name="delete" id="delete" required></label>
                       
                        <br> <br> <br> <hr> <br>
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i> Delete </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
</div>
</body>
</html>