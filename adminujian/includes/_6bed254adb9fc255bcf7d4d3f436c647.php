<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=hasil_tes';
$regis='?hal=hasil_tes';

$id_periode='';
$jurusan='';
$sqlgetsoal='';
if(isset($_GET['periode'])){
	$id_periode=$_GET['periode'];
}
if(isset($_GET['jurusan'])){
	$jurusan=$_GET['jurusan'];
}
if(isset($_GET['q'])){
	$sqlgetsoal=$_GET['q'];
}

$conn=mysqli_query($conns,"select jumlah from periode_kuota where id_periode='".$id_periode."' and id_jurusan='".$jurusan."'");
$sql=mysqli_fetch_array($conn);
$jumlah=$sql['jumlah'];

$arayawal=array();
$arayakhir=array();
$awal=0;
$conn=mysqli_query($conns,"select id_siswa from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' order by nilai_tes desc,id_siswa");
while($sql=mysqli_fetch_array($conn)){
	$awal++;
	$arayawal[$sql['id_siswa']]=$awal;
	if($awal<=$jumlah){
		$arayakhir[$sql['id_siswa']]='<span class="label label-success">Diterima</span>';
	}else{
		$arayakhir[$sql['id_siswa']]='<span class="label label-danger">Tidak Diterima</span>';
	}
}

$conn=mysqli_query($conns,"select count(*) as jml from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' and (nisn like '%".$sqlgetsoal."%' or nama like '%".$sqlgetsoal."%') ");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];


$awalsoals=$pengumuman1.'&periode='.$id_periode.'&q='.$sqlgetsoal.'&jurusan='.$jurusan;
$nilaiujiansoal=50;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;

$gender=array('L'=>'Laki-laki','P'=>'Perempuan');
$_14be0ab06abae2d9280a6a375e905b2d=array('Y'=>'<span class="label label-success">Lulus</span>','N'=>'<span class="label label-danger">Tidak Lulus</span>');
$tables='';
$conn="select * from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' and (nisn like '%".$sqlgetsoal."%' or nama like '%".$sqlgetsoal."%') order by nilai_tes desc,nisn limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_siswa'];
		$soalbenar=false;
		/*if(mysqli_num_rows(mysqli_query($conns,"select * from recharge_detail where id_siswa='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if(mysqli_num_rows(mysqli_query($conns,"select * from tukar_poin where id_siswa='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}*/
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		
		$juml=mysqli_query($conns,"select nama from jurusan where id_jurusan='".$sql['id_jurusan']."'");
		$totAll=mysqli_fetch_array($juml);
		$hitung=$totAll['nama'];
		
		$tables.='
		  <tr>
			<td style="text-align:center;">'.$awal.'</td>
			<td>'.$sql['nisn'].'</td>
			<td>'.$sql['nama'].'</td>
			<td>'.$gender[$sql['gender']].'</td>
			<td>'.$hitung.'</td>
			<td style="text-align:center;">'.$sql['nilai_tes'].'</td>
			<td style="text-align:center;">'.$arayawal[$id_paket].'</td>
			<td style="text-align:center;">'.$arayakhir[$id_paket].'</td>
		  </tr>
		';
	}
}

$optionStatis='<option value="">Pilih Periode</option>';
$conn=mysqli_query($conns,"select * from periode order by id_periode");
while($sql=mysqli_fetch_array($conn)){
	if($id_periode==$sql['id_periode']){$selectOpsi='selected';}else{$selectOpsi='';}
	$optionStatis.='<option value="'.$sql['id_periode'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}
$opsiJurusan='<option value="">Pilih Kompetensi</option>';
$conn=mysqli_query($conns,"select * from jurusan order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($jurusan==$sql['id_jurusan']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsiJurusan.='<option value="'.$sql['id_jurusan'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

?>

<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA HASIL TES</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="hasil_tes" />
<select name="periode" class="form-control" style="width:150px;float:left;margin-right:5px;"><?php echo $optionStatis;?></select>
<select name="jurusan" class="form-control" style="width:170px;float:left;margin-right:5px;"><?php echo $opsiJurusan;?></select>
<input name="q" type="text" value="<?php echo $sqlgetsoal;?>" class="form-control" placeholder="Pencarian" style="float:left;width:150px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
</form>
<div style="float:right">
<a href="export_tes.php?periode=<?php echo $id_periode;?>&amp;jurusan=<?php echo $jurusan;?>" class="btn btn-primary <?php if($id_periode=='' or $jurusan==''){echo 'disabled';}?>"><i class="fa fa-save"></i> Download</a>&nbsp;
<a href="print_tes.php?periode=<?php echo $id_periode;?>&amp;jurusan=<?php echo $jurusan;?>" class="btn btn-primary <?php if($id_periode=='' or $jurusan==''){echo 'disabled';}?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>

</div>
<div style="height:10px;clear:both;"></div>
<?php 
if($tables==''){ 
	echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
}else{
?>
<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
	<th style="text-align:center;" width="40">NO</th>
	<th style="text-align:center;" width="100">NISN</th>
	<th style="text-align:center;">NAMA SISWA</th>
	<th style="text-align:center;">J. KELAMIN</th>
	<th style="text-align:center;">KOMP. KEAHLIAN</th>
	<th style="text-align:center;" width="80">SKOR</th>
	<th style="text-align:center;" width="60">PERINGKAT</th>
	<th style="text-align:center;" width="60">STATUS</th>
  </tr>
  </thead>
  <tbody>
  <?php echo $tables;?>
  </tbody>
</table>
<center>
<?php echo $linksoalujian;?>
</center>
<?php } ?>

	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

