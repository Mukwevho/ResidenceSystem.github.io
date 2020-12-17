<?php
session_start();

require_once('dbconnection.php');

function marks()
{
	$totalMarks= 0;
	$sel = "select * from studentMarks WHERE stdNum =".$_SESSION['stdNum'];
	$ret = mysqli_query($con,$sel);
	
	while($row=mysqli_fetch_array($ret))
	{
		$totalMarks = $totalMarks + row['marks'];
	}
	 
	 return($totalMarks);
 }
?>

				
     
				
				
