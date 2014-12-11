<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-file'])){
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
				$sql="INSERT INTO ms_file (file_location, judul, deskripsi) VALUES ('$new_name', '$title', '$desc')";
				mysqli_query($koneksi, $sql);
			}
			else{
				echo "Ukuran file maximal adalah 2MB, file anda terlalu besar.";
			}
		// echo "EXT FILE BOLEH DI UPLOAD.";
		}else{
			echo "Jenis/extensi file tidak diizinkan.";
		}
		header('Location:manage-file.php');
	}
	$sql = "SELECT * FROM ms_file";
	$hasil = mysqli_query($koneksi, $sql);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage File - Trilogic</title>
</head>
<body>
	<table border=1 id='view-table' cellspacing=0>
		<tr>
			<th>No</th>
			<th width=30%>Nama</th>
			<th width=35%>Detail</th>
			<th width=20%>File Location</th>
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
					echo $baris['judul'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['deskripsi'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['file_location'];
				echo "</td>";
				echo "<td>";
					echo "<a href='edit-file.php?id=".$baris['id']."' class='edit-btn'>Edit</a>";
					echo "<a href='delete-file.php?id=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	
	</table>
	<fieldset style="width:88%" id="edit-field">
	<legend>Upload New File</legend>
		<form action="manage-file.php" method="post" enctype="multipart/form-data"/>
		<input type="hidden" name="id" value="1"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Nama File</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan nama file" required></td>
			</tr>
			<tr>
				<td valign="top">Detail</td>
				<td><textarea name="add-detail" placeholder="Masukkan detail file" id="smaller-textarea"/></textarea></td>
			</tr>
			<tr>
				<td valign="top" width="20%">Browse for a new file</td>
				<td><input type="FILE" name="nama-file" value="<?php echo $baris['file_location']?>" required></td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="add-file" value="Upload" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini">
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>