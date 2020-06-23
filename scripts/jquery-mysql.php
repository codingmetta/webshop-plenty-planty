<?php
require 'login.php';
	
	$conn =mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn, $dbname);
	
	$req = "SELECT name FROM Products WHERE name LIKE '%".$_REQUEST['term']."%' "; 
	$query = mysqli_query($conn,$req);

	while($row = mysqli_fetch_array($query)) {
		$results[] = array('label' => $row['name']);
	}
	
	echo json_encode($results);
?>