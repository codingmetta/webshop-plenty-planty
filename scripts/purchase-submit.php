<?php 
require 'login.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    session_start();

    $product_id = $_POST['product_id'];
    //echo $product_id;

    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $loggedin = TRUE;
    }
    else $loggedin = FALSE;

    $parray= array($product_id=>'Not rated yet.');
    //$parray= array('$product_id'=>'Not rated yet.');
    //$pstring= json_encode($parray);
    $pstring= serialize($parray);
    $realstring = $conn->real_escape_string($pstring);
    update_purchase($conn, $username, $realstring);

    function update_purchase($conn, $un, $rstr)
    {
    $sql = "UPDATE Users SET purchases=('$rstr') WHERE username='$un'";
    //$sql = "UPDATE Users SET purchases='3' WHERE username='$un'";

    if ($conn->query($sql) === TRUE) {
    echo "Product purchased";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
?>