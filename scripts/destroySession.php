<?php
header('Clear-Site-Data: "*"');

if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];

	destroySession();
    echo "Welcome back $forename.<br>
          Your full name is $forename $surname.<br>
          Your username is '$username'
          and your password is '$password'.";
  }
    echo "Destroyed Session.Please <a href='../pages/loginUser.php'>click here</a> to log in.";


  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');
    session_unset();
    session_destroy();
  }

?>