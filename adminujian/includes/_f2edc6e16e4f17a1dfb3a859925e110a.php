<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

include '../../config.php';

$_a586aa86cb709c56ef938116a232ce5a='';
if(isset($_GET['id'])){
	$_a586aa86cb709c56ef938116a232ce5a=$_GET['id'];
}
$_362661de726a1fb08719c20884bcdbed='<option value=""></option>';
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from kelas where id_kompetensi='".$_a586aa86cb709c56ef938116a232ce5a."'");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
	$_362661de726a1fb08719c20884bcdbed.='<option value="'.$_60169cd1c47b7a7a85ab44f884635e41['id_kelas'].'">'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</option>';
}
echo $_362661de726a1fb08719c20884bcdbed;
?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

