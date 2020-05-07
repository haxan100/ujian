<?php
include 'config.php';

$hasilgambar='';
if(isset($_GET['name'])){
	$hasilgambar=$_GET['name'];
}
$dirfoto=$fotos.'/uploads/';
if(file_exists($dirfoto.$hasilgambar)){
	$hasillgambar = file_get_contents($dirfoto.$hasilgambar);
	header("Content-type: image/jpeg");
	echo $hasillgambar;
}else{
	die;
}
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

