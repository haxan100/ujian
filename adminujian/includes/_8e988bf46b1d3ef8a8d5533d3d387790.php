<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

if(isset($_GET['action'])){
	if($_GET['action']=='addsiswa'){
		$_b78f9e7c4587e8583ab713f126277f88='';
		$_98ed36b746f207577a55ef6bc82776b0='';
		if(isset($_GET['paket'])){
			$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
		}
		if(isset($_GET['id'])){
			$_98ed36b746f207577a55ef6bc82776b0=$_GET['id'];
		}
		if($_b78f9e7c4587e8583ab713f126277f88!='' and $_98ed36b746f207577a55ef6bc82776b0!=''){
			mysqli_query($conns,"insert into peserta(id_paket,id_siswa) values('".$_b78f9e7c4587e8583ab713f126277f88."','".$_98ed36b746f207577a55ef6bc82776b0."')");
		}
		
	}
}

?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

