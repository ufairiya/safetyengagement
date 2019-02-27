<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
    <!-- title -->
    <title>safetyengagement – Web portal for the Safety Professionals and Companies.</title>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="ThemeZaa" />
    <!-- description -->
    <meta name="description" content="safetyengagement – Web portal for the Safety Professionals and Companies. The site will act as a platform enabling both the actors fulfill each others requirements." />
        <!-- keywords -->
	<meta name="keywords" content="Web portal, Safety, Professionals, Companies, Safety Professional, Safety Professionals, platform, requirements, safetyengagement" />
        <!-- favicon -->
        <!-- listeo -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/listeo/css/colors/main.css" id="colors" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" type="text/css">
	<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/images/apple-touch-icon-114x114.png" />
    <!-- animation -->
 	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" />
     <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css" />
        <!-- swiper carousel -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/swiper.min.css" />
        <!-- justified gallery  -->
<!--
        <link rel="stylesheet" href="<?php echo base_url();?>assets//css/justified-gallery.min.css" />
-->
        <!-- magnific popup -->
<!--
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css" />
-->
        <!-- revolution slider -->
<!--
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/revolution/css/settings.css" media="screen" />
-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/revolution/css/layers.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/revolution/css/navigation.css" />
        <!-- bootsnav -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootsnav.css" />
        <!-- style -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" />

<!--
        <link rel="stylesheet" href="<?php echo base_url();?>assets/listeo/css/style.css" type="text/css">
-->

        <link rel="stylesheet" href="<?php echo base_url();?>assets/datetimedrapper/css/home.css">
<!--
        			<link rel="stylesheet" href="<?php echo base_url();?>assets/datetimedrapper/css/colors/main.css" id="colors">
-->

        <!--[if IE]>
            <script src="./js/html5shiv.js"></script>
        <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

 <body> 
        <!-- start header --> 
      
  <header>
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-dark white-link bg-transparent">
                <div class="container-fluid md-padding-eight-lr sm-padding-15px-lr nav-header-container">
                  <div class="container"><div class="row">
					  <div class="stl_head">
                        <div class="col-md-2 col-xs-5">
                            <a href="<?php echo base_url();?>" title="safetyengagement" class="logo"><img src="<?php echo base_url();?>assets/images/logo-whitew.png" data-at2x="<?php echo base_url();?>assets/images/logo-whitew.png" class="logo-dark" alt="safetyengagement" /><img src="<?php echo base_url();?>assets/images/logo-whitew.png" data-at2x="<?php echo base_url();?>assets/images/logo-whitew.png" alt="safetyengagement" class="logo-light default" /></a>
                        </div>					
                                   
                        <div class="col-md-6 col-xs-2 accordion-menu xs-no-padding-right">
<!--
                            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                                <span class="sr-only">toggle navigation</span>
                                <span class="icon-bar" id=""></span>
                                <span class="icon-bar" id=""></span>
                                <span class="icon-bar" id=""></span>
                            </button>
-->
                               <a id="nav_btn" class="i_bar" style="color:#ED7D31;" data-target="#navbar-collapse-toggle-1" data-toggle="collapse" ><span></span></a>


                            <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                                <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal">
                                    <!-- start menu item -->
                                    <li class="dropdown megamenu-fw menu_colors">
                                        <a href="<?php echo $base_url; ?>home/how_it_works">How it works</a>
                                        </li>
                                    <!-- end menu item -->
                                  <?php  if($this->session->userdata('user_type_fr') == 'company'){ ?> 
									   <li class="dropdown simple-dropdown" ><a href="<?php echo base_url();?>job">Post a Job</a>
                                      </li>
                                      <?php } ?>
                                    <li class="dropdown megamenu-fw menu_colors">
                                        <a href="<?php echo $base_url; ?>bids/find_job">Find a job</a>
                                       </li>
                                    <li class="dropdown simple-dropdown menu_colors"><a href="<?php echo $base_url; ?>home/about_us" title="Blog">About us</a>
                                     
                                    </li>
            
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-5">
                            <div class="header-searchbar pull-right">
					<?php
					if($this->session->userdata('id_user_master') != '')
					{ 
					?>
					<!-- Right Side Content / End -->
					<div class="">
					<!-- Header Widget -->
					<div class="header-widget">
					<!-- User Menu -->
					<div class="user-menu paddsignsocial">

					<?php	$profile_imageoly = $this->users_model->get_profile_img($this->session->userdata('id_user_master')); 
					?>
					<div class="user-name <?php if($current_menu == 'profile' || $current_menu == 'property'){ echo "current";  } ?>" ><span class="paddsignsocial">
					<?php if(!empty($profile_imageoly->profile_image))
					{ ?>
					<img src="<?php echo $base_url.'uploads/'.$profile_imageoly->profile_image; ?>" alt="">
					<?php 
					} 
					else 
					{ ?> 
					<img src="<?php echo $base_url?>uploads/default17.jpg">
					<?php 
					} 
				 $getuserscountdata = $this->users_model->getuserscountprofessonaldata();
				 $getuserscountcompanydata = $this->users_model->getuserscountcompanydata();
				
				 if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student'){ 
				$countgetuserscountdataval = array();
				foreach($getuserscountdata as $getuserscountdataval){
 
        if($getuserscountdataval === '' || $getuserscountdataval === 'NULL')
        {
			
		}else
{
	$countgetuserscountdataval[] = $getuserscountdataval;
		//~ var_dump( $getuserscountdataval);
	}

}
		if(!empty($countgetuserscountdataval))
        { 		//echo count($countgetuserscountdataval);
 $countdataper  = count($countgetuserscountdataval); // echo $countdataper; ?>
			
    <input type="hidden" id="progressController" min="0" max="100" value="<?php echo ($countdataper)*100/40; ?>" />

	<?php	}
		else
		{ ?>
			    <input type="hidden" id="progressController" min="0" max="100" value="10" />
		<?php
			
		}
	}
		else if($this->session->userdata('user_type_fr') == 'company'){
			
			$countgetuserscountcompanydata =  array();;
foreach($getuserscountcompanydata as $getuserscountcompanydataval){
 
        if($getuserscountcompanydataval === '' || $getuserscountcompanydataval === 'NULL')
        {

		}else
{
	$countgetuserscountcompanydata[] = $getuserscountcompanydataval;
	}

}
		
		if(!empty($countgetuserscountcompanydata))
        { 		
 $countdatapercompany  = count($countgetuserscountcompanydata); // echo $countdataper; ?>
			
    <input type="hidden" id="progressController" min="0" max="100" value="<?php echo ($countdatapercompany)*100/15; ?>" />

	<?php	}
		else
		{ ?>
			    <input type="hidden" id="progressController" min="0" max="100" value="10" />
<?php
			
			}
		}
			
 ?>
					</span>My Account</div>
					<div id="page" class="page" data-toggle="tooltip" title="Profile Completed">
 <div class="progress-bar">
	  <canvas id="inactiveProgress" class="progress-inactive" style="width: 50px;" height="275px" width="275px"></canvas>
    <canvas id="activeProgress" class="progress-active"  height="275px" width="275px"></canvas>
    <p>0%</p>
  </div>

 <div id="progressControllerContainer">
  </div
</div></div>
					<ul class="sub_menu">
				  <?php  if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student'){ ?>	<li><a <?php if($current_menu == 'profile'){ echo 'class="current"';  } ?> href="<?php echo $base_url?>profile"><i class="sl sl-icon-user"></i> Profile</a></li>
					     <li><a href="<?php echo $base_url?>bids/bidposts"><i class="sl sl-icon-user"></i>Job Bids </a></li> 
						   <li><a href="<?php echo $base_url?>bids/manage_jobbid"><i class="sl sl-icon-user"></i>My Jobs Bid </a></li> 
					  <?php  } if($this->session->userdata('user_type_fr') == 'company'){ ?>	
						  <li><a <?php if($current_menu == 'profile'){ echo 'class="current"';  } ?> href="<?php echo $base_url?>home/company_profile"><i class="sl sl-icon-user"></i> Profile</a></li>
						   <li><a href="<?php echo $base_url?>job/jobposts"><i class="sl sl-icon-user"></i>Job Posts </a></li> 
						   <li><a href="<?php echo $base_url?>job/manage_jobposts"><i class="sl sl-icon-user"></i>My Jobs List </a></li>  
						  <?php  } ?>
			
					<li><a href="<?php echo $base_url?>logout"><i  class="sl sl-icon-power logoutbtn"></i> Logout</a></li>
					</ul>
					
					</div>
					  <!-- start social media -->
                    <div class="pt-30 paddsignsocial col-md-12 col-sm-12 col-xs-12 display-table sm-text-center">
                        <div class="display-table-cell vertical-align-middle">
                            <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                                	
                    <ul class="social-network social-circle">
					    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				
                            </div>
                        </div>
                    </div>
					</div>
					</div>
				



					<?php }
					else { ?>			
				
					
					
                    
              	<div class="paddsignsocial col-md-12 col-sm-12 col-xs-12">
                        <a  style="float: right;" id="signregpage" href="#sign-in-dialog" class="sign-in popup-with-zoom-anim stl_log_up" href="javascript:void(0);">Log in/Register</a>

					</div>
				     <!-- start social media -->
                    <div class="paddsignsocial col-md-12 col-sm-12 col-xs-12 display-table text-right ">
                        <div class="display-table-cell vertical-align-middle">
                            <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                                	
                 <ul class="social-network social-circle">
					    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				
                            </div>
                        </div>
                    </div>
                    <!-- end social media -->
					<?php } ?>
                                         
                            </div>
                        </div>
</div>
                    </div>
                </div> </div>
            </nav>
            <!-- end navigation -->  
        </header>
        <div class="clear"></div>
		<!-- Sign In Popup -->
					<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="for_got">
					<div class="small-dialog-header">
					<h3>Log in/Register</h3>
					</div>

					<!--Tabs -->
					<div class="sign-in-form style-1">

					<ul class="tabs-nav">
					<li class=""><a href="#tab1">Log In</a></li>

					<li><a href="#tab2">Register Now As</a></li>

					</ul>

					<div class="tabs-container alt">

					<!-- Login -->
					<div class="tab-content" id="tab1" >	



					<span class="notificmsg_log"></span>

					<form method="post" id="loginFormId">		
					<!--//<p class="form-row form-row-wide">-->
					<div class="form-group ">
					<?php //echo $this->input->cookie('ctracker_user_name'); echo "hi"; ?>
					<label><i class="im im-icon-Mail"></i>Email address:
					<input type="text" id="txt_username"  autocomplete="off" class="effect-16 " name="txt_username" value="<?php echo $this->input->cookie('ctracker_user_name');?>">
					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
					</div>
			
					<div class=" form-group has-error">
					<label><i class="im im-icon-Lock-2"></i>Password:
					<input type="password"   id="log_txt_password"  autocomplete="off" class="effect-16" name="log_txt_password" value="<?php echo $this->input->cookie('ctracker_password'); ?>" >
					</label>   
					<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
					<span class="focus-border"></span>
					</div>
					<!--//</p>-->

					<div class="form-row">
					<div class="checkboxes remidme margin-top-10">
					<input class="styled-checkbox" <?php if($this->input->cookie('ctracker_remidme') != ''){	echo 'checked="checked"';	} ?> id="remember-me" name="remindme" type="checkbox" value="1">

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

    <div class="">

	<ul class="tabssfcom">
		<li class="tab-link current " data-tab="tab-1">Company</li>
		<li class="tab-link " data-tab="tab-2">Safety Professional</li>
		
	</ul>
         <!-- company -->
	<div id="tab-1" class="tab-contentsfcom current" >
			<span class="notificmsg"></span>
					<form method="post" id="FormId" name="FormId" style="display:table;">
				<div class="col-md-6" >
					<div class="field-form form-group has-error">	
					<label for="Name">First Name:					 								
					<i class="im im-icon-Male" aria-hidden="true"></i>
					<input type="text" placeholder="" name="jobfirst" id="jobfirst" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Last Name:					 								
					<i class="im im-icon-Male" aria-hidden="true"></i>
					<input type="text" placeholder="" name="joblastname" id="joblastname" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Email Address:					 								
					<i class="im im-icon-Email" aria-hidden="true"></i>
					<input type="email" placeholder="" name="jobemail" id="jobemail" class="effect-16 mob_textbox" value="">
					</label>
					<span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Password:					 								
					<i class="im im-icon-Mail-Password" aria-hidden="true"></i>
					<input type="password" placeholder="" name="password" id="password" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					</div>
					<div class="col-md-6" >
					<div class="field-form form-group has-error">	
					<label for="Name">Zip Code:					 								
					<i class="im im-icon-Post-Mail" aria-hidden="true"></i>
					<input type="text" placeholder="" name="jobzip_code" id="zip-code" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					
<!--
					
					<div class="field-form form-group has-error reg_type" ><label  for="Name">I am a	
					<i class="" aria-hidden="true"></i>
					<input type="text" placeholder="" name="i_am"  class="effect-16" style="" value="">

					</label><span class="focus-border"></span>


					<select id="registration_type" name="registration_type" class="beta-signup-safety-pro beta-signup-registration-type" >
						<option value="">Choose type</option>
						<option value="company">Hiring Company:</option>
						<option value="professional">Safety Professionaly</option>
						<option value="student">Student</option>
					</select>
                    <span class="focus-border"></span>

                 </div>
					
-->
<!--
					<div class="field-form form-group has-error professional miles"  style="display: none;">	
					<label for="Name" >I am willing to travel up to:					 								
					<i class="im im-icon-Worker" aria-hidden="true"></i>
						<select id="jobtravel-distance" name="jobtravel_distance" class="beta-signup-safety-pro beta-signup-registration-type" >
                    <option value="60">50 miles</option>
                    <option value="100">100 miles</option>
                    <option value="200">200 miles</option>
                    <option value="201">&gt; 200 miles</option>
                </select>
					</label><span class="focus-border"></span>

					</div>
-->
					<div class="field-form form-group has-error company">	
					<label for="Name">Company Name:				 								
					<i class="im im-icon-Building" aria-hidden="true"></i>
					<input type="text" class="mob_textbox" placeholder="" name="company_name" id="company-name" style="" value="">

					</label><span class="focus-border"></span>

					</div>
					
				
					
				<div class="field-form form-group has-error">	
					<label for="Name" class="ckeckbox-label">			 								
					<input type="checkbox" class="mob_textbox" id="subscribe" name="newsletter" value="subscribe" checked="checked" style="width: 5%;">Subscribe to the monthly Safety Engagement Newsletter
               <!-- <p style="float: right;">Subscribe to the monthly Safety Engagement Newsletter</p>-->
					</label><span class="focus-border"></span>

				</div>
				
				
				
			</div>
			<div class="col-lg-12">
				<button type="submit" class="space_btn button border" id="submit_reg">Register</button>
				</div>
					</form>


	</div>
	
	
	<!-- Safety Professional -->

	<div id="tab-2" class="tab-contentsfcom"  >
					<span class="notificmsg"></span>
					<form method="post" id="FormId" name="FormId" style="display:table;">
				<div class="col-md-6" >
					<div class="field-form form-group has-error">	
					<label for="Name">First Name:					 								
					<i class="im im-icon-Male" aria-hidden="true"></i>
					<input type="text" placeholder="" name="jobfirst" id="jobfirst" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Last Name:					 								
					<i class="im im-icon-Male" aria-hidden="true"></i>
					<input type="text" placeholder="" name="joblastname" id="joblastname" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Email Address:					 								
					<i class="im im-icon-Email" aria-hidden="true"></i>
					<input type="email" placeholder="" name="jobemail" id="jobemail" class="effect-16 mob_textbox" value="">
					</label>
					<span class="focus-border"></span>

					</div>
					<div class="field-form form-group has-error">	
					<label for="Name">Password:					 								
					<i class="im im-icon-Mail-Password" aria-hidden="true"></i>
					<input type="password" placeholder="" name="password" id="password" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
					</div>
					<div class="col-md-6">
					<div class="field-form form-group has-error">	
					<label for="Name">Zip Code:					 								
					<i class="im im-icon-Post-Mail" aria-hidden="true"></i>
					<input type="text" placeholder="" name="jobzip_code" id="zip-code" class="effect-16 mob_textbox" value="">

					</label><span class="focus-border"></span>

					</div>
<!--
					<div class="field-form form-group has-error reg_type" ><label  for="Name" >I am a	
					<i class="" aria-hidden="true"></i>
					<input type="text" placeholder="" name="i_am" id="zip-code" class="effect-16" value=""></label>	
					

					<select id="registration_type" name="registration_type" class="beta-signup-safety-pro beta-signup-registration-type" >
						<option value="">Choose type</option>
						<option value="company">Hiring Company:</option>
						<option value="professional">Safety Professionaly</option>
						<option value="student">Student</option>

					</select>

                    <span class="focus-border"></span>
					</div>
-->
					
					<div class="field-form form-group has-error professional miles" >	
					<label for="Name" >I am willing to travel up to:					 								
					<i class="im im-icon-Worker" aria-hidden="true"></i>
						<select id="jobtravel-distance" name="jobtravel_distance" class="beta-signup-safety-pro beta-signup-registration-type mob_textbox" >
                    <option value="60">50 miles</option>
                    <option value="100">100 miles</option>
                    <option value="200">200 miles</option>
                    <option value="201">&gt; 200 miles</option>
                </select>
					</label><span class="focus-border"></span>

					</div>
					
				<div class="field-form form-group has-error student" style="display:none;">	
					<label for="Name" class="ckeckbox-label">			 								
					<input type="checkbox" class="mob_textbox" id="student" name="newsletter" value="subscribe" checked="checked" style="width: 5%;">Student Only
               <!-- <p style="float: right;">Subscribe to the monthly Safety Engagement Newsletter</p>-->
					</label><span class="focus-border"></span>

				</div>
					<div class="field-form form-group has-error student" ">	
					<label for="Name" class="ckeckbox-label">			 								
					<input type="checkbox" id="student" name="student" value="student" style="width: 5%;">Student Only
               <!-- <p style="float: right;">Subscribe to the monthly Safety Engagement Newsletter</p>-->
					</label><span class="focus-border"></span>

				</div>
					
				<div class="field-form form-group has-error">	
					<label for="Name" class="ckeckbox-label">			 								
					<input type="checkbox" id="subscribe" name="newsletter" value="subscribe" checked="checked" style="width: 5%;">Subscribe to the monthly Safety Engagement Newsletter
               <!-- <p style="float: right;">Subscribe to the monthly Safety Engagement Newsletter</p>-->
					</label><span class="focus-border"></span>

				</div>
				
				
				
			</div>
			<div class="col-lg-12">
				<button type="submit" class="space_btn button border" id="submit_reg">Register</button>
				</div>
					</form>

	</div>

	
</div><!-- container -->
				

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

				
					<button type="submit" id="resetbtn" class="button border margin-top-5">Send</button>
					</form>		
					</div>
					

					</div>




					</div>
					<!-- Sign In Popup / End -->

	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery-2.1.3.js"></script>
	<script type='text/javascript'>

$('#registration_type').on('change', function() {
	var regval = $(this).val();
	if(regval == 'company')
	{
		$('.professional').hide();
		$('.company').show();

	}
	else if(regval == 'professional')
	{
		$('.company').hide();
		$('.professional').show();
	}
	else if(regval == 'student')
	{
		$('.company').hide();
		$('.professional').hide();
		
	}
});
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
$(document).ready(function(){
	
	$('ul.tabssfcom li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabssfcom li').removeClass('current');
		$('.tab-contentsfcom').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});

});

$(document).ready(function() {
	
    $('#nav_btn').on('click',function(e) {
        $(this).toggleClass("active");
        e.preventDefault();
    });
    
});
$(document).ready(function(){
    $('#nav_btn').on('dblclick',function(){
        alert("The paragraph was double-clicked.");
    });
});
	</script>

	<style>
@media (min-width: 1024px){
	.xs-no-padding-right .i_bar
	{
		display:none!important;
	}
}

 #nav_btn
 { 
display: block; 
float: right; 
padding: 20px; 
cursor: pointer; 

}
#nav_btn span, #nav_btn span::before, #nav_btn span::after{ 
width: 28px; 
height: 4px; 
float: left; 
display: block; 
background: #ED7D31; 
position: relative; 
text-indent: -9000px; 
}
#nav_btn span { margin: 8px 0; }
#nav_btn span::before, #nav_btn span::after { 
content: ''; 
position: absolute; 
}
#nav_btn span::before { top: -8px; }
#nav_btn span::after { bottom: -8px; }
#nav_btn span, #nav_btn span:before, #nav_btn span:after { 
-webkit-transition: all 100ms ease-in-out;
-moz-transition: all 100ms ease-in-out;
-ms-transition: all 100ms ease-in-out;
-o-transition: all 100ms ease-in-out;
transition: all 100ms ease-in-out;
}
#nav_btn.active span{ background-color: transparent; }
#nav_btn.active span::before, #nav_btn.active span::after{ top: 0; }
#nav_btn.active span:before{ 
transform: rotate(45deg); 
-webkit-transform: rotate(45deg); 
}
#nav_btn.active span::after{ 
transform: translateY(-10px) rotate(-45deg); 
-webkit-transform: translateY(-10px) rotate(-45deg); 
top: 10px; 
}

		ul.tabssfcom li.current {
	background: #ED7D31;
	color: #FFF;
	font-size: 12px
}

.tab-contentsfcom {
	display: none;
	padding: 10px
}

.tab-contentsfcom.current {
	    display: block;

}
	.for_click {
	color: #666;
	}
	label {
	color: #666;
	}

	/*.for_got_form {
	padding-top: 16px;
	padding-bottom: 15px;
	}*/
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
line-height:30px;

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

@xxsUnit: 0.25rem;
@xsUnit: 12px;
@sUnit: 20px;
@mUnit: 22px; 
@lUnit: 24px;
@xlUnit: 38px;
@xxlUnit: 75px;

@track-color: #ffffff;
@thumb-color: #e1e1e1;

@thumb-radius: 5px;
@thumb-height: @xlUnit;
@thumb-width: @sUnit;

@thumb-border-width: 1px;
@thumb-border-color: #d6d6d6;

@track-width: 100%;
@track-height: @sUnit;

@track-border-width: 1px;
@track-border-color: #e6e6e6;

@track-radius: 0px;
@contrast: 5%;
	.page{
margin: -9px 0;
      display: table;
    align-items: center;
    align-content: center;
    width: 50px;    display: table;
    align-items: center;
    align-content: center;
    width: 50px;
}

.page .progress-bar{
	display: inline-block;
<!--
	width: 275px;
	height: 275px;
-->
	margin: 7px;
	padding: 0;
	    float: left;
    width: 0;
    height: 46px;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: unset;
    background-color: #337ab7;
}
.progress-bar .progress-active{
	position: absolute;
    top: 11px;
    width: 51px;
}
.progress-bar p{
position: absolute;
    margin: 0;
    padding: 0;
     width: 56px;
    top: 27px;
    font-size: 14px;
    font-weight: 900;
    text-align: center;
    color: #eb5a1c;
}
#progressControllerContainer{
  position: absolute;
  top: 320px;
  padding: 10px 80px;
}

.track() {
  width: @track-width;
  height: @track-height;
  cursor: pointer;
  animate: 0.2s;
}

.thumb() {
  border: @thumb-border-width solid @thumb-border-color;
  height: @thumb-height;
  width: @thumb-width;
  border-radius: @thumb-radius;
  background: @thumb-color;
  cursor: pointer;
}

input[type=range] {
  -webkit-appearance: none;
  margin: @thumb-height 0;
  width: @track-width;

  &:focus {
    outline: none;
  }

  &::-webkit-slider-runnable-track {
    .track();
    background: @track-color;
    border-radius: @track-radius;
    border: @track-border-width solid @track-border-color;
  }
  
  &::-webkit-slider-thumb {
    .thumb();
    -webkit-appearance: none;
    margin-top: ((-@track-border-width * 2 + @track-height) / 2) - (@thumb-height / 2);
  }

  &:focus::-webkit-slider-runnable-track {
    background: lighten(@track-color, @contrast);
  }

  &::-moz-range-track {
    .track();
    background: @track-color;
    border-radius: @track-radius;
    border: @track-border-width solid @track-border-color;
  }
  &::-moz-range-thumb {
     .thumb();
  }

  &::-ms-track {
    .track(); 
    background: transparent;
    border-color: transparent;
    border-width: @thumb-width 0;
    color: transparent;
  }

  &::-ms-fill-lower {
    background: darken(@track-color, @contrast);
    border: @track-border-width solid @track-border-color;
    border-radius: @track-radius*2;
  }
  &::-ms-fill-upper {
    background: @track-color;
    border: @track-border-width solid @track-border-color;
    border-radius: @track-radius*2;
  }
  &::-ms-thumb {
    .thumb();
  }
  &:focus::-ms-fill-lower {
    background: @track-color;
  }
  &:focus::-ms-fill-upper {
    background: lighten(@track-color, @contrast);
  }
}
  
.sign-in-form ul.tabssfcom li
{
    background: #36454f !imporant;
}

ul.tabssfcom li {
    background: #ed7d31b5;
    color: #FFF;
    display: inline-block;
    padding: 8px;
    margin-right: 12px;
    cursor: pointer;
}
ul.tabssfcom {
    margin: 0;
    padding: 0;
    list-style: none;
    border-bottom: 1px solid #cdcdcd;
}
ul.tabssfcom li.current {
    background: #ED7D31;
        color: #FFF;
    font-size: 12px;
}
label {
    display: inline-block;
    max-width: 100%;
}
.im-icon-Mail:before {
    content: "\ea8d";
}

@media (min-width: 360px) and (max-width: 762px) {
	
	.menu_colors {
		background-color:#ED7D31;
		
	}
	
}

@media (min-width: 360px) and (max-width: 650px) {
	
	.mfp-close {
		margin-right: 45%;
		
	}
	
	.for_got {
		width:calc(100% + -10px);
         margin-right:-100px;
	}
	.mob_textbox {
		
         width: 82%;
 
	}
	
}
@media (min-width: 322px) and (max-width: 762px) {
	ul.tabssfcom li 
	{
     background: #ed7d31b5;
     color: #FFF;
     display: inline-block;
     padding: 0;
     margin-right: 12px;
     cursor: pointer;
    }
   .sign-in-form button#submit_reg 
   {
    margin-left: 0;
   }
   label.ckeckbox-label 
   {
    line-height: 15px;
     top: 0;
   }
   #sign-in-dialog, #small-dialog {
    background: #fff;
    padding: 0px;
}
   .small-dialog-header {

    width: calc(100% + 10px);
    left: 0px;
}
}
	</style>
