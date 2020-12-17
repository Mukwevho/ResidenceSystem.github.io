<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | REsidence sttructure</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	  
	  
	  
	<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>  
	  
  </head>

  
      <?php $ret=mysqli_query($con,"select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND   email='".$_GET['uid']."'");
	  ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Residencial News</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();" enctype="multipart/form-data" >
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
						   
							<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Student Number </label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="stdNum" minlength="9"  maxlength="9"  required>
                              </div>
                          </div>
						  
                          
						  
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Position</label>
                              <div class="col-sm-10">
                                  
								  
								   <select class="form-control" name="position" class="form-control">
									  	<option value="mentor">MENTOR</option>';
										<option value="rc">RESIDENCE COMMITEE</option>';
									  	
								  </select>
                              </div>
                          </div>
						  
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" required>Motivation </label>
                              <div class="col-sm-10">
                                  <input name="motivation" type="text" class="form-control">
                              </div>
                          </div>
						  
						    <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;" required>Gender</label>
                              <div class="col-sm-10">
                                  <select class="form-control" name="gender" class="form-control">
									  	<option value="female">FEMALE</option>';
										<option value="male">MALE</option>';
									  	
								  </select>
                              </div>
                          </div>-->
						  
						  	
						  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image </label>
                              <div class="col-sm-10">
                                  <img id="uploadPreview" src="assets/img/friends/fr-10.jpg" class="avatar"/><br>
								  <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" required/>
                              </div>
                          	</div>
							   
                           <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
							   
							   
							   
							   
			<?php 
			if(isset($_POST['Submit']) )
			{
				$stdNum =$_POST['stdNum'];
				
				$position  = $_POST['position'];
				$motivation = $_POST['motivation'];
				//$gender  = $_POST['gender'];
				 // this must come from database
				$date = date("yy-m-d");
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'assets/img/supportStructure/';
				$target_file = $directory.$img_name;
				
				//dis helps to check if student has a res and if they do it  gives us the rooom number
				$check= "select * from Residence WHERE stdNum='$stdNum'";
				$check_run = mysqli_query($con,$check);
				
				$assignRomNum = mysqli_fetch_array($check_run);
                $roomNum = $assignRomNum['roomNum'];
				$name =$assignRomNum['name'];
				$surname = $assignRomNum['surname'];
				
				
				//this gives us the student details
				$checkNum= "select * from Student WHERE stdNum='$stdNum'";
				$check_runNum = mysqli_query($con,$checkNum);
				$look4Num = mysqli_fetch_array($check_runNum);
                $contact = $look4Num['contactno'];
                
				
				if(substr($stdNum,0,3) <= 221 && substr($stdNum,0,3)>200)
				{
        				if($check_run)
        				{
        					$query= "select * from Student WHERE stdNum='$stdNum'";
        					$query_run = mysqli_query($con,$query);
        					$motivation1= mysqli_fetch_array($query_run);
        					
        					if($motivation1['motivation'] != "N/A")
        					{
        						// there is already a user with the same username
        						echo '<script type="text/javascript"> alert("YOUR ALREADY A SUDENT SUPPORTER") </script>';
        					}
        					else if(file_exists($target_file))
        					{
        						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
        					}
        					else if($img_size>20097152)
        					{
        						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
        					}
        					else
        					{
        						move_uploaded_file($img_tmp,$target_file); 	
        						//$query= "insert into supportstructure values('','$stdNum','$name','$surname','$position','$motivation','$roomNum','$contact','$target_file','$date')";
        						
                                	
                                	
                                $query= "UPDATE Student SET position='$position' ,motivation='$motivation',image='$target_file', appointmentDate='$date' WHERE stdNum =".$stdNum;
                                   
                                    
         
        						$query_run = mysqli_query($con,$query);
        						
        						if($query_run)
        						{
        							echo '<script type="text/javascript"> alert("New Member Inserted") </script>';
        							
        						}
        						else
        						{
        							echo '<script type="text/javascript"> alert("Error!") </script>';
        						}
        					}	
        					
        				}
        				else{
        					echo '<script type="text/javascript"> alert("NOT REGISTERED IN OUR TSHWANE UNIVERSITY OF TECHONOLOGY!") </script>';
        				}
			    
				  
				}else{
				     echo '<script type="text/javascript"> alert("'.$stdNum.' incorrect student number") </script>';
				}
			}
				
	  
				?>		  
						  
						  
                          
                          </form>
                          <label>RESIDENCE ACADEMIC SUPPORT TEAM
                          <a href= "structure.php">
							  <button class="btn btn-theme">VIEW</button></a>
						  </label>
						  
						  
						  
						  
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
