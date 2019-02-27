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
								
								<?php if($get_job->job_title){ ?>
							<h3>Job Title</h3>
							<p><?php echo $get_job->job_title ?></p>
							<?php } ?>
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
			
				 	
				 		<!--<div class="apply-alternative">
				 			<a href="#" title=""><i class="fa fa-linkedin"></i> Apply with Linkedin</a>
				 			<span><i class="la la-heart-o"></i> Shortlist</span>
				 		</div>
-->
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
				 				<li><h3>	Job is an Emergency </h3><span> <?php  if($get_job->jobemergency == '1' ){  ?>
                                                    <div class="listing-date new">
														<?php 
															$date=date_create($get_job->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span id="demo_<?php echo $get_job->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                    </div>
                                                    <?php }else{ echo 'No'; } ?></span></li>
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
.listing-date.new {
    border-color: #26ae62;
    background-color: #e9fff3;
    color: #26ae62;
}
.listing-date {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    color: #888;
    display: inline-block;
    border-radius: 3px;
    font-size: 12px;
    padding: 3px 8px;
    line-height: 18px;
    font-weight: 500;
}

</style>

<script>
$(document).ready(function() {
	
 $('[data-demopoid]').each(function () { 
		var proid = $(this).attr('id');
		var demopoid = $(this).data('demopoid');
		
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
