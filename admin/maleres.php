<?php
session_start();
include'dbconnection.php';
include("checklogin.php");

check_login();
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from Student where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}



?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Male Residence</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>-->
    <link href="css2/styles.css" rel="stylesheet" />
       <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>-->
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

<!--------------------------Code--------------------------------->
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', {
          extend: 'csv',
          "download": "download"
        }, {
          extend: 'excel',
          "download": 'download'
        }, {
          extend: 'pdf',
          text: 'Download PDF',
          download: 'download',
          customize: function(pdfDocument) {
            pdfDocument.content[1].table.headerRows = 1;
            var firstHeaderRow = [];
            $('#example').find("thead>tr:first-child>th").each(
              function(index, element) {
                var colSpan = element.getAttribute("colSpan");
                firstHeaderRow.push({
                  text: element.innerHTML,
                  style: "tableHeader",
                  colSpan: colSpan
                });
                for (var i = 0; i < colSpan - 1; i++) {
                  firstHeaderRow.push({});
                }
              });
            pdfDocument.content[1].table.body.unshift(firstHeaderRow);

          }
        }, {
          extend: 'print',
          download: 'download'
        }
      ]
    });
  });
</script>
<!------------------------------------------------------------->
  </head>
	<?php
	include("nav.php");
	?>

      <section id="main-content">
          <section class="wrapper">
          	<h3 align="center"><i class="fa fa"></i> MALE RESIDENCE</h3>
				<div class="row">    
                  <div class="col-md-12">
                      <div class="content-panel">
					 <!-- <h4><i class="fa fa-angle-right"></i> All User Details </h4>-->
                          <table class="display" id="example" style="width:100%">
						  
        <thead>
		<th colspan=3></th>
		  <th colspan=6>Male Residence</th>
            <tr>
                                 <th>Sno.</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Student Number</th>
                                  <th> Room Number</th>
                                  <th> Residence name</th>
                                  <th> Delete </th>
            </tr>
        </thead>
        <tbody>
		<?php
                              
                              if(!empty($_POST['search']))
                              {
                              $search = $_POST['search'];
                              
                              $ret=mysqli_query($con,"select * from Residence WHERE  date LIKE '%$search%' OR status LIKE '%$search%' OR roomNum LIKE '%$search%' OR stdNum LIKE '%$search%' AND ");
                              
                             
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {
                              echo'<tr>';
                              echo'<td>'.$cnt.'</td>';
                                  echo'<td>'.$row['name'].'</td>';
                                  echo'<td>'.$row['surname'].'</td>';
                                  echo'<td>'.$row['stdNum'].'</td>';
								  
                                  
								
								  if($row['roomNum'] == 'Waiting List' )
								  {
								  	echo '<td style="color: aliceblue; background: Orange;">'.$row['roomNum'].'</td>';
								  }elseif($row['roomNum'] == 'Cancelled' || $row['roomNum'] == 'N/A')
								  {
									  echo '<td style="color: aliceblue; background: red;">'.$row['roomNum'].'</td>';
								  }
							   else{
								  		echo '<td style="color: aliceblue; background: green;">'.$row['roomNum'].'</td>';
							  	} 
								 
								  
								  echo'<td>'.$row['resName'].'</td>';
							  
							
								  
								  
                                  echo'<td>';
                                     
                                     /*echo '<a href="updateRes.php?ustd='.$row['stdNum'].'"> ';
                                     echo'<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>';*/
                                     echo'<a href="deleteMale.php?stdNum='.$row['stdNum'].'">';
                                     ?>
                                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                    <?php
                                  echo'</td>';
                              echo'</tr>';
                               $cnt=$cnt+1; }
                              
                              }else
                              {
                                $ret=mysqli_query($con,"select * from Residence Where gender ='male'  ");
                              
                             
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {
                              echo'<tr>';
                              echo'<td>'.$cnt.'</td>';
                                  echo'<td>'.$row['name'].'</td>';
                                  echo'<td>'.$row['surname'].'</td>';
                                  echo'<td>'.$row['stdNum'].'</td>';
								  
                                  
								
								  if($row['roomNum'] == 'Waiting List' )
								  {
								  	echo '<td style="color: aliceblue; background: Orange;">'.$row['roomNum'].'</td>';
								  }elseif($row['roomNum'] == 'Cancelled' || $row['roomNum'] == 'N/A')
								  {
									  echo '<td style="color: aliceblue; background: red;">'.$row['roomNum'].'</td>';
								  }
							   else{
								  		echo '<td style="color: aliceblue; background: green;">'.$row['roomNum'].'</td>';
							  	} 
								 
								  
								  echo'<td>'.$row['resName'].'</td>';
							  
							
								  
								  
                                  echo'<td>';
                                     
                                     /*echo '<a href="updateRes.php?ustd='.$row['stdNum'].'"> ';
                                     echo'<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>';*/
                                     echo'<a href="deleteMale.php?stdNum='.$row['stdNum'].'">';
                                     ?>
                                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                    <?php
                                  echo'</td>';
                              echo'</tr>';
                               $cnt=$cnt+1; }
                              }
                              ?>
                             
        </tbody>
	
											  
    </table>
                      </div>
                  </div>
              </div>
		</section>
      </section>
  </body>
</html>
