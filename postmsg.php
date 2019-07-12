<?php
session_start();
if(isset($_SESSION['quiz_login_id']))
{
@include "db.php";
$msgtitle=$_GET['msgtitle'];
$postto=$_GET['poto'];
$msgbody=$_GET['msgbody'];
$po=$_GET['po'];
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
$qq=mysql_query("SELECT MAX(postid) FROM quiz_notifications");
$kk=mysql_fetch_array($qq);

if($kk[0]==0)
	{
	$kk[0]=1;
	}
else
	$kk[0]++;
$posting=mysql_query("INSERT INTO `sdcac_database`.`quiz_notifications` (`postid`, `postto`,`msgtitle`, `msgbody`, `ip`, `poby`, `time`) VALUES ('$kk[0]', '$postto','$msgtitle', '$msgbody', '$ip', '$po', '$time')");
if($posting=true)
	echo "<font color=green>Notification Sent Successfully...</font>";

else
	echo "jum jum Biryani";

}
else
	echo "<script>window.location.href='index.php';</script>";
?>
