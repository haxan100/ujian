<?php if(!defined('myweb')){ exit(); }?>
<?php
$cek='';
if(isset($_GET['hal'])){
	$cek=$_GET['hal'];
}
$result=$cek;
$adms=true;
$adminss[]='admin';
switch($cek){
	case 'kelas':$cek="include 'includes/kelas.php';";break;
	case 'update_kelas':$cek="include 'includes/update_kelas.php';";break;
	case 'pelajaran':$cek="include 'includes/pelajaran.php';";break;
	case 'update_pelajaran':$cek="include 'includes/update_pelajaran.php';";break;
	case 'soal':$cek="include 'includes/soal.php';";break;
	case 'update_soal':$cek="include 'includes/update_soal.php';";break;
	case 'import_soal':$cek="include 'includes/import_soal.php';";break;
	case 'paket':$cek="include 'includes/paket.php';";break;
	case 'update_paket':$cek="include 'includes/update_paket.php';";break;
	case 'siswa':$cek="include 'includes/siswa.php';";break;
	case 'update_siswa':$cek="include 'includes/update_siswa.php';";break;
	case 'import_siswa':$cek="include 'includes/import_siswa.php';";break;
	case 'hasil_ujian':$cek="include 'includes/hasil_ujian.php';";break;
	case 'home':$cek="include 'includes/home.php';";break;
	case 'informasi':$cek="include 'includes/informasi.php';";break;
	case 'gambar':$cek="include 'includes/gambar.php';";break;
	case 'soal_ujian':$cek="include 'includes/soal_ujian.php';";break;
	case 'update_soal_tes':$cek="include 'includes/p_soal_tes_update.php';";break;
	case 'simulasi':$cek="include 'includes/simulasi.php';";break;
	case 'statistik':$cek="include 'includes/statis.php';";break;
	case 'peserta':$cek="include 'includes/peserta.php';";break;
	
	case 'ubah_password':$cek="include 'includes/ubahpw.php';";break;
		
	default:
		$cek= "include 'includes/hlm3.php';";
		// $cek="include 'includes/paket.php';";

		$adms=false;$adminss=array();
		break;
}
$slook=$cek;

if($adms==true and !isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$look."';</script>");
}
if(count($adminss)>0 and !in_array($id['type'],$adminss)){
	exit("<script>location.href='".$look."';</script>");
}
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

