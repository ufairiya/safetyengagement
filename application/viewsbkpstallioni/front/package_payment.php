<div class="container">
    <div class="row">
  <div class="col-md-12 homecontent">

  <div class="">
           <h2 class="headh2">Packages </h2>

        <div class="">
         
          <div class="col-md-12 ">
	
	<!-- Recent Jobs -->
	<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			<div class="listing-title">
			<?php
			$get_sub_package  = $this->packages_model->get_sub_package($get_packages->package_id);


?>
         	
         	<div class="col-lg-4 column jobdetailsrt">
						<span class="pridetail"> <?php echo $get_sub_package->package_name.' | '; ?> Price : $<?php echo $get_sub_package->pkg_amt;?> </span>
							<div class="display-td" >  
<!-- PayPal Logo -->
	<table border="0" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<td align="center"></td>
		</tr>
		<tr>
			<td align="center">
				<a href="" title="How PayPal Works" >
				<img src="<?php echo $base_url; ?>assets/images/logo-center-solution-graphics.png" border="0" alt="PayPal Acceptance Mark">
				</a>
			</td>
		</tr>
	</table>
<!-- PayPal Logo -->
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
				<input type="hidden" name="amount" id="amount" value="<?php echo $get_sub_package->pkg_amt;?>">
				<input type="hidden" name="currency_code" id="currency_code" value="USD">
				<input type="hidden" name="notify_url" value="<?php echo base_url() ?>home/notificationPayment">
				<input type="hidden" name="cancel_return" value="<?php echo base_url() ?>home">
				<input type="hidden" name="return" value="<?php echo base_url() ?>home/thankyou?pid=<?php echo $_GET['pid']; ?>">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="custom" id="custom" value ="<?php echo $get_packages->id;  ?>">
				<input type="hidden" name="item_name" id="item_name" value ="<?php echo $get_sub_package->package_name;?>">
				<button type="submit" class="paypal-button"><span class="paypal-button-title"> Buy now with </span><span class="paypal-logo"><i>Pay</i><i>Pal</i></span></button>
				</form>
			</div>
			<div class="tab-pane" id="tab_default_2">
				<form action="<?php echo BASE_URL;?>/bids/stripe_payment" method="POST" id="paymentFrm" class="stlr_stripe_form form-horizontal">
				
				<input type="hidden" name="payment_type" id="item_name" value ="1">

				<div class="stripe_payment" id='stripe_payment'  >
					<div class="form-group">
							<label class="col-sm-4 control-label">Card Number</label>
						<div class="col-sm-8">
							<input type="text" name="card_num" size="20" autocomplete="off" class="card-number form-control" />
						</div>
					</div>
					<div class="form-group">
							<label class="col-sm-4 control-label">CVC</label>
						<div class="col-sm-8">
							<input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc form-control" />
						</div>
					</div>
					<div class="form-group">
							<label class="col-sm-4 control-label">Expiration (MM/YYYY)</label>
						<div class="col-sm-8">
							<input type="text" name="exp_month" size="2" class="card-expiry-month stlr_expiry_month" maxlength="2"/>
							<span> / </span>
							<input type="text" name="exp_year" size="4" class="card-expiry-year stlr_expiry_year" maxlength="4"/>
						</div>
					</div>
						<input type="hidden" name="pro_id" value="<?php echo $get_packages->id; ?>" class="stlr_stripe_student_id">
						<input type="hidden" name="pro_amt" value="<?php echo $get_sub_package->pkg_amt; ?>" class="stlr_stripe_student_id">
						<input type="hidden" name="pro_pid" value="<?php echo $_GET['pid'];?>" class="stlr_stripe_student_id">
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

               
							
						</div>
				</div><!-- Job Overview -->
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

 <style>
	 .listing-title{color: #000;}
	 table {
    width: 100%;
}

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
	 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

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
