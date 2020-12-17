<?php
session_start();
include'../dbconnection.php';
include("../checklogin.php");
check_login();
if(isset($_POST['Submit']))
{
	$id=$_GET['uid'];
	$stdNum=$_POST['stdNum'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$sessionDetails=$_POST['sessionDetails'];
	$Status=$_POST['Status'];
	$date=$_POST['postedDate'];
	$Mentor=$_POST['Mentor'];
	$cellPhone=$_POST['cellPhone'];
	
	mysqli_query($con,"UPDATE booking SET id='$id' ,stdNum='$stdNum',time='$time', cellPhone='$cellPhone',sessionDetails='$sessionDetails', name='$name', postedDate='$date', Status='$Status', Mentor='$Mentor' where id='".$_GET['uid']."'");
$_SESSION['msg']="Booking Updated successfully";
}
?>

<!DOCTYPE html>
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
                    <li><a href="..//logout.php">Logout</a></li>
            	</ul>
            </div>
	  
	             <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a href="..//mentors.php">Back</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a  href="../../mentors.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
      
	  <?php 
	  $ret=mysqli_query($con,"select * from booking WHERE id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Booking Information</h3>
             	
				<div class="row">    
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
						  
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Student Number </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="stdNum" value="<?php echo $row['stdNum'];?>" readonly>
                              </div>
                          </div>
         
							 
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"readonly >
                              </div>
                          </div>
                          
						  
							   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Cell Phone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="cellPhone" value="<?php echo $row['cellPhone'];?>"readonly >
                              </div>
                          </div>
							   
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Session Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="time" value="<?php echo $row['time'];?>" >
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">session Details </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="sessionDetails" value="<?php echo $row['sessionDetails'];?>" readonly >
                              </div>
                          </div>
							   
							<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Posted Date</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="postedDate" value="<?php echo $row['postedDate'];?>" readonly >
                              </div>
                          </div>

							  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mentor</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Mentor" value="<?php echo $_SESSION['name'];?>" readonly >
                              </div>
                          </div> 
							   
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                  
								  
								  
								  
								  <select class="form-control" name="Status">
									  <?php
	   										if($row['Status'] == "Approved")
											{
												echo '<option value="'.$row['Status'].'"hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Pending">PENDING</option>';
											}
	   										else
											{
												
												echo '<option value="'.$row['Status'].'"hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Approved">APPROVE</option>';
											}
											?>
									  
									  	
								  </select>
                              </div>
                          </div>
						   
						  

						  
						  
						  
						  
						  
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
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
