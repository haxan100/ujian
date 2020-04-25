<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=siswa';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=import_siswa';

$_b5adde8d7d7412251f47419fe9bf51a7='';
$_b8d8980f155aa1475a25a57a6b2df92e=false;

if(isset($_POST['save'])){
	if($_FILES['csv']['error']==0) {	
		set_time_limit(100);
		$_714ca9eb87223ad2d6815f90173fde78=dirname(__FILE__);
		$_714ca9eb87223ad2d6815f90173fde78=str_replace('\\','/',$_714ca9eb87223ad2d6815f90173fde78);
		$_714ca9eb87223ad2d6815f90173fde78=str_replace('/includes','',$_714ca9eb87223ad2d6815f90173fde78);
		if(!file_exists($_714ca9eb87223ad2d6815f90173fde78.'/uploads/')){
			mkdir($_714ca9eb87223ad2d6815f90173fde78.'/uploads/');
		}
		$_cc5c6e696c11a4fdf170ece8ba9fdc6f=strtolower($_FILES['csv']['name']);
		$_cc5c6e696c11a4fdf170ece8ba9fdc6f=explode(".", $_cc5c6e696c11a4fdf170ece8ba9fdc6f);
		$_c762a21cf01f9dfbea30dd29d5b7cbd9=end($_cc5c6e696c11a4fdf170ece8ba9fdc6f);
		$_ff1baa3769658f5a92e0b3662b91ebb9=time();
		$_3656889a448a7af799d2d7955bed2354=urlstring(basename($_FILES['csv']['name'],'.'.$_c762a21cf01f9dfbea30dd29d5b7cbd9).' '.$_ff1baa3769658f5a92e0b3662b91ebb9).'.'.$_c762a21cf01f9dfbea30dd29d5b7cbd9;
		$_d5b0429b065568d4f03ae7e000debb5f='tmp-siswa-'.$_ff1baa3769658f5a92e0b3662b91ebb9.'.csv';
		
		if($_c762a21cf01f9dfbea30dd29d5b7cbd9=='zip'){
			move_uploaded_file($_FILES['csv']['tmp_name'],$_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
			$_5ae8874ca8599fc62fb261da1d13bf07 = new ZipArchive;
			$_4002603e450f0db8d5a7ff540344175c = $_5ae8874ca8599fc62fb261da1d13bf07->open($_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
			if ($_4002603e450f0db8d5a7ff540344175c === TRUE) {
			  $_5ae8874ca8599fc62fb261da1d13bf07->renameIndex(0,$_d5b0429b065568d4f03ae7e000debb5f);
			  $_5ae8874ca8599fc62fb261da1d13bf07->close();
			}	
			$_4002603e450f0db8d5a7ff540344175c = $_5ae8874ca8599fc62fb261da1d13bf07->open($_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
			if ($_4002603e450f0db8d5a7ff540344175c === TRUE) {
			  $_5ae8874ca8599fc62fb261da1d13bf07->extractTo($_714ca9eb87223ad2d6815f90173fde78.'/uploads/');
			  $_5ae8874ca8599fc62fb261da1d13bf07->close();
			}	
			unlink($_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
		}else{
			move_uploaded_file($_FILES['csv']['tmp_name'],$_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_d5b0429b065568d4f03ae7e000debb5f);
		}
		$_3656889a448a7af799d2d7955bed2354=$_714ca9eb87223ad2d6815f90173fde78.'/uploads/'.$_d5b0429b065568d4f03ae7e000debb5f;
		mysqli_query($conns,"truncate table siswa_tmp");
		
		$conn="
		LOAD DATA LOCAL 
		INFILE '".$_3656889a448a7af799d2d7955bed2354."' 
		INTO TABLE siswa_tmp FIELDS TERMINATED BY '|' 
		OPTIONALLY ENCLOSED BY '\"' 
		LINES TERMINATED BY '\n' 
		IGNORE 1 LINES 
		(@1,nisn,nama,gender,alamat,kelas,password) 
		";
		mysqli_query($conns,$conn);
		
		unlink($_3656889a448a7af799d2d7955bed2354);
		
		$conn=mysqli_query($conns,"select * from siswa_tmp where nisn<>''");
		while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
			$_5ab9622c6027ac8a26ecfedc9e0c5f27=$_60169cd1c47b7a7a85ab44f884635e41['nisn'];
			$_31985b26056f955fec6db8f46f87653f=$_60169cd1c47b7a7a85ab44f884635e41['nama'];
			$_f0619632751681b5561b70caf2920a71=$_60169cd1c47b7a7a85ab44f884635e41['gender'];
			$_b74a36690339daf77274de5ad720d6eb=$_60169cd1c47b7a7a85ab44f884635e41['alamat'];
			$_38895153c69c18db0dbba317a1d8d369=$_60169cd1c47b7a7a85ab44f884635e41['kelas'];
			$_72e838785b161ce1f713d6b1a452e270='';
			$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select id_kelas from kelas where kode='".$_38895153c69c18db0dbba317a1d8d369."'");
			if(mysqli_num_rows($_7da43659dfebcaab2ad4bbd2f2a98f30)>0){
				$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
				$_72e838785b161ce1f713d6b1a452e270=$_84ebecebe3a7c3b32dff74f8dce19fce['id_kelas'];
			}
			if(mysqli_num_rows(mysqli_query("select nisn from siswa where nisn='".$_5ab9622c6027ac8a26ecfedc9e0c5f27."'"))>0){
				$_7da43659dfebcaab2ad4bbd2f2a98f30="update siswa set nama='".$_31985b26056f955fec6db8f46f87653f."', alamat='".$_b74a36690339daf77274de5ad720d6eb."', gender='".$_f0619632751681b5561b70caf2920a71."', id_kelas='".$_72e838785b161ce1f713d6b1a452e270."' where nisn='".$_5ab9622c6027ac8a26ecfedc9e0c5f27."'";
			}else{
				$_7da43659dfebcaab2ad4bbd2f2a98f30="insert into siswa(nisn,nama,alamat,gender,id_kelas) values('".$_5ab9622c6027ac8a26ecfedc9e0c5f27."','".$_31985b26056f955fec6db8f46f87653f."','".$_b74a36690339daf77274de5ad720d6eb."','".$_f0619632751681b5561b70caf2920a71."','".$_72e838785b161ce1f713d6b1a452e270."')";
			}
			mysqli_query($conns,$_7da43659dfebcaab2ad4bbd2f2a98f30);
		}
		mysqli_query($conns,"truncate table siswa_tmp");
		
	}			
	exit("<script>location.href='".$pengumuman1."';</script>");
}

?>

<script type="text/javascript">
$(document).ready(function(){
	$('input[type=file]').bootstrapFileInput();
});
</script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">IMPORT DATA SISWA</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" name="" method="post" enctype="multipart/form-data">
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
	<td width="150" style="vertical-align:middle;border-top-width:0;">File Data Siswa<span class="required">*</span> </td>
	<td style="border-top-width:0;"><input name="csv" type="file"  data-filename-placement="inside" /></td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" class="btn btn-primary"> Import</button> 
	<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
	</td>
  </tr>
</table>
</form>
<span class="required">* </span> <span class="label label-danger">Harus diisi</span>
<div style="clear:both;height:20px;"></div>
<div class="bs-callout bs-callout-info">
	<h4>Informasi</h4>
	<p>File yang bisa diimport adalah file CSV ( dipisahkan dengan karakter | ).</p>
	<p>File juga bisa berupa file CSV yang sudah di compress/ ZIP sehingga proses import data akan lebih cepat.</p>
	<p><a href="format_siswa.csv" class="btn btn-success"><i class="fa fa-arrow-circle-o-down"></i> Download Contoh Format File</a></p>
</div>
	
	</div>
</div>



<?php
/*
---------------------------------------------
haxan100
*/
?>

