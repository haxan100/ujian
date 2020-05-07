<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=soal';
$regis='?hal=update_soal';

if(isset($_POST['save'])){
	$id_paket=$_POST['id'];
	$aksi=$_POST['action'];
	$mapel=$_POST['pelajaran'];
	$paket=$_POST['soal'];
	$kunci=$_POST['kunci'];
	$jawabana[0]=$_POST['jawaban'][0];
	$jawabana[1]=$_POST['jawaban'][1];
	$jawabana[2]=$_POST['jawaban'][2];
	$jawabana[3]=$_POST['jawaban'][3];
	$jawabana[4]=$_POST['jawaban'][4];

	if(empty($mapel) or empty($paket) or empty($kunci) or empty($jawabana[0]) or empty($jawabana[1]) or empty($jawabana[2]) or empty($jawabana[3]) or empty($jawabana[4])){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($aksi=='add'){
			$conn="insert into soal(detail,kunci,id_pelajaran) values('".trim($paket)."','".$kunci."','".$mapel."')";
			mysqli_query($conns,$conn);
			$mysqlcon=mysqli_insert_id($conns);
			$jawabaraymulai=array('A','B','C','D','E');
			for($mulai=0;$mulai<count($jawabana);$mulai++){
				mysqli_query($conns,"insert into soal_jawaban(id_soal,kode,jawaban) values('".$mysqlcon."','".$jawabaraymulai[$mulai]."','".trim($jawabana[$mulai])."')");
			}
			exit("<script>location.href='".$pengumuman1."&pelajaran=".$mapel."';</script>");
		}
		if($aksi=='edit'){
			$conn="update soal set detail='".trim($paket)."',kunci='".$kunci."',id_pelajaran='".$mapel."' where id_soal='".$id_paket."'";
			mysqli_query($conns,$conn);
			mysqli_query($conns,"delete from soal_jawaban where id_soal='".$id_paket."'");
			$jawabaraymulai=array('A','B','C','D','E');
			for($mulai=0;$mulai<count($jawabana);$mulai++){
				mysqli_query($conns,"insert into soal_jawaban(id_soal,kode,jawaban) values('".$id_paket."','".$jawabaraymulai[$mulai]."','".trim($jawabana[$mulai])."')");
			}
			exit("<script>location.href='".$pengumuman1."&pelajaran=".$mapel."';</script>");
		}
		
	}
}else{
	$mapel='';$paket='';$kunci='';$jawabana[0]='';$jawabana[1]='';$jawabana[2]='';$jawabana[3]='';$jawabana[4]='';
	if(empty($_GET['action'])){$aksi='add';}else{$aksi=$_GET['action'];}
	if($aksi=='edit'){
		$id_paket=$_GET['id'];
		$conn=mysqli_query($conns,"select * from soal where id_soal='".$id_paket."'");
		$sql=mysqli_fetch_array($conn);
		$mapel=$sql['id_pelajaran'];
		$paket=$sql['detail'];
		$kunci=$sql['kunci'];
		$awal=0;
		$conn=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$id_paket."' order by id_soal_jawaban");
		while($sql=mysqli_fetch_array($conn)){
			$jawabana[$awal]=$sql['jawaban'];
			$awal++;
		}
	}
	if($aksi=='delete'){
		$id_paket=$_GET['id'];
		mysqli_query($conns,"delete from soal where id_soal='".$id_paket."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}
$option='<option value=""></option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_pelajaran']==$mapel){$selectOpsi='selected';}else{$selectOpsi='';}
	$option.='<option value="'.$sql['id_pelajaran'].'" '.$selectOpsi.'>'.$sql['nama'].'</option>';
}

if($aksi=='add'){$datasoal='INPUT DATA SOAL';}else{$datasoal='EDIT DATA SOAL';}

?>
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	CKEDITOR.config.autoParagraph = false;
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
	$('#save').click(function() {
		$('#form_soal').attr('target','');
		$('#form_soal').attr('action','<?php echo $regis;?>');
		next=true;
		/*$('.form-required').each(function( index ) {
			if($( this ).val()==''){
				next=false;
			}
		});*/
		if(CKEDITOR.instances.soal.getData()==''){next=false;}
		if(CKEDITOR.instances.ja.getData()==''){next=false;}
		if(CKEDITOR.instances.jb.getData()==''){next=false;}
		if(CKEDITOR.instances.jc.getData()==''){next=false;}
		if(CKEDITOR.instances.jd.getData()==''){next=false;}
		if(CKEDITOR.instances.je.getData()==''){next=false;}
		if ($("#kunci").val()=='') {
			next=false;
		}
		if ($("#pelajaran").val()=='') {
			next=false;
		}
		/*if (!$("input:radio[name=kunci]").is(":checked")) {
			next=false;
		}*/
		if(next==false){
			alert('Lengkapi terlebih dahulu kolom yang bertanda *');
			return false;
		}
	});
	
}); 
</script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $datasoal;?></h1>
	</div>
</div>

<form action="<?php echo $regis;?>" name="" id="form_soal" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id_paket;?>">
<input name="action" type="hidden" value="<?php echo $aksi;?>">

<div class="row">
	<div class="col-lg-12">
	<?php
	if(!empty($err)){
		echo '
		   <div class="alert alert-danger ">
			  '.$err.'
		   </div>
		';
	}
	?>
	<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
	  <tr>
		<td width="150" style="vertical-align:middle;border-top-width:0;">Pelajaran<span class="required">*</span> </td>
		<td style="border-top-width:0;"><select name="pelajaran" id="pelajaran" class="form-control form-required" style="width:300px;"><?php echo $option;?></select></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Soal<span class="required">*</span> </td>
		<td><textarea name="soal" id="soal" cols="" rows="" class="form-control ckeditor form-required" style="height:300px;"><?php echo $paket;?></textarea></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Jawaban <span class="required">*</span> </td>
		<td>
		<div role="tabpanel">
		  <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#jawaban_a" aria-controls="jawaban_a" role="tab" data-toggle="tab">A</a></li>
			<li role="presentation"><a href="#jawaban_b" aria-controls="jawaban_b" role="tab" data-toggle="tab">B</a></li>
			<li role="presentation"><a href="#jawaban_c" aria-controls="jawaban_c" role="tab" data-toggle="tab">C</a></li>
			<li role="presentation"><a href="#jawaban_d" aria-controls="jawaban_d" role="tab" data-toggle="tab">D</a></li>
			<li role="presentation"><a href="#jawaban_e" aria-controls="jawaban_e" role="tab" data-toggle="tab">E</a></li>
		  </ul>
		
		  <div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="jawaban_a">
			<textarea name="jawaban[]" id="ja" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $jawabana[0];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_b">
			<textarea name="jawaban[]" id="jb" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $jawabana[1];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_c">
			<textarea name="jawaban[]" id="jc" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $jawabana[2];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_d">
			<textarea name="jawaban[]" id="jd" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $jawabana[3];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_e">
			<textarea name="jawaban[]" id="je" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $jawabana[4];?></textarea>
			</div>
		  </div>
		
		</div>
		</td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Kunci<span class="required">*</span> </td>
		<td>
		<select name="kunci" id="kunci" class="form-control form-required" style="width:100px;">
		<option value=""></option>
		<option value="A" <?php if($kunci=='A'){echo 'selected="selected"';}?>>A</option>
		<option value="B" <?php if($kunci=='B'){echo 'selected="selected"';}?>>B</option>
		<option value="C" <?php if($kunci=='C'){echo 'selected="selected"';}?>>C</option>
		<option value="D" <?php if($kunci=='D'){echo 'selected="selected"';}?>>D</option>
		<option value="E" <?php if($kunci=='E'){echo 'selected="selected"';}?>>E</option>
		</select>
		</td>
	  </tr>
	  <tr>
		<td></td>
		<td>
		<button type="submit" name="save" id="save" class="btn btn-primary"> Simpan</button> 
		<button type="button" name="cancel" class="btn btn-default" onclick="location.href='<?php echo $pengumuman1;?>'">Batal</button>
		</td>
	  </tr>
	</table>
	</div>
</div>






</form>
<span class="required">* </span> <span class="label label-danger">Harus diisi</span>


<?php
/*
---------------------------------------------
haxan100
*/
?>

