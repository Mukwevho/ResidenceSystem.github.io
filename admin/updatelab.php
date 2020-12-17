<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();
if(isset($_POST['submit']))
{
	
	echo "Uzamile";
	$day=$_GET['day'];
	$slot1 = $_POST['slot1'];
	$slot2 = $_POST['slot2'];
	$slot3 = $_POST['slot3'];
	$slot4 = $_POST['slot3'];
	$slot4 = $_POST['slot4'];
	$slot5 = $_POST['slot5'];
	$slot6 = $_POST['slot6'];
	$slot7 = $_POST['slot7'];
	
	
	$update ="UPDATE labschedule set 
	Day='$day',
	slot1='$slot1',
	slot2='$slot2',
	slot3='$slot3',
	slot4='$slot4',
	slot5='$slot5',
	slot6='$slot6',
	slot7='$slot7' 
	WHERE Day='$day'";
	$ret=mysqli_query($con,$update);

if($ret)
{
	echo "<script>alert('".$_GET['day']." is updated');</script>";
}
else
{
	echo "<script>alert('Did not Update Try againg');</script>";
}
}
?><!DOCTYPE html>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
						  <form method="post">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h1 align="center"></i><?php echo $_GET['day']?> is being updated</h1>
	                  	  	  <hr>
							  
                              <thead>
                              <tr>
								<th>Day</th>
								<th>08:00-10:00</th>
								<th>10:00-12:00</th>
								<th>12:00-14:00</th>
								<th>14:00-16:00</th>
								<th>16:00-18:00</th>
								<th>18:00-20:00</th>
								<th>20:00-22:00</th>
								
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from labschedule where Day='".$_GET['day']."'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  { 
								  echo '<tr>';
								  echo '<td><b>'.$row['Day'].'</b></td>';
								  
								  echo '';
								  ?>
                              
                              
                                  
                                  <?php if($row['slot1'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot1"class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot1'].'" hidden="">'. strtoupper($row['slot1']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot1" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot1'].'" hidden="">'. strtoupper($row['slot1']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
							   		
								  
								  if($row['slot2'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot2" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot2'].'" hidden="">'. strtoupper($row['slot2']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot2" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot2'].'" hidden="">'. strtoupper($row['slot2']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['slot3'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot3" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot3'].'" hidden="">'. strtoupper($row['slot3']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot3" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot3'].'" hidden="">'. strtoupper($row['slot3']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  if($row['slot4'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot4" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot4'].'" hidden="">'. strtoupper($row['slot4']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot4" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot4'].'" hidden="">'. strtoupper($row['slot4']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['slot5'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot5" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot5'].'" hidden="">'. strtoupper($row['slot5']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot5" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot5'].'" hidden="">'. strtoupper($row['slot5']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['slot6'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot6" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot6'].'" hidden="">'. strtoupper($row['slot6']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot6" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot6'].'" hidden="">'. strtoupper($row['slot6']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
							  		}
								  
								  if($row['slot7'] == 'CLOSE')
							  		{ 
									  echo '<td align="center" style="color: white; background: red;">
									  <select name="slot7" class="form-control">
										<option style="color: white; background: red;" value="'.$row['slot7'].'" hidden="">'. strtoupper($row['slot7']) .'</option>
										<option style="color: white; background: green;" value="OPEN">OPEN</option>
											</select></td>';
									}else
								  	{
								  		echo '<td align="center" style="color: white; background: green;">
										<select name="slot7" class="form-control">
										<option style="color: white; background: green;" value="'.$row['slot7'].'" hidden="">'. strtoupper($row['slot7']) .'</option>
										<option style="color: white; background: red;" value="CLOSE">CLOSED</option>
											</select></td>';
									  
									  
							  		}
								  	
								  
								
								  $cnt=$cnt+1; }
								  ?>
								 
                                  
                              
                             
                              </tbody>
                          </table>
					  
					  
					  
					  
					  
					  	
					  
					  	<input type="submit" name="submit" value="submit">
					  
					  </form>
                      </div>
					
					
					
					
					
					
					
                  </div>
              </div>
		</section>
      </section
  ></section>
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
