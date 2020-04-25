<?php if(!defined('myweb')){ exit(); }?>
<?php
$cek='';
if(isset($_GET['hal'])){
	$cek=$_GET['hal'];
}
$result=$cek;
$_cc22937b56838835a601f50e2182877b=true;
$_48a1844952b5c9fadf189204a5103503[]='admin';
switch($cek){
	case 'kelas':$cek="include 'includes/_58f3f993ae9bd6efcf77ebec16120d51.php';";break;
	case 'update_kelas':$cek="include 'includes/_5e7a73b2aa327972567e757e366a51e7.php';";break;
	case 'pelajaran':$cek="include 'includes/_22405af04d8c1a67bde9a97868effb1d.php';";break;
	case 'update_pelajaran':$cek="include 'includes/_6f1d7fb73494550026b7ef49987cf645.php';";break;
	case 'soal':$cek="include 'includes/_8e25fa621639a6485557be5efa3c28fe.php';";break;
	case 'update_soal':$cek="include 'includes/_70c4d57c8539d7be26037b87cf96a156.php';";break;
	case 'import_soal':$cek="include 'includes/_df5595bf949240a3a3a7aa7e25a30c5f.php';";break;
	case 'paket':$cek="include 'includes/_f749c95c34082c3f121fdbc702ba16c3.php';";break;
	case 'update_paket':$cek="include 'includes/_9df7a8180d90b64cec206acd61853e0c.php';";break;
	case 'siswa':$cek="include 'includes/_cf8bc7afc7e2ab37c9035c13eab1de05.php';";break;
	case 'update_siswa':$cek="include 'includes/_3b32d1985a028958b3022d6686f508fa.php';";break;
	case 'import_siswa':$cek="include 'includes/_61e83b5fc2a9a015f24be6ec971de6f1.php';";break;
	case 'hasil_ujian':$cek="include 'includes/_e385cac1eeba8ce168c883dc007fadcc.php';";break;
	case 'home':$cek="include 'includes/_4cbf4723fae8678434e6e7989edbcce4.php';";break;
	case 'informasi':$cek="include 'includes/_cb950c7ca5062298b23b900172d08b10.php';";break;
	case 'gambar':$cek="include 'includes/_fe63579a5fa6c178ed6caa0a4f93ec3f.php';";break;
	case 'soal_ujian':$cek="include 'includes/_8895054205baab8c2ac135599eb11207.php';";break;
	case 'update_soal_tes':$cek="include 'includes/p_soal_tes_update.php';";break;
	case 'simulasi':$cek="include 'includes/p__ca2af8a29582009a8583f110b425c5e6.php';";break;
	case 'statistik':$cek="include 'includes/statis.php';";break;
	case 'peserta':$cek="include 'includes/_18ffeaa6651517cd8e3ef75de59bc1db.php';";break;
	
	case 'ubah_password':$cek="include 'includes/ubahpw.php';";break;
		
	default:
		$cek="include 'includes/halm3.php';";
		$_cc22937b56838835a601f50e2182877b=false;$_48a1844952b5c9fadf189204a5103503=array();
		break;
}
$look=$cek;

if($_cc22937b56838835a601f50e2182877b==true and !isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$look."';</script>");
}
if(count($_48a1844952b5c9fadf189204a5103503)>0 and !in_array($_2d2649677c494e9597d976bbb9df65e0['type'],$_48a1844952b5c9fadf189204a5103503)){
	exit("<script>location.href='".$look."';</script>");
}
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

