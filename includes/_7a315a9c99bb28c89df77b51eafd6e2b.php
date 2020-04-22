<?php if(!defined('myweb')){ exit(); }?>
<?php

$pengumuman1='?hal=statistik';
$_4bf2fdb3ab37a41b537e7360f7e4b007='?hal=statistik';

$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from periode where tanggal_mulai<='".date('Y-m-d H:i:s')."' and tanggal_akhir>='".date('Y-m-d H:i:s')."'");
$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
$_67c4414db31f60967df5c435d2d681ec=$_60169cd1c47b7a7a85ab44f884635e41['id_periode'];

$_c223f438869210327f0c3eb44c425fd7=array();
$_90b6ac16500791eaa80fcaa07bc642d3=array();
$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select * from jurusan order by nama");
while($_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a)){
	$_c223f438869210327f0c3eb44c425fd7[]=array($_60169cd1c47b7a7a85ab44f884635e41['id_jurusan'],$_60169cd1c47b7a7a85ab44f884635e41['nama']);
	$_90b6ac16500791eaa80fcaa07bc642d3[]="'".$_60169cd1c47b7a7a85ab44f884635e41['nama']."'";
}
$_2472fec7fb362c94f5f432b81b032aee=array();
for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_c223f438869210327f0c3eb44c425fd7);$_a16d2280393ce6a2a5428a4a8d09e354++){
	$_eb6af5b4e510c3c874d7d1f51d72393a=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select jumlah from periode_kuota where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]."'");
	$_60169cd1c47b7a7a85ab44f884635e41=mysqli_fetch_array($_eb6af5b4e510c3c874d7d1f51d72393a);
	$_2472fec7fb362c94f5f432b81b032aee[$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]]=$_60169cd1c47b7a7a85ab44f884635e41['jumlah'];
}
$_5384b3c0a26bdc2e3f20ac92d72a4d1f=array();
$_5ae59f693126c3aac8b8421eb941c192=array();
$_5caedc7f711e40e12fc91cda9bb57a3a=array();
for($_a16d2280393ce6a2a5428a4a8d09e354=0;$_a16d2280393ce6a2a5428a4a8d09e354<count($_c223f438869210327f0c3eb44c425fd7);$_a16d2280393ce6a2a5428a4a8d09e354++){
	
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select count(*) as jml from siswa where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]."'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_1455c2ab6559ed39c9c24e2a3d3a0e8f=$_84ebecebe3a7c3b32dff74f8dce19fce['jml'];
	$_7da43659dfebcaab2ad4bbd2f2a98f30=mysqli_query($_000b935637cea64cc7810fb0077f5ff1,"select count(*) as jml from siswa where id_periode='".$_67c4414db31f60967df5c435d2d681ec."' and id_jurusan='".$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]."' and status='Y'");
	$_84ebecebe3a7c3b32dff74f8dce19fce=mysqli_fetch_array($_7da43659dfebcaab2ad4bbd2f2a98f30);
	$_c9e80fb342a93b752d3a59d1d1546cb8=$_84ebecebe3a7c3b32dff74f8dce19fce['jml'];
	if($_c9e80fb342a93b752d3a59d1d1546cb8>$_2472fec7fb362c94f5f432b81b032aee[$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]]){
		$_c9e80fb342a93b752d3a59d1d1546cb8=$_2472fec7fb362c94f5f432b81b032aee[$_c223f438869210327f0c3eb44c425fd7[$_a16d2280393ce6a2a5428a4a8d09e354][0]];
	}
	$_3bf6d34085b4a7f7f2748a8009b73a50=$_1455c2ab6559ed39c9c24e2a3d3a0e8f-$_c9e80fb342a93b752d3a59d1d1546cb8;
	
	$_5384b3c0a26bdc2e3f20ac92d72a4d1f[]=$_1455c2ab6559ed39c9c24e2a3d3a0e8f;
	$_5ae59f693126c3aac8b8421eb941c192[]=$_c9e80fb342a93b752d3a59d1d1546cb8;
	$_5caedc7f711e40e12fc91cda9bb57a3a[]=$_3bf6d34085b4a7f7f2748a8009b73a50;
}



?>
<link rel="stylesheet" type="text/css" href="js/plugins/jqplot/jquery.jqplot.css" />
<script src="js/plugins/jqplot/jquery.jqplot.min.js"></script>
<script src="js/plugins/jqplot/jqplot.barRenderer.min.js"></script>
<script src="js/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/plugins/jqplot/jqplot.pointLabels.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
        var s1 = [<?php echo implode(',',$_5384b3c0a26bdc2e3f20ac92d72a4d1f);?>];
        var s2 = [<?php echo implode(',',$_5ae59f693126c3aac8b8421eb941c192);?>];
        var s3 = [<?php echo implode(',',$_5caedc7f711e40e12fc91cda9bb57a3a);?>];
        var ticks = [<?php echo implode(',',$_90b6ac16500791eaa80fcaa07bc642d3);?>];
         
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
	width: 550px;
	height: 100%;
	font-size: 14px;
	line-height: 20px;;
}

.legend table {
	border-spacing: 5px;
}
table.jqplot-table-legend {
	width:100px;
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
		<h1 class="page-header" style="margin-top:0">Statistik PPDB</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

<?php
if($_67c4414db31f60967df5c435d2d681ec==''){
	echo '<div class="alert alert-danger">Mohon maaf, tidak ada periode PPDB yang aktif saat ini</div>';
}else{
?>
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

