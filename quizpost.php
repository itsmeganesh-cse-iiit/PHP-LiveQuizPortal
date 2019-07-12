<?php
session_start();
if(!isset($_SESSION['resultsdone']))
{
$noq=$_SESSION['noq'];
$qid=$_SESSION['qno'];
$qname=$_SESSION['qname'];
$id=$_SESSION['quiz_login_id'];
$gani="";
for($i=1;$i<=$noq;$i++)	
	{
		$tata="";
		$tata="q".$i;
		if(isset($_POST[$tata]))
			{
			if($i!=$noq)
				$gani=$gani.$i."-".strtoupper($_POST[$tata])."~";
			else
				$gani=$gani.$i."-".strtoupper($_POST[$tata])."~";
		}
		else
			{
			if($i!=$noq)
				$gani=$gani.$i."-kg"."~";
			else
				$gani=$gani.$i."-kg"."~";
			}
	
	}
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
@include "db.php";
$pp=mysql_query("INSERT INTO `sdcac_database`.`quiz_submits` (`qid`, `qname`, `id`, `answers`, `ip`, `time`) VALUES ('$qid', '$qname', '$id', '$gani', '$ip', '$time')");
$mkv=mysql_query("SELECT cmpltedids FROM quiz_db WHERE qno='$qid' and qname='$qname'");
$fmkv=mysql_fetch_array($mkv);
$tmpids=$fmkv['cmpltedids'].$_SESSION['quiz_login_id']."~";
mysql_query("UPDATE quiz_db SET cmpltedids='$tmpids' WHERE qno='$qid' and qname='$qname'");
$_SESSION['resultsdone']="yes";
if($pp==true)
{
	//
	//

	$user=$gani;
	$uanswers=explode("~",$user);
	$mptc=mysql_query("SELECT realans,coff FROM quiz_db WHERE qno='$qid' and qname='$qname'") or die(mysql_error());
	$aoa=mysql_fetch_array($mptc);
	$coff=$aoa['coff'];
	$quizadmin=$aoa['realans'];
	$qanswers=explode("~",$quizadmin);
	$score=0;
	$neg=0;
	$ip=$_SERVER['REMOTE_ADDR'];
	date_default_timezone_set("Asia/Kolkata");
	setlocale(LC_ALL,"hu_HU.UTF8");
	$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
	for($m=0;$m<count($uanswers);$m++)
		{
			
			if(substr_count($uanswers[$m],"kg")>0)
				{
				
				}
			else
				{
				if($uanswers[$m]==$qanswers[$m])
				{
				$score++;
				}
				else
				{
				$neg++;
				}
			}
		}
	$per="";
	$score--;
	
	if($score>$noq)
		$score--;
	if($score<$coff)
		$per="Poor";
	else if($score>$coff)
		$per="Ex";
	else if($score==$coff)
		$per="Good";
	$percentage=($score/$noq)*100;
	$quizmainlevel=$_SESSION['quizlevel'];
	mysql_query("INSERT INTO `sdcac_database`.`quiz_top_scores` (`id`, `name`, `qname`, `noq`, `level`, `coff`, `score`, `branch`, `rank`, `ip`, `performance`, `time`, `percentage`) VALUES ('$id', '', '$qname', '$noq', '$quizmainlevel', '$coff', '$score', '', '', '$ip', '$per', '$time', '$percentage')") or die(mysql_error());
	echo "submitted Succssfully";
	}
else
	echo "Submission Fail";
	
}
else
	echo "Quiz Already Submitted";

?>
