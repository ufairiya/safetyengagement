<!-- Slider
   ================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
   <a href="<?php echo $base_url?>assets/listeo/images/single-listing-01.jpg" data-background-image="<?php echo $base_url?>assets/listeo/images/single-listing-01.jpg" class="item mfp-gallery" title=""></a>
   <a href="<?php echo $base_url?>assets/listeo/images/single-listing-02.jpg" data-background-image="<?php echo $base_url?>assets/listeo/images/single-listing-02.jpg" class="item mfp-gallery" title=""></a>
   <a href="<?php echo $base_url?>assets/listeo/images/single-listing-03.jpg" data-background-image="<?php echo $base_url?>assets/listeo/images/single-listing-03.jpg" class="item mfp-gallery" title=""></a>
   <a href="<?php echo $base_url?>assets/listeo/images/single-listing-04.jpg" data-background-image="<?php echo $base_url?>assets/listeo/images/single-listing-04.jpg" class="item mfp-gallery" title=""></a>
</div>
<!-- Content
   ================================================== -->
<div class="container">
   <div class="row sticky-wrapper">
      <div class="col-lg-8 col-md-8 padding-right-30">
         <!-- Titlebar -->
         <div id="titlebar" class="listing-titlebar">
            <div class="listing-titlebar-title">
               <h2><?php echo $task_cate->taskcategory_name; ?> Services</h2>
            </div>
         </div>
         <!-- Listing Nav -->
         <div id="listing-nav" class="listing-nav-container">
            <ul class="listing-nav">
               <li><a href="#listing-overview" class="active">Overview</a></li>
               <li><a href="#listing-pricing-list">Pricing</a></li>
            </ul>
         </div>
         <!-- Overview -->
         <div id="listing-overview" class="listing-section">
            <!-- Description -->
            <?php echo  $task_cate->summary; ?>
         </div>
         <!-- Food Menu -->

         <div id="listing-pricing-list" class="listing-section">
            <h3 class="listing-desc-headline margin-bottom-30">Pricing</h3>
            <div class="show-more">
               <div class="pricing-list-container">
                 
               
                  <h4><?php  echo json_decode(ucwords($task_cate->subtitle)
                  ); ?> </h4>
                  <ul>
                     <?php
                        $pricename_array = json_decode($task_cate->pricename); 
                        					$price_array = json_decode($task_cate->price);
                        		$price_description = json_decode($task_cate->description);
                        	
                        	 $pricename_array_count = count($pricename_array);
                        								$pricename_array_count= $pricename_array_count-1;
                        		for($i=0; $i<=$pricename_array_count;$i++ ){ ?>
                     <li>
                        <h5><?php echo $pricename_array[$i]; ?> </h5>
                        <p><?php echo $price_description[$i]; ?> </p>
                        <span><?php echo $price_array[$i]; ?></span>
                     </li>
                     <?php } ?>
                    
                  </ul>
                  
            
                
               </div>
            </div>
            <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
         </div>
         

         <!-- Food Menu / End -->
      </div>
      <!-- Sidebar
         ================================================== -->
      <div class="col-lg-4 col-md-4 margin-top-75 sticky">
         <!-- Book Now -->
        <?php if($this->session->userdata('id_user_master'))  { ?>
        <div class="boxed-widget booking-widget margin-top-35">
        
            <h3><i class="fa fa-calendar-check-o "></i> Book an Appointment</h3>
            <div class="row with-forms  margin-top-0">
               <!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
               <!--
                  <div class="col-lg-6 col-md-12">
                  	<input type="text" id="booking-date" class="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017">
                  </div>
                  -->
               <!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
               <!--
                  <div class="col-lg-6 col-md-12">
                  	<input type="text" id="booking-time" class="booking-time" value="9:00 am">
                  </div>
                  -->
                
            </div>
            <!-- progress button animation handled via custom.js -->
            <a href="<?php echo $base_url; ?>my-request/new-request" class="button book-now fullwidth margin-top-5">Book Now</a>
            
         </div>
          <?php } ?>
         <!-- Book Now / End -->
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
                        	 for($i=0; $i<$opentime_count;$i++ ){ 
							
								echo '<li>'.$day[$i] .'<span>'.$opentime[$i].' - '.$closertime[$i].'</span></li>';
							
								 
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
   </div>
</div>
