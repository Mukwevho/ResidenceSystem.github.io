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
    <title>Residence Committee</title>
<?php
include("nav.php");
?>

    
    </div>
    <div id="structure-prom" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1>RESIDENCE COMMITTEE</h1>
                <p>Short description</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Residence Committee</h1>
                <p>This will be a much more detailed description of the academic structure. a lot can be written here. This can be even rendered from a server but to not show off our coding kills we will just make this information here very static. the department
                    or structure rather may give us well reviewed content to print here because we might be too busy with our next startup idea because, god, hellow we are geniuses.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                
				
				$news = "select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND  position = 'rc'";
				$quiry = mysqli_query($con,$news);
				
				while($row = mysqli_fetch_array($quiry))
				{
					//echo '<a href="newsPage.php?id='. $row['id'] .'">';
					echo '<div class="col-lg-4">';
					echo '<img class="img-fluid" src="admin/'.$row['image'].'">';
					echo '</a>';
					echo '<p><b>Name & Surname :</b>'.$row['name'].' '.$row['surname'].'</p>';
					echo '<p><b>Position :</b>'.$row['position'].'</p>';
					echo '<p><b>Motivational Qoute: </b>'.$row['motivation'].'</p>';
					echo '<p><b>Contact Details: </b>0'.$row['contactno'].'</p>';
				
					//this will help us get data for a specific row
					

                	echo '</div>';
				}
                  
				//perfect no error
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	
	

	
	
</body>





</html>