<?php
//~ echo '<pre>';
//~ print_r($view_listofproperties);
//~ echo '</pre>';
?>
<!--
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/global/css/components.min.css"  type="text/css">
-->
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"  type="text/css">


<div class="container" >
		<div class="row">
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper" style="margin:30px 0px 15px 0px">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
               <div class="row">
                 <div class="col-md-12">   
                   <?php if($view_listofproperties != FALSE){ ?>                                           
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box">  
                                    <div class="portlet-title">
                                    	
                                    </div>                                               
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="property_list">
                                        <thead>
                                            <tr>
                                                <th> property name </th>
                                                <th> property type </th>                                               
                                                <th> property phone </th>
                                                <th> property status </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($view_listofproperties as $propertylevelkey =>$propertylevelvalue){
											
												$status = ($propertylevelvalue->property_status == 'active') ? '<span class="label label-sm label-success">Active</span>' : (($propertylevelvalue->property_status == 'deactive') ? '<span class="label label-sm label-danger">deleted</span>' : '<span class="label label-sm label-warning">not_active</span>' );
											$default = '';
											?>
                                            <tr>
                                                <td> <?php echo $propertylevelvalue->property_name;?> </td>
                                                 <td> <?php echo $propertylevelvalue->property_type;?> </td>
                                                <td> <?php echo $propertylevelvalue->property_phone;?> </td>                                             
                                                <td> <?php echo $status;?> </td>
                                                 <td> 
                                                 <?php if(!$default){?>
                                                 <a href="<?php echo $base_url; ?>property/edit_property/<?php echo $propertylevelvalue->ID;?>" data-target="#ajax" data-toggle="modal" class="btn btn-circle btn-icon-only btn-default  sbold uppercase"><i class="fa fa-edit"></i> </a>                                               
                                                 <?php if($propertylevelvalue->property_status == 'active' ){?>
                                                 <button class="  btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $propertylevelvalue->ID;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </button>
                                                 <?php } ?>
                                                  <?php if($propertylevelvalue->property_status == 'deactive'){?>
                                                 <button class="  btn btn-circle btn-icon-only btn-default sbold uppercase  mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="<?php echo $propertylevelvalue->ID;?>" data-confirm-button-class="btn-info"><i class="fa fa-trash-o"></i></button>
                                                 <?php }
												 }?>
                                                 </td>
                                            </tr>
                                            <?php }?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                               <?php }?>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

  </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
</div>
</div>

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

<script type="text/javascript" src="<?php echo site_url(); ?>assets/listeo/scripts/jquery-2.2.0.min.js"></script>

<script type="application/javascript">
	

jQuery(document).ready(function(e) {
var table = jQuery('#property_list');

        var oTable = table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_to_END_of_TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "search:",
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
								url : '<?php echo $base_url?>property/property_delete',
								type: 'POST',
								data: {'key':key,'task':task},
								success:function(response){
								
									toastr.options = {
									"closeButton": true,
									}
									toastr.warning("User Level Deleted Succesfully", "Notifications");
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


