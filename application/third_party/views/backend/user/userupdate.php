<div class="dashboard-content">

<!--
singleproperty
-->
		<!-- Title Bar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Account Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
							<li>Account Management</li>
							<li><a href="<?php echo $base_url; ?>admin/user/users">User</a></li>
							<li>User Update</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Reply to review popup -->
		
		<div id="small-dialog" class="zoom-anim-dialog mfp-hide contractor-popup">
		<form id="updateprpropertydetails" method="post">
			<div class="small-dialog-header">
				<h3></h3>
			</div>
			<div class="message-reply margin-top-0">
				<label class="popup-label">Apartment Name</label>
				<input type="text" class="aptname" name="aptname" value="" />
				<input type="hidden" class="aptid" name="aptid" value="" />

				<label class="popup-label">Address</label>
				<textarea class="aptaddress" name="aptaddress"></textarea>

				<button type="submit" class="btndesign button">Update Apartment</button>
			</div>
			</form>
		</div>
		
		
		<!-- Reply to review popup -->
		<div id="resetpasspop" class="btndesign zoom-anim-dialog mfp-hide contractor-popup">
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
		
		<div class="row">
			
			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profile Details</h4>
					
					<div class="dashboard-list-box-static">
					         <div class="form" >
					        
						  <form method="post" name ="updateuserdetails" id="updateuserdetails" >

						<!-- Avatar -->
						<div class="edit-profile-photo" >
							<div class="emty_cls" id="uploaded_images">
							   <?php if($list_of_users->profile_image != ""){ ?>
							   <img src="<?php echo $base_url.'uploads/'.$list_of_users->profile_image; ?>">
							   <?php } else { ?>
							   <img src="<?php echo $base_url?>uploads/default22.jpg">
							<?php } ?>
							</div>
							<div class="change-photo-btn">
							   <div class="photoUpload">
								  <span><i class="fa fa-upload"></i> Upload Photo</span>
								  <input type="file" accept="image/x-png,image/gif,image/jpeg" name="img_upload" class="upload" id="imagebookUploadForm" />
								  <div ></div>
							   </div>
							</div>
						 </div>
						
						<!-- Details -->
						<div class="my-profile">

							<label>Your Name</label>
							<input name="first_name" value="<?php echo $list_of_users->username; ?>" type="text">
							<input type="hidden" name="img_link" class="upload" id="img_link" value="<?php echo $list_of_users->profile_image; ?>" />
							<input type="hidden" name="img_userid" class="img_userid" id="img_userid" value="<?php echo $list_of_users->id_user_master; ?>" />
							<input type="hidden" name="user_type" class="user_type" id="user_type" value="<?php echo $list_of_users->user_type; ?>" />

							<label>Phone</label>
							<input name="user_phone" value="<?php echo $list_of_users->phone; ?>" type="tel">

							<label>Email</label>
							<input name="user_email" readonly value="<?php echo $list_of_users->email; ?>" type="text">
						<?php if($list_of_users->user_type == 'contractor'){ ?>
							<label class="margin-top-0">Company Name</label>
							<input type="text" name="companyname" value="<?php echo $list_of_users->companyname; ?>">

							<label>Work Permit Number</label>
							<input type="text" name="wpno" value="<?php echo $list_of_users->user_workpermitno; ?>">

							<label>Work Permit Expiry Date</label>

							<input type="text" name ="wpexpdate" data-min-year="2017" data-max-year="2080" id="booking-date-cont" data-lang="en" data-large-mode="true" data-init-set="false" data-large-default="true" placeholder="<?php echo $list_of_users->workexpirydate; ?>">

							<?php $chkskills =explode(",",$list_of_users->skills); 
							
							?>
							<h5 class="margin-top-60 margin-bottom-10"><strong>Skill Category</strong></h5>
					<div class="checkboxes in-row margin-bottom-20">
						<?php if(!empty($usercontractor)){
							 foreach($usercontractor as $usercontractorval){ ?>
						<input id="check-<?php echo $usercontractorval->taskcategory_name; ?>" type="checkbox"  name="check[]"  <?php  if(in_array($usercontractorval->id,$chkskills)){  echo 'checked';}else{ echo'';} ?> value="<?php echo $usercontractorval->id ?>"/>
						<label for="check-<?php echo $usercontractorval->taskcategory_name; ?>"><?php echo $usercontractorval->taskcategory_name; ?></label>
						<?php }} ?>
						
					</div>
						
						<?php } ?>
						<div>
						<button type="submit" class="btndesign button margin-top-15 pull-left" style="margin-right: 4px;">Save Changes</button>
						<a href="#resetpasspop" class="btndesign resetpasspop popup-with-zoom-anim  button margin-top-15" disabled="disabled">Reset Password</a>
						</div>	
						</div>
					</form>
					</div></div>
				
			</div>
			</div>

			
			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			
          <ul class="list-group">
			<?php 
			
			 $uid = $list_of_users->id_user_master; 
			//~ print_r($list_of_users)
		 $get_post = $this->users_model->get_post($uid); 
		 	
 foreach($get_post as $get_posts)
 { ?>
	  <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="listing-title"><h4><?php echo$get_posts->job_title; ?><span class="listing-type"><?php echo$get_posts->jobemergency; ?></span></h4><ul class="listing-icons"><li> <?php echo$get_posts->explevel1; ?></li><li> <?php echo$get_posts->joblocation; ?></li></ul></div></a></li>

 <?php }
?>
</ul>
          </div>
		</div>
	</div>
			</div>
			
			<!-- Copyrights -->
			<div class="col-md-12">
		<div class="copyrights"><?php echo date('Y');?> &copy; Safety Engagement.</div>
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
					$(".resetpasspop").on('click', function(e) {
						var pname = $(this).attr('');
					});
					$(".buttons-to-right").on('click', 'a', function(e) {

					var pname = $(this).attr('data-pname');
					var paddress =  $(this).attr('data-paddress');
					var pid =  $(this).attr('data-pid');
					$('.aptname').val('');
					$('.aptid').val();
					$('.aptid').val(pid);
					$('.aptaddress').empty();
					$( ".small-dialog-header h3" ).empty();
					$('.aptname').val(pname);
					$( ".small-dialog-header h3" ).html('<i class="im im-icon-Pen-3"></i>'+pname );

					
					$('.aptaddress').html(paddress);


					});
					$("a[name=deleteaprt]").on("click", function () { 
   
				
						var pid = $(this).attr('data-deleid');
						
						jQuery.ajax({
						url : '<?php echo $base_url?>admin/apartment/deleteaprt',
						data:{'pid':pid},
						type: 'POST',
						success:function(response){
							if(response == 'success')
							{
						toastr.options = {
						"closeButton": true,
						}
						toastr.success("Deleted Succesfully", "Notifications");
						setTimeout(function(){
							location.reload(); 
							}, 1000);	
						}
						else
						{
							toastr.options = {
						"closeButton": true,
						}
						toastr.warning("Deleted Not Succesfully", "Notifications");
						setTimeout(function(){
							location.reload(); 
							}, 1000);	
							
						}
						}
						});
						 
					});
					   
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
   // $('.emty_cls').empty('');
   
   $('#uploaded_images').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
   
   $('#img_link').val(data);
   $('#files').val('');
   }
   })
   
   });
    jQuery(document).ready(function(e) {
	 var form1 = $('#updateuserdetails');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
			
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'first_name': {
                    required: 'Please Select Yourname',
                },
				 'user_phone': {
                    required: 'Please Enter Phone Number',
                },
				 'user_email': {
                    required: 'Please Select Email',
                },
				 
                
            },
            rules: {
                first_name: {
                    required: true
                },
				
				user_phone: {
                    required: true
                },
            
			  	user_email: {
                    required: true
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
					url : '<?php echo $base_url?>admin/user/update_userdata',
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
	 var form1 = $('#updateprpropertydetails');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
			
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'aptname': {
                    required: 'Please Select Apartment Name',
                },
				 'aptaddress': {
                    required: 'Please Enter Apartment Address',
                },

                
            },
            rules: {
                aptname: {
                    required: true
                },
				
				aptaddress: {
                    required: true
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
					url : '<?php echo $base_url?>admin/apartment/updateprpropertydetails',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						        var response = $.parseJSON(response);

									
						if(response.success == 'success')
						{

							//~ setTimeout(function(){// wait for 5 secs(2)
							// window.location.href ='<?php echo $base_url?>booking/active_request';
							
							//~ }, 2000); 
							
							toastr.options = {
									"closeButton": true,
							}
							toastr.success("Apartment Updated Successfully", "Notifications");	
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
									toastr.warning("Apartment Updated Unsuccessfully", "Notifications");	
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
	<link href="<?php echo $base_url;?>assets/listeo/css/plugins/datedropper.css" rel="stylesheet" type="text/css">
	<script src="<?php echo $base_url;?>assets/listeo/scripts/datedropper.js"></script>
	<script>$('#booking-date-cont').dateDropper();</script>
