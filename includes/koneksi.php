<?php
	$host = "localhost";
	$user = "k6911360_ditama";
	$pass = "ditama";
	$name = "k6911360_ditama";

	$koneksi = mysqli_connect($host, $user, $pass, $name);

	if(mysqli_connect_errno()) {
		echo "Error Code: ";
		echo mysqli_connect_errno();
		die("<br />Failed to connect to database because " . mysqli_connect_error());
	}
?>