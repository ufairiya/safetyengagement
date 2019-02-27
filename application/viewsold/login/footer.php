<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<!-- END : LOGIN PAGE 5-2 -->
	<!--[if lt IE 9]>
	<script src="<?php echo $base_url;?>assets/global/plugins/respond.min.js"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/excanvas.min.js"></script> 
	<script src="<?php echo $base_url;?>assets/global/plugins/ie8.fix.min.js"></script> 
	<![endif]-->

	<!-- BEGIN CORE PLUGINS -->
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/jquery-ui.min.js"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type='text/javascript'>


	jQuery('.for_click_ad').click(function(e){
	e.stopPropagation();
	jQuery('.for_got_form').show();
	jQuery('.for_got').hide();
	});
	$('mfp-close').on('click' ,function()
	{
	$(this).closest("#sign-in-dialog").find(".for_got_form").hide();
	});
	$('.sign-in-ad').on('click' ,function()
	{	
	jQuery('.for_got').show();
	jQuery('.for_got_form').hide();
	//~ $('mfp-close').closest("#sign-in-dialog").find(".for_got_form").show();
	});

	</script>
	<script src="<?php echo $base_url;?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
	<!--
	<script src="<?php echo $base_url;?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	-->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $base_url;?>assets/pages/scripts/login-4.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
