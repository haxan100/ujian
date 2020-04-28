<?php if(!defined('myweb')){ exit(); }?>
<?php
$gender=array('L'=>'Laki-laki','P'=>'Perempuan');

$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$nisn=$sql['nisn'];
$nama=$sql['nama'];
$gender=$gender[$sql['gender']];
$idkelas=$sql['id_kelas'];

$conn=mysqli_query($conns,"select * from kelas where id_kelas='".$idkelas."'");
$sql=mysqli_fetch_array($conn);
$nama=$sql['nama'];

?>


<div class="page-header" style="margin-top:0">
  <h1 style="margin-top:0">Profil Siswa </h1>
</div>
<div class="panel panel-default">
	<table width="100%" border="0" cellspacing="4" cellpadding="4" class="table">
	  <tr>
		<td width="220" style="vertical-align:middle;border-top-width:0;">Username</td>
		<td style="border-top-width:0;">: <?php echo $nisn;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Nama Siswa</td>
		<td>: <?php echo $nama;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Jenis Kelamin</td>
		<td>: <?php echo $gender;?></td>
	  </tr>
	  <tr>
		<td style="vertical-align:middle;">Kelas</td>
		<td>: <?php echo $nama;?></td>
	  </tr>
	</table>
</div>


<?php
/*
---------------------------------------------
haxan100
*/
?>

