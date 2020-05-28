<?php
/**
 * Script checks if connection to database is possible 
 *
 * @author Talia Deckardt
 */
require_once 'login.php';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$conn = null;


?>