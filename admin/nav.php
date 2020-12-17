<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

   <!-- <title>Admin | Dashboards</title>-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="manage-users.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name1'].' '.$_SESSION['surname1'];?></h5>
              	  
                  <li class="mt">
                      <a href="change-password.php">
                         <!--<class="glyphicon glyphicon-user"></i> -->
                          <span class="glyphicon glyphicon-user">Admin Profile</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
				<li class="sub-menu">
                      <a href="studentRecords.php" >
                          <i class="fa fa-users"></i>
                          <span>Student Records</span>
                      </a>
                   
				  </li>
				 
				  
				  <li class="sub-menu">
                      <a href="newsUpdate.php" >
                          <i class="fa fa-users"></i>
                          <span> Update News</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="labSchedule.php" >
                          <i class="fa fa-users"></i>
                          <span>Lab Schedule</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="booking.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Bookings</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="updateStructure.php" >
                          <i class="fa fa-user"></i>
                          <span>Update Residence Structure</span>
                      </a>
                   
                  </li>
                 
				  <li class="sub-menu">
                      <a href="complaints.php" >
                          <i class="fa fa-users"></i>
                          <span>Check Complaints</span>
                      </a>
                   
                  </li>
                 <li class="sub-menu">
                      <a href="maleres.php" >
                          <i class="fa fa-male" aria-hidden="true"></i>
                          <span>Male Residence</span>
                      </a>
                   
                  </li>
                  
                  
                  
				   <li class="sub-menu">
                      <a href="residence.php" >
                          <i class="fa fa-female" aria-hidden="true""></i>
                          <span>Female Residence</span>
                      </a>
                   
				  </li>
              </ul>
          </div>
      </aside>