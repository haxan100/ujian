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

$awal=0;
$_7318a606a3118d468dae7078098fba7b='';
$conn=mysqli_query($conns,"select * from soal where id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' order by id_soal");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='A'");
	$totAll=mysqli_fetch_array($juml);
	$_52d5b5e885b21331cfd2304be571de0b=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='B'");
	$totAll=mysqli_fetch_array($juml);
	$_da3e61414e50aee968132f03d265e0cf=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='C'");
	$totAll=mysqli_fetch_array($juml);
	$_3e33e017cd76b9b7e6c7364fb91e2e90=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='D'");
	$totAll=mysqli_fetch_array($juml);
	$lists=trim($totAll['jawaban']);
	$juml=mysqli_query($conns,"select jawaban from soal_jawaban where id_soal='".$sql['id_soal']."' and kode='E'");
	$totAll=mysqli_fetch_array($juml);
	$_0d54236da20594ec13fc81b209733931=trim($totAll['jawaban']);
	
	$awal++;
	$_7318a606a3118d468dae7078098fba7b.=$awal."|".trim($sql['detail'])."|".$_52d5b5e885b21331cfd2304be571de0b."|".$_da3e61414e50aee968132f03d265e0cf."|".$_3e33e017cd76b9b7e6c7364fb91e2e90."|".$lists."|".$_0d54236da20594ec13fc81b209733931."|".$sql['kunci']."\n";
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

