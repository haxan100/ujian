<?php
session_name('session_ujian_admin');
session_start();
include '../config.php';
session_destroy();
exit("<script>window.location='".$admin."';</script>");
?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

