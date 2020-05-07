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
$id=$sql['id_paket'];
$waktu=$sql['waktu_pengerjaan']*60;

$simulasi_waktu=$_SESSION['SIMULASI_TIME'];
if($simulasi_waktu >= $waktu){
	echo 'off';die;
}

$_SESSION['SIMULASI_TIME']++;

if(($waktu-$simulasi_waktu)>(5*60)){
	echo '<span class="label label-success">Waktu : '.gmdate("H:i:s", ($waktu-$simulasi_waktu)).'</span>';
}elseif(($waktu-$simulasi_waktu)>60){
	echo '<span class="label label-warning">Waktu : '.gmdate("H:i:s", ($waktu-$simulasi_waktu)).'</span>';
}else{
	echo '<span class="label label-danger">Waktu : '.gmdate("H:i:s", ($waktu-$simulasi_waktu)).'</span>';
}




mysqli_close($conns);

?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

