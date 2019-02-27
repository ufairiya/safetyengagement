<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Safety Engagement | Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content=" <?php echo SITE_NAME;?> " name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
     <link rel="shortcut icon" href="https://stallioni.net/B289a/assets/images/favicon.png" />
        <link rel="apple-touch-icon" href="https://stallioni.net/B289a/assets/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="https://stallioni.net/B289a/assets/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="https://stallioni.net/B289a/assets/images/apple-touch-icon-114x114.png" />	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/listeo/css/colors/main.css" id="colors" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datetimedrapper/css/home.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/listeo/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datetimedrapper/css/colors/main.css" id="colors">

	<link href="<?php echo $base_url;?>assets/layouts/layout2/css/custom.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="<?php echo $base_url;?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?php echo $base_url;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?php echo $base_url;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo $base_url;?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="application/javascript">
	var SITE_URL ="<?php echo $base_url?>";
	</script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body class=" login" data-id="<?php echo $this->session->site_lang;?>">
	<!-- BEGIN LOGO -->
	<div class="logo"    style="margin: 0 auto;width: 144px;" >
		<a href="<?php echo $base_url;?>">
		<img src="<?php echo $base_url;?>assets/images/logo-white.png"  alt="" style="width:100%; " /> 
		</a>
	</div>
	<!-- END LOGO -->
