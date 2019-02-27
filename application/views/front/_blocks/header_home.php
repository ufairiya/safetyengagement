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
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/iconsSE.png" />
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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/revolution/css/layers.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/revolution/css/navigation.css" />
      <!-- bootsnav -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootsnav.css" />
      <!-- style -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" />
    
      <link rel="stylesheet" href="<?php echo base_url();?>assets/datetimedrapper/css/home.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.css">

   
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
      <!-- start header --> 
      <header <?php if(!empty($this->session->userdata('id_user_master'))){ echo 'class="headertop"'; }else{ echo 'class="headertopnot"'; } ?>>
         <!-- start navigation -->
         <nav class="navbar navbar-default bootsnav navbar-fixed-top header-dark white-link bg-transparent">
            <div class="container-fluid md-padding-eight-lr sm-padding-15px-lr nav-header-container">
               <div class="container">
                  <div class="row">
                     <div class="stl_head">
                        <div class="col-md-2  col-xs-10">
                           <a href="<?php echo base_url();?>" title="safetyengagement" class="logo"><img src="<?php echo base_url();?>assets/images/logo-whitew.png" data-at2x="<?php echo base_url();?>assets/images/logo-whitew.png" class="logo-dark" alt="safetyengagement" /><img src="<?php echo base_url();?>assets/images/logo-whitew.png" data-at2x="<?php echo base_url();?>assets/images/logo-whitew.png" alt="safetyengagement" class="logo-light default" /></a>
                        </div>
                        <div class="col-md-6 col-xs-2 accordion-menu xs-no-padding-right">
                        <input type="hidden" class="baseurl" id="baseurl" value="<?php echo base_url();?>">
   <!--
                              <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                                  <span class="sr-only">toggle navigation</span>
                                  <span class="icon-bar" id=""></span>
                                  <span class="icon-bar" id=""></span>
                                  <span class="icon-bar" id=""></span>
                              </button>
                              -->
                           <a id="nav_btn" class="i_bar" data-target="#navbar-collapse-toggle-1" data-toggle="collapse">
							   <span class="spanclass"></span>
							  </a>
                           <input type="hidden" class="baseurl" value="<?php echo base_url();?>">
                           <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1" style="width: 100%;">
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
									 <?php if($this->session->userdata('id_user_master'))
                                 { 
									$count_inbox = $this->message_model->count_inbox(); 
									?>
									<div class="dropdown" id="apddropdown">
										<div style="margin:35px 0 0 15px"  id="badgecountid"> <i  onclick="myFunction()" class="dropbtn fa fa-bell" aria-hidden="true"></i>
											<span class="badge"><?php  echo   count($count_inbox); ?></span>
										</div>
										<div id="myDropdown" class="dropdown-content">	
											
											<h3 class="noti_headss">Notifications</h3>
											<div class="noti_middle">
										<?php
												if($count_inbox)
												foreach($count_inbox as $count_inboxs )
												{ //echo $count_inboxs->poid;
													$getsenderdetails = $this->users_model->getsenderdetails($count_inboxs->sender_id);
													$getjobdetails = $this->postjob_model->getjobdetails($count_inboxs->poid); ?>
													<div class="col-md-12 col-sm-12 col-xs-12">
													<?php if($this->session->userdata('user_type_fr') == 'company'){ ?>
														<a class="msg_text" href="<?php echo $base_url.'home/profile/'.$count_inboxs->sender_id.'/'.$count_inboxs->poid ?>">
														<div class="col-md-3 col-sm-3 col-xs-3">
														<?php if(!empty($getsenderdetails->profile_image)){ ?> 
															<img src="<?php echo base_url(); ?>uploads/<?php echo $getsenderdetails->profile_image; ?>" alt="" class="img-responsive" style="width:40px;height:40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);" >
														 <?php } else { ?> 
															 <img src="<?php echo base_url(); ?>uploads/default17.jpg" class="img-responsive" style="width: 40px;height: 40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);">
														<?php } ?>
														 </div>
														 <div class="col-md-9 col-sm-9 col-xs-9">
														<p><?php echo '<b>'.$getsenderdetails->first_name.'</b> sent to message'; ?> <br>
														<span><?php echo '<i>'.$count_inboxs->message.'</i>'; ?></span>
														<div><?php echo '<i><b>JobTitle:'.$getjobdetails->job_title.'</b></i>'; ?></div>
														</p>
														</div>
													</a>
													<?php } else { ?>
														<a class="msg_text" href="<?php echo $base_url.'bids/select_job/'.$count_inboxs->poid ?>">
														<div class="col-md-3 col-sm-3 col-xs-3">
														<?php if(!empty($getsenderdetails->profile_image)){ ?> 
															<img src="<?php echo base_url(); ?>uploads/<?php echo $getsenderdetails->profile_image; ?>" alt="" class="img-responsive" style="width:40px;height:40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);" >
														 <?php } else { ?> 
															 <img src="<?php echo base_url(); ?>uploads/default17.jpg" class="img-responsive" style="width: 40px;height: 40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);">
														<?php } ?>
														 </div>
														 <div class="col-md-9 col-sm-9 col-xs-9">
														<p><?php echo '<b>'.$getsenderdetails->first_name.'</b> sent to message'; ?> <br>
														<span><?php echo '<i>'.$count_inboxs->message.'</i>'; ?></span>
													<div><?php echo '<i><b>JobTitle:'.$getjobdetails->job_title.'</b></i>'; ?></div>

														</p>
														</div>
													</a>
													
													<?php } ?>
													</div>
													<div class="clear"></div>
													<hr class="msg_hr">
												 <?php }
										
										
										
										 ?>
										</div>	
<!--
										<h3 class="noti_view">Show All</h3>
-->
										</div>
									</div>
                              <input type="hidden" class="utype" value="<?php echo $this->session->userdata('user_type_fr'); ?>">
                              <?php } ?>
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
                                                     
                                                    
                                                //  $data['count_sent'] = $this->dashboard_model->count_sent();
                                             ?>
                                          </span>Hi,<?php echo substr(ucfirst($profile_imageoly->first_name), 0, 10); ?> 
                                       </div>
                                       <div id="page" class="page" data-toggle="tooltip" title="Profile Completed">
                                          <div class="progress-bar">
                                             <canvas id="inactiveProgress" class="progress-inactive" style="position:absolute;width: 50px;" height="275px" width="275px"></canvas>
                                             <canvas id="activeProgress" class="progress-active"  height="275px" width="275px"></canvas>
                                             <p>0%</p>
                                          </div>
                                         
                                        
                                       </div>
                                       <ul class="sub_menu">
                                          <?php  if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student'){ ?>	
                                          <li><a <?php if($current_menu == 'profile'){ echo 'class="current"';  } ?> href="<?php echo $base_url?>profile"><i class="sl sl-icon-user"></i> Profile</a></li>
                                          <li><a href="<?php echo $base_url?>bids/bidposts"><i class="sl sl-icon-user"></i>Job Bids </a></li>
                                          <li><a href="<?php echo $base_url?>bids/manage_jobbid"><i class="sl sl-icon-user"></i>My Jobs Bid </a></li>
                                          
                                          
                                          <li><a href="<?php echo $base_url?>package/packagelist"><i class="sl sl-icon-user"></i>Package details</a></li>
                                       
                                          
                                          
                                          <?php  } if($this->session->userdata('user_type_fr') == 'company'){ ?>	
                                          <li><a <?php if($current_menu == 'profile'){ echo 'class="current"';  } ?> href="<?php echo $base_url?>home/company_profile"><i class="sl sl-icon-user"></i> Profile</a></li>
                                          <li><a href="<?php echo $base_url?>job/draft_jobposts"><i class="sl sl-icon-user"></i>Draft Jobs</a></li>
                                          <li><a href="<?php echo $base_url?>job/jobposts"><i class="sl sl-icon-user"></i>Job Posts </a></li>
                                          <li><a href="<?php echo $base_url?>job/manage_jobposts"><i class="sl sl-icon-user"></i>My Jobs List </a></li>
                                          <?php  } ?>
                                          <li><a href="<?php echo $base_url?>logout"><i  class="sl sl-icon-power logoutbtn"></i> Logout</a></li>
                                       </ul>
                                    </div>
                                    <!-- start social media -->
                                    <div class="pt-0 paddsignsocial col-md-12 col-sm-12 col-xs-12 display-table sm-text-center">
                                       <div class="display-table-cell vertical-align-middle">
                                          <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                                             <ul class="social-network social-circle">
                                                <li><a href="https://www.facebook.com/" target="_blank"  class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                          <li><a href="https://www.instagram.com/" target="_blank"  class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                          <li><a href="https://twitter.com/" target="_blank"  class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                          <li><a href="https://rss.com/" target="_blank"  class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                                          <li><a href="https://plus.google.com/" target="_blank"  class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                          <li><a href="https://www.linkedin.com/" target="_blank"  class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
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
                                          <li><a href="https://www.facebook.com/" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                          <li><a href="https://www.instagram.com/" target="_blank"  class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                          <li><a href="https://twitter.com/" target="_blank"  class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                          <li><a href="https://rss.com/" target="_blank"  class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                                          <li><a href="https://plus.google.com/" target="_blank"  class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                          <li><a href="https://www.linkedin.com/" target="_blank"  class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
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
               </div>
            </div>
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
                           <label><i class="im im-icon-Lock-2"></i>Password: </label>   
                           <input type="password"   id="log_txt_password"   class="effect-16" name="log_txt_password" value="" >
                          
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
                      <label class="comprolabel"> Registeration Form ( Company  / Safety Professional or Student )</label> 
                      
                        <!-- company -->
                        <div id="tab-1" class="tab-contentsfcom current" >
                           <span class="notificmsg"></span>
                           <form method="post" id="FormId" name="FormId">
							<div class="col-md-6 padzero" >
								<div class="field-form form-group has-error">	
									<label for="Name">First Name:					 								
										<i class="im im-icon-Male" aria-hidden="true"></i>
										<input type="text" placeholder="" name="jobfirst" id="jobfirst-name" class="effect-16" >
									</label><span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error">	
									<label for="Name">Last Name:					 								
										<i class="im im-icon-Male" aria-hidden="true"></i>
										<input type="text" placeholder="" name="joblastname" id="joblastname" class="effect-16" >
									</label><span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error">	
										<label for="Name">Email Address:					 								
										<i class="im im-icon-Email" aria-hidden="true"></i>
										<input type="email" placeholder="" id="jobemail" name="jobemail" autocomplete="off"  class="effect-16">
									</label>
									<span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error">	
									<label for="Name">Password:					 								
										<i class="im im-icon-Mail-Password" aria-hidden="true"></i>
										<input type="password" placeholder="" name="password"  autocomplete="off" id="password" class="effect-16" >
									</label>
									<span class="focus-border"></span>
								</div>
							</div>
							<div class="col-md-6 padzero" >
								<div class="field-form form-group has-error">	
									<label for="Name">Zip Code:					 								
										<i class="im im-icon-Post-Mail" aria-hidden="true"></i>
										<input type="text" placeholder="" name="jobzip_code" id="zip-code" class="effect-16" >
									</label>
									<span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error" >
									<label  for="Name">I am a	</label>	
									<select id="registration_type" name="registration_type" class="" >
										<option value="company">Hiring Company</option>
										<option value="professional">Safety Professionaly</option>
										<option value="student">Student</option>

									</select>
									<span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error professional"  style="display: none;">	
									<label for="Name" >I am willing to travel up to:					 								
										<i class="im im-icon-Worker" aria-hidden="true"></i>
										<select id="jobtravel-distance" name="jobtravel_distance" class="beta-signup-safety-pro beta-signup-registration-type" >
											<option value="60">50 miles</option>
											<option value="100">100 miles</option>
											<option value="200">200 miles</option>
											<option value="201">&gt; 200 miles</option>
										</select>
									</label>
									<span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error company">	
									<label for="Name">Company Name:				 								
										<i class="im im-icon-Building" aria-hidden="true"></i>
										<input type="text" placeholder="" name="company_name" id="company-name" style="">
									</label>
									<span class="focus-border"></span>
								</div>
								<div class="field-form form-group has-error">	
									<label for="Name" class="ckeckbox-label">			 								
										<input type="checkbox" id="subscribe" name="newsletter" value="subscribe" checked="checked" style="width: 5%;">Subscribe to the monthly Safety Engagement Newsletter
									</label>
									<span class="focus-border"></span>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="space_btn button border" id="submit_reg">Register</button>
							</div>
						</form>
					</div>
                        <!-- Safety Professional -->
                      </div>
                     <!-- container -->
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
      <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery-3.3.1.js"></script>
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
         $(document).ready(function() {
         	
             $('.badgeredirect').on('click',function(e) {
         		var utype = $('.utype').val();
         		if(utype == 'company'){
         			window.location.href ="<?php echo $base_url; ?>home/company_profile";
         		}
         		else if(utype == 'professional' || utype == 'student'){
         						window.location.href ="<?php echo $base_url; ?>home/profile_new";
         
         			}
             });
             
         });
         
         $(document).ready(function() {
         	 jQuery('#nav_btn').on('dblclick',function() { 
         		  //~ alert("The paragraph was double-clicked.");
         		  $('#nav_btn').css('padding','1px 8px');
             });
         	
         });
         	
      </script>
      <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    var baseurl = $('.baseurl').val();



				$.ajax({
						   dataType : "json",
							type : 'post',
  						  url: baseurl+'ChatController/getchatcountbadgedropdown',
						  success:function(data)
						  {
							
						console.log(data);
  						$('#myDropdown').html('');
  						$('#myDropdown').append(data);
						//	ScrollDown();
						 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
      <style>
		  .dropbtn {
   
    color: white;
    padding: 0;
    font-size: 16px;
    border: none;
    cursor: pointer;
}



.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}



.show {display: block;     border-radius: 5px;}
		  header nav .headtop {
    align-items: center;
    display: -ms-flex;
    display: -webkit-flex;
    display: -moz-flex;
    display: table;
    height: auto;
    padding: 0;
       
}
@media (max-width: 991px){
.headtop {
}
.headtop {
    margin-right: -15px;
    margin-left: -15px;
}}
		  .comprolabel
		  {
			      border-left: 4px solid #ED7D31;
    background: #ED7D318c;
    color: #fff;
    padding: 0 12px;
    border-bottom: unset;
			 }
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
         padding: 0px; 
         cursor: pointer; 
         }
         #nav_btn span, #nav_btn span::before, #nav_btn span::after { 
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
         padding: 0
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
        @media (max-width:680px){
				.page {
					margin: -16px 0;
				}
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
         top: 0;
         width: 51px;
         }
         @media (min-width: 600px) and (max-width: 680px) { 
			 
		.progress-bar p {
		      top: 10px !important;
		 }
		 .progress-bar .progress-active {
				top: -7px;
			}
		 }
         @media (min-width: 320px) and (max-width: 600px) { 
				 .progress-bar .progress-active{
			 position: absolute;
			top: 2px;
			 width: 51px;
			 }
		}
         
         .progress-bar p{
         position: absolute;
         margin: 0;
         padding: 0;
         width: 56px;
         top: 18px;
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
         padding: 10px;
         margin:0;
         width:100%;
         }
         .small-dialog-header {
         width: calc(100% + 10px);
         left: 0px;
         }
         }
         a.msg_text {
    text-align: left;
    color: #36454f !important;
    padding: 5px 0px;
}
hr.msg_hr {
    margin: 5px;
}
h3.noti_headss {
       background: #f05001;
    color: #ffffff;
    font-size: 24px;
    text-align: center;
    width: 250px;
    padding: 5px 0px;
    margin: 0;
    line-height: normal;
}
.dropdown .col-md-12, .msg_text .col-md-3, .msg_text .col-md-9
{
	    padding-right: 5px;
    padding-left: 5px;
}
.noti_middle {    height: 235px;
    overflow: auto;}
    h3.noti_view {
    text-align: left;
    font-size: 18px;
    padding: 7px;
    margin: 0px;
    line-height: normal;
    font-weight: 600;
    color: #ef5001;
}
      </style>
