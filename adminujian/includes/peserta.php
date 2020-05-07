<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=peserta';
$regis='?hal=peserta';
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
		$mysqlcon=$_GET['id'];
		mysqli_query($conns,"insert into peserta(id_paket, id_soal) values('".$id."','".$mysqlcon."')");
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
$jumlahsoal=$sql['jml'];

$awalsoals=$pengumuman1.'&paket='.$id;
$nilaiujiansoal=10;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;
$tables='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' order by peserta.id_peserta limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_peserta'];
		$soalbenar=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		$juml=mysqli_query($conns,"select kelas.nama from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa='".$sql['id_siswa']."'");
		$totAll=mysqli_fetch_array($juml);
		$nama=$totAll['nama'];
		
		$tables.='
		<tr>
		<td valign="top" style="text-align:center;"><input name="soal[]" type="checkbox" value="'.$id_paket.'" class="checkboxes" /></td>
		<td style="text-align:center;">'.$awal.'</td>
		<td>'.$sql['nisn'].'</td>
		<td>'.$sql['nama'].'</td>
		<td>'.$nama.'</td>
		<td style="text-align:center;">
		<a href="?hal=peserta&paket='.$id.'&id='.$id_paket.'&action=remove" class="btn btn-danger btn-xs">Hilangkan</a>
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
	if($tables==''){ 
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
	  <?php echo $tables;?>
	  </tbody>
	</table>
	<button type="submit" name="delete" onclick="return(DeleteSelectedConfirm());" class="btn btn-danger" style="margin-top:-10px;margin-bottom:10px;"><i class="fa fa-times"></i> Hilangkan Terpilih</button>
	</form>
	<center>
	<?php echo $linksoalujian;?>
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

