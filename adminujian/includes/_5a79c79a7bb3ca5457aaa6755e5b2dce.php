<?php if(!defined('myweb')){ exit(); }?>
<?php
function getDataURI($conn, $connfi = '') {
	return 'data: '.(function_exists('mime_content_type') ? mime_content_type($conn) : $connfi).';base64,'.base64_encode(file_get_contents($conn));
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
				move_uploaded_file($_FILES['gambar']['tmp_name'],$namaco.'header.png');
				exit("<script>location.href='".$pengumuman1."';</script>");
			}else{
				$err='Format file PNG.';
			}
		}
	}
	
}

$head=getDataURI($namaco.'header.png');

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
<img src="<?php echo $head;?>" alt="" class="img-thumbnail">
	
	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

