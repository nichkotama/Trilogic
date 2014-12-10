<?php 
	include('../includes/header.php'); 
	session_start();
	if (isset($_SESSION['login']) && $_SESSION['login'] = 1){
		header('Location:admin.php');
	}
	if(isset($_SESSION['pesan']) && $_SESSION['pesan'] != null) 
	{
		echo "<div id='warning-box'>Anda harus login terlebih dahulu.</div>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<script>
function setFocusToTextBox(){
    document.getElementById("user-field").focus();
}
</script>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Trilogic CMS</title>
</head>
<body oncontextmenu="return false;" onload="setFocusToTextBox()"> 
<fieldset id="login-field">
<legend>Login Page</legend>
<form action="login.php" method="post">
    <table width="300" cellspacing="0" id="login-table">
		<tr>
			<td><input type="text" name="user" placeholder="Username" class="input-text" id="user-field" required autocomplete="off"/></td>
		</tr>
		<tr>
			<td><input type="password" name="pass" placeholder="Password" class="input-text" id="pass-field" required/></td>
		</tr>
		<tr>
			<td align="center">
				<input type="submit" name="login" value="Log In" id="blue-btn"/>
				<input type="reset" name="reset" value="Reset" id="blue-btn"/>
			</td>
		</tr>
		<tr>
			<td align="center"><a href="forget-pass.php">Forgot password</a></td>
		</tr>
    </table>
</form>
</fieldset>
</body>
</html>