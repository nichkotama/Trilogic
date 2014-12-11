<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-admin'])){
		$uname = $_POST['add-user'];
		$pwd = $_POST['add-pass'];
		$format		= "$2y$10$";
		$hash		= "TrilogicUBMSaltFormats";
		$salt		= $format . $hash;
		$newpass	= crypt($pwd, $salt);

		$name = $_POST['real-name'];
		$email = $_POST['email'];
		$katahint = $_POST['katahint'];
		
		$sql="INSERT INTO ms_admin (username, password, nama, email, kata_hint) VALUES ('$uname', '$newpass', '$name', '$email', '$katahint')";
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-admin.php');
	}
	$sql = "SELECT * FROM ms_admin";
	$hasil = mysqli_query($koneksi, $sql);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Admin - Trilogic</title>
</head>
<body>
	<table border=1 id='view-table' cellspacing=0>
		<tr>
			<th>No</th>
			<th width=30%>Username</th>
			<th width=45%>Nama</th>
			<th width=10%>Email</th>
			<th width=15%>Action</th>
		</tr>
	<?php
		$idx = 1;
		while($baris = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
				echo "<td align=center valign='top'>";
					echo $idx;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['username'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['nama'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['email'];
				echo "</td>";
				echo "<td>";
					echo "<a href='edit.php?src=mngadmin&uname=".$baris['username']."' class='edit-btn'>Edit</a>";
					echo "<a href='delete.php?src=mngadmin&id=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	</table>
	<fieldset style="width:88%" id="edit-field">
	<legend>Add User</legend>
		<form action="manage-admin.php" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Username</td>
				<td><input type="text" name="add-user" value="" placeholder="Masukkan nama pengguna" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Password</td>
				<td><input type="password" name="add-pass" value="" placeholder="Masukkan password" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Nama Lengkap</td>
				<td><input type="text" name="real-name" value="" placeholder="Masukkan nama lengkap anda" style="width:250px;"></td>
			</tr>
			<tr>
				<td valign="top">Email</td>
				<td><input type="email" name="email" value="" placeholder="Masukkan nama lengkap anda" style="width:250px;"></td>
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
				<td><input type="text" name="katahint" value="" placeholder="Masukkan kata pemulihan anda" style="width:250px;"></td>
			</tr>
			<div id="keterangan"></div>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add-admin" value="Add" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini"/>
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>