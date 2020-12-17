<?php
session_start();
include'dbconnection.php';
	$position="N/A"; $motivation="N/A"; $image="N/A"; $appointmentDate="N/A";
        
		$query= "UPDATE Student SET position='$position' ,motivation='$motivation',image='$image', appointmentDate='$appointmentDate WHERE stdNum =".$_GET['uid'];
                                   
                                    
         
        						$query_run = mysqli_query($con,$query);
        						
        						if($query_run)
        						{
        							echo '<script type="text/javascript"> alert("Successfully deleted as a Resident Committee member") </script>';
        							echo '<script language="javascript">document.location="structureRC.php";</script>';
        						}
        						else
        						{
        							echo '<script type="text/javascript"> alert("Error!") </script>';
        							echo '<script language="javascript">document.location="structureRC.php";</script>';
        						}
		
	

?>