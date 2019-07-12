<?php
session_start();
if(!isset($_SESSION['tzid']))
{
$brow=$_SERVER['HTTP_USER_AGENT'];
if(!substr_count($brow,"Firefox/3.6"))
	{

if(!isset($_SESSION['new_quiz_visits']))
	{

		@include "db.php";
		$p=mysql_query("SELECT no FROM quiz_visits WHERE id='N100704'");
		$go=mysql_fetch_array($p);
		$visits=$go['no']+1;
		$_SESSION['new_quiz_visits']=$visits;
		mysql_query("UPDATE `quiz_visits` SET `no`='$visits' WHERE 1");
	}
if(isset($_SESSION['qno']))
{
	unset($_SESSION['qno']);
	unset($_SESSION['noq']);
	unset($_SESSION['mode']);
	unset($_SESSION['coff']);
	unset($_SESSION['timedur']);
	unset($_SESSION['qname']);

}
if(isset($_SESSION['resultsdone']))
	unset($_SESSION['resultsdone']);
?>
<!DOCTYPE html>
<html>
<head>

    <title><?php
    $id="GUEST";
    if(isset($_SESSION['quiz_login_id']))
		$id=$_SESSION['quiz_login_id'];
    echo " &nbsp;&nbsp;SDCAC USER - ".$id;?></title>


    <link href="styles/kendo.common.min.css" rel="stylesheet">
    <link href="styles/kendo.default.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
   <script src="js/kendo.web.min.js"></script>
    <script src="js/console.js"></script>
    <script src='script.js'></script>



    <link rel='stylesheet' href='popbox.css' type='text/css' media='screen' charset='utf-8'>
  <script type='text/javascript' charset='utf-8' src='popbox.js'></script>
  <style type='text/css' media='screen'>
    a { color:#999; text-decoration:none; }
    label { display: block; }
    #subForm{ margin: 25px; text-align:left }
    #uid{ padding:5px; width:90%; border:solid 1px #CCC;}
    #password1 { padding:5px; width:90%; border:solid 1px #CCC;}
    form textarea { padding:5px; width:90%; border:solid 1px #CCC; height:100px;}

    .box { width:300px; }

     footer {
       font-size:12px;
     }
     form a, footer a { color:#40738d; }
     .ganibutton{
		 border:solid 1px;
		 color:grey;
		 }
	.ganibutton:hover
	{
		background-color:grey;
		color:white;
	}
	#gcancel{
		border:solid 0px;
		text-decoration:none;
		width:120px;
		height:40px;
		}
  </style>
  <script type='text/javascript' charset='utf-8'>

    $(document).ready(function(){
      $('.popbox').popbox();
    });

    function loginthis()
    {
		var iid=$("#uid").val();
	    var pwd=$("#password1").val();
		if(iid==false || pwd==false)
			var tmp="";
		else
			{
			$.post("logincheck.php?mid="+iid+"&pwd="+pwd,function(superdata){
			$("#uinfo").html(superdata);
			if(superdata=="<font color=white>1</font>")
				alert("Invalid USER ID");
			else if(superdata=="<font color=white>2</font>")
				alert("Password Wrong");
			else
				{
				$('.popbox').hide(1000);
				$("#Registration").hide(1000);
				}
			});

			}

		return false;
	}
	function logoff(target)
	{
		$.post("logout.php?done=yes",function(data675){
		$("#"+target).hide(1000);
		});
		$('.popbox').show(1000);
		$("#Registration").show(1000);


	}
	function logoff2(target)
	{
		$.post("logout.php?done=yes",function(data2829){
		$("#"+target).hide(1000);
		});
		window.location.reload();

	}


  </script>



</head>
<body style='background-image:url(images/bg.PNG);background-repeat:repeat-x;'>
<img src='images/logo.png' style='width:10%;height:20%;'>
<font style='position:absolute;top:2%;left:12%;' size=5>STUDENT DEVELOPMENT</font>
<font style='position:absolute;top:7%;left:12%;' size=3>& Campus Activities Cell</font>
&nbsp;&nbsp;<img src='images/rgukt.png' style='position:absolute;top:11%;left:;'>
<font color=black style='position:absolute;top:12%;left:14%;'>AP IIIT-N</font>
<link rel="shortcut icon" href="images/rgukt.png" />
<img src='images/home.png' style='position:absolute;top:3%;right:1%;cursor:pointer;' onclick="window.location.reload();" >
<!---<img src='images/quiz.png' style="position:absolute;top:0%;left:20%;height:22%;width:55%;">-->
<div id='main'>


<div id='uinfo'></div>

  <?php
  if(!isset($_SESSION['quiz_login_id']))
  {
  ?>

   <a class='open'   href='#' id='Registration' style='position:absolute;top:1%;right:3%;cursor:pointer;' onclick="go('register','Registration','1','sub','msgid')">
     <span  > Register </span></a>
      <div id='register' ></div>
	<div class='popbox' style=''>
    <a class='open' href='#'>
    Login
    </a>

    <?php
}
else
	{
	echo "
	<table  style='position:absolute;top:0%;right:5%;' id='userinfo'><tr><td>".""."</td><td>&nbsp;<font color=grey>
	 <ul id='menu' style='width:125px;'>
                    <li>
                        <img src='images/userprofile.png'>".$_SESSION['quiz_login_id']."
                        <ul>
						<!--	<li><img src='images/home.png'>Home</li>-->
                           <!-- <li><img src='images/setting.png'>Edit Profile</li>-->
                          <!--  <li><img src='images/contactus.png'>Feedback</li>-->
                           <!-- <li><img src='images/yourscores.png'>Your Scores</li>-->
                         <!--   <li><img src='images/star.png'>Performance</li>-->
                             <li><img src='images/logout.png'>Logout</li>
                        </ul>
                    </li>
                   </ul>

	<br></td></tr></table>
	";
	echo "
	";
}
    ?>



    <div class='collapse'>
      <div class='box'>
        <div class='arrow'></div>
        <div class='arrow-border'></div>

        <form action="index.php" method="post" id="subForm" onsubmit='return loginthis()'>
          <div class="input">
            <input type="text" name="cm-name" id="uid" placeholder="N100704"  />
          </div>
          <div class="input">
            <input type="password" name="password1" id="password1" placeholder="SECRET" />
          </div>

          <input type="submit" value="LOGIN" class='ganibutton'  name='loginsubmit' /> <a href="#" class="close" id='gcancel'>Cancel</a>
        </form>

      </div>
    </div>
  </div>

	<div>


    </div>
   <div id='maindiv'>
    <div id="container">
        <div class="side" id="store" >
            <div class="toggle" style='cursor:pointer;width:40px;color:grey;margin-top:1px;'><img src='images/back.png' style="width:50px;"></div><br><HR>
            <div style='position:absolute;top:5%;padding-left:40%;' id='quizname'></div>
            <div style='position:absolute;top:18%;padding-left:25%;overflow:scroll;height:245px;width:200px;' id='avaquizs'>Ganesh</div>
        </div>

        <div class="side" id="library">
			<BR><CENTER><strong>AVALABLE QUIZS</strong><HR>
           <div style='' id=''>

						 <table style="">
							 <tr>
								<td>
									 <div id='aptitude' class='toggle' onclick="qtype('react')" style='cursor:pointer;'>React Js&nbsp;</div><Br>

								 </td>
							 </tr>
							 <tr>
							<td>
								<div id='verbal' class='toggle' onclick="qtype('verbal')" style='cursor:pointer;'>Verbal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br>

							</td>
							 </tr>
							 <tr>
								<td>
									<div id='cpro' class='toggle' onclick="qtype('cpro')" style='cursor:pointer;'>C Lang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><br>

								</td>
							 </tr>
							 <tr>
							<td>
								<div id='javapro' class='toggle' onclick="qtype('javapro')" style='cursor:pointer;'>Java&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><Br>

							</td>
							 </tr>

						</table>

						 <!-- <div id='javapro' class='toggle' onclick="qtype('react')" style='cursor:pointer;'>6.React&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><Br> -->

           </div>
        </div>
    </div>

    <div id="container2" style='background-color:white;'><BR>
		 <CENTER><strong>NOTIFICATIONS</strong><HR>
        <div  id="notifications" style='padding-left:10%;'>


	<?php
	@include "db.php";
	$jum=mysql_query("SELECT postid,msgtitle,poby,time FROM quiz_notifications ORDER BY postid DESC  LIMIT 5");
	$i=1;
	echo "<table>";
	date_default_timezone_set("Asia/Kolkata");
	setlocale(LC_ALL,"hu_HU.UTF8");
	$ctime=(strftime("%Y. %B %d. %A."));
	while($row=mysql_fetch_array($jum))
	{
	echo "
	<tr><td><div id='open".$i."' onclick=\"go('window".$i."','open".$i."','2','".$row['msgtitle']."','".$row['postid']."')\" style='cursor:pointer;'>".$i.".".$row['msgtitle']."<sub><font size=1>".$row['poby']."&nbsp;
	";
	if(substr_count($row['time'],$ctime)>0)
		echo "<img src='images/new.GIF'>";

	echo "
	</font></sub></div><br>
<div id='window".$i."' ></div> </td></tr>
	";
	$i++;
	}
	echo "</table>";
    ?>



        </div>


    </div>

    <div id="container3" style='background-color:white;'>
		<BR>
		 <CENTER><strong>Top Scores</strong><HR>
        <div  class='side2' id="topscores" >
      <!------>

	  <!-- <img src='images/event.png' style='width:200px;height:200px;'> -->
      <?php

      @include "db.php";
      //one
      $flv=mysql_query("SELECT id,score,noq FROM quiz_top_scores WHERE qname='react' ORDER BY percentage DESC LIMIT 1");
      $flvf=mysql_fetch_array($flv);
      $apt_top=$flvf['score'];
      echo "<B>React</B>: ".$flvf['id']." (".$flvf['score']." / ".$flvf['noq'].")<BR><bR>";

	  $flv=mysql_query("SELECT id,score,noq FROM quiz_top_scores WHERE qname='verbal' ORDER BY percentage DESC LIMIT 1");
      $flvf=mysql_fetch_array($flv);
      $apt_top=$flvf['score'];
      echo "<B>VERBAL</B> &nbsp; &nbsp;:&nbsp;&nbsp;".$flvf['id']." (".$flvf['score']." / ".$flvf['noq'].")<bR><bR>";


	   $flv=mysql_query("SELECT id,score,noq FROM quiz_top_scores WHERE qname='reasoning' ORDER BY percentage DESC LIMIT 1");
      $flvf=mysql_fetch_array($flv);
      $apt_top=$flvf['score'];
      echo "<B>REASONING</B>: ".$flvf['id']."(".$flvf['score']." / ".$flvf['noq'].")<bR><bR>";

       $flv=mysql_query("SELECT id,score,noq FROM quiz_top_scores WHERE qname='cpro' ORDER BY percentage DESC LIMIT 1");
      $flvf=mysql_fetch_array($flv);
      $apt_top=$flvf['score'];
      echo "<B>C PRO</B>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:&nbsp;&nbsp;".$flvf['id']." (  ".$flvf['score']." / ".$flvf['noq']." )<bR><bR>";


	   $flv=mysql_query("SELECT id,score,noq FROM quiz_top_scores WHERE qname='javapro' ORDER BY percentage DESC LIMIT 1");
      $flvf=mysql_fetch_array($flv);
      $apt_top=$flvf['score'];
      echo "<B>JAVA</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;&nbsp;".$flvf['id']." (".$flvf['score']." / ".$flvf['noq'].")<bR><bR>";








      ?>


      <!---->
        </div>


    </div>

    <script>
        var effect = kendo.fx("#container").flipHorizontal($("#library"), $("#store")).duration(1000),
            reverse = false;

        $(".toggle").click(function() {
            effect.stop();
            reverse ? effect.reverse() : effect.play();
            reverse = !reverse;
        });
        $(document).bind('contextmenu', function (e) {
		  e.preventDefault();

		});

    </script>

    <style>
        #container {
            position: absolute;
            top:30%;
			left:10%;
            width: 280px;
            height: 300px;
            margin: 0 auto;
            background-color: #000;
            border: 10px solid #000;
            border-radius: 20px;
            box-shadow: 0 0 0 2px #ccc;
        }
        #container2 {
            position: absolute;
            top:30%;
			left:40%;
            width: 280px;
            height: 300px;
            margin: 0 auto;
            background-color: #000;
            border: 10px solid #000;
            border-radius: 20px;
            box-shadow: 0 0 0 2px #ccc;
        }

        #container3 {
            position: absolute;
            top:30%;
			left:70%;
            width: 280px;
            height: 300px;
            margin: 0 auto;
            background-color: #000;
            border: 10px solid #000;
            border-radius: 20px;
            box-shadow: 0 0 0 2px #ccc;
        }

        .side {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        #notifications
        {
			background-color:white;
		}

        .side button {
            background: transparent;
            border-style: none;
            border-radius: 3px;
            margin: 8px 0 0 9px;
            color: #fff;
            line-height: 18px;
            padding: 3px 9px 4px;
            text-shadow: 0 -1px 0 rgba(0,0,0,.3);
            cursor: pointer;
        }

        #library {
            background-color:white;LO
        }

        #library button {
             background: -moz-linear-gradient(top, rgba(79,79,79,1) 0%, rgba(39,39,39,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(79,79,79,1)), color-stop(100%,rgba(39,39,39,1)));
            background: -webkit-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: -o-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: -ms-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: linear-gradient(to bottom, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            -webkit-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
            -moz-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
            box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
        }

        #store {
            background-color:white;
        }

        #store button {

            background: -moz-linear-gradient(top, rgba(79,79,79,1) 0%, rgba(39,39,39,1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(79,79,79,1)), color-stop(100%,rgba(39,39,39,1)));
            background: -webkit-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: -o-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: -ms-linear-gradient(top, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            background: linear-gradient(to bottom, rgba(79,79,79,1) 0%,rgba(39,39,39,1) 100%);
            -webkit-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
            -moz-box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
            box-shadow: 0 0 0 1px rgba(255,255,255,.16), inset 0 0px 0 1px rgba(0,0,0,.40);
        }
    </style>
</div>




<!------>






            <script>

					function go(dt,pt,type,msub,msgid){
					$("#"+pt).click( function (e) {
                        window.data("kendoWindow").open();
                    });

                    $("#close").click( function (e) {
                        window.data("kendoWindow").close();
                    });


                    $("#center").click( function (e) {
                        window.data("kendoWindow").center();
                    });



                    var window = $("#"+dt);
					var tmp='';
					if(type==1)
						{
						window.kendoWindow({

                        width: "52%",
                        height: "70%",
                        title: ""+pt,
                        actions: [ "Maximize", "Close"],
                        content: "reg.php"
                    });
						}
					else
						{

						$.post("notesession.php?poid="+msgid,function(data){
						$("#uinfo").html("<Br><center><img src='loading.gif'></center></br>");
						$("#uinfo").html(data);
						});

						window.kendoWindow({

                        width: "50%",
                        height: "50%",
                        title: "Notification",
                        actions: [ "Maximize", "Close"],
                        content: "notifdisplay.php"
                    });
						}

                    window.data("kendoWindow").center();
                 }
            </script>
            <script>

                $(document).ready(function() {

                function onSelect(e) {
                    var name=$(e.item).children(".k-link").text();
                    if(name=="Logout")
						{
							logoff2("userinfo");
							logoff("userinfo1");
						}
					else if(name=="Feedback")
						{
							$("#maindiv").html("<center><img src='images/boxloading.gif' style='position:absolute;top:40%;left:50%;'/></center>");
							$("#maindiv").load(name+".php");
						}
					else if(name=="Edit Profile")
						{
							$("#maindiv").html("<center><img src='images/boxloading.gif' style='position:absolute;top:40%;left:50%;'/></center>");
							$("#maindiv").load("userprofile"+".php");
						}
					else if(name=="Your Scores")
						{
							$("#maindiv").html("<center><img src='images/boxloading.gif' style='position:absolute;top:40%;left:50%;'/></center>");
							$("#maindiv").load("userscores"+".php");
						}
					else if(name=="Performance")
						{
							$("#maindiv").html("<center><img src='images/boxloading.gif' style='position:absolute;top:40%;left:50%;'/></center>");
							$("#maindiv").load("chart"+".php");
						}
					else if(name=="Home")
						{
							window.location.reload();
						}
                }


                $("#menu").kendoMenu({
                    select: onSelect,

                });
            });
            </script>


   </div>
</div>
<?php
echo "<div style='position:absolute;top:90%;right:10%;'>".$_SESSION['new_quiz_visits']."</div>";
?>
<div style='position:fixed;top:0%;right:45%;'><img src='images/nuz.png'></div>
<div title='&copy;AnonymousTeam;' style='position:absolute;top:97%;left:40%'><center>&copy;<font title='&copy;AnonymousTeam;' > Ganesh Koilada CSE IIIT</font></center>
</div>
<?php
}
else
	echo "<center><font color=red><h1>Your Browswer not Supported<br><blink>Kindly Upgrade it.</blink></h1><br>Download Firefox <a href='http://10.11.4.25/Softwares/Firefox_browser_30.zip' >Download Firefox</a></center>";
}
else
	{
	echo "<script>alert('First login to Teckzite and then take Exam');window.location='http://10.11.3.11/tz';</script>";
	}
	?>
