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

        <!--Drop Down Menu-->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plants</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="showAllProducts.php">All Plants</a>
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

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class = "nav-item active">
        <a  class="nav-link" href="loginUser.php">Log in</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-success" href="registration.php"> Sign up </a></li>
    </ul>
</nav>
<br><br><br> 


<!--Form to enter Log In Data-->
<div class="container" style="min-width:20%; max-width: 45%">
<form name= "form" action="../scripts/loginUser-submit.php" method="post">
    <div class="container">
        <h1>Log in</h1>
        <p>Please enter your username and password to log into your account.</p>
        <hr>

        <label for="username"><b>Your username</b></label>
        <input type="text" placeholder="Enter your username" name="username" id="username" required>

        <label for="psw"><b>Your password</b></label>
        <input type="password" placeholder="Enter your password" name="password" id="psw" required>

        <button type="submit" class="loginbtn">Log me in!</button>
    </div>

    <div class="container verification">
    <p>Forgot your password? <a href="#">Send verification e-mail.</a>.</p>
    </div>
</form>
</div>

</body>
</html>