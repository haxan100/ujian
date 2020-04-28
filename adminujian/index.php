<?php
session_name('session_ujian_admin');

session_start();

require_once '../config.php';
define('myweb',true);
$id['id']='';
$id['type']='admin';
require_once 'configAll.php';
if(isset($_SESSION['LOGIN_ID'])){
	$id['id']=$_SESSION['LOGIN_ID'];
	$link= 'datass.php';
}else{
	$link= 'login.php';
}

require_once 'datas.php';
require_once $link;
mysqli_close($conns);
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

