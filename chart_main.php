<?php
session_start();

@ include "db.php";
$id=$_SESSION['new_quiz_id'];
$apt=mysql_query("SELECT percentage FROM quiz_top_scores WHERE id='$id' and qname='aptitude'");
$ver=mysql_query("SELECT percentage FROM quiz_top_scores WHERE id='$id' and qname='verbal'");
$res=mysql_query("SELECT percentage FROM quiz_top_scores WHERE id='$id' and qname='reasoning'");
$cpro=mysql_query("SELECT percentage FROM quiz_top_scores WHERE id='$id' and qname='cpro'");
$javapro=mysql_query("SELECT percentage FROM quiz_top_scores WHERE id='$id' and qname='javapro'");
$apt_total=0;
$ver_total=0;
$res_total=0;
$cpro_total=0;
$javapro_total=0;
$apt_perc=0.01;
$ver_perc=0.01;
$res_perc=0.01;
$cpro_perc=0.01;
$javapro_perc=0.01;
if(mysql_num_rows($apt)>0)
	{
		
		$i=0;
		while($r1=mysql_fetch_array($apt))
			{
				$apt_total=$apt_total+$r1['percentage'];
				$i++;
			}
		$apt_perc=($apt_total/($i*100))*100;
	}
if(mysql_num_rows($ver)>0)
	{
		
		$i=0;
		while($r1=mysql_fetch_array($ver))
			{
				$ver_total=$ver_total+$r1['percentage'];
				$i++;
			}
		$ver_perc=($ver_total/($i*100))*100;
	}
if(mysql_num_rows($res)>0)
	{
		
		$i=0;
		while($r1=mysql_fetch_array($res))
			{
				$res_total=$res_total+$r1['percentage'];
				$i++;
			}
		$res_perc=($res_total/($i*100))*100;
	}
	
if(mysql_num_rows($cpro)>0)
	{
		
		$i=0;
		while($r1=mysql_fetch_array($cpro))
			{
				$cpro_total=$cpro_total+$r1['percentage'];
				$i++;
			}
		$cpro_perc=($cpro_total/($i*100))*100;
	}

	
if(mysql_num_rows($javapro)>0)
	{
		
		$i=0;
		while($r1=mysql_fetch_array($javapro))
			{
				$javapro_total=$javapro_total+$r1['percentage'];
				$i++;
			}
		$javapro_perc=($javapro_total/($i*100))*100;
	}

?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="text/javascript" src="chart/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'YOUR SCORE CHART BELOW<br><font color=grey>We are allocated initially each as 20% . So finish the Exams and see how your performance will be?</font>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Test Overall Performace',
            data: [
                ['Aptitude',   <?php echo $apt_perc;?>],
                ['Verbal',       <?php echo $ver_perc;?>],
                {
                    name: 'Java',
                    y: <?php echo $javapro_perc;?>,
                    sliced: true,
                    selected: true
                },
                ['Reasoning',    <?php echo $res_perc;?>],
                ['Cprogramming',     <?php echo $cpro_perc;?>]
               
            ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="chart/highcharts.js"></script>
<script src="chart/highcharts-3d.js"></script>


<div id="container" style="height: 400px"></div>
	</body>
</html>
