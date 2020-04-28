<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=pengumuman';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=pengumuman';

$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['paket'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
}
$_72e838785b161ce1f713d6b1a452e270='';
if(isset($_GET['kelas'])){
	$_72e838785b161ce1f713d6b1a452e270=$_GET['kelas'];
}


$_52f720bdaf922c68904e386cbf0cd227=0;
$hasil='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and siswa.id_kelas='".$_72e838785b161ce1f713d6b1a452e270."' order by peserta.id_peserta";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select nilai from ujian where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and id_siswa='".$sql['id_siswa']."' and selesai='Y'");
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
		$_c04df7e5dc078931b278b5a69b691465=$_84ebecebe3a7c3b32dff74f8dce19fce['nilai'];

		$hasil.='
		  <tr>
			<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
			<td>'.$sql['nisn'].'</td>
			<td>'.$sql['nama'].'</td>
			<td style="text-align:center;">'.$_c04df7e5dc078931b278b5a69b691465.'</td>
		  </tr>
		';
	}
}
$opsi='<option value="">Pilih Paket Ujian</option>';
$conn=mysqli_query($conns,"select * from paket where aktif='Y' order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($_b78f9e7c4587e8583ab713f126277f88==$sql['id_paket']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}
$_38895153c69c18db0dbba317a1d8d369=array();
$conn=mysqli_query($conns,"select siswa.id_kelas from siswa inner join peserta on siswa.id_siswa=peserta.id_siswa where peserta.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
while($sql=mysqli_fetch_array($conn)){
	$_38895153c69c18db0dbba317a1d8d369[]=$sql['id_kelas'];
}

$_a6abb7c18ac54429027c2440b5329b86='<option value="">Pilih Kelas</option>';
if(count($_38895153c69c18db0dbba317a1d8d369)>0){
	$conn=mysqli_query($conns,"select * from kelas where id_kelas in (".implode(',',$_38895153c69c18db0dbba317a1d8d369).") order by nama");
	while($sql=mysqli_fetch_array($conn)){
		if($_72e838785b161ce1f713d6b1a452e270==$sql['id_kelas']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
		$_a6abb7c18ac54429027c2440b5329b86.='<option value="'.$sql['id_kelas'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
	}
}
?>

<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">Pengumuman Hasil Ujian</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get">
<input name="hal" type="hidden" value="pengumuman" />
<select name="paket" class="form-control" onchange="submit()" style="width:300px;float:left;margin-right:5px;"><?php echo $opsi;?></select>
<select name="kelas" class="form-control" onchange="submit()" style="width:300px;float:left;"><?php echo $_a6abb7c18ac54429027c2440b5329b86;?></select>
</form>
<div style="clear:both;height:10px;"></div>
<?php 
if($hasil==''){ 
	echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
}else{
?>
<div class="panel panel-default">
<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
	<th style="text-align:center;" width="40">NO</th>
	<th style="text-align:center;" width="150">NISN</th>
	<th style="text-align:center;">NAMA PESERTA DIDIK</th>
	<th style="text-align:center;" width="80">NILAI</th>
  </tr>
  </thead>
  <tbody>
  <?php echo $hasil;?>
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

