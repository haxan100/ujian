<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=hasil_tes';
$regis='?hal=hasil_tes';

$id_periode='';
$jurusan='';
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['periode'])){
	$id_periode=$_GET['periode'];
}
if(isset($_GET['jurusan'])){
	$jurusan=$_GET['jurusan'];
}
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$conn=mysqli_query($conns,"select jumlah from periode_kuota where id_periode='".$id_periode."' and id_jurusan='".$jurusan."'");
$sql=mysqli_fetch_array($conn);
$_2d7b8d90d5719acfada164f228cfcaa8=$sql['jumlah'];

$_8a49b0cdaecb8c5ca5df854c44d2e49d=array();
$_5c1b09b57e5249b809a70edb3b54a1b7=array();
$awal=0;
$conn=mysqli_query($conns,"select id_siswa from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' order by nilai_tes desc,id_siswa");
while($sql=mysqli_fetch_array($conn)){
	$awal++;
	$_8a49b0cdaecb8c5ca5df854c44d2e49d[$sql['id_siswa']]=$awal;
	if($awal<=$_2d7b8d90d5719acfada164f228cfcaa8){
		$_5c1b09b57e5249b809a70edb3b54a1b7[$sql['id_siswa']]='<span class="label label-success">Diterima</span>';
	}else{
		$_5c1b09b57e5249b809a70edb3b54a1b7[$sql['id_siswa']]='<span class="label label-danger">Tidak Diterima</span>';
	}
}

$conn=mysqli_query($conns,"select count(*) as jml from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];


$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&periode='.$id_periode.'&q='.$_36923cf62618d1b9981740738971e651.'&jurusan='.$jurusan;
$_111f1b5b84b5c819ea9ae35968fce466=50;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$listing=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$listing++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$selectOpsi.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$listing){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$awal=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$gender=array('L'=>'Laki-laki','P'=>'Perempuan');
$_14be0ab06abae2d9280a6a375e905b2d=array('Y'=>'<span class="label label-success">Lulus</span>','N'=>'<span class="label label-danger">Tidak Lulus</span>');
$tables='';
$conn="select * from siswa where id_periode='".$id_periode."' and id_jurusan='".$jurusan."' and status='Y' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') order by nilai_tes desc,nisn limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_siswa'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		/*if(mysqli_num_rows(mysqli_query($conns,"select * from recharge_detail where id_siswa='".$id_paket."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if(mysqli_num_rows(mysqli_query($conns,"select * from tukar_poin where id_siswa='".$id_paket."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}*/
		if($_25407a67a7a597297818c35a0d0ed51d==true){$optidis='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$optidis='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		
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
			<td style="text-align:center;">'.$_8a49b0cdaecb8c5ca5df854c44d2e49d[$id_paket].'</td>
			<td style="text-align:center;">'.$_5c1b09b57e5249b809a70edb3b54a1b7[$id_paket].'</td>
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
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:150px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
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
<?php echo $_addbb9f4792a53c78e32e91e1c94f075;?>
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

