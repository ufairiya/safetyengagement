<?php global $mobile_country_code,$country_array;?>

 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"></h4>Edit Property</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
	
        <?php if($getpropertydetails != FALSE){ ?>
        <form id="update_user" method="post">

            <div class="form-body ">

           <input type="hidden" name="property_id" id="property_id" value="<?php echo $getpropertydetails->ID;?>">
                                   

                <div class="form-group form-md-line-input">
				<label for="form_control_1">Property Name </label>
 <input type="text" class="form-control" name="property_name" id="property_name" value="<?php echo $getpropertydetails->property_name;?>">
                </div>

                <div class="form-group form-md-line-input">
                   <label for="form_control_1">Property Type</label>
                      <select class="form-control" name="property_type" id="property_type">
						  
                            <option value="apartment" <?php echo ($getpropertydetails->property_type == 'apartment') ? 'selected="selected"' : "";?>  >apartment</option>
<!--
                            <option value="house" <?php echo ($getpropertydetails->property_type == '	
house') ? 'selected="selected"' : "";?> >house</option>
-->
                        </select>
               
                </div>

                 <div class="form-group form-md-line-input">
                                        <label for="form_control_1">Property User Phone </label>
                    <input type="text" class="form-control property_phone" name="property_phone" id="property_phone" value="<?php echo $getpropertydetails->property_phone;?>">
                </div>  

<!--
                <div class="form-group form-md-line-input">
                                       <label for="form_control_1">Property Email</label>
                    <input type="text" class="form-control" name="useremail" id="useremail" value="<?php echo $getpropertydetails->user_email;?>">
                </div>
-->
                
					<div class="form-group form-md-line-input">
					<label for="form_control_1">Property Street</label>
					<input type="text" class="form-control" name="property_street" id="property_street" value="<?php echo $getpropertydetails->property_street;?>">
				</div>
                 
                <div class="form-group form-md-line-input">
					                    <label for="form_control_1">Property City</label>

                    <input type="text" class="form-control" name="property_city" id="property_city" value="<?php echo $getpropertydetails->property_city;?>">
                </div>
                           <div class="form-group form-md-line-input">
							                       <label for="form_control_1">Property State</label>

                    <input type="text" class="form-control" name="property_state" id="property_state" value="<?php echo $getpropertydetails->property_state;?>">
                </div>                         
                           <div class="form-group form-md-line-input">
							                       <label for="form_control_1">Property Postcode</label>

                    <input type="text" class="form-control" name="property_postcode" id="property_postcode" value="<?php echo $getpropertydetails->property_postcode;?>">
                </div>                         
                <div class="form-group form-md-line-input">
				   <label for="form_control_1">Property Landmark</label>
                    <input type="text" class="form-control" name="property_landmark" id="property_landmark" value="<?php echo $getpropertydetails->property_landmark;?>">
                </div>
                <div class="form-group form-md-line-input">
					                    <label for="form_control_1">Property Country</label>

                    <input type="text" class="form-control" name="property_country" id="property_country" value="<?php echo $getpropertydetails->property_country;?>">
                </div>
                                          
             
                <div class="form-group form-md-line-input">
					                        <label for="form_control_1">Property Status</label>

                        <select class="form-control" name="property_status" id="property_status">
                            <option value="active" <?php echo ($getpropertydetails->property_status == 'active') ? 'selected="selected"' : "";?>  >Active</option>
                            <option value="deactive" <?php echo ($getpropertydetails->property_status == 'deactive') ? 'selected="selected"' : "";?> >Deactive</option>
                        </select>
                </div>
  

            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
						    <div class="col-md-6">

    <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
                    <div class="col-md-6">
					     <button type="submit"  style="float:right" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                           </div>            
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
      </div>
    </div>
</div>

               
<script type="application/javascript">
(function($){
       var form1 = $('#update_user');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'property_name': {
                    required: 'Please Enter the property name',
                },
				 'property_type': {
                    required: 'Please Enter the property type',
                },
				 'property_phone': {
                    required: 'Please Enter the property user phone',
                },
				
				 'property_street': {
                    required: 'Please Enter the property street',
                },
				 'property_city': {
                    required: 'Please Enter the property city',
                },
				 'property_state': {
                    required: 'Please Enter the property state',
                },
				 'property_postcode': {
                    required: 'Please Enter the property postcode',
                },
				 'property_country': {
                    required: 'Please Enter the property country',
                },
				 'useremail': {
                    required: 'Please Enter the email',
					email: 'Please Enter valid email',
					
                },				
				 'user_type': {
                    required: 'Please Enter the user type',
                },
            
            },
            rules: {
                property_name: {
                    required: true
                },
				property_type: {
                    required: true
                },
				property_phone: {
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
				property_country: {
					required: true,					
				},
             	useremail: {
                    required: true,
					email:true,
					
                },
				
				user_type: {
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

            submitHandler: function(form,event) {
          //  event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>property/update_property',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Property Updated Succesfully", "Notifications");
					setTimeout(function(){// wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
					}, 5000); 		
						}
					});
            }
        });
})(jQuery);

</script>
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
