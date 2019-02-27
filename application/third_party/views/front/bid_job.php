<section>
		<div class="block">
			<div class="container">
				<div class="row">
					      <h2 class="headh2">BID JOBS  </h2>
<?php 
$post_detail = $this->postjob_model->get_job($getbidjobdata->pro_id);
$com_detail = $this->postjob_model->company_info($getbidjobdata->com_id);

?>
				 	<div class="col-lg-8 column jobdetailslt">
				 		<div class="job-single-sec">
				 			<div class="job-single-head">
				 				<div class="job-thumb"> <img src="<?php echo $base_url; ?>assets/images/companyshadow.png" alt=""> </div>
				 				<div class="job-head-info">
				 					<h4><?php echo $post_detail->job_title; ?></h4>
				 					<span><?php echo $com_detail->address; ?></span>

				 					<p><i class="la la-unlink"></i><?php echo $com_detail->weblink; ?></p>

				 					<p><i class="la la-phone"></i> <?php echo $com_detail->companypercellphone; ?></p>
				 					<p><i class="la la-envelope-o"></i> <?php echo $com_detail->companyperemail; ?></p>
				 				</div>
				 			</div><!-- Job Head -->
				 			
				 			<div class="job-details">
				 				<h3>High Level job description</h3>
				 				<p><?php echo $post_detail->highleveljobdesc;  ?></p>
				 				<h3>Work Type (now says Pick Category) Type of safety Qualifications you require
</h3>

				 				<?php if(!empty($post_detail->worktype_desc)){ $worktype_desc = json_decode($post_detail->worktype_desc);  foreach($worktype_desc as $worktype_descval){  ?>
<p> <?php echo $worktype_descval;  ?>	</p> <?php } } ?>	
				 				<h3>Detailed Job Description (what is the task and what deliverables do you require)
</h3>
				 				<p><?php echo $post_detail->job_description;  ?>	</p>
				 			</div>

				 			
				 		</div>
				 	</div> 
				 	
				 	<div class="col-lg-4 column jobdetailsrt">
						<span class="pridetail">Price : $5 </span>
						<div class="display-td" > 
 <form id="select_job" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="select_job" method="POST" >
	 <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
				 		
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="stallioni.vvijay@gmail.com">  
					<input type="hidden" name="amount" id="amount" value="5">
					<input type="hidden" name="currency_code" id="currency_code" value="USD">
					<input type="hidden" name="notify_url" value="<?php echo base_url() ?>home/notificationPayment">
					<input type="hidden" name="cancel_return" value="<?php echo base_url() ?>home">
					<input type="hidden" name="return" value="<?php echo base_url() ?>home/thankyou">
					<input type="hidden" name="rm" value="2">

					<input type="hidden" name="custom" id="custom" value ="<?php echo $getbidjobdata->pro_id; ?>">
					<input type="hidden" name="item_name" id="item_name">
  <p class="apply-thisjob">  <i class="fa fa-legal"></i><input type="submit" name="submit_job" value="Bid a job" ></p>
				 		</form>
				 		
				 		
                   
							
						</div>
<!--
				 		<a class="apply-thisjob" href="#" title=""><i class="la la-paper-plane-o"></i>Submit a job</a>
-->
				 	
				 		<!--<div class="apply-alternative">
				 			<a href="#" title=""><i class="fa fa-linkedin"></i> Apply with Linkedin</a>
				 			<span><i class="la la-heart-o"></i> Shortlist</span>
				 		</div>
-->
				</div><!-- Job Overview -->
  
<!--
				 		<div class="job-location">
				 			<h3>Job Location</h3>
				 			<div class="job-lctn-map">
				 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
				 			</div>
				 		</div>
-->
				 	</div>
				</div>
			</div>
		</div>
	</section>
<style>
#select_job input[type=submit]
{
	    background-color: #fff;
	        color: #ED7D31;
}
	.job-overview i
	{
	    color: #000;	
	    padding:0 3px 0 0;
	}
	span.pridetail{ 
	font-size: 30px;    color: #EB5A1D;
    text-transform: none;
    font-size: 30px;
    }
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
    border: 2px solid #f16c31;
    text-align: center;
    color: #f16c31;
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
    </style>



 <style>

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
  
.margin-ten-bottom
{
	    margin-bottom: 0;
}
.chosen-container-single .chosen-single div b
{
	    display: none !important;
	}



</style>

<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
  <div class="container">
    <div class="row">
  
  </div>
</div>



