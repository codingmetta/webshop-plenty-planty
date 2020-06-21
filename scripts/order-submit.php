<?php
/**@file        order-submit.php 
 * @brief      Script connects to database and saves the order 
 *             purchased by the user to table 'Orders'. 
 * 
 * @author     Talia Deckardt
 */ 
require 'login.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    session_start();

    $product_id = $_POST['product_id'];
    $order_amount = 1;
    

    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $loggedin = TRUE;
    }
    else $loggedin = FALSE;


    update_orders($conn, $product_id, $username, $order_amount);

 

    function update_orders($conn, $pid, $un, $oa)
    {
    $sql = "INSERT INTO Orders (product_id, username, order_amount) VALUES ('$pid','$un','$oa')";
        if ($conn->query($sql) === TRUE) {
        echo "New Order sent.";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>