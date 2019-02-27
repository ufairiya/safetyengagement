<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo $this->lang->line('list of user levels'); ?></h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('list of user levels'); ?></span> </li>
            </ul>
            </div>
            
               <div class="row">
                 <div class="col-md-12">   
                   <?php if($list_of_user_levels != FALSE){ ?>                                           
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">  
                                    <div class="portlet-title">
                                    	<div class="caption">
                                        	<span class="caption-subject sbold"><?php echo $this->lang->line('user'); ?></span>
                                   		 </div> 
                                    </div>                                               
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="users_list">
                                        <thead>
                                            <tr>
                                                <th> <?php echo $this->lang->line('level name'); ?> </th>
                                                <th> <?php echo $this->lang->line('level key'); ?> </th>                                               
                                                <th> <?php echo $this->lang->line('status'); ?> </th>
                                                <th> <?php echo $this->lang->line('action'); ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list_of_user_levels as $userlevelkey =>$userlevelvalue){
											
											$status = ($userlevelvalue->status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($userlevelvalue->status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').'</span>' );
											$default = $userlevelvalue->default;
											?>
                                            <tr>
                                                <td> <?php echo $userlevelvalue->level_name;?> </td>
                                                <td> <?php echo $userlevelvalue->level_key;?> </td>                                             
                                                <td> <?php echo $status;?> </td>
                                                 <td> 
                                                 <?php if(!$default){?>
                                                 <a href="<?php echo $base_url; ?>admin/user/get_user_level_template/<?php echo $userlevelvalue->id_user_levels;?>" data-target="#ajax" data-toggle="modal" class="btn btn-circle btn-icon-only btn-default  sbold uppercase"><i class="fa fa-edit"></i> </a>                                               
                                                 <?php if($userlevelvalue->status == 1 || $userlevelvalue->status == 0){?>
                                                 <button class="  btn btn-circle btn-icon-only btn-default sbold uppercase mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $userlevelvalue->id_user_levels;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </button>
                                                 <?php } ?>
                                                  <?php if($userlevelvalue->status == 2){?>
                                                 <button class="  btn btn-circle btn-icon-only btn-default sbold uppercase  mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="<?php echo $userlevelvalue->id_user_levels;?>" data-confirm-button-class="btn-info"><i class="fa fa-trash-o"></i></button>
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
var table = jQuery('#users_list');

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
								url : '<?php echo $base_url?>admin/user/delete_user_level',
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
