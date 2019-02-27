<?php
//~ echo '<pre>';
//~ print_r($get_service_report);
//~ echo '</pre>';
//~ exit;
?>
<link rel="stylesheet" href="http://stallioni.net/B279/assets/datetimedrapper/css/bootstrap-grid.css" >
<link rel="stylesheet" href="http://stallioni.net/B279/assets/datetimedrapper/css/home.css">
<link rel="stylesheet" href="http://stallioni.net/B279/assets/listeo/css/style.css">

<div id="invoice" style="background: #fff;width: auto;max-width: 700px;padding: 20px;margin: 10px auto 60px; border-radius: 4px; ">
			
			<div style="margin-right: -15px;margin-left: -15px;">
				<div class="col-md-2" style="float:left;position: relative;min-height: 1px;padding-left: 15px; padding-right: 15px;"><img style="width: 30%;" src="<?php echo $base_url;?>assets/listeo/images/logo-1SS.png" alt=""></div>
				<div class="col-md-6" style="color: #707070;position: relative;min-height: 1px;padding-left:15px;padding-right: 15px;float:right;">
					
					<p id="details" style="text-align: ;">
						<?php if(!empty($get_service_report->img_sign)) { ?>	<div >Paid</div> <?php } ?>
						<strong style="font-weight: 600;color: #333;display: inline-block;">Order:</strong> <?php echo $get_service_report->invoice_id; ?> <br>
				<strong style="font-weight: 600;color: #333;display: inline-block;">Issued:</strong> <?php echo $get_service_report->created_date; ?>
									</p>
				</div>
			</div>

	<!-- Client & Supplier -->
				<div class="row">
					<div class="col-md-12">
						<h2>Invoice</h2>
					</div>

					<div class="col-md-6">	
						<strong class="margin-bottom-5">Supplier</strong>
						<p>
							1SS Pte. Ltd. <br>
							4002 Depot Lane #01-49 <br>
							Singapore 109756
						</p>
					</div>

					<div class="col-md-6">	
						<strong class="margin-bottom-5">Customer</strong>
						<p>
							<?php echo $get_service_report->username; ?> <br>
							<?php echo $get_service_report->email; ?>
						</p>
					</div>
				</div>


				<!-- Invoice -->
				<div class="row">
					<div class="col-md-12">
						<table class="margin-top-20">
							<tr>
								<th>Description</th>
								<th>Estimated Cost</th>
							</tr>
							<?php
							$jobname = unserialize($get_service_report->contcol_jobname);
							$jobprice = unserialize($get_service_report->cont_price);
							
							for($i = 0; $i < count($jobname); $i++)
							{
								echo '<tr>
								<td>'.$jobname[$i].'</td> 
								<td> $'.$jobprice[$i].'</td>
								</tr>';
							}
							?>
							<?php if (!empty($get_service_report->additional_description)) {  ?>

							<tr>
								<th>Additonal Description</th>
								<th></th>								
							</tr>
							
							<?php
								echo '<tr>
								<td>'.$get_service_report->additional_description.'</td> 
								<td></td>
								</tr>';
				
							} ?>
						</table>
					</div>
					
					<div class="col-md-4 col-md-offset-8">	
						<table id="totals">
							<tr>
								<th>Total Due</th> 
								<th><span><?php echo '$'.array_sum($jobprice); ?></span></th>
							</tr>
						</table>
					</div>
				</div>

				<!-- Footer -->
				<div class="row">
					<div class="col-md-12" id="terms">
						<ul id="footer">
							<li><span>https://1SS.com.sg</span></li>
							<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
							<li>+65 6666 5555</li>
						</ul>
					</div>
				</div>
						
</div>


