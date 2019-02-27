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
</head>

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
			  container.load('inc/endorse/' + target + '.php');
			  
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
					<li class="active"><a><i class="im im-icon-Photo-2"></i> Service</a>
						<ul>
							<li>
								<a href="a-service.php">
									<i class="im im-icon-Check-2"></i> List Services 
								</a>
							</li>
							<li class="active">
								<a href="a-service-add.php">
									<i class="im im-icon-Add"></i> Add Service
								</a>
							</li>
						</ul>	
					</li>
					<li><a><i class="im im-icon-Checked-User"></i> Account</a>
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
							<li>
								<a href="a-administrator.php">
									<i class="im im-icon-Business-Man"></i> Administrator
								</a>
							</li>
						</ul>	
					</li>
				</ul>
				
				<ul data-submenu-title="Document Management">
					<li><a><i class="im im-icon-File-Chart"></i> Service Sheet
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
					<h2>Service Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="a-dashboard.php">Home</a></li>
							<li>Service Management</li>
							<li>Add Service</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
						</div>

						<!-- Row -->
						<div class="row with-forms">
							<div class="col-lg-6">
								<h5>Service Title</h5>
								<input class="search-field" type="text" />
							</div>

							<!-- Status -->
							<div class="col-lg-3 col-md-6">
								<h5 class="title-align">Icon <i class="tip" data-tip-content="icon to represent this category"></i></h5>
								<select class="chosen-select-no-single">
									<option><i class="im im-icon-Snow"></i></option>	
									<option>Eat & Drink</option>
									<option>Shops</option>
									<option>Hotels</option>
									<option>Restaurants</option>
									<option>Fitness</option>
									<option>Events</option>
								</select>
							</div>
							<div class="col-lg-3 col-md-6">
								<h5>Max Appointment <i class="tip" data-tip-content="Maximum number of Appointments per Session"></i></h5>
								<input class="search-field" type="text" />
							</div>
							<div class="col-md-12">
								<h5>Description</h5>
								<textarea class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
							</div>
						</div>
					<!-- Row / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>

						<!-- Dropzone -->
						<div class="submit-section">
							<form action="/file-upload" class="dropzone" ></form>
						</div>

					</div>
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>
						
						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<!-- Day -->
							<div class="row opening-day">
								<div class="col-md-2"><h5>Monday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Tuesday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Wednesday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Thursday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Friday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Saturday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2"><h5>Sunday</h5></div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Opening Time">
										<option label="Opening Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select class="chosen-select" data-placeholder="Closing Time">
										<option label="Closing Time"></option>
										<option>Closed</option>
										<option>1 AM</option>
										<option>1.30 AM</option>
										<option>2 AM</option>
										<option>2.30 AM</option>
										<option>3 AM</option>
										<option>3.30 AM</option>
										<option>4 AM</option>
										<option>4.30 AM</option>
										<option>5 AM</option>
										<option>5.30 AM</option>
										<option>6 AM</option>
										<option>6.30 AM</option>
										<option>7 AM</option>
										<option>7.30 AM</option>
										<option>8 AM</option>
										<option>8.30 AM</option>
										<option>9 AM</option>
										<option>9.30 AM</option>
										<option>10 AM</option>
										<option>10.30 AM</option>
										<option>11 AM</option>
										<option>11.30 AM</option>
										<option>12 AM</option>	
										<option>12.30 AM</option>
										<option>1 PM</option>
										<option>1.30 PM</option>
										<option>2 PM</option>
										<option>2.30 PM</option>
										<option>3 PM</option>
										<option>3.30 PM</option>
										<option>4 PM</option>
										<option>4.30 PM</option>
										<option>5 PM</option>
										<option>5.30 PM</option>
										<option>6 PM</option>
										<option>6.30 PM</option>
										<option>7 PM</option>
										<option>7.30 PM</option>
										<option>8 PM</option>
										<option>8.30 PM</option>
										<option>9 PM</option>
										<option>9.30 PM</option>
										<option>10 PM</option>
										<option>10.30 PM</option>
										<option>11 PM</option>
										<option>11.30 PM</option>
										<option>12 PM</option>
										<option>12.30 PM</option>
									</select>
								</div>
							</div>
							<!-- Day / End -->

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">
						
						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pricing-submenu">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div><div class="fm-input"><input type="text" placeholder="Category Title"></div><div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input type="text" placeholder="Title" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="Description" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="SGD" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									<a href="#" class="button add-pricing-submenu">Add Category</a>
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->


					<a href="a-service-aircon.php" target="_blank" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a>

				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
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


<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="scripts/dropzone.js"></script>


</body>
</html>