<?php
session_start();
$type=addslashes(htmlspecialchars($_GET['type']));
$msg=addslashes(htmlspecialchars($_GET['msg']));
$sub=addslashes(htmlspecialchars($_GET['sub']));
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
@include "db.php";
$id=$_SESSION['quiz_login_id'];
$y=mysql_query("INSERT INTO `sdcac_database`.`quiz_msgs` (`id`, `sno`, `sub`, `msg`, `type`, `ip`, `time`) VALUES ('$id', NULL, '$sub', '$msg', '$type', '$ip', '$time')");
if($y==true)
	echo "<center><font color=black>Message Send Successfully.</font></center>";
?>
