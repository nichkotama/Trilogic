<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['edit-file'])){
		$id = $_POST['id'];
		$title = $_POST['add-nama'];
		$desc = $_POST['add-detail'];
		$file_name = $_FILES['nama-file']['name'];
		$file_tmp  = $_FILES['nama-file']['tmp_name'];
		$file_size = $_FILES['nama-file']['size'];
		$file_ext = strtolower(end(explode(".", $file_name)));
		$ext_boleh = array("zip", "rar", "gz", "bz", "bz2", "doc", "docx", "pdf", "txt");
						
		if(in_array($file_ext, $ext_boleh) && $_FILES['nama-file']['size'] != 0 ){
			if($file_size <= 2*1024*1024)
			{
				$new_name = str_replace(" ","-",$title);;
				$new_name = strtolower($new_name).".".$file_ext;
				
				$sumber = $file_tmp;
				$tujuan = "../download/" . $new_name;
				move_uploaded_file($sumber, $tujuan);
				$sql="UPDATE ms_file SET file_location='$new_name', judul='$title', deskripsi='$desc' WHERE id=$id";
				mysqli_query($koneksi, $sql);
			}
			else{
				echo "Ukuran file maximal adalah 2MB, file anda terlalu besar.";
			}
		// echo "EXT FILE BOLEH DI UPLOAD.";
		}
		elseif($_FILES['nama-file']['size'] == 0 )
		{
			$sql="UPDATE ms_file SET judul='$title', deskripsi='$desc' WHERE id=$id";
			mysqli_query($koneksi, $sql);
		}
		else{
			echo "Jenis/extensi file tidak diizinkan.";
		}
		header('Location:manage-file.php');
	}
	$id = $_GET['id'];
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
		<form action="edit-file.php" method="post" enctype="multipart/form-data"/>
		<input type="hidden" name="id" value="<?php echo $baris['id']?>"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Nama File</td>
				<td><input type="text" name="add-nama" value="<?php echo $baris['judul'];?>" required/></td>
			</tr>
			<tr>
				<td valign="top">Detail</td>
				<td>
					<textarea name="add-detail" placeholder="Masukkan detail file" id="smaller-textarea"><?php echo $baris['deskripsi'];?></textarea>
				</td>
			</tr>
			<tr>
				<td valign="top" width="20%">Browse for a new file</td>
				<td><input type="FILE" name="nama-file" value="<?php echo $baris['file_location']?>"></td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="edit-file" value="Update" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini">
					<input type="button" onClick="parent.location='manage-file.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>