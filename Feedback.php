<?php
 session_start();
?>
<script >
function sendfeedback()
{
	var type=$("#ptype").val();
	var sub=$("#sub").val();
	var msg=$("#msg").val();
	if(type==false || sub==false || msg==false)	
		var tt="";
	else
		{
			$("#fbutton").hide(3000);
			$("#status").html("<font color=whte><center>Sending...</center></font>");
			$.post("feedsend.php?type="+type+"&sub="+sub+"&msg="+msg,function(profiledata){
			$("#status").html(profiledata);
			});
			
		}
}

</script>

<?php
echo "<div id='status' style='position:absolute;top:35%;left:35%;'></div>";
echo "<font color=grey size=5 style='position:absolute;top:85%;left:44%;'>SDCAC</font>";
echo "
<div style='position:absolute;top:20%;left:30%;'>
<h3><center>Contact Us Mr./Mrs. <font color=CC0000>".$_SESSION['quiz_login_id']."</font></center></h3>
<img src='images/profile.png'> <br>
<table border=0 style='position:absolute;top:25%;left:10%;color:black;font-size:16px;width:400px;'>
<tr><td colspan=3><centeR></center></td></tr>

<tr><td width=5%><font >Feedback type</td><td>:</td><td></td><td>
<select id='ptype' style='background-color:white;border-color:white;'>
<option value=''>Choose Feedback Type</option>
<option value='suggestion'>Suggestion</option>
<option value='problem'>Problem</option>
<option value='error'>Report Error</option>
</select></td></tr>
<tr><td>Subject</td><td>:</td><td></td><td>
<input type='text' name='subject' id='sub' maxlength=20 style='background-color:white;border-color:white;' />
</td></tr>
<tr><td>Message</td><td>:</td><td></td><td>
<textarea id='msg' cols=25 rows=5 style='background-color:white;;' maxlength=500>

</textarea>
</td></tr>";


echo "<tr><td colspan=3><center><input type='button' value='Post Message' id='fbutton' style='background-color:white;padding-left:10px;border:1px solid;width:130px;height:30px;-moz-border-radius:10px;border-radius:10px;' onclick=\"sendfeedback()\"></center>
</center></td></tr>";

echo "
</table>
</div>";


?>
