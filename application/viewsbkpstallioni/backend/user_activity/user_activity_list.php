
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"><?php echo $this->lang->line('users activity list'); ?></h1>
                    <div class="page-bar">
                <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('users activity list'); ?></span> </li>
            </ul>
            </div>
            
               <div class="row">
                 <div class="col-md-12">   
                   <?php if($list_of_users != FALSE){ ?>                                           
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">  
                                    <div class="portlet-title">
                                    	<div class="caption">
                                        	<span class="caption-subject sbold"><?php echo $this->lang->line('users list'); ?></span>
                                   		 </div> 
                                    </div>                                               
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="users_list">
                                        <thead>
                                            <tr>
                                            	<th> <?php echo $this->lang->line('sno'); ?> </th>
                                                <th> <?php echo $this->lang->line('first name'); ?> </th>
                                                 <th> <?php echo $this->lang->line('last name'); ?> </th>
                                                <th> <?php echo $this->lang->line('user name'); ?> </th>
                                                <th> <?php echo $this->lang->line('email'); ?> </th> 
                                                <th></th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										$i =1;
										foreach($list_of_users as $user_key => $user_values){
											?>
                                            <tr>
                                             <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($user_values->first_name);?></td>
                                            <td><?php echo ucfirst($user_values->last_name);?></td>
                                            <td><?php echo ucfirst($user_values->username);?></td>
                                            <td><?php echo $user_values->email;?></td>
                                             <td><a href="<?php echo $base_url?>useractivity/view/<?php echo $user_values->id_user_master?>" class="btn btn-circle btn-icon-only btn-default sbold uppercase"><i class="fa fa-eye"></i></a></td>
                                        	</tr>
                                        <?php $i++;
										} ?>
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
</script>
