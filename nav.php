
<!DOCTYPE html>
<?php
   session_start();
    require('dbconnection.php');
?>
<!--<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/explorehome.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navstyle.css">
    <link rel="stylesheet" href="assets/css/promostyle.css">
    <link rel="stylesheet" href="assets/css/structure.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="jquery-3.3.1.min.js"></script>
  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	
	
<style>
/* Style all input fields */

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
  form{
    text-align: center;
}
</style>
</head>
<body>
    <!--<div class="container-fluid">-->
        <nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark" id="navigation" style="background-color: rgba(255,255,255,0);padding: 0px;padding-right: 10px;">
            <a href="index.php" ><div class="container-fluid"><img class="img-fluid" src="assets/img/logo.png" style="margin: 20px;"></a><a href="index.php"  class="navbar-brand" style="color: rgb(255,255,255);">Res Management System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;margin: 16px;margin-right: 12px;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgba(255,255,255,0.5);background-color: #ffffff;"></span></button><
                <div
                    class="collapse navbar-collapse text-justify" id="navcol-1" style="padding: 0px;padding-right: 0px;padding-left: 6px;">
                    <ul class="nav navbar-nav ml-auto" id="nav-links">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="index.php" style="color: rgb(255,255,255);">Home</a></li>
                        
                       
						<?php
						
						        $studentNum = $_SESSION['stdNum'];
							 
							//for boys 
								        $countStd=0;
								        $i ='';
								        $g = '';
    								    $searchStd ="select * from Residence WHERE gender ='male' and stdNum = $studentNum";
    									$searchf = mysqli_query($con,$searchStd);
    									$findF= mysqli_num_rows($searchf);
    									
    									
    									while($stdFind = mysqli_fetch_array($searchf))
    									{
    									    $i .= $stdFind['status'];
    									    
    									    $countStd;
    									}
    									
    						//for gals
    						
    					            	$g = '';
    								    $searchStdF ="select * from Residence WHERE gender ='female' and stdNum = $studentNum";
    									$searchfF = mysqli_query($con,$searchStdF);
    									$findF= mysqli_num_rows($searchfF);
    									
    										while($stdFindF = mysqli_fetch_array($searchfF))
    									{
    									    $g .= $stdFindF['status'];
    									    
    									   
    									}
    								
									    
								    

							if(strlen($_SESSION["login"])==0)
							{
							    
                        		echo ' <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="https://www.tut.ac.za/saed/arlc/downloads" style="color: rgb(255,255,255);">Regulations</a></li>
                        		<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#signin" type="button">Log In</button></a></li>
								<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#signup" type="button">Sign Up</button></a></li>
								';
						
							}else{
							    
							    if($i == "ACCEPTED" ||  $g == "ACCEPTED")
        						{
        							 
        							   echo '<li class="nav-item dropdown" id="link"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;">Academic Support</a>
                                            <div class="dropdown-menu" role="menu">
                                            <h6 class="dropdown-header" role="presentation">Structures</h6>
                                            <a class="dropdown-item" role="presentation" href="mentors.php">Residence Mentors</a>
                                            <a class="dropdown-item" role="presentation" href="resCom.php">Residence Committee</a>
                                            <a class="dropdown-item" role="presentation" href="labSchedule.php">Lab Schedule</a>
                                           
                                            </li>
                                            <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="complain.php" style="color: rgb(255,255,255);">Complaints</a></li>
                    						
                                            <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="profile.php" style="color: rgb(255,255,255);">Profile</a></li>';
            
            								echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#" type="button">Logout</button></a></li>';
        							        
            							    
        							}else{
        							    
        							     echo ' <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="apply.php" style="color: rgb(255,255,255);">Apply</a></li><li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#" type="button">Logout</button></a></li>';
        							   
        						}
							}
							
						?>
						
                        
                    </ul>
            </div>
    </div>
    </nav>
    <div class="modal fade" role="dialog" tabindex="-1" id="signin">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-envelope-o"></i></span><input class="form-control" name="uemail" type="text" required="" placeholder="Student Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-lock"></i></span><input class="form-control" name="password1" type="password" required="" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        
						<input style = "align='center'; " type="submit" name="submit" value="Sign In">
						<?php
						if(isset($_POST['submit']))
                        {
        							$password=$_POST['password1'];
        							$dec_password=md5($password);
        							//$dec_password=$password;
        							$useremail=$_POST['uemail'];
        							$check= mysqli_query($con,"SELECT * FROM Student WHERE email='".$useremail."'");
        							$line5=mysqli_fetch_array($check);
        							
        							if($line5)
                					{
        
                							$ret= mysqli_query($con,"SELECT * FROM Student WHERE email='$useremail' and password='$dec_password'");
                							$num=mysqli_fetch_array($ret);
                							$find = $num['stdNum']; 
                                            $num = $num['contactno']; 
                                            
                                            
                							if($num>0)
                							{
                
                								$sel = "SELECT * FROM StudentRecord WHERE stdNum =$find ";
                								$quiry = mysqli_query($con,$sel);
                								$line=mysqli_fetch_array($quiry);
                
                								$extra="index.php";
                								$_SESSION['login']=$_POST['uemail'];
                								$_SESSION['name']=$line['name'];
                								$_SESSION['SName']=$line['surname'];
                								$_SESSION['stdNum']=$line['stdNum'];
                								$_SESSION['gender']=$line['gender'];
                								$_SESSION['number'] = $num;
                								
                								//this creates a session for students who are at res o not
                								
                							
                
                								//$host=$_SERVER['HTTP_HOST'];
                								//$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                							 echo '<script>alert("Logged in successfully")</script>';
                								//return to index page
                								echo '<script language="javascript">
                                                    document.location="index.php";
                                                </script>';
                								
                								exit();
                							}
                							else
                							{
                        						    echo '<script>alert("Incorrect login Details")</script>';
                        							$extra="index.php";
                        							$host  = $_SERVER['HTTP_HOST'];
                        							$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                        							//header("location:http://$host$uri/$extra");
                        							 echo '<script language="javascript">
                                                            document.location="index.php";
                                                        </script>';
                        								
                        							exit();
                                             }
                					}else
        							{
        							    echo '<script>alert("Not a registered User please sign up before trying to login")</script>';
        							}
                            }
					?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none"  data-dismiss="modal" data-toggle="modal" data-target="#password"href="#" >Forgot password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
		
		
	<div class="modal fade" role="dialog" tabindex="-1" id="password">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forgot Password</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" name="femail" type="text" required="" placeholder="Student Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <!--<div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;" type="button">Log in</button></div>-->
						<div class="form-group" class="btn btn-primary btn-lg text-white" style="width: 100%;" type="button">
						<input type="submit" name="send" value="send">
							</div>
					<?php
						//Code for Forgot Password

							if(isset($_POST['send']))
							{
							    //if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)||preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['femail'])){
    							$row1=mysqli_query($con,"select * from Student where email='".$_POST['femail']."'");
    							$row2=mysqli_fetch_array($row1);
    							if($row2>0)
    							{
        							$email = $row2['email'];
        							$password = $row2['stdNum'];
        							for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        /*	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$subject = "Information about your password";
                                							$password = $row2['stdNum'];
                                							$message = "Your password is ".$password." \n\n please make sure you change your pass word immediantly after logginng in, under your profile";   
                                                        	mail($to, $subject, $message, "From: $email");
                            						       $enc_password=md5($password);*/
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Information about your password";
                            	$email_body = "Your password is ".$password." \n\n please make sure you change your pass word immediantly after logginng in, under your profile";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	$enc_password=md5($password);
                                                        	echo 'swal({icon: "success",});';
                                                        
                            			                	}else{
                            								    $firstEmail=$email.substr(0,$email.strrpos("@"))+$email.substr($email.strrpos("."));
                            								    $femail=substr($email,0,strrpos($email,"@")).substr($email,-4);
                                            					$semail=substr($email,0,strpos($email,"@")+1).substr($email,strrpos($email,"@")+1);
                                            					//echo "<script>alert('".$femail."  EMAIL SENT ".$semail."');</script>";
                            			                	    $to = $femail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Information about your password";
                                                        	$email_body = "Your password is ".$password." \n\n please make sure you change your pass word immediantly after logginng in, under your profile";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	$enc_password=md5($password);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Information about your password";
                                                        	$email_body = "Your password is ".$password." \n\n please make sure you change your pass word immediantly after logginng in, under your profile";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	$enc_password=md5($password);
                            			                	}
        							/*$subject = "Information about your password";
        							$password = $row2['stdNum'];
        							$message = "Your password is ".$password." \n\n please make sure you change your pass word immediantly after logginng in, under your profile";
        							mail($email, $subject, $message, "From: $email");
                                    $enc_password=md5($password);*/
                                    //this will change the password to your student number so that u can update it
                                	
                                    
                                    	
                                    	mysqli_query($con,"UPDATE Student SET password='$enc_password' where email = '".$_POST['femail']."' ");
                                    	

        							echo  "<script>alert('Your Password has been sent Successfully');</script>";
    							}
							    
							}
    							else
    							{
    							    echo "<script>alert('Email not register with us');</script>";	
    							}
							}
						
						?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" href="#" data-target="#password">Forgot password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>	
		
		
		
		
		
		
		
		
		
		
		
	
    <div class="modal fade" role="dialog" tabindex="-1" id="signup">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up Now</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form class="mt-4" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-user-o"></i></span><input type="text" class="form-control" name="stdNum"  minlenght="9" maxlength="9" required placeholder="Student Number">
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="far fa-envelope"></i></span><input class="form-control" name="email" type="text" required placeholder="Student Email" title="It can be like example@gmail.com or example@gmail@yahoo.com">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-lock"></i></span><input class="form-control" id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required  placeholder="Password">
                                </div>
                            </div>
							
							<div id="message">
							  <h3>Password must contain the following:</h3>
							  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							  <p id="number" class="invalid">A <b>number</b></p>
							  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fas fa-phone-alt"></i></span>
								<input class="form-control" type="tel"  name="contact" pattern = "(\+27|0)[6-8][0-9]{8}" title="Must be a south African Number starting with a zero(0)" minlenght="10" maxlength="10" required placeholder="Cellphone No.">
							</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="agree" type="checkbox" id="formCheck-1" required> I agree to terms and conditions.
                            </div>
                        </div>
                        <!--<div class="form-group"><input type="button" name="submit" class="btn btn-primary btn-lg text-white" style="width: 100%;" value="submit"></div>-->
						<input type="submit" name="signup" value="signup">
						<?php
							if(isset($_POST['signup']))
							{
							    $stdNumb=$_POST['stdNum'];
							    $std="SELECT * FROM StudentRecord WHERE stdNum=".$stdNumb;
							    $queryStd=mysqli_query($con,$std);
							    if(mysqli_fetch_array($queryStd)){
							       $stdExist="SELECT * FROM Student WHERE stdNum=".$stdNumb;
							       $queryUser=mysqli_query($con,$stdExist);
							       if(mysqli_fetch_array($queryUser)){
							           echo '<script>alert("Account already exist")</script>';
							       }else{
							            // $email_address = $stdNumb. "@tut4life.ac.za";
							           
                                    if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['email'])||filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
							           //if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) )
                                	       {
                                	           $phone = strip_tags(htmlspecialchars($_POST['contact']));
                                	        if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $phone ))
                                             {
                                        	        $stdNum = strip_tags(htmlspecialchars($_POST['stdNum']));
                                                	$email_address = strip_tags(htmlspecialchars($_POST['email']));
                                                	  
                                                	
                                                	$password = strip_tags(htmlspecialchars($_POST['password']));
                                                	$enc_password = md5($password);
                                                	$date = date("yy-m-d");
                                                	
                                                   $position="N/A";
                                                   $motivation="N/A";	
                                                   $image="N/A";	
                                                   $appointmentDate="N/A";
    
                                                	$insert= "insert into Student values('','$stdNum','$email_address','$enc_password','$phone','$date','$position','$motivation','$image','$appointmentDate')";
        				                            $query_Insert = mysqli_query($con,$insert);
        				                            
        				                            
        				                            if($query_Insert)
        				                            {
        				                                echo '<script>alert("Successfully Registered. Your username is your Student Email: ".$stdNumb.")</script>';
        				                                
        				                            }
                                        	}else{
                                	            echo '<script>alert("Invalid Number")</script>';
                                	        }
                                	       }else{
                                	           echo '<script>alert("Invalid email")</script>';
                                	       }
							       }
							    }else{
							        echo '<script>alert("You are not registered student")</script>';
							    }
        								
							}
					?>
                    </form>
					
					
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Already have an Account?&nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Log In</a></p>
                </div>
			
			
            </div>
        </div>
    </div>
    </div>