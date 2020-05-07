<?php
session_name('session_ujian_admin');
session_start(); 
include '../config.php'; 

if(!isset($_SESSION['LOGIN_ID'])){
	die;
}
$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}

$awal=0;
$awals='';
$conn=mysqli_query($conns,"select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' order by nisn");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select nama from kelas where id_kelas='".$sql['id_kelas']."'");
	$totAll=mysqli_fetch_array($juml);
	$nama=$totAll['nama'];
	$juml=mysqli_query($conns,"select nilai from ujian where id_paket='".$id."' and id_siswa='".$sql['id_siswa']."'");
	$totAll=mysqli_fetch_array($juml);
	$nilai=$totAll['nilai'];
	
	$awal++;
	$awals.=$awal."|".$sql['nisn']."|".$sql['nama']."|".$sql['gender']."|".$nama."|".$nilai."\n";
}

$soalaray=array('No','NISN','Nama Siswa','J. Kelamin','Kelas','Nilai');
$jawabanaray=implode('|',$soalaray)."\n";
$awals = str_replace("\r","",$awals);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=hasil_ujian_".date('d-m-Y').".csv");
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

