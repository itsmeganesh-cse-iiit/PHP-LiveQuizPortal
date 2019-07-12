<?php
session_start();
$_SESSION['qno']=$_GET['qno'];
$_SESSION['noq']=$_GET['noq'];
$_SESSION['mode']=$_GET['mode'];
$_SESSION['coff']=$_GET['coff'];
$_SESSION['timedur']=$_GET['timedur'];
$_SESSION['qname']=$_GET['qname'];
$_SESSION['quizlevel']=$_GET['ganilevel'];
$_SESSION['alreadystart']="1";
echo "<script>window.location.href='quizstart.php';</script>";
?>
