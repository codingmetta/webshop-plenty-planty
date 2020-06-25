<?php
/**@file        popover.php 
 * @brief      ****NOT WORKING YET***
 *             Script connects to database and returns the review for a 
 *             certain product as a string.
 *
 * @author     Talia Deckardt
 */
echo showReview();
function showReview() {
    require 'login.php';
    $c = new mysqli($servername, $username, $password, $dbname);
 
    $sql = "SELECT review FROM Orders INNER JOIN Products ON Orders.product_name= Products.name WHERE review IS NOT NULL";
    $result = $c->query($sql);

    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            $string=$row[0];
            echo $string;
            //echo '<div id="test">Hello, World!</div>';
        } 
    } else {
        echo "0 results";
    }
    $c->close();
}

?>