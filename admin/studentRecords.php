<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
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

    <title>Admin | Student Records</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>
	<?php
	include("nav.php");
	?>

      <section id="main-content">
          <section class="wrapper">
          	<h3  align="center"><i class="fa fa-angle-right"></i> Student Records</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <!--<table class="table table-striped table-advance table-hover">-->
	                  	  	  <h4><i class="fa fa-angle-right"></i> Students Records </h4>
	                  	  	  <hr>
							  <table class="display" id="example" style="width:100%">
						  
        <thead>
		
            <tr>
                <th>Student Number</th>
                <th class="select-filter">First Name</th>
                <th class="select-filter">Last Name</th>
                <th class="select-filter">Gender</th>
                <th class="select-filter">Year Of Study</th>
            </tr>
        </thead>
        <tbody>
		<?php 
									 		  $ret=mysqli_query($con,"select * from StudentRecord");
											  $cnt=1;
											  while($row=mysqli_fetch_array($ret))
											  {
			?>
            <tr>
                <td><?php echo $row['stdNum'] ?></td>
                <td><?php echo $row['name'] ?></td>
				<td><?php echo $row['surname'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['yearStudy'] ?></td>
                
                
            </tr>
             <?php } ?>
        </tbody>
		<tfoot>
            <tr>
               <th></th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Year Of Study</th>
            </tr>
        </tfoot
											 
    </table>
                      </div>
                  </div>
              </div>
		</section>
      </section>
	  
	  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns('.select-filter').every( function () {
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
</script>
   <!-- <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>-->

  </body>
</html>
