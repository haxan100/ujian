<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=kompetensi';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_kompetensi';

$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select count(*) as jml from kompetensi where kode like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_12ef5f8660c2350214ce228aad66392d=$_60169cd1c47b7a7a85ab44f884635e41['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=20;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($_a16d2280393ce6a2a5428a4a8d09e354=1;$_a16d2280393ce6a2a5428a4a8d09e354<=$_f52ba22baf75438bb1b02f476954c023;$_a16d2280393ce6a2a5428a4a8d09e354++){if($_a16d2280393ce6a2a5428a4a8d09e354==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_a16d2280393ce6a2a5428a4a8d09e354.'">'.$_a16d2280393ce6a2a5428a4a8d09e354.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_d4cb19f81c23886f544f26709bd4f799='';
$_eb6af5b4e510c3c874d7d1f51d72393a="select * from kompetensi where kode like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%' order by nama limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,$_eb6af5b4e510c3c874d7d1f51d72393a);
if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a) > 0){
	while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$_60169cd1c47b7a7a85ab44f884635e41['id_kompetensi'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}

		$_d4cb19f81c23886f544f26709bd4f799.='
		<tr>
		<td style="text-align:center;">
		<div class="btn-group">
		<button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
		Aksi <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
		<li><a href="'.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=edit">Edit</a></li>
		<li class="'.$_849d693c62dfe15394a642123c1599c8.'"><a href="#" onclick="'.$_f22a1fc2263e04ec8ae7a008a249229e.'DeleteConfirm(\''.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=delete\');return(false);">Hapus</a></li>
		</ul>
		</div>
		</td>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$_60169cd1c47b7a7a85ab44f884635e41['kode'].'</td>
		<td>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</td>
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
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<a href="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Input Kompetensi Keahlian Baru</a>
<div style="height:10px;clear:both;"></div>
<?php 
if($_d4cb19f81c23886f544f26709bd4f799==''){ 
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
  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
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

