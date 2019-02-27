
		<div class="dashboard-content">
<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>User List</h2>
				</div>
			</div>
		</div>
		  <?php if($list_of_users != FALSE){ ?>     
		<!-- Upcoming Request -->
		<div class="col-lg-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">User List</h4>
						 <ul>   <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
</li></ul>
<!--
						     <ul id="newStuff" class="custom-sli nav nav-tabs nav-stacked">
-->
<ul class="custom-sli">

					<!-- Single Listing Item -->
					<?php foreach($list_of_users as $userkey =>$uservalue){
											$urefNumber = ($uservalue->user_type != 'superuser') ? $uservalue->user_cust_code:'';
											$status = ($uservalue->status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($uservalue->status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
											
											$usertype_chk=  getUserLevelName($uservalue->user_type);
											$usertype_chk
											?>
					<li>
						<!-- Listing Item -->
						<div class="listing-item-container list-layout">
							<div href="listings-single-page.html" class="listing-item">	
								<!-- Image -->
								<div class="listing-item-image">
									<?php if($uservalue->profile_image != ''){		?> <img   style="margin: 0 auto;display: table;"  width=" 50px "height="50px" src="<?php echo $base_url.'uploads/'.$uservalue->profile_image; ?>"> 
													<?php }
                                                else{ ?>
													<img style="margin: 0 auto;display: table;" width=" 50px "height="50px"  src="<?php echo base_url(); ?>assets/images/default.jpg"> 
												<?php	}?>
								</div>
								
								<!-- Content -->
								<div class="listing-item-content">
								<!-- <div class="listing-badge now-closed">Now Closed</div> -->
									<div class="listing-item-inner">
										<h3><?php echo $uservalue->first_name;?></h3>
										<h5><?php echo $uservalue->email;?></h5>
										<span><h5><?php echo $uservalue->address;?></h5>
										<span><h5><?php echo $uservalue->user_type;?></h5>
</span><br />
										<span><em><?php echo $uservalue->phone;?></em></span>
									</div>
									<div class="dashboard-list-box margin-top-0">
										<div class="buttons-to-right">
											<a href="<?php echo $base_url; ?>admin/user/user_editform/<?php echo $uservalue->id_user_master;?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
											     
                                                 <?php if($uservalue->status == 1 || $uservalue->status == 0){?>
                                                 <a class=" button gray btn-default uppercase mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $uservalue->id_user_master;?>" data-confirm-button-class="btn-info"><i  class="icon-trash"></i>Delete</a>
                                                 <?php } ?>
                                                  <?php if($uservalue->status == 2){?>
                                                 <a class=" button gray btn-default uppercase mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="<?php echo $uservalue->id_user_master;?>" data-confirm-button-class="btn-info"><i class="fa fa-trash-o"></i>Delete  </a>
                                                 <?php } ?>
											
<!--
											<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
-->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Listing Item / End -->
					</li>
					<!-- Single Listing Item / End -->
					<?php } ?>
					
					<!-- Single Listing Item -->
								
					<!-- Single Listing Item / End -->						
				</ul>
			</div>
		</div>
<?php } ?>
		<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							
								</ul> 
				<div class="pagination pagination-large">
            <ul class="pager">
							
<!--
								<li><p class="pagin-page">2</p></li>
-->
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->
<!-- BEGIN CONTENT -->
         
            <!-- END CONTENT -->        
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
								url : '<?php echo $base_url?>admin/user/delete_user',
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

    $('.profile-image').on('click', function() {
        $('.profile-image-upload').click();
    });


</script>
<script>
	        $(document).ready(function() {
				var listElement = $('#newStuff');
var perPage = 1; 
var numItems = listElement.children().size();
var numPages = Math.ceil(numItems/perPage);

$('.pager').data("curr",0);

var curr = 0;
while(numPages > curr){
  $('<li><p class="pagin-page">'+(curr+1)+'</p></li>').appendTo('.pager');
  curr++;
}

$('.pager .pagin-page:first').addClass('active');

listElement.children().css('display', 'none');
listElement.children().slice(0, perPage).css('display', 'block');

$('.pager li p').click(function(){
  var clickedPage = $(this).html().valueOf() - 1;
// alert(clickedPage);
  goTo(clickedPage,perPage);
});

function previous(){
  var goToPage = parseInt($('.pager').data("curr")) - 1;
  if($('.active').prev('.pagin-page').length==true){
    goTo(goToPage);
  }
}

function next(){
  goToPage = parseInt($('.pager').data("curr")) + 1;
  if($('.active_page').next('.pagin-page').length==true){
    goTo(goToPage);
  }
}

function goTo(page){
  var startAt = page * perPage,

    endOn = startAt + perPage;
  listElement.children().css('display','none').slice(startAt, endOn).css('display','block');
  $('.pager').attr("curr",page);
}

//~ setTimeout(function(){
  //~ $('.alert').remove();
//~ }, 5000);
});function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("newStuff");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h3")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
             var goToPage = parseInt($('.pager').data("curr")) - 1;
            goTo(goToPage);
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>

