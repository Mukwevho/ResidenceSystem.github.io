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
    <title>Residence Mentors</title>
<?php
include("nav.php");
?>

    
    </div>
    <div id="structure-promo" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1>Residence Mentorship Programme</h1>
                <p>Short description</p>
				
				<?php
					$select ="select * from Student WHERE position ='mentor' AND stdNum =".$_SESSION['stdNum'];
					$ret=mysqli_query($con,$select);
					$num =  mysqli_fetch_array($ret)	;	  
								if($num >0)
								{
									echo('<p><a class="btn btn-primary"  href="check/booking.php" role="button">Accept sessions</a></p>');
								}
								
							
							?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Mentors</h1>
                <p>This will be a much more detailed description of the academic structure. a lot can be written here. This can be even rendered from a server but to not show off our coding kills we will just make this information here very static. the department
                    or structure rather may give us well reviewed content to print here because we might be too busy with our next startup idea because, god, hellow we are geniuses.</p>
            </div>
        </div>
        <div class="row">
		                <?php
                
				
				$news = "select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND  position ='mentor'";
				$quiry = mysqli_query($con,$news);
				
				while($row = mysqli_fetch_array($quiry))
				{
					
					echo '<div class="col-lg-4">';
					echo '<img class="img-fluid" src="admin/'.$row['image'].'">';
					echo '</a>';
					echo '<p><b>Name & Surname :</b>'.$row['name'].' '.$row['surname'].'</p>';
					echo '<p><b>Position :</b>'.$row['position'].'</p>';
					echo '<p><b>Motivational Qoute: </b>'.$row['motivation'].'</p>';
					echo '<p><b>Contact Details: </b>'.$row['contactno'].'</p>';
					
					//this will help us get data for a specific row
					

                	echo '</div>';
				}
                  
				//perfect no error
				?>
            <div class="col">
                
            </div>
        </div>
    </div>
 
	  
	
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row">
                    <div class="col-lg-6">
					<h3 align="center">TO BOOK A SESSION</h3>
					
                <form id="book" class="book" method="POST">
                    
                    
                    <div class="form-group"><label>Name & Surname
						
				  <input  type="text"  class="form-control" name="name" value="<?php echo 	$_SESSION['name'].' '.$_SESSION['surname']?>" readonly></?> </label></div>
						
						
						
                    <div class="form-group"><label>Cellphone Number
				  <input name="cellNum" type="number" required="" class="form-control" name="cellNum" maxlength="10" minlength="10" value="<?php echo '0'.$_SESSION['number'];?>" readonly></label>
				  </div>
				  
				  <div class="form-group"><label>Student Number
						
						<input  type="number" required class="form-control" name="stdNum" maxlength="9" minlength="9" value="<?php echo $_SESSION['stdNum'];?>"  readonly></label>
						</div>
						
						
                    <div class="form-group"><label></label>High Risk Modules
						
                            <select class="form-control" name="details">
                                
								<option class="dropdown-item" role="presentation" value="DSO17AT">DS017AT</option>
								<option class="dropdown-item" role="presentation"  value="DSO17BT">DSO17BT</option>
								<option class="dropdown-item" role="presentation"  value="TPG11T">TPG111T</option>
								<option class="dropdown-item" role="presentation" value="TPG201T">TPG201T</option>
								<option class="dropdown-item" role="presentation"  value="DSO23AT">DSO23AT</option>
								<option class="dropdown-item" role="presentation"  value="DSO23BT">DSO23BT</option>
								<option class="dropdown-item" role="presentation" value="SSF24AT">SSF24AT</option>
								<option class="dropdown-item" role="presentation"  value="SSF24BT">SSF24BT</option>
								<option class="dropdown-item" role="presentation"  value="CGS10BT">CGS10BT</option>
                               </select> </label></br>
								
                        
						
					</div>
					
					
					 <div class="form-group"><label>Mentor
                                          
                                              <select class="form-control" name="Mentor">
                                              
                                              
                                                 
                                                 <?php
                                                        
                                                        $kereya = "select * from Student a, StudentRecord b WHERE a.stdNum = b.stdNum AND  position ='mentor'";
                                                        $kereyaQuery = mysqli_query($con,$kereya);
                                                        while($moline = mysqli_fetch_array($kereyaQuery))
                                                        {
                                                            echo '<option value = "'.$moline['name'].'">'. strtoupper($moline['name']).' '.strtoupper($moline['surname']) .'</option>';
                                                        }
                                                        ?>
                                                
                                                </select></label>
                                          
                                      </div>
					
					
					
                     <div class="form-group">
                        <label>Date & Time</label>
							</br>
							<input style="color: aliceblue; background: green;" type="date" value="data"  name="date1">
							
							<input style="color: aliceblue; background: green;" type="time"  name="time" min="08:00" max="16:00" >
                    
					</div>
                    
						<input type="submit" class="btn btn-primary" id="book" name="book" value="book" >
			
                </form>
                   </div>
                   
                   <?php 
			
			    
			    
			    
			if(isset($_POST['book']))
			{
				
				$stdN = $_POST['stdNum'];
				$time = $_POST['time'];
				$date1 = $_POST['date1'];
				$cellNo = $_POST['cellNum'];
				$details= $_POST['details'];
				$name =$_POST['name'];
				$date = date("yy-m-d");
		
		
				$dateTime = $date1.' '.$time;
				$status = "Pending";
				$Mentor = $_POST['Mentor'];
					if($Mentor == $_SESSION['name'])
					{
					    echo '<script type="text/javascript"> alert("OU CAN NOT BOOOK YOURSELF TRY ANOTHER MENTOR") </script>';
					}else
					{
				
                            if($date1 >=$date)
                            {
                                	$queryB= "insert into booking values('','$stdN','$dateTime','$cellNo','$details','$name','$date','$status','$Mentor')";
            				        $query_runB = mysqli_query($con,$queryB);
            						
            						if($query_runB)
            						{
            							echo '<script type="text/javascript"> alert("Booking successful") </script>';
            							
            						}
            						else
            						{
            							echo '<script type="text/javascript"> alert("Error!") </script>';
            						}
                            }else{
                                echo '<script type="text/javascript"> alert("Please choose a date greater or equal to today") </script>';
                            }
            			
            			}
			    }
			?>
                   
                    <div class="col-lg-6">
                    
          
                    
                    <div  class="table-responsive">
                        <h2>Notice</h2>
						
						<table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa" ></i> Booking Details</h4>
	                  	  	  <hr>
                              <thead>
                              <tr stystyle="color: aliceblue;">
                                  <th style="color: aliceblue;">Student Number.</th>
                                  <th class="hidden-phone" style="color: aliceblue;">Session Details</th>
                                  <th style="color: aliceblue;">Session Date</th>
								  <th style="color: aliceblue;">Mentor</th>
                                  <th style="color: aliceblue;">Status</th>
                                  
                                  <th style="color: aliceblue;">Delete</th>

								  
								  
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
								  $sel ="select * from booking Where stdNum =".$_SESSION['stdNum']; 
								$ret=mysqli_query($con,$sel);
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {
                                 echo' <tr>';
                                      echo '<td style="color: black;">'.$row['stdNum'].'</td>';
                                      echo '<td style="color: black;">'. $row['sessionDetails'].'</td>';
                                      echo '<td style="color: black;">'.$row['time'].'</td>';
    								  echo '<td style="color:black;">'.$row['Mentor'].'</td>';
                                      if($row['Status']== "approved" ||$row['Status']== "Approved" || $row['Status']== "APPROVED")
    								  {
    								  	echo '<td style="color: black; background: green;">'.$row['Status'].'</td>';
    								  }else{
    								  		echo '<td style="color: black; background: red;">'.$row['Status'].'</td>';} 
    							?>
                                  <td>
                                     <a href="deleteBook.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
						
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