<?php if(!defined('myweb')){ exit(); }?>
<?php
function getDataURI($_90b42a0a84ed04cf1e133e7d0b4c87fd, $_e93cf66fc1806033550e3794ea9ea258 = '') {
	return 'data: '.(function_exists('mime_content_type') ? mime_content_type($_90b42a0a84ed04cf1e133e7d0b4c87fd) : $_e93cf66fc1806033550e3794ea9ea258).';base64,'.base64_encode(file_get_contents($_90b42a0a84ed04cf1e133e7d0b4c87fd));
}
$pengumuman1='?hal=image_header';
$regis='?hal=image_header';
$_352323c15d1fa78cef3ff6277fa8502c=(500*1024);
$_4c792b9297dbe7cb2afcfd2333932891=array('png');

if(isset($_POST['save'])){
	if(!empty($_FILES['gambar']['name'])){
		if($_FILES['gambar']['error']==0) {
			$_cc5c6e696c11a4fdf170ece8ba9fdc6f=strtolower($_FILES['gambar']['name']);
			$_cc5c6e696c11a4fdf170ece8ba9fdc6f=explode(".", $_cc5c6e696c11a4fdf170ece8ba9fdc6f);
			$_c762a21cf01f9dfbea30dd29d5b7cbd9=end($_cc5c6e696c11a4fdf170ece8ba9fdc6f);

			if (in_array($_c762a21cf01f9dfbea30dd29d5b7cbd9, $_4c792b9297dbe7cb2afcfd2333932891)) {
				move_uploaded_file($_FILES['gambar']['tmp_name'],$_60b79b11408190713cbabbcf5f810477.'header.png');
				exit("<script>location.href='".$pengumuman1."';</script>");
			}else{
				$err='Format file PNG.';
			}
		}
	}
	
}

$_8518fd4bc0da31048bd649f3b066e6a4=getDataURI($_60b79b11408190713cbabbcf5f810477.'header.png');

?>

<script type="text/javascript">
$(document).ready(function(){
	$('input[type=file]').bootstrapFileInput();
});
</script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">IMAGE HEADER</h1>
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
	<td width="150" style="vertical-align:middle;border-top-width:0;">Gambar</td>
	<td style="border-top-width:0;"><input name="gambar" type="file"  data-filename-placement="inside" /> Format file PNG.

	</td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" class="btn btn-primary"> Upload</button> 
	</td>
  </tr>
</table>
</form>
<img src="<?php echo $_8518fd4bc0da31048bd649f3b066e6a4;?>" alt="" class="img-thumbnail">
	
	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

