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
  ?>
<div id="invoice">
	<?php if(!empty($get_schedule))
	{ ?>
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
			<div class="form" >

	<form name="servicereportstep2" class="addreport" method="POST" action="<?php echo $base_url?>schedule/servicereportstep2/?srepid=<?php echo $get_schedule->sr_id; ?>">
		<div class="row">
			<div class="col-md-12">
				<h2>Service Report</h2>
			</div>
			
			

			<div class="col-md-6 sr-prof">
				
					<strong  class="col-md-6 col-sm-3 leftrightreduce">Name :</strong> <label class="col-md-6 col-sm-3  leftrightreducerigt"><?php echo $get_schedule->username; ?></label>
					<div class="clear"></div>
					
					<strong class="col-md-6 col-sm-3 leftrightreduce">Contact No:</strong>
					<label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->user_phone; ?></label>
					<div class="clear"></div>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Email:</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->user_email; ?></label>
				
				<p>
					<strong class="col-md-6 col-sm-3 leftrightreduce">Apartment :</strong><label class="col-md-6 col-sm-3 leftrightreducerigt"><?php echo $get_schedule->apartment; ?></label>
				</p>
			</div>
			
			<input type="hidden" name="s_phone" value="<?php echo $get_schedule->user_phone; ?>" >
			<input type="hidden" name="s_email" value="<?php echo $get_schedule->user_email; ?>" >

<!--
			<div class="col-md-3 sr-prof">
				<p>
					<br>
					<?php echo $get_schedule->user_phone; ?><br>
					<?php echo $get_schedule->user_email; ?><br>
				</p>
				
				
				<p><?php echo $get_schedule->apartment; ?><br>
				<?php echo $get_schedule->sr_address; ?>
-->
	<!--
					Rivercrest Drive Blk 321A #03-05, Singapore 540321
	-->
<!--
				</p>
			</div>
-->

			<div class="col-md-3">
			</div>
			
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
			
				<label><strong>Additional Descriptions (optional):</strong></label>
				<?php
				if($get_schedule->additional_description != '')
				{				
				?>
					<textarea cols="30" class="add_desc" name="additional_description" rows="2" style="margin: 0 0 20px 0;"><?php echo $get_schedule->additional_description; ?></textarea>
				<?php
				}
				else
				{					
					?>
					<textarea cols="30" rows="2" class="add_desc" name="additional_description" style="margin: 0 0 20px 0;" ></textarea>
				<?php
				}
				
				?>
				<div class="clear" style="clear:both"></div>
			</div>
			
			<div class="col-md-12 sr-hdr margin-top-60 margin-bottom-10">
				<p>Job Description</p>
			</div>
			<div class="col-md-12 sr-desc numbered">
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
						
						<li class="add_remov">
							<input type="text" name="contcol_jobname[]"  value=""  class="erradd_0 col-md-3 add_field" /> <label class="col-md-1"> - $ </label>
							<input name="cont_price[]"  class="col-md-3 errcost_0 cost_fild onlyNumber form-control pull-left cost" id="noOfRoom" type="number" min="0" inputmode="numeric" pattern="[0-9]*" value="" />
							<a href="javascript:void(0);" class="add_button cus" title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i></a>
								

						</li>		
																								
					</ol>	<div class="col-md-12 col-sm-12 "><span class="col-md-6 col-sm-6 error_field"></span><span class="col-md-6 col-sm-6 error_cost"></span></div>			
				</div>
		</div>
		<input type="submit" name="submit_sreport2" class="submit_sreport2 button margin-top-20" value="Task Completed">
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
		

	</form>
		</div>
	<?php 
	} ?>

</div>
<style>

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
$(document).ready(function(e){
    var maxField = 1000; //Input fields increment limitation
    var addButton = $('.add_button.cus'); //Add button selector
   // var wrapper = $('.field_wrapper ol'); //Input field wrapper
   var wrapper = $('.field_wrapper ol'); //Input field wrapper
   
   
   //~ var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_jobname[]" class="col-md-3 add_field" id="add_field" />  <label class="col-md-1"> - $  </label><input name="cont_price[]"  id="cost_fild" class="col-md-3 cost_fild onlyNumber form-control pull-left cost" id="noOfRoom"  type="number" value=""/><a href="javascript:void(0);" class="remove_button" title="Add field">	<i id="subs"  class="col-md-1 sub_min fa fa-minus"></i></a></li>'; 
   
      

   
   
   
   //New input field html 
  // var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_jobname[]" class="col-md-3 add_field" id="add_field" />  <label class="col-md-1"> - $  </label><input name="cont_price[]"  id="cost_fild" class="col-md-3 cost_fild onlyNumber form-control pull-left cost" id="noOfRoom"  type="number" value=""/><a href="javascript:void(0);" class="add_button" title="Remove field"> <i class="col-md-1 plus_add fa fa-plus"></i></a> </li>'; //New input field html 

    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){
			    var lengadd= $('.countfieldadd').length ;
			    var lengcost = $('.countfieldcost').length;
			   
   lengadd++;
   lengcost++;
		    var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_jobname[]" class="erradd_'+lengadd+' col-md-3 add_field countfieldadd" id="add_field" />  <label class="col-md-1"> - $  </label><input name="cont_price[]"  id="cost_fild" class="errcost_'+lengcost+' col-md-3 countfieldcost cost_fild onlyNumber form-control pull-left cost" id="noOfRoom"  type="number" value=""/><span class="remcls"><a href="javascript:void(0);" class="add " title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i></a></span></li>'; 
		//alert('sfdf'); //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).find('.add_button').remove();
            $(wrapper).append(fieldHTML); // Add field html
            
        }
    });
    
     $(wrapper).on('click', '.add', function(e){ 
				 e.preventDefault();
	   			    var lengadd= $('.countfieldadd').length ;
			    var lengcost = $('.countfieldcost').length;
			     lengadd++;
				lengcost++;
   var fieldHTML = '<li class="add_remov"><input type="text" value=""  name="contcol_jobname[]" class="erradd_'+lengadd+' col-md-3 add_field countfieldadd" id="add_field" />  <label class="col-md-1"> - $  </label><input name="cont_price[]"  id="cost_fild" class="countfieldcost errcost_'+lengcost+' col-md-3 cost_fild onlyNumber form-control pull-left cost" id="noOfRoom"  type="number" value=""/><span class="remcls"><a href="javascript:void(0);" class="add " title="Remove field"><i class="col-md-1 plus_add fa fa-plus"></i></a></span></li>'; 
    //$('.add').click(function(){
		//alert('sfdf'); //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
             
             $(wrapper).find('.remcls').remove();
            $(wrapper).append(fieldHTML); // Add field html
             
        }
    });
    
      $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('li.add_remov').remove(); //Remove field html
        x--; //Decrement field counter
    });
    
    //~ $(wrapper).on('click', '.add_button', function(e){ 
		//~ alert('122');
		//~ //Once remove button is clicked
        //~ e.preventDefault();
       //~ // $(this).parent('li.add_remov').remove(); //Remove field html
        //~ x--; //Decrement field counter
    //~ });

//~ setTimeout(function(){
//~ location.reload();
//~ }, 100);

});
 //jQuery(document).ready(function(e) {



$(".submit_sreport2").click(function(event){
	//alert('hii');
  event.preventDefault();
 //  var add_desc = $(".add_desc").val();
 
	var els =$('.add_field').length;

	for (var i = 0; i < els; i++) {
   var add_field = $(".erradd_"+i).val();
   var cost_fild = $(".errcost_"+i).val();
   //~ alert(add_field);
   //~ alert(cost_fild);
        
	if(add_field != '' && cost_fild == '')
	{
	$('.error_cost').empty();
			$('.error_field').empty();
			$('.error_cost').append('<span for="imagebookUploadForm" class="help-block help-block-error">Please enter the cost of the job stated</span>');
			return false;
	}
	else if(cost_fild != '' && add_field == '')
	{
		   $('.error_cost').empty();
			$('.error_field').empty();
			$('.error_field').append('<span for="imagebookUploadForm" class="help-block help-block-error">Please enter the job description for the price stated </span>');
		return false;
	}
	
  	//~ else if(cost_fild == '' && add_field == '')
	//~ {
	
		
		
	//~ }
}
$(".addreport")[0].submit();
});



 
//}); 
 </script> 

