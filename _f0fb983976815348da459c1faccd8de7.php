<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once 'config.php';
if(!isset($_SESSION['LOGIN_ID'])){
	echo 'off';die;
}

//$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from periode where tanggal_mulai<='".date('Y-m-d H:i:s')."' and tanggal_akhir>='".date('Y-m-d H:i:s')."'");
//$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
//$_67c4414db31f60967df5c435d2d681ec=$_60169cd1c47b7a7a85ab44f884635e41['id_periode'];
//$_36fd7f7111215a7056422e47518363d7=$_60169cd1c47b7a7a85ab44f884635e41['waktu_pengerjaan']*60;
$_b78f9e7c4587e8583ab713f126277f88='';
$_fbd326c813664d903c80679981cafba3='';
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' order by id_ujian desc limit 0,1");
if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a)>0){
	$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
	$_fbd326c813664d903c80679981cafba3=$_60169cd1c47b7a7a85ab44f884635e41['id_ujian'];
	$_b78f9e7c4587e8583ab713f126277f88=$_60169cd1c47b7a7a85ab44f884635e41['id_paket'];
	$_8f128c86231aedb3ad839316104082b1=$_60169cd1c47b7a7a85ab44f884635e41['selesai'];
	$_02202b271eddd150fb9b3a5c12a8639d=$_60169cd1c47b7a7a85ab44f884635e41['lama_pengerjaan'];
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
	$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
	$_36fd7f7111215a7056422e47518363d7=$_60169cd1c47b7a7a85ab44f884635e41['waktu_pengerjaan']*60;
	
	if($_8f128c86231aedb3ad839316104082b1=='Y'){
		echo 'off';die;
	}else{
		if($_02202b271eddd150fb9b3a5c12a8639d >= $_36fd7f7111215a7056422e47518363d7){
			mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"update ujian set selesai='Y' where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
			echo 'off';die;
		}
	}
}else{
	echo 'off';die;
}

mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"update ujian set lama_pengerjaan=(lama_pengerjaan+1) where id_ujian='".$_fbd326c813664d903c80679981cafba3."' and selesai='N'");

if(($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)>(5*60)){
	echo '<span class="label label-success">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}elseif(($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)>60){
	echo '<span class="label label-warning">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}else{
	echo '<span class="label label-danger">Waktu : '.gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d)).'</span>';
}




mysqli_close($_000b935637cea64cc7810fb0077f5ff1);

?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

