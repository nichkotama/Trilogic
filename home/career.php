<?php 
	include('../includes/header.php'); 
	include('../includes/menu.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Career - Trilogic CMS</title>
</head>
<body>
	<fieldset>
	<legend>We need resource as</legend>
		<?php
			$sql = "SELECT * FROM list_job";
			$hasil = mysqli_query($koneksi, $sql);
			while($baris=mysqli_fetch_assoc($hasil)){
		?>
				<div class='notif-service'>
				<div class='notif-title'><?php echo $baris['nama_job']?></div>
				<div class='notif-content'><?php echo $baris['requirements']?>"<br/>
				<a href="apply.php?field=<?php echo $baris['id']?>">[Apply]</a>
				</div>
				</div>
		<?php
			}
		?>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>