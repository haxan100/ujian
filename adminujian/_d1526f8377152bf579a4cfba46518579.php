<?php

session_name('session_ujian_admin');
session_start(); 
include '../config.php'; 

if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
$conn=mysqli_query($conns,"select nama from paket where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];

$_52f720bdaf922c68904e386cbf0cd227=0;
$_d4cb19f81c23886f544f26709bd4f799='';
$conn=mysqli_query($conns,"select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' order by nisn");
while($sql=mysqli_fetch_array($conn)){
	$juml=mysqli_query($conns,"select nama from kelas where id_kelas='".$sql['id_kelas']."'");
	$totAll=mysqli_fetch_array($juml);
	$nama=$totAll['nama'];
	$juml=mysqli_query($conns,"select nilai from ujian where id_paket='".$id."' and id_siswa='".$sql['id_siswa']."'");
	$totAll=mysqli_fetch_array($juml);
	$nilai=$totAll['nilai'];
	
	$_52f720bdaf922c68904e386cbf0cd227++;
	
	$_d4cb19f81c23886f544f26709bd4f799.='
	<tr>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$sql['nisn'].'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$sql['nama'].'</td>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$sql['gender'].'</td>
	<td style="font-size:12px;border:0;padding:0 5px 0 5px;">'.$nama.'</td>
	<td style="text-align:center;font-size:12px;border:0;padding:0 5px 0 5px;">'.$nilai.'</td>
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
	<strong>HASIL TRY OUT/UJIAN CBT OFFLINE<br /><?php echo strtoupper($nama);?></strong>
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

