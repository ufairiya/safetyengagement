
<div class="dashboard-content">
	<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Service Sheet Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
							<li>Service Sheet Management</li>
							<li>Endorse</li>
						</ul>
					</nav>
				</div>
			</div>
	</div>
	<div class="row">
	<?php
	//~ echo '<pre>';
	//~ print_r($list_of_servicereport);
	//~ echo '</pre>';
	?>
				<!-- Appointments -->
				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box with-icons scheduler margin-top-20">
						<h4>Service Report List</h4>
						<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">
							<?php if(!empty($list_of_servicereport)){ ?>
							<ul>
								<?php
								
								foreach($list_of_servicereport as $servicereport)
								{
									//var_dump($servicereport);
									$total = 0;
									$price = $servicereport->cont_price;
									$unserialize = unserialize($price);
									for($j=0;$j<count($unserialize);$j++)
									{
										$total = $unserialize[$j]+$total;
									}
								?>
									<li data-usermaster_id="<?php echo $servicereport->us_id;?>" data-sche-id="<?php echo $servicereport->sche_id;?>"  data-ser-id="<?php echo $servicereport->sr_id;?>"  id="booking-endorse" class="approved-booking">
										<a href="#" data-usermaster_id="<?php echo $servicereport->us_id;?>" data-sche-id="<?php echo $servicereport->sche_id;?>" data-ser-id="<?php echo $servicereport->sr_id;?>" data-target=""  class="endorse-highlight">
											<div class="list-box-listing bookings">
												<div class="list-box-listing-content">
													<div class="inner">
														<h3><span class="booking-status"><?php echo $servicereport->SR_code;?></span></h3>
														<div class="inner-booking-list first-div">
															<i class="im im-icon-Snow"></i>
															<h5 class="sr-con"><?php echo $servicereport->companyname;?><span><?php echo $servicereport->contname;?></span></h5>
														</div>
														<div class="inner-booking-list">
															<h5>Descriptions:</h5>
															<ul class="booking-list">
																<li><?php echo $servicereport->issueddate;?></li>
																<li class="highlighted">SGD <?php echo $total; ?></li>
															</ul>
														</div>
															
														<div class="inner-booking-list">
															<h5>Client:</h5>
															<ul class="booking-list">
																<li><?php echo $servicereport->username;?></li>
															</ul>
														</div>
															
														<div class="inner-booking-list">
															<h5>Address:</h5>
															<ul class="booking-list">
																<li><?php echo $servicereport->sr_address; ?></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</a>
									</li>
								<?php
								} ?>
								
							</ul><?php
		}

		else { ?>
					<ul>
						<!-- Single Listing Item / End -->
					<li class="approved-booking">
						<div class="list-box-listing bookings">
						<span class="col-md-12 norecfod" style="text-align: center;">	NIL</span>
							</div>
						<!-- Listing Item / End -->
					</li>
						</ul>
						<?php } ?>
						</div>
					</div>
				</div>

				<!-- Report Details -->
				<div class="col-lg-6 col-md-12">
					<form action="<?php echo $base_url?>admin/service/generate_endorse" method="post" id="endorse_form">
					<div class="dashboard-list-box with-icons scheduler margin-top-20">
						<h4>Report Details</h4>
						
						<!-- ENDORSE BUTTON HERE -->
						<!-- MERGE BUTTON ? -->
						
						<div class="endorse-list dashboard-list-box margin-top-0">

						<!-- Service Content -->
						
							<div id="endorse-content" class="endorse_select_service">
							
							</div>
						
						<!-- End Service Content -->
						
						</div>
					</div>
					
					<button type="submit" id="endorse_formsub" class="endorse-submit schedule-submit button grey" >Endorse Report</button>
					</form>
				</div>			

				<!-- Copyrights -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="copyrights">&copy; 2018 1SS. All Rights Reserved.</div>
				</div>
		</div>

	</div>
<style>
<!--
input.ck1{
    width: 9%;
    height: 20px;
}
-->
</style>

<!-- Service Report Selected -->

<script >
$(document).ready(function() 
{
 var usermaster_idchk = $('.endorse-highlight').eq(0).attr('data-usermaster_id');
 // var srid = $(this).attr('data-ser-id');
  $( '.endorse-list ul li a').eq(0).addClass( "highlight" );
   $(this).addClass( "gethighlight" );
  
      var srid = $('.highlight').attr('data-ser-id');   	    

  
               
                $('.endorse_select_service').empty();
	 
    $.ajax({
		url : '<?php echo $base_url?>admin/endorseservice/get_servicereport',
		type: 'POST',
		data:{'report_id':srid},
		success:function(response)
		{
			
			var elementval = jQuery.parseJSON(response);
				       
			//console.log(element);
		//	$('.endorse_select_service').empty();
		 $.each(elementval,function(keyval,element){
			//~ for (i = 0; i < element.contcol_jobname.length; i++)
			//~ {
				//~ var col_name = element.contcol_jobname[i];
				//~ var col_price = element.cont_price[i];
			//~ }
			$('.endorse_select_service').append('<div class="report-details"><h4 class="report-id">'+element.SR_code+'</h4><h5 class="report-header">Client</h5><p class="report-clients"><span>Name:</span>'+element.username+'<input type="hidden" name="ser_user_name" class="ser_user_name" value="'+element.username+'" ><input type="hidden" name="ser_user_id" class="ser_user_id" value="'+element.us_id+'" ><input type="hidden" name="ser_user_email" class="ser_user_email" value="'+element.email+'" ><input type="hidden" class="ser_rp_id" name="ser_rp_id[]" value="'+element.sr_id+'" ></p><input type="hidden" class="s_date" name="s_date" value="'+element.issueddate+'" ><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header">Description</h5>'+element.txtdescrip+'<br>'+ 
			(element.additional_description != "" ? '<h5 class="report-header">Additional Descriptions (optional):</h5><p>'+element.additional_description+'</p> ': '') + (element.contcol_jobname != "" ? '<h5 class="report-header">Job Description</h5><ol class="append_price_'+element.sr_id+'"></ol>': '')+'</div>');
		   
			for (i = 0; i < element.contcol_jobname.length; i++) 
			{
				var col_name = element.contcol_jobname[i];
				var col_price = element.cont_price[i];
				if(col_price != '' && col_price != ''){
				$('.append_price_'+element.sr_id+'').append('<li>'+col_name+' -$'+col_price+'</li>');
				}
				else
				{
						$('.append_price').append('<li>'+col_name+' '+col_price+'</li>');

				}
			} 
           
	   	
		
	});
	$('.report-details').hide();

	       $('.report-details').eq(0).show();

	}
	});	

});

$('.endorse-highlight').on('click', function(e) 
{
	e.preventDefault();
	$('.endorse-highlight').removeClass( "highlight" );
	$('.endorse-highlight').removeClass( "gethighlight" );	  		
	var usermaster_idchk = $(this).attr('data-usermaster_id');
	var srid = $(this).attr('data-ser-id');
	$(this).addClass( "highlight" );
	$(this).addClass( "gethighlight" );    
	$('.endorse_select_service').empty();
	

  
	$.ajax({
	url : '<?php echo $base_url?>admin/endorseservice/get_servicereport',
	type: 'POST',
	data:{'report_id':srid},
		success:function(response)
		{
			var elementval = jQuery.parseJSON(response);	
			$.each(elementval,function(keyval,element)
			{
			
		   
				$('.endorse_select_service').append('<div class="report-details" data-srid="'+element.sr_id+'"><h4 class="report-id">'+element.SR_code+'</h4><h5 class="report-header">Client</h5><p class="report-clients"><span>Name:</span>'+element.username+'<input type="hidden" name="ser_user_name" class="ser_user_name" value="'+element.username+'" ><input type="hidden" name="ser_user_id" class="ser_user_id" value="'+element.us_id+'" ><input type="hidden" name="ser_user_email" class="ser_user_email" value="'+element.email+'" ><input type="hidden" class="ser_rp_id" name="ser_rp_id[]" value="'+element.sr_id+'" ><input type="hidden" class="s_date" name="s_date" value="'+element.issueddate+'" ></p><p class="report-clients"><span>Contact No:</span>'+element.phone+'</p><p class="report-clients"><span>Email:</span>'+element.email+'</p><h5 class="report-header">Description</h5>'+element.txtdescrip+'<br>'+ 
				(element.additional_description != "" ? '<h5 class="report-header">Additional Descriptions (optional):</h5><p>'+element.additional_description+'</p> ': '') + (element.contcol_jobname != "" ? '<h5 class="report-header">Job Description</h5><ol class="append_price_'+element.sr_id+'"></ol>': '')+'</div>');
			   
				for (i = 0; i < element.contcol_jobname.length; i++) 
				{
					var col_name = element.contcol_jobname[i];
					var col_price = element.cont_price[i];
					if(col_price != '' && col_price != ''){
					$('.append_price_'+element.sr_id+'').append('<li>'+col_name+' -$'+col_price+'</li>');
					}
					else
					{
							$('.append_price').append('<li>'+col_name+' '+col_price+'</li>');

					}
				} 
			   

									
			
			});
			$('.report-details').hide();
			$('[data-srid='+srid+']').show();			  
		}
	});		
});

$('#endorse_formsub').on('click', function(e) 
{
	e.preventDefault();
	$('.endorse-submit').prop('disabled', true);
	//var ser_rp_id = [];
   // var ser_user_id = $('.ser_user_id').val();
   // var  ser_user_email = $('.ser_user_email').val();
       
	//~ $('.ser_rp_id').each(function(i){
        //~ ser_rp_id[i] = $(this).val();
    //~ });
    
    var srid = $('.highlight').attr('data-ser-id');
    var ser_user_id = $('.highlight').attr('data-usermaster_id');
    var ser_user_email = $('.ser_user_email').val();
    var ser_user_name = $('.ser_user_name').val();
    var issueddate = $('.s_date').val();
    //alert(issueddate);
    
    //~ alert(ser_user_id);
    //~ alert(ser_user_email);
    

	$.ajax({
			url : '<?php echo $base_url?>admin/endorseservice/generate_endorse',
			type: 'POST',
			data:{'ser_rp_id':srid,'ser_user_id':ser_user_id,'ser_user_email':ser_user_email,'issueddate':issueddate,'ser_user_name':ser_user_name},
			success:function(response){
				toastr.options = {
				"closeButton": true,
				}
				toastr.success('success', "Notifications");	
				setTimeout(function(){
					location.reload();
				}, 2000); 	
						
			}
	});								
});
</script> 
 

<link href="<?php echo $base_url; ?>assets/listeo/css/inner.css" rel="stylesheet" type="text/css">
