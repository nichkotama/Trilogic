<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-admin'])){
		$uname = $_POST['add-user'];
		$pwd = $_POST['add-pass'];
		$name = $_POST['real-name'];
		$email = $_POST['email'];
		$katahint = $_POST['katahint'];
		
		$sql="INSERT INTO ms_admin (username, password, nama, email, kata_hint) VALUES ('$uname', '$pwd', '$name', '$email', '$katahint')";
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
			<th width=55%>Nama</th>
			<th width=10%>Email</th>
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
					$ganti_spasi = str_replace(" ","-",$baris['username']);
					echo "<a href='edit.php?src=mngadmin&uname=".$ganti_spasi."' class='edit-btn'>Edit</a>";
					echo "<a href='delete-service.php?layanan=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	</table>
	<fieldset style="width:88%" id="edit-field">
	<legend>Add Service</legend>
		<form action="manage-service.php" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Service Name</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan nama layanan"></td>
			</tr>
			<tr>
				<td valign="top">Detail</td>
				<td><textarea name="add-detail" placeholder="Masukkan detail layanan"/></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add-service" value="Add" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini"/>
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>