<!--
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
-->
<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
<div class="container">
   <?php if($this->session->userdata('id_user_master')) { ?>
   <div class="row">
      <div class="">
         <!-- Titlebar -->
         <div>
            <?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
            <?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
            <?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
            <div class="listing-titlebar-title">
               <h2 class="headh2">Company Profile</h2>
            </div>
         </div>
      </div>
      <form id="comprofile_update" method="post" class="ptpb-30">
         <div class="row">
            <!-- Profile -->
            <div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
               <div class="dashboard-list-box margin-top-0">
                  <div class="dashboard-list-box-static">
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
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Number of awarded jobs:</label></div>
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
                           </div>
                           <div class="control-label ">
                              <div class="col-40"><label class="titlelabel" for="fname" >Rating:</label></div>
                              <div class="col-50"><label for="fname" ><?php //echo $user_information->email; ?></label></div>
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
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#messagedata">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Message</p>
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
                              <ul class="dashboard-list-box list-groupactcand list-group">
                                 <?php foreach($get_postjobpaiduser as $get_postjoballval)
                                    {  ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" >
                                       <div class="sell__section__row__list">
                                          <h4 class="pull-left sell__section__row__title"><label><?php echo $get_postjoballval->highleveljobdesc; ?></label></h4>
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
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
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span></div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php 
                                                  
                                                   
                                                   
                                                   $get_postprosaldetails = $this->postjob_model->get_active_post($get_postjoballval->po_id);
                                                 
                                                    ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Saftety Bidders  ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
                                                         <?php  foreach($get_postprosaldetails as $get_postproposalsdata ){ ?>  
                                                         <li>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                               <a href="<?php echo $base_url; ?>profile/?profile=37"> <?php echo $get_postproposalsdata->first_name; ?></a>
                                                               <img class="usr" src="https://app.test.safetyengagement.com/wp-content/plugins/universal-star-rating/includes/image.php?img=01.png&amp;px=12&amp;max=5&amp;rat=0" style="height: 12px !important;"> (0 / 5)   
                                                            </div>
                                                            <div class="awarmeg">
                                                               <!--
                                                                  <a class="sent-offer" href="<?php echo $base_url; ?>">Award Offer</a>
                                                                  -->
                                                               <a class="sent-offer mar-left-zero" onclick="$('#p-form-37162').submit();">Message</a>
                                                            </div>
                                                            <form id="p-form-37162" style="display: none;" method="post" action="#">
                                                               <input name="job" value="69">
                                                               <input type="submit" class="submit">
                                                            </form>
                                                         </li>
                                                         <?php } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="sell__section__row__list__child">
                                             <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146">
                                             </form>
                                          </div>
                                       </div>
                                    </a></section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               
                               
                                 <h4 class="headtitbid">Submitted Proposals ( <?php echo count($get_postjoballpaidproposal); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">   
                              <ul class="dashboard-list-box list-groupsubpro list-group">
                                 <?php foreach($get_postjoballpaidproposal as $get_postjoballpaidproposalval)
                                    {  
										
										
                                    	 $get_postjoballpaiddata = $this->postjob_model->get_postjoballpaiddata($get_postjoballpaidproposalval->proposproj_id); 
                                    	
                                    
                                    	 ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballpaiddata->po_id; ?>" >
                                       <div class="sell__section__row__list">
                                          <h4 class="pull-left sell__section__row__title"><label><?php echo $get_postjoballpaiddata->highleveljobdesc; ?></label></h4>
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballpaiddata->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
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
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span>  </div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php $get_postprosaldetails = $this->postjob_model->get_post_sumbit_p($get_postjoballpaidproposalval->proposproj_id);  
                                                    
                                                     
                                                      ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Submitted Proposals ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
                                                         <?php  foreach($get_postprosaldetails as $get_postproposalsdata ){   ?>  
                                                         <li>
                                                            <?php
                                                                if($get_postproposalsdata->prostatus != 2){ ?>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                               <a href="<?php echo $base_url; ?>profile/?profile=37"> <?php echo $get_postproposalsdata->first_name; ?></a>
                                                               <img class="usr" src="https://app.test.safetyengagement.com/wp-content/plugins/universal-star-rating/includes/image.php?img=01.png&amp;px=12&amp;max=5&amp;rat=0" style="height: 12px !important;"> (0 / 5)      
                                                            </div>
                                                            <div class="awarmeg">
                                                               <a class="sent-offer" href="<?php echo $base_url; ?>job/award_sf?user_id=<?php echo $get_postproposalsdata->id_user_master; ?>&proj_id=<?php echo $get_postjoballval->po_id; ?>">Award Offer</a>
                                                               <a class="sent-offer mar-left-zero" onclick="$('#p-form-37162').submit();">Message</a>
                                                            </div>
                                                            <form id="p-form-37162" style="display: none;" method="post" action="https://app.test.safetyengagement.com/message-board/">
                                                               <input name="job" value="69">
                                                               <input type="submit" class="submit">
                                                            </form>
                                                            <?php } ?>
                                                         </li>
                                                         <?php } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="sell__section__row__list__child">
                                             <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form>
                                          </div>
                                       </div>
                                   </a> </section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                      <h4 class="headtitbid">Active Contracts ( <?php echo count($get_postawardedtable); ?> )  </h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
                              <ul class="dashboard-list-box list-groupactcint list-group">
                                 <?php foreach($get_postawardedtable as $get_postawardedtableval)
                                    { 					
                                    
                                    		 $get_postdataaward = $this->postjob_model->get_postjoballpaiddata($get_postawardedtableval->proposproj_id); 
                                    	
                                    ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postdataaward->po_id; ?>" >
                                       <div class="sell__section__row__list">
                                          <h4 class="pull-left sell__section__row__title"><label><?php echo $get_postdataaward->highleveljobdesc; ?></label></h4>
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postdataaward->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
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
                                                         <?php  foreach($get_postprosaldetails as $get_postproposalsdata ){ ?>  
                                                         <li>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                               <a href="<?php echo $base_url; ?>profile/?profile=37"> <?php echo $get_postproposalsdata->first_name; ?></a>
                                                             <img class="usr" src="https://app.test.safetyengagement.com/wp-content/plugins/universal-star-rating/includes/image.php?img=01.png&amp;px=12&amp;max=5&amp;rat=0" style="height: 12px !important;"> (0 / 5)                                                            
                                                               </div>
                                                            <div class="awarmeg">
                                                             
                                                               <a class="sent-offer mar-left-zero" onclick="$('#p-form-37162').submit();">Message</a>
                                                            </div>
                                                            <form id="p-form-37162" style="display: none;" method="post" action="https://app.test.safetyengagement.com/message-board/">
                                                               <input name="job" value="69">
                                                               <input type="submit" class="submit">
                                                            </form>
                                                         </li>
                                                         <?php } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="sell__section__row__list__child">
                                             <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form>
                                          </div>
                                       </div></a>
                                    </section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
              
                              <h4 class="headtitbid">Completed Contracts ( <?php echo count($get_postjobcompletedtable); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
                              <ul class="dashboard-list-box list-groupcompl list-group">
                                 <?php foreach($get_postjobcompletedtable as $get_postjobcompletedtableval)
                                    { 						
                                    
                                    		 $get_postdataaward = $this->postjob_model->get_postjoballpaiddata($get_postjobcompletedtableval->proposproj_id); 
                                    	
                                    ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postdataaward->po_id; ?>" >
                                       <div class="sell__section__row__list">
                                          <h4 class="pull-left sell__section__row__title"><label><?php echo $get_postdataaward->highleveljobdesc; ?></label></h4>
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postdataaward->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
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
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span>  </div>
                                          </div>
                                          <div class="sell__section__row__list__child">
                                             <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form>
                                          </div>
                                       </div>
                                    </a></section>
                                 </li>
                                 <?php } ?> 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               
                              </div>
                              <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Manage Jobs( <?php echo count($get_postjoball); ?> )</h4>
                                  <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-groupmanage">
												 
												 <?php foreach($get_postjoball as $get_postjoballval)
			{ ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="col-md-12 sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><label><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo$get_postjoballval->job_title; ?></a></label></h4><p class="pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="col-md-12 sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>8 months ago</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo$get_postjoballval->joblocation; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span><?php echo $get_postjoballval->weblink; ?></span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form><a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Edit Job</a></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                         
                         



                                 <h4 class="headtitbid">Expirted Jobs ( <?php echo count($get_postjobexpired); ?> )</h4>
                               
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                        <div class="listings-container">
                                             <ul class="list-groupexpired">
												 
												 <?php foreach($get_postjobexpired as $get_postjoballval)
			{ ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><label><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></label></h4><p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo$get_postjoballval->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
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

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postjoballval->joblocation.' ,'.$get_postjoballval->city.' ,'.$get_postjoballval->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form><a href="<?php echo $base_url; ?>job/re_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Re-post Job</a></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>

                                <div id="messagedata" class="tab-pane">
                              
<section>

        <div class="col-xs-12">
          <div class="box">
			  
			  
        <h3><i class="fa fa-envelope" aria-hidden="true"></i>Message</h3>
        <hr/>
        			<div class="composebtn col-md-12"><button type="button" class="btn btn-info" data-target="#compose_mail" data-toggle="modal">Compose Message</button></div>

        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left messagesys sideways">
            <li class="headtitbid active"><a href="#home-v" data-toggle="tab"><i class="fa fa-inbox"></i>Inbox</a></li>
            <li class="headtitbid"><a href="#profile-v" data-toggle="tab"><i class="fa fa-paper-plane" aria-hidden="true"></i>Sent</a></li>
<!--
            <li><a href="#settings-v" data-toggle="tab"><i class="fa fa-gear"></i>
Settings</a></li>
-->
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home-v">   <div class="box-body">
                
        <?php echo form_open('messages/delete'); ?>
            <div class="box-body no-padding <?php if(!$recordinbx) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#search_admin_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" style="color: #000;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Sender</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($recordinbx as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                            $date = date('M d, Y h:i:s A',strtotime($row->date)); 
                            echo $date; 
                        ?>  
                    </td>
                    <td class="mailbox-name">
                        <a href="#read_mail" data-toggle="modal" class="read_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_from);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                      
                      <td class="mailbox-name">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_to);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->message_model->string_limit_words($row->content,10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->message_model->time_diff($row->date); ?></td>
                    
                  </tr>                      
                  <?php endforeach; ?>
                    
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodatainbx)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! No messages in this section! | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>messages">refresh this page</a> or try using the <a href="#search_admin_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>messages/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
            </div><!-- /.box-body --></div>
            <div class="tab-pane" id="profile-v">
            <!-- Titlebar -->
			  <div class="box-body">
                
        <?php echo form_open('sentitems/delete'); ?>
            <?php $this->load->view('front/message/modal/confirm'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#sent_search_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" style="color: #000;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($record as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                          $date = date('M d, Y h:i:s A',strtotime($row->date)); 
                            echo $date; 
                        ?>  
                    </td>
                    <td class="mailbox-name">
                        <a href="#read_sent_mail" data-toggle="modal" class="read_sent_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_to);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->message_model->string_limit_words($row->content,10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->message_model->time_diff($row->date); ?></td>
                    
                  </tr>                      
                  <?php endforeach; ?>
                    
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! You don't have any messages in your sent items | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>sentitems">refresh this page</a> or try using the <a href="#sent_search_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>sentitems/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
            </div><!-- /.box-body --></div>
<!--
            <div class="tab-pane" id="settings-v">Settings Tab.</div>
-->
          </div>
     

        <div class="clearfix"></div>

      </div>

      
         
</section>
</div>
   </div>

                              
                              
                           
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
          
        
      </form>
   
   <?php } ?>
</div>
<style>
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
    border-left: 4px solid #eee;
    transition: .3s;
    position: relative;
    overflow: unset;
    border: 1px solid #e0e0e0;
    margin-top: -1px;
    display: table;
    width: 100%;
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

</style>
<!--
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
-->
<!--
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
-->
<div class="clear"></div>
<?php $this->load->view('front/message/modal/read'); ?>
<?php $this->load->view('front/message/modal/search'); ?>
<?php $this->load->view('front/message/script/message'); ?>
<?php if(isset($_GET['delete'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Deleted Successfully!'
        });
    </script>
<?php endif; ?>
<div class="modal fade" id="compose_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> New Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('inbox/send'); ?>
                <div class="form-group">
                    <label for="send_to">Send To:</label>
                    <select name="send_to" class="form-control" readonly>
                        <?php foreach($sfprofess as $sfprofessrow): ?>
                        <option value="<?php echo $sfprofessrow->id_user_master; ?>"><?php echo $sfprofessrow->first_name.' ('.$sfprofessrow->email.')'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject">
                </div>   
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" cols="40" rows="10" class="form-control" placeholder="Your Message Here" style="resize: none;"></textarea>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="send" value="1" class="btn "><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
    <style>
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>


<h2>Popup Chat Window</h2>
<p>Click on the button at the bottom of this page to open the chat form.</p>
<p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script type="application/javascript">
jQuery(document).ready(function(e) {
 var form1 = $('#comprofile_update');
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
  });
  jQuery(document).ready(function($){
 

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
  });
  jQuery(document).ready(function($){


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
  });
  jQuery(document).ready(function($){

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
