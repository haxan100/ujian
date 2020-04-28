<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=pengumuman';
$regis='?hal=pengumuman';

$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
$idkelas='';
if(isset($_GET['kelas'])){
	$idkelas=$_GET['kelas'];
}


$_52f720bdaf922c68904e386cbf0cd227=0;
$hasil='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' and siswa.id_kelas='".$idkelas."' order by peserta.id_peserta";
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		
		$juml=mysqli_query($conns,"select nilai from ujian where id_paket='".$id."' and id_siswa='".$sql['id_siswa']."' and selesai='Y'");
		$totAll=mysqli_fetch_array($juml);
		$nilai=$totAll['nilai'];

		$hasil.='
		  <tr>
			<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
			<td>'.$sql['nisn'].'</td>
			<td>'.$sql['nama'].'</td>
			<td style="text-align:center;">'.$nilai.'</td>
		  </tr>
		';
	}
}
$opsi='<option value="">Pilih Paket Ujian</option>';
$conn=mysqli_query($conns,"select * from paket where aktif='Y' order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($id==$sql['id_paket']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}
$nama=array();
$conn=mysqli_query($conns,"select siswa.id_kelas from siswa inner join peserta on siswa.id_siswa=peserta.id_siswa where peserta.id_paket='".$id."'");
while($sql=mysqli_fetch_array($conn)){
	$nama[]=$sql['id_kelas'];
}

$_a6abb7c18ac54429027c2440b5329b86='<option value="">Pilih Kelas</option>';
if(count($nama)>0){
	$conn=mysqli_query($conns,"select * from kelas where id_kelas in (".implode(',',$nama).") order by nama");
	while($sql=mysqli_fetch_array($conn)){
		if($idkelas==$sql['id_kelas']){$selectOpsi='selected';}else{$selectOpsi='';}
		$_a6abb7c18ac54429027c2440b5329b86.='<option value="'.$sql['id_kelas'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
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

