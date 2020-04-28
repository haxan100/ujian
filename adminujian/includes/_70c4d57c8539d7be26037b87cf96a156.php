<?php if(!defined('myweb')){ exit(); }?>
<?php
$pengumuman1='?hal=soal';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=update_soal';

if(isset($_POST['save'])){
	$_3584859062ea9ecfb39b93bfcef8e869=$_POST['id'];
	$_d35a39212fd75e833aea38f90831b2cb=$_POST['action'];
	$_5bbbff8933f7b8be381684bd463e6d16=$_POST['pelajaran'];
	$paket=$_POST['soal'];
	$_b65003120790c3e628f304c85a36a615=$_POST['kunci'];
	$_a2162101cd2c071e2931c2254b25ca5e[0]=$_POST['jawaban'][0];
	$_a2162101cd2c071e2931c2254b25ca5e[1]=$_POST['jawaban'][1];
	$_a2162101cd2c071e2931c2254b25ca5e[2]=$_POST['jawaban'][2];
	$_a2162101cd2c071e2931c2254b25ca5e[3]=$_POST['jawaban'][3];
	$_a2162101cd2c071e2931c2254b25ca5e[4]=$_POST['jawaban'][4];

	if(empty($_5bbbff8933f7b8be381684bd463e6d16) or empty($paket) or empty($_b65003120790c3e628f304c85a36a615) or empty($_a2162101cd2c071e2931c2254b25ca5e[0]) or empty($_a2162101cd2c071e2931c2254b25ca5e[1]) or empty($_a2162101cd2c071e2931c2254b25ca5e[2]) or empty($_a2162101cd2c071e2931c2254b25ca5e[3]) or empty($_a2162101cd2c071e2931c2254b25ca5e[4])){
		$err='<strong>Error !</strong> Lengkapi form di bawah ini.';
	}else{
		if($_d35a39212fd75e833aea38f90831b2cb=='add'){
			$conn="insert into soal(detail,kunci,id_pelajaran) values('".trim($paket)."','".$_b65003120790c3e628f304c85a36a615."','".$_5bbbff8933f7b8be381684bd463e6d16."')";
			mysqli_query($conns,$conn);
			$_5cf085bf5081a50e78311063db83f771=mysqli_insert_id($conns);
			$_f77c5a659797b862f0fc544aa9a0c023=array('A','B','C','D','E');
			for($mulai=0;$mulai<count($_a2162101cd2c071e2931c2254b25ca5e);$mulai++){
				mysqli_query($conns,"insert into soal_jawaban(id_soal,kode,jawaban) values('".$_5cf085bf5081a50e78311063db83f771."','".$_f77c5a659797b862f0fc544aa9a0c023[$mulai]."','".trim($_a2162101cd2c071e2931c2254b25ca5e[$mulai])."')");
			}
			exit("<script>location.href='".$pengumuman1."&pelajaran=".$_5bbbff8933f7b8be381684bd463e6d16."';</script>");
		}
		if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
			$conn="update soal set detail='".trim($paket)."',kunci='".$_b65003120790c3e628f304c85a36a615."',id_pelajaran='".$_5bbbff8933f7b8be381684bd463e6d16."' where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."'";
			mysqli_query($conns,$conn);
			mysqli_query($conns,"delete from soal_jawaban where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."'");
			$_f77c5a659797b862f0fc544aa9a0c023=array('A','B','C','D','E');
			for($mulai=0;$mulai<count($_a2162101cd2c071e2931c2254b25ca5e);$mulai++){
				mysqli_query($conns,"insert into soal_jawaban(id_soal,kode,jawaban) values('".$_3584859062ea9ecfb39b93bfcef8e869."','".$_f77c5a659797b862f0fc544aa9a0c023[$mulai]."','".trim($_a2162101cd2c071e2931c2254b25ca5e[$mulai])."')");
			}
			exit("<script>location.href='".$pengumuman1."&pelajaran=".$_5bbbff8933f7b8be381684bd463e6d16."';</script>");
		}
		
	}
}else{
	$_5bbbff8933f7b8be381684bd463e6d16='';$paket='';$_b65003120790c3e628f304c85a36a615='';$_a2162101cd2c071e2931c2254b25ca5e[0]='';$_a2162101cd2c071e2931c2254b25ca5e[1]='';$_a2162101cd2c071e2931c2254b25ca5e[2]='';$_a2162101cd2c071e2931c2254b25ca5e[3]='';$_a2162101cd2c071e2931c2254b25ca5e[4]='';
	if(empty($_GET['action'])){$_d35a39212fd75e833aea38f90831b2cb='add';}else{$_d35a39212fd75e833aea38f90831b2cb=$_GET['action'];}
	if($_d35a39212fd75e833aea38f90831b2cb=='edit'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		$conn=mysqli_query($conns,"select * from soal where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		$sql=mysqli_fetch_array($conn);
		$_5bbbff8933f7b8be381684bd463e6d16=$sql['id_pelajaran'];
		$paket=$sql['detail'];
		$_b65003120790c3e628f304c85a36a615=$sql['kunci'];
		$_52f720bdaf922c68904e386cbf0cd227=0;
		$conn=mysqli_query($conns,"select * from soal_jawaban where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."' order by id_soal_jawaban");
		while($sql=mysqli_fetch_array($conn)){
			$_a2162101cd2c071e2931c2254b25ca5e[$_52f720bdaf922c68904e386cbf0cd227]=$sql['jawaban'];
			$_52f720bdaf922c68904e386cbf0cd227++;
		}
	}
	if($_d35a39212fd75e833aea38f90831b2cb=='delete'){
		$_3584859062ea9ecfb39b93bfcef8e869=$_GET['id'];
		mysqli_query($conns,"delete from soal where id_soal='".$_3584859062ea9ecfb39b93bfcef8e869."'");
		exit("<script>location.href='".$pengumuman1."';</script>");
	}
}
$_3718d16a4c63e6e0d669e38e63f8c5c0='<option value=""></option>';
$conn=mysqli_query($conns,"select * from pelajaran order by nama");
while($sql=mysqli_fetch_array($conn)){
	if($sql['id_pelajaran']==$_5bbbff8933f7b8be381684bd463e6d16){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_3718d16a4c63e6e0d669e38e63f8c5c0.='<option value="'.$sql['id_pelajaran'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}

if($_d35a39212fd75e833aea38f90831b2cb=='add'){$_06c518f70e97b19c7ec907f36542ce6e='INPUT DATA SOAL';}else{$_06c518f70e97b19c7ec907f36542ce6e='EDIT DATA SOAL';}

?>
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	CKEDITOR.config.autoParagraph = false;
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
	$('#save').click(function() {
		$('#form_soal').attr('target','');
		$('#form_soal').attr('action','<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>');
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
		<h1 class="page-header"><?php echo $_06c518f70e97b19c7ec907f36542ce6e;?></h1>
	</div>
</div>

<form action="<?php echo $_4bf2fdb3ab37a41b537e7360f7e4b007;?>" name="" id="form_soal" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $_3584859062ea9ecfb39b93bfcef8e869;?>">
<input name="action" type="hidden" value="<?php echo $_d35a39212fd75e833aea38f90831b2cb;?>">

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
		<td style="border-top-width:0;"><select name="pelajaran" id="pelajaran" class="form-control form-required" style="width:300px;"><?php echo $_3718d16a4c63e6e0d669e38e63f8c5c0;?></select></td>
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
			<textarea name="jawaban[]" id="ja" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $_a2162101cd2c071e2931c2254b25ca5e[0];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_b">
			<textarea name="jawaban[]" id="jb" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $_a2162101cd2c071e2931c2254b25ca5e[1];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_c">
			<textarea name="jawaban[]" id="jc" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $_a2162101cd2c071e2931c2254b25ca5e[2];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_d">
			<textarea name="jawaban[]" id="jd" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $_a2162101cd2c071e2931c2254b25ca5e[3];?></textarea>
			</div>
			<div role="tabpanel" class="tab-pane" id="jawaban_e">
			<textarea name="jawaban[]" id="je" cols="" rows="" class="form-control ckeditor form-required" style="height:200px;"><?php echo $_a2162101cd2c071e2931c2254b25ca5e[4];?></textarea>
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
		<option value="A" <?php if($_b65003120790c3e628f304c85a36a615=='A'){echo 'selected="selected"';}?>>A</option>
		<option value="B" <?php if($_b65003120790c3e628f304c85a36a615=='B'){echo 'selected="selected"';}?>>B</option>
		<option value="C" <?php if($_b65003120790c3e628f304c85a36a615=='C'){echo 'selected="selected"';}?>>C</option>
		<option value="D" <?php if($_b65003120790c3e628f304c85a36a615=='D'){echo 'selected="selected"';}?>>D</option>
		<option value="E" <?php if($_b65003120790c3e628f304c85a36a615=='E'){echo 'selected="selected"';}?>>E</option>
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

