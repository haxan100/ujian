<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../config.php';

$_72e838785b161ce1f713d6b1a452e270='';
if(isset($_GET['kelas'])){
	$_72e838785b161ce1f713d6b1a452e270=$_GET['kelas'];
}
$_2f912c6d42fb67b89f6d73741e22a97c='';
if($_72e838785b161ce1f713d6b1a452e270!=''){
	$_2f912c6d42fb67b89f6d73741e22a97c=" and id_kelas='".$_72e838785b161ce1f713d6b1a452e270."' ";
}

$_52f720bdaf922c68904e386cbf0cd227=0;
$_7318a606a3118d468dae7078098fba7b='';
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from siswa where nisn like '%%' ".$_2f912c6d42fb67b89f6d73741e22a97c." order by nisn");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select nama from kelas where id_kelas='".$_60169cd1c47b7a7a85ab44f884635e41['id_kelas']."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_38895153c69c18db0dbba317a1d8d369=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
	
	$_52f720bdaf922c68904e386cbf0cd227++;
	$_7318a606a3118d468dae7078098fba7b.=$_52f720bdaf922c68904e386cbf0cd227."|".$_60169cd1c47b7a7a85ab44f884635e41['nisn']."|".$_60169cd1c47b7a7a85ab44f884635e41['nama']."|".$_60169cd1c47b7a7a85ab44f884635e41['gender']."|".$_38895153c69c18db0dbba317a1d8d369."\n";
}

$_b0d5d47f3d2e32a124c14253aba3976a=array('No','NISN','Nama Siswa','J. Kelamin','Kelas');
$_972a1d6d7fbaa83b27c6006e2c7cbc3f=implode('|',$_b0d5d47f3d2e32a124c14253aba3976a)."\n";
$_7318a606a3118d468dae7078098fba7b = str_replace("\r","",$_7318a606a3118d468dae7078098fba7b);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=data_siswa_".date('d-m-Y').".csv");
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

