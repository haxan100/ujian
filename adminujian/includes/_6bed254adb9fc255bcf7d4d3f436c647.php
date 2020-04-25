<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=hasil_tes';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=hasil_tes';

$_67c4414db31f60967df5c435d2d681ec='';
$_0a22a15d3692a4e52aea2b257e6a358d='';
$_36923cf62618d1b9981740738971e651='';
if(isset($_GET['periode'])){
	$_67c4414db31f60967df5c435d2d681ec=$_GET['periode'];
}
if(isset($_GET['jurusan'])){
	$_0a22a15d3692a4e52aea2b257e6a358d=$_GET['jurusan'];
}
if(isset($_GET['q'])){
	$_36923cf62618d1b9981740738971e651=$_GET['q'];
}

$conn=mysqli_query($conns,"select jumlah from periode_kuota where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_0a22a15d3692a4e52aea2b257e6a358d."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn);
$_2d7b8d90d5719acfada164f228cfcaa8=$_60169cd1c47b7a7a85ab44f884635e41['jumlah'];

$_8a49b0cdaecb8c5ca5df854c44d2e49d=array();
$_5c1b09b57e5249b809a70edb3b54a1b7=array();
$_52f720bdaf922c68904e386cbf0cd227=0;
$conn=mysqli_query($conns,"select id_siswa from siswa where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_0a22a15d3692a4e52aea2b257e6a358d."' and status='Y' order by nilai_tes desc,id_siswa");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
	$_52f720bdaf922c68904e386cbf0cd227++;
	$_8a49b0cdaecb8c5ca5df854c44d2e49d[$_60169cd1c47b7a7a85ab44f884635e41['id_siswa']]=$_52f720bdaf922c68904e386cbf0cd227;
	if($_52f720bdaf922c68904e386cbf0cd227<=$_2d7b8d90d5719acfada164f228cfcaa8){
		$_5c1b09b57e5249b809a70edb3b54a1b7[$_60169cd1c47b7a7a85ab44f884635e41['id_siswa']]='<span class="label label-success">Diterima</span>';
	}else{
		$_5c1b09b57e5249b809a70edb3b54a1b7[$_60169cd1c47b7a7a85ab44f884635e41['id_siswa']]='<span class="label label-danger">Tidak Diterima</span>';
	}
}

$conn=mysqli_query($conns,"select count(*) as jml from siswa where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_0a22a15d3692a4e52aea2b257e6a358d."' and status='Y' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') ");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$_60169cd1c47b7a7a85ab44f884635e41['jml'];


$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&periode='.$_67c4414db31f60967df5c435d2d681ec.'&q='.$_36923cf62618d1b9981740738971e651.'&jurusan='.$_0a22a15d3692a4e52aea2b257e6a358d;
$_111f1b5b84b5c819ea9ae35968fce466=50;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($_a16d2280393ce6a2a5428a4a8d09e354=1;$_a16d2280393ce6a2a5428a4a8d09e354<=$_f52ba22baf75438bb1b02f476954c023;$_a16d2280393ce6a2a5428a4a8d09e354++){if($_a16d2280393ce6a2a5428a4a8d09e354==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_a16d2280393ce6a2a5428a4a8d09e354.'">'.$_a16d2280393ce6a2a5428a4a8d09e354.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;

$_f0619632751681b5561b70caf2920a71=array('L'=>'Laki-laki','P'=>'Perempuan');
$_14be0ab06abae2d9280a6a375e905b2d=array('Y'=>'<span class="label label-success">Lulus</span>','N'=>'<span class="label label-danger">Tidak Lulus</span>');
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from siswa where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_0a22a15d3692a4e52aea2b257e6a358d."' and status='Y' and (nisn like '%".$_36923cf62618d1b9981740738971e651."%' or nama like '%".$_36923cf62618d1b9981740738971e651."%') order by nilai_tes desc,nisn limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$_60169cd1c47b7a7a85ab44f884635e41['id_siswa'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		/*if(mysqli_num_rows(mysqli_query($conns,"select * from recharge_detail where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if(mysqli_num_rows(mysqli_query($conns,"select * from tukar_poin where id_siswa='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}*/
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select nama from jurusan where id_jurusan='".$_60169cd1c47b7a7a85ab44f884635e41['id_jurusan']."'");
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
		$_c223f438869210327f0c3eb44c425fd7=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
		
		$_d4cb19f81c23886f544f26709bd4f799.='
		  <tr>
			<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
			<td>'.$_60169cd1c47b7a7a85ab44f884635e41['nisn'].'</td>
			<td>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</td>
			<td>'.$_f0619632751681b5561b70caf2920a71[$_60169cd1c47b7a7a85ab44f884635e41['gender']].'</td>
			<td>'.$_c223f438869210327f0c3eb44c425fd7.'</td>
			<td style="text-align:center;">'.$_60169cd1c47b7a7a85ab44f884635e41['nilai_tes'].'</td>
			<td style="text-align:center;">'.$_8a49b0cdaecb8c5ca5df854c44d2e49d[$_3584859062ea9ecfb39b93bfcef8e869].'</td>
			<td style="text-align:center;">'.$_5c1b09b57e5249b809a70edb3b54a1b7[$_3584859062ea9ecfb39b93bfcef8e869].'</td>
		  </tr>
		';
	}
}

$_6ce2e221e9de82dc1b70b582fb6e5a98='<option value="">Pilih Periode</option>';
$conn=mysqli_query($conns,"select * from periode order by id_periode");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
	if($_67c4414db31f60967df5c435d2d681ec==$_60169cd1c47b7a7a85ab44f884635e41['id_periode']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_6ce2e221e9de82dc1b70b582fb6e5a98.='<option value="'.$_60169cd1c47b7a7a85ab44f884635e41['id_periode'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</option>';
}
$_b847d626109199f9fe6eadf71f825eef='<option value="">Pilih Kompetensi</option>';
$conn=mysqli_query($conns,"select * from jurusan order by nama");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($conn)){
	if($_0a22a15d3692a4e52aea2b257e6a358d==$_60169cd1c47b7a7a85ab44f884635e41['id_jurusan']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_b847d626109199f9fe6eadf71f825eef.='<option value="'.$_60169cd1c47b7a7a85ab44f884635e41['id_jurusan'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$_60169cd1c47b7a7a85ab44f884635e41['nama'].'</option>';
}

?>

<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA HASIL TES</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="hasil_tes" />
<select name="periode" class="form-control" style="width:150px;float:left;margin-right:5px;"><?php echo $_6ce2e221e9de82dc1b70b582fb6e5a98;?></select>
<select name="jurusan" class="form-control" style="width:170px;float:left;margin-right:5px;"><?php echo $_b847d626109199f9fe6eadf71f825eef;?></select>
<input name="q" type="text" value="<?php echo $_36923cf62618d1b9981740738971e651;?>" class="form-control" placeholder="Pencarian" style="float:left;width:150px;" /> &nbsp;<button type="submit" name="" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>
</form>
<div style="float:right">
<a href="export_tes.php?periode=<?php echo $_67c4414db31f60967df5c435d2d681ec;?>&amp;jurusan=<?php echo $_0a22a15d3692a4e52aea2b257e6a358d;?>" class="btn btn-primary <?php if($_67c4414db31f60967df5c435d2d681ec=='' or $_0a22a15d3692a4e52aea2b257e6a358d==''){echo 'disabled';}?>"><i class="fa fa-save"></i> Download</a>&nbsp;
<a href="print_tes.php?periode=<?php echo $_67c4414db31f60967df5c435d2d681ec;?>&amp;jurusan=<?php echo $_0a22a15d3692a4e52aea2b257e6a358d;?>" class="btn btn-primary <?php if($_67c4414db31f60967df5c435d2d681ec=='' or $_0a22a15d3692a4e52aea2b257e6a358d==''){echo 'disabled';}?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>

</div>
<div style="height:10px;clear:both;"></div>
<?php 
if($_d4cb19f81c23886f544f26709bd4f799==''){ 
	echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
}else{
?>
<table class="table table-striped table-hover table-bordered">
  <thead>
  <tr>
	<th style="text-align:center;" width="40">NO</th>
	<th style="text-align:center;" width="100">NISN</th>
	<th style="text-align:center;">NAMA SISWA</th>
	<th style="text-align:center;">J. KELAMIN</th>
	<th style="text-align:center;">KOMP. KEAHLIAN</th>
	<th style="text-align:center;" width="80">SKOR</th>
	<th style="text-align:center;" width="60">PERINGKAT</th>
	<th style="text-align:center;" width="60">STATUS</th>
  </tr>
  </thead>
  <tbody>
  <?php echo $_d4cb19f81c23886f544f26709bd4f799;?>
  </tbody>
</table>
<center>
<?php echo $_addbb9f4792a53c78e32e91e1c94f075;?>
</center>
<?php } ?>

	</div>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

