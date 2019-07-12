<?php
session_start();
@include "db.php";
$poid=$_SESSION['msgid'];
$p=mysql_query("SELECT * FROM quiz_notifications WHERE postid='$poid'");
$k=mysql_fetch_array($p);
echo "<br><br><br><font size=3><b><u>".strtoupper($k['msgtitle'])."</u></b></font><br>";
echo  "<font size=1>".$k['time']."</font>";
echo "
<html>
<style type='text/css'>a:link {text-decoration:none;color:gray}a:visited {text-decoration:none;color:#000000a:hover {text-decoration:none;color:green}a:active {text-decoration:none;color:#000000}</style>
<body><table width='100%'><tr><td style='text-align:justify;' >
<h4 style='margin-left:50px;margin-top:10px;margin-right:50px; '>
		".$k['msgbody']."
	</h4>
	<h3 align='right' style='padding-right:30px;'><font  >Posted by /-</font><br><font >".$k['poby']."</font></h4>
</td></tr></table></body>
</html>
   
   ";

?>

