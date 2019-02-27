<?php 

$get_job  = $this->postjob_model->get_job($poid);
$compl_list = $this->postjob_model->proct_compl_list($poid);
$view_job  = $this->postjob_model->company_info($get_job->company_userid);
$user_job  = $this->postjob_model->company_info($compl_list->proposuser_id);
if(!empty($get_job))
		{
		$city = $get_job->city.','.$get_job->zipcode.','.$get_job->state;
		$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&address="'.urlencode($city).'&sensor=false');
		$latitude = json_decode($geocode)->results[0]->geometry->location->lat;
		$longitude = json_decode($geocode)->results[0]->geometry->location->lng;
		}
		else
		{
			redirect('bids/find_job');
		}
?>  

	<link href='<?= base_url() ?>assets/css/star-rating.min.css' type='text/css' rel='stylesheet'>
	<script src='<?= base_url() ?>assets/js/star-rating.min.js' type='text/javascript'></script>
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 column jobdetailslt">
					<div class="job-single-sec">
						<div class="job-single-head">
							<?php $pro_img = $view_job->profile_image != "" ? $view_job->profile_image : 'no.png'  ?>
							<div class="job-thumb"> <img src="<?php echo $base_url.'uploads/'.$pro_img; ?>" alt=""> </div>
							<div class="job-head-info">
								<h4><?php echo $view_job->companyname; ?> </h4>
								<span><?php echo $view_job->address.' '.$view_job->city.' '.$view_job->state.' '.$view_job->zip_code; ?></span>
								<p><i class="la la-unlink"></i> <?php echo $view_job->companyname; ?></p>
<!--
								<p><i class="la la-phone"></i> <?php echo $view_job->companypercellphone; ?></p>
-->
<!--
								<p><i class="la la-envelope-o"></i> <?php echo $view_job->companyperemail; ?></p>
-->
							<input type="hidden"  class="comid" name="comid"  value="<?php echo $view_job->id_user_master; ?>" />
								  <input type="hidden"  class="poid" name="poid"  value="<?php echo $poid; ?>" />
							</div>
						</div><!-- Job Head -->
						<div class="job-details">
							<?php if($get_job->job_title){ ?>
							<h3>Job Title</h3>
							<p><?php echo $get_job->job_title ?></p>
							<?php } if($get_job->job_description){ ?>
							<h3>Job Description</h3>
							<p><?php echo $get_job->job_description ?></p>
							<?php } if(!empty($get_job->detailed_pic)){
								$pic_arr = explode(",", $get_job->detailed_pic);
								if(is_array($pic_arr))
								{
									foreach($pic_arr as $pic)
									{
									$info = new SplFileInfo($pic);
									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
									?>
									<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
									<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
									</a>
									<?php
									} 
								}
								else
								{ ?>
									<image src="<?php echo $base_url.'uploads/'.$get_job->detailed_pic; ?>" style="width: 75px;    height: 75px;" />
								<?php 
								}	
							} if($get_job->equipment){ ?>
							<h3>Special Equipment</h3>
							
				
							<p><?php echo $get_job->equipment ?></p>
							<?php  }if(!empty($get_job->equipment_pic))
							{
								$pic_arr = explode(",", $get_job->equipment_pic);
								if(is_array($pic_arr))
								{
								foreach($pic_arr as $pic)
								{
									$info = new SplFileInfo($pic);
									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' ))); ?>
									<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
									<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
									</a>
									<?php
									} 
								}
								else
								{ ?>
								<image src="<?php echo $base_url.'uploads/'.$get_job->equipment_pic; ?>" style="width: 75px;    height: 75px;" />
								<?php }	
								} if($get_job->finalrep){ ?>
								<h3>Final Report</h3>
								<p><?php echo $get_job->finalrep ?></p>
								<?php  }
								if(!empty($get_job->finalrep_pic))
								{
									$pic_arr = explode(",", $get_job->finalrep_pic);
									if(is_array($pic_arr))
									{
									foreach($pic_arr as $pic)
									{
									$info = new SplFileInfo($pic);
									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
									?>
									<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
									<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
									</a>
									<?php
									} 
									}
									else
									{ ?>
									<image src="<?php echo $base_url.'uploads/'.$get_job->finalrep_pic; ?>" style="width: 75px;    height: 75px;" />
									<?php }	
								} if($get_job->project){ ?>
								<h3>Project Files</h3>
								<p><?php echo $get_job->project ?></p>
								<?php }
								if(!empty($get_job->project_pic))
								{
									$pic_arr = explode(",", $get_job->project_pic);
									if(is_array($pic_arr))
									{
										foreach($pic_arr as $pic)
										{

										$info = new SplFileInfo($pic);

										$fle_type = $info->getExtension();
										$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
										?>
										<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
										<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
										</a>
										<?php
										} 
									}
									else
									{ ?>
									<image src="<?php echo $base_url.'uploads/'.$get_job->project_pic; ?>" style="width: 75px;    height: 75px;" />
									<?php }	
								} if($get_job->information){ ?>
								<h3>Job Information</h3>
								<p><?php echo $get_job->information ?></p>
								<?php }  ?>
								<h3>Qualifications </h3>
								<p><?php if(!empty($get_job->worktype_desc)) { $worktype_desc = json_decode($get_job->worktype_desc); foreach($worktype_desc as $worktype_descval) { echo $worktype_descval; }} ?></p>
								<?php 
								if(!empty($get_job->job_file))
								{
								$pic_arr = explode(",", $get_job->job_file);
								if(is_array($pic_arr))
								{
									foreach($pic_arr as $pic)
									{
									$info = new SplFileInfo($pic);
									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
									} 
								}
								else
								{ ?>
								<image src="<?php echo $base_url.'uploads/'.$get_job->job_file; ?>" style="width: 75px;    height: 75px;" />
								<?php }	
								} if($get_job->job_description){ ?>
								<h3>Experience Level </h3>
								<p><?php echo $get_job->explevel1; ?></p>
								<?php } if($get_job->thirdpartapprov){ ?>
								<h3>Contractor 3rd Party Approval  </h3>
								<p><?php echo $party_approv = $get_job->thirdpartapprov == 1 ? 'Avetta' : $get_job->thirdpartapprov == 2 ? 'Browz':'ISNetWorld' ; ?></p>
								<?php }
								if(!empty($get_job->certificates_pic))
								{
									$pic_arr = explode(",", $get_job->certificates_pic);
									if(is_array($pic_arr))
									{
										foreach($pic_arr as $pic)
										{
											$info = new SplFileInfo($pic);
											$fle_type = $info->getExtension();
											$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
											?>
											<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
											<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
											</a>
											<?php
										} 
									}
									else
									{ ?>
										<image src="<?php echo $base_url.'uploads/'.$get_job->certificates_pic; ?>" style="width: 75px;    height: 75px;" />
									<?php }	
								}
								if($get_job->insurance){ ?>
									<h3>Liability Insurance </h3>
									<p><?php echo $get_job->insurance; ?></p>
								<?php }
								if(!empty($get_job->insurance_certificate))
								{
									$pic_arr = explode(",", $get_job->insurance_certificate);
									if(is_array($pic_arr))
									{
									foreach($pic_arr as $pic)
									{
									$info = new SplFileInfo($pic);
									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
									?>
									<a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
									<image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
									</a>
									<?php
									} 
									}
									else
									{ ?>
									<image src="<?php echo $base_url.'uploads/'.$get_job->insurance_certificate; ?>" style="width: 75px;    height: 75px;" />
									<?php }	
								} if(!empty($get_job->budget_img))
								{ ?>
									<h3>Budget Files</h3> <?php
									$pic_arr = explode(",", $get_job->budget_img);
									if(is_array($pic_arr))
									{
									foreach($pic_arr as $pic)
									{

									$info = new SplFileInfo($pic);

									$fle_type = $info->getExtension();
									$age_code = ($fle_type == 'jpg' || $fle_type == 'png'|| $fle_type == 'jpeg'  ? $pic : ($fle_type == 'docx' || $fle_type == 'doc' ? 'doc.png' : ($fle_type == 'pdf'? 'pdf.png' : 'no.png' )));
									} 
									}
									else
									{ ?>
									<image src="<?php echo $base_url.'uploads/'.$get_job->budget_img; ?>" style="width: 75px;    height: 75px;" />
									<?php }	
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 column jobdetailsrt">
					<div class="com-overview">
						<h3 class="com_head">Completed</h3>
						<ul>
							<li><h3><i class="fa fa-child"></i></i>Safety Professional</h3><span><?php echo $user_job->first_name.' '.$user_job->last_name; ?></span></li>
							<li><h3><i class="fas fa-calendar-alt"></i>Date</h3><span><?php echo $compl_list->update_on; ?></span></li>
							
						</ul>                        <input type="hidden" id="sfuid" class="sfuid" value="<?php echo $user_job->id_user_master; ?>">

							   <div class="col-lg-12 col-md-12 spacetopbottom" >
                  <div class="control-label ">
                     <div class="col-40"><label class="titlelabel" for="fname" >Rating:</label></div>
                     <div class="col-50">
						 <label class="ratinglabel" for="fname" ><?php 
						 $arrrating = array('comid'=> $this->session->userdata('id_user_master'),'userid'=> $user_job->id_user_master);
                            $get_rating  = $this->postjob_model->get_rating($arrrating);
						 if(!empty($get_rating)){  
								
								$max = 0; $n = count($get_rating); foreach ($get_rating as $rate => $count) { 
												$max = $max+$count->countrating;}   ?>
												<div class="">
													<input type="hidden"  class="getcount" name="getcount"  value="<?php  echo $max / $n; 
														   ?>" />
												</div>
												<?php 
												
											

echo '<span  class="ratingcolor">Rating of (<b>'.$max / $n.' / 5</b>) stars</span><br/>';
echo '<span class="ratingcolor">Total Rating <b>'.count($get_rating).'</b> people</span>';	

} else{ ?><input type="hidden"  class="getcount" name="getcount"  value="" /><?php echo '<span class="ratingcolor">Rating of 0 / 5) stars</span><br/>';
echo '<span  class="ratingcolor">Total Rating 0 people</span>';	 }  ?>
												
										
											</label>	

                        <label for="fname" >
                           <div class="form-group" id="rating"> </div>
                        </label>

                     </div>
                  </div>
               </div>		        

                 <input type="hidden"  class="getcount" name="getcount"  value="<?php  echo $max / $n;  ?>" />

			
				</div>
							<hr>
						<div class="job-overview">
						<h3>Job Overview</h3>
						
						<ul>
							<li><h3><i class="fa fa-money"></i>	budget </h3><span><?php echo $get_job->budget; ?></span></li>
							<li><h3><i class="fa fa-money"></i>	Job is an Emergency </h3><span><?php if($get_job->jobemergency == 1){echo 'Yes'; }else{ echo 'No'; } ?></span></li>
<!--
							<li><h3><i class="fa fa-industry"></i>Industry</h3><span><?php echo $get_job->industry; ?></span></li>
-->
							<li><h3><i class="fa fa-child"></i></i>Internship</h3><span><?php echo $get_job->internship; ?></span></li>
							<li><h3><i class="fas fa-calendar-alt"></i>Date</h3><span><?php echo $get_job->start_date.' - '.$get_job->end_date; ?></span></li>
							<li><h3><i class="fa fa-graduation-cap"></i>Qualification</h3><span><?php echo $get_job->explevel1; ?> </span></li>
<!--
							<li><h3><i class="fa fa-clock-o"></i> Posted</h3><span><?php echo $get_job->posteddate; ?></span></li>
-->
							<li><h3>Posted</h3><span><?php $posteddate =date_create($get_job->posteddate); echo (!empty($posteddate)) ? date_format($posteddate,"d/m/Y") : ''; ?></span></li>
							<li><h3>City</h3><span><?php $posteddate =$get_job->city; echo (!empty($posteddate)) ? $posteddate: ''; ?></span></li>
							<li><h3>State</h3><span><?php $posteddate =$get_job->state; echo (!empty($posteddate)) ? $posteddate: ''; ?></span></li>
						</ul>
				</div>
				<div class="">
					<h3>Job Location</h3>
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- BEGIN CONTENT -->
<div class="container">
<?php if($this->session->userdata('user_type_fr') == 'professional' || $this->session->userdata('user_type_fr') == 'student'){ ?>
<button class="open-button" onclick="openForm()"><img width="40" height="40" src="<?php echo $base_url; ?>assets/img/chaticon.png"></button>
<?php } ?>
<div class="chat-popup" id="myForm">
<div id="frame"><header class="top-barhead">
    <div class="pull-left">
      <span class="icon typicons-message"></span>
      <span class="msgtitle">Message</span>
    </div>
    <div class="popup-head-right pull-right">
						<div class="btn-group">
    								  <button class="bg-btncolor chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-cog"></i> </button>
<!--
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
  </header><div class="content">
		<div class="contact-profile">
<?php if($profile_user->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$profile_user->profile_image; ?>" alt=""><?php } ?><span><?php if( $view_job->companyname){ echo  $view_job->companyname; }else{ echo  $view_job->first_name; } ?>
</span></div>
		<div class="messages">
			<ul>
			</ul>
		</div> <div class="" id="chatSection">
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
                        <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                        <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                    	<input type="hidden" id="ReciverId_txt">
                    	
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


<script src="<?php echo $base_url; ?>assets/js/jquery.emojiRatings.min.js"></script>
                  <script>
                     $("#rating").emojiRating({
                     	fontSize: 32,
                     	onUpdate: function(count) {
                     		$(".review-text").show();
                     		$("#starCount").html(count + " Star");
                     		var poid = $('.poid').val();	
                     			var comid = $('.comid').val();
                     			var sfuid = $('.sfuid').val();
                     						
                     
                     		
                     	}
                     });
                     
                  </script>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
<style class="cp-pen-styles">
.awardjob {
	font-size: 13px;
	color: #ED7D31;
	line-height: 22px;
	font-weight: 600;
	background: #ed7d312b;
}

.jobdetailsrt .complete-thisjob {
	font-size: 26px;
	border-radius: unset !important;
	padding: 15px;
	background: #ed7d312b;
	border: 2px solid #ED7D31;
}

#frame {
	width: 100%;
	min-width: 360px;
	max-width: 360px;
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
	font-family: "proxima-nova", "Source Sans Pro", sans-serif;
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
	font-family: "proxima-nova", "Source Sans Pro", sans-serif;
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
	width: 100%;
	height: 100%;
	overflow: hidden;
	border: 3px solid #ED7D31;
	position: relative;
}

@media screen and (max-width: 735px) {
	#frame .content {
		/* width: calc(100% - 58px);
    min-width: 300px !important;*/
	}
}

@media screen and (min-width: 900px) {
	#frame .content {
		/*  width: calc(100% - 0px);*/
	}
}

#frame .content .contact-profile {
	width: 100%;
	height: 60px;
	line-height: 60px;
	background: #36454f;
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
	float: left;
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

#frame .content .messages ul li.sent div.stmsgdate {
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
	color: #000;
}

#frame .content .messages ul li.replies div.stmsgdate {
	background: #f5f5f5;
	float: right;
	color: #000;
}

#frame .content .messages ul li.replies span.datetimecolor {
	color: rgba(0, 0, 0, .54);
}

#frame .content .messages ul li.sent span.datetimecolor {
	color: rgba(0, 0, 0, .54);
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

#frame .content .messages ul li div.stmsgdate {
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
	font-family: "proxima-nova", "Source Sans Pro", sans-serif;
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
	margin-top: 0;
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

header.top-barhead {
	width: 100%;
	z-index: 99;
	height: 31px;
	background: #ED7D31;
}

.msgtitle {
	padding: 12px;
	font-size: 20px;
	color: #f5f5f5;
}

.bg-btncolor {
	background: #ED7D31;
}

#map {
	height: 400px;
	width: 100%;
}


/* Optional: Makes the sample page fill the window. */

.jobdetailslt {
	display: table;
}

* {
	box-sizing: border-box;
}


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
	margin-bottom: 10px;
	opacity: 0.8;
}


/* Add a red background color to the cancel button */

.form-container .cancel {
	background-color: red;
}


/* Add some hover effects to buttons */

.form-container .btn:hover,
.open-button:hover {
	opacity: 1;
}

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

#usa-map {
	color: #000;
}

.sectionpt130px .form-wrap {
	background: rgba(255, 255, 255, 0.14);
	padding: 20px;
}

.eleven .pagination>li>a:hover {}

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

.eleven {
	width: 100%;
}

.eleven .listing li {
	width: 200px;
	border: unset;
}

.listing.full-time {
	width: 100%;
}

input.sbutn {
	padding: 11px 18px;
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

.col-md-4 .input-group,
.col-md-3 .input-group {
	width: 100%;
}

.input-group input,
.input-group textarea,
.input-group select {
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

.sectionpt130px h1,
h2,
h3,
h4,
h5,
h6 {
	color: #EB5A1D;
	text-transform: none;
}

.margin-ten-bottom {
	margin-bottom: 0;
}

.chosen-container-single .chosen-single div b {
	display: none !important;
}

.input-group .plsholdcol::placeholder {
	/* Chrome, Firefox, Opera, Safari 10.1+ */
	color: #ffffff;
	opacity: 1;
	/* Firefox */
}

.input-group .plsholdcol:-ms-input-placeholder {
	/* Internet Explorer 10-11 */
	color: #ffffff;
}

.input-group .plsholdcol::-ms-input-placeholder {
	/* Microsoft Edge */
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
	margin: 0px;
}

.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
	border-bottom-color: #ddd;
	border-right-color: transparent;
	background: #ED7D31;
	border: none;
	border-radius: 0px;
	margin: 0px;
}

.nav-tabs>li>a:hover {
	/* margin-right: 2px; */
	line-height: 1.42857143;
	border: 1px solid transparent;
	/* border-radius: 4px 4px 0 0; */
}

.tabs-left>li.active>a::after {
	content: "";
	position: absolute;
	top: 10px;
	right: -10px;
	border-top: 10px solid transparent;
	border-bottom: 10px solid transparent;
	border-left: 10px solid #ED7D31;
	display: block;
	width: 0;
}

.tab-content {
	padding: 0 33px !impotant;
	position: relative;
	z-index: 10;
	display: inline-block;
	width: 100%;
}

.composebtn {
	padding: 12px;
}

.composebtn button {
	background-color: #ED7D31;
	padding: 2px 3px;
	border-color: #ED7D31;
}

.composebtn button:hover,
.composebtn button:focus {
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

.propossub:hover+.freelancer-totle-area {
	display: block;
	background: green;
}

.sectionpt130px .form-wrap {
	background: rgba(255, 255, 255, 0.14);
	padding: 20px;
}

.jobposts h6 {
	font-size: 16px;
	margin: 0;
	font-weight: 600;
}

.jobposts p {
	margin: 0;
}

.jobposts a.listing {
	padding: 7px;
	border-left: 2px solid #eee;
}

.managejobposts .sell__section__row i {
	color: #eb5a1c;
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

.managejobposts span {
	padding: 0 12px;
	color: #000;
}

.managejobposts .sell__section__row__list__child__note {
	float: left;
}

.eleven .pagination>li>a:hover {}

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

.eleven {
	width: 100%;
}

.eleven .listing li {
	width: 118px;
	border: unset;
}

.listing.full-time {
	width: 100%;
}

input.sbutn {
	padding: 11px 18px;
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

.col-md-4 .input-group,
.col-md-3 .input-group {
	width: 100%;
}

.input-group input,
.input-group textarea,
.input-group select {
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

.sectionpt130px h1,
h2,
h3,
h4,
h5,
h6 {
	color: #EB5A1D;
	text-transform: none;
}

.margin-ten-bottom {
	margin-bottom: 0;
}

.chosen-container-single .chosen-single div b {
	display: none !important;
}

.managejobposts span.my-earing {
	font-size: 15px;
	padding: 12px;
}

.perposal-img-client img {
	width: 16%;
}

.perposal-img-client {
	background: #EB5A1D;
	color: #fff;
	padding: 5px;
	width: 100%;
}

.perposal-img-client a {
	color: #fff;
}

.awarmeg hr {
	margin-top: 5px;
	margin-bottom: 2px;
	border: 0;
	border-top: 1px solid #eee;
}

.awarmeg a {
	background: #fff;
	font-size: 14px;
	padding: 5px;
}

.number-of-freelancer:hover {
	cursor: pointer;
}

.number-of-freelancer:hover .freelancer-totle-area {
	width: 19%;
	display: block;
	position: absolute;
	z-index: 999;
}

.freelancer-totle-area div.awarmeg {
	margin: 0 !important;
	padding: 5px;
	background: #36454f;
	font-size: 14px;
}

.freelancer-totle-area {
	display: none;
}

.propossub {
	background: #ed7d312b;
}

.tag-ctn {
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

.tag-ctn-invalid {
	border: 1px solid #CC0000;
}

.tag-ctn-readonly {
	cursor: pointer;
}

.tag-ctn-disabled {
	cursor: not-allowed;
	background-color: #eeeeee;
}

.tag-ctn-bootstrap-focus,
.tag-ctn-bootstrap-focus .tag-res-ctn {
	border-color: rgba(82, 168, 236, 0.8) !important;
	/* IE6-9 */
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}

.tag-ctn input {
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

.tag-ctn-disabled input {
	cursor: not-allowed;
	background-color: #eeeeee;
}

.tag-ctn .tag-input-readonly {
	cursor: pointer;
}

.tag-ctn .tag-empty-text {
	color: #DDD;
}

.tag-ctn input:focus {
	border: 0;
	box-shadow: none;
	-webkit-transition: none;
	background: #FFF;
}

.tag-ctn .tag-trigger {
	float: right;
	width: 27px;
	height: 100%;
	position: absolute;
	right: 0;
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

.tag-ctn .tag-trigger:hover {
	background: -moz-linear-gradient(100% 100% 90deg, #e3e3e3, #f1f1f1);
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f1f1f1), to(#e3e3e3));
}

.tag-ctn .tag-trigger:hover .tag-trigger-ico {
	background-position: 0 -4px;
}

.tag-ctn-disabled .tag-trigger {
	cursor: not-allowed;
	background-color: #eeeeee;
}

.tag-ctn-bootstrap-focus {
	border-bottom: 1px solid #CCC;
}

.tag-res-ctn {
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

.tag-res-ctn .tag-res-group {
	line-height: 23px;
	text-align: left;
	padding: 2px 5px;
	font-weight: bold;
	border-bottom: 1px dotted #CCC;
	border-top: 1px solid #CCC;
	background: #f3edff;
	color: #333;
}

.tag-res-ctn .tag-res-item {
	line-height: 25px;
	text-align: left;
	padding: 2px 5px;
	color: #666;
	cursor: pointer;
}

.tag-res-ctn .tag-res-item-grouped {
	padding-left: 15px;
}

.tag-res-ctn .tag-res-odd {
	background: #F3F3F3;
}

.tag-res-ctn .tag-res-item-active {
	background-color: #3875D7;
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3875D7', endColorstr='#2A62BC', GradientType=0);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, color-stop(20%, #3875D7), color-stop(90%, #2A62BC));
	background-image: -webkit-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
	background-image: -moz-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
	background-image: -o-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
	background-image: linear-gradient(#3875D7 20%, #2A62BC 90%);
	color: #fff;
}

.tag-sel-ctn {
	overflow: auto;
	line-height: 22px;
	padding-right: 27px;
}

.tag-sel-ctn .tag-sel-item {
	background: #555;
	color: #EEE;
	float: left;
	font-size: 12px;
	padding: 0 5px;
	border-radius: 3px;
	margin-left: 5px;
	margin-top: 4px;
}

.tag-sel-ctn .tag-sel-text {
	background: #FFF;
	color: #666;
	padding-right: 0;
	margin-left: 0;
	font-size: 14px;
	font-weight: normal;
}

.tag-res-ctn .tag-res-item em {
	font-style: normal;
	background: #565656;
	color: #FFF;
}

.tag-sel-ctn .tag-sel-item:hover {
	background: #565656;
}

.tag-sel-ctn .tag-sel-text:hover {
	background: #FFF;
}

.tag-sel-ctn .tag-sel-item-active {
	border: 1px solid red;
	background: #757575;
}

.tag-ctn .tag-sel-ctn .tag-sel-item {
	margin-top: 3px;
}

.tag-stacked .tag-sel-item {
	float: inherit;
}

.tag-sel-ctn .tag-sel-item .tag-close-btn {
	width: 7px;
	cursor: pointer;
	height: 7px;
	float: right;
	margin: 8px 2px 0 10px;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAOCAYAAADjXQYbAAAACXBIWXMAAAsTAAALEwEAmpwYAAAKT2lDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVNnVFPpFj333vRCS4iAlEtvUhUIIFJCi4AUkSYqIQkQSoghodkVUcERRUUEG8igiAOOjoCMFVEsDIoK2AfkIaKOg6OIisr74Xuja9a89+bN/rXXPues852zzwfACAyWSDNRNYAMqUIeEeCDx8TG4eQuQIEKJHAAEAizZCFz/SMBAPh+PDwrIsAHvgABeNMLCADATZvAMByH/w/qQplcAYCEAcB0kThLCIAUAEB6jkKmAEBGAYCdmCZTAKAEAGDLY2LjAFAtAGAnf+bTAICd+Jl7AQBblCEVAaCRACATZYhEAGg7AKzPVopFAFgwABRmS8Q5ANgtADBJV2ZIALC3AMDOEAuyAAgMADBRiIUpAAR7AGDIIyN4AISZABRG8lc88SuuEOcqAAB4mbI8uSQ5RYFbCC1xB1dXLh4ozkkXKxQ2YQJhmkAuwnmZGTKBNA/g88wAAKCRFRHgg/P9eM4Ors7ONo62Dl8t6r8G/yJiYuP+5c+rcEAAAOF0ftH+LC+zGoA7BoBt/qIl7gRoXgugdfeLZrIPQLUAoOnaV/Nw+H48PEWhkLnZ2eXk5NhKxEJbYcpXff5nwl/AV/1s+X48/Pf14L7iJIEyXYFHBPjgwsz0TKUcz5IJhGLc5o9H/LcL//wd0yLESWK5WCoU41EScY5EmozzMqUiiUKSKcUl0v9k4t8s+wM+3zUAsGo+AXuRLahdYwP2SycQWHTA4vcAAPK7b8HUKAgDgGiD4c93/+8//UegJQCAZkmScQAAXkQkLlTKsz/HCAAARKCBKrBBG/TBGCzABhzBBdzBC/xgNoRCJMTCQhBCCmSAHHJgKayCQiiGzbAdKmAv1EAdNMBRaIaTcA4uwlW4Dj1wD/phCJ7BKLyBCQRByAgTYSHaiAFiilgjjggXmYX4IcFIBBKLJCDJiBRRIkuRNUgxUopUIFVIHfI9cgI5h1xGupE7yAAygvyGvEcxlIGyUT3UDLVDuag3GoRGogvQZHQxmo8WoJvQcrQaPYw2oefQq2gP2o8+Q8cwwOgYBzPEbDAuxsNCsTgsCZNjy7EirAyrxhqwVqwDu4n1Y8+xdwQSgUXACTYEd0IgYR5BSFhMWE7YSKggHCQ0EdoJNwkDhFHCJyKTqEu0JroR+cQYYjIxh1hILCPWEo8TLxB7iEPENyQSiUMyJ7mQAkmxpFTSEtJG0m5SI+ksqZs0SBojk8naZGuyBzmULCAryIXkneTD5DPkG+Qh8lsKnWJAcaT4U+IoUspqShnlEOU05QZlmDJBVaOaUt2ooVQRNY9aQq2htlKvUYeoEzR1mjnNgxZJS6WtopXTGmgXaPdpr+h0uhHdlR5Ol9BX0svpR+iX6AP0dwwNhhWDx4hnKBmbGAcYZxl3GK+YTKYZ04sZx1QwNzHrmOeZD5lvVVgqtip8FZHKCpVKlSaVGyovVKmqpqreqgtV81XLVI+pXlN9rkZVM1PjqQnUlqtVqp1Q61MbU2epO6iHqmeob1Q/pH5Z/YkGWcNMw09DpFGgsV/jvMYgC2MZs3gsIWsNq4Z1gTXEJrHN2Xx2KruY/R27iz2qqaE5QzNKM1ezUvOUZj8H45hx+Jx0TgnnKKeX836K3hTvKeIpG6Y0TLkxZVxrqpaXllirSKtRq0frvTau7aedpr1Fu1n7gQ5Bx0onXCdHZ4/OBZ3nU9lT3acKpxZNPTr1ri6qa6UbobtEd79up+6Ynr5egJ5Mb6feeb3n+hx9L/1U/W36p/VHDFgGswwkBtsMzhg8xTVxbzwdL8fb8VFDXcNAQ6VhlWGX4YSRudE8o9VGjUYPjGnGXOMk423GbcajJgYmISZLTepN7ppSTbmmKaY7TDtMx83MzaLN1pk1mz0x1zLnm+eb15vft2BaeFostqi2uGVJsuRaplnutrxuhVo5WaVYVVpds0atna0l1rutu6cRp7lOk06rntZnw7Dxtsm2qbcZsOXYBtuutm22fWFnYhdnt8Wuw+6TvZN9un2N/T0HDYfZDqsdWh1+c7RyFDpWOt6azpzuP33F9JbpL2dYzxDP2DPjthPLKcRpnVOb00dnF2e5c4PziIuJS4LLLpc+Lpsbxt3IveRKdPVxXeF60vWdm7Obwu2o26/uNu5p7ofcn8w0nymeWTNz0MPIQ+BR5dE/C5+VMGvfrH5PQ0+BZ7XnIy9jL5FXrdewt6V3qvdh7xc+9j5yn+M+4zw33jLeWV/MN8C3yLfLT8Nvnl+F30N/I/9k/3r/0QCngCUBZwOJgUGBWwL7+Hp8Ib+OPzrbZfay2e1BjKC5QRVBj4KtguXBrSFoyOyQrSH355jOkc5pDoVQfujW0Adh5mGLw34MJ4WHhVeGP45wiFga0TGXNXfR3ENz30T6RJZE3ptnMU85ry1KNSo+qi5qPNo3ujS6P8YuZlnM1VidWElsSxw5LiquNm5svt/87fOH4p3iC+N7F5gvyF1weaHOwvSFpxapLhIsOpZATIhOOJTwQRAqqBaMJfITdyWOCnnCHcJnIi/RNtGI2ENcKh5O8kgqTXqS7JG8NXkkxTOlLOW5hCepkLxMDUzdmzqeFpp2IG0yPTq9MYOSkZBxQqohTZO2Z+pn5mZ2y6xlhbL+xW6Lty8elQfJa7OQrAVZLQq2QqboVFoo1yoHsmdlV2a/zYnKOZarnivN7cyzytuQN5zvn//tEsIS4ZK2pYZLVy0dWOa9rGo5sjxxedsK4xUFK4ZWBqw8uIq2Km3VT6vtV5eufr0mek1rgV7ByoLBtQFr6wtVCuWFfevc1+1dT1gvWd+1YfqGnRs+FYmKrhTbF5cVf9go3HjlG4dvyr+Z3JS0qavEuWTPZtJm6ebeLZ5bDpaql+aXDm4N2dq0Dd9WtO319kXbL5fNKNu7g7ZDuaO/PLi8ZafJzs07P1SkVPRU+lQ27tLdtWHX+G7R7ht7vPY07NXbW7z3/T7JvttVAVVN1WbVZftJ+7P3P66Jqun4lvttXa1ObXHtxwPSA/0HIw6217nU1R3SPVRSj9Yr60cOxx++/p3vdy0NNg1VjZzG4iNwRHnk6fcJ3/ceDTradox7rOEH0x92HWcdL2pCmvKaRptTmvtbYlu6T8w+0dbq3nr8R9sfD5w0PFl5SvNUyWna6YLTk2fyz4ydlZ19fi753GDborZ752PO32oPb++6EHTh0kX/i+c7vDvOXPK4dPKy2+UTV7hXmq86X23qdOo8/pPTT8e7nLuarrlca7nuer21e2b36RueN87d9L158Rb/1tWeOT3dvfN6b/fF9/XfFt1+cif9zsu72Xcn7q28T7xf9EDtQdlD3YfVP1v+3Njv3H9qwHeg89HcR/cGhYPP/pH1jw9DBY+Zj8uGDYbrnjg+OTniP3L96fynQ89kzyaeF/6i/suuFxYvfvjV69fO0ZjRoZfyl5O/bXyl/erA6xmv28bCxh6+yXgzMV70VvvtwXfcdx3vo98PT+R8IH8o/2j5sfVT0Kf7kxmTk/8EA5jz/GMzLdsAAAAEZ0FNQQAAsY58+1GTAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABSSURBVHjahI7BCQAwCAOTzpThHMHh3Kl9CVos9XckFwQAuPtGuWTWwMwaczKzyHsqg6+5JqMJr28BABHRwmTWQFJjTmYWOU1L4tdck9GE17dnALGAS+kAR/u2AAAAAElFTkSuQmCC);
}

.tag-sel-ctn .tag-sel-item .tag-close-btn:hover {
	background-position: 0 -7px;
}

.tag-helper {
	color: #AAA;
	font-size: 10px;
	position: absolute;
	top: -17px;
	right: 0;
}

.jobdetailslt h3 {
	font-size: 20px;
	margin: 0;
}

.jobdetailsrt h3 {
	font-size: 20px;
	margin: 0;
}

.job-single-sec {
	background: #fff;
	padding: 15px;
}

.jobdetailsrt {
	background: #fff;
	padding: 15px;
}

.job-single-head {
	float: left;
	width: 100%;
	padding-bottom: 30px;
	border-bottom: 1px solid #e8ecec;
	display: table;
}

.job-single-sec {
	float: left;
	/* width: 100%; */
}

.job-single-head {
	float: left;
	width: 100%;
	padding-bottom: 30px;
	border-bottom: 1px solid #e8ecec;
	display: table;
}

.job-thumb {
	display: table-cell;
	vertical-align: top;
	width: 107px;
}

.job-head-info {
	display: table-cell;
	vertical-align: middle;
	padding-left: 25px;
}

.job-head-info h4 {
	float: left;
	width: 100%;
	font-family: Open Sans;
	font-size: 15px;
	color: #202020;
	margin: 0;
	margin-bottom: 0px;
	margin-bottom: 10px;
}

.job-head-info span {
	float: left;
	width: 100%;
	font-size: 13px;
	color: #888888;
	line-height: 10px;
}

.job-head-info p {
	float: left;
	margin: 0;
	margin-top: 0px;
	margin-right: 0px;
	font-size: 13px;
	margin-right: 40px;
	color: #888;
	margin-top: 11px;
}

.job-details {
	float: left;
	width: 100%;
	padding-top: 20px;
}

.share-bar {
	float: left;
	width: 100%;
	padding-top: 20px;
	padding-bottom: 20px;
	border-top: 1px solid #e8ecec;
	border-bottom: 1px solid #e8ecec;
}

.recent-jobs {
	float: left;
	width: 100%;
	padding-top: 20px;
}

.apply-thisjob {
	float: left;
	width: 100%;
	border: 2px solid #ED7D31;
	text-align: center;
	color: #ED7D31;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	-ms-border-radius: 8px;
	-o-border-radius: 8px;
	border-radius: 8px;
	padding: 20px 20px;
	font-size: 15px;
	font-family: Open Sans;
	font-weight: bold;
}

.apply-thisjob i {
	font-size: 28px;
	margin-right: 8px;
	line-height: 11px;
	position: relative;
	top: 5px;
}

.apply-alternative {
	float: left;
	width: 100%;
	padding-top: 30px;
}

.apply-alternative a {
	float: left;
	border: 2px solid #e8ecec;
	font-size: 13px;
	color: #888888;
	padding: 0 20px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	-ms-border-radius: 8px;
	-o-border-radius: 8px;
	border-radius: 8px;
	height: 50px;
	line-height: 50px;
}

.apply-alternative span {
	float: right;
	border: 2px solid #e8ecec;
	font-size: 13px;
	color: #888888;
	padding: 0 30px;
	height: 50px;
	line-height: 50px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	-ms-border-radius: 8px;
	-o-border-radius: 8px;
	border-radius: 8px;
	-webkit-transition: all 0.4s ease 0s;
	-moz-transition: all 0.4s ease 0s;
	-ms-transition: all 0.4s ease 0s;
	-o-transition: all 0.4s ease 0s;
	transition: all 0.4s ease 0s;
}

.apply-alternative span i {
	font-size: 20px;
	float: left;
	margin-right: 6px;
	margin-top: 14px;
}

.job-overview {
	float: left;
	width: 100%;
	margin-top: 30px;
}

.job-details p,
.job-details li {
	float: left;
	width: 100%;
	font-size: 18px;
	color: #888888;
	line-height: 24px;
	margin: 0;
	margin-bottom: 19px;
}

.job-overview span {
	color: #000;
}

#exampleModal .closeprop {
	position: absolute;
	width: 45px;
	height: 45px;
	top: 22px;
	display: block;
	right: 38px;
	color: #666;
	background-color: #aaa;
	border-radius: 50% !important;
	cursor: pointer!important;
	z-index: 9999;
	color: #181515;
}

.com-overview {
	background: #ee4d00;
}

.com_head {
	color: #000;
	text-align: center;
	font-size: 25px;
	font-weight: 600;
}

.com-overview h3 {
	color: #000;
}

.com-overview ul {
	list-style: none;
}
</style>
<script src="<?php echo $base_url; ?>assets/js/chat/chat.js"></script>
 
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
</script>

</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog" role="document">
<form name="proposal_form" action="<?php echo $base_url; ?>bids/send_proposals" id="proposal_form" method="POST" enctype="multipart/form-data" novalidate="novalidate">
<div class="modal-content">
<div class="modal-header">
<h3 class="modal-title" id="exampleModalLabel">New Proposal <button type="button" class="close closeprop" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button></h3>

</div>
<div class="modal-body">

<div class="load-ajax-form" style="display: block;">	 

<input type="hidden" name="job_id" value="<?php echo $get_job->po_id;?>">
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user_master'); ?>">
<input type="hidden" name="comuser_id" value="<?php echo $get_job->company_userid;?>">

<div class="proposal-popup-textarea">
<label>Proposal details</label>
<textarea name="proposal_detail" id="proposal_detail" placeholder="Type..."></textarea>
</div>
<div class="attached-file-proposal form-group ">
<a href="javascript:void(0);" onclick="document.getElementById('hide').click()">Add file</a>
<input type="file" name="proposal_files" id="hide">
</div>
<div class="send_notifaction_chack">
<label for="notifyme">
<input type="checkbox" name="notifyme" id="notifyme" value="1">

<span></span> Notify me if the job is awarded to someone else 
</label>
</div>
<div class="proposal_submit_button">

</div>
<script>

jQuery(document).ready(function($){
$('html, body').animate({
scrollTop: $('.load-ajax-form').offset().top
}, 1000);

$('.close-proposal-popup').on('click', function(){
$('.load-ajax-form').html("");
$('.load-ajax-form').hide();
$('.submit-proposal-overly').hide();
});
$('#proposal_bid_price').on("input", function(){
var dInput = this.value;
var services_charges = $('#services_charges').text();
var totla_bid = '';
var calculate = dInput / 100;

calculate = calculate * services_charges;
calculate = Math.round(calculate);

totla_bid = +dInput - +calculate;

/* alert(totla_bid); */

if( $.isNumeric(dInput) && dInput > 0 )
{
$('.service_charges').text("- "+calculate+".00");
$('#proposal_service_include_bid_price').attr("value",totla_bid);

}else{

$('#proposal_service_include_bid_price').attr( "value", "");

}

});

return false;
});
</script>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="submit" name="proposal_submit_button" class="send-button" id="proposal_submit_button" value="Send proposal">

</div>
</div>
</form></div>
</div>


<script>
function initMap() {

var styledMapType = new google.maps.StyledMapType(
[
{
"elementType": "geometry.fill",
"stylers": [
{
"color": "#fff8f1"
},
{
"weight": 1.5
}
]
},
{
"elementType": "geometry.stroke",
"stylers": [
{
"color": "#ff3044"
},
{
"visibility": "on"
}
]
},
{
"elementType": "labels",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "administrative",
"elementType": "geometry",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "administrative.country",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "administrative.country",
"elementType": "geometry",
"stylers": [
{
"color": "#a6141f"
},
{
"weight": 2
}
]
},
{
"featureType": "administrative.country",
"elementType": "geometry.fill",
"stylers": [
{
"visibility": "on"
},
{
"weight": 1
}
]
},
{
"featureType": "administrative.land_parcel",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "administrative.land_parcel",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#ff792f"
},
{
"visibility": "on"
}
]
},
{
"featureType": "administrative.neighborhood",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "administrative.province",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#ff792e"
},
{
"visibility": "on"
},
{
"weight": 1
}
]
},
{
"featureType": "administrative.province",
"elementType": "geometry.stroke",
"stylers": [
{
"color": "#331809"
},
{
"visibility": "on"
},
{
"weight": 3
}
]
},
{
"featureType": "landscape.natural",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#ff7c40"
}
]
},
{
"featureType": "poi",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "road",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "road",
"elementType": "labels.icon",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "transit",
"stylers": [
{
"visibility": "off"
}
]
}
],
{name: 'Styled Map'});

// Create a map object, and include the MapTypeId to add
// to the map type control.
var myLatLng = {lat:<?php echo $latitude; ?>, lng:<?php echo $longitude; ?>};

var map = new google.maps.Map(document.getElementById('map'), {
center: myLatLng,
zoom: 11,
mapTypeControlOptions: {
mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
'styled_map'],
drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']

}

});
var marker = new google.maps.Marker({
map: map,
position: new google.maps.LatLng(myLatLng),
title: 'Some location'
});

// Add circle overlay and bind to marker
var circle = new google.maps.Circle({
map: map,
radius: 5693,    // 10 miles in metres
fillColor: '#AA0000'
});
circle.bindTo('center', marker, 'position');
//Associate the styled map with the MapTypeId and set it to display.
//~ map.mapTypes.set('styled_map', styledMapType);
//~ map.setMapTypeId('styled_map');
}

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&callback=initMap">
</script>

