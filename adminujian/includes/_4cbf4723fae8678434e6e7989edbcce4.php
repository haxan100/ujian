<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=home';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=home';

if(isset($_POST['save'])){
	$_21eff29b583aa9be1b965eb96e6c56ed=$_POST['detail'];
	
	if(empty($_21eff29b583aa9be1b965eb96e6c56ed)){
		$_b5adde8d7d7412251f47419fe9bf51a7='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
		$password='';
	}else{
		if(mysqli_num_rows(mysqli_query($conns,"select * from konten where kode='home'"))==0){
			$conn="insert into konten(kode, detail) values('home','".$_21eff29b583aa9be1b965eb96e6c56ed."')";
			mysqli_query($conns,$conn);
		}else{
			$conn="update konten set detail='".$_21eff29b583aa9be1b965eb96e6c56ed."' where kode='home'";
			mysqli_query($conns,$conn);
		}
		$_b8d8980f155aa1475a25a57a6b2df92e='Data berhasil disimpan.';
		
	}
}else{
	$conn=mysqli_query($conns,"select * from konten where kode='home'");
	$sql=mysqli_fetch_array($conn);
	$_21eff29b583aa9be1b965eb96e6c56ed=$sql['detail'];
}

?>
<script src="ckeditor/ckeditor.js"></script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">EDIT HALAMAN DEPAN</h1>
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
if(!empty($_b8d8980f155aa1475a25a57a6b2df92e)){
	echo '
	   <div class="alert alert-success ">
		  '.$_b8d8980f155aa1475a25a57a6b2df92e.'
	   </div>
	';
}
?>

<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
  <tr>
	<td style="border-top-width:0;"><textarea name="detail" cols="" rows="" class="form-control ckeditor" style="height:300px;"><?php echo $_21eff29b583aa9be1b965eb96e6c56ed;?></textarea></td>
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

