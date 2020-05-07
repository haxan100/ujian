<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

include '../../config.php';

$gambarsemua='';
if(isset($_GET['id'])){
	$gambarsemua=$_GET['id'];
}
$optikompetensi='<option value=""></option>';
$conn=mysqli_query($conns,"select * from kelas where id_kompetensi='".$gambarsemua."'");
while($sql=mysqli_fetch_array($conn)){
	$optikompetensi.='<option value="'.$sql['id_kelas'].'">'.$sql['nama'].'</option>';
}
echo $optikompetensi;
?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

