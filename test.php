<?php
session_start();

@include "db.php";
$k=mysql_query("SELECT MAX(qlevel) FROM quiz_db WHERE qname='aptitude'");
$k2=mysql_fetch_array($k);
echo $k2[0];

?>
