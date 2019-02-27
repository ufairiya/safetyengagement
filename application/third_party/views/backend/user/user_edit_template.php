<?php global $mobile_country_code,$country_array;?>

 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $this->lang->line('edit user'); ?> </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        <?php if($get_user != FALSE){ ?>
        <form id="update_user" method="post">

            <div class="form-body ">
            					<div style="display:none;">
                                     <input type="hidden" name="user_id" id="user_id" value="<?php echo $get_user->id_user_master;?>">
                                    </div>
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $get_user->first_name;?>">
                    <label for="form_control_1">First name </label>
                </div>
<!--
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo $get_user->last_name;?>">
                    <label for="form_control_1"><?php echo $this->lang->line('last name'); ?> </label>
                </div>
-->
                 <div class="form-group form-md-line-input">
                    <input type="text" class="form-control phone" name="phone" id="phone" value="<?php echo $get_user->phone;?>">
                    <label for="form_control_1"><?php echo $this->lang->line('phone'); ?> </label>
                </div>  
<!--
                                    
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $get_user->username;?>">
                    <label for="form_control_1"><?php echo $this->lang->line('user name'); ?></label>
                </div>
-->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="useremail" id="useremail" value="<?php echo $get_user->email;?>">
                    <label for="form_control_1"><?php echo $this->lang->line('email'); ?></label>
                </div>
                <div class="form-group form-md-line-input">
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <label for="form_control_1"><?php echo $this->lang->line('password'); ?></label>
                </div>                               
                <div class="form-group form-md-line-input">
                   <select name="user_type" class="form-control" id="user_type">
                        <option value=""></option>
                        <?php if($user_type != FALSE){
                            foreach($user_type as $user_type_key => $user_type_value){
								$selected = ($user_type_value->level_key == $get_user->user_type) ? 'selected="selected"' : '' ;
                            ?>
                        <option value="<?php echo $user_type_value->level_key ?>" <?php echo $selected;?>><?php echo $user_type_value->level_name ?></option>
                        <?php }											
                        } ?>
                   </select>
                    <label for="form_control_1"><?php echo $this->lang->line('user type'); ?> </label>
                </div>
                <div class="form-group form-md-line-input">
                        <select class="form-control" name="user_status" id="user_status">
                            <option value="1" <?php echo  ($get_user->status == 1) ? 'selected="selected"' : "";?>  >Active</option>
                            <option value="2" <?php echo  ($get_user->status == 2) ? 'selected="selected"' : "";?> >Inactive</option>
                        </select>
                        <label for="form_control_1"><?php echo $this->lang->line('user status'); ?></label>
                </div>
              <?php 
              $address_display = ($get_user->user_type !='superuser') ? 'display:block':'display:none';
              $state = isset($get_user->state) ? $get_user->state : '';
              $city = isset($get_user->city) ? $get_user->city : '';
              $zip_code = isset($get_user->post_code) ? $get_user->post_code : '';
              $country = (isset($get_user->country) && $get_user->country!='') ? $get_user->country : 'US';
              $id_user_address = (isset($get_user->id_user_address) && $get_user->id_user_address!='') ? $get_user->id_user_address : 0;
              $user_cust_code = (isset($get_user->user_cust_code) && $get_user->user_cust_code!='') ? $get_user->user_cust_code : 0;
              ?>
              <div id="address" style="<?php echo $address_display;?>">
              <?php echo form_hidden('id_user_address', $id_user_address);
              echo form_hidden('user_cust_code', $user_cust_code);
               ?>
                               
                                </div>

           </div>

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
</div>

               
<script type="application/javascript">
(function($){
       var form1 = $('#update_user');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'first_name': {
                    required: 'Please Enter the first name',
                },
				 'last_name': {
                    required: 'Please Enter the last name',
                },
				 'last_name': {
                    required: 'Please Enter the last name',
                },
				
				 'username': {
                    required: 'Please Enter the username',
					remote : " Username already taken"
                },
				 'useremail': {
                    required: 'Please Enter the email',
					email: 'Please Enter valid email',
					remote : " Email already taken"
					
                },				
				 'user_type': {
                    required: 'Please Enter the user type',
                },
            
            },
            rules: {
                first_name: {
                    required: true
                },
				last_name: {
                    required: true
                },
				username: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>admin/user/unquie",
					type: "post",
					data: {
						type:'username',
						username: function() {
							return $( "#username" ).val();
							},
						u_key: function() {
							return $( "#user_id" ).val();
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
							},
						u_key: function() {
							return $( "#user_id" ).val();
			    			}
						}
					}
					
                },
				password: {
					 minlength: 6
                },
				user_type: {
                    required: true
                },
                street_address: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
        city: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
        state: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
       postcode: {
                          required: {
                            depends: function(element) {
                                return $("#user_type").val() != 'superuser';
                            }
                           },
                           digits:true,
                      }, 
      country: {
                          required: {
                            depends: function(element) {
                                return $("#user_type").val() != 'superuser';
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

            submitHandler: function(form,event) {
          //  event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/user/update_user',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("User Updated Succesfully", "Notifications");
						setTimeout(function(){ location.reload(); }, 500);			
						}
					});
            }
        });
})(jQuery);
jQuery(document).ready(function(){
   jQuery('#user_type').on('change', function() {
       
      if ( this.value != 'superuser')
     
      {
        $("#address").show();
      }
      else
      {
        $("#address").hide();
      }
    });
});
$(".trigger").click(function(){
  $(".trigger").not(this).next(".toggle").slideUp("slow");
  $(this).next(".toggle").slideToggle("slow");
});
</script>
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
