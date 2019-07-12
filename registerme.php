<?php
$id=addslashes(htmlspecialchars($_GET['id']));
$name=addslashes(htmlspecialchars($_GET['name']));
$pwd=addslashes(htmlspecialchars($_GET['pwd']));
$cpwd=addslashes(htmlspecialchars($_GET['cpwd']));
$sq=addslashes(htmlspecialchars($_GET['sq']));
$sqa=addslashes(htmlspecialchars($_GET['sqa']));
$email=addslashes(htmlspecialchars($_GET['email']));
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Kolkata");
setlocale(LC_ALL,"hu_HU.UTF8");
$time=(strftime("%Y. %B %d. %A."))." ".date("h:i:sa");
if(substr_count($id,"N09")>0 || substr_count($id,"N10")>0 || substr_count($id,"N11")>0 || substr_count($id,"N12")>0 || substr_count($id,"N13")>0 || substr_count($id,"N14")>0)
{
if($pwd!=$cpwd)
	echo "Password And Confirm Password Must be Same";
else
	{
		@include "db.php";
		$q=mysql_query("SELECT name FROM mainquiz_users WHERE idno='$id'");
		if(mysql_num_rows($q)>0)
			echo "This ID Number is Already Registered in the Database";
		else
			{
				$p=mysql_query("INSERT INTO `sdcac_database`.`mainquiz_users` (`idno`, `name`, `password`, `sq`, `answer`, `email`, `time`, `ip`) VALUES ('$id', '$name', '$pwd', '$sq', '$sqa', '$email', '$time', '$ip');");
				if($p==true)
					echo "You are Successfully Registred ..THANK YOU";
			}
	}
}
else
	echo "Invalid ID NUMBER";
?>
