<?php
	session_start();
	$_SESSION['login'] = null;
	$_SESSION['pesan'] = null;
	header('Location:../home/index.php');
?>
