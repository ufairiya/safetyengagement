<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/bootstrap-grid.css" >
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/datetimedrapper/css/home.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/listeo/css/style.css">
<?php $jobname = unserialize($craetepurchaseorder->p_jobname);
	  $jobprice = unserialize($craetepurchaseorder->p_jobprice); ?>
<div id="invoice" style="background: #fff;width: auto;max-width: 900px;padding: 60px;margin: 30px auto 60px; border-radius: 4px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.3);"><div style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width:20%;" src="<?php echo $base_url; ?>assets/listeo/images/logo-1SS.png" alt=""></div><div class="col-md-6" style="position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;width: 50%;float:right;"><p id="details" style="text-align: right;">
						<strong style="font-weight: 600;color: #333;display: inline-block;">Order:</strong><?php echo $craetepurchaseorder->p_sr_code; ?> <br>
						<strong  style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong><?php echo $craetepurchaseorder->p_issue_date; ?><br>
						Due 7 days from date of issue
					</p>
				</div>
			</div><div class="row" style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-12" style="color: #707070;font-size: 15px;line-height: 27px;width:100%;float: left;"><h2 style="  font-weight: 300;color: #333;clear: both;margin: 0;font-size: 28px;line-height: 1;margin: 15px 0 45px!important;">Purchase Order</h2>
				</div><div class="col-md-6" style="color: #707070;font-size: 15px;line-height: 27px;width: 40%;float:left;" >	
					<strong class="margin-bottom-5" style="font-weight: 600;font-size: 20px;color: #333;display: inline-block;margin-bottom:5px">Supplier</strong>
					<p style=" color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;"><?php echo $craetepurchaseorder->p_address; ?></p></div><div class="col-md-6" style="width: 40%;"></div>
				<div class="col-md-6" style="width: 40%;float:right;">	
					<strong class="margin-bottom-5" class="margin-bottom-5" style="font-weight: 600;color: #333;display: inline-block;margin-bottom:5px;font-size: 16px;line-height:29px;">Customer</strong>
					<p style="    background-color: white;color: #707070;font-size: 15px;line-height: 27px;padding-bottom: 40px;clear: both;">
						<?php echo $craetepurchaseorder->p_first_name.'<br>'.$craetepurchaseorder->p_email; ?>
						
					</p>
				</div>
			</div><!-- Invoice --><div class="row" style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-12" style="width:100%">
					<table class="margin-top-20" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;">
						<tr style="border-bottom: unset;color: #707070; font-size: 15px;line-height: 27px;display: table-row;vertical-align: inherit;padding: 15px 0;text-align: left;"><th style="font-weight: 700;border-bottom: 1px solid #ddd;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Description</th>
							<th style="font-weight:700;border-bottom:1px solid #ddd;font-size:16px;color:#333;padding:15px 0;text-align:right">Estimated Cost</th>
						</tr><tr class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;"><?php echo date('d/m/Y',strtotime($craetepurchaseorder->p_booking_date)).' at '.strtolower($craetepurchaseorder->p_booking_time); ?> </td></tr>
						<?php 
						for($i=0; $i<count($jobname);$i++)
						{ ?>
								<tr style="color: #707070; font-size: 15px;line-height: 27px;" class="po_border"><td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align: left;"><?php echo $jobname[$i];?> </td>
								<td style="font-weight: 100; border-bottom: unset;color: #707070;font-size: 16px;padding: 15px 0;text-align:right;"><?php echo '$'.$jobprice[$i]; ?></td></tr>
						
						<?php  } ?>
									
					</table>
				</div><div class="col-md-4 col-md-offset-8" style="margin-left: 66.66666667%;" >	
					<table id="totals" style="width: 100%;margin: 0 0 30px;padding: 1px 0;border-spacing: 0;border-bottom: 1px solid #ddd;margin-top:20px;">
						<tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
							<th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: left;">Total Due</th> 
							<th style="font-weight: 700;font-size: 16px;color: #333;padding: 15px 0;text-align: right;" ><span style="  position: relative;display: inline-block; height: 100%;"><?php echo '$'.array_sum($jobprice); ?></span></th>
						</tr>
					</table>
				</div>
			</div><!-- Footer -->
			<div class="row" style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-12" id="terms" >
					<p style="font-size: .9em;line-height: 1.3em;padding: 20px 0 60px; display: block;"><strong class="margin-bottom-5"  style="font-weight: 600;color: #333;margin-bottom:5px; display: block;padding-bottom: 10px;">Terms &amp; Conditions</strong>
					very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here...</p>
					
					<ul id="footer" style="width: 100%;border-top: 1px solid #ddd;margin: 60px 0 0;padding: 20px 0 0;list-style: none;font-size: 15px;">
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><span>www.stallioni.com</span></li>
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
						<li style="display: inline-block;padding: 0 20px;border-right: 1px solid #ddd;line-height: 11px;">+65 6666 5555</li>
					</ul>
				</div>
			</div>
				
		</div>
				
				

<link src="<?php echo $base_url; ?>assets/listeo/css/style.css">
