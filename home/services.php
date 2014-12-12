<?php 
	include('../includes/header.php'); 
	include('../includes/menu.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Services - Trilogic CMS</title>
</head>
<body>
	<fieldset>
	<legend>Our Services</legend>
		<?php
			if(!isset($_GET['service'])){
				$sql = "SELECT * FROM ms_jasa";
				$hasil = mysqli_query($koneksi, $sql);
				while($baris=mysqli_fetch_assoc($hasil)){
					echo "<div class='notif-service'>";
					echo "<div class='notif-title'>".$baris['nama']."</div>";
					echo "<div class='notif-content'>".substr($baris['detail'],0,200)."...<br/>";
					$ganti_spasi = str_replace(" ","-",$baris['nama']);
					echo "<a href='services.php?service=".$ganti_spasi."'>Read more >></a>";
					echo "</div>";
					echo "</div>";
				}
			}
			else
			{
				$layanan=$_GET['service'];
				$ganti_spasi = str_replace("-"," ",$layanan);
				$sql = "SELECT * FROM ms_jasa WHERE nama='$ganti_spasi'";
				$hasil = mysqli_query($koneksi, $sql);
				$baris=mysqli_fetch_assoc($hasil);
				echo "<div class='notif-service'>";
				echo "<div class='notif-title'>".$baris['nama']."</div>";
				echo "<div class='notif-content'>".$baris['detail']."<br/>";
				echo "<a href='services.php'><< Back</a>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>