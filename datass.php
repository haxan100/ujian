<?php if(!defined('myweb')){ exit(); }?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <title>Sistem Ujian Online</title>
	<link rel="icon" href="../../smango.ico">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container main">

<?php include 'hal.php';?>



<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-left">
	<?php include 'hal2.php';?>
</div>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 middle">
	<?php eval($look);?>
</div>
</div>
<div style="clear:both;height:50px;"></div>

<div class="container-fluid footer">
<?php include 'footer.php';?>
</div>
</div>
  </body>
</html>

<?php
/*
---------------------------------------------
haxan100
*/
?>

