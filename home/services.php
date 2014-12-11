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
	<legend>Our Services</legend>
		<?php
			$sql = "SELECT * FROM ms_jasa";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
				echo "<div class='notif'>";
				echo "<div class='notif-title'>".$baris['nama']."</div>";
				echo "<div class='notif-content'>".substr($baris['detail'],0,200)."...<br/>";
				$ganti_spasi = str_replace(" ","-",$baris['nama']);
				echo "<a href=readmore.php?service=".$ganti_spasi.">Read more >></a>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
</body>
</html>