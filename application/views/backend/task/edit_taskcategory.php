<?php   global $mobile_country_code,$country_array;?>
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
   <h4 class="modal-title"></h4>
   Edit Task category</h4>
</div>
<div class="modal-body">
<div class="row">
   <div class="col-md-12 form">
      <?php 
         if($gettaskdetails != FALSE){ 
         ?>
      <form id="update_user" method="post" enctype="multipart/form-data">
         <div class="form-body ">
            <input type="hidden" name="id" id="id" value="<?php echo $gettaskdetails->id;?>">
            <div class="form-group form-md-line-input">
               <label for="form_control_1">Name </label>
               <input type="text" class="form-control" name="taskcat_name" id="taskcat_name" value="<?php echo $gettaskdetails->taskcategory_name;?>">
            </div>
            <div class="form-group form-md-line-input">
               <label for="form_control_1">Description </label>
    <div class="page-wrapper box-content">

            <textarea name="taskcat_desc" id="taskcat_desc" class="content_desc"><?php echo $gettaskdetails->description;?></textarea>

        </div>            </div>
            <div class="form-group form-md-line-input">
               <label for="form_control_1">Status</label>
               <select class="form-control" name="status" id="status">
                  <option value="active" <?php echo ($gettaskdetails->status == 'active') ? 'selected="selected"' : "";?>  >Active</option>
                  <option value="deactive" <?php echo ($gettaskdetails->status == 'deactive') ? 'selected="selected"' : "";?> >Deactive</option>
               </select>
            </div>
            <div class="form-actions">
               <div class="row">
                  <div class="col-md-12">
                     <div class="col-md-6">
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                     </div>
                     <div class="col-md-6">
                        <button type="submit"  style="float:right" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                     </div>
                  </div>
               </div>
            </div>
      </form>
      <?php } ?>
      </div>
   </div>
</div>
<script type="application/javascript">
   (function($){
          var form1 = $('#update_user');
           var error1 = $('.alert-danger', form1);
           var success1 = $('.alert-success', form1);
   
           form1.validate({
               errorElement: 'span', //default input error message container
               errorClass: 'help-block help-block-error', // default input error message class
               focusInvalid: false, // do not focus the last invalid input
               ignore: "", // validate all fields including form hidden input
               messages: {              
                   'name': {
                       required: 'Please Enter the  name',
                   },
                   'image': {
                       required: 'Please Enter the  image',
                   },
    
               },
               rules: {
                   name: {
                       required: true
                   },
   			   },
   
               highlight: function(element) { // hightlight error inputs
                   $(element)
                       .closest('.form-group').addClass('has-error'); // set error class to the control group
               },
   
               unhighlight: function(element) { // revert the change done by hightlight
                   $(element)
                       .closest('.form-group').removeClass('has-error'); // set error class to the control group
               },
   
               success: function(label) {
                   label
                       .closest('.form-group').removeClass('has-error'); // set success class to the control group
               },
   
               submitHandler: function(form,event) {
             //  event.preventDefault();
   			
   				jQuery.ajax({
   					url : '<?php echo $base_url?>admin/task/update_taskcategory',
   					type: 'POST',
   					data: jQuery(form).serialize(),
   					success:function(response){
   						
   						jQuery(form)[0].reset();
   						toastr.options = {
   							"closeButton": true,
   						}
   						alert(data);
   						toastr.success("Task Updated Succesfully", "Notifications");
   						setTimeout(function(){ location.reload(); }, 500);			
   						}
   					});
               }
           });
   })(jQuery);
   
</script>
        <link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/site.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>assets/textediter/css/richtext.min.css">
        <script src="<?php echo $base_url; ?>assets/textediter/js/jquery.richtext.js"></script>

        <script>
        $(document).ready(function() {
            $('.content_desc').richText();
        });
        </script>
<!--
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
-->
