<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-edit-event'])){
		$code = $_POST['id'];
		$title = $_POST['add-nama'];
		$desc = $_POST['add-detail'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y/m/d");;
		
		$sql="INSERT INTO  (, isi, ) VALUES (, , )";
		$sql="UPDATE ms_berita SET judul_berita='$title', isi='$desc', tgl_berita='$date' WHERE id='$code'";
		mysqli_query($koneksi, $sql);
		
		header('Location:manage-event.php');
	}
	
	
	if(isset($_GET['event'])){
		$kode = $_GET['event'];
		$sql = "SELECT * FROM ms_berita WHERE id = '$kode'";
		$hasil = mysqli_query($koneksi, $sql);
		$baris = mysqli_fetch_assoc($hasil);
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Edit Event - Trilogic</title>
</head>
<body>
<fieldset id="edit-field">
<legend>Edit Event</legend>
	<form action="edit-event.php" method="post" name="edit-form-event">
	<table id="form-table">
		<input type="hidden" name="id" value="<?php echo $baris['id'];?>"/>
			<tr>
				<td valign="top" width=15%>Event Title</td>
				<td><input type="text" name="add-nama" value="<?php echo $baris['judul_berita'];?>" placeholder="Masukkan judul berita"></td>
			</tr>
			<tr>
				<td valign="top">News</td>
				<td><textarea name="add-detail" placeholder="Masukkan isi berita"/><?php echo $baris['isi'];?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit-edit-event" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='manage-event.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
	</table>
	</form>
</fieldset>
</body>
</html>