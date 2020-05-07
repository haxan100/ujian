<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=kelas';
$regis='?hal=update_kelas';

$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$conn=mysqli_query($conns,"select count(*) as jml from kelas where (kode like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%')");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=20;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$listing=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$listing++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$selectOpsi.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$listing){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$awal=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$tables='';
$conn="select * from kelas where (kode like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') order by nama limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_kelas'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		if($_25407a67a7a597297818c35a0d0ed51d==true){$optidis='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$optidis='';$_f22a1fc2263e04ec8ae7a008a249229e='';}

		$tables.='
		<tr>
		<td style="text-align:center;">
		<div class="btn-group">
		<button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
		Aksi <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
		<li><a href="'.$regis.'&amp;id='.$id_paket.'&amp;action=edit">Edit</a></li>
		<li class="'.$optidis.'"><a href="#" onclick="'.$_f22a1fc2263e04ec8ae7a008a249229e.'DeleteConfirm(\''.$regis.'&amp;id='.$id_paket.'&amp;action=delete\');return(false);">Hapus</a></li>
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
		<h1 class="page-header">DATA KELAS</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="kelas" />
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<a href="<?php echo $regis;?>" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Input Kelas Baru</a>
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
	<th style="text-align:center;">NAMA KELAS</th>
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

