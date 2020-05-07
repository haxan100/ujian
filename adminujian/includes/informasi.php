<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=informasi';
$regis='?hal=informasi';

if(isset($_POST['save'])){
	$detail=$_POST['detail'];
	
	if(empty($detail)){
		$err='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
		$password='';
	}else{
		if(mysqli_num_rows(mysqli_query($conns,"select * from konten where kode='informasi'"))==0){
			$conn="insert into konten(kode, detail) values('informasi','".$detail."')";
			mysqli_query($conns,$conn);
		}else{
			$conn="update konten set detail='".$detail."' where kode='informasi'";
			mysqli_query($conns,$conn);
		}
		$notif='Data berhasil disimpan.';
		
	}
}else{
	$conn=mysqli_query($conns,"select * from konten where kode='informasi'");
	$sql=mysqli_fetch_array($conn);
	$detail=$sql['detail'];
}

?>
<script src="ckeditor/ckeditor.js"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">EDIT INFORMASI</h1>
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
if(!empty($notif)){
	echo '
	   <div class="alert alert-success ">
		  '.$notif.'
	   </div>
	';
}
?>

<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
  <tr>
	<td style="border-top-width:0;"><textarea name="detail" cols="" rows="" class="form-control ckeditor" style="height:300px;"><?php echo $detail;?></textarea></td>
  </tr>
  <tr>
	<td>
	<button type="submit" name="save" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
	</td>
  </tr>
</table>
</form>
<span class="required">* <span> <span class="label label-danger">Harus diisi</span>
	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

