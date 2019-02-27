 <style>
	 .propossub:hover +.freelancer-totle-area{
display : block;
background:green;
}
 .sectionpt130px .form-wrap{  background: rgba(255, 255, 255, 0.14);
    padding: 20px;
}
.jobposts h6
{
	    font-size: 16px;
	    margin: 0;
	    font-weight:600;
}
.jobposts p {
    margin: 0;
}

.jobposts a.listing
{
	    padding: 7px;
	    	border-left: 2px solid #eee;

}
.managejobposts .sell__section__row i
{
	
	color:#eb5a1c;
	}

.managejobposts section {
	border-radius: 0;
	padding: 25px;
	transition: .3s;
	position: relative;
	overflow: unset;
	border: unset;
	margin-top: -1px;
	display: table;
	width: 100%;
		border-left: 4px solid #ED7D31

}
.managejobposts span
{
	    padding: 0 12px;
	color:#000;
	}
.managejobposts .sell__section__row__list__child__note
{
	float:left;
	
	}
.eleven .pagination>li>a:hover{
	
	
}
	.eleven .pagination>li>a {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #EB5A1D;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.eleven{width: 100%;}

.eleven .listing li{
	    width: 118px;

border: unset; 
	}
	.listing.full-time
	{
		    width: 100%;
		}
input.sbutn
{    padding: 11px 18px;
	    width: 100%;
	        background-color: #f36c37;
    top: 0;
   
    color: #fff;
    position: relative;
    font-size: 15px;
    font-weight: 600;
    display: inline-block;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
    margin-right: 6px;
    overflow: hidden;
    border-radius: 0px !important;
        line-height: 40px;
	}
.input-group .form-control {
      border-right: 1px solid #EB5A1D;
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    border-radius: 0 !important;
    height: 60px;
}
.sectionpt130px .col-md-3 {
    width: 25%;

}
.sectionpt130px .col-md-4 {
    width: 33.33333333%;
  
}
.col-md-4 .input-group,.col-md-3 .input-group{
	width:100%;
	}
	.input-group input, .input-group textarea, .input-group select {
    margin: 0;

     border-radius: 0;
         border-color: #fff;
    /* padding: 19px 25px; */
    height: 60px;
    width: 100%;
        border-right: 1px solid #EB5A1D;

    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
}
.sectionpt130px h1, h2, h3, h4, h5, h6 {
    color: #EB5A1D;
    text-transform: none;
  }
.margin-ten-bottom
{
	    margin-bottom: 0;
}
.chosen-container-single .chosen-single div b
{
	    display: none !important;
	}
 .managejobposts span.my-earing{   font-size: 15px;
    padding: 12px;}
.perposal-img-client img
{
	    width: 16%;
	}
.perposal-img-client{
	    background: #EB5A1D;
    color: #fff;
    padding: 5px;
    width: 100%;
	
	}
	.perposal-img-client a{
		 color: #fff;
	}
.awarmeg hr {
    margin-top: 5px;
    margin-bottom: 2px;
    border: 0;
    border-top: 1px solid #eee;
}

.awarmeg a
{
	    background: #fff;
    font-size: 14px;
    padding: 5px;
}
.number-of-freelancer:hover{
	
	 cursor:pointer;
	}
.number-of-freelancer:hover .freelancer-totle-area
{
	    width: 19%;
	    display: block;
	        position: absolute;
	            z-index: 999;
	           

	}
.freelancer-totle-area div.awarmeg
{    margin: 0 !important;
	    padding: 5px;
	  background: #36454f;
	  font-size:14px;
	}
	

.freelancer-totle-area{ 
display: none;
}
.propossub
{
	    background: #ed7d312b;
	}
	.perposal-img-client span {    padding: 0 0px; font-size: 24px;}
.dashboard-list-box ul ul li {
   
    width: 100%;
}
</style>			
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
<div class="container">
   <div class="row">
      <div class="managejobposts jobposts">
         <h2 class="headh2 ">Post Jobs</h2>
         <div class="">
            <div class="col-md-12 ">
               <div id="events" class="tab-pane">
                  <h4 class="headtitbid">Active Candidacies ( <?php echo  count($get_postjobpaiduser); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
							    <?php if(count($get_postjobpaiduser) > 0)
							 { ?> 
                              <ul class="dashboard-list-box list-groupactcand list-group">
                                 <?php   foreach($get_postjobpaiduser as $get_postjoballval)
                                    { ?>         
		                        <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row">
                                       <div class="sell__section__row__list">
                                         <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>  
                                          <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget; ?><span class="sell__section__row__span">(<?php echo $get_postjoballval->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?>   
												
                                          </p>
                                           <span class="pull-right"> <?php  if($get_postjoballval->jobemergency == 1 ){  ?>
                                                    <div class="listing-date new ">
														<?php 
															$date=date_create($get_postjoballval->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span class="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                    </div>
                                                    <?php }else{ echo ''; } ?></span>
                                       </div>
                                       <div class="clear"></div>
                                       <label><?php echo$get_postjoballval->job_description; ?></label>
                                       <div class=" sell__section__row__list">
                                          <div class=" sell__section__row__list__child">
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
                                                if( !empty($get_postjoballval->posteddate))
                                                {
                                                	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
                                                	$lengths = array("60","60","24","7","4.35","12","10");
                                                
                                                	$now = time();
                                                
                                                	$difference     = $now - strtotime($get_postjoballval->posteddate);
                                                	$tense         = "ago";
                                                
                                                	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
                                                	{
                                                		$difference /= $lengths[$j];
                                                	}
                                                
                                                	$difference = round($difference);
                                                
                                                	if($difference != 1) 
                                                	{
                                                		$periods[$j].= "s";
                                                	}
                                                
                                                	echo $difference.' '.$periods[$j].' ago';
                                                }
                                                
                                                ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postjoballval->joblocation.' ,'.$get_postjoballval->city.' ,'.$get_postjoballval->state; ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php $get_postprosaldetails = $this->postjob_model->get_active_postsp($get_postjoballval->po_id);   ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Saftety Bidders  ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
                                                         <?php $c=0;  foreach($get_postprosaldetails as $get_postproposalsdata ){   if($c < 3) { ?>  
                                                         <li>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                               <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postjoballval->po_id; ?>"> <?php 
                                                         
                                                               echo $get_postproposalsdata->first_name; 
                                                               //~ $get_rating  = $this->postjob_model->get_rating($get_postproposalsdata->id_user_master);
                                                               
                                                                  $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                                                               $get_rating  = $this->postjob_model->get_rating($arrrating);
                                                               
                                                               
                                                                $get_rat =$get_rating[0];?>  </a><div class="">
									<?php 
									for($i=1;$i<=5;$i++)
									{ 
									if(!empty($get_rat->countrating)){
									$count_str = round($get_rat->countrating/$get_rat->ra_id);	
									if($count_str >= $i)
									{ ?>
									<span class="jqEmoji" data-index="<?php echo $i; ?>" style="opacity: 1;">⭐</span>
									<?php } 
									else
									{
									echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';

									}}else
									{
									echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';

									}

									} ?>
                                                            </div> </div>
                                                           
                                                           
                                                         </li>
                                                         <?php }else{ echo '<a href="'.$base_url.'job/listofSF/'.$get_postjoballval->po_id.'">See more</a>'; } $c++; } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         </div>
                                     
                                    </section>
                                 </li>
                                 <?php   } ?> 
                              </ul>
                              <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="events" class="tab-pane">
                  <h4 class="headtitbid">Submitted Proposals ( <?php echo count($get_postjoballpaidproposal); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
							      <?php if(count($get_postjoballpaidproposal) > 0)
							 { ?> 
                              <ul class="dashboard-list-box list-groupsubpro list-group">
                                 <?php foreach($get_postjoballpaidproposal as $get_postjoballpaidproposalval)
                                    {   

                                    	 $get_postjoballpaiddata = $this->postjob_model->get_postjoballpaiddata($get_postjoballpaidproposalval->proposproj_id); 
                                    	
                                    	 
                                    	 ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row">
                                       <div class="sell__section__row__list">
                                       
                                          <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballpaiddata->po_id; ?>" ><?php echo $get_postjoballpaiddata->highleveljobdesc; ?> </a></h4>
<!--
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballpaiddata->budget; ?><span class="sell__section__row__span">(<?php echo $get_postjoballpaiddata->hourorfix; ?> price)</span></p>
-->
                                          <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postjoballpaiddata->budget)){ echo '$'.$get_postjoballpaiddata->budget; ?><span class="sell__section__row__span">(<?php echo $get_postjoballpaiddata->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?></p>
                                             <span class="pull-right"> <?php  if($get_postjoballpaiddata->jobemergency == 1 ){  ?>
                                                    <div class="listing-date new ">
														<?php 
															$date=date_create($get_postjoballpaiddata->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span class="demo_<?php echo $get_postjoballpaiddata->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                    </div>
                                                    <?php }else{ echo ''; } ?></span>
                                       </div>
                                       <div class="clear"></div>
                                       <label><?php echo $get_postjoballpaiddata->job_description; ?></label>
                                       <div class=" sell__section__row__list">
                                          <div class=" sell__section__row__list__child">
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
                                                if( !empty($get_postjoballpaiddata->posteddate))
                                                {
                                                	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
                                                	$lengths = array("60","60","24","7","4.35","12","10");
                                                
                                                	$now = time();
                                                
                                                	$difference     = $now - strtotime($get_postjoballpaiddata->posteddate);
                                                	$tense         = "ago";
                                                
                                                	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
                                                	{
                                                		$difference /= $lengths[$j];
                                                	}
                                                
                                                	$difference = round($difference);
                                                
                                                	if($difference != 1) 
                                                	{
                                                		$periods[$j].= "s";
                                                	}
                                                
                                                	echo $difference.' '.$periods[$j].' ago';
                                                }
                                                
                                                ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postjoballpaiddata->joblocation.' ,'.$get_postjoballpaiddata->city.' ,'.$get_postjoballpaiddata->state; ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div>
                                             <div class="sell__section__row__list__child__note"></div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php $get_postprosaldetails = $this->postjob_model->get_post_sumbit_p($get_postjoballpaidproposalval->proposproj_id);  
                                                                                                         
                                                      ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Submitted Proposals ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
                                                         <?php  $d=0; foreach($get_postprosaldetails as $get_postproposalsdata ){   if($d < 3) {   ?>  
                                                         <li>
                                                           
                                                            <div class="perposal-img-client ii" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
<!--
                                                               <a href="<?php echo $base_url; ?>job/listofAC/<?php echo $get_postproposalsdata->proposproj_id; ?>">
-->
                      <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postproposalsdata->proposproj_id; ?>">                                                    
                                                                <?php echo  $get_postproposalsdata->first_name; 
                                                                $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                                                               $get_rating  = $this->postjob_model->get_rating($arrrating);
                                                              
                                                                $get_rat =$get_rating[0]; ?>  </a>
                                                                <div class="">
																<?php 
																for($i=1;$i<=5;$i++)
																{ 
																if(!empty($get_rat->countrating)){
																$count_str = round($get_rat->countrating/$get_rat->ra_id);	
																if($count_str >= $i)
																{?>
																<span class="jqEmoji" data-index="<?php echo $i; ?>" style="opacity: 1;">⭐</span>
																<?php } 
																else
																{
																echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';

																}}

																else
																{
																echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';

																}

																} ?> 
                                                            </div>  </div>

                                                          
														</li>
                                                         <?php }else{ echo '<a href="'.$base_url.'job/listofSF/'.$get_postproposalsdata->po_id.'">See more</a>'; } $d++; } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         
                                       </div>
                                   </section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                              <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="events" class="tab-pane">
                  <h4 class="headtitbid">Active Contracts ( <?php echo count($get_postawardedtable); ?> )  </h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
                              <?php if(count($get_postawardedtable) > 0)
							 { ?> 
                              <ul class="dashboard-list-box list-groupactcint list-group">
                                 <?php foreach($get_postawardedtable as $get_postawardedtableval)
                                    { 					
                                    
                                    		 $get_postdataaward = $this->postjob_model->get_aw($get_postawardedtableval->proposproj_id); 
                                    ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row">
                                       <div class="sell__section__row__list">
                                         <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postdataaward->po_id; ?>" ><?php echo $get_postdataaward->highleveljobdesc; ?></a></h4>	 

                                           <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postdataaward->budget)){ echo '$'.$get_postdataaward->budget; ?><span class="sell__section__row__span">(<?php echo $get_postdataaward->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?></p>
                                            <span class="pull-right">
                                                    <div class="listing-date new ">
														
                                                        <span >Awarded</span>
                                                    </div>
                                                  </span>
                                       </div>
                                       <div class="clear"></div>
                                       <label><?php echo $get_postdataaward->job_description; ?></label>
                                       <div class=" sell__section__row__list">
                                          <div class=" sell__section__row__list__child">
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php 
                                                if( !empty($get_postdataaward->posteddate))
                                                {
                                                	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
                                                	$lengths = array("60","60","24","7","4.35","12","10");
                                                
                                                	$now = time();
                                                
                                                	$difference     = $now - strtotime($get_postdataaward->posteddate);
                                                	$tense         = "ago";
                                                
                                                	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
                                                	{
                                                		$difference /= $lengths[$j];
                                                	}
                                                
                                                	$difference = round($difference);
                                                
                                                	if($difference != 1) 
                                                	{
                                                		$periods[$j].= "s";
                                                	}
                                                
                                                	echo $difference.' '.$periods[$j].' ago';
                                                }
                                                
                                                ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postdataaward->joblocation.' ,'.$get_postdataaward->city.' ,'.$get_postdataaward->state; ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div>
                                             <div class="sell__section__row__list__child__note"></div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php $get_postprosaldetails = $this->postjob_model->get_post_award_p($get_postawardedtableval->proposproj_id); ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Submitted Proposals ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
														<?php  $e=0; foreach($get_postprosaldetails as $get_postproposalsdata ){   if($e < 1) {  ?>  
                                                         <li>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                             
<!--
                                                                <a href="<?php echo $base_url; ?>job/listofACT/<?php echo $get_postdataaward->po_id; ?>">  
-->
                                                                <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postdataaward->po_id; ?>">                                                     
                                                                <?php 
                                                                echo $get_postproposalsdata->first_name; 
                                                               //~ $get_rating  = $this->postjob_model->get_rating($get_postproposalsdata->id_user_master);
                                                               
                                                                $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                                                               $get_rating  = $this->postjob_model->get_rating($arrrating);
                                                                $get_rat =$get_rating[0];?>  </a>
                                                                <div class="">
									<?php 
									for($i=1;$i<=5;$i++)
												{ 			
													
													if(!empty($get_rat->countrating)){

												$count_str = round($get_rat->countrating/$get_rat->ra_id);	
												if($count_str >= $i)
													{?>
											<span class="jqEmoji" data-index="<?php echo $i; ?>" style="opacity: 1;">⭐</span>
<?php } 
else
{
	echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';
	
}
}
else
{
		echo '<span class="jqEmoji" data-index="'.$i.'" style="opacity: 0.2;">⭐</span>';

	}
} ?>	 </div>
 </div>
                                                 
                                                         </li>
                                                         <?php } $e++; } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       
                                       </div>
                                      
                                    </section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                              <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="events" class="tab-pane">
                  <h4 class="headtitbid">Completed Contracts ( <?php echo count($get_postjobcompletedtable); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
							    <?php    if(count($get_postjobcompletedtable) > 0)
							 { ?> 
                              <ul class="dashboard-list-box list-groupcompl list-group">
                                 <?php foreach($get_postjobcompletedtable as $get_postjobcompletedtableval)
                                    { 						
                                  
                                    		 $get_postdatacomplets = $this->postjob_model->get_postjoballcomdata($get_postjobcompletedtableval->proposproj_id); 
                                    	
                                    ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row">
										
                                       <div class="sell__section__row__list">
                                        <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>job/complete_job/<?php echo $get_postdatacomplets->po_id; ?>" > <?php echo $get_postdatacomplets->highleveljobdesc; ?></a> </h4>  
<!--
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postdatacomplets->budget; ?><span class="sell__section__row__span">(<?php echo $get_postdatacomplets->hourorfix; ?> price)</span></p>
-->
                                           <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postdatacomplets->budget)){ echo '$'.$get_postdatacomplets->budget; ?><span class="sell__section__row__span">(<?php echo $get_postdatacomplets->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?></p>
                                           
                                              <span class="pull-right"> 
                                                    <div class="listing-date new ">
														
                                                        <span >Completed</span>
                                                    </div>
                                                    </span>
                                       </div>
                                       <div class="clear"></div>
                                       <label><?php echo $get_postdatacomplets->job_description; ?></label>
                                       <div class=" sell__section__row__list">
                                          
                                             <div class="sell__section__row__list__child__note">
												 <i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
                                                if( !empty($get_postdatacomplets->posteddate))
                                                {
                                                	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
                                                	$lengths = array("60","60","24","7","4.35","12","10");
                                                
                                                	$now = time();
                                                
                                                	$difference     = $now - strtotime($get_postdatacomplets->posteddate);
                                                	$tense         = "ago";
                                                
                                                	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
                                                	{
                                                		$difference /= $lengths[$j];
                                                	}
                                                
                                                	$difference = round($difference);
                                                
                                                	if($difference != 1) 
                                                	{
                                                		$periods[$j].= "s";
                                                	}
                                                
                                                	echo $difference.' '.$periods[$j].' ago';
                                                }
                                                
                                                ?></span>
                                                </div>
                                             <div class="sell__section__row__list__child__note">
												 <i class="fa fa-map-marker"></i><span><?php echo $get_postdatacomplets->joblocation.' ,'.$get_postdatacomplets->city.' ,'.$get_postdatacomplets->state; ?></span></div>
                                           
                                           
                                           
                                         
                                        
                                       </div>
                                 </section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                               <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Widgets -->
            <div class="col-md-4 five columns">
            </div>
            <!-- Widgets / End --> 
         </div>
      </div>
   </div>
</div>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	
 $('[data-demopoid]').each(function () { 
		var proid = $(this).attr('class');
		
		var demopoid = $(this).data('demopoid');
		
var countDownDatep =  new Date(demopoid);


// Update the count down every 1 second
var x = setInterval(function() {
  // Get todays date and time
  var d = new Date();
  var n = d.getTimezoneOffset();
	var ans = new Date(d.getTime() + n * 60 * 1000);
//console.log(ans.getHours()+':'+ans.getMinutes()+':'+ans.getSeconds());
var s_now = ans;
  // Find the distance between now and the count down date
  var distance = countDownDatep - s_now;
//alert(new Date());

 // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
if (distance > 0) {
  // Display the result in the element with id="demo"
  $('.'+proid).empty();
  $('.'+proid).append(days + "d " + hours + "h "  + minutes + "m " + seconds + "s ");
}
 else
  {
      //~ clearInterval(x);
        $('.'+proid).empty();
       $('.'+proid).append("EXPIRED");
      jQuery.ajax({
		url : '<?php echo $base_url?>bids/expired',
		type: 'POST',
		data:{ proid : proid },
		success:function(data){
			//window.location.href = "<?php echo $base_url?>bids/find_job";
			if(data == 'false')
			{
			
			}
			else
			{
					
			location.reload();
			}
		}
	});
   
  
  }
 
 
}, 1000);
 
 }); 

 
 });

  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupsubpro').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupactcand').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupactcint').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupcompl').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
 
</script>


<script src="<?php echo $base_url; ?>assets/js/jquery.emojiRatings.min.js"></script>
		<script>
			$("#rating").emojiRating({
				fontSize: 32,
							});
			
		</script>
