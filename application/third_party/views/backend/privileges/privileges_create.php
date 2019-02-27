<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"><?php echo $this->lang->line('new_privileges'); ?></h1>
                    <div class="page-bar">
                <ul class="page-breadcrumb">

              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('new_privileges'); ?></span> </li>
            </ul>
            </div>
            
                 <div class="portlet light portlet-fit portlet-datatable ">
                <div class="portlet-title">
                  <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase"> <?php echo $this->lang->line('new_privileges'); ?> </span> </div>
                  <div class="actions">
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                  <!-- BEGIN FORM-->
                    <form id="privileges_add_form" method="post">
                    <?php
                    $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                    ); ?>
                   <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" name="privileges_name" id="privileges_name">
                                <label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> Name</label>
                            </div>
                            <div class="form-group form-md-line-input">
                                <textarea  class="form-control edit" name="privileges_desc" id="privileges_desc"></textarea>
                                <label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> <?php echo $this->lang->line('description'); ?></label>
                            </div>                                                                                                    
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="privileges_key_id" >
                                    <input type="hidden" class="form-control" name="action_type" value="insert" >
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
       var form1 = $('#privileges_add_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        var token = '<?php echo $this->config->item("csrf_protection");?>';

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
						url: "<?php echo $base_url?>privileges/privileges_unquie",
						type: "post",
						data: {
						priv_name: function() {
							return $("#privileges_name" ).val();
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
						window.location.href = '<?php echo $base_url?>privileges';
					}
				});
            }
        });
});
</script>