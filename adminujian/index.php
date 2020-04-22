<?php
session_name('session_ujian_admin');

session_start();

require_once '../config.php';
define('myweb',true);
$_2d2649677c494e9597d976bbb9df65e0['id']='';
$_2d2649677c494e9597d976bbb9df65e0['type']='admin';
require_once '_2ab8c493286e1c628d27d9b3b040cd3d.php';
if(isset($_SESSION['LOGIN_ID'])){
	$_2d2649677c494e9597d976bbb9df65e0['id']=$_SESSION['LOGIN_ID'];
	$_4180b2d55d2131557a27fb8f2d858a4f= '_13e5580ca26ea5de947e855a28fb0774.php';
}else{
	$_4180b2d55d2131557a27fb8f2d858a4f= '_3931ed6928ae7e8590d655f32f4eb488.php';
}

require_once '_f0b08a817cc558048a5f4f571365edaa.php';
require_once $_4180b2d55d2131557a27fb8f2d858a4f;
mysqli_close($_000b935637cea64cc7810fb0077f5ff1);
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

