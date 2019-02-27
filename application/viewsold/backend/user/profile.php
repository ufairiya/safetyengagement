<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
      	<div class="dashboard-content">

           <div class="">
			   <?php if(get_active_user_id()) { ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>My Profile</h2>
				</div>
			</div>
		</div>
	

		<!-- Profile -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Profile Details</h4>
				<div class="dashboard-list-box-static">
						<div class="edit-profile-photo" >
							

							<div class="emty_cls" id="uploaded_images">
								 <?php if($user_information->profile_image != ""){ ?>
								   <img src="<?php echo $base_url.'uploads/'.$user_information->profile_image; ?>">
								   <?php } else { ?>
								   <img src="<?php echo $base_url?>uploads/default22.jpg">
								<?php } ?>
								
						</div>
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input type="file" name="img_upload" class="upload" id="imageUploadForm" />

								 <div ></div>

							</div>
						</div>
					</div>
					
<!--
<div class="col-md-6" align="right">
  <label>Select Multiple Files</label>
 </div>
 <div class="col-md-6">
  <input type="file" name="files" id="files" multiple />
 </div>
 <div style="clear:both"></div>
 <br />
 <br />
 <div id="uploaded_images"></div>
-->

					<!-- Details -->
					<div class="my-profile">

						 <form id="profile_update" method="post">
				<!-- Avatar -->
                                                <div class="form-group">
                                                    <label class="control-label">Your Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                    <input type="hidden" class="form-control" name="img_link" id="img_link" value="<?php echo $user_information->profile_image; ?>" /> 
                                                </div>
<!--
                                                <div class="form-group">
                                                    <label class="control-label"><?php //echo $this->lang->line('last name'); ?></label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
-->
                                                <div class="form-group">
                                                 <div class="col-md-12" style="padding:0;">
                                                    <label class="control-label">Phone</label>
                                                    </div>
                                              

                                                   </div>
                                                   <div class="col-md-12" style="padding:0;">
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_information->phone?>"/> </div>
                                                    <div style="clear:both"></div>
                                               
                                                
<!--
                                                 <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('user name'); ?></label>
                                                    <div class="form-control">
                                                        <?php echo $user_information->username?>
                                                    </div>
                                                   
                                                </div>
-->
                                                
                                                 <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('email'); ?></label>
                                                
                                                   <input type="text" class="form-control" name="user_email" id="user_email" value=" <?php echo $user_information->email; ?>">
                                                   
                                                </div>
                                                					<input type="submit" class="btndesign button margin-top-15" value="Save Changes">

                                            </form>
					</div>


				</div>
			</div>
	
		</div>
	
		
		<!-- Change Password -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Change Password</h4>
				<div class="dashboard-list-box-static">

					<!-- Change Password -->
					<div class="my-profile">
					  <form id="change_password" method="post" enctype="multipart/form-data">
                                            
<!--
                                     <form method="post" id="changepassForm" name="changepassForm">
								<div class="form-group">
									<label>Old Password</label>
									<span id='oldpassword_response'></span> 
									<input  type="hidden"  name="user_id" id="user_id" class="col-md-12 form-control" value="<?php //echo $id_user_get; ?>">   
									<input  type="password"  name="oldpassword" id="oldpassword" class="col-md-12 form-control" >
								</div>
								<div class="form-group">
									<label >New Password</label>
									<input tabindex="1" size="40" type="password" class="col-md-12 form-control" name="password" id="password" value="" >
								</div>
								<div class="form-group"> <label >Confirm New Password</label>
									<input tabindex="1" size="40" class="col-md-12 form-control" type="password" name="confirmpassword" id="confirmpassword" value="" >
								</div>
								<span id='message'></span>
								<div class="modal-footer">
									<button type="button" class="btn default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn blue">Save changes</button>
								</div>
							</form>      
-->
                                            
                                            
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('Current Password'); ?></label>
                                                    <input type="password" class="form-control"  name="current_password" /> </div>
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('New Password'); ?></label>
                                                    <input type="password" class="form-control" id="new_password" name="new_password" /> </div>
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('Retype New Password'); ?></label>
                                                    <input type="password" class="form-control"  name="confirm_password"/> </div>
                                                 
                                      
						<button class="btndesign button margin-top-15">Change Password</button>
						      </form>
					</div>

				</div>
			</div>
		</div>
	
	</div>

<?php } ?>
</div>
            <!-- END CONTENT -->
                </div>                   
<!--
<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img src="<?php echo $base_url;?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
            <span> &nbsp;&nbsp;Loading... </span>
        </div>
    </div>
</div>
</div>
-->

<script type="application/javascript">
jQuery(document).ready(function(e) {
	 var form1 = $('#profile_update');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
            rules: {
                first_name: {
                    required: true
                },
				
				last_name: {
                    required: true
                },
            
			  	country_code: {
                    required: true
                },
            
			  	phone: {
                    required: true,
					digits:true
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
					//~ url : '<?php echo $base_url?>login_controller/update',
										url : '<?php echo $base_url?>admin/profile/update',

					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("User Updated Succesfully", "Notifications");		
					}
				});
            }
        });
		
		
		 var form2 = $('#change_password');
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
                    current_password: true,
                         remote: {
                    url: "<?php echo $base_url?>admin/profile/checkcurrentpassword",
                    type: "post"
                 }
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
					url : '<?php echo $base_url?>admin/profile/changepassword',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						if(response == 'current_fail')
						{
							toastr.error("Current Password Not valid", "Notifications");
							return false;
						}					
						
						toastr.success("Password  Updated Succesfully", "Notifications");		
					}
				});
            }
        });
	
	
          });
          
	
       //~ $("#imageUploadForm").change(function() {
		   //~ alert('hi');
         //~ var formData = new FormData();
         //~ var totalFiles = document.getElementById("imageUploadForm").files.length;
         //~ for (var i = 0; i < totalFiles; i++) {
           //~ var file = document.getElementById("imageUploadForm").files[i];
           //~ formData.append("imageUploadForm", file);
         //~ }
         //~ alert();
         //~ $.ajax({
           //~ type: "POST",
           //~ url: '<?php echo $base_url?>login_controller/profile_image',
           //~ data: formData,
           //~ dataType: 'json',
					//~ success:function(response){
			   //~ console.log(response);
             //    alert('succes!!');
             //},
             //error: function(error) {
             //    alert("errror");
             //}
         //~ }
         //~ .done(function() {
           //~ alert('success');
         //~ }).fail(function( xhr, status, errorThrown ) {
             //~ alert('fail');
           //~ });
        //~ });  });
//~ jQuery(document).on('click','#image_upload',function(){
		//~ jQuery.ajax({
					//~ url : 
					//~ type: 'POST',
					//~ data: jQuery('#upload_profile_image').serialize(),
					//~ success:function(response){
						//~ toastr.options = {
							//~ "closeButton": true,
						//~ }
						//~ toastr.success("Profile Image is Updated Succesfully", "Notifications");	
					//~ }
				//~ });
//~ });

$('#imageUploadForm').change(function(){
	   var file_data = $('#imageUploadForm').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
 
   $.ajax({
url: '<?php echo $base_url?>admin/profile/profile_image_update',
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
</script>

<!--

<script type="application/javascript">
jQuery(document).ready(function(e) {
	 var form1 = $('#profile_update');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
            rules: {
                first_name: {
                    required: true
                },
				
				last_name: {
                    required: true
                },
            
			  	country_code: {
                    required: true
                },
            
			  	phone: {
                    required: true,
					digits:true
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
					url : '<?php echo $base_url?>admin/profile/update',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("User Updated Succesfully", "Notifications");		
					}
				});
            }
        });
		
		
		 var form2 = $('#change_password');
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
					url : '<?php echo $base_url?>admin/profile/changepassword',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						if(response == 'current_fail')
						{
							toastr.error("Current Password Not valid", "Notifications");
							return false;
						}					
						
						toastr.success("Password  Updated Succesfully", "Notifications");		
					}
				});
            }
        });
	
});
jQuery(document).on('click','#image_upload',function(){
		jQuery.ajax({
					url : '<?php echo $base_url?>admin/profile/profile_image_update',
					type: 'POST',
					data: jQuery('#upload_profile_image').serialize(),
					success:function(response){
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Profile Image is Updated Succesfully", "Notifications");	
					}
				});
});
</script>
-->
