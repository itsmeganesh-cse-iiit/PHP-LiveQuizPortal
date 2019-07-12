
<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  
<?php
$_SESSION['resultsdone']="yes";
$userid=$_SESSION['quiz_login_id'];
$qid=$_SESSION['qno'];
$qname=$_SESSION['qname'];
$coff=$_SESSION['coff'];
$noq=$_SESSION['noq'];
@include "db.php";
// for formality
$mp=mysql_query("SELECT time,ip,answers FROM quiz_submits WHERE id='$userid' and qid='$qid' and qname='$qname'");
$ppl=mysql_fetch_array($mp);
$user=$ppl['answers'];
$uanswers=explode("~",$user);
$mptc=mysql_query("SELECT realans FROM quiz_db WHERE qno='$qid' and qname='$qname'") or die(mysql_error());
$aoa=mysql_fetch_array($mptc);
$quizadmin=$aoa['realans'];
$qanswers=explode("~",$quizadmin);
$score=0;
$neg=0;
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
echo "<table border=1 align=center><tr><Td>Q.No</Td><Td>Status</Td><td>Answer</td></tr>";
for($m=0;$m<count($uanswers);$m++)
	{
		
		if(substr_count($uanswers[$m],"kg")>0)
			echo "<tr><td>".($m+1)."</td><td><center><img src='images/logout.png'></center></td><td><center>".@$qanswers[$m][3]."</center></td></tr>";
		else
			{
			if($uanswers[$m]==$qanswers[$m])
			{
			echo "<tr><td>".($m+1)."</td><td><center><img src='images/right.jpg' ></center></td><td><center>-</center></td></tr>";
			$score++;
			}
			else
			{
			echo "<tr><td>".($m+1)."</td><td><center><img src='images/wrong.jpg'></center></td><td><center>".@$qanswers[$m][3]."</center></td></tr>";	
			$neg++;
			}
		}
	}
//$finalmarks=$score-($neg*0.3);

echo "Your Marks :<font size=5 color=grey>&nbsp;&nbsp;".$finalmarks."</font><br>";
$per="";
if($finalmarks<$coff)
	$per="Poor";
else if($finalmarks>$coff)
	$per="Ex";
else if($finalmarks==$coff)
	$per="Good";
echo "Performance:<font size=5 color=grey>&nbsp;&nbsp;".$per."</font><Br>";
$percentage=($finalmarks/$noq)*100;
echo "Percentage:<font size=5 color=grey>&nbsp;&nbsp;".$percentage."&nbsp;%<Br>";
$quizmainlevel=$_SESSION['quizlevel'];
if(!isset($_SESSION['notdone']))
{
mysql_query("INSERT INTO `sdcac_database`.`quiz_top_scores` (`id`, `name`, `qname`, `noq`, `level`, `coff`, `score`, `branch`, `rank`, `ip`, `performance`, `time`, `percentage`) VALUES ('$userid', '', '$qname', '$noq', '$quizmainlevel', '$coff', '$finalmarks', '', '', '$ip', '$per', '$time', '$percentage')");
$_SESSION['notdone']="jum jum";
}


 
 
?>
 
 
