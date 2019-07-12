<?php
session_start();
$id=addslashes(htmlspecialchars($_GET['mid']));
$pwd=addslashes(htmlspecialchars($_GET['pwd']));
@include "db.php";
$p=mysql_query("SELECT name,password FROM mainquiz_users WHERE idno='$id' ") or die(mysql_error());
if(mysql_num_rows($p)>0)
	{
	
		$ro=mysql_fetch_array($p);
		if($ro['password']==$pwd)
			{
			if($id=="N100704" || $id=="N100602" )
					{
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$id;
					$_SESSION['name']=$ro['name'];
					$_SESSION['quiz_admin_id']=$id;
					echo "<script>window.location.href='index.php';</script>";
					}
				else
					{
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$id;
					$_SESSION['name']=$ro['name'];
					echo "<script>window.location.href='index.php';</script>";
					}
			
			
			
			
			}
		else
			echo "<font color=white>2</font>";
	}
else
	echo "<font color=white>1</font>";
?>
