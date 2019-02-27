<?php 
$submenu = isset($sub_menu)  ? $sub_menu : FALSE;
$userType =  get_user_type();
?>

	<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
	<div class="dashboard-nav-inner">
<?php if($this->session->userdata('user_type')== "superuser" )
{	?>
	<ul data-submenu-title="System Management">




	<li class="nav-item start <?php echo ($current_menu == "dashboard" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/dashboard" class="nav-link"> 
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Dashboard </span>
	<span class="arrow <?php echo ($current_menu == "dashboard") ? " open" : ""; ?>"></span>
	</a>    							
	</li>

	<?php 

	$details = $this->purchaseorder_model->getpending_task(); 
	$count = count($details);

	$schedule = $this->purchaseorder_model->getawaitingservice_task();
	$count_service = count($schedule);


	$servicecount = $this->purchaseorder_model->getservicereport_list();
	$servicecountval = count($servicecount);
	$getuser_list = $this->purchaseorder_model->getuser_list($this->session->userdata('user_id'));
		
		 $chkskills =explode(",",$getuser_list->skills); 

?>




	<?php if(in_array(1,$chkskills))
	 { 
		 ?>
	<li class="nav-item start <?php echo ($current_menu == "user" ) ? " active" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "contractor" || $submenu == "admin") ? "active open" : ""; ?>" ><i class="im im-icon-Checked-User"></i> Account</a>
	<ul class="sub-menu" <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "list") ? " style='display:block !important'" : ""; ?>>
	<?php if(in_array(2,$chkskills))
	 { 
		 ?>
	
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "admin") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/administrator" class="nav-link"><i class="im im-icon-Business-Man"></i> <?php echo 'Administrator'; ?> 
	</a>
	</li>
		<?php }
		if(in_array(3,$chkskills))
	 {  ?>	
	
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "users") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/users" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Company'; ?> 
	</a>
	</li>
<?php }
		if(in_array(4,$chkskills))
	 {  ?>
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "professional") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/professional" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Professional'; ?> 
	</a>
	</li>
	<?php }
		if(in_array(5,$chkskills))
	 {  ?>
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "student") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/student" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Student'; ?> 
	</a>
	</li>
<?php }
		 ?>
<!--

	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "privileges") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/privileges" class="nav-link"><i class="im im-icon-Worker"></i> <?php echo 'Privileges'; ?> 
	</a>
	</li>
-->





	</ul>	
	</li>
	<?php }  if(in_array(6,$chkskills))
	 { ?>	
	

	<li class="nav-item start <?php echo ($current_menu == "apartment" ) ? " open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/packages" class="nav-link nav-toggle <?php echo ($current_menu == "apartment" && $submenu == "propertycreate" || $submenu == "propertylist") ? "active open" : ""; ?>" > 
	<i class="fa fa-building-o"></i>
	<span class="title">Packages</span>
	<span class="arrow <?php echo ($current_menu == "user") ? " open" : ""; ?>"></span>
	</a>    
	
	</li>
<?php }  if(in_array(7,$chkskills))
	 { ?>
<li class="nav-item start <?php echo ($current_menu == "payment" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/packages/payment" class="nav-link"> 
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Payment </span>
	<span class="arrow <?php echo ($current_menu == "payment") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
<?php }  if(in_array(8,$chkskills))
	 { ?>
<li class="nav-item start <?php echo ($current_menu == "jobpost" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/job/postjob_list" class="nav-link"> 
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Job Posts </span>
	<span class="arrow <?php echo ($current_menu == "jobpost") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
<?php }  if(in_array(9,$chkskills))
	 { ?>
<li class="nav-item start <?php echo ($current_menu == "jobbid" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/job/bidjob_list" class="nav-link"> 
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Bid Jobs </span>
	<span class="arrow <?php echo ($current_menu == "jobbid") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
<?php }  if(in_array(10,$chkskills))
	 { ?>
<li class="nav-item start <?php echo ($current_menu == "awardedjob" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/job/awardedjob_list" class="nav-link">  
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Awarded Job </span>
	<span class="arrow <?php echo ($current_menu == "awardedjob") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
<?php }  if(in_array(11,$chkskills))
	 { ?>
<li class="nav-item start <?php echo ($current_menu == "completejob" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/job/completedjob_list" class="nav-link"> 
	<i class="im im-icon-Gaugage"></i>
	<span class="title">Completed Job </span>
	<span class="arrow <?php echo ($current_menu == "completejob") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
<?php } ?>
	</ul>

	<ul data-submenu-title="My Account">


	<li class="nav-item start <?php echo ($current_menu == "profile" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/profile" class="nav-link"> 					
	<i class="im im-icon-User"></i> Profile
	<span class="arrow <?php echo ($current_menu == "profile") ? " open" : ""; ?>"></span>
	</a>    							
	</li>

	<!--
	<li><a href="<?php echo $base_url?>admin/profile"><i class="im im-icon-User"></i> Profile</a></li>
	-->
	<li>
	<a class="logout_des dropdown-toggle" href="<?php echo $base_url?>admin/login/logout">
	<i class="sl sl-icon-power"></i> <?php echo $this->lang->line('logout'); ?>  </a>
	</li>

	</ul>	
	
	<?php } ?>
	
	</div>
</div>
	<!-- Navigation / End -->

