<?php
session_start();
function answereval()
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
					$q=$noq;
					for($z=0;$z<(count($adminans))+1;$z++)
						{
						if($adminans[$z]==$userans[$z])
							$marks++;
						else if (substr_count($userans[$z],'Z')>0)
						{$q=$q-1;
							continue;
						}
						else
							echo '';
						}
					$negmarks=$marks-(($q-$marks)*0.3);
					$marks=$negmarks;
					$_SESSION['negmarks']=$marks;
					$performance='';
					if($marks>$tempcoff)
						$performance="Good";
					else if($marks==$tempcoff)
						$performance="Avg";
					else
						$performance="Poor";
					$percen=($marks/$noq)*100;
					$status=mysql_query("INSERT INTO `sdcac_database`.`quiz_top_scores` (`id`, `name`, `qname`, `noq`,`level`, `coff`, `score`, `branch`, `rank`, `ip`, `performance`, `time`,`percentage`) VALUES ('$tmpid', '', '$tmpqname', '$noq','$tempqlevel', '$tempcoff', '$marks', '', '', '$tmpip', '$performance', '$tmptime','$percen')");
			
			
					}
		
				}
			}
			
			}

@include "db.php";

$qid=$_SESSION['qzid'];
$qname=$_SESSION['qname'];
$id=$_SESSION['quiz_login_id'];
$answers='';
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
$answers=$_GET['qustans'];
$my=mysql_query("SELECT * FROM quiz_submits WHERE qid='$qid' and id='$id'");
if(mysql_num_rows($my)>0)
	{
	// rechchaku
	}
else
	{
	$send=mysql_query("INSERT INTO `sdcac_database`.`quiz_submits` (`qid`, `qname`, `id`, `answers`, `ip`, `time`) VALUES ('$qid', '$qname', '$id', '$answers', '$ip', '$time')") or die(mysql_error());
	
	}
if($send=true)
	{
	unset($_SESSION['oflag']);
	$tmpid=$_SESSION['quiz_login_id'];
	mysql_query("DELETE FROM `quiz_online` WHERE id='$tmpid'");
	
	$gani=mysql_query("SELECT * FROM quiz_db WHERE qno='$qid'") or die(mysql_error());
	$row=mysql_fetch_array($gani);
	$l=$row['cmpltedids'].$id."~";
	mysql_query("UPDATE quiz_db SET cmpltedids='$l' WHERE qno='$qid'");
	
	//echo "<font color='green' size=5>Submitted Successfully..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
	$_SESSION['quizcomplete']="donegani";
	unset($_SESSION['qzmid']);
	unset($_SESSION['qname']);
	unset($_SESSION['noq']);
	unset($_SESSION['tlimit']);
	unset($_SESSION['oflag']);
	unset($_SESSION['coff']);
	unset($_SESSION['mode']);
	unset($_SESSION['qlevel']);
	echo "<script>window.location.href='index.php';</script>";
	
	mysql_query("DELETE FROM `quiz_online` WHERE id='$id'");
	answereval();
	
	}
else
	echo "<font color='red' size=5>Submission Failed..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";

?>
