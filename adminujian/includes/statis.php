<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=statistik';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=statistik';

$id_periode='';
if(isset($_GET['periode'])){
	$id_periode=$_GET['periode'];
}
$hitung=array();
$namaas=array();
$conn=mysqli_query($conns,"select * from jurusan order by nama");
while($sql=mysqli_fetch_array($conn)){
	$hitung[]=array($sql['id_jurusan'],$sql['nama']);
	$namaas[]="'".$sql['nama']."'";
}
$jumlahAll=array();
for($mulai=0;$mulai<count($hitung);$mulai++){
	$conn=mysqli_query($conns,"select jumlah from periode_kuota where id_periode='".$id_periode."' and id_jurusan='".$hitung[$mulai][0]."'");
	$sql=mysqli_fetch_array($conn);
	$jumlahAll[$hitung[$mulai][0]]=$sql['jumlah'];
}
$tablesatu=array();
$tablesdua=array();
$tablestiga=array();
for($mulai=0;$mulai<count($hitung);$mulai++){
	
	$juml=mysqli_query($conns,"select count(*) as jml from siswa where id_periode='".$id_periode."' and id_jurusan='".$hitung[$mulai][0]."'");
	$totAll=mysqli_fetch_array($juml);
	$jml=$totAll['jml'];
	$juml=mysqli_query($conns,"select count(*) as jml from siswa where id_periode='".$id_periode."' and id_jurusan='".$hitung[$mulai][0]."' and status='Y'");
	$totAll=mysqli_fetch_array($juml);
	$TotAwal=$totAll['jml'];
	if($TotAwal>$jumlahAll[$hitung[$mulai][0]]){
		$TotAwal=$jumlahAll[$hitung[$mulai][0]];
	}
	$totalSemua=$jml-$TotAwal;
	
	$tablesatu[]=$jml;
	$tablesdua[]=$TotAwal;
	$tablestiga[]=$totalSemua;
}

$_6ce2e221e9de82dc1b70b582fb6e5a98='<option value="">Pilih Periode</option>';
$conn=mysqli_query($conns,"select * from periode order by id_periode");
while($sql=mysqli_fetch_array($conn)){
	if($id_periode==$sql['id_periode']){$_3cb9cdaed257453cfa56b9ef81b44c57='selected';}else{$_3cb9cdaed257453cfa56b9ef81b44c57='';}
	$_6ce2e221e9de82dc1b70b582fb6e5a98.='<option value="'.$sql['id_periode'].'" '.$_3cb9cdaed257453cfa56b9ef81b44c57.'>'.$sql['nama'].'</option>';
}


?>
<link rel="stylesheet" type="text/css" href="js/plugins/jqplot/jquery.jqplot.css" />
<script src="js/plugins/jqplot/jquery.jqplot.min.js"></script>
<script src="js/plugins/jqplot/jqplot.barRenderer.min.js"></script>
<script src="js/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/plugins/jqplot/jqplot.pointLabels.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
        var s1 = [<?php echo implode(',',$tablesatu);?>];
        var s2 = [<?php echo implode(',',$tablesdua);?>];
        var s3 = [<?php echo implode(',',$tablestiga);?>];
        var ticks = [<?php echo implode(',',$namaas);?>];
         
        plot2 = $.jqplot('chart2', [s1, s2, s3], {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
			series: [{label: 'Siswa Mendaftar'}, {label: 'Siswa Diterima'}, {label: 'Siswa Tidak Diterima'}],
			legend: {
                show: true,
                location: 'ne',
                placement: 'outside'
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            }
        });
     
        $('#chart2').bind('jqplotDataHighlight',
            function (ev, seriesIndex, pointIndex, data) {
				$('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
             
        $('#chart2').bind('jqplotDataUnhighlight',
            function (ev) {
                $('#info2').html('Nothing');
            }
        );
    });
</script>

<style type="text/css">
.demo-container  {
	box-sizing: border-box;
	/*width: 850px;*/
	height: 450px;
	padding: 20px 15px 15px 15px;
	margin: 15px auto 30px auto;
	border: 1px solid #ddd;
	background: #fff;
	background: linear-gradient(#f6f6f6 0, #fff 50px);
	background: -o-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -ms-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -moz-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -webkit-linear-gradient(#f6f6f6 0, #fff 50px);
	box-shadow: 0 3px 10px rgba(0,0,0,0.15);
	-o-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-ms-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.chart {
	width: 700px;
	height: 100%;
	font-size: 14px;
	line-height: 20px;;
}

.legend table {
	border-spacing: 5px;
}
table.jqplot-table-legend {
	width:200px;
}
table.jqplot-table-legend, table.jqplot-cursor-legend {
	margin-top:0px;
}
td.jqplot-table-legend {
	padding:5px;
}

</style>

<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header">STATISTIK PPDB</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
<form action="" name="" method="get" style="float:left">
<input name="hal" type="hidden" value="statistik" />
<select name="periode" class="form-control" onchange="submit()" style="width:150px;float:left;margin-right:5px;"><?php echo $_6ce2e221e9de82dc1b70b582fb6e5a98;?></select>
</form>
<div style="clear:both;"></div>
<?php if($id_periode!=''){ ?>
<div class="demo-container">
<div id="chart2" class="chart" ></div>
</div>
<?php } ?>
	</div>
</div>



<?php
/*
---------------------------------------------
haxan100
*/
?>

