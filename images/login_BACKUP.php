<?php

session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>
</head>
<body>
<form method=post action="">
<table border="1" style='position:absolute;top:30%;left:30%;width:40%;height:35%;'>

<tr>

<td width='38%'>
<table border='1' style='position:absolute;top:17%;left:4%;width:30%;height:150px;'>
<tr><td align='center'>Login Pic</td></tr>
</table>
</td>

<td>
<table border='0' style='position:absolute;top:30%;left:50%;width:;height:;'>
<tr><td><input type='text' name='uid' /></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td><input type='password' name='upwd' /></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td align='center'><input type='submit' value='Login' name="loginsub" />&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' /></td></tr>
</table>


</tr>

</table>

</form>
</body>
</html>

<?php
if(isset($_POST['loginsub']))
	{
	$conn=mysql_connect("localhost","root","9014734454") or die(mysql_error());
	mysql_select_db("sdcac_database",$conn);
	$uname=$_POST['uid'];
	$pwd=$_POST['upwd'];
	$q=mysql_query("SELECT * FROM students WHERE ID='$uname'");
	if(mysql_num_rows($q)>0)
		{
		$k=mysql_fetch_array($q);
		if($k['status']!=1)
			{
			if($k['pwd']==$pwd)
				{
				if($uname=="N100704" || $uname=="N100775" )
					{
					echo "welcome $uname ADMIN";
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['branch']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$uname;
					$_SESSION['branch']=$k['Branch'];
					$_SESSION['name']=$k['Name'];
					$_SESSION['quiz_admin_id']=$uname;
					}
				else
					{
					echo "welcome $uname";
					unset($_SESSION['quiz_login_id']);
					unset($_SESSION['branch']);
					unset($_SESSION['name']);
					$_SESSION['quiz_login_id']=$uname;
					$_SESSION['branch']=$k['Branch'];
					$_SESSION['name']=$k['Name'];
					}
				}
			else
				echo "wrong pwd";
			}
		else
			echo "Try with another password ";
		}

	
	}

?>
