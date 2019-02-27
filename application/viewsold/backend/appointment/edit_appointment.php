<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/datetimedrapper/css/timedropper.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/datetimedrapper/css/datedropper.css"> 

<!-- Content
	================================================== -->
<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>Appointment Management</h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
						<li><a href="<?php echo $base_url; ?>admin/appointment">Appointment</a></li>
						<li>Update Appointment</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="form">
		<form method="post"  id="update_book_appointment" >
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<!-- Client Details -->
					<div class="dashboard-list-box margin-top-0">
						<h4 class="gray">Client Details</h4>
						<div class="dashboard-list-box-static">
							<input type="hidden" name="first_name" value="<?php echo $appointments_details->first_name; ?>" />
							<input type="hidden" name="phone" value="<?php echo $appointments_details->phone; ?>" />
							<input type="hidden" name="email" value="<?php echo $appointments_details->email; ?>" />
							<input type="hidden" name="imgpath" value="<?php echo $appointments_details->image_path; ?>" />
							<input type="hidden" id="apartment-address-val" name="address" value="" />
							<input type="hidden" id="category-catid" name="catid" value="<?php echo $appointments_details->task_catid; ?>" />
							<input type="hidden" id="device_id" name="device_id" value="<?php echo $appointments_details->device_id; ?>" />
							<input type="hidden" id="category-shot" name="shot" value="<?php echo $appointments_details->taskcatshort_code; ?>" />	
							<input type="hidden" id="pid" name="pid" value="<?php echo $appointments_details->ID; ?>" />
							<input type="hidden" id="userid" name="userid" value="<?php echo $appointments_details->user_id;?>">
							<input type="hidden" id="taskid" name="taskid" value="<?php echo $tid; ?>">
							<input type="hidden" class="maxappointment" name="maxappointment" value="">
							<input type="hidden" class="oldbooksess_date" name="oldbooksess_date" value="<?php echo $appointments_details->booking_date; ?>">
							<input type="hidden" class="oldbooksess_time" name="oldbooksess_time" value="<?php echo $appointments_details->booking_time; ?>">
							<input type="hidden" class="oldbooksess_taskcatid" name="oldbooksess_taskcatid" value="<?php echo $appointments_details->task_catid; ?>">
							<!-- Contents -->
							<div class="my-profile client-details">
								<div class="client-details-single-item">
									<i class="im im-icon-User"></i><p class="client_letter"><?php echo $appointments_details->first_name; ?></p>
								</div>
								<div class="client-details-single-item">
									<i class="im im-icon-Phone"></i><p><?php echo $appointments_details->phone; ?></p>
								</div>
								<div class="client-details-single-item">
									<i class="im im-icon-Email"></i><p><?php echo $appointments_details->email; ?></p>
								</div>
								<div class="client-details-single-item">
									<i class="im im-icon-Home-3"></i>
									<div>
										<select class="chosen-select" name="pname" id="apartment-select" required>
											<?php
											 foreach($listproperty as $property)
											 { 
											?>
												 <option data-pid="<?php echo $property->ID; ?>"  data-address="<?php echo $property->property_address; ?>" value="<?php echo $property->property_name; ?>" <?php if($appointments_details->property_name == $property->property_name) { echo "selected"; }?> > <?php echo $property->property_name ?> </option>
											<?php
											 }									 
											?>
										</select>
									</div>
								</div>
								<div class="client-details-single-item">
									<i class="im im-icon-Map2"></i><p id="apartment-address"><?php echo $appointments_details->property_address; ?></p>
								<!-- Address Changes according to the selected Apartment Name -->
								</div>
							</div>
						</div>
					</div>
					<!-- Appointment Details -->
					<div class="dashboard-list-box margin-top-30">
						<h4 class="gray">Appointments Details</h4>
						<div class="dashboard-list-box-static">
							<!-- Details -->
							<div class="my-profile">
								<label class="margin-top-0">Appointment Type</label>
								<select class="chosen-select apt_val" id="servicebooing_id" name="category_name" >
									<option value="">Choose a Service Category</option> 
									<?php foreach($admin_of_task as $admin_of_task_val ) {  ?>
									<option data-shot-code="<?php echo $admin_of_task_val->taskcatshort_code; ?>" data-catid="<?php echo $admin_of_task_val->id; ?>"  data-maxappointment="<?php echo $admin_of_task_val->max_appointment; ?>"  value="<?php echo $admin_of_task_val->taskcategory_name; ?>" <?php if($appointments_details->task_catname == $admin_of_task_val->taskcategory_name ){ echo 'selected="selected"'; } ?> ><?php echo $admin_of_task_val->taskcategory_name; ?></option>
										<?php } ?>
								</select>
							
								<label>Date</label>
								<input type="text" id="booking-dateapoint" data-lang="en" required data-large-mode="true" data-large-default="true" name ="bookingdate" data-default-date="<?php echo $appointments_details->booking_date; ?>"  value="<?php echo $appointments_details->booking_date; ?>" />
									<label>Session Time</label>
<!--
								  <select class="chosen-select-no-single"  name="booking_time" id="booking-time">
							<option value="">Select Session</option>
                                 <option value="morning">Morning</option>
                                 <option value="afternoon" >Afternoon</option>
                                 <option value="evening">Evening</option>
                              </select>
-->							   <input type="hidden" class="bookdatedb" value="<?php echo $appointments_details->booking_time; ?>">

                                <select class="chosen-select-no-single"  name="booking_time" id="booking_time">
									<option value="">Select Session</option>
<!--
									<option <?php if($appointments_details->booking_time == "morning"){ echo 'selected="selected"';} ?> value="morning">Morning</option>
									<option <?php if($appointments_details->booking_time == "afternoon"){ echo 'selected="selected"';} ?> value="afternoon" >Afternoon</option>
									<option <?php if($appointments_details->booking_time == "evening"){ echo 'selected="selected"';} ?> value="evening">Evening</option>
-->
								</select>
								<label>Time Block<p class="time-selected"><?php //echo $appointments_details->booking_time;?></p></label>
								<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
								<input type="text" required name ="bookingtime" id="booking-time-app" data-default-time="9:00 am" value="9:00 am" />
								<label>Estimate Time</label>
								<input type="number" required name ="est_time" id="est_time"  value="" />
									
							</div>
						</div>
					</div>
				</div>
				<!-- Appointment Details -->
				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box margin-top-0">
						<h4 class="gray">Job Details</h4>
						<div class="dashboard-list-box-static">
							<!-- Avatar -->
							<div class="appointment-mgmt-photo">
								<a href="<?php echo $base_url.'uploads/'.$appointments_details->image_path; ?>" target="_blank"><img src="<?php echo $base_url.'uploads/'.$appointments_details->image_path; ?>" alt="" /></a><!-- using js to set image valign middle -->
							</div>
							<!-- Details -->
							<div class="my-profile colpricefild editapp">
								<label>Job Description</label>
								<textarea  name="desciption" cols="30" rows="5"><?php echo $appointments_details->description; ?></textarea>
								<label>Job Actions Required</label>
								<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
									
										<tr class="pricing-list-item pattern1">
											<td>
<!--
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input type="text" placeholder="Title" /></div>
-->
													<div class="fm-input pricing-ingredients"><input class="fm-input pricing-ingredients jobcls" type="text" name="field_name[]" value=""  /></div>
												<div class="fm-input pricing-price"><input   type="number" name="field_price[]"   min="0" max="99999" maxlength="4"   data-unit="SGD" value=""  />
<!--
												<input type="text" placeholder="Price" data-unit="SGD" />
-->
												</div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<div class="error1">
										
								</div>
								<div class="error2">
									
								</div>
									<a href="#" class="button add-pricing-list-item1">Add Item</a>
								</div>
							</div>

<!--
								<div class="field_wrapper">
									<div class="add-actions">
										
											<input style=" float: left;" class="action-desc jobcls" type="text" name="field_name[]" value="" placeholder="Faucet Replacement" /> <span class="price-sin"> - $ </span>
										
										<p class="pri_ptg">
											<input  class="action-cost jobcls" type="number" name="field_price[]"   min="0" max="99999" maxlength="4"  placeholder="120" value=""  />
										</p>
									</div>	
																			
								</div>
-->
<!--
								<a href="javascript:void(0);" class="add_button " title="add field"> <i  class="field_col_pric_plus col-md-1 plus_add fa fa-plus"></i></a>
-->
								<div class="clear"></div>
								
								
							</div>
							<div style="width:100%">
							<button type="submit" class="savdisabled button margin-top-15">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Copyrights -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="copyrights">&copy; 2018 1SS. All Rights Reserved.</div>
				</div>
	</div>
	<!-- Content / End -->


		
<style>
.error {
    color: red;
}

@media (max-width: 767px){
.pricing-list-item td .fm-close
{
    text-align: left;
    position: relative;
    top: 0;
    right: 0;
}}
</style>


<script type="text/javascript">
	  jQuery(document).ready(function(e) { 
		  	var shot = $('option:selected', "#servicebooing_id").attr('data-shot-code');
	var catid = $('option:selected', "#servicebooing_id").attr('data-catid');

	$('#category-shot').val(shot);
	$('#category-catid').val(catid);
		
     var selectedText = $('option:selected', "#servicebooing_id").attr('data-short-code');
	$('.short_code').val(selectedText);
	var cateid = $('option:selected', this).attr('data-catid');
	$('.cateid').val( cateid );
	var maxappointment = $('option:selected', "#servicebooing_id").attr('data-maxappointment');
$('.maxappointment').val(maxappointment);

        //~ var bookdate = $('#booking-date').val();
     
 var bookdate = $('#booking-dateapoint').val();
             var oldbooksess_time = $('.oldbooksess_time').val();
             var oldbooksess_taskcatid = $('.oldbooksess_taskcatid').val();
             var oldbooksess_date = $('.oldbooksess_date').val();

								
					 jQuery.ajax({
				url : '<?php echo $base_url?>admin/appointment/get_booksessdatahide',
				type: 'POST',
				data:{ cateid : catid,bookdate : bookdate },
				  success:function(response){
				 				var sessdata = JSON.parse(response);
						var splitsessdata =  sessdata.sessdataall.join();
						var arraysessdata = splitsessdata.split(",");
						var appendsessdata= sessdata.append_data;
			
				var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })

						$('#booking_time').empty();
						$.each(appendsessdata, function(key, value) {
							
							//~ alert(value);   
							 $('#booking_time').append($("<option "+(oldbooksess_time == key ? 'selected="selected"' : '') +" data-timeformat='"+value+"' value='"+key+"'></option>")
											.attr("value",key)
											.text(value)); 
						});
							var optionValues = [];

							
								$('#booking_time option').each(function() {
									optionValues.push($(this).val());
								});
							
								$("#booking_time").find('option').attr('disabled', false).trigger("chosen:updated")
								function capitalize_Words(str)
								{
								 return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
								}
								for(i=0;i<optionValues.length;i++)
								{

								 var optionValuesval = optionValues[i];
												
									if(arraysessdata[i] == optionValuesval)
									{												

							
										$("#booking_time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
										//~ $("#booking-time").find('option:contains("'+sessmornafteven+'")').prop('disabled', true);

									}
														$("#booking_time").trigger("chosen:updated");

								}
						
					}
				 });
			var val = $(this).val();
				jQuery.ajax({
					url : '<?php echo $base_url?>booking/getservicecategorydata',
					type: 'POST',
					data: {cateid : catid,bookdate:bookdate},
					success:function(response){
					var resgetdate = JSON.parse(response);
					$('#booking-dateapoint').attr("data-disabled-days",resgetdate.dateval)
					var disabledDays = $('#booking-dateapoint').attr("data-disabled-days").split(",");
					if(resgetdate.dateval != "")
					{
					if ($.inArray(val, disabledDays) !== -1) {
						//~ $('#booking-date').val("");
						toastr.options = {
						"closeButton": true,
						}
						toastr.error("Sorry this date not available!");	
						setTimeout(function(){
						}, 2000); 			  
					}
					//~ else
					//~ {
						//~ toastr.options = {
						//~ "closeButton": true,
						//~ }
						//~ toastr.success("This date available!");	
						//~ setTimeout(function(){
						//~ }, 2000); 		
						//~ }
					}
				}
				});
$("#servicebooing_id").change(function () 
	{
	var shot = $('option:selected', this).attr('data-shot-code');
	var catid = $('option:selected', this).attr('data-catid');

	$('#category-shot').val(shot);
	$('#category-catid').val(catid);
        var bookdate = $('#booking-dateapoint').val();
             var oldbooksess_time = $('.oldbooksess_time').val();
             var oldbooksess_taskcatid = $('.oldbooksess_taskcatid').val();
             var oldbooksess_date = $('.oldbooksess_date').val();

		
	
		var selectedText =$('option:selected', this).attr('data-shot-code');
		$('.short_code').val( selectedText );
		var maxappointment = $('option:selected', this).attr('data-maxappointment');
		$('.maxappointment').val( maxappointment );
		var cateid =  $('option:selected', this).attr('data-catid');

		$('.cateid').val( cateid );

	
					 jQuery.ajax({
				url : '<?php echo $base_url?>admin/appointment/get_booksessdatahide',
				type: 'POST',
				data:{ cateid : catid,bookdate : bookdate },
				  success:function(response){
					 				var sessdata = JSON.parse(response);
						var splitsessdata =  sessdata.sessdataall.join();
						var arraysessdata = splitsessdata.split(",");
						var appendsessdata= sessdata.append_data;
				console.log(appendsessdata);
				var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })

						$('#booking_time').empty();
						$.each(appendsessdata, function(key, value) {
							
							//~ alert(value);   
							 $('#booking_time').append($("<option "+(oldbooksess_time == key ? 'selected="selected"' : '') +" data-timeformat='"+value+"' value='"+key+"'></option>")
											.attr("value",key)
											.text(value)); 
						});
							var optionValues = [];

							
								$('#booking_time option').each(function() {
									optionValues.push($(this).val());
								});
							
								$("#booking_time").find('option').attr('disabled', false).trigger("chosen:updated")
								function capitalize_Words(str)
								{
								 return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
								}
								for(i=0;i<optionValues.length;i++)
								{

								 var optionValuesval = optionValues[i];
												
									if(arraysessdata[i] == optionValuesval)
									{												

							
										$("#booking_time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
										//~ $("#booking-time").find('option:contains("'+sessmornafteven+'")').prop('disabled', true);

									}
														$("#booking_time").trigger("chosen:updated");

								}
					
						
					}
				 });
	});
				
					
	
	$("#booking-dateapoint").change(function () 
	{
	
        var bookdate = $('#booking-dateapoint').val();

        var oldbooksess_time = $('.oldbooksess_time').val();

		//~ var cateid = $('#servicebooing_id').find("option:selected").attr('data-cateid');
	var cateid = $('option:selected', this).attr('data-catid');


	
	 	
					 jQuery.ajax({
				url : '<?php echo $base_url?>admin/appointment/get_booksessdatahide',
				type: 'POST',
				data:{ cateid : catid,bookdate : bookdate },
				  success:function(response){
					 			var sessdata = JSON.parse(response);
						var splitsessdata =  sessdata.sessdataall.join();
						var arraysessdata = splitsessdata.split(",");
						var appendsessdata= sessdata.append_data;
				var arrappendsessdata = $.map(appendsessdata, function(el) { return el; })

						$('#booking_time').empty();
						$.each(appendsessdata, function(key, value) {
							
							//~ alert(value);   
							 $('#booking_time') .append($("<option "+(oldbooksess_time == key ? 'selected="selected"' : '') +" data-timeformat='"+value+"' value='"+key+"'></option>")
											.attr("value",key)
											.text(value)); 
						});
							var optionValues = [];

							
								$('#booking_time option').each(function() {
									optionValues.push($(this).val());
								});
							
								$("#booking_time").find('option').attr('disabled', false).trigger("chosen:updated")
								function capitalize_Words(str)
								{
								 return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
								}
								for(i=0;i<optionValues.length;i++)
								{

								 var optionValuesval = optionValues[i];
												
									if(arraysessdata[i] == optionValuesval)
									{												

							
										$("#booking_time").find('option:contains("'+arrappendsessdata[i]+'")').prop('disabled', true);
										//~ $("#booking-time").find('option:contains("'+sessmornafteven+'")').prop('disabled', true);

									}
														$("#booking_time").trigger("chosen:updated");

								}
						
					}
				 });
			var val = $(this).val();
				jQuery.ajax({
					url : '<?php echo $base_url?>booking/getservicecategorydata',
					type: 'POST',
					data: {cateid : catid,bookdate:bookdate},
					success:function(response){
					var resgetdate = JSON.parse(response);
					$(this).attr("data-disabled-days",resgetdate.dateval)
					var disabledDays = $(this).attr("data-disabled-days").split(",");
					if(resgetdate.dateval != "")
				{
					if ($.inArray(val, disabledDays) !== -1) {
						//~ $('#booking-date').val("");
						toastr.options = {
						"closeButton": true,
						}
						toastr.error("Sorry this date not available!");	
						setTimeout(function(){
						}, 2000); 			  
					}
					//~ else
					//~ {
						//~ toastr.options = {
						//~ "closeButton": true,
						//~ }
						//~ toastr.success("This date available!");	
						//~ setTimeout(function(){
						//~ }, 2000); 		
						//~ }
					}
				}
				});
					
	});

					

	
	var option = $('option:selected', this).attr('data-address');
	$('#apartment-address').html(option);
	$('#apartment-address-val').val(option);
	

	
$('#apartment-select').on('change', function() {
	var option = $('option:selected', this).attr('data-address');

	$('#apartment-address').html(option);
	$('#apartment-address-val').val(option);

	
});
//~ $('.apt_val').on('change', function() {
	

	
//~ });
	
});
</script> 
 
 
<script>
jQuery(document).ready(function(e){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="add-actions"><input style=" float: left;"  name="field_name[]" class="action-desc" type="text" value="" placeholder="Faucet Replacement" /> <span class="price-sin"> - $ </span> <a href="javascript:void(0);"   class="field_col_pric_minu remove_button" title="remove field">	<i id="subs"   class=" col-md-1 sub_min fa fa-minus"></i></a> <p class="pri_ptg" > <input class="action-cost" type="text" name="field_price[]" min="0" max="99999" maxlength="4" value="" placeholder="120" /></p> </div> '; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){
		//alert('sfdf'); //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
       
        $(this).parent('div.add-actions').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    
});  
</script> 
 
 
<script>
 //~ jQuery(document).ready(function(e) {
	 //~ var form1 = $('#update_book_appointment');
        //~ var error1 = $('.alert-danger', form1);
        //~ var success1 = $('.alert-success', form1);

        //~ form1.validate({
			
            //~ errorElement: 'span', //default input error message container
            //~ errorClass: 'help-block help-block-error', // default input error message class
            //~ focusInvalid: false, // do not focus the last invalid input
            //~ ignore: "", // validate all fields including form hidden input          
            //~ rules: {
                //~ service_book: {
                    //~ required: true
                //~ },
				
				//~ booking_date: {
                    //~ required: true
                //~ },
            
			  	//~ booking_time: {
                    //~ required: true
                //~ },
            
			  
            //~ },

            //~ highlight: function(element) { // hightlight error inputs
                //~ $(element)
                    //~ .closest('.form-group').addClass('has-error'); // set error class to the control group
            //~ },

            //~ unhighlight: function(element) { // revert the change done by hightlight
                //~ $(element)
                    //~ .closest('.form-group').removeClass('has-error'); // set error class to the control group
            //~ },

            //~ success: function(label) {
                //~ label
                    //~ .closest('.form-group').removeClass('has-error'); // set success class to the control group
            //~ },

            //~ submitHandler: function(form) {
				
				//~ jQuery.ajax({
					//~ url : '<?php echo $base_url?>admin/appointment/update_book_appointment',
					//~ type: 'POST',
					//~ data: jQuery(form).serialize(),
					//~ success:function(response){
						//~ toastr.options = {
							//~ "closeButton": true,
						//~ }
						//~ toastr.success("Added New Booking Succesfully", "Notifications");	
						//~ setTimeout(function(){// wait for 5 secs(2)
						//~ location.reload(); // then reload the page.(3)
						//~ }, 5000); 			   	
					//~ }
				//~ });
            //~ }
        //~ }); 
        
        //~ });
        
        </script>


<script>
$(document).ready(function () {

    $('#update_book_appointment').validate({ // initialize the plugin
		
		
        rules: {
            booking_time:{
			required:true,
			},
            category_name:{
			required:true,
			},
			desciption:{
			required:true,
			},
			
            'field_name[]': {
            required: true
			},
             'field_price[]': {
            required: true
			},
           
            
        },
        errorPlacement: function(error, element) 
        {
			
			//console.log(element.attr("name"));
			
			if (element.attr("name") == "field_name[]") 
			{
				 $(".error1").append(error);
				
			}
			else if (element.attr("name") == "field_price[]") 
			{
				 $(".error2").append(error);
				
			}
			else
			{
				
				error.insertAfter(element);
			}

		},
		
         submitHandler: function (form) { // for demo
           $('.savdisabled').prop('disabled', true);
        
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/appointment/update_book_appointment',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Added New Booking Succesfully", "Notifications");	
						setTimeout(function(){// wait for 5 secs(2)
						//location.reload(); // then reload the page.(3)
			window.location.href = '<?php echo $base_url?>admin/appointment'; 
						}, 500); 			   	
					}
				});
            	jQuery.ajax({
					url : '<?php echo $base_url?>admin/appointment/push_notifi',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
           
           
					}
				});
        }
    });

});



//~ var $clocks = $('.td-input');
	//~ _.each($clocks, function(clock){
	//~ clock.value = '9:00 am';
//~ });


//~ function apartmentChange() {
	//~ console.log( this.value );
    //~ var x = document.getElementById("apartment-select").value;
    //~ document.getElementById("apartment-address").innerHTML = x;
//~ }

    //~ var inputQuantity = [];
    //~ $(function() {
      //~ $(".action-cost").each(function(i) {
        //~ inputQuantity[i]=this.defaultValue;
         //~ $(this).data("idx",i); // save this field's index to access later
      //~ });
      //~ $(".action-cost").on("keyup", function (e) {
        //~ var $field = $(this),
            //~ val=this.value,
            //~ $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
			//~ //window.console && console.log($field.is(":invalid"));
			//~ //$field.is(":invalid") is for Safari, it must be the last to not error in IE8
        //~ if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            //~ this.value = inputQuantity[$thisIndex];
            //~ return;
        //~ } 
        //~ if (val.length > Number($field.attr("maxlength"))) {
          //~ val=val.slice(0, 4);
          //~ $field.val(val);
        //~ }
        //~ inputQuantity[$thisIndex]=val;
      //~ });      
    //~ });

</script>
