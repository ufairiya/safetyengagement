<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
           <div class="container">
			   <?php if($this->session->userdata('id_user_master')) { ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">
		
			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
				<?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
				<?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
				<div class="listing-titlebar-title">
					<h2>Safety Professional Profile</h2>
				</div>
			</div>
		</div>
	
						 <form id="profile_update" method="post" class="ptpb-30">

		<div class="row"><!-- Profile -->
			 <div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
							<div class="dashboard-list-box margin-top-0">
<h4 class="gray">Profile Details</h4>
		</div></div>
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
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
                                                    <label class="control-label">Your Company</label>
                                                    <input type="text"  class="form-control" name="companyname" id="companyname" value="<?php echo $user_information->companyname?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text"   class="form-control" name="address" id="address" value="<?php echo $user_information->address?>"/> 
                                                </div>

                                               <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control" name="city" id="city" value="<?php echo $user_information->city?>"/> 
                                                </div>

                                          
					</div>


				</div>
			</div>
	
		</div>
	
		
		<!-- Change Password -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<div class="dashboard-list-box-static">

					<!-- Change Password -->
					<div class="my-profile">
											

                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text" class="form-control" name="state" id="state" value="<?php echo $user_information->state?>"/> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Zip code</label>
                                                    <input type="text"  class="form-control" name="zipcode" id="zipcode" value="<?php echo $user_information->zip_code?>"/> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Office Phone</label>
                                                    <input type="text"  class="form-control" name="officephone" id="officephone" value="<?php echo $user_information->officephone?>"/> 
                                                </div>
												<div class="form-group">
                                                 <div class="col-md-12" style="padding:0;">
                                                    <label class="control-label">Cell phone</label>
                                                    </div>

                                                   <div class="col-md-12" style="padding:0;">
                                                    <input type="tel" class="form-control" name="cellphone" id="cellphone" value="<?php echo $user_information->phone?>"/> </div>
                                                 </div>   <div style="clear:both"></div>
                                       
                                              
                                                 <div class="form-group">
                                                    <label class="control-label"><?php echo $this->lang->line('email'); ?> address</label>
                                                
                                                   <input type="text" class="form-control" name="user_email" id="user_email" readonly value="<?php echo trim($user_information->email); ?>">
                                                   
                                                </div>
											</div>
										</div></div>
									</div>
								</div>
								<div class="row">
									 <div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
										<div class="dashboard-list-box margin-top-0">
											<h4 class="gray">Other Details</h4>
										</div>
									</div>
									<!-- Profile -->
									<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
										<div class="dashboard-list-box margin-top-0">
															<div class="dashboard-list-box-static">

											<!-- Details -->
											<div class="my-profile">
											<!-- Avatar -->
											<div class="form-group lengcolgrafr">
                                                    <label class="control-label">College attended but not graduated from (optional)</label>
                                                    <input type="text" class="form-control" name="clg_notgrfr" id="clg_notgrfr" value="<?php echo $user_information->clg_notgrfr?>" /> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">College you graduated from (optional)</label>
                                                    <input type="text" class="form-control" name="clg_grfr" id="clg_grfr" value="<?php echo $user_information->clg_grfr?>" /> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">College degree/major (optional)</label>
                                                    <input type="text" class="form-control" name="clgdegmaj" id="clgdegmaj" value="<?php echo $user_information->clgdegmaj?>" /> 
                                                </div>
                                                <div class="form-group"><?php echo $user_information->insyprocontrapp; ?>
													   <div class=" in-row margin-bottom-20">
	
                                                    <label class="control-label">Industries you can offer services </label>
                                                    	</div>
                                                <div class="col-lg-6 col-md-12 checkboxes float-left in-row margin-bottom-20">
							<p><input type="hidden"  name="induoffsertext[]"  value="general" />
						
								<input id="check1" type="checkbox"  name="induoffser[]"  value="1" />
							<label for="check1">general</label> </p>
		
						
					</div>
                                                <div class="col-lg-6 col-md-12 checkboxes float-left in-row margin-bottom-20">
							
								  <p>									  <input type="hidden"  name="induoffsertext[]"  value="construction" />
<input id="check2" type="checkbox"  name="induoffser[]" value="2" />
						
							<label for="check2">construction</label>	  </p>
					
						
					</div>
                                                <div class="col-lg-6 col-md-12 checkboxes float-left in-row margin-bottom-20">
							<input type="hidden"  name="induoffsertext[]"  value="utilities" />
							<input id="check3" type="checkbox"  name="induoffser[]"  value="3" />
						
							<label for="check3">utilities</label>
					
						
					</div>
                                                <div class="col-lg-6 col-md-12 checkboxes float-left in-row margin-bottom-20">
							<input type="hidden"  name="induoffsertext[]"  value="marine" />
							<input id="check4" type="checkbox"  name="induoffser[]"  value="4" />
						
							<label for="check4">marine</label>
					
						
					</div>
                                                <div class="col-lg-6 col-md-12 checkboxes float-left in-row margin-bottom-20">
							<input type="hidden"  name="induoffsertext[]"  value="agriculture" />
							<input id="check5" type="checkbox"  name="induoffser[]" value="5" />
						
							<label for="check5">agriculture</label>
					
						
					</div>
                                                <div class="clear col-md-12">
							
								<a href="javascript:void(0);" class="add_buttonindustr cus" title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i><span> other specialty industries</span></a>
					
						
					</div>
              
                              <div class="col-md-12 field_wrapper checkboxes float-left in-row margin-bottom-20">
<h5 class="control-label"><strong>Add New Services </strong></h5>			<div class="add_remov">
<!--
					<div class="checkboxes float-left in-row margin-bottom-20">
							
						<input id="check7" type="checkbox" name="induoffser[]"><label for="check7"><input type="text" name="induoffsertext[]"  value=""  class="erradd_0 col-md-12 add_field" /></label>
					
						
					</div>
-->
<!--
							<a href="javascript:void(0);" class="add_button cus" title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i></a>
-->
								

						</div>			
			</div>		</div>	                
                                       

                                            
					</div>
    </div> </div>

				</div>
		
	
	
	
		
		<!-- Change Password -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<div class="dashboard-list-box-static">

					<!-- Change Password -->
					<div class="my-profile">
                                                         <div class="form-group">
													   <div class=" in-row margin-bottom-20">
	
                                                    <label class="control-label">Services you can provide </label>
                                                    	</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							<input type="hidden"  name="serprotxt[]"  value="training" />
							<input id="checksp1" type="checkbox"  name="serpro[]"  value="1" />
							<label for="checksp1">training</label>
					
						
					</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							
							<input type="hidden"  name="serprotxt[]"  value="IH" /><input id="checksp2" type="checkbox"  name="serpro[]" value="2" />
						
							<label for="checksp2">IH</label>
					
						
					</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							<input type="hidden"  name="serprotxt[]"  value="clean-up" />
						
							<input id="checksp3" type="checkbox"  name="serpro[]" value="3" />
							<label for="checksp3">clean-up</label>
					
						
					</div>
<!--
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							
							<input id="checksp4" type="checkbox"  name="serpro[]"   />
						
							<label for="checksp4">other</label>
					
						
					</div>
-->
					          <div class="clear col-md-12">
							
								<a href="javascript:void(0);" class="add_buttonserpro cus" title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i><span> other</span></a>
					
						
					</div>
                           <div class="col-md-12 field_wrapperserpro checkboxes float-left in-row margin-bottom-20">
<h5 class="control-label"><strong>Add New Services </strong></h5>			<div class="add_removserpro">
						

						</div>			
			</div>		</div>	                
                                       

                           
          
                                                
                                                
                                              
                                              
                                  
                                               
                                                <div class="form-group">
                                                    <label class="control-label">Safety Certificates and documents uploaded</label>
                                                                  
							<div class="photoUpload">


		<div class="edit-profile-photo" >

						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input type="file"  name="safdocimg_upload[]"  class="upload" id="safdocimg_upload" multiple="multiple" />
								<input type="hidden"  name="safdocimg_uploadimg_link"  class="safdocimg_uploadimg_link" value="" />

								

							</div>
						</div>
					</div> <div class="safdocimg_uploadimg_linktxt"></div>


							</div>
						</div>
                                               
                                                <div class="form-group">
                                                    <label class="control-label">Should be able to upload prints, pictures, other documents are requested by the company</label>
                                                <div class="edit-profile-photo" >
							

<!--
							<div class="emty_cls" id="uploaded_images">
								
						</div>
-->
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input type="file" name="pripicdocimg_upload[]"    class="upload" id="pripicdocimg_upload"  multiple="multiple" />
								<input type="hidden"  name="pripicdocimg_upload_link"  class="pripicdocimg_upload_link" value="" />

								

							</div>
						</div>
					</div> <div class="pripicdocimglinktxt" ></div>

  </div>
                                                  
                                                         <div class="form-group">
													   <div class=" in-row margin-bottom-20">
	
                                                    <label class="control-label">Insurance Proof Contractor approvals </label>
                                                    	</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							<input id="checkipc1" type="checkbox"  name="insyprocontrapp[]"  value="Avetta" />
							<label for="checkipc1">Avetta</label>
					
						
					</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							
							<input id="checkipc2" type="checkbox"  name="insyprocontrapp[]"  value="ISNetworld" />
						
							<label for="checkipc2">ISNetworld</label>
					
						
					</div>
                                                <div class="checkboxes float-left in-row margin-bottom-20">
							
							<input id="checkipc3" type="checkbox"  name="insyprocontrapp[]"   value="Brown" />
						
							<label for="checkipc3">Brown</label>
					
						
					</div>
                                         
               
          
                                                
                                                
                                                </div>
                                              
                               </div>     </div>             
                                     
<!--
                                                <div class="form-group">
                                                    <label class="control-label">Bid on jobs</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                </div>
-->
<!--
                                                <div class="form-group">
                                                    <label class="control-label">Track bidded jobs</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                </div>
-->
<!--
                                                <div class="form-group">
                                                    <label class="control-label">Track how many were awarded</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                </div>
-->
<!--
                                                <div class="form-group">
                                                    <label class="control-label">Set-up payment for each job bid ($5.00 each)</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                </div>
-->
<!--
                                                <div class="form-group">
                                                    <label class="control-label">Instant message to be able to communicate with the company</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                                </div>
-->
						    
					</div>

				
			</div>
		</div>

                                                         					<input type="submit" class="btndesign button margin-top-15" value="Save Changes">
  </form>

	
	</div>

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
					// location.reload();
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

$('#safdocimg_upload').change(function(){

  var files = $('#safdocimg_upload')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['csv','docx','pdf','doc','zip']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
	$.ajax({
		url: '<?php echo $base_url?>login_controller/multiuplod',
		method:"POST",
		data:form_data,
		contentType:false,
		cache:false,
		processData:false,
		beforeSend:function()
		{
			$('#safdocimg_uploaduplimg').html("<label class='text-success'>Uploading...</label>");
		},
		success:function(data)
		{
			var objdata = jQuery.parseJSON(data);
			// $('.emty_cls').empty('');
		//	$('#safdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
			$('.safdocimg_uploadimg_linktxt').empty();
			$('.safdocimg_uploadimg_link').val();
		var objdataimp = objdata.join();
			$('.safdocimg_uploadimg_link').val(objdataimp);
			$.each( objdata, function( key, value ) {
					 $('.safdocimg_uploadimg_linktxt').append('<a target="_blank"  href="<?php echo $base_url; ?>uploads/'+value+'"><img style="border: 2px solid #000;margin:5px;width: 70px;padding: 5px; height: 70px;" src="<?php echo $base_url; ?>uploads/document-management-big.png"></a>');

			});
		}
	})
  }else
  {
	  $('.safdocimg_uploadimg_linktxt').empty();
 $('.safdocimg_uploadimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
 	 setTimeout(function(){   $('.safdocimg_uploadimg_linktxt').empty();}, 3000);

	 }
 });
$('#pripicdocimg_upload').change(function(){

  var files = $('#pripicdocimg_upload')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("files[]", files[count]);
   }
  }
  if(error == '')
  {
	$.ajax({
		url: '<?php echo $base_url?>login_controller/multiuplodall',
		method:"POST",
		data:form_data,
		contentType:false,
		cache:false,
		processData:false,
		beforeSend:function()
		{
			$('#safdocimg_uploaduplimg').html("<label class='text-success'>Uploading...</label>");
		},
		success:function(data)
		{
			var objdata = jQuery.parseJSON(data);
			// $('.emty_cls').empty('');
		//	$('#safdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
			$('.pripicdocimglinktxt').empty();
			$('.pripicdocimg_upload_link').val(' ');
		var objdataimp = objdata.join();
			$('.pripicdocimg_upload_link').val(objdataimp);
			$.each( objdata, function( key, value ) {
					 $('.pripicdocimglinktxt').append('<a target="_blank"  href="<?php echo $base_url; ?>uploads/'+value+'"><img style="border: 2px solid #000;margin: 5px; width: 70px; padding: 5px;height: 70px;" src="<?php echo $base_url; ?>uploads/'+value+'"></a>');

			});
		}
	})
  }else
  {
	  $('.pripicdocimglinktxt').empty();
 $('.pripicdocimglinktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
 	 setTimeout(function(){   $('.pripicdocimglinktxt').empty();}, 3000);

	 }
 });

//~ $('#pripicdocimg_upload').change(function(){
	//~ var file_data = $('#pripicdocimg_upload').prop('files')[0];
	//~ var form_data = new FormData();
	//~ form_data.append('file', file_data);
	//~ $.ajax({
		//~ url: '<?php echo $base_url?>login_controller/multiuplod',
		//~ method:"POST",
		//~ data:form_data,
		//~ contentType:false,
		//~ cache:false,
		//~ processData:false,
		//~ beforeSend:function()
		//~ {
			//~ $('#pripicdocimg_uploaduploaded_images').html("<label class='text-success'>Uploading...</label>");
		//~ },
		//~ success:function(data)
		//~ {
			//~ // $('.emty_cls').empty('');
			//~ $('#pripicdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
			//~ $('#pripicdocimg_uplimglink').val(data);
			//~ $('#pripicdocimg_uplfiles').val('');
		//~ }
	//~ })
  
 //~ });
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonindustr'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
 //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){
				   var lengval = $('input[name="induoffser[]"]').length;
    var inclengval = lengval+1;
    var fieldHTML = '<div class="add_remov"><div class="checkboxes float-left in-row margin-bottom-20"><input id="check'+inclengval+'" type="checkbox" name="induoffser[]" value="'+inclengval+'"><label for="check'+inclengval+'"><input type="text" name="induoffsertext[]"  value=""  class="erradd_0 col-md-12 add_field" /></label></div><a href="javascript:void(0);" class="remove_button" title="Add field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></div>'; 

		
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div.add_remov').remove(); //Remove field html
        x--; //Decrement field counter
    });
   
   
   
   
    var maxFieldserpro = 10; //Input fields increment limitation
    var addButtonserpro = $('.add_buttonserpro'); //Add button selector
    var wrapperserpro = $('.field_wrapperserpro'); //Input field wrapper
 //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButtonserpro).click(function(){
				   var lengvalserpro = $('input[name="serpro[]"]').length;
    var inclengvalserpro = lengvalserpro+1;
    var fieldHTMLserpro = '<div class="add_removserpro"><div class="checkboxes float-left in-row margin-bottom-20"><input id="check'+inclengvalserpro+'" type="checkbox" name="serpro[]" value="'+inclengvalserpro+'"><label for="check'+inclengvalserpro+'"><input type="text" name="serprotext[]"  value=""  class="erradd_0 col-md-12 add_field" /></label></div><a href="javascript:void(0);" class="remove_buttonserpro" title="Add field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></div>'; 

		
        if(x < maxFieldserpro){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapperserpro).append(fieldHTMLserpro); // Add field html
        }
    });
     $(wrapperserpro).on('click', '.remove_buttonserpro', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div.add_removserpro').remove(); //Remove field html
        x--; //Decrement field counter
    });
   
   
    
    
});  
</script>
		
