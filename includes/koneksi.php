<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$name = "db_ditama";

	$koneksi = mysqli_connect($host, $user, $pass, $name);

	if(mysqli_connect_errno()) {
		echo "Error Code: ";
		echo mysqli_connect_errno();
		die("<br />Failed to connect to database because " . mysqli_connect_error());
	}
?>