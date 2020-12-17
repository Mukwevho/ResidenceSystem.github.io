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
	
	mysqli_query($con,"UPDATE Student SET stdNum='$stdNum', email='$email' ,password='$password', contactno='$contact', posting_date = '$date' where email = '".$_SESSION['login']."' ");
	$_SESSION['msg']="Profile Updated successfully";
}

include("nav.php");
?>

 <?php $ret=mysqli_query($con,"select * from noticeBoard WHERE id='".$_GET['id']."'");
				while($row=mysqli_fetch_array($ret))
				{?>
				
			
    </div>
    <div id="article-div">
        <div class="container">
            <div id="article-picture"><?php echo '<img class="img-fluid" src="admin/'.$row['img'].'">'; ?></div>
            <div id="article">
                <h1 id="article-heading"><?php echo $row['topic'];?></h1>
            </div>
            <div id="araticle-content">
                 <?php echo '<p>'.$row['story'].'</p>'; }?><br><br></p>
            </div>
            <hr>
            <div></div>
            
                </div>
                <hr>
            </div>
        </div>
    </div>
    <footer>
        <div id="footer-content"><span>©</span><span class="current-year">Year</span><span>TUT</span></div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>