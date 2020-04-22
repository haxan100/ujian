<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

if(isset($_GET['action'])){
	if($_GET['action']=='addsoal'){
		$_b78f9e7c4587e8583ab713f126277f88='';
		$_5cf085bf5081a50e78311063db83f771='';
		if(isset($_GET['paket'])){
			$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
		}
		if(isset($_GET['id'])){
			$_5cf085bf5081a50e78311063db83f771=$_GET['id'];
		}
		if($_b78f9e7c4587e8583ab713f126277f88!='' and $_5cf085bf5081a50e78311063db83f771!=''){
			mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"insert into soal_paket(id_paket,id_soal) values('".$_b78f9e7c4587e8583ab713f126277f88."','".$_5cf085bf5081a50e78311063db83f771."')");
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

