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
		$mysqlcon=$_GET['id'];
		mysqli_query($conns,"insert into soal_paket(id_paket, id_soal) values('".$id."','".$mysqlcon."')");
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
$conn="select * from soal_paket inner join soal on soal_paket.id_soal=soal.id_soal where soal_paket.id_paket='".$id."' order by soal_paket.id_soal_paket limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_soal_paket'];
		$_2a5925db414467d5e4f9b8d08536173d[]=$sql['id_soal'];
		$soalbenar=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		$juml=mysqli_query($conns,"select pelajaran.nama from soal inner join pelajaran on soal.id_pelajaran=pelajaran.id_pelajaran where soal.id_soal='".$sql['id_soal']."'");
		$totAll=mysqli_fetch_array($juml);
		$_7587462c90f9624fb5baf236b890ad8a=$totAll['nama'];
		
		$tables.='
		<tr>
		<td valign="top" style="text-align:center;"><input name="soal[]" type="checkbox" value="'.$id_paket.'" class="checkboxes" /></td>
		<td style="text-align:center;">'.$awal.'</td>
		<td>'.$sql['detail'].'</td>
		<td>'.$_7587462c90f9624fb5baf236b890ad8a.'</td>
		<td style="text-align:center;">
		<a href="?hal=soal_ujian&paket='.$id.'&id='.$id_paket.'&action=remove" class="btn btn-danger btn-xs">Hilangkan</a>
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
<!--<a href="simulasi.php?paket=<?php echo $id;?>" class="btn btn-success <?php if($id==''){echo 'disabled';}?>">Tambah Soal</a>-->
<button type="button" class="btn btn-success <?php if($id==''){echo 'disabled';}?>" id="btn_add_soal" data-toggle="modal" href="#input_soal_modal">Tambah Soal</button>
&nbsp;<a href="simulasi.php?paket=<?php echo $id;?>" class="btn btn-primary <?php if($id==''){echo 'disabled';}?>" target="_blank">Simulasi Tes</a>

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
		<th style="text-align:center;">SOAL TERPILIH</th>
		<th style="text-align:center;">PELAJARAN</th>
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
			url: 'includes/paketsoal.php',
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

