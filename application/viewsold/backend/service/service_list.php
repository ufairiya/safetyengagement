<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Service Management</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo $base_url;?>admin/dashboard">Home</a></li>
							<li>Service Management</li>
							<li>List Services</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		
		<?php
			//~ echo '<pre>';
			//~ print_r($task_category);
			//~ echo '</pre>';
		?>
		
		<div class="row">

			<?php	
			if(!empty($task_category) )	
			{		?>
				
				<ul class="custom-sli" id="newschedule">
				<?php
				
				foreach($task_category as $category)
				{
			?>		<li>	
					<!-- Listing Item -->
					<div class="col-lg-12 col-md-12">
						<div class="listing-item-container list-layout">
							<a href="<?php echo $base_url.'admin/service/update_service/'.$category->id; ?>" class="listing-item">
								
								<!-- Image -->
								<div class="listing-item-image">
									<?php $gallery_img = json_decode($category->gallery_img);?>
									<img src="<?php echo $gallery_img[0];?>" alt="">
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
									<div class="listing-item-inner">
											<h3><?php echo $category->taskcategory_name ?>
												<?php if($category->status == '1') { echo '<span class="appt-cat">Live</span>'; }else{ echo '<span style="color:#333;background-color:#ddd" class="appt-cat">Draft</span>'; }  ?>
											</h3>
											<span class="service-time">
											<?php $opentime = json_decode($category->opening_hours);
            $closertime = json_decode($category->closing_hours);
            //~ var_dump($opentime);
            //~ var_dump($closertime);
										$day =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
                        	
                        	 $opentime_count = count($opentime);
                        								//~ $pricename_array_count= $pricename_array_count-1;
                        	 for($i=0; $i<$opentime_count;$i++ ){ 
							
								echo $day[$i] .' '.$opentime[$i].' - '.$closertime[$i].'<br/>';
							
								 
							 }
									?>
<!--
               <li>Monday - Friday <span>9 AM - 8.30 PM</span></li>
               <li>Saturday <span>9 AM - 6.30 PM</span></li>
               <li>Sunday <span>9 AM - 4.00 PM</span></li>
-->
           
											</span>

									</div>
								</div>
							</a>
						</div>
					</div>
					</li>
					<!-- Listing Item / End -->
			<?php
					
				} ?></ul>
				<?php
			}else{
			?>
			<div id="endorse-trigger" class="endorse-list dashboard-list-box margin-top-0">

             <ul>
						<!-- Single Listing Item / End -->
					<li class="approved-booking">
						<div class="list-box-listing bookings">
						<span class="col-md-12 norecfod" style="text-align: center;">	NIL</span>
							</div>
						<!-- Listing Item / End -->
					</li>
						</ul>
							</div>
						<?php } ?>
		</div>
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
		<div class="clearfix"></div>

		<div class="row">
			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2018 Listeo. All Rights Reserved.</div>
			</div>	
		</div>
	</div>
	<!-- Content / End -->
		<style>
	.pager li>a.pagin-page
	{
		    border: unset; 
		}
	.pager li>a.pre_css
	{
		    border: unset; 
		}
	.pager li>a.next_css
	{
		    border: unset; 
		}
		.pager li.active
		{
			    background-color: #fff;
			        border-radius: 50% !important;
    width: 52px;
    height: 52px;
    padding: 0;
    line-height: 52px;
    cursor: pointer;
			}
			ul.custom-sli
			{
				    padding-left: 0;
				    list-style: none;
				}
	</style>
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
