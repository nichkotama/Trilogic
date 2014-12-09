<?php include('../includes/header.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Trilogic CMS</title>
</head>
<body>
<fieldset id="login-field">
<legend>Login Page</legend>
<form action="login.php" method="post">
    <table width="300" cellspacing="0" id="login-table">
		<tr>
			<td><input type="text" name="user" placeholder="Username" class="input-text" id="user-field" required/></td>
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
			<td align="center"><a href="forget-pass.php">Lupa password</a></td>
		</tr>
    </table>
</form>
</fieldset>
</body>
</html>