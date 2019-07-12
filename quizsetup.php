<?php
session_start();
if(isset($_SESSION['quiz_admin_id']))
{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="Copyrights SDCAC TEAM" />
<script src="scripts/jquery.js"></script>
<script src="scripts/jsfun.js">
</script>
<script src="script.js"></script>

    <!-- <script src="jquery.form.js"></script> -->

    <!-- <script src="das.js"></script> -->
    <style>


        /*form { display: block; margin: 20px 5px; background: #eee; border-radius: 10px; padding: 15px;width: 367px; }*/
        .progress { position:relative; width:200px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #66CCCC; width:0%; height:20px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #E6F7F7;}
        #anc_add_more{background-color: #66CCCC; color: #FFF;padding: 7px;text-decoration: none; }
        /*.dv_add{margin-bottom: 25px;}*/
    </style>

    <script>
        /* JS for Uploader */
        $(function() {
            /* Append More Input Files */
            $('#anc_add_more').click(function() {
                $('#spn_inputs').append('<input type="file" name="myfile[]"><br>');
            });
        });

    </script>
<!-- <script>/* JS for Uploader */
                    (function() {

                        var bar = $('.bar');
                        var percent = $('.percent');
                        var status = $('#status');

                        $('form').ajaxForm({
                            beforeSend: function() {
                                status.empty();
                                var percentVal = '0%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal)
                                percent.html(percentVal);

                            },
                            success: function() {
                                var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);
                            },
                            complete: function(xhr) {
                                status.html(xhr.responseText);
                            }
                        });
                    })();
                </script> -->

<style>
    .main {
        width: 750px;
        margin: 0 auto;
        height: 900px;
        border: 1px solid #ccc;
        padding: 20px;
    }

    .header{
        height: 100px;
    }
    .content{
        height: 700px;
        border-top: 1px solid #ccc;
        padding-top: 15px;
    }
    .footer{
        height: 100px;
        bottom: 0px;
    }
    .heading{
        color: #FF5B5B;
        margin: 10px 0;
        padding: 10px 0;
        font-family: trebuchet ms;
    }

</style>
</head>
<body background='images/background.png'>
<img src='images/header.png' style='position:fixed;top:0%;left:0%;width:100%;height:120px;'>

<div style='' id='postdiv'>Quiz setup Application</div>

<center></center>
<table border='1' style='background-color:white;position:absolute;top:23%;left:10%;width:80%;height:;' >
  <tr><td colspan=2><center><div style='' id='temppostdiv'>Quiz setup Application</div></center></td></tr>
<tr><td width=25%  colspan=2><Center><font color=red size=4><i>Note:</i></font>&nbsp;&nbsp;&nbsp;<font color=green>DON'T USE <FONT COLOR=RED><B>'#'</B></FONT> AND <FONT COLOR=RED><B>'&'</B></FONT> IN QUESTIONS ..IT MAY LEAD TO SUBMIT YOUR QUIZ IN IMPROPER WAY.</font></center><bR>
NOTE:<font color=red>Sry for Inconvience plz click "Post quiz" at last ONLY ONCE ..it's doesn't give any msg whether quiz submited or not then check quiz site</td><td></td></tr>
<tr><td width='25%'><span>Quiz Mode</span></td><td><!--<input type='text'  style='width:25%;' id='qname' />-->
<select id='rmode'>
	<option value=''>Choose Mode</option>
	<option value='text'>Manuval Entry</option>
	<option value='pdf'>Single Pdf File</option>
	<option value='image'>Question&Answer Images</option>

</select><button onclick='modesubmit()'>Go</button><span id='qnoq'></span>

</td></tr>
<!--<tr><td width='25%'><span>Number of Questions</span></td><td style=''><input type='number'  style='width:5%;' id='qno' /><input type='button' value='Go' onclick='qstdisplay()' /></td></tr>-->
<tr><td width='25%'>Quiz-Type</td><td>


<select id='qname'>
<option value=''>Choose Quiz Type</option>
<option value='cpro'>C Programing</option>
<option value='javapro'>Java Programing</option>
<option value='react'>React Js</option>
<option value='javascript'>Javascript</option>

<!-- <option value="telugata">Telugu Aata</option> -->
</select>
</td></tr>
<tr><td><span>Questions</span></td><td id='qstdisplaydiv' style=''></td></td>
<tr><td width='25%'><span>Time Limit</span> </td><td><input type='text'  style='width:10%;' id='tlimit' placeholder='Minutes' /><font color=grey size=1> * In Terms Of Minutes Only</font></td></tr>

<tr><td>Cut Off Marks</td><td><input type='number' id='coff' /></td></tr>
<tr><td></td><td align='center'><input type='button' value="Post Quiz" id='poquiz2' onclick="postthisquiz()" />&nbsp;&nbsp;</td></tr>
</table>

</body>
</html>
<?php
}
else
	echo "<script>window.location.href='index.php';</script>";
?>
