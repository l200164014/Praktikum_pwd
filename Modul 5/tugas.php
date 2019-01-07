<html>
<head><title>Tugas</title></head>
<body>
<?php
	$koneksi = mysqli_connect("localhost","root","","informatika") or die("koneksigagal");
	$ganti=$_GET['nim'];
	$nim=mysqli_query($koneksi,"SELECT *FROM mahasiswa where nim='$ganti' order by nim asc");
	$data = mysqli_fetch_array($nim);
?>
<h1 align='center'>TUGAS </h1>
<table width='70%' border='0' align='center' cellpadding='0'>
<form method='POST' action='tugas.php?nim=<?php echo $ganti; ?>'>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td><input type='text' name='nim' id='nm' value="<?php echo $data['nim']; ?>"></td>
	</tr>
	<tr>
		<td>NAMA</td>
		<td>:</td>
		<td><input type='text' name='nm' id='nim' value="<?php echo $data['nama']; ?>"></td>
	</tr>
	<tr>
		<td>KELAS</td>
		<td>:</td>
		<td>
		<?php
			if($data['kelas'] == 'A'){
		?>
			<input type='radio' name='jk' value='a' checked>
			A
			<input type='radio' name='jk' value='b' >
			B
			<input type='radio' name='jk' value='b' >
			C
		<?php
			}else if($data['kelas'] == 'B'){
		?>
			<input type='radio' name='jk' value='a' >
		A
		<input type='radio' name='jk' value='b' checked>
		B
		<input type='radio' name='jk' value='b' >
		C

		<?php		
			}else{
		?>
		<input type='radio' name='jk' value='a' >
		A
		<input type='radio' name='jk' value='b' >
		B
		<input type='radio' name='jk' value='b' checked>
		C
		<?php
			}
		?>
		</td>
	</tr>
	<tr>
		<td>ALAMAT</td>
		<td>:</td>
		<td><textarea name='almt' id='txtalmt' cols='40' rows='3'><?php echo $data['alamat']; ?></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type='submit' name='kirim' id='txtkirim' value='Input Data'></td>
	</tr>
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
		mysqli_query($koneksi, "UPDATE mahasiswa SET nim ='$nim', nama = '$nama', alamat = '$alamat' WHERE nim = '$nim'");
		echo '<meta http-equiv="refresh" content="0; url=index.php" />';
	}
}
	
?>
</form>
</table>

