<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=hasil_ujian';
$regis='?hal=hasil_ujian';
if(isset($_GET['action'])){
	if($_GET['action']=='hapus_ujian'){
		$sqli=$_GET['id'];
		$conn=mysqli_query($conns,"select id_paket from ujian where id_ujian='".$sqli."'");
		$sql=mysqli_fetch_array($conn);
		$id=$sql['id_paket'];
		mysqli_query($conns,"delete from ujian where id_ujian='".$sqli."'");
		mysqli_query($conns,"delete from ujian_detail where id_ujian='".$sqli."'");
		exit("<script>location.href='".$pengumuman1.'&paket='.$id."';</script>");
	}
}
$id='';
if(isset($_GET['paket'])){
	$id=$_GET['paket'];
}
$conn=mysqli_query($conns,"select count(*) as jml from peserta where id_paket='".$id."'");
$sql=mysqli_fetch_array($conn);
$jumlahsoal=$sql['jml'];

$awalsoals=$pengumuman1.'&paket='.$id;
$nilaiujiansoal=10;
$nilaiujiansoals=0;if(isset($_GET['page'])){$nilaiujiansoals=$_GET['page'];}
if($nilaiujiansoals<1){$nilaiujiansoals=1;}$result=$nilaiujiansoals;$nilaiujiansoals--;$listing=($jumlahsoal -($jumlahsoal%$nilaiujiansoal)) / $nilaiujiansoal;if($jumlahsoal%$nilaiujiansoal > 0){$listing++;}
if(($nilaiujiansoals+1)>1){$linksoalujian='<li><a href="'.$awalsoals.'&page='.$nilaiujiansoals.'">&laquo;</a></li>';}else{$linksoalujian='<li class="disabled"><a href="#">&laquo;</a></li>';}
for($mulai=1;$mulai<=$listing;$mulai++){if($mulai==($nilaiujiansoals+1)){$selectOpsi='class="active"';}else{$selectOpsi='';}$linksoalujian.='<li '.$selectOpsi.'><a href="'.$awalsoals.'&page='.$mulai.'">'.$mulai.'</a></li>';}
if(($nilaiujiansoals+1)<$listing){$linksoalujian.='<li><a href="'.$awalsoals.'&page='.($nilaiujiansoals+2).'">&raquo;</a></li>';}else{$linksoalujian.='<li class="disabled"><a href="#">&raquo;</a></li>';}
$linksoalujian='<ul class="pagination">'.$linksoalujian.'</ul>';$nilaiujiansoals=$nilaiujiansoals*$nilaiujiansoal;$awal=$nilaiujiansoals;
$tables='';
$conn="select * from peserta inner join siswa on peserta.id_siswa=siswa.id_siswa where peserta.id_paket='".$id."' order by peserta.id_peserta limit ".$nilaiujiansoals.",".$nilaiujiansoal;
$conn=mysqli_query($conns,$conn);
if(mysqli_num_rows($conn) > 0){
	while($sql=mysqli_fetch_array($conn)){
		$awal++;
		$id_paket=$sql['id_peserta'];
		$soalbenar=false;
		//if(mysqli_num_rows(mysqli_query($conns,"select * from program where id_paket='".$id_paket."' limit 0,1"))>0){$soalbenar=true;}
		if($soalbenar==true){$optidis='disabled';$soalkondisi='return(false);';}else{$optidis='';$soalkondisi='';}
		$juml=mysqli_query($conns,"select kelas.nama from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa='".$sql['id_siswa']."'");
		$totAll=mysqli_fetch_array($juml);
		$nama=$totAll['nama'];
		$sqli='';
		$juml=mysqli_query($conns,"select * from ujian where id_paket='".$id."' and id_siswa='".$sql['id_siswa']."' and selesai='Y'");
		if(mysqli_num_rows($juml)>0){
		$totAll=mysqli_fetch_array($juml);
			$sqli=$totAll['id_ujian'];
			$nilai=$totAll['nilai'];
			$hasilujian='<a href="'.$pengumuman1.'&id='.$sqli.'&action=hapus_ujian" class="btn btn-danger btn-xs btn_hapus">Hapus Ujian</a>';
		}else{
			$nilai='';
			$hasilujian='';
		}
		
		$tables.='
		<tr>
		<td style="text-align:center;">'.$awal.'</td>
		<td>'.$sql['nisn'].'</td>
		<td>'.$sql['nama'].'</td>
		<td>'.$nama.'</td>
		<td style="text-align:center;">'.$nilai.'</td>
		<td style="text-align:center;">'.$hasilujian.'</td>
		</tr>
		';
	}
}
$opsi='<option value="">Pilih Paket</option>';
$conn=mysqli_query($conns,"select * from paket order by id_paket");
while($sql=mysqli_fetch_array($conn)){
	if($id==$sql['id_paket']){$selectOpsi='selected';}else{$selectOpsi='';}
	$opsi.='<option value="'.$sql['id_paket'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
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
<a href="hasiltryout.php?paket=<?php echo $id;?>" class="btn btn-primary <?php if($id==''){echo 'disabled';}?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<!-- &nbsp;<a href="_a8cc578098c3232f102f31aa952498b2.php?paket=<?php echo $id;?>" class="btn btn-primary <?php if($id==''){echo 'disabled';}?>"><i class="fa fa-save"></i> Download</a> -->

</div>

	</div>
</div>
<div style="height:10px;clear:both;"></div>
<div class="row">
	<div class="col-lg-12">

	<?php 
	if($tables==''){ 
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
	  <?php echo $tables;?>
	  </tbody>
	</table>
	<center>
	<?php echo $linksoalujian;?>
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

