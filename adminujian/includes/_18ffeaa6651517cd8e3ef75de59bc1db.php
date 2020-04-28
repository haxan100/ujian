<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=peserta';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=peserta';
if(isset($_POST['delete'])){
	$id=$_POST['paket'];
	for($mulai=0;$mulai<count($_POST['soal']);$mulai++){
		mysqli_query($conns,"delete from peserta where id_peserta='".$_POST['soal'][$mulai]."' and id_paket='".$id."'");
	}
	exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
}
if(isset($_GET['action'])){
	if($_GET['action']=='add'){
		$id=$_GET['paket'];
		$_5cf085bf5081a50e78311063db83f771=$_GET['id'];
		mysqli_query($conns,"insert into peserta(id_paket, id_soal) values('".$id."','".$_5cf085bf5081a50e78311063db83f771."')");
		exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
	}
	if($_GET['action']=='remove'){
		$id=$_GET['paket'];
		$_1ae735eae279342d0b6a018c1a26f9b6=$_GET['id'];
		mysqli_query($conns,"delete from peserta where id_peserta='".$_1ae735eae279342d0b6a018c1a26f9b6."' and id_paket='".$id."'");
		exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
	}
}
$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
$conn=mysqli_query($conns,"select count(*) as jml from peserta where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&paket='.$id;
$_111f1b5b84b5c819ea9ae35968fce466=10;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$_f52ba22baf75438bb1b02f476954c023;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' order by peserta.id_peserta limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_peserta'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		$juml=mysqli_query($conns,"select kelas.nama from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa='".$sql['id_siswa']."'");
		$totAll=mysqli_fetch_array($juml);
		$nama=$totAll['nama'];
		
		$_d4cb19f81c23886f544f26709bd4f799.='
		<tr>
		<td valign="top" style="text-align:center;"><input name="soal[]" type="checkbox" value="'.$_3584859062ea9ecfb39b93bfcef8e869.'" class="checkboxes" /></td>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$sql['nisn'].'</td>
		<td>'.$sql['nama'].'</td>
		<td>'.$nama.'</td>
		<td style="text-align:center;">
		<a href="?hal=peserta&paket='.$id.'&id='.$_3584859062ea9ecfb39b93bfcef8e869.'&action=remove" class="btn btn-danger btn-xs">Hilangkan</a>
		</td>
		</tr>
		';
	}
}
$opsi='<option value="">Pilih Paket</option>';
$conn=mysqli_query($conns,"select * from paket order by id_paket");
while($sql=mysqli_fetch_array($conn)){
	if($id==$sql['id_paket']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
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
		<h1 class="page-header">DATA PESERTA UJIAN</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" id="form_cari" method="get" style="float:left">
<input name="hal" type="hidden" value="peserta" />
<select name="paket" id="paket" class="form-control" style="width:300px;float:left;margin-right:5px;" onchange="submit()"><?php echo $opsi;?></select>
</form>
<div style="float:right">
<button type="button" class="btn btn-success <?php if($id==''){echo 'disabled';}?>" id="btn_add_siswa" data-toggle="modal" href="#input_siswa_modal">Tambah Siswa</button>

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
		<th style="text-align:center;">USERNAME</th>
		<th style="text-align:center;">NAMA PESERTA DIDIK</th>
		<th style="text-align:center;">KELAS</th>
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
	<div class="modal fade" id="input_siswa_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="width:700px">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Data Siswa</h4>
		  </div>
		  <div class="modal-body" id="daftar_siswa">
			
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
	$('#btn_add_siswa').click(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c6e95fee7b0eddf18d9f899575d75c1f.php',
			data: 'paket=<?php echo $id;?>',
			beforeSend: function(data) {
				$('#daftar_siswa').html('Loading...');
			},
			error: function(data) {
				$('#daftar_siswa').html('<div class="alert alert-danger">Permintaan data gagal.</div>');
			},
			success: function(data) {
				$('#daftar_siswa').html(data);
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
	$('#input_siswa_modal').on('hidden.bs.modal', function () {
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

