<style>
   .job-form input[type="file"]
   {
   color: #000;
   }
   .editjobs{
   font-family: Copperplate Gothic Bold;
   font-size: 30px;
   }
    .emergency {    
	    background: rgba(243, 90, 1, 0.40);
    padding: 5px 15px
    }
.emergency label {color: red}
.jobemgerr label {color: #000}
</style>
<div class="wrapper">
   <section class="job-form">
      <h2 class="headh2 editjobs">Re-Post Jobs</h2>
      <form id="updatepost_a_job" action="<?php echo $base_url?>job/re_post_job" name="post_a_job" enctype="multipart/form-data" method="POST" >
         <div class="job-form__box">
            <div class="job-form__list">
               <div>
                  <label for="done" class="job-form__list__label">Job Title <span class="redman">*</span></label>
               <input type="hidden" name="job_id" id="job_id" value="<?php echo $edit_postjobs->po_id; ?>" >
                  <input type="text" name="job_title" id="job_title" value="<?php echo $edit_postjobs->job_title; ?>" class="job-form__list__input" >
               </div>
               <div>
                  <label for="done" class="job-form__list__label">High Level job description<span class="redman">*</span></label>
               <textarea rows="4" cols="50" name="highleveljobdesc" id="highleveljobdesc" class="job-form__list__textarea" ><?php echo $edit_postjobs->job_description; ?></textarea>

               </div>
               <div>
                  <label for="job_description" class="job-form__list__label">Detailed Job deliverables (what is the task and what deliverables do you require)<span class="redman">*</span></label>
                  <textarea rows="4" cols="50" name="job_description" id="job_description" class="job-form__list__textarea" ><?php echo $edit_postjobs->job_description; ?></textarea>
                  <br>
                  <?php 
                     if(!empty($edit_postjobs->detailed_pic))
                     {
                     	
                     $pic_arr = explode(",", $edit_postjobs->detailed_pic);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     
                     $info = new SplFileInfo($pic);
                     
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' || $fle_type == 'csv'   ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
                     <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgdetail" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgdetail"><i class="fa fa-remove"></i>
                           <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->detailed_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                  <div class="photoUpload">
					<div class="edit-profile-photo" >
						<div class="change-photo-btn margin-top-15">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Files</span>
								<input type="file"  name="detailed_upload"  class="upload" id="detailed_upload" />
								<input type="hidden"  name="detailed_pic"  class="detailed_pic" value="<?php echo $edit_postjobs->detailed_pic; ?>" />
							</div>
						</div>
							<div class="detailed_pictxt"></div>
					</div> 
				</div>
			</div>
               <div>
                  <label for="job_description" class="job-form__list__label">Special Equipment Required for the job (Training rooms, projectors, Air monitors, Lifts, forktrucks, other)</label>
                  <input type="text" name="equipment" id="equipment" value="<?php echo $edit_postjobs->equipment; ?>" class="job-form__list__input" >
                  <br>
       <?php 
                     if(!empty($edit_postjobs->equipment_pic))
                     {
                     $pic_arr = explode(",", $edit_postjobs->equipment_pic);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
             <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgequ" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgequ"><i class="fa fa-remove"></i>
					
                           <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->equipment_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
			 <div class="photoUpload">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="equipment_upload"  class="upload" id="equipment_upload" />
											<input type="hidden"  name="equipment_pic"  class="equipment_pic" value="<?php echo $edit_postjobs->equipment_pic; ?>" />
										</div>
									</div>
									<div class="equipment_pictxt"></div>

								</div> 
							</div>
               </div>
                 <div>
				   <label for="safetyhazards" class="job-form__list__label">
					     <p> Host employer will provide a list of safety hazards and guidelines for the safety professional (others) to stay safe while they are on-site:</p>
					     <br>Please provide any safety related details using the examples above so all hazards and safety requirements are met:</label>
                  <textarea name="safetyhazards" id="safetyhazards" class="job-form__list__textarea"><?php echo $edit_postjobs->safetyhazards; ?></textarea>

                 <br>

                 <br>
<mark>Safety Project Orientation (other specific safety training, PPE requirements, Is a JSA required to identify hazards at the job site, How to receive first aid/other, is a company employee required to be with the safety professional (others).</mark>
               </div>
               </div>
           
               <div>
                  <label for="job_description" class="job-form__list__label">Is a final Report required</label>
                  <input type="text" name="finalrep" id="finalrep" value="<?php echo $edit_postjobs->finalrep; ?>" class="job-form__list__input" >
                  <br>
                                    <?php 
                     if(!empty($edit_postjobs->finalrep_pic))
                     {
                     $pic_arr = explode(",", $edit_postjobs->finalrep_pic);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' || $fle_type == 'csv' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
                <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgfin" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgfin"><i class="fa fa-remove"></i>
                           <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->finalrep_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
 <div class="photoUpload">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="finalrep_upload"  class="upload" id="finalrep_upload" />
											<input type="hidden"  name="finalrep_pic"  class="finalrep_pic" value="<?php echo $edit_postjobs->finalrep_pic; ?>" />
										</div>
									</div>
									<div class="finalrep_pictxt"></div>
								</div> 
							</div>
               </div>
                  <div class="job-form__budget">
				   				 <div class="job-form__budget__box3 box4">
					  <label class="label job-form__list__label">Enter location</label>
					 <div id="locationField">
      <input id="autocomplete"
             placeholder="Enter your location"
             onFocus="geolocate()"
             type="text" class="job-form__list__input job-form__budget__input"/>
    </div>    </div>
<!--
                  <div class="job-form__budget__box3 box4">
                     <label for="budget" class="job-form__list__label">Job Information</label>
                     <input type="text" id="information" name="information" value="<?php echo $edit_postjobs->information; ?>" class="job-form__list__input job-form__budget__input">
                  </div>
-->  			 <div class="job-form__budget__box3 box4">
				 <label class="label job-form__list__label">City</label>

      <input type="text"  class="job-form__list__input field" name="locality"  id="locality" value="<?php echo $edit_postjobs->citypost; ?>"/> 
                  </div>
                 <div class="job-form__budget__box3 box4">
				    <label class="label job-form__list__label">State</label>

        <input type="text"  class="job-form__list__input field" name="administrative_area_level_1"  id="administrative_area_level_1" value="<?php echo $edit_postjobs->statepost; ?>"/>
                  </div>
                 <div class="job-form__budget__box3 box4">
				      <label class="label job-form__list__label">Zip code</label>
       <input type="text"  class="job-form__list__input field" name="postal_code" id="postal_code" value="<?php echo $edit_postjobs->zipcode; ?>" />   
                    </div>
                
               </div>
            
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Industry</label>
                         <select name="se_industry" id="industry" class="industrysel job-form__list__select">
						 <option value="">--Please Choose an Option--</option>
						 <?php
						  $get_industrys = $this->postjob_model->get_industry();
						 foreach($get_industrys as $get_industry)
						 { ?>
							 <option <?php if(strtolower($get_industry->industry_name) == strtolower($edit_postjobs->industry)){ echo "selected='selected'"; } ?>  value="<?php echo $get_industry->id ; ?>"><?php echo $get_industry->industry_name ; ?></option>
						 <?php
						 }
						 ?>
                        <option value="other">Other</option>
                       
                     </select> 
                      
                     <input type="text" id="industryinp"  name="industry" class="job-form__list__input job-form__budget__input valid industryinp" style="display:none; width:90%" /><span id="removeindustry" class="removeindustry" style="display:none;">X</span>
                  </div>
                  <div class="job-form__list__box1">
                     <div class="certificates-div">
                        <h2 class="certificate_title">Is this only for students</h2>
                        <div class="">
                           <input type="checkbox" id="internship" name="internship" value="internship" <?php if($edit_postjobs->explevel1 == 'internship'){ echo 'checked'; } ?>>
                           <label for="budget" class="checkbox-titles">Internship/Co-op Only</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <label for="job_description" class="job-form__list__label">Project Files: Prints, Pictures, Quotes, Links, documents, specifications or proposals can be attached Here</label>
                  <input type="text" name="project" id="project" value="<?php echo $edit_postjobs->project; ?>" class="job-form__list__input" >
                  <br>
                  <?php 
                     if(!empty($edit_postjobs->project_pic))
                     {
                     $pic_arr = explode(",", $edit_postjobs->project_pic);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc'|| $fle_type == 'csv' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
               <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgproj" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgproj"><i class="fa fa-remove"></i>
                         <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->project_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                     <div class="photoUpload">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="project_upload"  class="upload" id="project_upload" />
											<input type="hidden"  name="project_pic"  class="project_pic" value="<?php echo $edit_postjobs->project_pic; ?>" />
										</div>
									</div>
									<div class="project_pictxt"></div>
								</div> 
							</div>
               </div>
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Start date Needed (calendar)  End Date:<span class="redman">*</span></label>
                     <input type="date" name="start_date" id="start_date" value="<?php echo $edit_postjobs->start_date; ?>" class="job-form__list__input" >
                     <input type="date" name="end_date" id="end_date" value="<?php echo $edit_postjobs->end_date; ?>" class="job-form__list__input" >
                  </div>
<!--
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Job is an emergency Job: (needs filled in less than 48 hours)<span class="redman">*</span></label>
                                          <input type="checkbox" name="jobemergency" id="jobemergency" <?php if($edit_postjobs->jobemergency == 1){ echo "checked"; }  ?> value="1" class="">
                  </div>
-->
              <div class="job-form__list__box1 emergency">
                      <label for="Industry" class="job-form__list__label">Job is an emergency Job: (needs filled in less than 48 hours)<span class="redman">*</span></label>
                    <div class="jobemgerr"> <label><input type="radio" name="jobemergency" id="jobemergency" value="1" class="" <?php if($edit_postjobs->jobemergency == 1){ echo "checked"; }  ?> >Yes</label>
                     <label> <input type="radio" name="jobemergency" id="jobemergency" value="2" class="" <?php if($edit_postjobs->jobemergency == 2){ echo "checked"; }  ?>>No </label></div>
               </div> 
               </div>
              
           
            <div class="job-form__upload form-job">
               <h3 class="job-form__upload__title">Specific Safety Qualifications and Experience you Require for this Job</h3>
               <div class="copy-wrapper">
                  <div class="copy">
                   
                    <?php  if(!empty($edit_postjobs->worktype_desc)){  $worktype_desc = json_decode($edit_postjobs->worktype_desc); foreach($worktype_desc as $worktype_descval){ ?>
                       <input class="file-upload-input file-input" name="job_file[]" type="file"><textarea rows="4" cols="50" name="worktype_desc[]" id="worktype_desc" class="job-form__list__textarea file-text-area" ><?php echo $worktype_descval; ?></textarea>
                     <?php }  } ?>
                     <br>
                  </div>
               </div>
               <input type="button" value="Add more files" class="btndesign" id="add_uploaddesc" >
            </div>
             <?php 
                     if(!empty($edit_postjobs->job_file))
                     {
                     	function array_map_assoc( $callback , $array=array() ){
				  $r = array();
				 if(!empty($array))
				 {
				  foreach ($array as $key=>$value)
					$r[$key] = $callback($key,$value);
				  return $r;
				}
				else{
					 return $r;
					}
				}
                     $pic_arr = json_decode($edit_postjobs->job_file);
                   
                   $pic_arrimp =  implode(',',array_map_assoc(function($k,$v){return $v;},$pic_arr));
                  ?>
                  <input type="hidden" name="files_pic" id="files_pic" value="<?php echo $pic_arrimp; ?>"/>
                  <?php 
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' || $fle_type == 'csv' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
              <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgjfile" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgjfile"><i class="fa fa-remove"></i>
                           <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->job_file; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
?>
<div class="job_pictxt"></div>
            <div class="job-form__upload" style="display:none;">
               <div class="job-form__upload__box" >
               <input type="file" name="job_image" id="hide" onchange="$('.file_description_div').show()">
               <p class="job-form__upload__text"><span class="job-form__upload__link">Browse</span> to add attachments</p>
            </div>
         </div>
         <label for="budget" class="job-form__list__label">     Experience Level Required for the job
         </label>
         <div class="job-form__budget">
            <div class="job-form__budget__box3 box3"><?php echo $edit_postjobs->job_title; ?>
               <label for="explevel1" class="job-form__list__label">Beginner </label>
               <input type="radio" name="explevel1" value="Beginner" <?php if($edit_postjobs->explevel1 == 'Experience'){ echo 'checked'; } ?>> 
            </div>
            <div class="job-form__budget__box3 box3">
               <label for="explevel2" class="job-form__list__label">Intermediate </label>
               <input type="radio" name="explevel1" value="Intermediate" <?php if($edit_postjobs->explevel1 == 'Intermediate'){ echo 'checked'; } ?>>
            </div>
            <div class="job-form__budget__box3 box3">
               <label for="explevel3" class="job-form__list__label">Expert </label>
               <input type="radio" name="explevel1" value="Expert" <?php if($edit_postjobs->explevel1 == 'Expert'){ echo 'checked'; } ?>> 
            </div>
         </div>
         <label for="budget" class="job-form__list__label">
            <h2>Additional Job Requirements</h2>
         </label>
         <div class="chk_std" >
            <label for="budget" class="job-form__list__label">Contractor 3rd Party Approval Requirements</label>
            <div class="job-form__budget">
               <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">Avetta</label>           
                  <input type="radio" name="thirdpartapprov" value="1" <?php if($edit_postjobs->thirdpartapprov == 1){ echo 'checked'; } ?> > 
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">Browz</label>
                  <input type="radio" name="thirdpartapprov" value="2" <?php if($edit_postjobs->thirdpartapprov == 2){ echo 'checked'; } ?>>
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">ISNetWorld</label>
                  <input type="radio" name="thirdpartapprov" value="3" <?php if($edit_postjobs->thirdpartapprov == 3){ echo 'checked'; } ?>> 
               </div>
            <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">Other</label>
                  <input type="radio" name="thirdpartapprov" value="4" <?php if($edit_postjobs->thirdpartapprov == 4){ echo 'checked'; } ?>> 
                  <div id="dvother" >
    <input type="text" id="txtPassportNumber" name ="othertxt" value= "<?php echo $edit_postjobs->thirdpartother ?>" />
</div> 
               </div>
            </div>
             <?php 
                     if(!empty($edit_postjobs->certificates_pic))
                     {
                     $pic_arr = explode(",", $edit_postjobs->certificates_pic);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc'|| $fle_type == 'csv' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
                <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                   { 
					 ?> 
					<span class="removeimg removeimgcer" data-imgtest="<?php echo $pic; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgcer"><i class="fa fa-remove"></i>
                           <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->certificates_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
         <div class="requ3partap" ><label for="budget" class="job-form__list__label"> Required upload field</label>
            <label><input type="radio" name="job3party" id="job3party" value="1" class=""  checked >Yes</label>
                     <label> <input type="radio" name="job3party" id="job3party" value="2" class="">No </label></div> 
           <div class="photoUpload certhide">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="certificates_upload"  class="upload" id="certificates_upload"  />
											<input type="hidden"  name="certificates_pic"  class="certificates_pic" value="<?php echo $edit_postjobs->certificates_pic; ?>" />
										</div>
									</div>
									<div class="certificates_pictxt"></div>
								</div> 
							</div>
         </div>
         <div class="job-form__upload chk_std">
            <h3 class="job-form__upload__title">Liability Insurance Requirements</h3>
            <input type="text" name="insurance" id="insurance" class="job-form__list__input" value="<?php echo $edit_postjobs->projinsurence; ?>" /> <br>
            <?php 
                     if(!empty($edit_postjobs->insurance_certificate))
                     {
                     $pic_arr = explode(",", $edit_postjobs->insurance_certificate);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' || $fle_type == 'csv' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
                   <span class="removeimg removeimgins" data-imgtest="<?php echo $age_code; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgins"><i class="fa fa-remove"></i>
                     <image class="removeim" src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px; height: 75px;" />
                  </a>
                  </span>
                  <?php
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->insurance_certificate; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                     <div class="requinsu" > <label for="budget" class="job-form__list__label"> Required upload field</label>
				   <label><input type="radio" name="jobinsurence"  id="jobinsurence" value="1" class=""  checked >Yes</label>
                     <label> <input type="radio" name="jobinsurence" id="jobinsurence" value="2" class="">No </label></div>   
                <div class="photoUpload indurhide">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="insurance_upload"  class="upload" id="insurance_upload" />
											<input type="hidden"  name="insurance_certificate"  class="insurance_certificate" value="<?php echo $edit_postjobs->insurance_certificate; ?>" />
										</div>
									</div>
									<div class="insurance_pictxt"></div>
								</div> 
							</div>
         </div>
         <div class="job-form__upload">
            <h3 class="job-form__upload__title">Budget (pay by the hour or fixed price)<span class="redman">*</span></h3>
               <label><input type="radio" name="hourorfix" id="hourorfix" value="hour" <?php if(!empty($edit_postjobs->hourorfix) && $edit_postjobs->hourorfix == 'hour' ){ echo 'checked';}else{ echo 'checked'; } ?> class="">Hour price</label>
               <label><input type="radio" name="hourorfix" id="hourorfix" value="fixed" <?php if(!empty($edit_postjobs->hourorfix)  && $edit_postjobs->hourorfix == 'fixed' ){ echo 'checked';} ?> class="">Fixed price</label>
            <input type="text" name="budget" id="budget" class="job-form__list__input" value="<?php echo $edit_postjobs->budget; ?>" /> <br>
            <?php 
                     if(!empty($edit_postjobs->budget_img))
                     {
                     $pic_arr = explode(",", $edit_postjobs->budget_img);
                     if(is_array($pic_arr))
                     {
                     	foreach($pic_arr as $pic)
                     	{
                     $info = new SplFileInfo($pic);
                     $fle_type = $info->getExtension();
                     $age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
                     ?>
                    <?php $age_codeexp = explode(",",$age_code);
                  foreach($age_codeexp as $age_codeexpval)
                  { ?> <span class="removeimg removeimgbud" data-imgtest="<?php echo $age_code; ?>" ><a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>" class="removeimg removeimgbud"><i class="fa fa-remove"></i>
                     <image class="removeim" src="<?php echo $base_url.'assets/img/'.$age_codeexpval; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  </span>
                  <?php
                     }
					} 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$edit_postjobs->budget_img; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                       <div class="photoUpload">
								<div class="edit-profile-photo" >
									<div class="change-photo-btn margin-top-15">
										<div class="photoUpload">
											<span><i class="fa fa-upload"></i> Upload Files</span>
											<input type="file"  name="budget_upload"  class="upload" id="budget_upload" />
											<input type="hidden"  name="budget_pic"  class="budget_pic" value="<?php echo $edit_postjobs->budget_img; ?>" />
										</div>
									</div>
									<div class="budget_pictxt"></div>
								</div> 
							</div>
         </div>
         <div class="jobs_submit_button">
            <input type="submit" name="submit_job" value="Re-Post Your Job" class="btndesign" id="submit_job">               
         </div>
</div>
</form>
</section>
<article class="useful-article">
   <h3 class="useful-article__title">Useful Tips</h3>
   <p class="useful-article__text">1. Describe your Job in as much detail as you can comfortably
      reveal - it will increase the quality of proposals you receive and shorten the selection process.
   </p>
   <p class="useful-article__text">2. Upload as much relevant information (pictures, documents,specifications, links, etc) as possible to get a realistic quote.
   </p>
   <p class="useful-article__text">3. Match the experience level to your requirements – remember, you’re looking for the best you can afford, not the cheapest you can get.
   </p>
</article>
</div>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jobregform.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jobregform.css" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script>

var placeSearch, autocomplete;

var componentForm = {
  locality: 'long_name',
  administrative_area_level_1: 'long_name',
  postal_code: 'short_name'
};
 var options = {
    componentRestrictions: {'country':'us'},
    types: ['(regions)'] // (cities)
  };
s
function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'),options);

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields('address_components');

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
 
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}



    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6_4_Gdn6dO1JwksKgCV4ctc1fopbp26Q&libraries=places&callback=initAutocomplete"
        async defer></script>
<script type="text/javascript">
 		$(document).ready(function() {
    $("input[name$='job3party']").click(function() {
        var test = $(this).val();
		if(test == 2)
		{
        $(".certhide").hide();
		}
		else
		{
		  $(".certhide").show();	
		}
    });
    $("input[name$='jobinsurence']").click(function() {
        var test = $(this).val();
		if(test == 2)
		{
        $(".indurhide").hide();
		}
		else
		{
		  $(".indurhide").show();	
		}
    });
});
    $(document).ready(function()
   {
       var maxField = 10; //Input fields increment limitation
       var addButton = $('#add_uploaddesc'); //Add button selector
       var wrapper = $('.copy-wrapper'); //Input field wrapper
       var fieldHTML = '<div class="copy-wrapper"><div class="copy"><input class="file-upload-input file-input" name="job_file[]" type="file"><textarea rows="4" cols="50" name="worktype_desc[]" id="worktype_desc" class="job-form__list__textarea file-text-area" ></textarea><br></div></div>'; //New input field html 
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
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
   });  
   
   		$('.experience__box').click(function(){
   			var boxid = $(this).attr('id');
   			$('.experience__box').each(function(){
   				$(this).removeClass('selected');
   			});
   			
   			$(this).addClass('selected');
   			
   			$('.'+boxid).prop('checked', true);
   			
   		});
   	$(function() {

   $("#updatepost_a_job").validate({
    rules: {
			job_title: "required",
			highleveljobdesc: "required",
			job_description: "required",
			information: "required",
			  locality:  "required",
	administrative_area_level_1:  "required,
			start_date: "required",
			end_date: "required",
			jobemergency: "required",
			joblocation: "required",
			budget: "required",
     
    
    },
    messages: {
    job_title: "Please fill in this field",
	job_description:  "Please fill in this field",
	highleveljobdesc :  "Please fill in this in field",
	  locality:  "Please fill in this in field",
	administrative_area_level_1:  "Please fill in this field",
	information:  "Please fill in this field",
	start_date:  "Please fill in this field",
	end_date:  "Please fill in this field",
	jobemergency:  "Please choose one",
	joblocation:  "Please fill in this field",
	budget:  "Please fill in this field",
    },
   
    submitHandler: function(form) {
      form.submit();
    }
   });
   });
    
</script>
<script>
   function setfilename(val)
   {
     var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
     document.getElementById("uploadFile").value = fileName;
   }
</script>
<script type='text/javascript'>
		   $("#internship").change(function() {
   	       $('.chk_std').show();
   
       if(this.checked) {
          $('.chk_std').hide();
       }
       else
       {
   			       $('.chk_std').show();
   
   		}
   });
   
   $('.removeindustry').click(function() {
	       $('select.industrysel option:nth-child(1)').prop("selected", true);


	   $('.removeindustry').hide();
        $('.industryinp').hide();
        $('.industrysel').show();
   });
   $('#industry').change(function() {
    if($(this).val() == 23)
    {
        $('.removeindustry').show();
        $('.industryinp').show();
        $('.industrysel').hide();
  
	}
    else{
        $('.removeindustry').hide();
        $('.industryinp').hide();
        $('.industrysel').show();
    

        } });
 //~ $( document ).ready(function() {
    //~ $.support.cors = true;
    //~ $.ajaxSetup({ cache: false });
    //~ var city = '';
    //~ var hascity = 0;
    //~ var hassub = 0;
    //~ var state = '';
    //~ var nbhd = '';
    //~ var subloc = '';
 
    //~ $('#zipcode').keyup(function() {
      //~ $zval = $('#zipcode').val();
 
      //~ if($zval.length == 5){
         //~ $jCSval = getCityState($zval, true); 
      //~ }
    //~ });
  
  //~ function getCityState($zip, $blnUSA) {
 //~ var date = new Date();
 //~ $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $zip + '&key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&type=json&_=' + date.getTime(), function(response){
         //~ //find the city and state
 //~ var address_components = response.results[0].address_components;
 //~ $.each(address_components, function(index, component){
 //~ var types = component.types;
 //~ $.each(types, function(index, type){
 //~ if(type == 'locality') {
   //~ city = component.long_name;
   //~ hascity = 1;
 //~ }
 //~ if(type == 'administrative_area_level_1') {
   //~ state = component.long_name;
 //~ }
 //~ if(type == 'neighborhood') {
   //~ nbhd = component.long_name;
 //~ }
 //~ if(type == 'sublocality') {
   //~ subloc = component.long_name;
   //~ hassub = 1;
 //~ }
 //~ });
 //~ });
 
 //~ //pre-fill the city and state
        //~ if(hascity == 1){
 //~ $('#city').val(city);
        //~ } else if(hassub == 1) {
            //~ $('#city').val(subloc);
        //~ } else {
     //~ $('#city').val(nbhd);
 //~ }
 //$('#state').val(state);
 //~ var statetr =state.replace(/ /g,'');


 //~ $('#state').val(statetr).trigger('change');
 //~ $('#stateloc').val(statetr).trigger('change');

   //~ //reset
 //~ var hascity = 0;
 //~ var hassub = 0;
    //~ });
  //~ }
//~ });

		

   
   
   
   $('#detailed_upload').change(function(){

	var files = $('#detailed_upload')[0].files;
	var error = '';
	var filename = jQuery(".detailed_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
							$('.detailed_pictxt').empty();

	//	$('.detailed_pic').val(f_n);
			$('.detailed_pictxt').append(objdata.length+' Item added'); 

	}
	})
	}
	
	else
	{
$('.detailed_pictxt').empty();
	$('.detailed_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.detailed_pictxt').empty();}, 3000);
	}
	});
	
   $('#equipment_upload').change(function(){

	var files = $('#equipment_upload')[0].files;
	var error = '';
	var filename = jQuery(".equipment_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
						$('.equipment_pictxt').empty();

		//$('.equipment_pic').val(f_n);
		$('.equipment_pictxt').append(objdata.length+' Item added'); 

	}
	})
	}
	
	else
	{
$('.equipment_pictxt').empty();
	$('.equipment_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.equipment_pictxt').empty();}, 3000);
	}
	});

   $('#finalrep_upload').change(function(){

	var files = $('#finalrep_upload')[0].files;
	var error = '';
	var filename = jQuery(".finalrep_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
					$('.finalrep_pictxt').empty();

	//	$('.finalrep_pic').val(f_n);
		$('.finalrep_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.finalrep_pictxt').empty();
	$('.finalrep_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.finalrep_pictxt').empty();}, 3000);
	}
	});
	
   $('#project_upload').change(function(){

	var files = $('#project_upload')[0].files;
	var error = '';
	var filename = jQuery(".project_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
				$('.project_pictxt').empty();

		//$('.project_pic').val(f_n);
				$('.project_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.project_pictxt').empty();
	$('.project_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.project_pictxt').empty();}, 3000);
	}
	});
	
	
	 $('#job_upload').change(function(){

	var files = $('#job_upload')[0].files;
	var error = '';
	var filename = jQuery(".job_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
			$('.job_pictxt').empty();

		//$('.job_pic').val(f_n);
				$('.job_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.job_pictxt').empty();
	$('.job_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.job_pictxt').empty();}, 3000);
	}
	});
	
	$('#certificates_upload').change(function(){

	var files = $('#certificates_upload')[0].files;
	var error = '';
	var filename = jQuery(".certificates_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
		$('.certificates_pictxt').empty();

		//$('.certificates_pic').val(f_n);
				$('.certificates_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.certificates_pictxt').empty();
	$('.certificates_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.certificates_pictxt').empty();}, 3000);
	}
	});
	
	$('#insurance_upload').change(function(){

	var files = $('#insurance_upload')[0].files;
	var error = '';
	var filename = jQuery(".insurance_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
	$('.insurance_pictxt').empty();
		//$('.insurance_certificate').val(f_n);
				$('.insurance_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.insurance_pictxt').empty();
	$('.insurance_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.insurance_pictxt').empty();}, 3000);
	}
	});
	
	$('#budget_upload').change(function(){

	var files = $('#budget_upload')[0].files;
	var error = '';
	var filename = jQuery(".budget_pic").val();
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['gif','png' ,'jpg','jpeg','csv','docx','pdf','doc','zip']) == -1)
	{
	error += "Invalid " + count + " Image File"
	}
	else
	{
	form_data.append("files[]", files[count]);
	}
	}
	if(error == '')
	{
	$.ajax({
	url: '<?php echo $base_url?>job/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,

	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	if(filename == ''){
		var f_n  = objdata;
	}
	else
	{
		var f_n  = filename+','+objdata;
	}
	$('.budget_pictxt').empty();
	//	$('.budget_pic').val(f_n);
				$('.budget_pictxt').append(objdata.length+' Item added'); 

	} 
	})
	}
	
	else
	{
$('.budget_pictxt').empty();
	$('.budget_pictxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.budget_pictxt').empty();}, 3000);
	}
	});
	
$('.removeimgbud').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgbud').attr('data-imgtest');
$('.galleryimg[value*="'+imgsrc+'"]').remove();

$(this).parents('.removeimgbud').remove();
var budget_pic = $('.budget_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){
	
   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }
    budgetarr.push(budget_pic[i]); 
    

});   
$('.budget_pic').val(budgetarr);
});
	
$('.removeimgins').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgins').attr('data-imgtest');

$(this).parents('.removeimgins').remove();
var budget_pic = $('.insurance_certificate').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){
	
   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }
    budgetarr.push(budget_pic[i]); 
  

});   
  $('.insurance_certificate').val(budgetarr);
});
$('.removeimgcer').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgcer').attr('data-imgtest');

$(this).parents('.removeimgcer').remove();
var budget_pic = $('.certificates_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.certificates_pic').val(budgetarr);
});
$('.removeimgproj').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgproj').attr('data-imgtest');

$(this).parents('.removeimgproj').remove();
var budget_pic = $('.project_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.project_pic').val(budgetarr);
});
$('.removeimgfin').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgfin').attr('data-imgtest');

$(this).parents('.removeimgfin').remove();
var budget_pic = $('.finalrep_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.finalrep_pic').val(budgetarr);
});
$('.removeimgequ').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgequ').attr('data-imgtest');

$(this).parents('.removeimgequ').remove();
var budget_pic = $('.equipment_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.equipment_pic').val(budgetarr);
});
$('.removeimgdetail').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgdetail').attr('data-imgtest');

$(this).parents('.removeimgdetail').remove();
var budget_pic = $('.detailed_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.detailed_pic').val(budgetarr);
});
$('.removeimgjfile').click(function(event){
event.preventDefault();
var imgsrc = $(this).parents('.removeimgjfile').attr('data-imgtest');

$(this).parents('.removeimgjfile').remove();
var budget_pic = $('.files_pic').val().split(",");
    var budgetarr = [];

$.each(budget_pic,function(i){

   if(budget_pic[i] == imgsrc)
   { 
	        return true;
    }

    budgetarr.push(budget_pic[i]); 
    

});   
$('.files_pic').val(budgetarr);
});
       
       //~ $(function(){
    //~ var dtToday = new Date();
    
    //~ var month = dtToday.getMonth() + 1;
    //~ var day = dtToday.getDate();
    //~ var year = dtToday.getFullYear();
    //~ if(month < 10)
        //~ month = '0' + month.toString();
    //~ if(day < 10)
        //~ day = '0' + day.toString();
    
    //~ var maxDate = year + '-' + month + '-' + day;
   
    //~ $('#start_date').attr('min', maxDate);
    //~ $('#end_date').attr('min', maxDate);
//~ })
</script>

<script type="text/javascript">
    $(function () {
       
        $('input[name="thirdpartapprov"]').on('click', function() {
			
        if ($(this).val()  != '4') {
            $('#dvother').hide();
        }
        else {
            $('#dvother').show();
        }
    });
    });
</script>
