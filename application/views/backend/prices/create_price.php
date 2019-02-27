<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">

			<!-- Titlebar -->
			<div id="titlebar">
				<div class="row">
					<div class="col-md-12">
						<h2>Price Management</h2>
					</div>
				</div>
			</div>
<div class="">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h1 class="page-title">Add New Task Category</h1>
		<div class="page-bar">
			<ul class="page-breadcrumb">
			<li><a href="<?php echo $base_url; ?>">home</a> <i class="fa fa-angle-right"></i> </li>
			<li><span>Task</span> <i class="fa fa-angle-right"></i></li>
			<li><span>Add New Task Category</span> </li>
			</ul>
		</div>
		<div class="tab-pane active">
			<div class="portlet box gray">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Add New Task Category
					</div>                       
				</div>
				<div class="portlet-body form">
					<form id="add_new_taskcategory" class="form-horizontal" method="post">
						<div class="form-body">
							<div class="add_overall">
								<div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Title</label>
										<div class="col-md-9">
											<div class="field_wrapper">
												<div>
													<span class="col-md-12" ><input placeholder="Sub Title (ex:Air condition Unit
)"	type="text" name="sub_title" value=""/></span>				 <span class="col-md-12" ><label class="col-md-3 control-label"> Price name/Price :</label></span>

													<span class="col-md-6" ><input type="text" placeholder="Price Name (ex:Cleaning)" name="cate_price_name[]" value=""/></span>
													<span class="col-md-6" ><input type="text" name="cate_price[]" placeholder="Price (ex:$10)"  value=""/></span>
													<div class="form-group">
								<label class="col-md-3 control-label"> Description</label>
								<div class="col-md-9">
									<textarea name="desc[]" Placeholder="Description"></textarea>
								</div>
							</div>
								
													<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo $base_url; ?>	assets/icon/add-icon.png"/></a>
												</div>
											</div>
										</div>
									</div>
								
								</div>
							
							</div>	
								
								<div class="form-group">
													<label class="col-md-3 control-label"> Task Categories Name</label>
													<div class="col-md-9">
														<select name="task_catname" class="form-control task_catname" id="task_catname" >
															<?php foreach($task_type as $task_name) { ?>
															<option class="form-control"   data-catid="<?php echo $task_name->id ?>"  value="<?php echo $task_name->taskcategory_name ?>"><?php echo $task_name->taskcategory_name ?></option>
															<?php } ?>
														</select>
														<input type="hidden" class="form-control" name="task_catid" id="task_catid" value=""> 
													</div>
												</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label"> Status</label>
								<div class="col-md-9">
									<select name="status" class="form-control" id="status">											
									<option value="1">active</option>
									<option value="2">deactive</option>
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
<!--
<script type="text/javascript">
$(document).ready(function(){
	    var x = 1; //Initial field counter is 1

var maxField = 10; //Input fields increment limitation
    //var addButton_all = $('.add_button_all'); //Add button selector
    //var wrapper_all = $('.add_overall'); //Input field wrapper
    
    $('.add_button_all').click(function(){ //Once add button is clicked
		     var co_val = $(".count_all").length;

        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $('.add_overall').append(' <div><div class="form-group count_all"><label class="col-md-3 control-label"> Add  Price Name / Price</label><div class="col-md-9"><div class="field_wrapper"><div>      <span class="col-md-6" > <input type="text" name="cate_price_name[]" value=""/>   </span> <span class="col-md-6" ><input type="text" name="cate_price[]" value=""/></span><a href="javascript:void(0);" class="add_button" title="Add field" data-test="'+x+'"><img src="<?php echo $base_url; ?>assets/icon/add-icon.png"/></a></div></div></div></div><a href="javascript:void(0);" class="remove_button_all" title="Remove field"><img src="<?php echo $base_url; ?>assets/icon/remove-icon.png"/></a></div>'); // Add field html
        
		}
    });
	$('.add_overall').on('click', '.remove_button_all', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('').remove(); //Remove field html
        x--; //Decrement field counter
    });
    $('.add_button').click(function(e)
    {
		alert('hi...');
		alert($(this).attr('data-test'));
	});
  
});


 </script> 
-->
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
 <script type="application/javascript">
	
jQuery(document).ready(function(e) 
{
	
	var form1 = $('#add_new_taskcategory');
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
					//event.preventDefault();

			$(this).attr('data-fullText')
		
			jQuery.ajax({
				url : '<?php echo $base_url?>admin/prices/addprice',
				type: 'POST',
				data: jQuery(form).serialize(),
				success:function(response){    
					jQuery(form)[0].reset();
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("New Price Created Succesfully", "Notifications");
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
     var catid = $('option:selected', this).attr('data-catid');

   $('#task_catid').val(catid);
});
 </script>
