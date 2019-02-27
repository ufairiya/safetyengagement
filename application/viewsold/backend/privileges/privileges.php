<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">
	<div class="">
		
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Privileges Management</h2>
				</div>
			</div>
		</div>
		
		<!-- Apartment List -->
		
		<!-- New Apartment -->
		<div class="col-lg-12 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">List of Privileges</h4>
				<div class="dashboard-list-box-static">
				<button data-toggle="modal" data-target="#privillege" class="btn btn-sm " type="button">
						<?php echo $this->lang->line('add'); ?> New <?php echo $this->lang->line('privileges'); ?></button>
					<div class="my-profile">
                    	<table class="table table-hover table-bordered table-striped" id="privileges_list">
								<thead>
									<tr>
									<th>List #</th>
									<th><?php echo $this->lang->line('privileges'); ?></th>
									<th><?php echo $this->lang->line('privileges'); ?> Key</th>
									<th><?php echo $this->lang->line('description'); ?></th>
									<th></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									if($list_of_privileges != FALSE){
									$i =1;
									foreach($list_of_privileges as $privileges_key => $privileges_value){
									echo '<tr>
									<td>'.$i.'</td>
									<td>'.$privileges_value->access_privileges_name.'</td>
									<td>'.$privileges_value->access_privileges_key.'</td>
									<td>'.$privileges_value->access_privileges_desc.'</td>
									<td>';
									if($user_edit_access == TRUE){
									echo '<a href="'.$base_url.'admin/privileges/get_privilege_edit_template/'.$privileges_value->id_access_privileges.'" data-target="#ajax" data-toggle="modal" class="btn btn-circle btn-icon-only btn-default  sbold uppercase"><i class="fa fa-edit"></i> </a>';
									}
									if($user_delete_access == TRUE){
									if($privileges_value->status == 1 || $privileges_value->status == 0){												 
									echo '<button class="btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this Privilages? After re-save the user access" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-uid ="'.$privileges_value->id_access_privileges.'" data-confirm-button-class="btn-info" data-task="d"><i class="fa fa-trash"></i> </button>';
									}
									if($privileges_value->status == 2){
									echo '<button class="btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this user? After delete re-save the user access" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid ="'.$privileges_value->id_access_privileges.'" data-confirm-button-class="btn-info"> <i class="fa fa-trash-o"> </i> </button>';
									}
									}
									echo '</td>
									</tr>';
									$i++;
									}
									}
									?>
								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<img src="<?php echo $base_url;?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
				<span> &nbsp;&nbsp;Loading... </span>
			</div>
		</div>
	</div>
</div>
<script type="application/javascript">
jQuery(document).ready(function(e) {
var table = jQuery('#privileges_list');

var oTable = table.dataTable({

"language": {
	 "sEmptyTable":     "No Record Found",
"aria": {
"sortAscending": ": activate to sort column ascending",
"sortDescending": ": activate to sort column descending"
},
"emptyTable": "No data available in table",
"info": "Showing _START_ to _END_ of _TOTAL_ entries",
"infoEmpty": "No entries found",
"infoFiltered": "(filtered1 from _MAX_ total entries)",
"lengthMenu": "_MENU_ entries",
"search": "Search:",
"zeroRecords": "No matching records found"
},



buttons: [
// { extend: 'pdf', className: 'btn default' },
// { extend: 'csv', className: 'btn default' }
],

"order": [
[0, 'asc']
],

"lengthMenu": [
[5, 10, 15, 20, -1],
[5, 10, 15, 20, "All"] // change per page values here
],
"pageLength": 10,

"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
});
});

var SweetAlert = function () {

return {
//main function to initiate the module
init: function () {
$('.mt-sweetalert-delete').each(function(){
var sa_title = $(this).data('title');
var sa_message = $(this).data('message');
var sa_type = $(this).data('type');	
var sa_allowOutsideClick = $(this).data('allow-outside-click');
var sa_showConfirmButton = $(this).data('show-confirm-button');
var sa_showCancelButton = $(this).data('show-cancel-button');
var sa_closeOnConfirm = $(this).data('close-on-confirm');
var sa_closeOnCancel = $(this).data('close-on-cancel');
var sa_confirmButtonText = $(this).data('confirm-button-text');
var sa_cancelButtonText = $(this).data('cancel-button-text');
var sa_popupTitleSuccess = $(this).data('popup-title-success');
var sa_popupMessageSuccess = $(this).data('popup-message-success');
var sa_popupTitleCancel = $(this).data('popup-title-cancel');
var sa_popupMessageCancel = $(this).data('popup-message-cancel');
var sa_confirmButtonClass = $(this).data('confirm-button-class');
var sa_cancelButtonClass = $(this).data('cancel-button-class');

$(document).on('click', '.mt-sweetalert-delete', function(){

//~ $(this).click(function(){
var key = $(this).attr('data-uid');
var task = $(this).attr('data-task');
//console.log(sa_btnClass);
swal({
title: sa_title,
text: sa_message,
type: sa_type,
allowOutsideClick: sa_allowOutsideClick,
showConfirmButton: sa_showConfirmButton,
showCancelButton: sa_showCancelButton,
confirmButtonClass: sa_confirmButtonClass,
cancelButtonClass: sa_cancelButtonClass,
closeOnConfirm: sa_closeOnConfirm,
closeOnCancel: sa_closeOnCancel,
confirmButtonText: sa_confirmButtonText,
cancelButtonText: sa_cancelButtonText,
},
function(isConfirm){
if (isConfirm){
jQuery.ajax({
url : '<?php echo $base_url?>admin/privileges/delete_privileges',
type: 'POST',
data: {'key':key,'task':task},
success:function(response){

toastr.options = {
"closeButton": true,
}
toastr.warning("Privilege Deleted Succesfully", "Notifications");
setTimeout(function(){ location.reload(); }, 500);		
}
});
} else {
swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");
}
});
});
});    

}
}

}();

jQuery(document).ready(function() {
SweetAlert.init();	
jQuery(".modal").on("hidden.bs.modal", function(){
$(this).find(".modal-content").html("");
});
});

jQuery(document).ready(function(e) {
var form1 = $('#privileges_add_form');
var error1 = $('.alert-danger', form1);
var success1 = $('.alert-success', form1);
var token = '<?php echo $this->config->item("csrf_protection");?>';

form1.validate({
errorElement: 'span', //default input error message container
errorClass: 'help-block help-block-error', // default input error message class
focusInvalid: false, // do not focus the last invalid input
ignore: "", // validate all fields including form hidden input   
messages: {      
'privileges_name': {
required: 'Please Enter the Privileges Name',
remote	: 'Privileges Name already exists',
},
'privileges_desc': {
required: 'Please Enter the Privileges Description',
},

},
rules: {
privileges_name: {
required: true,
remote: {
url: "<?php echo $base_url?>admin/privileges/privileges_unquie",
type: "post",
data: {
priv_name: function() {
return $("#privileges_name" ).val();
}
}
}
},			
privileges_desc: {
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

submitHandler: function(form) {
jQuery.ajax({
url : '<?php echo $base_url?>admin/privileges/privileges_save',
type: 'POST',
data: jQuery(form).serialize(),
success:function(response){
jQuery(form)[0].reset();
window.location.href = '<?php echo $base_url?>admin/privileges';
}
});
}
});
});

</script>
<div class="modal fade" id="privillege">
		<div class="modal-dialog">
			<div style="background-color: #fff;">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title col-md-11">Create Privileges</h4>
					<button type="button" class="close col-md-1" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body col-md-12">
				<!-- BEGIN FORM-->
					<form id="privileges_add_form" method="post">
						<?php
						$csrf = array(
						'name' => $this->security->get_csrf_token_name(),
						'hash' => $this->security->get_csrf_hash()
						); ?>
						<input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" />
						<div class="form-body">
						<div class="form-group form-md-line-input">
						<label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> Name</label>
						<input type="text" class="form-control" name="privileges_name" id="privileges_name">
						</div>
						<div class="form-group form-md-line-input">
						<label for="form_control_1"><?php echo $this->lang->line('privileges'); ?> <?php echo $this->lang->line('description'); ?></label>
						<textarea  class="form-control edit" name="privileges_desc" id="privileges_desc"></textarea>
						</div>                                                                                                    
						</div>
						<div class="form-actions">
						<div class="row">
						<div class="col-md-12">
						<input type="hidden" class="form-control" name="privileges_key_id" >
						<input type="hidden" class="form-control" name="action_type" value="insert" >
						<button type="submit" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
						</div>
						</div>
						</div>
					</form>
				<!-- END FORM-->
				</div>
				<!-- Modal footer -->
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>
<style>
.table>tbody>tr>td {    vertical-align: middle;}
.dashboard-list-box ul li {
    padding: 15px 15px;
    
}
div#privileges_list_filter {
    text-align: right;
}
</style>
