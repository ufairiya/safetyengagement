<div class="dashboard-content">

<div class="" >
  <div class="" style="min-height:388px">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body"> Widget settings form goes here	</div>
					<div class="modal-footer">
						<button type="button" class="btn red">Save changes</button>
						<button type="button" class="btn default" data-dismiss="modal">Close</button>
					</div>
				</div>
			 <!-- /.modal-content -->
			</div>
		<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->


			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box gray">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Primary info
							</div>
							
						</div>
						<div class="portlet-body" style="display: block;">
			
                            <?php foreach($get_userdetails as $get_userdetails_val){ ?>
												<div class="row">
                               <div class="form-group col-md-12"><div class="col-md-2"></div>
                               <div class="col-md-8">
                                 <div class="form-group">
								    <label class="control-label">Profile Image</label>
									<div id="imgContainer">
				                      <div id="uploaded_image"><?php if($get_userdetails_val->profile_image == '') { ?>
										  <img src="<?php echo base_url(); ?>assets/images/default.jpg">
				                       										<?php }else { ?>
<img src="<?php echo $get_userdetails_val->profile_image; ?>"> 
										<?php  }?>

									  </div>   
				    		        </div>
								 </div>
								 <div id=""><span class="cen_imagename">Change Photo
								  	<form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
										<div class="upload-btn-wrapper">
  <button class="btn">Upload a file</button>
										<input type="file" name="image_file" id="image_file" />  
</div>
		<input type="hidden" name="img_userid" id="img_userid" value="<?php echo $get_userdetails_val->id_user_master; ?>">
											
											<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
									</form>  
									</span>
								 </div> </div>
								 <div class="col-md-2"></div>
								 							</div>
						</div>
							<form id="edit_user" action="<?php echo $base_url; ?>admin/user/update_userfield" class="horizontal-form" method="post" enctype="multipart/form-data">
							  <div class="row">
									  <div class="form-group col-md-12">
										  <label class="control-label col-md-4">User name:</label>
										  <div class="col-md-8">
											  <input class="form-control" name="first_name"   value="<?php echo $get_userdetails_val->first_name; ?> ">
											  		<input type="hidden" name="img_userid" id="img_userid" value="<?php echo $get_userdetails_val->id_user_master; ?>">

										  </div>
								  </div>
                              </div>
							  <div class="row">
									  <div class="form-group col-md-12">
										  <label class="control-label col-md-4">Phone:</label>
										  <div class="col-md-8">

											  <input class="form-control" name="user_phone"   value="<?php echo $get_userdetails_val->phone; ?>">
										  </div>
								  </div>
							  </div>
							  <?php if($get_userdetails_val->user_type == 'contractor') { ?>
							  <div class="row">
									  <div class="form-group col-md-12">
										  <label class="control-label col-md-4">Work Permit Number:</label>
										  <div class="col-md-8">

											  <input class="form-control" name="user_wpno"   value="<?php echo $get_userdetails_val->user_workpermitno; ?>">
										  </div>
								  </div>
							  </div>
							  <div class="row">
									  <div class="form-group col-md-12">
										  <label class="control-label col-md-4">Company name:</label>
										  <div class="col-md-8">

											  <input class="form-control" name="user_companyname"   value="<?php echo $get_userdetails_val->companyname; ?>">
										  </div>
								  </div>
							  </div>
							  <?php } ?>
                              <div class="row">
									  <div class="form-group col-md-12">
									  <label class="control-label col-md-4">User type:</label>
									  <div class="col-md-8">
										  	<select class="form-control" id="user_type" name="user_type"> 
											<?php
											  if($get_userdetails_val->user_type == 'application_user'){ ?>
											<option selected="selected" value="<?php echo $get_userdetails_val->user_type; ?>"><?php echo $get_userdetails_val->user_type; ?>
											</option>
											<option  value="contractor">contractor</option> 
											<?php } else if($get_userdetails_val->user_type ==  'contractor') { ?>
											<option selected="selected"  value="<?php echo $get_userdetails_val->user_type; ?>"><?php echo $get_userdetails_val->user_type; ?></option> 
											<option  value="application_user">application_user</option> 
										
											<?php } else { ?>
										<option  value="">Choose User Type</option> 

											<option   value="contractor">contractor</option> 
											<option   value="application_user">application_user</option> 
											<?php } ?>
											</select>
									   </div>
                                 </div>
                              </div>
                              <div class="row">
									  <div class="form-group col-md-12">
                                        <label class="control-label col-md-4">Email:
											
                                        </label>
                                        <div class="col-md-8">
							<?php echo $get_userdetails_val->email; ?>
										</div>
                                      </div>
                                  </div>
                              <div class="row">
									  <div class="form-group col-md-12">
                                        <label class="control-label col-md-4">Password:
											<a  data-target="#ajax" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="">
												<i class="fa fa-pencil"></i>  
											</a>
                                        </label>
                                        <div class="col-md-8">
											<input class="form-control"  type="password" value="<?php echo $get_userdetails_val->password; ?>">
										</div>
                                      </div>
                              </div>
                              <div class="row">
									  <div class="form-group col-md-12">
                                       <label class="control-label col-md-4">User status:</label>
                                       <div class="col-md-8">
										
											<select class="form-control" id="apupstatus" name="apupstatus"> 
											<?php  if(trim($get_userdetails_val->status) == 1){ ?>
											<option <?php if(trim($get_userdetails_val->status) == 1){ echo 'selected="selected"'; } ?> value="1">Approve
											</option>
											<option  value="0">Unapprove</option> 
											<?php } else { ?>
											<option <?php if(trim($get_userdetails_val->status) == 0){ echo 'selected="selected"'; } ?> value="0">Unapprove</option> 
											<option  value="1">Approve</option> 
											<?php } ?>
											</select>
											
                                       </div>
                                </div>
                             </div>
                                                        <button type="submit" class="btn red center-block">Save changes</button>
</form>
                            <?php } ?>				
					   </div>
					<!-- END SAMPLE TABLE PORTLET-->
				   </div>
				</div>		
				  <div class="col-md-6"><?php if(!empty($get_useraddressdetails)){ ?>
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box gray">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Address Details
							</div>
							
						</div>
						<div class="portlet-body" style="display: block;">
						  <?php foreach($get_useraddressdetails as $get_useraddressdetails_val){ ?>                             <div class="row">
							<div class="row">
							  <div class="col-md-12">
								  <div class="form-group">
									  <label class="control-label col-md-3">State:</label>
									  <div class="col-md-9">
										 <?php echo $get_useraddressdetails_val->state; ?> 
									  </div>
								  </div>
							  </div>
							</div>
							<div class="row">
							   <div class="col-md-12">
								   <div class="form-group">
									  <label class="control-label col-md-3">City:</label>
									  <div class="col-md-9">
										 <a href="javascript:;" data-type="text" class="wclor editable editable-click" data-pk="6" id="company_name"> <?php echo $get_useraddressdetails_val->city; ?> </a>
									  </div>
								   </div>
							   </div>
							</div>
							<div class="row">
							   <div class="col-md-12">
								   <div class="form-group">
									  <label class="control-label col-md-3">Post Code:</label>
									  <div class="col-md-9"><?php echo $get_useraddressdetails_val->post_code; ?> </div>
								   </div>
							   </div>
							</div>
							<div class="row">
							   <div class="col-md-12">
								   <div class="form-group">
									  <label class="control-label col-md-3">Address:</label>
									  <div class="col-md-9"><?php echo $get_useraddressdetails_val->address_1; ?>
									  </div>
								   </div>
							   </div>
							</div>
							<div class="row">
							   <div class="col-md-12">
								   <div class="form-group">
									  <label class="control-label col-md-3">Alternative Phone Number:</label>
									  <div class="col-md-9"><?php echo $get_useraddressdetails_val->alterphone_number; ?>
									  </div>
								   </div>
							   </div>
							</div>
							<?php } ?>			
						</div>                            			
					</div>                            			
				</div>                            			
						<!-- END BORDERED TABLE PORTLET-->
					<?php } ?>
			
			  </div>
			  <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box gray">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-sticky-note-o"></i>New address
							</div>
							
						</div>
					
						<div class="portlet-body" style="display: block;">
							<form method="post" name="newaddressform" id="newaddressform">

					

								<div class="row">
								   <div class="form-group col-md-12">
									 <label class="control-label col-md-3">City:</label>
									 <div class="col-md-9">
									   <input class="form-control" type="text" name="newCity" id="newCity">
									 </div>
								   </div>
								</div>
								<div class="row">
								   <div class="form-group col-md-12">
									  <label class="control-label col-md-3">State:</label>
									  <div class="col-md-9">
										<input class="form-control" type="text" name="newState" id="newState">
									  </div>
								  </div>
							   </div>
							   <div class="row">
								  <div class="form-group col-md-12">
									  <label class="control-label col-md-3">Address:</label>
									  <div class="col-md-9">  <input class="form-control" type="text" name="newAddress" id="newAddress">
									  </div>
								   </div>
							   </div>
							   <div class="row">
								  <div class="form-group col-md-12">
									  <label class="control-label col-md-3">Pincode:</label>
									  <div class="col-md-9">  <input class="form-control" type="text" name="newPincode" id="newPincode">
									   <input class="form-control" type="hidden" name="usid" id="usid" value="<?php echo $get_userdetails_val->id_user_master;?>">
									  </div>
								   </div>
							   </div>
							   			<div class="row">
									 <div class="form-group col-md-12">
										 <label class="control-label col-md-3">Phone Number:</label>
										 <div class="col-md-9">
											 <input class="form-control" type="text" name="newPhone" id="newPhone">
										 </div>
									  </div>
								</div>
								<button type="submit" class="btn red center-block">Save changes</button>

							</form>
						</div>	
					</div>
				<!-- END SAMPLE TABLE PORTLET-->
				</div>
			  <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box gray">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-tasks"></i>Add New Task
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="" class="fullscreen" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="remove" data-original-title="" title="">
								</a>
							</div>
						</div>
					
						<div class="portlet-body" style="display: block;">
							<a href="<?php echo $base_url; ?>admin/task/createtaskcategory">Add Task</a>
						</div>	
					</div>
				<!-- END SAMPLE TABLE PORTLET-->
				</div>
			  <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box gray">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Add New Schdule
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="" class="fullscreen" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="remove" data-original-title="" title="">
								</a>
							</div>
						</div>
					
						<div class="portlet-body" style="display: block;">
														<a href="<?php echo $base_url; ?>admin/schedule/schedulecreate">Add Schedule</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="modal fade in" id="ajax" role="basic" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				  <h4 class="modal-title">Change Password</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12  ">
							<form method="post" id="changepassForm" name="changepassForm">
								<div class="form-group">
									<label>Old Password</label>
									<span id='oldpassword_response'></span> 
									<input  type="hidden"  name="user_id" id="user_id" class="col-md-12 form-control" value="<?php echo $id_user_get; ?>">   
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
	<script>
			$("#oldpassword").change(function(){
			var oldpassword = $("#oldpassword").val().trim();
			var user_id = $("#user_id").val().trim();
			if(oldpassword != ''){
				$("#oldpassword_response").show();
				$.ajax({
					url: '<?php echo $base_url;?>admin/user/oldpassword_response_check',
					type: 'post',
					 dataType: "json",
					data: {oldpassword:oldpassword,user_id:user_id},
					success: function(response){
									var siteArray = response;
						if (siteArray.length == 0) {  
							$("#oldpassword").attr('style','border-color:red;')   
							$("#oldpassword").val('')   
							$("#oldpassword_response").html("<span class='alert alert-danger'>Not Correct.</span>");

						}else{ $("#oldpassword").attr('style','border-color:green;')   
							   $("#oldpassword_response").html("<span class='alert alert-success'> Correct.</span>");
						}

					}
				});
			}
			else{
				$("#oldpassword_response").hide();
			}

		 });
		 $(document).ready(function(){
		 var form1 = $('#changepassForm');
		 var error1 = $('.alert-danger', form1);
		 var success1 = $('.alert-success', form1);
		 form1.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "", // validate all fields including form hidden input
			messages: {              
				'oldpassword': {
					required: 'Please fill Old password',
				},
			},
			 rules: {
			 oldpassword: {
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
			   // form.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/user/change_password',
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
		 
			 var form1 = $('#newaddressform');
		 var error1 = $('.alert-danger', form1);
		 var success1 = $('.alert-success', form1);
		 form1.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "", // validate all fields including form hidden input
			messages: {              
				'newPhone': {
					required: 'Please fill street',
				},
				'newCity': {
					required: 'Please fill city',
				},
				'newState': {
					required: 'Please fill state ',
				},
				'newAddress': {
					required: 'Please fill address ',
				},
				'newPincode': {
					required: 'Please fill pincode ',
				},
			},
			 rules: {
			 newPhone: {
					required: true
				},
			 newCity: {
					required: true
				},
			 newState: {
					required: true
				},
			 newAddress: {
					required: true
				},
			 newPincode: {
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
			   // form.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/user/addNewAddress',
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
	  $('#confirmpassword').on('keyup', function () {
	  if ($(this).val() == $('#password').val()) {
	  $('#message').html('Matching').css('color', 'green');
		} 
	  else $('#message').html('Not matching').css('color', 'red');
	  });
	</script>
	 <script>  
 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/user/ajax_upload",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
                       dataType : 'json',s
 
                     success:function(data)  
                     { 
											
                     if(data.success  == 'success')
                      {
						  $("#uploaded_image").html("");
						  $(".imag_val").val('<?php echo base_url(); ?>uploads/'+data.data_image);
                            $('#uploaded_image').html('<img src="<?php echo base_url(); ?>uploads/'+data.data_image+'" width="300" height="225" class="img-thumbnail" />');  
			          }
			         else
			          {
                            $('#uploaded_image').html('<img src="<?php echo base_url(); ?>assets/images/default.jpg">');
				      }
                     }  
                });  
           }  
      });  
 });  
 </script>  
 
<style>
 span.cen_imagename
 {   margin: 0 auto;
    width: 34%;
    display: table;
}
#imgContainer {
	width: 100%;
	text-align: center;
	position: relative;
}
#imgArea {
	display: inline-block;
	margin: 0 auto;
	width: 150px;
	height: 150px;
	position: relative;
	background-color: #eee;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
#imgArea img {
	outline: medium none;
	vertical-align: middle;
	width: 100%;
}
#imgChange {
    margin: 0 auto;
    background: url(http://stallioni.net/B279/assets/images/overlay.png) repeat scroll 0 0 rgba(0, 0, 0, 0);
    /* bottom: 0; */
    /* color: #FFFFFF; */
    /* display: table; */
    /* height: 30px; */
    /* left: 0; */
    line-height: 32px;
    position: relative;
    text-align: center;
    width: 100%;
}


/* Progressbar */
.progressBar {
	background: none repeat scroll 0 0 #E0E0E0;
	left: 0;
	padding: 3px 0;
	position: absolute;
	top: 50%;
	width: 100%;
	display: none;
}
.progressBar .bar {
	background-color: #FF6C67;
	width: 0%;
	height: 14px;
}
.progressBar .percent {
	display: inline-block;
	left: 0;
	position: absolute;
	text-align: center;
	top: 2px;
	width: 100%;
}
 .form-group span.control-label {
    position:relative;
    margin-right:15px;
}
.form-group span.control-label:after {
    position:absolute;
    content:'*';
    color:red;
    right:-10px;
    top:0
}
.btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
}
.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}
.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}
</style>
