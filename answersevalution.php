<?php
session_start();
if(isset($_SESSION['quiz_admin_id']))
{
@include "db.php";
mysql_query("DELETE FROM `quiz_top_scores` WHERE 1");
$q1=mysql_query("SELECT * FROM quiz_db");
while($rrow=mysql_fetch_array($q1))
	{
	if($rrow['cmpltedids']!=false)
		{
		$tempqlevel=$rrow['qlevel'];
		$realanswers=$rrow['realans'];
		$noq=$rrow['noq'];
		$adminans=array();
		$adminans=(explode("~",$realanswers));
		$tqid=$rrow['qno'];	
		$tempcoff=$rrow['coff'];
		$quizsubids =array();
		$quizsubids=(explode("~",$rrow['cmpltedids']));
		$total=count($quizsubids)-1;
		$adminflag=0;
		for($i=0;$i<$total;$i++)
			{
			if($i==($total-1))
				$adminflag=1;
			$tmpid=$quizsubids[$i];
			$frow=mysql_query("SELECT * FROM quiz_submits WHERE qid='$tqid' and id='$tmpid'");
			$tmpfrow=mysql_fetch_array($frow);
			$tmpans=$tmpfrow['answers'];
			$userans=array();
			$userans=(explode("~",$tmpans));
			$tmpqname=$tmpfrow['qname'];
			$tmpip=$tmpfrow['ip'];
			$tmptime=$tmpfrow['time'];
			$marks=0;
			for($z=0;$z<(count($adminans)-1);$z++)
				{
				if($adminans[$z]==$userans[$z])
					$marks++;
				}
			$negmarks=($noq-$marks)*(0.3);
			$marks=$marks-$negmarks;
			$performance='';
			if($marks>$tempcoff)
				$performance="Good";
			else if($marks==$tempcoff)
				$performance="Avg";
			else
				$performance="Poor";
		
			$status=mysql_query("INSERT INTO `sdcac_database`.`quiz_top_scores` (`id`, `name`, `qname`, `noq`,`level`, `coff`, `score`, `branch`, `rank`, `ip`, `performance`, `time`) VALUES ('$tmpid', '', '$tmpqname', '$noq','$tempqlevel', '$tempcoff', '$marks', '', '', '$tmpip', '$performance', '$tmptime')");
			
			
			}
		
		}
	}
	if($adminflag==1)
			echo "Evaluation Done Successfully...";
}
else
	echo "<script>window.location.href='index.php'</script>";

?>
