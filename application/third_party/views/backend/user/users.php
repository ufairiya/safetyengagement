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
							<li>Company</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- User List -->
			<div class="col-lg-6 col-md-12 usermange">
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Company List</h4>
					<div class="search">
<!--
								<input type="text" placeholder="search" data-search="" class="contractor-finder">
-->
													<input type="text" data-search class="inner-search contractor-finder" placeholder="&#xF002" />

						</div>
					<input type="text" data-search class="inner-search contractor-finder" placeholder="&#xF002" />
					<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">
						<ul class="userlist">
							<!-- Service Content -->
								<div id="endorse-list">
									<?php //include('inc/users/userlist.php'); ?>
											<?php foreach($list_of_users as $list_of_users_det){ if($list_of_users_det->user_type == 'company') { ?> 
												
								<li id="booking-endorse" class="user-details approved-booking userhide_<?php echo $list_of_users_det->id_user_master; ?>"  data-user-id="<?php echo $list_of_users_det->id_user_master; ?>" >
									<span href="#" data-target="timperrie" class="endorse-highlight">
										<div class="list-box-listing bookings">
											<div class="list-box-listing-content users-based">
												<div class="inner">
													<div class="inner-booking-list first-div">


														<h5 data-get-id="userhide_<?php echo $list_of_users_det->id_user_master; ?>" data-filter-item data-filter-name="<?php echo strtolower($list_of_users_det->username); ?>" class="sr-con"><?php echo $list_of_users_det->username; ?>  <i class="im im-icon-Worker"></i></h5>


														<?php if($list_of_users_det->status == 1){ ?>
													<a href="<?php echo $base_url; ?>admin/user/change_status?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=0"><i class="check_status sl sl-icon-check sl-btn"></i></a>
														<?php } 
														else{ ?>
															<a href="<?php echo $base_url; ?>admin/user/change_status?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=1"><i class="close_status sl sl-icon-close sl-btn"></i></a>
														<?php } ?>


													</div>
												</div>
											</div>
										</div>
										<div class="clear"></div>
									</span>
								</li>
								<?php } else if($list_of_users_det->user_type == 'company') { ?>
								<li id="booking-endorse"  class="user-details approved-booking userhide_<?php echo $list_of_users_det->id_user_master; ?>"  data-user-id="<?php echo $list_of_users_det->id_user_master; ?>">
									<span  data-target="timperrie" class="endorse-highlight">
										<div class="list-box-listing bookings">
											<div class="list-box-listing-content users-based">
												<div class="inner">
													<div class="inner-booking-list first-div">
														<h5 data-get-id="userhide_<?php echo $list_of_users_det->id_user_master; ?>" data-filter-item data-filter-name="<?php echo strtolower($list_of_users_det->username); ?>" class="sr-con"><?php echo $list_of_users_det->username; ?>  </h5>
														<?php if($list_of_users_det->status == 1){ ?>
														
														<a  href="<?php echo $base_url; ?>admin/user/change_status?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=0" >
														
														<i data-toggle="tooltip"  id="check_status" class="check_status sl sl-icon-check sl-btn" data-placement="left" title="deactive"></i></a>
														<?php } else{ ?>
														<a  href="<?php echo $base_url; ?>admin/user/change_status?uid=<?php echo $list_of_users_det->id_user_master; ?>&status=1" ><i id="close_status" class="close_status sl sl-icon-close sl-btn" data-placement="left" data-toggle="tooltip" title="active"></i></a>
														<?php } ?>

													</div>
												</div>
											</div>
										</div>
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
					<h4>Company Details</h4>
					
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
	
				<a href="<?php echo $base_url; ?>admin/user/updateuser" class="btndesign schedule-submit button grey">Update Company</a> 			
<!--
				<a class="edit schedule-submit button grey" href="#"><i class="fa fa-pencil " style="font-size:24px"></i>
Edit</a>
-->
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
	    $('a.edit').click(function (e) {
			alert('hi');
		
        $('.report-details').find('label').hide();
        $('.report-details').find('input[type="text"]').show().focus();
        $('.report-details').find('.edit-field').show().focus();
    });
    
    //~ $('input[type=text]').focusout(function() {
        //~ var dad = $(this).parent();
        //~ $(this).hide();
        //~ $('.report-details').find('label').show();
    //~ });

		var us_id = $('.usermange ul li.user-details').eq(0).attr('data-user-id');
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
		$("a.schedule-submit").attr("href","");
			$("a.schedule-submit").attr("href", "<?php echo $base_url?>admin/user/updateuser/"+ element.id_user_master);
			$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default22.jpg" />')+'</div>	<label class="label-field"><h4 class="user-id">'+element.username+'</h4></label><input type="hidden" value="'+element.id_user_master+'" name="userid"><p style="display:none" class="report-clients user-id edit-field"><span class="user-id edit-field" style="display:none">User Name</span></label><input style="display:none" class="user-id edit-field" name="uname" type="text" value="'+element.username+'"></p><p class="report-clients"><span class="pull-left">Contact No:</span><label class="label-field">'+element.phone+'</label><input style="display:none" class="user-id edit-field" name="uphone" type="text" value="'+element.phone+'"></p><p class="report-clients"><span class="pull-left">Email:</span><label class="label-field">'+element.email+'</label><input style="display:none" class="user-id edit-field" name="uemail" type="text" value="'+element.email+'"></p></div>');
	       
	 	
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
		//alert(us_id);
		$.ajax({
		url : '<?php echo $base_url?>admin/user/get_singleuser_list',
		type: 'POST',
		data:{'us_id':us_id},
		success:function(response){
		var element = jQuery.parseJSON(response);
		$('#endorse-content').empty();
		$("a.schedule-submit").attr("href","");
		$("a.schedule-submit").attr("href", "<?php echo $base_url?>admin/user/updateuser/"+ element.id_user_master);
		$('#endorse-content').append('<div class="report-details"><div class="report-img-holder">'+ (element.profile_image != "" ? '<img src="<?php  echo $base_url;?>uploads/'+element.profile_image+'" />':'<img src="<?php  echo $base_url;?>uploads/default22.jpg" />')+'</div>	<label class="label-field"><h4 class="user-id">'+element.username+'</h4></label><input type="hidden" value="'+element.id_user_master+'" name="userid"><p style="display:none" class="report-clients user-id edit-field"><span class="user-id edit-field" style="display:none">User Name</span></label><input style="display:none" class="user-id edit-field" name="uname" type="text" value="'+element.username+'"></p><p class="report-clients"><span class="pull-left">Contact No:</span><label class="label-field">'+element.phone+'</label><input style="display:none" class="user-id edit-field" name="uphone" type="text" value="'+element.phone+'"></p><p class="report-clients"><span class="pull-left">Email:</span><label class="label-field">'+element.email+'</label><input style="display:none" class="user-id edit-field" name="uemail" type="text" value="'+element.email+'"></p></div>');
      
		
		}	   	
		});
});
				
			
//~ var current;
//~ function initCurrent(){
	//~ current = document.getElementById('booking-endorse').firstElementChild;
	//~ current.className += " active";
//~ }

//~ function newCurrent(newElement){
	//~ current.className = "endorse-highlight";
	//~ newElement.className += " active";
	//~ current = newElement;
//~ }
$('[data-search]').on('keyup', function() {
			//~ $('.user-details').hide();	

	var searchVal = $(this).val();
	var filterItems = $('[data-filter-item]');

	if ( searchVal != '' ) {
	filterItems.addClass('hidden');
	$('.user-details').addClass('hidden');

	
		$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
	//	var attid = $('[data-filter-name*="' + searchVal.toLowerCase() + '"]').attr('data-get-id');
								$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').parents('li').removeClass('hidden');

						
							//$('.'+attid).show();
	
	} else {
		filterItems.removeClass('hidden');
		$('li').removeClass('hidden');

	}
});

</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

