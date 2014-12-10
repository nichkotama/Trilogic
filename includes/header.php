<?php 
	require_once('koneksi.php');

	$sql = "SELECT ekstensi_file, alignment FROM ms_logo";
	$hasil = mysqli_query($koneksi, $sql);

	$baris = mysqli_fetch_assoc($hasil);
	$posisi = $baris['alignment'];
	$ekstensi = $baris['ekstensi_file'];
?>

<div class="header">
	<a href="index.php">
	<img src="../assets/images/logo.<?php echo $ekstensi?>"
		<?php if($posisi == 'center'){
				echo "style='display: block;margin-left: auto;margin-right: auto'";
			} else{
				echo "align='$posisi'";
			}
		?>
	/>
	</a>
	<hr/>
</div>