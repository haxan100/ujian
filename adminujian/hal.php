<?php if(!defined('myweb')){ exit(); }?>
<?php
$conn=mysqli_query($conns,"select * from user where id_user='".$_SESSION['LOGIN_ID']."'");
$sql=mysqli_fetch_array($conn);
$_510c1613a4f826b5612ae2ac9bdeb894=$sql['nama'];

?>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">ADMINISTRATOR UJIAN ONLINE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><span style="color:#fff;">Selamat datang, <strong><?php echo $_510c1613a4f826b5612ae2ac9bdeb894;?></strong> </span></li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php if($_2d2649677c494e9597d976bbb9df65e0['type']=='admin'){?>
						<li><a href="?hal=ubah_password"><i class="fa fa-lock fa-fw"></i> Ubah Password</a></li>
                        <?php } ?>
						<li><a href="_2838024f07efa3669059a49ef2f79fe5.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


<?php
/*
---------------------------------------------
haxan100
*/
?>

