<?php global $mobile_country_code,$singapour_country;?>
	<div class="dashboard-content">
<div class="">
		<!-- BEGIN CONTENT BODY -->
        <div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			
          
             <div class="tab-pane active">
                <div class="portlet box gray">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Add New Task Category
                        </div>                       
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
          
                        <form id="add_new_taskcategory" class="form-horizontal" method="post">
                     
                            <div class="form-body">
								
                                <div class="form-group">
									<label class="col-md-3 control-label"> Name</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="taskcat_name" id="taskcat_name"> 
									</div>
								</div>
                                <div class="form-group">
									<label class="col-md-3 control-label"> Description</label>
									<div class="col-md-9">
										
        <div class="page-wrapper box-content">

            <textarea name="taskcat_desc" id="taskcat_desc" class="content_desc"></textarea>

        </div>
								
									</div>
								</div>

								 <div class="form-group">
									<label class="col-md-3 control-label"> Image</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="taskcat_img" id="taskcat_img"> 
									</div>
								</div>
								 
<!--
                                     <div class="form-group">
                                   		<div class="row">
                                            <label class="col-md-3 control-label">Icon Color</label>
                                            <div class="col-md-3">
                                                <input type="text" id="hue-demo" class="form-control demo" data-control="hue" name="icon_color" value="#ff6161"> 
                                                </div>
                                                </div>
                                        </div>
                                         <div class="clearfix"></div>
                                        
                                        <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Select icon</label>
                                            <div class="col-md-3">
                                                 <button class="btn btn-default" id="convert_status_icon" role="iconpicker"></button>
                                                 <input type="hidden" name="icon_value" id="status_icon_picker" value="" />
                                                 </div>
                                                  </div>
                                        </div>
-->
                                        
                                        
								<div class="form-group">
									<label class="col-md-3 control-label"> Status</label>
									<div class="col-md-9">
										<select name="status" class="form-control" id="status">											
											<option value="active">active</option>
											<option value="deactive">deactive</option>
										</select>  
										
									</div>
								</div>

								<div class="form-actions right">
									<input type="hidden" class="form-control" name="status_key" >
                                            <input type="hidden" class="form-control" name="action_type" value="insert" >
									<button type="button" class="btn default">Cancel</button>
									<button type="submit" class="btn blue">
									<i class="fa fa-check"></i> Save</button>
								</div>
                            
							</div>
							
                        </form>                         
                        
                        <!-- END FORM-->
                    </div>
                
                </div>                                          
             </div>          
            
        </div>
		<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->        
 	</div>        
<script type="application/javascript">
jQuery(document).ready(function(e) 
{
	//~ var form1 = $('#add_new_taskcategory');
	//~ var error1 = $('.alert-danger', form1);
	//~ var success1 = $('.alert-success', form1);

	//~ form1.validate
	//~ ({
		//~ errorElement: 'span', //default input error message container
		//~ errorClass: 'help-block help-block-error', // default input error message class
		//~ focusInvalid: false, // do not focus the last invalid input
		//~ ignore: "", // validate all fields including form hidden input
		//~ messages: {  
			 //~ 'taskcat_name': {
                    //~ required: 'Please Enter the Task Category name',
					//~ remote : "Task category name already taken"
                //~ },            			
			//~ property_name:'Please Enter the  property name',
			
		//~ },
		 //~ rules: {
			 //~ property_name: {
				 //~ required: true,
				 //~ remote: {
					 //~ url: "<?php echo $base_url; ?>admin/task/unquie_taskcategory",
					 //~ type: "post",
				 //~ data: {
						 //~ type:'propertyname',
					 //~ username: function() {
							 //~ return $( "#taskcat_name" ).val();
							 //~ }
						 //~ }
					//~ }
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
		//~ //event.preventDefault();
		
			//~ jQuery.ajax({
				//~ url : '<?php echo $base_url?>admin/task/createtaskcategory',
				//~ type: 'POST',
				//~ data: jQuery(form).serialize(),
				//~ success:function(response){    
					//~ jQuery(form)[0].reset();
					//~ toastr.options = {
						//~ "closeButton": true,
					//~ }
					//~ toastr.success("New Task Category Created Succesfully", "Notifications");		
				//~ }
			//~ });
		//~ }
	//~ });
	
			 $('#convert_status_icon').iconpicker().on('change', function(e) {
                    $("#status_icon_picker").val(e.icon);
                });
	jQuery('#convert_status_icon').on('change',function(){
			alert('hi');		
			var file = this.files[0];
			alert(file+'hi');
						alert('hi');		

			name = file.name;
			size = file.size;
			type = file.type;
		
			if(file.name.length < 1) {
			}
			else if(file.size > 100000) {
				jQuery(this).val('');
				alert("The file is too big max file size 1MB");
			}
			else if(file.type != 'image/png' && file.type != 'image/jpg' &&  file.type != 'image/jpeg' ) {
				jQuery(this).val('');
				alert("The file does not match png, jpg or jpeg");
			}
			else { 
				var form_data = new FormData();                  
				form_data.append('file', file);
				jQuery.ajax({
					url : '<?php echo $base_url?>type/status_icon_upload',
					type: 'POST',
					data: form_data,
					contentType: false,
					cache: false, 
					processData:false,
					success:function(response){
						if(response != 'fail'){
							toastr.success("Status Icon insert Successfully", "Notifications");
							jQuery('#icon_value').val(response);
						}else{
							toastr.warning("File not upload properly", "Notifications");
						}
					}
				});
			}	
	});
});

</script> 
 <script>  
 $(document).ready(function(){  
      $('#add_new_taskcategory').on('submit', function(e){  
           e.preventDefault();  
           if($('#taskcat_img').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/task/ajax_upload",   
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
                            			jQuery(form)[0].reset();
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("New Task Category Created Succesfully", "Notifications");	
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

