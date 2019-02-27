<?php global $mobile_country_code,$country_array;?>
<div class="dashboard-content">

 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="h3"></h4>Edit Schedule</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 form">
	
        <?php if($getscheduledetails != FALSE){ 
			//var_dump($getscheduledetails);
			
			
			?>
      
        <form id="update_user" method="post">

            <div class="form-body ">

           <input type="hidden" name="property_id" id="property_id" value="<?php echo $getscheduledetails->ID;?>">
                <div class="form-group form-md-line-input">
                        <label for="p-in" class="col-md-4 label-heading">Apartment Name </label>
                        <div class="col-md-8 ui-front">
							                
                      
                           <select class="form-control task_name" name="" multiple >
                              <?php
                               foreach($task_name_list as $task_name_list_val)
                                 {	
                                 ?> 
                              <option  <?php if($getscheduledetails->u_email == $task_name_list_val->email){echo 'selected="selected"'; } ?>value="<?php echo $task_name_list_val->property_name; ?>" data-id="<?php echo $task_name_list_val->id; ?>"data-uid="<?php echo $task_name_list_val->user_id; ?>" data-catname="<?php echo $task_name_list_val->task_catname; ?>" data-bookdate="<?php echo $task_name_list_val->booking_date; ?>"><?php echo $task_name_list_val->property_name .' - ('.$task_name_list_val->email.')' ; ?> </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                        
  
          


                 <div class="form-group form-md-line-input">
                                        <label for="form_control_1">Service Categories </label>
                     <input type="hidden" class="s_catid"  name="s_catid" value="" />
                     						       <input type="hidden" class="s_uid"  name="s_uid" value="" />
                     						       <input type="hidden" class="s_sel_val_val"  name="s_sel_val_val" value="" />

						       <input type="text" class="s_serv_cat form-control "  name="s_serv_cat" value=""  readonly=""/>
                </div>  


                
					<div class="form-group form-md-line-input">
					<label for="form_control_1">Booking Date </label>
										       <input type="text" class="s_bookdate form-control "  name="s_bookdate" value=""  readonly="" />

				</div>
                 
                           
                          
               
                                          
             
				<div class="form-group form-md-line-input">
                <label for="form_control_1" >Description</label>
                    <input type="text" class="form-control description" name="description" value="<?php echo $getscheduledetails->description;?>">
        </div>
        				<div class="form-group form-md-line-input">
									<label class="col-md-4 label-heading">Start Date/time</label>
									<div class="col-md-8">

					<div class="col-lg-12 col-md-12">
						<?php echo $getscheduledetails->start;?> 
					</div>

					
				</div>
				</div>
        				<div class="form-group form-md-line-input">
									<label class="col-md-4 label-heading">End Date/time</label>
									<div class="col-md-8">

					<div class="col-lg-12 col-md-12">
						<?php echo $getscheduledetails->end;?> 
					</div>

					
				</div>
				</div>
										        				<div class="form-group form-md-line-input">
			<label class="col-md-12 label-heading h3">Change Date / Time</label></div>

        				<div class="form-group form-md-line-input">
									<label class="col-md-4 label-heading">Start Date</label>
									<div class="col-md-8">

					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-date" class="form-control booking-date start_date" name="start_date" data-lang="en" data-large-mode="true" data-large-default="true"  data-disabled-days="">
					</div>

					<!-- Time Picker  -->
					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-time" class="form-control booking-time start_time" name="start_time" placeholder="9:00 am" value="">
					</div>	
				</div>
				</div>
        				<div class="form-group form-md-line-input">
									<label class="col-md-4 label-heading">End Date</label>
									<div class="col-md-8">


					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-date" class="form-control booking-date end_date" name="end_date" data-lang="en" data-large-mode="true" data-large-default="true"  data-disabled-days="">
					</div>

					<!-- Time Picker -->

					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-time" class="form-control booking-time end_time" name="end_time" placeholder="9:00 am" value="">
					</div>	</div>
  

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
</div></div>

 <script>
   $(document).ready(function () {
      var uid = $('.task_name option:selected', this).attr('data-uid');

    $('.s_uid').val(uid);
var sel_val = [];
        $.each($(".task_name option:selected"), function(){            
            sel_val.push($(this).val());
        });
    var sel_val_val = sel_val.join(",");
    
var tskid = [];
        $.each($(".task_name option:selected"), function(){            
            tskid.push($(this).attr('data-id'));
        });
    var tskid_val = tskid.join(",");
var bookdate = [];
        $.each($(".task_name option:selected"), function(){            
            bookdate.push($(this).attr('data-bookdate'));
        });
    var bookdate_val = bookdate.join(",");
var catname = [];
        $.each($(".task_name option:selected"), function(){            
            catname.push($(this).attr('data-catname'));
        });
    var catname_val = catname.join(",");
 
$('.s_catid').val(tskid_val);
$('.s_serv_cat').val(catname_val);
 $('.s_bookdate').val(bookdate_val);
 $('.s_sel_val_val').val(sel_val_val)
   $('select.task_name').on('change', function() {
	   
	      //~ var tskid = $('option:selected', this).attr('data-id');
   var uid = $('.task_name option:selected', this).attr('data-uid');

    $('.s_uid').val(uid);
var sel_val = [];
        $.each($(".task_name option:selected"), function(){            
            sel_val.push($(this).val());
        });
    var sel_val_val = sel_val.join(",");
    
var tskid = [];
        $.each($(".task_name option:selected"), function(){            
            tskid.push($(this).attr('data-id'));
        });
    var tskid_val = tskid.join(",");
var bookdate = [];
        $.each($(".task_name option:selected"), function(){            
            bookdate.push($(this).attr('data-bookdate'));
        });
    var bookdate_val = bookdate.join(",");
var catname = [];
        $.each($(".task_name option:selected"), function(){            
            catname.push($(this).attr('data-catname'));
        });
    var catname_val = catname.join(",");
 
$('.s_catid').val(tskid_val);
$('.s_serv_cat').val(catname_val);
 $('.s_bookdate').val(bookdate_val);
 $('.s_sel_val_val').val(sel_val_val);
   //~ var tskid = $('option:selected', this).attr('data-id');
   //~ var uid = $('option:selected', this).attr('data-uid');
   //~ var bookdate = $('option:selected', this).attr('data-bookdate');
   //~ var catname = $('option:selected', this).attr('data-catname');
   //~ alert(uid);
    //~ $('.s_catid').val(tskid);
   //~ $('.s_serv_cat').val(catname);
   //~ $('.s_bookdate').val(bookdate);
   //~ $('.s_uid').val(uid);
   
   
    //~ alert(tskid);
    //~ alert(catname);
    //~ alert(uid);
   
   });
   });
   
   
   
   jQuery(document).ready(function(e) 
   {
   var form1 = $('#update_user');
   var error1 = $('.alert-danger', form1);
   var success1 = $('.alert-success', form1);
   
   form1.validate
   ({
   errorElement: 'span', //default input error message container
   errorClass: 'help-block help-block-error', // default input error message class
   focusInvalid: false, // do not focus the last invalid input
   ignore: "", // validate all fields including form hidden input
   messages: {  
   
   
   },
   rules: {
   
   
   //~ property_status:{
   //~ required: true, },
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
   url : '<?php echo $base_url?>admin/schedule/update_schedule',
   type: 'POST',
   data: jQuery(form).serialize(),
   success:function(response){    
   	jQuery(form)[0].reset();
   	toastr.options = {
   		"closeButton": true,
   	}
   	toastr.success("New user Create Succesfully", "Notifications");		
   }
   });
   }
   });
   });
   
      
   
      
   
   //~ var sdate = convertstr(event.start);
   //~ var edate = convertstr(event.end);
   
           //~ var start = fmt(event.start);
         //~ var end = fmt(event.end);
         //~ var task_name = event.title;
         //~ var description =  event.description;
         //~ var cont_name =  event.contractor_name;
         //~ var start_date =  event.start;
         //~ var end_date =  event.end;
         //~ var evenid =  event.ID;
         //~ $.ajax({
                  //~ url: '<?php echo base_url() ?>admin/calendar/update_events',
            //~ data: 'task_name=' + event.title + '&description=' + event.description +'&cont_name=' + event.contractor_name +'&start_date=' + sdate + '&end_date=' + edate + '&evenid=' + event.ID,
   
      //~ //data : { task_name : task_name , description : description , cont_name : cont_name , start_date : start_date  , end_date : end_date , evenid : evenid },
   
           //~ type: "POST",
           //~ success: function (json) {
             //~ //alert("Updated Successfully");
           //~ }
         //~ });
       //~ },
      //~ $('#myAddevent').click( function (event) {
         //~ var decision = confirm("Do you want to remove event?");
         //~ if (decision) {
           //~ $.ajax({
             //~ type: "POST",
               //~ url: '<?php echo base_url() ?>admin/calendar/delete_event',
             //~ data: {id:event.ID},
             //~ success: function (json) {
               //~ $('#calendar').fullCalendar('removeEvents', event.ID);
               //~ //alert("Updated Successfully");
             //~ }
           //~ });
   
   
         //~ }
   
       //~ });
      //~ $('#myAddevent').click( function (event) {
         //~ var start = fmt(event.start);
         //~ var end = fmt(event.end);
         //~ $.ajax({
           //~ url: '<?php echo base_url() ?>admin/calendar/update_events',
           //~ data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
           //~ type: "POST",
           //~ success: function (json) {
             //~ //alert("Updated Successfully");
           //~ }
         //~ });
   
           //~ });
   
    
   
   //~ });
   
</script>

<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="<?= site_url('assets/datetimedrapper/css/datedropper.css'); ?>" rel="stylesheet" type="text/css">
<script src="<?= site_url('assets/datetimedrapper/js/datedropper.js'); ?>"></script>
<script>$('.booking-date').dateDropper();</script> 

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="<?= site_url('assets/datetimedrapper/js/timedropper.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= site_url('assets/datetimedrapper/css/timedropper.css'); ?>"> 
<script>
this.$('.booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script> 

