<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once 'config.php';
require_once '_2ab8c493286e1c628d27d9b3b040cd3d.php';
define('myweb',true);
if(isset($_SESSION['LOGIN_ID'])){
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and selesai='N'");
	if(mysqli_num_rows($_eb6af5b4e510c3c874d7d1f51d72393a)>0){
		exit("<script>location.href='ujian.php';</script>");
	}
	
}
require_once '_f0b08a817cc558048a5f4f571365edaa.php';
require_once '_13e5580ca26ea5de947e855a28fb0774.php';

mysqli_close($_000b935637cea64cc7810fb0077f5ff1);

?>

<?php
/*
---------------------------------------------
Modified by Bang Thoyib
Website 				: http://www.sman1gomoker.sch.id
Email    				: ptyminna@gmail.com
Gmail					: masthoyib@gmail.com
Telp/ SMS/ WhatsApp		: 081515641998

*/
?>

