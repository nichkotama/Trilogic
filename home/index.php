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
			$sql = "SELECT * FROM ms_berita";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
				echo "<div class='notif'>";
				echo "<div class='notif-title'>".$baris['judul_berita']."</div>";
				echo "<div class='notif-content'>".substr($baris['isi'],0,255)."<br/>";
				echo "<a href=news.php?news=".$baris['id'].">Read more >></a>";
				echo "</div>";
				echo "</div>";
			}
		?>
	</fieldset>
</body>
</html>