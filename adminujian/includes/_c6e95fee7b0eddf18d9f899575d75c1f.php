<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

$id='';
$idkelas='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
if(isset($_GET['kelas'])){
	$idkelas=$_GET['kelas'];
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
$conn=mysqli_query($conns,"select count(*) as jml from siswa where id_kelas='".$idkelas."' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%')");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];
$listing=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;

if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$listing++;}
$_addbb9f4792a53c78e32e91e1c94f075='';
for($mulai=1;$mulai<=$listing;$mulai++){
	if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$selectOpsi=' selected';}else{$selectOpsi='';}
	$_addbb9f4792a53c78e32e91e1c94f075.='<option value="'.$mulai.'"'.$selectOpsi.'>'.$mulai.'</option>';
}
$_3074d1218d14946af4694b3e14b827ca='';
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){
	$_3074d1218d14946af4694b3e14b827ca='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'" class="btn btn-primary btn_page" data-param="paket='.$id.'&kelas='.$idkelas.'&q='.$_36923cf62618d1b9981740738971e651.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'" style="float:left;margin-right:5px;">&laquo; Prev</a>';
}
$_ad963400e016efad59a28f377e32aa99='';
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$listing){
	$_ad963400e016efad59a28f377e32aa99='<a href="'.$_5778a9156adf82bd65a3ec7d62084491.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'" class="btn btn-primary btn_page" data-param="paket='.$id.'&kelas='.$idkelas.'&q='.$_36923cf62618d1b9981740738971e651.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'" style=""> Next &raquo;</a>';
}

$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;
$awal=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;
$_8e976f2b17f9b4d8660549c18b67af83=$awal+1;

$hasil='';
$conn="select * from siswa where id_kelas='".$idkelas."' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') order by nisn limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_siswa'];
		if(mysqli_num_rows(mysqli_query($conns,"select id_peserta from peserta where id_paket='".$id."' and id_siswa='".$id_paket."'")) > 0){
			$hasil.='
			  <tr>
				<td style="text-align:center;">'.$awal.'</td>
				<td>'.$sql['nisn'].'</td>
				<td>'.$sql['nama'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs disabled"><i class="fa fa-check"></i></button></td>
			  </tr>
			';
		}else{
			$hasil.='
			  <tr>
				<td style="text-align:center;">'.$awal.'</td>
				<td>'.$sql['nisn'].'</td>
				<td>'.$sql['nama'].'</td>
				<td style="text-align:center;"><button type="button" class="btn btn-success btn-xs data_table" data-id="'.$id_paket.'"><i class="fa fa-plus"></i></button></td>
			  </tr>
			';
		}
		$_517eb60ce7142569b3b2229552f16958=$awal;
	}
}
$opsiKelas='<option value="">Pilih Kelas</option>';
$conn=mysqli_query($conns,"select * from kelas order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($idkelas==$sql['id_kelas']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsiKelas.='<option value="'.$sql['id_kelas'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

?>
<form id="form_siswa" action="" method="get">
	<input name="paket" type="hidden" value="<?php echo $id;?>" />
	<select name="kelas" class="form-control" style="width:300px;float:left;margin-right:5px;"><?php echo $opsiKelas;?></select>

	<input name="q" placeholder="Pencarian" type="text" class="form-control" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" style="width:200px;float:left;margin-right:5px;" /> <button type="submit" class="btn btn-primary">Cari</button>
	<div style="clear:both;height:10px;"></div>
	<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;font-size:12px;" width="40">NO</th>
		<th style="text-align:center;font-size:12px;">NISN</th>
		<th style="text-align:center;font-size:12px;">NAMA PESERTA DIDIK</th>
		<th style="text-align:center;font-size:12px;" width="20">&nbsp;</th>
	  </tr>
	  </thead>
	  <tbody>
	  <?php echo $hasil;?>
	  </tbody>
	</table>
	
	</div>
</form>
<?php if($_12ef5f8660c2350214ce228aad66392d > 0){ ?>
<div class="row-fluid">
<form action="" id="form_page" method="get" style="float:right">
<input name="paket" type="hidden" value="<?php echo $id;?>" />
<input name="kelas" type="hidden" value="<?php echo $idkelas;?>" />
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
	$('#form_siswa').submit(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c6e95fee7b0eddf18d9f899575d75c1f.php',
			data: $(this).serialize(),
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
	$('#nav_page').change(function () {
		$('#form_page').submit();
	});
	$('#form_page').submit(function () {
		
		$.ajax({
			type: 'GET',
			url: 'includes/_c6e95fee7b0eddf18d9f899575d75c1f.php',
			data: $(this).serialize(),
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
	$('.btn_page').click(function () {
		$.ajax({
			type: 'GET',
			url: 'includes/_c6e95fee7b0eddf18d9f899575d75c1f.php',
			data: $(this).attr('data-param'),
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
		return false;
	});
	$('.data_table').click(function () {
		
		id=$(this).attr('data-id');
		$.ajax({
			type: 'GET',
			url: 'includes/_8e988bf46b1d3ef8a8d5533d3d387790.php',
			data: 'paket=<?php echo $id;?>&id='+id+'&action=addsiswa',
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

