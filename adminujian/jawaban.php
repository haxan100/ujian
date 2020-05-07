<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
include '../config.php';

$mapel='';
if(isset($_GET['pelajaran'])){
	$mapel=$_GET['pelajaran'];
}

$awal=0;
$awals='';
$conn=mysqli_query($conns,"select * from soal where id_pelajaran='".$mapel."' order by id_soal");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='A'");
	$totAll=mysqli_fetch_array($juml);
	$jawaba=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='B'");
	$totAll=mysqli_fetch_array($juml);
	$jawabb=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='C'");
	$totAll=mysqli_fetch_array($juml);
	$jawabc=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='D'");
	$totAll=mysqli_fetch_array($juml);
	$lists=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='E'");
	$totAll=mysqli_fetch_array($juml);
	$jawabe=trim($totAll['jawaban']);
	
	$awal++;
	$awals.=$awal."|".trim($sql['detail'])."|".$jawaba."|".$jawabb."|".$jawabc."|".$lists."|".$jawabe."|".$sql['kunci']."\n";
}

$soalaray=array('No','Soal','A','B','C','D','E','Kunci');
$jawabanaray=implode('|',$soalaray)."\n";
$awals = str_replace("\r","",$awals);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=data_soal_".date('d-m-Y').".csv");
header("Pragma: no-cache");
header("Expires: 0");
print $jawabanaray.$awals;

?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

