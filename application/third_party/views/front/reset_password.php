 <?php  // if (!$this->session->login) {?>
  
   <link  rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/home.css" />
   <link  rel="stylesheet" href="<?php echo $base_url; ?>assets/css/new/responsive.css" />
   <link  rel="stylesheet" href="<?php echo $base_url; ?>assets/listeo/css/style.css" />
   
   
<html lang="en"><head>
	<meta charset="utf-8">
	<title>1SS | Password Reset</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content=" B279 " name="description">
	<meta content="" name="author">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/listeo/css/colors/main.css" id="colors" type="text/css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/home.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/listeo/css/style.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/colors/main.css" id="colors">

	<link href="<?php echo $base_url; ?>assets/layouts/layout2/css/custom.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="<?php echo $base_url; ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?php echo $base_url; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css">
	<link href="<?php echo $base_url; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css">
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo $base_url; ?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css">
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico">
	<script type="application/javascript">
	var SITE_URL ="<?php echo $base_url; ?>";
	</script>
	<script src="<?php echo $base_url; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body style="text-align:center;">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="<?php echo $base_url; ?>">
		<img src="<?php echo $base_url; ?>assets/listeo/images/logo.png" alt="" style="width:200px;margin-top:20px;"> 
		</a>
	</div>
				
<div id="sign-in-dialog" class="zoom-anim-dialog" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);border-radius:3px;">
		<div class="small-dialog-header">
			<h3>Password Reset</h3>
		</div>
		<div class="sign-in-form style-1">
			<div class="form" >
			<form method="post" name ="resetchange_password"  action="<?php echo $base_url; ?>login_controller/reset_password" id="resetchange_password" >
			<div class="tabs-container alt">
					<label>
						<i class="im im-icon-Lock-2"></i>New Password:
						<input type="hidden" name="create_key" value="<?php echo $createkey; ?>" >
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" name="resetnewpassword" id="resetnewpassword" value="">
					</label>
					<label>
						<i class="im im-icon-Lock-2"></i>Confirm Password:
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" name="resetconfirmpassword" id="resetconfirmpassword" value="">
					</label>
					<button type="submit" id="loginsubmit" class="button border margin-top-20">Update Password</button>
			</div>
		</div>
		</form>
		</div>
</div>					
<div class="copyright"> 1SS © 2018 </div>
<script src="<?php echo $base_url; ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>

<script type="application/javascript">
jQuery(document).ready(function(e) {
 var form = $('#resetchange_password');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'resetnewpassword': {
                    required: 'Password is required',
                 minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),					

                },
				 'resetconfirmpassword': {
                    required: 'Confirm password required ',
                 minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),					
				equalTo: "Entry does not match with password",
                },
				
				 	
                
            },
            rules: {
             
				resetnewpassword: {
                    required: true,
					 minlength: 8,
                },
            
			  	resetconfirmpassword: {
                    required: true,
					  minlength: 8,
					  equalTo : "#resetnewpassword"
                },
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

 submitHandler: function(form) {
				
				
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Password reset successfully");		
				 	setTimeout(function(){  form.submit(); 
						 }, 500);	
            }
        });
           });
        </script>
</body></html>
