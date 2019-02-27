<?php
//~ echo '<pre>';
//~ print_r($get_service_report);
//~ echo '</pre>';
//~ exit;
?>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/bootstrap-grid.css" >
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/home.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/listeo/css/style.css">
<?php foreach($get_service_report as $get_service_report_details)
{ ?>
<div id="invoice" style="background: #fff;width: auto;max-width: 700px;padding: 20px;margin: 10px auto 60px; border-radius: 4px; ">
			
			<div style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width: 30%;" src="<?php echo $base_url;?>assets/listeo/images/logo-1SS.png" alt=""></div><div class="col-md-6" style="color: #707070;position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;float:right;"><p id="details" style="text-align: ;">
						<strong style="font-weight: 600;color: #333;display: inline-block;">Report:</strong> <?php echo $get_service_report_details->SR_code; ?> <br>
				<strong style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong> <?php echo $get_service_report_details->created_date; ?>
									</p>
				</div>
			</div>


	<!-- Client & Supplier -->
	<div class="" style="display: table;width: 100%;margin-right: -15px;margin-left: -15px;">
		<div class="col-md-12" style="width:100%">
			<h2 style="font-weight: 300;color: #333;clear: both;margin: 0;font-size: 28px;line-height: 1;margin: 15px 0 45px!important;">Service Report</h2>
		</div>

		<div class="col-md-3 sr-prof " style="display: table;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;">
			<p style="margin: 0;font-size: 14px;line-height: 29px;padding-bottom: 0;clear: both;line-height: 27px;">
				<strong style="font-weight: 600;color: #333;display: inline-block;">Name :</strong><br>
				<strong style="font-weight: 600;color: #333;display: inline-block;">Contact No:</strong><br>
				<strong style="font-weight: 600;color: #333;display: inline-block;">Email:</strong><br>
			</p>
			<p style="line-height: 27px;">
				<strong style="font-weight: 600;color: #333;display: inline-block;">Apartment :</strong>
			</p>
		</div>

		<div class="col-md-3 sr-prof" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;">
			<p style="color: #707070;line-height: 27px; margin: 0;">
				<?php echo $get_service_report_details->username ?><br>
				<?php echo $get_service_report_details->phone ?><br>
				<?php echo $get_service_report_details->email ?><br>
			</p>
			<p style="color: #707070;line-height: 27px;">
				<?php echo $get_service_report_details->apartment ?><br>
				<?php echo $get_service_report_details->sr_address ?>
			</p>
		</div>

		<div class="col-md-3" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 12%;float: left;display: table;height: 108px;"></div>
		<div class="col-md-3" style="position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;width: 25%;float:left;">
			<strong style="color: #333;">Service Category</strong>
			<p style="line-height: 27px;color: #707070;"><?php echo $get_service_report_details->task_catname ?></p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="" >
		<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
			<p style="color: #333;">Description</p>
		</div>
		<div class="col-md-12 sr-desc">
			<p style="color: #707070;line-height: 27px;"><?php echo $get_service_report_details->txtdescrip ?>
			<?php if($get_service_report_details->additional_description != '') {?>
			<br><strong class="margin-top-10" style="font-weight: 600;color: #333;">Additional Descriptions (optional):</strong>
			<?php echo $get_service_report_details->additional_description ?></p>
			<?php } ?>
		</div>
		
		<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
			<p style="color: #333;">Job Description</p>
		</div>
		<div class="col-md-12 sr-desc numbered">
			<ol style="counter-reset: li;list-style: none;padding: 0;margin-left: 18px;display: inline-block;    font-size: 16px;">
				<?php
				$jobname = unserialize($get_service_report_details->contcol_jobname);
				$jobprice =unserialize($get_service_report_details->cont_price);
				for($i = 0; $i < count($jobname); $i++)
				{
					echo '<li style="padding: 3px;font-size: 14px;line-height: 18px;color: #707070;">'.$jobname[$i].' -$ '.$jobprice[$i].' </li>';
				}
				?>

			</ol>
		</div>
		<div class="col-md-4 signature">
				<div class="signature-box">
					<img style="width:50%;" src="<?php echo $get_service_report_details->img_sign; ?>" />
				</div>
			<label><?php echo $get_service_report_details->witeness_name; ?></label>
		</div>
	</div>
	
	<!-- Footer -->
	<!-- Footer -->
			<div class="row" style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-12" id="terms" >
			
					
					<ul id="footer" style="width: 100%;border-top: 1px solid #ddd;margin: 60px 0 0;padding: 20px 0 0;list-style: none;font-size: 15px;">
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><span>www.1ss.com.sg</span></li>
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;">+65 6666 5555</li>
					</ul>
				</div>
			</div>
		
</div>
<?php }   ?>

