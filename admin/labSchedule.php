<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Open Labs</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>
	<?php
	    include("nav.php");
	?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Residence Lab</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
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
								<th>Update</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from labschedule ");
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
								  	
								  
								  echo '<td align="center"><a href="updatelab.php?day='.$row['Day'].'"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     </td>';
								  $cnt=$cnt+1; }
								  ?>
								 
                                  
                              
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
