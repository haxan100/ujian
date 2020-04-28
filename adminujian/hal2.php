<?php if(!defined('myweb')){ exit(); }?>
<?php
if($id['type']=='admin'){
?>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li><a <?php if($result==''){echo 'class="active"';}?> href="./"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>
			<li <?php if($result=='kelas' or $result=='update_kelas' or $result=='pelajaran' or $result=='update_pelajaran' or $result=='siswa' or $result=='update_siswa' or $result=='import_siswa' or $result=='soal' or $result=='update_soal' or $result=='import_soal'){echo 'class="active"';}?>><a href="#"><i class="fa fa-cogs fa-fw"></i> Master<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a <?php if($result=='kelas' or $result=='update_kelas'){echo 'class="active"';}?> href="?hal=kelas">Kelas</a></li>
					<li><a <?php if($result=='pelajaran' or $result=='update_pelajaran'){echo 'class="active"';}?> href="?hal=pelajaran">Pelajaran</a></li>
					<li><a <?php if($result=='siswa' or $result=='update_siswa' or $result=='import_siswa'){echo 'class="active"';}?> href="?hal=siswa">Siswa</a></li>
					<li><a <?php if($result=='soal' or $result=='update_soal' or $result=='import_soal'){echo 'class="active"';}?> href="?hal=soal">Bank Soal</a></li>
					<!--<li><a <?php if($result=='periode' or $result=='update_periode'){echo 'class="active"';}?> href="?hal=periode">Periode</a></li>
					<li><a <?php if($result=='soal_tes' or $result=='update_soal_tes'){echo 'class="active"';}?> href="?hal=soal_tes">Daftar Soal Tes</a></li>-->
				</ul>
			</li>
			<li <?php if($result=='paket' or $result=='update_paket' or $result=='peserta' or $result=='soal_ujian' or $result=='hasil_ujian'){echo 'class="active"';}?>><a href="#"><i class="fa fa-check-square-o fa-fw"></i> Ujian<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a <?php if($result=='paket' or $result=='update_paket'){echo 'class="active"';}?> href="?hal=paket">Paket Soal</a></li>
					<li><a <?php if($result=='soal_ujian'){echo 'class="active"';}?> href="?hal=soal_ujian">Soal Ujian</a></li>
					<li><a <?php if($result=='peserta'){echo 'class="active"';}?> href="?hal=peserta">Peserta Ujian</a></li>
					<li><a <?php if($result=='hasil_ujian'){echo 'class="active"';}?> href="?hal=hasil_ujian">Hasil Ujian</a></li>
				</ul>
			</li>
			
			<li <?php if($result=='gambar' or $result=='home' or $result=='informasi'){echo 'class="active"';}?>><a href="#"><i class="fa fa-briefcase fa-fw"></i> Lain-lain<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a <?php if($result=='home'){echo 'class="active"';}?> href="?hal=home">Halaman Depan</a></li>
					<li><a <?php if($result=='informasi'){echo 'class="active"';}?> href="?hal=informasi">Informasi </a></li>
					<li><a <?php if($result=='gambar'){echo 'class="active"';}?> href="?hal=gambar">Upload Gambar</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
</div>
<?php } ?>


<?php
/*
---------------------------------------------
haxan100
*/
?>

