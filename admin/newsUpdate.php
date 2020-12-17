<LABEL<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
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

    <title>Admin | Insert New Residence Updates</title>

      <?php 
      include("nav.php");
      $ret=mysqli_query($con,"select * from Student a, StudentRecords b WHERE a.stdNum = b.stdNum AND   email='".$_GET['uid']."'");
	  ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Residencial News</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();" enctype="multipart/form-data" >
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Topic </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="topic" placeholder="Type the Topic Here" Required>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Story</label>
                              <div class="col-sm-10">
                                  <textarea name="story" type="text" class="form-control" placeholder="Type your Story Here" Required></textarea>
                              </div>
                          </div>
                          
						  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image </label>
                              <div class="col-sm-10" width="200" height="121">
                                  <img id="uploadPreview" src="assets/img/friends/fr-10.jpg" class="avatar"/><br>
								  <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png"  Required  onchange="PreviewImage();"/>
                              </div>
                          	</div>
							   
                           <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme">
							   
							 </div>
							   
							   
			<?php 
			if(isset($_POST['Submit']))
			{
				
				$topic =$_POST['topic'];
				$story = $_POST['story'];
				$date = date("yy-m-d");
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'assets/img/newsPictures/';
				$target_file = $directory.$img_name;
				
					$query= "select * from news WHERE topic='$topic'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
					}
					
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$query= "insert into noticeBoard values('','$topic','$story','$target_file','$date')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("STORY SUCCESSFULLY UPDATED") </script>';
							
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
					
					
				}
				
	  
				?>		  
						  
						  
                          
                          </form>
						<label>VIEW NEWS UPDATES</label> <a href= "news.php">
							  <button class="btn btn-theme">VIEW</button></a>
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
