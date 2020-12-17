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

    <title>Admin | Update Residence News</title>
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

      <?php $ret=mysqli_query($con,"SELECT * FROM noticeBoard WHERE id ='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
	  
	  
	  												
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
                                  <input type="text" class="form-control" name="id" value="<?php echo $row['id'];?>">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Topic </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="topic" value="<?php echo $row['topic'];?>">
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Story</label>
                              <div class="col-sm-10">
                                  <input name="story" type="text" class="form-control" value="<?php echo $row['story'];?>" >
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                              <div class="col-sm-10">
                                  <input name="date" type="date" class="form-control" value="<?php echo $row['date'];?>" >
                              </div>
                          </div>
                          
						  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image </label>
                              <div class="col-sm-10">
                                  <img id="uploadPreview" src="<?php echo $row['img'];?>" class="avatar"/><br>
								  <input type="file" id="imglink" name="imglink" value="<?php echo $row['img'];?>" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
                              </div>
                          	</div>
							   
                           <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme">
							   
							 </div>
							   
							   
			<?php 
	   
	  }
			if(isset($_POST['Submit']))
			{
				$id = $_POST['id'];
				$topic =$_POST['topic'];
				$story = $_POST['story'];
				$date = $_POST['date'];
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'assets/img/newsPictures/';
				$target_file = $directory.$img_name;
				
					
					
					if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 

							
							$query_run=mysqli_query($con,"UPDATE noticeBoard SET id='$id',topic='$topic' ,story='$story', img='$target_file',date='$date' where id='".$_GET['uid']."'");
							

						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Story updated..") </script>';
							
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
					
					
			}
				
	  
				?>		  
						  
						  
                          
                          </form>
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
