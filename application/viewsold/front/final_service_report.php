
<link src="<?php echo $base_url; ?>/assets/css/styles.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/sign/signature-pad.css">
   <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <?php
  //~ echo '<pre>';
  //~ print_r($get_schedule);
  //~ echo '</pre>';
  ?><?php if(!empty($get_schedule))
	{ ?>
<div id="invoice">
<?php //var_dump($get_schedule); 
$newDate = date("Ymd", strtotime($get_schedule->booking_date));
 ?>
	<!-- Header -->
	<div class="row">
		<div class="col-md-6">
			<div ><img style="width: 100px;" src="<?php echo $base_url; ?>assets/listeo/images/logo-1SS.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Report:</strong> <?php echo $get_schedule->SR_code; ?><br>
				<strong>Issued:</strong><?php echo $get_schedule->issueddate; ?> 
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="form">
	<form name="servicereportstep2" id="servicereportstep2" method="POST">
		<div class="row">
			<div class="col-md-12">
				<h2>Service Report</h2>
			</div>
			
			<input type="hidden" name="srfinal_id" value="<?php echo $get_schedule->sr_id; ?>">
	<div class="col-md-6 sr-prof">
				
					<strong  class="col-md-6 col-sm-3 leftrightreduce">Name :</strong> <label class="col-md-6 col-sm-3  leftrightreducerigt"><?php echo $get_schedule->username; ?></label>
					<div class="clear"></div>
					
					<strong class="col-md-6 col-sm-3 leftrightreduce">Contact No:</strong>
					<label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->phone; ?></label>
					<div class="clear"></div>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Email:</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->email; ?></label>
				
				<p>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Apartment :</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->apartment; ?><br>
				<?php echo $get_schedule->sr_address; ?></label>
				</p>
			</div>

			
					<div class=""></div>

			<div class="col-md-3">
			</div>
								<div class=""></div>

			<div class="col-md-3">
				<strong>Service Category</strong>
				<p><?php echo $get_schedule->task_catname; ?></p>
			</div>
		</div>
		


		<!-- Invoice -->
		<div class="row">
			<div class="col-md-12 sr-hdr margin-bottom-10">
				<p>Description</p>
			</div>
			<div class="col-md-12 sr-desc">
				<p><?php echo $get_schedule->description; ?></p>

				
				<?php
				if($get_schedule->additional_description != '')
				{				
				?>
					<label><strong>Additional Descriptions (optional):</strong></label>
					<p><?php echo $get_schedule->additional_description; ?></p>
				<?php
				}
				
				?>
			</div>
			
			<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
				<p>Job Description</p>
			</div>
			<div class="col-md-12 numbered">
						<div class="field_wrapper">

				<ol>
					
					<?php
						if($get_schedule->contcol_jobname != '' && $get_schedule->cont_price !='')
						{
							$jobname = unserialize($get_schedule->contcol_jobname);
							$jobprice = unserialize($get_schedule->cont_price);
				
						
							foreach($jobname as $key=>$name)
							{
											
								echo '<li>'.$jobname[$key].' -$ '.$jobprice[$key].'</li>';
								
								echo '<input type="hidden" name="jobnamepre[]" value="'. $jobname[$key]. '">';
								echo '<input type="hidden" name="jobpricepre[]" value="'. $jobprice[$key]. '">';
								
							}
						}
						else
						{
							$jobname = unserialize($get_schedule->jobname);
							$jobprice = unserialize($get_schedule->jobprice);
							foreach($jobname as $key=>$name)
							{
											
								echo '<li>'.$jobname[$key].' -$ '.$jobprice[$key].'</li>';
								
								echo '<input type="hidden" name="jobnamepre[]" value="'. $jobname[$key]. '">';
								echo '<input type="hidden" name="jobpricepre[]" value="'. $jobprice[$key]. '">';
								
							}
							
							
							
						}
					?>
					
				
													
				</ol>
				</div>
				
			<div class="signature">
				<input type="hidden" value="<?php echo $base_url; ?>" class="basegeturl">
<!--
			<a href="#"  class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">
-->
				<div class="signature-box">
					<!-- Upon clicking on this div, a overlay with signature box should appear for witness to sign on.
					<img src="images/signature.png" />	-->
	
                    <!-- End | Register Form -->			
					
					<div id="signature-pad" class="signature-pad">
						<div class="signature-pad--body">
							<canvas width="100px" height="200px" ></canvas>
						</div>
					
					<div class="signature-pad--footer">
					<div class="description">Sign above</div>
					<div class="signature-pad--actions">
					<div>
					<button type="button" class="button clear" data-action="clear">Clear</button>					
					</div>
					<div>
					<button type="button" class="button save" data-action="save-png">Save</button>					
					</div>
					</div>
					</div>
					</div>
					
					<div class="sigerr"></div>
 
				</div>

			<label>Witness: </label>
			<input type="text" name="witnessname" id="witnessname"  required />
			<div class="signimg">
			<input id="signature_img" type="hidden" name="signature_img" value="">
			</div>
			<div class="witerr"></div>
		</div>
		
		
			<input type="submit" id="submit_sreport3" name="submit_sreport3" class="button margin-top-20" value="Submit">
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

	</form>
	</div>
</div>
<?php } ?>
<script>
$("#submit_sreport3").click(function(event){
   event.preventDefault();
 
    var form = $('#servicereportstep2');
   var img = $("#signature_img").val();
   var wintname = $("#witnessname").val();
   //~ alert(img);
   //~ alert(wintname);
   if(img == '')
   {
	   $( '.sigerr' ).empty();
	   $( '.sigerr' ).append( '<span class="help-block help-block-error">Signature of witness is required</span>' );
	   
		//~ toastr.options = {
		//~ "closeButton": true,
		//~ }
		//~ toastr.error("Please save a Signature", "Notifications");			
   }
  else if(wintname == '')
   {
	   $( '.witerr' ).empty();
	  $( '.witerr' ).append( '<span class="help-block help-block-error">Name of witness is required</span>' );
 
		//~ toastr.options = {
		//~ "closeButton": true,
		//~ }
		//~ toastr.error("Please Enter Witness Name", "Notifications");	
   }
   else if(img != '' && wintname != '')
   {
	   jQuery.ajax({
					url : '<?php echo $base_url?>schedule/servicereportstep3',
					type: 'POST',
					data: jQuery(form).serialize(),
					dataType : 'json',
					success:function(response){ 
						 console.log(response.success);
						if(response.success == 'success') 
						{
							toastr.options = {
							"closeButton": true,
							}
							toastr.success("Your service report have been updated in our system.");
							setTimeout(function(){
					window.location.href ='<?php echo $base_url?>'+response.path;
							}, 2000);
								
						 
						}        

					}
				});
				
		//$("#servicereportstep2")[0].submit();
		
		//return true;
	}
   
   
});
</script>


<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none;
}
input[type="number"] {
    -moz-appearance: none;
}
.sub_min
{
	    cursor: pointer;
	
	}
input.add_field
{
    height: 23px;
    display: inline;
    margin: 0 10px 0 0;
    line-height: 18px;
    width: 300px;
    padding: 5px;
    font-size: 14px;	
	
	}
input.cost
{
	    height: 23px;
    display: inline;
    margin: 0 10px 0 0;
    line-height: 18px;
    width: 60px;
    padding: 5px;
    font-size: 14px
	
	}
.plus_add
{
	    cursor: pointer;
	
	}

</style>
<script>

$('#adds').click(function add() {
    var $rooms = $("#noOfRoom");
    var a = $rooms.val();
    
    a++;
    $("#subs").prop("disabled", !a);
    $rooms.val(a);
});
$("#subs").prop("disabled", !$("#noOfRoom").val());

$('#subs').click(function subst() {
    var $rooms = $("#noOfRoom");
    var b = $rooms.val();
    if (b >= 1) {
        b--;
        $rooms.val(b);
    }
    else {
        $("#subs").prop("disabled", true);
    }
});



</script>
 <script src="<?php echo $base_url; ?>assets/js/sign/signature_pad.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/sign/app.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper ol'); //Input field wrapper
    var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_price[]" class="col-md-3 add_field" />  <label class="col-md-1">$ </label><input name="cont_price[]"  class="col-md-3  onlyNumber form-control pull-left cost" id="noOfRoom"  type="text" value="40"/><a href="javascript:void(0);" class="remove_button" title="Add field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></li>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){
		//alert('sfdf'); //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('li.add_remov').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    
});  

jQuery.validator.addMethod("signature", function(value, element, options) {
    if( signaturePad.isEmpty()){
            return false;            
        }
    return true;
});
 </script> 

