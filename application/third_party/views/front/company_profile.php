<!--
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
-->
<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
<div class="container">
   <?php if($this->session->userdata('id_user_master')) { ?>
   <div class="row">
      <div class="">
         <!-- Titlebar -->
         <div>
            <?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
            <?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
            <?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
            <div class="listing-titlebar-title">
               <h2 class="headh2">Company Profile</h2>
            </div>
         </div>
      </div>
      <form id="comprofile_update" method="post" class="ptpb-30">
         <div class="row">
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
               <div class="dashboard-list-box margin-top-0">
                  <div class="dashboard-list-box-static">
                     <div class="safeprof col-lg-12 col-md-12" >
                        <div class="col-lg-4 col-md-4" >
                           <div class="edit-profile-photo" >
                              <div class="emty_cls" id="uploaded_images" >
                                 <?php if($user_information->profile_image != ""){ ?>
                                 <img src="<?php echo $base_url.'uploads/'.$user_information->profile_image; ?>">
                                 <?php } else { ?>
                                 <img src="<?php echo $base_url?>uploads/default17.jpg">
                                 <?php } ?>
                              </div>
                              <div class="change-photo-btn">
                                 <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" name="img_upload"  class="upload" id="imageUploadForm" />
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-8 spacetopbottom" >
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Name:</label> </div>
                              <div class="col-50"><label for="fname" ><?php echo $user_information->first_name?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Company:</label></div>
                              <div class="col-50"><label for="fname" ><?php echo $user_information->companyname; ?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Email:</label></div>
                              <div class="col-50"><label for="fname" ><?php echo trim($user_information->email); ?></label></div>
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-8 spacetopbottom" >
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Number of bids:</label> </div>
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Number of awarded jobs:</label></div>
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Rating:</label></div>
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
                           </div>
                        </div>
                     </div>
                     <div class="user-details">
                        <ul class="navigation">
                           <li class="active tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#information">
                                 <span class="iconfldes glyphicon glyphicon-user"></span>
                                 <p class="tabname">Account Details</p>
                              </a>
                           </li>
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#settings">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Job Posts</p>
                              </a>
                           </li>
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#events">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Manage Jobs</p>
                              </a>
                           </li>
<!--
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#events">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Expired Jobs</p>
                              </a>
                           </li>
-->
                        </ul>
                        <div class="user-body">
                           <div class="tab-content">
                              <div id="information" class="tab-pane active">
                                 <h4>Account Information</h4>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label">Your Name</label>
                                       <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                       <input type="hidden" class="form-control" name="img_link" id="img_link" value="<?php echo $user_information->profile_image; ?>" /> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Position with your company</label>
                                       <input type="text"  class="form-control" name="positioncompany" id="positioncompany" value="<?php echo $user_information->positioncompany; ?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Safety professional (optional) or company Person  </label>
                                       <div class="form-group">
                                          <label class="control-label">Name</label>
                                          <input type="text"  class="form-control" name="companyperion" id="companyperion" value="<?php echo $user_information->companyperion; ?>"/> 
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label">Email</label>
                                          <input type="text"  class="form-control" name="companyperemail" id="companyperemail" value="<?php echo $user_information->companyperemail; ?>"/> 
                                       </div>
                                       <div class="form-group">     
                                          <label class="control-label">Cell</label>
                                          <input type="text"  class="form-control" name="companypercellphone" id="companypercellphone" value="<?php echo $user_information->companypercellphone?>"/> 
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Your Company (if from the same company they are connected some how)</label>
                                       <input type="text"  class="form-control" name="companyname" id="companyname" value="<?php echo $user_information->companyname; ?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Address</label>
                                       <input type="text"  class="form-control" name="address" id="address" value="<?php echo $user_information->address?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Website </label>
                                       <input type="text"  class="form-control" name="weblink" id="weblink" value="<?php echo $user_information->weblink?>"/> 
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label">City</label>
                                       <input type="text"  class="form-control" name="city" id="city" value="<?php echo $user_information->city?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">State</label>
                                       <input type="text"  class="form-control" name="state" id="state" value="<?php echo $user_information->state?>"/> 
                                    </div>
                                    <div class="form-group zip-code" >
                                       <label class="control-label">Zip code</label>    
                                       <input type="text"  class="form-control" name="zipcode" id="zipcode" value="<?php echo $user_information->zip_code?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Office Phone</label>
                                       <input type="text"  class="form-control" name="officenumber" id="officenumber" value="<?php echo $user_information->officephone?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <div class="col-md-12" style="padding:0;">
                                          <label class="control-label">Cell phone</label>
                                       </div>
                                       <div class="col-md-12" style="padding:0;">
                                          <input type="tel" class="form-control" name="celphone" id="celphone" value="<?php echo $user_information->phone?>"/> 
                                       </div>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div class="form-group email-address" >
                                       <label class="control-label"><?php echo $this->lang->line('email'); ?> address</label>
                                       <input type="text" class="form-control" name="user_email" id="user_email" readonly value="<?php echo trim($user_information->email); ?>">
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Industry</label>
                                       <input type="text"  class="form-control" name="industry" id="industry" value="<?php echo $user_information->industry?>"/> 
                                    </div>
                                 </div>
                                 <input type="submit" class="btndesign button margin-top-15" value="Save Changes" style="margin-left:44%;">
                              </div>
                              <div id="settings" class="tab-pane">
								     <h4 class="headtitbid">Active Contracts</h4>
                                   <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Sent</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                           
                                 <div id="actcont" class="act_conts active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
                                             <ul class="list-groupaccons">
												 	<?php	
											foreach ($get_postjoball as $get_postjoballval) { ?>

   <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
	   <a href="#" class="listing full-time"><div class="recent-job-list-home">
		   <div class="job-list-location col-md-3 ">
			   <h6><i class="fa fa-calendar"></i><?php echo $get_postjoballval->start_date.' - '.$get_postjoballval->end_date; 
  $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - strtotime($get_postjoballval->posteddate);
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
   {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   echo '<br> '.$difference.' '.$periods[$j].' ago';
   ?>
   </h6></div><div class="col-md-5 job-list-desc"><h6>
				   <?php echo $get_postjoballval->first_name; ?></h6>
				   <p>
					   <?php echo $get_postjoballval->job_description; ?></p></div><div class="job-list-type col-md-4 "><h6>Saftety Bidders ( 2 )</h6></div><div class="clearfix"></div>
					   </div>
					   </a>
					   </li>

   <?php } ?>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              
                                 <h4>Job Posts</h4>
                                 <h4 class="headtitbid">Submitted Proposals ( 2 )</h4>
                                    <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Sent</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                           
                                 <div id="subpro" class="submitpro active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
                                             <ul class="list-group">
											
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <h4 class="headtitbid">Completed Contracts</h4>
                                  <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Sent</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                           
                                 <div id="compcont" class="comp_conts active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
<!--
                                             <ul class="list-groupaccons">
                                             </ul>
-->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="events" class="tab-pane">
                                 <h4>Manage Jobs</h4>
                                 <h4 class="headtitbid">Submitted Proposals ( 2 )</h4>
                                  
                           <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">

                                             <ul class="list-groupmanage">
												  
												 <?php foreach($get_postjoball as $get_postjoballval)
			{ ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="col-md-12 sell__section__row__list">	<h5 class="pull-left sell__section__row__title"><a href="#" title="I need dot training next week"><?php echo$get_postjoballval->job_title; ?></a></h5><p class="pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="col-md-12 sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>8 months ago</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo$get_postjoballval->joblocation; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span><?php echo $get_postjoballval->weblink; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-dot-circle-o"></i><span>Proposal  1</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form><a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"  title="I need dot training next week" class="pull-right sell__section__row__list__button">Edit Job</a></div></div></section></li>
			  <?php } ?> 
                                             </ul>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                             
                           
                             <h4>Expired Jobs</h4>
                                 <h4 class="headtitbid">Submitted Proposals ( 2 )</h4>
                                                  
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
<!--
                                             <ul class="list-groupmanage">
                                             </ul>
-->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
   <?php } ?>
</div>

<!--
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
-->
<!--
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
-->
<script type="application/javascript">
jQuery(document).ready(function(e) {
 var form1 = $('#comprofile_update');
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
				 'companyname': {
                    required: 'Email is required',
					email: 'Invalid Email',
					
                },
				 
			
        
	
         
            },
            rules: {
               			
				first_name: {
                    required: true,
				                },
				companyname: {
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
				url : '<?php echo $base_url?>login_controller/company_update',
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
  

    $('.list-group').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  jQuery(document).ready(function($){
  
    $('.list-groupaccons').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
    jQuery(document).ready(function($){ 
    

    $('.list-groupmanage').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
</script>
