<?php 
	include('../includes/header.php'); 
	include('../includes/menu.php');
	
	if(isset($_GET['file'])){
		$file = "../download/".$_GET['file'];

		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 10');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Trilogic CMS</title>
</head>
<body>
	<fieldset>
	<legend>Our Services</legend>
		<?php
			$sql = "SELECT * FROM ms_file";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
				echo "<div class='notif-file'>";
				echo "<div class='notif-title'>".$baris['judul']."</div>";
				echo "<div class='notif-content'>".$baris['deskripsi']."<br/>";
				$ganti_spasi = str_replace(" ","-",$baris['file_location']);
				echo "<a href='download.php?file=".$ganti_spasi."'>[Download Here]</a>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>