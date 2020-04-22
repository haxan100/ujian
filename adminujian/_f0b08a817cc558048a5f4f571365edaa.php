<?php if(!defined('myweb')){ exit(); }?>
<?php
$_71a6fd054f6ebc38e69167ab39449848='';
if(isset($_GET['hal'])){
	$_71a6fd054f6ebc38e69167ab39449848=$_GET['hal'];
}
$result=$_71a6fd054f6ebc38e69167ab39449848;
$_cc22937b56838835a601f50e2182877b=true;
$_48a1844952b5c9fadf189204a5103503[]='admin';
switch($_71a6fd054f6ebc38e69167ab39449848){
	case 'kelas':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_58f3f993ae9bd6efcf77ebec16120d51.php';";break;
	case 'update_kelas':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_5e7a73b2aa327972567e757e366a51e7.php';";break;
	case 'pelajaran':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_22405af04d8c1a67bde9a97868effb1d.php';";break;
	case 'update_pelajaran':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_6f1d7fb73494550026b7ef49987cf645.php';";break;
	case 'soal':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_8e25fa621639a6485557be5efa3c28fe.php';";break;
	case 'update_soal':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_70c4d57c8539d7be26037b87cf96a156.php';";break;
	case 'import_soal':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_df5595bf949240a3a3a7aa7e25a30c5f.php';";break;
	case 'paket':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_f749c95c34082c3f121fdbc702ba16c3.php';";break;
	case 'update_paket':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_9df7a8180d90b64cec206acd61853e0c.php';";break;
	case 'siswa':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_cf8bc7afc7e2ab37c9035c13eab1de05.php';";break;
	case 'update_siswa':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_3b32d1985a028958b3022d6686f508fa.php';";break;
	case 'import_siswa':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_61e83b5fc2a9a015f24be6ec971de6f1.php';";break;
	case 'hasil_ujian':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_e385cac1eeba8ce168c883dc007fadcc.php';";break;
	case 'home':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_4cbf4723fae8678434e6e7989edbcce4.php';";break;
	case 'informasi':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_cb950c7ca5062298b23b900172d08b10.php';";break;
	case 'gambar':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_fe63579a5fa6c178ed6caa0a4f93ec3f.php';";break;
	case 'soal_ujian':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_8895054205baab8c2ac135599eb11207.php';";break;
	case 'update_soal_tes':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/p_soal_tes_update.php';";break;
	case 'simulasi':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/p__ca2af8a29582009a8583f110b425c5e6.php';";break;
	case 'statistik':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_7a315a9c99bb28c89df77b51eafd6e2b.php';";break;
	case 'peserta':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_18ffeaa6651517cd8e3ef75de59bc1db.php';";break;
	
	case 'ubah_password':$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_35db5201c2ff815c0e8052497bcfa145.php';";break;
		
	default:
		$_71a6fd054f6ebc38e69167ab39449848="include 'includes/_a3a92438e2ebdf71c619fa0b32ca93ea.php';";
		$_cc22937b56838835a601f50e2182877b=false;$_48a1844952b5c9fadf189204a5103503=array();
		break;
}
$_e82ee9b121f709895ef54eba7fa6b78b=$_71a6fd054f6ebc38e69167ab39449848;

if($_cc22937b56838835a601f50e2182877b==true and !isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$_e343e503cb9623b59b7d7c30484aa086."';</script>");
}
if(count($_48a1844952b5c9fadf189204a5103503)>0 and !in_array($_2d2649677c494e9597d976bbb9df65e0['type'],$_48a1844952b5c9fadf189204a5103503)){
	exit("<script>location.href='".$_e343e503cb9623b59b7d7c30484aa086."';</script>");
}
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

