<?php 
	include('../includes/header.php'); 
	include('../includes/menu.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Trilogic CMS</title>
</head>
<body>
	<fieldset>
	<legend>Event and News</legend>
		<?php
			$id = $_GET['news'];
			$sql = "SELECT * FROM ms_berita WHERE id='$id'";
			$hasil = mysqli_query($koneksi, $sql);
			$baris=mysqli_fetch_assoc($hasil)
		?>
		<div class='notif'>
			<div class='notif-title'><?php echo $baris['judul_berita']?></div>
			<div class='notif-content'><?php echo $baris['isi']?><br/>
			<a href="index.php">Back</a></div>
		</div>
	</fieldset>
</body>
</html>