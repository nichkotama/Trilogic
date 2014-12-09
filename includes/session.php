<?php
	session_start();
	function check_login(){
		if (!isset($_SESSION['login']) || $_SESSION['login'] != 1){
			$_SESSION['pesan']=1;
			header('Location:index.php');
		}
	}
?>