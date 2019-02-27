<!-- BEGIN CONTENT -->
           <div class="dashboard-content">
           
	<!-- BEGIN CONTENT BODY -->
	<div class="">
	<!-- BEGIN PAGE HEADER-->
		<h1 class="page-title">Update Task</h1>
		<div class="page-bar">
			<ul class="page-breadcrumb">
			   <li><a href="<?php echo $base_url; ?>">home</a> <i class="fa fa-angle-right"></i> </li>
			   <li><span>Task</span> <i class="fa fa-angle-right"></i></li>
			   <li><span>Update Task</span> </li>
			</ul>
		</div>
        <div class="tab-pane active">
            <div class="portlet box gray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Update Task
                    </div>                       
                </div>
                <div class="portlet-body form">
				
		<div class="row">
			<div class="col-md-12 form">
				<?php 
				if(isset($getlistpricedetails) ){ 
					
				?>
						<div class="form">
					<div class="form-body"> 
					<div class="form-group col-md-12"> 	
						
				
						<form id="new_taskupdate" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="id" id="id" value="<?php echo $getlistpricedetails->id;?>">
							
			<input type="hidden" class="form-control" name="task_catid" id="task_catid" value="<?php echo $getlistpricedetails->categoriesid;?>"> 

							
								<div class="form-group col-md-12">
									<label class="col-md-3 control-label"> Sub Title</label>
									<div class="col-md-9">
										<?php $pricename_array = unserialize($getlistpricedetails->pricename); 
										$price_array = unserialize($getlistpricedetails->price); 
										$price_description = unserialize($getlistpricedetails->description); ?>
							  <div class="field_wrapper">
                                  <input type="text" class="form-control" name="sub_title" id="sub_title" value="<?php echo $getlistpricedetails->sub_title ?>"> 
										 <span class="col-md-12" ><label class="col-md-4 control-label"> Price name/Price :</label></span>
											  <?php					  
													 $pricename_array_count = count($pricename_array);
													$pricename_array_count= $pricename_array_count-1;
							for($i=0; $i<=$pricename_array_count;$i++ ){ ?> <div>
							<span class="col-md-6" > <input type="text" name="cate_price_name[]" value="<?php echo $pricename_array[$i]; ?>"/> </span> <span class="col-md-6" ><input type="text" name="cate_price[]" value="<?php echo $price_array[$i]; ?>"/></span>   <div class="form-group col-md-12">
									<label class="col-md-3 control-label"> Description</label>
									<div class="col-md-9">
										<textarea class="form-control" name="desc" id="description" ><?php echo $price_description[$i] ?></textarea> 
									</div>
								</div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo $base_url; ?>assets/icon/remove-icon.png"/></a> </div><?php } ?>
       </div>
<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo $base_url; ?>assets/icon/add-icon.png"/></a>
									</div>
								</div>
									<div class="form-group col-md-12">
									<label class="col-md-3 control-label">Task Categories Name</label>
									<div class="col-md-9">
										<select name="task_catname" class="form-control task_catname" id="task_catname" >
											<?php foreach($task_type as $task_name) { ?>
												<option data-catid="<?php echo $task_name->id ?>"  class="form-control"  <?php  if($getlistpricedetails->categoriesname == $task_name->taskcategory_name){ echo 'selected="selected"';} ?>  value="<?php echo $task_name->taskcategory_name ?>"><?php echo $task_name->taskcategory_name ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								
						
<!--
								<div class="form-group col-md-12">
									<label class="col-md-3 control-label"> Property Id</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="property_type" id="property_type" value="<?php echo $getlisttaskdetails->apartment_id ?>"> 		
									</div>
								</div>
-->
								<div class="form-group col-md-12">
									<label class="col-md-3 control-label"> Status</label>
									<div class="col-md-9">
										<select class="form-control" name="status" id="status">
											<option value="1" <?php echo ($getlistpricedetails->status == 'active') ? 'selected="selected"' : "";?>  >active</option>
											<option value="2" <?php echo ($getlistpricedetails->status == 'deactive') ? 'selected="selected"' : "";?> >Deactive</option>
											
										</select>
								   </div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<button type="submit" id="destroyall" class="destroyall btn blue">
												<i class="fa fa-check" ></i> Save</button>
											</div>
										</div>
									</div>
								</div>
							
						</form>
					</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</div>
	
</div>
</div> </div>                                          
				</div>          
            </div>
        </div>
    </div> 
</div>


<script>  
   $(document).ready(function(e){  
	   
	   	
	var form1 = $('#new_taskupdate');
	var error1 = $('.alert-danger', form1);
	var success1 = $('.alert-success', form1);

	form1.validate
	({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "", // validate all fields including form hidden input


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
	   
            
        
                  $.ajax({  
                       url:"<?php echo base_url(); ?>admin/prices/update_price",   
                       method:"POST",  
				data: jQuery(form).serialize(),
                       	success:function(response){    
					jQuery(form)[0].reset();
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("Updated Price Category  Succesfully", "Notifications");
					    $(".delete").click(); 
						return false;		
				}
                  });  
           
  }
	});
	
	$('select.task_catname').on('change', function() {
	   
	       var catid = $('option:selected', this).attr('data-catid');

   $('#task_catid').val(catid);

    });
	});
   
</script> 

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><span class="col-md-6" ><input type="text" name="cate_price_name[]" value=""/> </span> <span class="col-md-6" ><input type="text" name="cate_price[]" value=""/></span><div class="form-group"><label class="col-md-3 control-label"> Description</label>			<div class="col-md-9"><textarea name="desc[]" Placeholder="Description"></textarea></div></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo $base_url; ?>assets/icon/remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){
		//alert('sfdf'); //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    
});  
 </script> 
