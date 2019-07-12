<?php
session_start();
if(!isset($_SESSION['quiz_login_id']))
	echo "<br><br><br><br><br>&nbsp;&nbsp;&nbsp;<font color=red>Login First</font>";
else
{
@ include "db.php";
$qname=$_GET['qname'];
$userid=$_SESSION['quiz_login_id'];
$q=mysql_query("SELECT noq,qno,mode,coff,qlevel,cmpltedids,timedur,qname FROM quiz_db WHERE qname='$qname' ORDER BY qlevel");
echo "</br><table>";
if(mysql_num_rows($q)>0){
while($row=mysql_fetch_array($q))
	{
		$tmp=explode("~",$row['cmpltedids']);
		if(!in_array($userid,$tmp))
		{
		echo "<tr><td><span style='cursor:pointer;' onclick=\"loadquiz('".$row['qno']."','".$row['noq']."','".$row['mode']."','".$row['coff']."','".$row['timedur']."','".$row['qname']."','".$row['qlevel']."')\"><font>Round - ".$row['qlevel']."</font></span></td><td></td><td></td><td><img src='images/active.png' width='17px' height='12px'></td></tr>";
		echo "<tr><td></td></tr>";
		}
		else
			{
			echo "<tr><td><span style='cursor:pointer;' onclick=\"alert('Already Finished the Exam');\"><font>Round - ".$row['qlevel']."</font></span></td><td></td><td></td><td><img src='images/inactive.png' width='17px' height='12px'></td></tr>";
			echo "<tr><td></td></tr>";
			}
	
	}
}
else
	echo "<br><br><br>&nbsp;&nbsp;&nbsp;<font color=red>No Quizs Found</font>";
echo "</table>";
//echo "Hello World <img src='images/active.png' width='18px' height='12px'>";
}

?>
