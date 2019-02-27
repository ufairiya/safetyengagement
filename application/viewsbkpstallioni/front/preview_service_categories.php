<!-- Content
================================================== -->
<?php //var_dump($task_cate);
	
		$gallimg = json_decode($task_cate->gallery_img); 
		if(!empty($gallimg)){ ?>
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<?php  
	
	 foreach($gallimg as $gallimg_href)
	{
	?>
		<a href="<?php echo $gallimg_href; ?>" data-background-image="<?php echo $gallimg_href; ?>" class="item mfp-gallery" title=""></a>
	<?php 
	} ?> 
<!--
	<a href="images/single-listing-02.jpg" data-background-image="images/single-listing-02.jpg" class="item mfp-gallery" title=""></a>
	<a href="images/single-listing-03.jpg" data-background-image="images/single-listing-03.jpg" class="item mfp-gallery" title=""></a>
	<a href="images/single-listing-04.jpg" data-background-image="images/single-listing-04.jpg" class="item mfp-gallery" title=""></a>
-->
</div><?php } ?>

<div class="container margin-bottom-30">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?php echo $task_cate->taskcategory_name; ?></h2>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<?php	if($task_cate->hideshowpr_status == 1){ ?><li><a href="#listing-pricing-list">Pricing</a></li><?php } ?>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
					<?php echo $task_cate->summary; ?>
				</p>

				
			</div>


			<!-- Food Menu -->
		<?php	if($task_cate->hideshowpr_status == 1){ ?>
			<div id="listing-pricing-list" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

				<div class="show-more">
					<div class="pricing-list-container">
						<?php 
						$sutit = json_decode($task_cate->subtitle); 
						$counsub = json_decode($task_cate->pricecount); 
						$priname = json_decode($task_cate->pricename); 
						$price = json_decode($task_cate->price);
						$descp = json_decode($task_cate->description);
						
					//	print_r($priname);
						 
						$prinamecot =count($priname);
						$start_val = 0;
						$end_val =$counsub[0]; 
						for($i=0; $i<count($sutit);$i++)
						{
							echo '<h4>'.$sutit[$i].'</h4><ul>';
							
							if($i != 0)
							{
								$start_val = $start_val + $counsub[$i-1];
								$end_val = $start_val+$counsub[$i];
							}
							
							for($j=$start_val; $j<$end_val;$j++)
							{								
																							
									echo '<li><h5>'.$priname[$j].'</h5><p>'.$descp[$j].'</p><span>$'.$price[$j].'</span></li>';
								
								
							}
							echo '</ul>';
						}
						 
						 ?>
						<!-- Food List -->
						

					</div>
				</div>
				<a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
			</div>
			<?php } ?>
			
			<!-- Food Menu / End -->

		</div>

<?php	if($task_cate->hideshowti_status == 1){ ?>
		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">
				
			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<!-- <div class="listing-badge now-open">Now Operating</div> -->
				<h3><i class="sl sl-icon-clock"></i> Operating Hours</h3>
				<ul><?php $opentime = json_decode($task_cate->opening_hours);
            $closertime = json_decode($task_cate->closing_hours);
            //~ var_dump($opentime);
            //~ var_dump($closertime);
			$day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

			$opentime_count = count($opentime);
			//~ $pricename_array_count= $pricename_array_count-1;
			for($i=0; $i<$opentime_count;$i++ )
			{ 
					if($opentime[$i] == 'Closed' && $closertime[$i] == 'Closed'){
					echo '<li>'.$day[$i].'<span> Closed </span></li>';
				}else
				{
					echo '<li>'.$day[$i] .'<span>'.$opentime[$i].' - '.$closertime[$i].'</span></li>';
				}
			}
									?>
<!--
               <li>Monday - Friday <span>9 AM - 8.30 PM</span></li>
               <li>Saturday <span>9 AM - 6.30 PM</span></li>
               <li>Sunday <span>9 AM - 4.00 PM</span></li>
-->
            </ul>
			</div>
			<!-- Opening Hours / End -->

		</div>
		<!-- Sidebar / End -->
<?php } ?>
	</div>
</div>
<!-- Back To Top Button -->

<div id="backtotoppre">
	
	<a  href="#" class="backtotoppre service-btn"></a>
	
	<a href="<?php echo $base_url; ?>admin/service/changestatus?serid=<?php echo $task_cate->id; ?>&status=1" target="_blank" class="service-btn save-btn">Live <i class="fa fa-arrow-circle-right"></i>
	</a>

	<a href="<?php echo $base_url; ?>admin/service/changestatus?serid=<?php echo $task_cate->id; ?>&status=0" target="_blank" class="service-btn save-btn">Draft <i class="fa fa-arrow-circle-right"></i>
	</a>
	
</div>
