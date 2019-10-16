<?php

$conn = mysqli_connect("127.0.0.1", "root", "password");

if (mysqli_query($conn, "CREATE DATABASE minishop")) {
	echo "Database created successfully\n";
	$sql = file_get_contents('minishop.sql');

	$mysqli = new mysqli("127.0.0.1", "root", "password", "minishop");
	if (mysqli_connect_errno()) { /* check connection */
		printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}

	/* execute multi query */
	if ($mysqli->multi_query($sql)) {
		echo "Import Successful\n";
	} else {
		echo "Import Failed\n";
	}

 } else {
	echo "Error creating database: " . mysqli_error($conn) . "\n";
 }

 mysqli_close($conn);

?>