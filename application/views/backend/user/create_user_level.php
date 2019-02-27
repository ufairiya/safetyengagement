<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo $this->lang->line('create user level'); ?></h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
               <li> <span><?php echo $this->lang->line('user'); ?></span> <i class="fa fa-angle-right"></i></li>
              <li> <span><?php echo $this->lang->line('create user level'); ?></span> </li>
            </ul>
            </div>
           
            <div class="portlet light portlet-fit portlet-datatable ">               
                <div class="portlet-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                           <!-- BEGIN FORM-->
                            <form id="add_new_user" method="post">
                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" name="level_name" id="level_name">
                                        <label for="form_control_1"><?php echo $this->lang->line('user level name'); ?></label>
                                    </div>
									<div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" name="level_key" id="level_key">
                                        <label for="form_control_1"><?php echo $this->lang->line('user level key'); ?></label>
                                    </div>
                                    
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                    </div>
                  </div>
                </div>
              </div>
              
              
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

<script type="application/javascript">
jQuery(document).ready(function(e) {
       var form1 = $('#add_new_user');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'level_name': {
                    required: 'Please Enter the Level Name',
					remote	: 'Name already Exists'
                },
				 'level_key': {
                    required: 'Please Enter the Level Key',
					remote	: 'Name already Exists'
                },				
            
            },
            rules: {               
				
				level_name: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>admin//user/unquie_level",
					type: "post",
					data: {
						type:'name',
						level_name: function() {
							return $( "#level_name" ).val();
							}
						}
					}
                },				
             	level_key: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>admin//user/unquie_level",
					type: "post",
					data: {
						type:'key',
						level_key: function() {
							return $( "#level_key" ).val();
							}
						}
					}
					
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
					url : '<?php echo $base_url?>admin//user/create_new_user_level',
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
</script>
