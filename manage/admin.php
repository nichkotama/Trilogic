<?php 
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Manage Area - Trilogic</title>
</head>
<body>
	<div class="apart">
	<fieldset>
	<legend>Messages</legend>
		<?php
			$sql = "SELECT * FROM ms_tamu";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
				echo "<div class='notif'>";
				echo "<div class='notif-title'>".$baris['nama']." - ".$baris['organisasi']."</div>";
				echo "<div class='notif-content'>".$baris['email']." : ".$baris['krisar']."<br/>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
	</div>
	<div class="apart">
	<fieldset>
	<legend>List of Applicants</legend>
		<?php
			$sql = "SELECT * FROM daftar_aplikan";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
				echo "<div class='notif'>";
				echo "<div class='notif-title'>".$baris['nama']." - ".$baris['bdg_pekerjaan']."</div>";
				echo "<div class='notif-content'>".$baris['email']." : <a href='../file_cv/".$baris['file_cv']."' target='_blank'>Click to read CV</a><br/>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
	</div>
<?php include('../includes/footer.php') ?></body>
</html>