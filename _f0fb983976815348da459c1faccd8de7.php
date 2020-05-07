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
//$id_periode=$sql['id_periode'];
//$waktu=$sql['waktu_pengerjaan']*60;
$id='';
$sqli='';
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' order by id_ujian desc limit 0,1");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$sqli=$sql['id_ujian'];
	$id=$sql['id_paket'];
	$stat=$sql['selesai'];
	$simulasi_waktu=$sql['lama_pengerjaan'];
	$conn=mysqli_query($conns,"select * from paket where id_paket='".$id."'");
	$sql=mysqli_fetch_array($conn);
	$waktu=$sql['waktu_pengerjaan']*60;
	
	if($stat=='Y'){
		echo 'off';die;
	}else{
		if($simulasi_waktu >= $waktu){
			mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$sqli."'");
			echo 'off';die;
		}
	}
}else{
	echo 'off';die;
}

mysqli_query($conns,"update ujian set lama_pengerjaan=(lama_pengerjaan+1) where id_ujian='".$sqli."' and selesai='N'");

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

