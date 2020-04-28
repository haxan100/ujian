<?php

session_name('session_ujian');
session_start(); 
include 'config.php'; 
include 'configAll.php';

$id='';
if(isset($_GET['id'])){
	$id=$_GET['id'];
}

$nilai=0;
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and id_paket='".$id."'");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$sqli=$sql['id_ujian'];
	$stat=$sql['selesai'];
	$nilai=$sql['nilai'];
}
$conn=mysqli_query($conns,"select * from paket where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];
$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$nisn=$sql['nisn'];
$nama=$sql['nama'];
$idkelas=$sql['id_kelas'];
$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$idkelas."'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];

?>

<html>
<head>
<link href="css/style-sph.css" rel="stylesheet" type="text/css" />
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
			<img src="images/kop.png" width="700" height="100" />
		</div>
		<div style="clear:both;height:20px;"></div>
	</th>
  </tr>
</thead>
<tbody>
	<tr>
    <td>
	<center>
	<strong>HASIL UJIAN<br />
	<?php echo strtoupper($nama);?></strong>
	</center>
	
	<div style="clear:both;height:40px;"></div>
	<div class="row">
		<div class="col-lg-12">
		<div class="panel panel-default">
		<table width="100%" border="0" cellspacing="0" cellpadding="4" class="table">
		  <tr>
			<td width="170" style="vertical-align:middle;border-width:0;padding:0px;">USERNAME </td>
			<td style="border-width:0;padding:0px;">: <?php echo $nisn;?></td>
		  </tr>
		  <tr>
			<td style="vertical-align:middle;border-width:0;padding:0px;">NAMA PESERTA DIDIK </td>
			<td style="border-width:0;padding:0px;">: <?php echo $nama;?></td>
		  </tr>
		  <tr>
			<td style="vertical-align:middle;border-width:0;padding:0px;">KELAS </td>
			<td style="border-width:0;padding:0px;">: <?php echo $nama;?></td>
		  </tr>
		</table>
		</div>
		</div>
		
	</div>
	
	<div style="clear:both;height:20px;"></div>
	<div class="row">
		<div class="col-lg-12">
		SKOR HASIL UJIAN ANDA ADALAH : <strong><?php echo $nilai;?></strong>
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

