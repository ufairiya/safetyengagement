<?php defined('BASEPATH') OR exit('No direct script access allowed');
global $aQuickNav;
$title = (isset($title) && $title !='') ? ' | '.$title  :FALSE;
$aQuickNav = (isset($quickView)) ? $quickView :  $aQuickNav;
$aQuickNav = FALSE;
$aPageTop = (isset($pageTop)) ? $pageTop : FALSE;
$btnName = (isset($pageTopName)) ? $pageTopName : 'New';
$aCreatePOTop = (isset($poTop)) ? $poTop : FALSE;
$aCreateNewPOTop = (isset($NewpoTop)) ? $NewpoTop : FALSE;
$aBack = (isset($pageBack)) ? $pageBack : FALSE;
?>
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

 <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
        <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/images/apple-touch-icon-114x114.png" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
       
		<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $base_url;?>assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo $base_url;?>assets/layouts/layout2/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo $base_url;?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-3.2.0/css/docs.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-3.2.0/css/pygments-manni.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/elusive-icons-2.0.0/css/elusive-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/font-awesome-4.2.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/ionicons-1.5.2/css/ionicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/map-icons-2.1.0/css/map-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/material-design-1.1.1/css/material-design-iconic-font.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/octicons-2.1.2/css/octicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/typicons-2.0.6/css/typicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/weather-icons-1.2.0/css/weather-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/listeo/css/style.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>assets/listeo/css/colors/main.css" id="colors">
		<script type="application/javascript">
		var SITE_URL ="<?php echo $base_url?>";
        </script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    
		<style type="text/css">
		.po-drop-menu>li>a{
		padding: 8px 16px;
		color: #6f6f6f;
		text-decoration: none;
		display: block;
		clear: both;
		font-weight: 300;
		line-height: 18px;
		white-space: nowrap;
		}
		.po-drop-menu>li>a:focus, .po-drop-menu>li>a:hover {
		text-decoration: none;
		color: #262626;
		background-color: #e1e5ec;
		}
		.logo-default{
		width:80%;
		margin: 3px !important;
		}
		a.logout_des
		{
		color:#fff;
		}
		a.logout_des:hover
		{
		color:#fff;
		}
		@media (max-width: 991px){
		.page-header.navbar .page-logo img {
		margin-left: 25% !important;
		width: 38% !important;
		margin-top: 8px !important;
		}
		}

		@media (max-width: 991px) and (min-width: 768px){
		.hidden-sm {
		display: initial !important;
		}
		.btn.btn-outline.red.sblue{
		background-color: #FFF;
		}

		.page-header.navbar .page-logo {
		background: #006BF9;
		height: 126px;
		}
		}
		</style> 
	</head>  
<body>
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
						<a href="<?php echo $base_url; ?>admin/dashboard"><img src="<?php echo $base_url;?>assets/images/logo-white.png" alt=""></a>
					</div>
					
				</div>
				<div class="right-side">
					<div class="header-widget">
						<div class="user-menu">
							<?php	$profile_imageoly = $this->users_model->get_profile_img($this->session->userdata('user_id')); 
									?>
							<div class="user-name">
							
								<span>
								<?php if(!empty($profile_imageoly->profile_image)){ ?>
								<img src="<?php echo $base_url.'uploads/'.$profile_imageoly->profile_image; ?>" alt="">
								<?php } else { ?> 
								<img src="<?php echo $base_url?>uploads/default17.jpg">
								<?php } ?>
								
								</span>My Account
							</div>
							<ul>
								<li><a href="<?php echo $base_url?>admin/profile"><i class="sl sl-icon-user"></i> Profile</a></li>
								<li><a  class="logout_des dropdown-toggle" href="<?php echo $base_url?>admin/login/logout">
									<i class="sl sl-icon-power"></i> <?php echo $this->lang->line('logout'); ?>  </a>
								</li>
							</ul>
						</div>
					</div>
					<!-- Header Widget / End -->
				</div>
				<!-- Right Side Content / End -->
			</div>
		</div>
	<!-- Header / End -->
	</header>
<div class="clearfix"></div>
