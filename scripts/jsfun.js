var qnum='';
var x='';

function ganiuppercase(key)
	{
	var ktmp=$("#"+key).val();
	if(ktmp=='a' || ktmp=='b' || ktmp=='c' || ktmp=='d' || ktmp=='A' || ktmp=='B' || ktmp=='C' || ktmp=='D' || ktmp=='E' || ktmp=='e'){
	document.getElementById(key).value=ktmp.toUpperCase();}
	else{
	//do nothing
	}
	}
function filesuccess(fname)
	{
	alert(fname);
	return false;
	}
function pdfdisplay()
{
$("#qstdisplaydiv").html("");
qnum=document.getElementById("qno").value;

var pdfans='';
var pdfansformat='';
pdfansformat=pdfansformat+"<br><table><tr><td></td><td><center><iframe src='pdfupload/index.php' style='border:0px;width:600px;height:200px;'></iframe></center></td></tr><td></td><td><table border=0><tr>";
for(var h=0;h<qnum;h++)
	{
	if(h%5!=0){
		if(h<9)
			pdfansformat=pdfansformat+"<td>0"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\"  ></td>";
		else
			pdfansformat=pdfansformat+"<td>"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		}
	
	else
		{
		if(h<9)
			pdfansformat=pdfansformat+"</tr><tr><td>0"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		else
			pdfansformat=pdfansformat+"</tr><tr><td>"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		}
	} 
pdfansformat=pdfansformat+"</td></tr></table><table><tr><td width='63%'></td><td align='center'></td></tr></form></table>";
$("#ganiuploaddiv").html("jum jum");
$("#qstdisplaydiv").html(pdfansformat);

}

function imagedisplay()
{
$("#qstdisplaydiv").html("");
qnum=document.getElementById("qno").value;
$.post("temp.php?noq="+qnum,function(data){

});
var imgans='';
var imgansformat='';
imgansformat=imgansformat+"<br><table><tr><td></td><td><center><iframe src='imagesupload/index.php' style='border:0px;width:600px;height:200px;'></iframe></center></td></tr><td></td><td><table border=0><tr>";
for(var h=0;h<qnum;h++)
	{
	if(h%5!=0){
		if(h<9)
			imgansformat=imgansformat+"<td>0"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\"  ></td>";
		else
			imgansformat=imgansformat+"<td>"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		}
	
	else
		{
		if(h<9)
			imgansformat=imgansformat+"</tr><tr><td>0"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		else
			imgansformat=imgansformat+"</tr><tr><td>"+(h+1)+".</td><td><input type='text' maxlength='1' style='width:30px;text-align:center;' maxlength='a' id='q"+(h+1)+"ra' onkeyup=\"ganiuppercase('q"+(h+1)+"ra')\" ></td>";
		}
	} 
imgansformat=imgansformat+"</td></tr></table><table><tr><td width='63%'></td><td align='center'></td></tr></form></table>";
$("#ganiuploaddiv").html("jum jum");
$("#qstdisplaydiv").html(imgansformat);
}


function qstdisplay()
{
$("#qstdisplaydiv").html("");
qnum=document.getElementById("qno").value;
//qnum=4;
$(document).ready(function(){
$("#qstdisplaydiv").html(qnum);
var qformat='';
var i=0;
qformat="<table border=0>";
for(i;i<qnum;i++)
	{
	var mainqformat="<tr><td>Q."+(i+1)+") <input type='text' style='width:600px;' id=q"+(i+1)+" /><br>";
	var mainoptformat="&nbsp;&nbsp;&nbsp;<span style='padding-left:10%;'>A.&nbsp;<input type='text' id=q"+(i+1)+"a style='width:100px;'/>&nbsp;B.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"b />&nbsp;C.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"c />&nbsp;D.&nbsp;<input type='text' style='width:100px;' id=q"+(i+1)+"d />&nbsp;&nbsp;&nbsp;<input type='text' style='width:30px;text-align:center;' maxlength='1' id='q"+(i+1)+"ra' onkeyup=\"ganiuppercase('q"+(i+1)+"ra')\"></span></tr>";
	qformat=qformat+mainqformat+mainoptformat;
	}
	qformat=qformat+"</table>";
$("#qstdisplaydiv").html(qformat);
});
}
var qname='';
var coff='';
function postthisquiz()
{

var mymode=$("#rmode").val();
var tlimit=$("#tlimit").val();
qname=$("#qname").val();
coff=$("#coff").val();
if(mymode!='')
{
if(mymode=="text")
	{
var j=0;
var allqsts='';
var allopts='';
var allmainans='';
var flag1=0;
var opt1flag=0;
var opt2flag=0;
var opt3flag=0;
var opt4flag=0;
var ansflag=0;
for(j=0;j<qnum;j++)
	{
	$(document).ready(function(){
	var tmpstr=$("#q"+(j+1)).val();
	var rans=$("#q"+(j+1)+"ra").val();
	if(rans==false)
		ansflag=1;
	if(tmpstr==false)
		flag1=1;
	var opt1=$("#q"+(j+1)+"a").val();
	if(opt1==false)
		opt1flag=1;
	var opt2=$("#q"+(j+1)+"b").val();
	if(opt2==false)
		opt2flag=1;
	var opt3=$("#q"+(j+1)+"c").val();
	if(opt3==false)
		opt3flag=1;
	var opt4=$("#q"+(j+1)+"d").val();
	if(opt4==false)
		opt4flag=1;
	allopts=allopts+opt1+":"+opt2+":"+opt3+":"+opt4+"~";	
	allqsts=allqsts+tmpstr+"~";
	if(j!=qnum)
	   {
		allmainans=allmainans+(j+1)+"-"+rans.toUpperCase()+"~";	
	    }
	else
	    {
		allmainans=allmainans+(j+1)+"-"+rans.toUpperCase();	
	    }
	});
	}

if(qname==false || qnum==false || tlimit==false || flag1==1 || opt1flag==1 || opt2flag==1 || opt3flag==1 || opt4flag==1 || qname==false || ansflag==1 )
	alert("Fill Required Fields..Check Once...");
else
	{
	
	var ok=confirm("Are you Sure Post this Quiz");
    var returnData;
	if(ok==true)
		{
		$("#poquiz").fadeOut(2000);
		$.post("quizsetupsubmit.php?totalqsts="+allqsts+"&totalopts="+allopts+"&quizname="+qname+"&noq="+qnum+"&tlimit="+tlimit+"&coff="+coff+"&qmode="+mainmode+"&mainans="+allmainans,function(data)
		{
		$("#temppostdiv").html("<font color=black size=3>Sending<blink>...</blink></font>");
        returnData=data;
		  $("#temppostdiv").html(returnData);
		});
      
        
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
		}
	else
		{
		$("#postdiv").html("<font color=blue size=3>Sending<blink>...</blink></font>");
		$("#postdiv").html("<font color=red size=4>Submit Cancelled..</font>");
		$("html, body").animate({ scrollTop: 0 }, 1000);

		return false;
		}
	
	}
	}
else if(mymode=="pdf")
	{
	var ttflag=0;
	var pdfanswers='';
	for(var u=0;u<qnum;u++)
		{
		var tt=$("#q"+(u+1)+"ra").val();
		if(tt==false)
			ttflag=1;
		else
			{
			if(u!=qnum)
				pdfanswers=pdfanswers+(u+1)+"-"+tt.toUpperCase()+"~";
			else
				pdfanswers=pdfanswers+(u+1)+"-"+tt.toUpperCase();
			}
		}
	if(ttflag==1 || qnum==false || tlimit==false || coff==false)
		{
		alert("Fill Required Fields");
		}
	else
		{
		$.post("quizsetupsubmit.php?quizname="+qname+"&noq="+qnum+"&tlimit="+tlimit+"&coff="+coff+"&qmode="+mainmode+"&pdfanswers="+pdfanswers,function(data)
		{
		$("#postdiv").html("<font color=blue size=3>Sending<blink>...</blink></font>");
		$("#postdiv").html(data);
		alert("Submitted Successfully");
		});
		$("html, body").animate({ scrollTop: 0 }, 1000);
		alert("Submitted Successfully");
		return false;
		}
	}
else if(mymode=="image")
	{
	var ttflag=0;
	var imganswers='';
	for(var u=0;u<qnum;u++)
		{
		var tt=$("#q"+(u+1)+"ra").val();
		if(tt==false)
			ttflag=1;
		else
			{
			if(u!=qnum)
				imganswers=imganswers+(u+1)+"-"+tt.toUpperCase()+"~";
			else
				imganswers=imganswers+(u+1)+"-"+tt.toUpperCase();
			}	
		}
	if(ttflag==1 || qnum==false || tlimit==false || coff==false)
		{
		alert("Fill Required Fields");
		}
	else
		{
		$.post("quizsetupsubmit.php?quizname="+qname+"&noq="+qnum+"&tlimit="+tlimit+"&coff="+coff+"&qmode="+mainmode+"&imganswers="+imganswers,function(data)
		{
		$("#postdiv").html("<font color=blue size=3>Sending<blink>...</blink></font>");
		$("#postdiv").html(data);
		alert("Submitted Successfully");
		});
		$("html, body").animate({ scrollTop: 0 }, 1000);
		alert("Submitted Successfully");
		return false;
		}
	
	}
}
else
	alert("Choose Quiz-Mode");

}


var k=new Array();
var i=0;
var answers='';
var superanswers='';
var mainanswers='';
var str;
var o,qc=0;
var counterflag=0;
// remember gani
for (i=1;i<=60;i++)
	k[i]='z';
function ansthis(optid)
{
o=optid.slice(0,optid.length-1);
if (k[o]=='z')
{
$("#"+optid).css({"background-color":"green"});
qc=qc+1;
}
else
{
$("#"+o+k[o]).css({"background-color":"#0080C0"});
$("#"+optid).css({"background-color":"green"});}
$("#dcount").html(qc);
k[o]=optid[optid.length-1];
}
var mainfl=0;
var globalgani='';
function mainsubmit(mnoq)
{
$("#subquiz").fadeOut(500);

	for (i=1;i<=mnoq;i++)
	{
		
		//alert(i+"---->					"+k[i]);
		superanswers=superanswers+i+"-"+k[i].toUpperCase()+"~";
		
	}
    $("#submitstatus").html("<font color=blue>Sending<blink>...</blink></font>");
	$.post("quizsend.php?qustans="+superanswers,function(data)
			{
			
			$("#submitstatus").html(data);
			});
	setTimeout(function(){window.location.href="index.php";},500);
	
	$("#multiplechoice").hide(1000);
	$("#onlinemembersdiv").show();
}
function quizsubmit(mnoq)
{
var quizsubok=confirm("Are you Sure You Want to Submit Quiz...???");
if(quizsubok==true)
{
mainsubmit(mnoq);
//countdowntime(0,mnoq);	
//hide quest
if(suepermode=="pdf")
	$("#quizdisplay").fadeOut(3000);	
}
else
	{
	alert("Submission Cancelled");
	}
}


var supermode='';
function loadquiz(qzno,qzname,noq,tlimit,mode,cutoff,qlevel)
{
globalgani=noq;
supermode=mode;
var yes=confirm("Start the Quiz ..??");
if(yes==true)
	{
	$.post("sessions.php?qzmno="+qzno+"&qzname="+qzname+"&noq="+noq+"&tlimit="+tlimit+"&onlineflag=1"+"&mode="+mode+"&cutoff="+cutoff+"&qlevel="+qlevel,function(data){
	//("#maindiv").load('quizstartup.php');
	window.location.href='quizstartup.php';
});
	}
else
	{
	// do nothing
	}
}

$("#subquiz").hide();
$("#quizdisplay").hide();
$("#multiplechoice").hide();

function startthisquiz(ttlimit,mnoq)
{
	
	//unloadstart();
	$("#hidethis").hide();
	$("#quizdisplay").fadeIn(3000);
	$("#multiplechoice").fadeIn(3000);
	$("#subquiz").fadeIn(1000);
	$("#squiz").hide();
	countdowntime(ttlimit,mnoq);
	checkflag=1;
	
}


function sortoutquiz(quizkey)
{
$("#avaquizdiv").html("<br><br><br><font color=white><center>Loading<blink>...</blink></center></font>");
$("#gobackbtn").show();
$.post("sortoutaquizs.php?quizkey="+quizkey,function(data){
$("#avaquizdiv").html("<font color=green><br><Br><Br><br><Br><Br><center><B>Processing<blink>....</b></center></blink></font>");
$("#avaquizdiv").html(data);

});

}

function opquizs(qzno,qzname,noq,tlimit)
{

alert(1);

}

function goback()
{
$("#gobackbtn").hide();
$("#avaquizdiv").html("<font color=green><br><Br><Br><br><Br><Br><center><B>Processing<blink>....</b></center></blink></font>")
$("#avaquizdiv").load("aquizs.php");
}

var mainmode='';
function modesubmit()
{
$("#qstdisplaydiv").html("");
var mflag=$("#rmode").val();
mainmode=mflag;
if(mflag!=false)
	{
	if(mflag=='text')
		{
		$("#qnoq").html("&nbsp;&nbsp;&nbsp;<input type='number' id='qno'  style='width:40px;'/><button onclick='qstdisplay();'>Generate</button>");
		}
	else if(mflag=='pdf')
		{
		$("#qnoq").html("&nbsp;&nbsp;&nbsp;<input type='number' id='qno'  style='width:40px;'/><button onclick='pdfdisplay();'>Generate</button>");
		}
	else if(mflag=='image')
		{
		$("#qnoq").html("&nbsp;&nbsp;&nbsp;<input type='number' id='qno'  style='width:40px;'/><button onclick='imagedisplay();'>Generate</button>");
		
		}
	}

}


function loadinmain()
{

$("#maindiv").load("your_scores.php");

}

function loadpdf(filepath)
{
var pdfstr="<iframe src='"+filepath+"' width='100%' height='100%' style='border:0px;'></iframe>";
$("#quizdisplay").html(pdfstr);
}

function postmsg()
{
var poto=$("#postto").val();
var msgtitle=$("#msgtitle").val();
var msgbody=$("#msgbody").val();
var po=$("#po").val();
if(msgtitle==false || msgbody==false || po==false || poto==false)
	alert("Fill Required Fields");
else
	{
	$.post("postmsg.php?msgtitle="+msgtitle+"&msgbody="+msgbody+"&po="+po+"&poto="+poto,function(data){
	$("#notif").html(data);	
	});
	}
}


function countdowntime(ttlimit,mnoq){
	
	var ganitaking=ttlimit;	
	var s=ganitaking*60;
	var h=Math.floor(s/3600);
	var m=Math.floor((s%3600)/60);
	var sec=(s%60);
	window.clearInterval(x);
	function clock()
	{
	if(m!=0)
	if(sec==0){
	m=m-1; sec=59;} 
	if(h!=0)
	if(m==0){
	h=h-1;m=59;
	sec=59;}
	if((m==0&&h==0&&sec==0) || (m==0&&h==0&&sec==0))
		{
		document.getElementById("cdclock").innerHTML="<font size=7 color=red>"+hr+"</font><font color=white size=1>H</font>:<font size=7 color=red>"+ minu +"</font><font color=white size=1>Min</font>:<font size=7 color=red>"+second+"</font><font color=white size=1>Sec</font>" ;
		window.clearInterval(x);
		mainsubmit(mnoq)

		}
	else
		--sec;
	var hr=(h<10? "0":"")+h;
	var minu=(m<10? "0":"")+m;
	var second=(sec<10? "0":"")+sec;
	
	document.getElementById("cdclock").innerHTML="<font size=7 color=red>"+hr+"</font><font color=white size=1>H</font>:<font size=7 color=red>"+ minu +"</font><font color=white size=1>Min</font>:<font size=7 color=red>"+second+"</font><font color=white size=1>Sec</font>" ;
	}
	x=window.setInterval(clock,1000);
}  

function unloadstart()
{

$(window).bind('beforeunload', function(){
var kg=confirm("Are u sure");
if(kg==true)
	{}
else
	{}
});




}

function uploadstatus(filename)
	{
	$.post("upload.php?filename="+filename,function(data){
	$("#postdiv").html(data);		
	});
	}


function logout()
{
$.post("logout.php",function(){
window.location.reload();
});
}
