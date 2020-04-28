<?php if(!defined('myweb')){ exit(); }?>
<?php

if(isset($_SESSION['LOGIN_ID'])){
	$_201fdaffa51943216266fe6c62da167c=$look.'images/no-thumb.jpg';

	$conn=mysqli_query($conns,"select * from siswa where id_siswa='".$_SESSION['LOGIN_ID']."'");
	$sql=mysqli_fetch_array($conn);
	$_5ab9622c6027ac8a26ecfedc9e0c5f27=$sql['nisn'];
	$_1c52cc9c9ab07c5f9e034d3d9fca55dc=$sql['nama'];
	if(file_exists($_714ca9eb87223ad2d6815f90173fde78.'/uploads/foto/'.$_5ab9622c6027ac8a26ecfedc9e0c5f27.'.jpg')){
		$_201fdaffa51943216266fe6c62da167c=$look.'/uploads/foto/'.$_5ab9622c6027ac8a26ecfedc9e0c5f27.'.jpg';
	}
	
	$_8f128c86231aedb3ad839316104082b1='N';
	$conn=mysqli_query($conns,"select selesai from ujian where id_siswa='".$_SESSION['LOGIN_ID']."'");
	if(mysqli_num_rows($conn)>0){
		$sql=mysqli_fetch_array($conn);
		$_8f128c86231aedb3ad839316104082b1=$sql['selesai'];
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
<form role="form" method="post" action="<?php echo $look;?>_73dce75d92181ca956e737b3cb66db98.php">
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
    <img src="<?php echo $_201fdaffa51943216266fe6c62da167c;?>" class="img-thumbnail" alt="image">
	<p>Selamat datang, <br /><?php echo $_1c52cc9c9ab07c5f9e034d3d9fca55dc;?></p>
	
  </div>
<div class="list-group">
<a href="./" class="list-group-item <?php if($result==''){echo 'active';}?>">Dashboard</a>
<!--<a href="?hal=tes" class="list-group-item <?php if($result=='tes'){echo 'active';}?>"><?php if($_8f128c86231aedb3ad839316104082b1=='Y'){echo 'Hasil Ujian';}else{echo 'Ujian';}?></a>-->
<a href="?hal=paket_ujian" class="list-group-item <?php if($result=='paket_ujian' or $result=='paket_ujian'){echo 'active';}?>">Paket Ujian</a>
<a href="?hal=profil" class="list-group-item <?php if($result=='profil'){echo 'active';}?>">Profil Siswa</a>
<a href="?hal=ubah_password" class="list-group-item <?php if($result=='ubah_password'){echo 'active';}?>">Ubah Password</a>
<a href="_2838024f07efa3669059a49ef2f79fe5.php" class="list-group-item ">Logout</a>
</div>
  
  
</div>

<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

