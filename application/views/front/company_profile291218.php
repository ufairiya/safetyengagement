<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
<div class="container">
<?php if($this->session->userdata('id_user_master')) { ?>
<div class="row">
   <div class="">
      <!-- Titlebar -->
      <div >
         <?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
         <?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
         <?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
         <div class="listing-titlebar-title">
            <h2 class="headh2">Company Profile</h2>
         </div>
      </div>
   </div>
   <form id="profile_update" method="post" class="ptpb-30">
      <div class="row">
         <!-- Profile -->
         <div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
            <div class="dashboard-list-box margin-top-0">
               <div class="dashboard-list-box-static" style="width: 100%;">
                  <div class="safeprof col-lg-12 col-md-12" >
                     <div class="col-lg-4 col-md-4" >
                        <div class="edit-profile-photo" >
                           <div class="emty_cls" id="uploaded_images" >
                              <?php if($user_information->profile_image != ""){ ?>
                              <img src="<?php echo $base_url.'uploads/'.$user_information->profile_image; ?>">
                              <?php } else { ?>
                              <img src="<?php echo $base_url?>uploads/default17.jpg">
                              <?php } ?>
                           </div>
                           <div class="change-photo-btn">
                              <div class="photoUpload">
                                 <span><i class="fa fa-upload"></i> Upload Photo</span>
                                 <input type="file" name="img_upload"  class="upload" id="imageUploadForm" />
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-8 spacetopbottom" >
                        <div class="control-label ">
                           <div class="col-40"><label class="titlelabel" for="fname" >Name:</label> </div>
                           <div class="col-50"><label for="fname" ><?php echo $user_information->first_name?></label></div>
                        </div>
                        <div class="control-label ">
                           <div class="col-40"><label class="titlelabel" for="fname" >Company:</label></div>
                           <div class="col-50"><label for="fname" ><?php echo $user_information->companyname; ?></label></div>
                        </div>
                        <div class="control-label ">
                           <div class="col-40"><label class="titlelabel" for="fname" >Email:</label></div>
                           <div class="col-50"><label for="fname" ><?php echo trim($user_information->email); ?></label></div>
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-8 spacetopbottom" >
                        <div class="control-label ">
                           <div class="col-40"><label class="titlelabel" for="fname" >Number of Posts:</label> </div>
                           <div class="col-50"><label for="fname" ><?php  $get_allpostuser = $this->postjob_model->get_allpostuser($this->session->userdata('id_user_master'));
                              print_r(count($get_allpostuser));
                              ?></label></div>
                        </div>
                        <div class="control-label ">
                           <div class="col-40"><label class="titlelabel" for="fname" >Number of awarded jobs:</label></div>
                           <div class="col-50"><label for="fname" ><?php  $get_allawuser = $this->postjob_model->get_allawuser($this->session->userdata('id_user_master'));
                              print_r(count($get_allawuser));
                              ?></label></div>
                        </div>
                     </div>
                  </div>
                  <div class="user-details">
                     <ul class="navigation">
                        <li class="active tabwidth">
                           <a class="atagcompany" data-toggle="tab" href="#information">
                              <span class="iconfldes glyphicon glyphicon-user"></span>
                              <p class="tabname">Account Details</p>
                           </a>
                        </li>
                        <li class="tabwidth">
                           <a class="atagcompany" data-toggle="tab" href="#settings">
                              <span class="iconfldes glyphicon glyphicon-th-list"></span>
                              <p class="tabname">Job Posts</p>
                           </a>
                        </li>
                        <li class="tabwidth">
                           <a class="atagcompany" data-toggle="tab" href="#events">
                              <span class="iconfldes glyphicon glyphicon-th-list"></span>
                              <p class="tabname">Manage Jobs</p>
                           </a>
                        </li>
                        <!--
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#events">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Expired Jobs</p>
                              </a>
                           </li>
                           -->
                     </ul>
                     <div class="user-body">
                        <div class="tab-content">
                           <div id="information" class="tab-pane active">
                              <h4>Account Information</h4>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Your Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
                                    <input type="hidden" class="form-control" name="img_link" id="img_link" value="<?php echo $user_information->profile_image; ?>" /> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Position with your company</label>
                                    <input type="text"  class="form-control" name="positioncompany" id="positioncompany" value="<?php echo $user_information->positioncompany; ?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Safety professional (optional) or company Person  </label>
                                    <div class="form-group">
                                       <label class="control-label">Name</label>
                                       <input type="text"  class="form-control" name="companyperion" id="companyperion" value="<?php echo $user_information->companyperion; ?>"/> 
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label">Email</label>
                                       <input type="text"  class="form-control" name="companyperemail" id="companyperemail" value="<?php echo $user_information->companyperemail; ?>"/> 
                                    </div>
                                    <div class="form-group">     
                                       <label class="control-label">Cell</label>
                                       <input type="text"  class="form-control" name="companypercellphone" id="companypercellphone" value="<?php echo $user_information->companypercellphone?>"/> 
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Your Company (if from the same company they are connected some how)</label>
                                    <input type="text"  class="form-control" name="companyname" id="companyname" value="<?php echo $user_information->companyname; ?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <input type="text"  class="form-control" name="address" id="address" value="<?php echo $user_information->address?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Website </label>
                                    <input type="text"  class="form-control" name="weblink" id="weblink" value="<?php echo $user_information->weblink?>"/> 
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">City</label>
                                    <input type="text"  class="form-control" name="city" id="city" value="<?php echo $user_information->city?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">State</label>
                                    <input type="text"  class="form-control" name="state" id="state" value="<?php echo $user_information->state?>"/> 
                                 </div>
                                 <div class="form-group zip-code" >
                                    <label class="control-label">Zip code</label>    
                                    <input type="text"  class="form-control" name="zipcode" id="zipcode" value="<?php echo $user_information->zip_code?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Office Phone</label>
                                    <input type="text"  class="form-control" name="officenumber" id="officenumber" value="<?php echo $user_information->officephone?>"/> 
                                 </div>
                                 <div class="form-group">
                                    <div class="col-md-12" style="padding:0;">
                                       <label class="control-label">Cell phone</label>
                                    </div>
                                    <div class="col-md-12" style="padding:0;">
                                       <input type="tel" class="form-control" name="celphone" id="celphone" value="<?php echo $user_information->phone?>"/> 
                                    </div>
                                 </div>
                                 <div style="clear:both"></div>
                                 <div class="form-group email-address" >
                                    <label class="control-label"><?php echo $this->lang->line('email'); ?> address</label>
                                    <input type="text" class="form-control" name="user_email" id="user_email" readonly value="<?php echo trim($user_information->email); ?>">
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">Industry</label>
                                    <input type="text"  class="form-control" name="industry" id="industry" value="<?php echo $user_information->industry?>"/> 
                                 </div>
                              </div>
                              <input type="submit" class="btndesign button margin-top-15" value="Save Changes" style="margin-left:44%;">
                           </div>
                           <div id="settings" class="tab-pane">
                              <h4>Job Posts</h4>
                              <h4 class="headtitbid">Active Candidacies ( <?php echo  count($get_postjobpaiduser); ?> )</h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postjobpaiduser) > 0){ ?> 
                                          <ul class="dashboard-list-box list-groupactcand ">
                                             <?php foreach($get_postjobpaiduser as $get_postjoballval)
                                                {  ?>
                                             <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                                <section class="sell__section__row">
                                                   <div class="sell__section__row__list">
                                                      <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>
                                                      <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget; ?><span class="sell__section__row__span">(<?php echo $get_postjoballval->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?>   
                                                      </p>
                                                      <span class="pull-right">
                                                         <?php  if($get_postjoballval->jobemergency == 1 ){  ?>
                                                         <div class="listing-date new ">
                                                            <?php 
                                                               $date=date_create($get_postjoballval->posteddate);
                                                               date_add($date,date_interval_create_from_date_string("2 days"));
                                                               $c_dat = date_format($date,"M d, Y H:i:s A");
                                                               ?>
                                                            <span class="fa fa-clock-o"></span>
                                                            <span class="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                         </div>
                                                         <?php }else{ echo ''; } ?>
                                                      </span>
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
                                                                           <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postjoballval->po_id.'/1'; ?>"> <?php 
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
                                                                           </div>
                                                                        </div>
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
                                             <?php }  ?> 
                                          </ul>
                                          <?php  } 
                                             else
                                             {
                                             
                                             echo '<h4><label class="no_data">no data found</label></h4>'; 
                                             } ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <h4 class="headtitbid">Submitted Proposals ( <?php echo count($get_postjoballpaidproposal); ?> )</h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postjoballpaidproposal) > 0)
                                             { ?> 
                                          <ul class="dashboard-list-box list-groupsubpro">
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
                                                      <span class="pull-right">
                                                         <?php  if($get_postjoballpaiddata->jobemergency == 1 ){  ?>
                                                         <div class="listing-date new ">
                                                            <?php 
                                                               $date=date_create($get_postjoballpaiddata->posteddate);
                                                               date_add($date,date_interval_create_from_date_string("2 days"));
                                                               $c_dat = date_format($date,"M d, Y H:i:s A");
                                                               ?>
                                                            <span class="fa fa-clock-o"></span>
                                                            <span class="demo_<?php echo $get_postjoballpaiddata->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                         </div>
                                                         <?php }else{ echo ''; } ?>
                                                      </span>
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
                                                                           <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postproposalsdata->proposproj_id.'/2'; ?>">                                                    
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
                                                                           </div>
                                                                        </div>
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
                              <h4 class="headtitbid">Active Contracts ( <?php echo count($get_postawardedtable); ?> )  </h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postawardedtable) > 0)
                                             { ?> 
                                          <ul class="dashboard-list-box list-groupactcint ">
                                             <?php 
                                                foreach($get_postawardedtable as $get_postawardedtableval)
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
                                                            <span >Awared</span>
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
                                                                           <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postdataaward->po_id.'/3'; ?>">                                                     
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
                                                                                 } ?>	 
                                                                           </div>
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
                              <h4 class="headtitbid">Completed Contracts ( <?php echo count($get_postjobcompletedtable); ?> )</h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postjobcompletedtable) > 0)
                                             { ?> 
                                          <ul class="dashboard-list-box list-groupcompl">
                                             <?php foreach($get_postjobcompletedtable as $get_postjobcompletedtableval)
                                                { 						
                                                
                                                		 $get_postdataaward = $this->postjob_model->get_postjoballcomdata($get_postjobcompletedtableval->proposproj_id); 
                                                	
                                                ?>
                                             <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                                <section class="sell__section__row">
                                                   <div class="sell__section__row__list">
                                                      <h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postdataaward->po_id; ?>" ><?php echo $get_postdataaward->highleveljobdesc; ?></a></h4>
                                                      <!--
                                                         <p class=" pull-right sell__section__row__text"><?php echo $get_postdataaward->budget; ?><span class="sell__section__row__span"> ( <?php echo $get_postdataaward->hourorfix; ?> price)</span></p>
                                                         -->
                                                      <p class=" pull-right sell__section__row__text"><?php if(!empty( $get_postdataaward->budget)){ echo '$'.$get_postdataaward->budget; ?><span class="sell__section__row__span">(<?php echo $get_postdataaward->hourorfix.'price';  ?> )</span> <?php } else{ echo "To be negotiated"; } ?></p>
                                                      <span class="pull-right">
                                                         <div class="listing-date new ">
                                                            <span >Completed</span>
                                                         </div>
                                                      </span>
                                                   </div>
                                                   <div class="clear"></div>
                                                   <label><?php echo $get_postdataaward->job_description; ?></label>
                                                   <div class=" sell__section__row__list">
                                                      <div class=" sell__section__row__list__child">
                                                         <div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
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
                              <h4>Manage</h4>
                              <h4 class="headtitbid">Manage Jobs( <?php echo count($get_postjoball); ?> )</h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postjoball) > 0)
                                             { ?> 
                                          <ul class="list-groupmanage">
                                             <?php foreach($get_postjoball as $get_postjoballval)
                                                { ?>
                                             <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                                <section class="sell__section__row">
                                                   <div class="sell__section__row__list">
                                                      <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" > <?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>
                                                      <p class=" pull-right sell__section__row__text"><?php if(!empty($get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget.'<span class="sell__section__row__span">(Fixed price)</span>';}else { echo "To be negotiated"; } ?></p>
                                                      <span class="pull-right">
                                                         <?php if($get_postjoballval->jobemergency == 1 ){  ?>
                                                         <div class="listing-date new ">
                                                            <?php 
                                                               $date=date_create($get_postjoballval->posteddate);
                                                               date_add($date,date_interval_create_from_date_string("2 days"));
                                                               $c_dat = date_format($date,"M d, Y H:i:s A");
                                                               ?>
                                                            <span class="fa fa-clock-o"></span>
                                                            <span class="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                         </div>
                                                         <?php }else{ echo ''; } ?>
                                                      </span>
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
                                                         <div class="sell__section__row__list__child__note"></div>
                                                         <div class="sell__section__row__list__child__note rulehover">
                                                            <div class="number-of-freelancer">
                                                               <?php $get_postprosaldetails = $this->postjob_model->get_active_post($get_postjoballval->po_id);   ?>
                                                               <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Saftety Bidders  ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                               <p class="headtitbid fa fa-chevron-down"></p>
                                                               <div class="freelancer-totle-area" >
                                                                  <ul>
                                                                     <?php $c=0;  foreach($get_postprosaldetails as $get_postproposalsdata ){   if($c < 3) { ?>  
                                                                     <li>
                                                                        <div class="perposal-img-client" >
                                                                           <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                                           <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postjoballval->po_id; ?>"> <?php echo $get_postproposalsdata->first_name; 
                                                                              $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                                                                              
                                                                              	   $get_rating  = $this->postjob_model->get_rating($arrrating );
                                                                              		$get_rat =$get_rating[0];?>  </a>
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
                                                                              } ?>
                                                                        </div>
                                                                     </li>
                                                                     <?php }
                                                                        else
                                                                        { 
                                                                        echo '<a href="'.$base_url.'job/listofSF/'.$get_postjoballval->po_id.'">See more</a>'; 
                                                                        } $c++;
                                                                        } ?>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="sell__section__row__list__child"> <a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Edit Job</a> </div>
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
                              <h4 class="headtitbid">Expirted Jobs ( <?php echo count($get_postjobexpired); ?> )</h4>
                              <div id="subpro" class="active" style="display: block;">
                                 <div class="eleven columns">
                                    <div class="">
                                       <div class="listings-container">
                                          <?php if(count($get_postjobexpired) > 0)
                                             { ?>
                                          <ul class="list-groupexpired">
                                             <?php foreach($get_postjobexpired as $get_postdatacomplets)
                                                { ?>
                                             <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                                <section class="sell__section__row">
                                                   <div class="sell__section__row__list">
                                                      <h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>
                                                      <!--
                                                         <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
                                                         -->
                                                      <p class=" pull-right sell__section__row__text"><?php if(!empty($get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget.'<span class="sell__section__row__span">(Fixed price)</span>';}else { echo "To be negotiated"; } ?></p>
                                                      <span class="pull-right">
                                                         <?php  if($get_postjoballval->jobemergency == 1 ){  ?>
                                                         <div class="listing-date new ">
                                                            <?php 
                                                               $date=date_create($get_postjoballval->posteddate);
                                                               date_add($date,date_interval_create_from_date_string("2 days"));
                                                               $c_dat = date_format($date,"M d, Y H:i:s A");
                                                               ?>
                                                            <span class="fa fa-clock-o"></span>
                                                            <span class="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                         </div>
                                                         <?php }else{ echo ''; } ?>
                                                      </span>
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
                                                      </div>
                                                      <div class="sell__section__row__list__child">
   <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form>
   <a href="<?php echo $base_url; ?>job/re_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Re-post Job</a>
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
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </form>
   </div>
   <?php } ?>
</div>
<style>
   .listing-icons li {
   display: inline-block;
   margin-right: 13px;
   color: gray;
   line-height: 29px;
   }
   @media (min-width: 768px) and (max-width: 1024px) {
   .input-group {
   width: 100% !important;  
   }
   }
   @media (min-width: 328px) and (max-width: 650px) {
   .input-group {
   width: 100%;
   }
   .listing-type {
   left: 10px !imporant;
   }
   }
   #usa-map
   {
   color:#000;	
   }
   .sectionpt130px .form-wrap{  background: rgba(255, 255, 255, 0.14);
   padding: 20px;
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
   width: 200px;
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
   .input-group .plsholdcol::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
   color: #ffffff;
   opacity: 1; /* Firefox */
   }
   .input-group .plsholdcol:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: #ffffff;
   }
   .input-group .plsholdcol::-ms-input-placeholder { /* Microsoft Edge */
   color: #ffffff;
   }
   .input-group input.plsholdcol:hover {
   background-color: #f56733;
   color: #fff;
   }
   .input-group input.plsholdcol:active {
   color: #000;
   background-color: #f7f7f7;
   }
   .eleven .listing li {
   width: 100%;
   border: unset;
   }
   .listings-container .listing:last-child {
   border-radius: 0 0 4px 4px;
   }
   .listings-container .listing:first-child {
   border-radius: 4px 4px 0 0;
   }
   .listing.full-time {
   border-left: 4px solid #ED7D31;
   }
   .listing.full-time {
   width: 100%;
   }
   .listing.full-time {
   width: 100%;
   }
   .listing.full-time {
   width: 100%;
   }
   .listing {
   border-radius: 0;
   display: flex;
   padding: 5px 22px;
   border-left: 4px solid #eee;
   transition: .3s;
   position: relative;
   border: 1px solid #e0e0e0;
   margin-top: -1px;
   }
   .tabs-left {
   border-bottom: none;
   border-right: 1px solid #ddd;
   }
   .tabs-left>li {
   float: none;
   margin:0px;
   }
   .tabs-left>li.active>a,
   .tabs-left>li.active>a:hover,
   .tabs-left>li.active>a:focus {
   border-bottom-color: #ddd;
   border-right-color: transparent;
   background:#ED7D31;
   border:none;
   border-radius:0px;
   margin:0px;
   }
   .nav-tabs>li>a:hover {
   /* margin-right: 2px; */
   line-height: 1.42857143;
   border: 1px solid transparent;
   /* border-radius: 4px 4px 0 0; */
   }
   .tabs-left>li.active>a::after{content: "";
   position: absolute;
   top: 10px;
   right: -10px;
   border-top: 10px solid transparent;
   border-bottom: 10px solid transparent;
   border-left: 10px solid #ED7D31;
   display: block;
   width: 0;}
   .tab-content {
   padding: 0 33px !impotant;
   position: relative;
   z-index: 10;
   display: inline-block;
   width: 100%;
   }
   .composebtn{
   padding: 12px;
   }
   .composebtn button{
   background-color: #ED7D31;
   padding: 2px 3px;
   border-color: #ED7D31;
   }
   .composebtn button:hover,.composebtn button:focus{
   background-color: #ED7D31;
   padding: 2px 3px;
   border-color: #ED7D31;
   }
   .messagesys li.active a {
   border-left: 4px solid #ED7D31;
   background: #ED7D318c;
   color: #fff;
   border-bottom: unset;
   }
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
   .tag-ctn{
   position: relative;
   height: 28px;
   padding: 0;
   margin-bottom: 0px;
   font-size: 14px;
   line-height: 20px;
   color: #555555;
   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
   background-color: #ffffff;
   border: 1px solid #cccccc;
   -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
   -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
   -o-transition: border linear 0.2s, box-shadow linear 0.2s;
   transition: border linear 0.2s, box-shadow linear 0.2s;
   cursor: default;
   display: block;
   }
   .tag-ctn-invalid{
   border: 1px solid #CC0000;
   }
   .tag-ctn-readonly{
   cursor: pointer;
   }
   .tag-ctn-disabled{
   cursor: not-allowed;
   background-color: #eeeeee;
   }
   .tag-ctn-bootstrap-focus,
   .tag-ctn-bootstrap-focus .tag-res-ctn{
   border-color: rgba(82, 168, 236, 0.8) !important;
   /* IE6-9 */
   -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
   -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
   border-bottom-left-radius: 0;
   border-bottom-right-radius: 0;
   }
   .tag-ctn input{
   border: 0;
   box-shadow: none;
   -webkit-transition: none;
   outline: none;
   display: block;
   padding: 4px 6px;
   line-height: normal;
   overflow: hidden;
   height: auto;
   border-radius: 0;
   float: left;
   margin: 2px 0 2px 2px;
   }
   .tag-ctn-disabled input{
   cursor: not-allowed;
   background-color: #eeeeee;
   }
   .tag-ctn .tag-input-readonly{
   cursor: pointer;
   }
   .tag-ctn .tag-empty-text{
   color: #DDD;
   }
   .tag-ctn input:focus{
   border: 0;
   box-shadow: none;
   -webkit-transition: none;
   background: #FFF;
   }
   .tag-ctn .tag-trigger{
   float: right;
   width: 27px;
   height:100%;
   position:absolute;
   right:0;
   border-left: 1px solid #CCC;
   background: #EEE;
   cursor: pointer;
   }
   .tag-ctn .tag-trigger .tag-trigger-ico {
   display: inline-block;
   width: 0;
   height: 0;
   vertical-align: top;
   border-top: 4px solid gray;
   border-right: 4px solid transparent;
   border-left: 4px solid transparent;
   content: "";
   margin-left: 9px;
   margin-top: 13px;
   }
   .tag-ctn .tag-trigger:hover{
   background: -moz-linear-gradient(100% 100% 90deg, #e3e3e3, #f1f1f1);
   background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f1f1f1), to(#e3e3e3));
   }
   .tag-ctn .tag-trigger:hover .tag-trigger-ico{
   background-position: 0 -4px;
   }
   .tag-ctn-disabled .tag-trigger{
   cursor: not-allowed;
   background-color: #eeeeee;
   }
   .tag-ctn-bootstrap-focus{
   border-bottom: 1px solid #CCC;
   }
   .tag-res-ctn{
   position: relative;
   background: #FFF;
   overflow-y: auto;
   z-index: 9999;
   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
   border: 1px solid #CCC;
   left: -1px;
   -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
   -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
   -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
   -o-transition: border linear 0.2s, box-shadow linear 0.2s;
   transition: border linear 0.2s, box-shadow linear 0.2s;
   border-top: 0;
   border-top-left-radius: 0;
   border-top-right-radius: 0;
   }
   .tag-res-ctn .tag-res-group{
   line-height: 23px;
   text-align: left;
   padding: 2px 5px;
   font-weight: bold;
   border-bottom: 1px dotted #CCC;
   border-top: 1px solid #CCC;
   background: #f3edff;
   color: #333;
   }
   .tag-res-ctn .tag-res-item{
   line-height: 25px;
   text-align: left;
   padding: 2px 5px;
   color: #666;
   cursor: pointer;
   }
   .tag-res-ctn .tag-res-item-grouped{
   padding-left: 15px;
   }
   .tag-res-ctn .tag-res-odd{
   background: #F3F3F3;
   }
   .tag-res-ctn .tag-res-item-active{
   background-color: #3875D7;
   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3875D7', endColorstr='#2A62BC', GradientType=0 );
   background-image: -webkit-gradient(linear, 0 0, 0 100%, color-stop(20%, #3875D7), color-stop(90%, #2A62BC));
   background-image: -webkit-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
   background-image: -moz-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
   background-image: -o-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
   background-image: linear-gradient(#3875D7 20%, #2A62BC 90%);
   color: #fff;
   }
   .tag-sel-ctn{
   overflow: auto;
   line-height: 22px;
   padding-right:27px;
   }
   .tag-sel-ctn .tag-sel-item{
   background: #555;
   color: #EEE;
   float: left;
   font-size: 12px;
   padding: 0 5px;
   border-radius: 3px;
   margin-left: 5px;
   margin-top: 4px;
   }
   .tag-sel-ctn .tag-sel-text{
   background: #FFF;
   color: #666;
   padding-right: 0;
   margin-left: 0;
   font-size: 14px;
   font-weight: normal;
   }
   .tag-res-ctn .tag-res-item em{
   font-style: normal;
   background: #565656;
   color: #FFF;
   }
   .tag-sel-ctn .tag-sel-item:hover{
   background: #565656;
   }
   .tag-sel-ctn .tag-sel-text:hover{
   background: #FFF;
   }
   .tag-sel-ctn .tag-sel-item-active{
   border: 1px solid red;
   background: #757575;
   }
   .tag-ctn .tag-sel-ctn .tag-sel-item{
   margin-top: 3px;
   }
   .tag-stacked .tag-sel-item{
   float: inherit;
   }
   .tag-sel-ctn .tag-sel-item .tag-close-btn{
   width: 7px;
   cursor: pointer;
   height: 7px;
   float: right;
   margin: 8px 2px 0 10px;
   background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAOCAYAAADjXQYbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAKT2lDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVNnVFPpFj333vRCS4iAlEtvUhUIIFJCi4AUkSYqIQkQSoghodkVUcERRUUEG8igiAOOjoCMFVEsDIoK2AfkIaKOg6OIisr74Xuja9a89+bN/rXXPues852zzwfACAyWSDNRNYAMqUIeEeCDx8TG4eQuQIEKJHAAEAizZCFz/SMBAPh+PDwrIsAHvgABeNMLCADATZvAMByH/w/qQplcAYCEAcB0kThLCIAUAEB6jkKmAEBGAYCdmCZTAKAEAGDLY2LjAFAtAGAnf+bTAICd+Jl7AQBblCEVAaCRACATZYhEAGg7AKzPVopFAFgwABRmS8Q5ANgtADBJV2ZIALC3AMDOEAuyAAgMADBRiIUpAAR7AGDIIyN4AISZABRG8lc88SuuEOcqAAB4mbI8uSQ5RYFbCC1xB1dXLh4ozkkXKxQ2YQJhmkAuwnmZGTKBNA/g88wAAKCRFRHgg/P9eM4Ors7ONo62Dl8t6r8G/yJiYuP+5c+rcEAAAOF0ftH+LC+zGoA7BoBt/qIl7gRoXgugdfeLZrIPQLUAoOnaV/Nw+H48PEWhkLnZ2eXk5NhKxEJbYcpXff5nwl/AV/1s+X48/Pf14L7iJIEyXYFHBPjgwsz0TKUcz5IJhGLc5o9H/LcL//wd0yLESWK5WCoU41EScY5EmozzMqUiiUKSKcUl0v9k4t8s+wM+3zUAsGo+AXuRLahdYwP2SycQWHTA4vcAAPK7b8HUKAgDgGiD4c93/+8//UegJQCAZkmScQAAXkQkLlTKsz/HCAAARKCBKrBBG/TBGCzABhzBBdzBC/xgNoRCJMTCQhBCCmSAHHJgKayCQiiGzbAdKmAv1EAdNMBRaIaTcA4uwlW4Dj1wD/phCJ7BKLyBCQRByAgTYSHaiAFiilgjjggXmYX4IcFIBBKLJCDJiBRRIkuRNUgxUopUIFVIHfI9cgI5h1xGupE7yAAygvyGvEcxlIGyUT3UDLVDuag3GoRGogvQZHQxmo8WoJvQcrQaPYw2oefQq2gP2o8+Q8cwwOgYBzPEbDAuxsNCsTgsCZNjy7EirAyrxhqwVqwDu4n1Y8+xdwQSgUXACTYEd0IgYR5BSFhMWE7YSKggHCQ0EdoJNwkDhFHCJyKTqEu0JroR+cQYYjIxh1hILCPWEo8TLxB7iEPENyQSiUMyJ7mQAkmxpFTSEtJG0m5SI+ksqZs0SBojk8naZGuyBzmULCAryIXkneTD5DPkG+Qh8lsKnWJAcaT4U+IoUspqShnlEOU05QZlmDJBVaOaUt2ooVQRNY9aQq2htlKvUYeoEzR1mjnNgxZJS6WtopXTGmgXaPdpr+h0uhHdlR5Ol9BX0svpR+iX6AP0dwwNhhWDx4hnKBmbGAcYZxl3GK+YTKYZ04sZx1QwNzHrmOeZD5lvVVgqtip8FZHKCpVKlSaVGyovVKmqpqreqgtV81XLVI+pXlN9rkZVM1PjqQnUlqtVqp1Q61MbU2epO6iHqmeob1Q/pH5Z/YkGWcNMw09DpFGgsV/jvMYgC2MZs3gsIWsNq4Z1gTXEJrHN2Xx2KruY/R27iz2qqaE5QzNKM1ezUvOUZj8H45hx+Jx0TgnnKKeX836K3hTvKeIpG6Y0TLkxZVxrqpaXllirSKtRq0frvTau7aedpr1Fu1n7gQ5Bx0onXCdHZ4/OBZ3nU9lT3acKpxZNPTr1ri6qa6UbobtEd79up+6Ynr5egJ5Mb6feeb3n+hx9L/1U/W36p/VHDFgGswwkBtsMzhg8xTVxbzwdL8fb8VFDXcNAQ6VhlWGX4YSRudE8o9VGjUYPjGnGXOMk423GbcajJgYmISZLTepN7ppSTbmmKaY7TDtMx83MzaLN1pk1mz0x1zLnm+eb15vft2BaeFostqi2uGVJsuRaplnutrxuhVo5WaVYVVpds0atna0l1rutu6cRp7lOk06rntZnw7Dxtsm2qbcZsOXYBtuutm22fWFnYhdnt8Wuw+6TvZN9un2N/T0HDYfZDqsdWh1+c7RyFDpWOt6azpzuP33F9JbpL2dYzxDP2DPjthPLKcRpnVOb00dnF2e5c4PziIuJS4LLLpc+Lpsbxt3IveRKdPVxXeF60vWdm7Obwu2o26/uNu5p7ofcn8w0nymeWTNz0MPIQ+BR5dE/C5+VMGvfrH5PQ0+BZ7XnIy9jL5FXrdewt6V3qvdh7xc+9j5yn+M+4zw33jLeWV/MN8C3yLfLT8Nvnl+F30N/I/9k/3r/0QCngCUBZwOJgUGBWwL7+Hp8Ib+OPzrbZfay2e1BjKC5QRVBj4KtguXBrSFoyOyQrSH355jOkc5pDoVQfujW0Adh5mGLw34MJ4WHhVeGP45wiFga0TGXNXfR3ENz30T6RJZE3ptnMU85ry1KNSo+qi5qPNo3ujS6P8YuZlnM1VidWElsSxw5LiquNm5svt/87fOH4p3iC+N7F5gvyF1weaHOwvSFpxapLhIsOpZATIhOOJTwQRAqqBaMJfITdyWOCnnCHcJnIi/RNtGI2ENcKh5O8kgqTXqS7JG8NXkkxTOlLOW5hCepkLxMDUzdmzqeFpp2IG0yPTq9MYOSkZBxQqohTZO2Z+pn5mZ2y6xlhbL+xW6Lty8elQfJa7OQrAVZLQq2QqboVFoo1yoHsmdlV2a/zYnKOZarnivN7cyzytuQN5zvn//tEsIS4ZK2pYZLVy0dWOa9rGo5sjxxedsK4xUFK4ZWBqw8uIq2Km3VT6vtV5eufr0mek1rgV7ByoLBtQFr6wtVCuWFfevc1+1dT1gvWd+1YfqGnRs+FYmKrhTbF5cVf9go3HjlG4dvyr+Z3JS0qavEuWTPZtJm6ebeLZ5bDpaql+aXDm4N2dq0Dd9WtO319kXbL5fNKNu7g7ZDuaO/PLi8ZafJzs07P1SkVPRU+lQ27tLdtWHX+G7R7ht7vPY07NXbW7z3/T7JvttVAVVN1WbVZftJ+7P3P66Jqun4lvttXa1ObXHtxwPSA/0HIw6217nU1R3SPVRSj9Yr60cOxx++/p3vdy0NNg1VjZzG4iNwRHnk6fcJ3/ceDTradox7rOEH0x92HWcdL2pCmvKaRptTmvtbYlu6T8w+0dbq3nr8R9sfD5w0PFl5SvNUyWna6YLTk2fyz4ydlZ19fi753GDborZ752PO32oPb++6EHTh0kX/i+c7vDvOXPK4dPKy2+UTV7hXmq86X23qdOo8/pPTT8e7nLuarrlca7nuer21e2b36RueN87d9L158Rb/1tWeOT3dvfN6b/fF9/XfFt1+cif9zsu72Xcn7q28T7xf9EDtQdlD3YfVP1v+3Njv3H9qwHeg89HcR/cGhYPP/pH1jw9DBY+Zj8uGDYbrnjg+OTniP3L96fynQ89kzyaeF/6i/suuFxYvfvjV69fO0ZjRoZfyl5O/bXyl/erA6xmv28bCxh6+yXgzMV70VvvtwXfcdx3vo98PT+R8IH8o/2j5sfVT0Kf7kxmTk/8EA5jz/GMzLdsAAAAEZ0FNQQAAsY58+1GTAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABSSURBVHjahI7BCQAwCAOTzpThHMHh3Kl9CVos9XckFwQAuPtGuWTWwMwaczKzyHsqg6+5JqMJr28BABHRwmTWQFJjTmYWOU1L4tdck9GE17dnALGAS+kAR/u2AAAAAElFTkSuQmCC);
   }
   .tag-sel-ctn .tag-sel-item .tag-close-btn:hover{
   background-position: 0 -7px;
   }
   .tag-helper{
   color: #AAA;
   font-size: 10px;
   position: absolute;
   top: -17px;
   right: 0;
   }
   .no_data { padding: 15px; }
   .perposal-img-client span {    padding: 0 0px; font-size: 24px;}
   .listing-date.new {
   border-color: #26ae62;
   background-color: #e9fff3;
   color: #26ae62;
   }
   .listing-date {
   background-color: #fff;
   border: 1px solid #e0e0e0;
   color: #888;
   display: inline-block;
   border-radius: 3px;
   font-size: 12px;
   padding: 3px 8px;
   line-height: 18px;
   font-weight: 500;
   }
   .dashboard-list-box ul ul li
   {
   width:100%;
   }
</style>
<script type="application/javascript">
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
   
   jQuery(document).ready(function(e) {
   var form1 = $('#profile_update');
   var error1 = $('.alert-danger', form1);
   var success1 = $('.alert-success', form1);
   
   form1.validate({
   	errorElement: 'span', //default input error message container
   	errorClass: 'help-block help-block-error', // default input error message class
   	focusInvalid: false, // do not focus the last invalid input
   	ignore: "", // validate all fields including form hidden input          
   	 messages: {              
                
   			 'phone': {
                      required: 'Mobile No is required',
   				 minlength: jQuery.validator.format("Invalid Mobile No"),
   									
                  },
   			
   			 'first_name': {
                      required: 'Username is required',
   				
                  },
   			
   			 'user_email': {
                      required: 'Email is required',
   				email: 'Invalid Email',
   				
                  },
   			 'companyname': {
                      required: 'Email is required',
   				email: 'Invalid Email',
   				
                  },
   			 
   		
          
   
           
              },
              rules: {
                 			
   			first_name: {
                      required: true,
   			                },
   			companyname: {
                      required: true,
   			                },
   			phone: {
                      required: true,
                      number: true,
                      minlength: 8,
                    
   				
                  },
   			
   			
               	user_email: {
                      required: true,
   				email:true,
   									
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
   			url : '<?php echo $base_url?>login_controller/company_update',
   			type: 'POST',
   			data: jQuery(form).serialize(),
   			success:function(response){
   				//console.log(response);
   				 location.reload();
   				toastr.options = {
   					"closeButton": true,
   				}
   				toastr.success("Profile have been successfully updated.");		
   			}
   		});
   	}
   });
   
   
   
   
   
     });
     
   
         //~ $("#imageUploadForm").change(function() {
   	   //~ alert('hi');
           //~ var formData = new FormData();
           //~ var totalFiles = document.getElementById("imageUploadForm").files.length;
           //~ for (var i = 0; i < totalFiles; i++) {
             //~ var file = document.getElementById("imageUploadForm").files[i];
             //~ formData.append("imageUploadForm", file);
           //~ }
           //~ alert();
           //~ $.ajax({
             //~ type: "POST",
             //~ url: '<?php echo $base_url?>login_controller/profile_image',
             //~ data: formData,
             //~ dataType: 'json',
   				//~ success:function(response){
   		   //~ console.log(response);
               //    alert('succes!!');
               //},
               //error: function(error) {
               //    alert("errror");
               //}
           //~ }
           //~ .done(function() {
             //~ alert('success');
           //~ }).fail(function( xhr, status, errorThrown ) {
               //~ alert('fail');
             //~ });
          //~ });  });
   //~ jQuery(document).on('click','#image_upload',function(){
   	//~ jQuery.ajax({
   				//~ url : 
   				//~ type: 'POST',
   				//~ data: jQuery('#upload_profile_image').serialize(),
   				//~ success:function(response){
   					//~ toastr.options = {
   						//~ "closeButton": true,
   					//~ }
   					//~ toastr.success("Profile Image is Updated Succesfully", "Notifications");	
   				//~ }
   			//~ });
   //~ });
   
   $('#imageUploadForm').change(function(){
   var file_data = $('#imageUploadForm').prop('files')[0];
   var form_data = new FormData();
   form_data.append('file', file_data);
   $.ajax({
   	url: '<?php echo $base_url?>login_controller/profile_image',
   	method:"POST",
   	data:form_data,
   	contentType:false,
   	cache:false,
   	processData:false,
   	beforeSend:function()
   	{
   		$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
   	},
   	success:function(data)
   	{
   		// $('.emty_cls').empty('');
   		$('#uploaded_images').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
   		$('#img_link').val(data);
   		$('#files').val('');
   	}
   })
    
   });
   
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($){ 
   
   
     $('.list-groupmanage').paginathing({
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
   
     $('.list-groupexpired').paginathing({
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
<script type="text/javascript">
   jQuery(document).ready(function($){
   
     $('.list-groupsubpro').paginathing({
       perPage: 5,
       limitPagination: 0,
       containerClass: 'panel-footer',
       pageNumbers: true
     })
   
     //~ $('.table tbody').paginathing({
       //~ perPage: 2,
     //~ insertAfter: '.tabledata',
       //~ pageNumbers: true
     //~ });
   
   
     $('.list-groupactcand').paginathing({
       perPage: 5,
       limitPagination: 0,
       containerClass: 'panel-footer',
       pageNumbers: true
     })
   
     //~ $('.table tbody').paginathing({
       //~ perPage: 2,
   //~ insertAfter: '.tabledata',
       //~ pageNumbers: true
     //~ });
   
   
   
     $('.list-groupactcint').paginathing({
       perPage: 5,
       limitPagination: 0,
       containerClass: 'panel-footer',
       pageNumbers: true
     })
   
     //~ $('.table tbody').paginathing({
       //~ perPage: 2,
       //~ insertAfter: '.tabledata',
       //~ pageNumbers: true
     //~ });
   
   
     $('.list-groupcompl').paginathing({
       perPage: 5,
       limitPagination: 0,
       containerClass: 'panel-footer',
       pageNumbers: true
     })
   
     //~ $('.table tbody').paginathing({
       //~ perPage: 2,
        //~ insertAfter: '.tabledata',
       //~ pageNumbers: true
     //~ });
   });
   
   
   
   
</script>
<script type="text/javascript">
   jQuery(document).ready(function($){
   
   
      $('.list-group').paginathing({
        perPage: 5,
        limitPagination: 0,
        containerClass: 'panel-footer',
        pageNumbers: true
      })
   
     
    });
    
</script>
