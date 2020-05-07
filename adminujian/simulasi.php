<?php
session_name('session_ujian_admin');
session_start();
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION['LOGIN_ID'])){
	die;
}

require_once '../config.php';

if(isset($_GET['paket'])){
	$id=$_GET['paket'];
	$_SESSION['SIMULASI_ID']=$_GET['paket'];
	$_SESSION['SIMULASI_TIME']=0;
	$awalrayan=array();
	$conn=mysqli_query($conns,"select id_soal from soal_paket where id_paket='".$id."'");
	while($sql=mysqli_fetch_array($conn)){
		$awalrayan[]=array($sql['id_soal'],'');
	}
	for($mulai=0;$mulai<=10;$mulai++){
		shuffle($awalrayan);
	}
	$_SESSION['SIMULASI_SOAL']=$awalrayan;
	$_SESSION['SIMULASI_NILAI']=0;
	exit("<script>location.href='".$admin."simulasi.php';</script>");
}
$id='';
if(isset($_SESSION['SIMULASI_ID'])){
	$id=$_SESSION['SIMULASI_ID'];
}

if($id==''){
	exit("<script>location.href='".$admin."';</script>");
}
$conn=mysqli_query($conns,"select * from paket where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$id=$sql['id_paket'];
$waktu=$sql['waktu_pengerjaan']*60;

$simulasi_waktu=$_SESSION['SIMULASI_TIME'];
if($simulasi_waktu >= $waktu){
	unset($_SESSION['SIMULASI_ID']);
	unset($_SESSION['SIMULASI_TIME']);
	unset($_SESSION['SIMULASI_SOAL']);
	unset($_SESSION['SIMULASI_NILAI']);
	exit("<script>location.href='".$admin."';</script>");
}

if(isset($_POST['jawab'])){
	for($mulai=0;$mulai<count($_SESSION['SIMULASI_SOAL']);$mulai++){
		if($_SESSION['SIMULASI_SOAL'][$mulai][0]==$_POST['id']){
			$_SESSION['SIMULASI_SOAL'][$mulai][1]=$_POST['jawab'];
		}
	}
	
	$kunci=array();
	$jumlah=0;
	$conn=mysqli_query($conns,"select * from soal_paket inner join soal on soal_paket.id_soal=soal.id_soal where soal_paket.id_paket='".$id."'");
	while($sql=mysqli_fetch_array($conn)){
		$jumlah++;
		$kunci[$sql['id_soal']]=$sql['kunci'];
	}
	$nilai=0;
	for($mulai=0;$mulai<count($_SESSION['SIMULASI_SOAL']);$mulai++){
		if($_SESSION['SIMULASI_SOAL'][$mulai][1]==$kunci[$_SESSION['SIMULASI_SOAL'][$mulai][0]]){
			$nilai++;
		}
	}
	$nilai=round(($nilai*100)/$jumlah,0);
	$_SESSION['SIMULASI_NILAI']=$nilai;
	
	exit("<script>location.href='simulasi.php?no=".($_POST['no']+1)."';</script>");
}
if(isset($_POST['selesai'])){
	unset($_SESSION['SIMULASI_ID']);
	unset($_SESSION['SIMULASI_TIME']);
	unset($_SESSION['SIMULASI_SOAL']);
	unset($_SESSION['SIMULASI_NILAI']);
	exit("<script>location.href='".$admin."';</script>");
}

$paket=array();
$jawabana=array();
for($mulai=0;$mulai<count($_SESSION['SIMULASI_SOAL']);$mulai++){
	$paket[]=array($_SESSION['SIMULASI_SOAL'][$mulai][0],$_SESSION['SIMULASI_SOAL'][$mulai][1]);
	$jawabana[$_SESSION['SIMULASI_SOAL'][$mulai][0]]=$_SESSION['SIMULASI_SOAL'][$mulai][1];
}
$awalansims=1;
if(isset($_GET['no'])){
	$awalansims=$_GET['no'];
	if($awalansims > count($paket)){
		$awalansims=count($paket);
	}
}
$mysqlcon=$paket[$awalansims-1][0];
$conn=mysqli_query($conns,"select * from soal where id_soal='".$mysqlcon."'");
$sql=mysqli_fetch_array($conn);
$detail=$sql['detail'];
$arrjawab=array();
$conn=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$mysqlcon."' order by id_soal_jawaban");
while($sql=mysqli_fetch_array($conn)){
	$arrjawab[]=array($sql['kode'],$sql['jawaban']);
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
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container main">




<div class="row">
	<div class="col-lg-12">
		<h1 class="page-headers" style="margin-top:0;text-align:center;">
		<span id="timer"><span class="label label-success">Sisa Waktu : <?php echo gmdate("H:i:s", ($waktu-$simulasi_waktu));?></span></span>
		<span class="label label-info">Soal : <?php echo $awalansims.'/'.count($paket);?></span>
		</h1>
		
		
	</div>
</div>
<hr>
<div class="row">
<div class="col-lg-12">
<form action="" method="post">
<input name="id" type="hidden" value="<?php echo $mysqlcon;?>">
<input name="no" type="hidden" value="<?php echo $awalansims;?>">
<table class="table" style="margin:0;">
  <tr>
    <td width="10" style="border:none;"><h3><?php echo $awalansims;?>.</h3></td>
    <td style="border:none;"><h3><?php echo $detail;?></h3></td>
  </tr>
  <tr>
    <td style="border:none;">&nbsp;</td>
    <td style="border:none;">
		
		<table class="table" style="margin:0;">
		  <?php
		  
		  for($mulai=0;$mulai<count($arrjawab);$mulai++){
		  		if($arrjawab[$mulai][0]==$jawabana[$mysqlcon]){$botton='active';$bottonclass='btn-warning';}else{$botton='';$bottonclass='btn-default';}
				echo '
				<tr>
				<td width="10" style="border:none;">
				<button type="submit" name="jawab" value="'.$arrjawab[$mulai][0].'" class="btn '.$bottonclass.' '.$botton.'">'.chr(65+$mulai).' </button>
				</td>
				<td style="border:none;">
				'.$arrjawab[$mulai][1].'
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
  if($awalansims==1){$optidis='disabled';$propper='#';}else{$optidis='';$propper='simulasi.php?no='.($awalansims-1);}
  ?>
  <a href="<?php echo $propper;?>" class="btn btn-primary <?php echo $optidis;?>"><i class="fa fa-arrow-left"></i> Soal Sebelumnya</a>
  
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">MENGAKHIRI TES</button>
  
  <?php
  if($awalansims==count($paket)){$optidis='disabled';$propper='#';}else{$optidis='';$propper='simulasi.php?no='.($awalansims+1);}
  ?>
  <a href="<?php echo $propper;?>" class="btn btn-primary <?php echo $optidis;?>">Soal Selanjutnya <i class="fa fa-arrow-right"></i></a>
  
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
        Apakah Anda yakin akan mengakhiri tes/ujian ini?
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
	if($awalansims==$awal){$botton='active';}else{$botton='';}
	if($paket[$mulai][1]!=''){
		echo '<a href="simulasi.php?no='.$awal.'" class="btn btn-info btn-sm '.$botton.'" style="margin-bottom:5px;">'.$awal.' <i class="fa fa-check"></i></a> ';
	}else{
		echo '<a href="simulasi.php?no='.$awal.'" class="btn btn-default btn-sm '.$botton.'" style="margin-bottom:5px;">'.$awal.'</a> ';
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
			url: 'simsl.php',
			data: '',
			beforeSend: function(data) {
				
			},
			error: function(data) {
				
			},
			success: function(data) {
				if(data=='off'){
					$('#timer').html('<span class="label label-danger">Waktu : 00:00:00</span>');
					window.location.href='<?php echo $admin;?>';
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

<?php
/*
---------------------------------------------
haxan100
*/
?>

