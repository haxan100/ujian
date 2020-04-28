<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=gambar';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=gambar';
$_352323c15d1fa78cef3ff6277fa8502c=(4*1024*1024);
$_4c792b9297dbe7cb2afcfd2333932891=array('jpg','jpeg','png');

if(isset($_POST['save'])){
	$_52f720bdaf922c68904e386cbf0cd227=0;
	foreach ($_FILES['gambar']['name'] as $_6b6e98cde8b33087a33e4d3a497bd86b => $_9b395079675c6a66ff23ea9c6c4a668e) {     
		if ($_FILES['gambar']['error'][$_6b6e98cde8b33087a33e4d3a497bd86b] == 4) {
			continue;
		}	       
		if ($_FILES['gambar']['error'][$_6b6e98cde8b33087a33e4d3a497bd86b] == 0) {	           
			$_52f720bdaf922c68904e386cbf0cd227++;
			$_cc5c6e696c11a4fdf170ece8ba9fdc6f=strtolower($_FILES['gambar']['name'][$_6b6e98cde8b33087a33e4d3a497bd86b]);
			$_cc5c6e696c11a4fdf170ece8ba9fdc6f=explode(".", $_cc5c6e696c11a4fdf170ece8ba9fdc6f);
			$_c762a21cf01f9dfbea30dd29d5b7cbd9=end($_cc5c6e696c11a4fdf170ece8ba9fdc6f);
			$_3656889a448a7af799d2d7955bed2354=urlstring('thumb-'.basename($_FILES['gambar']['name'][$_6b6e98cde8b33087a33e4d3a497bd86b],'.'.$_c762a21cf01f9dfbea30dd29d5b7cbd9).' '.time()).'.'.$_c762a21cf01f9dfbea30dd29d5b7cbd9;
			move_uploaded_file($_FILES['gambar']['tmp_name'][$_6b6e98cde8b33087a33e4d3a497bd86b],$fotos.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
			mysqli_query($conns,"insert into gambar(nama) values('".$_3656889a448a7af799d2d7955bed2354."')");
		}
	}
	$notif='Upload file berhasil. Jumlah file : <strong>'.$_52f720bdaf922c68904e386cbf0cd227.'</strong>';
}
if(isset($_GET['action']) and $_GET['action']=='delete'){
	$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
	$conn=mysqli_query($conns,"select * from gambar where id_gambar='".$_3584859062ea9ecfb39b93bfcef8e869."'");
	$sql=mysqli_fetch_array($conn);
	$_3656889a448a7af799d2d7955bed2354=$sql['nama'];
	mysqli_query($conns,"delete from gambar where id_gambar='".$_3584859062ea9ecfb39b93bfcef8e869."'");
	unlink($fotos.'/uploads/'.$_3656889a448a7af799d2d7955bed2354);
	exit("<script>location.href='".$pengumuman1."';</script>");
}

$conn=mysqli_query($conns,"select count(*) as jml from gambar ");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1;
$_111f1b5b84b5c819ea9ae35968fce466=20;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$_f52ba22baf75438bb1b02f476954c023;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_d4cb19f81c23886f544f26709bd4f799='';
$_8e529f7c1789a19f5ed8b2edb0af9fa7='';
$conn="select * from gambar order by id_gambar limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
while($sql=mysqli_fetch_array($conn)){
	$_52f720bdaf922c68904e386cbf0cd227++;
	$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_gambar'];
	$_8e529f7c1789a19f5ed8b2edb0af9fa7.='
	<div class="col-lg-3 col-md-4 col-xs-6 thumb text-center" style="margin-bottom:10px;">
		<a class="thumbnail gambar" href="#gambar_modal" data-toggle="modal" data-src="'.$sql['nama'].'">
			<img class="img-responsive" src="'.$look.'uploads/'.$sql['nama'].'" alt="">
		</a>
		<div style="margin-top:-10px;">
		<a href="#" onclick="DeleteConfirm(\''.$_4bf2fdb3ab37a41b537e7360f7e4b007.'&amp;id='.$_3584859062ea9ecfb39b93bfcef8e869.'&amp;action=delete\');return(false);" class="btn btn-danger btn-sm">Hapus</a>
		</div>
	</div>
	';
}
?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('input[type=file]').bootstrapFileInput();
	$(".gambar").click(function() {
		$('#url_gambar').val('<?php echo $look.'thumb.php?name=';?>' + $(this).attr('data-src'));
	});
	
});
</script>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">UPLOAD GAMBAR</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">



<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" name="" method="post" enctype="multipart/form-data">
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
	<td style="border-top-width:0;"><input name="gambar[]" multiple="multiple" type="file"  data-filename-placement="inside" /> Format file JPG, JPEG, PNG.

	</td>
  </tr>
  <tr>
	<td></td>
	<td>
	<button type="submit" name="save" class="btn btn-primary"> Upload</button> 
	<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
	</td>
  </tr>
</table>
</form>


<?php 
if($_8e529f7c1789a19f5ed8b2edb0af9fa7!=''){
	echo $_8e529f7c1789a19f5ed8b2edb0af9fa7;
?>
<div class="modal fade" id="gambar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">URL Gambar</h4>
      </div>
      <div class="modal-body">
        <p>Copy dan paste URL gambar di bawah ini</p>
		<input id="url_gambar" type="text" value="" class="form-control" />
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
	
	</div>
</div>
<?php 
if($_8e529f7c1789a19f5ed8b2edb0af9fa7!=''){
?>

<div class="row">
	<div class="col-lg-12">
	<center><?php echo $_addbb9f4792a53c78e32e91e1c94f075;?></center>
	</div>
</div>
<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

