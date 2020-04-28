<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=soal_ujian';
$regis='?hal=soal_ujian';
if(isset($_POST['delete'])){
	$id=$_POST['paket'];
	for($mulai=0;$mulai<count($_POST['soal']);$mulai++){
		mysqli_query($conns,"delete from soal_paket where id_soal_paket='".$_POST['soal'][$mulai]."' and id_paket='".$id."'");
	}
	exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
}
if(isset($_GET['action'])){
	if($_GET['action']=='add'){
		$id=$_GET['paket'];
		$_5cf085bf5081a50e78311063db83f771=$_GET['id'];
		mysqli_query($conns,"insert into soal_paket(id_paket, id_soal) values('".$id."','".$_5cf085bf5081a50e78311063db83f771."')");
		exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
	}
	if($_GET['action']=='remove'){
		$id=$_GET['paket'];
		$_843b71d0acc61983f36ea357e493357b=$_GET['id'];
		mysqli_query($conns,"delete from soal_paket where id_soal_paket='".$_843b71d0acc61983f36ea357e493357b."' and id_paket='".$id."'");
		exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
	}
}
$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}

$conn=mysqli_query($conns,"select count(*) as jml from soal_paket where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&paket='.$id;
$_111f1b5b84b5c819ea9ae35968fce466=10;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$listing=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$listing++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$selectOpsi.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$listing){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from soal_paket inner join soal on soal_paket.id_soal=soal.id_soal where soal_paket.id_paket='".$id."' order by soal_paket.id_soal_paket limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_soal_paket'];
		$_2a5925db414467d5e4f9b8d08536173d[]=$sql['id_soal'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		$juml=mysqli_query($conns,"select pelajaran.nama from soal inner join pelajaran on soal.id_pelajaran=pelajaran.id_pelajaran where soal.id_soal='".$sql['id_soal']."'");
		$totAll=mysqli_fetch_array($juml);
		$_7587462c90f9624fb5baf236b890ad8a=$totAll['nama'];
		
		$_d4cb19f81c23886f544f26709bd4f799.='
		<tr>
		<td valign="top" style="text-align:center;"><input name="soal[]" type="checkbox" value="'.$_3584859062ea9ecfb39b93bfcef8e869.'" class="checkboxes" /></td>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$sql['detail'].'</td>
		<td>'.$_7587462c90f9624fb5baf236b890ad8a.'</td>
		<td style="text-align:center;">
		<a href="?hal=soal_ujian&paket='.$id.'&id='.$_3584859062ea9ecfb39b93bfcef8e869.'&action=remove" class="btn btn-danger btn-xs">Hilangkan</a>
		</td>
		</tr>
		';
	}
}
$opsi='<option value="">Pilih Paket</option>';
$conn=mysqli_query($conns,"select * from paket order by id_paket");
while($sql=mysqli_fetch_array($conn)){
	if($id==$sql['id_paket']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

?>

<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
function DeleteSelectedConfirm(){
	if (confirm("Anda yakin akan menghilangkan data yang Anda pilih ?")){
		return true;
	}else{
		return false;
	}
}
</script>
<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA SOAL UJIAN</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" id="form_cari" method="get" style="float:left">
<input name="hal" type="hidden" value="soal_ujian" />
<select name="paket" id="paket" class="form-control" style="width:300px;float:left;margin-right:5px;" onchange="submit()"><?php echo $opsi;?></select>
</form>
<div style="float:right">
<!--<a href="_ca2af8a29582009a8583f110b425c5e6.php?paket=<?php echo $id;?>" class="btn btn-success <?php if($id==''){echo 'disabled';}?>">Tambah Soal</a>-->
<button type="button" class="btn btn-success <?php if($id==''){echo 'disabled';}?>" id="btn_add_soal" data-toggle="modal" href="#input_soal_modal">Tambah Soal</button>
&nbsp;<a href="_ca2af8a29582009a8583f110b425c5e6.php?paket=<?php echo $id;?>" class="btn btn-primary <?php if($id==''){echo 'disabled';}?>" target="_blank">Simulasi Tes</a>

</div>

	</div>
</div>
<div style="height:10px;clear:both;"></div>
<div class="row">
	<div class="col-lg-12">

	<?php 
	if($_d4cb19f81c23886f544f26709bd4f799==''){ 
		echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
	}else{
	?>
	<form action="<?php echo $pengumuman1;?>" method="post">
	<input name="paket" type="hidden" value="<?php echo $id;?>" />
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;" width="20"><input type="checkbox" id="ckbCheckAll" /></th>
		<th style="text-align:center;" width="40">NO</th>
		<th style="text-align:center;">SOAL TERPILIH</th>
		<th style="text-align:center;">PELAJARAN</th>
		<th style="text-align:center;" width="70">&nbsp;</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
	  </tbody>
	</table>
	<button type="submit" name="delete" onclick="return(DeleteSelectedConfirm());" class="btn btn-danger" style="margin-top:-10px;margin-bottom:10px;"><i class="fa fa-times"></i> Hilangkan Terpilih</button>
	</form>
	<center>
	<?php echo $_addbb9f4792a53c78e32e91e1c94f075;?>
	</center>

	
	<?php } ?>
	<div class="modal fade" id="input_soal_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="width:700px">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Data Soal</h4>
		  </div>
		  <div class="modal-body" id="daftar_soal">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>

	</div>
</div>
<script>
jQuery(document).ready(function() {
	$('#btn_add_soal').click(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c2774403c6ad1db9a29e5532b928792e.php',
			data: 'paket=<?php echo $id;?>',
			beforeSend: function(data) {
				$('#daftar_soal').html('Loading...');
			},
			error: function(data) {
				$('#daftar_soal').html('<div class="alert alert-danger">Permintaan data gagal.</div>');
			},
			success: function(data) {
				$('#daftar_soal').html(data);
			}
		});
	});
	$("#ckbCheckAll").click(function () {
		if($(this).prop("checked")==true){
			$(".checkboxes").attr("checked",true);
			$(".checkboxes").parent("span").attr("class","checked");
		}else{
			$(".checkboxes").attr("checked",false);
			$(".checkboxes").parent("span").attr("class","");
		}
    });
	$('#input_soal_modal').on('hidden.bs.modal', function () {
		location.reload(); 
	});
})
</script>



<?php
/*
---------------------------------------------
haxan100
*/
?>

