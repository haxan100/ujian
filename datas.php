<?php if(!defined('myweb')){ exit(); }?>
<?php
$cek='';
if(isset($_GET['hal'])){
	$cek=$_GET['hal'];
}
$result=$cek;
$pagge=true;
switch($cek){
	case 'informasi':$cek="include 'includes/infor.php';";$pagge=false;break;
	case 'registrasi':$cek="include 'includes/regis.php';";$pagge=false;break;
	case 'pengumuman':$cek="include 'includes/hasil.php';";$pagge=false;break;
	case 'statistik':$cek="include 'includes/statis.php';";$pagge=false;break;
	case 'paket_ujian':$cek="include 'includes/paket.php';";break;
	case 'ujian':$cek="include 'includes/ujian.php';";break;
	case 'profil':$cek="include 'includes/profil.php';";break;
	case 'ubah_password':$cek="include 'includes/ubahpw.php';";break;
		
	default:
		if(isset($_SESSION['LOGIN_ID'])){
			$cek="include 'includes/halm2.php';";break;
		}else{
			$cek="include 'includes/halm3.php';";$pagge=false;break;
		}
		//$cek="include 'includes/halm3.php';";break;
		break;
}


$look=$cek;
if($pagge==true and !isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$halm."';</script>");
}

?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

