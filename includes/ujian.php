<?php if(!defined('myweb')){ exit(); }?>
<?php
$id='';
if(isset($_GET['id'])){
	$id=$_GET['id'];
}

$conn=mysqli_query($conns,"select * from paket where id_paket='".$id."' and aktif='Y'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];
$waktu=$sql['waktu_pengerjaan'];
$conn=mysqli_query($conns,"select count(*) as jml from soal_paket where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$jumlah=$sql['jml'];

if(isset($_POST['mulai'])){
	if(mysqli_num_rows(mysqli_query($conns,"select * from ujian where id_paket='".$_POST['paket']."' and id_siswa='".$_SESSION['LOGIN_ID']."'"))>0){
		exit("<script>location.href='?hal=paket_ujian';</script>");
	}
	mysqli_query($conns,"insert into ujian(id_paket,id_siswa,tanggal_mulai,selesai) values('".$_POST['paket']."','".$_SESSION['LOGIN_ID']."','".date('Y-m-d H:i:s')."','N')");
	$sqli=mysqli_insert_id($conns);
	$paket=array();
	$conn=mysqli_query($conns,"select id_soal from soal_paket where id_paket='".$_POST['paket']."'");
	while($sql=mysqli_fetch_array($conn)){
		$paket[]=$sql['id_soal'];
	}
	for($mulai=0;$mulai<=10;$mulai++){
		shuffle($paket);
	}
	for($mulai=0;$mulai<count($paket);$mulai++){
		mysqli_query($conns,"insert into ujian_detail(id_ujian,id_soal,jawaban) values('".$sqli."','".$paket[$mulai]."','')");
	}
	exit("<script>location.href='".$look."ujian.php';</script>");
}
$stat='N';
$nilai=0;
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and id_paket='".$id."'");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$sqli=$sql['id_ujian'];
	$stat=$sql['selesai'];
	$nilai=$sql['nilai'];
}
$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$nisn=$sql['nisn'];
$nama=$sql['nama'];
$idkelas=$sql['id_kelas'];
$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$idkelas."'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">
		<?php if($stat=='Y'){echo 'Hasil Ujian';}else{echo 'Ujian';}?>
		</h1>
	</div>
</div>
<?php 
if($id==''){
	echo '<div class="alert alert-danger">Mohon maaf, paket ujian yang Anda pilih tidak aktif.</div>';
}else{ 
?>
<?php
if($stat=='Y'){
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
			  <tr>
				<td width="150" style="vertical-align:middle;border-top-width:0;">Username</td>
				<td style="border-top-width:0;">: <?php echo $nisn;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Nama Siswa</td>
				<td>: <?php echo $nama;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Kelas</td>
				<td>: <?php echo $nama;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Paket Ujian</td>
				<td>: <?php echo $nama;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Nilai</td>
				<td>: <strong><?php echo $nilai;?> </strong></td>
			  </tr>
			</table>
		</div>
	</div>
</div>
<center><a href="print.php?id=<?php echo $id;?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a></center>
<?php }else{ ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
			  <tr>
				<td width="150" style="vertical-align:middle;border-top-width:0;">Paket Ujian</td>
				<td style="border-top-width:0;">: <?php echo $nama;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Jumlah Soal</td>
				<td>: <?php echo $jumlah;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Waktu Pengerjaan</td>
				<td>: <strong><?php echo $waktu;?> menit</strong></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Bentuk Soal</td>
				<td>: Pilihan ganda A,B,C,D,E</td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Cara Pengerjaan</td>
				<td>: Pilihlah salah satu jawaban yang benar dan setelah itu akan ditampilkan soal berikutnya</td>
			  </tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form action="" method="post">
		<input name="paket" type="hidden" value="<?php echo $id;?>" />
		<center>
		<h3>Apakah Anda yakin akan memulai ujian?</h3><br />
		<button type="submit" name="mulai" id="save" class="btn btn-success btn-lg"> Mulai Ujian <i class="fa fa-check"></i></button>
		<button type="button" name="cancel" id="save" class="btn btn-danger btn-lg" onclick="location.href='?hal=paket_ujian'"> Batal <i class="fa fa-close"></i></button>
		</center>
		</form>
	</div>
</div>
<?php } ?>
<?php } ?>





<?php
/*
---------------------------------------------
haxan100
*/
?>

