<?php  #alias manage logo 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['submit-logo'])){
		$id = $_POST['id'];
		$alig = $_POST['align'];
		$file_name = $_FILES['logo']['name'];
		$file_tmp  = $_FILES['logo']['tmp_name'];
		$file_size = $_FILES['logo']['size'];
		$file_ext = strtolower(end(explode(".", $file_name)));
		$ext_boleh = array("jpg", "png", "gif", "bmp", "swf");
		if(in_array($file_ext, $ext_boleh) || $_FILES['logo']['size'] == 0 ){
			if($file_size <= 2*1024*1024)
			{
				$sql="UPDATE ms_logo SET id=$id, alignment='$alig'";
				if($_FILES['logo']['size'] != 0 ){
					$sumber = $file_tmp;
					$tujuan = "../assets/images/logo." . $file_ext;
					move_uploaded_file($sumber, $tujuan);
					$sql="UPDATE ms_logo SET id=$id, ekstensi_file='$file_ext', alignment='$alig'";
				}
				mysqli_query($koneksi, $sql);
			}
			else{
				echo "Ukuran file maximal adalah 2MB, file anda terlalu besar.";
			}
		// echo "EXT FILE BOLEH DI UPLOAD.";
		}else{
			echo "Jenis/extensi file tidak diizinkan.";
		}
		header('Location:manage-logo.php');
	}
	$sql = "SELECT * FROM ms_logo";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Logo - Trilogic</title>
</head>
<body>
	<fieldset id="edit-field">
	<legend>Manage Logo</legend>
	<form action="manage-logo.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="1"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top">Current image</td>
				<td><img src="../assets/images/logo.<?php echo $baris['ekstensi_file']?>" id="exist-img"></td>
			</tr>
			<tr>
				<td valign="top">New image</td>
				<td><input type="FILE" name="logo" value="<?php echo $baris['ekstensi_file']?>"></td>
			</tr>
			<tr>
				<td valign="top">Alignment</td>
				<td>
					<select name="align">
						<option value="left" <?php if($baris['alignment']=="left") echo 'selected="selected"'?>>Left</option>
						<option value="center" <?php if($baris['alignment']=="center") echo 'selected="selected"'?>>Center</option>
						<option value="right" <?php if($baris['alignment']=="right") echo 'selected="selected"'?>>Right</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="submit-logo" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
		</table>
	</form>
	</fieldset>
</body>
</html>