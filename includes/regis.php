<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=registrasi';
$regis='?hal=registrasi';
$conn=mysqli_query($conns,"select * from periode where tanggal_mulai<='".date('Y-m-d H:i:s')."' and tanggal_akhir>='".date('Y-m-d H:i:s')."'");
$sql=mysqli_fetch_array($conn);
$id_periode=$sql['id_periode'];
if(isset($_SESSION['LOGIN_ID'])){
	$err='<strong>Error !</strong> Silahkan Anda logout terlebih dahulu.';
}
if(isset($_POST['save'])){
	$nama=$_POST['nama'];
	$noPendaftaran=$_POST['no_pendaftaran'];
	$nisn=$_POST['nisn'];
	$alamat=$_POST['alamat'];
	$gender=$_POST['gender'];
	$tempatLahir=$_POST['tempat_lahir'];
	$tanggalLahir=$_POST['tanggal_lahir'];
	$telp=$_POST['telp'];
	$agama=$_POST['agama'];
	$namaAyah=$_POST['nama_ayah'];
	$namaIbu=$_POST['nama_ibu'];
	$sekolahAsal=$_POST['asal_sekolah'];
	$alamatSekolah=$_POST['alamat_sekolah'];
	$jurusan=$_POST['jurusan'];
	$password=$_POST['password'];
	
	if(empty($nisn) or empty($noPendaftaran) or empty($nama) or empty($alamat) or empty($gender) or empty($tempatLahir) or empty($tanggalLahir) or empty($agama) or empty($namaAyah) or empty($namaIbu) or empty($sekolahAsal) or empty($alamatSekolah) or empty($jurusan) or empty($password)){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($id_periode==''){
			$err='<strong>Error !</strong> Belum ada periode PPDB yang aktif saat ini.';
		}else{
			if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where nisn='".$nisn."'"))>0){
				$err='NISN sudah terdaftar. Silahkan gunakan NISN yang lain.';
				$password='';
			}else{
				if(mysqli_num_rows(mysqli_query($conns,"select * from siswa where no_pendaftaran='".$noPendaftaran."'"))>0){
					$err='No Pendaftaran sudah terdaftar. Silahkan gunakan No Pendaftaran yang lain.';
					$password='';
				}else{
					list($lists,$listing,$listings)=explode('/',$tanggalLahir);
					$tanggalLahir=$listings.'-'.$listing.'-'.$lists;
					$conn="insert into siswa(id_periode,no_pendaftaran,nisn, password, nama, alamat, gender, tempat_lahir, tanggal_lahir, telp, id_agama, nama_ayah, nama_ibu, asal_sekolah, alamat_sekolah, id_jurusan,last_update) 
					values('".$id_periode."', '".escape($noPendaftaran)."', '".escape($nisn)."', '".md5($password)."', '".escape($nama)."', '".escape($alamat)."'
					, '".escape($gender)."', '".escape($tempatLahir)."', '".escape($tanggalLahir)."', '".escape($telp)."', '".escape($agama)."', '".escape($namaAyah)."', '".escape($namaIbu)."'
					, '".escape($sekolahAsal)."', '".escape($alamatSekolah)."', '".escape($jurusan)."','".date('Y-m-d H:i:s')."')";
					mysqli_query($conns,$conn);
					setcookie('REG_SUCCESS',true,time()+5);
					exit("<script>location.href='".$pengumuman1."';</script>");
				}
			}
		}
		
	}
}else{
	$nisn='';$noPendaftaran='';$nama='';$alamat='';$gender='';$telp='';$tempatLahir='';$tanggalLahir='';$agama='';$namaAyah='';$namaIbu='';
	$sekolahAsal='';$alamatSekolah='';$jurusan='';$password='';
}

$jenisKelamin[]=array('L','Laki-laki');
$jenisKelamin[]=array('P','Perempuan');

$opsi='<option value=""></option>';
for($mulai=0;$mulai<count($jenisKelamin);$mulai++){
	if(strtolower($jenisKelamin[$mulai][0])==strtolower($gender)){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsi.='<option value="'.$jenisKelamin[$mulai][0].'" '.$selectOpsi.'>'.$jenisKelamin[$mulai][1].'</option>';
}
$opsiJurusan='<option value=""></option>';
$conn=mysqli_query($conns,"select * from jurusan order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_jurusan']==$jurusan){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsiJurusan.='<option value="'.$sql['id_jurusan'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}
$opsiAgama='<option value=""></option>';
$conn=mysqli_query($conns,"select * from agama order by id_agama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_agama']==$agama){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsiAgama.='<option value="'.$sql['id_agama'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}



?>
<link href="css/datepicker.css" rel="stylesheet">
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#save').click(function() {
		$('#form_siswa').attr('target','');
		$('#form_siswa').attr('action','<?php echo $regis;?>');
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
if($id_periode==''){
	echo '<div class="alert alert-danger">Mohon maaf, tidak ada periode PPDB yang aktif saat ini</div>';
}else{
?>
<div class="row">
	<div class="col-lg-12">



<form action="<?php echo $regis;?>" id="form_siswa" name="" method="post" enctype="multipart/form-data">
<?php
if(!empty($err)){
	echo '
	   <div class="alert alert-danger ">
		  '.$err.'
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
	<td style="border-top-width:0;"><input name="no_pendaftaran" type="text" class="form-control form-required" value="<?php echo $noPendaftaran;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">NISN<span class="required">*</span> </td>
	<td><input name="nisn" type="text" class="form-control form-required" value="<?php echo $nisn;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Siswa<span class="required">*</span> </td>
	<td><input name="nama" type="text" class="form-control form-required" value="<?php echo $nama;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Password<span class="required">*</span> </td>
	<td><input name="password" type="password" class="form-control form-required" value="<?php echo $password;?>" style="width:300px;" autocomplete="off" /></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Jenis Kelamin<span class="required">*</span> </td>
	<td><select name="gender" class="form-control form-required" style="width:300px;"><?php echo $opsi;?></select></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Alamat<span class="required">*</span> </td>
	<td><input name="alamat" type="text" class="form-control form-required" value="<?php echo $alamat;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Tempat Lahir<span class="required">*</span> </td>
	<td><input name="tempat_lahir" type="text" class="form-control form-required" value="<?php echo $tempatLahir;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Tanggal Lahir<span class="required">*</span> </td>
	<td><input name="tanggal_lahir" type="text" class="form-control tanggal form-required" value="<?php echo $tanggalLahir;?>" style="width:100px;float:left;margin-right:10px;" autocomplete="off"> <span class="help-block">dd/mm/yyyy</span></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">No. HP </td>
	<td><input name="telp" type="text" class="form-control" value="<?php echo $telp;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Agama<span class="required">*</span> </td>
	<td><select name="agama" id="kecamatan" class="form-control form-required" style="width:300px;"><?php echo $opsiAgama;?></select></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Ayah<span class="required">*</span> </td>
	<td><input name="nama_ayah" type="text" class="form-control form-required" value="<?php echo $namaAyah;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Nama Ibu<span class="required">*</span> </td>
	<td><input name="nama_ibu" type="text" class="form-control" value="<?php echo $namaIbu;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Asal Sekolah<span class="required">*</span> </td>
	<td><input name="asal_sekolah" type="text" class="form-control form-required" value="<?php echo $sekolahAsal;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Alamat Sekolah<span class="required">*</span> </td>
	<td><input name="alamat_sekolah" type="text" class="form-control form-required" value="<?php echo $alamatSekolah;?>" style="width:300px;" autocomplete="off"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Kompetensi Keahlian<span class="required">*</span> </td>
	<td><select name="jurusan" class="form-control form-required" style="width:300px;"><?php echo $opsiJurusan;?></select></td>
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

