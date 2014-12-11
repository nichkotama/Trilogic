<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-career'])){
		$code = $_POST['add-code'];
		$title = $_POST['add-nama'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y/m/d");;
		$desc = $_POST['add-detail'];
		$spin = $_POST['add-spin-tepenuhi'];
		
		$sql="INSERT INTO list_job (kode_job, tgl_update, nama_job, requirements, terpenuhi) VALUES 
			('$code', '$date', '$title', '$desc', '$spin')";
		
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-career.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Portofolio - Trilogic</title>
</head>
<body>
	<table border=1 id='view-table' cellspacing=0>
		<tr>
			<th>No</th>
			<th width=10%>Kode</th>
			<th width=20%>Tanggal Update</th>
			<th width=20%>Nama Pekerjaan</th>
			<th width=30%>Prasyarat</th>
			<th width=10%>Status</th>
			<th width=10%>Action</th>
		</tr>
	<?php
		$idx = 1;
		$sql = "SELECT * FROM list_job";
		$hasil = mysqli_query($koneksi, $sql);
		while($baris = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
				echo "<td align=center valign='top'>";
					echo $idx;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['id'];
				echo "</td>";
				echo "<td valign='top'>";
					$format_tgl = date('d M Y', strtotime($baris['tgl_update']));
					echo $format_tgl;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['nama_job'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['requirements'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['terpenuhi'];
				echo "</td>";
				echo "<td>";
					$ganti_spasi = str_replace(" ","-",$baris['id']);
					echo "<a href='edit-service.php?layanan=".$ganti_spasi."' class='edit-btn'>Edit</a>";
					echo "<a href='delete.php?src=mngcareer&id=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	</table>
	<fieldset style="width:88%">
	<legend>Add</legend>
		<form action="manage-career.php" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Job Code</td>
				<td><input type="text" name="add-code" value="" placeholder="Masukkan kode bidang pekerjaan"></td>
			</tr>
			<tr>
				<td valign="top" width=15%>Job Title</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan nama bidang pekerjaan"></td>
			</tr>
			<tr>
				<td valign="top">Requirements</td>
				<td><textarea name="add-detail" placeholder="Masukkan prasyarat bakal calon"/></textarea></td>
			</tr>
			<tr>
				<td valign="top">Status</td>
				<td>
					<select name="add-spin-terpenuhi">
						<option value=0>Tampilkan di halaman</option>
						<option value=1>Sembunyikan dari halaman</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add-career" value="Add" id="blue-btn-mini"/>
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>