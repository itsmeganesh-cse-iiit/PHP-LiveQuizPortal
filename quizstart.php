<html>
<body >
<link href="styles/kendo.common.min.css" rel="stylesheet">
<link href="styles/kendo.default.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/kendo.web.min.js"></script>
<script src="content/shared/js/console.js"></script>
<link rel="stylesheet" href="css/jquery.countdown.timer.css" type="text/css" />
<link rel="shortcut icon" href="images/rgukt.png" />
<script>

function disableselect(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
function gani(){
	return false;
	}
function ganifun()
{
$("#qdisp").load("questions.php");
}

</script>
<script src='script.js'></script>

<?php
session_start();
if(!isset($_SESSION['new_quiz_visits']))
	{

		@include "db.php";
		$p=mysql_query("SELECT no FROM quiz_visits WHERE id='N100704'");
		$go=mysql_fetch_array($p);
		$visits=$go['no']+1;
		$_SESSION['new_quiz_visits']=$visits;
		mysql_query("UPDATE `quiz_visits` SET `no`='$visits' WHERE 1");
	}
//if($_SESSION['alreadystart']==1)
if(!isset($_SESSION['resultsdone']))
{
// Finally Change this
//$_SESSION['alreadystart']=1;
unset($_SESSION['resultsdone']);
if(isset($_SESSION['timedur']))
{

?>
<script>

      $(function () {

        $('#ganiform').on('submit', function (e) {
		var cyes=confirm("Are you Sure ?...");
		if(cyes==true)
			{
			$("#submitexam").hide();
			e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'quizpost.php',
            data: $('form').serialize(),
            success: function (gdata) {
              alert(gdata);
			  setTimeout(function(){window.location.href="index.php";},200);
            }
          });

          $("#open2").show();
			}
		else
			{
				return false;
			}


        });

      });
      $(document).bind('contextmenu', function (e) {
		  e.preventDefault();

		});
    </script>
<title><?php echo "&nbsp;&nbsp;".strtoupper($_SESSION['qname'])." - ".$_SESSION['quiz_login_id']." QUIZ";?> </title>


<body>

<form id='ganiform' >



            <div class="k-rtl">

                <div id="vertical">
                    <div id="top-pane">
                        <div id="horizontal" style="height: 100%; width: 100%;">
                            <div id="left-pane">
                                <div class="pane-content">
					<div id='qdisp'>
							<center><img src='images/info.jpg'>
							<br><font color=red size=6>Read Instructions Carefully</font></center>
					</div>

                                   <!--- <h3>Exam Paper Plugin</h3>--->

                                </div>
                            </div>
                            <div id="center-pane">
                                <div class="pane-content">
									<div id='optdisplay' >
									<?php
									$total=$_SESSION['noq'];
									echo "<table style='position:absolute;top:5%;'>";
									for($i=1;$i<=$total;$i++)
									{
									$options=array("a","b","c","d","e");
									shuffle($options);

									echo "<tr><td>".$i.".</td><td><input type='button' id='q".$i.$options[0]."' onclick=\"change('q".$i.$options[0]."','q".$i."')\" style='border:1px;background-color:#D8D8D8;' value='".strtoupper($options[0])."'></td><td><input type='button' id='q".$i.$options[1]."' onclick=\"change('q".$i.$options[1]."','q".$i."')\" style='border:1px;background-color:#D8D8D8;' value='".strtoupper($options[1])."'></td><td><input type='button' onclick=\"change('q".$i.$options[2]."','q".$i."')\" id='q".$i.$options[2]."' style='border:1px;background-color:#D8D8D8;' value='".strtoupper($options[2])."'></td><td><input type='button' id='q".$i.$options[3]."' onclick=\"change('q".$i.$options[3]."','q".$i."')\" style='border:1px;background-color:#D8D8D8;' value='".strtoupper($options[3])."'></td><td><input type='button' onclick=\"change('q".$i.$options[4]."','q".$i."')\" id='q".$i.$options[4]."' style='border:1px;background-color:#D8D8D8;' value='".strtoupper($options[4])."'></td></tr>";
									echo "
									<input type='radio' id='q".$i."ar' value='a'  style='visibility:hidden;' name='q".$i."' >
									<input type='radio' id='q".$i."br' value='b' style='visibility:hidden;' name='q".$i."'  >
									<input type='radio' id='q".$i."cr' value='c' style='visibility:hidden;'  name='q".$i."' >
									<input type='radio' id='q".$i."dr' value='d' style='visibility:hidden;'  name='q".$i."'  >
									<input type='radio' id='q".$i."er' value='e' style='visibility:hidden;'  name='q".$i."'  >

									<br>";
									}
									echo "</table>";
									?>

                                    </div>
                                </div>
                            </div>
                            <div id="right-pane">
                                <div class="pane-content">
                                   <h3><img src='images/rgukt.png' width=11%><sup>&nbsp;&nbsp;&nbsp;Student Details</sup></h3>
									<table border=0 width=300px style='padding-left:0px;' >
									<tr><td ><b>ID</b></td><td>:</td><TD><?php echo $_SESSION['quiz_login_id'];?></TD></tr>
									<tr><td ><b>QUIZ</b></td><td>:</td><TD><?php echo strtoupper($_SESSION['qname']);?></TD></tr>
									<tr><td ><b>QNO</b></td><td>:</td><TD><?php echo $_SESSION['quizlevel'];?></TD></tr>
									<tr><td ><b>NOQ</b></td><td>:</td><TD><?php echo $_SESSION['noq'];?></TD></tr>
									<tr><td ><b>TIME</b></td><td>:</td><TD><?php echo $_SESSION['timedur'];?><font size=1>Min</font></TD></tr>
									<tr><td ><b>CUTOFF</b></td><td>:</td><TD><?php echo $_SESSION['coff'];?></TD></tr>

									</table>
									<!----add----><br><br>
	<table>
	<tr><td align='center'><div id='open1' onclick="go('window1','open1','1')" style='cursor:pointer;color:red;padding-left:50px;'>Read Instructions

	</font></sub></div><br>
<div id='window1' ></div> </td></tr></table>

<div id='open2' onclick="go('window2','open2','2')" style='cursor:pointer;padding-left:50px;' id='resultsid'><font color=red></font>

	</font></sub></div><br>
<div id='window2' ></div>
									<!----->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="middle-pane">
                        <div class="pane-content">
                         	<!-------->
                         	<div><br><font size=3 style='font-weight:bold;'>Questions :</font>&nbsp;&nbsp;<span id='optdone'>0</span>&nbsp;/&nbsp;<?php echo $_SESSION['noq'];?></div>
							<div id='btdisplay'>
							<div class='k-button' style='position:absolute;top:40%;left:67%;' id='startexam'>Start Exam</div>
							</div>
							<div id='submitdisplay'></div>

<div id="counter" style='position:absolute;top:0%;left:85%;'>
<div id="counter_item1" class="counter_item">
<div class="front"></div>
<div class="digit digit0"></div>
</div>
<div id="counter_item2" class="counter_item">
<div class="front"></div>
<div class="digit digit0"></div>
</div>
<div id="counter_item3" class="counter_item">
<div class="front"></div>
<div class="digit digit_colon"></div>
</div>
<div id="counter_item4" class="counter_item">
<div class="front"></div>
<div class="digit digit0"></div>
</div>
<div id="counter_item5" class="counter_item">
<div class="front"></div>
<div class="digit digit0"></div>
</div>
</div>
				<!----->
                        </div>
                    </div>
                    <div id="bottom-pane">
                        <div class="pane-content" title='&copy;AnonymousTeam;'><center>&copy;Ganesh Koilada</center>
                        <b>24/7 STUDENT SERVICE </b><?php echo "<font style='float:right;'>".$_SESSION['new_quiz_visits']."</font>";?>
                        </div>
                    </div>
                </div>

            </div>

            <script>
				$("#open2").hide();
                $(document).ready(function() {
                    $("#vertical").kendoSplitter({
                        orientation: "vertical",
                        panes: [
                            { collapsible: false },
                            { collapsible: false,  resizable: false,size: "90px" },
                            { collapsible: true, resizable: false, size: "50px" }
                        ]
                    });

                    $("#horizontal").kendoSplitter({
                        panes: [
                            { collapsible: true, size: "62%" },
                            { collapsible: false ,resizable: false,size:"20%"},
                            { collapsible: true,size: "17%" }
                        ]
                    });
                });
            </script>

            <style scoped>
                #vertical {
                	height: 99%;
                	width: 99%;
                	margin: 0 auto;
                }
                #middle-pane {
                	background-color: rgba(60, 70, 80, 0.10);
                }
                #bottom-pane {
                	background-color: rgba(60, 70, 80, 0.15);
                }
                #left-pane {
                	background-color: rgba(60, 70, 80, 0.05);
                }
                #center-pane {
                	background-color: rgba(60, 70, 80, 0.05);
                }
                #right-pane {
                	background-color: rgba(60, 70, 80, 0.05);
                }
                .pane-content {
                	padding: 0 10px;
                }
            </style>

        </div>
<div id="log"> </div>
<div id="log2"> </div>
<script src="jquery.min.js"></script>
<script src="js/jquery.timeout.interval.idle.js" type="text/javascript"></script>
<script type="text/javascript">
       //CounterInit();
    </script>
  <script>

    $("#optdisplay").hide();
	$("#startexam").click(function(){
	ganifun();
	$("#optdisplay").show(1000);
	$("#btdisplay").hide(10);
	$("#submitdisplay").html("<input type='submit' value='Submit' name='submit' class='k-button' style='position:absolute;top:40%;left:67%;' id='submitexam' name='submitexam' >");
	CounterInit(<?php echo $_SESSION['timedur']*60;?>);
	<?php $_SESSION['examstartd']="ganesh";?>
	});

    </script>
  </form>
</body>
</html>
<?php
}
else
	echo "<script>window.location.href='index.php';</script>";
}
else{
	//Multiple tabs

	echo "<script>window.location.href='index.php';</script>";
}
?>



<!---new----->
<script>

					function go(dt,pt,type){
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

                        width: "90%",
                        height: "60%",
                        title: "Instructions About Quiz",
                        actions: [ "Maximize", "Close"],
                        content: "instructions.php"
                    });
						}
					else
						{
						window.kendoWindow({

                        width: "40%",
                        height: "80%",
                        title: "Results",
                        actions: [ "Maximize", "Close"],
                        content: "userresults.php"
                    });
						}

                    window.data("kendoWindow").center();
                 }

            </script>
            <style>
            #undo {
                    text-align: center;
                    position: absolute;
                    white-space: nowrap;
                    padding: 1em;
                    cursor: pointer;
                }
                .armchair {
                    float: left;
                    margin: 20px 30px;
                    text-align: center;
                }
                .armchair img {
                    display: block;
                    margin-bottom: 10px;
                }
            </style>


        </div>

  <?php
