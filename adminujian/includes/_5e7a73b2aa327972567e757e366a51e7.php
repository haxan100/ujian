<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=kelas';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_kelas';

if(isset($_POST['save'])){
	$_3584859062ea9ecfb39b93bfcef8e869=$_POST['id'];
	$_d35a39212fd75e833aea38f90831b2cb=$_POST['action'];
	$_31985b26056f955fec6db8f46f87653f=$_POST['nama'];
	$_f77c5a659797b862f0fc544aa9a0c023=$_POST['kode'];

	if(empty($_f77c5a659797b862f0fc544aa9a0c023) or empty($_31985b26056f955fec6db8f46f87653f)){
		$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_d35a39212fd75e833aea38f90831b2cb=='add'){
			if(mysqli_num_rows(mysqli_query($conns,"select * from kelas where kode='".$_f77c5a659797b862f0fc544aa9a0c023."'"))>0){
				$_b5adde8d7d7412251f47419fe9bf51a7='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="insert into kelas(kode, nama) values('".$_f77c5a659797b862f0fc544aa9a0c023."', '".$_31985b26056f955fec6db8f46f87653f."')";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
			$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$_3584859062ea9ecfb39b93bfcef8e869."'");
			$sql=mysqli_fetch_array($conn);
			$_08fdfd209a120f38f85507412165a4ef=$sql['kode'];
			if(mysqli_num_rows(mysqli_query($conns,"select * from kelas where kode='".$_f77c5a659797b862f0fc544aa9a0c023."' and kode<>'".$_08fdfd209a120f38f85507412165a4ef."'"))>0){
				$_b5adde8d7d7412251f47419fe9bf51a7='Kode sudah terdaftar. Silahkan daftarkan kode yang lain.';
			}else{
				$conn="update kelas set kode='".$_f77c5a659797b862f0fc544aa9a0c023."',nama='".$_31985b26056f955fec6db8f46f87653f."' where id_kelas='".$_3584859062ea9ecfb39b93bfcef8e869."'";
				mysqli_query($conns,$conn);
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		
	}
}else{
	$_31985b26056f955fec6db8f46f87653f='';$_f77c5a659797b862f0fc544aa9a0c023='';
	if(empty($_GET['action'])){$_d35a39212fd75e833aea38f90831b2cb='add';}else{$_d35a39212fd75e833aea38f90831b2cb=$_GET['action'];}
	if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		$sql=mysqli_fetch_array($conn);
		$_31985b26056f955fec6db8f46f87653f=$sql['nama'];
		$_f77c5a659797b862f0fc544aa9a0c023=$sql['kode'];
	}
	if($_d35a39212fd75e833aea38f90831b2cb=='delete'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		mysqli_query($conns,"delete from kelas where id_kelas='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}

if($_d35a39212fd75e833aea38f90831b2cb=='add'){$_06c518f70e97b19c7ec907f36542ce6e='INPUT DATA KELAS';}else{$_06c518f70e97b19c7ec907f36542ce6e='EDIT DATA KELAS';}

?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $_06c518f70e97b19c7ec907f36542ce6e;?></h1>
	</div>
</div>

<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $_3584859062ea9ecfb39b93bfcef8e869;?>">
<input name="action" type="hidden" value="<?php echo $_d35a39212fd75e833aea38f90831b2cb;?>">

<div class="row">
	<div class="col-lg-12">
	<?php
	if(!empty($_b5adde8d7d7412251f47419fe9bf51a7)){
		echo '
		   <div class="alert alert-danger ">
			  '.$_b5adde8d7d7412251f47419fe9bf51a7.'
		   </div>
		';
	}
	?>
	<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
	  <tr>
		<td width="200" style="vertical-align:middle;border-top-width:0;">Kode<span class="required">*</span> </td>
		<td style="border-top-width:0;"><input name="kode" type="text" class="form-control" value="<?php echo $_f77c5a659797b862f0fc544aa9a0c023;?>" style="width:100px;"></td>
	  </tr>
	  <tr>
		<td width="200" style="vertical-align:middle;">Nama Kelas<span class="required">*</span> </td>
		<td><input name="nama" type="text" class="form-control" value="<?php echo $_31985b26056f955fec6db8f46f87653f;?>" style="width:300px;"></td>
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

