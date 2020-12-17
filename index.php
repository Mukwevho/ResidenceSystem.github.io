<?php
session_start();
require('dbconnection.php');
include("checklogin.php");
include("nav.php");
check_login();
?>

    <!--<div class="container-fluid">


    
    </div>-->
   <!-- <div id="promodiv" class="promodiv"> -->
        <div class="jumbotron" id="promo" style="margin-bottom: 0px;">
            <h1 id="promoHeading">
           
			<?php
								if(empty($_SESSION['name']))
								{	
									echo("VISITOR");
									echo('<br>Welcome to Tshwane Universty Of Technology Residence System</h1>');
									echo("<p>Sign Up in order for you to apply for residence.</p>");
									
									echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#signup" type="button">Sign Up</button></a></li>';
								}else{
									echo $_SESSION['name']." ".$_SESSION['SName'];
									echo('<br>Welcome to Tshwane Universty Of Technology Residence System</h1>');
									
									
									
								}
								
							
							?>
            
        </div>
    </div>
    <div id="explore">
        <div class="container">
            <h1 align="center">Residence News updates</h1>

            <div class="row">
				
				<?php
				
				
				
				
				
					$news = "SELECT * FROM noticeBoard";
					$quiry = mysqli_query($con,$news);
					
					while($row = mysqli_fetch_array($quiry))
					{
						echo '<a href="articles.php?id='. $row['id'] .'">';
						echo '<div class="col-lg-4">';
						echo '<h3>'.$row['topic'].'</h3><img class="img-fluid" src="admin/'.$row['img'].'">';
						echo '</a>';
						echo '<p>'.substr($row['story'],0,80).'<a href="articles.php?id='. $row['id'] .'"> Read more...'.'</a></p>';
						//this will help us get data for a specific row
					
						echo '</div>';
					}
			
						
				
                			
				//perfect no error
				?>
				
            </div>
        </div>
    </div>
	
    <footer style="background-color: black;">
		<hr  style="background-color: red;">
            <div id="contact" class="section db" >
        <div class="container">
            <div class="section-title text-center">
                <h3 style="color  =white;">Contact Admin</h3>
                <p>For further information</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="stdNum" type="text" placeholder="Your Student Number" required="required"  minlenght="9" maxlength="9" data-validation-required-message="Please enter your Student Number.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" type="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
									    <div class="input-group-prepend"></div>
								<input class="form-control" type="tel"  name="tel" pattern = "(\+27|0)[6-8][0-9]{8}" title="Must be a south African Number starting with a zero(0) and followed by (6-8)" minlenght="10" maxlength="10" required placeholder="Cellphone No.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control" name="message" placeholder="Your Message" required="required" data-validation-required-message="Please enter a message."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									
									<input type="submit" name="sendEmail" value="Send Message">
									
								</div>
						
						</form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<?php
// Check for empty fields
if(isset($_POST['sendEmail']))
{
	$phoneNumber = $_POST['tel'];

	if(
	   empty($_POST['stdNum']) ||
	   empty($_POST['email']) ||
	   empty($_POST['tel']) ||
	   empty($_POST['message']) 
	   )
	   {
	         echo "<script>alert('ARGUMENTS ARE EMPTY');</script>";
	        return false;
	   }else{
	       if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	       {
	        if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $phoneNumber ))
	        {
	         $stdNum = strip_tags(htmlspecialchars($_POST['stdNum']));
        	$email_address = strip_tags(htmlspecialchars($_POST['email']));
        	$phone = strip_tags(htmlspecialchars($_POST['tel']));
        	$message = strip_tags(htmlspecialchars($_POST['message']));
	

        	
        	
        	
        	
            $ret= mysqli_query($con,"SELECT * FROM Student WHERE stdNum='$stdNum'");
							$num=mysqli_fetch_array($ret);
							$find = $num['stdNum']; 

							if($num>0)
						{
						    
						    /*$stringsearch ="@";
						    $email="mukwevhotk18@gmail@yahoo.com";
                               for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
			                	if($count==1){ 
                            	// send 1 email
                            	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	
                            	echo 'swal({icon: "success",});';
                            	 echo "<script>alert('".$email." EMAIL SENT');</script>";
			                	}else{
								    $firstEmail=$email.substr(0,$email.strrpos("@"))+$email.substr($email.strrpos("."));
								    $femail=substr($email,0,strrpos($email,"@")).substr($email,-4);
                					$semail=substr($email,0,strpos($email,"@")+1).substr($email,strrpos($email,"@")+1);
                					//echo "<script>alert('".$femail."  EMAIL SENT ".$semail."');</script>";
			                	    $to = $femail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	
                            	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
						    
			                	}*/
                                
                            // Create the email and send the message
                            	$to = 'j.mnisi.c.jm@gmail.com,mukwevhotk18@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Website Contact Form:  $stdNum";
                            	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
                            	echo 'swal({icon: "success",});';
                            	 echo "<script>alert('EMAIL SENT');</script>";
                            	
                            	return true; 
							
							}else
							{
							     echo "<script>alert('".$stdNum."Not a TUT student Number');</script>";
								
							}
	        }else
	        {
	            echo "<script>alert('INCORRECT CELLPOHNE NUMBER FORMAT');</script>";
	        }
	       }else{
	           echo "<script>alert('INVALID EMAIL');</script>";
	       }
	       
	   }
}
?>	
		
		
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>