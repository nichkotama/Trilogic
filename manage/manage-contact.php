<?php  #alias manage logo 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-contact'])){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$fax = $_POST['fax'];
		$gps = $_POST['gps'];
		
		$sql = "SELECT * FROM ms_contact";
		$hasil = mysqli_query($koneksi, $sql);
		if(mysqli_num_rows($hasil) == 0){
			$sql="INSERT INTO ms_contact (nama_instansi, alamat, email, no_telp_1, no_telp_2, no_fax, gps_location) 
			VALUES ('$nama', '$address', '$email', '$phone1', '$phone2', '$fax', '$gps')";
			mysqli_query($koneksi, $sql);
		}else{
			$sql="UPDATE ms_contact SET nama_instansi='$nama', alamat='$address', email='$email', 
			no_telp_1='$phone1', no_telp_2='$phone2', no_fax='$fax', gps_location='$gps' WHERE id=$id";
			mysqli_query($koneksi, $sql);
		}
		
		header('Location:manage-contact.php');
	}
	$sql = "SELECT * FROM ms_contact";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Logo - Trilogic</title>

<script>
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 42 || charCode > 57)){
        return false;}
	else return true;
	}
</script>

</head>
<body>
	<form action="manage-contact.php" method="post">
		<input type="hidden" name="id" value="1"/>
		<table width="100%" id="form-table">
			<tr>
				<td width="20%">Institution Name</td>
				<td><input type="text" name="nama" value="<?php echo $baris['nama_instansi']?>"></td>
			</tr>
			<tr>
				<td valign="top">Address</td>
				<td><textarea name="address" placeholder="Masukkan alamat instansi"><?php echo $baris['alamat'];?></textarea></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $baris['email']?>"></td>
			</tr>
			<tr>
				<td>Phone 1</td>
				<td><input type="text" name="phone1" value="<?php echo $baris['no_telp_1']?>" onkeypress="return isNumberKey(event)"></td>
			</tr>
			<tr>
				<td>Phone 2</td>
				<td><input type="text" name="phone2" value="<?php echo $baris['no_telp_2']?>" onkeypress="return isNumberKey(event)"></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text" name="fax" value="<?php echo $baris['no_fax']?>" onkeypress="return isNumberKey(event)"></td>
			</tr>
			<tr>
				<td>GPS Coordinate</td>
				<td><input type="text" name="gps" value="<?php echo $baris['gps_location']?>"></td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="submit-contact" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>