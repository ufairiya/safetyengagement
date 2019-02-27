<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"><?php echo $this->lang->line('privileges'); ?></h1>
                    <div class="page-bar">
                <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('privileges'); ?></span> </li>
            </ul>
       </div>
            
            	<div class="portlet light portlet-fit portlet-datatable ">
                <div class="portlet-title">
                  <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase"> <?php echo $this->lang->line('privileges'); ?> List </span> </div>
                  <div class="actions">
                    <?php if($user_add_access == TRUE){?>
                    <a href="<?php echo $base_url; ?>privileges/create" class="btn blue-madison"><?php echo $this->lang->line('add'); ?> New <?php echo $this->lang->line('privileges'); ?></a>
                    <?php } ?>
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                    
                          
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
												 echo '<a href="'.$base_url.'/privileges/get_privilege_edit_template/'.$privileges_value->id_access_privileges.'" data-target="#ajax" data-toggle="modal" class="btn btn-circle btn-icon-only btn-default  sbold uppercase"><i class="fa fa-edit"></i> </a>';
												}
												 if($user_delete_access == TRUE){
													 if($privileges_value->status == 1 || $privileges_value->status == 0){												 
													 echo '<button class=" btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this Privilages? After re-save the user access" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-uid ="'.$privileges_value->id_access_privileges.'" data-confirm-button-class="btn-info" data-task="d"><i class="icon-trash"></i> </button>';
													}
													if($privileges_value->status == 2){
													 echo '<button class=" btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this user? After delete re-save the user access" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid ="'.$privileges_value->id_access_privileges.'" data-confirm-button-class="btn-info"><i class="fa fa-trash-o"></i></button>';
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
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->  
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
				
        	
        		$(this).click(function(){
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
								url : '<?php echo $base_url?>/privileges/delete_privileges',
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


</script>
