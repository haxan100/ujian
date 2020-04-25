<?php
session_name('session_ujian');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once 'config.php';
require_once 'configAll.php';
define('myweb',true);
if(isset($_SESSION['LOGIN_ID'])){
	$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and selesai='N'");
	if(mysqli_num_rows($conn)>0){
		exit("<script>location.href='ujian.php';</script>");
	}
	
}
require_once 'datas.php';
require_once 'datass.php';

mysqli_close($conns);

?>

<?php
/*


*/
?>

