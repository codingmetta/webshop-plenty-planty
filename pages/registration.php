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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Plants
        </a>
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
        <li class = "nav-item">
        <a  class="nav-link" href="loginUser.php">Log in</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link text-success" href="registration.php"> Sign up </a></li>
    </ul>
</nav>
<br> <br><br> 

<form name= "form" action="../scripts/registration-submit.php" method="post">
  <div class="container">
    <h1>Sign up</h1>
    <p>Please fill out these fields to create your account.</p>
    <hr>

    <label for="forename"><b>First Name</b></label>
    <input type="text" placeholder="Enter your first name" name="forename" id="forename" required>

    <label for="surname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your last name" name="surname" id="surname" required>

    <label for="email"><b>Your e-mail</b></label>
    <input type="text" placeholder="Enter your e-mail adress" name="email" id="email" required>

    <label for="username"><b>Your username</b></label>
    <input type="text" placeholder="Enter an username" name="username" id="username" required>

    <label for="psw"><b>Choose password</b></label>
    <input type="password" placeholder="Enter a password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat password</b></label>
    <input type="password" placeholder="Repeat the password" name="password-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn btn-block">Sign me up!</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="loginUser.php">Log in</a>.</p>
  </div>
</form>



</body>
</html>