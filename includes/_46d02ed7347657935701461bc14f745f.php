<?php if(!defined('myweb')){ exit(); }?>
<?php
$_8f128c86231aedb3ad839316104082b1='N';
if(isset($_SESSION['LOGIN_ID'])){
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select selesai from ujian where id_siswa='".$_SESSION['LOGIN_ID']."'");
	if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a)>0){
		$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
		$_8f128c86231aedb3ad839316104082b1=$_60169cd1c47b7a7a85ab44f884635e41['selesai'];
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

