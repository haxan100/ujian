<?php if(!defined('myweb')){ exit(); }?>
<?php
function getDataURI($_90b42a0a84ed04cf1e133e7d0b4c87fd, $_e93cf66fc1806033550e3794ea9ea258 = '') {
	return 'data: '.(function_exists('mime_content_type') ? mime_content_type($_90b42a0a84ed04cf1e133e7d0b4c87fd) : $_e93cf66fc1806033550e3794ea9ea258).';base64,'.base64_encode(file_get_contents($_90b42a0a84ed04cf1e133e7d0b4c87fd));
}
$pengumuman1='?hal=image_header';
$regis='?hal=image_header';
$resolusi=(500*1024);
$fileext=array('png');

if(isset($_POST['save'])){
	if(!empty($_FILES['gambar']['name'])){
		if($_FILES['gambar']['error']==0) {
			$awalrayan=strtolower($_FILES['gambar']['name']);
			$awalrayan=explode(".", $awalrayan);
			$extens=end($awalrayan);

			if (in_array($extens, $fileext)) {
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

