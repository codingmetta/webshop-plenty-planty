<?php 
  /*NOT USED RIGHT NOW*/  
  require 'destroySession.php';

  if (isset($_SESSION['username']))
  {
    destroySession();
    echo "You have been logged out. Please " .
         "<a href='index.php'>click here</a> to refresh the screen.";
  }
  else echo "You cannot log out because you are not logged in";

?>