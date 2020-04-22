<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");
require_once 'config.php';

if(isset($_POST["login"])){
	if(empty($_POST['username']) or empty($_POST['password'])){
		exit("<script>window.alert('Lengkapi username dan password.');window.history.back();</script>");
	}
	$_2d76471e6f56a63e6f0105dd92db4254=$_POST['username'];
	$_243e61e9410a9f577d2d662c67025ee9=md5($_POST['password']);
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"SELECT * FROM siswa WHERE nisn='".mysqli_real_escape_string($_000b935637cea64cc7810fb0077f5ff1,$_2d76471e6f56a63e6f0105dd92db4254)."' AND password='".$_243e61e9410a9f577d2d662c67025ee9."'");
	if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a)>0){
		$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
		$_98ed36b746f207577a55ef6bc82776b0=$_60169cd1c47b7a7a85ab44f884635e41['id_siswa'];
		$_65dfacb39960c22313740a131148fb81='siswa';
	}else{
		exit("<script>window.alert('Username dan password yang anda masukkan salah');window.history.back();</script>");
	}
	
	$_SESSION['LOGIN_ID']=$_98ed36b746f207577a55ef6bc82776b0;
	$_SESSION['LOGIN_TYPE']=$_65dfacb39960c22313740a131148fb81;
	exit("<script>window.location='".$_e343e503cb9623b59b7d7c30484aa086."';</script>");
}
exit("<script>window.location='".$_e343e503cb9623b59b7d7c30484aa086."';</script>");
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

