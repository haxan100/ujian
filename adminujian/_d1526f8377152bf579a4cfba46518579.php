<?php

session_name('session_ujian_admin');
session_start(); 
include '../config.php'; 

if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['paket'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
}
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select nama from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_4cbd557d34801deff9f3656970cd5398=$_60169cd1c47b7a7a85ab44f884635e41['nama'];

$_52f720bdaf922c68904e386cbf0cd227=0;
$_d4cb19f81c23886f544f26709bd4f799='';
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' order by nisn");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select nama from kelas where id_kelas='".$_60169cd1c47b7a7a85ab44f884635e41['id_kelas']."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_38895153c69c18db0dbba317a1d8d369=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select nilai from ujian where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and id_siswa='".$_60169cd1c47b7a7a85ab44f884635e41['id_siswa']."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_c04df7e5dc078931b278b5a69b691465=$_84ebecebe3a7c3b32dff74f8dce19fce['nilai'];
	
	$_52f720bdaf922c68904e386cbf0cd227++;
	
	$_d4cb19f81c23886f544f26709bd4f799.='
	<tr>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$_60169cd1c47b7a7a85ab44f884635e41['nisn'].'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</td>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$_60169cd1c47b7a7a85ab44f884635e41['gender'].'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$_38895153c69c18db0dbba317a1d8d369.'</td>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$_c04df7e5dc078931b278b5a69b691465.'</td>
	</tr>
	';
}

?>

<html>
<head>
<link href="css/style-print.css" rel="stylesheet" type="text/css" />
<link href="css/non-responsiveXXX.css" rel="stylesheet">

<title></title>

<style id="jsbin-css">

body{font-size:12px}
.table tr td{font-size:12px;}

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

/*body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }*/

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,p,ul,ol,form,table,address {
  margin-top: 0;
  margin-bottom: 20px;
  margin-bottom: 2rem;
}
.container{
  max-width: none !important;
  width: 970px;
  margin:auto;width:700px;padding:20px;
  background-color:#fff;
}
.row {
  clear:both;
  font-size:12px
}
.table{margin-bottom:0}
/*@media print {

.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
  float: left;
}
.col-sm-12 {
  width: 100%;
}
.col-sm-11 {
  width: 91.66666666666666%;
}
.col-sm-10 {
  width: 83.33333333333334%;
}
.col-sm-9 {
  width: 75%;
}
.col-sm-8 {
  width: 66.66666666666666%;
}
.col-sm-7 {
  width: 58.333333333333336%;
}
.col-sm-6 {
  width: 50%;
}
.col-sm-5 {
  width: 41.66666666666667%;
}
.col-sm-4 {
  width: 33.33333333333333%;
}
.col-sm-3 {
  width: 25%;
}
.col-sm-2 {
  width: 16.666666666666664%;
}
.col-sm-1 {
  width: 8.333333333333332%;
}

}*/
</style>
</head>
<body>	  
  
<div class="container" style="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<thead>
	<tr>
    <th scope="col" style="vertical-align:top">
		<div class="row" style="border-bottom:2px solid;height:120px;">
			<img src="images/kop.jpg" width="700" height="100" />
		</div>
		<div style="clear:both;height:20px;"></div>
	</th>
  </tr>
</thead>
<tbody>
	<tr>
    <td>
	<center>
	<strong>HASIL TRY OUT/UJIAN CBT OFFLINE<br /><?php echo strtoupper($_4cbd557d34801deff9f3656970cd5398);?></strong>
	</center>
	
	<div style="clear:both;height:40px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
			<table class="table" id="table_barang">
			  <thead>
			  <tr style="border-top:1px solid;border-bottom:1px solid;">
				<th style="text-align:center;font-size:12px;border:0;" width="20">NO.</th>
				<th style="text-align:center;font-size:12px;border:0;" width="80">USERNAME</th>
				<th style="text-align:center;font-size:12px;border:0;">NAMA PESERTA DIDIK</th>
				<th style="text-align:center;font-size:12px;border:0;" width="50">J. KEL.</th>
				<th style="text-align:center;font-size:12px;border:0;" width="100">KELAS</th>
				<th style="text-align:center;font-size:12px;border:0;" width="50">NILAI</th>
			  </tr>
			  </thead>
			  <tbody>
			  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
			  </tbody>
			</table>
			</div>
			
		</div>
	</div>
	
	
	
  
	</td>
	</tr>
</tbody>
</table>

</div>
<script language="javascript">
window.print();
</script>
</body>
</html>

<?php
/*
---------------------------------------------
haxan100
*/
?>

