<?php if (!defined('myweb')) {
	exit();
} ?>
<?php
// $data=mysqli_query($conns, "select * from konten where kode='home'");
$data = mysqli_query($conns, "select * from konten where kode='home'");
$sql = mysqli_fetch_array($data);
$result = $sql['detail'];

?>
<div class="row">
	<div class="col-lg-12">
		<center>
			<h1 class="page-header" style="margin-top:0">Selamat datang</h1>
		</center>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php echo $result; ?>
	</div>
</div>