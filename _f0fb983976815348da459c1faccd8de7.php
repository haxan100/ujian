<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once 'config.php';
if(!isset($_SESSION['LOGIN_ID'])){
	echo 'off';die;
}

//$conn=mysqli_query($conns,"select * from periode where tanggal_mulai<='".date('Y-m-d H:i:s')."' and tanggal_akhir>='".date('Y-m-d H:i:s')."'");
//$sql=mysqli_fetch_array($conn);
//$_67c4414db31f60967df5c435d2d681ec=$sql['id_periode'];
//$_36fd7f7111215a7056422e47518363d7=$sql['waktu_pengerjaan']*60;
$_b78f9e7c4587e8583ab713f126277f88='';
$_fbd326c813664d903c80679981cafba3='';
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' order by id_ujian desc limit 0,1");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$_fbd326c813664d903c80679981cafba3=$sql['id_ujian'];
	$_b78f9e7c4587e8583ab713f126277f88=$sql['id_paket'];
	$stat=$sql['selesai'];
	$_02202b271eddd150fb9b3a5c12a8639d=$sql['lama_pengerjaan'];
	$conn=mysqli_query($conns,"select * from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
	$sql=mysqli_fetch_array($conn);
	$_36fd7f7111215a7056422e47518363d7=$sql['waktu_pengerjaan']*60;
	
	if($stat=='Y'){
		echo 'off';die;
	}else{
		if($_02202b271eddd150fb9b3a5c12a8639d >= $_36fd7f7111215a7056422e47518363d7){
			mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
			echo 'off';die;
		}
	}
}else{
	echo 'off';die;
}

mysqli_query($conns,"update ujian set lama_pengerjaan=(lama_pengerjaan+1) where id_ujian='".$_fbd326c813664d903c80679981cafba3."' and selesai='N'");

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

