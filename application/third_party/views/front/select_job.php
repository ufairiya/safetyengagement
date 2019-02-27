<?php 

	 $view_job  = $this->postjob_model->company_info($get_job->company_userid);

?>
<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-8 column jobdetailslt">
				 		<div class="job-single-sec">
				 			<div class="job-single-head">
								
				 				<div class="job-thumb"> <img src="<?php echo $base_url.'uploads/'.$view_job->profile_image; ?>" alt=""> </div>
				 				<div class="job-head-info">
				 					<h4><?php echo $view_job->companyname; ?> </h4>
				 					<span><?php echo $view_job->address.' '.$view_job->city.' '.$view_job->state.' '.$view_job->zip_code; ?></span>
				 					<p><i class="la la-unlink"></i> <?php echo $view_job->companyname; ?></p>
				 					<p><i class="la la-phone"></i> <?php echo $view_job->companypercellphone; ?></p>
				 					<p><i class="la la-envelope-o"></i> <?php echo $view_job->companyperemail; ?></p>
				 				</div>
				 			</div><!-- Job Head -->
				 			<div class="job-details">
				 				<h3>Job Title</h3>
				 				<p><?php echo $get_job->job_title ?></p>
				 				
				 				<h3>Job Description</h3>
				 				<p><?php echo $get_job->job_description ?></p>
				 				
				 				
				 				  <?php 
                     if(!empty($get_job->detailed_pic))
                     {
                     	
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
                  <?php }	
                     }
                     ?>
                     
				 				
								<h3>Special Equipment</h3>
				 				<p><?php echo $get_job->equipment ?></p>
				 					
				 					  <?php 
                     if(!empty($get_job->equipment_pic))
                     {
                     	
                     $pic_arr = explode(",", $get_job->equipment_pic);
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
                  <image src="<?php echo $base_url.'uploads/'.$get_job->equipment_pic; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                     
				 					
								<h3>Final Report</h3>
				 				<p><?php echo $get_job->finalrep ?></p>
				 				
				 					  <?php 
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
                     }
                     ?>
                     
				 				
				 				
				 				
				 				
								
								<h3>Project Files</h3>
				 				<p><?php echo $get_job->project ?></p>
				 				
				 					  <?php 
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
                     }
                     ?>
      
								
								<h3>Job Information</h3>
				 				<p><?php echo $get_job->information ?></p>
								
							
				 				
				 				
				 				
				 			
				 				
				 				
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
                     ?>
                  <a target="_blank" href="<?php echo $base_url.'uploads/'.$pic; ?>">
                     <image src="<?php echo $base_url.'uploads/'.$age_code; ?>" style="width: 75px;    height: 75px;" />
                  </a>
                  <?php
                     } 
                     }
                     else
                     { ?>
                  <image src="<?php echo $base_url.'uploads/'.$get_job->job_file; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>
                     
				 				
				 				
				 				<h3>Experience Level </h3>
				 				<p><?php echo $get_job->explevel1; ?></p>
				 				
				 				<h3>Contractor 3rd Party Approval  </h3>
				 			
				 				<p><?php echo $get_job->thirdpartapprov; ?></p>
				 				
	  <?php 
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
                     ?>
                     
				 				
				 				
				 				
				 				<h3>Liability Insurance </h3>
				 				<p><?php echo $get_job->insurance; ?></p>
				 				
				 				  <?php 
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
                     }
                     ?>
                     
                     
				 				
				 				<h3>Budget Files</h3>
				 			
				 				  <?php 
                     if(!empty($get_job->budget_img))
                     {
                     	
                     $pic_arr = explode(",", $get_job->budget_img);
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
                  <image src="<?php echo $base_url.'uploads/'.$get_job->budget_img; ?>" style="width: 75px;    height: 75px;" />
                  <?php }	
                     }
                     ?>

				 			</div>
				 			
				 			
				 		</div>
				 	
				 	</div>
				 	
				 	<div class="col-lg-4 column jobdetailsrt">
						
						<?php
						if(!empty($datadetailpayment)){
						  if($datadetailpayment->status ==  1 )
						  { ?>
							  <button type="button" class="apply-thisjob btn " data-toggle="modal" data-target="#exampleModal"> Send proposals</button>
							<?php }
							else  if($datadetailpayment->status ==  2)
							{ ?>
								
							  <button type="button" class="apply-thisjob btn " disabled>Proposal Sent</button>
							<?php }else{ ?>
									
									    <h3> Price : 5$</h3>
							<form id="select_job" action="<?php echo $base_url?>bids/save_select_job" name="select_job" method="POST" >
							<p class="apply-thisjob">  <input type="submit" name="submit_job" value="Apply for job" id="submit_job"></p> 
							<input type="hidden" id="id" name="company" value="<?php echo $get_job->company_userid;?>"> 
							<input type="hidden" id="po_id" name="post" value="<?php echo $get_job->po_id;?>"> 
							</form>
							
							<?php
							}
							} else
							{
							?>
								    <h3> Price : 5$</h3>
							<form id="select_job" action="<?php echo $base_url?>bids/save_select_job" name="select_job" method="POST" >
							<p class="apply-thisjob">  <input type="submit" name="submit_job" value="Apply for job" id="submit_job"></p> 
							<input type="hidden" id="id" name="company" value="<?php echo $get_job->company_userid;?>"> 
							<input type="hidden" id="po_id" name="post" value="<?php echo $get_job->po_id;?>"> 

							</form>
							<?php } ?>
				 		<div class="job-overview">
				 			<h3>Job Overview</h3>
				 			<ul>
				 				
				 					<li><h3><i class="fa fa-money"></i>	budget </h3><span><?php echo $get_job->budget; ?></span></li>
				 					<li><h3><i class="fa fa-money"></i>	Job is an Emergency </h3><span><?php echo $get_job->jobemergency; ?></span></li>
				 				<li><h3><i class="fa fa-industry"></i>Industry</h3><span><?php echo $get_job->industry; ?></span></li>
				 				<li><h3><i class="fa fa-child"></i></i>Internship</h3><span><?php echo $get_job->internship; ?></span></li>
				 				<li><h3><i class="fas fa-calendar-alt"></i>Date</h3><span><?php echo $get_job->start_date.' - '.$get_job->end_date; ?></span></li>
				 				<li><h3><i class="fa fa-graduation-cap"></i>Qualification</h3><span><?php echo $get_job->explevel1; ?> </span></li>
				 				<li><h3><i class="fa fa-clock-o"></i> Posted</h3><span><?php echo $get_job->posteddate; ?></span></li>
				 			</ul>
				 		</div>
				 	
				 		<div class="extra-job-info">
				 			<span><i class="la la-clock-o"></i><strong>35</strong> Days</span>
				 			<span><i class="la la-search-plus"></i><strong>35697</strong> Displayed</span>
				 			<span><i class="la la-file-text"></i><strong>300-500</strong> Application</span>
				 		</div>
				 	</div>
			
				</div>
			</div>
		</div>
	</section>
<style>
	.jobdetailslt h3
	{
		font-size:20px;
		    margin: 0;
		}
	.jobdetailsrt h3
	{
		font-size:20px;
		    margin: 0;
		}
	.job-single-sec
	{
		    background: #fff;
    padding: 15px;
		}
	.jobdetailsrt{
		
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
.job-details p, .job-details li {
    float: left;
    width: 100%;
    font-size: 13px;
    color: #888888;
    line-height: 24px;
    margin: 0;
    margin-bottom: 19px;
}
.job-overview span{
	color:#000;
	
	}
	#exampleModal .closeprop{
	
		
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
    </style>

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
		<div class="proposal-mileston-cal">
			<div class="propusal-price">
				<label class="form-group">Fixed rate <span class="currency_symble">$</span>				<input type="number" value="" name="proposal_bid_price" id="proposal_bid_price" placeholder="0.00">
				/ fix	</label>		</div>
			<div class="propusal-price-service-charges" style="display: none">

				<span id="services_charges">0</span>% service <span class="currency_symble">$</span> <span class="service_charges">- 0.00 </span> / fix				  
			</div>
			<div class="propusal-price-cal-result">
				<label class="form-group">You will be paid <span class="currency_symble">$</span>				<input type="number" name="proposal_service_include_bid_price" value="" id="proposal_service_include_bid_price" placeholder="0.00" readonly="">
				 / fix		</label>	</div>
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



