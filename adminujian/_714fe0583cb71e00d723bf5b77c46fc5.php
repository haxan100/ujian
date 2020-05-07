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
$idkelasnya='';
if($idkelas!=''){
	$idkelasnya=" and id_kelas='".$idkelas."' ";
}

$awal=0;
$awals='';
$conn=mysqli_query($conns,"select * from siswa where nisn like '%%' ".$idkelasnya." order by nisn");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select nama from kelas where id_kelas='".$sql['id_kelas']."'");
	$totAll=mysqli_fetch_array($juml);
	$nama=$totAll['nama'];
	
	$awal++;
	$awals.=$awal."|".$sql['nisn']."|".$sql['nama']."|".$sql['gender']."|".$nama."\n";
}

$soalaray=array('No','NISN','Nama Siswa','J. Kelamin','Kelas');
$jawabanaray=implode('|',$soalaray)."\n";
$awals = str_replace("\r","",$awals);
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=data_siswa_".date('d-m-Y').".csv");
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

