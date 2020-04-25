<?php
function format_tanggal($_865eb2faae713e018683439d0d7400b1){
	if($_865eb2faae713e018683439d0d7400b1=='' or $_865eb2faae713e018683439d0d7400b1=='0000-00-00'){
		return '';
	}else{
		$_33fa5932a04ee69342bbf8a1150ec163=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		list($_64737247deb235c1e230d721597d203f,$_2ff160965f2675d8721c49561478b7d3,$_b2d92a9fa51455e3289abc48f75398c5)=explode("-",$_865eb2faae713e018683439d0d7400b1);
		return $_b2d92a9fa51455e3289abc48f75398c5." ".$_33fa5932a04ee69342bbf8a1150ec163[(int)$_2ff160965f2675d8721c49561478b7d3]." ".$_64737247deb235c1e230d721597d203f;
	}
}
function escape($_63bede6b19266d4efead07a4d91e29eb){
	global $data;
	if (get_magic_quotes_gpc()) {
		$_63bede6b19266d4efead07a4d91e29eb = stripslashes($_63bede6b19266d4efead07a4d91e29eb);
	}
	$_63bede6b19266d4efead07a4d91e29eb = mysqli_real_escape_string($data,$_63bede6b19266d4efead07a4d91e29eb);
	return $_63bede6b19266d4efead07a4d91e29eb;
}
function urlstring($_63bede6b19266d4efead07a4d91e29eb) {
	$_d37a391457dce51353a2353b1fc835d3 = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $_63bede6b19266d4efead07a4d91e29eb);
	$_d37a391457dce51353a2353b1fc835d3 = strtolower(trim($_d37a391457dce51353a2353b1fc835d3, '-'));
	$_d37a391457dce51353a2353b1fc835d3 = preg_replace("/[\/_|+ -]+/", '-', $_d37a391457dce51353a2353b1fc835d3);

	return $_d37a391457dce51353a2353b1fc835d3;
}
function fieldstring($_63bede6b19266d4efead07a4d91e29eb) {
	$_d37a391457dce51353a2353b1fc835d3 = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $_63bede6b19266d4efead07a4d91e29eb);
	$_d37a391457dce51353a2353b1fc835d3 = strtolower(trim($_d37a391457dce51353a2353b1fc835d3, '_'));
	$_d37a391457dce51353a2353b1fc835d3 = preg_replace("/[\/_|+ -]+/", '_', $_d37a391457dce51353a2353b1fc835d3);

	return $_d37a391457dce51353a2353b1fc835d3;
}
function createMeaningfulNames($_8409eaa6ec0ce2ea307354b2e150f8c2){
    //remove non alpha numeric characters
    $_8409eaa6ec0ce2ea307354b2e150f8c2 = preg_replace("/[^A-Za-z0-9 ]/", '', $_8409eaa6ec0ce2ea307354b2e150f8c2);

    //capitalize first character of every word
    $_8409eaa6ec0ce2ea307354b2e150f8c2 = ucwords(strtolower($_8409eaa6ec0ce2ea307354b2e150f8c2));

    //replace more than one space to underscore
    $_8409eaa6ec0ce2ea307354b2e150f8c2  = preg_replace('/([\s])\1+/', '_', $_8409eaa6ec0ce2ea307354b2e150f8c2 );

    //convert any single spaces to underscrore
    $_8409eaa6ec0ce2ea307354b2e150f8c2  =str_replace(" ","_",$_8409eaa6ec0ce2ea307354b2e150f8c2);
    return $_8409eaa6ec0ce2ea307354b2e150f8c2;
}
function currency($_e4a3f5f7a18b1ed0ee22a93864ad15d8){
	return number_format($_e4a3f5f7a18b1ed0ee22a93864ad15d8,0,'','.');
}
function GetRandomChar($_c6d44785be7fc737be6215436706b4ba=6, $_648acb3af86e91be8cfb671c5c52d8e4=6){
	$_ede24d37ef4830463f42b8d4f292701c='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$_eb3fa17483153d7d809795622807b249=strlen($_ede24d37ef4830463f42b8d4f292701c)-1;
	
	$_7b751b74065caafec5f3b405ee070e3d = rand($_c6d44785be7fc737be6215436706b4ba, $_648acb3af86e91be8cfb671c5c52d8e4);
	$_cc187a276bbeafea3a2404a9bdfda2e4='';
	for ($_a16d2280393ce6a2a5428a4a8d09e354=0; $_a16d2280393ce6a2a5428a4a8d09e354<$_7b751b74065caafec5f3b405ee070e3d; $_a16d2280393ce6a2a5428a4a8d09e354++) {
		$_cc187a276bbeafea3a2404a9bdfda2e4 .= substr($_ede24d37ef4830463f42b8d4f292701c, mt_rand(0,$_eb3fa17483153d7d809795622807b249), 1);
	}
	return $_cc187a276bbeafea3a2404a9bdfda2e4;
}

?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

