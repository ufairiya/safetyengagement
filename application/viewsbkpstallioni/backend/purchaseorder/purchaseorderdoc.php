
<link rel="stylesheet" type="text/css" href="<?php echo $base_url?>assets/datetimedrapper/css/home.css?>">
<style>
	#purchaseorder
	{
		float: right;  
		background: #f91942;
		color: #fff;
		padding: 10px;
		width: 100px;
		text-align: center;
	}
</style>
<div class="dashboard-content">
<?php
//~ echo '<pre>';
//~ print_r($purchase_order_details);
//~ echo '</pre>';
$jobtitle = unserialize($purchase_order_details->p_jobname);
$jobprice = unserialize($purchase_order_details->p_jobprice);
?>
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img src="<?php echo $base_url?>assets/listeo/images/logo.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Order:</strong> <?php echo $purchase_order_details->p_sr_code; ?> <br>
				<strong>Issued:</strong> <?php echo $purchase_order_details->p_issue_date; ?> <br>
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
				<?php echo $purchase_order_details->p_address;?>
			</p>
		</div>

		<div class="col-md-6">	
			<strong class="margin-bottom-5">Customer</strong>
			<p>
				<?php echo $purchase_order_details->first_name;?><br>
				<?php echo $purchase_order_details->email;?>
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
				<tr class="po_border">	
					<th style="text-transform: unset !important;">	<?php echo date('d/m/Y',strtotime($purchase_order_details->p_booking_date)).' at '.			strtolower($purchase_order_details->p_booking_time);?>
					</th>
					<th></th>
				</tr>
					<?php
						for($i=0;$i<count($jobtitle);$i++)
						{
							echo '<tr>';
							echo '<th>'.$jobtitle[$i].'</th>';
							echo '<th>$'.$jobprice[$i].'</th>';
							echo '</tr>';
						}
					?>
				
				
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
			<div class="btns" style="display:none">
				<a href="l-request-nc.html" class="button gray"><i class="sl sl-icon-check"></i>send</a>
				
			</div>
			
			<ul id="footer">
				<li><span>https://1SS.com.sg</span></li>
				<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfd0d9d9d6dcdaffdac7ded2cfd3da91dcd0d2">[email&#160;protected]</a></li>
				<li>+65 6666 5555</li>
			</ul>
		</div>
	</div>
	
	
		
</div>


</div>
<link src="<?php echo $base_url; ?>assets/listeo/css/style.css">
<script type="text/javascript">
//~ function valueChanged()
//~ {
    //~ if($('.cnf').is(":checked"))   
        //~ $(".btns").show();
    //~ else
        //~ $(".btns").hide();
//~ }

//~ $("#purchaseorder").click(function()
//~ {
	//~ event.preventDefault();
	//~ var id = '<?php echo $taskid; ?>';
	//~ jQuery.ajax({
	//~ url : '<?php echo $base_url?>admin/purchaseorder/changestatustoawaiting',
	//~ type: 'POST',
	//~ data: {id_val:id},
		//~ success:function(response){
			//~ toastr.options = {
				//~ "closeButton": true,
			//~ }
			//~ toastr.success("Successfully Send", "Notifications");
			//~ window.location = "http://stallioni.net/B279/admin/purchaseorder/createpurchaseorder";
		//~ }
	//~ });
//~ });

</script>
