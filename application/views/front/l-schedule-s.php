

<!-- Content
================================================== -->
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img src="http://stallioni.net/B279/assets/listeo/images/logo.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Report:</strong> SR20171231AS001 <br>
				<strong>Issued:</strong> 12/01/2018
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="row">
		<div class="col-md-12">
			<h2>Service Report</h2>
		</div>

		<div class="col-md-3 sr-prof">
			<p>
				<strong>Name :</strong><br>
				<strong>Contact No:</strong><br>
				<strong>Email:</strong><br>
			</p>
			<p>
				<strong>Apartment :</strong>
			</p>
		</div>

		<div class="col-md-3 sr-prof">
			<p>
				John Smith<br>
				+65 9999 8888<br>
				john@example.com<br>
			</p>
			<p>
				John's Residence<br>
				Rivercrest Drive Blk 321A #03-05, Singapore 540321
			</p>
		</div>

		<div class="col-md-3">
		</div>
		<div class="col-md-3">
			<strong>Service Category</strong>
			<p>Air-conditional Services</p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="row">
		<div class="col-md-12 sr-hdr margin-bottom-10">
			<p>Description</p>
		</div>
		<div class="col-md-12 sr-desc">
			<p>Faulty Compressor producing loud noise. Suspect fan blade is faulty and require re-oil of engine turbine.
			<br><strong class="margin-top-10">Additional Descriptions (optional):</strong>
			Air-conditional is no longer cool. Requires refill of gas.</p>
		</div>
		
		<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
			<p>Job Description</p>
		</div>
		<div class="col-md-12 sr-desc numbered">
			<ol>
				<li>Mandatory Charge</li>
				<li>Fan Blade replacement</li>
				<li>Oil turbine</li>
				<li>Refill Gas - $40</li>
			</ol>
		</div>
		<div class="col-md-4 signature">
			<a href="#">
				<div class="signature-box">
					<!-- Upon clicking on this div, a overlay with signature box should appear for witness to sign on.
					<img src="images/signature.png" />
					-->
				</div>
			</a>
			<!-- Job requester name will appear on witness textbox by default -->
			<label>Witness: </label><input type="text" value="John Smith" />
		</div>
	</div>
	<a href="<?php echo $base_url; ?>schedule/pastassignment" class="button margin-top-20">Submit</a>

	
</div>

