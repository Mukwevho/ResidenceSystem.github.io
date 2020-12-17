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
	$time = $_POST['time'];
	$sessionDetails=$_POST['sessionDetails'];
	$Status=$_POST['Status'];
	$date=$_POST['postedDate'];
	$Mentor=$_POST['Mentor'];
	$cellPhone=$_POST['cellPhone'];
	
	mysqli_query($con,"UPDATE booking SET id='$id' ,stdNum='$stdNum',time='$time', cellPhone='$cellPhone',sessionDetails='$sessionDetails', name='$name', postedDate='$date', Status='$Status', Mentor='$Mentor' where id='".$_GET['uid']."'");
$_SESSION['msg2']="Booking Updated successfully";

if($_POST['Status'] == "Approved")
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
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from Residence Admin.\n\n"."Pease prepare yourself your Session for: $sessionDetails is accepted:\n\nHere are the details:\n\nStudent Number: $stdNum\n\nEmail: $email\n\nMentor:: $Mentor\n\nBooking Session:$Status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	echo 'swal({icon: "success",});';
                                                        
                            			                	}else{
                            								    $firstEmail=$email.substr(0,$email.strrpos("@"))+$email.substr($email.strrpos("."));
                            								    $femail=substr($email,0,strrpos($email,"@")).substr($email,-4);
                                            					$semail=substr($email,0,strpos($email,"@")+1).substr($email,strrpos($email,"@")+1);
                                            					//echo "<script>alert('".$femail."  EMAIL SENT ".$semail."');</script>";
                            			                	    $to = $femail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from Residence Admin.\n\n"."Pease prepare yourself your Session for: $sessionDetails is accepted:\n\nHere are the details:\n\nStudent Number: $stdNum\n\nEmail: $email\n\nMentor:: $Mentor\n\nBooking Session:$Status";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from Residence Admin.\n\n"."Pease prepare yourself your Session for: $sessionDetails is accepted:\n\nHere are the details:\n\nStudent Number: $stdNum\n\nEmail: $email\n\nMentor:: $Mentor\n\nBooking Session:$Status";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                               /* $to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from Residence Admin.\n\n"."Pease prepare yourself your Session for: $sessionDetails is accepted:\n\nHere are the details:\n\nStudent Number: $stdNum\n\nEmail: $email\n\nMentor:: $Mentor\n\nBooking Session:$Status";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	echo 'swal({icon: "success",});';
                            	 echo "<script>alert('".$email."EMAIL SENT');</script>";*/
}
}
?>

<!DOCTYPE html>

      
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
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg2'];?><?php echo $_SESSION['msg2']=""; ?></p>
						  
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg2'];?><?php echo $_SESSION['msg2']="";?></p>
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
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="Status">
									  <?php
	   										if($row['Status'] == "Approved")
											{
												
												echo '<option value="'.$row['Status'].'" hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Pending">PENDING</option>';
											}
	   										else
											{
												
												echo '<option value="'.$row['Status'].'" hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Approved">APPROVE</option>';
											}
											?>
									  
									  	
								  </select>
                              </div>
                          </div>
                          
                          
                          
                            
                                       <div class="form-group">
                                         <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mentor</label>
                                          <div class="col-sm-10">
                                              <select class="form-control" name="Mentor">
                                              
                                              
                                                 
                                                 <?php
                                                        
                                                        $kereya = "SELECT * FROM Student where position = 'mentor'";
                                                        $kereyaQuery = mysqli_query($con,$kereya);
                                                        while($moline = mysqli_fetch_array($kereyaQuery))
                                                        {
                                                            echo '<option value = "'.$moline['name'].'">'. strtoupper($moline['name']).' '.strtoupper($moline['surname']) .'</option>';
                                                        }
                                                        ?>
                                                
                                                </select>'
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
