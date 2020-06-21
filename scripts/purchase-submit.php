<?php /*DEPRECATED*/
/**@file        purchase-submit.php 
 * @brief      Script connects to database and saves the product 
 *             purchased by the user. 
 * 
 * @author     Talia Deckardt
 */ 
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

    $pstring= serialize($parray);
    $realstring = $conn->real_escape_string($pstring);
    update_purchase($conn, $username, $realstring);

    echo '<!DOCTYPE html> <html> <body>';
    get_purchaseList($pstring);
    echo '</body></html>';

    function update_purchase($conn, $un, $rstr)
    {
    $sql = "UPDATE Users SET purchases=('$rstr') WHERE username='$un'";

    if ($conn->query($sql) === TRUE) {
    echo "Product purchased";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }

    
    function get_purchaseList($parr){
        $test=unserialize($parr);
        var_dump($test);    
    }

    function push_purchase($parr){
        $temp=unserialize($parr);
        array_push($test, );    
    }
?>