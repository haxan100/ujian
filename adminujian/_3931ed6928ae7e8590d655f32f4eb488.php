<?php if(!defined('myweb')){ exit(); }?>
<?php

$username='';
if(isset($_POST["login"])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if(empty($username) or empty($password)){
		$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Masukan username dan password.';
	}else{
			$conn=mysqli_query($conns,"SELECT * FROM user WHERE username='".escape($username)."' AND password='".md5($password)."'");
			if(mysqli_num_rows($conn)>0){
				$sql=mysqli_fetch_array($conn);
				$_78e1548d7ed1e38321b4ce5cddb2c8a7=$sql['id_user'];
				$siswa='admin';
				$_SESSION['LOGIN_ID']=$_78e1548d7ed1e38321b4ce5cddb2c8a7;
				$_SESSION['LOGIN_TYPE']=$siswa;
				exit("<script>window.location='".$_28cd827e9a3b578c3cfbcd7f0fd18d96."';</script>");
			}else{
				$_b5adde8d7d7412251f47419fe9bf51a7='<strong>Error !</strong> Username dan password yang Anda masukkan salah.';
			}

	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Login</h3>
                    </div>
                    <div class="panel-body">
<?php
if(!empty($_b5adde8d7d7412251f47419fe9bf51a7)){
	echo '
	   <div class="alert alert-danger ">
		  '.$_b5adde8d7d7412251f47419fe9bf51a7.'
	   </div>
	';
}
?>
                        <form role="form" method="post">
						<input name="session" type="hidden" value="<?php echo $_SESSION['RANDOM_CHAR'];?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                
								<button type="submit" name="login" class="btn btn-lg btn-success btn-block">Login</button> 
                            </fieldset>
                        </form>
						<div style="clear:both;height:10px;"></div>
<?php 

if (isset($_SERVER['HTTP_USER_AGENT']) and (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
   echo '<div class="alert alert-warning"><strong>PERHATIAN !</strong> Agar fungsi-fungsi pada web OUTLETPINTAR berjalan normal, silahkan mengakses OUTLETPINTAR menggunakan browser <u>Mozilla Firefox</u> atau <u>Google Chrome</u>.</div>';
}
?>
						
                    </div>
                </div>
            </div>
        </div>
		
		
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>


<?php
/*
---------------------------------------------
haxan100
*/
?>

