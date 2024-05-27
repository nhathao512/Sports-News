<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "iovq1r3ujzst_webtintuc";
	$conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, 'utf8');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
    }
	
?>
