<?php 
$view_job  = $this->postjob_model->company_info($get_job->company_userid);
$compl_list = $this->postjob_model->proct_awarded_list($postjobid);
if(!empty($compl_list))
{
$user_job  = $this->postjob_model->company_info($compl_list->proposuser_id);
}
?>  

	<link href='<?= base_url() ?>assets/css/star-rating.min.css' type='text/css' rel='stylesheet'>
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
								<p><i class="la la-phone"></i> <?php echo $view_job->companypercellphone; ?></p>
								<p><i class="la la-envelope-o"></i> <?php echo $view_job->companyperemail; ?></p>
							<input type="hidden"  class="comid" name="comid"  value="<?php echo $view_job->id_user_master; ?>" />
								  <input type="hidden"  class="poid" name="poid"  value="<?php echo $postjobid; ?>" />
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
								<?php }else
								{?> <h3>Project Files</h3><?php }
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
					<?php 
					$check_awardedjob = $this->postjob_model->check_awardedjob1($postjobid,$view_job->id_user_master);
if(empty($check_awardedjob)){
						if(!empty($this->session->userdata('user_type_fr')) ) 
					{
						 if($this->session->userdata('user_type_fr') == "professional" || $this->session->userdata('user_type_fr') == "student"){	
								if(!empty($datadetailpayment)){
						if($datadetailpayment->status ==  1 )
						{ ?>
						<button type="button" class="apply-thisjob btn " data-toggle="modal" data-target="#exampleModal"> Send proposals</button>
						<?php }
						else  if($datadetailpayment->status ==  2)
						{ ?>
						<button type="button" class="apply-thisjob btn " disabled>Proposal Sent</button>
						<?php }else{ 
							
						if(!empty($get_subscription_package))
			{ 
							?>
						<form id="select_job" action="<?php echo $base_url?>bids/save_select_job" name="select_job" method="POST" >
						<p class="apply-thisjob">  <input type="submit" name="submit_job" value="Apply for job" id="submit_job"></p> 
						<input type="hidden" id="id" name="company" value="<?php echo $get_job->company_userid;?>"> 
						<input type="hidden" id="po_id" name="post" value="<?php echo $get_job->po_id;?>"> 
						</form>
						<?php
						} 
						else
							{
								//~ $data = $this->session->userdata();
								//~ $data['pro_id'] = $get_job->po_id; 
								//~ $this->session->set_userdata('user',$data) ;
								 ?>
								<a href="<?php echo $base_url?>package?pid=<?php echo $get_job->po_id; ?>"> <input type="submit" class="apply-thisjob" value="Apply for package" ></a>

						<?php	
						
						
						}
					}
					} else{	
						
							if(!empty($get_subscription_package))
			{ 
						?>
						<form id="select_job" action="<?php echo $base_url?>bids/save_select_job" name="select_job" method="POST" >
							<p class="apply-thisjob">  <input type="submit" name="submit_job" value="Apply for job" id="submit_job"></p> 
							<input type="hidden" id="id" name="company" value="<?php echo $get_job->company_userid;?>"> 
							<input type="hidden" id="po_id" name="post" value="<?php echo $get_job->po_id;?>"> 
						</form>
						<?php 
					}
						else
							{ ?>
								<a href="<?php echo $base_url?>package?pid=<?php echo $get_job->po_id; ?>"> <input type="submit" class="apply-thisjob" value="Apply for package" ></a>

						<?php	}
						
						} 
						}				
						}
					else if($this->session->userdata('user_type_fr') != "company") { ?>
						<form id="select_job" action="<?php echo $base_url?>bids/save_select_job" name="select_job" method="POST" >
							<p class="apply-thisjob">  <input type="submit" name="submit_job" value="Apply for job" id="submit_job"></p> 
							<input type="hidden" id="id" name="company" value="<?php echo $get_job->company_userid;?>"> 
							<input type="hidden" id="po_id" name="post" value="<?php echo $get_job->po_id;?>"> 
							<?php		 } 
						}
						else
						{ 
							 if($this->session->userdata('user_type_fr') == "company" ){
						 ?>
							<a class="confirmation" href="<?php echo $base_url?>bids/completejob/<?php echo $get_job->po_id.'/'.$view_job->id_user_master;?>"> <input type="submit" class="complete-thisjob" value="Complete a Job" ></a>
<!--
							<div class="pull-right panel-heading awardjob"><p class=" panel-title text-center" >Awarderd</p></div>
-->

			   <div class="col-lg-12 col-md-12 spacetopbottom" >
                  <div class="control-label ">
                     <div class="col-40"><label class="titlelabel" for="fname" >Rating:</label></div>
                     <div class="col-50">
                        <label for="fname" >
                           <div class="form-group" id="rating"> </div>
                           <span class="review-text" style="display:none"><span id="starCount"></span> rating</span>
                        </label>
                     </div>
                  </div>
               </div>		          <input type="hidden"  class="getcount" name="getcount"  value="<?php if(!empty($getrating->countrating)){ echo $getrating->countrating; } ?>" />
			 <input type="hidden" id="sfuid" class="sfuid" value="<?php echo $user_job->id_user_master; ?>">

						<?php 	 
						  }
						 else{ ?>
							
								<div class="panel-heading awardjob"><p class="panel-title text-center" style="color: #ee5f1c;font-size: 33px;">Awarderd</p></div>
						<?php } } ?>
						<div class="job-overview">
						<h3>Job Overview</h3>
						<ul>
						
							<li><h3>	budget </h3><span><?php 
							if (is_numeric($get_job->budget))
							{							
							echo '$'.$get_job->budget.' ('.$get_job->hourorfix.')'; 
							}
							else
							{
								echo $get_job->budget.' ('.$get_job->hourorfix.')'; 
							}
							
							?></span></li>
							<li><h3>	Job is an Emergency </h3>
							<?php $checkprojectbidornot = $this->postjob_model->checkprojectbidornot($get_job->company_userid,$get_job->po_id);
							
							 ?> 
									 
							<span> <?php
									  if($get_job->jobemergency == '1' ){  
										 if(!empty($checkprojectbidornot)){  
										 	 if($checkprojectbidornot->job_status == 3 && $checkprojectbidornot->status == 2){ ?>
									 <div class="listing-date new">Awarded</div>
									 <?php } 
									 else if($checkprojectbidornot->job_status == 4)
									 { ?>
										  <div class="listing-date new">Expired</div>
										 <?php } else{ ?>
                                                    <div class="listing-date new">
														<?php 
															$date=date_create($get_job->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span id="demo_<?php echo $get_job->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                    </div>
                                                    <?php }} }
												
                                                    else{ echo 'No'; } ?></span>
                            </li>

							<li><h3><i class="fa fa-industry"></i>Industry</h3><span><?php echo $get_job->industry; ?></span></li>

							<li><h3>Internship</h3><span><?php echo $get_job->internship; ?></span></li>
							
							<li><h3>Date</h3><span><?php $start_date = date_create($get_job->start_date) ; $end_date =date_create($get_job->end_date); 
							echo $strentdate = (!empty($start_date) && !empty($end_date)) ? date_format($start_date,"d/m/Y").' to '.date_format($end_date,"d/m/Y") : ''; ?></span></li>
							<li><h3>Qualification</h3><span><?php echo $get_job->explevel1; ?> </span></li>
							<li><h3>Posted</h3><span><?php $posteddate =date_create($get_job->posteddate); echo (!empty($posteddate)) ? date_format($posteddate,"d/m/Y") : ''; ?></span></li>
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
</header>
<div class="content">
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
 					     <input type="hidden" id="Sender_Id" value="<?php echo $view_job->id_user_master; ?>">

                        <input type="hidden" id="Sender_Name" value="<?=$user['first_name'];?>">
                        <input type="hidden" id="Sender_Name" value="<?=$user['first_name'];?>">
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
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
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
                     						
                     
                     			$.ajax({
                     				url: '<?php echo $base_url?>signup_controller/user_rating',
                     				data:{poid,comid,sfuid,count},
                     				type: 'POST',
                     				success:function(data)
                     				{ 
                     					
                     				}
                     			});
                     	}
                     });
                     
                  </script>
                  
                  
                  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/externalcss/select_job.css" type="text/css">

<script>
$(document).ready(function() {
	//~ function formatDate(date) {
					//~ var d = new Date(date),
					//~ month = '' + (d.getMonth() + 1),
					//~ day = '' + d.getDate(),
					//~ year = d.getFullYear(),
					//~ hour = d.getHours(),
					//~ mins= d.getMinutes(),
					//~ sec= d.getSeconds(),
					//~ amOrPm = (d.getHours() < 12) ? "AM" : "PM";
     //~ if (month.length < 2) month = '0' + month;
     //~ if (day.length < 2) day = '0' + day;
     //~ return [month, day, year].join('/')+' '+[hour, mins,sec].join(':');
 //~ }
 $('[data-demopoid]').each(function () { 
		var proid = $(this).attr('id');
		var demopoid = $(this).data('demopoid');
		//~ var dateval = new Date(); 
		//~ var utcdate = new Date(dateval.getTime() + dateval.getTimezoneOffset() * 60000);
		//~ var amOrPmdate = (utcdate.getHours() < 12) ? "AM" : "PM";

		//~ var utcenddate= (utcdate.getMonth()+1) + '/' + utcdate.getDate() + '/' + utcdate.getFullYear() + ' ' + utcdate.getHours() + ':' + utcdate.getMinutes()+ ' ' + amOrPmdate;

		//~ var utcenddateval = new Date(utcenddate);
		//~ var date = utcenddateval.toGMTString(); 

		//~ var fordemdate = formatDate(date);
		//~ fromDate = parseInt(new Date(demopoid).getTime()/1000); 
		//~ toDate = parseInt(new Date(date).getTime()/1000);
		//~ var timeDiff = parseInt((toDate - fromDate)/3600);  // will give difference in hrs
		//~ var diffSeconds = timeDiff/1000;
		//~ var MM = Math.floor(diffSeconds%3600)/60;



		//~ var fordemopoid = formatDate(demopoid);


		//~ var x = setInterval(function() {

		//~ var start_actual_time  = fordemopoid;
		//~ var end_actual_time    =  fordemdate;


		//~ var start_actual_times = new Date(start_actual_time);
		//~ var end_actual_times = new Date(end_actual_time);


		//~ var diff = end_actual_times - start_actual_times;
		//~ var diffSeconds = diff/1000;
		//~ var HH = Math.floor(diffSeconds/3600);
		//~ var MM = Math.floor(diffSeconds%3600)/60;

		//~ var formatted = ((HH < 10)?("0" + HH):HH);
		//~ var numhour = 48;

	

			//~ if(formatted <= numhour){
				//~ var tothr =numhour -timeDiff;
				//~ setInterval(function time(){
		 
			   //~ var d = new Date();
			 
			//~ if(tothr == 1)
			//~ {
			  //~ var hours = 0;
			//~ }
			//~ else
			//~ {
				  //~ var hours = tothr;

			//~ }
			  //~ var mins =  60 - d.getMinutes();
			  //~ if((mins + '').length == 1){
				//~ mins = '0' + mins;
			  //~ }
			  //~ var sec = 60 - d.getSeconds();
			  //~ if((sec + '').length == 1){
					//~ sec = '0' + sec;
			  //~ }
			   
			  //~ jQuery('#'+proid).html(hours+':'+mins+':'+sec)
			//~ }, 1000);

				
				//~ var countDownDate = new Date(demopoid).getTime();

			 //~ }
			 //~ var countDownDate = new Date("Dec 1, 2018 05:50:25 PM ").getTime();


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
  document.getElementById(proid).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
}
 else
  {
      //~ clearInterval(x);
       document.getElementById(proid).innerHTML = "EXPIRED";
      jQuery.ajax({
		url : '<?php echo $base_url?>bids/expired',
		type: 'POST',
		data:{ proid : proid },
		success:function(data){
			window.location.href = "<?php echo $base_url?>bids/find_job";

		}
	});
   
  
  }
 
 
}, 1000);
 
 }); 

 
 });
</script>
<script src="<?php echo $base_url; ?>assets/js/chat/chat.js"></script>
 
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

<input type="file" id="proposal_files" name="proposal_files" multiple ><br/>
</div>
<div class="send_notifaction_chack">
<label for="notifyme">
<input type="checkbox" name="notifyme" id="notifyme" value="1">
<span></span> Notify me if the job is awarded to someone else 
</label>
</div>
<div class="proposal_submit_button">
</div>
<?php

if($this->session->flashdata('showpopup')){
	
	 ?>


<script type="text/javascript">
  var myTimeout;
   clearTimeout( myTimeout );

 setTimeout(function() {
	
    $('#signregpage').click();
    $('a[href="#tab1"]').click();
}, 1000);
</script>	
<?php } ?>
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
<button type="button" class="btn-secondary btnclose" data-dismiss="modal">Close</button>
<input type="submit" name="proposal_submit_button" class="send-button" id="proposal_submit_button" value="Send proposal">

</div>
</div>
</form>
</div>
</div>
<script>
function initMap() {
// Create a new StyledMapType object, passing it an array of styles,
// and the name to be displayed on the map type control.
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
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&callback=initMap">
</script>
	<script src='<?= base_url() ?>assets/js/star-rating.min.js' type='text/javascript'></script>
