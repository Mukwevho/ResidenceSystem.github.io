<?php
session_start();

include("checklogin.php");

check_login();
require_once('dbconnection.php');

if(isset($_POST['Update']))
{
    
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)||preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['email']))
	{
	           $contact=$_POST['tel'];
	        if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $contact ))
	        {
	
            	
            	$email = $_POST['email'];
            	$password = $_POST['password']; 
            	
            
            
            	
           
            	    	mysqli_query($con,"UPDATE Student SET email='$email' , contactno='$contact' where email = '".$_SESSION['login']."' ");
            	
                echo "<script>alert('Updated Succefully');</script>";
                //echo "<script>alert('PLease check your email for more details');</script>";
                    echo '<script language="javascript">
                    document.location="index.php";
                    </script>';
            	    
            	    
            	    
            	    
            
            	
	        }else
	        {
                echo "<script>alert('INVALID CELLPHONE NUMBER');</script>";
	        }
    }else
    {
        echo "<script>alert('INVALID EMAIL');</script>";
    }
}


?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
<?php
include("nav.php");
?>


    
    </div>
    <div id="promodiv" class="promodiv">
        <div class="jumbotron" id="promo" style="margin-bottom: 0px;">
            <h1 id="promoHeading"><?php
								echo $_SESSION['name']." ".$_SESSION['SName'];
							
							?><br>Welcome to your Tshwane Universty Of Technology Residence System Profile</h1>
            <p></p>
           
        </div>
    </div>
 
 
	    <div id="explore">
        <div class="container">
            <div class="row">
				
				
				
				
				
				
				<?php $ret=mysqli_query($con,"select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND   email='".$_SESSION['login']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
              <!---------------------------------------------------------------->
              <div class="container"> 
<div class="col-md-12">  
    <div class="col-md-8"> 
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase"><h3 style="font-family:Times New Roman;text-align:center;"> STUDENT DETAILS</h3></span>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                    <?php
                                    
                                    $search ="select * from Residence WHERE stdNum = ".$_SESSION['stdNum'];
                                    $searchQuery = mysqli_query($con,$search);
                                    $find = mysqli_fetch_array($searchQuery);
                                    
                                   
                              ?>
                
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h4 style="font-family: Times New Roman;">Your Information</h4></a></li>
                        
                        
                        <?php
                        
                        if($find['roomType'] == "DOUBLE")
					    {
                          echo '<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h4 style="font-family: Times New Roman;">Roomate Infomation</h4></a></li>';
                        }
                        ?>
                       </ul>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <?php 
                            $ret=mysqli_query($con,"select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND   email='".$_SESSION['login']."'");
	                         $row=mysqli_fetch_array($ret);
	  
	                            ?>
                            
                            <form name="myForm"  onsubmit="return validate()"  method="POST">
							<div class="form-group">
                                <label for="inputName">Student Number</label>
                                <input type="text" class="form-control" id="inputName" name="stdNum" value = "<?php echo $row['stdNum'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name"  value = "<?php echo $row['name'];?>"readonly>
                              </div>
                                <div class="form-group">
                                <label for="inputLastName">Last Name</label>
                                <input type="text" class="form-control" id="inputLastName"   name="email"value = "<?php echo $row['surname'];?>" readonly>
                              </div>
                              
                              
							  <div class="form-group">
                                <label for="exampleInputPassword1">Room Number</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"  value = "<?php echo $find['roomNum'];?>" readonly>
                              </div>
                              <!-------------------dont forget to validate ---------->
							  <div class="form-group">
                                <label for="exampleInputPassword1">Mobile Number</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="tel" value = "<?php echo $row['contactno'];?>"  minlength="10" maxlength="10" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value = "<?php echo $row['email'];?>">
                              </div>
                              
                             <!---------Update -----> 
                              <input type="submit" class="btn btn-default" name="Update" value="Update">
                            </form>
                        </div>
                        
                        <?php 
                        
                        
                    
                        
							    if($find['roomType'] == "DOUBLE")
							    {
							        
							        $res1 = $_SESSION['gender'].'res';
                                        $search1 ="select * from Residence WHERE stdNum <> '".$find['stdNum']."' AND roomNum = '".$find['roomNum']."'";
                                    $searchQuery1 = mysqli_query($con,$search1);
                                    
                                    $rowLine = mysqli_num_rows($searchQuery1);
                                    if($rowLine>0){
                                        
                                        $find1 = mysqli_fetch_array($searchQuery1);
                                    
							?>
                        <div role="tabpanel" class="tab-pane" id="profile">
							<!-------------------------Rommate details----->
							
							
							
							
							
							
							
                              <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" value = "<?php echo $find1['name'];?>" readonly>
                              </div>
                                <div class="form-group">
                                <label for="inputLastName">Last Name</label>
                                <input type="text" class="form-control" id="inputLastName" value = "<?php echo $find1['surname'];?>" readonly>
                              </div>
                              
                              <?php
                              
                              
                                    $searchUser ="select * from Student WHERE stdNum ='".$find1['stdNum']."'";
                                    $searchQueryUser = mysqli_query($con,$searchUser);
                                    $letha = mysqli_fetch_array($searchQueryUser);
                                    
                                    
                              ?>
                              
                              
							  <div class="form-group">
                                <label for="exampleInputPassword1">Contact No.</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value = "<?php echo $letha['contactno'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value = "<?php echo $letha['email'];?>" readonly>
                              </div>
                            <?php }
                            
                            
                            
                            
                            
                            
                            }?>
						</div>
						
						
						
						
					
						
						
						
						
						
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
              <!---------------------------------------------------------------->
              
          
                  
	                  
                  
        <?php } ?>
				
				
				
				<div class="col">
					<form method="post">
					    <?php
    					    $searchP ="select * from Student WHERE stdNum =".$_SESSION['stdNum'];
                            $searchQueryP = mysqli_query($con,$searchP);
                            $findP = mysqli_fetch_array($searchQueryP);
                            
                            if($findP>0){
                            $look =  md5($findP['password']);
                           
                            
                            
                        	if($findP['password'] == md5($_SESSION['stdNum']) )
                        	{
                        	    
                        	    echo '<label>Update Password</label><br>';
                        	    echo'<div class="input-group">';
                                echo '<div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>';
            					        echo ' <input type="text" class="form-control" name="oldPasword" placeholder="Enter Old Password" required>';
            					        echo ' <input type="password" class="form-control" name="newPasword" placeholder="Enter New Password " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required >';
            					echo '<div class="input-group-append"></div>';
            					
    					        echo'<input type="submit" name="change" value="update password">';
                        	}}
                        ?>
                        
                        
					 </form>
			    </div>
			   
			    
			    <?php
			    
			            if(isset($_POST['change']))
			            {
    					    $oldPass = $_POST['oldPasword'];
    					    $newPass = $_POST['newPasword'];
    					    //compare the old entered password with the old databbase password
    					    $searchOldP ="select password from Student WHERE stdNum =".$_SESSION['stdNum'];
    					    $oldPssQ = mysqli_query($con,$searchOldP);
    					    
    					    
    					    $fetchLine = mysqli_fetch_array($oldPssQ);
    					    
    					    
    					    if($fetchLine>0)
    					    {
    					        $enc_password=md5($newPass);
                                        //this will change the password to your student number so that u can update it
                                    
                                        
                            mysqli_query($con,"UPDATE Student SET password='$enc_password' where stdNum ='".$_SESSION['stdNum']."' ");
                            echo  "<script>alert('Your Password has been updated Successfully');</script>";
                             echo '<script language="javascript">
                                    document.location="profile.php";
                                </script>';
    					    }
					    
			            }
					    
					  
				?>
				
				
				
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
    	</section>
      </section></section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	
	

	
	
</body>





</html>