<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Howdy, Tom!</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li>Home</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Notice -->
<!--
		<div class="row">
			<div class="col-md-12">
				<div class="notification success closeable margin-bottom-30">
					<p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
					<a class="close" href="#"></a>
				</div>
			</div>
		</div>
-->

		<!-- Content -->
	<div class="row">

			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4><?php echo count($get_com); ?></h4> <span>Company</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Check"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4><?php echo count($get_sp); ?></h4> <span>Professional</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Approved-Window"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-4 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4><?php echo count($get_stu); ?></h4> <span>Student</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Thumb"></i></div>
				</div>
			</div>


		</div>
		
		<!-- Content -->
	<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4><?php echo count($get_post_job); ?></h4> <span>Post Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Check"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4><?php echo count($get_bid_job); ?></h4> <span>Bid Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Approved-Window"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4><?php echo count($get_award_job); ?></h4> <span>Award Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Thumb"></i></div>
				</div>
			</div>

			<!-- Item -->

			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4><?php echo count($get_complet_job); ?></h4> <span>Completed Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Dollar-Sign2"></i></div>
				</div>
			</div>

		</div>
		
		<div class="row">

<select id="post_job" name="time">
					<option value = "1">All</option>
					<option value = "2">Today</option>
					<option value = "3">This week</option>
					<option value = "4">This month</option>
					<option value = "5">This year</option>
					</select>
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
					
				<div class="dashboard-stat color-1">
				
					<div class="dashboard-stat-content"><h4 id="post_time"><?php echo count($get_post_job); ?></h4> <span>Post Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Check"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4 id="bid_time"><?php echo count($get_bid_job); ?></h4> <span>Bid Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Approved-Window"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4  id="award_time" ><?php echo count($get_award_job); ?></h4> <span>Award Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Thumb"></i></div>
				</div>
			</div>

			<!-- Item -->

			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4  id="complet_time"  ><?php echo count($get_complet_job); ?></h4> <span>Completed Jobs</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Dollar-Sign2"></i></div>
				</div>
			</div>

		</div>

		<div class="row">
			
			<!-- Recent Activity -->
<!--
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Recent Activities</h4>
					<ul>
						<li>
							<i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="#">Hotel Govendor</a></strong> has been approved!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Burger House</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="3.0"></div> on <strong><a href="#">Airport</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> John Doe left a review <div class="numerical-rating" data-rating="4.0"></div> on <strong><a href="#">Burger House</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review <div class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Tom's Restaurant</a></strong>
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>
					</ul>
				</div>
			</div>
-->
			
			<!-- Invoices -->
<!--
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Invoices</h4>
					<ul>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Professional Plan</strong>
							<ul>
								<li class="unpaid">Unpaid</li>
								<li>Order: #00124</li>
								<li>Date: 20/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
							</div>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Extended Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00108</li>
								<li>Date: 14/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
							</div>
						</li>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Extended Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00097</li>
								<li>Date: 10/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
							</div>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>Basic Plan</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00091</li>
								<li>Date: 30/06/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.html" class="button gray">View Invoice</a>
							</div>
						</li>

					</ul>
				</div>
			</div>
-->

				<!-- Copyrights -->
				<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="copyrights"><?php echo date('Y');?> &copy; Safety Engagement.</div>
				</div>
			</div>

		</div>
		<!-- Content / End -->


	</div>
	<!-- Dashboard / End -->
            




<!--
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script> 
-->
<script type="application/javascript">
				$('#post_job').on('change', function (e) {
					var SelectedValue = $('option:selected',this).val();
				
				$.ajax({
				url: '<?php echo $base_url?>admin/dashboard/post_cal',
				 method: "POST",
				 dataType: "json", 
            data:{id:SelectedValue},  
				success:function(data)
				{   
					$("#post_time").html(data['post_job']);
					$("#bid_time").html(data['bid_job']);
					$("#award_time").html(data['award_job']);
					$("#complet_time").html(data['complet_job']);
					//window.location.replace("<?php echo base_url(); ?>package/package_payment/"+data+"");
 
				}
				})


				});
	</script>
