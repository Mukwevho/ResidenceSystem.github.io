<?php
session_start();
include'../dbconnection.php';
include("../checklogin.php");
check_login();


if(isset($_GET['id']))
{
	$adminid=$_GET['id'];
	$msg=mysqli_query($con,"delete from complaints where id='$adminid'");
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

    <title>Mentor| Booking Management</title>
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
            <a href="#" class="logo"><b>Session Booking Information</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="..//..//logout.php">Logout</a></li>
            	</ul>
            </div>
	  
	             <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="..//..//mentors.php">Back</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="..//..//mentors.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  
				  <li class="sub-menu">
                      <a href="booking.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Bookings</span>
                      </a>
                   
                  </li>
				  
				  <li class="sub-menu">
                      <a href="complaints.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Complaints</span>
                      </a>
                   
                  </li>
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3 align="center"><i class="fa fa"></i>MENTORS BOOKINGS</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-"></i> All Residence Complaints</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Queue No.</th>
                                  <th class="hidden-phone">Student Number</th>
                                  <th>Session Date</th>
                                  <th>Contact Details</th>
								  <th>Session Details</th>
								  <th>First Name</th>
								  <th>Posted Date</th>
								  <th>Mentor Responsible</th>
								  <th align="center">Change status</th>
								  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from booking WHERE stdNum !=".$_SESSION['stdNum']);
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['stdNum'];?></td>
                                  <td><?php echo $row['time'];?></td>
                                  <td><?php echo $row['cellPhone'];?></td>
                                  <td><?php echo $row['sessionDetails'];?></td>
								  <td><?php echo $row['name'];?></td>
								  <td><?php echo $row['postedDate'];?></td>
								  <td><?php echo $row['Mentor'];?></td>
								  
								 
								 
								   <?php if($row['Status']== "approved" ||$row['Status']== "Approved" || $row['Status']== "APPROVED")
								  {
								  	echo '<td style="color: aliceblue; background: green;">'.$row['Status'].'</td>';
								  }else{
								  		echo '<td style="color: aliceblue; background: red;">'.$row['Status'].'</td>';
							  } ?>
						
                                  <td align="center">
                                     <a href="deleteBook.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" ><i class="fa fa-trash-o "></i></button>
									  </a>
                                     <a href="updateBooking.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></button>
									  
									  </a>
                                     
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
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
