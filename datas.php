<?php if(!defined('myweb')){ exit(); }?>
<?php
$_71a6fd054f6ebc38e69167ab39449848='';
if(isset($_GET['hal'])){
	$_71a6fd054f6ebc38e69167ab39449848=$_GET['hal'];
}
$result=$_71a6fd054f6ebc38e69167ab39449848;
$_cc22937b56838835a601f50e2182877b=true;
switch($_71a6fd054f6ebc38e69167ab39449848){
	case 'informasi':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_86d0af852bb8ab954524899e45bca548.php';";$_cc22937b56838835a601f50e2182877b=false;break;
	case 'registrasi':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_9b279417ab2b3921ffa240fb6bfe585d.php';";$_cc22937b56838835a601f50e2182877b=false;break;
	case 'pengumuman':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/hasil.php';";$_cc22937b56838835a601f50e2182877b=false;break;
	case 'statistik':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_7a315a9c99bb28c89df77b51eafd6e2b.php';";$_cc22937b56838835a601f50e2182877b=false;break;
	case 'paket_ujian':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_d8ad5a29f41141f2cd623314e86fdb6e.php';";break;
	case 'ujian':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_ddcbb70589decacb7c6ad5caac3a0306.php';";break;
	case 'profil':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_db84fb03d53db3f2a06d651a7c9c1d86.php';";break;
	case 'ubah_password':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_35db5201c2ff815c0e8052497bcfa145.php';";break;
		
	default:
		if(isset($_SESSION['LOGIN_ID'])){
			$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_46d02ed7347657935701461bc14f745f.php';";break;
		}else{
			$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_a3a92438e2ebdf71c619fa0b32ca93ea.php';";$_cc22937b56838835a601f50e2182877b=false;break;
		}
		//$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_a3a92438e2ebdf71c619fa0b32ca93ea.php';";break;
		break;
}


$_e82ee9b121f709895ef54eba7fa6b78b=$_71a6fd054f6ebc38e69167ab39449848;
if($_cc22937b56838835a601f50e2182877b==true and !isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$_e343e503cb9623b59b7d7c30484aa086."';</script>");
}

?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

