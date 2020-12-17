<?php
session_start();
include'dbconnection.php';
		$query = "DELETE FROM Student WHERE email='".$_GET['id']."'";
		
		
		if (!mysqli_query($con, $query))
		{
		echo "DELETE failed: $query<br />" .
		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
			echo "<script>alert('SUCCESSFULLY DELETED');</script>";
				echo '<script language="javascript">document.location="manage-users.php";</script>';
		}	
	

?>