<?php
$_7fe116ac06b6078d0c6ef403f3bbdc28 = 'localhost'; # hostname
$_43ea23fc53c527d7ec2c5826a584b6d4 = 'root'; # username
$_2bc48b257d5d15a0a235f444fbec995f = ''; # password
$_bddc31963757f5f11835091cbdecb7ee = 'ujian_sekolah'; # nama database

$_e343e503cb9623b59b7d7c30484aa086 = 'http://localhost/project/ujian/'; # alamat web
$_28cd827e9a3b578c3cfbcd7f0fd18d96 = 'http://localhost/project/ujian/adminujian/'; # alamat web admin
$_714ca9eb87223ad2d6815f90173fde78 = 'http://localhost/project/ujian/'; # alamat path web

$conns = mysqli_connect($_7fe116ac06b6078d0c6ef403f3bbdc28,$_43ea23fc53c527d7ec2c5826a584b6d4,$_2bc48b257d5d15a0a235f444fbec995f) or die('Koneksi ke server database gagal.');
mysqli_select_db($conns,$_bddc31963757f5f11835091cbdecb7ee) or die('Database tidak ditemukan.');

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

