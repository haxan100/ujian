<?php if(!defined('myweb')){ exit(); }?>
<?php
$conn=mysqli_query($conns,"select * from konten where kode='informasi'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn);
$_21eff29b583aa9be1b965eb96e6c56ed=$_60169cd1c47b7a7a85ab44f884635e41['detail'];

?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="margin-top:0">Informasi</h1>
	</div>
</div>
<div class="row">
<div class="col-lg-12">
<?php echo $_21eff29b583aa9be1b965eb96e6c56ed;?>
</div>
</div>






<?php
/*
---------------------------------------------
haxan100
*/
?>

