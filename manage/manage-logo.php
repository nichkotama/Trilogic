<?php 
	require_once('../includes/koneksi.php');
	session_start();
	include('../includes/header.php');
	include('../includes/admin-menu.php');
	if (!isset($_SESSION['login']) or $_SESSION['login'] != 1){
		header('Location:index.php');
	}
	
	$sql = "SELECT * FROM ms_logo";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Logo - Trilogic</title>
</head>
<body>
	<form action="" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td>Image</td>
				<td><img src="../assets/images/logo.png"></td>
			</tr>
			<tr>
				<td>New image</td>
				<td><input type="FILE" name="logo" value=""></td>
			</tr>
			<tr>
				<td>Alignment</td>
				<td>
					<select name="align">
						<option value="left">Left</option>
						<option value="center">Center</option>
						<option value="right">Right</option>
					</select>
				</td>
			</tr>
		</table>
	<form>
</body>
</html>