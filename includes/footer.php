<?php 
	$sql = "SELECT * FROM ms_contact";
	$hasil = mysqli_query($koneksi, $sql);

	$baris = mysqli_fetch_assoc($hasil);
	$nama = $baris['nama_instansi'];
	$email = $baris['email'];
	$alamat = $baris['alamat'];
	$gps = $baris['gps_location'];
?>

<div class="footer">
	<hr/>
	Copyright <?php echo date('Y');?>
	<a href="../index.php"> 
	<?php echo $nama;?>
	</a>
	<br/>
	Email : <?php echo $email;?>
	Alamat : <?php echo $alamat;?>
	<br/>
	GPS : <?php echo $gps;?>
</div>


<?php
	mysqli_free_result($hasil);
	mysqli_close($koneksi);
?>