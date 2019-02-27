	
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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />
-->

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

</head>

<body>
		<div class="tab-content" id="tab2" >
						
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
								'contractor'  => 'Contractor',
								'application_user'    => 'User',
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

 

						</div>
						
						
						
<!-- Scripts
================================================== -->
<script data-cfasync="false" src="http://www.vasterad.com/cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/counterup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/custom.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js"></script><!-- Modernizer -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script><!-- Jquery -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script><!-- Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script><!-- Script -->
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrolltopcontrol.js"></script>
-->
<!-- ScrollTopControl -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slick.min.js"></script><!-- Slick -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrolly.js"></script><!-- Slick -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sumoselect.js"></script><!-- Nice Select -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/choosen.min.js"></script><!-- Nice Select -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/waypoints.js"></script><!-- Nice Select -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<script>	
	$('#loginsubmit').click(function() {
	var form2 = $('#loginFormId');
	var error1 = $('.alert-danger', form2);
	var success1 = $('.alert-success', form2);

	form2.validate({
	errorElement: 'span', //default input error message container
	errorClass: 'help-block help-block-error', // default input error message class
	focusInvalid: false, // do not focus the last invalid input
	ignore: "", // validate all fields including form hidden input
	messages: {  
	'txt_username': {
	required: 'Please Enter the email',
	email: 'Please Enter valid email',
	},
	'txt_password': {
	required: 'Please Enter the password',
	},
	},
	rules: {
	txt_username: {
	required: true
	},
	txt_password: {
	required: true
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
	},
	submitHandler: function(form) {
	
	//event.preventDefault();
	jQuery.ajax({
	url : '<?php echo $base_url; ?>Login_controller/login',
	data: jQuery(form).serialize(),
	type: 'POST',
	dataType : 'json',
	success:function(response){
	if (response.status == "success") {
	
	//location.reload();
	document.location.href = response.redirect;
	}
	else
	{

		$('.notificmsg_log').html(response.faild);
		setTimeout(function() {
		$(".notificmsg_log").empty();
		}, 15000);   
	}
	}
	});
	}
	}); 	
	});
	
   
	$('#submit_reg').click(function() 
	{
		
		var form1 = $('#FormId');
		var error1 = $('.alert-danger', form1);
		var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'txt_empname': {
                    required: 'Please Enter the first name',
                },
				 'txt_utype': {
                    required: 'Please Enter the User type',
                },
				 'txt_phone': {
                    required: 'Please Enter the last name',
                },
				
				 'txt_empname': {
                    required: 'Please Enter the username',
					remote : "Username already taken"
                },
				
				 'txt_email': {
                    required: 'Please Enter the email',
					email: 'Please Enter valid email',
					remote : "Email already taken"
                },
				 'txt_password': {
                    required: 'Password should not empty',					
                },
				 'txt_utype': {
                    required: 'Please Enter the user type',
                },
            txt_phone: 'Please Enter phone Number',
	
         
            },
            rules: {
                txt_empname: {
                    required: true
                },
				txt_utype: {
                    required: true
                },
				txt_empname: {
                    required: true,
					remote: {
					url: "<?php echo $base_url; ?>Signup_controller/unquie_fro_val",
					type: "post",
					data: {
						type:'username',
						username: function() {
							return $( "#txt_empname" ).val();
							}
						}
					}
                },
				txt_phone: {
					required: true,
					
				},
             	txt_email: {
                    required: true,
					email:true,
					remote: {
					url: "<?php echo $base_url?>Signup_controller/unquie_fro_val",
					type: "post",
					data: {
						type:'email',
						useremail: function() {
							return $( "#txt_email" ).val();
							}
						}
					}
					
                },
				txt_password: {
                    required: true,
					minlength: 6
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
            //event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>Signup_controller/signup',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){ 
						$('.notificmsg').html(response);
						setTimeout(function() {
						$(".notificmsg").fadeOut().empty();
						}, 15000);   						
						}
					});
            }
        });
	});


</script>
		
		<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>       
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!--
         <script src="<?php echo site_url();?>assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
-->
<!--
        <script src="<?php echo site_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/pages/scripts/form-wizard.js" type="text/javascript"></script>
		<script src="<?php echo site_url();?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
-->

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
<!--
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>     
        <script src="<?php echo site_url();?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url();?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
-->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
<!--
        <script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
-->
<!--
        <script src="<?php echo base_url();?>assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
-->

        <script type="text/javascript" src="<?php echo base_url();?>assets/icon/bootstrap-iconpicker/js/iconset/iconset-all.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/icon/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>

    <!-- Scripts
================================================== -->
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/jquery-2.2.0.min.js"></script>
-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/chosen.min.js"></script>
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/slick.min.js"></script>
-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/counterup.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/listeo/scripts/tooltips.min.js"></script>
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/custom.js"></script>
-->


<!-- Booking Widget - Quantity Buttons -->




<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="<?= site_url('assets/datetimedrapper/css/datedropper.css'); ?>" rel="stylesheet" type="text/css">
<script src="<?= site_url('assets/datetimedrapper/js/datedropper.js'); ?>"></script>
<script>$('#booking-date').dateDropper();</script> 

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="<?= site_url('assets/datetimedrapper/js/timedropper.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= site_url('assets/datetimedrapper/css/timedropper.css'); ?>"> 
<!--
<script>
this.$('.booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script> 
-->

<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script> 
<script src="<?php echo base_url(); ?>assets/listeo/scripts/quantityButtons.js"></script>

<script src="<?php echo $base_url; ?>assets/global/plugins/fullcalendar/gcal.js"></script>

<!-- Booking Widget - Quantity Buttons -->

        <link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/site.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/richtext.min.css">
        <script src="<?php echo $base_url; ?>assets/textediter/js/jquery.richtext.js"></script>


        <script>
        $(document).ready(function() {
            $('.content_desc').richText();
        });
        </script>
       
</body>
</html>

