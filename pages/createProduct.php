<!DOCTYPE HTML>
<html>  
<head>
 <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>


<form name= "form" action="../scripts/createProduct-submit.php" method="post">
  <div class="container">
    <h1>Create Product</h1>
    <p>Please fill out these fields to create a new product.</p>
    <hr>

    <label for="productname"><b>Productname</b></label>
    <input type="text" placeholder="Enter Name of Product" name="product_name" id="product_name" required>
    
    
    <label for="price"><b>Price in €</b></label>
    <input type="text" placeholder="e.g. 12.99 " name="price" id="price" required> 
    <br> 

    <label for="amount"><b> Amount in Stock </b></label>
    <input type="number"  name="amount" id="amount" required>
 
   <br> <br>
    <label for="description"><b>Description</b></label>
    <input type="text" placeholder="Enter Product Description" name="description" id="description" required>
 
 <hr>

    <button type="submit" class="btn btn-primary">Update Product DB</button>
  </div>
  

</form>



</body>
</html>