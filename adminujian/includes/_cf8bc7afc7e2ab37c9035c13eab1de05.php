<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=siswa';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_siswa';

if(isset($_POST['delete'])){
	for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_POST['siswa']);$_a16d2280393ce6a2a5428a4a8d09e354++){
		mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"delete from siswa where id_siswa='".$_POST['siswa'][$_a16d2280393ce6a2a5428a4a8d09e354]."' ");
	}
	exit("<script>location.href='".$pengumuman1."';</script>");
}


$_72e838785b161ce1f713d6b1a452e270='';
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['kelas'])){
	$_72e838785b161ce1f713d6b1a452e270=$_GET['kelas'];
}
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}
$_2f912c6d42fb67b89f6d73741e22a97c='';
if($_72e838785b161ce1f713d6b1a452e270!=''){
	$_2f912c6d42fb67b89f6d73741e22a97c=" and id_kelas='".$_72e838785b161ce1f713d6b1a452e270."' ";
}

$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select count(*) as jml from siswa where (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ".$_2f912c6d42fb67b89f6d73741e22a97c);
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_12ef5f8660c2350214ce228aad66392d=$_60169cd1c47b7a7a85ab44f884635e41['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&kelas='.$_72e838785b161ce1f713d6b1a452e270.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=50;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($_a16d2280393ce6a2a5428a4a8d09e354=1;$_a16d2280393ce6a2a5428a4a8d09e354<=$_f52ba22baf75438bb1b02f476954c023;$_a16d2280393ce6a2a5428a4a8d09e354++){if($_a16d2280393ce6a2a5428a4a8d09e354==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_a16d2280393ce6a2a5428a4a8d09e354.'">'.$_a16d2280393ce6a2a5428a4a8d09e354.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_f0619632751681b5561b70caf2920a71=array('L'=>'Laki-laki','P'=>'Perempuan');
//$_971d98e0ad23e0905a3d3f4b08d46579=array(0=>'<span class="label label-default">Belum Tes</span>', 1=>'<span class="label label-danger">Tidak Diterima</span>', 2=>'<span class="label label-success">Diterima</span>');
$_90536067f4eda2356714ffff3f1b38f2=array('N'=>'<span class="label label-success">Aktif</span>', 'Y'=>'<span class="label label-default">Alumni</span>');
$_d4cb19f81c23886f544f26709bd4f799='';
$_eb6af5b4e510c3c874d7d1f51d72393a="select * from siswa where (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ".$_2f912c6d42fb67b89f6d73741e22a97c." order by nisn limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,$_eb6af5b4e510c3c874d7d1f51d72393a);
if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a) > 0){
	while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$_60169cd1c47b7a7a85ab44f884635e41['id_siswa'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		/*if(mysqli_num_rows(mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from recharge_detail where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if(mysqli_num_rows(mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from tukar_poin where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}*/
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select nama from kelas where id_kelas='".$_60169cd1c47b7a7a85ab44f884635e41['id_kelas']."'");
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
		$_38895153c69c18db0dbba317a1d8d369=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
		/*if($_60169cd1c47b7a7a85ab44f884635e41['status']=='N'){
			$_65337fceccf221b0c62cd3400655c8aa='<li class="disabled"><a href="#" onclick="return(false)">Hapus Hasil Tes</a></li>';
		}else{
			$_65337fceccf221b0c62cd3400655c8aa='<li><a href="#" onclick="DeleteTesConfirm(\''.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=delete_tes\');return(false);">Hapus Hasil Tes</a></li>';
		}*/
		$_d4cb19f81c23886f544f26709bd4f799.='
		  <tr>
			<td valign="top" style="text-align:center;"><input name="siswa[]" type="checkbox" value="'.$_3584859062ea9ecfb39b93bfcef8e869.'" class="checkboxes" /></td>
			<td style="text-align:center;">
			<div class="btn-group">
			<button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
			Aksi <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="'.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=edit">Edit</a></li>
			<li class="'.$_849d693c62dfe15394a642123c1599c8.'"><a href="#" onclick="'.$_f22a1fc2263e04ec8ae7a008a249229e.'DeleteConfirm(\''.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=delete\');return(false);">Hapus</a></li>
			<li class="divider"></li>
			<li><a href="?hal=hasil_ujian&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'">Hasil Ujian</a></li>
			</ul>
			</div>
			</td>
			<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
			<td>'.$_60169cd1c47b7a7a85ab44f884635e41['nisn'].'</td>
			<td>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</td>
			<td>'.$_f0619632751681b5561b70caf2920a71[$_60169cd1c47b7a7a85ab44f884635e41['gender']].'</td>
			<td>'.$_38895153c69c18db0dbba317a1d8d369.'</td>
		  </tr>
		';
	}
}

$_a6abb7c18ac54429027c2440b5329b86='<option value="">Semua Kelas</option>';
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from kelas order by nama");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
	if($_72e838785b161ce1f713d6b1a452e270==$_60169cd1c47b7a7a85ab44f884635e41['id_kelas']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_a6abb7c18ac54429027c2440b5329b86.='<option value="'.$_60169cd1c47b7a7a85ab44f884635e41['id_kelas'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</option>';
}

?>

<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
function DeleteSelectedConfirm(){
	if (confirm("Anda yakin akan menghapus data yang Anda pilih ?")){
		return true;
	}else{
		return false;
	}
}
</script>
<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA SISWA</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="siswa" />
<select name="kelas" class="form-control" onchange="submit()" style="width:150px;float:left;margin-right:5px;"><?php echo $_a6abb7c18ac54429027c2440b5329b86;?></select>
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:150px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
</form>
<div style="float:right">
<!--<a href="?hal=foto_siswa" class="btn btn-primary"><i class="fa fa-image"></i> Upload Foto</a>&nbsp;
<a href="?hal=siswa&action=update_status" class="btn btn-primary" style="float:"><i class="fa fa-check-square-o"></i> Cek Status Data</a>-->
<a href="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" class="btn btn-primary"><i class="fa fa-plus"></i> Input Siswa Baru</a>
&nbsp;<a href="?hal=import_siswa" class="btn btn-primary"><i class="fa fa-arrow-circle-o-down"></i> Import</a>
&nbsp;<a href="_714fe0583cb71e00d723bf5b77c46fc5.php?kelas=<?php echo $_72e838785b161ce1f713d6b1a452e270;?>" class="btn btn-primary"><i class="fa fa-save"></i> Download</a>

</div>
<div style="height:10px;clear:both;"></div>
<?php 
if($_d4cb19f81c23886f544f26709bd4f799==''){ 
	echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
}else{
?>
<form action="<?php echo $pengumuman1;?>" method="post">
<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
	<th style="text-align:center;" width="20"><input type="checkbox" id="ckbCheckAll" /></th>
	<th style="text-align:center;" width="70">&nbsp;</th>
	<th style="text-align:center;" width="40">NO</th>
	<th style="text-align:center;" width="100">USERNAME</th>
	<th style="text-align:center;">NAMA SISWA</th>
	<th style="text-align:center;">J. KELAMIN</th>
	<th style="text-align:center;">KELAS</th>
  </tr>
  </thead>
  <tbody>
  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
  </tbody>
</table>
<button type="submit" name="delete" onclick="return(DeleteSelectedConfirm());" class="btn btn-danger" style="margin-top:-10px;margin-bottom:10px;"><i class="fa fa-trash-o"></i> Hapus Terpilih</button>
</form>
<center>
<?php echo $_addbb9f4792a53c78e32e91e1c94f075;?>
</center>
<?php } ?>

	</div>
</div>
<script>
jQuery(document).ready(function() {
	$("#ckbCheckAll").click(function () {
		if($(this).prop("checked")==true){
			$(".checkboxes").attr("checked",true);
			$(".checkboxes").parent("span").attr("class","checked");
		}else{
			$(".checkboxes").attr("checked",false);
			$(".checkboxes").parent("span").attr("class","");
		}
    });
})
</script>



<?php
/*
---------------------------------------------
haxan100
*/
?>

