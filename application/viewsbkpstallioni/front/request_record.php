<style>
	.blue.tag
	{
		background: #61b2db!important;
	}
	a
	{
		color: #333;
		text-decoration: none;
		-webkit-transition: color 0.2s;
		transition: color 0.2s;
	}
	a:hover
	{
		color: #333;
		text-decoration: none;
		-webkit-transition: color 0.2s;
		transition: color 0.2s;	
	}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">
			<?php //echo $this->session->flashdata('success');?>
			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
						<?php if($this->session->flashdata('success')) {echo $this->session->flashdata('success');} ?> 

					<h2>My Request Records</h2>
				</div>
			</div>
		</div>


		
		<div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Past Request Records</h4>
							<?php 
							
							if(!empty($get_task_list)){	 ?>
								<ul id="newStuff"  class="custom-sli">

<!--
				<ul class="custom-sli">
-->
				<?php //var_dump($get_task_list);
				foreach($get_task_list as $get_task_list_val){ if($get_task_list_val->status == 4){ ?>
					
					<!-- Single Listing Item -->
					<li>
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div href="listings-single-page.html" class="listing-item">	
								<!-- Image -->
								<div class="listing-item-image">
									<img src="<?php echo $base_url.'uploads/'.$get_task_list_val->image_path; ?>" alt="">
										<?php $status = ($get_task_list_val->status == '1') ? '<span class="tag">Pending</span>' :( ($get_task_list_val->status == '2') ? '<span class="blue tag">Awaiting  <br/> Confirmation</span>' :( ($get_task_list_val->status == '3') ? '<span class="green tag">Awaiting  <br/> Service</span>' :( ($get_task_list_val->status == '4') ? '<span class="green tag">Completed</span>' : '<span class="label label-sm label-warning"> not_active</span>'))) ; echo $status; ?>
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><?php  echo ucwords($get_task_list_val->property_name); ?></h3>
										<h5><?php  echo $get_task_list_val->task_catname; ?></h5>
										<span><?php echo $get_task_list_val->description; ?></span><br />
										<span><em><?php echo date('d/m/Y',strtotime($get_task_list_val->booking_date)); ?> - <?php echo $get_task_list_val->bookingtime; ?></em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											<a href="<?php echo $base_url.'schedule/pastservicereport/?tid='.$get_task_list_val->id ; ?>" class="button gray"><i class="sl sl-icon-chart"></i> Service Report</a>

											<a href="<?php echo $base_url.'schedule/past_requestinvoice/?tid='.$get_task_list_val->id ; ?>" class="button gray"><i class="sl sl-icon-doc"></i> Invoice</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->
					</li>
				<?php } } //var_dump($get_task_list);
				foreach($get_task_declinelist as $get_task_declinelist_val){ if($get_task_declinelist_val->status == 5){ ?>
					
					<!-- Single Listing Item -->
					<li>
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div  class="listing-item">	
								<!-- Image -->
								<div class="listing-item-image">
									<img src="<?php echo $base_url.'uploads/'.$get_task_declinelist_val->image_path; ?>" alt="">
									<?php  $status = ($get_task_declinelist_val->status == '5') ? '<span class="tag">Decline</span>' :( ($get_task_declinelist_val->status == '2') ? '<span class="blue tag">Awaiting  <br/> Confirmation</span>' :( ($get_task_declinelist_val->status == '3') ? '<span class="green tag">Awaiting  <br/> Service</span>' :( ($get_task_declinelist_val->status == '4') ? '<span class="green tag">Completed</span>' : '<span class="label label-sm label-warning"> not_active</span>'))) ; echo $status; ?>
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><?php  echo ucwords($get_task_declinelist_val->property_name); ?></h3>
										<h5><?php  echo $get_task_declinelist_val->task_catname; ?></h5>
										<span><?php echo $get_task_declinelist_val->description; ?></span><br />
										<span><em><?php echo date('d/m/Y',strtotime($get_task_declinelist_val->booking_date)); ?> - <?php echo $get_task_declinelist_val->bookingtime; ?></em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											

<!--
											<a href="" class="button gray"><i class="sl sl-icon-doc"></i> Invoice</a>
-->

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->
					</li>
					
					<?php }
					 } ?>
					<!-- Single Listing Item / End -->					
				</ul>
					<?php } else { ?>
					<ul>
						<!-- Single Listing Item / End -->
					<li class="approved-booking">
						<div class="list-box-listing bookings">
						<span class="norecfod">	NIL</span>
							</div>
						<!-- Listing Item / End -->
					</li>
						</ul>
						<?php } ?>
			</div>
		</div>

			<!-- Pagination -->
<!--
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
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
		
<!-- Pagination -->
			<div class="clearfix"></div>
				<div class="">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="">
							
								
				<div class="pagination pagination-large">
          							
				<ul class="pager" data-curr="0">

						
				</ul>
					</div></nav>
				</div>
			</div>
			<!-- Pagination / End -->
		
		
	</div>
</div>



<script>
$(document).ready(function(e) 
{
	var listElement = $('#newStuff');
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

 $('li').removeClass();
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
