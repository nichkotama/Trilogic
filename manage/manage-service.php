<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-service'])){
		$title = $_POST['add-nama'];
		$desc = $_POST['add-detail'];
		
		$sql="INSERT INTO ms_jasa (nama, detail) VALUES ('$title', '$desc')";
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-service.php');
	}
	$sql = "SELECT * FROM ms_jasa";
	$hasil = mysqli_query($koneksi, $sql);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Services - Trilogic</title>
</head>
<body>
	<table border=1 id='view-table' cellspacing=0>
		<tr>
			<th>No</th>
			<th width=30%>Nama</th>
			<th width=55%>Detail</th>
			<th width=10%>Action</th>
		</tr>
	<?php
		$idx = 1;
		while($baris = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
				echo "<td align=center valign='top'>";
					echo $idx;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['nama'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['detail'];
				echo "</td>";
				echo "<td>";
					$ganti_spasi = str_replace(" ","-",$baris['nama']);
					echo "<a href='edit-service.php?layanan=".$ganti_spasi."' class='edit-btn'>Edit</a>";
					echo "<a href='delete.php?src=mngservice&id=".$baris['id']."' class='delete-btn'>Delete</a>";
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
<?php include('../includes/footer.php') ?></body>
</html>