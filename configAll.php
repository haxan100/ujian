<?php
function format_tanggal($date){
	if($date=='' or $date=='0000-00-00'){
		return '';
	}else{
		$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		list($bulans,$bulanss,$bulansss)=explode("-",$date);
		return $bulansss." ".$bulan[(int)$bulanss]." ".$bulans;
	}
}
function escape($dtatang){
	global $conns;
	if (get_magic_quotes_gpc()) {
		$dtatang = stripslashes($dtatang);
	}
	$dtatang = mysqli_real_escape_string($conns,$dtatang);
	return $dtatang;
}
function urlstring($dtatang) {
	$dtatangs = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $dtatang);
	$dtatangs = strtolower(trim($dtatangs, '-'));
	$dtatangs = preg_replace("/[\/_|+ -]+/", '-', $dtatangs);

	return $dtatangs;
}
function fieldstring($dtatang) {
	$dtatangs = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $dtatang);
	$dtatangs = strtolower(trim($dtatangs, '_'));
	$dtatangs = preg_replace("/[\/_|+ -]+/", '_', $dtatangs);

	return $dtatangs;
}
function createMeaningfulNames($namafull){
    //remove non alpha numeric characters
    $namafull = preg_replace("/[^A-Za-z0-9 ]/", '', $namafull);

    //capitalize first character of every word
    $namafull = ucwords(strtolower($namafull));

    //replace more than one space to underscore
    $namafull  = preg_replace('/([\s])\1+/', '_', $namafull );

    //convert any single spaces to underscrore
    $namafull  =str_replace(" ","_",$namafull);
    return $namafull;
}
function currency($uangformat){
	return number_format($uangformat,0,'','.');
}
function GetRandomChar($ran_enam=6, $ran_enams=6){
	$randoms='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$formst=strlen($randoms)-1;
	
	$randomAll = rand($ran_enam, $ran_enams);
	$randomSemua='';
	for ($mulai=0; $mulai<$randomAll; $mulai++) {
		$randomSemua .= substr($randoms, mt_rand(0,$formst), 1);
	}
	return $randomSemua;
}

?>

<?php
/*
---------------------------------------------
haxan100
*/
?>

