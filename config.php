<?php
$host = 'localhost'; # hostname
$username = 'root'; # username
$pass = ''; # password
$dbname = 'ujian_sekolah'; # nama database

$look = 'http://localhost/project/ujian/'; # alamat web
$admin = 'http://localhost/project/ujian/adminujian/'; # alamat web admin
$fotos = 'http://localhost/project/ujian/'; # alamat path web

$conns = mysqli_connect($host,$username,$pass) or die('Koneksi ke server database gagal.');
mysqli_select_db($conns,$dbname) or die('Database tidak ditemukan.');

?>

<?php
/*
---------------------------------------------
Modified by Bang Thoyib
Website 				: http://www.sman1gomoker.sch.id
Email    				: ptyminna@gmail.com
Gmail					: masthoyib@gmail.com
Telp/ SMS/ WhatsApp		: 081515641998
---------------------------------------------
*/
?>

