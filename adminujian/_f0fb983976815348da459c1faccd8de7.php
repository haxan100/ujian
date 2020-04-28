<?php
session_name('session_ujian_admin');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once '../config.php';
if(!isset($_SESSION['SIMULASI_ID'])){
	echo 'off';die;
}
$conn=mysqli_query($conns,"select * from paket where id_paket='".$_SESSION['SIMULASI_ID']."'");
$sql=mysqli_fetch_array($conn);
$_b78f9e7c4587e8583ab713f126277f88=$sql['id_paket'];
$_36fd7f7111215a7056422e47518363d7=$sql['waktu_pengerjaan']*60;

$_02202b271eddd150fb9b3a5c12a8639d=$_SESSION['SIMULASI_TIME'];
if($_02202b271eddd150fb9b3a5c12a8639d >= $_36fd7f7111215a7056422e47518363d7){
	echo 'off';die;
}

$_SESSION['SIMULASI_TIME']++;

if(($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)>(5*60)){
	echo '<span class="label label-success">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}elseif(($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)>60){
	echo '<span class="label label-warning">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}else{
	echo '<span class="label label-danger">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}




mysqli_close($conns);

?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

