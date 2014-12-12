<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-edit-service'])){
		$id = $_POST['id'];
		$title = $_POST['edit-nama'];
		$desc = $_POST['edit-detail'];
		
		$sql="UPDATE ms_jasa SET nama='$title', detail='$desc' WHERE id=$id";
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-service.php');
	}
	
	
	if(isset($_GET['layanan'])){
		$nama_jasa = $_GET['layanan'];
		$nama_jasa = str_replace("-"," ",$nama_jasa);
		$sql = "SELECT * FROM ms_jasa WHERE nama = '$nama_jasa'";
		$hasil = mysqli_query($koneksi, $sql);
		
		$baris = mysqli_fetch_assoc($hasil);
	}else{
		header('Location:manage-service.php');
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
<legend>Edit</legend>
	<form action="edit-service.php" method="post" name="edit-form-service">
	<table id="form-table">
		<input type="hidden" name="id" value="<?php echo $baris['id'];?>"/>
		<tr>
			<td width=15%>Nama Layanan</td>
			<td><input type="text" value="<?php echo $baris['nama'];?>" name="edit-nama"/></td>
		</tr>
		<tr>
			<td valign="top">Detail</td>
			<td><textarea name="edit-detail"/><?php echo $baris['detail'];?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit-edit-service" value="Save" id="blue-btn-mini"/>
				<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
			</td>
		</tr>
	</table>
	</form>
</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>