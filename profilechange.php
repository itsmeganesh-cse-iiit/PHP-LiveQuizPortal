<?php
session_start();
$mode=$_GET['mode'];
$name=$_GET['name'];
$email=$_GET['email'];
$id=$_SESSION['quiz_login_id'];
@include "db.php";
if($mode==1)
	{
		$crpwd=$_GET['crpwd'];
		$npwd=$_GET['npwd'];
		$ncpwd=$_GET['ncpwd'];
		$check=mysql_query("SELECT password FROM mainquiz_users WHERE idno='$id'");
		$row=mysql_fetch_array($check);
		if($row['password']==$crpwd)
			{
			$my=mysql_query("UPDATE mainquiz_users SET name='$name',email='$email',password='$npwd' WHERE idno='$id'");
			if($my==true)
				echo "<center>Updated Successfully.</center>";
			}
		else
			{
				echo "<center>Entered Current Password is Wrong. </center>";
			}
	}
else
	{
		$my=mysql_query("UPDATE mainquiz_users SET name='$name',email='$email' WHERE idno='$id'");
		if($my==true)
			echo "<center>Updated Successfully.</center>";
	}

?>
