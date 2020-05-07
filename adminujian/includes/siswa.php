<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=siswa';
$regis='?hal=update_siswa';

if(isset($_POST['delete'])){
	for($mulai=0;$mulai<count($_POST['siswa']);$mulai++){
		mysqli_query($conns,"delete from siswa where id_siswa='".$_POST['siswa'][$mulai]."' ");
	}
	exit("<script>location.href='".$pengumuman1."';</script>");
}


$idkelas='';
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['kelas'])){
	$idkelas=$_GET['kelas'];
}
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}
$idkelasnya='';
if($idkelas!=''){
	$idkelasnya=" and id_kelas='".$idkelas."' ";
}

$conn=mysqli_query($conns,"select count(*) as jml from siswa where (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ".$idkelasnya);
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&kelas='.$idkelas.'&q='.$_36923cf62618d1b9981740738971e651;
$_111f1b5b84b5c819ea9ae35968fce466=50;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$listing=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$listing++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$selectOpsi.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$listing){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$awal=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$gender=array('L'=>'Laki-laki','P'=>'Perempuan');
//$_971d98e0ad23e0905a3d3f4b08d46579=array(0=>'<span class="label label-default">Belum Tes</span>', 1=>'<span class="label label-danger">Tidak Diterima</span>', 2=>'<span class="label label-success">Diterima</span>');
$_90536067f4eda2356714ffff3f1b38f2=array('N'=>'<span class="label label-success">Aktif</span>', 'Y'=>'<span class="label label-default">Alumni</span>');
$tables='';
$conn="select * from siswa where (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ".$idkelasnya." order by nisn limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_siswa'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		/*if(mysqli_num_rows(mysqli_query($conns,"select * from recharge_detail where id_siswa='".$id_paket."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if(mysqli_num_rows(mysqli_query($conns,"select * from tukar_poin where id_siswa='".$id_paket."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}*/
		if($_25407a67a7a597297818c35a0d0ed51d==true){$optidis='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$optidis='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		
		$juml=mysqli_query($conns,"select nama from kelas where id_kelas='".$sql['id_kelas']."'");
		$totAll=mysqli_fetch_array($juml);
		$nama=$totAll['nama'];
		/*if($sql['status']=='N'){
			$_65337fceccf221b0c62cd3400655c8aa='<li class="disabled"><a href="#" onclick="return(false)">Hapus Hasil Tes</a></li>';
		}else{
			$_65337fceccf221b0c62cd3400655c8aa='<li><a href="#" onclick="DeleteTesConfirm(\''.$regis.'&amp;id='.$id_paket.'&amp;action=delete_tes\');return(false);">Hapus Hasil Tes</a></li>';
		}*/
		$tables.='
		  <tr>
			<td valign="top" style="text-align:center;"><input name="siswa[]" type="checkbox" value="'.$id_paket.'" class="checkboxes" /></td>
			<td style="text-align:center;">
			<div class="btn-group">
			<button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown">
			Aksi <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
			<li><a href="'.$regis.'&amp;id='.$id_paket.'&amp;action=edit">Edit</a></li>
			<li class="'.$optidis.'"><a href="#" onclick="'.$_f22a1fc2263e04ec8ae7a008a249229e.'DeleteConfirm(\''.$regis.'&amp;id='.$id_paket.'&amp;action=delete\');return(false);">Hapus</a></li>
			<li class="divider"></li>
			<li><a href="?hal=hasil_ujian&amp;id='.$id_paket.'">Hasil Ujian</a></li>
			</ul>
			</div>
			</td>
			<td style="text-align:center;">'.$awal.'</td>
			<td>'.$sql['nisn'].'</td>
			<td>'.$sql['nama'].'</td>
			<td>'.$gender[$sql['gender']].'</td>
			<td>'.$nama.'</td>
		  </tr>
		';
	}
}

$opsiKelas='<option value="">Semua Kelas</option>';
$conn=mysqli_query($conns,"select * from kelas order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($idkelas==$sql['id_kelas']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsiKelas.='<option value="'.$sql['id_kelas'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
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
<select name="kelas" class="form-control" onchange="submit()" style="width:150px;float:left;margin-right:5px;"><?php echo $opsiKelas;?></select>
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:150px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
</form>
<div style="float:right">
<!--<a href="?hal=foto_siswa" class="btn btn-primary"><i class="fa fa-image"></i> Upload Foto</a>&nbsp;
<a href="?hal=siswa&action=update_status" class="btn btn-primary" style="float:"><i class="fa fa-check-square-o"></i> Cek Status Data</a>-->
<a href="<?php echo $regis;?>" class="btn btn-primary"><i class="fa fa-plus"></i> Input Siswa Baru</a>
&nbsp;<a href="?hal=import_siswa" class="btn btn-primary"><i class="fa fa-arrow-circle-o-down"></i> Import</a>
&nbsp;<a href="_714fe0583cb71e00d723bf5b77c46fc5.php?kelas=<?php echo $idkelas;?>" class="btn btn-primary"><i class="fa fa-save"></i> Download</a>

</div>
<div style="height:10px;clear:both;"></div>
<?php 
if($tables==''){ 
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
  <?php echo $tables;?>
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

