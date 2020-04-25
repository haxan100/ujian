<?php if(!defined('myweb')){ exit(); }?>
<?php

if(isset($_POST['save'])){
	if(empty($_POST['passwordlama']) or empty($_POST['password']) or empty($_POST['password1'])){
		$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_POST['password']!=$_POST['password1']){
			$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Password baru tidak sama.';
		}else{
			if(mysqli_num_rows(mysqli_query($conns,"select * from user where id_user='".$_2d2649677c494e9597d976bbb9df65e0['id']."' and password='".md5($_POST['passwordlama'])."'"))>0){
				mysqli_query($conns,"update user set password='".md5($_POST['password'])."' where id_user='".$_2d2649677c494e9597d976bbb9df65e0['id']."'");
				$_b8d8980f155aa1475a25a57a6b2df92e='<strong>Sukses !</strong> Password baru berhasil disimpan.';
			}else{
				$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Password Anda tidak sesuai.';
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
if(!empty($_b5adde8d7d7412251f47419fe9bf51a7)){
	echo '<div class="alert alert-danger ">'.$_b5adde8d7d7412251f47419fe9bf51a7.'</div>';
}
if(!empty($_b8d8980f155aa1475a25a57a6b2df92e)){
	echo '<div class="alert alert-success ">'.$_b8d8980f155aa1475a25a57a6b2df92e.'</div>';
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

