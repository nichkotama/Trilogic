<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-edit-career'])){
		$code = $_POST['add-code'];
		$title = $_POST['add-nama'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y/m/d");;
		$desc = $_POST['add-detail'];
		$spin = $_POST['add-spin-terpenuhi'];
		
		$sql="UPDATE list_job SET id='$code', tgl_update='$date', nama_job='$title', requirements='$desc', terpenuhi='$spin'";
		mysqli_query($koneksi, $sql);
		
		header('Location:manage-career.php');
	}
	
	
	if(isset($_GET['kode'])){
		$kode = $_GET['kode'];
		$kode = str_replace("%20"," ",$kode);
		$sql = "SELECT * FROM list_job WHERE id = '$kode'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_assoc($hasil);
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Edit Service - Trilogic</title>
</head>
<body>
<fieldset id="edit-field">
<legend>Edit Career</legend>
	<form action="edit-career.php" method="post" name="edit-form-career">
	<table id="form-table">
		<input type="hidden" name="tgl_update" value="<?php echo $baris['tgl_update'];?>"/>
		<tr>
				<td valign="top" width=15%>Job Code</td>
				<td><input type="text" name="add-code" value="<?php echo $baris['id'];?>" placeholder="Masukkan kode bidang pekerjaan"></td>
			</tr>
			<tr>
				<td valign="top" width=15%>Job Title</td>
				<td><input type="text" name="add-nama" value="<?php echo $baris['nama_job'];?>" placeholder="Masukkan nama bidang pekerjaan"></td>
			</tr>
			<tr>
				<td valign="top">Requirements</td>
				<td><textarea name="add-detail" placeholder="Masukkan prasyarat bakal calon"/><?php echo $baris['requirements'];?></textarea></td>
			</tr>
			<tr>
				<td valign="top">Status</td>
				<td>
					<select name="add-spin-terpenuhi">
						<option value=1 <?php if($baris['terpenuhi']==0) echo "selected=selected";?>>Tampilkan di halaman</option>
						<option value=0 <?php if($baris['terpenuhi']==1) echo "selected=selected";?>>Sembunyikan dari halaman</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit-edit-career" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
	</table>
	</form>
</fieldset>
</body>
</html>