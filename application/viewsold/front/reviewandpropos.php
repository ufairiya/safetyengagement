   <section class="our_about_area">

<div class="container">
<div class="reviewjobdetails">



  <div class="form-wrap">
		
										
		  <ul class="tabsreview">
		<li class="tab-link current " data-tab="viewjobdetail"><span>View Job Details</span></li>
		<li class="tab-link " data-tab="covrerletter"><span>Cover A Letter</span></li>
	
	</ul>

	<div id="viewjobdetail" class="tab-contentview current ui-tabs-panel ui-corner-bottom ui-widget-content" >
								<div style="background: #fff8f8;width: 100%;display: table;border: 1px solid rgb(204, 204, 204);">

								<div class="col-md-8 coverreview">
							
									<h5>Details</h5>
								
									<h5>Need Based</h5>
								
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								</div>
								<div class="col-md-4 coverreview">
									<div class="inside-right">
										<p>Posted 11 months ago</p>
									
										<h5><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<span class="f-black">Job Title</span></h5>
									
																				<h5><i class="fa fa-usd"></i>&nbsp;&nbsp;<span class="f-black">intermediate</span></h5>
									</div>
								</div>	</div>
							
	</div>
	<div id="covrerletter" class="tab-contentview tabs ui-tabs-panel ui-corner-bottom ui-widget-content" >
								<div style="background: #fff8f8;width: 100%;display: table;border: 1px solid rgb(204, 204, 204);">
								
								<div class="col-md-12 coverreview">
								
									<h5>NEED BASED</h5>
									
									<h5 style="clear: both;">Cover Letter</h5><br>
									<p>Yes</p>
								
																	</div>
						
</div>
						
</div>


</div><!-- container -->
</div></div>
  
   </section>
	<script type="text/javascript">
    
  	$('ul.tabsreview li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabsreview li').removeClass('current');
		$('.tab-contentview').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})


 </script>
