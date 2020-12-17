<?php
session_start();

include("checklogin.php");
check_login();
require_once('dbconnection.php');


?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>lab Schedule</title>
<?php
include("nav.php");
?>


    
    </div>
    <div id="structure-promL" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1>OPEN LAB SCHEDULE</h1>
                <p>Short description</p>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
		<div class="col">
                             <div class="col-md-12">
                      <div class="content-panel">
                      <div  class="table-responsive">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h1 align="center"></i>Residence Lab Schedule</h1>
	                  	  	  <hr>
                              <thead>
                              <tr>
								<th>Day</th>
								<th>08:00-10:00</th>
								<th>10:00-12:00</th>
								<th>12:00-14:00</th>
								<th>14:00-16:00</th>
								<th>16:00-18:00</th>
								<th>18:00-20:00</th>
								<th>20:00-22:00</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from labschedule");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  { 
								  echo '<tr>';
								  echo '<td><b>'.$row['Day'].'</b></td>';
								  ?>
                              
                              
                                  
                                  <?php if($row['slot1'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot1'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot1'].'</td>';
							  		}
							   		
								  
								  if($row['slot2'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot2'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot2'].'</td>';
							  		}
								  
								  if($row['slot3'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot3'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot3'].'</td>';
							  		}
								  
								  if($row['slot4'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot4'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot4'].'</td>';
							  		}
								  
								  if($row['slot5'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot5'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot5'].'</td>';
							  		}
								  
								  if($row['slot6'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot6'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot6'].'</td>';
							  		}
								  
								  if($row['slot7'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">'.$row['slot7'].'</td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">'.$row['slot7'].'</td>';
							  		}
								  
								  $cnt=$cnt+1; }
								  ?>
								 
                                  
                              
                             
                              </tbody>
                          </table>
                      </div></div>
                  </div>
				  </div>
				  </div>
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row" align ="center">
                    <div class="col-lg-6">
                        <h2>About the developers</h2>
                        <p>A team of highly dedicated developers from the DSO34BT, Class of 2020.</p>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	
	

	
	
</body>





</html>