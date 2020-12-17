<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
/*if(isset($_POST['updateDetails'])){
$contact=$_SESSION['contact'];
$email=$_SESSION['email'];
 $ret=mysqli_query($con,"update admin set contact='$contact', email='$email' where username='$adminid'");
$_SESSION['msg']="Password Changed Successfully !!";
//header('location:user.php');
}*/
?>
<script language="javascript" type="text/javascript">
function valid()
{
if(document.form1.oldpass.value=="")
{
alert(" Old Password Field Empty !!");
document.form1.oldpass.focus();
return false;
}
else if(document.form1.newpass.value=="")
{
alert(" New Password Field Empty !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value=="")
{
alert(" Re-Type Password Field Empty !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value.length<6)
{
alert(" Password Field length must be atleast of 6 characters !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value.length<6)
{
alert(" Re-Type Password Field less than 6 characters !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.form1.newpass.focus();
return false;
}
return true;
}
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    
 
            <?php
            
                    if(isset($_POST['updateDetails']))
                    {
                        $contact=$_POST['contact'];
                        if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $contact ))
            	        {
            	            
                              if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	                            {   
                                
                                $email=$_POST['email'];
                                
                                $query="Update admin set contact='$contact', email='$email' WHERE username='".$_SESSION['username']."'";
                                $query_s=mysqli_query($con,$query);
                                //$ret=mysqli_query($con,"update admin set contact='$contact', email='$email' where username='".$_SESSION['login']."'");
                                
                               header('location:change-password.php');
            	                echo '<script type="text/javascript"> alert("Updated") </script>';
	                            }else{
	                                echo '<script type="text/javascript"> alert("Incorrect Email format!") </script>';
	                            }
	               
            	        }else
            	        {
            	            echo '<script type="text/javascript"> alert("Incorrect Number!") </script>';
            	        }
                  
                    }
                    
                     if(isset($_POST['updatePassword']))
                    {
                        $newPass=$_POST['newPass'];
                        $comfPass=$_POST['comfPass'];
                        if($newPass ==$comfPass)
            	        {
                                
                                
                                $query="Update admin set password='$comfPass' WHERE username='".$_SESSION['username']."'";
                                $query_s=mysqli_query($con,$query);
                                //$ret=mysqli_query($con,"update admin set contact='$contact', email='$email' where username='".$_SESSION['login']."'");
                                
                               header('location:change-password.php');
            	                echo '<script type="text/javascript"> alert(" PassWord Updated") </script>';
            	        }else
            	        {
            	            echo '<script type="text/javascript"> alert("Incorrect Password!") </script>';
            	        }
                  
                    }
            
                   include("nav.php");
             ?>
             
    
 
      <section id="main-content">
          <section class="wrapper">
          <!--	<h3><i class="fa fa-angle-right"></i> Admin Profile</h3> -->
			 <div class="col-md-12">  
   <!-- <div class="col-md-4">      
        <div class="portlet light profile-sidebar-portlet bordered">
            <div class="profile-userpic">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-responsive" alt=""> </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"> Course Name </div>
                <div class="profile-usertitle-job"> Year Study </div>
            </div>
        </div>
    </div>-->
    <div class="col-md-8"> 
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase"><h3 style="font-family:Times New Roman;text-align:center;"> Admin Profile</h3></span>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h4 style="font-family: Times New Roman;">Information</h4></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h4 style="font-family: Times New Roman;">Change Password</h4></a></li>
                       </ul>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <?php
                            $search="SELECT * FROM admin where username='".$_SESSION['username']."'";
                             $query_s=mysqli_query($con,$search);
                             while($row=mysqli_fetch_array($query_s)){
                                 

                            ?>
                            <form name="myForm" onsubmit="return validate()" method="POST">
                              <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" value="<?php echo $row['name']; ?>" readonly>
                              </div>
                                <div class="form-group">
                                <label for="inputLastName">Last Name</label>
                                <input type="text" class="form-control" id="inputLastName" value="<?php echo $row['lastName']; ?>" readonly>
                              </div>
							  
							  <div class="form-group">
                                <label for="exampleInputPassword1">Contact No.</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="contact" value="<?php echo $row['contact']; ?>" minlength="10" maxlength="10" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $row['email']; ?>" required>
                                
                              </div>
                              <input type="submit" name="updateDetails" class="btn btn-default" value="Update">
                            </form>
                            
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
							<form method="POST">
                              <div class="form-group">
                                <label for="inputName">New Password</label>
                                <input type="password" class="form-control" name="newPass" id="inputName" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password">
                              </div>
                            
							  <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" name="comfPass" id="exampleInputPassword1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password">
                              </div>
                               <button type="submit" class="btn btn-default" name="updatePassword">Update</button>
                            </form>
                            <?php }?>
						</div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
		</section>
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
