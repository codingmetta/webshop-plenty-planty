<?php 
/**
 * Script gets called after the Log In to start a session, 
 * saves the users meta-information to the session,
 * and redirects the user.
 *
 * @author Talia Deckardt
 */
  session_start();

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];
    $role     = $_SESSION['role'];

    echo "Welcome back $forename.<br>
          Your full name is $forename $surname.<br>
          Your username is '$username'
          and your password is '$password'.
          Your role is '$role'.
          Please <a href='../index.php'>click here</a> to Home.";
  }
  else echo "Please <a href='../pages/login.php'>click here</a> to Log In.";
?>