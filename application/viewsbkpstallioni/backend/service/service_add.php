	
	<!-- jQuery -->
	<script src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/jquery-1.11.1.min.js"></script>

	<!-- Demo Scripts -->
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/shCore.js"></script>

	<!-- icon picker -->
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/jquery.fonticonpicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/css/jquery.fonticonpicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/css/jquery.fonticonpicker.grey.min.css" />

	<!-- Font -->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/css/icons.css" />

	<!-- Init script for this DEMO -->
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/iconpicker/im-fontpicker/scripts/fontpicker.js"></script>
	
	
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Service Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url; ?>admin/dashboard">Home</a></li>
							<li>Service Management</li>
							<li>Add Service</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing form">
					

					<form action="" id="formservice" method="POST" name="service_categoies"  class="service_categoies allforms">


						<!-- Section -->
						<div class="add-listing-section serviceadd">

							<!-- Headline -->
							<div class="add-listing-headline">
								<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
							</div>

							<!-- Row -->
							
								<div class="row with-forms customservicehead">
								<div class="col-lg-4">
									<h5>Service Title</h5>
									<div class="clear"></div>
									<input style="color:#888 !important" type="text" name="service_title" id="service_title"/>
								</div>
								<div class="col-lg-3 col-md-6">
									<h5 class="title-align">Service Title Short </h5>
																		

										<input type="text" name="shortname" placeholder="Ex: AC" id="shortname" />


								</div>
								<!-- Status -->
								<div class="col-lg-2 col-md-6">
									<h5 class="title-align">Icon <i class="tip" data-tip-content="icon to represent this category"></i></h5>
																		

										<input type="text" name="im-fontpicker" id="im-fontpicker" />
								<input type="hidden" name="iconcode" id="iconcode" class="iconcode" value="">

								</div>
								
								<div class="col-lg-3 col-md-6">
									<h5>Max Appointment<i class="tip" data-tip-content="Maximum number of appointments per hour"></i></h5>
																		

									<input type="text" style="color:#888 !important" name="max_appointment" id="max_appointment" />
								</div>
								<div class="col-md-12">
									<h5>Description</h5>
									<textarea class="WYSIWYG" style="color:#888 !important" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
								</div>
							</div>
						<!-- Row / End -->

						</div>
						<!-- Section / End -->


					<div class="gallimg"></div>
						<!-- Section -->
						<div class="time_list add-listing-section margin-top-45 customservicehead">
							
							<!-- Headline -->
							<div class="add-listing-headline">
								<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
								<!-- Switcher -->
								<label class="time_switch switch">
									<input type="checkbox" name="hideshowti" class="hideshowti" checked>
									
								<span class="slider round"></span></label>
							</div>
							
						<!-- Switcher ON-OFF Content -->
							<div class="switcher-content">
<?php $timearray =array('1 AM','1.30 AM','2 AM','2.30 AM','3 AM','3.30 AM','4 AM','4.30 AM','5 AM','5.30 AM','6 AM','6.30 AM','7 AM','7.30 AM','8 AM','8.30 AM','9 AM','9.30 AM','10 AM','10.30 AM','11 AM','11.30 AM','12 AM','12.30 AM','1 PM','1.30 PM','2 PM','2.30 PM','3 PM','3.30 PM','4 PM','4.30 PM','5 PM','5.30 PM','6 PM','6.30 PM','7 PM','7.30 PM','8 PM','8.30 PM','9 PM','9.30 PM','10 PM','10.30 PM','11 PM','11.30 PM','12 PM','12.30 PM'); ?>
				<!-- Day -->
								<div class="row opening-day">
									<div class="col-md-2"><h5>Monday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="openmon" name="opentime[]" id="opentimemon" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime"  data-close="closemon"  name="closetime[]" id="closetimemon" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Tuesday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="opentue" id="opentimetue" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
										<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime"  data-close="closetue" id="closetimetue" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Wednesday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="openwed" id="opentimewed" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-close="closewed" id="closetimewed" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Thursday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime"data-open="openthu" id="opentimethu" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-close="closethu" id="closetimethu" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Friday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="openfri" id="opentimefri" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-close="closefri" id="closetimefri" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Saturday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="opensat" id="opentimesat" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-close="closesat" id="closetimesat" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->

								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2"><h5>Sunday</h5></div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-open="opensun" id="opentimesun" name="opentime[]" data-placeholder="Opening Time">
											<option label="Opening Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
									<div class="col-md-5">
										<select class="chosen-select chosentime" data-close="closesun" id="closetimesun" name="closetime[]" data-placeholder="Closing Time">
											<option label="Closing Time"></option>
											<option value="Closed">Closed</option>
											<?php foreach( $timearray as  $timearrayval){ ?>
													<option><?php echo $timearrayval; ?></option>
													<?php } ?>
										</select>
									</div>
								</div>
								<!-- Day / End -->
							</div>
							<!-- Switcher ON-OFF Content / End -->

						</div>
						<!-- Section / End -->

  

						<!-- Section -->
						<div class="price_list add-listing-section margin-top-45 customservicehead">
							
							<!-- Headline -->
							<div class="add-listing-headline">
								<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
								<!-- Switcher -->
								<label class="price_switch switch">	<input type="checkbox" name="hideshowpr" class="hideshowpr" checked><span class="slider round"></span></label>
							</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pricing-submenu" data-attr="submenu">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div><div class="fm-input"><input class="catname" type="text" name="subtitle[]" id="subtitle0" placeholder="Category Title" value=""></div><div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
										<tr class="pricing-list-item pattern" data-attr="price">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input class="inputpricename" type="text" name="cate_price_name[]" id="cate_price_name0" placeholder="Title" value=""/></div>
												<div class="fm-input pricing-ingredients"><input class="inputpricedes" type="text" name="desc" id="desc" placeholder="Description" value="" /></div>
												<div class="fm-input pricing-price"><input class="inputprice" type="number" name="cate_price[]" id="cate_price0" placeholder="Price" data-unit="SGD" value=""  /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									<a href="#" class="button add-pricing-submenu">Add Category</a>
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->


						</div>
						<!-- Section / End -->
						
				
				</form>
				
						<!-- Section -->
						<div class="add-listing-section margin-top-45">

							<!-- Headline -->
							<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
							</div>
								<!-- Dropzone -->
							<div class="submit-section">
								<form action="<?php echo $base_url; ?>admin/service/upload_service_gallery" class="dropzone " >
								</form>
							</div>

						</div>
						<!-- Section / End -->

					<button target="_blank" id="addpreview" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></button>

<!--
					<button target="_blank" id="servicecategorydelete" class="button catdelete"> Delete <i class="fa fa-close"></i></button>
-->

				</div>
			</div>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2018 1SS. All Rights Reserved.</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->
	
		<style>

#pricing-list-container a.button:focus {
  color:#666 !important;
  background-color: #f0f0f0!important;
}

</style>
	
<script>
jQuery(document).ready(function(e) {
   
       $("#opentimemon").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimemon_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
		$('select[id^="closetimemon"] option[value="Closed"]').attr("selected","selected");
		
		}
		else{
				$("#closetimemon_chosen").attr('style','width: 100%;');
				$('select[id^="closetimemon"] option[value="Closed"]').removeAttr("selected");
			
			}
	  
	   });
       $("#opentimetue").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimetue_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimetue"] option[value="Closed"]').attr("selected","selected");

		}
		   else{
				$("#closetimetue_chosen").attr('style','width: 100%;');
				$('select[id^="closetimemon"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
       $("#opentimewed").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimewed_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimewed"] option[value="Closed"]').attr("selected","selected");

		}
		   else{
				$("#closetimewed_chosen").attr('style','width: 100%;');
				$('select[id^="closetimewed"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
       $("#opentimethu").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimethu_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimethu"] option[value="Closed"]').attr("selected","selected");

		}
		   else{
				$("#closetimethu_chosen").attr('style','width: 100%;');
				$('select[id^="closetimethu"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
       $("#opentimefri").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimefri_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimefri"] option[value="Closed"]').attr("selected","selected");

		}
		   else{
				$("#closetimefri_chosen").attr('style','width: 100%;');
				$('select[id^="closetimefri"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
       $("#opentimesat").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimesat_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimesat"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#closetimesat_chosen").attr('style','width: 100%;');
				$('select[id^="closetimesat"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
	   
       $("#opentimesun").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#closetimesun_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="closetimesun"] option[value="Closed"]').attr("selected","selected");

		}
		   else{
				$("#closetimesun_chosen").attr('style','width: 100%;');
				$('select[id^="closetimesun"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
       $("#closetimemon").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimemon_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
		$('select[id^="opentimemon"] option[value="Closed"]').attr("selected","selected");
		
		}else{
				$("#opentimemon_chosen").attr('style','width: 100%;');
				$('select[id^="opentimemon"] option[value="Closed"]').removeAttr("selected");
			
			}
	  
	   });
       $("#closetimetue").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimetue_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimetue"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimetue_chosen").attr('style','width: 100%;');
				$('select[id^="opentimetue"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
       $("#closetimewed").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimewed_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimewed"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimewed_chosen").attr('style','width: 100%;');
				$('select[id^="opentimewed"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
       $("#closetimethu").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimethu_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimethu"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimethu_chosen").attr('style','width: 100%;');
				$('select[id^="opentimethu"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
       $("#closetimefri").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimefri_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimefri"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimefri_chosen").attr('style','width: 100%;');
				$('select[id^="opentimefri"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
       $("#closetimesat").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimesat_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimesat"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimesat_chosen").attr('style','width: 100%;');
				$('select[id^="opentimesat"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
	   });
	   
       $("#closetimesun").on('change', function(){   
		   
		if($(this).val() == 'Closed')
		{
			//~ $('#closetimemon').attr("disabled",true);
			$("#opentimesun_chosen").attr('style','pointer-events: none;width: 100%;opacity: 0.5;');
				$('select[id^="opentimesun"] option[value="Closed"]').attr("selected","selected");

		}else{
				$("#opentimesun_chosen").attr('style','width: 100%;');
				$('select[id^="opentimesun"] option[value="Closed"]').removeAttr("selected");
			
			}
		   
		   
	   });
	   
       $("#formservice").validate({
			
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
             messages: {              
               				
					
				 				
				 'service_title': {
                    required: 'Please Enter Service Title',
                    remote: 'Already exist',
                },
                'im-fontpicker': {
                    required: 'Please Choose Service Icon',
                },
				 'service_icon': {
                    required: 'Please Choose Service Icon',
                },
				 'max_appointment': {
                    required: 'Please Enter Max Appointment',
                },
				 
				 'summary': {
                    required: 'Please Enter Select Summary',
                },
				 
				 'opentime[]': {
                    required: 'Please Choose Open Time',
                },
				 
				 'closetime[]': {
                    required: 'Please Choose Close Time',
                },
				 

				'subtitle[]': {
				required: 'Item category title is required',
				},

				'cate_price_name[]': {
				required: 'Item title is required',
				},


				'cate_price[]': {
				required: ' Item price is required',
				},
				galleryimg: {
				required: 'Please Enter Gallery image',
				},

				shortname: {
				required: 'Please Enter Short Name',
				},
						               
            },
            rules: {
                service_title: {
             
				   required: true,
					remote: {
					url: "<?php echo $base_url; ?>admin/service/unquie_service_title_val",
					type: "post",
					data: {
						type:'service_title',
						service_title: function() {
							return $( "#service_title" ).val();
							}
						}
					}
			    },
				service_icon: {
                    required: true
                },
            
			  	shortname: {
                    required: true
                },
			  	max_appointment: {
                    required: true
                },
			  	         
                summary: {
                    required: true
                },
                'im-fontpicker': {
                    required: true
                },
				
				'opentime[]': {
                    required: true
                },
            
			  	'closetime[]': {
                    required: true
                },
			  	         
                'subtitle[]': {
                    required: true
                },
				
				'cate_price_name[]': {
                    required: true
                },
            
			  	'cate_price[]': {
                    required: true
                },
			  	//~ 'desc': {
                    //~ required: true
                //~ },
			  	         
			  
            },
         errorPlacement: function(error, element) {
		
        if (element.attr("name") == "service_icon") {
		if ($('#service_icon_chosen')[0]) {

            error.insertAfter("#service_icon_chosen");
        }else{
			 error.insertAfter("#service_icon");
			
			}
        }
        else if(element.attr("data-open") == "openmon") {
			if ($('#opentimemon_chosen')[0]) {
            error.insertAfter("#opentimemon_chosen");
		}else
		{
			 error.insertAfter("#opentimemon");
		}
        }
       
        else if(element.attr("data-close") == "closemon") {
			if ($('#closetimemon_chosen')[0]) {
            error.insertAfter("#closetimemon_chosen");
		}else
		{
			 error.insertAfter("#closetimemon");
		}
        }
        else if(element.attr("data-open") == "opentue") {
			if ($('#opentimetue_chosen')[0]) {
            error.insertAfter("#opentimetue_chosen");
		}else
		{
			 error.insertAfter("#opentimetue");
		}
        }
       
        else if(element.attr("data-close") == "closetue") {
			if ($('#closetimetue_chosen')[0]) {
            error.insertAfter("#closetimetue_chosen");
		}else
		{
			 error.insertAfter("#closetimetue");
		}
        }
        else if(element.attr("data-open") == "openwed") {
			if ($('#opentimewed_chosen')[0]) {
            error.insertAfter("#opentimewed_chosen");
		}else
		{
			 error.insertAfter("#opentimewed");
		}
        }
       
        else if(element.attr("data-close") == "closewed") {
			if ($('#closetimewed_chosen')[0]) {
            error.insertAfter("#closetimewed_chosen");
		}else
		{
			 error.insertAfter("#closetimewed");
		}
        }
        else if(element.attr("data-open") == "openthu") {
			if ($('#opentimethu_chosen')[0]) {
            error.insertAfter("#opentimethu_chosen");
		}else
		{
			 error.insertAfter("#opentimethu");
		}
        }
       
        else if(element.attr("data-close") == "closethu") {
			if ($('#closetimethu_chosen')[0]) {
            error.insertAfter("#closetimethu_chosen");
		}else
		{
			 error.insertAfter("#closetimethu");
		}
        }
        else if(element.attr("data-open") == "openfri") {
			if ($('#opentimefri_chosen')[0]) {
            error.insertAfter("#opentimefri_chosen");
		}else
		{
			 error.insertAfter("#opentimefri");
		}
        }
       
        else if(element.attr("data-close") == "closefri") {
			if ($('#closetimefri_chosen')[0]) {
            error.insertAfter("#closetimefri_chosen");
		}else
		{
			 error.insertAfter("#closetimefri");
		}
        }
        else if(element.attr("data-open") == "opensat") {
			if ($('#opentimesat_chosen')[0]) {
            error.insertAfter("#opentimesat_chosen");
		}else
		{
			 error.insertAfter("#opentimesat");
		}
        }
       
        else if(element.attr("data-close") == "closesat") {
			if ($('#closetimesat_chosen')[0]) {
            error.insertAfter("#closetimesat_chosen");
		}else
		{
			 error.insertAfter("#closetimesat");
		}
        }
        else if(element.attr("data-open") == "opensun") {
			if ($('#opentimesun_chosen')[0]) {
            error.insertAfter("#opentimesun_chosen");
		}else
		{
			 error.insertAfter("#opentimesun");
		}
        }
       
        else if(element.attr("data-close") == "closesun") {
			if ($('#closetimesun_chosen')[0]) {
            error.insertAfter("#closetimesun_chosen");
		}else
		{
			 error.insertAfter("#closetimesun");
		}
        }else{
            error.insertAfter(element);
        }
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
  });

    $('#addpreview').click(function() {
        if($("#formservice").valid() == true)
        {
			
			var i = 0;
			var pname = [];
			var pdes = [];
			var price = [];
			var val = [];
			var countarr = [];
			var j = 0;var k = 0;var l = 0; var m = 0; var count = 0;
			jQuery('#pricing-list-container').find('tr.pricing-list-item').each(function(index)
			{
				var cls = $(this).attr('data-attr');					
				jQuery( '.pricing-list-item' ).removeClass( 'activeprice' );
				jQuery( '.pricing-list-item' ).removeClass( 'activesubmenu' );

				prv = i;
				if(cls == 'submenu')
				{
					if(count != 0)
					{
						countarr[m++] = count;
					}
					count = 0;							
					jQuery(this).addClass('activesubmenu');				
					val[i++] = jQuery('.activesubmenu .catname').val();
				}
				else if(cls == 'price')
				{	
					count = count+1;			
					jQuery(this).addClass('activeprice');
					pname[j++] = jQuery('.activeprice .inputpricename').val();
					pdes[k++] = jQuery('.activeprice .inputpricedes').val();
					price[l++] = jQuery('.activeprice .inputprice').val();							
				}
				
				

			});
			countarr.push(count);
			
			jQuery('<input>').attr({ type: 'hidden', id: 'subcatategory', name: 'subcatategory' ,value : val }).appendTo('#formservice');
			jQuery('<input>').attr({ type: 'hidden', id: 'pricename', name: 'pricename' ,value : pname }).appendTo('#formservice');
			jQuery('<input>').attr({ type: 'hidden', id: 'pricedescription', name: 'pricedescription' ,value : pdes }).appendTo('#formservice');
			jQuery('<input>').attr({ type: 'hidden', id: 'price', name: 'price' ,value : price }).appendTo('#formservice');
			jQuery('<input>').attr({ type: 'hidden', id: 'pricecount', name: 'pricecount' ,value : countarr }).appendTo('#formservice');

			console.log(val);
			console.log(pname);
			console.log(pdes);
			console.log(price);
			console.log(countarr);
		
			jQuery.ajax({
				//~ var data = jQuery('#formservice').serialize();
				//~ data.push({name: 'subcatategory', value: val});
				//~ data.push({name: 'pricename', value: pname});
				//~ data.push({name: 'pricedescription', value: pdes});
				//~ data.push({name: 'price', value: price});
				//~ data.push({name: 'pricecount', value: countarr});
				
                    data:$('#formservice').serialize(),
               		url : '<?php echo $base_url?>admin/service/insertservice',
					type: 'POST',
					
					success:function(response){
						 var resval = jQuery.parseJSON(response);
						
						 	
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Added New Booking Succesfully", "Notifications");	
						//setTimeout(function(){
											window.location.href ="<?php echo $base_url?>booking/preview_service_categories/?serid="+resval.serid+"";

					 
					//}, 1000); 
					
				}
			}); 
		}
    });

		  
        //~ $('.allforms').each(function(){
        //~ service_title
        //~ var
        //~ service_title service_icon max_appointment summary
      //~ galleryimg opentime closetime
        
        //~ subtitle cate_price_name desc cate_price
        
			//~ var valuesToSend = $(this).serialize();

	 //~ jQuery.ajax($(this).attr('action'),
                //~ {
                //~ method: $(this).attr('method'),
                //~ data: valuesToSend,
               
					//~ url : '<?php echo $base_url?>admin/service/insertservice',
					//~ type: 'POST',
					
					//~ success:function(response){
					
            //~ }
        //~ }); 
        
        //~ });
        
	
		$('.price_switch').click(function (){
		var timeleng = $('.price_list.switcher-on').length;
         if(timeleng == 1)
         {
	$('.price_list input:text').attr("disabled",true);
		 }else
		 {
			 	$('.price_list input:text').removeAttr("disabled");

			 }
          }); 

		$('.time_switch').click(function (){
		var timeleng = $('.time_list.switcher-on').length;
         if(timeleng == 1)
         {
			$('.time_list select').attr("disabled",true);
		 }else
		 {
			 	$('.time_list select').removeAttr("disabled");

			 }
          }); 
          
          
          });

</script>

