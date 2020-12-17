<?php
session_start();

//include("checklogin.php");
//check_login();
require_once('dbconnection.php');

if(isset($_POST['Submit']))
{
	
	$stdNum=$_POST['stdNum'];
	$email = $_POST['email'];
	$password = $_POST['password']; 
	$contact=$_POST['contact'];
	$date = $_POST['date'];
	
	mysqli_query($con,"UPDATE users SET stdNum='$stdNum', email='$email' ,password='$password', contactno='$contact', posting_date = '$date' where email = '".$_SESSION['login']."' ");
	$_SESSION['msg']="Profile Updated successfully";
}

include("nav.php");
?>


    
    

    <?php $ret=mysqli_query($con,"select * from news WHERE id='".$_GET['id']."'");
				while($row=mysqli_fetch_array($ret))
				{?>
    </div>
    <div id="promodiv" class="promodiv">
        <div class="jumbotron" id="promo" style="margin-bottom: 0px;">
           <h1 align="center"><?php echo $row['topic'];?>'s Information</h1>
        </div>
    </div>
 
 
	    <div id="explore">
        <div class="container">
            
            <div class="row">
				
				
				
				
				
				
				
      <section id="main-content">
          <section class="wrapper">
          	
             	
				<div class="row">
				  
				<?php 
			
					
					echo '<div class="col-lg-4">';
					echo '<img class="img-fluid" src="admin/'.$row['img'].'">';
					echo '<p align="right">'.$row['story'].'</p>';
					//this will help us get data for a specific row
					
                	echo '</div>';
			
			
				} ?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php
			
				
				/*$news = "SELECT * FROM news";
				$quiry = mysqli_query($con,$news);
				
				while($row = mysqli_fetch_array($quiry))
				{
					echo '<div class="col-lg-4">';
					echo '<h3>'.$row['topic'].'</h3><img class="img-fluid" src="'.$row['img'].'">';
					echo '<p>'.$row['story'].'</p>';
					echo '<p><a href="#"><i class="fa fa-arrow-right" id="icon"></i></a></p>';
                	echo '</div>';
				}*/
                  
				//perfect no error
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
                        <h2></h2>
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