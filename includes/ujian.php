<?php if(!defined('myweb')){ exit(); }?>
<?php
$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['id'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['id'];
}

$conn=mysqli_query($conns,"select * from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and aktif='Y'");
$sql=mysqli_fetch_array($conn);
$_4cbd557d34801deff9f3656970cd5398=$sql['nama'];
$_36fd7f7111215a7056422e47518363d7=$sql['waktu_pengerjaan'];
$conn=mysqli_query($conns,"select count(*) as jml from soal_paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
$sql=mysqli_fetch_array($conn);
$_b9e53b5867b7fd393a3d5ddf2ceefdf6=$sql['jml'];

if(isset($_POST['mulai'])){
	if(mysqli_num_rows(mysqli_query($conns,"select * from ujian where id_paket='".$_POST['paket']."' and id_siswa='".$_SESSION['LOGIN_ID']."'"))>0){
		exit("<script>location.href='?hal=paket_ujian';</script>");
	}
	mysqli_query($conns,"insert into ujian(id_paket,id_siswa,tanggal_mulai,selesai) values('".$_POST['paket']."','".$_SESSION['LOGIN_ID']."','".date('Y-m-d H:i:s')."','N')");
	$_fbd326c813664d903c80679981cafba3=mysqli_insert_id($conns);
	$_1b66aa9bfba43381db0e3cc139369d48=array();
	$conn=mysqli_query($conns,"select id_soal from soal_paket where id_paket='".$_POST['paket']."'");
	while($sql=mysqli_fetch_array($conn)){
		$_1b66aa9bfba43381db0e3cc139369d48[]=$sql['id_soal'];
	}
	for($mulai=0;$mulai<=10;$mulai++){
		shuffle($_1b66aa9bfba43381db0e3cc139369d48);
	}
	for($mulai=0;$mulai<count($_1b66aa9bfba43381db0e3cc139369d48);$mulai++){
		mysqli_query($conns,"insert into ujian_detail(id_ujian,id_soal,jawaban) values('".$_fbd326c813664d903c80679981cafba3."','".$_1b66aa9bfba43381db0e3cc139369d48[$mulai]."','')");
	}
	exit("<script>location.href='".$look."_07b8b0f04e1dbda1240ce57d13aa6d1a.php';</script>");
}
$stat='N';
$_c04df7e5dc078931b278b5a69b691465=0;
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$_fbd326c813664d903c80679981cafba3=$sql['id_ujian'];
	$stat=$sql['selesai'];
	$_c04df7e5dc078931b278b5a69b691465=$sql['nilai'];
}
$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$nisn=$sql['nisn'];
$nama=$sql['nama'];
$_72e838785b161ce1f713d6b1a452e270=$sql['id_kelas'];
$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$_72e838785b161ce1f713d6b1a452e270."'");
$sql=mysqli_fetch_array($conn);
$_38895153c69c18db0dbba317a1d8d369=$sql['nama'];

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">
		<?php if($stat=='Y'){echo 'Hasil Ujian';}else{echo 'Ujian';}?>
		</h1>
	</div>
</div>
<?php 
if($_b78f9e7c4587e8583ab713f126277f88==''){
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
				<td>: <?php echo $_38895153c69c18db0dbba317a1d8d369;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Paket Ujian</td>
				<td>: <?php echo $_4cbd557d34801deff9f3656970cd5398;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Nilai</td>
				<td>: <strong><?php echo $_c04df7e5dc078931b278b5a69b691465;?> </strong></td>
			  </tr>
			</table>
		</div>
	</div>
</div>
<center><a href="_941038c5461caf6e2bb77377cbf6532d.php?id=<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a></center>
<?php }else{ ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
			  <tr>
				<td width="150" style="vertical-align:middle;border-top-width:0;">Paket Ujian</td>
				<td style="border-top-width:0;">: <?php echo $_4cbd557d34801deff9f3656970cd5398;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Jumlah Soal</td>
				<td>: <?php echo $_b9e53b5867b7fd393a3d5ddf2ceefdf6;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Waktu Pengerjaan</td>
				<td>: <strong><?php echo $_36fd7f7111215a7056422e47518363d7;?> menit</strong></td>
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
		<input name="paket" type="hidden" value="<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" />
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

