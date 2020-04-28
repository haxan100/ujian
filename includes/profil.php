<?php if(!defined('myweb')){ exit(); }?>
<?php
$_f0619632751681b5561b70caf2920a71=array('L'=>'Laki-laki','P'=>'Perempuan');

$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$_5ab9622c6027ac8a26ecfedc9e0c5f27=$sql['nisn'];
$_31985b26056f955fec6db8f46f87653f=$sql['nama'];
$_f0619632751681b5561b70caf2920a71=$_f0619632751681b5561b70caf2920a71[$sql['gender']];
$_72e838785b161ce1f713d6b1a452e270=$sql['id_kelas'];

$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$_72e838785b161ce1f713d6b1a452e270."'");
$sql=mysqli_fetch_array($conn);
$_38895153c69c18db0dbba317a1d8d369=$sql['nama'];

?>


<div class="page-header" style="margin-top:0">
  <h1 style="margin-top:0">Profil Siswa </h1>
</div>
<div class="panel panel-default">
	<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
	  <tr>
		<td width="220" style="vertical-align:middle;border-top-width:0;">Username</td>
		<td style="border-top-width:0;">: <?php echo $_5ab9622c6027ac8a26ecfedc9e0c5f27;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Nama Siswa</td>
		<td>: <?php echo $_31985b26056f955fec6db8f46f87653f;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Jenis Kelamin</td>
		<td>: <?php echo $_f0619632751681b5561b70caf2920a71;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Kelas</td>
		<td>: <?php echo $_38895153c69c18db0dbba317a1d8d369;?></td>
	  </tr>
	</table>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

