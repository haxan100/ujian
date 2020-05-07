<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=soal';
$regis='?hal=update_soal';

$mapel='';
$sqlgetsoal='';
if(isset($_GET['pelajaran'])){
	$mapel=$_GET['pelajaran'];
}
if(isset($_GET['q'])){
	$sqlgetsoal=$_GET['q'];
}

$conn =mysqli_query($conns,"select count(*) as jml from soal where id_pelajaran='".$mapel."' and detail like '%".$sqlgetsoal."%'");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];

$awalsoals=$pengumuman1.'&q='.$sqlgetsoal;
$nilaiujiansoal=100;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;

$arraysoal=array('Y'=>'<span class="label label-success">AKTIF</span>','N'=>'<span class="label label-danger">Tidak Aktif</span>');
$tables='';
$conn="select * from soal where id_pelajaran='".$mapel."' and detail like '%".$sqlgetsoal."%' order by id_soal limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_soal'];
		$kunci=$sql['kunci'];
		$soalbenar=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_periode='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		$classtable='<table class="table" style="background:none;">';
		$juml=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$id_paket."' order by id_soal_jawaban");
		while($totAll=mysqli_fetch_array($juml)){
			if($totAll['kode']==$kunci){
				$classlable='<span class="label label-warning">'.$totAll['kode'].'.</span>';
			}else{
				$classlable='<span class="label label-info">'.$totAll['kode'].'.</span>';
			}
			$classtable.='<tr><td width="20" style="border:none;">'.$classlable.'</td><td style="border:none;">'.$totAll['jawaban'].'</td></tr>';
		}
		$classtable.='</table>';
		
		$tables.='
		<tr>
		<td style="text-align:center;">
		<div class="btn-group">
		<button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
		Aksi <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
		<li><a href="'.$regis.'&amp;id='.$id_paket.'&amp;action=edit">Edit</a></li>
		<li class="'.$optidis.'"><a href="#" onclick="'.$soalkondisi.'DeleteConfirm(\''.$regis.'&amp;id='.$id_paket.'&amp;action=delete\');return(false);">Hapus</a></li>
		</ul>
		</div>
		</td>
		<td style="text-align:center;">'.$awal.'</td>
		<td>
		'.$sql['detail'].'
		'.$classtable.'
		</td>
		</tr>
		';
	}
}
$option='<option value="">Pilih Pelajaran</option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($mapel==$sql['id_pelajaran']){$selectOpsi='selected';}else{$selectOpsi='';}
	$option.='<option value="'.$sql['id_pelajaran'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

?>

<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
</script>
<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA SOAL</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="soal" />
<select name="pelajaran" class="form-control" onchange="submit()" style="width:300px;float:left;margin-right:5px;"><?php echo $option;?></select>
<input name="q" type="text" value="<?php echo $sqlgetsoal;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<div style="float:right">
<a href="<?php echo $regis;?>" class="btn btn-primary"><i class="fa fa-plus"></i> Input Soal Baru</a>
&nbsp;<a href="?hal=import_soal" class="btn btn-primary"><i class="fa fa-arrow-circle-o-down"></i> Import</a>
&nbsp;<a href="jawaban.php?pelajaran=<?php echo $mapel;?>" class="btn btn-primary"><i class="fa fa-save"></i> Download</a>
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
	<th style="text-align:center;" width="70">&nbsp;</th>
	<th style="text-align:center;" width="40">NO</th>
	<th style="text-align:center;">SOAL</th>
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

