<?php
session_name('session_ujian_admin');
session_start(); 
include '../config.php'; 

if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['paket'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
}

$_52f720bdaf922c68904e386cbf0cd227=0;
$_7318a606a3118d468dae7078098fba7b='';
$conn=mysqli_query($conns,"select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' order by nisn");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select nama from kelas where id_kelas='".$_60169cd1c47b7a7a85ab44f884635e41['id_kelas']."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_38895153c69c18db0dbba317a1d8d369=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select nilai from ujian where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and id_siswa='".$_60169cd1c47b7a7a85ab44f884635e41['id_siswa']."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_c04df7e5dc078931b278b5a69b691465=$_84ebecebe3a7c3b32dff74f8dce19fce['nilai'];
	
	$_52f720bdaf922c68904e386cbf0cd227++;
	$_7318a606a3118d468dae7078098fba7b.=$_52f720bdaf922c68904e386cbf0cd227."|".$_60169cd1c47b7a7a85ab44f884635e41['nisn']."|".$_60169cd1c47b7a7a85ab44f884635e41['nama']."|".$_60169cd1c47b7a7a85ab44f884635e41['gender']."|".$_38895153c69c18db0dbba317a1d8d369."|".$_c04df7e5dc078931b278b5a69b691465."\n";
}

$_b0d5d47f3d2e32a124c14253aba3976a=array('No','NISN','Nama Siswa','J. Kelamin','Kelas','Nilai');
$_972a1d6d7fbaa83b27c6006e2c7cbc3f=implode('|',$_b0d5d47f3d2e32a124c14253aba3976a)."\n";
$_7318a606a3118d468dae7078098fba7b = str_replace("\r","",$_7318a606a3118d468dae7078098fba7b);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=hasil_ujian_".date('d-m-Y').".csv");
header("Pragma: no-cache");
header("Expires: 0");
print $_972a1d6d7fbaa83b27c6006e2c7cbc3f.$_7318a606a3118d468dae7078098fba7b;

?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

