<?php if(!defined('myweb')){ exit(); }?>
<?php
$stat='N';
if(isset($_SESSION['LOGIN_ID'])){
	$conn=mysqli_query($conns,"select selesai from ujian where id_siswa='".$_SESSION['LOGIN_ID']."'");
	if(mysqli_num_rows($conn)>0){
		$sql=mysqli_fetch_array($conn);
		$stat=$sql['selesai'];
	}
}

?>
<div class="page-header" style="margin-top:0">
  <h1 style="margin-top:0">Dashboard </h1>
</div>
<a href="?hal=paket_ujian">
<div class="tile bg-blue">
	<div class="tile-body">
		<i class="fa fa-list-alt fa-fw"></i>
	</div>
	<div class="tile-object">
		<div class="name">
			Paket Ujian
		</div>
	</div>
</div>
</a>
<a href="?hal=profil">
<div class="tile bg-red">
	<div class="tile-body">
		<i class="fa fa-user fa-fw"></i>
	</div>
	<div class="tile-object">
		<div class="name">
			Profil Siswa
		</div>
	</div>
</div>
</a>
<a href="?hal=ubah_password">
<div class="tile bg-yellow">
	<div class="tile-body">
		<i class="fa fa-key fa-fw"></i>
	</div>
	<div class="tile-object">
		<div class="name">
			Ubah Password
		</div>
	</div>
</div>
</a>








<?php
/*
---------------------------------------------
haxan100
*/
?>

