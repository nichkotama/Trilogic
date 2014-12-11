<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-edit-admin'])){
		$id = $_POST['id'];
		$uname = $_POST['add-user'];
		$pwd = $_POST['add-pass'];
		$format		= "$2y$10$";
		$hash		= "TrilogicUBMSaltFormats";
		$salt		= $format . $hash;
		$newpass	= crypt($pwd, $salt);

		$name = $_POST['real-name'];
		$email = $_POST['email'];
		$katahint = $_POST['katahint'];
		
		$sql = "SELECT kata_hint FROM ms_admin WHERE username = '$uname'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_assoc($hasil);
		
		if($katahint == $baris['kata_hint']){
			$sql="UPDATE ms_admin SET username='$uname', password='$newpass', nama='$name', email='$email', kata_hint='$katahint'
				WHERE id='$id'";
			mysqli_query($koneksi, $sql);
			// echo $sql;
			header('Location:manage-admin.php');
		} else echo "<div id='warning-box>Kata hint anda salah</div>";
		
		
	}
	
	
	if(isset($_GET['uname'])){
		$kode = $_GET['uname'];
		$sql = "SELECT * FROM ms_admin WHERE username = '$kode'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_assoc($hasil);
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Edit Admin - Trilogic</title>
</head>
<body>
<fieldset id="edit-field">
<legend>Edit Admin</legend>
	<form action="edit-admin.php" method="post" name="edit-form-career">
	<table id="example" class="more">
		<input type="hidden" name="id" value="<?php echo $baris['id'];?>"/>
		<tr>
				<td valign="top" width=15%>Username</td>
				<td><input type="text" name="add-user" value="<?php echo $baris['username'];?>" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Password</td>
				<td><input type="password" name="add-pass" value="<?php echo $baris['password'];?>" style="width:250px;" onclick="this.select()"></td>
			</tr>
			<tr>
				<td valign="top">Nama Lengkap</td>
				<td><input type="text" name="real-name" value="<?php echo $baris['nama'];?>" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Email</td>
				<td><input type="email" name="email" value="<?php echo $baris['email'];?>" style="width:250px;"></td>
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
					<input type="submit" name="submit-edit-admin" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='edit-admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
	</table>
	</form>
</fieldset>
</body>
</html>