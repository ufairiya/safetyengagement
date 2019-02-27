<?php
$jobtitle = unserialize($purchase_order_details->p_jobname);
$jobprice = unserialize($purchase_order_details->p_jobprice);
?>
<?php //var_dump($purchase_order_details); ?>
<div id="invoice">
	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img style="width: 100px;" src="<?php echo $base_url;?>/assets/listeo/images/logo-1SS.png" alt=""></div>
		</div>
		<div class="col-md-6">	
			<p id="details">
				<strong>Order:</strong>  <?php echo $purchase_order_details->p_sr_code; ?> <br>
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
				1SS Pte. Ltd. <br>
				4002 Depot Lane #01-49 <br>
				Singapore 109756
			</p>
				
		</div>
		<div class="col-md-6">	
			<strong class="margin-bottom-5">Customer</strong>
			<p>
				<?php echo $purchase_order_details->first_name;?> <br>
				<?php echo $purchase_order_details->email;?> <br>
				<?php echo $purchase_order_details->p_address;?>

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
				<?php	for($i=0;$i<count($jobtitle);$i++)
				{
					echo '<tr>';
					echo '<td>'.$jobtitle[$i].'</td>';
					echo '<td>'.'$'.$jobprice[$i].'</td>';
					echo '</tr>';
				} ?>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-8">	
			<table id="totals">
				<tr>
					<th>Total Due</th> 
					<th><span>$<?php echo array_sum($jobprice); ?></span></th>
				</tr>
			</table>
		</div>
	</div>
	<!-- Footer -->
	<div class="row">
		<div class="col-md-12" id="terms">
			<p><strong>Terms &amp; Conditions</strong>
				very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here... very long terms and conditions here...
			</p>
			<div class="checkboxes">
				<input id="cnf"  onchange="valueChanged()" class="cnf checkedcolor" <?php if( $purchase_order_details->statustask == 3 || $purchase_order_details->statustask == 6){ echo "checked";} ?> type="checkbox" onchange="valueChanged()"><label for="cnf">I agree to the terms &amp; conditions</label>
			</div>
			<div class="btns" style="display:none">
				
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
<script type="text/javascript">
	$(document).ready(function(e) {
	    if($('.cnf').is(":checked"))   
        {$(".btns").show();
						    $(".cnf").attr("disabled", true);

		}
		else{
			$(".btns").hide();
					    $(".cnf").removeAttr("disabled");

		}
		});
function valueChanged()
{
	
    if($('.cnf').is(":checked"))   
    
        {
			$(".btns").show();
			    $(".cnf").attr("disabled", true);

		}
    else{
		    $(".cnf").removeAttr("disabled");

        $(".btns").hide();
	}
}

$("#confirmbtn").click(function()
{
	event.preventDefault();
	var id = '<?php echo $taskid; ?>';
	var baseurl = '<?php echo $base_url; ?>';
	jQuery.ajax({
	url : '<?php echo $base_url?>task/changestatustocofirm',
	type: 'POST',
	data: {id_val:id},
		success:function(response){
					window.location.href = baseurl+'booking/request_record';					
		}
	});
});
$("#decline").click(function()
{
	event.preventDefault();
	var id = '<?php echo $taskid; ?>';
	var baseurl = '<?php echo $base_url; ?>';
	jQuery.ajax({
	url : '<?php echo $base_url?>task/changestatustodecline',
	type: 'POST',
	data: {id_val:id},
		success:function(response){
					window.location.href = baseurl+'booking/request_record';					
		}
	});
});



</script>
