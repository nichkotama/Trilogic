<?php  #alias daftar services
	require_once('../includes/header.php');
	require_once('../includes/admin-menu.php');
	require_once('../includes/session.php');
	check_login();
	
	
	$bool_button=1;
	$id = $_GET['id'];
	if(isset($_GET['src'])){
		$source = $_GET['src'];
		switch($source){
			case "mngadmin":
				$bpage="manage-admin.php";
				$table="ms_admin";
				$show_nama="nama";
			break;
			case "mngservice":
				$bpage="manage-service.php";
				$table="ms_jasa";
				$show_nama="nama";
			break;
			case "mngporto":
				$bpage="manage-porto.php";
				$table="ms_portofolio";
				$show_nama="nama_klien";
			break;
			case "mngcareer":
				$bpage="manage-career.php";
				$table="list_job";
				$show_nama="nama_job";
			break;
			case "mngevent":
				$bpage="manage-event.php";
				$table="ms_berita";
				$show_nama="judul_berita";
			break;
			default:
				$bpage="delete.php";
		}
	}
	if(isset($_GET['sure'])){
		if($source == "mngadmin"){
			$sql = "DELETE FROM ms_admin WHERE id = $id";
		}
		elseif($source == "mngservice"){
			$sql = "DELETE FROM ms_jasa WHERE id = $id";
		}
		elseif($source == "mngporto"){
			$sql = "DELETE FROM ms_portofolio WHERE id = $id";
		}
		elseif($source == "mngcareer"){
			$sql = "DELETE FROM ms_career WHERE id = $id";
		}
		elseif($source == "mngevent"){
			$sql = "DELETE FROM ms_berita WHERE id = $id";
		}
		$hasil = mysqli_query($koneksi, $sql);
		$bool_button=0;
	}
	$sql = "SELECT * FROM ".$table." WHERE id='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	$baris = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
<title>Delete - Trilogic</title>
</head>
<body>
	<fieldset style="width:88%">
	<legend>Delete</legend>
		<form action="delete.php" method="get"/>
		<input type="hidden" name="id" value="<?php echo $baris['id']?>"/>
		<input type="hidden" name="src" value="<?php echo $_GET['src']?>"/>
		<table width="100%" id="form-table">
			<tr>
				<td valign="top" width=15%>Are you sure to delete record : <b><?php echo $baris[$show_nama]?></b>?</td>
			</tr>
			<tr>
				<td>
					<?php if($bool_button!=0){
						echo "<input type='submit' name='sure' value='Delete' id='blue-btn-mini'/>";
					}?>
					<input type="button" onClick="parent.location='<?php echo $bpage;?>'" value="Back" id="blue-btn-mini">
				</td>
			</tr>
		</table>
		<form>
	</fieldset>
</body>
</html>