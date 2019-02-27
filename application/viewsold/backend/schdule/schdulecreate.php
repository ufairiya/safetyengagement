<div class="dashboard-content">

<?php
//~ echo '<pre>';
//~ print_r($task_name_list_mover);
//~ echo '</pre>';
//~ exit;
?>
	<input type="hidden" value="<?php echo $base_url; ?>" class="schebasegeturl">
	<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Schedule Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
							<li>Schedule Management</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

			<div class="row">
				
				<!-- Date picker -->
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 schedule-date">
					<div class="dashboard-list-box with-icons margin-top-20">
						<div class="row with-forms margin-top-20">
							<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
							<div class="col-md-12">
								
								<input type="text" placeholder="Select Date" class="serch_date" id="booking-date" data-lang="en" data-large-mode="true"  data-init-set="false" data-default-date="Please select date" data-large-default="true"  />

							</div>
						</div>
					</div>
				</div>
			
				<!-- Appointments -->
				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box with-icons scheduler margin-top-20">
						<h4>Appointments</h4>
						<form method="post" accept-charset="utf-8" action="<?php echo $base_url; ?>admin/schedule/schedulecreate">

						<!-- Sort by -->
						<div class="sort-by" style="position:absolute;top:38px;right: 41px">
							<div class="sort-by-select">
								<select id="status_filter" onchange="this.form.submit()" name="status_filter" data-placeholder="Default order" class="status_filter chosen-select-no-single">
<!--
									<option value="">Choose</option>	
-->
									<option <?php if($status_id == 0){ echo 'selected';} ?> value="0">Any Status</option>	
									<option <?php if($status_id == 6){ echo 'selected';} ?> value="6">Assigned</option>
									<option <?php if($status_id == 5){ echo 'selected';} ?> value="5">Cancel</option>
									<option <?php if($status_id == 3){ echo 'selected';} ?> value="3">Pending Assignment</option>
								</select>
							</div>
						</div>
						
						<!-- Reply to review popup -->
						<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
							<div class="small-dialog-header">
								<h3>Assign Contractor</h3>
							</div>
							<div class="message-reply margin-top-0">
								<textarea cols="40" rows="3" placeholder="Your Message to Kathy"></textarea>
								<button class="button">Assign</button>
							</div>
						</div>
						<div class="clear"></div>
						<ul class="tabs-nav">
							<?php 
							foreach($get_task_category as $get_task_categorysep ) 
							{
								$shortcode_arr[] = strtolower($get_task_categorysep->taskcatshort_code);
								$img_path[] = $get_task_categorysep->image_path;
								$ids[] = $get_task_categorysep->id;
							}
							
							$count1 = array();
							$count_var1 = array();
							if(!empty($scheduledetails))
							{
								foreach($scheduledetails as $scheduledetails1 ) 
								{							
									foreach($scheduledetails1 as $tasklist1)
									{	
										if($tasklist1->status == 3)
										{
											$count1[] = $tasklist1->status;
										}
									}
									
									$count_var1[] = count($count1);
									 $count1 = array();
								}
							}

							
							for($i = 0;$i < count($get_task_category);$i++)
							{
								$shortcodeval = $shortcode_arr[$i];
								$imgval = $img_path[$i];
								$id = $ids[$i];
							?>
									<li>
										<a href="#<?php echo $shortcodeval ?>"><i class="<?php echo $imgval; ?>"></i>
										<?php 
										if($count_var1[$i] != 0)
										{										    										
											echo '<span class="hiddbadge'.$id.' nav-tag messages red">';  
											echo $count_var1[$i]; 
											echo '</span>';
										}
										?>
										</a>
									</li>
							<?php
							}
							
							?>
							
								
							
						</ul>

						<div class="tabs-container">
				
						<?php
						$i = 0;	
						
						
						
						if(!empty($scheduledetails))
						{
						foreach($scheduledetails as $scheduledetails ) 
						{
																			
							$shortcodeval = $shortcode_arr[$i];
				
							$i++;				
												
						?>
							

							<div class="tab-content" id="<?php echo $shortcodeval; ?>">
								<div class="col-md-12">
									<div class="dashboard-list-box margin-top-0">
										<ul class="<?php echo $shortcodeval; ?>hidd">
											<?php
											foreach($scheduledetails as $tasklist)
											{
												$shedule_status = $tasklist->status;
												if($shedule_status == '6')
												{
													echo '<li class="approved-booking bookingdatefilter" id="bookingdatefilter_'.$tasklist->id.'" data-book-date-item data-book-date="'.date("m/d/Y", strtotime($tasklist->booking_date)).'">
														<div class="list-box-listing bookings">
															<div class="list-box-listing-content">
																<div class="inner">
																	<h3><span class="booking-status">'.$tasklist->SR_code.'</span></h3>

																	<div class="inner-booking-list">
																		
																		<ul class="booking-list">
																		<li>'.date("j M Y", strtotime($tasklist->booking_date)).'</li>
																		<li>'.$tasklist->bookingtime.'</li>
																		<li class="highlighted">Est. '.$tasklist->est_time.' hours</li>
																		</ul>
																	</div>
																	
																	<div class="inner-booking-list">
																		<h5>Address:</h5>
																		<ul class="booking-list">
																			<li>'.$tasklist->property_address.'</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</li>';
												}
												elseif($shedule_status == '3')
												{
															$timestamp = strtotime($tasklist->bookingtime) + 60*$tasklist->est_time; 
															$endtime_ac = date('h:ia', $timestamp);
															
													echo '<li class="pending-booking bookingdatefilter" id="bookingdatefilter_'.$tasklist->id.'" data-book-date-item data-book-date="'.date("m/d/Y", strtotime($tasklist->booking_date)).'">
													<div class="list-box-listing bookings">
														<div class="list-box-listing-content">
															<div class="inner">
																<h3><span class="booking-status">'.$tasklist->SR_code.'</span></h3>

																<div class="inner-booking-list">
																	
																	<ul class="booking-list">
																	<li>'.date("j M Y", strtotime($tasklist->booking_date)).'</li>
																		<li>'.$tasklist->bookingtime.'</li>
																		<li class="highlighted">Est.'.$tasklist->est_time.' hours</li>
																	</ul>
																</div>
																
																<div class="inner-booking-list">
																	<h5>Address:</h5>
																	<ul class="booking-list">
																		<li>'.$tasklist->property_address.'</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="buttons-to-right">
														
														<a data-draggable="item" id="taskcls_'.$tasklist->id.'" data_taskid="'.$tasklist->id.'"  href="#" class="button gray approve draggable taskcls">
												
														<input type="hidden" name="taskid[]" value="'.$tasklist->id.'">													
															<i class="sl sl-icon-check main-display"></i>'.$tasklist->SR_code.'
															<br /><span class="assign-display">'.$tasklist->booking_date.' , '.$tasklist->bookingtime.'-'.$endtime_ac.'</span>
														</a>

														<a href="'.$base_url.'admin/schedule/scheduletaskcancel/'.$tasklist->id.'" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a>
													</div>
													</li>';
												}
												elseif($shedule_status == '5')
												{
													echo '<li class="canceled-booking bookingdatefilter" id="bookingdatefilter_'.$tasklist->id.'" data-book-date-item data-book-date="'.date("m/d/Y", strtotime($tasklist->booking_date)).'">
														<div class="list-box-listing bookings">
															<div class="list-box-listing-content">
																<div class="inner">
																	<h3><span class="booking-status">'.$tasklist->SR_code.'</span></h3>

																	<div class="inner-booking-list">
																		
																		<ul class="booking-list">
																			<li>'.date("j M Y", strtotime($tasklist->booking_date)).'</li>
																			<li>'.$tasklist->bookingtime.'</li>
																			<li class="highlighted">Est. '.$tasklist->est_time.' hours</li>
																		</ul>
																	</div>
																	
																	<div class="inner-booking-list">
																		<h5>Address:</h5>
																		<ul class="booking-list">
																			<li>'.$tasklist->property_address.'</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</li>';
												}
											}
										
											?>
																					
										</ul>
									</div>
								</div>
							</div>
						

						
						
						<?php //} 
						
						} } ?>

						</div>
					</div>
				</div>
				
				<!-- Contractor Companies -->

				<div class="col-lg-6 col-md-12">
					<div class="dashboard-list-box with-icons s-contractor margin-top-20">
						<h4>Vendors</h4>
						<div class="search sche_cre">
							<input type="text" data-search class="contractor-finder" placeholder="&#xF002" />
						</div>
						<div class="contractor-content">
							
						<?php 
						
						//var_dump($schedule_assignedcontractor );
						//~ echo '<pre>';
						//~ print_r($schedule_contractor);
						//~ echo '</pre>';
						
							$compname = array();
							$previous = '';
							$j = 0;
							
							if(!empty($schedule_contractor))
							{
							foreach($schedule_contractor as $contractor)
							{															
								$compname = $contractor->companyname;
								if($previous != $compname)
								{
									//echo '<div id="common_container_'.$j.'" class="common_container">'; 
								?>								
									<h5 data-filter-comname data-filter-comnameval="<?php echo strtolower($contractor->companyname); ?>" class="contractor-company"> <?php echo $contractor->companyname ?> </h5>
								<?php 
								} ?>
								
								<div data-draggable="target" data-name="holecls" class="schedulecls" id="schedulecls_<?php echo $j; ?>" data-filter-scompname data-filter-companyname="<?php echo $contractor->companyname; ?>">
									<h5 class="cont_name_cls" data-class-val="schedulecls_<?php echo $j; ?>"  data-filter-item data-filter-name="<?php echo $contractor->username; ?>"> <?php echo $contractor->username; ?> ( <?php echo $contractor->user_workpermitno; ?>)
										<input type="hidden" name="user_id" class ="user_id" value="<?php echo $contractor->id_user_master;?>">
										<input type="hidden" name="device_id" class ="device_id" value="<?php echo $contractor->device_id;?>">
										<span>
											
											<?php 
											if(!empty($get_task_category))
											{
												$catval = array();
												foreach($get_task_category as $get_task_categorysep ) 
												{
													$catval[$get_task_categorysep->id] = $get_task_categorysep->image_path;
													
													//~ $shortcode_arr[] = strtolower($get_task_categorysep->taskcatshort_code);
													//~ $img_path[] = $get_task_categorysep->image_path;
													//~ $ids[] = $get_task_categorysep->id;
												}
												
										
											
											    if(!empty($contractor->skills))
											    {
													$exp =array();
													$exp = explode(',',$contractor->skills);
													if(!empty($exp)) 
													{
													

														$expcount = count($exp);
													
														for($i = 0; $i < $expcount; $i++)
														{
															
															
													echo '<i class="'.$catval[$exp[$i]].'"></i>';													
														}
													}
												}
											}
											?>
										</span>
									</h5>	
										<?php 
										//~ echo '<pre>';
										//~ print_r($schedule_assignedcontractor);
										//~ echo '</pre>';
										
										foreach ($schedule_assignedcontractor_sched as $schedule_assignedcontractor_val)
										{ 			
											
																			
											if($schedule_assignedcontractor_val->contr_id == $contractor->id_user_master)
											{
												
												//echo "hi";
												 $timestamp_sche = strtotime($schedule_assignedcontractor_val->bookingtime) + 60*60*$schedule_assignedcontractor_val->est_time;	
												$endtime_sche = date('h:ia',$timestamp_sche);

												echo '<a data-asgbook-date-item data-asgbook-date="'.$schedule_assignedcontractor_val->booking_date.'" class="button gray approve draggable taskcls cont_bookdate" data-draggable="item" id="taskcls_'.$schedule_assignedcontractor_val->id.'" data_taskid="'.$schedule_assignedcontractor_val->id.'"  href="#" >
												<input type="hidden" name="taskid[]" value="'.$schedule_assignedcontractor_val->id.'">		
																	<i class="sl sl-icon-check main-display"></i> '.$schedule_assignedcontractor_val->SR_code.'
																	<br /><span class="assign-display">'.date("d/m/y", strtotime($schedule_assignedcontractor_val->booking_date)).' , '.str_replace(" ","",$schedule_assignedcontractor_val->bookingtime).'-'.$endtime_sche.'</span>
																</a>';
											}
										}
										?>								
								</div>
								
								<?php
							
								$previous = $contractor->companyname;
								$j++;
									
									//echo '</div>';						
								
							}
							
							}					
								?>
						
						</div>					
					</div>
					<div  class="set_schedule">
						<button type="submit"  id="update_schedule" class="schedule-submit button grey">Update Schedule</button>
					</div>
				</div>
				
				
				
				<script>	
					//~ $('[data-search]').on('keyup', function() 
					//~ {
						//~ var filterItemsdate = $('[data-book-date-item]');
						//~ var searchVal = $(this).val();
						//~ var filterItems = $('[data-filter-item]');
							//~ var filterItemcoms = $('[data-filter-comname]');
						//~ //	alert(searchVal);
						//~ if ( searchVal != '' ) 
						//~ {
							//~ filterItemsdate.removeClass('hidden');
							//~ //filterItems.addClass('hidden');
							//~ //$('.schedulecls').addClass('hidden');
							//~ filterItemcoms.addClass('hidden');
							//~ //$('.common_container').addClass('hidden');
							//~ $('.schedulecls').hide();	
							//~ $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
								//~ if($('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]'))
								//~ {
									//~ $('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');

									//~ // $('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]').after().show();
									//~ $('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]').next( ".schedulecls" ).show();
								//~ }
								//~ else
								//~ {
									
									//~ $('.schedulecls').show();
								//~ }
						//~ } 
						//~ else 
						//~ {
							//~ //alert('hi');
							//~ filterItemcoms.removeClass('hidden');
							//~ $('div.schedulecls').show();
						//~ }
					//~ });	
					
					
					$('[data-search]').on('keyup', function() 
					{
						var filterItemsdate = $('[data-book-date-item]');
						var searchVal = $(this).val();
						var filterItems = $('[data-filter-item]');
						var filterItemcoms = $('[data-filter-comname]');
						
						if ( searchVal != '' ) 
						{
							filterItemsdate.removeClass('hidden');						
							filterItemcoms.addClass('hidden');							
						
							$('.schedulecls').hide();	
							$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');

								if($('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]'))
								{
									$('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');	
									$('[data-filter-scompname][data-filter-companyname*="' + searchVal.toLowerCase() + '"]').show();	
									$('[data-filter-scompname][data-filter-companyname*="' + searchVal.toLowerCase() + '"]').show();
									$('[data-filter-scompname][data-filter-companyname*="' + searchVal.toUpperCase() + '"]').show();
									$('[data-filter-scompname][data-filter-companyname*="' + searchVal + '"]').show();		
									$('[data-filter-comname][data-filter-comnameval*="' + searchVal.toLowerCase() + '"]').next( '.schedulecls' ).show();
									//$('[data-filter-scompname][data-filter-companyname*="' + searchVal.toLowerCase() + '"]').next( '.schedulecls' ).show();	
								}
								else
								{								
									$('.schedulecls').show();
								}
								
								
								if($('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]'))
								{
									
									$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').parent().show();									
									var compname = $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').closest('.schedulecls').attr('data-filter-companyname');
									$('[data-filter-comnameval *="'+ compname + '"]').removeClass('hidden');
									
								
									//console.log(compname);
								}
								else
								{
									$('.schedulecls').show();
								}

						} 
						else 
						{
							//alert('hi');
							filterItemcoms.removeClass('hidden');
							$('div.schedulecls').show();
						}
					});	
					
					$('#update_schedule').click(function(e)
					{
						e.preventDefault();
						jQuery.ajax({
						url : '<?php echo $base_url?>admin/schedule/addschedule',
						type: 'POST',
						success:function(response){
						toastr.options = {
						"closeButton": true,
						}
						toastr.success("Scheduled Succesfully", "Notifications");
						setTimeout(function(){ 	location.reload();
							 }, 500);	
						}
						});
						 
					});
				</script>
				
				
								
				<script type="text/javascript">
				$(document).ready(function()
				{	
				
					$(".serch_date").change(function() 
					{
						
						var filterItems = $('[data-filter-item]');
						var searchVal = $(this).val();
						var filterItemsdate = $('[data-book-date-item]');
						
						if ( searchVal != '' ) 
						{

							filterItems.removeClass('hidden');
							filterItemsdate.addClass('hidden');											
							var schegetval = $('.bookingdatefilter').length;													
							$('[data-book-date-item][data-book-date*="' + searchVal+ '"]').removeClass('hidden');
														
							jQuery.ajax({
							url : '<?php echo $base_url?>admin/schedule/get_awaitingcount',
							type: 'POST',
							data: { booking_date : searchVal },
							dataType : 'json',
								success:function(response){
									console.log(response);
									var ids = '<?php echo json_encode($ids); ?>';	
																
									
									jQuery.each( response, function( key, value ) {
									
										if(value != 0)
										{
											$('.hiddbadge'+key).show(); 
											$('.hiddbadge'+key).empty();
											$('.hiddbadge'+key).append(value);
											
										}
										else
										{
											$('.hiddbadge'+key).hide();
										}
									});

								}
							});
						
							var filterItemsdata = $('[data-filter-item]');
							var searchVal = $(this).val();
							var filterItemsdatedata = $('[data-asgbook-date-item]');
							filterItemsdata.removeClass('hidden');
							filterItemsdatedata.addClass('hidden');
							var schegetval = $('.cont_bookdate').length;
							for(i=0 ;i<schegetval;i++)
							{
								var count_date = $('[data-asgbook-date-item][data-asgbook-date*="' + searchVal+ '"]').length;
								var attid = $('[data-asgbook-date*="' + searchVal+ '"]').attr('id');
								if(count_date == 0)
								{
									if(!$('#'+attid+'_'+i).find( "a" ).length)
									{									
										$('#'+attid+'_'+i).show();
									}
								}
								else
								{
									$('[data-asgbook-date-item][data-asgbook-date*="' + searchVal+ '"]').removeClass('hidden');
								}
								
							}	
						} 
						else 
						{
							
							filterItemsdatedata.removeClass('hidden');
							$('.bookingdatefilter').show();	
						}
					});
					
				});
			
			
				</script>
				<!-- Copyrights -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="copyrights">&copy; 2018 1SS. All Rights Reserved.</div>
				</div>
			</div>

		</div>
		<!-- Content / End -->
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
.tabs-nav li span.nav-tag {
  //  background-color: rgba(255, 255, 255, 0.2);
    font-family: "Open Sans";
    font-weight: 600;
    display: inline-block;
    font-size: 11px;
    line-height: 20px;
    color: #fff;
    padding: 0;
    padding: 0 7px;
    box-sizing: border-box;
    text-align: center;
    min-width: 20px;
    height: 20px;
    letter-spacing: -0.5px;
    text-align: center;
    border-radius: 50px !important;
    margin-left: 4px;
}
</style>
