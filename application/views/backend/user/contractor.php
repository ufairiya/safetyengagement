

<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Title Bar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Account Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
							<li><a href="#">Account Management</a></li>
							<li>Contractor</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	<!-- Reply to review popup -->
		<div id="small-dialog" class="zoom-anim-dialog mfp-hide contractor-popup">
			<div class="small-dialog-header">
				<h3 class="workername"></h3>
				<h5 class="workeremail"></h5>
			</div>
				<div class="form" >
				<form method="post" name ="workerdetails" id="workerdetails" >
				<div class="message-reply margin-top-0">
					
					<div class="hidden-userid">
						
					</div>
					
					<label class="popup-label">Company Name</label>
					<input type="text" name="compname" id="compname" value=""/>
					<input type="hidden" name="userid" class="userid" value="" />

					<label class="popup-label">Work Permit Number</label>
					<input type="text"  name="wrkperno"  id="wrkperno" value=""/>

					<label class="popup-label">Work Permit Expiry Date</label>
<!--
					<input type="text"  name="wrkperexpdate" id="wrkperexpdate" value=""/>
-->
					<input type="text" data-min-year="2017" data-max-year="2080" name ="wrkperexpdate"  id="booking-date-cont" data-lang="en" data-large-mode="true"  data-large-default="true" >
					
					<label class="popup-label margin-top-30 margin-bottom-10">Skill Category</label>
					<div class="checkboxes in-row margin-bottom-20">
						<?php if(!empty($usercontractor)){
							 foreach($usercontractor as $usercontractorval){ ?>
						<input id="check-<?php echo $usercontractorval->taskcategory_name; ?>" type="checkbox"  name="check[]"   value="<?php echo $usercontractorval->id ?>"/>
						<label for="check-<?php echo $usercontractorval->taskcategory_name; ?>"><?php echo $usercontractorval->taskcategory_name; ?></label>
						<?php }} ?>
						
					</div>
					<button class="button">Add Contractor</button>
				</div>
			</form>
		</div></div>
		
		<div class="row">
			<!-- User List -->
			<div class="col-lg-6 col-md-12 usermange">
				<div class="dashboard-list-box with-icons add-contractor margin-top-20">
					<h4>Add New Contractor
						<i class="tip" data-tip-content="Enter Username or Email of the New Contractor"><div class="tip-content">Enter Username or Email of the New Contractor</div></i>
					</h4>
					<a href="" class="popup-with-zoom-anim">
						<i class="sl sl-icon-plus add-btn"></i>
					</a>
					<div class="dashboard-list-box margin-top-0">
						
					</div>
					

					<div class="usernames" style="display:none">
						<?php
						foreach($list_of_users as $list_of_users_det)
						{ 
							if($list_of_users_det->user_type == 'application_user') 
							{
								?>
								<li data-search-user-item data-search-user-name="<?php echo  ucfirst($list_of_users_det->username); ?>" data-search-user-email="<?php echo $list_of_users_det->email; ?>" data-search-user-id="<?php echo $list_of_users_det->id_user_master; ?>" ><?php echo  ucfirst($list_of_users_det->username); ?></li>
								<?php
							}
						}
						?>
					</div>
				

				</div>
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Contractor List</h4>
					<div class="search">
<!--
								<input type="text" placeholder="search" data-search="" class="contractor-finder">
-->
<!--
													<input type="text" data-search class="inner-search contractor-finder" placeholder="&#xF002" />
-->

						</div>
					<input type="text" data-search class="inner-search_cont contractor-finder" placeholder="&#xF002" />
					
					<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">
						<ul class="userlist">
							<!-- Service Content -->
								<div id="endorse-list">
									<?php //include('inc/users/userlist.php'); ?>
											<?php foreach($list_of_users as $list_of_users_det){ if($list_of_users_det->user_type == 'contractor') { ?> 
												
								<li id="booking-endorse" class="user-details approved-booking userhide_<?php echo $list_of_users_det->id_user_master; ?>"  data-user-name="<?php echo  ucfirst($list_of_users_det->username); ?>" data-user-email="<?php echo $list_of_users_det->email; ?>" data-user-id="<?php echo $list_of_users_det->id_user_master; ?>" >
									<span href="#" data-target="timperrie" class="endorse-highlight">
										<div class="list-box-listing bookings">
											<div class="list-box-listing-content users-based">
												<div class="inner">
													<div class="inner-booking-list first-div">


														<h5 data-get-id="userhide_<?php echo $list_of_users_det->id_user_master; ?>" data-filter-item data-filter-name="<?php echo strtolower($list_of_users_det->username); ?>" class="sr-con"><?php echo $list_of_users_det->username; ?> </h5>


														<?php if($list_of_users_det->status == 1){ ?>
													<a href="<?php echo $base_url; ?>admin/user/change_contractstatus?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=0"><i class="check_status sl sl-icon-check sl-btn"></i></a>
														<?php } 
														else{ ?>
															<a href="<?php echo $base_url; ?>admin/user/change_contractstatus?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=1"><i class="close_status sl sl-icon-close sl-btn"></i></a>
														<?php } ?>


													</div>
												</div>
											</div>
										</div>
										<div class="clear"></div>
									</span>
								</li>
							
								<?php } } ?>
								
								
								</div>
							<!-- End Service Content -->
						</ul>
					</div>
				</div>
			</div>	
			
			<!-- User Details -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>User Details</h4>
					
					<!-- ENDORSE BUTTON HERE -->
					<!-- MERGE BUTTON ? -->
					
					<div class="endorse-list dashboard-list-box margin-top-0">

					<!-- Service Content -->
						<div id="endorse-content">
							

							
							<?php //include('inc/users/johnsmith.php'); ?>
						</div>
					<!-- End Service Content -->
					
					</div>
				</div>
				
				<a href="" class="contid schedule-submit button grey">Update Contractor</a>
			</div>			

			<!-- Copyrights -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="copyrights">&copy; 2018 1SS. All Rights Reserved.</div>
			</div>
		</div>

	</div>
		<!-- Content / End -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/inner.css" />
<style>
	#td-clock-0 .td-clock .td-time span.on {
    color: #f91942;
}
#td-clock-0 .td-select:after
{
	    box-shadow: 0 0 0 1px #f91942;
	}

#td-clock-0 .td-lancette {
     border: unset;
    opacity: 0.1;
}
input#booking-date, input#booking-time {
     background-color: #f91942!important;
	 color: white!important;
}
input.contractor-finder {
    height: 51px;
    line-height: 51px;
    padding: 0 20px;
    outline: none;
    font-size: 15px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    box-shadow: 0 1px 3px 0px rgba(0,0,0,0.06);
    font-weight: 500;
    opacity: 1;
    border-radius: 29px!important;
}
li.user-details
{
	cursor:pointer;
	
	}
</style>
<script>
	$(document).ready(function() 
{
	$('.popup-with-zoom-anim').on('click', function() {

	var usr_id =$('#endorse-list li.active').attr('data-user-id');
	var usr_name =$('#endorse-list li.active').attr('data-user-name');
	var usr_email =$('#endorse-list li.active').attr('data-user-email');
		//~ $('.workername').html('<i class="im im-icon-Worker"></i> - '+usr_name);
		//~ $('.workeremail').html(usr_email);
		//~ $('.userid').val(usr_id);	
	});
	
	

		var us_id = $('.usermange ul li.user-details').eq(0).attr('data-user-id');
		$('.contid').attr('href','<?php echo $base_url;  ?>admin/user/updateuser/'+us_id+'');
		$('.usermange ul li.user-details').eq(0).addClass("active");
		//alert(us_id);
		// var us_id = $(this).attr('data-user-id');
		//alert(us_id);
		$.ajax({
		url : '<?php echo $base_url?>admin/user/get_singleuser_list',
		type: 'POST',
		data:{'us_id':us_id},
		success:function(response){
		var element = jQuery.parseJSON(response);
		$('#endorse-content').empty();
		
			$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default17.jpg" />')+'</div>	<h4 class="user-id">'+element.username+'</h4><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header margin-top-30">Contractor Details</h5><p class="report-contractors"><span>Company Name:</span>'+element.companyname+'</p><p class="report-contractors"><span>Work Permit No:</span>'+element.user_workpermitno+'</p><p class="report-contractors"><span>Work Permit Expiry Date:</span>'+element.workexpirydate+'</p><h5 class="report-header margin-top-30">Skill Category</h5><div class="checkboxes in-row margin-bottom-20 checkboxes_details"></div><h5 class="report-header margin-top-30">Apartments</h5><div class="p_details"></div></div>');
		


		var answerString =  element.skills;
		var combined = _.zip(element.serviceid,element.servicename);
		$.each(combined, function(index, value) {
			var skillapt ='  <input  id="check-a" '+($.inArray(value[0], answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check"  disabled><label for="check-a">'+value[1]+'</label>';
			$('.checkboxes_details').append(skillapt);

		});   
		if(element.pid)
		{
		//console.log(element.pname.length);
		
		for (i = 0; i < element.pname.length; i++) {
		var pid = element.pid[i];
		var pname = element.pname[i];
		var paddress = element.paddress[i];

		if(pid != '' && pname != '' ){
		$('.p_details').append('<p class="apartment-name"><input type="hidden" name="pid" class="prid" value="'+pid+'">'+pname+'</p><p class="apartment-address">'+paddress+'</p>');		
		}
		else
		{
		$('.append_price').append('<li>'+col_name+' '+col_price+'</li>');

		}
		} 
		}        
		
		}	   	
		});
});


	$(".first-div i.close_status").hover(
	  function () {
				  $(this).removeClass().addClass("sl sl-icon-check sl-btn");

	  },
	  function () {
			$(this).removeClass().addClass("sl sl-icon-close sl-btn");

	  }
	  
	);
	$(".first-div i.check_status").hover(
	  function () {
			$(this).removeClass().addClass("sl sl-icon-close sl-btn");
	  },
	  function () {
			$(this).removeClass().addClass("sl sl-icon-check sl-btn");

	  }
	);
$('.user-details').on('click', function(e) {
		//e.preventDefault();
		


    $('ul.userlist .active').removeClass('active');
    $(this).addClass('active');

		var us_id = $(this).attr('data-user-id');
				$('.contid').attr('href','<?php echo $base_url;  ?>admin/user/updateuser/'+us_id+'');

		//alert(us_id);
		$.ajax({
		url : '<?php echo $base_url?>admin/user/get_singleuser_list',
		type: 'POST',
		data:{'us_id':us_id},
		success:function(response){
		var element = jQuery.parseJSON(response);
		$('#endorse-content').empty();
		
			$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default17.jpg" />')+'</div>	<h4 class="user-id">'+element.username+'</h4><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header margin-top-30">Contractor Details</h5><p class="report-contractors"><span>Company Name:</span>'+element.companyname+'</p><p class="report-contractors"><span>Work Permit No:</span>'+element.user_workpermitno+'</p><p class="report-contractors"><span>Work Permit Expiry Date:</span>'+element.workexpirydate+'</p><h5 class="report-header margin-top-30">Skill Category</h5><div class="checkboxes in-row margin-bottom-20 checkboxes_details"></div><h5 class="report-header margin-top-30">Apartments</h5><div class="p_details"></div></div>');
		


		var answerString =  element.skills;
		var combined = _.zip(element.serviceid,element.servicename);
		$.each(combined, function(index, value) {
			var skillapt ='  <input  id="check-a" '+($.inArray(value[0], answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check"  disabled><label for="check-a">'+value[1]+'</label>';
			$('.checkboxes_details').append(skillapt);

		});   
		if(element.pid)
		{
		//console.log(element.pname.length);
		
		for (i = 0; i < element.pname.length; i++) {
		var pid = element.pid[i];
		var pname = element.pname[i];
		var paddress = element.paddress[i];

		if(pid != '' && pname != '' ){
		$('.p_details').append('<p class="apartment-name"><input type="hidden" name="pid" class="prid" value="'+pid+'">'+pname+'</p><p class="apartment-address">'+paddress+'</p>');		
		}
		else
		{
		$('.append_price').append('<li>'+col_name+' '+col_price+'</li>');

		}
		} 
		}        
		
		}	   	
		});
});
				

$('[data-search]').on('keyup', function() 
{	
	var searchVal = $(this).val();
	var filterItems = $('[data-search-user-email]');

	if ( searchVal != '' ) 
	{
		$('.usernames').show();
		filterItems.addClass('hidden');
		//$('.user-details').addClass('hidden');	
		$('[data-search-user-item][data-search-user-email*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
		$('[data-search-user-item][data-search-user-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
		
		
	} 
	else 
	{
		filterItems.addClass('hidden');
		$('.hidden-userid').append('<input type="hidden" name="searchuserid" value="">');
		$('[data-search-user-item]').removeClass('selected');
		$('.usernames').hide();
	}
});

$('.add-btn').on('click', function()
{ 	
  	if ( $('[data-search-user-item].selected').length ) 
  	{
		$('.popup-with-zoom-anim').attr('href','#small-dialog');	
	}
	else
	{
		toastr.options = {
							"closeButton": true,
						}
		toastr.error("Please select user", "Notifications");
		$('.popup-with-zoom-anim').attr('href','');	
	}

});

$('[data-search-user-item]').on('click', function()
{
	
	$('[data-search-user-item]').removeClass('selected');
	$(this).toggleClass('selected');
	var email = $('[data-search-user-item].selected').attr('data-search-user-email');
	var name = $('[data-search-user-item].selected').attr('data-search-user-name');
	var id = $('[data-search-user-item].selected').attr('data-search-user-id');

	$('.workername').empty();
	//$('.workername').append(name);
	$('.workeremail').empty();
	//$('.workername').append(email);
	$('.hidden-userid').empty();
	$('.hidden-userid').append('<input type="hidden" name="searchuserid" value="'+id+'">');
	$('.workername').html('<i class="im im-icon-Worker"></i> - '+name);
	$('.workeremail').html(email);
	$('.contractor-finder').val(name);
	//~ alert(email);
	//~ alert(name);
	//~ alert(id);
});


	
jQuery(document).ready(function(e) {
	 var form1 = $('#workerdetails');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
			  
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
				 'compname': {
                    required: 'Please Select Companyname',
                },
				 'wrkperno': {
                    required: 'Please Enter The Work Permit Number',
                },
				 'wrkperexpdate': {
                    required: 'Please Select Work Permit Expire Date',
                },
				 
                
            },
            rules: {
                compname: {
                    required: true
                },
				
				wrkperno: {
                    required: true
                },
            
			  	wrkperexpdate: {
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
					url : '<?php echo $base_url?>admin/user/contractordetails',
					type: 'POST',
					data: jQuery(form).serialize(),
					 success:function(response){
						 				
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Update Contractor Details Succesfully", "Notifications");	
						setTimeout(function(){// wait for 5 secs(2)
					location.reload(); // then reload the page.(3)

					}, 3000); 	
							   	
					 }
				});
            }
        }); 
        
        

        });


 
</script>
	<link href="<?php echo $base_url;?>assets/listeo/css/plugins/datedropper.css" rel="stylesheet" type="text/css">
	<script src="<?php echo $base_url;?>assets/listeo/scripts/datedropper.js"></script>
	<script>$('#booking-date-cont').dateDropper();</script>
