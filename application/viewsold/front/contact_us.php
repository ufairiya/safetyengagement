
<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
<!--
		<div id="singleListingMap" data-latitude="40.70437865245598" data-longitude="-73.98674011230469" data-map-icon="im im-icon-Map2"></div>
-->
		
		<div id="singleListingMap" data-latitude="1.281859" data-longitude="103.813087" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="images/our-office.jpg">
			<div class="office-address">
				<h3>Our Office</h3>
				<ul>
					<li>4002 Depot Lane #01-49</li>
					<li>Singapore 109756</li>
					<li>Phone +65 6666 5555</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->

 
 
<!-- Container / Start -->
<div class="container">
<div class="append"></div>
	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4 margin-bottom-30">

			<h4 class="headline margin-bottom-30">Find Us There</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p>Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>+65 6666 5555</span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>+65 6666 5566</span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">https://1SS.com.sg</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#"><span class="__cf_email__" data-cfemail="98f7fefef1fbfdd8fde0f9f5e8f4fdb6fbf7f5">[email&#160;protected]</span></a></span></li>
				</ul>
			</div>

		</div>
		
		<!-- Contact Form -->
		<div class="col-md-8 margin-bottom-30">

			<section id="contact" >
				<h4 class="headline margin-bottom-35">Feed Back </h4>

				<div id="contact-message"></div> 
					<div class="form">
					<form method="post" name="contactform" id="contactformsubmit" action="<?php echo $base_url?>home/send_contactus" >

					<div class="row">
						<div class="col-md-6">
							<div class="contactdiv">
								<input name="name" type="text" id="name" placeholder="Your Name" />
							</div>
						</div>

						<div class="col-md-6">
							<div class="contactdiv"> 
								<input name="contact_email" type="email" id="contact_email" placeholder="Email Address"/>
							</div>
						</div>
					</div>

					<div class="contactdiv">
						<input name="subject" type="text" id="subject" placeholder="Subject"  />
					</div>

					<div class="contactdiv">
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" ></textarea>
					</div>

					<button type="submit" id="contactfrmsubmit" class="submit button" id="submit" >Submit Message</button>

					</form>
					</div>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->

<!-- Maps -->
    
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBGgdx1uLnu10PW3xodylBZ_R667MbyMOg&callback=initMap&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/global/scripts/infobox.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/global/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/global/scripts/maps.js"></script>

<!--
<script>
$("#contactfrmsubmit").click(function(event){
	
   event.preventDefault();
   
   var name = $("#name").val();
   var email1 = $("#contact_email").val();
   var subject = $("#subject").val();
   var comments = $("#comments").val();
   var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
   
   if(name == '')
   {
		toastr.options = {
		"closeButton": true,
		}
		toastr.error("Please Enter Name", "Notifications");			
   } 
   else if(email1 == '')
   {
		toastr.options = {
		"closeButton": true,
		}
		toastr.error("Please Enter Email", "Notifications");	
   }

	//~ else if(!pattern.test(email1))
	//~ {
		//~ toastr.options = {
		//~ "closeButton": true,
		//~ }
		//~ toastr.error("Not a valid e-mail address", "Notifications");	
		
	   //~ //alert('not a valid e-mail address');
	//~ }​
 
   else if(subject == '')
   {
		toastr.options = {
		"closeButton": true,
		}
		toastr.error("Please Enter Subject", "Notifications");	
	}
	else if(comments == '')
	{
		toastr.options = {
		"closeButton": true,
		}
		toastr.error("Please Enter Comment", "Notifications");	
	}	
    else if(name != '' && email1 != '' && subject != '' && comments != '')
    {
		$("#contactformsubmit")[0].submit();
		return true;
	}

});
</script>
-->


	<script type="text/javascript">
	 $(document).ready(function(){
		 var form1 = $('#contactformsubmit');
		 var error1 = $('.alert-danger', form1);
		 var success1 = $('.alert-success', form1);
		 form1.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "", // validate all fields including form hidden input
			messages: {              
				'name': {
					required: 'Name is required',
				},
				'contact_email': {
					
					required: 'Email is required',
					email: 'Invalid Email',
				},
				'subject': {
					required: 'Subject is required',
				},
				'comments': {
					required: 'Please enter your message',
				},
				
				
			},
			 rules: {
			 name: {
					required: true
				},
			 contact_email: {
					required: true,
					email:true,
				},
				subject: {
					required: true
				},
				comments: {
					required: true
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
			   // form.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>home/send_contactus',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){  
						if(response == 1) 
						{
							toastr.options = {
							"closeButton": true,
							}
							toastr.success("We have receive your message and will contact you shortly.");
							setTimeout(function(){
							location.reload();
							}, 2000);
								
						 
						}
						else
						{
							
							toastr.options = {
							"closeButton": true,
							}
							toastr.success("There is an error sending out your message. Please try again later.");
							setTimeout(function(){
							location.reload();
							}, 2000);
							
						}        

					}
				});
			}
		});	
	});
	</script>


		
