<style>
ul.custom-sli li {
    padding: 0;
}

ul.custom-sli li div.listing-item-container.list-layout {
    margin-bottom: 0;
}
</style>
<script type="text/javascript" src="<?php echo $base_url; ?>/assets/listeo/lib/jquery.bootpag.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" />

<div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12 padding-right-30">
         
         <!-- Titlebar -->
         <div id="titlebar" class="listing-titlebar">
            <div class="listing-titlebar-title">
         
               <h2>My Request Records</h2>
            </div>
         </div>
      </div>
      <!-- Upcoming Request -->
      <div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0 margin-bottom-10">         				
			<!-- Toggles Container -->
			<div class="style-2 req-toggle">
			<!-- Toggle 1 -->
			<div class="toggle-wrap aconfirm">
			<span class="trigger" ><a href="#">Awaiting Confirmation<i class="sl sl-icon-plus"></i></a></span>
			<div class="toggle-container">
														
            <?php	if(!empty($get_task_list1))
               { ?>
				   
		
				<ul id="newStuff"  class="custom-sli">
               <!-- Single Listing Item -->
               <?php //var_dump($get_task_list); 
					foreach($get_task_list1 as $get_task_list1_val)
					{
						if($get_task_list1_val->status != 4)
						{
                  	//var_dump($get_task_list_val);
                  
					  ?>
					   <li>
						  <!-- Listing Item -->
						  <div class="listing-item-container list-layout">
							 <div class="listing-item">
								<!-- Image -->
								<div class="listing-item-image">
								   <img src="<?php echo $base_url.'uploads/'.$get_task_list1_val->image_path; ?>" alt="">
								   <?php  $status = ($get_task_list1_val->status == '1') ? '<span class="tag">Pending</span>' :( ($get_task_list1_val->status == '2') ? '<span class="blue tag">Awaiting Confirmation</span>' :( ($get_task_list1_val->status == '3') ? '<span class="green tag">Awaiting Service</span>' :( ($get_task_list1_val->status == '4') ? '<span class="green tag">Completed</span>' : '<span class="tag">decline</span>'))) ; echo $status; ?>
								</div>
								<!-- Content -->
								<div class="listing-item-content">
								   <!-- <div class="listing-badge now-closed">Now Closed</div> -->
								   <div class="listing-item-inner">
									  <h3><?php  echo ucwords($get_task_list1_val->property_name); ?></h3>
									  <h5><?php  echo $get_task_list1_val->task_catname; ?></h5>
									  <span>			<?php echo $get_task_list1_val->description; ?></span><br />
									  <span><em>	<?php echo $get_task_list1_val->booking_date; ?>
									  - 			<?php echo $get_task_list1_val->bookingtime; ?>
									  </em></span>
								   </div>
								   <div class="dashboard-list-box margin-top-0">
									  <div class="buttons-to-right">
										 <?php if($get_task_list1_val->status == 2) {?> 
										 <a href="<?php echo $base_url; ?>task/purchase_order/?taskid=<?php echo $get_task_list1_val->id; ?> " class="button gray"><i class="sl sl-icon-pencil"></i> Confirm Order</a>
										 <?php } ?>
									  </div>
								   </div>
								</div>
							 </div>
						  </div>
						  <!-- Listing Item / End -->
					   </li>
					 
				   <?php  
						} 
					} ?>
					</ul>
					<?php
				 }
				else
				{
				?>
					<ul>
				   <!-- Single Listing Item / End -->
				   <li class="approved-booking" style="background-color: #f9f9f9;">
					  <div class="list-box-listing bookings">
						 <span class="norecfod">	NIL</span>
					  </div>
					  <!-- Listing Item / End -->
				   </li>
				   </ul>
				<?php
				}
				?>
               <!-- Single Listing Item / End -->
		  
               </div>
               </div>
               </div>
               </div>
             
            <div class="dashboard-list-box margin-top-0 margin-bottom-10">
			<!-- Toggles Container -->
			<div class="style-2 req-toggle">

			<!-- Toggle 1 -->
			<div class="toggle-wrap aservice">
			<span class="trigger"><a href="#">Awaiting Service<i class="sl sl-icon-plus"></i></a></span>
			<div class="toggle-container">
               
                <?php	
                if(!empty($get_task_list2))
                { ?>
				 <ul class="custom-sli">  
               <!-- Single Listing Item -->
               <?php //var_dump($get_task_list); 
                  foreach($get_task_list2 as $get_task_list2_val)
                  {
                  	 if($get_task_list2_val->status != 4){
                  	//var_dump($get_task_list_val);
                  
                  ?>
               <li>
                  <!-- Listing Item -->
                  <div class="listing-item-container list-layout">
                     <div class="listing-item">
                        <!-- Image -->
                        <div class="listing-item-image">
                           <img src="<?php echo $base_url.'uploads/'.$get_task_list2_val->image_path; ?>" alt="">
                           <?php  $status = ($get_task_list2_val->status == '1') ? '<span class="tag">Pending</span>' :( ($get_task_list2_val->status == '2') ? '<span class="blue tag">Awaiting  Confirmation</span>' :( ($get_task_list2_val->status == '3' || $get_task_list2_val->status == '6' ) ? '<span class="green tag">Awaiting  Service</span>' :( ($get_task_list2_val->status == '4') ? '<span class="green tag">Completed</span>' : '<span class="tag">decline</span>'))) ; echo $status; ?>
                        </div>
                        <!-- Content -->
                        <div class="listing-item-content">
                           <!-- <div class="listing-badge now-closed">Now Closed</div> -->
                           <div class="listing-item-inner">
                              <h3><?php  echo ucwords($get_task_list2_val->property_name); ?></h3>
                              <h5><?php  echo $get_task_list2_val->task_catname; ?></h5>
                              <span>			<?php echo $get_task_list2_val->description; ?></span><br />
                              <span><em>	<?php echo $get_task_list2_val->booking_date; ?>
                              - 			<?php echo $get_task_list2_val->bookingtime; ?>
                              </em></span>
                           </div>
                           <div class="dashboard-list-box margin-top-0">
                              <div class="buttons-to-right">
                                 <?php 
                                    if($get_task_list2_val->status == 3 || $get_task_list2_val->status == 6) {?> 
                                 <a href="<?php echo $base_url; ?>task/view_order/?taskid=<?php echo $get_task_list2_val->id; ?> " class="button gray"><i class="sl sl sl-icon-eye"></i> View Order</a>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Listing Item / End -->
               </li>
               <?php  	} }  ?>
               
               </ul>
               
               <?php 
				}
				else
				{
				?>
					<ul>
				   <!-- Single Listing Item / End -->
				   <li class="approved-booking" style="background-color: #f9f9f9;">
					  <div class="list-box-listing bookings">
						 <span class="norecfod">	NIL</span>
					  </div>
					  <!-- Listing Item / End -->
				   </li>
				   </ul>
				<?php
				}
				?>
               <!-- Single Listing Item / End -->
		  
               </div>
               </div>
               </div>
               </div>
               
               
            <div class="dashboard-list-box margin-top-0 margin-bottom-10">         				
			<!-- Toggles Container -->
			<div class="style-2 req-toggle">
			<!-- Toggle 1 -->
			<div class="toggle-wrap pending">
			<span class="trigger"><a href="#">Pending<i class="sl sl-icon-plus"></i></a></span>
			<div class="toggle-container">
														
            <?php	if(!empty($get_task_list))
               { ?>
				 <ul id="newStuff"  class="custom-sli">    
               <?php //var_dump($get_task_list); 
                  foreach($get_task_list as $get_task_list_val)
                  {
                  	 if($get_task_list_val->status != 4){
                  	//var_dump($get_task_list_val);
                  
                  ?>
               <li>
                  <!-- Listing Item -->
                  <div class="listing-item-container list-layout">
                     <div class="listing-item">
                        <!-- Image -->
                        <div class="listing-item-image">
                           <img src="<?php echo $base_url.'uploads/'.$get_task_list_val->image_path; ?>" alt="">
                           <?php  $status = ($get_task_list_val->status == '1') ? '<span class="tag">Pending</span>' :( ($get_task_list_val->status == '2') ? '<span class="blue tag">Awaiting  <br/> Confirmation</span>' :( ($get_task_list_val->status == '3') ? '<span class="green tag">Awaiting  <br/> Service</span>' :( ($get_task_list_val->status == '4') ? '<span class="green tag">Completed</span>' : '<span class="tag">decline</span>'))) ; echo $status; ?>
                        </div>
                        <!-- Content -->
                        <div class="listing-item-content">
                           <!-- <div class="listing-badge now-closed">Now Closed</div> -->
                           <div class="listing-item-inner">
                              <h3><?php  echo ucwords($get_task_list_val->property_name); ?></h3>
                              <h5><?php  echo $get_task_list_val->task_catname; ?></h5>
                              <span>			<?php echo $get_task_list_val->description; ?></span><br />
                              <span><em>	<?php echo date('d/m/Y',strtotime($get_task_list_val->booking_date)); ?>
                              - 			<?php echo $get_task_list_val->booking_time; ?>
                              </em></span>
                           </div>
                           <div class="dashboard-list-box margin-top-0">
                              <div class="buttons-to-right">
                                 <?php if($get_task_list_val->status == 1){ ?>
                                 <a href="<?php echo $base_url; ?>my-request/edit-request/<?php echo $get_task_list_val->id; ?> " class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                 <a href="<?php echo $base_url; ?>booking/delete_booking/<?php echo $get_task_list_val->id; ?> " class="button gray" onclick="return confirm(' you want to delete?');"><i class="sl sl-icon-close"></i> Delete</a>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Listing Item / End -->
               </li>
               <?php  	} }
                  ?>
               <!-- Single Listing Item / End -->
               <!-- Single Listing Item -->
            </ul>
            <?php } else { ?>
            <ul>
               <!-- Single Listing Item / End -->
               <li class="approved-booking" style="background-color: #f9f9f9;">
                  <div class="list-box-listing bookings">
                     <span class="norecfod">	NIL</span>
                  </div>
                  <!-- Listing Item / End -->
               </li>
            </ul>
            <?php } ?>
            
             </div>
               </div>
               </div>
               </div>
            
            
         </div>
    
    </div>    
   
   </div>
   

<script>
	$(window).bind("load", function() {
   $('.toggle-container').click(function(){
		   
		    $(this).show();
			
		});
});
	
	
	
	$(document).ready(function(e) 
    {
		
		
		var active = '<?php echo $active ?>';	
		//alert(active);
		if(active == 'pending')
		{
			$('.toggle-wrap.pending').addClass('active');
			$('.toggle-wrap.pending .trigger').addClass('active');
			
		}
		else if(active == 'service')
		{
			//alert('service');
			$('.toggle-wrap.aservice').addClass('active');
			$('.toggle-wrap.aservice .trigger').addClass('active');
		}
		else
		{
			$('.toggle-wrap.aconfirm').addClass('active');
			$('.toggle-wrap.aconfirm .trigger').addClass('active');				
		}
			
		$('.toggle-wrap.active').click(function(){		
			$('.toggle-wrap').removeClass('active');
			
		});	
		
				
	});
	

	
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
       //alert(numPages);
       if(numPages  != 0)
       {
   	  if(numPages != 1)
   	{
           $('<li ><a href=""  class="pre_css"><i class="sl sl-icon-arrow-left"></i></a></li>').appendTo('ul.pager');
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">
<?php if($this->session->flashdata('success')){ ?>
	 toastr.options = {
				"closeButton": true,
			}
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
			 	
			 <?php } ?>
			 </script>
