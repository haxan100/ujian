<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");
require_once 'config.php';

if(isset($_POST["login"])){
	if(empty($_POST['username']) or empty($_POST['password'])){
		exit("<script>window.alert('Lengkapi username dan password.');window.history.back();</script>");
	}
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$datas=mysqli_query($data,"SELECT * FROM siswa WHERE nisn='".mysqli_real_escape_string($data,$username)."' AND password='".$password."'");
	if(mysqli_num_rows($datas)>0){
		$sql=mysqli_fetch_array($datas);
		$idsiswa=$sql['id_siswa'];
		$siswa='siswa';
	}else{
		exit("<script>window.alert('Username dan password yang anda masukkan salah');window.history.back();</script>");
	}
	
	$_SESSION['LOGIN_ID']=$idsiswa;
	$_SESSION['LOGIN_TYPE']=$siswa;
	exit("<script>window.location='".$siswa."';</script>");
}
exit("<script>window.location='".$siswa."';</script>");
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

