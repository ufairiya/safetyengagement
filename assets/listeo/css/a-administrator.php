<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>OSS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/colors/main.css" id="colors" />
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16" />
<body onload="initCurrent();">

<!-- Wrapper -->
<div id="wrapper">

	<!-- Header Container
	================================================== -->
	<header id="header-container" class="fixed fullwidth dashboard">

		<!-- Header -->
		<div id="header" class="not-sticky">
			<div class="container">
				
				<!-- Left Side Content -->
				<div class="left-side">
					
					<!-- Logo -->
					<div id="logo">
						<a href="a-dashboard.php" class="dashboard-logo"><img src="images/logo2.png" alt=""></a>
					</div>
				</div>
				<!-- Left Side Content / End -->

				<!-- Right Side Content / End -->
				<div class="right-side">
					<!-- Header Widget -->
					<div class="header-widget">
						
						<!-- User Menu -->
						<div class="user-menu">
							<div class="user-name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>My Account</div>
							<ul>
								<li><a href="a-profile.php"><i class="sl sl-icon-user"></i> Profile</a></li>
								<li><a href="login.php"><i class="sl sl-icon-power"></i> Logout</a></li>
							</ul>
						</div>
					</div>
					<!-- Header Widget / End -->
				</div>
				<!-- Right Side Content / End -->

			</div>
		</div>
		<!-- Header / End -->
		<!-- AJAX LOADER -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
		  $(document).ready(function(){
			// Set trigger and container variables
			var trigger = $('#endorse-trigger ul li a'),
				container = $('#endorse-content');
			
			// Fire on click
			trigger.on('click', function(){
			  // Set $this for re-use. Set target from data attribute
			  var $this = $(this),
				target = $this.data('target');       
			  
			  // Load target page into container
			  container.load('inc/administrators/' + target + '.php');
			  
			  // Stop normal link behavior
			  return false;
			});
		  });
		</script>
	</header>
	<div class="clearfix"></div>
	<!-- Header Container / End -->


	<!-- Dashboard -->
	<div id="dashboard">

		<!-- Navigation
		================================================== -->

		<!-- Responsive Navigation Trigger -->
		<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
		
		<div class="dashboard-nav">
			<div class="dashboard-nav-inner">

				<ul data-submenu-title="System Management">
					<li><a href="a-dashboard.php"><i class="im im-icon-Gaugage"></i> Dashboard </a></li>
					<li><a href="a-appointment.php"><i class="im im-icon-Check"></i> Appointment <span class="nav-tag messages red">255</span></a></li>
					<li><a href="a-schedule.php"><i class="im im-icon-Calendar-3"></i> Schedule <span class="nav-tag messages red">30</span></a></li>
					<li><a><i class="im im-icon-Photo-2"></i> Service</a>
						<ul>
							<li>
								<a href="a-service.php">
									<i class="im im-icon-Check-2"></i> List Services 
								</a>
							</li>
							<li>
								<a href="a-service-add.php">
									<i class="im im-icon-Add"></i> Add Service
								</a>
							</li>
						</ul>	
					</li>
					<li class="active"><a><i class="im im-icon-Checked-User"></i> Account</a>
						<ul>
							<li>
								<a href="a-user.php">
									<i class="im im-icon-MaleFemale"></i> User
								</a>
							</li>
							<li>
								<a href="a-contractor.php">
									<i class="im im-icon-Worker"></i> Contractor
								</a>
							</li>
							<li class="active">
								<a href="a-administrator.php">
									<i class="im im-icon-Business-Man"></i> Administrator
								</a>
							</li>
						</ul>	
					</li>
				</ul>
				
				<ul data-submenu-title="Document Management">
					<li>
						<a>
							<i class="im im-icon-File-Chart"></i> Service Sheet
							<span class="nav-tag red">2</span>
						</a>
						<ul>
							<li>
								<a href="a-doc-ss-endorse.php">
									<i class="im im-icon-Yes"></i> Endorse 
									<span class="nav-tag red">2</span>
								</a>
							</li>
							<li>
								<a href="a-doc-ss.php">
									<i class="im im-icon-Eye-2"></i> View
								</a>
							</li>
						</ul>	
					</li>
					<li><a href="a-doc-po.php"><i class="im im-icon-File-Favorite"></i> Purchase Order</a></li>
					<li><a href="a-doc-io.php"><i class="im im-icon-File-Bookmark"></i> Invoice</a></li>
				</ul>
				
				<ul data-submenu-title="My Account">
					<li><a href="a-profile.php"><i class="im im-icon-Profile"></i> Profile</a></li>
					<li><a href="login.php"><i class="im im-icon-Power-2"></i> Logout</a></li>
				</ul>	
			</div>
		</div>
		<!-- Navigation / End -->



	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Account Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="a-dashboard.php">Home</a></li>
							<li>Account Management</li>
							<li>Administrator</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		
		<!-- Reply to review popup -->
		<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
			<div class="small-dialog-header">
				<h3>Add Administrator</h3>
			</div>
			<div class="message-reply margin-top-0">
				<label class="popup-label">Username</label>
				<input type="text" />

				<label class="popup-label">Email</label>
				<input type="text" />

				<label class="popup-label">Password</label>
				<input type="password" />
				
				<label class="popup-label">Confirm Password</label>
				<input type="password" />
				
				<button class="button">Add</button>
			</div>
		</div>
		
		<div class="row">
			<!-- Appointments -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Administrator List</h4>
					<!-- <input type="text" class="inner-search" placeholder="&#xF002" /> -->
					<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">
						<ul>
							<!-- Service Content -->
								<div id="endorse-list">
									<?php include('inc/administrators/administratorlist.php'); ?>
								</div>
							<!-- End Service Content -->
						</ul>
					</div>
				</div>
				<a href="#small-dialog" class="popup-with-zoom-anim schedule-submit button grey">Add Administrator</a>
			</div>	
			
			<!-- User Details -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Administrator Details</h4>
											
					<div class="endorse-list dashboard-list-box margin-top-0">

					<!-- Service Content -->
						<div id="endorse-content">
							<?php include('inc/administrators/johnsmith.php'); ?>
						</div>
					<!-- End Service Content -->
					
					</div>
				</div>
				
				<a href="a-administrator-update.php" class="schedule-submit button grey">Update Administrator</a>
			</div>			

			<!-- Copyrights -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="copyrights">&copy; 2018 OSS. All Rights Reserved.</div>
			</div>
		</div>

	</div>
		<!-- Content / End -->


	</div>
	<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

<!-- Service Report Selected -->
<script>
var current;

function initCurrent(){
	current = document.getElementById('booking-endorse').firstElementChild;
	current.className += " active";
}

function newCurrent(newElement){
	current.className = "endorse-highlight";
	newElement.className += " active";
	current = newElement;
}
</script>
</body>
</html>