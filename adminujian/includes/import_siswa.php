<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=siswa';
$regis='?hal=import_siswa';

$err='';
$notif=false;

if(isset($_POST['save'])){
	if($_FILES['csv']['error']==0) {	
		set_time_limit(100);
		$fotos=dirname(__FILE__);
		$fotos=str_replace('\\','/',$fotos);
		$fotos=str_replace('/includes','',$fotos);
		if(!file_exists($fotos.'/uploads/')){
			mkdir($fotos.'/uploads/');
		}
		$awalrayan=strtolower($_FILES['csv']['name']);
		$awalrayan=explode(".", $awalrayan);
		$extens=end($awalrayan);
		$waktu=time();
		$namafoto=urlstring(basename($_FILES['csv']['name'],'.'.$extens).' '.$waktu).'.'.$extens;
		$fileimport='tmp-siswa-'.$waktu.'.csv';
		
		if($extens=='zip'){
			move_uploaded_file($_FILES['csv']['tmp_name'],$fotos.'/uploads/'.$namafoto);
			$ziparch = new ZipArchive;
			$fileimport = $ziparch->open($fotos.'/uploads/'.$namafoto);
			if ($fileimport === TRUE) {
			  $ziparch->renameIndex(0,$fileimport);
			  $ziparch->close();
			}	
			$fileimport = $ziparch->open($fotos.'/uploads/'.$namafoto);
			if ($fileimport === TRUE) {
			  $ziparch->extractTo($fotos.'/uploads/');
			  $ziparch->close();
			}	
			unlink($fotos.'/uploads/'.$namafoto);
		}else{
			move_uploaded_file($_FILES['csv']['tmp_name'],$fotos.'/uploads/'.$fileimport);
		}
		$namafoto=$fotos.'/uploads/'.$fileimport;
		mysqli_query($conns,"truncate table siswa_tmp");
		
		$conn="
		LOAD DATA LOCAL 
		INFILE '".$namafoto."' 
		INTO TABLE siswa_tmp FIELDS TERMINATED BY '|' 
		OPTIONALLY ENCLOSED BY '\"' 
		LINES TERMINATED BY '\n' 
		IGNORE 1 LINES 
		(@1,nisn,nama,gender,alamat,kelas,password) 
		";
		mysqli_query($conns,$conn);
		
		unlink($namafoto);
		
		$conn=mysqli_query($conns,"select * from siswa_tmp where nisn<>''");
		while($sql=mysqli_fetch_array($conn)){
			$nisn=$sql['nisn'];
			$nama=$sql['nama'];
			$gender=$sql['gender'];
			$alamat=$sql['alamat'];
			$nama=$sql['kelas'];
			$idkelas='';
			$juml=mysqli_query($conns,"select id_kelas from kelas where kode='".$nama."'");
			if(mysqli_num_rows($juml)>0){
				$totAll=mysqli_fetch_array($juml);
				$idkelas=$totAll['id_kelas'];
			}
			if(mysqli_num_rows(mysqli_query("select nisn from siswa where nisn='".$nisn."'"))>0){
				$juml="update siswa set nama='".$nama."', alamat='".$alamat."', gender='".$gender."', id_kelas='".$idkelas."' where nisn='".$nisn."'";
			}else{
				$juml="insert into siswa(nisn,nama,alamat,gender,id_kelas) values('".$nisn."','".$nama."','".$alamat."','".$gender."','".$idkelas."')";
			}
			mysqli_query($conns,$juml);
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

<form action="<?php echo $regis;?>" name="" method="post" enctype="multipart/form-data">
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

