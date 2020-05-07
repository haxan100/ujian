<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=kelas';
$regis='?hal=update_kelas';

if(isset($_POST['save'])){
	$id_paket=$_POST['id'];
	$aksi=$_POST['action'];
	$nama=$_POST['nama'];
	$jawabaraymulai=$_POST['kode'];

	if(empty($jawabaraymulai) or empty($nama)){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($aksi=='add'){
			if(mysqli_num_rows(mysqli_query($conns,"select * from kelas where kode='".$jawabaraymulai."'"))>0){
				$err='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="insert into kelas(kode, nama) values('".$jawabaraymulai."', '".$nama."')";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		if($aksi=='edit'){
			$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$id_paket."'");
			$sql=mysqli_fetch_array($conn);
			$_08fdfd209a120f38f85507412165a4ef=$sql['kode'];
			if(mysqli_num_rows(mysqli_query($conns,"select * from kelas where kode='".$jawabaraymulai."' and kode<>'".$_08fdfd209a120f38f85507412165a4ef."'"))>0){
				$err='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="update kelas set kode='".$jawabaraymulai."',nama='".$nama."' where id_kelas='".$id_paket."'";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		
	}
}else{
	$nama='';$jawabaraymulai='';
	if(empty($_GET['action'])){$aksi='add';}else{$aksi=$_GET['action'];}
	if($aksi=='edit'){
		$id_paket=$_GET['id'];
		$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$id_paket."'");
		$sql=mysqli_fetch_array($conn);
		$nama=$sql['nama'];
		$jawabaraymulai=$sql['kode'];
	}
	if($aksi=='delete'){
		$id_paket=$_GET['id'];
		mysqli_query($conns,"delete from kelas where id_kelas='".$id_paket."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}

if($aksi=='add'){$datasoal='INPUT DATA KELAS';}else{$datasoal='EDIT DATA KELAS';}

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
		<td width="200" style="vertical-align:middle;border-top-width:0;">Kode<span class="required">*</span> </td>
		<td style="border-top-width:0;"><input name="kode" type="text" class="form-control" value="<?php echo $jawabaraymulai;?>" style="width:100px;"></td>
	  </tr>
	  <tr>
		<td width="200" style="vertical-align:middle;">Nama Kelas<span class="required">*</span> </td>
		<td><input name="nama" type="text" class="form-control" value="<?php echo $nama;?>" style="width:300px;"></td>
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

