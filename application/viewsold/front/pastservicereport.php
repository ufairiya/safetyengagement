<?php
//~ echo '<pre>';
//~ print_r($get_service_report_details);
//~ echo '</pre>';
//~ exit;
?>
<?php echo $this->session->flashdata('reportsuccess');?>
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img style="width: 100px;" src="<?php echo $base_url;?>assets/listeo/images/logo-1SS.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Report:</strong> <?php echo $get_service_report_details->SR_code; ?> <br>
				<strong>Issued:</strong> <?php echo $get_service_report_details->created_date; ?>
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="row">
		<div class="col-md-12">
			<h2>Service Report</h2>
		</div>


	<div class="col-md-6 sr-prof">
				
					<strong  class="col-md-6 col-sm-3 leftrightreduce">Name :</strong> <label class="col-md-6 col-sm-3  leftrightreducerigt"><?php echo $get_service_report_details->username; ?></label>
					<div class="clear"></div>
					
					<strong class="col-md-6 col-sm-3 leftrightreduce">Contact No:</strong>
					<label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_service_report_details->phone; ?></label>
					<div class="clear"></div>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Email:</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_service_report_details->email; ?></label>
				
				<p>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Apartment :</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_service_report_details->apartment; ?><br>
				<?php echo $get_service_report_details->sr_address; ?></label>
				</p>
			</div>

			
					<div class=""></div>

			<div class="col-md-3">
			</div>
								<div class=""></div>

		
		<div class="col-md-3">
			<strong>Service Category</strong>
			<p><?php echo $get_service_report_details->task_catname ?></p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="row">
		<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
			<p>Description</p>
		</div>
		<div class="col-md-12 sr-desc">
			<p><?php echo $get_service_report_details->txtdescrip ?>
			<?php if($get_service_report_details->additional_description != '') {?>
			<br><strong class="margin-top-10">Additional Descriptions (optional):</strong>
			<?php echo $get_service_report_details->additional_description ?></p>
			<?php } ?>
		</div>
		
		<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
			<p>Job Description</p>
		</div>
		<div class="col-md-12 sr-desc numbered">
			<ol>
				<?php
				$jobname = unserialize($get_service_report_details->contcol_jobname);
				$jobprice =unserialize($get_service_report_details->cont_price);
				for($i = 0; $i < count($jobname); $i++)
				{
					echo '<li>'.$jobname[$i].' -$ '.$jobprice[$i].' </li>';
				}
				?>

			</ol>
		</div>
		<div class="col-md-4 signature">
				<div class="signature-box past-sign-box">
					<img src="<?php echo $get_service_report_details->img_sign; ?>" />
				</div>
			<label><?php echo $get_service_report_details->witeness_name; ?></label>
		</div>
	</div>
	
	<!-- Footer -->
	<div class="row">
		<div class="col-md-12" id="terms">
			<ul id="footer">
				<li><span>www.1ss.com.sg</span></li>
				<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
				<li>+65 6666 5555</li>
			</ul>
		</div>
	</div>
		
</div>
