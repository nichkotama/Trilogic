<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-edit-porto'])){
		$code = $_POST['add-id'];
		$title = $_POST['add-nama'];
		$date = $_POST['add-date'];
		$jasa = $_POST['add-jasa'];
		$desc = $_POST['add-detail'];
		
		$sql="UPDATE ms_portofolio SET nama_klien='$title', tgl_update='$date', id_jasa='$jasa', deskripsi_porto='$desc' WHERE id='$code'";
		mysqli_query($koneksi, $sql);
		
		header('Location:manage-porto.php');
	}
	
	
	if(isset($_GET['porto'])){
		$kode = $_GET['porto'];
		$sql = "SELECT * FROM ms_portofolio WHERE id = '$kode'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_assoc($hasil);
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Edit Portofolio - Trilogic</title>
</head>
<body>
<fieldset id="edit-field">
<legend>Edit Portofolio</legend>
	<form action="edit-porto.php" method="post" name="edit-form-career">
	<input type="hidden" name="add-id" value="<?php echo $baris['id'];?>">
	<table id="form-table">
		<tr>
				<td valign="top" width=15%>Nama Klien</td>
				<td><input type="text" name="add-nama" value="<?php echo $baris['nama_klien'];?>" placeholder="Masukkan nama klien"></td>
			</tr>
			<tr>
				<td valign="top">Tgl Pengerjaan</td>
				<?php $set_value = date("Y-m-d", strtotime($baris['tgl_update']));?>
				<td><input type="date" name="add-date" value="<?php echo $set_value;?>"></td>
			</tr>
			<tr>
				<td valign="top">Jasa</td>
				<td>
					<select name="add-jasa">
						<?php
							$sql2 = "SELECT id, nama FROM ms_jasa";
							$hasil2 = mysqli_query($koneksi, $sql2);
							while($baris2 = mysqli_fetch_assoc($hasil2)){
								echo "<option value='".$baris['id']."'>".$baris2['nama']."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Detail</td>
				<td><textarea name="add-detail" placeholder="Masukkan detail proyek"/><?php echo $baris['deskripsi_porto'];?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit-edit-porto" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
	</table>
	</form>
</fieldset>
</body>
</html>