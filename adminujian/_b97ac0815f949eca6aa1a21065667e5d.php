<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../config.php';

$_5bbbff8933f7b8be381684bd463e6d16='';
if(isset($_GET['pelajaran'])){
	$_5bbbff8933f7b8be381684bd463e6d16=$_GET['pelajaran'];
}

$_52f720bdaf922c68904e386cbf0cd227=0;
$_7318a606a3118d468dae7078098fba7b='';
$conn=mysqli_query($conns,"select * from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' order by id_soal");
while($sql=mysqli_fetch_array($conn)){
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='A'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_52d5b5e885b21331cfd2304be571de0b=trim($_84ebecebe3a7c3b32dff74f8dce19fce['jawaban']);
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='B'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_da3e61414e50aee968132f03d265e0cf=trim($_84ebecebe3a7c3b32dff74f8dce19fce['jawaban']);
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='C'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_3e33e017cd76b9b7e6c7364fb91e2e90=trim($_84ebecebe3a7c3b32dff74f8dce19fce['jawaban']);
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='D'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_20fd65e9c7406034fadc682f06732868=trim($_84ebecebe3a7c3b32dff74f8dce19fce['jawaban']);
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='E'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_0d54236da20594ec13fc81b209733931=trim($_84ebecebe3a7c3b32dff74f8dce19fce['jawaban']);
	
	$_52f720bdaf922c68904e386cbf0cd227++;
	$_7318a606a3118d468dae7078098fba7b.=$_52f720bdaf922c68904e386cbf0cd227."|".trim($sql['detail'])."|".$_52d5b5e885b21331cfd2304be571de0b."|".$_da3e61414e50aee968132f03d265e0cf."|".$_3e33e017cd76b9b7e6c7364fb91e2e90."|".$_20fd65e9c7406034fadc682f06732868."|".$_0d54236da20594ec13fc81b209733931."|".$sql['kunci']."\n";
}

$_b0d5d47f3d2e32a124c14253aba3976a=array('No','Soal','A','B','C','D','E','Kunci');
$_972a1d6d7fbaa83b27c6006e2c7cbc3f=implode('|',$_b0d5d47f3d2e32a124c14253aba3976a)."\n";
$_7318a606a3118d468dae7078098fba7b = str_replace("\r","",$_7318a606a3118d468dae7078098fba7b);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=data_soal_".date('d-m-Y').".csv");
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

