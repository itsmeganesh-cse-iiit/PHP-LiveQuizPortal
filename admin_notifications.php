<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js"></script>
</head>
<BODY background='images/background.png'>
<?php
session_start();
if(isset($_SESSION['quiz_login_id']))
{
?>
<body>
	<img src='images/header.png' style='position:fixed;top:0%;left:0%;width:100%;height:120px;'>

	<table border=0 style='color:white;position:absolute;top:35%;left:30%;width:;height:;'>
	<tr><td></td><td><B><div id='notif'></div></b></td></tr>
	<tr><td></td><td><B><h2>Post a Notification </h2></b></td></tr>


	<tr><td></td><td></td></tr>
	<tr><td>Message Title</td><td><input type='text' id='msgtitle' maxlength=15></td></tr>
	<tr><td>Message</td><td><textarea rows='4' cols='40' id='msgbody'></textarea></td></tr>
	<tr><td>Posted By</td><td>
	<select id='po'>
	<option value=''>Choose Po</option>
	<option value="Ganesh Koilada">Ganesh Koilada</option>
	<option value='Organizers'>Organizer</option>
	<option value='WebTeam'>WebTeam</option>
	</select>
	</td></tr>
	<tr><td>Post To</td><td><select id='postto'>
	<option value=''>Choose Post to</option>
	<option value='notificationarea'>Notifications</option>
	</select></td></tr>
	<tr><td></td></tr>
	<tr><td></td><td><button onclick='postmsg()'>Send Msg</button></td></tr>



	</table>

</body>
</html>

<?php

}
else
	echo "<script>window.location.href='index.php';</script>";
?>
