<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<section>
		<div class="block">
			<div class="container">
				<div class="row">
					      <h2 class="headh2">POST JOBS DETAILS </h2>

				 	<div class="col-lg-8 column jobdetailslt">
				 		<div class="job-single-sec">
				 			<div class="job-single-head">
				 				<div class="job-thumb"> <img src="<?php echo $base_url; ?>assets/images/companyshadow.png" alt=""> </div>
				 				<div class="job-head-info">
				 					<h4><?php echo $getcompanypostdata->job_title; ?></h4>
				 					<span><?php echo $getcompanypostdata->address; ?></span>

				 					<p><i class="la la-unlink"></i><?php echo $getcompanypostdata->weblink; ?></p>

				 					<p><i class="la la-phone"></i> <?php echo $getcompanypostdata->companypercellphone; ?></p>
				 					<p><i class="la la-envelope-o"></i> <?php echo $getcompanypostdata->companyperemail; ?></p>
				 				</div>
				 			</div><!-- Job Head -->
				 			
				 			<?php //echo "<pre>"; print_r($getcompanypostdata); ?>
				 			<div class="job-details">
				 				<h3>High Level job description</h3>
				 				<p><?php echo $getcompanypostdata->highleveljobdesc;  ?></p>
				 				<h3>Work Type (now says Pick Category) Type of safety Qualifications you require</h3>
<!--
				 				<ul>
				 					<li>Ability to write code – HTML &amp; CSS (SCSS flavor of SASS preferred when writing CSS)</li>
				 					<li>Proficient in Photoshop, Illustrator, bonus points for familiarity with Sketch (Sketch is our preferred concepting)</li>
				 					<li>Cross-browser and platform testing as standard practice</li>
				 					<li>Experience using Invision a plus</li>
				 					<li>Experience in video production a plus or, at a minimum, a willingness to learn</li>
				 				</ul> <?php $worktype_desc = json_decode($getcompanypostdata->worktype_desc);  foreach($worktype_desc as $worktype_descval){  ?>
-->	<p> <?php echo $worktype_descval;  ?>	</p> <?php } ?>	
				 				<h3>Detailed Job Description (what is the task and what deliverables do you require)
</h3>
				 				<p><?php echo $getcompanypostdata->job_description;  ?>	</p>
				 			</div>
<!--
				 			<div class="share-bar">
				 				<span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
				 			</div>
-->
				 			<div class="recent-jobs">
				 				
				 				<div class="job-list-modern">
								 		<!-- Recent Jobs -->

	
								 </div>
				 			</div>
				 		</div>
				 	
				 	</div>   
				 	<div class="col-lg-4 column jobdetailsrt">
<!--
						<span class="pridetail">Price : $5 </span>
-->
						<div class="display-td" >  
<!-- PayPal Logo -->
<!--
<table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="" title="How PayPal Works" ><img src="<?php echo $base_url; ?>assets/images/logo-center-solution-graphics.png" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table><!-- PayPal Logo -->
-->
								<div class="col-md-12">
		
			<div class="tabbable-panel">
				<div class="tabbable-line">
<!--
					<ul class="nav nav-tabs ">
						<li class="col-md-6 active">
							<a href="#tab_default_1" data-toggle="tab">
							<img width="100%" src="<?php echo $base_url; ?>assets/images/paypal.png "></a>
						</li>
						<li class="col-md-6">
							<a href="#tab_default_2" data-toggle="tab">
								<img width="100%" src="<?php echo $base_url; ?>assets/images/stripe.png "> </a>
						</li>
					
					</ul>
-->
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							 <form id="select_job" action="<?php echo $base_url; ?>" name="select_job" method="POST" >

<!--
								                            <input type="hidden" name="po_id" value="<?php echo $getcompanypostdata->po_id;  ?>" />  

								                            <p class="apply-thisjob">  <input type="submit" name="submit_job" value="Post A job" id="submit_job"></p>
-->
 </form>

<!--
													
 <form id="select_job" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="select_job" method="POST" >
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="stallioni.vvijay@gmail.com">  
					<input type="hidden" name="amount" id="amount" value="5">
					<input type="hidden" name="currency_code" id="currency_code" value="USD">
					<input type="hidden" name="notify_url" value="<?php echo base_url() ?>home/notificationPayment">
					<input type="hidden" name="cancel_return" value="<?php echo base_url() ?>home">
					<input type="hidden" name="return" value="<?php echo base_url() ?>home/thankyou_postjob">
					<input type="hidden" name="rm" value="2">

					<input type="hidden" name="custom" id="custom" value ="<?php echo $getcompanypostdata->po_id;  ?>">
					<input type="hidden" name="item_name" id="item_name">
				<?php echo $getcompanypostdata->job_status; if($getcompanypostdata->job_status == 1){  ?>	
						


  				 		  <button type="submit" class="paypal-button"><span class="paypal-button-title"> Buy now with </span><span class="paypal-logo"><i>Pay</i><i>Pal</i></span></button>

  <?php } else{ ?>
	    <p class="apply-thisjob">  <i class="fa fa-check"></i>Paid</p>
	  
	  <?php } ?>
				 		</form>
-->
				 		
		
						</div>
						<div class="tab-pane" id="tab_default_2">
<!--
							 		<form action="<?php echo BASE_URL;?>/job/stripe_payment" method="POST" id="paymentFrm" class="stlr_stripe_form form-horizontal">

                    <div class="form-group">
                        <label class="scontrol-label">Payment Type:</label>
                     
                           
                            <select id="mySelect" class="form-control payment_type" name="payment_type" onchange="payment_type_value123()">
                                <option value="">SELECT</option>
                                <option value="1">Stripe Payment</option>
                            </select>
                       
                    </div>

                    <div class="stripe_payment" id='stripe_payment'  >
                    <div class="form-group">
                        <label class=" control-label">Card Number</label>
                            <input type="text" name="card_num" size="20" autocomplete="off" class="card-number form-control" />
                       
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">CVC</label>
                        
                            <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc form-control" />
                     
                    </div>
                    <div class="form-group">
                        <label class="control-label">Expiration (MM/YYYY)</label>
                       
                            <input type="text" name="exp_month" size="2" maxlength="2"/>
                            <span> / </span>
                            <input type="text" name="exp_year" size="4"  maxlength="4"/>
                        
                    </div>


                    <input type="hidden" name="pro_id" value="<?php echo $getcompanypostdata->po_id; ?>" class="stlr_stripe_student_id">

                    <div class="form-group">
                        <div class="">


                           <button type="submit" class="paypal-button"><span class="paypal-button-title"> Buy now with </span><img width="30%" src="<?php echo $base_url; ?>assets/images/stripe.png "></button>      
                        </div>
                    </div>
                    </div>

                     </form>
				 		
				 	
-->
						</div>
							</div>
				</div>
			</div>

			</div>
			
                   
							
		
<!--
							po_id company_userid job_file city state zipcode detailed_pic equipment_pic finalrep_pic project_pic certificates_pic insurance_certificate budget_img job_title job_description equipment finalrep information industry internship project start_date end_date jobemergency worktype_desc explevel1 thirdpartapprov insurance budget
-->
               
							
						</div>
				 	
				 		<!--<div class="apply-alternative">
				 			<a href="#" title=""><i class="fa fa-linkedin"></i> Apply with Linkedin</a>
				 			<span><i class="la la-heart-o"></i> Shortlist</span>
				 		</div>
-->
				 		<div class="job-overview">
				 			<h3>Job Overview</h3>
				 			<ul>
				 				<li><h3><i class="fa fa-money"></i>	budget </h3><span><?php echo $getcompanypostdata->budget; ?></span></li>
				 				<li><h3><i class="fa fa-industry"></i>Industry</h3><span><?php echo $getcompanypostdata->industry; ?></span></li>
				 				<li><h3><i class="fa fa-child"></i></i>Internship</h3><span><?php echo $getcompanypostdata->internship; ?></span></li>
				 				<li><h3><i class="fas fa-calendar-alt"></i>Date</h3><span><?php echo $getcompanypostdata->start_date.' - '.$getcompanypostdata->end_date; ?></span></li>
				 				<li><h3><i class="fa fa-graduation-cap"></i>Qualification</h3><span><?php echo $getcompanypostdata->explevel1; ?> </span></li>
				 				<li><h3><i class="fa fa-clock-o"></i> Posted</h3><span><?php echo $getcompanypostdata->posteddate; ?></span></li>
				 			</ul>
				 		</div><!-- Job Overview -->
<!--
				 		<div class="job-location">
				 			<h3>Job Location</h3>
				 			<div class="job-lctn-map">
				 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
				 			</div>
				 		</div>
-->
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
	.paypal-button {
    padding: 15px 30px;
    border: 1px solid #FF9933;
    border-radius: 5px;
    background-image: linear-gradient(#fff0a8, #f9b421);
    margin: 0 auto;
    display: block;
    min-width: 138px;
    position: relative;
}
	</style>
<style>
.apply-thisjob input[type=submit]:hover {
    background-color: #fff;
}
.paypal-logo i:first-child {
    color: #253b80;
}
.paypal-logo i:last-child {
    color: #179bd7;
}
</style>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_XCYqdDIIwJWQ1JJ7OQqo4ptl');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>
