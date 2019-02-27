<?php global $mobile_country_code,$country_array;?>

		<div class="dashboard-content">

<div class="">
   <div class="page-content">
       <h1 class="page-title"> <?php echo $this->lang->line('create new user/contractor'); ?> </h1>
       <div class="page-bar">
            <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> 
				<i class="fa fa-angle-right">
				</i> 
              </li>
              <li> <span><?php echo $this->lang->line('user'); ?></span> <i class="fa fa-angle-right"></i></li>
              <li> <span><?php echo $this->lang->line('create new user/contractor'); ?></span> </li>
            </ul>
       </div>
       <div class="tab-pane active">
          <div class="portlet box gray">
              <div class="portlet-title">
                  <div class="caption" >
                       <i class="fa fa-gift"></i>Create User / Contractor</div>                       
                   </div>
                   <div class="portlet-body form">
                      <!-- BEGIN FORM-->
                         <div class="form-body">
                            <h3 class="form-section">User Info</h3>
							<div class="row">
                               <div class="col-md-12"><div class="col-md-3"></div>
                               <div class="col-md-6">
                                 <div class="form-group">
<div id="img_notifction" class='img_notifction'></div>								    <label class="control-label">Profile Image</label>
									<div id="imgContainer">
				                      <div id="uploaded_image"> <img src="<?php echo base_url(); ?>assets/images/default.jpg"> 
									  </div>   
				    		        </div>
								 </div>
								 <div id="imgChange"><span class="cen_imagename">
								  	<form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
										<div class="upload-btn-wrapper">
  <button class="btn">Choose a file</button>
										<input type="file" name="image_file" id="image_file" />  
</div>
										<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
									</form>  
									</span>
								 </div> </div>
								 <div class="col-md-3"></div>
								 							</div>
						</div>
							<form id="add_new_user" class="horizontal-form" method="post" enctype="multipart/form-data">
    						<div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label"><?php echo $this->lang->line('User Name'); ?> <span class="control-label"></span></label>
                                     
                                      <input type="text" class="form-control" name="user_name" id="user_name">           
                                      <input type="hidden" class="form-control imag_val" name="imag_val" id="imag_val">           
                                  </div>
                               </div>
							   <div class="col-md-6">
								  <div class="form-group">
									<label for="form_control_1"><?php echo $this->lang->line('user type'); ?><span class="control-label"></span></label>
									
									<select name="user_type" class="user_type" id="user_type" >
										<option value="">Choose User Type</option>
											<?php if($user_type != FALSE)
											{ 
												foreach($user_type as $user_type_key => $user_type_value)
												{
											 ?>
													<option value="<?php echo $user_type_value->level_key; ?>"><?php echo $user_type_value->level_name; ?>
													</option>
											<?php }                                         
											} ?>
									</select>
								  </div>
							   </div>
							</div>
							<div class="row">
                               <div class="col-md-6"> 
								  <div class="form-group">
									 <label for="form_control_1"><?php echo $this->lang->line('User Phone'); ?> Number<span class="control-label"></span></label>
									 
									 <input class="form-control phone" id="phone" type="text" name="phone" />
								  </div>  
							   </div>	
                               <div class="col-md-6">
						          <div class="form-group">
                                      <label for="form_control_1"><?php echo $this->lang->line('Alternative Phone'); ?> Number</label>
                                      <input class="form-control phone" id="alterphone" type="text" name="alterphone" />
                                  </div>  
                               </div>
                            </div>
                            <div class="row">
							   <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="form_control_1"><?php echo $this->lang->line('User Email'); ?><span class="control-label"></span></label>
                                      
                                      <input type="text" class="form-control" name="useremail" id="useremail">
                                   </div>
                               </div>
							   <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="form_control_1"><?php echo $this->lang->line('Alternative User Email'); ?></label>
                                      <input type="text" class="form-control" name="alteruseremail" id="alteruseremail">
                                  </div>
                               </div>   
                            </div>
                            <div class="row">
                               <div class="col-md-6">
								  <div class="form-group">
                                     <label for="form_control_1"><?php echo $this->lang->line('Password'); ?><span class="control-label"></span></label>
                                     <input type="password" class="form-control" name="password" id="password">
                                  </div>  
                               </div>   
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label for="form_control_1"><?php echo $this->lang->line('Confirm Password'); ?><span class="control-label"></span></label>
                                     <input type="password" class="form-control" name="confpassword" id="confpassword">
                                  </div>   
                               </div>
                            </div>
                            <div id="address" style="display: none;">
                               <h3 class="form-section">User Address</h3>
                               <div class="row">
                                   <div class="col-md-12 ">
									  <div class="form-group">
										 <label for="form_control_1">Street <span class="control-label"></span></label>
										
                                         <input type="text" class="form-control addrematt" name="street_address" id="street_address">
                                     </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_control_1">City<span class="control-label"></span></label>
                                            <input type="text" class="form-control addrematt"   name="city" id="city"> 
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_control_1">Country<span class="control-label"></span></label>
<!--
                                            <input type="text" class="form-control addrematt" name="state" id="state">
-->
                                            <select name="country" class="" id="country">												
												<option value="singapour">singapour</option>
											</select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
										 <div class="form-group">
                                           <label for="form_control_1">Apartment/House Number<span class="control-label"></span></label>
                                           <input type="text" class="form-control addrematt" name="aparthouse"  id="aparthouse"> 
                                         </div>
								    </div>
                                    <div class="col-md-6">
										<div class="form-group">
                                           <label for="form_control_1">Zip Code<span class="control-label"></span></label>
                                           <input type="text" class="form-control "  name="postcode"  id="postcode"> 
                                        </div>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-md-6">
										 <div class="form-group">
                                           <label for="form_control_1">Gender<span class="control-label"></span></label>
                                            <select name="gender" class="" id="gender">												
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select> 
                                         </div>
								    </div>
                                    <div class="col-md-6">
										
									</div>
								</div>
                               
<!--
                                <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="form_control_1">Country</label><span class="control-label"></span>
                                            
                                              <?php 
                                              //~ $attributes = array(
                                              //~ 'id'       => 'country',
                                              //~ 'class'       => 'form-control addrematt',
                                            
                                              //~ );
                                              //~ echo form_dropdown('country', $country_array,'US',$attributes);

                                              ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                           
-->
                            </div>
							<div id="address_cont" style="display: none;">
								<h3 class="form-section">Contractor Address</h3>
								<div class="row">
									<div class="col-md-12 ">
									   <div class="form-group">
										  <label for="form_control_1">Street<span class="control-label"></span></label>
										  <input type="text" class="form-control addrematt_cont"  name="contstreet_address"   id="contstreet_address">
									   </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_control_1">City<span class="control-label"></span></label>
											<input type="text" class="form-control addrematt_cont"   name="contcity" id="contcity"> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_control_1">State<span class="control-label"></span></label>
<!--
											<input type="text" class="form-control addrematt_cont"  name="contstate" id="contstate">
-->
											<select name="contstate" class="" id="contstate">												
												<option value="singapour">singapour</option>
											</select>  
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group"> 
											<label for="form_control_1">Skill Category
														<span class="control-label"></span></label>
														<select name="skills[]" class="" id="skills" multiple>																<?php foreach($admin_of_task as $admin_of_task_val) { ?>
									
												<option value="<?php echo $admin_of_task_val->id; ?>"><?php echo $admin_of_task_val->taskcategory_name; ?></option>
												<?php } ?>
											</select>  
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
												<label for="form_control_1">Company Name<span class="control-label"></span></label>
												<input name="comname" class="" id="comname"  value=""/>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_control_1">Work Permit Number<span class="control-label"></span></label>
														<input name="wpno" class="" id="wpno" value=""/>												

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
												<label for="form_control_1">Work Permit Expiry Date<span class="control-label"></span></label>
														<input name="wpexpirydate" class="" id="wpexpirydate" />												
												
										</div>
									</div>
								</div>
								
								<div class="row">
<!--
									<div class="col-md-6">
										<div class="form-group"> 
											<label for="form_control_1">Skill Category
														<span class="control-label"></span></label>
														<select name="skills" class="" id="skills" multiple>																<?php foreach($admin_of_task as $admin_of_task_val) { ?>
									
												<option value="<?php echo $admin_of_task_val->id; ?>"><?php echo $admin_of_task_val->taskcategory_name; ?></option>
												<?php } ?>
											</select>  
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
												
										</div>
-->
									</div>
								</div>
								
								
<!--
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="form_control_1">Country</label><span class="control-label"></span>
											<?php 
											  $attributes = array(
											  'id'       => 'contcountry',
											 'class'    => 'form-control addrematt_cont',
											  );
											 echo form_dropdown('contcountry', $country_array,'US',$attributes);
											?>
										</div>
									</div>
									<div class="col-md-6">
    								</div>
							    </div>
							
							
-->
							</div>
                            <div class="form-actions right">
                                <button type="button" class="btn default">Cancel</button>
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-check"></i> Save</button>
                            </div>
                        </div>
                      </form>
                  </div>
              </div>
          </div>
       </div>
   </div>       <!-- END CONTENT  -->
</div>          <!-- END CONTENT WRAPPER-->        
</div>  
<script type="application/javascript">
jQuery(document).ready(function(e) 
{
	
       var form1 = $('#add_new_user');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
               				
				 'username': {
                    required: 'Please Enter the username',
					remote : " Username already taken"
                },
				 'useremail': {
                    required: 'Please Enter the email',
			email: 'Please Enter valid email',
			remote : " Email already taken"
                },
				 'password': {
                    required: 'Password should not empty',					
                },
				 'confpassword': {
                    required: 'Confirm Password should not empty',					
                },
				 'user_type': {
                    required: 'Please Enter the user type',
                },
            phone: 'Please Enter phone Number',
			//~ street_address: 'Please Enter Address',
			//~ city: 'Please Enter City',
			//~ state: 'Please Enter State',
			//~ postcode: 'Please Enter Zip Code',
			//~ aparthouse: 'Please Enter apartment/house Number',
         
            },
            rules: {
               			user_name: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>admin/user/unquie",
					type: "post",
					data: {
						type:'username',
						user_name: function() {
							return $( "#user_name" ).val();
							}
						}
					}
                },
				phone: {
					required: true,
					
				},
             	useremail: {
                    required: true,
					email:true,
					remote: {
					url: "<?php echo $base_url?>admin/user/unquie",
					type: "post",
					data: {
						type:'email',
						useremail: function() {
							return $( "#useremail" ).val();
							}
						}
					}
					
                },
				password: {
                    required: true,
					minlength: 6,
                },
				confpassword: {
                    required: true,
					minlength: 6,
                },
				user_type: {
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
			    url : '<?php echo $base_url; ?>admin/user/create_new_user',
				data: jQuery(form).serialize(),
				type: 'POST',
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

jQuery(document).ready(function(){
    jQuery('.user_type').on('change', function() {
var opt_val = this.value ;
      if(opt_val == 'application_user')    
      {
        $("#address").show();
        $('.addrematt').attr( 'required', 'required');
      }
      else
      {
        $("#address").hide();
         $('.addrematt').removeAttr( 'required', 'required');

      }
      if(opt_val == 'contractor')    
      {
        $("#address_cont").show();
                $('.addrematt_cont').attr( 'required', 'required');

      }
      else
      {
        $("#address_cont").hide();
                 $('.addrematt_cont').removeAttr( 'required', 'required');

      }
    });
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
                       dataType : 'json',
 
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
						   $('#img_notifction').html('<span class="alert alert-danger">Image not upload</span>');
						
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
<!--
    background: url(http://stallioni.net/B279/assets/images/overlay.png) repeat scroll 0 0 rgba(0, 0, 0, 0);
-->
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

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
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

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
