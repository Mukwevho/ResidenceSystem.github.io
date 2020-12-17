<?php
session_start();
include'dbconnection.php';
		$query = "DELETE FROM complaint WHERE id='".$_GET['id']."'";
		
		
		if (!mysqli_query($con, $query))
		{
		echo "DELETE failed: $query<br />" .
		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
				echo  "<script>alert('deleted Successfully');</script>";
			/*$host=$_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="booking.php";		
			header("Location: http://$host$uri/$extra");*/
			
			echo '<script language="javascript">document.location="complaints.php";</script>';
		}	
	

?>