<?php
session_name('session_ppdb');
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once 'config.php';
if(!isset($_SESSION['LOGIN_ID'])){
	exit("<script>location.href='".$look."';</script>");
}
//$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' and selesai='N'");
//$sql=mysqli_fetch_array($conn);
//$id=$sql['id_paket'];
$id='';
$sqli='';
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' order by id_ujian desc limit 0,1");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$sqli=$sql['id_ujian'];
	$id=$sql['id_paket'];
	$stat=$sql['selesai'];
	$simulasi_waktu=$sql['lama_pengerjaan'];
	$conn=mysqli_query($conns,"select * from paket where id_paket='".$id."'");
	$sql=mysqli_fetch_array($conn);
	$waktu=$sql['waktu_pengerjaan']*60;
	
	if($stat=='Y'){
		exit("<script>location.href='".$look."?hal=ujian&id=".$id."';</script>");
	}else{
		if($simulasi_waktu >= $waktu){
			mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$sqli."'");
			exit("<script>location.href='".$look."?hal=ujian&id=".$id."';</script>");
		}
	}
}else{
	exit("<script>location.href='".$look."?hal=paket_ujian';</script>");
}

if(isset($_POST['jawab'])){
	mysqli_query($conns,"update ujian_detail set jawaban='".$_POST['jawab']."' where id_ujian='".$sqli."' and id_soal='".$_POST['id']."'");
	$kunci=array();
	$jumlah=0;
	$conn=mysqli_query($conns,"select * from soal_paket inner join soal on soal_paket.id_soal=soal.id_soal where soal_paket.id_paket='".$id."'");
	while($sql=mysqli_fetch_array($conn)){
		$jumlah++;
		$kunci[$sql['id_soal']]=$sql['kunci'];
	}
	$nilai=0;
	$conn=mysqli_query($conns,"select * from ujian_detail where id_ujian='".$sqli."'");
	while($sql=mysqli_fetch_array($conn)){
		if($sql['jawaban']==$kunci[$sql['id_soal']]){
			$nilai++;
		}
	}
	$nilai=round(($nilai*100)/$jumlah,0);
	mysqli_query($conns,"update ujian set nilai='".$nilai."' where id_ujian='".$sqli."'");
	mysqli_query($conns,"update siswa set nilai_tes='".$nilai."', status='Y' where id_siswa='".$_SESSION['LOGIN_ID']."'");
	
	exit("<script>location.href='_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no=".($_POST['no']+1)."';</script>");
}
if(isset($_POST['selesai'])){
	mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$sqli."'");
	exit("<script>location.href='".$look."?hal=ujian&id=".$id."';</script>");
}

$paket=array();
$jawabana=array();
$conn=mysqli_query($conns,"select * from ujian_detail where id_ujian='".$sqli."'");
while($sql=mysqli_fetch_array($conn)){
	$paket[]=array($sql['id_soal'],$sql['jawaban']);
	$jawabana[$sql['id_soal']]=$sql['jawaban'];
}
$_b44cb2e694287fa912cc50de8b3a920b=1;
if(isset($_GET['no'])){
	$_b44cb2e694287fa912cc50de8b3a920b=$_GET['no'];
	if($_b44cb2e694287fa912cc50de8b3a920b > count($paket)){
		$_b44cb2e694287fa912cc50de8b3a920b=count($paket);
	}
}
$mysqlcon=$paket[$_b44cb2e694287fa912cc50de8b3a920b-1][0];
$conn=mysqli_query($conns,"select * from soal where id_soal='".$mysqlcon."'");
$sql=mysqli_fetch_array($conn);
$_575b8b230b1ea2ddac1d342440dfc821=$sql['detail'];
$_44e2f87ec0f5ce9c128c029fd0ab97c6=array();
$conn=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$mysqlcon."' order by id_soal_jawaban");
while($sql=mysqli_fetch_array($conn)){
	$_44e2f87ec0f5ce9c128c029fd0ab97c6[]=array($sql['kode'],$sql['jawaban']);
}





mysqli_close($conns);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <title>Lembar Ujian</title>
	<link rel="icon" href="image/favicon.ico">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container main">

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-headers" style="margin-top:0;text-align:center;">
		<span id="timer"><span class="label label-success">Waktu : <?php echo gmdate("H:i:s", ($waktu-$simulasi_waktu));?></span></span>
		<span class="label label-info">Soal : <?php echo $_b44cb2e694287fa912cc50de8b3a920b.'/'.count($paket);?></span>
		</h1>
		
		
	</div>
</div>
<hr>
<div class="row">
<div class="col-lg-12">
<form action="" method="post">
<input name="id" type="hidden" value="<?php echo $mysqlcon;?>">
<input name="no" type="hidden" value="<?php echo $_b44cb2e694287fa912cc50de8b3a920b;?>">
<table class="table" style="margin:0;">
  <tr>
    <td width="10" style="border:none;"><h3><?php echo $_b44cb2e694287fa912cc50de8b3a920b;?>.</h3></td>
    <td style="border:none;"><h3><?php echo $_575b8b230b1ea2ddac1d342440dfc821;?></h3></td>
  </tr>
  <tr>
    <td style="border:none;">&nbsp;</td>
    <td style="border:none;">
		
		<table class="table" style="margin:0;">
		  <?php
		  
		  for($mulai=0;$mulai<count($_44e2f87ec0f5ce9c128c029fd0ab97c6);$mulai++){
		  		if($_44e2f87ec0f5ce9c128c029fd0ab97c6[$mulai][0]==$jawabana[$mysqlcon]){$_21d32120212be9984823e1b45de91ffc='active';$_2f70cd41a2cf123740e148619314f912='btn-warning';}else{$_21d32120212be9984823e1b45de91ffc='';$_2f70cd41a2cf123740e148619314f912='btn-default';}
				echo '
				<tr>
				<td width="10" style="border:none;">
				<button type="submit" name="jawab" value="'.$_44e2f87ec0f5ce9c128c029fd0ab97c6[$mulai][0].'" class="btn '.$_2f70cd41a2cf123740e148619314f912.' '.$_21d32120212be9984823e1b45de91ffc.'">'.chr(65+$mulai).' </button>
				</td>
				<td style="border:none;">
				'.$_44e2f87ec0f5ce9c128c029fd0ab97c6[$mulai][1].'
				</td>
				</tr>
				
				';
		  }
		  ?>
		</table>
		
	</td>
  </tr>
</table>

<center>
<div class="btn-group" role="group" aria-label="...">
  <?php
  if($_b44cb2e694287fa912cc50de8b3a920b==1){$_849d693c62dfe15394a642123c1599c8='disabled';$_1261cd629575acc614af0867c1e29e37='#';}else{$_849d693c62dfe15394a642123c1599c8='';$_1261cd629575acc614af0867c1e29e37='_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.($_b44cb2e694287fa912cc50de8b3a920b-1);}
  ?>
  <a href="<?php echo $_1261cd629575acc614af0867c1e29e37;?>" class="btn btn-primary <?php echo $_849d693c62dfe15394a642123c1599c8;?>"><i class="fa fa-arrow-left"></i> Soal Sebelumnya</a>
  
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">SELESAI</button>
  
  <?php
  if($_b44cb2e694287fa912cc50de8b3a920b==count($paket)){$_849d693c62dfe15394a642123c1599c8='disabled';$_1261cd629575acc614af0867c1e29e37='#';}else{$_849d693c62dfe15394a642123c1599c8='';$_1261cd629575acc614af0867c1e29e37='_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.($_b44cb2e694287fa912cc50de8b3a920b+1);}
  ?>
  <a href="<?php echo $_1261cd629575acc614af0867c1e29e37;?>" class="btn btn-primary <?php echo $_849d693c62dfe15394a642123c1599c8;?>">Soal Selanjutnya <i class="fa fa-arrow-right"></i></a>
  
</div>
</center>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin akan mengakhiri ujian ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="submit" name="selesai" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>
</form>
<hr>
<center>
<?php
$awal=0;
for($mulai=0;$mulai<count($paket);$mulai++){
	$awal++;
	if($_b44cb2e694287fa912cc50de8b3a920b==$awal){$_21d32120212be9984823e1b45de91ffc='active';}else{$_21d32120212be9984823e1b45de91ffc='';}
	if($paket[$mulai][1]!=''){
		echo '<a href="_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.$awal.'" class="btn btn-info btn-sm '.$_21d32120212be9984823e1b45de91ffc.'" style="margin-bottom:5px;">'.$awal.' <i class="fa fa-check"></i></a> ';
	}else{
		echo '<a href="_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.$awal.'" class="btn btn-default btn-sm '.$_21d32120212be9984823e1b45de91ffc.'" style="margin-bottom:5px;">'.$awal.'</a> ';
	}
}
?>
</center>



</div>
</div>




</div>
<script type="text/javascript">

$(document).ready(function(){
	setInterval(function(){ UpdateTime(); }, 1000);
	function UpdateTime(){
		$.ajax({
			type: 'GET',
			url: '_f0fb983976815348da459c1faccd8de7.php',
			data: '',
			beforeSend: function(data) {
				
			},
			error: function(data) {
				
			},
			success: function(data) {
				if(data=='off'){
					$('#timer').html('<span class="label label-danger">Waktu : 00:00:00</span>');
					window.location.href='<?php echo $look;?>?hal=tes';
				}else{
					$('#timer').html(data);
				}
			}
		});
	}

}); 
</script>


  </body>
</html>