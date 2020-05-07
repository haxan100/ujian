<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=kompetensi';
$regis='?hal=update_kompetensi';

$sqlgetsoal='';
if(isset($_GET['q'])){
	$sqlgetsoal=$_GET['q'];
}

$conn=mysqli_query($conns,"select count(*) as jml from kompetensi where kode like '%".$sqlgetsoal."%' or nama like '%".$sqlgetsoal."%'");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];

$awalsoals=$pengumuman1.'&q='.$sqlgetsoal;
$nilaiujiansoal=20;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;

$tables='';
$conn="select * from kompetensi where kode like '%".$sqlgetsoal."%' or nama like '%".$sqlgetsoal."%' order by nama limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_kompetensi'];
		$soalbenar=false;
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}

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
		<td>'.$sql['kode'].'</td>
		<td>'.$sql['nama'].'</td>
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
		<h1 class="page-header">DATA KOMPETENSI KEAHLIAN</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="kompetensi" />
<input name="q" type="text" value="<?php echo $sqlgetsoal;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<a href="<?php echo $regis;?>" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Input Kompetensi Keahlian Baru</a>
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
	<th style="text-align:center;">KODE</th>
	<th style="text-align:center;">NAMA KOMPETENSI KEAHLIAN</th>
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

