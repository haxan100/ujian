<?php if(!defined('myweb')){ exit(); }?>
<?php

if(isset($_POST['save'])){
	if(empty($_POST['passwordlama']) or empty($_POST['password']) or empty($_POST['password1'])){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_POST['password']!=$_POST['password1']){
			$err='<strong>Error !</strong> Password baru tidak sama.';
		}else{
			if(mysqli_num_rows(mysqli_query($conns,"select * from user where id_user='".$id['id']."' and password='".md5($_POST['passwordlama'])."'"))>0){
				mysqli_query($conns,"update user set password='".md5($_POST['password'])."' where id_user='".$id['id']."'");
				$notif='<strong>Sukses !</strong> Password baru berhasil disimpan.';
			}else{
				$err='<strong>Error !</strong> Password Anda tidak sesuai.';
			}
		}
	}
}


?>
<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">UBAH PASSWORD</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="post">
<?php
if(!empty($err)){
	echo '<div class="alert alert-danger ">'.$err.'</div>';
}
if(!empty($notif)){
	echo '<div class="alert alert-success ">'.$notif.'</div>';
}
?>
<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
  <tr>
	<td width="150" style="vertical-align:middle;border-top-width:0;">Password Saat Ini<span class="required">*</span> </td>
	<td style="border-top-width:0;"><input name="passwordlama" type="password" class="form-control" value="" style="width:300px;"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Password Baru<span class="required">*</span> </td>
	<td><input name="password" type="password" class="form-control" value="" style="width:300px;"></td>
  </tr>
  <tr>
	<td style="vertical-align:middle;">Ulangi<span class="required">*</span> </td>
	<td><input name="password1" type="password" class="form-control" value="" style="width:300px;"></td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $look;?>'">Batal</button>
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

