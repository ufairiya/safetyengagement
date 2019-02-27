<!DOCTYPE html>
<html lang="en">
	<head>
<!-- Basic Page Needs
================================================== -->
<title>stallioni</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<!--
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/style.css" type="text/css" />
-->
<link rel="shortcut icon" type="image/png" href="<?php echo $base_url;?>assets/listeo/images/icon-1SS.png"/>

<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/line-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/line-awesome-font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/line-awesome-font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/line-awesome.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="assets/listeo/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/listeo/css/colors/main.css" id="colors" type="text/css">


</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a style="font-size: 26px;text-transform: capitalize;font-weight: bold;" href="<?php echo site_url()?>"><img src="<?php echo site_url().'assets/listeo/images/logo.png'?>">&nbsp;&nbsp;Jeremy <span style="color:#f91942">Ang</span></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

<!--
						<li><a class="current" href="#">Home</a>
-->
<!--
							<ul>
								<li><a href="index.html">Home 1</a></li>
								<li><a href="index-2.html">Home 2</a></li>
								<li><a href="index-3.html">Home 3</a></li>
								<li><a href="index-4.html">Home 4</a></li>
							</ul>
-->
<!--
						</li>
-->

<!--
						<li><a href="#">Listings</a>
							<ul>
								<li><a href="#">List Layout</a>
									<ul>
										<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
										<li><a href="listings-list-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Grid Layout</a>
									<ul>
										<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
										<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
										<li><a href="listings-grid-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Half Screen Map</a>
									<ul>
										<li><a href="listings-half-screen-map-list.html">List Layout</a></li>
										<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
										<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
									</ul>
								</li>
								<li><a href="listings-single-page.html">Single Listing</a></li>
							</ul>
						</li>
-->

<!--
						<li><a href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.html">Dashboard</a></li>
								<li><a href="dashboard-messages.html">Messages</a></li>
								<li><a href="dashboard-bookings.html">Bookings</a></li>
								<li><a href="dashboard-my-listings.html">My Listings</a></li>
								<li><a href="dashboard-reviews.html">Reviews</a></li>
								<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
								<li><a href="dashboard-add-listing.html">Add Listing</a></li>
								<li><a href="dashboard-my-profile.html">My Profile</a></li>
								<li><a href="dashboard-invoice.html">Invoice</a></li>
							</ul>
						</li>
-->

<!--
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="pages-user-profile.html">User Profile</a></li>
								<li><a href="pages-booking.html">Booking Page</a></li>
								<li><a href="pages-blog.html">Blog</a>
									<ul>
										<li><a href="pages-blog.html">Blog</a></li>
										<li><a href="pages-blog-post.html">Blog Post</a></li>
									</ul>
								</li>
								<li><a href="pages-contact.html">Contact</a></li>
								<li><a href="pages-coming-soon.html">Coming Soon</a></li>
								<li><a href="pages-elements.html">Elements</a></li>
								<li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
								<li><a href="pages-typography.html">Typography</a></li>
								<li><a href="pages-404.html">404 Page</a></li>
								<li><a href="pages-icons.html">Icons</a></li>
							</ul>
						</li>
-->
						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<?php
			echo 'sowmiya';
			print_r($this->session->has_userdata());
			exit;
			if($this->session->has_userdata('id_user_master') != '')
			{
			echo form_open('Home/logout'); ?>
			<input type="submit" class="btn btn-primary logoutbtn" id="btn_logout" name="btn_logout" value="LOGOUT"/>
			<?php echo form_close(); }
			 else { ?>			
			<div class="right-side">
				<div class="header-widget">
					<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a>
<!--
					<a href="dashboard-add-listing.html" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
-->
				</div>
			</div>
			<?php } ?>
			

			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
						<li><a href="#tab2">Register</a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">	
													
							<?php //echo $this->session->flashdata('login_msg'); ?>
<!--
							<span class="notificmsg_log"></span>	
-->
							
<!--
						<form method="post" id="loginFormId">							
							<div class="field-form form-group has-error">
								<label for="email">Email Address:
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input type="text" id="txt_username" class="effect-16" name="txt_username"  value="<?php echo set_value('txt_username') ?>"/>
								<span class="focus-border"></span>
								<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
								</label>
							</div>
							<div class="field-form form-group has-error">
								<label for="password">Password:
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" id="txt_password" class="effect-16" name="txt_password" />   								
								<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
								<span class="focus-border"></span>
								</label>
							</div>
							<span class="lost_password">
								<a href="#" >Lost Your Password?</a>
							</span>
							<div class="form-row">
								<button type="submit" id="loginsubmit" class="button border margin-top-5">LOGIN</button>
								<div class="checkboxes margin-top-10">
									<input id="remember-me" type="checkbox" name="check">
									<label for="remember-me">Remember Me</label>
								</div>
							</div>							
						</form>
-->

<?php //echo $this->session->flashdata('login_msg'); ?>
<span class="notificmsg_log"></span>

<form method="post" id="loginFormId">		
<div class="field-form form-group has-error">
<label>Email address</label>
<input type="text" id="txt_username" class="effect-16" name="txt_username"  value="<?php echo set_value('txt_username') ?>"/>  		            
<span class="focus-border"></span>
<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
</div>
<div class="field-form form-group has-error">
<label>Password</label>
<input type="password" id="txt_password" class="effect-16" name="txt_password" />   
<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
<span class="focus-border"></span>
</div>
<div class="checkboxes margin-top-10">
<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
<label for="styled-checkbox-1">Remember me</label>
<a href="#" title="">Lost your password</a>
</div>
<button type="submit" id="loginsubmit"  class="button border margin-top-5">LOGIN</button>
<br>

</form>							
						</div>

						<!-- Register -->
						
						<div class="tab-content" id="tab2" style="display: none;">
						
						<span class="notificmsg"></span>
						<form method="post" id="FormId">
											
							<div class="field-form form-group has-error">	
								<label for="Name">Name						 								
								<i class="fa fa-user" aria-hidden="true"></i>
								<input class="effect-16" id="txt_empname" name="txt_empname"  type="text" value="<?php echo set_value('txt_empname'); ?>" /> 
								<span class="focus-border"></span>
								</label>
							</div>
							
							<div class="field-form form-group has-error">
								<label for="usertype"> User Type           
								<?php     $salutationOptions = array(
								''  => '-----Choose User Type------',
								'Contractor'  => 'Contractor',
								'User'    => 'User',
								);
								echo form_dropdown('txt_utype', $salutationOptions, '', 'required="required" id="txt_utype" class="effect-16" style="width:100%" ');
								?>		            
								<span class="focus-border"></span>
								</label>     
							</div>

							<div class="field-form form-group has-error">
								<label for="phoneno">Phone Number
								<i class="fa fa-phone" aria-hidden="true"></i>
								<input class="effect-16" id="txt_phone"  name="txt_phone"  value="<?php echo set_value('txt_phone'); ?>" type="text" />  <span class="focus-border"></span>
								</label>
							</div>

							<div class="field-form form-group has-error">
								<label for="address">Address
								<i class="fa fa-address-book-o" aria-hidden="true"></i>
								<input class="effect-16" id="txt_emp_addr"  name="txt_emp_addr"  type="text" value="<?php echo set_value('txt_emp_addr'); ?>" /> 
								<span class="focus-border"></span>
								</label>
							</div>

							<div class="field-form form-group has-error">
								<label for="email">Email
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input class="effect-16" id="txt_email"  name="txt_email"  value="<?php echo set_value('txt_email'); ?>" type="email" />  	<span class="focus-border"></span>
								</label>
							</div>

							<div class="field-form form-group has-error">
								<label for="password">Password
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input class="effect-16" id="txt_password"  name="txt_password" type="password" value="<?php echo set_value('txt_password'); ?>"/>        								
								<span class="focus-border"></span>
								</label>
							</div>

							<div class="field-form form-group has-error">
								<label>Confirm Password
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input class="effect-16" id="txt_confirm_password" required="required" name="txt_confirm_password"  type="password" value="<?php echo set_value('txt_confirm_password'); ?>"/> 								
								<span class="focus-border"></span>
								</label>
							</div>

							<button type="submit" class="button border margin-top-5" id="submit_reg">Register</button>
							<p>By clicking on “Register Now” button you are accepting the <a href="#" title="">Terms & Conditions</a> </p>
							
						</form>

<!--
							<form method="post" class="register">
								
							<p class="form-row form-row-wide">
								<label for="username2">Username:
									<i class="fa fa-user" aria-hidden="true"></i>
									<input type="text" class="input-text" name="username" id="username2" value="" />
								</label>
							</p>
								
							<p class="form-row form-row-wide">
								<label for="email2">Email Address:
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<input type="text" class="input-text" name="email" id="email2" value="" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password1">Password:
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input class="input-text" type="password" name="password1" id="password1"/>
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password2">Repeat Password:
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input class="input-text" type="password" name="password2" id="password2"/>
								</label>
							</p>

							<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
	
							</form>
							
-->

						</div>

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
