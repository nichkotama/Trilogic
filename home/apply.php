<?php  #alias daftar services
	include('../includes/header.php');
	include('../includes/menu.php');
	session_start();
	if(isset($_GET['field'])){
		$bidang = $_GET['field'];
	}else{
		// header('Location:career.php');
	}
	
	if(isset($_POST['add-cv'])){
		if($_SESSION['capt']==$_POST['valid'])
		{
			$title = $_POST['add-nama'];
			$email = $_POST['add-email'];
			$desc = $_POST['add-address'];
			$bdg = $_POST['add-bidang'];
			$phone = $_POST['add-phone'];
		
			$file_name = $_FILES['nama-file']['name'];
			$file_tmp  = $_FILES['nama-file']['tmp_name'];
			$file_size = $_FILES['nama-file']['size'];
			$file_ext = strtolower(end(explode(".", $file_name)));
			$ext_boleh = array("doc", "docx", "pdf", "txt", "jpg", "jpeg", "png");
							
			if(in_array($file_ext, $ext_boleh) && $_FILES['nama-file']['size'] != 0 ){
				if($file_size <= 2*1024*1024)
				{
					$new_name = str_replace(" ","-",$title);;
					$new_name = strtolower($new_name).".".$file_ext;
					
					$sumber = $file_tmp;
					$tujuan = "../file_cv/" . $new_name;
					move_uploaded_file($sumber, $tujuan);
					$sql="INSERT INTO daftar_aplikan (nama, email, alamat, bdg_pekerjaan, no_hp, file_cv) 
					VALUES ('$title', '$email', '$desc', '$bdg', '$phone', '$new_name')";
					mysqli_query($koneksi, $sql);
				}
				else{
					echo "Ukuran file maximal adalah 2MB, file anda terlalu besar.";
				}
			// echo "EXT FILE BOLEH DI UPLOAD.";
			}else{
				echo "Jenis/extensi file tidak diizinkan.";
			}
		}else{
			echo "<div id='warning-box>Angka validasi salah</div>";
		}
		echo "Thanks for applied ";
		echo "<br/><a href='index.php'><< Back</a>";
	}
	else
	{ 
		$capt = rand(1000,9999);
		$_SESSION['capt']=$capt;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Career - Trilogic</title>
<script>
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 42 || charCode > 57)){
        return false;}
	else return true;
	}
</script>
</head>
<body>
	<fieldset style="width:88%" id="edit-field">
	<legend>Apply for a job</legend>
		<form action="apply.php" method="post" enctype="multipart/form-data"/>
		<input type="hidden" name="id" value="1"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Full name [required]</td>
				<td><input type="text" name="add-nama" value="" placeholder="Masukkan nama anda" required></td>
			</tr>
			<tr>
				<td valign="top" width=15%>Email</td>
				<td><input type="text" name="add-email" value="" placeholder="Masukkan email anda"></td>
			</tr>
			<tr>
				<td valign="top">Address [required]</td>
				<td><textarea name="add-address" placeholder="Masukkan Alamat Anda" id="smaller-textarea"/></textarea></td>
			</tr>
			<tr>
				<td valign="top" width=15%>Field</td>
				<td><input type="hidden" name="add-bidang" value="<?php echo $bidang;?>">
				<?php if(isset($bidang)) echo $bidang;?>
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="add-phone" value="" placeholder="Masukkan No Telepon Anda" onkeypress="return isNumberKey(event)"></td>
			</tr>
			<tr>
				<td valign="top" width="20%">Upload your CV [required]</td>
				<td><input type="FILE" name="nama-file" value="<?php echo $baris['file_location']?>" required></td>
			</tr>
			<tr>
				<td valign="top"><p id="captcha"><?php echo $_SESSION['capt']; ?></p></td>
				<td>Insert text from left <input type="text" name="valid" value="" placeholder="Number beside" required></td>
			</tr>
			<tr>
				<td><!--unused--></td>
				<td>
					<input type="submit" name="add-cv" value="Upload" id="blue-btn-mini"/>
					<input type="reset" value="Reset" id="blue-btn-mini">
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
<?php include('../includes/footer.php') ?></body>
</html>