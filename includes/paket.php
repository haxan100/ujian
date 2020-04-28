<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=ujian';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=ujian';

$_52f720bdaf922c68904e386cbf0cd227=0;
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from paket where aktif='Y' and id_paket not in (select id_paket from ujian where id_siswa='".$_SESSION['LOGIN_ID']."') order by id_paket desc";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_paket'];
		if($sql['aktif']=='Y'){
			$_75de32ef2738499ab53bba79a1a5a51d='<li><a href="?hal=paket&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=disabled">Status : Tidak Aktif</a></li>';
		}else{
			$_75de32ef2738499ab53bba79a1a5a51d='<li><a href="?hal=paket&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=enabled">Status : Aktif</a></li>';
		}
		
		$_d4cb19f81c23886f544f26709bd4f799.='
		<tr>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;"><a href="?hal=ujian&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'" class="btn btn-primary btn-sm">Masuk</a></td>
		</tr>
		';
	}
}
$_52f720bdaf922c68904e386cbf0cd227=0;
$_346cdacfcfcb66a12c88d6345a2f0d81='';
$conn="select * from paket inner join ujian on paket.id_paket=ujian.id_paket where ujian.id_siswa='".$_SESSION['LOGIN_ID']."' and selesai='Y' order by ujian.id_ujian desc";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select count(*) as jml from soal_paket where id_paket='".$sql['id_paket']."'");
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
		$_b9e53b5867b7fd393a3d5ddf2ceefdf6=$_84ebecebe3a7c3b32dff74f8dce19fce['jml'];
		
		$_346cdacfcfcb66a12c88d6345a2f0d81.='
		<tr>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td style="text-align:center;">'.date('d-m-Y',strtotime($sql['tanggal_mulai'])).'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;">'.$_b9e53b5867b7fd393a3d5ddf2ceefdf6.'</td>
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
	if($_d4cb19f81c23886f544f26709bd4f799==''){ 
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
	  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
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
	if($_346cdacfcfcb66a12c88d6345a2f0d81==''){ 
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
	  <?php echo $_346cdacfcfcb66a12c88d6345a2f0d81;?>
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

