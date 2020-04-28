<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=ujian';
$regis='?hal=ujian';

$awal=0;
$tables='';
$conn="select * from paket where aktif='Y' and id_paket not in (select id_paket from ujian where id_siswa='".$_SESSION['LOGIN_ID']."') order by id_paket desc";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_paket'];
		if($sql['aktif']=='Y'){
			$opsiPaket='<li><a href="?hal=paket&amp;id='.$id_paket.'&amp;action=disabled">Status : Tidak Aktif</a></li>';
		}else{
			$opsiPaket='<li><a href="?hal=paket&amp;id='.$id_paket.'&amp;action=enabled">Status : Aktif</a></li>';
		}
		
		$tables.='
		<tr>
		<td style="text-align:center;">'.$awal.'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;"><a href="?hal=ujian&amp;id='.$id_paket.'" class="btn btn-primary btn-sm">Masuk</a></td>
		</tr>
		';
	}
}
$awal=0;
$tablesSis='';
$conn="select * from paket inner join ujian on paket.id_paket=ujian.id_paket where ujian.id_siswa='".$_SESSION['LOGIN_ID']."' and selesai='Y' order by ujian.id_ujian desc";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$juml=mysqli_query($conns,"select count(*) as jml from soal_paket where id_paket='".$sql['id_paket']."'");
		$totAll=mysqli_fetch_array($juml);
		$jumlah=$totAll['jml'];
		
		$tablesSis.='
		<tr>
		<td style="text-align:center;">'.$awal.'</td>
		<td style="text-align:center;">'.date('d-m-Y',strtotime($sql['tanggal_mulai'])).'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;">'.$jumlah.'</td>
		<td style="text-align:center;">'.$sql['nilai'].'</td>
		</tr>
		';
	}
}

?>

<div class="row">
	<div class="col-lg-12">
		<div class="page-header" style="margin-top:0">
		  <h1 style="margin-top:0">Paket Ujian </h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<?php 
	if($tables==''){ 
		echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
	}else{
	?>
	<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;" width="40">NO</th>
		<th style="text-align:center;">NAMA PAKET</th>
		<th style="text-align:center;">WAKTU PENGERJAAN</th>
		<th style="text-align:center;">&nbsp;</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php echo $tables;?>
	  </tbody>
	</table>
	</div>
	<?php } ?>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="page-header" style="margin-top:0">
		  <h1 style="margin-top:0">Kumpulan Nilai Ujian </h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<?php 
	if($tablesSis==''){ 
		echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
	}else{
	?>
	<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;" width="40">NO</th>
		<th style="text-align:center;">TANGGAL</th>
		<th style="text-align:center;">NAMA PAKET</th>
		<th style="text-align:center;">WAKTU</th>
		<th style="text-align:center;">JUMLAH SOAL</th>
		<th style="text-align:center;">NILAI</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php echo $tablesSis;?>
	  </tbody>
	</table>
	</div>
	<?php } ?>

	</div>
</div>



<?php
/*
---------------------------------------------
haxan100
*/
?>

