<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=paket';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_paket';
if(isset($_GET['action'])){
	if($_GET['action']=='enabled'){
		mysqli_query($conns,"update paket set aktif='Y' where id_paket='".$_GET['id']."'");
	}
	if($_GET['action']=='disabled'){
		mysqli_query($conns,"update paket set aktif='N' where id_paket='".$_GET['id']."'");
	}
	exit("<script>location.href='".$pengumuman1."';</script>");
}

$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$conn=mysqli_query($conns,"select count(*) as jml from paket where nama like '%".$_36923cf62618d1b9981740738971e651."%'");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=100;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($_a16d2280393ce6a2a5428a4a8d09e354=1;$_a16d2280393ce6a2a5428a4a8d09e354<=$_f52ba22baf75438bb1b02f476954c023;$_a16d2280393ce6a2a5428a4a8d09e354++){if($_a16d2280393ce6a2a5428a4a8d09e354==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_a16d2280393ce6a2a5428a4a8d09e354.'">'.$_a16d2280393ce6a2a5428a4a8d09e354.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_971d98e0ad23e0905a3d3f4b08d46579=array('Y'=>'<span class="label label-success">Aktif</span>','N'=>'<span class="label label-default">Tidak Aktif</span>');
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from paket where nama like '%".$_36923cf62618d1b9981740738971e651."%' order by id_paket limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_paket'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		if($sql['aktif']=='Y'){
			$_75de32ef2738499ab53bba79a1a5a51d='<li><a href="?hal=paket&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=disabled">Status : Tidak Aktif</a></li>';
		}else{
			$_75de32ef2738499ab53bba79a1a5a51d='<li><a href="?hal=paket&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=enabled">Status : Aktif</a></li>';
		}
		
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
		<li class="divider"></li>
		'.$_75de32ef2738499ab53bba79a1a5a51d.'
		<li class="divider"></li>
		<li><a href="?hal=soal_ujian&amp;paket='.$_3584859062ea9ecfb39b93bfcef8e869.'">Daftar Soal</a></li>
		<li><a href="_ca2af8a29582009a8583f110b425c5e6.php?paket='.$_3584859062ea9ecfb39b93bfcef8e869.'" target="_blank">Simulasi Ujian</a></li>
		<li class="divider"></li>
		<li><a href="?hal=peserta&amp;paket='.$_3584859062ea9ecfb39b93bfcef8e869.'">Daftar Peserta</a></li>
		<li><a href="?hal=hasil_tes&amp;paket='.$_3584859062ea9ecfb39b93bfcef8e869.'">Hasil Ujian</a></li>
		</ul>
		</div>
		</td>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$sql['nama'].'</td>
		<td style="text-align:center;">'.$sql['waktu_pengerjaan'].' menit</td>
		<td style="text-align:center;">'.$_971d98e0ad23e0905a3d3f4b08d46579[$sql['aktif']].'</td>
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
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<a href="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Input Paket Soal Baru</a>
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
	<th style="text-align:center;">NAMA PAKET SOAL</th>
	<th style="text-align:center;">WAKTU PENGERJAAN</th>
	<th style="text-align:center;">STATUS</th>
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
