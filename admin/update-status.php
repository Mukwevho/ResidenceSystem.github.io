<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();
if(isset($_POST['Submit']))
{
	$id=$_GET['uid'];
	$stdNum=$_POST['stdNum'];
	$name = $_POST['name'];
	$room = $_POST['room'];
	$details=$_POST['details'];
	$status=$_POST['status'];
	$date=$_POST['date'];
	
	mysqli_query($con,"UPDATE complaint SET id='$id' ,stdNum='$stdNum', name='$name',room='$room', details='$details', status='$status', date='$date' where id='".$_GET['uid']."'");
$_SESSION['msg']="Profile Updated successfully";

if($_POST['status'] == "fixed")
{
    
    $thola = "select * FROM Student WHERE stdNum=".$stdNum;
    $tholaQuery = mysqli_query($con,$thola);
    
    $line = mysqli_fetch_array($tholaQuery);
    
    $email = $line['email'];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_body = "You have received a new message from Residence Admin.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoom :: $room\n\nComplaint Status:$status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	echo 'swal({icon: "success",});';
                                                        echo "<script>alert('EMAIL SENT');</script>";
                            			                	}else{
                            								    $firstEmail=$email.substr(0,$email.strrpos("@"))+$email.substr($email.strrpos("."));
                            								    $femail=substr($email,0,strrpos($email,"@")).substr($email,-4);
                                            					$semail=substr($email,0,strpos($email,"@")+1).substr($email,strrpos($email,"@")+1);
                                            					//echo "<script>alert('".$femail."  EMAIL SENT ".$semail."');</script>";
                            			                	    $to = $femail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_body = "You have received a new message from Residence Admin.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoom :: $room\n\nComplaint Status:$status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from Residence Admin.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoom :: $room\n\nComplaint Status:$status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	echo 'swal({icon: "success",});';
                            	 echo "<script>alert('EMAIL SENT');</script>";
                            						    
                            			                	}
                                /*$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from Residence Admin.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoom :: $room\n\nComplaint Status:$status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	echo 'swal({icon: "success",});';
                            	 echo "<script>alert('".$email."EMAIL SENT');</script>";*/
}

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

    <title>Admin | Update Complaint Status</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

	  <?php 
	  $ret=mysqli_query($con,"select * from complaint WHERE id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Information</h3>
             	
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
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Room Number </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="room" value="<?php echo $row['room'];?>"  readonly>
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Complaint Details </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="details" value="<?php echo $row['details'];?>" readonly >
                              </div>
                          </div>
							   

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                 
								  
								  
								  
								   <select class="form-control" name="status">
									  <?php
	   										if($row['status'] == "fixed")
											{
												echo '<option value="'.$row['status'].'" hidden="">'. strtoupper($row['status']) .'</option>';
												echo '<option value="Pending">PENDING</option>';
											}
	   										else
											{
												
												echo '<option value="'.$row['status'].'" hidden="">'. strtoupper($row['status']) .'</option>';
												echo '<option value="fixed">FIXED</option>';
											}
											?>
									  
									  	
								  </select>
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="date" value="<?php echo $row['date'];?>"  readonly>
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
