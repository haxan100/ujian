<?php if(!defined('myweb')){ exit(); }?>
<?php
$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['id'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['id'];
}

$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and aktif='Y'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_4cbd557d34801deff9f3656970cd5398=$_60169cd1c47b7a7a85ab44f884635e41['nama'];
$_36fd7f7111215a7056422e47518363d7=$_60169cd1c47b7a7a85ab44f884635e41['waktu_pengerjaan'];
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select count(*) as jml from soal_paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_b9e53b5867b7fd393a3d5ddf2ceefdf6=$_60169cd1c47b7a7a85ab44f884635e41['jml'];

if(isset($_POST['mulai'])){
	if(mysqli_num_rows(mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from ujian where id_paket='".$_POST['paket']."' and id_siswa='".$_SESSION['LOGIN_ID']."'"))>0){
		exit("<script>location.href='?hal=paket_ujian';</script>");
	}
	mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"insert into ujian(id_paket,id_siswa,tanggal_mulai,selesai) values('".$_POST['paket']."','".$_SESSION['LOGIN_ID']."','".date('Y-m-d H:i:s')."','N')");
	$_fbd326c813664d903c80679981cafba3=mysqli_insert_id($_000b935637cea64cc7810fb0077f5ff1);
	$_1b66aa9bfba43381db0e3cc139369d48=array();
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select id_soal from soal_paket where id_paket='".$_POST['paket']."'");
	while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
		$_1b66aa9bfba43381db0e3cc139369d48[]=$_60169cd1c47b7a7a85ab44f884635e41['id_soal'];
	}
	for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<=10;$_a16d2280393ce6a2a5428a4a8d09e354++){
		shuffle($_1b66aa9bfba43381db0e3cc139369d48);
	}
	for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_1b66aa9bfba43381db0e3cc139369d48);$_a16d2280393ce6a2a5428a4a8d09e354++){
		mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"insert into ujian_detail(id_ujian,id_soal,jawaban) values('".$_fbd326c813664d903c80679981cafba3."','".$_1b66aa9bfba43381db0e3cc139369d48[$_a16d2280393ce6a2a5428a4a8d09e354]."','')");
	}
	exit("<script>location.href='".$_e343e503cb9623b59b7d7c30484aa086."_07b8b0f04e1dbda1240ce57d13aa6d1a.php';</script>");
}
$_8f128c86231aedb3ad839316104082b1='N';
$_c04df7e5dc078931b278b5a69b691465=0;
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a)>0){
	$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
	$_fbd326c813664d903c80679981cafba3=$_60169cd1c47b7a7a85ab44f884635e41['id_ujian'];
	$_8f128c86231aedb3ad839316104082b1=$_60169cd1c47b7a7a85ab44f884635e41['selesai'];
	$_c04df7e5dc078931b278b5a69b691465=$_60169cd1c47b7a7a85ab44f884635e41['nilai'];
}
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_5ab9622c6027ac8a26ecfedc9e0c5f27=$_60169cd1c47b7a7a85ab44f884635e41['nisn'];
$_1c52cc9c9ab07c5f9e034d3d9fca55dc=$_60169cd1c47b7a7a85ab44f884635e41['nama'];
$_72e838785b161ce1f713d6b1a452e270=$_60169cd1c47b7a7a85ab44f884635e41['id_kelas'];
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from kelas where id_kelas='".$_72e838785b161ce1f713d6b1a452e270."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_38895153c69c18db0dbba317a1d8d369=$_60169cd1c47b7a7a85ab44f884635e41['nama'];

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">
		<?php if($_8f128c86231aedb3ad839316104082b1=='Y'){echo 'Hasil Ujian';}else{echo 'Ujian';}?>
		</h1>
	</div>
</div>
<?php 
if($_b78f9e7c4587e8583ab713f126277f88==''){
	echo '<div class="alert alert-danger">Mohon maaf, paket ujian yang Anda pilih tidak aktif.</div>';
}else{ 
?>
<?php
if($_8f128c86231aedb3ad839316104082b1=='Y'){
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
			  <tr>
				<td width="150" style="vertical-align:middle;border-top-width:0;">Username</td>
				<td style="border-top-width:0;">: <?php echo $_5ab9622c6027ac8a26ecfedc9e0c5f27;?></td>
			  </tr>
			  <tr>
				<td style="vertical-align:middle;">Nama Siswa</td>
				<td>: <?php echo $_1c52cc9c9ab07c5f9e034d3d9fca55dc;?></td>
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

