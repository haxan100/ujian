<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

if(isset($_GET['action'])){
	if($_GET['action']=='addsiswa'){
		$id='';
		$idsiswa='';
		if(isset($_GET['paket'])){
			$id=$_GET['paket'];
		}
		if(isset($_GET['id'])){
			$idsiswa=$_GET['id'];
		}
		if($id!='' and $idsiswa!=''){
			mysqli_query($conns,"insert into peserta(id_paket,id_siswa) values('".$id."','".$idsiswa."')");
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

