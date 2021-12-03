<?php 
include_once("koneksi.php");

if (isset($_POST['update'])) {
 	$nim = $_POST['nim'];
 	$nama = $_POST['nama'];
 	$jkel = $_POST['jkel'];
 	$alamat = $_POST['alamat'];
 	$tgllhr = $_POST['tgllhr'];
 	$status = $_POST['status'];

 	$result = mysqli_query($con,"UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', tgllhr='$tgllhr', status='$status'");

 	header("Location:index.php");
 } ?>

 <?php 
 $nim = $_GET['NIM'];
 $result= mysqli_query($con, "SELECT * FROM mahasiswa WHERE NIM='$nim'");
while ($user_data = mysqli_fetch_array($result)) {
	$nim = $user_data['NIM'];
	$nama = $user_data['nama'];
	$alamat = $user_data['alamat'];
	$jkel = $user_data['jkel'];
	$tgllhr = $user_data['tgllhr'];
	$status = $user_data['status'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Data Mahasiswa</title>
</head>
<body>

<a href="index.php">Home</a>
<br/><br/>
<form name="update_mahasiswa" method="post" action="edit.php">
<table border="0">
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
</tr>

<tr>
	<td>Gender</td>
	<td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
</tr>

<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
</tr>

<tr>
	<td>Tgl lahir</td>
	<td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>
</tr>

<tr>
	<td>Status</td>
	<td><input type="text" name="status" value=<?php echo $status;?>></td>
</tr>
<tr>    
<td><input type="hidden" name="nim" value=<?php echo $_GET['NIM'];?>></td>
<td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>
</body>
</html>