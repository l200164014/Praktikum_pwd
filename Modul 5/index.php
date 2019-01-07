<html>
<head><title>Data Mahasiswa</title></head>
<body>
<?php
	$koneksi = mysqli_connect("localhost","root","","informatika") or die("koneksigagal");
?>
<h1 align='center'>DATA MAHASISWA</h1>
<table width='70%' border='0' align='center' cellpadding='0'>
<form method='POST' action='index.php'>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td><input type='text' name='nim' id='nim'></td>
	</tr>
	<tr>
		<td>NAMA</td>
		<td>:</td>
		<td><input type='text' name='nm' id='nm'></td>
	</tr>
	<tr>
		<td>KELAS</td>
		<td>:</td>
		<td><input type='radio' name='jk' value='a' checked>
		A
		<input type='radio' name='jk' value='b' checked>
		B
		<input type='radio' name='jk' value='b' checked>
		C</td>
	</tr>
	<tr>
		<td>ALAMAT</td>
		<td>:</td>
		<td><textarea name='almt' id='txtalmt' cols='40' rows='3'></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type='submit' name='kirim' id='txtkirim' value='Input Data'></td>
	</tr>
</form>
</table>
<table align='center' border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>NIM</b></td>
<td align='center' width='30%'><b>NAMA</b></td>
<td align='center' width='20%'><b>KELAS</b></td>
<td align='center' width='20%'><b>ALAMAT</b></td>
<td align='center' width='20%'><b>UBAH</b></td>
</tr></br></br>
<?php
	$nim=mysqli_query($koneksi,"SELECT * FROM mahasiswa order by nim asc");
	while($data = mysqli_fetch_array($nim)){
?>

<tr>
<td width='20%'><?php echo $data[0] ; ?></td>
<td width='30%'><?php echo $data[1] ; ?></td>
<td width='10%'><?php echo $data[2] ; ?></td>
<td width='30%'><?php echo $data[3] ; ?></td>
<td width='30%'><a href='tugas.php?nim=<?php echo $data[0] ; ?>'>ganti</a></td>
</tr>
<?php
	}
?>

<?php
error_reporting(E_ALL^E_NOTICE);
$nim = $_POST['nim'];
$nama = $_POST['nm'];
$kelas = $_POST['jk'];
$alamat = $_POST['almt'];
$submit = $_POST['kirim'];
if($submit){
	if ($nim==''){
		echo "</br>NIM tidak boleh kosong, diisi dulu";
	}elseif($nama==''){
		echo "</br>Nama tidak boleh kosong, diisi dulu";
	}elseif($alamat==''){
		echo "</br>Alamat tidak boleh kosong, diisi dulu";
	}
	else {
		mysqli_query($koneksi, "insert into mahasiswa(nim, nama, kelas, alamat) VALUES ('$nim','$nama','$kelas','$alamat')");
	}
}
?>

</table>
</body>
</html>


