<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	$id = $_GET['id']; 
	if(isset($_GET['delete-file'])){
		$dir = "../download/";
		$namafile = $_GET['file_location'];
		unlink($dir.$namafile);
		
		$sql = "DELETE FROM ms_file WHERE id = $id";
		$hasil = mysqli_query($koneksi, $sql);
		
		header('Location:manage-file.php');
	}
	$sql = "SELECT * FROM ms_file WHERE id=$id";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Edit File - Trilogic</title>
</head>
<body>
	<fieldset style="width:88%">
	<legend>Edit File</legend>
		<form action="delete-file.php" method="get" enctype="multipart/form-data"/>
		<input type="hidden" name="id" value="<?php echo $baris['id']?>"/>
		<input type="hidden" name="file_location" value="<?php echo $baris['file_location']?>"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Are you sure to delete record : <b><?php echo $baris['judul']?></b>?</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="delete-file" value="Delete" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='manage-file.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>