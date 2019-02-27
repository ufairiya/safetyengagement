<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- BEGIN LOGIN -->
            <!-- BEGIN LOGIN FORM -->
			
				
			<div id="sign-in-dialog" class="zoom-anim-dialog ">
					<div class="for_got">
					<div class="small-dialog-header">
					<h3>Log In</h3>
					</div>

					<!--Tabs -->
					<div class="sign-in-form style-1">

				

					<div class="tabs-container alt">

					<!-- Login -->



					<span class="notificmsg_log"></span>

				<?php $attributes = array('autocomplete' => 'off', 'name' => 'login-form',"class"=>'login-form',"id"=>'login_form',"novalidate"=>"novalidate");
						echo form_open('admin/login/processlogin', $attributes);
					echo getFlashMsg(); 
					//~ if($this->session->flashdata('succ_msg'))
					//~ {
						//~ echo $this->session->flashdata('succ_msg');
						//~ }
					?>			
							<p class="form-row form-row-wide">
					<div class=" ">
					<?php //echo $this->input->cookie('ctracker_user_name'); echo "hi"; ?>
					<label><i class="im im-icon-Male"></i>User Name:

					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="<?php echo $this->lang->line('username'); ?>" name="username" /> </div>

					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"><?php echo form_error('txt_username'); ?></span>
					</div>
					</p>
					<p class="form-row form-row-wide">
					<div class="">
					<label><i class="im im-icon-Lock-2"></i>Password:
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo $this->lang->line('password'); ?>" name="password" />
					</label>   
					<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
					<span class="focus-border"></span>
					</div>
					</p>

					<div class="form-row">
					<div class="checkboxes remidme margin-top-10">
					<input class="styled-checkbox" <?php if($this->input->cookie('ctracker_remidme') != ''){	echo 'checked="checked"';	} ?> id="styled-checkbox-1" name="remindme" type="checkbox" value="1">

					<label for="remember-me">Remember Me</label>
					<button type="submit"   id="loginsubmit"  class="btndesign button border margin-top-5">Login</button>
					</div>
					</div>

					<?php echo form_close(); ?>
					<span class="lost_password for_click_ad">

					<!--
					<span class="lost_password ">
					-->
					<p class="lost_pass_ad">Lost Your Password?</p>
					</span>	
					</div>

					
					</div>
					
				
					<div class="for_got_form" style="display:none">

					<div class="small-dialog-header">
					<h3>Reset Password</h3>
					</div>

					<span class="notificmsg_reset"></span>
					<div class="" >



					<form  class="restpasswordss" id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url();?>admin/login/Passwordreset">	

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
					<button type="submit" id="resetbtn" class="btndesign button border margin-top-5">Send</button>
					</form>		
					</div><p class="sign-in-ad">Back to login ?</p>

					<!--
					<a href="#sign-in-dialog" class="sign-in_for popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In / Register</a>
					-->


					</div>

			</div>

			</div>
			</div>
			<!-- Sign In Popup / End -->

					
      
      	
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"    style="margin: 0 auto;width: 200px;"> <?php echo date('Y');?> &copy; Safety Engagement <?php //echo SITE_NAME;?>  </div>
        
        
  <script type="application/javascript">
jQuery(document).ready(function(e) {
       var form1 = $('#forget_password');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
 
				 'useremail': {
                    required: 'Please enter the e-mail',
					email: 'Please Enter valid email',
					remote : "Enter Email ID is not valid"
					
                },
            },
            rules: {
             	useremail: {
                    required: true,
					email:true,
					remote: {
					url: "<?php echo $base_url?>admin/forgot/unquie_email",
					type: "post",
					data: {
						type:'email',
						useremail: function() {
							return $( "#useremail" ).val();
							}
						}
					}
					
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
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/forgot/process_forgot',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
							window.location.href = '<?php echo $base_url?>admin/login';	
					}
				});
            }
        });
        setTimeout(function(){ $('.alert').hide(); }, 3000);

});
</script>
