<?php if(!defined('myweb')){ exit(); }?>
<div class="container-fluid footer">
<?php include 'header.php';?>
</div>



<div style="clear:both;height:30px;"></div>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($result==''){echo 'class="active"';}?>><a href="./">Home</a></li>

		<li <?php if($result=='pengumuman'){echo 'class="active"';}?>><a href="?hal=pengumuman">Daftar Hasil Ujian</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
</nav>

<?php
?>

