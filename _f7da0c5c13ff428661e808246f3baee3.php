<?php
include 'config.php';

$_9b395079675c6a66ff23ea9c6c4a668e='';
if(isset($_GET['name'])){
	$_9b395079675c6a66ff23ea9c6c4a668e=$_GET['name'];
}
$_f14eae8ed82a71cfb8a8b59794c3243a=$_714ca9eb87223ad2d6815f90173fde78.'/uploads/';
if(file_exists($_f14eae8ed82a71cfb8a8b59794c3243a.$_9b395079675c6a66ff23ea9c6c4a668e)){
	$_cd58a3753627d60139ac812d891dd692 = file_get_contents($_f14eae8ed82a71cfb8a8b59794c3243a.$_9b395079675c6a66ff23ea9c6c4a668e);
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

