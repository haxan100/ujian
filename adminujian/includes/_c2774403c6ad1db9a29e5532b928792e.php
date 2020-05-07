<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

$id='';
$mapel='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
if(isset($_GET['pelajaran'])){
	$mapel=$_GET['pelajaran'];
}
$sqlgetsoal='';
if(isset($_GET['q'])){
	$sqlgetsoal=$_GET['q'];
}
$_517eb60ce7142569b3b2229552f16958=0;
$nilaiujiansoal=10;
$nilaiujiansoals=0;
$_5778a9156adf82bd65a3ec7d62084491='';

if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}
$result=$nilaiujiansoals;
$nilaiujiansoals--;
$conn=mysqli_query($conns,"select count(*) as jml from soal where id_pelajaran='".$mapel."' and detail like '%".$sqlgetsoal."%'");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];
$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;

if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
$linksoalujian='';
for($mulai=1;$mulai<=$listing;$mulai++){
	if($mulai==($nilaiujiansoals+1)){$selectOpsi=' selected';}else{$selectOpsi='';}
	$linksoalujian.='<option value="'.$mulai.'"'.$selectOpsi.'>'.$mulai.'</option>';
}
$_3074d1218d14946af4694b3e14b827ca='';
if(($nilaiujiansoals+1)>1){
	$_3074d1218d14946af4694b3e14b827ca='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.$nilaiujiansoals.'" class="btn btn-primary btn_page" data-param="paket='.$id.'&pelajaran='.$mapel.'&q='.$sqlgetsoal.'&page='.$nilaiujiansoals.'" style="float:left;margin-right:5px;">&laquo; Prev</a>';
}
$_ad963400e016efad59a28f377e32aa99='';
if(($nilaiujiansoals+1)<$listing){
	$_ad963400e016efad59a28f377e32aa99='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.($nilaiujiansoals+2).'" class="btn btn-primary btn_page" data-param="paket='.$id.'&pelajaran='.$mapel.'&q='.$sqlgetsoal.'&page='.($nilaiujiansoals+2).'" style=""> Next &raquo;</a>';
}

$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;
$awal=$nilaiujiansoals;
$_8e976f2b17f9b4d8660549c18b67af83=$awal+1;

$tables='';
$conn="select * from soal where id_pelajaran='".$mapel."' and detail like '%".$sqlgetsoal."%' order by id_soal limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_soal'];
		if(mysqli_num_rows(mysqli_query($conns,"select id_soal_paket from soal_paket where id_paket='".$id."' and id_soal='".$id_paket."'")) > 0){
			$tables.='
			  <tr>
				<td style="text-align:center;">'.$awal.'</td>
				<td>'.$sql['detail'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs disabled"><i class="fa fa-check"></i></button></td>
			  </tr>
			';
		}else{
			$tables.='
			  <tr>
				<td style="text-align:center;">'.$awal.'</td>
				<td>'.$sql['detail'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs data_table" data-id="'.$id_paket.'"><i class="fa fa-plus"></i></button></td>
			  </tr>
			';
		}
		$_517eb60ce7142569b3b2229552f16958=$awal;
	}
}
$option='<option value="">Pilih Pelajaran</option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($mapel==$sql['id_pelajaran']){$selectOpsi='selected';}else{$selectOpsi='';}
	$option.='<option value="'.$sql['id_pelajaran'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

?>
<form id="form_soal" action="" method="get">
	<input name="paket" type="hidden" value="<?php echo $id;?>" />
	<select name="pelajaran" class="form-control" style="width:300px;float:left;margin-right:5px;"><?php echo $option;?></select>

	<input name="q" placeholder="Pencarian" type="text" class="form-control" value="<?php echo $sqlgetsoal;?>" style="width:200px;float:left;margin-right:5px;" /> <button type="submit" class="btn btn-primary">Cari</button>
	<div style="clear:both;height:10px;"></div>
	<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;font-size:12px;" width="40">NO</th>
		<th style="text-align:center;font-size:12px;">SOAL</th>
		<th style="text-align:center;font-size:12px;" width="20">&nbsp;</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php echo $tables;?>
	  </tbody>
	</table>
	
	</div>
</form>
<?php if($jumlahsoal > 0){ ?>
<div class="row-fluid">
<form action="" id="form_page" method="get" style="float:right">
<input name="paket" type="hidden" value="<?php echo $id;?>" />
<input name="pelajaran" type="hidden" value="<?php echo $mapel;?>" />
<input name="q" type="hidden" value="<?php echo $sqlgetsoal;?>" />
<?php echo $_3074d1218d14946af4694b3e14b827ca;?>
<select class="form-control" name="page" id="nav_page" style="width:70px;float:left;margin-right:5px;"><?php echo $linksoalujian;?></select>
<?php echo $_ad963400e016efad59a28f377e32aa99;?>
</form>
</div>	
<div class="row-fluid">
<?php echo 'Menampilkan '.$_8e976f2b17f9b4d8660549c18b67af83.' hingga '.$_517eb60ce7142569b3b2229552f16958.' dari '.$jumlahsoal.' data';?>
</div>	
<?php } ?>
	
<div style="clear:both;height:20px;"></div>
<script type="text/javascript">
$(document).ready(function(){
	$('#form_soal').submit(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c2774403c6ad1db9a29e5532b928792e.php',
			data: $(this).serialize(),
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
	$('#nav_page').change(function () {
		$('#form_page').submit();
	});
	$('#form_page').submit(function () {
		
		$.ajax({
			type: 'GET',
			url: 'includes/_c2774403c6ad1db9a29e5532b928792e.php',
			data: $(this).serialize(),
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
	$('.btn_page').click(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c2774403c6ad1db9a29e5532b928792e.php',
			data: $(this).attr('data-param'),
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
		return false;
	});
	$('.data_table').click(function () {
		
		id=$(this).attr('data-id');
		$.ajax({
			type: 'GET',
			url: 'includes/_04bf5d59351c7f04f5381a7e6f95e557.php',
			data: 'paket=<?php echo $id;?>&id='+id+'&action=addsoal',
			beforeSend: function(data) {
				
			},
			error: function(data) {
				
			},
			success: function(data) {
				
			}
		});
		$('#form_page').submit();

		/*n=eval($('#index_barang').val())+1;
		var onkeypress='onkeypress="charCode = (event.which) ? event.which : event.keyCode;if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 44 || charCode == 8 || charCode == 27 || charCode == 37  || charCode == 38 || charCode == 39  || charCode == 40 || charCode == 9 ){ return true;}else{return false;}"';
		
		var data='<tr id="data_barang_'+n+'">';
		data=data+'<td><button type="button" class="btn btn-danger btn-xs btn_delete" data-id="'+n+'" onclick="$(\'#data_barang_'+n+'\').remove();total=0;$(\'.total_harga\').each(function( index ) {total=total+eval($( this ).text());});$(\'#total_akhir\').html(total);">x</button></td>';
		data=data+'<td style="text-align:center;" class="no_barang"></td>';
		data=data+'<td>'+$(this).attr('data-nama')+'<input name="barang[]" type="hidden" value="'+id+'" /></td>';
		data=data+'<td><input name="qty[]" id="qty_'+n+'" data-id="'+id+'" autocomplete="off" type="text" class="form-control angka txt_qty" '+onkeypress+' value="" style="width:45px;padding-left:4px;padding-right:4px;" /></td>';
		data=data+'<td><input name="remarks[]" autocomplete="off" type="text" class="form-control" value="" style="width:300px;padding-left:4px;padding-right:4px;" /></td>';
		data=data+'</tr>';
		
		$('#baris_footer').before(data);
		$('#index_barang').val(n);*/
		
	});
	
	
}); 
</script>

<style type="text/css">
.data_table{cursor:pointer;}
.data_table:hover{font-weight:bold;}
</style>

<?php
/*
---------------------------------------------
haxan100
*/
?>

