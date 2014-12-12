<?php 
	include('../includes/header.php'); 
	include('../includes/menu.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Portofolio - Trilogic CMS</title>
</head>
<body>
	<fieldset>
	<legend>Our Finished Project</legend>
		<?php
			if(!isset($_GET['service'])){
				$sql = "SELECT * FROM ms_portofolio";
				$hasil = mysqli_query($koneksi, $sql);
				while($baris=mysqli_fetch_assoc($hasil)){
					echo "<div class='notif-service'>";
					$format_date=date('d M Y',strtotime($baris['tgl_update']));
					echo "<div class='tanggal'>".$format_date."</div>";
					echo "<div class='notif-title'>".$baris['nama_klien']."</div>";
					echo "<div class='notif-content'>".substr($baris['deskripsi_porto'],0,200)."...<br/>";
					echo "<a href='portofolio.php?service=layanan-ke-".$baris['id']."'>Read more >></a>";
					echo "</div>";
					echo "</div>";
				}
			}
			else
			{
				$fullnya=$_GET['service'];
				$lastnya = strtolower(end(explode("-", $fullnya)));
				$sql = "SELECT * FROM ms_portofolio WHERE id='$lastnya'";
				$hasil = mysqli_query($koneksi, $sql);
				$baris=mysqli_fetch_assoc($hasil);
				echo "<div class='notif-service'>";
				echo "<div class='notif-title'>".$baris['nama_klien']."</div>";
				echo "<div class='notif-content'>".$baris['deskripsi_porto']."<br/>";
				$format_date=date('d M Y',strtotime($baris['tgl_update']));
				echo "Selesai pada tanggal ".$format_date."<br/>";
				echo "<a href='portofolio.php'><< Back</a>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>