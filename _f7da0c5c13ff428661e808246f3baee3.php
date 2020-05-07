<?php
include 'config.php';

$hasilgambar='';
if(isset($_GET['name'])){
	$hasilgambar=$_GET['name'];
}
$_f14eae8ed82a71cfb8a8b59794c3243a=$fotos.'/uploads/';
if(file_exists($_f14eae8ed82a71cfb8a8b59794c3243a.$hasilgambar)){
	$_cd58a3753627d60139ac812d891dd692 = file_get_contents($_f14eae8ed82a71cfb8a8b59794c3243a.$hasilgambar);
	header("Content-type: image/jpeg");
	echo $_cd58a3753627d60139ac812d891dd692;
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

