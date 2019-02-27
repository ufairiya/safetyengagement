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
													<label class="control-label">Cell phone</label>
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
														<label class="control-label">3<sup>rd</sup> party Contractor Approval</label>
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
						                      <h4 class="headtitbid">Submitted Proposals ( 2 )</h4>
                                    <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-4 ">
											<p>Sent</p>
										</div>
										<div class="col-md-8 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                           
                   
								
                                 <div id="subpro" class="submitpro active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
											             <ul class="list-group">
												 <?php	
	foreach ($get_bidjoballpaid as $get_postjoballval) { ?>

		<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
			<a href="#" class="listing full-time">
				<div class="recent-job-list-home">
				<div class="job-list-location col-md-4 ">
					<h6>
						<i class="fa fa-calendar"></i>
						<?php echo $get_postjoballval->start_date; 
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

						echo '<br> '.$difference.' '.$periods[$j].' ago';
					}

					?>
					</h6>
					</div>
					<div class="col-md-8 job-list-desc">
						<h6>
					<?php echo $get_postjoballval->companyname; ?></h6>
					<p>
					<?php echo $get_postjoballval->job_description; ?></p>
					</div><div class="clearfix"></div>
				</div>
			</a>
		</li>

	<?php } ?>
                                             </ul>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
										</div>
																		
										<div id="events" class="tab-pane">
											<h4>My Job Bids</h4>
											   <h4 class="headtitbid"> Submitted Proposals</h4>
											        <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-4 ">
											<p>Sent</p>
										</div>
										<div class="col-md-8 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
									
										<div class="clearfix"></div>
								    </a>
                                 </li>
                           
                                 <div id="bidjobs" class="submitpro active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
                                              <ul class="list-group">
												 <?php	
	foreach ($get_bidjoballpaid as $get_postjoballval) { ?>

		<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
			<a href="#" class="listing full-time">
				<div class="recent-job-list-home">
				<div class="job-list-location col-md-4 ">
					<h6>
						<i class="fa fa-calendar"></i>
						<?php echo $get_postjoballval->start_date; 
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

						echo '<br> '.$difference.' '.$periods[$j].' ago';
					}

					?>
					</h6>
					</div>
					<div class="col-md-8 job-list-desc">
						<h6>
					<?php echo $get_postjoballval->companyname; ?></h6>
					<p>
					<?php echo $get_postjoballval->job_description; ?></p>
					</div><div class="clearfix"></div>
				</div>
			</a>
		</li>

	<?php } ?>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                
											   <h4 class="headtitbid">Active Contracts ( 2 )</h4>
						
                           
                                 <div id="bidjobs" class="submitpro active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
                                             <ul class="list-group">
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                
											   <h4 class="headtitbid">Completed Contracts ( 2 )</h4>
											     
                           
                                 <div id="bidjobs" class="submitpro active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="padding-right">
                                          <div class="listings-container">
                                             <ul class="list-group">
                                             </ul>
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
			</div>
		</form>
	</div>
	<?php } ?>
</div>
<style>
	
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

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  </script>
