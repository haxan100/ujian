<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=siswa';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_siswa';

$_0acc1a58465d5895417dc9a1a55976be=(4*1024*1024);
$_4c792b9297dbe7cb2afcfd2333932891=array('jpg');
$gambar='images/no-thumb.jpg';
$_f0e3e1311253a34acb082c35dd0cf0da='';

if(isset($_POST['save'])){
	$_3584859062ea9ecfb39b93bfcef8e869=$_POST['id'];
	$_d35a39212fd75e833aea38f90831b2cb=$_POST['action'];
	$_31985b26056f955fec6db8f46f87653f=$_POST['nama'];
	$nisn=$_POST['nisn'];
	$_f0619632751681b5561b70caf2920a71=$_POST['gender'];
	$idkelas=$_POST['kelas'];
	$password=$_POST['password'];
	
	if(empty($idkelas) or empty($nisn) or empty($_31985b26056f955fec6db8f46f87653f) or empty($_f0619632751681b5561b70caf2920a71) or empty($password)){
		$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_d35a39212fd75e833aea38f90831b2cb=='add'){
			if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where nisn='".$nisn."'"))>0){
				$_b5adde8d7d7412251f47419fe9bf51a7='Username sudah terdaftar. Silahkan daftarkan Username yang lain atau lakukan edit profil siswa.';
				$password='';
			}else{
			
				$conn="insert into siswa(id_kelas,nisn, password, nama, gender) 
				values('".$idkelas."', '".$nisn."', '".md5($password)."', '".$_31985b26056f955fec6db8f46f87653f."', '".$_f0619632751681b5561b70caf2920a71."')";
				mysqli_query($conns,$conn);
				
				if(!file_exists($fotos.'/uploads/')){
					mkdir($fotos.'/uploads/');
				}
				if(!file_exists($fotos.'/uploads/foto/')){
					mkdir($fotos.'/uploads/foto/');
				}
				if(!empty($_FILES['foto']['name'])){
					if($_FILES['foto']['error']==0) {
						$_cc5c6e696c11a4fdf170ece8ba9fdc6f=strtolower($_FILES['foto']['name']);
						$_cc5c6e696c11a4fdf170ece8ba9fdc6f=explode(".", $_cc5c6e696c11a4fdf170ece8ba9fdc6f);
						$_c762a21cf01f9dfbea30dd29d5b7cbd9=end($_cc5c6e696c11a4fdf170ece8ba9fdc6f);
						if (in_array($_c762a21cf01f9dfbea30dd29d5b7cbd9, $_4c792b9297dbe7cb2afcfd2333932891)) {
							$_3656889a448a7af799d2d7955bed2354=$nisn.'.jpg';
							move_uploaded_file($_FILES['foto']['tmp_name'],$fotos.'/uploads/foto/'.$_3656889a448a7af799d2d7955bed2354);
						}
					}
				}
				
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
			$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'");
			$sql=mysqli_fetch_array($conn);
			$_84cbb4ee450782b7e500304a62e91ac0=$sql['nisn'];
			$_5ff579d3c1dff8240c09ee80edb46288=$sql['password'];
			if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where nisn='".$nisn."' and nisn<>'".$_84cbb4ee450782b7e500304a62e91ac0."'"))>0){
				$_b5adde8d7d7412251f47419fe9bf51a7='Username sudah terdaftar. Silahkan daftarkan Username yang lain atau lakukan edit profil siswa.';
			}else{
				$_45b37027578ddbc5040cf6b3961c7916='';
				if($_5ff579d3c1dff8240c09ee80edb46288==''){
					$_45b37027578ddbc5040cf6b3961c7916=", password='".md5($password)."' ";
				}
				$conn="update siswa set id_kelas='".$idkelas."', nisn='".$nisn."', nama='".$_31985b26056f955fec6db8f46f87653f."', gender='".$_f0619632751681b5561b70caf2920a71."' ".$_45b37027578ddbc5040cf6b3961c7916." where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'";
				mysqli_query($conns,$conn);
				if(!file_exists($fotos.'/uploads/')){
					mkdir($fotos.'/uploads/');
				}
				if(!file_exists($fotos.'/uploads/foto/')){
					mkdir($fotos.'/uploads/foto/');
				}
				if(!empty($_FILES['foto']['name'])){
					if($_FILES['foto']['error']==0) {
						$_cc5c6e696c11a4fdf170ece8ba9fdc6f=strtolower($_FILES['foto']['name']);
						$_cc5c6e696c11a4fdf170ece8ba9fdc6f=explode(".", $_cc5c6e696c11a4fdf170ece8ba9fdc6f);
						$_c762a21cf01f9dfbea30dd29d5b7cbd9=end($_cc5c6e696c11a4fdf170ece8ba9fdc6f);
						if (in_array($_c762a21cf01f9dfbea30dd29d5b7cbd9, $_4c792b9297dbe7cb2afcfd2333932891)) {
							$_3656889a448a7af799d2d7955bed2354=$nisn.'.jpg';
							move_uploaded_file($_FILES['foto']['tmp_name'],$fotos.'/uploads/foto/'.$_3656889a448a7af799d2d7955bed2354);
						}
					}
				}
				exit("<script>location.href='".$pengumuman1."';</script>");
			}
		}
		
	}
}elseif(isset($_POST['reset'])){
	$_3584859062ea9ecfb39b93bfcef8e869=$_POST['id'];
	mysqli_query($conns,"update siswa set password='' where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'");
	exit("<script>location.href='".$_4bf2fdb3ab37a41b537e7360f7e4b007."&id=".$_3584859062ea9ecfb39b93bfcef8e869."&action=edit';</script>");
}elseif(isset($_POST['deletefoto'])){
	$_3584859062ea9ecfb39b93bfcef8e869=$_POST['id'];
	$conn=mysqli_query($conns,"select nisn from siswa where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'");
	$sql=mysqli_fetch_array($conn);
	$nisn=$sql['nisn'];
	if(file_exists($fotos.'/uploads/foto/'.$nisn.'.jpg')){unlink($fotos.'/uploads/foto/'.$nisn.'.jpg');}
	exit("<script>location.href='".$_4bf2fdb3ab37a41b537e7360f7e4b007."&id=".$_3584859062ea9ecfb39b93bfcef8e869."&action=edit';</script>");
}else{
	$_3584859062ea9ecfb39b93bfcef8e869='';
	$idkelas='';$nisn='';$_31985b26056f955fec6db8f46f87653f='';$_f0619632751681b5561b70caf2920a71='';$password='';
	if(empty($_GET['action'])){$_d35a39212fd75e833aea38f90831b2cb='add';}else{$_d35a39212fd75e833aea38f90831b2cb=$_GET['action'];}
	if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		$sql=mysqli_fetch_array($conn);
		$nisn=$sql['nisn'];
		$_31985b26056f955fec6db8f46f87653f=$sql['nama'];
		$_f0619632751681b5561b70caf2920a71=$sql['gender'];
		$idkelas=$sql['id_kelas'];
		$password=$sql['password'];
		
	}
	if($_d35a39212fd75e833aea38f90831b2cb=='delete'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		mysqli_query($conns,"delete from siswa where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}
if(file_exists($fotos.'/uploads/foto/'.$nisn.'.jpg')){
	$gambar=$look.'uploads/foto/'.$nisn.'.jpg';
	$_f0e3e1311253a34acb082c35dd0cf0da='uploads/foto/'.$nisn.'.jpg';
}

$_f8eb8624de17a1bcbd564bdda7e7e4ec[]=array('L','Laki-laki');
$_f8eb8624de17a1bcbd564bdda7e7e4ec[]=array('P','Perempuan');

$_3f921bc4290e25e3e064046a5f91a781='<option value=""></option>';
for($mulai=0;$mulai<count($_f8eb8624de17a1bcbd564bdda7e7e4ec);$mulai++){
	if(strtolower($_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][0])==strtolower($_f0619632751681b5561b70caf2920a71)){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_3f921bc4290e25e3e064046a5f91a781.='<option value="'.$_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][0].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][1].'</option>';
}
$_a6abb7c18ac54429027c2440b5329b86='<option value=""></option>';
$conn=mysqli_query($conns,"select * from kelas order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_kelas']==$idkelas){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_a6abb7c18ac54429027c2440b5329b86.='<option value="'.$sql['id_kelas'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}

if($_d35a39212fd75e833aea38f90831b2cb=='add'){$_06c518f70e97b19c7ec907f36542ce6e='INPUT DATA SISWA';}else{$_06c518f70e97b19c7ec907f36542ce6e='EDIT DATA SISWA';}


?>
<script type="text/javascript">
$(document).ready(function(){
	$('#foto').bind('change', function() {
		if(this.files[0].type!='image/jpg' && this.files[0].type!='image/jpeg'){
			alert('Type file yang diperbolehkan adalah JPG.');
			$(this).val('');
		}
		if(this.files[0].size>(500*1024)){
			alert('Ukuran file yang diperbolehkan adalah maksimal 500 Kb');
			$(this).val('');
		}
	
	});
	$('#save').click(function() {
		$('#form_siswa').attr('target','');
		$('#form_siswa').attr('action','<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>');
		$('#pesan_error').hide();
		next=true;
		$('.form-required').each(function( index ) {
			if($( this ).val()==''){
				next=false;
			}
		});
		if(next==false){
			alert('Lengkapi terlebih dahulu kolom yang bertanda *');
			return false;
		}
	});
	$('input[type=file]').bootstrapFileInput();
}); 
</script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $_06c518f70e97b19c7ec907f36542ce6e;?></h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">



<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" id="form_siswa" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $_3584859062ea9ecfb39b93bfcef8e869;?>">
<input name="action" type="hidden" value="<?php echo $_d35a39212fd75e833aea38f90831b2cb;?>">
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
	<td style="vertical-align:middle;border-top-width:0;">Kelas<span class="required">*</span> </td>
	<td style="vertical-align:middle;border-top-width:0;"><select name="kelas" id="kelas" class="form-control form-required" style="width:300px;"><?php echo $_a6abb7c18ac54429027c2440b5329b86;?></select></td>
	<td style="border-top-width:0;" rowspan="6" width="220">
	<div class="thumbnail">
      <img src="<?php echo $gambar;?>" alt="Foto depan" width="200" /><center>Foto </center>
    </div>
	</td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Username<span class="required">*</span> </td>
	<td><input name="nisn" type="text" class="form-control form-required" value="<?php echo $nisn;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td width="220" style="vertical-align:middle;">Nama Peserta Didik<span class="required">*</span> </td>
	<td><input name="nama" type="text" class="form-control form-required" value="<?php echo $_31985b26056f955fec6db8f46f87653f;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Password<span class="required">*</span> </td>
	<td>
	<?php
	if($password==''){
	echo '<input name="password" type="password" class="form-control form-required" value="" style="width:300px;" />';
	}else{
	echo '<input name="password" type="hidden" value="1" /><button type="submit" name="reset" class="btn btn-danger">Reset Password</button>';
	}
	?>
	
	</td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Jenis Kelamin<span class="required">*</span> </td>
	<td><select name="gender" class="form-control form-required" style="width:300px;"><?php echo $_3f921bc4290e25e3e064046a5f91a781;?></select></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Foto</td>
	<td>
	<?php if($_f0e3e1311253a34acb082c35dd0cf0da==''){ ?>
	<input name="foto" id="foto" type="file"  data-filename-placement="inside" />
	<?php }else{ ?>
	<button type="submit" name="deletefoto" class="btn btn-danger">Hapus Foto</button>
	<?php } ?>
	</td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" id="save" class="btn btn-primary"> Simpan</button> 
	<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
	</td>
  </tr>
</table>
</form>
<span class="required">* </span> <span class="label label-danger">Harus diisi</span>
	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

