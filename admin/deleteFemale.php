<?php
session_start();
include'dbconnection.php';
		
		$queryF ="DELETE FROM Residence WHERE stdNum=".$_GET['stdNum'];
		    
		
		
		if (!mysqli_query($con, $queryF))
		{
    		echo "DELETE failed: $query<br />" .
    		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
		    $query = "DELETE FROM Student WHERE stdNum='".$_GET['stdNum']."'";
		    mysqli_query($con, $query);
		    
		    
		    $queryC = "DELETE FROM complaint WHERE stdNum='".$_GET['stdNum']."'";
		    mysqli_query($con, $queryC);
		    
		    $queryB = "DELETE FROM booking WHERE stdNum='".$_GET['stdNum']."'";
		    mysqli_query($con, $queryB);
		    
			echo "<script>alert('SUCCESSFULLY DELETED');</script>";
				echo '<script language="javascript">document.location="residence.php";</script>';
		}	
	

?>