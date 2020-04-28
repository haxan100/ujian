<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../config.php';

$idkelas='';
if(isset($_GET['kelas'])){
	$idkelas=$_GET['kelas'];
}
$_2f912c6d42fb67b89f6d73741e22a97c='';
if($idkelas!=''){
	$_2f912c6d42fb67b89f6d73741e22a97c=" and id_kelas='".$idkelas."' ";
}

$awal=0;
$_7318a606a3118d468dae7078098fba7b='';
$conn=mysqli_query($conns,"select * from siswa where nisn like '%%' ".$_2f912c6d42fb67b89f6d73741e22a97c." order by nisn");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select nama from kelas where id_kelas='".$sql['id_kelas']."'");
	$totAll=mysqli_fetch_array($juml);
	$nama=$totAll['nama'];
	
	$awal++;
	$_7318a606a3118d468dae7078098fba7b.=$awal."|".$sql['nisn']."|".$sql['nama']."|".$sql['gender']."|".$nama."\n";
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

