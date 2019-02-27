
<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Title Bar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Account Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="a-dashboard.php">Home</a></li>
							<li>Account Management</li>
							<li><a href="a-administrator.php">Administrator</a></li>
							<li>Update Administrator</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	
		<form name="updateadmindetails" id="updateadmindetails" method="post">
			<div class="row">
				<!-- Profile -->
				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box margin-top-0">
						<h4 class="gray">Admin Details</h4>
						<div class="dashboard-list-box-static">
							
							<!-- Avatar -->
							<div class="edit-profile-photo" >
								<div class="emty_cls" id="uploaded_images">
								   <?php if($admin_details->profile_image != ""){ ?>
								   <img src="<?php echo $base_url.'uploads/'.$admin_details->profile_image; ?>">
								   <?php } else { ?>
								   <img src="<?php echo $base_url?>uploads/default17.jpg">
								<?php } ?>
								</div>
								<div class="change-photo-btn">
								   <div class="photoUpload">
									  <span><i class="fa fa-upload"></i> Upload Photo</span>
									  <input type="file"  name="img_upload" class="upload" id="imagebookUploadForm" />
									  <div ></div>
								   </div>
								</div>
							 </div>
							<input type="hidden" name="userid" value="<?php echo $admin_details->id_user_master; ?>" type="text">
							<input type="hidden" class="img_link" name="img_link" value="" type="text">
							<!-- Details -->
							<div class="my-profile">

								<label>Username</label>
								<input name="adminusername" value="<?php echo $admin_details->username; ?>" type="text">

								<label>Email</label>
								<input name="adminemail" value="<?php echo $admin_details->email; ?>" type="text">
								
								<label>Phone Number</label>
								<input name="adminphoneno" value="<?php echo $admin_details->phone; ?>" type="tel">

							</div>

						</div>
					</div>
				</div>

				<!-- Profile -->
				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box margin-top-0">
						<h4 class="gray">Admin Panel</h4>
						<div class="dashboard-list-box-static">
							
							<!-- Details -->
							<div class="my-profile">

								<h5 class="margin-bottom-10"><strong>Administrative Rights</strong></h5>
								<div class="checkboxes in-row margin-bottom-20">
								<?php 
								 $chkskills =explode(",",$admin_details->skills); 
								//~ echo '<pre>';
								//~ print_r($chkskills);
								//~ echo '</pre>';
								?>	

								<input class="checkbox" id="check-a" type="checkbox" name="check[]" <?php  if(in_array(1,$chkskills)){  echo 'checked';}else{ echo'';} ?> value="1">
								<label class="col-md-12" for="check-a"> Account Management</label>
								<div class="col-md-12 pad">
								<input class="checkbox" id="check-b" type="checkbox" name="check[]"  <?php  if(in_array(2,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="2">
								<label for="check-b">Administrator</label>
								
								<input class="checkbox" id="check-c" type="checkbox" name="check[]"  <?php if(in_array(3,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="3">
								<label for="check-c">Company</label>

								
								<input class="checkbox" id="check-d" type="checkbox" name="check[]"  <?php if(in_array(4,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="4">
								<label for="check-d">Professional</label>
								
								<input class="checkbox" id="check-e" type="checkbox" name="check[]"  <?php if(in_array(5,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="5">
								<label for="check-e">Student</label>
								
								</div>
								
								<input id="check-f" type="checkbox" name="check[]"  <?php if(in_array(6,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="6">
								<label class="col-md-12" for="check-f">Packages Management</label>
								<input id="check-g" type="checkbox" name="check[]"  <?php if(in_array(7,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="7">
								<label for="check-g">Payment Management</label>
															
								<input id="check-h" type="checkbox" name="check[]"  <?php if(in_array(8,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="8">
								<label for="check-h">Post Job Management</label>
															
								<input id="check-i" type="checkbox" name="check[]"  <?php if(in_array(9,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="9">
								<label for="check-i">Bidded Job Management</label>
															
								<input id="check-j" type="checkbox" name="check[]"  <?php if(in_array(10,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="10">
								<label for="check-j">Awarded Job Management</label>
															
								<input id="check-k" type="checkbox" name="check[]"  <?php if(in_array(11,$chkskills)){  echo 'checked';}else{ echo'';}  ?> value="11">
								<label for="check-k">Completed Job Management</label>
															

								</div>
								<div class="error"></div>
							</div>

							<button type="submit" class="btndesign button margin-top-15 pull-left " style="margin-right: 4px;">Save Changes</button>

								<a href="#resetpasspop" disabled="disabled" class="btndesign resetpasspop popup-with-zoom-anim  button margin-top-15">Reset Password</a>


						</div>
					</div>
				</div>

			</div>
		</form>	
		
		
		
			<div class="row">	
				<!-- Copyrights -->
				<div class="col-md-12">
		<div class="copyrights"><?php echo date('Y');?> &copy; Safety Engagement.</div>
				</div>
			</div>
			
		
		
		
		<!-- Reply to review popup -->
		<div id="resetpasspop" class="zoom-anim-dialog mfp-hide contractor-popup">
			<div class="small-dialog-header">
				<h3><i class="im im-icon-Pen-3"></i>Reset Password</h3>
			</div>
			
			<div class="modal-body">
					<div class="row">
						<div class="col-md-12  ">
								<form method="post" id="changepassForm" name="changepassForm">
					<div class="form-group ">
					<label><i class="im im-icon-Mail"></i>Email address:
					<input type="email" class="effect-16" name="reset_email" id="reset_email" required="">
					</label>	            
					<span class="focus-border"></span>
					<span class="text-danger"></span>
					
					</div>
							<button type="submit" id="resetbtn" class="button border margin-top-5">Send</button>	

							</form>
							
						</div>
					</div>
				</div>
			
		</div>
		
	</div>
		<!-- Content / End -->
<style type="text/css">
    a[disabled="disabled"] {
        pointer-events: none;
    }
</style>
<script>

<!-- image upload-->	

$('#imagebookUploadForm').change(function(){
	var file_data = $('#imagebookUploadForm').prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	$.ajax({
		url: '<?php echo $base_url?>admin/user/user_image',
		method:"POST",
		data:form_data,
		contentType:false,
		cache:false,
		processData:false,
		beforeSend:function()
		{
			$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
		},
		success:function(data)
		{
			$('#uploaded_images').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
			$('.img_link').val(data);
			$('#files').val('');
		}
	})

});

<!-- update submit -->
 jQuery(document).ready(function(e) {
	 var form1 = $('#updateadmindetails');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
			
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'adminusername': {
                    required: 'Please enter the username',
                },
                
				 'adminemail': {
                    required: 'Please enter the admin',
                },
                
				 'adminphoneno': {
                    required: 'Please enter the phone number',
                }, 
                              
                'check[]': {
					required: 'You must check at least 1 box',             
				},
   
            },
            rules: {
                adminusername: {
                    required: true
                },
				
				adminemail: {
                    required: true
                },
            
			  	adminphoneno: {
                    required: true
                },
                'check[]': {
					required: true,  					                
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
            
             errorPlacement: function(error, element) 
			{

				if (element.attr("name") == "check[]") 
				{
					 $(".error").append(error);
					
				}			
				else
				{
					
					error.insertAfter(element);
				}

			},


            submitHandler: function(form) {
				
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/user/update_admindata',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						        var response = $.parseJSON(response);

						console.log(response.success);
						
						if(response.success == 'success')
						{

							//~ setTimeout(function(){// wait for 5 secs(2)
							// window.location.href ='<?php echo $base_url?>booking/active_request';
							
							//~ }, 2000); 
							
							toastr.options = {
									"closeButton": true,
							}
							toastr.success("User Updated Successfully", "Notifications");	
							setTimeout(function(){// wait for 5 secs(2)
							location.reload(); // then reload the page.(3)
							// window.location.href ='<?php echo $base_url?>my-request/active-request/?active=pending';
							}, 3000); 			   	
						}
						else
						{
						//	jQuery( '.append' ).append( '<div class="notification error closeable"><p>Update is unsuccessfully.</p><a class="close"></a></div>' );
						
							//~ setTimeout(function(){// wait for 5 secs(2)
							//~ window.location.href ='<?php echo $base_url?>booking/active_request';
							//~ }, 2000); 
							
							toastr.options = {
										"closeButton": true,
									}
									toastr.warning("User Updated Unsuccessfully", "Notifications");	
									setTimeout(function(){// wait for 5 secs(2)
								location.reload(); // then reload the page.(3)
								}, 3000); 			   		
							
						}
					}
				});
            }
        });
         		
		 var form2 = $('#changepassForm');
        var error2 = $('.alert-danger', form1);
        var success2 = $('.alert-success', form1);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
            rules: {
                current_password: {
                    required: true,
                                     
                 
                },
				
				new_password: {
                    required: true,
					  minlength : 5
                },
            
			  	confirm_password: {
                    required: true,
					  minlength : 5,
					  equalTo : "#new_password"
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
					url : '<?php echo $base_url?>admin/user/changepassword',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						if(response == 'current_fail')
						{
							toastr.error("Email not found");
							return false;
						}					
						else
						{
						toastr.success("Please complete your password reset via the email sent to you.");	
						
						$.magnificPopup.close();
						//setTimeout(function(){ location.reload(); }, 500);	
						
						}
					}
				});
            }
        });
	}); 
</script>
<script>
$(document).ready(function () {
    $('#check-a').click(function (event) {
        if (this.checked) {
            $('.checkbox').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkbox').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>
<style>
.pad {padding: 0px 50px;}
</style>
