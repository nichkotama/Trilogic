<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	
	if(isset($_POST['lupa-pass'])){
		$id = $_POST['id'];
		$uname = $_POST['add-user'];
		$pwd = $_POST['add-pass'];
		$email = $_POST['email'];
		$katahint = $_POST['katahint'];
		
		
		$sql = "SELECT * FROM ms_admin WHERE username = '$uname' AND email = '$email' AND kata_hint = '$katahint'";
		$hasil = mysqli_query($koneksi, $sql);
		if(mysqli_num_rows($hasil) == 0) 
		{
			echo "<div id='warning-box'>Data tidak valid.</div>";
		}
		else{		
			$format		= "$2y$10$";
			$hash		= "TrilogicUBMSaltFormats";
			$salt		= $format . $hash;
			$newpass	= crypt($pwd, $salt);
			
			$sql="UPDATE ms_admin SET password='$newpass'
			WHERE username='$uname'";
			$hasil = mysqli_query($koneksi, $sql);
			header('Location:index.php');
		} 
		
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Forget pass - Trilogic</title>
</head>
<body>
<fieldset id="edit-field">
<legend>Lupa password</legend>
	<form action="forget-pass.php" method="post" name="edit-form-pass">
	<table id="example" class="more">
		<input type="hidden" name="id" value="<?php echo $baris['id'];?>"/>
			<tr>
				<td valign="top" width=15%>Username</td>
				<td><input type="text" name="add-user" value="" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top" width=15%>New Password</td>
				<td><input type="text" name="add-pass" value="" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Email</td>
				<td><input type="email" name="email" value="" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Pertanyaan hint</td>
				<td>
					<select>
						<option>Apa nama pertama ibu anda?</option>
						<option>Siapa nama orang yang anda suka?</option>
						<option>Hewan peliharan anda</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Jawaban hint</td>
				<td><input type="text" name="katahint" value="" placeholder="Masukkan kata pemulihan anda" id="kahint" required autocomplete="off"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="lupa-pass" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='index.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
	</table>
	</form>
</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>