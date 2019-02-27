<?php global $mobile_country_code,$singapour_country;?>

		<div class="container">
		<div class="row">
             <div class="tab-pane active">
                <div class="portlet box">
                    
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form id="add_new_property" class="horizontal-form" method="post">
                     
                            <div class="form-body">
                                <h3 class="form-section">Add Property Information</h3>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo 'Property Name'; ?></label>
                                             <input type="text" class="form-control" name="property_name" id="property_name">           
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="form_control_1"><?php echo 'property type'; ?></label>
                                        <select name="property_type" class="form-control" id="property_type">
                                            <option value="apartment">Apartments</option> 
<!--
                                            <option value="house">house</option>                                          
-->
                                       </select>
                                       
										</div>                                  
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                             
                                <div class="row">
									<div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>landmark</label>
                                            <input type="text" class="form-control" name="property_landmark" id="property_landmark"> 
                                         </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" class="form-control" name="property_street" id="property_street"> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="property_city" id="property_city"> 
                                        </div>
                                    </div>                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="property_state" id="property_state"> 
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" class="form-control" name="property_postcode" id="property_postcode"> 
                                         </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>                                                                                     
												<select name="property_country" class="form-control" id="property_country">
												<option value=""></option>
												<option value="singapour">singapour</option>
												</select>                                      
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                    
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Property Phone Number</label>
											<input type="text" class="form-control" name="property_phone" id="property_phone"> 
										</div>
									</div>
									<!--/span-->
									<div class="col-md-6">
									   <div class="form-group">
											<label>Property Status</label>
											<select name="property_status" class="form-control" id="property_status">
												<option value=""></option>
												<option value="active">active</option>
												<option value="deactive">deactive</option>
											</select>
											<?php
											$user_type = $this->session->user_type;
											if($user_type == 'superuser')
											{
												$email = $this->session->user_email;
											}
											elseif($user_type == 'application_user')
											{
												$email = $this->session->email;
											}
											?>
											<input type="hidden" name="user_email" value="<?php echo $email; ?>"> 
										</div>
									</div>
									<!--/span-->
								</div>
									
                                
								<div class="form-actions right">
									<button type="button" id="cancel" class="button border with-icon">Cancel</button>
									<button type="submit" class="btn button">
									 <i class="fa fa-check"></i> Save</button>
								</div>
                            
							</div>
							
                        </form>                         
                        
                        <!-- END FORM-->
                    </div>
                
                </div>                                          
             </div>          
        
        </div>
        </div>  
        
      
<script type="text/javascript" src="<?php echo site_url(); ?>assets/listeo/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery.validate.min.js"></script>    
<script src="<?php echo site_url(); ?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>      
<script type="application/javascript">
jQuery(document).ready(function(e) 
{
	var form1 = $('#add_new_property');
	var error1 = $('.alert-danger', form1);
	var success1 = $('.alert-success', form1);

	form1.validate
	({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "", // validate all fields including form hidden input
		messages: {  
			 'property_name': {
                    required: 'Please Enter the property name',
					remote : "property name already taken"
                },            			
			//property_name:'Please Enter the  property name',
			property_type:'Please Enter the property type',	
			property_landmark: 'Please Enter phone Number',
			property_street: 'Please Enter Address',
			property_city: 'Please Enter City',
			property_state: 'Please Enter State',
			property_postcode: 'Please Enter Zip Code',
			property_country: 'Please Enter the Country',
			property_phone: 'Please Enter the Phone Number',
			property_status : 'Please Enter the Property Status',
		},
		rules: {
			property_name: {
				required: true,
				remote: {
					url: "<?php echo $base_url; ?>Property/unquie_property",
					type: "post",
					data: {
						type:'propertyname',
						username: function() {
							return $( "#property_name" ).val();
							}
						}
					}
			},
			
			property_type: {
				required: true,						
			},
			property_landmark: {
				required: true,					
			},         
			property_street: {
			   required: true,
			},               
			property_city: {
				 required: true,
			},
			property_state: {
				required: true,
			},
			property_postcode: {
				required: true,
			},
			property_country:{
				required: true,
			},
			property_phone:{
				required: true,
			},
			property_status:{
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

		submitHandler: function(form) {
		//event.preventDefault();
		
			jQuery.ajax({
				url : '<?php echo $base_url?>property/add_new_property',
				type: 'POST',
				data: jQuery(form).serialize(),
				success:function(response){ 
					alert('successfully created');           
					jQuery(form)[0].reset();
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("New user Create Succesfully", "Notifications");		
					setTimeout(function(){// wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
					}, 5000); 
				}
			});
		}
	});
});

$("#cancel").click(function () {
   $('#add_new_property')[0].reset();
   
});
 
</script> 
