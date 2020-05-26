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
    <button type="submit" class="registerbtn">Sign me up!</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Log in</a>.</p>
  </div>
</form>



</body>
</html>