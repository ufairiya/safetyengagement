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
		$skilldata = explode(',',$getuser_list->skills);
		if(in_array('1',$skilldata )){
?>

	
	<li class="nav-item start <?php echo ($current_menu == "appointment" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/appointment" class="nav-link"> 
	<i class="im im-icon-Check"></i>
	<span class="title">Appointment <?php if($count != 0) { ?>
	<span class="nav-tag messages red"><?php echo $count; ?></span><?php } ?></span>
	<span class="arrow <?php echo ($current_menu == "appointment") ? " open" : ""; ?>"></span>
	</a>    							
	</li>
	<?php } if(in_array('2',$skilldata )){ ?>

	<li class="nav-item start <?php echo ($current_menu == "schdule" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/schedule/schedulecreate" class="nav-link"> 
	<i class="im im-icon-Calendar-3"></i>
	<span class="title">Schedule <?php if($count_service != 0) { ?>
	<span class="nav-tag messages red"><?php echo $count_service; ?></span><?php } ?></span>
	<span class="arrow <?php echo ($current_menu == "schdule") ? " active open" : ""; ?>"></span>
	</a>    							
	</li>
	<?php } if(in_array('3',$skilldata )){ ?> 

	<li class="nav-item start <?php echo ($current_menu == "servicecategory" ) ? "active" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "servicecategory" && $submenu == "service_add" || $submenu == "service_list") ? "active open" : ""; ?>" > 
	<i class="im im-icon-Photo-2"></i>
	<span class="title">Service</span>
	<span class="arrow <?php echo ($current_menu == "servicecategory") ? "open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "servicecategory" && $submenu == "service_add" || $submenu == "service_list") ? " style='display:block !important'" : ""; ?>>                                                         
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "service_list") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/service/list_services" class="nav-link">
	<i class="im im-icon-Check-2"></i>
	<span class="title">List Services </span> 
	</a>
	</li>

	<li  class="nav-item start <?php echo ($submenu == "service_add") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/service/add_services" class="nav-link  "> 
	<i class="im im-icon-Add"></i> 
	<span class="title">Add Services </span> 
	</a>
	</li>
	</ul> 
	</li>

	<?php } if(in_array('4',$skilldata )){ ?> 
	<li class="nav-item start <?php echo ($current_menu == "user" ) ? " active" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "contractor" || $submenu == "admin") ? "active open" : ""; ?>" ><i class="im im-icon-Checked-User"></i> Account</a>
	<ul class="sub-menu" <?php echo ($current_menu == "user" && $submenu == "users" || $submenu == "list") ? " style='display:block !important'" : ""; ?>>
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "users") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/users" class="nav-link"><i class="im im-icon-MaleFemale"></i> <?php echo 'Users'; ?> 
	</a>
	</li>
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "contractor") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/contractor" class="nav-link"><i class="im im-icon-Worker"></i> <?php echo 'Contractor'; ?> 
	</a>
	</li>
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "admin") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/user/administrator" class="nav-link"><i class="im im-icon-Business-Man"></i> <?php echo 'Administrator'; ?> 
	</a>
	</li>

	<!--
	<li>
	<a href="<?php echo $base_url?>admin/user/administrator">
	<i class="im im-icon-Business-Man"></i> Administrator
	</a>
	</li>
	-->
	</ul>	
	</li>
	<?php } ?>
	<!--
	<li class="nav-item start <?php echo ($current_menu == "apartment" ) ? " open" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "apartment" && $submenu == "propertycreate" || $submenu == "propertylist") ? "active open" : ""; ?>" > 
	<i class="fa fa-building-o"></i>
	<span class="title">Apartment</span>
	<span class="arrow <?php echo ($current_menu == "user") ? " open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "apartment" && $submenu == "propertycreate" || $submenu == "propertylist") ? " style='display:block !important'" : ""; ?>>                                                         
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "propertycreate") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/apartment/propertycreate" class="nav-link"><i class="im im-icon-Add-File"></i> <?php echo 'Add new Apartment'; ?> 
	</a>
	</li>
	<li  class="nav-item start <?php echo ($submenu == "propertylist") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/apartment/propertylist" class="nav-link  "> 
	<i class="fa fa-list-alt"></i> <?php if($this->session->userdata('user_type')){
	echo 'List Of Apartment'; } ?>
	</a>
	</li>
	</ul> 
	</li>

	-->

	<!--
	<li class="nav-item start <?php echo ($current_menu == "task_categories" ) ? " open" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "task_categories" && $submenu == "createtaskcategories" || $submenu == "list_taskcategory") ? "active open" : ""; ?>" > 
	<i class="fa fa-tasks"></i>
	<span class="title">Task Categories</span>
	<span class="arrow <?php echo ($current_menu == "task_categories") ? " open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "task_categories" && $submenu == "createtaskcategories" || $submenu == "list_taskcategory") ? " style='display:block !important'" : ""; ?>>                                                         
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "createtaskcategories") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/task/createtaskcategory" class="nav-link"><i class="im im-icon-Add-File"></i> <?php echo 'Add New Task Category' ?> 
	</a>
	</li>
	<li  class="nav-item start <?php echo ($submenu == "list_taskcategory") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/task/taskcategorieslist" class="nav-link  "> 
	<i class="fa fa-list-alt"></i> <?php if($this->session->userdata('user_type')){
	echo 'List Of Task Category'; } ?>
	</a>
	</li>
	</ul> 
	</li>

	-->




	<!--new-->



	<!--

	<li class="nav-item start <?php echo ($current_menu == "task" ) ? " open" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "task" && $submenu == "createtask" || $submenu == "list_task") ? "active open" : ""; ?>" > 
	<i class="icon-user"></i>
	<span class="title">Task</span>
	<span class="arrow <?php echo ($current_menu == "task") ? " open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "task" && $submenu == "createtask" || $submenu == "list_task") ? " style='display:block !important'" : ""; ?>>                                                         
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "createtask") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/task/createtask" class="nav-link"><i class="im im-icon-Add-File"></i> <?php echo 'Add New Task ' ?> 
	</a>
	</li>
	<li  class="nav-item start <?php echo ($submenu == "list_task") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/task/tasklist" class="nav-link  "> 
	<i class="fa fa-list-alt"></i> <?php if($this->session->userdata('user_type')){
	echo 'List Of Task '; } ?>
	</a>
	</li>
	</ul> 
	</li>
	-->





	<!--
	<li class="nav-item start <?php echo ($current_menu == "prices" ) ? " open" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "prices" && $submenu == "addprices" || $submenu == "prices_list") ? "active open" : ""; ?>" > 
	<i class="icon-user"></i>
	<span class="title">Prices</span>
	<span class="arrow <?php echo ($current_menu == "prices") ? " open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "prices" && $submenu == "addprices" || $submenu == "prices_list") ? " style='display:block !important'" : ""; ?>>                                                         
	<li aria-haspopup="true" class="nav-item start <?php echo ($submenu == "addprices") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/prices" class="nav-link"><i class="im im-icon-Add-File"></i> <?php echo 'Prices' ?> 
	</a>
	</li>

	<li  class="nav-item start <?php echo ($submenu == "prices_list") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/prices/price_list" class="nav-link  "> 
	<i class="fa fa-list-alt"></i> <?php if($this->session->userdata('user_type')){
	echo 'List Of Prices '; } ?>
	</a>
	</li>

	</ul> 
	</li>
	-->









	<!--
	<li><a href="dashboard--m-ap.html"><i class="im im-icon-Check"></i> Appointments <span class="nav-tag messages red">255</span></a></li>
	<li><a href="dashboard-m-po.html"><i class="im im-icon-Approved-Window"></i> Purchase Orders <span class="nav-tag messages red">1</span></a></li>
	<li class="active"><a href="dashboard--m-sc.html"><i class="im im-icon-Calendar-3"></i> Schedule <span class="nav-tag messages red">30</span></a></li>
	<li><a href="dashboard--m-ss.html"><i class="im im-icon-Bar-Chart"></i> Endorse Services <span class="nav-tag messages red">7</span></a></li>
	<li><a><i class="im im-icon-Checked-User"></i> Accounts <span class="nav-tag messages red">7</span></a>
	<ul>
	<li>
	<a href="dashboard-ac-us.html">
	<i class="im im-icon-MaleFemale"></i> Users <span class="nav-tag green">6</span>
	</a>
	</li>
	<li>
	<a href="dashboard-ac-co.html">
	<i class="im im-icon-Worker"></i> Contractors <span class="nav-tag yellow">1</span>
	</a>
	</li>
	<li>
	<a href="dashboard-ac-ad.html">
	<i class="im im-icon-Business-Man"></i> Administrators <span class="nav-tag red">2</span>
	</a>
	</li>
	</ul>	
	</li>
	-->
	</ul>
<?php  if(in_array('5',$skilldata )){ ?> 
	<ul data-submenu-title="Document Management">
	<!--
	<li><a href="#"><i class="im im-icon-File-Chart"></i> Service Sheets</a></li>
	-->

	<li class="nav-item start <?php echo ($current_menu == "service" ) ? " active" : ""; ?>">
	<a href="javascript:void(0);" class="nav-link nav-toggle <?php echo ($current_menu == "service" && $submenu == "endorseservice" || $submenu == "viewservicesheet") ? "active open" : ""; ?>" > 
	<i class="im im-icon-File-Chart"></i> Service Sheet
	<?php if($servicecountval != 0) { ?><span class="nav-tag red"><?php echo $servicecountval;?></span>	<?php } ?>				
	<span class="arrow <?php echo ($current_menu == "service") ? " open" : ""; ?>"></span>
	</a>    
	<ul class="sub-menu" <?php echo ($current_menu == "service" && $submenu == "endorseservice" || $submenu == "listservice_report") ? " style='display:block !important'" : ""; ?>>   


	<li class="nav-item start <?php echo ($submenu == "endorseservice" ) ? "active open" : ""; 	?>">
	<a href="<?php echo $base_url?>admin/service" class="nav-link nav-toggle <?php echo ($current_menu == "service" ) ? "active open" : ""; ?>" > 
	<i class="im im-icon-Yes"></i>
	<span class="title">Endorse</span>
	<?php if($servicecountval != 0) { ?><span class="nav-tag red"><?php echo $servicecountval;?></span>	<?php } ?>	
	</a>    
	</li>

	<li  class="nav-item start <?php echo ($submenu == "listservice_report") ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/service/list_servicereport" class="nav-link  "> 
	<i class="im im-icon-Eye-2"></i>
	<span class="title">View</span> 
	</a>
	</li>
	</ul> 
	</li>

	<li class="nav-item start <?php echo ($current_menu == "purchaseorder" ) ? "active open" : ""; ?>">
	<a href="<?php echo $base_url?>admin/purchaseorder/createpurchaseorder" class="nav-link"> 					
	<i class="im im-icon-File-Favorite"></i> Purchase Orders
	<span class="arrow <?php echo ($current_menu == "purchaseorder") ? " open" : ""; ?>"></span>
	</a>    							
	</li>

	<!--
	<li><a href="<?php echo $base_url?>admin/purchaseorder/createpurchaseorder"><i class="im im-icon-File-Favorite"></i> Purchase Orders</a></li>
	-->
	<li class="nav-item start <?php echo ($current_menu == "invoice" ) ? "active open" : ""; ?>"><a href="<?php echo $base_url?>admin/invoice"><i class="im im-icon-File-Bookmark"></i> Invoices
	<span class="arrow <?php echo ($current_menu == "invoice") ? " open" : ""; ?>"></span>
	</a>
	</li>

	</ul>
    <?php } ?> 
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

