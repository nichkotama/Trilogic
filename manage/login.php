<?php 
	require_once('../includes/koneksi.php');
	include('../includes/header.php'); 
	session_start();

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$format		= "$2y$10$";
	$hash		= "TrilogicUBMSaltFormats";
	$salt		= $format . $hash;
	$newpass	= crypt($pass, $salt);

	$sql = "SELECT username, password FROM ms_admin WHERE username = '$user' AND password = '$newpass'";
	$hasil = mysqli_query($koneksi, $sql);

	$baris = mysqli_fetch_assoc($hasil);
	if(mysqli_num_rows($hasil) == 0) 
	{
		echo "<div id='warning-box'>Username atau password tidak sesuai, silahkan coba lagi.</div>";
	}
	else
	{
		$_SESSION['login'] = 1;
		header("Location: admin.php");
	}
?>

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
			<td><input type="text" name="user" placeholder="Username" class="input-text" id="user-field" 
			value="<?php echo $_POST['user'] ?>"required/></td>
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
			<td align="center"><a href="forget-pass.php">Lupa password?</a></td>
		</tr>
    </table>
</form>
</fieldset>
</body>
</html>