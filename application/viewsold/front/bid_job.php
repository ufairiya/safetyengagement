<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

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
				 				<h3>Work Type (now says Pick Category) Type of safety Qualifications you require</h3>

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
<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="" title="How PayPal Works" ><img src="<?php echo $base_url; ?>assets/images/logo-center-solution-graphics.png" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table><!-- PayPal Logo -->
								<div class="col-md-12">
		
			<div class="tabbable-panel">
				<div class="tabbable-line">
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
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
													
 <form id="select_job" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="select_job" method="POST" >
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="stallioni.vvijay@gmail.com">  
					<input type="hidden" name="amount" id="amount" value="5">
					<input type="hidden" name="currency_code" id="currency_code" value="USD">
					<input type="hidden" name="notify_url" value="<?php echo base_url() ?>home/notificationPayment">
					<input type="hidden" name="cancel_return" value="<?php echo base_url() ?>home">
					<input type="hidden" name="return" value="<?php echo base_url() ?>home/thankyou">
					<input type="hidden" name="rm" value="2">

					<input type="hidden" name="custom" id="custom" value ="<?php echo $getbidjobdata->pro_id;  ?>">
					<input type="hidden" name="item_name" id="item_name">
				

<!--
  <p class="apply-thisjob">  <i class="fa fa-paper-plane-o"></i><input type="submit" name="submit_job" value="Submit a job" ></p>
-->
  				 		  <button type="submit" class="paypal-button"><span class="paypal-button-title"> Buy now with </span><span class="paypal-logo"><i>Pay</i><i>Pal</i></span></button>

 
				 		</form>
				 		
		
						</div>
						<div class="tab-pane" id="tab_default_2">
							 		 <form action="<?php echo BASE_URL;?>/bids/stripe_payment" method="POST" id="paymentFrm" class="stlr_stripe_form form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Type:</label>
                        <div class="col-sm-5">
                           
                            <select id="mySelect" class="form-control payment_type" name="payment_type" onchange="payment_type_value123()">
                                <option value="">SELECT</option>
                                <option value="1">Stripe Payment</option>
                            </select>
                        </div>
                    </div>

                    <div class="stripe_payment" id='stripe_payment'  >
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Card Number</label>
                        <div class="col-sm-5">
                            <input type="text" name="card_num" size="20" autocomplete="off" class="card-number form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">CVC</label>
                        <div class="col-sm-5">
                            <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Expiration (MM/YYYY)</label>
                        <div class="col-sm-5">
                            <input type="text" name="exp_month" size="2" class="card-expiry-month form-control stlr_expiry_month" maxlength="2"/>
                            <span> / </span>
                            <input type="text" name="exp_year" size="4" class="card-expiry-year form-control stlr_expiry_year" maxlength="4"/>
                        </div>
                    </div>

<!--
                    <input type="hidden" name="stlr_stripe_parent_email" value="<?php echo $post_detail->email;?>" class="stlr_stripe_parent_email">
-->
                    <input type="hidden" name="pro_id" value="<?php echo $getbidjobdata->pro_id; ?>" class="stlr_stripe_student_id">

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" id="payBtn" value="Submit" class="btn btn-info" />        
                        </div>
                    </div>
                    </div>

                     </form>
          
				 		
				 	
						</div>
							</div>
				</div>
			</div>

			</div>
			
                   
							
		
<!--
							po_id company_userid job_file city state zipcode detailed_pic equipment_pic finalrep_pic project_pic certificates_pic insurance_certificate budget_img job_title job_description equipment finalrep information industry internship project start_date end_date jobemergency worktype_desc explevel1 thirdpartapprov insurance budget
-->
               
							
						</div><!--
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

.apply-thisjob input[type=submit]:hover {
    background-color: #fff;
}
.paypal-logo i:first-child {
    color: #253b80;
}
.paypal-logo i:last-child {
    color: #179bd7;
}

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


