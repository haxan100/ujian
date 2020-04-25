<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=soal';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_soal';

$_5bbbff8933f7b8be381684bd463e6d16='';
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['pelajaran'])){
	$_5bbbff8933f7b8be381684bd463e6d16=$_GET['pelajaran'];
}
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$conn =mysqli_query($conns,"select count(*) as jml from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' and detail like '%".$_36923cf62618d1b9981740738971e651."%'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$_60169cd1c47b7a7a85ab44f884635e41['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=100;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($_a16d2280393ce6a2a5428a4a8d09e354=1;$_a16d2280393ce6a2a5428a4a8d09e354<=$_f52ba22baf75438bb1b02f476954c023;$_a16d2280393ce6a2a5428a4a8d09e354++){if($_a16d2280393ce6a2a5428a4a8d09e354==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_a16d2280393ce6a2a5428a4a8d09e354.'">'.$_a16d2280393ce6a2a5428a4a8d09e354.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_971d98e0ad23e0905a3d3f4b08d46579=array('Y'=>'<span class="label label-success">AKTIF</span>','N'=>'<span class="label label-danger">Tidak Aktif</span>');
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' and detail like '%".$_36923cf62618d1b9981740738971e651."%' order by id_soal limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$_60169cd1c47b7a7a85ab44f884635e41['id_soal'];
		$_b65003120790c3e628f304c85a36a615=$_60169cd1c47b7a7a85ab44f884635e41['kunci'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_periode='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		$_f3f4775da2a6e3f93bd69f99d887efc2='<table class="table" style="background:none;">';
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."' order by id_soal_jawaban");
		while($_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30)){
			if($_84ebecebe3a7c3b32dff74f8dce19fce['kode']==$_b65003120790c3e628f304c85a36a615){
				$_c0d907c3e4a81c61f89d044e588eac19='<span class="label label-warning">'.$_84ebecebe3a7c3b32dff74f8dce19fce['kode'].'.</span>';
			}else{
				$_c0d907c3e4a81c61f89d044e588eac19='<span class="label label-info">'.$_84ebecebe3a7c3b32dff74f8dce19fce['kode'].'.</span>';
			}
			$_f3f4775da2a6e3f93bd69f99d887efc2.='<tr><td width="20" style="border:none;">'.$_c0d907c3e4a81c61f89d044e588eac19.'</td><td style="border:none;">'.$_84ebecebe3a7c3b32dff74f8dce19fce['jawaban'].'</td></tr>';
		}
		$_f3f4775da2a6e3f93bd69f99d887efc2.='</table>';
		
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
		<td>
		'.$_60169cd1c47b7a7a85ab44f884635e41['detail'].'
		'.$_f3f4775da2a6e3f93bd69f99d887efc2.'
		</td>
		</tr>
		';
	}
}
$_3718d16a4c63e6e0d669e38e63f8c5c0='<option value="">Pilih Pelajaran</option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
	if($_5bbbff8933f7b8be381684bd463e6d16==$_60169cd1c47b7a7a85ab44f884635e41['id_pelajaran']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_3718d16a4c63e6e0d669e38e63f8c5c0.='<option value="'.$_60169cd1c47b7a7a85ab44f884635e41['id_pelajaran'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</option>';
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
<select name="pelajaran" class="form-control" onchange="submit()" style="width:300px;float:left;margin-right:5px;"><?php echo $_3718d16a4c63e6e0d669e38e63f8c5c0;?></select>
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:200px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
</form>
<div style="float:right">
<a href="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" class="btn btn-primary"><i class="fa fa-plus"></i> Input Soal Baru</a>
&nbsp;<a href="?hal=import_soal" class="btn btn-primary"><i class="fa fa-arrow-circle-o-down"></i> Import</a>
&nbsp;<a href="_b97ac0815f949eca6aa1a21065667e5d.php?pelajaran=<?php echo $_5bbbff8933f7b8be381684bd463e6d16;?>" class="btn btn-primary"><i class="fa fa-save"></i> Download</a>
</div>
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
	<th style="text-align:center;">SOAL</th>
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

