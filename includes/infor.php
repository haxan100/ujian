<?php if(!defined('myweb')){ exit(); }?>
<?php
$conn=mysqli_query($conns,"select * from konten where kode='informasi'");
$sql=mysqli_fetch_array($conn);
$detail=$sql['detail'];

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">Informasi</h1>
	</div>
</div>
<div class="row">
<div class="col-lg-12">
<?php echo $detail;?>
</div>
</div>






<?php
/*
---------------------------------------------
haxan100
*/
?>

