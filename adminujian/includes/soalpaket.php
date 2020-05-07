<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../../config.php';

if(isset($_GET['action'])){
	if($_GET['action']=='addsoal'){
		$id='';
		$mysqlcon='';
		if(isset($_GET['paket'])){
			$id=$_GET['paket'];
		}
		if(isset($_GET['id'])){
			$mysqlcon=$_GET['id'];
		}
		if($id!='' and $mysqlcon!=''){
			mysqli_query($conns,"insert into soal_paket(id_paket,id_soal) values('".$id."','".$mysqlcon."')");
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

