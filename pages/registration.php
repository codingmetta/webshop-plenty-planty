<!DOCTYPE HTML>
<html>  
<head>
 <link rel="stylesheet" href="../css/style.css">
</head>
<body>


<form name= "form" action="registration-submit.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="forename"><b>First Name</b></label>
    <input type="text" placeholder="Enter your First Name" name="forename" id="forename" required>

    <label for="surname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your Last Name" name="surname" id="surname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>



</body>
</html>