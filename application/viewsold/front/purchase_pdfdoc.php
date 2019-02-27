
<link rel="stylesheet" href="http://stallioni.net/B279/assets/datetimedrapper/css/bootstrap-grid.css" >
<link rel="stylesheet" href="http://stallioni.net/B279/assets/datetimedrapper/css/home.css">
<link rel="stylesheet" href="http://stallioni.net/B279/assets/listeo/css/style.css">

<?php
$jobtitle = unserialize($get_purchaseorderdata->p_jobname);
$jobprice = unserialize($get_purchaseorderdata->p_jobprice);
?>
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img style="width: 100px;" src="<?php echo $base_url; ?>/assets/listeo/images/logo-1SS.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Order:</strong>  <?php echo $get_purchaseorderdata->p_sr_code; ?> <br>
				<strong>Issued:</strong> <?php echo $get_purchaseorderdata->p_issue_date; ?> <br>
				Due 7 days from date of issue
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="row">
		<div class="col-md-12">
			<h2>Purchase Order</h2>
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
				<?php echo $get_purchaseorderdata->p_first_name; ?> <br>
				<?php echo $get_purchaseorderdata->p_email; ?><br>
				
				<?php echo $get_purchaseorderdata->p_address;?>
			</p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="row">
		<div class="col-md-12">
			<table class="change_th margin-top-20">
				<tr>
					<th>Description</th>
					<th>Estimated Cost</th>
				</tr>
				<?php
						for($i=0;$i<count($jobtitle);$i++)
						{
							echo '<tr class="po_border">';
							echo '<th>'.$jobtitle[$i].'</th>';
							echo '<th>'.'$'.$jobprice[$i].'</th>';
							echo '</tr>';
						}
					?>
				
			</table>
		</div>
		
		<div class="col-md-4 col-md-offset-8">	
			<table id="totals">
				<tr>
					<th>Total Due</th> 
					<th><span>$ <?php echo array_sum($jobprice); ?></span></th>
				</tr>
			</table>
		</div>
	</div>
	

	<!-- Footer -->
	<div class="row">
		<div class="col-md-12" id="terms">
			<p><strong>Terms &amp; Conditions</strong>
			very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here...</p>
			<div class="checkboxes">
				<input id="cnf" class="cnf" type="checkbox" ><label for="cnf">I agree to the terms &amp; conditions</label>
			</div>
			<div class="btns" style="display:block">
				<a id="confirmbtn" href="" class="confirmbtn button gray" ><i class="sl sl-icon-check"></i>Confirm</a>
				<a href="" id="decline" class="button gray"><i class="sl sl-icon-close"></i>Decline</a>
				<!-- Print Button -->
				<a href="javascript:window.print()" class="print-button button"><i class="sl sl-icon-printer"></i>Print</a>
			</div>
			<ul id="footer">
				<li><span>https://1SS.com.sg</span></li>
				<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
				<li>+65 6666 5555</li>
			</ul>
		</div>
	</div>
		
</div>

<link src="<?php echo $base_url; ?>assets/listeo/css/style.css">
