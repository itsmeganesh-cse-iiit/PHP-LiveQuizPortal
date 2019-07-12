<script >
function changeprofile()
{
	var name=$("#username").val();
	var email=$("#email").val();
	var crpwd=$("#crpassword").val();
	var npwd=$("#npassword").val();
	var ncpwd=$("#ncpassword").val();
	if(name==false || email==false )
		var kk="";
	else
		{
			if(crpwd!=false)
				{
					if(npwd==false || ncpwd==false)
						var pk="";
					else
						{
							if(npwd!=ncpwd)
								alert("Password and confirm password must be Same");
							else
								{
									$("#status").html("<center>Loading...</center>");
									$.post("profilechange.php?mode=1"+"&name="+name+"&email="+email+"&crpwd="+crpwd+"&npwd="+npwd+"&ncpwd="+ncpwd,function(data){
									$("#status").html(data);	
									});
								}
						}
				}
				else
					{
						$("#status").html("<center>Loading...</center>");
						$.post("profilechange.php?mode=2"+"&name="+name+"&email="+email,function(data){
						$("#status").html(data);	
						});
					}
		}
		
}

</script>
<?php
session_start();
echo "<font color=grey size=5 style='position:absolute;top:85%;left:44%;'>SDCAC</font>";
echo "
<div style='position:absolute;top:20%;left:30%;'>
<h3><center><font color=CC0000>".$_SESSION['quiz_login_id']."</font>'s Profile</center></h3>
<img src='images/profile.png'> <bR><br>
<table border=0 style='position:absolute;top:20%;left:10%;color:black;font-size:16px;width:400px;'>

";
echo "<tr><td colspan=3><div id='status'></div></td></tr>";

echo "<tr><td colspan=3><b>Note:</b>&nbsp;<font color='grey' size=2>You can also update NAME,EMAIL fields without entering your passwords.</font></td></tr>";

@include "db.php";
$id=$_SESSION['quiz_login_id'];
$o=mysql_query("SELECT * FROM mainquiz_users WHERE idno='$id'");
$row=mysql_fetch_array($o);
echo "<tr><td>Name</td><td>:</td><td><input type='text' style='border:1px;' value='".$row['name']."' name='username' id='username'></td></tr>";
echo "<tr><td>Email</td><td>:</td><td><input type='text' style='border:1px;' value='".$row['email']."' name='email' id='email'></td></tr>";
echo "<tr><td>Current password</td><td>:</td><td><input type='password' style='border:1px;' value='' name='crpassword' id='crpassword'></td></tr>";
echo "<tr><td>New Password</td><td>:</td><td><input type='password' style='border:1px;' value='' name='npassword' id='npassword'></td></tr>";
echo "<tr><td>New Confirm Password</td><td>:</td><td><input type='password' style='border:1px;' value='' name='ncpassword' id='ncpassword'></td></tr>";
echo "<tr><td colspan=3><center><input type='button' onclick='changeprofile()' id='cprofile' value='Change Settings' style='border:1px solid;border-color:black;'/></center></td></tr>";

echo "
</table>
</div>";
?>
