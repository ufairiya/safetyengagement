<section>
   <?php 
      //~ if($statusid == 1)
      //~ {
			//~ $get_postprosaldetails = $this->postjob_model->get_active_postsp($poid);   
      //~ }
      //~ else if($statusid == 2)
      //~ {
			//~ $get_postprosaldetails = $this->postjob_model->get_post_sumbit_p($poid);  
      //~ }
      //~ else if($statusid == 3)
      //~ {
			//~ $get_postprosaldetails = $this->postjob_model->get_post_award_p($poid);  
      //~ }
      
      $get_postprosaldetails = $this->postjob_model->get_biddedjob($poid);   
      //~ var_dump($get_postprosaldetails);
      ?>
      <style>
      .listofsfdrop
      {
	overflow: hidden;
    padding: 18px;
    background-color: #fff;
    width :unset;
     
	   }
      .ratingcolor
      {
		color: #ED7D31;
    font-size: 24px;
  
		  }
		       .ratinglabel
		       {
				       padding: 21px 0;
				   
				   }
      </style>
      
   <div class="container">
      <div class="row">
         <?php  if(!empty($getawardedprojstatus->job_title)){ ?>
         <h2 class="headh2"><?php echo substr($getawardedprojstatus->job_title,0,50).'....'; ?></h2>
         <?php } ?>
         <div class="col-md-8 pull-left">
            <h2 class="headh2"><?php echo $profile_user->first_name.' profiles'; ?></h2>
         </div>
         <div class="listofsfdrop pull-right">
            <select class="pull-right" id="example" multiple="multiple" style="background: #36454f;width: 300px">
               <?php if(!empty($get_postprosaldetails)){  foreach($get_postprosaldetails as $get_postproposalsdata ){ 
                 
                  $urlviewprofile = $base_url.'home/profile/'.$get_postproposalsdata->id_user_master.'/'.$poid;
                  ?>  
               <option value="<?php echo $urlviewprofile; ?>">
                  <div class="perposal-img-client" >
                     <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                     <?php 
                        echo $get_postproposalsdata->first_name; 
                        //~ $get_rating  = $this->postjob_model->get_rating($get_postproposalsdata->id_user_master);
                           $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                            $get_rating  = $this->postjob_model->get_rating($arrrating);
                        $get_rat =$get_rating[0];?> 
                     <div class="">
                        <?php 
                        
                        $get_rating  = $this->postjob_model->get_rating($arrrating);
                        foreach($get_rating as  $get_ratingval)
                        {
							
			
                        $get_rat =$get_ratingval;
                        
                        
						if(!empty($get_rat->countrating)){
							
							$count_str = $get_rat->countrating/$get_rat->ra_id;	
							
							
							if($count_str)
							{
									echo '- Rating of ('.$count_str.' / 5) stars ';
							}
							}
							else
							{
							echo '- Rating of (0 / 5) stars';
							}
						}				 						
																		
                           //~ if(!empty($get_rat->countrating)){
                           //~ $count_str = round($get_rat->countrating/$get_rat->ra_id);	
                           //~ echo '- Rating of ('.$get_rat->countrating.' / 5) stars ';
                           //~ }else
                           //~ {
                           //~ echo '- Rating of (0 / 5) stars';
                           
                           //~ }
                           
                            ?>
                     </div>
                  </div>
               </option>
               <?php  }} ?>
            </select>
         </div>
      </div>
   </div>
   <div class="block">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 column jobdetailslt">
               <div class="">
                  <input type="hidden"  class="comid" name="comid"  value="<?php echo $profile_user->id_user_master; ?>" />
                  <input type="hidden"  class="poid" name="poid"  value="<?php echo $poid; ?>" />
                  <input type="hidden"  class="curruid" name="curruid"  value="<?php echo $this->session->userdata('id_user_master'); ?>" />
                  <input type="hidden"  class="getcount" name="getcount"  value="<?php if(!empty($getrating)){ echo $getrating->countrating; } ?>" />
                  <!-- Job Head -->
                  <div class="job-details safetyviewpg">
                     <div class="dashboard-list-box-static">
                        <div class="safeprof col-lg-12 col-md-12" >
                           <div class="col-lg-4 col-md-4" >
                              <div class="edit-profile-photo" >
                                 <div class="emty_cls" id="uploaded_images" >
                                    <?php  if($profile_user->profile_image != ""){ ?>
                                    <img src="<?php echo $base_url.'uploads/'.$profile_user->profile_image; ?>">
                                    <?php } else { ?>
                                    <img src="<?php echo $base_url; ?>uploads/default17.jpg">
                                    <?php } ?>
                                 </div>
                              </div>
                           
                             <?php    
                     
                      $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $get_postproposalsdata->id_user_master);
                            $get_rating  = $this->postjob_model->get_rating($arrrating);
                      
                       
                      
							?>
			
                      
                      <div class="control-label ">	
										<div class="col-40"><label class="titlelabel" for="fname" >Rating:</label>
										</div>
										<div class="col-50">
											<label for="fname" >
												<div class="form-group" id="rating"> </div>
												<span class="review-text" style="display:none"><span id="starCount"></span> Review</span>
											</label>
										</div>
									
									<div class="col-40"><label class="titlelabel" for="fname" ></label></div>
										<div class="col-50">
<!--
											<label for="fname" ><?php  foreach($get_rating as $get_ratingval){   ?>
												<div class="">
													<input type="hidden"  class="getcount" name="getcount"  value="<?php if(!empty($get_ratingval->countrating)){
														//  echo $get_ratingval->countrating/$get_ratingval->ra_id; 
														  } ?>" />
												</div>
												<?php } ?>	<?php if(!empty($get_ratingval->countrating)){
													  $getstarrat = $get_ratingval->countrating/$get_ratingval->ra_id; 
													  echo '<p>Rating of ('.$getstarrat.' / 5) stars';	
														  } ?>
											</label>	
-->
<label for="fname" ><?php if(!empty($get_rating)){  $max = 0; $n = count($get_rating); foreach ($get_rating as $rate => $count) { 
												$max = $max+$count->countrating;}   ?>
												<div class="">
													<input type="hidden"  class="getcount" name="getcount"  value="<?php  echo $max / $n; 
														   ?>" />
												</div>
												<?php 
												
											

//~ echo '<p>Rating of ('.$max / $n.' / 5) stars';
echo '<p>Total Rating '.count($get_rating).' people';	

} else{ ?><input type="hidden"  class="getcount" name="getcount"  value="" /><?php 
	//~ echo '<p>Rating of 0 / 5) stars';
echo '<p>Total Rating 0 people';	 }  ?>
												
										
											</label>	
										</div>
								
									</div>
								
                      
                           </div>
                           <div class="col-lg-8 col-md-8 spacetopbottom" >
							    <h4>Account Information </h4><p><b><?php if($profile_user->user_type == 'professional'){ echo "( Safety Professional )"; } else{ echo "( Student )"; }  ?></b></p>
							      <hr>
                              <div class="control-label ">
                                 <div><label for="aw" class="pull-right"> 
                                    <?php if(!empty($getawardedprojstatusawared))
                                       {
                                         if($getawardedprojstatusawared->status == 1)
                                         { 
                                          ?>
                                    <a class="btndesign sent-offer" href="<?php echo $base_url; ?>job/award_sf?user_id=<?php echo $profile_user->id_user_master; ?>&proj_id=<?php echo $poid; ?>">Award Offer</a>
                                    <?php   } 
                                       else
                                       {
                                         if($getawardedprojstatusawared->status == 2)
                                         {
                                            //echo ' <a class="btndesign sent-offer" href="#">Awarded</a> ';
                                                                       echo '<div class="listing-badge red">Awarded</div>';
                                          } 
                                       }
                                       }
                                        else{ 
                                        
                                       echo '<div class="listing-badge red">Job Bidded</div>';
                                       
                                       }  ?>
                                    </label>
                                      <div class="form-group formfield">
                                 <label class="pull-left ">Name</label>   
                                 <span  class="pull-right unsetborder" name="first_name" id="first_name" > <?php echo $profile_user->first_name?></span>
                              </div>
                            
                              <div class="form-group formfield">
                                 <label class="pull-left ">Company Address</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->address; ?></span>
                              </div>
                              <div class="form-group formfield">
                                 <label class="pull-left ">City</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->city; ?></span>
                              </div>
                              <div class="form-group formfield">
                                 <label class="pull-left ">State</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->state; ?></span>
                              </div>
                                <div class="form-group formfield">
                                 <label class="pull-left">Zip code</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->zip_code; ?></span>
                              </div>
                              <div class="form-group formfield">
                                 <label class="pull-left">Cell phone</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->officephone; ?></span>
                              </div>
                              <div class="form-group formfield">
                                 <label class="pull-left">Experience Level</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->insyprocontrapp.' Level'; ?></span>
                              </div>
                           </div>
                               
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="information" class="tab-pane active">
                   
                        <div class="clear"></div>
                        <hr>
                      <?php  
                              $get_postprosaldetailsdata = $this->postjob_model->get_biddedproposaljob($poid);   

                         foreach($get_postprosaldetailsdata as $get_postprosaldetailsdataval)
          {
			
			  if($get_postprosaldetailsdataval->proposuser_id == $profile_user->id_user_master){
				     ?> <div class="bk_w col-md-12">
						  <h4>Proposal Details and pictures </h4>
						  <hr>
						  <div class="col-md-6">
							   <div class="form-group formfield">
								    <label class="control-label">Proposal Detail</label>
				 <span class="pull-right unsetborder" ><?php echo $get_postprosaldetailsdataval->proposal_detail; ?></span>				
				</div>
				</div>
				 <div class="col-md-6 ">
					 <div class="form-group formfield">
						 <?php $image = $get_postprosaldetailsdataval->proposal_file != '' ? $get_postprosaldetailsdataval->proposal_file : 'no.png'; 
						$pic_pp =  $get_postprosaldetailsdataval->proposal_file;
						  $info = new SplFileInfo($pic_pp);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic_pp : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic_pp; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>

				</div>
				</div>
				 <div class="clear"></div>
				</div>
		<?php  }
		  } ?>
		  <div class="clear"></div>
                        <hr>
                        <div class="bk_w col-md-12">
                           <h4>Documents and pictures </h4>
                           <hr>
                           <div class="col-md-6">
                              <div class="form-group formfield">
                                 <label class="control-label">Resume</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->resume; ?></span>
                                 <?php 
                                    if(!empty($profile_user->resumeimg_uploadimg_link))
                                    {
                                    echo '<div class="col-md-12">';	
                                    $pic_arr = explode(",", $profile_user->resumeimg_uploadimg_link);
                                    if(is_array($pic_arr))
                                    {
                                    	
                                    	foreach($pic_arr as $pic)
                                    	{
                                    	echo '<div class="col-md-3">';
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'assets/img/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    echo '</div>';
                                    
                                    } 
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->resumeimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    echo '</div>';
                                    }
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">College Degree</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->collegedegree; ?></span>
                                 <?php 
                                    if(!empty($profile_user->clgdegreeimg_upload_link))
                                    {
                                    echo '<div class="col-md-12">';		
                                    $pic_arr = explode(",", $profile_user->clgdegreeimg_upload_link);
                                    if(is_array($pic_arr))
                                    {
                                    	foreach($pic_arr as $pic)
                                    	{
                                    		echo '<div class="col-md-3">';	
                                    
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    echo '</div>';
                                    } 
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->clgdegreeimg_upload_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    echo '</div>';
                                    }
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Other Education</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->education; ?></span>
                                 <?php 
                                    if(!empty($profile_user->othereduimg_upload_link))
                                    {
                                    echo '<div class="col-md-12">';	
                                    $pic_arr = explode(",", $profile_user->othereduimg_upload_link);
                                    if(is_array($pic_arr))
                                    {
                                    	foreach($pic_arr as $pic)
                                    	{
                                    		echo '<div class="col-md-3">';
                                    
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    echo '</div>';
                                    } 
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->othereduimg_upload_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    echo '</div>';
                                    }
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Certificates - CSP, AST, Ect.. </label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->certificates; ?></span>
                                 <?php 
                                    if(!empty($profile_user->certificatesimg_uploadimg_link))
                                    {
                                    echo '<div class="col-md-12">';	
                                    $pic_arr = explode(",", $profile_user->certificatesimg_uploadimg_link);
                                    if(is_array($pic_arr))
                                    {
                                    	foreach($pic_arr as $pic)
                                    	{
                                    	echo '<div class="col-md-3">';	
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    echo '</div>';
                                    } 
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->certificatesimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    echo '</div>';
                                    }
                                    ?>
                                 <div class="add_removcertificates">
                                    <div class="col-md-12 col-xs-12 field_wrappercertificates checkboxes float-left in-row margin-bottom-20">			
                                    </div>
                                 </div>
                              </div>
                              <?php if($profile_user->user_type == 'professional'){ ?>	
                              <hr>
                              <div class="form-group formfield">
                                 <div class=" in-row">
                                    <label class="control-label">3<sup>rd</sup> party Contractor Approval</label>
                                 </div>
                                 <div class="col-md-12 float-left in-row margin-bottom-20">
                                    <?php if(!empty($profile_user->avettaname))
                                       {
                                       	?>
                                    <label for="checkipc1">Avetta</label>
                                    <?php 
                                       if(!empty($profile_user->avettaimg_link))
                                       {
                                       	
                                       $pic_arr = explode(",", $profile_user->avettaimg_link);
                                       if(is_array($pic_arr))
                                       {
                                       	foreach($pic_arr as $pic)
                                       	{
                                       
                                       $info = new SplFileInfo($pic);
                                       
                                       $fle_type = $info->getExtension();
                                       $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                       ?>
                                    <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                       <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                    </a>
                                    <?php
                                       } 
                                       }
                                       else
                                       { ?>
                                    <image src="<?php echo $base_url.'uploads/'.$profile_user->avettaimg_link; ?>" style="width: 75px;    height: 75px;" />
                                    <?php }	
                                       }
                                       }
                                       ?>
                                 </div>
                                 <div class="col-md-12 float-left in-row margin-bottom-20">
                                    <?php 
                                       if(!empty($profile_user->isnetworldname)){
                                       	?>
                                    <label for="checkipc2">ISNetworld</label>
                                    <?php 
                                       if(!empty($profile_user->isnetworldimg_link)){
                                       $pic_arr = explode(",", $profile_user->isnetworldimg_link);
                                       
                                       if(is_array($pic_arr))
                                       {
                                       	foreach($pic_arr as $pic)
                                       	{
                                       
                                       $info = new SplFileInfo($pic);
                                       
                                       $fle_type = $info->getExtension();
                                       $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                       ?>
                                    <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?> " download>
                                       <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                    </a>
                                    <?php
                                       } 
                                       }
                                       else
                                       { ?>
                                    <image src="<?php echo $base_url.'uploads/'.$profile_user->isnetworldimg_link; ?>" style="width: 75px;    height: 75px;" />
                                    <?php }	
                                       }
                                       }
                                       ?>
                                 </div>
                                 <div class="col-md-12 in-row margin-bottom-20">
                                    <?php 
                                       if(!empty($profile_user->brownname)){
                                       	
                                       	?>
                                    <label for="checkipc3">Brown</label>
                                    <?php 
                                       if(!empty($profile_user->brownimg_link)){
                                       $pic_arr = explode(",", $profile_user->brownimg_link);
                                       
                                       if(is_array($pic_arr))
                                       {
                                       	foreach($pic_arr as $pic)
                                       	{
                                       
                                       $info = new SplFileInfo($pic);
                                       
                                       $fle_type = $info->getExtension();
                                       $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                       ?>
                                    <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                       <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                    </a>
                                    <?php
                                       } 
                                       }
                                       else
                                       { ?>
                                    <image src="<?php echo $base_url.'uploads/'.$profile_user->brownimg_link; ?>" style="width: 75px;    height: 75px;" />
                                    <?php }	
                                       }
                                       }
                                       ?>
                                 </div>
                                 <div class="col-md-12 field_wrapper checkboxes in-row margin-bottom-20">
                                    <div class="add_remov">
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <?php if($profile_user->user_type == 'professional'){ ?>	
                              <div class="form-group formfield">
                                 <label class="control-label">Proof of liability insurance</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->insurance; ?></span>
                                 <?php
                                    echo '<div class="col-md-12">';
                                    if(!empty($profile_user->poorliabaimg_uploadimg_link)){
                                    $pic_arr = explode(",", $profile_user->poorliabaimg_uploadimg_link);
                                    
                                    if(is_array($pic_arr))
                                    {
                                    	foreach($pic_arr as $pic)
                                    	{
                                    echo '<div class="col-md-3">';
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    } 
                                    echo '</div>';	
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->poorliabaimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    }
                                    echo '</div>';	
                                    ?>
                              </div>
                              <?php } ?>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Industries you can serve</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->industries; ?></span>
                                 <?php 
                                    echo '<div class="col-md-12">';
                                    	if(!empty($profile_user->industriesimg_uploadimg_link)){
                                    	$pic_arr = explode(",", $profile_user->industriesimg_uploadimg_link);
                                    	
                                    	if(is_array($pic_arr))
                                    	{
                                    		foreach($pic_arr as $pic)
                                    		{
                                    	echo '<div class="col-md-3">';
                                    	$info = new SplFileInfo($pic);
                                    	
                                    	$fle_type = $info->getExtension();
                                    	$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    	?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    }
                                     echo '</div>'; 
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->industriesimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    }
                                     echo '</div>';
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="pull-left control-label">Are you willing to travel?</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->travel; ?></span>
                              </div>
                              <div class="clear"></div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Pictures,drawings,other</label>
                                 <?php 
                                    echo '<div class="col-md-12">';
                                    if(!empty($profile_user->uploadpripicdrawimg_link)){
                                    $pic_arr = explode(",", $profile_user->uploadpripicdrawimg_link);
                                    
                                    if(is_array($pic_arr))
                                    {
                                    	foreach($pic_arr as $pic)
                                    	{
                                    echo '<div class="col-md-3">';
                                    $info = new SplFileInfo($pic);
                                    
                                    $fle_type = $info->getExtension();
                                    $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    ?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    } 
                                     echo '</div>';
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->uploadpripicdrawimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	
                                    }
                                     echo '</div>';
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Comments</label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->comments; ?></span>
                                 <?php 
                                    echo '<div class="col-md-12">';
                                    		if(!empty($profile_user->commentimg_link)){
                                    		$pic_arr = explode(",", $profile_user->commentimg_link);
                                    		
                                    		if(is_array($pic_arr))
                                    		{
                                    			foreach($pic_arr as $pic)
                                    			{
                                    		echo '<div class="col-md-3">';
                                    		$info = new SplFileInfo($pic);
                                    		
                                    		$fle_type = $info->getExtension();
                                    		$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    		?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    }  echo '</div>';
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->commentimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	  echo '</div>';
                                    }
                                    ?>
                              </div>
                              <hr>
                              <div class="form-group formfield">
                                 <label class="control-label">Other Files or certifications </label>
                                 <span class="pull-right unsetborder" ><?php echo $profile_user->otherfilecer; ?></span>
                                 <?php 
                                    echo '<div class="col-md-12">';
                                    		if(!empty($profile_user->otherfilecerimg_link)){
                                    		$pic_arr = explode(",", $profile_user->otherfilecerimg_link);
                                    		
                                    		if(is_array($pic_arr))
                                    		{
                                    			foreach($pic_arr as $pic)
                                    			{
                                    		echo '<div class="col-md-3">';
                                    		$info = new SplFileInfo($pic);
                                    		
                                    		$fle_type = $info->getExtension();
                                    		$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                                    		?>
                                 <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" download>
                                    <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                                 </a>
                                 <?php
                                    } echo '</div>';
                                    }
                                    else
                                    { ?>
                                 <image src="<?php echo $base_url.'uploads/'.$profile_user->otherfilecerimg_link; ?>" style="width: 75px;    height: 75px;" />
                                 <?php }	echo '</div>';
                                    }
                                    ?>
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<button class="open-button" onclick="openForm()"><img width="40" height="40" src="<?php echo $base_url; ?>assets/img/chaticon.png"></button>
<div class="chat-popup" id="myForm" style="display:block">
   <!-- BEGIN CONTENT -->
   <!-- 
      A concept for a chat interface. 
      
      Try writing a new message! :)
      
      
      Follow me here:
      Twitter: https://twitter.com/thatguyemil
      Codepen: https://codepen.io/emilcarlsson/
      Website: http://emilcarlsson.se/
      
      -->
   <div id="frame">
      <header class="top-barhead">
         <div class="pull-left">
            <span class="icon typicons-message"></span>
            <span class="msgtitle">Message</span>
         </div>
         <div class="popup-head-right pull-right">
            <div class="btn-group">
<!--
               <button class="bg-btncolor chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
               <i class="glyphicon glyphicon-cog"></i> </button>
               <ul role="menu" class="dropdown-menu pull-right">
                  <li><a href="#">Media</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Clear Chat</a></li>
                  <li><a href="#">Email Chat</a></li>
               </ul>
-->
            </div>
            <button data-widget="remove" id="removeClass"  onclick="closeForm()" class="bg-btncolor cancel chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
         </div>
      </header>
      <div class="content">
         <div class="contact-profile">
            <?php if($profile_user->profile_image == ""){ ?><img style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$profile_user->profile_image; ?>" alt=""><?php } ?><span> <?php echo $profile_user->first_name; ?>
            </span>
<!--
            <div class="chat_jobtitle"><?php echo $getawardedprojstatus->job_title; ?></div>
-->
         </div>
         
         <div class="messages">
            <ul>
            </ul>
         </div>
         <div class="" id="chatSection">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-primary">
               <div class="box-header with-border">
               </div>
               <div class="box-body">
                  <div class="direct-chat-messages" id="content">
                     <div id="dumppy"></div>
                  </div>
               </div>
               <div class="box-footer">
                  <div class="">
                     <?php
                        $obj=&get_instance();
                        $obj->load->model('UserModel');
                        $profile_url = $obj->UserModel->PictureUrl();
                        $user=$obj->UserModel->GetUserData();
                        ?>
                     <input type="hidden" id="Sender_Id" value="<?=$profile_user->id_user_master;?>">
                     <input type="hidden" id="Sender_Name" value="<?=$user['first_name'];?>">
                     <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                     <input type="hidden" id="ReciverId_txt">
                     <input type="hidden" id="ReciverId" value="<?php echo $this->session->userdata('id_user_master'); ?>">
                     <span class="">
                        <div class="message-input">
                           <div class="wrap">
                              <input type="text" name="messagedataval" placeholder="Type Message ..." class="form-control messagedataval" />
                              <button class="btnSend"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                           </div>
                        </div>
                     </span>
                  </div>
               </div>
            </div>
            <!--/.direct-chat -->
         </div>
      </div>
   </div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/externalcss/view_profile.css" type="text/css">
   <script src="<?php echo $base_url; ?>assets/js/chat/chat.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

   <script src="<?php echo $base_url; ?>assets/js/jquery.emojiRatings.min.js"></script>

   <script >
jQuery(document).ready(function(e) 
{ 
var onetimeinterval =  setTimeout(function(){        var height = 0;
$('.messages ul li').each(function(i, value){

height += parseInt($(this).height());
});

height += '';

$('.messages').animate({scrollTop: height});
}, 5000);

});        
	   //~ $("input[name=messagedataval]").on('keyup', function () { 
		   //~ alert('hi');
	   //~ });
	   $(".messages").animate({ scrollTop: $(document).height() }, "fast");
      $("#profile-img").click(function() {
      	$("#status-options").toggleClass("active");
      });
      
      $(".expand-button").click(function() {
        $("#profile").toggleClass("expanded");
      	$("#contacts").toggleClass("expanded");
      });
      
      $("#status-options ul li").click(function() {
      	$("#profile-img").removeClass();
      	$("#status-online").removeClass("active");
      	$("#status-away").removeClass("active");
      	$("#status-busy").removeClass("active");
      	$("#status-offline").removeClass("active");
      	$(this).addClass("active");
      	
      	if($("#status-online").hasClass("active")) {
      		$("#profile-img").addClass("online");
      	} else if ($("#status-away").hasClass("active")) {
      		$("#profile-img").addClass("away");
      	} else if ($("#status-busy").hasClass("active")) {
      		$("#profile-img").addClass("busy");
      	} else if ($("#status-offline").hasClass("active")) {
      		$("#profile-img").addClass("offline");
      	} else {
      		$("#profile-img").removeClass();
      	};
      	
      	$("#status-options").removeClass("active");
      });
      $('.submit').click(function() {
        newMessage();
      });
      
      
   </script>
</div>
</div>
<script type="application/javascript">
   $('li.contact').click(function(){
      $('li.contact').removeClass("active");
      $(this).addClass("active"); 
     var comid =  $(this).attr("data-comid"); 
     var pruserid =  $(this).attr("data-pruserid");
      var projid = $(this).attr("data-projid");
   });
  $("#rating").emojiRating({
				fontSize: 32,
							});
</script>

<script type="text/javascript">
 var urlmenu = document.getElementById( 'example' );
 urlmenu.onchange = function() {
      window.open(  this.options[ this.selectedIndex ].value );
 };
 	
</script>
