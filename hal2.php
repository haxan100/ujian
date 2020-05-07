<?php if(!defined('myweb')){ exit(); }?>
<?php

if(isset($_SESSION['LOGIN_ID'])){
	$gambar=$look.'images/no-thumb.jpg';

	$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
	$sql=mysqli_fetch_array($conn);
	$nisn=$sql['nisn'];
	$nama=$sql['nama'];
	if(file_exists($fotos.'/uploads/foto/'.$nisn.'.jpg')){
		$gambar=$look.'/uploads/foto/'.$nisn.'.jpg';
	}
	
	$stat='N';
	$conn=mysqli_query($conns,"select selesai from ujian where id_siswa='".$_SESSION['LOGIN_ID']."'");
	if(mysqli_num_rows($conn)>0){
		$sql=mysqli_fetch_array($conn);
		$stat=$sql['selesai'];
	}
	
}
?>

<?php if(!isset($_SESSION['LOGIN_ID'])){ ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Login Siswa</h3>
  </div>
  <div class="panel-body">
  <p>Masukkan Username &amp; password Anda.</p>
<form role="form" method="post" action="<?php echo $look;?>logincek.php">
  <div class="form-group">
    <input type="text" name="username" value="" class="form-control" id="" autocomplete="off" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" name="password" value="" class="form-control" id="" placeholder="Password">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
	
  </div>
</div>


<?php } ?>
<?php if(isset($_SESSION['LOGIN_ID'])){ ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Info Siswa</h3>
  </div>
  <div class="panel-body">
    <img src="<?php echo $gambar;?>" class="img-thumbnail" alt="image">
	<p>Selamat datang, <br /><?php echo $nama;?></p>
	
  </div>
<div class="list-group">
<a href="./" class="list-group-item <?php if($result==''){echo 'active';}?>">Dashboard</a>
<!--<a href="?hal=tes" class="list-group-item <?php if($result=='tes'){echo 'active';}?>"><?php if($stat=='Y'){echo 'Hasil Ujian';}else{echo 'Ujian';}?></a>-->
<a href="?hal=paket_ujian" class="list-group-item <?php if($result=='paket_ujian' or $result=='paket_ujian'){echo 'active';}?>">Paket Ujian</a>
<a href="?hal=profil" class="list-group-item <?php if($result=='profil'){echo 'active';}?>">Profil Siswa</a>
<a href="?hal=ubah_password" class="list-group-item <?php if($result=='ubah_password'){echo 'active';}?>">Ubah Password</a>
<a href="redir.php" class="list-group-item ">Logout</a>
</div>
  
  
</div>

<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

