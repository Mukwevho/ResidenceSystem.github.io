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
    <title>Apply</title>
<?php
include("nav.php");
?>


    
    </div>
    <div id="promodiv" class="promodiv">
        <div class="jumbotron" id="promo" style="margin-bottom: 0px;">
            <h1 id="promoHeading"><?php
								echo $_SESSION['name']." ".$_SESSION['SName'];
							
							?><br>Welcome to your Tshwane Universty Of Technology Residence System </h1>
            <p></p>
            
        </div>
    </div>
 
 
	    <div id="explore">
        <div class="container">
            <h1 align="center">Process Application</h1>
            <div class="row">
				
				
				
				
				
			
				<?php $ret=mysqli_query($con,"select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND  email ='".$_SESSION['login']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      
          	<h3><?php echo $row['name'];?>'s Information</h3>
             	<div style="text-items: center;">
				<div class="row">
					<form method="post">
					
						<div class="form-group">
						 <label>Student Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								
								 <input type="text" class="form-control" name="stdNum" value="<?php echo $row['stdNum'];?>"  readonly>
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
					
                        <div class="form-group">
						<label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								 <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" readonly>
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						 <div class="form-group">
						 <label>Surname</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"> <i class="fa fa-angle-right"></i></span></div>
								<input type="text" class="form-control" name="SName" value="<?php echo $row['surname'];?>" readonly >
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						

						
						<div class="form-group" align="center">
						 <label>Room Type</label>
                            <div class="input-group">
                                <div class="input-group-prepend"></div>
                                
                                <p >
								  <label>
								    <input type="radio" name="roomType" value="SINGLE" id="roomType_0">
								    SINGLE  </label>
					
								  <label>
								    <input type="radio" name="roomType" value="DOUBLE" id="roomType_1">
								      DOUBLE</label>
								  <br>
							  </p>
							     </div>
                            </div>
                        </div>
						
						<?php
					$res = $_SESSION['gender'].'res';
                    $search ="select roomNum from Residence WHERE stdNum =".$_SESSION['stdNum'];
                    $searchQuery = mysqli_query($con,$search);
                    $find = mysqli_fetch_array($searchQuery);
                    	if(empty($find['roomNum']))
                    	   {
                    		 echo"<label>Apply For Residence</label>";
                    
                    		echo'<input type="submit" name="apply">';
                    	   }
                    
                    ?>
						 

                    </form>
                  </div>
	                  
                  
        <?php } ?>
				
				
				
					<?php
						
						if(isset($_POST['apply']) && isset($_POST['roomType']))
						{
							$num = 0;
							$totalMarks = 0;
							$date = date("yy-m-d");
							//retrieves marks for students
							$sel = "select * from StudentMark WHERE stdNum= ".$_SESSION['stdNum'];
							$ret = mysqli_query($con,$sel);

							while($line=mysqli_fetch_array($ret))
							{
								$totalMarks = $totalMarks + $line['subjectMark'];
								$num = $num +1;
							}
							
							//checks if the  student is a frist year or not
							$sele = "select * from StudentRecord WHERE stdNum = '".$_SESSION['stdNum']."'";
							$test = mysqli_query($con,$sele);

							$lines=mysqli_fetch_array($test);
							
							
							
							if(($totalMarks /$num) >= 50 || $lines['yearStudy'] == "1")
							{
							    
							    $countSF= 0;
						            $countSM = 0;
        							$countM =1;
        							$countF =1;
        							$roomType= $_POST['roomType'];
        							
        							$seleAdmin = "select * from admin";
							        $testAdmin = mysqli_query($con,$seleAdmin);

							$lineAdmin=mysqli_fetch_array($testAdmin);
        							
        							$resAdmin = $lineAdmin['name'] .' '.$lineAdmin['lastName'];
        							$studentName=$_SESSION['name'];
        							$surname=$_SESSION['SName'];
        							$stdNum=$_SESSION['stdNum'];
        							$status = "ACCEPTED";
        							$resName= $lineAdmin['resName'];	
        								
        							//VALUES('$studNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date'	
        								
        						    
        								if($_SESSION['gender'] == "male")
        								{
        								    $gender = $_SESSION['gender'];
        									$resSize=0; //this is for the floor not  the whole res
        									$resNo ="select roomNum from Residence WHERE gender ='male' ";
        									$resQuery = mysqli_query($con,$resNo);
        									
        									//this checks for the nuumber of students in a foor
        									while($resline = mysqli_fetch_array($resQuery))
        									{
        											$looki = $resline['roomNum'];
        											$resSize++;
        									}
        									
        									if($resSize <= 2)//this will enetr students in the first floor if true
        									{
        									    
        									    
        									    if($roomType == "DOUBLE") // THISWILLL ASSIGN STUDENTS TO A DOUBLE  ROOOM
        									    {
                										$size = 0;
                									
                										$roomNum="W2-G0".$countM ;
                										$search ="select roomNum from Residence WHERE gender = 'male' AND roomNum = '$roomNum'";
                										$searchQuery = mysqli_query($con,$search);
                										while($find = mysqli_fetch_array($searchQuery))
                										{
                											$look = $find['roomNum'];
                											$size++;
                										}
                										
                										echo "<script>alert('".$roomNum."');</script>";
                										if($size==0 || $size==1)
                											{
                                                                //studNum	name	surname	roomNum	roomType	status	gender	resName	date Residence

                											$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                           /* ///////
                                                            $to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											
                											}elseif($size == 2)
                											{
                											   
                												$countM=$countM+1;
                												$roomNum="W2-G0".$countM ;
                												$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}
                											
                											
        									    }elseif($roomType == "SINGLE")
        									    {
        									        if($lines['yearStudy'] != "1")
        									        {
        									              if(($totalMarks /$num) >= 75)//must change to 1 not First_year
        									        {
        									          
        									        //THIS IS FOR SINGLE ROOMS
        									        
        									        $singlRM=0; //this is for the floor not  the whole res
                									$singleM ='select roomNum from Residence WHERE gender ="male" AND roomType = "SINGLE"';
                									$singleQueryM = mysqli_query($con,$singleM);
                									
                									//this checks for the nuumber of students in a foor
                									while($singleline = mysqli_fetch_array($singleQueryM))
                									{
                											$singleRoomM = $singleline['roomNum'];
                											$singlRM++;
                									}
                									
                									
                									// each floor will have 3 sinlges but for testiing cases we will use 1
                									if($singlRM <1) //this checks if the single roooms in the first floor are less than 10
                									{
                									        
                									        
                									        if($singlRM>0)
                									        {
                									            $countSM=$countSM+2;
                									        }else
                									        {
                									            $countSM=$countSM+1;
                									        }

                											 
                											$roomNum="W2-GS10".$countSM ;
                									    	$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                									}else
                									{
                									    	echo "<script>alert(' Please try and apply for Sharing, Single rooms are full');</script>"; //please test this
                                                            echo '<script language="javascript">
                                                                document.location="apply.php";
                                                            </script>';
                									}
                									
                									
                									
                									
        									    }else
        									    {
        									        echo "<script>alert(' Please try and apply for Sharing you marks are lower than 75');</script>";
        									    }
        									        }else{
        									            echo "<script>alert(' Please try and apply for Sharing, First years don't qualify for single roms);</script>"; //please test this
        									        }
        									      
        									        }
        									 
        									}
        									elseif($resSize >2 )//second floor inputs   we dont have single rooms in the second floor
        									{
        									    
        									    
        									    if($roomType = "DOUBLE")
                							    {
                									        $sizeUp = 0;
                										$roomNum="W2-10".$countM ;
                										$search ="select roomNum from Residence WHERE gender='male' AND roomNum = '$roomNum'";
                										$searchQuery = mysqli_query($con,$search);
                										while($find = mysqli_fetch_array($searchQuery))
                										{
                											$look = $find['roomNum'];
                											$sizeUp++;
                										}
                										if($sizeUp==0 ||$sizeUp==1)
                											{
                
                										$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}elseif($sizeUp == 2)
                											{
                												$countM=$countM+1;
                												$roomNum="G0".$countM ;
                											$insert="insert into Residence  (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}
                							    }elseif($roomtype=="single")
                							    {
                							        
        									        if($lines['yearStudy'] != "1")
        									        {
        									            //THIS IS FOR DOUBLE ROOMS
        									         if(($totalMarks /$num) >= 75)//must change to 1 not First_year
        									        {
        									        
        									        $singlRM=0; //this is for the floor not  the whole res
                									$singleM ='select roomNum from Residence WHERE gender ="male" AND roommType ="SINGLE"';
                									$singleQueryM = mysqli_query($con,$singleM);
                									
                									//this checks for the nuumber of students in a foor
                									while($singleline = mysqli_fetch_array($singleQueryM))
                									{
                											$singleRoomM = $singleline['roomNum'];
                											$singlRM++;
                									}
                									
                									
                									// each floor will have 3 sinlges but for testiing cases we will use 1
                									if($singlRM < 2) //this checks if the single roooms in the first floor are less than 10
                									{
                									        
                									        $countSM=$countSM+1;
                											$roomNum="W2-S10".$countM ;
                									    	$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                									}else
                									{
                									    	echo "<script>alert(' Please try and apply for a Sharing, Single rooms are full');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="apply.php";
                                                            </script>';
                									}
                									
                									
                									
                									
        									    
                							    }else
        									    {
        									        echo "<script>alert(' Please try and apply for Sharing you marks are lower than 75');</script>";
        									    }
        									        }else{
        									            echo "<script>alert(' Please try and apply for Sharing, First years don't qualify for single roms);</script>"; //please test this
        									        }
        									        
        									        
                							    }
        										
        									}//END OF THE MALE RES ALLOCATION
        									
        						
        									
        									
        									
        									
        								}elseif($_SESSION['gender'] == "female")
        								{
        								    
        								    $gender = $_SESSION['gender'];
        								  	$resSize=0; //this is for the floor not  the whole res
        									$resNo ="select roomNum from Residence WHERE gender = 'female' ";
        									$resQuery = mysqli_query($con,$resNo);
        									
        									//this checks for the nuumber of students in a foor
        									while($resline = mysqli_fetch_array($resQuery))
        									{
        											$looki = $resline['roomNum'];
        											$resSize++;
        									}
        									
        									if($resSize <= 2)//this will enetr students in the first floor if true
        									{
        									    
        									    
        									    if($roomType == "DOUBLE") // THISWILLL ASSIGN STUDENTS TO A DOUBLE  ROOOM
        									    {
                										$size = 0;
                									
                										$roomNum="W1-G0".$countF;
															$status = "ACCEPTED";
															$search ="select roomNum from Residence WHERE gender='female' AND roomNum = '$roomNum'";
															$searchQ = mysqli_query($con,$search);
															while($find = mysqli_fetch_array($searchQ))
															{
                											$look = $find['roomNum'];
                											$size++;
                										}
                										if($size==0 || $size==1)
                											{
                                                                   
                											$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                										if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}elseif($size == 2)
                											{
                											   
                											$countF=$countM+1;
                												$roomNum="W1-G0".$countF ;
                												$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}}
        									    }elseif($roomType == "SINGLE")
        									    {
        									        if($lines['yearStudy'] != "1")
        									        {
        									              if(($totalMarks /$num) >= 75)//must change to 1 not First_year
        									        {
        									          
        									        //THIS IS FOR SINGLE ROOMS
        									        
        									         $singlRF=0; //this is for the floor not  the whole res
                									$singleF ='select roomNum from Residece WHERE gender="female" roommType = "SINGLE"';
                									$singleQueryF = mysqli_query($con,$singleF);
                									
                									//this checks for the nuumber of students in a foor
                									while($singleline = mysqli_fetch_array($singleQueryF))
                									{
                											$singleRoomF = $singleline['roomNum'];
                											$singlRF++;
                									}
                									
                									
                									// each floor will have 3 sinlges but for testiing cases we will use 1
                									if($singlRF <2) //this checks if the single roooms in the first floor are less than 10
                									{
                									        
                									        
                									        if($singlRF>0)
                									        {
                									            $countSF=$countSF+2;
                									        }else
                									        {
                									            $countSF=$countSF+1;
                									        }

                											 
                											$roomNum="W1-GS10".$countSF ;
                									    	$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                									}else
                									{
                									    	echo "<script>alert(' Please try and apply for Sharing, Single rooms are full');</script>"; //please test this
                                                            echo '<script language="javascript">
                                                                document.location="apply.php";
                                                            </script>';
                									}
                									
                									
                									
                									
        									    }else
        									    {
        									        echo "<script>alert(' Please try and apply for Sharing you marks are lower than 75');</script>";
        									    }
        									        }else{
        									            echo "<script>alert(' Please try and apply for Sharing, First years don't qualify for single roms);</script>"; //please test this
        									        }
        									      
        									        }
        									 
        									}
        									elseif($resSize >2 )//second floor inputs   we dont have single rooms in the second floor
        									{
        									    
        									    
        									    if($roomType = "DOUBLE")
                							    {
                									    $sizeUp = 0;
                										$roomNum="W1-10".$countM ;
                										$search ="select roomNum from Residence WHERE gender ='female' AND roomNum = '$roomNum'";
                										$searchQuery = mysqli_query($con,$search);
                										while($find = mysqli_fetch_array($searchQuery))
                										{
                											$look = $find['roomNum'];
                											$sizeUp++;
                										}
                										if($sizeUp==0 ||$sizeUp==1)
                											{
															$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}elseif($sizeUp == 2)
                											{
                												$countF=$countM+1;
                												$roomNum="W1-G0".$countF ;
                										$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES($stdNum,'$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                											}
                							    }elseif($roomtype=="single")
                							    {
                							        
        									        if($lines['yearStudy'] != "1")
        									        {
        									            //THIS IS FOR DOUBLE ROOMS
        									         if(($totalMarks /$num) >= 75)//must change to 1 not First_year
        									        {
        									        
        									        //THIS IS FOR SINGLE ROOMS
        									        
        									        $singlRF=0; //this is for the floor not  the whole res
                									$singleF ='select roomNum from Residence WHERE gender ="female" AND roommType ="SINGLE"';
                									$singleQueryF = mysqli_query($con,$singleF);
                									
                									//this checks for the nuumber of students in a foor
                									while($singleline = mysqli_fetch_array($singleQueryF))
                									{
                											$singleRoomM = $singleline['roomNum'];
                											$singlRF++;
                									}
                									
                									
                									// each floor will have 3 sinlges but for testiing cases we will use 1
                									if($singlRF < 2) //this checks if the single roooms in the first floor are less than 10
                									{
                									       $countSF=$countSF+1;
                											$roomNum="W1-S10".$countSF ;
                									    	$insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                											$res = mysqli_query($con,$insert);
                											if($res)
                											{
                											    echo "<script>alert('PLease check your email for more details');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="index.php";
                                                            </script>';
                                                            $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\nEmail: $email_address\n\nRoomNum: $roomNum\n\nPhone: $phone\n\nMessage:\n$message";
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
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations Your room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
                                                            /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                                        	$email_body = "we have received application for a room, Congratulations YOur room Number is $roomNum.\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);*/
                											}
                									}else
                									{
                									    	echo "<script>alert(' Please try and apply for a Sharing, Single rooms are full');</script>";
                                                            echo '<script language="javascript">
                                                                document.location="apply.php";
                                                            </script>';
                									}
                									
                									
                									
                									
        									    
                							    }else
        									    {
        									        echo "<script>alert(' Please try and apply for Sharing you marks are lower than 75');</script>";
        									    }
        									        }else{
        									            echo "<script>alert(' Please try and apply for Sharing, First years don't qualify for single roms);</script>"; //please test this
        									        }
        									        
        									        
                							    }
        										
        									}//END OF THE FEMALE RES ALLOCATION
        									
        						
        									
        									
        									
        								
        										
        									}//END OF THE FEMALE RES ALLOCATION}
        								
        						
							
							
						
						}else
						{
						    // for students hu dnt qualify at all
						    // If student marks are less tthan 50&& Tgey no first yeaar students then reject them
                            $roomType= $_POST['roomType'];
							
							$studentName=$_SESSION['name'];
							$surname=$_SESSION['SName'];
							$stdNum=$_SESSION['stdNum'];
							$status = "REJECTED";
							$seleAdmin = "select * from admin";
							        $testAdmin = mysqli_query($con,$seleAdmin);

							$lineAdmin=mysqli_fetch_array($testAdmin);
        							
        					$resAdmin = $lineAdmin['name'] .' '.$lineAdmin['lastName'];	
							$roomNum ="N/A";
							$gender = $_SESSION['gender'];
								if($_SESSION['gender'] == "male")
								{
								    
								    
								    $gender = $_SESSION['gender'];
    							    $insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                					$res = mysqli_query($con,$insert);
    								 echo "<script>alert(' Unfortunately You do not qualify, Please check your email for more Details');</script>";
    							        	$email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
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
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	                $headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
    							        	/*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                        	$headers .= "Reply-To: $email_address";   
                                        	mail($to,$email_subject,$email_body,$headers);*/
                                        	echo '<script language="javascript">
                                                    document.location="index.php";
                                                </script>';
								}
								else
								{
								    $roomType= $_POST['roomType'];
							
							$studentName=$_SESSION['name'];
							$surname=$_SESSION['SName'];
							$stdNum=$_SESSION['stdNum'];
							$status = "REJECTED";
							$seleAdmin = "select * from admin";
							        $testAdmin = mysqli_query($con,$seleAdmin);

							$lineAdmin=mysqli_fetch_array($testAdmin);
        							
        					$resAdmin = $lineAdmin['name'] .' '.$lineAdmin['lastName'];	
							$roomNum ="N/A";
							$gender = $_SESSION['gender'];
								    $gender = $_SESSION['gender'];
								   $insert="insert into Residence (stdNum,name,surname,roomNum,roomType,status,gender,resName,date) VALUES('$stdNum','$studentName','$surname','$roomNum','$roomType','$status','$gender','$resName','$date')";
                					$res = mysqli_query($con,$insert);
									echo "<script>alert(' Unfortunately You  do not qualify, Please check your email for more Details');</script>";
									        $email =$_SESSION["login"];
                                                            /////
                                                            for($i=$count=0;$i<strlen($email);$count+=+($stringsearch==$email[$i++]));
                            			                	if($count==1){ 
                                                        	// send 1 email
                                                        	$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
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
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                                                        	
                                                        	$to = $semail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                                        	$email_subject = "Website Contact Form:  $stdNum";
                                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	                $headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                        	$headers .= "Reply-To: $email_address";   
                                                        	mail($to,$email_subject,$email_body,$headers);
                            						    
                            			                	}
									        /*$to = $_SESSION["login"]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                                        	$email_subject = "Residence Application Results For:  $stdNum";
                                        	$email_body = "we have received application for a room, Unfortunately You  do not qualify .\n\n"."Here are the details:\n\nStudent Number: $stdNum\n\n";
                                        	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                        	$headers .= "Reply-To: $email_address";   
                                        	mail($to,$email_subject,$email_body,$headers);*/
                                        	/*echo "<script>alert(' Unfortunately You  do not qualify, Please check your email for more details');</script>";
                                        	echo '<script language="javascript">
                                                    document.location="index.php";
                                                </script>';*/
								}
								
						   }
						
						}
						
						 
						?>
				
            </div>
        </div>
    </div>
 
 
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About the developers</h2>
                        <p>A team of highly dedicated developers from the DSO34BT, Class of 2020.</p>
                    </div>
                    <div class="col-lg-6">
                        <h2>Notice</h2>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p>©2020 TUT<br></p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	
	

	
	
</body>





</html>