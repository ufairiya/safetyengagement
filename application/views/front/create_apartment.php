<link rel="stylesheet" href="<?php echo $base_url;  ?>assets/css/bootstrap.min.css" type="text/css"> 
<div class="container">
	<div class="row">
	
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
<!--
					<?php	
    if(!empty($this->session->flashdata('updateapartment'))){
    ?>

       <script> jQuery(document).ready(function(e) {

						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Apartment have been successfully deleted.");	
						setTimeout(function(){// wait for 5 secs(2)
					//location.reload(); // then reload the page.(3)
											//window.location.href ='<?php echo $base_url?>my-request/active-request/?active=pending';

					 
					}, 3000); }); </script>
    <?php } ?>
-->
				<div class="listing-titlebar-title">
					<h2>Apartment Management</h2>
				</div>
			</div>
		</div>
	
		<!-- New Apartment -->
		<div class="col-lg-6 col-md-12 upapt_right padding-right-30 margin-bottom-30" style="float:right;">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Add Apartment</h4>
				<div class="dashboard-list-box-static form">
					<form id="add_property" method="post" enctype="multipart/form-data">
						<div class="my-profile">
							<label>Apartment Title</label>
							<input type="text" name="apart_title" class="apart_title" placeholder="Punggol View Apartment"/>
							
							<label>Address</label>
							<textarea cols="30" name="apartment_addr" class="apartment_addr" rows="2" placeholder="Punggol View Ln Blk 321 #11-11, Singapore 530321"></textarea>
								
								
						</div>
						<button class="button margin-top-15">Add</button>

					</form>
				</div>
			</div>
		</div>
	
		<!-- Apartment List -->
		<div class="col-lg-6 col-md-12 upapt_left padding-right-30 margin-bottom-30" style="float:left;">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Apartment Listings</h4>
			
                    <?php if(!empty($get_property_list)) { ?>	
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
<!--
							<a class="button gray confirmation" href="<?php echo $base_url; ?>property/delete_apartment?apart_id=<?php echo $get_property_list_detail->ID; ?>" ><i class="sl sl-icon-close"></i> Delete</a>
						</div>
-->
							<a class="button gray confirmation" data-pid="<?php echo $get_property_list_detail->ID; ?>" href="#" ><i class="sl sl-icon-close"></i> Delete</a>
						</div>
					</li>
					<?php } ?>
					
				</ul>
					<?php
				 }
				else
				{
				?>
					<ul>
				   <!-- Single Listing Item / End -->
				   <li class="approved-booking" style="background-color: #f9f9f9;">
					  <div class="list-box-listing bookings">
						 <span class="norecfod">	NIL</span>
					  </div>
					  <!-- Listing Item / End -->
				   </li>
				   </ul>
				<?php
				}
				?>
			</div>
		</div>
		
		
	</div>
</div>
<style>
.help-block 
{
	margin-bottom:0 !important;
	}

</style>
<script type="application/javascript">
	jQuery(document).ready(function(e) 
	{
		var form1 = $('#add_property');
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
					url : '<?php echo $base_url?>property/add_new_apartment',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
						toastr.options = {
										"closeButton": true,
									}
									toastr.success("Apartment have been successfully added.");	
									setTimeout(function(){// wait for 5 secs(2)
										window.location.href = "<?php echo $base_url?>property";

								}, 3000); 		
		
							
					}
				});
            }
        });
        
    });
  

    //~ var elems = document.getElementsByClassName('confirmation');
    $(".confirmation").click(function(e){
e.preventDefault()
     var pid=$(this).attr("data-pid");
 
    jQuery.ajax({
					url : '<?php echo $base_url?>property/check_properity',
					type: 'POST',
					data: {pid:pid},
					success:function(response){
						if(response == 'success'){
							
								toastr.options = {
										"closeButton": true,
									}
									//~ toastr.error("Assigned should not be deleted. Assigned pending or awaiting confirmation or awaiting service");	
									
							 toastr.error("Delete not allowed! Service requested for this apartment has yet to be completed.");	
									
									setTimeout(function(){// wait for 5 secs(2)
										window.location.href = "<?php echo $base_url?>property";

								}, 3000); 		
		
						}else{
								toastr.options = {
										"closeButton": true,
									}
									toastr.success("Apartment have been successfully deleted.");	
									setTimeout(function(){// wait for 5 secs(2)
										window.location.href = "<?php echo $base_url; ?>property/delete_apartment?apart_id="+pid;

								}, 3000); 		
		
							
							}
							
					}
				});	
						});
    
    

 </script> 
