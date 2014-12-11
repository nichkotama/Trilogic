<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	if(isset($_POST['add-event'])){
		$title = $_POST['add-nama'];
		$desc = $_POST['add-detail'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y/m/d");;
		
		$sql="INSERT INTO ms_berita (judul_berita, isi, tgl_berita) VALUES ('$title', '$desc', '$date')";
		mysqli_query($koneksi, $sql);
			
		header('Location:manage-event.php');
	}
	$sql = "SELECT * FROM ms_berita";
	$hasil = mysqli_query($koneksi, $sql);
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Events - Trilogic</title>
</head>
<body>
	<table border=1 id='view-table' cellspacing=0>
		<tr>
			<th>No</th>
			<th width=30%>Judul</th>
			<th width=35%>Isi</th>
			<th width=15%>Tanggal Update</th>
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
					echo $baris['judul_berita'];
				echo "</td>";
				echo "<td valign='top'>";
					echo $baris['isi'];
				echo "</td>";
				echo "<td valign='top'>";
					$format_tgl = date('d M Y', strtotime($baris['tgl_berita']));
					echo $format_tgl;
				echo "</td>";
				echo "<td>";
					echo "<a href='edit-event.php?event=".$baris['id']."' class='edit-btn'>Edit</a>";
					echo "<a href='delete.php?src=mngevent&id=".$baris['id']."' class='delete-btn'>Delete</a>";
				echo "</td>";
			echo "</tr>";
			$idx++;
		}
	?>
	</table>
	<fieldset style="width:88%" id="edit-field">
	<legend>Add Event</legend>
		<form action="manage-event.php" method="post"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Event Title</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan judul berita"></td>
			</tr>
			<tr>
				<td valign="top">News</td>
				<td><textarea name="add-detail" placeholder="Masukkan isi berita"/></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="add-event" value="Add" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini"/>
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>