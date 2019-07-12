<?php
session_start();
if(isset($_SESSION['timedur']))
{
$mode=$_SESSION['mode'];
$qname=$_SESSION['qname'];
$qno=$_SESSION['qno'];
@include "db.php";
if($mode=="image")
	{
	$ppl=mysql_query("SELECT allimgstr FROM quiz_db WHERE qno='$qno' and qname='$qname'");
	$pplf=mysql_fetch_array($ppl);
	$qsts=explode("~",$pplf['allimgstr']);
	echo "<table>";

	for($p=0;$p<count($qsts)-1;$p++)
		{
			echo "<tr><td><b>".($p+1)."</b>.</td><Td><img src='".$qsts[$p]."' style='width:750px;height:;' ></td></tr>";
			echo "<tr><td colspan=2><hr style='border:1px dotted;'></td></tr>";
		}
	echo "</table>";
	}
else if($mode=="pdf")
	{
	$aoa=mysql_query("SELECT pdfpath FROM quiz_db WHERE qno='$qno' and qname='$qname'");
	$aoaf=mysql_fetch_array($aoa);
	$qstpath=$aoaf['pdfpath'];
	echo "<iframe width='780px' style='border:0px;' height='100%' src='".$qstpath."'></iframe>";

	}
else if($mode=="text")
	{
		$aoa=mysql_query("select * from quiz_db where qno='$qno' and qname='$qname'") or die(mysql_error());
		$aoaf=mysql_fetch_array($aoa);
		$quizQuestions=explode("~",$aoaf['allqst']);
		array_pop($quizQuestions);
		$quizOptions=explode("~",$aoaf['allopts']);
		array_pop($quizOptions);
		// print_r($quizQuestions);
		$x=0;
	foreach ($quizQuestions as $value) {
		// code...

			echo "<strong>".(1+$x++)."</strong> ] ".$value."<br/>";

			$eachopt=explode(":",$quizOptions[$x-1]);

			echo "(A):".$eachopt[0]." (B) :".$eachopt[1]." (C): ".$eachopt[2]." (D): ".$eachopt[3]."<br/><br/>";



		}



	}
else
	{
		echo "Something Bonky Happend ...Kindly Bear with US";
	}


}
else
	echo "<script>window.location.href='index.php';</script>";

?>
