<!-- BEGIN CONTENT -->
           <div class="dashboard-content">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title">list of Task</h1>
                    <div class="page-bar">
					<ul class="page-breadcrumb">
					  <li> <a href="<?php echo $base_url; ?>">home</a> <i class="fa fa-angle-right"></i> </li>
					  <li> <span> list of Prices</span> </li>
					</ul>
           </div>
            
               <div class="row">
                 <div class="col-md-12">   
                   <?php if($get_price_list != FALSE){ ?>                                           
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box gray">  
                                    <div class="portlet-title">
                                    	<div class="caption">
                                        	<span class="caption-subject sbold">List of Task </span>
                                   		 </div> 
                                    </div>                                               
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="tasklisttable">
                                        <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Sub Title</th>                                               
                                                <th>  Categories Name </th>                                             
                                                <th> Status </th>
                                                <th> action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 	
                                        //~ var_dump($get_price_list);
                                         foreach($get_price_list as $get_price_list_detail){
											//~ print_r($admintaskvalue);
											//~ $status = ($admintask->status == 'active') ? '<span class="label label-sm label-success">Active</span>' : (($admintask->status == 'deactive') ? '<span class="label label-sm label-danger">Deactive</span>' : '<span class="label label-sm label-warning"> not_active</span>' );
											//~ $a ? $b : ( $c ? $d : ( $e ? $f : $g ) )

														//~ $status = ($get_price_list_detail->status == '1') ? '<span class="tag">Pending</span>' :( ($get_price_list_detail->status == 'active') ? '<span class="blue tag">Awaiting  <br/> Confirmation</span>' :( ($get_price_list_detail->status == 'deactive') ? '<span class="label label-sm label-warning"> not_active</span>')) ;
										$status = ($get_price_list_detail->status == '1') ? '<span class="tag">Active</span>' : '<span class="blue tag">Deactive</span>' ;
                                                
											?>
                                            <tr>
                                                <td> <?php echo $get_price_list_detail->id;?> </td>
                                                <td> <?php echo $get_price_list_detail->sub_title;?> </td>
                                               

                                                <td> <?php echo $get_price_list_detail->categoriesname;?> </td>
                                      
 </td>
                                                <td> <?php echo $status; ?> </td>
                                                <td> 																									

														
													 <a href="<?php echo $base_url; ?>admin/prices/edit_price/<?php echo $get_price_list_detail->id;?>"  class="btn btn-circle btn-icon-only btn-default  sbold uppercase"><i class="fa fa-eye"></i> </a>                                               
													 <?php if($get_price_list_detail->status != '2' ){?>
													 <button class="  btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $get_price_list_detail->id;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </button>
													 <?php } ?>
													  <?php if($get_price_list_detail->status == '2'){?>
													 <button class="btn btn-circle btn-icon-only btn-default sbold uppercase  mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="<?php echo $get_price_list_detail->id;?>" data-confirm-button-class="btn-info"><i class="fa fa-trash-o"></i></button>
													 <?php }
													 ?>

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
var table = jQuery('#tasklisttable');

        var oTable = table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                  "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ <?php echo $this->lang->line('entries'); ?>",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ <?php echo $this->lang->line('entries'); ?>",
                "search": "<?php echo $this->lang->line('search'); ?>:",
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
        	jQuery('.mt-sweetalert-delete').each(function(){
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
				
        	
        		jQuery(this).click(function(){
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
								url : '<?php echo $base_url?>admin/task/task1_delete',
								type: 'POST',
								data: {'key':key,'task':task},
								success:function(response){
								
									toastr.options = {
									"closeButton": true,
									}
									toastr.warning("User Deleted Succesfully", "Notifications");
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
		jQuery(this).find(".modal-content").html("");
	});
});

</script>
<style>
img.imglist {
       width: 77%;
    height: 75px;
}
td span.tag, .tip, .mfp-arrow:hover {
    background: #f91942;
    color:#fff;
}
 td span.tag {
  
       font-weight: 500;
    margin: 0;
    z-index: 10;
    line-height: 14px;
    padding: 7px 16px;
    margin-right: 0px;
    text-align: center;
}

td span.tag {
    text-transform: uppercase;
    font-size: 11px;
   }
</style>
