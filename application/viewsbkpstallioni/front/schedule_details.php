<link src="<?php echo $base_url; ?>/assets/css/styles.css">
<style>
	.complete
	{
		background: #f91942;
		color: #fff;
		padding: 15px;  
		border-radius: 25px;
		display: block;
		width: 100px;
		text-align: center;
	}
</style>
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
		<div class="row">
<?php //print_r($get_schedule); exit; ?>

			<!-- Post Content -->
			<div class="col-lg-12 col-md-12 padding-top-30">

			<?php
				//~ echo '<pre>';
				//~ print_r($get_schedule);
				//~ echo '</pre>';
				//~ //exit;
			?>

			<form action="<?php echo $base_url; ?>schedule/service_report?id=<?php echo $get_schedule->id; ?>" method="post">

				<!-- Blog Post -->
				<div class="blog-post single-post">
					
					<!-- Img -->
					<img class="post-img schedule" src="<?php echo $base_url.'uploads/'.$get_schedule->image_path; ?>" alt="">

					<!-- Content -->
					<div class="post-content">
						
						<?php
						$newDate = date("Ymd");
						 ?>
						<div id="titlebar" class="listing-titlebar">
							<h2><?php echo $get_schedule->task_catname; ?> Services <span class="listing-tag"><?php echo $get_schedule->SR_code; ?></span>
							<input type="hidden" name="sr_code" value="<?php echo $get_schedule->SR_code; ?>" >
							</h2> 
							<h3><?php echo $get_schedule->property_name; ?></h3>
							<span class="margin-right-30">
								<a href="#listing-location" class="listing-address">
									<i class="fa fa-map-marker"></i>
								 <?php echo $get_schedule->property_address; ?>
								<input type="hidden" name="sr_address" value="<?php echo $get_schedule->property_address; ?>" >
								<input type="hidden" name="propertyname" value="<?php echo $get_schedule->property_name; ?>" >

							<input type="hidden" name="sche_id" value="<?php echo $get_schedule->id; ?>" >

							<input type="hidden" name="uname" value="<?php echo $get_schedule->username; ?>" >
							<input type="hidden" name="ucontractor_id" value="<?php echo $get_schedule->contr_id; ?>" >
							<input type="hidden" name="us_id" value="<?php echo $get_schedule->user_id; ?>" >
							<input type="hidden" name="service_catename" value="<?php echo $get_schedule->task_catname; ?>" >

								</a>
							</span>
							<span>
								<a class="listing-address">
									<i class="fa fa-clock-o"></i>
								<?php	$newDate = date("d.m.Y", strtotime($get_schedule->booking_date)); 
								echo $newDate ;
								if($get_schedule->booking_date != '' ){ echo ' at '.$get_schedule->bookingtime; }
								
								//~ ($get_schedule->bookingtime != '' ) ? 'at'.$get_schedule->bookingtime :''  ;
								$newDate_bd = date("d/m/Y", strtotime($get_schedule->booking_date));
								 ?>
							<input type="hidden" name="iss_date" value="<?php echo $newDate_bd; ?>" >


								</a>
							</span>			
							<h4 class="margin-top-60"><?php echo $get_schedule->username; ?></h4>
							<ul class="post-meta">
								<li><?php echo $get_schedule->phone; ?>  </li>
								<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="">[email&nbsp;protected]</a></li>
							</ul>
						</div>
						<p><strong>Job Description:</strong> <?php echo $get_schedule->description; ?> </p>
						<input type="hidden" name="sche_descrip" value="<?php echo $get_schedule->description; ?>" >
						<div class="numbered">
							<div class="field_wrapper">
								<ol>
									<?php
										$jobname = unserialize($get_schedule->jobname);
										$jobprice = unserialize($get_schedule->jobprice);
										for($i=0; $i<count($jobname); $i++)
										{
											echo '<li>'.$jobname[$i].' - '.$jobprice[$i].'</li>';
										}
									?>															
								</ol>
							</div>
						</div>
						
							<button type="submit" class="button margin-top-30">Complete</button>
					
						<div class="clearfix"></div>

					</div>
				</div>
				<!-- Blog Post / End -->
				</form>
			
			</div>
		</div>
	</div>
</div>
<!--<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button_new'); //Add button selector
    var wrapper = $('.field_wrapper ol'); //Input field wrapper
    var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_price[]" class="col-md-3 add_field" />  <label class="col-md-1">$ </label><input name="cont_price[]"  class="col-md-3  onlyNumber form-control pull-left cost" id="noOfRoom"  type="text" value="40"/><a href="javascript:void(0);" class="remove_button" title="Add field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></li>'; //New input field html 
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
        $(this).parent('li.add_remov').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    
});  
 </script> -->

