<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=paket';
$regis='?hal=update_paket';
if(isset($_GET['action'])){
	if($_GET['action']=='enabled'){
		mysqli_query($conns,"update paket set aktif='Y' where id_paket='".$_GET['id']."'");
	}
	if($_GET['action']=='disabled'){
		mysqli_query($conns,"update paket set aktif='N' where id_paket='".$_GET['id']."'");
	}
	exit("<script>location.href='".$pengumuman1."';</script>");
}

$sqlgetsoal='';
if(isset($_GET['q'])){
	$sqlgetsoal=$_GET['q'];
}

$conn=mysqli_query($conns,"select count(*) as jml from paket where nama like '%".$sqlgetsoal."%'");
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

$arraysoal=array('Y'=>'<span class="label label-success">Aktif</span>','N'=>'<span class="label label-default">Tidak Aktif</span>');
$tables='';
$conn="select * from paket where nama like '%".$sqlgetsoal."%' order by id_paket limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_paket'];
		$soalbenar=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		if($sql['aktif']=='Y'){
			$opsiPaket='<li><a href="?hal=paket&amp;id='.$id_paket.'&amp;action=disabled">Status : Tidak Aktif</a></li>';
		}else{
			$opsiPaket='<li><a href="?hal=paket&amp;id='.$id_paket.'&amp;action=enabled">Status : Aktif</a></li>';
		}
		
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
		<li class="divider"></li>
		'.$opsiPaket.'
		<li class="divider"></li>
		<li><a href="?hal=soal_ujian&amp;paket='.$id_paket.'">Daftar Soal</a></li>
		<li><a href="simulasi.php?paket='.$id_paket.'" target="_blank">Simulasi Ujian</a></li>
		<li class="divider"></li>
		<li><a href="?hal=peserta&amp;paket='.$id_paket.'">Daftar Peserta</a></li>
		<li><a href="?hal=hasil_tes&amp;paket='.$id_paket.'">Hasil Ujian</a></li>
		</ul>
		</div>
		</td>
		<td style="text-align:center;">'.$awal.'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;">'.$arraysoal[$sql['aktif']].'</td>
		</tr>
		';
	}
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
		<h1 class="page-header">DATA PAKET SOAL</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="paket" />
<input name="q" type="text" value="<?php echo $sqlgetsoal;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<a href="<?php echo $regis;?>" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Input Paket Soal Baru</a>
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
	<th style="text-align:center;">NAMA PAKET SOAL</th>
	<th style="text-align:center;">WAKTU PENGERJAAN</th>
	<th style="text-align:center;">STATUS</th>
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

