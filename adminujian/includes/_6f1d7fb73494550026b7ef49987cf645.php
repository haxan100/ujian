<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=pelajaran';
$regis='?hal=update_pelajaran';

if(isset($_POST['save'])){
	$id_paket=$_POST['id'];
	$_d35a39212fd75e833aea38f90831b2cb=$_POST['action'];
	$nama=$_POST['nama'];
	$_f77c5a659797b862f0fc544aa9a0c023=$_POST['kode'];

	if(empty($_f77c5a659797b862f0fc544aa9a0c023) or empty($nama)){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_d35a39212fd75e833aea38f90831b2cb=='add'){
			if(mysqli_num_rows(mysqli_query($conns,"select * from pelajaran where kode='".$_f77c5a659797b862f0fc544aa9a0c023."'"))>0){
				$err='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="insert into pelajaran(kode, nama) values('".$_f77c5a659797b862f0fc544aa9a0c023."', '".$nama."')";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
			$conn=mysqli_query($conns,"select * from pelajaran where id_pelajaran='".$id_paket."'");
			$sql=mysqli_fetch_array($conn);
			$_08fdfd209a120f38f85507412165a4ef=$sql['kode'];
			if(mysqli_num_rows(mysqli_query($conns,"select * from pelajaran where kode='".$_f77c5a659797b862f0fc544aa9a0c023."' and kode<>'".$_08fdfd209a120f38f85507412165a4ef."'"))>0){
				$err='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="update pelajaran set kode='".$_f77c5a659797b862f0fc544aa9a0c023."',nama='".$nama."' where id_pelajaran='".$id_paket."'";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		
	}
}else{
$nama='';$_f77c5a659797b862f0fc544aa9a0c023='';
	if(empty($_GET['action'])){$_d35a39212fd75e833aea38f90831b2cb='add';}else{$_d35a39212fd75e833aea38f90831b2cb=$_GET['action'];}
	if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
		$id_paket=$_GET['id'];
		$conn=mysqli_query($conns,"select * from pelajaran where id_pelajaran='".$id_paket."'");
		$sql=mysqli_fetch_array($conn);
		$nama=$sql['nama'];
		$_f77c5a659797b862f0fc544aa9a0c023=$sql['kode'];
	}
	if($_d35a39212fd75e833aea38f90831b2cb=='delete'){
		$id_paket=$_GET['id'];
		mysqli_query($conns,"delete from pelajaran where id_pelajaran='".$id_paket."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}

if($_d35a39212fd75e833aea38f90831b2cb=='add'){$_06c518f70e97b19c7ec907f36542ce6e='INPUT DATA PELAJARAN';}else{$_06c518f70e97b19c7ec907f36542ce6e='EDIT DATA PELAJARAN';}

?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $_06c518f70e97b19c7ec907f36542ce6e;?></h1>
	</div>
</div>

<form action="<?php echo $regis;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id_paket;?>">
<input name="action" type="hidden" value="<?php echo $_d35a39212fd75e833aea38f90831b2cb;?>">

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
		<td width="200" style="vertical-align:middle;border-top-width:0;">Kode Mata Pelajaran<span class="required">*</span> </td>
		<td style="border-top-width:0;"><input name="kode" type="text" class="form-control" value="<?php echo $_f77c5a659797b862f0fc544aa9a0c023;?>" style="width:100px;"></td>
	  </tr>
	  <tr>
		<td width="200" style="vertical-align:middle;">Nama Mata Pelajaran untuk Kelas<span class="required">*</span> </td>
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

