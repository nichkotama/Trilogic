<?php
	include('../includes/header.php'); 
	include('../includes/menu.php'); 
	session_start();
	$sql = "SELECT * FROM ms_contact";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
	if(isset($_POST['submit-contact']))
	{
		if($_SESSION["capt"]==$_POST['valid']){
			$nama=$_POST['nama'];
			$email=$_POST['email'];
			$org=$_POST['org'];
			$sug=$_POST['suggest'];
			$sql="INSERT INTO ms_tamu (nama, email, organisasi, krisar) 
			VALUES ('$nama', '$email', '$org', '$sug')";
			mysqli_query($koneksi, $sql);
			echo "Terima kasih telah menghubungi kami";
		}else{
			echo "<div id='warning-box>Angka validasi salah</div>";
		}
	}
	else
	{ 
		$capt = rand(1000,9999);
		$_SESSION["capt"]=$capt;
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Contact - Trilogic</title>
</head>
<body>
	<div class="apart">
	<fieldset style="width:80%;">
	<legend>Contact Us</legend>
	<p class="title-space">Institution Name</p>
	<?php echo $baris['nama_instansi']?>
	<p class="title-space">Address</p>
	<?php echo $baris['alamat'];?>
	<p class="title-space">Email</p>
	<?php echo $baris['email']?>
	<p class="title-space">Phone 1</p>
	<?php echo $baris['no_telp_1']?>
	<p class="title-space">Phone 2</p>
	<?php echo $baris['no_telp_2']?>
	<p class="title-space">Fax</p>
	<?php echo $baris['no_fax']?>
	<p class="title-space">GPS Coordinate</p>
	<?php echo $baris['gps_location']?>
	<p class="title-space">Click Here to see on Google Maps</p>
	<a href="https://www.google.co.id/maps/place/<?php echo $baris['gps_location']?>">Maps</a>
	</fieldset>
	</div>
	
	<div class="apart">
		<fieldset>
		<legend>Contact Form</legend>
		<form action="contact.php" method="post">
		<table width="100%" id="form-table">
			<tr>
				<td width="20%">Full Name</td>
				<td><input type="text" name="nama" value="" placeholder="Masukkan kritik atau saran anda" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="" placeholder="Masukkan kritik atau saran anda" required></td>
			</tr>
			<tr>
				<td>Organisasi</td>
				<td><input type="text" name="org" value="" placeholder="Masukkan kritik atau saran anda"></td>
			</tr>
			<tr>
				<td valign="top">Suggestion</td>
				<td><textarea name="suggest" placeholder="Masukkan kritik atau saran anda"></textarea></td>
			</tr>
			<tr>
				<td valign="top"><p id="captcha"><?php echo $_SESSION['capt']; ?></p></td>
				<td>Insert text from left <input type="text" name="valid" value="" placeholder="Number beside" required></td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="submit-contact" value="Save" id="blue-btn-mini"/>
					<input type="button" onClick="parent.location='admin.php'" value="Cancel" id="blue-btn-mini">
				</td>
			</tr>
		</table>
	</form>
		</fieldset>
	</div>
</body>
</html>