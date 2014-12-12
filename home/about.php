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
	<legend>About Us</legend>
	<img src="../assets/images/about.jpg" id="full">
	<?php
		$sql = "SELECT ekstensi_file FROM ms_logo";
		$hasil = mysqli_query($koneksi, $sql);
		$baris=mysqli_fetch_assoc($hasil);
		echo "<img src='../assets/images/logo.".$baris['ekstensi_file']."' id='logo-about'>";
	?>
	<p>Kami adalah kelompok mahasiswa yang merintis usaha di bidang IT. 
	Kami memiliki komitmen yang kuat untuk kepuasan pelanggan tertinggi, 
	kami terus melayani klien kami untuk membuat yang terbaik dari investasi 
	sektor IT mereka dan mengubahnya menjadi hasil bisnis yang nyata sehingga 
	menjadikan nilai lebih bagi klien. </p>
	<p><strong>Visi</strong>
	Menjadi perusahaan kelas dunia yang dapat diandalkan untuk mengimplementasikan 
	aplikasi yang sesuai dengan kepedulian yang tinggi pada kualitas pelayanan dan 
	kepedulian yang tinggi untuk menilai produk secara maksimal (maksimalisasi utilitas) 
	kepada pengguna dengan mengintegrasikan teknologi tinggi, layanan yang unggul di jajaran produk IT profesional.</p>
	<p><strong>Misi</strong>
	Always put the awareness to keep on running positive process consistently for expansion preparing globally in a next 5 years.</p>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>