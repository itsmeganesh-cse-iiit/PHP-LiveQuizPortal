<?php
session_start();
@include "db.php";
$id=$_SESSION['quiz_login_id'];


?>
<html>
    <link type="text/css" rel="stylesheet" href="groundwork.css">
 
  </head>
  <body>
	  <?php
$go=mysql_query("SELECT * FROM quiz_top_scores WHERE id='$id' ");
$count=mysql_num_rows($go);
if($count==0)
	echo "<br><Br></Br><center><div style='width:300px;border:1px solid grey;'>No Results Found</div>";
else
	{
?>
    
          <div class="row">
            <div class="one whole padded">
              <table title="" class="responsive tooltip">
                <thead>
                  <tr>
                    <th data-width="10%">Test Name</th>
                    <th data-width="10%">QUIZ NAME</th>
                    <th data-width="10%">Cutoff</th>
                    <th data-width="10%">Marks</th>
                   <th data-width="10%">Performance</th>
					<th data-width="10%">IP ADDRESS</th>
                    <th data-width="40%">TIME</th>
                    
                  </tr>
                </thead>
                <tbody>
	<?php
	while($row=mysql_fetch_array($go))
	{
	?>				

                  <tr>
                    <td data-width="10%"><?php echo strtoupper($row['qname']);?></td>
                    <td data-width="10%"><?php echo $row['level'];?></td>
                    <td data-width="10%"><?php echo $row['coff'];?></td>
                     <td data-width="10%"><?php echo $row['score']." / ".$row['noq'];?></td>
                     <td data-width="10%"><?php echo $row['performance'];?></td>
                    <td data-width="10%"><?php echo $row['ip'];?></td>
                    <td data-width="40%"><font size=1><?php echo $row['time'];?></font></td>
                  </tr>
                  <?php
                 } }
                 ?>
                </tbody>
                
              </table>
            </div>
          </div>
         
    <!-- scripts-->


  </body>
</html>
