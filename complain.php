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
    <title>Complaints</title>
<?php
include("nav.php");
?>

    
    </div>
    <div id="structure-promi" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1><?php echo $_SESSION['name']." ".$_SESSION['SName']." ";?> Complaints</h1>
                <p>Short description</p>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
		<div class="col">
                  <div class="col-md-12">
                    <div class="content-panel">
					  <form id="book" class="book" method="post">
					  

                    <div class="form-group"><label>Room Number
						
				  <input  type="text" required="" class="form-control" name="roomNum" value="
<?php 
$res = $_SESSION['gender'];
$search ="select roomNum from Residence WHERE stdNum ='".$_SESSION['stdNum']."'";
$searchQuery = mysqli_query($con,$search);
$find = mysqli_fetch_array($searchQuery);
 
		  echo  $find['roomNum'];

?>" readonly></label>
				  </div>
                    <div class="form-group"><label>Details</label>
						
						
						<select class="form-control" name="details">
						    <option value="Broken Window">Broken Window</option>
						    <option value="Leaking Water">Leaking Water</option>
						    <option value="Broken Lights">Broken Lights</option>
						    <option value="Broken Door" >Broken Door</option></option>
						    <option value="Broken Table">Broken Table</option>
						</select>   
						
						</div>
                    
					
                    
						<input type="submit" class="btn btn-primary" id="send_complaint" name="send_complaint" value="send_complaint" >
			<?php 
			
	
			
			
			if(isset($_POST['send_complaint']) && isset($_POST['roomNum']))
			{
				$roomNo = $_POST['roomNum'];
				$details= $_POST['details'];
				$stdN = $_SESSION['stdNum'];

				$name = $_SESSION['name'];
				$status = "Pending";
				$date = date("yy-m-d");
		
		
				
					$query= "insert into complaint values('','$stdN','$name','$roomNo','$details','$status','$date')";
				    $query_run = mysqli_query($con,$query);
				    
						if($query_run)
						{
							echo '<script type="text/javascript"> alert(Complaint sent) </script>';
							
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
				
				
			}
						?>
                </form>
					  
					  
					  <?php
					  $stdN =$_SESSION['stdNum']; 
					  $sel ="select * from complaint Where room ='".$find['roomNum']."'"; 
					  $ret = mysqli_query($con,$sel);
					  $row=mysqli_fetch_array($ret);
					  
					  if($row>0)
    				    {
    					  echo' <div  class="table-responsive">';
    						   echo '<table class="table table-striped table-advance table-hover">';
    	                  	  	  echo '<h1 align="center"></i>These are your Room Complaints</h1>';
    	                  	  	  echo '<hr>';
                                  
    						          $sel ="select * from complaint Where room ='".$find['roomNum']."'"; 
					  $ret = mysqli_query($con,$sel);
					  
					                    if(mysqli_num_rows($ret)  >0)
    								      {
        								           echo '<thead>';
                                              echo '<tr>';
                								
                						  		echo '<th>stdNum </th>';
                						  		echo '<th>Name </th>';
                								echo '<th>room</th>';
                								echo '<th>details</th>';
                								echo '<th>status </th>';
                						  		echo '<th>date </th>';
                						
                                                  echo '</tr>';
                                                  echo '</thead>';
    								        }
    								  while($rows = mysqli_fetch_array($ret))
    								  {
    								      
    								         
                                          echo '<tbody>';
    
        								 echo '<tr>';
                                          
                                          echo '<td align="center">'.$rows["stdNum"].'</td>';
        								  echo '<td align="center">'.$rows["name"].'</td>';
        								  echo '<td align="center">'.$rows["room"].'</td>';
                                          echo '<td align="center">'.$rows["details"].'</td>';
        								  
        								  if($rows["status"]== "fixed" || $rows["status"]== "FIXED")
        								  {
        								  	echo '<td style="color: aliceblue; background: green;">'.$rows["status"].'</td>';
        								  }else{
        								  		echo '<td style="color: aliceblue; background: red;">'.$rows["status"].'</td>';
        							  		}
                                          
        								  echo '<td align="center">'.$rows[6].'</td>';
        
        
                                          
                                          ?>
                                          <td>
                                     <a href="deleteComp.php?id=<?php echo $rows['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                                          
                                          <?php
                                          echo '</tr>'; 
        							  }
                                  
  
    					  }?>
                             
                              </tbody>
                          </table
                      </div>
                  </div>
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