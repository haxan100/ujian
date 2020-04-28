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
//$_b78f9e7c4587e8583ab713f126277f88=$sql['id_paket'];
$_b78f9e7c4587e8583ab713f126277f88='';
$_fbd326c813664d903c80679981cafba3='';
$conn=mysqli_query($conns,"select * from ujian where id_siswa='".$_SESSION['LOGIN_ID']."' order by id_ujian desc limit 0,1");
if(mysqli_num_rows($conn)>0){
	$sql=mysqli_fetch_array($conn);
	$_fbd326c813664d903c80679981cafba3=$sql['id_ujian'];
	$_b78f9e7c4587e8583ab713f126277f88=$sql['id_paket'];
	$_8f128c86231aedb3ad839316104082b1=$sql['selesai'];
	$_02202b271eddd150fb9b3a5c12a8639d=$sql['lama_pengerjaan'];
	$conn=mysqli_query($conns,"select * from paket where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
	$sql=mysqli_fetch_array($conn);
	$_36fd7f7111215a7056422e47518363d7=$sql['waktu_pengerjaan']*60;
	
	if($_8f128c86231aedb3ad839316104082b1=='Y'){
		exit("<script>location.href='".$look."?hal=ujian&id=".$_b78f9e7c4587e8583ab713f126277f88."';</script>");
	}else{
		if($_02202b271eddd150fb9b3a5c12a8639d >= $_36fd7f7111215a7056422e47518363d7){
			mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
			exit("<script>location.href='".$look."?hal=ujian&id=".$_b78f9e7c4587e8583ab713f126277f88."';</script>");
		}
	}
}else{
	exit("<script>location.href='".$look."?hal=paket_ujian';</script>");
}

if(isset($_POST['jawab'])){
	mysqli_query($conns,"update ujian_detail set jawaban='".$_POST['jawab']."' where id_ujian='".$_fbd326c813664d903c80679981cafba3."' and id_soal='".$_POST['id']."'");
	$_b65003120790c3e628f304c85a36a615=array();
	$_b9e53b5867b7fd393a3d5ddf2ceefdf6=0;
	$conn=mysqli_query($conns,"select * from soal_paket inner join soal on soal_paket.id_soal=soal.id_soal where soal_paket.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
	while($sql=mysqli_fetch_array($conn)){
		$_b9e53b5867b7fd393a3d5ddf2ceefdf6++;
		$_b65003120790c3e628f304c85a36a615[$sql['id_soal']]=$sql['kunci'];
	}
	$_c04df7e5dc078931b278b5a69b691465=0;
	$conn=mysqli_query($conns,"select * from ujian_detail where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
	while($sql=mysqli_fetch_array($conn)){
		if($sql['jawaban']==$_b65003120790c3e628f304c85a36a615[$sql['id_soal']]){
			$_c04df7e5dc078931b278b5a69b691465++;
		}
	}
	$_c04df7e5dc078931b278b5a69b691465=round(($_c04df7e5dc078931b278b5a69b691465*100)/$_b9e53b5867b7fd393a3d5ddf2ceefdf6,0);
	mysqli_query($conns,"update ujian set nilai='".$_c04df7e5dc078931b278b5a69b691465."' where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
	mysqli_query($conns,"update siswa set nilai_tes='".$_c04df7e5dc078931b278b5a69b691465."', status='Y' where id_siswa='".$_SESSION['LOGIN_ID']."'");
	
	exit("<script>location.href='_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no=".($_POST['no']+1)."';</script>");
}
if(isset($_POST['selesai'])){
	mysqli_query($conns,"update ujian set selesai='Y' where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
	exit("<script>location.href='".$look."?hal=ujian&id=".$_b78f9e7c4587e8583ab713f126277f88."';</script>");
}

$_1b66aa9bfba43381db0e3cc139369d48=array();
$_a2162101cd2c071e2931c2254b25ca5e=array();
$conn=mysqli_query($conns,"select * from ujian_detail where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
while($sql=mysqli_fetch_array($conn)){
	$_1b66aa9bfba43381db0e3cc139369d48[]=array($sql['id_soal'],$sql['jawaban']);
	$_a2162101cd2c071e2931c2254b25ca5e[$sql['id_soal']]=$sql['jawaban'];
}
$_b44cb2e694287fa912cc50de8b3a920b=1;
if(isset($_GET['no'])){
	$_b44cb2e694287fa912cc50de8b3a920b=$_GET['no'];
	if($_b44cb2e694287fa912cc50de8b3a920b > count($_1b66aa9bfba43381db0e3cc139369d48)){
		$_b44cb2e694287fa912cc50de8b3a920b=count($_1b66aa9bfba43381db0e3cc139369d48);
	}
}
$_5cf085bf5081a50e78311063db83f771=$_1b66aa9bfba43381db0e3cc139369d48[$_b44cb2e694287fa912cc50de8b3a920b-1][0];
$conn=mysqli_query($conns,"select * from soal where id_soal='".$_5cf085bf5081a50e78311063db83f771."'");
$sql=mysqli_fetch_array($conn);
$_575b8b230b1ea2ddac1d342440dfc821=$sql['detail'];
$_44e2f87ec0f5ce9c128c029fd0ab97c6=array();
$conn=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$_5cf085bf5081a50e78311063db83f771."' order by id_soal_jawaban");
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
		<span id="timer"><span class="label label-success">Waktu : <?php echo gmdate("H:i:s", ($_36fd7f7111215a7056422e47518363d7-$_02202b271eddd150fb9b3a5c12a8639d));?></span></span>
		<span class="label label-info">Soal : <?php echo $_b44cb2e694287fa912cc50de8b3a920b.'/'.count($_1b66aa9bfba43381db0e3cc139369d48);?></span>
		</h1>
		
		
	</div>
</div>
<hr>
<div class="row">
<div class="col-lg-12">
<form action="" method="post">
<input name="id" type="hidden" value="<?php echo $_5cf085bf5081a50e78311063db83f771;?>">
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
		  
		  for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_44e2f87ec0f5ce9c128c029fd0ab97c6);$_a16d2280393ce6a2a5428a4a8d09e354++){
		  		if($_44e2f87ec0f5ce9c128c029fd0ab97c6[$_a16d2280393ce6a2a5428a4a8d09e354][0]==$_a2162101cd2c071e2931c2254b25ca5e[$_5cf085bf5081a50e78311063db83f771]){$_21d32120212be9984823e1b45de91ffc='active';$_2f70cd41a2cf123740e148619314f912='btn-warning';}else{$_21d32120212be9984823e1b45de91ffc='';$_2f70cd41a2cf123740e148619314f912='btn-default';}
				echo '
				<tr>
				<td width="10" style="border:none;">
				<button type="submit" name="jawab" value="'.$_44e2f87ec0f5ce9c128c029fd0ab97c6[$_a16d2280393ce6a2a5428a4a8d09e354][0].'" class="btn '.$_2f70cd41a2cf123740e148619314f912.' '.$_21d32120212be9984823e1b45de91ffc.'">'.chr(65+$_a16d2280393ce6a2a5428a4a8d09e354).' </button>
				</td>
				<td style="border:none;">
				'.$_44e2f87ec0f5ce9c128c029fd0ab97c6[$_a16d2280393ce6a2a5428a4a8d09e354][1].'
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
  if($_b44cb2e694287fa912cc50de8b3a920b==count($_1b66aa9bfba43381db0e3cc139369d48)){$_849d693c62dfe15394a642123c1599c8='disabled';$_1261cd629575acc614af0867c1e29e37='#';}else{$_849d693c62dfe15394a642123c1599c8='';$_1261cd629575acc614af0867c1e29e37='_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.($_b44cb2e694287fa912cc50de8b3a920b+1);}
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
$_52f720bdaf922c68904e386cbf0cd227=0;
for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_1b66aa9bfba43381db0e3cc139369d48);$_a16d2280393ce6a2a5428a4a8d09e354++){
	$_52f720bdaf922c68904e386cbf0cd227++;
	if($_b44cb2e694287fa912cc50de8b3a920b==$_52f720bdaf922c68904e386cbf0cd227){$_21d32120212be9984823e1b45de91ffc='active';}else{$_21d32120212be9984823e1b45de91ffc='';}
	if($_1b66aa9bfba43381db0e3cc139369d48[$_a16d2280393ce6a2a5428a4a8d09e354][1]!=''){
		echo '<a href="_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.$_52f720bdaf922c68904e386cbf0cd227.'" class="btn btn-info btn-sm '.$_21d32120212be9984823e1b45de91ffc.'" style="margin-bottom:5px;">'.$_52f720bdaf922c68904e386cbf0cd227.' <i class="fa fa-check"></i></a> ';
	}else{
		echo '<a href="_db4d5aa7bb4b2f60d2ddb3c173cdce48.php?no='.$_52f720bdaf922c68904e386cbf0cd227.'" class="btn btn-default btn-sm '.$_21d32120212be9984823e1b45de91ffc.'" style="margin-bottom:5px;">'.$_52f720bdaf922c68904e386cbf0cd227.'</a> ';
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