
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
							<li><a href="a-dashboard.php">Home</a></li>
							<li><a href="#">Account Management</a></li>
							<li>Administrator</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		
		<!-- Reply to review popup -->
		<div id="small-dialog" class="zoom-anim-dialog mfp-hide">						
			<form method="post" name ="addadmin" id="addadmin" >
				<div class="small-dialog-header">
					<h3>Add Administrator</h3>
				</div>
				<div class="message-reply margin-top-0">
					<label class="popup-label">Username</label>
					<input type="text" name="adminusername" id="adminusername"/>

					<label class="popup-label">Email</label>
					<input type="text" name="adminemail" id="adminemail"/>
					
					<label class="popup-label">Phone Number</label>
					<input type="tel" name="adminphone" id="adminphone"/>
					
					<label class="popup-label margin-top-30 margin-bottom-10">Administrative rights</label>
					<div class="checkboxes in-row margin-bottom-20">
						
						<input id="check-a" type="checkbox" name="check[]" value="1" />
						<label for="check-a">Account Management</label>
						<div class="pad">
								<input class="checkbox" id="check-b" type="checkbox" name="check[]" value="2" />
								<label for="check-b">Administrator</label>
								<input class="checkbox" id="check-c" type="checkbox" name="check[]" value="3" />
								<label for="check-c">Company</label>
								<input class="checkbox" id="check-d" type="checkbox" name="check[]" value="4" />
								<label for="check-d">Professional</label>
								<input class="checkbox" id="check-e" type="checkbox" name="check[]" value="5" />
								<label for="check-e">Student</label>
						</div>
						<input id="check-f" type="checkbox" name="check[]" value="6" />
								<label for="check-f">Packages Management</label>			<br>											
						<input id="check-g" type="checkbox" name="check[]" value="7" />
								<label for="check-g">Payment Management</label>			<br>													
						<input id="check-h" type="checkbox" name="check[]" value="8" />
								<label for="check-h">Post Job Management</label>		<br>														
						<input id="check-i" type="checkbox" name="check[]" value="9" />
								<label for="check-i">Bidded Job Management</label>		<br>														
						<input id="check-g" type="checkbox" name="check[]" value="10" />
								<label for="check-j">Awarded Job Management</label>		<br>														
						<input id="check-k" type="checkbox" name="check[]" value="11" />
								<label for="check-k">Completed Job Management</label>														
					</div>
					<div class="error"></div>

					<label class="popup-label">Password</label>
					<input type="password" name="adminpassword" id="adminpassword"/>
					
					<label class="popup-label">Confirm Password</label>
					<input type="password" name="confirmpassword" id="confirmpassword"/>
					
					<button class="btndesign button">Add</button>
				</div>
			</form>	
		</div>
		
		<div class="row">
			<!-- User List -->
			<div class="col-lg-6 col-md-12 usermange">
				
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Administrator List</h4>
					<div class="search">
<!--
								<input type="text" placeholder="search" data-search="" class="contractor-finder">
								<input type="text" data-search class="inner-search contractor-finder" placeholder="&#xF002" />
-->

						</div>
					<input type="text" data-search class="inner-search_cont contractor-finder" placeholder="&#xF002" />
					<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">
						<ul class="userlist">
							<!-- Service Content -->
								<div id="endorse-list">
									<?php //include('inc/users/userlist.php'); ?>
											<?php foreach($list_of_users as $list_of_users_det){ if($list_of_users_det->user_type == 'superuser') { ?> 
												
								<li id="booking-endorse" class="user-details approved-booking userhide_<?php echo $list_of_users_det->id_user_master; ?>"  data-user-name="<?php echo  ucfirst($list_of_users_det->username); ?>" data-user-email="<?php echo $list_of_users_det->email; ?>" data-user-id="<?php echo $list_of_users_det->id_user_master; ?>" >
									<span href="#" data-target="timperrie" class="endorse-highlight">
										<div class="list-box-listing bookings">
											<div class="list-box-listing-content users-based">
												<div class="inner">
													<div class="inner-booking-list first-div">


														<h5 data-get-id="userhide_<?php echo $list_of_users_det->id_user_master; ?>" data-filter-item data-filter-name="<?php echo strtolower($list_of_users_det->username); ?>" class="sr-con"><?php echo $list_of_users_det->username; ?> </h5>


														<?php if($list_of_users_det->status == 1){ ?>
													<a href="<?php echo $base_url; ?>admin/user/change_contractstatus?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=0"><i class="check_status sl sl-icon-check sl-btn" data-placement="left" data-toggle="tooltip" title="deactive"></i></a>
														<?php } 
														else{ ?>
															<a href="<?php echo $base_url; ?>admin/user/change_contractstatus?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=1"><i class="close_status sl sl-icon-close sl-btn" data-placement="left" data-toggle="tooltip" title="active"></i></a>
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
								<a href="#small-dialog" class="btndesign popup-with-zoom-anim schedule-submit button grey">Add Administrator</a>

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
				
				<a href="" class="btndesign adminid schedule-submit button grey">Update Administrator</a>
				
			</div>			

			<!-- Copyrights -->
			<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="copyrights"><?php echo date('Y');?> &copy; Safety Engagement.</div>
			</div>
		</div>

	</div>
		<!-- Content / End -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/inner.css" />
<style>
input#booking-date, input#booking-time 
{
     background-color: #f91942!important;
	 color: white!important;
}
input.contractor-finder 
{
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
		$('.workername').html('<i class="im im-icon-Worker"></i> - '+usr_name);
		$('.workeremail').html(usr_email);
		$('.userid').val(usr_id);
	});

		var us_id = $('.usermange ul li.user-details').eq(0).attr('data-user-id');
		$('.adminid').attr('href','<?php echo $base_url;  ?>admin/user/updateadmin/'+us_id+'');
		$('.usermange ul li.user-details').eq(0).addClass("active");
		//alert(us_id);
		// var us_id = $(this).attr('data-user-id');
		//alert(us_id);
		$.ajax({
		url : '<?php echo $base_url?>admin/user/get_singleadmin_list',
		type: 'POST',
		data:{'us_id':us_id},
		success:function(response){
		var element = jQuery.parseJSON(response);
		 if(typeof element.id_user_master != "undefined" && element.id_user_master != null && element.id_user_master.length != null && element.id_user_master.length > 0){
						
						$('#endorse-content').empty();
		
			$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default22.jpg" />')+'</div>	<h4 class="user-id">'+element.username+'</h4><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header margin-top-30">Administrative Rights</h5><div class="checkboxes checkedform in-row margin-bottom-20"></div></div>');
					 for (i = 0; i < element.skills.length; i++) {

						

					var answerString =  element.skills;


console.log(answerString);

						var skillapt ='<div class="admin-rights"><input id="check-a" '+($.inArray("1", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-a">Account Management</label></div><div class="admin-rights"><input id="check-f" '+($.inArray("6", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-f">Packages Management</label></div><div class="admin-rights"><input id="check-g" '+($.inArray("7", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-g">Payment Management</label></div><div class="admin-rights"><input id="check-h" '+($.inArray("8", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-h">Post Job Management</label></div><div class="admin-rights"><input id="check-i" '+($.inArray("9", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-i">Bidded Job Management</label></div><div class="admin-rights"><input id="check-j" '+($.inArray("10", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-j">Awarded Job Management</label></div><div class="admin-rights"><input id="check-k" '+($.inArray("11", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-k">Completed Job Management</label></div>';
						 }
						
						$('.checkedform').append(skillapt);
		
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
		}   }
	       else{
			   
			   $('#endorse-content').empty();
			   $('#endorse-content').append('<div class="dataTables_info" id="privileges_list_info" role="status" aria-live="polite">No entries found</div>');
			 $("a.btndesign").attr('href','#');

			   }          
		//~ toastr.options = {
		//~ "closeButton": true,
		//~ }
		//~ toastr.success('', "Notifications");	
		//~ setTimeout(function(){// wait for 5 secs(2)
		//~ //location.reload(); // then reload the page.(3)
		//~ //window.location.href ='<?php echo $base_url?>booking/active_request';
		//~ }, 2000); 	
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
		$('.adminid').attr('href','<?php echo $base_url;  ?>admin/user/updateadmin/'+us_id+'');

		//alert(us_id);
		$.ajax({
		url : '<?php echo $base_url?>admin/user/get_singleadmin_list',
		type: 'POST',
		data:{'us_id':us_id},
		success:function(response){
		var element = jQuery.parseJSON(response);
		 if(typeof element.id_user_master != "undefined" && element.id_user_master != null && element.id_user_master.length != null && element.id_user_master.length > 0){
							$('#endorse-content').empty();
		
		$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default22.jpg" />')+'</div>	<h4 class="user-id">'+element.username+'</h4><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header margin-top-30">Administrative Rights</h5><div class="checkedform checkboxes in-row margin-bottom-20"></div></div>');
					//~ for (i = 0; i < element.skills.length; i++) {

						

					var answerString =  element.skills;



								var skillapt ='<div class="admin-rights"><input id="check-a" '+($.inArray("1", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-a">Account Management</label></div><div class="admin-rights"><input id="check-f" '+($.inArray("6", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-f">Packages Management</label></div><div class="admin-rights"><input id="check-g" '+($.inArray("7", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-g">Payment Management</label></div><div class="admin-rights"><input id="check-h" '+($.inArray("8", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-h">Post Job Management</label></div><div class="admin-rights"><input id="check-i" '+($.inArray("9", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-i">Bidded Job Management</label></div><div class="admin-rights"><input id="check-j" '+($.inArray("10", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-j">Awarded Job Management</label></div><div class="admin-rights"><input id="check-k" '+($.inArray("11", answerString) !== -1 ? 'checked': '')+' type="checkbox" name="check" disabled><label for="check-k">Completed Job Management</label></div>';

						//~ }
						
						$('.checkedform').append(skillapt);
			
			
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
	       else{
			   
			   $('#endorse-content').empty();
			   $('#endorse-content').append('<div class="dataTables_info" id="privileges_list_info" role="status" aria-live="polite">No entries found</div>');
			 $("a.btndesign").attr('href','#');

			   }     
		//~ toastr.options = {
		//~ "closeButton": true,
		//~ }
		//~ toastr.success('', "Notifications");	
		//~ setTimeout(function(){// wait for 5 secs(2)
		//~ //location.reload(); // then reload the page.(3)
		//~ //window.location.href ='<?php echo $base_url?>booking/active_request';
		//~ }, 2000); 	
		}	   	
		});
});
				
			

$('[data-search]').on('keyup', function() 
{	
	//~ $('.user-details').hide();	
	var searchVal = $(this).val();
	var filterItems = $('[data-filter-item]');

	if ( searchVal != '' ) 
	{
		filterItems.addClass('hidden');
		$('.user-details').addClass('hidden');	
		$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
		//	var attid = $('[data-filter-name*="' + searchVal.toLowerCase() + '"]').attr('data-get-id');
		$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').parents('li').removeClass('hidden');
		//$('.'+attid).show();	
	} 
	else 
	{
		filterItems.removeClass('hidden');
		$('li').removeClass('hidden');
	}
});
jQuery(document).ready(function(e) {
	 var form1 = $('#addadmin');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({			  
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {                          				
				 'adminusername': {
                    required: 'Please enter user name',
                },
				 'adminemail': {
                    required: 'Please enter admin email',
                },
                'adminphone': {
                    required: 'Please enter the phone nuumber',
                },
                'check[]': {
					required: 'You must check at least 1 box',             
				},
				 'adminpassword': {
                    required: 'Please enter the password',
                },
                 'confirmpassword': {
                    required: 'Please enter the confirm password',
                },
                              				               
            },
            rules: {
                adminusername: {
                    required: true
                },
				
				adminemail: {
                    required: true
                },
                
                adminphone: {
					required: true,
				},
				
                'check[]': {
					required: true,  
					                
				},
							           
			  	adminpassword: {
                    required: true
                },
                
                confirmpassword: {
                    required: true,
                    equalTo : "#adminpassword"
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
            errorPlacement: function(error, element) 
			{

				if (element.attr("name") == "check[]") 
				{
					 $(".error").append(error);
					
				}			
				else
				{
					
					error.insertAfter(element);
				}

			},

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
				
				jQuery.ajax({
					url : '<?php echo $base_url?>admin/user/admindetails',
					type: 'POST',
					data: jQuery(form).serialize(),
					 success:function(response){
						if(response != '')
						{					 					
							toastr.options = {
								"closeButton": true,
							}
							toastr.success("admin added successfully", "Notifications");	
							setTimeout(function(){ // wait for 5 secs(2)
							location.reload(); // then reload the page.(3)
							}, 3000); 
						}			   	
					 }
				});
            }
        }); 
        
        });
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<style>
.pad {padding: 0px 50px;}
</style>
<script>
$(document).ready(function () {
    $('#check-a').click(function (event) {
        if (this.checked) {
            $('.checkbox').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkbox').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>
