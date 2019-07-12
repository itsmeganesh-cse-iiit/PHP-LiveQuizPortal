<?php
session_start();
@include "db.php";
$ip=$_SERVER['REMOTE_ADDR'];
$coff=$_GET['coff'];
$noq=$_GET['noq'];
$qmode=$_GET['qmode'];

if($qmode=="text"){
$allqsts=addslashes(htmlspecialchars($_GET['totalqsts']));
$allopts=addslashes(htmlspecialchars($_GET['totalopts']));
$realans=addslashes(htmlspecialchars($_GET['mainans']));
//remove last
$allqsts=addcslashes($allqsts,'&');
$allopts=addcslashes($allopts,'&');

}
else if($qmode=="pdf")
	{
	$pdfanswers=$_GET['pdfanswers'];
	if(isset($_SESSION['tmppdffilename']))
		$pdfpath="pdfupload/uploads/".$_SESSION['tmppdffilename'];
	else
		$pdfpath="ganesh";
	}
else if($qmode=="image")
	{
	$imganswers=$_GET['imganswers'];
	$imagestr=$_SESSION['fullimagesstr'];
	}
$tlimit=$_GET['tlimit'];

$qname=$_GET['quizname'];
$kmain=mysql_query("SELECT MAX(qlevel) FROM quiz_db WHERE qname='$qname'");
$k2main=mysql_fetch_array($kmain);
$mainlevel=$k2main[0]+1;
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
$cids='';

$q1=mysql_query("SELECT MAX(qno) from quiz_db") or die(mysql_error());
$k=mysql_fetch_array($q1);
if($k[0]>0)
	$k[0]++;
else
	$k[0]=1;
$qno=$k[0];
$lvlflag=$noq-$coff;
$mainquery='';
if($qmode=="text")
	$mainquery=mysql_query("INSERT INTO `sdcac_database`.`quiz_db` (`qno`, `qname`, `noq`,`coff`,`lvlflag`,`timedur`,`allqst`, `allopts`, `realans`, `cmpltedids`, `ip`,`time`,`mode`,`qlevel`) VALUES ('$k[0]', '$qname', '$noq','$coff','$lvlflag','$tlimit','$allqsts', '$allopts', '$realans', '$cids', '$ip','$time','$qmode','$mainlevel')") or die(mysql_error());
else if($qmode=="pdf")
	{
	$mainquery=mysql_query("INSERT INTO `sdcac_database`.`quiz_db` (`qno`, `qname`, `noq`, `coff`, `lvlflag`, `timedur`, `allqst`, `allopts`, `allimgstr`, `pdfpath`, `realans`, `cmpltedids`, `ip`, `time`, `mode`, `qlevel`) VALUES ('$k[0]', '$qname', '$noq', '$coff', '$lvlflag', '$tlimit', '', '', '', '$pdfpath', '$pdfanswers', '$cids', '$ip', '$time', '$qmode','$mainlevel')");
	unset($_SESSION['tmppdffilename']);
	}
else if($qmode=="image")
	{
	$mainquery=mysql_query("INSERT INTO `sdcac_database`.`quiz_db` (`qno`, `qname`, `noq`, `coff`, `lvlflag`, `timedur`, `allqst`, `allopts`, `allimgstr`, `pdfpath`, `realans`, `cmpltedids`, `ip`, `time`, `mode`, `qlevel`) VALUES ('$k[0]', '$qname', '$noq', '$coff', '$lvlflag', '$tlimit', '', '', '$imagestr', '', '$imganswers', '$cids', '$ip', '$time', '$qmode','$mainlevel')");
	unset($_SESSION['tmppdffilename']);
	}
if($mainquery==true)
	echo "<font color='green' size=4>Submitted Successfully ..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
else
	echo "<font color='green' size=4>Something Bonky Happen...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
echo "<font color=white>Submitted Succssfully</font>"

?>
