<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
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

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
				<li class="sub-menu">
                      <a href="studentRecords.php" >
                          <i class="fa fa-users"></i>
                          <span>Student Records</span>
                      </a>
                   
				  </li>
				  <li class="sub-menu">
                      <a href="residence.php" >
                          <i class="fa fa-users"></i>
                          <span>Residence Students</span>
                      </a>
                   
				  </li>
				  
				  <li class="sub-menu">
                      <a href="newsUpdate.php" >
                          <i class="fa fa-users"></i>
                          <span>Update News</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="labSchedule.php" >
                          <i class="fa fa-users"></i>
                          <span>Lab Schedule</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="booking.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Bookings</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="updateStructure.php" >
                          <i class="fa fa-users"></i>
                          <span>Update Residence Structure</span>
                      </a>
                   
                  </li>
                 
				  <li class="sub-menu">
                      <a href="complaints.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Complaints</span>
                      </a>
                   
                  </li>
                 <li class="sub-menu">
                      <a href="maleres.php" >
                          <i class="fa fa-users"></i>
                          <span>Male Residence</span>
                      </a>
                   
                  </li>
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h1 align="center"></i>Residences Lab Schedule</h1>
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
                              <?php $ret=mysqli_query($con,"select * from LabSchedule ");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  { 
								  echo '<tr>';
								  echo '<td><b>'.$row['Day'].'</b></td>';
								  ?>
                              
                              
                                  
                                  <?php if($row['08:00-10:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['08:00-10:00'].'" hidden="">'. strtoupper($row['08:00-10:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['08:00-10:00'].'" hidden="">'. strtoupper($row['08:00-10:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
							   		
								  
								  if($row['10:00-12:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['10:00-12:00'].'" hidden="">'. strtoupper($row['10:00-12:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['10:00-12:00'].'" hidden="">'. strtoupper($row['10:00-12:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['12:00-14:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['12:00-14:00'].'" hidden="">'. strtoupper($row['12:00-14:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['12:00-14:00'].'" hidden="">'. strtoupper($row['12:00-14:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  if($row['14:00-16:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['14:00-16:00'].'" hidden="">'. strtoupper($row['14:00-16:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['14:00-16:00'].'" hidden="">'. strtoupper($row['14:00-16:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['16:00-18:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['14:00-16:00'].'" hidden="">'. strtoupper($row['14:00-16:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['14:00-16:00'].'" hidden="">'. strtoupper($row['14:00-16:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['18:00-20:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['18:00-20:00'].'" hidden="">'. strtoupper($row['18:00-20:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['18:00-20:00'].'" hidden="">'. strtoupper($row['18:00-20:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['20:00-22:00'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select class="form-control">
										<option style="color: white; background: red;" value="'.$row['20:00-22:00'].'" hidden="">'. strtoupper($row['20:00-22:00']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select class="form-control">
										<option style="color: white; background: green;" value="'.$row['20:00-22:00'].'" hidden="">'. strtoupper($row['20:00-22:00']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  
								  $cnt=$cnt+1; }
								  ?>
								 
                                  <td><b>Change</b></td>
                              
                             
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
