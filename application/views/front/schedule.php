              <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url; ?>/assets/listeo/lib/jquery.bootpag.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Assignments</h2>
				</div>
			</div>
		</div>
		
		<!-- Upcoming Request -->
		<div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="schedule_contr dashboard-list-box margin-top-0">
				<h4 class="gray">Schedule</h4>
				<?php if(!empty($get_schedule)) { ?>
							<ul id="newschedule1"  class="custom-sli">

					<?php
					//~ echo '<pre>';
					//~ print_r($get_schedule);
					//~ echo '</pre>';
					
					foreach($get_schedule as $get_schedules) 
					{				
						//var_dump($get_schedules);							
					?>
					
				<li class="">
						<div class="listing-item-container list-layout">
							<div class="listing-item">
							<div class=" listing-item-image">
                           <img src="<?php echo $base_url.'uploads/'.$get_schedules->image_path; ?>" alt="">
                                              </div>
							<div class="listing-item-content">
								<div class="listing-item-inner">
									<h3> <?php echo $get_schedules->property_name; ?> </h3>

									<div class="inner-booking-list">
										<h5>Service Category:</h5>
										<ul class="booking-list">
											<li><?php echo $get_schedules->task_catname; ?></li>
										</ul>
									</div>

									<div class="inner-booking-list">
										<h5>Booking Date:</h5>
										<ul class="booking-list">
											<li class="highlighted" style="background-color: #EBF6E0!important;
    color: #5f9025;"><?php echo date('d.m.Y',strtotime($get_schedules->booking_date)); if($get_schedules->booking_date != '' ){ echo ' at '.$get_schedules->bookingtime; }?></li>
										</ul>
									</div>
									<div class="inner-booking-list">
										<h5>Client:</h5>
										<ul class="booking-list">
											<li><?php echo $get_schedules->username; ?></li>
											<li><?php echo $get_schedules->user_email; ?></li>
											
<!--
											<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="701a1f181e301508111d001c155e131f1d">[email&nbsp;protected]</a></li>
-->
											<li>+<?php echo $get_schedules->phone; ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="buttons-to-right">
							<a href="<?php echo $base_url; ?>schedule/schedule_details?sche_id=<?php echo $get_schedules->id; ?>" class="button gray"><i class="sl sl-icon-eye"></i> View</a>
						</div>
					</li>
					
					

		<?php } ?>
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
