<?php
	$string = file_get_contents("config.json");
	$json_a = json_decode($string, true);
	$servername = $json_a['servername'];
	$username = $json_a['username'];
	$passwd = $json_a['password'];
	$database = $json_a['database'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $passwd,$database);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_set_charset($conn, "utf8");
	//echo "Connected successfully";
?>