<?php 
session_start();
echo '<!DOCTYPE html>
        <html lang="en">';

if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $loggedin = TRUE;
    $role     = $_SESSION['role'];
}
else $loggedin = FALSE;

/*Head Section and Navigation Bar*/
echo '<head><title>Plenty</title>' . 
    '<link rel="stylesheet" href="css/style.css">' .
    '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">' .
    '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>'.
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>' .
    '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>' .
    '<meta charset="utf-8">' .
    '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'.
    '</head>' .
    '<body>'.
    '<nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">'.
    '<a class="navbar-brand" href="index.php">Plenty</a>' .
    '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">' .
    '<span class="navbar-toggler-icon"></span>' .
    '</button>';

  /*Parts of Navbar that can be seen when user is loggedin*/  
  if ($loggedin && $role=='user')
  {
    echo  '<div class="collapse navbar-collapse" id="navbarSupportedContent">' .
            '<ul class="navbar-nav mr-auto">' .
                '<li class="nav-item active">' .
                    '<a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>' .
                '</li>' .
                '<li class="nav-item dropdown">' . 
                    '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    ' Plants' .
                    '</a>' .
                    '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' .
                    '<a class="dropdown-item" href="pages/showAllProducts.php">All Plants</a>'.
                    '<a class="dropdown-item" href="#">Easygoing</a>' .
                    '<a class="dropdown-item" href="#">Big Plants</a>' .
                    '<a class="dropdown-item" href="#">Air Cleaner</a>' .
                    '</div>' .
                '</li>'.
                '<li class="nav-item">' .
                '<a class="nav-link" href="#">About</a>' .
                '</li>' .
                '<li class="nav-item">' .
                '<a class="nav-link" href="#">Contact</a>' .
                '</li>'.
            '</ul>' .
            '<form class="form-inline my-2 my-lg-0">' .
            '<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">' .
            '<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>' .
            '</form>' .
                '<ul class="navbar-nav navbar-right">' .
                '<li class="nav-item dropdown">' . 
                    '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    ' My Profile' .
                    '</a>' .
                    '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' .
                    '<a class="dropdown-item" href="pages/showMyOrders.php">My Orders</a>'.
                    '</div>' .
                '</li>'.
                '<li class="nav-item ">' .
                '<a class="nav-link text-danger" href="scripts/destroySession.php"> Log Out </a></li>' .
            '</ul>' .
        '</nav>';
        }
    /*Parts that can be seen when admin is loggedin*/    
    else if ($loggedin && $role=='admin')
  {
    echo  '<div class="collapse navbar-collapse" id="navbarSupportedContent">' .
            '<ul class="navbar-nav mr-auto">' .
                '<li class="nav-item active">' .
                '<a class="nav-link" href="pages/modifyProductList.php">Products</a>' .
                '</li>' .
                '<li class="nav-item">' .
                '<a class="nav-link" href="pages/modifyUserList.php">Costumers</a>' .
                '</li>'.
            '</ul>' .
            '<ul class="navbar-nav navbar-right">' .
                '<li class="nav-item ">' .
                '<a class="nav-link text-danger" href="scripts/destroySession.php"> Log Out </a></li>' .
            '</ul>' .
        '</nav>';  }
    /*Parts that are seen when not user is not loggedin yet*/    
    else
  {  
    echo    '<div class="collapse navbar-collapse" id="navbarSupportedContent">' .
            '<ul class="navbar-nav mr-auto">' .
                '<li class="nav-item active">' .
                    '<a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>' .
                '</li>' .
                '<li class="nav-item dropdown">' . 
                    '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    'Plants' .
                    '</a>' .
                    '<div class="dropdown-menu" aria-labelledby="navbarDropdown">' .
                    '<a class="dropdown-item" href="pages/showAllProducts.php">All Plants</a>'.
                    '<a class="dropdown-item" href="#">Easygoing</a>' .
                    '<a class="dropdown-item" href="#">Big Plants</a>' .
                    '<a class="dropdown-item" href="#">Air Cleaner</a>' .
                    '</div>' .
                '<li class="nav-item">' .
                '<a class="nav-link" href="#">About</a>' .
                '</li>' .
                '<li class="nav-item">' .
                '<a class="nav-link" href="#">Contact</a>' .
                '</li>'.
            '</ul>' .
            '<form class="form-inline my-2 my-lg-0">' .
            '<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">' .
            '<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>' .
            '</form>' .
                '<ul class="navbar-nav navbar-right">' .
                '<li class = "nav-item">' .
                '<a  class="nav-link" href="pages/loginUser.php">Log In</a>' .
                '</li>' .
                '<li class="nav-item">' .
                '<a class="nav-link text-success" href="pages/registration.php"> Sign Up </a></li>' .
            '</ul>' .
        '</nav>';
    }
/*Bootstrap Carousel that shows some use cases for the products and the footer*/
echo    '<div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval= "5000" >' .
            '<div class="carousel-inner">' .
                '<div class="carousel-item active">' .
                '<img src="img/car-man.jpg"  class="d-block w-100" alt="Man sniffs a flower" >' .
                '<div class="carousel-caption" style="position:absolute; top:15%; right: 5% ; font-size: 500%; text-align:right">' .
                '<p>For real <br>plant lovers</p>' .
                '</div>' .
                '</div>' .

                '<div class="carousel-item">' .
                '<img src="img/car-boy.jpg" class="d-block w-100"  alt="A Child holding a plant">' .
                '<div class="carousel-caption" style="position:absolute; top:10%; left: 4% ; font-size: 500%; text-align:left">' .
                '<p>For small<br> beginnings</p>' .
                '</div>' .
                '</div>' .

                '<div class="carousel-item">' .
                '<img src="img/car-laptop.jpg" class="d-block w-100" alt="Woman doing Homeoffice" >' .
                '<div class="carousel-caption" style="position:absolute; top:12%; right: 5% ; font-size: 500%; text-align:right">' .
                '<p>For your <br>home office</p>' .
                '</div>' .
                '</div>' .
                
                '<div class="carousel-item">' .
                '<img src="img/car-women.jpg" class="d-block w-100" alt="Women talking to each other on a couch" >' .
                '<div class="carousel-caption" style="position:absolute; top:12%; left: 4% ; font-size: 500%; text-align:left">' .
                '<p>For your <br>urban jungle</p>' .
                '</div>' .
                '</div>' .

                '<div class="carousel-item">' .
                '<img src="img/car-wooden.jpg" class="d-block w-100" alt="A Cat on a wooden shelf" >' .
                '<div class="carousel-caption" style="position:absolute; top:15%; right: 5% ; font-size: 500%; text-align:right">' .
                '<p>For your <br>furry friends</p>' .
                '</div>' .
                '</div>' .
        '</div>' .
            '</div>' .
        '</body>' .

        '<div class="jumbotron text-center text-secondary" style="margin-bottom:0">' .
        '<p>©2020 made with ♥ by codingmetta</p>' .
        '</div>' .
        '</html>';
?>
