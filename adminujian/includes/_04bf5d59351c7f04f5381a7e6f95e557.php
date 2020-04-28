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
		$_5cf085bf5081a50e78311063db83f771='';
		if(isset($_GET['paket'])){
			$id=$_GET['paket'];
		}
		if(isset($_GET['id'])){
			$_5cf085bf5081a50e78311063db83f771=$_GET['id'];
		}
		if($id!='' and $_5cf085bf5081a50e78311063db83f771!=''){
			mysqli_query($conns,"insert into soal_paket(id_paket,id_soal) values('".$id."','".$_5cf085bf5081a50e78311063db83f771."')");
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

