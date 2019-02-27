<!DOCTYPE html>
<html lang="en">
	<head>
			<!-- Basic Page Needs
			================================================== -->
			<title> 1SS </title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

			<!-- CSS
			================================================== -->

			<!--
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />
			-->
				<link rel="shortcut icon" type="image/png" href="<?php echo $base_url;?>assets/listeo/images/icon-1SS.png"/>

			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/line-awesome.min.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/line-awesome-font-awesome.min.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/line-awesome-font-awesome.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/line-awesome.css" type="text/css" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/listeo/css/style.css" type="text/css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/listeo/css/colors/main.css" id="colors" type="text/css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" type="text/css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datetimedrapper/css/home.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datetimedrapper/css/colors/main.css" id="colors">
			<!--
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
			-->
			<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
	</head>

	<body >

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
					<div id="logo" class="logo">
					<a style="font-size: 26px;text-transform: capitalize;font-weight: bold;" href="<?php echo site_url()?>"><img src="<?php echo site_url().'assets/listeo/images/logo.png'?>"></a>
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
					<ul id="responsive" >
					<li><a data-id="home" <?php if($current_menu == 'home'){ echo 'class="current home"'; }else { echo 'class="home"';} ?> href="<?php echo site_url()?>">Home</a></li>
					<li><a data-id="service" <?php if($current_menu == 'service'){ echo 'class="current service"';  }else { echo 'class="service"';} ?> href="#">Services</a>
					<ul class="sub_menu">
					<?php 
					$cat_list =  $this->task_model->get_task_details();  foreach($cat_list as $cat_list_detail)
					{ 
					?>
					<li>
						<?php $sername = str_replace("-","",$cat_list_detail->taskcategory_name); ?>
					<a  <?php if($sub_menu == $base_url."booking/get_categories?task_id=".$cat_list_detail->id){ echo 'class="current"'; } ?> href="<?php echo $base_url; ?>services/<?php echo str_replace(' ','',strtolower($sername)); ?>/<?php echo $cat_list_detail->id; ?>"><?php echo $cat_list_detail->taskcategory_name; ?></a>
					</li>
					<?php 
					} 
					?>						
					<!--
					<li><a href="<?php echo $base_url; ?>booking/get_categories/2">Electrical</a></li>
					<li><a href="<?php echo $base_url; ?>booking/get_categories/3">Plumbing</a></li>
					<li><a href="<?php echo $base_url; ?>booking/get_categories/4">House Cleaning</a></li>
					<li><a href="<?php echo $base_url; ?>booking/get_categories/5">Mover</a></li>
					<li><a href="<?php echo $base_url; ?>booking/get_categories/6">House Painting</a></li>
					-->
					</ul>
					</li>
					
					
					<li><a <?php if($current_menu == 'contact_us'){ echo 'class="current"';  } ?>  href="<?php echo $base_url; ?>home/contact_us">Contact Us</a></li>

					
					</ul>
					</nav>
					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

					</div>
					<!-- Left Side Content / End -->


					<!-- Right Side Content / End -->

			



					
					<div class="right-side">
					<div class="header-widget">
					<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In / Register</a>
					<!--
					<a href="dashboard-add-listing.html" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
					-->
					</div>
					</div>
				

					<!-- Right Side Content / End -->

					<!-- Sign In Popup -->
					<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="for_got">
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
					<div class="tab-content" id="tab1" >	



					<span class="notificmsg_log"></span>

					<form method="post" id="loginFormId">		
					<p class="form-row form-row-wide">
					<div class="form-group ">
					<?php //echo $this->input->cookie('ctracker_user_name'); echo "hi"; ?>
					<label><i class="im im-icon-Mail"></i>Email address:
					<input type="text" id="txt_username"  autocomplete="off" class="effect-16" name="txt_username" value="<?php echo $this->input->cookie('ctracker_user_name');?>">
					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
					</div>
					</p>
					<p class="form-row form-row-wide">
					<div class=" form-group has-error">
					<label><i class="im im-icon-Lock-2"></i>Password:
					<input type="password"   id="log_txt_password"  autocomplete="off" class="effect-16" name="log_txt_password" value="<?php echo $this->input->cookie('ctracker_password'); ?>" >
					</label>   
					<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
					<span class="focus-border"></span>
					</div>
					</p>

					<div class="form-row">
					<div class="checkboxes remidme margin-top-10">
					<input class="styled-checkbox" <?php if($this->input->cookie('ctracker_remidme') != ''){	echo 'checked="checked"';	} ?> id="styled-checkbox-1" name="remindme" type="checkbox" value="1">

					<label for="remember-me">Remember Me</label>
					<button type="submit" id="loginsubmit"  class="button border margin-top-5">Login</button>
					</div>
					</div>

					</form>	

					<span class="lost_password for_click">

					<!--
					<span class="lost_password ">
					-->
					<p class="lost_pass">Lost Your Password?</p>
					</span>	
					</div>

					<!-- Register -->

					<div class="tab-content" id="tab2" style="display: none;">

					<span class="notificmsg"></span>
					<form method="post" id="FormId">

					<div class="field-form form-group has-error">	
					<label for="Name">Username:					 								
					<i class="im im-icon-Male" aria-hidden="true"></i>
					<input class="effect-16" id="txt_empname" name="txt_empname"  type="text" value="<?php echo set_value('txt_empname'); ?>" /> 
					</label><span class="focus-border"></span>

					</div>


					<!--
					<div class="field-form form-group has-error">
					<label for="usertype"> User Type           
					<?php     $salutationOptions = array(
					''  => '-----Choose User Type------',
					'contractor'  => 'Contractor',
					'application_user'    => 'User',
					);
					echo form_dropdown('txt_utype', $salutationOptions, '', 'required="required" id="txt_utype" class="effect-16" style="width:100%" ');
					?>		            
					<span class="focus-border"></span>
					</label>     
					</div>
					-->

					<div class="field-form form-group has-error">
					<label for="phoneno">Phone Number:
					<i class="im im-icon-Phone-2" aria-hidden="true"></i>
					<input class="effect-16" type="tel" id="txt_phone"  name="txt_phone"  value="<?php echo set_value('txt_phone'); ?>" />  <span class="focus-border"></span>
					</label>
					</div>

					<!--
					<div class="field-form form-group has-error">
					<label for="address">Address
					<i class="fa fa-address-book-o" aria-hidden="true"></i>
					<input class="effect-16" id="txt_emp_addr"  name="txt_emp_addr"  type="text" value="<?php echo set_value('txt_emp_addr'); ?>" /> 
					<span class="focus-border"></span>
					</label>
					</div>
					-->

					<div class="field-form form-group has-error">
					<label for="email">Email Address:
					<i class="im im-icon-Mail" aria-hidden="true"></i>
					<input class="effect-16" id="txt_email"  name="txt_email"  value="<?php echo set_value('txt_email'); ?>" type="email" />  	<span class="focus-border"></span>
					</label>
					</div>


					<div class="field-form form-group has-error">
					<label for="password">Password:
					<i class="im im-icon-Lock-2" aria-hidden="true"></i>
					<input class="effect-16" id="txt_password"  name="txt_password" type="password" value="<?php echo set_value('txt_password'); ?>"/>        								
					<span class="focus-border"></span>
					</label>
					</div>

					<div class="field-form form-group has-error">
					<label>Repeat Password:
					<i class="im im-icon-Lock-2" aria-hidden="true"></i>
					<input class="effect-16" id="txt_confirm_password" required="required" name="txt_confirm_password"  type="password" value="<?php echo set_value('txt_confirm_password'); ?>"/> 								
					<span class="focus-border"></span>
					</label>
					</div>

					<button type="submit" class="space_btn button border margin-top-5" id="submit_reg">Register</button>
					<!--
					<p>By clicking on “Register Now” button you are accepting the <a href="#" title="">//Terms & Conditions</a> </p>
					-->

					</form>



					</div>

					</div>
					</div>
					</div>

					<div class="for_got_form" style="display:none">

					<div class="small-dialog-header">
					<h3>Reset Password</h3>
					</div>

					<span class="notificmsg_reset"></span>
					<div class="" >



					<form  class="restpasswordss" id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url();?>login_controller/Passwordreset">	

					<div class="form-group ">
					<label><i class="im im-icon-Mail"></i>Email address:
					<input type="email" class="effect-16"  name="reset_email" id="reset_email" required>
					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"></span>
					</div>

					<!--
					<div class="field-form form-group has-error">



					<label><i class="im im-icon-Mail"></i>Email address

					<input type="email" class="effect-16"  name="reset_email" id="reset_email" required>


					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
					</div>
					-->
					<button type="submit" id="resetbtn" class="button border margin-top-5">Send</button>
					</form>		
					</div>
					<!--
					<a href="#sign-in-dialog" class="sign-in_for popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In / Register</a>
					-->


					</div>




					</div>
					<!-- Sign In Popup / End -->

					</div>
					</div>
					<!-- Header / End -->

				</header>
			<div class="clearfix"></div>
			<!-- Header Container / End -->
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.js"></script>
	<script type='text/javascript'>


	jQuery('.for_click').click(function(e){
	e.stopPropagation();
	jQuery('.for_got_form').show();
	jQuery('.for_got').hide();
	});
	$('mfp-close').on('click' ,function()
	{
	$(this).closest("#sign-in-dialog").find(".for_got_form").hide();
	});
	$('.sign-in').on('click' ,function()
	{	
	jQuery('.for_got').show();
	jQuery('.for_got_form').hide();
	//~ $('mfp-close').closest("#sign-in-dialog").find(".for_got_form").show();
	});

	</script>

	<style>
	.for_click {
	color: #666;
	}
	label {
	color: #666;
	}
	button#submit_reg {
	color: #fff;
	}
	.for_got_form {
	padding-top: 16px;
	padding-bottom: 15px;
	}
	.button.mfp-close{

	}
	#sign-in-dialog .mfp-close, #small-dialog .mfp-close {
	color: #666;
	background-color: #e4e4e4;
	border-radius: 50%;
	right: 40px;
	width: 40px;
	width: 40px;
	height: 40px;


	}
	.remidme input[type=checkbox] {
	display: block;
	position: absolute;
	/* left: -201px; */
	z-index: 99;
	opacity: 0;
	height: 23px;
	width: 34%;
	cursor:pointer;
	}
	</style>
