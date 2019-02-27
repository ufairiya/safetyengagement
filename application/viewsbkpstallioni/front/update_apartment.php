<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Apartment Management</h2>
				</div>
			</div>
		</div>
		
		<!-- New Apartment -->
		<div class="col-lg-6 col-md-12 upapt_right padding-right-30 margin-bottom-30" style="float:right;">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Updating <?php echo $get_property_row->property_name; ?> </h4>
				<div class="dashboard-list-box-static form">
				<?php	if($get_property_row){ ?>
					<form id="update_property" method="post" enctype="multipart/form-data">
						<div class="my-profile">
							<label>Apartment Title</label>
							<input type="hidden" name="apart_id"value="<?php echo $get_property_row->ID; ?>"/>
							<input type="text" name="apart_title" placeholder="Punggol View Apartment" value="<?php echo $get_property_row->property_name; ?>"/>
						
							<label>Address</label>
							<textarea cols="30" name="apartment_addr" rows="2" placeholder="Punggol View Ln Blk 321 #11-11, Singapore 530321"><?php echo $get_property_row->property_address; ?></textarea>
						</div>
						<button class="button margin-top-15">Update</button>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
	
		<!-- Apartment List -->
		<div class="col-lg-6 col-md-12 upapt_left padding-right-30 margin-bottom-30" style="float:left;">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Apartment Listings <a class="pull-right icon_addbutton" href="<?php echo $base_url; ?>property"><i class="im im-icon-Add"></i></a></h4>
				<ul>
					<?php foreach($get_property_list as  $get_property_list_detail){ ?>
					<li>
						<div class="list-box-listing">
							<div class="list-box-listing-content">
								<div class="inner">
									<h3><a href="#"><?php echo ucwords($get_property_list_detail->property_name); ?></a></h3>
									<span><?php echo $get_property_list_detail->property_address; ?></span>
								</div>
							</div>
						</div>
						<div class="buttons-to-right">
							<a href="<?php echo $base_url; ?>property/update_apartment?apart_id=<?php echo $get_property_list_detail->ID; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
							<a href="<?php echo $base_url; ?>property/delete_apartment?apart_id=<?php echo $get_property_list_detail->ID; ?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
						</div>
					</li>
					<?php } ?>
					
				</ul>
			</div>
		</div>
		
		
	</div>
</div>

<script type="application/javascript">
jQuery(document).ready(function(e) {
	 var form1 = $('#update_property');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'apart_title': {
                    required: 'Apartment Title is required',
                },
				 'apartment_addr': {
                    required: 'Address is required',
                },
                
            },
            
            rules: {
                apart_title: {
                    required: true
                },
				
				apartment_addr: {
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
					url : '<?php echo $base_url?>property/update_apartment_details',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
					toastr.options = {
										"closeButton": true,
									}
									toastr.success("Apartment have been successfully updated.");	
									setTimeout(function(){// wait for 5 secs(2)
												window.location.href = "<?php echo $base_url?>property";

								}, 3000); 			 
		
					}
				});
            }
        });
        
    });
 </script>   
