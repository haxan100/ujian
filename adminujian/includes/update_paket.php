<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=paket';
$regis='?hal=update_paket';

if(isset($_POST['save'])){
	$id_paket=$_POST['id'];
	$aksi=$_POST['action'];
	$nama=$_POST['nama'];
	$waktu=$_POST['waktu_pengerjaan'];

	if(empty($nama) or empty($waktu)){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($aksi=='add'){
			$conn="insert into paket(nama,waktu_pengerjaan) values('".$nama."','".$waktu."')";
			mysqli_query($conns,$conn);
			exit("<script>location.href='".$pengumuman1."';</script>");
		}
		if($aksi=='edit'){
			$conn="update paket set nama='".$nama."',waktu_pengerjaan='".$waktu."' where id_paket='".$id_paket."'";
			mysqli_query($conns,$conn);
			exit("<script>location.href='".$pengumuman1."';</script>");
		}
		
	}
}else{
	$nama='';$waktu='';
	if(empty($_GET['action'])){$aksi='add';}else{$aksi=$_GET['action'];}
	if($aksi=='edit'){
		$id_paket=$_GET['id'];
		$conn=mysqli_query($conns,"select * from paket where id_paket='".$id_paket."'");
		$sql=mysqli_fetch_array($conn);
		$nama=$sql['nama'];
		$waktu=$sql['waktu_pengerjaan'];
	}
	if($aksi=='delete'){
		$id_paket=$_GET['id'];
		mysqli_query($conns,"delete from paket where id_paket='".$id_paket."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
	/*if($aksi=='aktif'){
		$id_paket=$_GET['id'];
		mysqli_query($conns,"update paket set aktif='Y' where id_paket='".$id_paket."'");
		mysqli_query($conns,"update paket set aktif='N' where id_paket<>'".$id_paket."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}*/
}

if($aksi=='add'){$datasoal='INPUT DATA PAKET SOAL';}else{$datasoal='EDIT DATA PAKET SOAL';}

?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $datasoal;?></h1>
	</div>
</div>

<form action="<?php echo $regis;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id_paket;?>">
<input name="action" type="hidden" value="<?php echo $aksi;?>">

<div class="row">
	<div class="col-lg-12">
	<?php
	if(!empty($err)){
		echo '
		   <div class="alert alert-danger ">
			  '.$err.'
		   </div>
		';
	}
	?>
	<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
	  <tr>
		<td width="150" style="vertical-align:middle;border-top-width:0;">Nama Paket Ujian/Tes<span class="required">*</span> </td>
		<td style="border-top-width:0;"><input name="nama" type="text" class="form-control" value="<?php echo $nama;?>" style="width:300px;"></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Waktu Pengerjaan<span class="required">*</span> </td>
		<td><input name="waktu_pengerjaan" type="text" class="form-control" value="<?php echo $waktu;?>" style="width:100px;float:left;margin-right:5px;"> <span class="help-block" style="float:left;">Menit</span></td>
	  </tr>
	  <tr>
		<td></td>
		<td>
		<button type="submit" name="save" class="btn btn-primary"> Simpan</button> 
		<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
		</td>
	  </tr>
	</table>
	</div>
</div>






</form>
<span class="required">* </span> <span class="label label-danger">Harus diisi</span>


<?php
/*
---------------------------------------------
haxan100
*/
?>

