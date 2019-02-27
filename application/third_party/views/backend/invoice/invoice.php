<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Invoice Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="a-dashboard.php">Home</a></li>
							<li><a href="#">Invoice Management</a></li>
							<li>View</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		
		<?php
		//~ echo '<pre>';
		//~ print_r($get_service_report_details);
		//~ echo '</pre>';
		//~ exit;
		
		foreach($get_service_report_details as $get_service_report_detail)
		{
		?>
		<!-- Reply to review popup -->
		<div id="small-dialog-<?php echo $get_service_report_detail->sr_id; ?>" class="zoom-anim-dialog mfp-hide report-popup">
			
			<!-- Content
			================================================== -->

			<!-- Invoice -->
			<div id="invoice">

				<!-- Header -->
				<div class="row">
					<div class="col-md-6">
						<div><img src="<?php echo $base_url; ?>assets/listeo/images/logo.png" alt=""></div>
					</div>

					<div class="col-md-6">	

						<div class="listing-badge red">Paid</div>
						<p id="details">
		

							<strong>Order:</strong> <?php echo $get_service_report_detail->invoice_id; ?><br>
							<strong>Issued:</strong> <?php echo $get_service_report_detail->created_date; ?>
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
							<?php echo $get_service_report_detail->username; ?> <br>
							<?php echo $get_service_report_detail->email; ?>
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
							$jobname = unserialize($get_service_report_detail->contcol_jobname);
							$jobprice = unserialize($get_service_report_detail->cont_price);
							
							for($i = 0; $i < count($jobname); $i++)
							{
								echo '<tr>
								<td>'.$jobname[$i].'</td> 
								<td> $'.$jobprice[$i].'</td>
								</tr>';
							}
							?>
							<?php if (!empty($get_service_report_detail->additional_description)) {  ?>

							<tr>
								<th>Additonal Description</th>
								<th></th>								
							</tr>
							
							<?php
								echo '<tr>
								<td>'.$get_service_report_detail->additional_description.'</td> 
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
						
		</div>
		
		<?php
		}
		 ?>
		
		<div class="row">
			<!-- Appointments -->
			<div class="col-md-12">
				<div class="dashboard-list-box with-icons scheduler margin-top-20">
					<h4>Service Sheet List</h4>
					<input type="text" data-search class="inner-search small-bar customcls" placeholder="&#xF002"  />
					<div class="dashboard-list-box margin-top-0">
						<?php if(!empty($get_service_report_details))
						{ ?>
							
							<ul class="custom-sli" id="newschedule">
							<?php
							foreach($get_service_report_details as $get_service_report_detail)
							{
								$total = 0;
								$pricearr = unserialize($get_service_report_detail->cont_price);
								$countprice = count($pricearr);
								for($i = 0; $i < $countprice; $i++)
								{
									$total = $total+$pricearr[$i];
								}
							?>
							<li id="booking-endorse" class="approved-booking" data-filter-addsitem data-filter-addsname="<?php echo strtolower($get_service_report_detail->sr_address); ?>"  data-filter-contitem data-filter-contname="<?php echo strtolower($get_service_report_detail->companyname); ?>" data-filter-item data-filter-name="<?php echo strtolower($get_service_report_detail->SR_code); ?>" >
								<a href="#small-dialog-<?php echo $get_service_report_detail->sr_id; ?>" class="popup-with-zoom-anim">
									<div class="list-box-listing bookings">
										<div class="list-box-listing-content">
											<div class="inner">
												<div class="inner-booking-list first-div">
													<h5  class="sr-con det-right"><?php echo $get_service_report_detail->SR_code; ?></h5>
													<i class="im im-icon-Snow det-right"></i>
													<h5 class="sr-con margin-left-0"><?php echo $get_service_report_detail->companyname; ?><span><?php echo $get_service_report_detail->contname; ?></span></h5>
												</div>
												<div class="inner-booking-list">
													<h5>Descriptions:</h5>
													<ul class="booking-list">
														<li><?php echo $get_service_report_detail->issueddate; ?></li>
														<li class="highlighted">SGD <?php echo $total; ?></li>
													</ul>
												</div>
													
												<div class="inner-booking-list">
													<h5>Client:</h5>
													<ul class="booking-list">
														<li><?php echo $get_service_report_detail->username; ?></li>
													</ul>
												</div>
													
												<div class="inner-booking-list">
													<h5>Address:</h5>
													<ul class="booking-list">
														<li><?php echo $get_service_report_detail->sr_address; ?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>
							<?php
							}
							?>
							

						</ul><?php
		}

		else { ?>
					<ul>
						<!-- Single Listing Item / End -->
					<li class="approved-booking">
						<div class="list-box-listing bookings">
						<span class="norecfod col-md-12" style="text-align: center;">	NIL</span>
							</div>
						<!-- Listing Item / End -->
					</li>
						</ul>
						<?php } ?>

		<!-- Pagination -->
		
		<!-- Pagination -->
			<div class="clearfix"></div>
				<div class="">
				<div class="col-md-12 servreplist">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="">
							
								
				<div class="pagination pagination-large">
          							
				<ul class="pager" data-curr="0">

						
				</ul>
					</div></nav>
				</div>
			</div>
					
			<!-- Pagination -->
			
<!--
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
<!--
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
-->

			<!-- Pagination / End -->
			
			<!-- Copyrights -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="copyrights">&copy; 2018 1SS. All Rights Reserved.</div>
			</div>
		</div>

	</div>
		<!-- Content / End -->
		<script>
			$('[data-search]').on('keyup', function() {
			//~ $('.user-details').hide();	
			var searchVal = $(this).val();
			var filterItems = $('[data-filter-item]');
		var filtercontItems = $('[data-filter-contitem]');

		var filteraddsItems = $('[data-filter-addsitem]');

			if ( searchVal != '' ) {
			filterItems.addClass('hidden');
			filtercontItems.addClass('hidden');
			filteraddsItems.addClass('hidden');
 
			$('.user-details').addClass('hidden');
			$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
						$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').show();

			//	var attid = $('[data-filter-name*="' + searchVal.toLowerCase() + '"]').attr('data-get-id');
			$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').parents('li').removeClass('hidden');
			$('[data-filter-contitem][data-filter-contname*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
			$('[data-filter-contitem][data-filter-contname*="' + searchVal.toLowerCase() + '"]').show();

			//	var attid = $('[data-filter-name*="' + searchVal.toLowerCase() + '"]').attr('data-get-id');
			$('[data-filter-contitem][data-filter-contname*="' + searchVal.toLowerCase() + '"]').parents('li').removeClass('hidden');
			$('[data-filter-addsitem][data-filter-addsname*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
			$('[data-filter-addsitem][data-filter-addsname*="' + searchVal.toLowerCase() + '"]').show();

			//	var attid = $('[data-filter-name*="' + searchVal.toLowerCase() + '"]').attr('data-get-id');
			$('[data-filter-addsitem][data-filter-addsname*="' + searchVal.toLowerCase() + '"]').parents('li').removeClass('hidden');
			} else {
			filterItems.removeClass('hidden');
			filtercontItems.removeClass('hidden');
			filteraddsItems.removeClass('hidden');
			location.reload();

			$('li').removeClass('hidden');

			}
		
		
			});
			$(document).ready(function(e) 
{
var listElement = $('#newschedule');
	var perPage = 15; 
	var numItems = listElement.children().size();
	
	var numPages = Math.ceil(numItems/perPage);
	$('.pager').data("curr",0);
	//$('<li ><a href=""   class="pre_css"><i class="sl sl-icon-arrow-left"></i></a></li>').appendTo('ul.pager');
 //~ if ( curr === 0 ) {
       //$('.pager li').addClass('active');
    //~ }
   // alert(numPages);
    if(numPages  != 0)
    {
	  if(numPages != 1)
	{
        $('<li ><a href=""   class="pre_css"><i class="sl sl-icon-arrow-left"></i></a></li>').appendTo('ul.pager');
	}
  
	}
   
	if(numPages != 1)
	{	
	var curr = 0;
	
	while(numPages > curr)
	{
		
	  $('<li><a data-currval="'+(curr)+'" href="#" class="pagin-page">'+(curr+1)+'</a></li>').appendTo('ul.pager');
	    //~ if ( curr === 0 ) {
       //$('.pager li').addClass('active');
    //~ }
	  curr++;
	  
	}
}
  
$("ul.pager li:eq(1)").addClass("active");
//alert(numPages);

if($('.pager li.active a').data("currval") == 0)
	{
		$(".pre_css").hide();
		
	}
	else
	{
		$(".pre_css").show();
		
		}
	
		
		
	if ( numPages > 0 ) {
	$('<li ><a  href=""   class="next_css"><i class="sl sl-icon-arrow-right"></i></a></li>').appendTo('ul.pager');
	
}
	if(numPages==1)
	{
		$(".next_css").hide();
		
	}else
	{
		$(".next_css").show();
		}
	//$('<li ><i class="sl sl-icon-arrow-right"></i></li>').appendTo('ul.pager');
	listElement.children().css('display', 'none');
	listElement.children().slice(0, perPage).css('display', 'block');
	$('.pager li a.pagin-page').click(function(e){
		
	e.preventDefault();

	$('.pager li').removeClass();
    $(this).parent().addClass('active');
	var clickedPage = $(this).html().valueOf() - 1;
	//alert(clickedPage);
	if(clickedPage == 0)
	{
	$(".pre_css").hide();
		
	}
	else
	{
		$(".pre_css").show();
		
		}
		
	if(clickedPage+1 == numPages)
	{
		$(".next_css").hide();
		
	}
	else
	{
		$(".next_css").show();
		
		}
	
	//alert(clickedPage);
	 
	goTo(clickedPage,perPage);
	});
    $(".pre_css").click(function(e) { 
		
	e.preventDefault();	
	//alert($('.pager li.active a').data("currval"));
	if($('.pager li.active a').data("currval") == 1)
	{
		$(".pre_css").hide();
		
	}
	else
	{
		$(".pre_css").show();
		
		}
	if($('.pager li.active a').data("currval")-1 == numPages)
	{
		$(".next_css").hide();
		
	}
	else
	{
		$(".next_css").show();
		
		}
 $(this).parent().addClass('active_pre');

if($('.pager li.active a').data("currval") != 0)
{

	var goToPage = parseInt($('.pager li.active a').data("currval") - 1);
}
else
{
	var goToPage = parseInt($('.pager li.active a').data("currval"));
	
	}
	
	$('.pager li').removeClass();
	$( 'a[ data-currval=' + goToPage + ']' ).parent().addClass( 'active' );
	goTo(goToPage,perPage);
	});
    $(".next_css").click(function(e) {
			e.preventDefault();	
			
		  $(this).parent().addClass('active_next');
		 //alert($('.pager li.active a').data("currval"));
		  if($('.pager li.active a').data("currval")+1 == 0)
	{
		$(".pre_css").hide();
		
	}
	else
	{
		$(".pre_css").show();
		
		}
		
		if($('.pager li.active a').data("currval")+2 == numPages)
	{
		$(".next_css").hide();
		
	}
	else
	{
		$(".next_css").show();
		
		}
	
	if($('.pager li.active a').data("currval") >= 0)
{

	var goToPage = parseInt($('.pager li.active a').data("currval")+ 1);
}
else
{
	var goToPage = parseInt($('.pager li.active a').data("currval") );
	
	}
	 $('.pager li').removeClass();
	$( 'a[ data-currval=' + goToPage + ']' ).parent().addClass( 'active' );
		goTo(goToPage,perPage);
	  
	});

	function goTo(page){
		
	  var startAt = page * perPage,
		endOn = startAt + perPage;
	  listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
	  $('.pager').attr("data-curr",page);
	}

	//~ setTimeout(function(){
	  //~ $('.alert').remove();
	//~ }, 5000);

});

		</script>
