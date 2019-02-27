<form id="privileges_edit_form" method="post">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
  <h4 class="modal-title"> Edit Privilege type</h4>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
 <?php if($get_of_privileges != FALSE){ ?>
                  <!-- BEGIN FORM-->                    
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="privileges_name" id="privileges_name" value="<?php echo $get_of_privileges->access_privileges_name ?>">
                                <label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> Name</label>
                            </div>
                            <div class="form-group form-md-line-input">
                                <textarea  class="form-control edit" name="privileges_desc" id="privileges_desc"><?php echo $get_of_privileges->access_privileges_desc ?></textarea>
                                <label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> <?php echo $this->lang->line('description'); ?></label>
                            </div>                                                                                                    
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="privileges_key_id" name="privileges_key_id" value="<?php echo $get_of_privileges->id_access_privileges?>" >
                                    <input type="hidden" class="form-control" name="action_type" value="update" >
                                </div>
                            </div>
                        </div>
      <?php } ?>
<div class="modal-footer">
  <button type="button" class="btn default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn blue"><?php echo $this->lang->line('save'); ?></button>
</div>
 </form>

<script type="application/javascript">
(function($){
       var form1 = $('#privileges_edit_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input   
			 messages: {      
				'privileges_name': {
					required: 'Please Enter the Privileges Name',
					remote	: 'Privileges Name already exists',
				},
				'privileges_desc': {
					required: 'Please Enter the Privileges Description',
				},

			 },
            rules: {
                privileges_name: {
                    required: true,
					remote: {
						url: "<?php echo $base_url?>/privileges/privileges_unquie",
						type: "post",
						data: {
						priv_name: function() {
							return $("#privileges_name" ).val();
			    			},
						priv_key: function() {
							return $( "#privileges_key_id" ).val();
			    			}
		    			}
	     			}
                },			
             	privileges_desc: {
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
					url : '<?php echo $base_url?>privileges/privileges_save',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
                            "closeButton": true,
                        }
                       
                        toastr.success("Privileges updated Succesfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500);       
                        
					}
				});
            }
        });
})(jQuery);
</script>
