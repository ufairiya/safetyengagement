<?php global $mobile_country_code;?>
<!-- BEGIN CONTENT -->
<div class="container">
				<div class="form-group">
<textarea rows="4" cols="50" name="job_description" id="job_description" class="job-form__list__textarea valid"></textarea>
</div>
	<?php if($this->session->userdata('id_user_master')) { ?>
	<div class="row">
		<div class="">
			<!-- Titlebar -->
			<div >
				<?php if($this->session->flashdata('updateuser')) {echo $this->session->flashdata('updateuser');} ?> 
				<?php if($this->session->flashdata('errpass')) {echo $this->session->flashdata('errpass');} ?> 
				<?php if($this->session->flashdata('updatepassword')) {echo $this->session->flashdata('updatepassword');} ?> 
				<div class="listing-titlebar-title">
					<h2 class="headh2">Safety Professional Profile</h2>
				</div>
			</div>
		</div>
		<form id="profile_update" method="post" class="ptpb-30">
			<div class="row"><!-- Profile -->
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
										<div class="col-40"><label class="titlelabel" for="fname" >Name:</label></div>
										<div class="col-50"><label for="fname" ><?php echo $user_information->first_name?></label></div>
									</div>
									<div class="control-label ">	
										<div class="col-40"><label class="titlelabel" for="fname" >Position with the company:</label></div>
										<div class="col-50"><label for="fname" ><?php echo $user_information->positioncompany; ?></label></div>
									</div>
									<div class="control-label ">	
										<div class="col-40"><label class="titlelabel" for="fname" >Email:</label></div>
										<div class="col-50"><label for="fname" ><?php echo trim($user_information->email); ?></label></div>
									</div>
								</div>

								<div class="col-lg-8 col-md-8 spacetopbottom" >
									<div class="control-label ">	
										<div class="col-40"><label class="titlelabel" for="fname" >Number of bids:</label> </div>
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
                           <li class="tabwidth active">
                              <a class="atagcompany" data-toggle="tab" href="#information" aria-expanded="true">
                                 <span class="iconfldes glyphicon glyphicon-user"></span>
                                 <p class="tabname">Account Details</p>
                              </a>
                           </li>
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#settings" aria-expanded="false">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Job Bids</p>
                              </a>
                           </li>
                           <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#events" aria-expanded="false">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">My Job Bids</p>
                              </a>
                           </li>
                          <li class="tabwidth">
                              <a class="atagcompany" data-toggle="tab" href="#messagedata">
                                 <span class="iconfldes glyphicon glyphicon-th-list"></span>
                                 <p class="tabname">Message</p>
                              </a>
                           </li>
                        </ul>
								<div class="user-body">
									<div class="tab-content">
										<div id="information" class="tab-pane active">
											<h4>Account Information</h4>
											<div class="col-md-6">
												<!-- Avatar -->
												<div class="form-group">
													<label class="control-label">Your Name</label>
													<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user_information->first_name?>" /> 
													<input type="hidden" class="form-control" name="img_link" id="img_link" value="<?php echo $user_information->profile_image; ?>" /> 
												</div>
												<div class="form-group">
													<label class="control-label">Your Position with the company</label>
													<input type="text"  class="form-control" name="positioncompany" id="positioncompany" value="<?php echo $user_information->positioncompany; ?>"/> 
												</div>
												<div class="form-group">
													<label class="control-label">Your Company Address</label>
													<input type="text"  class="form-control" name="companyaddress" id="companyaddress" value="<?php echo $user_information->address; ?>"/> 
												</div>
												<div class="form-group">
													<label class="control-label">City</label>
													<input type="text" class="form-control" name="city" id="city" value="<?php echo $user_information->city?>"/> 
												</div>
												<div class="form-group">
													<label class="control-label">State</label>
													<input type="text" class="form-control" name="state" id="state" value="<?php echo $user_information->state?>"/> 
												</div>
												
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Zip code</label>
													<input type="text"  class="form-control" name="zipcode" id="zipcode" value="<?php echo $user_information->zip_code?>"/> 
												</div>
												<div class="form-group">
													<label class="control-label">Mobile phone</label>
													<input type="tel" class="form-control" name="cellphone" id="cellphone" value="<?php echo $user_information->phone;?>"/>
												</div>
												<div class="form-group">
													<label class="control-label">Cell phone</label>
													<input type="tel" class="form-control" name="officephone" id="officephone" value="<?php echo $user_information->officephone;?>"/>
												</div>
												<div class="form-group">
													<label class="control-label"><?php echo $this->lang->line('email'); ?> address</label>
													<input type="text" class="form-control" name="user_email" id="user_email" readonly value="<?php echo trim($user_information->email); ?>">
												</div>
												<div class="form-group">
													<div class="in-row">
														<label class="control-label">Experience Level</label>
													</div>
													<div class="p-4 float-left in-row margin-bottom-20">
														<input id="check1" type="radio" <?php if($user_information->insyprocontrapp == 'entry'){  echo 'checked="checked"'; } ?> name="insyprocontrapp"  value="entry" />
														<label for="check1">Entry Level</label>
													</div>
													<div class="p-4 float-left in-row margin-bottom-20">
														<input id="check2" type="radio" <?php if($user_information->insyprocontrapp == 'intermediate'){  echo 'checked="checked"'; } ?> name="insyprocontrapp"  value="intermediate" />
														<label for="check2">Intermediate Level</label>
													</div>
													<div class="p-4 in-row">
														<input id="check3" type="radio" <?php if($user_information->insyprocontrapp == 'expert'){  echo 'checked="checked"'; } ?> name="insyprocontrapp"   value="expert" />
														<label for="check3">Expert Level</label>
													</div>
												</div>   
										 </div>  
											<div class="clear"></div>
											<h4>Upload documents and pictures </h4>
											 <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Resume</label>
													<input type="text"  class="form-control" name="resume" id="resume" value="<?php echo $user_information->resume; ?>"/> 
													
													<?php 
														if(!empty($user_information->resumeimg_uploadimg_link))
														{
															
														$pic_arr = explode(",", $user_information->resumeimg_uploadimg_link);
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{

														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->resumeimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
													
													<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15">
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="resumeimg_upload[]"  class="upload" id="resumeimg_upload" multiple="multiple" />
																	<input type="hidden"  name="resumeimg_uploadimg_link"  class="resumeimg_uploadimg_link" value="<?php echo $user_information->resumeimg_uploadimg_link; ?>" />
																</div>
															</div>
														</div> 
														<div class="resumeimg_uploadimg_linktxt"></div>
													</div>
												</div>  
												<?php function get_file_extension($file_name) { return substr(strrchr($file_name,'.'),1);} 
												$resexp =  explode(",",$user_information->resumeimg_uploadimg_link);
												foreach($resexp as $resexpval)
												{
												if(get_file_extension($resexpval) == 'gif' || get_file_extension($resexpval) == 'png'|| get_file_extension($resexpval) == 'jpg'|| get_file_extension($resexpval) == 'jpeg'){ echo "image"; }else{ echo "doc"; } 
												} ?>
												<div class="form-group">
													<label class="control-label">College Degree(did you graduate)(upload picture of your degree)</label>
													<input type="text"  class="form-control" name="collegedegree" id="collegedegree" value="<?php echo $user_information->collegedegree; ?>"/> 
													
													<?php 
														if(!empty($user_information->clgdegreeimg_upload_link))
														{
															
														$pic_arr = explode(",", $user_information->clgdegreeimg_upload_link);
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{

														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->clgdegreeimg_upload_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
												
													<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15">
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="clgdegreeimg_upload[]"  class="upload" id="clgdegreeimg_upload" multiple="multiple" />
																	<input type="hidden"  name="clgdegreeimg_upload_link"  class="clgdegreeimg_uploadimg_link" value="<?php echo $user_information->clgdegreeimg_upload_link; ?>" />
																</div>
															</div>
														</div> 
														<div class="clgdegreeimglinktxt"></div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">Other Education</label>
													<input type="text"  class="form-control" name="education" id="education" value="<?php echo $user_information->education; ?>"/> 
													
													<?php 
														if(!empty($user_information->othereduimg_upload_link))
														{
															
														$pic_arr = explode(",", $user_information->othereduimg_upload_link);
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{

														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->othereduimg_upload_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
														<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15">
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="othereduimg_upload[]"  class="upload" id="othereduimg_upload" multiple="multiple" />
																	<input type="hidden"  name="othereduimg_upload_link"  class="othereduimg_upload_link" value="<?php echo $user_information->othereduimg_upload_link; ?>" />
																</div>
															</div> 
														</div> 
														<div class="othereduimglinktxt"></div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">Certificates -  CSP, AST, OHST, SMS, CHST, CIH, CET, OSHA – 501, 511, other(upload picture) </label>
													<input type="text"  class="form-control" name="certificates" id="certificates" value="<?php echo $user_information->certificates; ?>"/>
													<?php 
														if(!empty($user_information->certificatesimg_uploadimg_link))
														{
															
														$pic_arr = explode(",", $user_information->certificatesimg_uploadimg_link);
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{

														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->certificatesimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
													<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15"> 
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="certificatesimg_upload[]"  class="upload" id="certificatesimg_upload" multiple="multiple" />
																	<input type="hidden"  name="certificatesimg_uploadimg_link"  class="certificatesimg_uploadimg_link" value="<?php echo $user_information->certificatesimg_uploadimg_link; ?>" />
																</div>
															</div>
														</div> 
														<div class="certificatesimg_linktxt"></div>
													</div>
													<div class="add_removcertificates">
														<div class="col-md-12 col-xs-12 field_wrappercertificates checkboxes float-left in-row margin-bottom-20">			
														</div>
													</div>
												</div>
										<?php if($this->session->userdata('user_type_fr') == 'professional'){ ?>	
												<div class="form-group">
													<div class=" in-row">
														<label class="control-label">3<sup>rdSubmitted Proposals</sup> party Contractor Approval</label>
													</div>
													<div class="checkboxes col-md-12 float-left in-row margin-bottom-20">
														<input id="checkipc1" type="checkbox"  <?php //if($user_information->insyprocontrapp == 'entry'){  echo 'checked="checked"'; } ?> name="avettaname"  value="Avetta" />
														
														<label for="checkipc1">Avetta</label>
														
														<?php 
														if(!empty($user_information->avettaimg_link))
														{
															
														$pic_arr = explode(",", $user_information->avettaimg_link);
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{

														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->avettaimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
													
														<div class="photoUpload">
															<div class="edit-profile-photo" >
																<div class="change-photo-btn margin-top-15">
																	<div class="photoUpload">
																		<span><i class="fa fa-upload"></i> Upload Files</span>
																		<input type="file"  name="avetta_upload[]"  class="upload" id="avetta_upload" multiple="multiple" />
																		<input type="hidden"  name="avettaimg_link"  class="avettaimg_link" value="<?php echo $user_information->avettaimg_link; ?>" />
																	</div>
																</div>
															</div> 
															<div class="avettaimg_linktxt"></div>
														</div>
													</div>
													<div class="checkboxes col-md-12 float-left in-row margin-bottom-20">
														<input id="checkipc2" type="checkbox"  name="isnetworldname"   <?php //if($user_information->isnetworldname == 'ISNetworld'){  echo 'checked="checked"'; } ?> value="ISNetworld" />
														
														<label for="checkipc2">ISNetworld</label>
														<?php 
														if(!empty($user_information->isnetworldimg_link)){
														$pic_arr = explode(",", $user_information->isnetworldimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->isnetworldimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
														<div class="photoUpload">
															<div class="edit-profile-photo" >
																<div class="change-photo-btn margin-top-15">
																	<div class="photoUpload">
																		<span><i class="fa fa-upload"></i> Upload Files</span>
																		
																		<input type="file"  name="isnetworldimg_upload[]" class="upload" id="isnetworldimg_upload" multiple="multiple" />
																		<input type="hidden"  name="isnetworldimg_link"  class="isnetworldimg_link" value="<?php echo $user_information->isnetworldimg_link; ?>" />
																	</div>
																</div>
															</div> 
															<div class="isnetworldimg_linktxt"></div>
														</div>
													</div>
													<div class="checkboxes col-md-12 in-row margin-bottom-20">
														<input id="checkipc3" type="checkbox"  name="brownname" <?php // if($user_information->brownname == 'Brown'){  echo 'checked="checked"'; } ?> value="Brown" />
														<label for="checkipc3">Brown</label>
														
														<?php 
														if(!empty($user_information->brownimg_link)){
														$pic_arr = explode(",", $user_information->brownimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->brownimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
														<div class="photoUpload">
															<div class="edit-profile-photo" >
																<div class="change-photo-btn margin-top-15">
																	
																	<div class="photoUpload">        
																		<span><i class="fa fa-upload"></i> Upload Files</span>
																		<input type="file"  name="brownimg_upload[]"  class="upload" id="brownimg_upload" multiple="multiple" />
																		<input type="hidden"  name="brownimg_link"  class="brownimg_link" value="<?php echo $user_information->brownimg_link; ?>" />
																	</div>
																</div>
															</div> 
															<div class="brownimg_linktxt"></div>
														</div>
													</div>
													<div class="col-md-12 field_wrapper checkboxes in-row margin-bottom-20">			
														<div class="add_remov">
														</div>
													</div>
												</div>
										<?php } ?>
									 </div>  
											 	<div class="col-md-6">
																					<?php if($this->session->userdata('user_type_fr') == 'professional'){ ?>	
			<div class="form-group">
													<label class="control-label">Proof of liability insurance</label>
													<input type="text"  class="form-control" name="insurance" id="insurance" value="<?php echo $user_information->insurance; ?>"/> 
													<?php 
														if(!empty($user_information->poorliabaimg_uploadimg_link)){
														$pic_arr = explode(",", $user_information->poorliabaimg_uploadimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->poorliabaimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
													
													<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15">
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="poorliabaimg_upload[]"  class="upload" id="poorliabaimg_upload" multiple="multiple" />
																	<input type="hidden"  name="poorliabaimg_uploadimg_link"  class="poorliabaimg_uploadimg_link" value="<?php echo $user_information->poorliabaimg_uploadimg_link; ?>" />
																</div>
															</div>
														</div> 
														<div class="poorliabaimg_linktxt"></div>
													</div>
												</div>
											<?php } ?>
												<div class="form-group">
													<label class="control-label">Industries you can serve</label>
													<input type="text"  class="form-control" name="industries" id="industries" value="<?php echo $user_information->industries; ?>"/> 
													
													<?php 
														if(!empty($user_information->industriesimg_uploadimg_link)){
														$pic_arr = explode(",", $user_information->industriesimg_uploadimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->industriesimg_uploadimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
													
													<div class="photoUpload">
														<div class="edit-profile-photo" >
															<div class="change-photo-btn margin-top-15"> 
																<div class="photoUpload">
																	<span><i class="fa fa-upload"></i> Upload Files</span>
																	<input type="file"  name="industriesimg_upload[]"  class="upload" id="industriesimg_upload" multiple="multiple" />
																	<input type="hidden"  name="industriesimg_uploadimg_link"  class="industriesimg_uploadimg_link" value="<?php echo $user_information->industriesimg_uploadimg_link; ?>" />
																</div>
															</div>
														</div> 
														<div class="industriesimg_linktxt"></div>
													</div>
												</div>
											
												<div class="form-group">
													<label class="control-label">Are you willing to travel?</label>
													<div>
														<label class="col-md-3"><input type="radio" <?php if($user_information->travel == 'Yes'){ echo 'checked="checked"'; } ?> class="form-control" name="travel" id="travel" value="Yes"/> Yes</label>
														<label class="col-md-3"><input type="radio" <?php if($user_information->travel == 'No'){ echo 'checked="checked"'; } ?> class="form-control" name="travel" id="travel" value="No"/> No</label>
													</div>
												</div> <div class="clear"></div>
												<div class="form-group">
													<label class="control-label">Upload Pictures,prints,drawings,proposals,other</label>
													<input type="text"  class="form-control" name="uploadpripicdraw" id="uploadpripicdraw" value="<?php echo $user_information->uploadpripicdraw; ?>"/> 
													
														<?php 
														if(!empty($user_information->uploadpripicdrawimg_link)){
														$pic_arr = explode(",", $user_information->uploadpripicdrawimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->uploadpripicdrawimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
													
													
														<div class="photoUpload">
													<div class="edit-profile-photo" >
														<div class="change-photo-btn margin-top-15">
															<div class="photoUpload">
																<span><i class="fa fa-upload"></i> Upload Files</span>
																<input type="file"  name="uploadpripicdrawimg_upload[]"  class="upload" id="uploadpripicdrawimg_upload" multiple="multiple" />
																<input type="hidden"  name="uploadpripicdrawimg_link"  class="uploadpripicdrawimg_link" value="<?php echo $user_information->uploadpripicdrawimg_link; ?>" />
															</div> 
														</div>
													</div> 
													<div class="uploadpripicdrawimg_linktxt"></div>
												</div>
										
												</div>
												<div class="col-md-12 field_wrapper checkboxes float-left in-row margin-bottom-20">
													<div class="add_remov">
												</div>
											</div> 	  
											<div class="form-group">
												<label class="control-label">Comments</label>
												<textarea type="text"  class="form-control" name="comments" id="comments"><?php echo $user_information->comments; ?></textarea>
												
												<?php 
														if(!empty($user_information->commentimg_link)){
														$pic_arr = explode(",", $user_information->commentimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->commentimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
														
											
												<div class="photoUpload">
													<div class="edit-profile-photo" >
														<div class="change-photo-btn margin-top-15">
															<div class="photoUpload">
																<span><i class="fa fa-upload"></i> Upload Files</span>
																<input type="file"  name="commentimg_upload[]"  class="upload" id="commentimg_upload" multiple="multiple" />
																<input type="hidden"  name="commentimg_link"  class="commentimg_link" value="<?php echo $user_information->commentimg_link; ?>" />
															</div>
														</div>
													</div> 
													<div class="commentimg_linktxt"></div>
												</div>
											</div>   
											<div class="form-group">
												<label class="control-label">Other Files or certifications that will help you chances of being hired</label>
												<input type="text"  class="form-control" name="otherfilecer" id="otherfilecer" value="<?php echo $user_information->otherfilecer; ?>"/> 
												<?php 
														if(!empty($user_information->otherfilecerimg_link)){
														$pic_arr = explode(",", $user_information->otherfilecerimg_link);
														
														if(is_array($pic_arr))
														{
															foreach($pic_arr as $pic)
															{
														
														$info = new SplFileInfo($pic);
														
														$fle_type = $info->getExtension();
														$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
														?>
														<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
														<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" /> </a>
														<?php
														} 
														}
														else
														{ ?>
															<image src="<?php echo $base_url.'uploads/'.$user_information->otherfilecerimg_link; ?>" style="width: 75px;    height: 75px;" />
														<?php }	
														}
														?>
														
												
												<div class="photoUpload">
													<div class="edit-profile-photo" >
														<div class="change-photo-btn margin-top-15">
															<div class="photoUpload">
																<span><i class="fa fa-upload"></i> Upload Files</span>
																<input type="file"  name="otherfilecerimg_upload[]"  class="upload" id="otherfilecerimg_upload" multiple="multiple" />
																<input type="hidden"  name="otherfilecerimg_link"  class="otherfilecerimg_link" value="<?php echo $user_information->otherfilecerimg_link; ?>" />
															</div> 
														</div> 
													</div> 
													<div class="otherfilecerimg_linktxt"></div>
												</div>
											</div>     
										 </div>  
											
											 <div class="col-md-12">
												  <div class="savechage">
													<input type="submit" class="btndesign button margin-top-15" value="Save Changes">   
											</div> </div> 
										</div>
										<div id="settings" class="tab-pane">
											<h4>Job Bids</h4>
						                      <h4 class="headtitbid">Submitted Proposals ( <?php echo  count($get_bidjoballpaid); ?> )</h4>
                         
                                  <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-group">
											<?php foreach($get_bidjoballpaid as $get_postjoballval)	{
								$get_submitpost = $this->bids_model->getpostjobdata($get_postjoballval->proposproj_id);	 ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_submitpost->po_id; ?>"><?php echo $get_submitpost->highleveljobdesc; ?></a></h4><p class=" pull-right sell__section__row__text"><?php echo $get_submitpost->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo $get_submitpost->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date;  
					if( !empty($get_submitpost->posteddate))
					{
						$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
						$lengths = array("60","60","24","7","4.35","12","10");

						$now = time();

						$difference     = $now - strtotime($get_submitpost->posteddate);
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

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_submitpost->joblocation.' ,'.$get_submitpost->city.' ,'.$get_submitpost->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-dot-circle-o"></i><span>Proposal  1</span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                          
             
                   
		</div>
																		
										<div id="events" class="tab-pane">
											<h4>My Job Bids</h4>
											   <h4 class="headtitbid"> Submitted Proposals ( <?php echo  count($get_bidjoballpaid); ?> ) </h4>
										       <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-groupaccons">
												 
												 <?php foreach($get_bidjoballpaid as $get_postjoballval)
			{ 
				
													$get_submitpost = $this->bids_model->getpostjobdata($get_postjoballval->proposproj_id);
	
				
				?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_submitpost->po_id; ?>"><?php echo $get_submitpost->highleveljobdesc; ?></a></h4><p class=" pull-right sell__section__row__text"><?php echo $get_submitpost->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo$get_submitpost->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
					if( !empty($get_submitpost->posteddate))
					{
						$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
						$lengths = array("60","60","24","7","4.35","12","10");

						$now = time();

						$difference     = $now - strtotime($get_submitpost->posteddate);
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

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_submitpost->joblocation.' ,'.$get_submitpost->city.' ,'.$get_submitpost->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           
											   <h4 class="headtitbid">Active Contracts ( <?php echo  count($get_award); ?> )</h4>
						
                           <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-groupaccons">
												 
												 <?php foreach($get_award as $get_postjoballval)
			{ 
							$get_award_post = $this->bids_model->getpostjobdata($get_postjoballval->proposproj_id);

				
				?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_award_post->po_id; ?>" ><?php echo $get_award_post->highleveljobdesc; ?></a></h4><p class=" pull-right sell__section__row__text"><?php echo $get_award_post->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo$get_award_post->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
					if( !empty($get_award_post->posteddate))
					{
						$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
						$lengths = array("60","60","24","7","4.35","12","10");

						$now = time();

						$difference     = $now - strtotime($get_award_post->posteddate);
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

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_award_post->joblocation.' ,'.$get_award_post->city.' ,'.$get_award_post->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-dot-circle-o"></i><span>Proposal  1</span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           
                                
											   <h4 class="headtitbid">Completed Contracts ( <?php echo  count($get_completed); ?> )</h4>
											     
                           
                                      <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-groupaccons">
												 
												 <?php foreach($get_completed as $get_postjoballval)
			{ 
											$get_completed_post = $this->bids_model->getpostjobdata($get_postjoballval->proposproj_id);

				?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_completed_post->po_id; ?>" ><?php echo $get_completed_post->highleveljobdesc; ?></a></h4><p class=" pull-right sell__section__row__text"><?php echo $get_completed_post->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo$get_completed_post->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
					if( !empty($get_completed_post->posteddate))
					{
						$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
						$lengths = array("60","60","24","7","4.35","12","10");

						$now = time();

						$difference     = $now - strtotime($get_completed_post->posteddate);
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

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_completed_post->joblocation.' ,'.$get_completed_post->city.' ,'.$get_completed_post->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-dot-circle-o"></i><span>Proposal  1</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span>  <span class="headtitbid">Submitted Proposals ( 2 )</span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form></div></div></section></li>
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
 
				<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
   
  
  <!-- Main content -->
  
  <section class="content">
     <div class="row">
            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group">
                     <?php
						$obj=&get_instance();
						$obj->load->model('UserModel');
						$profile_url = $obj->UserModel->PictureUrl();
						$user=$obj->UserModel->GetUserData();
 					?>
                    	
                        <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                        <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                    	
                    	<input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li class="selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Vendor's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
<!-- Modal -->					</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>

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

   <style>
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {

background-color: #ED7D31;
    color: white;
    padding: 6px 0px;
    border: none;
    /* cursor: pointer; */
    opacity: 0.8;
    position: fixed;
    bottom: 20px;
    right: 27px;
    width: 50px;
    border-radius: 53%;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 999;
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


<button class="open-button" onclick="openForm()"><img width="40" height="40" src="<?php echo $base_url; ?>assets/img/chaticon.png"></button>

<div class="chat-popup" id="myForm">
	<style class="cp-pen-styles">
#frame {
  width: 100%;
  min-width: 360px;
  max-width: 1000px;
  height: 62vh;
  min-height: 300px;
  max-height: 720px;
  background: #E6EAEA;
}
#frame .content {
    margin-top: 0;
}
@media screen and (max-width: 360px) {
  #frame {
    width: 100%;
    height: 100vh;
  }
}
#frame #sidepanel {
  float: left;
  min-width: 280px;
  max-width: 340px;
  width: 40%;
  height: 100%;
  background: #2c3e50;
  color: #f5f5f5;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel {
    width: 58px;
    min-width: 58px;
  }
}
#frame #sidepanel #profile {
  width: 80%;
  margin: 25px auto;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile {
    width: 100%;
    margin: 0 auto;
    padding: 5px 0 0 0;
    background: #32465a;
  }
}
#frame #sidepanel #profile.expanded .wrap {
  height: 210px;
  line-height: initial;
}
#frame #sidepanel #profile.expanded .wrap p {
  margin-top: 20px;
}
#frame #sidepanel #profile.expanded .wrap i.expand-button {
  -moz-transform: scaleY(-1);
  -o-transform: scaleY(-1);
  -webkit-transform: scaleY(-1);
  transform: scaleY(-1);
  filter: FlipH;
  -ms-filter: "FlipH";
}
#frame #sidepanel #profile .wrap {
  height: 60px;
  line-height: 60px;
  overflow: hidden;
  -moz-transition: 0.3s height ease;
  -o-transition: 0.3s height ease;
  -webkit-transition: 0.3s height ease;
  transition: 0.3s height ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap {
    height: 55px;
  }
}
#frame #sidepanel #profile .wrap img {
  width: 50px;
  border-radius: 50%;
  padding: 3px;
  border: 2px solid #e74c3c;
  height: auto;
  float: left;
  cursor: pointer;
  -moz-transition: 0.3s border ease;
  -o-transition: 0.3s border ease;
  -webkit-transition: 0.3s border ease;
  transition: 0.3s border ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap img {
    width: 40px;
    margin-left: 4px;
  }
}
#frame #sidepanel #profile .wrap img.online {
  border: 2px solid #2ecc71;
}
#frame #sidepanel #profile .wrap img.away {
  border: 2px solid #f1c40f;
}
#frame #sidepanel #profile .wrap img.busy {
  border: 2px solid #e74c3c;
}
#frame #sidepanel #profile .wrap img.offline {
  border: 2px solid #95a5a6;
}
#frame #sidepanel #profile .wrap p {
  float: left;
  margin-left: 15px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap i.expand-button {
  float: right;
  margin-top: 23px;
  font-size: 0.8em;
  cursor: pointer;
  color: #435f7a;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap i.expand-button {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  width: 150px;
  margin: 70px 0 0 0;
  border-radius: 6px;
  z-index: 99;
  line-height: initial;
  background: #435f7a;
  -moz-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  -webkit-transition: 0.3s all ease;
  transition: 0.3s all ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options {
    width: 58px;
    margin-top: 57px;
  }
}
#frame #sidepanel #profile .wrap #status-options.active {
  opacity: 1;
  visibility: visible;
  margin: 75px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options.active {
    margin-top: 62px;
  }
}
#frame #sidepanel #profile .wrap #status-options:before {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 8px solid #435f7a;
  margin: -8px 0 0 24px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options:before {
    margin-left: 23px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul {
  overflow: hidden;
  border-radius: 6px;
}
#frame #sidepanel #profile .wrap #status-options ul li {
  padding: 15px 0 30px 18px;
  display: block;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li {
    padding: 15px 0 35px 22px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li:hover {
  background: #496886;
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
  position: absolute;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
    width: 14px;
    height: 14px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
  content: '';
  position: absolute;
  width: 14px;
  height: 14px;
  margin: -3px 0 0 -3px;
  background: transparent;
  border-radius: 50%;
  z-index: 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
    height: 18px;
    width: 18px;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li p {
  padding-left: 12px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap #status-options ul li p {
    display: none;
  }
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
  background: #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
  border: 1px solid #2ecc71;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
  background: #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
  border: 1px solid #f1c40f;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
  background: #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
  border: 1px solid #e74c3c;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
  background: #95a5a6;
}
#frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
  border: 1px solid #95a5a6;
}
#frame #sidepanel #profile .wrap #expanded {
  padding: 100px 0 0 0;
  display: block;
  line-height: initial !important;
}
#frame #sidepanel #profile .wrap #expanded label {
  float: left;
  clear: both;
  margin: 0 8px 5px 0;
  padding: 5px 0;
}
#frame #sidepanel #profile .wrap #expanded input {
  border: none;
  margin-bottom: 6px;
  background: #32465a;
  border-radius: 3px;
  color: #f5f5f5;
  padding: 7px;
  width: calc(100% - 43px);
}
#frame #sidepanel #profile .wrap #expanded input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search {
  border-top: 1px solid #32465a;
  border-bottom: 1px solid #32465a;
  font-weight: 300;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #search {
    display: none;
  }
}
#frame #sidepanel #search label {
  position: absolute;
  margin: 10px 0 0 20px;
}
#frame #sidepanel #search input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  padding: 10px 0 10px 46px;
  width: calc(100% - 25px);
  border: none;
  background: #32465a;
  color: #f5f5f5;
}
#frame #sidepanel #search input:focus {
  outline: none;
  background: #435f7a;
}
#frame #sidepanel #search input::-webkit-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input::-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-ms-input-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #search input:-moz-placeholder {
  color: #f5f5f5;
}
#frame #sidepanel #contacts {
  height: calc(100% - 177px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts {
    height: calc(100% - 149px);
    overflow-y: scroll;
    overflow-x: hidden;
  }
  #frame #sidepanel #contacts::-webkit-scrollbar {
    display: none;
  }
}
#frame #sidepanel #contacts.expanded {
  height: calc(100% - 334px);
}
#frame #sidepanel #contacts::-webkit-scrollbar {
  width: 8px;
  background: #2c3e50;
}
#frame #sidepanel #contacts::-webkit-scrollbar-thumb {
  background-color: #243140;
}
#frame #sidepanel #contacts ul li.contact {
  position: relative;
  padding: 10px 0 15px 0;
  font-size: 0.9em;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact {
    padding: 6px 0 46px 8px;
  }
}
#frame #sidepanel #contacts ul li.contact:hover {
  background: #32465a;
}
#frame #sidepanel #contacts ul li.contact.active {
  background: #32465a;
  border-right: 5px solid #435f7a;
}
#frame #sidepanel #contacts ul li.contact.active span.contact-status {
  border: 2px solid #32465a !important;
}
#frame #sidepanel #contacts ul li.contact .wrap {
  width: 88%;
  margin: 0 auto;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap {
    width: 100%;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap span {
  position: absolute;
  left: 0;
  margin: -2px 0 0 -2px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  border: 2px solid #2c3e50;
  background: #95a5a6;
}
#frame #sidepanel #contacts ul li.contact .wrap span.online {
  background: #2ecc71;
}
#frame #sidepanel #contacts ul li.contact .wrap span.away {
  background: #f1c40f;
}
#frame #sidepanel #contacts ul li.contact .wrap span.busy {
  background: #e74c3c;
}
#frame #sidepanel #contacts ul li.contact .wrap img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin-right: 10px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap img {
    margin-right: 0px;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta {
  padding: 5px 0 0 0;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact .wrap .meta {
    display: none;
  }
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .name {
  font-weight: 600;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
  margin: 5px 0 0 0;
  padding: 0 0 1px;
  font-weight: 400;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -moz-transition: 1s all ease;
  -o-transition: 1s all ease;
  -webkit-transition: 1s all ease;
  transition: 1s all ease;
}
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
  position: initial;
  border-radius: initial;
  background: none;
  border: none;
  padding: 0 2px 0 0;
  margin: 0 0 0 1px;
  opacity: .5;
}
#frame #sidepanel #bottom-bar {
  position: absolute;
  width: 100%;
  bottom: 0;
}
#frame #sidepanel #bottom-bar button {
  float: left;
  border: none;
  width: 50%;
  padding: 10px 0;
  background: #32465a;
  color: #f5f5f5;
  cursor: pointer;
  font-size: 0.85em;
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button {
    float: none;
    width: 100%;
    padding: 15px 0;
  }
}
#frame #sidepanel #bottom-bar button:focus {
  outline: none;
}
#frame #sidepanel #bottom-bar button:nth-child(1) {
  border-right: 1px solid #2c3e50;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button:nth-child(1) {
    border-right: none;
    border-bottom: 1px solid #2c3e50;
  }
}
#frame #sidepanel #bottom-bar button:hover {
  background: #435f7a;
}
#frame #sidepanel #bottom-bar button i {
  margin-right: 3px;
  font-size: 1em;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button i {
    font-size: 1.3em;
  }
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #bottom-bar button span {
    display: none;
  }
}
#frame .content {
  float: right;
  width: 60%;
  height: 100%;
  overflow: hidden;
      border: 3px solid #ED7D31;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame .content {
    width: calc(100% - 58px);
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
  #frame .content {
    width: calc(100% - 340px);
  }
}
#frame .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
#frame .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
#frame .content .contact-profile p {
  float: left;
}
#frame .content .contact-profile .social-media {
  float: right;
}
#frame .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
#frame .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
#frame .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
#frame .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame .content .messages {
    max-height: calc(100% - 105px);
  }
}
#frame .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
#frame .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
#frame .content .messages ul li {
  display: inline-block;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
#frame .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
#frame .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
#frame .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
  color:#000;
}
#frame .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 300px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
#frame .content .message-input .wrap {
	position: relative;
    display: table;
    background: #2c3e50;
    width: 100%;
    }
#frame .content .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
    position: absolute;
    right: 60px;
    z-index: 4;
    margin-top: 20px;
    font-size: 1.1em;
    color: #f5f5f5;
    opacity: .5;
    cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}

header.top-barhead
{
    width: 100%;
    z-index: 99;
    height: 31px;
    background: #ED7D31;
	
	}
	.msgtitle
	{
    padding: 12px;
    font-size: 20px;
    color: #f5f5f5;
    	}
    	.bg-btncolor{
			    background: #ED7D31;
			}
</style>
<!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame"><header class="top-barhead">
    
    <div class="pull-left">
      <span class="icon typicons-message"></span>
      <span class="msgtitle">Message</span>
    </div>
    
    <div class="popup-head-right pull-right">
						<div class="btn-group">
    								  <button class="bg-btncolor chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-cog"></i> </button>
									  <ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#">Media</a></li>
										<li><a href="#">Block</a></li>
										<li><a href="#">Clear Chat</a></li>
										<li><a href="#">Email Chat</a></li>
									  </ul>
						</div>

						<button data-widget="remove" id="removeClass"  onclick="closeForm()" class="bg-btncolor cancel chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                      </div>
    
    
  </header>
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
<!--
				<img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
-->
				<?php if($user_information->profile_image != ""){ ?>
												<img id="profile-img"  src="<?php echo $base_url.'uploads/'.$user_information->profile_image; ?>">
											<?php } else { ?>
												<img id="profile-img"  src="<?php echo $base_url?>uploads/default17.jpg">
											<?php } ?>
				<p><?php echo $user_information->first_name; ?></p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search contacts..." />
		</div>
		
		<div id="contacts">
		
					
			<ul>		<?php foreach($get_bidjoballpaid as $get_postjoballval)	{
				
												//$get_submitpost = $this->bids_model->getcompanyuser($get_postjoballval->comp_id);	 

								$get_submitpost = $this->bids_model->getpostjobdata($get_postjoballval->proposproj_id);	 ?>
		
			 
			<li class="contact" data-comid="<?php echo $get_postjoballval->comp_id; ?>" data-pruserid="<?php echo $get_postjoballval->proposuser_id; ?>" data-projid="<?php echo $get_postjoballval->proposproj_id; ?>">
					<div class="wrap">
						<span class="contact-status"></span>
						<img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
						<div class="meta">
							<p class="name"><?php echo $get_submitpost->highleveljobdesc; ?></p>
							<p class="preview"><?php echo $get_submitpost->job_description; ?></p>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile">
			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
			<p>Harvey Specter</p>
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				 <i class="fa fa-instagram" aria-hidden="true"></i>
			</div>
		</div>
		<div class="messages">
			<ul>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>twst?!</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>dfdsfdfsf.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>dgdfhfghfgh.</p>
				</li>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>.jhgjj?</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>kggh</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>etesdsfdf?</p>
				</li>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>ghfghfffffffff.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>jghjjjjjjjjjjjjgh.</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />

			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>


<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

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

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>
<!--
  <form action="/action_page.php" class="form-container">
    <h2>Chat</h2>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
-->
</div>

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
                <button type="submit" name="send" value="1" class="btn"><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
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

</style>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<script type="application/javascript">
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
	},
	rules: {
	first_name: {
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
	url : '<?php echo $base_url?>login_controller/update',
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

	$('#uploaded_images').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
	$('#img_link').val(data);
	$('#files').val('');
	}
	})

	});
 
	$('#avetta_upload').change(function(){

	var files = $('#avetta_upload')[0].files;
		var filename = jQuery(".avettaimg_link").val();

	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.avettaimg_linktxt').append(objdata.length+' Item added');
	$('.avettaimg_link').val(f_n);

	}
	})
	}else
	{
	$('.avettaimg_linktxt').empty();
	$('.avettaimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.avettaimg_linktxt').empty();}, 3000);

	}
	});
	$('#isnetworldimg_upload').change(function(){

	var files = $('#isnetworldimg_upload')[0].files;
	var filename = jQuery(".isnetworldimg_link").val();
	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	
	$('.isnetworldimg_linktxt').append(objdata.length+' Item added');
	$('.isnetworldimg_link').val(f_n);

	}
	})
	}else
	{
	$('.isnetworldimg_linktxt').empty();
	$('.isnetworldimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.isnetworldimg_linktxt').empty();}, 3000);

	}
	});

	$('#brownimg_upload').change(function(){

	var files = $('#brownimg_upload')[0].files;3
	var filename = jQuery(".brownimg_link").val();

	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.brownimg_linktxt').append(objdata.length+' Item added');
	$('.brownimg_link').val(f_n);

	}
	})
	}else
	{
	$('.brownimg_linktxt').empty();
	$('.brownimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.brownimg_linktxt').empty();}, 3000);

	}
	});
	$('#commentimg_upload').change(function(){

	var files = $('#commentimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".commentimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.commentimg_linktxt').append(objdata.length+' Item added');
		$('.commentimg_link').val(f_n);


	}
	})
	}else
	{
	$('.commentimg_linktxt').empty();
	$('.commentimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.commentimg_linktxt').empty();}, 3000);

	}
	});
	$('#industriesimg_upload').change(function(){

	var files = $('#industriesimg_upload')[0].files;
		var filename = jQuery(".industriesimg_uploadimg_link").val();

	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.industriesimg_linktxt').append(objdata.length+' Item added');
		$('.industriesimg_uploadimg_link').val(f_n);


	}
	})
	}else
	{
	$('.industriesimg_linktxt').empty();
	$('.industriesimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.industriesimg_linktxt').empty();}, 3000);

	}
	});
	$('#uploadpripicdrawimg_upload').change(function(){

	var files = $('#uploadpripicdrawimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".uploadpripicdrawimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.uploadpripicdrawimg_linktxt').append(objdata.length+' Item added');
		$('.uploadpripicdrawimg_link').val(f_n);


	}
	})
	}else
	{
	$('.uploadpripicdrawimg_linktxt').empty();
	$('.uploadpripicdrawimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.uploadpripicdrawimg_linktxt').empty();}, 3000);

	}
	});

	$('#othereduimg_upload').change(function(){

	var files = $('#othereduimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".othereduimg_upload_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.othereduimglinktxt').append(objdata.length+' Item added');
		$('.othereduimg_upload_link').val(f_n);

	}
	})
	}else
	{
	$('.othereduimglinktxt').empty();
	$('.othereduimglinktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.othereduimglinktxt').empty();}, 3000);

	}
	});
	$('#certificatesimg_upload').change(function(){

	var files = $('#certificatesimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".certificatesimg_uploadimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	
	$('.certificatesimg_linktxt').append(objdata.length+' Item added');
		$('.certificatesimg_uploadimg_link').val(f_n);
	}
	})
	}else
	{
	$('.certificatesimg_linktxt').empty();
	$('.certificatesimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.certificatesimg_linktxt').empty();}, 3000);

	}
	});
	$('#otherfilecerimg_upload').change(function(){

	var files = $('#otherfilecerimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".otherfilecerimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.otherfilecerimg_linktxt').append(objdata.length+' Item added');
		$('.otherfilecerimg_link').val(f_n);

	}
	})
	}else
	{
	$('.otherfilecerimg_linktxt').empty();
	$('.otherfilecerimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.otherfilecerimg_linktxt').empty();}, 3000);

	}
	});
	$('#resumeimg_upload').change(function(){

	var files = $('#resumeimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".resumeimg_uploadimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
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
	$('.resumeimg_uploadimg_linktxt').append(objdata.length+' Item added');
		$('.resumeimg_uploadimg_link').val(f_n);

	}
	})
	}else
	{
	$('.resumeimg_uploadimg_linktxt').empty();
	$('.resumeimg_uploadimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.resumeimg_uploadimg_linktxt').empty();}, 3000);

	}
	});

	$('#safdocimg_upload').change(function(){

	var files = $('#safdocimg_upload')[0].files;
	var error = '';
	
	var form_data = new FormData();
	for(var count = 0; count<files.length; count++)
	{
	var name = files[count].name;
	var extension = name.split('.').pop().toLowerCase();
	if(jQuery.inArray(extension, ['csv','docx','pdf','doc','zip']) == -1)
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
	url: '<?php echo $base_url?>login_controller/multiuplod',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	beforeSend:function()
	{
	$('#safdocimg_uploaduplimg').html("<label class='text-success'>Uploading...</label>");
	},
	success:function(data)
	{
	var objdata = jQuery.parseJSON(data);
	// $('.emty_cls').empty('');
	//	$('#safdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
	$('.safdocimg_uploadimg_linktxt').empty();
	$('.safdocimg_uploadimg_link').val();
	var objdataimp = objdata.join();
	$('.safdocimg_uploadimg_link').val(objdataimp);
	$.each( objdata, function( key, value ) {
	$('.safdocimg_uploadimg_linktxt').append('<a target="_blank"  href="<?php echo $base_url; ?>uploads/'+value+'"><img style="border: 2px solid #000;margin:5px;width: 70px;padding: 5px; height: 70px;" src="<?php echo $base_url; ?>uploads/document-management-big.png"></a>');

	});
	}
	})
	}else
	{
	$('.safdocimg_uploadimg_linktxt').empty();
	$('.safdocimg_uploadimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.safdocimg_uploadimg_linktxt').empty();}, 3000);

	}
	});
	$('#clgdegreeimg_upload').change(function(){

	var files = $('#clgdegreeimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".clgdegreeimg_uploadimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	success:function(data)
	{
	var objdata = jQuery.parseJSON(data);
	//~ $('.clgdegreeimglinktxt').empty();
	//~ $('.clgdegreeimg_uploadimg_link').val(' ');
	var objdataimp = objdata.join();
	if(filename == ''){
		var f_n  = objdataimp;
	}
	else
	{
		var f_n  = filename+','+objdataimp;

	}
	
	$('.clgdegreeimg_uploadimg_link').val(f_n);
	$('.clgdegreeimglinktxt').append(objdata.length+' Item added');


	// $('.emty_cls').empty('');
	//	$('#safdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
	//~ $('.pripicdocimglinktxt').empty();
	//~ $('.pripicdocimg_upload_link').val(' ');
	//~ var objdataimp = objdata.join();
	//~ $('.pripicdocimg_upload_link').val(objdataimp);
	//~ $.each( objdata, function( key, value ) {
	//~ $('.pripicdocimglinktxt').append('<a target="_blank"  href="<?php echo $base_url; ?>uploads/'+value+'"><img style="border: 2px solid #000;margin: 5px; width: 70px; padding: 5px;height: 70px;" src="<?php echo $base_url; ?>uploads/'+value+'"></a>');

	//~ });
	}
	})
	}else
	{
	$('.clgdegreeimglinktxt').empty();
	$('.clgdegreeimglinktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.clgdegreeimglinktxt').empty();}, 3000);

	}
	});
	$('#educationimg_upload').change(function(){

	var files = $('#educationimg_upload')[0].files;
	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	success:function(data)
	{
	var objdata = jQuery.parseJSON(data);
	$('.educationimglinktxt').empty();
	$('.educationimg_upload_link').val(' ');
	var objdataimp = objdata.join();
	$('.clgdegreeimg_uploadimg_link').val(objdataimp);
	$('.educationimglinktxt').append(objdata.length+' Item added');

	}
	})
	}else
	{
	$('.educationimglinktxt').empty();
	$('.educationimglinktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.educationimglinktxt').empty();}, 3000);

	}
	});
	$('#poorliabaimg_upload').change(function(){
	var files = $('#poorliabaimg_upload')[0].files;
	var error = '';
	var filename = jQuery(".poorliabaimg_uploadimg_link").val();

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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	success:function(data)
	{     

	var objdata = jQuery.parseJSON(data);
	//~ $('.poorliabaimg_linktxt').empty();
	//~ $('.poorliabaimg_uploadimg_link').val(' ');
	var objdataimp = objdata.join();
	if(filename == ''){
		var f_n  = objdataimp;
	}
	else
	{
		var f_n  = filename+','+objdataimp;

	}
	$('.poorliabaimg_uploadimg_link').val(f_n);
	$('.poorliabaimg_linktxt').append(objdata.length+' Item added');

	}
	})
	}else
	{
	$('.poorliabaimg_linktxt').empty();
	$('.poorliabaimg_linktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.poorliabaimg_linktxt').empty();}, 3000);

	}
	});
	$('#pripicdocimg_upload').change(function(){

	var files = $('#pripicdocimg_upload')[0].files;
	var error = '';
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
	url: '<?php echo $base_url?>login_controller/multiuplodall',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	beforeSend:function()
	{
	$('#safdocimg_uploaduplimg').html("<label class='text-success'>Uploading...</label>");
	},
	success:function(data)
	{
	var objdata = jQuery.parseJSON(data);

	$('.pripicdocimglinktxt').empty();
	$('.pripicdocimg_upload_link').val(' ');
	var objdataimp = objdata.join();
	$('.pripicdocimg_upload_link').val(objdataimp);
	$.each( objdata, function( key, value ) {
	$('.pripicdocimglinktxt').append('<a target="_blank"  href="<?php echo $base_url; ?>uploads/'+value+'"><img style="border: 2px solid #000;margin: 5px; width: 70px; padding: 5px;height: 70px;" src="<?php echo $base_url; ?>uploads/'+value+'"></a>');

	});
	}
	})
	}else
	{
	$('.pripicdocimglinktxt').empty();
	$('.pripicdocimglinktxt').append('<div class="alert-info">Not support this format.Only support documents.</div>');
	setTimeout(function(){   $('.pripicdocimglinktxt').empty();}, 3000);

	}
	});

	$('#pripicdocimg_upload').change(function(){
	var file_data = $('#pripicdocimg_upload').prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);
	$.ajax({
	url: '<?php echo $base_url?>login_controller/multiuplod',
	method:"POST",
	data:form_data,
	contentType:false,
	cache:false,
	processData:false,
	beforeSend:function()
	{
	$('#pripicdocimg_uploaduploaded_images').html("<label class='text-success'>Uploading...</label>");
	},
	success:function(data)
	{
	$('#pripicdocimg_uploaduplimg').html('<img src="<?php echo $base_url?>uploads/'+data+'">');
	$('#pripicdocimg_uplimglink').val(data);
	$('#pripicdocimg_uplfiles').val('');
	}
	})

	});

	$(document).ready(function(){
	var maxFieldcertificates = 10;
	var addButtoncertificates = $('.add_buttoncertificates');
	var wrappercertificates = $('.field_wrappercertificates'); 
	var x = 1; 
	$(addButtoncertificates).click(function(){
	var lengvalcertificates = $('input[name="induoffser[]"]').length;
	var inclengvalcertificates = lengvalcertificates+1;
	var fieldHTMLcertificates = '<div class="add_removcertificates"> <input type="text"  class="form-control" name="certificates" id="certificates" value=""/><div class="photoUpload"><div class="edit-profile-photo" ><div class="change-photo-btn margin-top-15"><div class="photoUpload"><span><i class="fa fa-upload"></i> Upload Files</span><input type="file"  name="certificatesimg_upload[]"  class="upload" id="certificatesimg_upload" multiple="multiple" /><input type="hidden"  name="certificatesimg_uploadimg_link"  class="certificatesimg_uploadimg_link" value="" /></div></div></div><div class="safdocimg_uploadimg_linktxt"></div></div><a href="javascript:void(0);" class="remove_button" title="Remove field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></div>'; 

	if(x < maxFieldcertificates){ 
	x++;
	$(wrappercertificates).append(fieldHTMLcertificates); 
	}
	});
	$(wrappercertificates).on('click', '.remove_button', function(e){ 
	e.preventDefault();
	$(this).parent('div.add_removcertificates').remove(); 
	x--;
	});



	var maxFieldothereducation = 10; 
	var addButtonothereducation = $('.add_buttonothereducation'); 
	var wrapperothereducation= $('.field_wrapperothereducation'); 
	
	var x = 1; 
	$(addButtonothereducation).click(function(){
	var lengvalothereducation= $('input[name="induoffser[]"]').length;
	var inclengvalothereducation = lengvalothereducation+1;
	var fieldHTMLothereducation = '<div class="add_removcertificates"> <input type="text"  class="form-control" name="education[]" id="education" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></div>'; 


	if(x < maxFieldothereducation){ 
	x++; 
	$(wrapperothereducation).append(fieldHTMLothereducation); 
	}
	});
	$(wrapperothereducation).on('click', '.remove_button', function(e){
	e.preventDefault();
	$(this).parent('div.add_removothereducation').remove(); 
	x--; 
	});
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
<script type="application/javascript">
	$('li.contact').click(function(){
    $('li.contact').removeClass("active");
    $(this).addClass("active"); 
   var comid =  $(this).attr("data-comid"); 
   var pruserid =  $(this).attr("data-pruserid");
    var projid = $(this).attr("data-projid");
    
    alert(comid);
    alert(pruserid);
    alert(projid);
    
    
});
$(".message-input input").keydown(function(e){

    if (e.keyCode == 13 && !e.shiftKey)
    {
        e.preventDefault();
    }
});
</script>
