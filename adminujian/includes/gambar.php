<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=gambar';
$regis='?hal=gambar';
$_352323c15d1fa78cef3ff6277fa8502c=(4*1024*1024);
$fileext=array('jpg','jpeg','png');

if(isset($_POST['save'])){
	$awal=0;
	foreach ($_FILES['gambar']['name'] as $_6b6e98cde8b33087a33e4d3a497bd86b => $_9b395079675c6a66ff23ea9c6c4a668e) {     
		if ($_FILES['gambar']['error'][$_6b6e98cde8b33087a33e4d3a497bd86b] == 4) {
			continue;
		}	       
		if ($_FILES['gambar']['error'][$_6b6e98cde8b33087a33e4d3a497bd86b] == 0) {	           
			$awal++;
			$awalrayan=strtolower($_FILES['gambar']['name'][$_6b6e98cde8b33087a33e4d3a497bd86b]);
			$awalrayan=explode(".", $awalrayan);
			$extens=end($awalrayan);
			$namafoto=urlstring('thumb-'.basename($_FILES['gambar']['name'][$_6b6e98cde8b33087a33e4d3a497bd86b],'.'.$extens).' '.time()).'.'.$extens;
			move_uploaded_file($_FILES['gambar']['tmp_name'][$_6b6e98cde8b33087a33e4d3a497bd86b],$fotos.'/uploads/'.$namafoto);
			mysqli_query($conns,"insert into gambar(nama) values('".$namafoto."')");
		}
	}
	$notif='Upload file berhasil. Jumlah file : <strong>'.$awal.'</strong>';
}
if(isset($_GET['action']) and $_GET['action']=='delete'){
	$id_paket=$_GET['id'];
	$conn=mysqli_query($conns,"select * from gambar where id_gambar='".$id_paket."'");
	$sql=mysqli_fetch_array($conn);
	$namafoto=$sql['nama'];
	mysqli_query($conns,"delete from gambar where id_gambar='".$id_paket."'");
	unlink($fotos.'/uploads/'.$namafoto);
	exit("<script>location.href='".$pengumuman1."';</script>");
}

$conn=mysqli_query($conns,"select count(*) as jml from gambar ");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];

$awalsoals=$pengumuman1;
$nilaiujiansoal=20;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;

$tables='';
$_8e529f7c1789a19f5ed8b2edb0af9fa7='';
$conn="select * from gambar order by id_gambar limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
while($sql=mysqli_fetch_array($conn)){
	$awal++;
	$id_paket=$sql['id_gambar'];
	$_8e529f7c1789a19f5ed8b2edb0af9fa7.='
	<div class="col-lg-3 col-md-4 col-xs-6 thumb text-center" style="margin-bottom:10px;">
		<a class="thumbnail gambar" href="#gambar_modal" data-toggle="modal" data-src="'.$sql['nama'].'">
			<img class="img-responsive" src="'.$look.'uploads/'.$sql['nama'].'" alt="">
		</a>
		<div style="margin-top:-10px;">
		<a href="#" onclick="DeleteConfirm(\''.$regis.'&amp;id='.$id_paket.'&amp;action=delete\');return(false);" class="btn btn-danger btn-sm">Hapus</a>
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
	<center><?php echo $linksoalujian;?></center>
	</div>
</div>
<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

