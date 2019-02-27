<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
           <div class="container">
			   <?php if($this->session->userdata('id_user_master')) { ?>
	<div class="row">
		<div >
		
			<!-- Titlebar -->
			<div >
				<?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
				<?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
				<?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
				<div class="listing-titlebar-title">
					<h2 class="headh2">Company Profile</h2>
				</div>
			</div>
		</div>
	
						 <form id="profile_update" method="post" class="ptpb-30">

		<div class="row"><!-- Profile -->
			 <!--//<div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
							<div class="dashboard-list-box margin-top-0">
<h4 class="gray">Profile Details</h4>
		</div></div>//-->
		<div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<div class="dashboard-list-box-static">
						<div class="edit-profile-photo" >
							

							<div class="emty_cls" id="uploaded_images">
								<?php if($user_information->profile_image != ""){ ?>
								<img src="<?php echo $base_url.'uploads/'.$user_information->profile_image; ?>">
								<?php } else { ?>
													
								<img src="<?php echo $base_url?>uploads/default17.jpg">
							<?php } ?>
						</div>
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input type="file" name="img_upload" accept="image/x-png,image/gif,image/jpeg" class="upload" id="imageUploadForm" />

								 <div ></div>

							</div>
						</div>
					</div>



					<!-- Details -->
					<div class="my-profile">

				<!-- Avatar -->
                                                <div class="">
                                                    <label class="control-label">Your Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                    <input type="hidden" class="form-control" name="img_link" id="img_link" value="<?php echo $user_information->profile_image; ?>" /> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Position with your company</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
                                              <div class="form-group">
                                                    <label class="control-label">Safety professional (optional) or company Personnel  </label>
												<div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Cell</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                    <label class="control-label">Your Company (if from the same company they are connected some how)</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
											 
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
												<div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Zip code</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Office Phone</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>

                                              
                                                <div class="form-group">
                                                 <div class="col-md-12" style="padding:0;">
                                                    <label class="control-label">Cell phone</label>
                                                    </div>

                                                   <div class="col-md-12" style="padding:0;">
                                                    <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $user_information->phone?>"/> </div>
                                                 </div>   <div style="clear:both"></div>
                                       
                                              
                                                 <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('email'); ?> address</label>
                                                   <input type="text" class="form-control" name="user_email" id="user_email" readonly value="<?php echo trim($user_information->email); ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label">Industry</label>
                                                    <input type="text"  class="form-control" name="last_name" id="last_name" value="<?php //echo $user_information->last_name?>"/> 
                                                </div>
                                                
                                               <input type="submit" class="btndesign button margin-top-15" value="Save Changes"> 

						</div>
					</div>
				
				</div>
			</div>
		</div>

		</div>
	</form>

<?php } ?>
</div>
            <!-- END CONTENT -->
                                   
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
		 messages: {              
              
				 'phone': {
                    required: 'Mobile No is required',
					 minlength: jQuery.validator.format("Invalid Mobile No"),
										
                },
				
				 'first_name': {
                    required: 'Username is required',
					
                },
				
				 'user_email': {
                    required: 'Email is required',
					email: 'Invalid Email',
					
                },
				 
			
        
	
         
            },
            rules: {
               			
				first_name: {
                    required: true,
				                },
				phone: {
                    required: true,
                    number: true,
                    minlength: 8,
                  
					
                },
				
				
             	user_email: {
                    required: true,
					email:true,
										
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
				url : '<?php echo $base_url?>login_controller/update',
				type: 'POST',
				data: jQuery(form).serialize(),
				success:function(response){
					 location.reload();
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("Profile have been successfully updated.");		
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
		 messages: {              
              
				 'current_password': {
                    required: 'Current Password is required',
										
                },
				
				 'new_password': {
                    required: 'New Password is required',
				 minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),					

                },
				
				 'confirm_password': {
                    required: 'Entry does not match with new password',
					equalTo: "Entry does not match with password",
					
                },
		         
            },
		rules: {
			current_password: {
				required: true,
			},
			
			new_password: {
				required: true,
				  minlength : 8
			},
		
			confirm_password: {
				required: true,
			    equalTo : "#new_password"
			},
			
		},

		highlight: function(element) { // hightlight error inputs
			$(element)
				//.closest('.form-group').addClass('has-error'); // set error class to the control group
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
				url : '<?php echo $base_url?>login_controller/changepassword',
				type: 'POST',
				data: jQuery(form).serialize(),
				success:function(response){
					//~ jQuery(form)[0].reset();
					toastr.options = {
						"closeButton": true,
					}
					if(response == 'current_fail')
					{
						//location.reload();
					 toastr.error("Current Password is Incorrect.");
					 return false;
					}					
					   //location.reload();
					 toastr.success("Password Updated Successfully");		
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
		url: '<?php echo $base_url?>login_controller/profile_image',
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
