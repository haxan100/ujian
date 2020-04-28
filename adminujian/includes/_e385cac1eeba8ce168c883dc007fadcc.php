<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=hasil_ujian';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=hasil_ujian';
if(isset($_GET['action'])){
	if($_GET['action']=='hapus_ujian'){
		$_fbd326c813664d903c80679981cafba3=$_GET['id'];
		$conn=mysqli_query($conns,"select id_paket from ujian where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
		$sql=mysqli_fetch_array($conn);
		$_b78f9e7c4587e8583ab713f126277f88=$sql['id_paket'];
		mysqli_query($conns,"delete from ujian where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
		mysqli_query($conns,"delete from ujian_detail where id_ujian='".$_fbd326c813664d903c80679981cafba3."'");
		exit("<script>location.href='".$pengumuman1.'&paket='.$_b78f9e7c4587e8583ab713f126277f88."';</script>");
	}
}
$_b78f9e7c4587e8583ab713f126277f88='';
if(isset($_GET['paket'])){
	$_b78f9e7c4587e8583ab713f126277f88=$_GET['paket'];
}
$conn=mysqli_query($conns,"select count(*) as jml from peserta where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."'");
$sql=mysqli_fetch_array($conn);
$_12ef5f8660c2350214ce228aad66392d=$sql['jml'];

$_bd374a8757e4ad5e55de663a02a9adde=$pengumuman1.'&paket='.$_b78f9e7c4587e8583ab713f126277f88;
$_111f1b5b84b5c819ea9ae35968fce466=10;
$_4e4149dcf4b3b60bf0aaf69dd2348c4d=0;if(isset($_GET['page'])){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_GET['page'];}
if($_4e4149dcf4b3b60bf0aaf69dd2348c4d<1){$_4e4149dcf4b3b60bf0aaf69dd2348c4d=1;}$result=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;$_4e4149dcf4b3b60bf0aaf69dd2348c4d--;$_f52ba22baf75438bb1b02f476954c023=($_12ef5f8660c2350214ce228aad66392d -($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466)) / $_111f1b5b84b5c819ea9ae35968fce466;if($_12ef5f8660c2350214ce228aad66392d%$_111f1b5b84b5c819ea9ae35968fce466 > 0){$_f52ba22baf75438bb1b02f476954c023++;}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)>1){$_addbb9f4792a53c78e32e91e1c94f075='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$_4e4149dcf4b3b60bf0aaf69dd2348c4d.'">&laquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$_f52ba22baf75438bb1b02f476954c023;$mulai++){if($mulai==($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)){$_3cb9cdaed257453cfa56b9ef81b44c57='class="active"';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}$_addbb9f4792a53c78e32e91e1c94f075.='<li '.$_3cb9cdaed257453cfa56b9ef81b44c57.'><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($_4e4149dcf4b3b60bf0aaf69dd2348c4d+1)<$_f52ba22baf75438bb1b02f476954c023){$_addbb9f4792a53c78e32e91e1c94f075.='<li><a href="'.$_bd374a8757e4ad5e55de663a02a9adde.'&page='.($_4e4149dcf4b3b60bf0aaf69dd2348c4d+2).'">&raquo;</a></li>';}else{$_addbb9f4792a53c78e32e91e1c94f075.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$_addbb9f4792a53c78e32e91e1c94f075='<ul class="pagination">'.$_addbb9f4792a53c78e32e91e1c94f075.'</ul>';$_4e4149dcf4b3b60bf0aaf69dd2348c4d=$_4e4149dcf4b3b60bf0aaf69dd2348c4d*$_111f1b5b84b5c819ea9ae35968fce466;$_52f720bdaf922c68904e386cbf0cd227=$_4e4149dcf4b3b60bf0aaf69dd2348c4d;
$_d4cb19f81c23886f544f26709bd4f799='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' order by peserta.id_peserta limit ".$_4e4149dcf4b3b60bf0aaf69dd2348c4d.",".$_111f1b5b84b5c819ea9ae35968fce466;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$_52f720bdaf922c68904e386cbf0cd227++;
		$_3584859062ea9ecfb39b93bfcef8e869=$sql['id_peserta'];
		$_25407a67a7a597297818c35a0d0ed51d=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$_3584859062ea9ecfb39b93bfcef8e869."' limit 0,1"))>0){$_25407a67a7a597297818c35a0d0ed51d=true;}
		if($_25407a67a7a597297818c35a0d0ed51d==true){$_849d693c62dfe15394a642123c1599c8='disabled';$_f22a1fc2263e04ec8ae7a008a249229e='return(false);';}else{$_849d693c62dfe15394a642123c1599c8='';$_f22a1fc2263e04ec8ae7a008a249229e='';}
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select kelas.nama from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa='".$sql['id_siswa']."'");
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
		$_38895153c69c18db0dbba317a1d8d369=$_84ebecebe3a7c3b32dff74f8dce19fce['nama'];
		$_fbd326c813664d903c80679981cafba3='';
		$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($conns,"select * from ujian where id_paket='".$_b78f9e7c4587e8583ab713f126277f88."' and id_siswa='".$sql['id_siswa']."' and selesai='Y'");
		if(mysqli_num_rows($_7da43659dfebcaab2ad4bbd2f2a98f30)>0){
		$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
			$_fbd326c813664d903c80679981cafba3=$_84ebecebe3a7c3b32dff74f8dce19fce['id_ujian'];
			$_c04df7e5dc078931b278b5a69b691465=$_84ebecebe3a7c3b32dff74f8dce19fce['nilai'];
			$_98024b3b946c00745df4e12781e5901d='<a href="'.$pengumuman1.'&id='.$_fbd326c813664d903c80679981cafba3.'&action=hapus_ujian" class="btn btn-danger btn-xs btn_hapus">Hapus Ujian</a>';
		}else{
			$_c04df7e5dc078931b278b5a69b691465='';
			$_98024b3b946c00745df4e12781e5901d='';
		}
		
		$_d4cb19f81c23886f544f26709bd4f799.='
		<tr>
		<td style="text-align:center;">'.$_52f720bdaf922c68904e386cbf0cd227.'</td>
		<td>'.$sql['nisn'].'</td>
		<td>'.$sql['nama'].'</td>
		<td>'.$_38895153c69c18db0dbba317a1d8d369.'</td>
		<td style="text-align:center;">'.$_c04df7e5dc078931b278b5a69b691465.'</td>
		<td style="text-align:center;">'.$_98024b3b946c00745df4e12781e5901d.'</td>
		</tr>
		';
	}
}
$opsi='<option value="">Pilih Paket</option>';
$conn=mysqli_query($conns,"select * from paket order by id_paket");
while($sql=mysqli_fetch_array($conn)){
	if($_b78f9e7c4587e8583ab713f126277f88==$sql['id_paket']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}

?>


<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">DATA HASIL UJIAN</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">

<form action="" name="" id="form_cari" method="get" style="float:left">
<input name="hal" type="hidden" value="hasil_ujian" />
<select name="paket" id="paket" class="form-control" style="width:300px;float:left;margin-right:5px;" onchange="submit()"><?php echo $opsi;?></select>
</form>
<div style="float:right">
<a href="_d1526f8377152bf579a4cfba46518579.php?paket=<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" class="btn btn-primary <?php if($_b78f9e7c4587e8583ab713f126277f88==''){echo 'disabled';}?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
&nbsp;<a href="_a8cc578098c3232f102f31aa952498b2.php?paket=<?php echo $_b78f9e7c4587e8583ab713f126277f88;?>" class="btn btn-primary <?php if($_b78f9e7c4587e8583ab713f126277f88==''){echo 'disabled';}?>"><i class="fa fa-save"></i> Download</a>

</div>

	</div>
</div>
<div style="height:10px;clear:both;"></div>
<div class="row">
	<div class="col-lg-12">

	<?php 
	if($_d4cb19f81c23886f544f26709bd4f799==''){ 
		echo '<div class="alert alert-danger ">Data tidak ditemukan.</div>';
	}else{
	?>
	<table class="table table-striped table-hover table-bordered">
	  <thead>
	  <tr>
		<th style="text-align:center;" width="40">NO</th>
		<th style="text-align:center;">USERNAME</th>
		<th style="text-align:center;">NAMA SISWA</th>
		<th style="text-align:center;">KELAS</th>
		<th style="text-align:center;">NILAI</th>
		<th style="text-align:center;" width="120">&nbsp;</th>
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

<script type="text/javascript">
$(document).ready(function(){
	$(".btn_hapus").click(function(){
		if (confirm("Anda yakin akan menghapus hasil ujian ini ?")){
			return true;
		}else{
			return false;
		}
	});	
	
	
}); 
</script>



<?php
/*
---------------------------------------------
haxan100
*/
?>

