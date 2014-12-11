<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-porto'])){
		$title = $_POST['add-nama'];
		$date = $_POST['add-date'];
		$jasa = $_POST['add-jasa'];
		$desc = $_POST['add-detail'];
		
		$sql="INSERT INTO ms_portofolio (nama_klien, tgl_update, id_jasa, deskripsi_porto) VALUES 
			('$title', '$date', '$jasa', '$desc')";
		
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-porto.php');
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
			<th width=20%>Nama</th>
			<th width=10%>Tanggal</th>
			<th width=10%>Layanan</th>
			<th width=40%>Detail</th>
			<th width=10%>Action</th>
		</tr>
	<?php
		$idx = 1;
		$sql = "SELECT ms_portofolio.*, ms_jasa.nama FROM ms_portofolio LEFT JOIN ms_jasa ON ms_jasa.id = ms_portofolio.id_jasa";
		$hasil = mysqli_query($koneksi, $sql);
		while($baris = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
				echo "<td align=center valign='top'>";
					echo $idx;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['nama_klien'];
				echo "</td>";
				echo "<td valign='top'>";
					$format_tgl = date('d M Y', strtotime($baris['tgl_update']));
					echo $format_tgl;
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['nama'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['deskripsi_porto'];
				echo "</td>";
				echo "<td>";
					$ganti_spasi = str_replace(" ","-",$baris['nama']);
					echo "<a href='edit-service.php?layanan=".$ganti_spasi."' class='edit-btn'>Edit</a>";
					echo "<a href='delete.php?src=mngporto&id=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	</table>
	<fieldset style="width:88%">
	<legend>Add</legend>
		<form action="manage-porto.php" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Nama Klien</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan nama klien"></td>
			</tr>
			<tr>
				<td valign="top">Tgl Pengerjaan</td>
				<td><input type="date" name="add-date" value=""></td>
			</tr>
			<tr>
				<td valign="top">Jasa</td>
				<td>
					<select name="add-jasa">
						<?php
							$sql2 = "SELECT id, nama FROM ms_jasa";
							$hasil2 = mysqli_query($koneksi, $sql2);
							while($baris = mysqli_fetch_assoc($hasil2)){
								echo "<option value='".$baris['id']."'>".$baris['nama']."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Detail</td>
				<td><textarea name="add-detail" placeholder="Masukkan detail proyek"/></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add-porto" value="Add" id="blue-btn-mini"/>
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>