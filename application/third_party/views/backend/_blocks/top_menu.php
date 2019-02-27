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
		//var_dump($getuser_list->skills);

		
?>




	
	<li class="nav-item start <?php echo ($current_menu == "user" ) ? " active" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "contractor" || $submenu == "admin") ? "active open" : ""; ?>" ><i class="im im-icon-Checked-User"></i> Account</a>
	<ul class="sub-menu" <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "list") ? " style='display:block !important'" : ""; ?>>
	
	
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "admin") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/administrator" class="nav-link"><i class="im im-icon-Business-Man"></i> <?php echo 'Administrator'; ?> 
	</a>
	</li>
	
	
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "users") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/users" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Company'; ?> 
	</a>
	</li>

	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "users") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/professional" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Professional'; ?> 
	</a>
	</li>
	
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "users") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/student" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Student'; ?> 
	</a>
	</li>

<!--
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "contractor") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/contractor" class="nav-link"><i class="im im-icon-Worker"></i> <?php echo 'Contractor'; ?> 
	</a>
	</li>
-->

	


	</ul>	
	</li>



















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

