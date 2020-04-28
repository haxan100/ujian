<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

$_b78f9e7c4587e8583ab713f126277f88='';
$_5bbbff8933f7b8be381684bd463e6d16='';
if(isset($_GET['paket'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
}
if(isset($_GET['pelajaran'])){
	$_5bbbff8933f7b8be381684bd463e6d16=$_GET['pelajaran'];
}
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}
$_517eb60ce7142569b3b2229552f16958=0;
$_111f1b5b84b5c819ea9ae35968fce466=10;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;
$_5778a9156adf82bd65a3ec7d62084491='';

if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}
$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;
$conn=mysqli_query($conns,"select count(*) as jml from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' and detail like '%".$_36923cf62618d1b9981740738971e651."%'");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];
$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;

if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
$_addbb9f4792a53c78e32e91e1c94f075='';
for($mulai=1;$mulai<=$_f52ba22baf75438bb1b02f476954c023;$mulai++){
	if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57=' selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_addbb9f4792a53c78e32e91e1c94f075.='<option value="'.$mulai.'"'.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$mulai.'</option>';
}
$_3074d1218d14946af4694b3e14b827ca='';
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){
	$_3074d1218d14946af4694b3e14b827ca='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'" class="btn btn-primary btn_page" data-param="paket='.$_b78f9e7c4587e8583ab713f126277f88.'&pelajaran='.$_5bbbff8933f7b8be381684bd463e6d16.'&q='.$_36923cf62618d1b9981740738971e651.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'" style="float:left;margin-right:5px;">&laquo; Prev</a>';
}
$_ad963400e016efad59a28f377e32aa99='';
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){
	$_ad963400e016efad59a28f377e32aa99='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'" class="btn btn-primary btn_page" data-param="paket='.$_b78f9e7c4587e8583ab713f126277f88.'&pelajaran='.$_5bbbff8933f7b8be381684bd463e6d16.'&q='.$_36923cf62618d1b9981740738971e651.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'" style=""> Next &raquo;</a>';
}

$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;
$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;
$_8e976f2b17f9b4d8660549c18b67af83=$_52f720bdaf922c68904e386cbf0cd227+1;

$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' and detail like '%".$_36923cf62618d1b9981740738971e651."%' order by id_soal limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_soal'];
		if(mysqli_num_rows(mysqli_query($conns,"select id_soal_paket from soal_paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."'")) > 0){
			$_d4cb19f81c23886f544f26709bd4f799.='
			  <tr>
				<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
				<td>'.$sql['detail'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs disabled"><i class="fa fa-check"></i></button></td>
			  </tr>
			';
		}else{
			$_d4cb19f81c23886f544f26709bd4f799.='
			  <tr>
				<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
				<td>'.$sql['detail'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs data_table" data-id="'.$_3584859062ea9ecfb39b93bfcef8e869.'"><i class="fa fa-plus"></i></button></td>
			  </tr>
			';
		}
		$_517eb60ce7142569b3b2229552f16958=$_52f720bdaf922c68904e386cbf0cd227;
	}
}
$_3718d16a4c63e6e0d669e38e63f8c5c0='<option value="">Pilih Pelajaran</option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($_5bbbff8933f7b8be381684bd463e6d16==$sql['id_pelajaran']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_3718d16a4c63e6e0d669e38e63f8c5c0.='<option value="'.$sql['id_pelajaran'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}

?>
<form id="form_soal" action="" method="get">
	<input name="paket" type="hidden" value="<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" />
	<select name="pelajaran" class="form-control" style="width:300px;float:left;margin-right:5px;"><?php echo $_3718d16a4c63e6e0d669e38e63f8c5c0;?></select>

	<input name="q" placeholder="Pencarian" type="text" class="form-control" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" style="width:200px;float:left;margin-right:5px;" /> <button type="submit" class="btn btn-primary">Cari</button>
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
	  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
	  </tbody>
	</table>
	
	</div>
</form>
<?php if($_12ef5f8660c2350214ce228aad66392d > 0){ ?>
<div class="row-fluid">
<form action="" id="form_page" method="get" style="float:right">
<input name="paket" type="hidden" value="<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" />
<input name="pelajaran" type="hidden" value="<?php echo $_5bbbff8933f7b8be381684bd463e6d16;?>" />
<input name="q" type="hidden" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" />
<?php echo $_3074d1218d14946af4694b3e14b827ca;?>
<select class="form-control" name="page" id="nav_page" style="width:70px;float:left;margin-right:5px;"><?php echo $_addbb9f4792a53c78e32e91e1c94f075;?></select>
<?php echo $_ad963400e016efad59a28f377e32aa99;?>
</form>
</div>	
<div class="row-fluid">
<?php echo 'Menampilkan '.$_8e976f2b17f9b4d8660549c18b67af83.' hingga '.$_517eb60ce7142569b3b2229552f16958.' dari '.$_12ef5f8660c2350214ce228aad66392d.' data';?>
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
			data: 'paket=<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>&id='+id+'&action=addsoal',
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

