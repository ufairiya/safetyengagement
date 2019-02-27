              <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url; ?>/assets/listeo/lib/jquery.bootpag.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      	<div class="dashboard-content">

<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<?php if($this->session->flashdata('success')) {echo $this->session->flashdata('success');} ?> 
					<h2>My Request Records</h2>
				</div>
			</div>
		</div>

		<!-- Upcoming Request -->
		<div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Upcoming Request Records</h4>
						     <ul id="newStuff" class="custom-sli nav nav-tabs nav-stacked">

					<!-- Single Listing Item -->
							<?php //var_dump($get_task_list); 
		foreach($get_task_list as $get_task_list_val)
		{
			
		
	?>
					<li>
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div href="listings-single-page.html" class="listing-item">	
								<!-- Image -->
								<div class="listing-item-image">
									<img src="<?php echo $get_task_list_val->image_path; ?>" alt="">
									<span class="tag">Pending</span>
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><a href="l-e-apartment.html"><?php  echo $get_task_list_val->property_name; ?></a></h3>
										<h5><?php  echo $get_task_list_val->task_catname; ?></h5>
										<span>			<?php echo $get_task_list_val->description; ?></span><br />
										<span><em>	<?php echo $get_task_list_val->booking_date; ?>
 - 			<?php echo $get_task_list_val->booking_time; ?>
</em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											<a href="<?php echo $base_url; ?>admin/task/edit_task/?taskid=<?php echo $get_task_list_val->id;?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
											<a href="# " class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->
					</li>
					<?php  	}
		?>
					<!-- Single Listing Item / End -->
				</ul>
				
			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							
								</ul> 
				<div class="pagination pagination-large">
          							
  <ul class="pager">

<!--
								<li><p class="pagin-page">2</p></li>
-->

							</ul>
					</div></nav>
				</div>
			</div>
			<!-- Pagination / End -->	
			</div>
		</div>

		
		<!-- Upcoming Request -->
		<div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Past Request Records</h4>
						     <ul id="newStuff_com" class="custom-sli nav nav-tabs nav-stacked">
					<!-- Single Listing Item -->
					<li>
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div href="listings-single-page.html" class="listing-item">	
								<!-- Image -->
								<div class="listing-item-image">
									<img src="images/floor-house-plan.jpg" alt="">
									<span class="green tag">Completed</span>
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><a href="#">Tom's Restaurant</a></h3>
										<h5>Painting Services</h5>
										<span>Approximately 100 m<sup>s</sup></span><br />
										<span><em>20/11/2017 - 5.00pm</em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											<a href="l-request-sr-o.html" class="button gray"><i class="sl sl-icon-chart"></i> Service Report</a>
											<a href="l-request-io-o.html" class="button gray"><i class="sl sl-icon-doc"></i> Invoice</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->
					</li>
					<!-- Single Listing Item / End -->
					
					<!-- Single Listing Item -->
					<li>				
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div href="listings-single-page.html" class="listing-item">
								<!-- Image -->
								<div class="listing-item-image">
									<img src="images/maxresdefault.jpg" alt="">
									<span class="green tag">Completed</span>
								</div>
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><a href="#">Riversail Condo</a></h3>
										<h5>Electrical Services</h5>
										<span>Faulty light switch</span><br />
										<span><em>01/09/2017 - 9.00am</em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											<a href="l-request-sr-o.html" class="button gray"><i class="sl sl-icon-chart"></i> Service Report</a>
											<a href="l-request-io-o.html" class="button gray"><i class="sl sl-icon-doc"></i> Invoice</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->			
					</li>
					<!-- Single Listing Item / End -->					
				</ul>
							<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							
								</ul> 
				<div class="pagination pagination-large">
           <ul class="pager_com">
							

								<li><p class="pagin-page">2</p></li>

							</ul>
					
					</div>	</nav>
				</div>
			</div>
			<!-- Pagination / End -->	
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
		
		
	</div>
</div></div>
<script>
	        $(document).ready(function() {

setTimeout(function(){
  $('.alert').remove();
}, 5000);
}
</script>
<script>
$(document).ready(function() 
{
	var listElement = $('#newStuff');
	var perPage = 20; 
	var numItems = listElement.children().size();
	var numPages = Math.ceil(numItems/perPage);
	$('.pager').data("curr",0);
	var curr = 0;
	while(numPages > curr)
	{
	  $('<li><a href="#" class="pagin-page">'+(curr+1)+'</a></li>').appendTo('.pager');
	  curr++;
	}
	$('.pager .pagin-page:first').addClass('active');
	listElement.children().css('display', 'none');
	listElement.children().slice(0, perPage).css('display', 'block');
	$('.pager li a').click(function(){
				    e.preventDefault();

	var clickedPage = $(this).html().valueOf() - 1;
	// alert(clickedPage);
	goTo(clickedPage,perPage);
	});

	function previous(){
	  var goToPage = parseInt($('.pager').data("curr")) - 1;
	  if($('.active').prev('.pagin-page').length==true){
		goTo(goToPage);
	  }
	}

	function next(){
	  goToPage = parseInt($('.pager').data("curr")) + 1;
	  if($('.active_page').next('.pagin-page').length==true){
		goTo(goToPage);
	  }
	}

	function goTo(page){
	  var startAt = page * perPage,
		endOn = startAt + perPage;
	  
	  listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
	  $('.pager').attr("curr",page);
	}

	//~ setTimeout(function(){
	  //~ $('.alert').remove();
	//~ }, 5000);

});

$(document).ready(function()
{
	
	var listElement = $('#newStuff_com');
	var perPage = 1; 
	var numItems = listElement.children().size();
	var numPages = Math.ceil(numItems/perPage);

	$('.pager_com').data("curr",0);
		var curr = 0;
		while(numPages > curr){
		$('<li><a href="#" class="pagin-page-com">'+(curr+1)+'</a></li>').appendTo('.pager_com');
		curr++;
	}

	$('.pager_com .pagin-page-com:first').addClass('active');
	listElement.children().css('display', 'none');
	listElement.children().slice(0, perPage).css('display', 'block');

	$('.pager_com li a').click(function()
	{
		    e.preventDefault();

	  var clickedPage = $(this).html().valueOf() - 1;
	  goTo(clickedPage,perPage);
	});

	function previous()
	{
	  var goToPage = parseInt($('.pager_com').data("curr")) - 1;
	  if($('.active').prev('.pagin-page-com').length==true){
		goTo(goToPage);
	  }
	}

	function next()
	{
	  goToPage = parseInt($('.pager_com').data("curr")) + 1;
	  if($('.active_page').next('.pagin-page-com').length==true){
		goTo(goToPage);
	  }
	}

	function goTo(page)
	{
	  var startAt = page * perPage,
	  endOn = startAt + perPage;
	  listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
	  $('.pager_com').attr("curr",page);
	}

});
</script>
