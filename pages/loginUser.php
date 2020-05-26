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



</body>
</html>