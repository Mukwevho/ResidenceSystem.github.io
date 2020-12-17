<?php
session_start();
include'dbconnection.php';
include("checklogin.php");

check_login();
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
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

    <title>Mentors Bookings</title>
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
          	<h3 align="center"><i class="fa fa"></i>MENTORS BOOKINGS</h3>
				<div class="row">    
                  <div class="col-md-12">
                      <div class="content-panel">
					 <!-- <h4><i class="fa fa-angle-right"></i> All User Details </h4>-->
                          <table class="display" id="example" style="width:100%">
						  
        <thead>
		<th colspan=3></th>
		  <th colspan=7>Booking Report</th>
            <tr>
                                  <th>Queue No.</th>
                                  <th class="hidden-phone">Student Number</th>
                                  <th>Session Date</th>
                                  <th>Contact Details</th>
								  <th>Session Details</th>
								  <th>First Name</th>
								  <th>Posted Date</th>
								  <th>Mentor Responsible</th>
								  <th align="center">Change status</th>
								  <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php $ret=mysqli_query($con,"select * from booking ");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  { ?>
            <tr>
                                <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['stdNum'];?></td>
                                  <td><?php echo $row['time'];?></td>
                                  <td><?php echo $row['cellPhone'];?></td>
                                  <td><?php echo $row['sessionDetails'];?></td>
								  <td><?php echo $row['name'];?></td>
								  <td><?php echo $row['postedDate'];?></td>
								  <td><?php echo $row['Mentor'];?></td>
								  
								 
								 
								   <?php if($row['Status']== "approved" ||$row['Status']== "Approved" || $row['Status']== "APPROVED")
								  {
								  	echo '<td style="color: aliceblue; background: green;">'.$row['Status'].'</td>';
								  }else{
								  		echo '<td style="color: aliceblue; background: red;">'.$row['Status'].'</td>';
							  } ?>
						
                                  <td align="center">
                                     <a href="deleteBook.php?id=<?php echo $row['id'];?>"> 
                                    <!-- <button class="btn btn-danger btn-xs" ><i class="fa fa-trash-o "></i></button>-->
                                    Delete |
									  </a>
                                     <a href="updateBooking.php?uid=<?php echo $row['id'];?>"> 
                                     <!--<button class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></button>-->
									  Edit
									  </a>
                                     
                                  </td>
            </tr>
            <?php $cnt=$cnt+1; } ?>
        </tbody>
	
											  
    </table>
                      </div>
                  </div>
              </div>
		</section>
      </section>
	  
	  <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<!--<script>
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
<!--	  <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	</script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });
  </script>
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>-->
 <!-- <script>
     $(document).ready(function() {
    $('#example').DataTable();
} ); 
  </script>
  
  
 <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js2/scripts.js"></script>
        <script src="js2/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets2/demo/chart-area-demo.js"></script>
        <script src="assets2/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>-->
  </body>
</html>
