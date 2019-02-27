<style>
.button.book-now.fullwidth.margin-top-5
{
    
    height:50px;
}
#booking-date
{
    width:100%;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					
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
<?php					//var_dump($this->session->userdata()); ?>
					<div class="edit-profile-photo img_error" >
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
								<img src="<?php echo $base_url?>uploads/default-image.jpg">
							<?php //} ?>
						</div>
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>

								<input  type="file" accept="image/x-png,image/gif,image/jpeg"  name="img_upload" class="upload" id="imagebookUploadForm" />

								 <div ></div>

							</div>
						</div>
					</div>
					
					<!-- Details -->
					<div class="my-profile">

						<label>Service Category</label>
						<input type="hidden" name="img_link" class="upload" id="img_link" />
					<div class=" ">
						
							<select class="chosen-select-no-single" name="service_book" id="service_book" >
								<option value="">Select Service</option>	
								<?php 
								foreach($get_task  as  $get_task_val){ ?>
								<option  <?php if($this->session->userdata('cat_nameserviepg') == $get_task_val->id){ echo 'selected';} ?> <?php if($this->session->userdata('cat_name') == $get_task_val->id){ echo 'selected';} ?> data-short-code="<?php echo $get_task_val->taskcatshort_code; ?>"data-maxappointment="<?php echo $get_task_val->max_appointment; ?>"    data-cateid="<?php echo $get_task_val->id; ?>" value="<?php echo $get_task_val->taskcategory_name; ?>"><?php echo $get_task_val->taskcategory_name; ?></option>
								<?php } ?>
							</select>
						
					</div>
					<input type="hidden" class="short_code" name="short_code" value="">
					<input type="hidden" class="cateid" name="cateid" value="">
					<input type="hidden" class="maxappointment" name="maxappointment" value="">

						<label>Description</label>
						<textarea name="description" cols="30" rows="4"><?php if($this->session->userdata('txt_descr') != ''){ echo $this->session->userdata('txt_descr'); } ?></textarea>
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
						<div class=" ">
						<select class="chosen-select-no-single"  name="property_book" id="property_book">
							<option value="">Select Apartment</option>	

							<?php foreach($get_apartment as $get_apartment_detail )
							  { ?>
							<option <?php if($this->session->userdata('apt_name') == $get_apartment_detail->ID){ echo 'selected';} ?> data-pid="<?php echo $get_apartment_detail->ID; ?>"><?php echo $get_apartment_detail->property_name; ?></option>	
						  <?php } ?>			
						</select></div>
						<input type="hidden" class="property_id" name="property_id" value="">
<!--
						<?php 
														foreach($get_task  as  $get_task_val){
															
														}
						  ?>
-->
						<div class="clear"></div>
						<div class="row with-forms  margin-top-30">

							<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
							<div class="col-lg-6 col-md-12">
								<input type="text" data-disabled-days="<?php //echo $daydata; ?>" data-lock="from"  name="booking_date" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2080" >
								
								
									
							</div>

							<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
							<div class="col-lg-6 col-md-12">
								<select class="chosen-select-no-single"  name="booking_time" id="booking-time">
								 <option data-timeformat="" value="">Select Session</option>

<!--
                                 <option data-timeformat="8 AM - 12 PM" value="morning">8 AM - 12 PM</option>
                                 <option data-timeformat="12 PM - 4 PM" value="afternoon" >12 PM - 4 PM</option>
                                 <option data-timeformat="4 PM - 8 PM" value="evening">4 PM - 8 PM </option>
-->
<!--

                                 <option value="morning">Morning</option>
                                 <option value="afternoon" >Afternoon</option>
                                 <option value="evening">Evening</option>
-->
							</select>

							
							</div>
						</div>
						<div class="clear"></div>
							<input type="submit" class="button book-now fullwidth margin-top-20" value="Book Now">
						<!-- progress button animation handled via custom.js -->
					</div>

				</div>
			</div>
		
		

		</div>          			


</form>
	</div>
	</div>
</div>
<style>

.selectdiv {
  position: relative;
  /*Don't really need this just for demo styling*/
  

}

.selectdiv:after {
    content: "\f107";
    font: normal normal normal 17px/1 FontAwesome;
    color: silver;
    right: 24px;
    top: 6px;
    height: 34px;
    padding: 15px 0px 0px 8px;

  //  border-left: 1px solid #dbdbdb;

    position: absolute;
    pointer-events: none;
}

/* IE11 hide native button (thanks Matt!) */
select::-ms-expand {
display: none;
}
 .selectdiv label{   margin-top: 0;
        margin-bottom: 0;
        width:100%;
	}
.selectdiv select {
	    border-radius: 4px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  /* Add some styling */
      font-weight: 500;
  display: block;
  width: 100%;
  //max-width: 320px;
  height: 50px;
  float: right;
  margin: 5px 0px;
  padding: 0px 24px;
  font-size: 16px;
      font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
  line-height: 1.75;
  color: #888;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #dbdbdb;
  -ms-word-break: normal;
  word-break: normal;
}
</style>
<script type="application/javascript">

	jQuery(document).ready(function(e) 
	{ 

		var selectedText = $('#service_book').find("option:selected").attr('data-short-code');
		$('.short_code').val( selectedText );
		var cateid = $('#service_book').find("option:selected").attr('data-cateid');
		$('.cateid').val( cateid );
		var maxappointment = $(this).find("option:selected").attr('data-maxappointment');
		$('.maxappointment').val( maxappointment );
	var bookdate = $('#booking-date').val();
		//~ $('#booking-date').val("");
		var selectedText = $(this).find("option:selected").attr('data-short-code');
		$('.short_code').val( selectedText );
		var maxappointment = $(this).find("option:selected").attr('data-maxappointment');
		$('.maxappointment').val( maxappointment );
		var cateid = $(this).find("option:selected").attr('data-cateid');
		$('.cateid').val( cateid );


	jQuery.ajax({
		url : '<?php echo $base_url?>booking/get_booksessdatahide',
		type: 'POST',
		data:{ cateid : cateid,bookdate : bookdate },
		success:function(response){
			var sessdata = JSON.parse(response);
			var splitsessdata =  sessdata.sessdataall.join();
			var arraysessdata = splitsessdata.split(",");
			var appendsessdata= sessdata.append_data;
			var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })
			$('#booking-time').empty();
			$.each(appendsessdata, function(key, value) {
				$('#booking-time')
				.append($("<option data-timeformat='"+value+"' value='"+key+"'></option>")
				.attr("value",key)
				.text(value)); 
			});
			var optionValues = [];
			$('#booking-time option').each(function() {
				optionValues.push($(this).val());
			});
			$("#booking-time").find('option').attr('disabled', false).trigger("chosen:updated")
			function capitalize_Words(str)
			{
				return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
			}
			for(i=0;i<optionValues.length;i++)
			{
				var optionValuesval = optionValues[i];
				if(arraysessdata[i] == optionValuesval)
				{												
					$("#booking-time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
				}
				$("#booking-time").trigger("chosen:updated");

			}


		}
	});
	$("#service_book").change(function () 
	{
		var bookdate = $('#booking-date').val();
		//~ $('#booking-date').val("");
		var selectedText = $(this).find("option:selected").attr('data-short-code');
		$('.short_code').val( selectedText );
		var maxappointment = $(this).find("option:selected").attr('data-maxappointment');
		$('.maxappointment').val( maxappointment );
		var cateid = $(this).find("option:selected").attr('data-cateid');
		$('.cateid').val( cateid );


	jQuery.ajax({
		url : '<?php echo $base_url?>booking/get_booksessdatahide',
		type: 'POST',
		data:{ cateid : cateid,bookdate : bookdate },
		success:function(response){
			var sessdata = JSON.parse(response);
			var splitsessdata =  sessdata.sessdataall.join();
			var arraysessdata = splitsessdata.split(",");
			var appendsessdata= sessdata.append_data;
			var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })
			$('#booking-time').empty();
			$.each(appendsessdata, function(key, value) {
				$('#booking-time')
				.append($("<option data-timeformat='"+value+"' value='"+key+"'></option>")
				.attr("value",key)
				.text(value)); 
			});
			var optionValues = [];
			$('#booking-time option').each(function() {
				optionValues.push($(this).val());
			});
			$("#booking-time").find('option').attr('disabled', false).trigger("chosen:updated")
			function capitalize_Words(str)
			{
				return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
			}
			for(i=0;i<optionValues.length;i++)
			{
				var optionValuesval = optionValues[i];
				if(arraysessdata[i] == optionValuesval)
				{												
					$("#booking-time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
				}
				$("#booking-time").trigger("chosen:updated");

			}


		}
	});
	});



	$("#booking-date").change(function () 
	{

	var bookdate = $('#booking-date').val();


	var cateid = $('#service_book').find("option:selected").attr('data-cateid');



	jQuery.ajax({
	url : '<?php echo $base_url?>booking/get_booksessdatahide',
	type: 'POST',
	data:{ cateid : cateid,bookdate : bookdate },
	success:function(response){
	var sessdata = JSON.parse(response);
	var splitsessdata =  sessdata.sessdataall.join();
	var arraysessdata = splitsessdata.split(",");
	var appendsessdata= sessdata.append_data;
	console.log(appendsessdata);
	var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })

	$('#booking-time').empty();
	$.each(appendsessdata, function(key, value) {

	//~ alert(value);   
	$('#booking-time')
	.append($("<option data-timeformat='"+value+"' value='"+key+"'></option>")
	.attr("value",key)
	.text(value)); 
	});
	var optionValues = [];


	$('#booking-time option').each(function() {
	optionValues.push($(this).val());
	});

	$("#booking-time").find('option').attr('disabled', false).trigger("chosen:updated")
	function capitalize_Words(str)
	{
	return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
	for(i=0;i<optionValues.length;i++)
	{

	var optionValuesval = optionValues[i];

	if(arraysessdata[i] == optionValuesval)
	{												


	$("#booking-time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
	//~ $("#booking-time").find('option:contains("'+sessmornafteven+'")').prop('disabled', true);

	}
	$("#booking-time").trigger("chosen:updated");

	}

	}
	});
	var val = $(this).val();
	jQuery.ajax({
	url : '<?php echo $base_url?>booking/getservicecategorydata',
	type: 'POST',
	data: {cateid : cateid,bookdate:bookdate},
	success:function(response){
	var resgetdate = JSON.parse(response);
	$(this).attr("data-disabled-days",resgetdate.dateval)
	var disabledDays = $(this).attr("data-disabled-days").split(",");
	if ($.inArray(val, disabledDays) !== -1) {
	//~ $('#booking-date').val("");
	toastr.options = {
	"closeButton": true,
	}
	toastr.error("Sorry this date not available!");	
	setTimeout(function(){
	}, 2000); 			  
	}
	
	}
	});

	});

	var selectedText_pro= $('#property_book').find("option:selected").attr('data-pid');
	$('.property_id').val( selectedText_pro );
	$('#property_book').change(function () 
	{
	var selectedText_pro= $(this).find("option:selected").attr('data-pid');	
	$('.property_id').val( selectedText_pro );
	});

	});




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
	var obj = JSON.parse(data);
	// $('.emty_cls').empty('');

	$('#uploaded_images').html('<img src="<?php echo $base_url?>uploads/'+obj.fullimg+'">');

	$('#img_link').val(obj.fullimg);
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
	messages: {              

	'service_book': {
	required: 'Category of service is required',
	},
	'description': {
	required: 'Description of service is required',
	},
	'property_book': {
	required: 'Apartment to be serviced is required',
	},
	'booking_date': {
	required: 'Appointment Date is required',
	},
	'booking_time': {
	required: 'Appointment Session is required',
	},
	'img_upload': {
	required: 'Photo of issue is required',
	},

	},
	rules: {
	service_book: {
	required: true
	},

	description: {
	required: true
	},

	property_book: {
	required: true
	},
	booking_date: {
	required: true
	},
	booking_time: {
	required: true
	},
	img_upload: {
	required: true
	},


	},

	errorPlacement: function(error, element) {

	if (element.attr("name") == "service_book") {
	if ($('#service_book_chosen')[0]) {

	error.insertAfter("#service_book_chosen");
	}else{
	error.insertAfter("#service_book");

	}
	}
	else if(element.attr("name") == "property_book") {
	if ($('#property_book_chosen')[0]) {
	error.insertAfter("#property_book_chosen");
	}else
	{
	error.insertAfter("#property_book");
	}
	}
	else if(element.attr("name") == "booking_time") {
	if ($('#booking_time_chosen')[0]) {
	error.insertAfter("#booking_time_chosen");
	}else
	{
	error.insertAfter("#booking-time");
	}
	}
	else if(element.attr("name") == "img_upload") {
	if ($('.edit-profile-photo')[0]) {
	error.insertAfter(".edit-profile-photo");
	}else
	{
	error.insertAfter("#imagebookUploadForm");
	}
	}else{
	error.insertAfter(element);
	}
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

	//~ jQuery( '.append' ).append( '<div class="notification success closeable"><p>Added New Booking Succesfully.</p><a class="close"></a></div>' );

	//~ setTimeout(function(){// wait for 5 secs(2)
	//	window.location.href ='<?php echo $base_url?>booking/active_request';
	//~ }, 2000); 


	toastr.options = {
	"closeButton": true,
	}
	toastr.success("Your appointment request have been submitted. We will contact you shortly.");	
	setTimeout(function(){// wait for 5 secs(2)
	//location.reload(); // then reload the page.(3)
	window.location.href ='<?php echo $base_url?>my-request/active-request/?active=pending';


	}, 3000); 			   	
	}
	});
	}
	}); 
	//~ $('#booking-date').on('change input', function() {
	//~ var cateid = $('#service_book').find("option:selected").attr('data-cateid');
	//~ var bookdate = $('#booking-date').val();
	//~ var val = $(this).val();
	//~ jQuery.ajax({
	//~ url : '<?php echo $base_url?>booking/getservicecategorydata',
	//~ type: 'POST',
	//~ data: {cateid : cateid,bookdate:bookdate},
	//~ success:function(response){
	//~ var resgetdate = JSON.parse(response);
	//~ $(this).attr("data-disabled-days",resgetdate.dateval)
	//~ var disabledDays = $(this).attr("data-disabled-days").split(",");
	//~ if ($.inArray(val, disabledDays) !== -1) {
	//~ $('#booking-date').val("");
	//~ toastr.options = {
	//~ "closeButton": true,
	//~ }
	//~ toastr.error("Sorry this date not available!");	
	//~ setTimeout(function(){
	//~ }, 3000); 			  
	//~ }
	//~ }
	//~ });
	//~ });
	});
        
        </script>