<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer" style="width: 100%;">
	<?php 
	$lang = $this->session->site_lang; 
	?>
		<div  class="col-md-12 col-sm-12 col-xs-12">
		</div>
	</div>

	<!-- BEGIN CORE PLUGINS -->

	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/jquery-ui.min.js"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/mmenu.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/chosen.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/rangeslider.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/waypoints.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/counterup.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/tooltips.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/listeo/scripts/custom.js"></script>

<!--
	<script src="<?php echo $base_url;?>assets/sign/jSignature.js"></script>
	<script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.CompressorBase30.js"></script>
	<script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.CompressorSVG.js"></script>
	<script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.UndoButton.js"></script> 
	<script src="<?php echo $base_url;?>assets/sign/plugins/signhere/jSignature.SignHere.js"></script> 
-->

	<script src="<?php echo $base_url;?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!--
	<script src="<?php echo $base_url;?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
-->
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	
<script type="text/javascript" src="<?php echo $base_url; ?>assets/listeo/scripts/dropzone.js"></script>
<script type="text/javascript">
        jQuery(".dropzone").dropzone({
			  contentType: "application/json",
			dataType: "json",
            success : function(file, response) {
                console.log(file);
                console.log(response);
                var objres = jQuery.parseJSON(response);
                 console.log(objres.target_file);
                if (objres.target_file != '') {
					     //       tmpHTML += "<input type=\"file\" name=\"file1\" onchange=\"changed()\">";
            var tmpHTML = $('.gallimg').html();

                  tmpHTML += "<input type=\"hidden\" name=\"galleryimg[]\" id=\"galleryimg\" class=\"galleryimg\" value=\""+objres.target_file+"\">";
                   $('.gallimg').html(tmpHTML);
                }
            }
        });
    </script>

	<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $base_url;?>assets/global/scripts/datatable.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<!--
	<script src="<?php echo $base_url;?>assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo $base_url;?>assets/pages/scripts/form-wizard.js" type="text/javascript"></script>
-->
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!--
	<script src="<?php echo $base_url;?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo $base_url;?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo $base_url;?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo $base_url;?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
-->
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--
	<script src="<?php echo $base_url;?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
	<script src="<?php echo $base_url;?>assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/js/iconset/iconset-all.min.js"></script>
-->
<!--
	<script type="text/javascript" src="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
-->
	<!-- END PAGE LEVEL SCRIPTS -->
<!--
	<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
-->
	<!-- END THEME LAYOUT SCRIPTS -->

<!--
	<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
-->
<!--
	<script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
-->


	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

	<script type="text/javascript">
	$(document).ready(function() {

	if(window.File && window.FileList && window.FileReader) {
	$("#files").on("change",function(e) {
	var files = e.target.files ,
	filesLength = files.length ;
	for (var i = 0; i < filesLength ; i++) {
	var f = files[i]
	var fileReader = new FileReader();
	fileReader.onload = (function(e) {
	var file = e.target;
	$("<img></img>",{
	class : "imageThumb",
	src : e.target.result,
	title : file.name
	}).insertAfter("#files");
	});
	fileReader.readAsDataURL(f);
	}
	});
	} else { alert("Your browser doesn't support to File API") }
	});



	</script>
<!--
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/phogallery/fs-gal.css" />
-->

<!--
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/phogallery/fs-gal.js"></script>
-->
	<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36251023-1']);
	_gaq.push(['_setDomainName', 'jqueryscript.net']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>

	<?php if($this->uri->segment(1) == 'purchase_order'){ ?> 

	<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo BASE_URL;?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> 

	<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
	<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<script src="<?php echo BASE_URL;?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
	<script src="<?php echo BASE_URL;?>/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>  


	<?php } ?>

	<!-- Scripts
	================================================== -->

	<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
	<link href="<?php echo $base_url;?>assets/listeo/css/plugins/datedropper.css" rel="stylesheet" type="text/css">
	<script src="<?php echo $base_url;?>assets/listeo/scripts/datedropper.js"></script>
	<script>$('#booking-date').dateDropper();</script>
	<script>$('#booking-dateapoint').dateDropper();</script>

	<script src="<?php echo $base_url;?>assets/listeo/scripts/dragndrop.js" type="text/javascript"></script>

	<script src="<?php echo $base_url;?>assets/datetimedrapper/js/timedropper.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/datetimedrapper/css/timedropper.css"> 
		<script>$('#booking-time-app').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});</script>
	<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<!--
	<link href="<?= site_url('assets/datetimedrapper/css/datedropper.css'); ?>" rel="stylesheet" type="text/css">
	<script src="<?= site_url('assets/datetimedrapper/js/datedropper.js'); ?>"></script>
-->
	<script>$('.booking-date').dateDropper();</script> 

	<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
	<!--
	<script src="<?= site_url('assets/datetimedrapper/js/timedropper.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= site_url('assets/datetimedrapper/css/timedropper.css'); ?>"> 
	<script>
	this.$('.booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
	});

	var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
	});
	</script> 
	-->
<!--
	<script src="<?php echo $base_url; ?>assets/global/plugins/fullcalendar/gcal.js"></script>
-->

	<!-- Booking Widget - Quantity Buttons -->

<!--
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/site.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/richtext.min.css">
	<script src="<?php echo $base_url; ?>assets/textediter/js/jquery.richtext.js"></script>
-->



<script>

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification(view = '')

{

 $.ajax({

  url:"<?php echo $base_url; ?>admin/appointment/getawaitconfirmationdata",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
if(data.status == 'success')
{

 
    $('.awadcount').html('<span class="nav-tag red">'+data.countdata+'</span>');
//~     $('.subadawcount').html('<span class="rem-tag ">'+data.countdata+'</span>');
   }

  }

 });

}
load_unseen_notification();

function load_unseenschedule_notification(view = '')

{

 $.ajax({

  url:"<?php echo $base_url; ?>admin/appointment/getscheduledata",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
if(data.status == 'success')
{

 
    $('.scheadcount').html('<span class="nav-tag red">'+data.countdata+'</span>');
//~     $('.subadschecount').html('<span class="rem-tag ">'+data.countdata+'</span>');
   }

  }

 });

}

load_unseenschedule_notification();
function load_unseenendoseservice_notification(view = '')

{

 $.ajax({

  url:"<?php echo $base_url; ?>admin/appointment/getendoseservicedata",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
if(data.status == 'success')
{

 
    $('.endorseadcount').html('<span class="nav-tag red">'+data.countdata+'</span>');
    $('.subendorseadcount').html('<span class="nav-tag red">'+data.countdata+'</span>');
   }

  }

 });

}

load_unseenendoseservice_notification();
setInterval(function(){

 load_unseen_notification();;
load_unseenschedule_notification();;
load_unseenendoseservice_notification();;

}, 5000);

});

</script>

<!--
	<script>
	$(document).ready(function() {
	$('.content_desc').richText();
	});
	</script>
-->
</body>
</html>
