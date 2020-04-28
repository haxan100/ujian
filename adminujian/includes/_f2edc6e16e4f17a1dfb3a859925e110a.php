<?php
session_name('session_ujian_admin');
session_start();
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

include '../../config.php';

$_a586aa86cb709c56ef938116a232ce5a='';
if(isset($_GET['id'])){
	$_a586aa86cb709c56ef938116a232ce5a=$_GET['id'];
}
$_362661de726a1fb08719c20884bcdbed='<option value=""></option>';
$conn=mysqli_query($conns,"select * from kelas where id_kompetensi='".$_a586aa86cb709c56ef938116a232ce5a."'");
while($sql=mysqli_fetch_array($conn)){
	$_362661de726a1fb08719c20884bcdbed.='<option value="'.$sql['id_kelas'].'">'.$sql['nama'].'</option>';
}
echo $_362661de726a1fb08719c20884bcdbed;
?>



<?php
/*
---------------------------------------------
haxan100
*/
?>

