
<?php
require("dbconnection.php");
$query ="select * from users a, student_records b WHERE a.stdNum = b.stdNum";
$query_l = mysqli_query($con,$query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

	<div class="table-responsive">
<?php	
		$output = '
		
	<table width="200" border="1">
  <tbody>
    <tr>
	<th>Sno.</th>
        <th class="hidden-phone">First Name</th>
        <th> Last Name</th>
        <th> Email Id</th>
        <th>Contact no.</th>
        <th>Reg. Date</th>
		</tr>
		
    
	';
	
	  
	  $rows = mysqli_num_rows($query_l);
	  $cnt = 1;
	  
		 while( $row = mysqli_fetch_array($query_l))
		 {
		  $output.='
			<tr>
		<td>'.$cnt.'</td>
		<td>'.$row['name'].'</td>
		<td>'.$row['SName'].'</td>
		<td>'.$row['email'].'</td>
		<td>'.$row['contactno'].'</td>
		<td>'.$row['posting_date'].'</td>
    	</tr>
		 ';
			$cnt = $cnt+1; 
	  }

		  
	  
	    $output.= '</tbody>';
		$output.= '</table>';
		
		
		header('content-Type:application/xls');
		header('Content-Disposition:attachment;filename=download.xls');
		echo $output;
		echo $output;
		?>
		
	</div>