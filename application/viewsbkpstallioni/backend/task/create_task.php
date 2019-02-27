      	<div class="dashboard-content">
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<?php if(!empty($this->session->flashdata('msg'))) {echo $this->session->flashdata('success');} ?> 
					<h2>Book an Appointment</h2>
				</div>
			</div>
		</div>
		<div class="form" >
<form method="post" name ="book_appointment" id="book_appointment" >		<!-- Profile -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Task Details</h4>
				<div class="dashboard-list-box-static">
					<!-- Avatar -->
					<div class="edit-profile-photo" >
							<?php foreach($get_apartment as $get_apartment_detail )
							{ 
								//$get_apartment_detail->image_path
								
								 } ?>
							

							<div class="emty_cls" id="uploaded_images">
								<?php //if($user_information->profile_image != ""){ ?>
<!--
								<img src="<?php //echo $user_information->profile_image; ?>">
-->
								<?php //} else { ?>
													
								<img src="<?php echo $base_url?>uploads/default17.jpg">
							<?php //} ?>
						</div>
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input type="file" name="img_upload" class="upload" id="imagebookUploadForm" />

								 <div ></div>

							</div>
						</div>
					</div>
					
					<!-- Details -->
					<div class="my-profile">

						<label>Service Category</label>
					<input type="hidden" name="img_link" class="upload" id="img_link" />

						<select class="chosen-select-no-single" name="service_book" id="service_book"  >
														<option value="">Select Service</option>	

									<?php 
		foreach($get_task  as  $get_task_val){ ?>
							<option value="<?php echo $get_task_val->taskcategory_name; ?>"><?php echo $get_task_val->taskcategory_name; ?></option>
<!--
							<option>Electrical</option>
							<option>Plumbing</option>
							<option>House Cleaning</option>
							<option>Mover</option>
							<option>House Painting</option>
-->	<?php } ?>
						</select>
					
						<label>Description</label>
						<textarea name="description" cols="30" rows="4"></textarea>
					</div>

					<!--<button class="button margin-top-15">Save Changes</button>-->

				</div>
			</div>
		</div>
		
		<!-- Change Password -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Appointment Details</h4>
				<div class="dashboard-list-box-static">

					<!-- Change Password -->
					<div class="my-profile">
						<label>Apartment</label>
						<select class="chosen-select-no-single"  name="property_book" id="property_book">
														<option value="">Select Apartment</option>	

							<?php foreach($get_apartment as $get_apartment_detail )
							{ ?>
							<option><?php echo $get_apartment_detail->property_name; ?></option>	
							<?php } ?>			
						</select>
						
						<div class="row with-forms  margin-top-30">

							<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
							<div class="col-lg-6 col-md-12">
								<input type="text" name="booking_date" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017">
							</div>

							<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
							<div class="col-lg-6 col-md-12">
								<input type="text" name="booking_time" id="booking-time" value="9:00 am">
							</div>
						</div>
							<input type="submit" class="button book-now fullwidth margin-top-5" value="Book Now">
						<!-- progress button animation handled via custom.js -->
					</div>

				</div>
			</div>
		
		

		</div>          			


</form>
	</div>
	</div>
</div></div>
<script type="application/javascript">

         //~ $("#imageUploadForm").change(function() {
		   //~ alert('hi');
         //~ var formData = new FormData();
         //~ var totalFiles = document.getElementById("imageUploadForm").files.length;
         //~ for (var i = 0; i < totalFiles; i++) {
           //~ var file = document.getElementById("imageUploadForm").files[i];
           //~ formData.append("imageUploadForm", file);
         //~ }
         //~ $.ajax({
           //~ type: "POST",
           //~ url: '<?php echo $base_url?>task/task_image',
           //~ data: formData,
           //~ dataType: 'json',
					//~ success:function(response){
			   //~ console.log(response);
            
         //~ }
        
        //~ });  });
      
      
      
        
       

$('#imagebookUploadForm').change(function(){
	
	   var file_data = $('#imagebookUploadForm').prop('files')[0];
	  
                    var form_data = new FormData();
                    form_data.append('file', file_data);
 
   $.ajax({
url: '<?php echo $base_url?>task/task_image',
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
     
     $('#img_link').val('<?php echo $base_url?>uploads/'+data);
     $('#files').val('');
    }
   })
  
 });
 
 jQuery(document).ready(function(e) {
	 var form1 = $('#book_appointment');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
			
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
            rules: {
                service_book: {
                    required: true
                },
				
				booking_date: {
                    required: true
                },
            
			  	booking_time: {
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
					url : '<?php echo $base_url?>booking/book_appointment',
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
        
        });
        
        </script>
