<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=registrasi';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=registrasi';
$conn=mysqli_query($conns,"select * from periode where tanggal_mulai<='".date('Y-m-d H:i:s')."' and tanggal_akhir>='".date('Y-m-d H:i:s')."'");
$sql=mysqli_fetch_array($conn);
$_67c4414db31f60967df5c435d2d681ec=$sql['id_periode'];
if(isset($_SESSION['LOGIN_ID'])){
	$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Silahkan Anda logout terlebih dahulu.';
}
if(isset($_POST['save'])){
	$_31985b26056f955fec6db8f46f87653f=$_POST['nama'];
	$_2b175c5566c49ee6bc6c7102ea34c928=$_POST['no_pendaftaran'];
	$_5ab9622c6027ac8a26ecfedc9e0c5f27=$_POST['nisn'];
	$_b74a36690339daf77274de5ad720d6eb=$_POST['alamat'];
	$_f0619632751681b5561b70caf2920a71=$_POST['gender'];
	$_0ac2f3020a61bfa511f3961e3110d25a=$_POST['tempat_lahir'];
	$_57232923c739e8b5307942d700ce7176=$_POST['tanggal_lahir'];
	$_271c0ceb1ecec7f25180a7ba056c1fb4=$_POST['telp'];
	$_5fd6b61e78db94204fb3558b61371e8c=$_POST['agama'];
	$_82bf26af3c00cdc7b632bcef2a5c8e37=$_POST['nama_ayah'];
	$_ce828b486ccf88dd2970f52ab123be65=$_POST['nama_ibu'];
	$_e50768a7e92b0df261c63a201b14c513=$_POST['asal_sekolah'];
	$_a412e4f839cc170d86d39c7788e454f5=$_POST['alamat_sekolah'];
	$_0a22a15d3692a4e52aea2b257e6a358d=$_POST['jurusan'];
	$password=$_POST['password'];
	
	if(empty($_5ab9622c6027ac8a26ecfedc9e0c5f27) or empty($_2b175c5566c49ee6bc6c7102ea34c928) or empty($_31985b26056f955fec6db8f46f87653f) or empty($_b74a36690339daf77274de5ad720d6eb) or empty($_f0619632751681b5561b70caf2920a71) or empty($_0ac2f3020a61bfa511f3961e3110d25a) or empty($_57232923c739e8b5307942d700ce7176) or empty($_5fd6b61e78db94204fb3558b61371e8c) or empty($_82bf26af3c00cdc7b632bcef2a5c8e37) or empty($_ce828b486ccf88dd2970f52ab123be65) or empty($_e50768a7e92b0df261c63a201b14c513) or empty($_a412e4f839cc170d86d39c7788e454f5) or empty($_0a22a15d3692a4e52aea2b257e6a358d) or empty($password)){
		$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_67c4414db31f60967df5c435d2d681ec==''){
			$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Belum ada periode PPDB yang aktif saat ini.';
		}else{
			if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where nisn='".$_5ab9622c6027ac8a26ecfedc9e0c5f27."'"))>0){
				$_b5adde8d7d7412251f47419fe9bf51a7='NISN sudah terdaftar. Silahkan gunakan NISN yang lain.';
				$password='';
			}else{
				if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where no_pendaftaran='".$_2b175c5566c49ee6bc6c7102ea34c928."'"))>0){
					$_b5adde8d7d7412251f47419fe9bf51a7='No Pendaftaran sudah terdaftar. Silahkan gunakan No Pendaftaran yang lain.';
					$password='';
				}else{
					list($_20fd65e9c7406034fadc682f06732868,$_f52ba22baf75438bb1b02f476954c023,$_36a4dc9ccf2bdc09d800556724231fc6)=explode('/',$_57232923c739e8b5307942d700ce7176);
					$_57232923c739e8b5307942d700ce7176=$_36a4dc9ccf2bdc09d800556724231fc6.'-'.$_f52ba22baf75438bb1b02f476954c023.'-'.$_20fd65e9c7406034fadc682f06732868;
					$conn="insert into siswa(id_periode,no_pendaftaran,nisn, password, nama, alamat, gender, tempat_lahir, tanggal_lahir, telp, id_agama, nama_ayah, nama_ibu, asal_sekolah, alamat_sekolah, id_jurusan,last_update) 
					values('".$_67c4414db31f60967df5c435d2d681ec."', '".escape($_2b175c5566c49ee6bc6c7102ea34c928)."', '".escape($_5ab9622c6027ac8a26ecfedc9e0c5f27)."', '".md5($password)."', '".escape($_31985b26056f955fec6db8f46f87653f)."', '".escape($_b74a36690339daf77274de5ad720d6eb)."'
					, '".escape($_f0619632751681b5561b70caf2920a71)."', '".escape($_0ac2f3020a61bfa511f3961e3110d25a)."', '".escape($_57232923c739e8b5307942d700ce7176)."', '".escape($_271c0ceb1ecec7f25180a7ba056c1fb4)."', '".escape($_5fd6b61e78db94204fb3558b61371e8c)."', '".escape($_82bf26af3c00cdc7b632bcef2a5c8e37)."', '".escape($_ce828b486ccf88dd2970f52ab123be65)."'
					, '".escape($_e50768a7e92b0df261c63a201b14c513)."', '".escape($_a412e4f839cc170d86d39c7788e454f5)."', '".escape($_0a22a15d3692a4e52aea2b257e6a358d)."','".date('Y-m-d H:i:s')."')";
					mysqli_query($conns,$conn);
					setcookie('REG_SUCCESS',true,time()+5);
					exit("<script>location.href='".$pengumuman1."';</script>");
				}
			}
		}
		
	}
}else{
	$_5ab9622c6027ac8a26ecfedc9e0c5f27='';$_2b175c5566c49ee6bc6c7102ea34c928='';$_31985b26056f955fec6db8f46f87653f='';$_b74a36690339daf77274de5ad720d6eb='';$_f0619632751681b5561b70caf2920a71='';$_271c0ceb1ecec7f25180a7ba056c1fb4='';$_0ac2f3020a61bfa511f3961e3110d25a='';$_57232923c739e8b5307942d700ce7176='';$_5fd6b61e78db94204fb3558b61371e8c='';$_82bf26af3c00cdc7b632bcef2a5c8e37='';$_ce828b486ccf88dd2970f52ab123be65='';
	$_e50768a7e92b0df261c63a201b14c513='';$_a412e4f839cc170d86d39c7788e454f5='';$_0a22a15d3692a4e52aea2b257e6a358d='';$password='';
}

$_f8eb8624de17a1bcbd564bdda7e7e4ec[]=array('L','Laki-laki');
$_f8eb8624de17a1bcbd564bdda7e7e4ec[]=array('P','Perempuan');

$_3f921bc4290e25e3e064046a5f91a781='<option value=""></option>';
for($mulai=0;$mulai<count($_f8eb8624de17a1bcbd564bdda7e7e4ec);$mulai++){
	if(strtolower($_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][0])==strtolower($_f0619632751681b5561b70caf2920a71)){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_3f921bc4290e25e3e064046a5f91a781.='<option value="'.$_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][0].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_f8eb8624de17a1bcbd564bdda7e7e4ec[$mulai][1].'</option>';
}
$_b847d626109199f9fe6eadf71f825eef='<option value=""></option>';
$conn=mysqli_query($conns,"select * from jurusan order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_jurusan']==$_0a22a15d3692a4e52aea2b257e6a358d){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_b847d626109199f9fe6eadf71f825eef.='<option value="'.$sql['id_jurusan'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}
$_87dbca67f54c8961fd6e1ac645e24937='<option value=""></option>';
$conn=mysqli_query($conns,"select * from agama order by id_agama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_agama']==$_5fd6b61e78db94204fb3558b61371e8c){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_87dbca67f54c8961fd6e1ac645e24937.='<option value="'.$sql['id_agama'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}



?>
<link href="css/datepicker.css" rel="stylesheet">
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
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
	
	$('.tanggal').datepicker({
		format: 'dd/mm/yyyy'
	});
	
}); 
</script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">Pendaftaran Siswa Baru</h1>
	</div>
</div>
<?php
if($_67c4414db31f60967df5c435d2d681ec==''){
	echo '<div class="alert alert-danger">Mohon maaf, tidak ada periode PPDB yang aktif saat ini</div>';
}else{
?>
<div class="row">
	<div class="col-lg-12">



<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" id="form_siswa" name="" method="post" enctype="multipart/form-data">
<?php
if(!empty($_b5adde8d7d7412251f47419fe9bf51a7)){
	echo '
	   <div class="alert alert-danger ">
		  '.$_b5adde8d7d7412251f47419fe9bf51a7.'
	   </div>
	';
}
if(isset($_COOKIE['REG_SUCCESS'])){
	echo '
	   <div class="alert alert-success ">
		  <strong>Registrasi berhasil</strong>, silahkan login terlebih dahulu untuk melakukan Tes Online.
	   </div>
	';
}
if(!isset($_SESSION['LOGIN_ID'])){
?>

<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
  <tr>
	<td width="220" style="vertical-align:middle;border-top-width:0;">No Pendaftaran<span class="required">*</span> </td>
	<td style="border-top-width:0;"><input name="no_pendaftaran" type="text" class="form-control form-required" value="<?php echo $_2b175c5566c49ee6bc6c7102ea34c928;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">NISN<span class="required">*</span> </td>
	<td><input name="nisn" type="text" class="form-control form-required" value="<?php echo $_5ab9622c6027ac8a26ecfedc9e0c5f27;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Siswa<span class="required">*</span> </td>
	<td><input name="nama" type="text" class="form-control form-required" value="<?php echo $_31985b26056f955fec6db8f46f87653f;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Password<span class="required">*</span> </td>
	<td><input name="password" type="password" class="form-control form-required" value="<?php echo $password;?>" style="width:300px;" autocomplete="off" /></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Jenis Kelamin<span class="required">*</span> </td>
	<td><select name="gender" class="form-control form-required" style="width:300px;"><?php echo $_3f921bc4290e25e3e064046a5f91a781;?></select></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Alamat<span class="required">*</span> </td>
	<td><input name="alamat" type="text" class="form-control form-required" value="<?php echo $_b74a36690339daf77274de5ad720d6eb;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Tempat Lahir<span class="required">*</span> </td>
	<td><input name="tempat_lahir" type="text" class="form-control form-required" value="<?php echo $_0ac2f3020a61bfa511f3961e3110d25a;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Tanggal Lahir<span class="required">*</span> </td>
	<td><input name="tanggal_lahir" type="text" class="form-control tanggal form-required" value="<?php echo $_57232923c739e8b5307942d700ce7176;?>" style="width:100px;float:left;margin-right:10px;" autocomplete="off"> <span class="help-block">dd/mm/yyyy</span></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">No. HP </td>
	<td><input name="telp" type="text" class="form-control" value="<?php echo $_271c0ceb1ecec7f25180a7ba056c1fb4;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Agama<span class="required">*</span> </td>
	<td><select name="agama" id="kecamatan" class="form-control form-required" style="width:300px;"><?php echo $_87dbca67f54c8961fd6e1ac645e24937;?></select></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Ayah<span class="required">*</span> </td>
	<td><input name="nama_ayah" type="text" class="form-control form-required" value="<?php echo $_82bf26af3c00cdc7b632bcef2a5c8e37;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Ibu<span class="required">*</span> </td>
	<td><input name="nama_ibu" type="text" class="form-control" value="<?php echo $_ce828b486ccf88dd2970f52ab123be65;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Asal Sekolah<span class="required">*</span> </td>
	<td><input name="asal_sekolah" type="text" class="form-control form-required" value="<?php echo $_e50768a7e92b0df261c63a201b14c513;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Alamat Sekolah<span class="required">*</span> </td>
	<td><input name="alamat_sekolah" type="text" class="form-control form-required" value="<?php echo $_a412e4f839cc170d86d39c7788e454f5;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Kompetensi Keahlian<span class="required">*</span> </td>
	<td><select name="jurusan" class="form-control form-required" style="width:300px;"><?php echo $_b847d626109199f9fe6eadf71f825eef;?></select></td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" id="save" class="btn btn-primary"> Simpan</button> 
	</td>
  </tr>
</table>
<span class="required">* </span> <span class="label label-danger">Harus diisi</span>

<?php } ?>
</form>
	</div>
</div>
<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

