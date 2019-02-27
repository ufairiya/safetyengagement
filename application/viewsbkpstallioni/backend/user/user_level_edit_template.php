 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $this->lang->line('edit user level'); ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        <?php if($get_user_level != FALSE){?>
                           <!-- BEGIN FORM-->
                            <form id="edit_new_user" method="post">
                                <div class="form-body">
                                    <div style="display:none;">
                                     <input type="hidden" name="level_id" id="level_id" value="<?php echo $get_user_level->id_user_levels?>">
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" name="level_name" id="level_name" value="<?php echo $get_user_level->level_name?>">
                                        <label for="form_control_1"><?php echo $this->lang->line('user level name'); ?></label>
                                    </div>
									<div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" name="level_key" id="level_key" value="<?php echo $get_user_level->level_key?>">
                                        <label for="form_control_1"><?php echo $this->lang->line('user level key'); ?></label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="level_status" id="level_status">
                                            <option value="1" <?php echo  ($get_user_level->status == 1) ? 'selected="selected"' : "";?>  >Active</option>
                                            <option value="2" <?php echo  ($get_user_level->status == 2) ? 'selected="selected"' : "";?> >Inactive</option>
                                        </select>
                                        <label for="form_control_1"><?php echo $this->lang->line('user level key'); ?></label>
                                    </div>
                                    
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">                                        
                                            <button type="submit" class="btn dark">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                  </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
 
</div>
<script type="application/javascript">
(function($){
	     var form1 = $('#edit_new_user');
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
					url: "<?php echo $base_url?>admin/user/unquie_level",
					type: "post",
					data: {
						type:'name',
						level_name: function() {
							return $( "#level_name" ).val();
							},
						level_id: function() {
							return $( "#level_id" ).val();
						  }
						}
					}
                },				
             	level_key: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>admin/user/unquie_level",
					type: "post",
					data: {
						type:'key',
						level_key: function() {
							return $( "#level_key" ).val();
							},
						level_id: function() {
							return $( "#level_id" ).val();
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
					url : '<?php echo $base_url?>admin/user/update_user_level',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						$('.close').click();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("User Level Updated Succesfully", "Notifications");
							setTimeout(function(){ location.reload(); }, 500);		
					}
					});
            }
        });
})(jQuery);
</script>
