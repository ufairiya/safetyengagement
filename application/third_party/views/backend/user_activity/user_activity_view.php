
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"><?php echo $this->lang->line('users activity view'); ?></h1>
                    <div class="page-bar">
                <ul class="page-breadcrumb">

              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('users activity view'); ?></span> </li>
            </ul>
            </div>
               <div class="row">
                 <div class="col-md-12">   
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
                                                <th> <?php echo $this->lang->line('date'); ?> </th>
                                                <th> <?php echo $this->lang->line('ip address'); ?> </th>
                                                <th> <?php echo $this->lang->line('client browser'); ?> </th>
                                                <th> <?php echo $this->lang->line('url'); ?> </th>
                                                <th> <?php echo $this->lang->line('referer page'); ?> </th> 
                                                <th> <?php echo $this->lang->line('message'); ?> </th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
										if($user_activity != FALSE) {
											$i=1;
											foreach($user_activity as $activity_key=>$activity_value){ ?>
                                                <tr>
                                                 <td><?php echo $i; ?></td>
                                                <td><?php echo date('d-m-Y H:i:s',$activity_value->timestamp); ?></td>
                                                <td><?php echo $activity_value->client_ip; ?></td>
                                                <td><?php echo $activity_value->client_user_agent; ?></td>
                                                <td><?php echo $activity_value->request_uri;?></td>
                                                 <td><?php echo $activity_value->referer_page;?></td>
                                                <td><?php echo $activity_value->message;?></td>
                                                </tr>
										<?php $i++;}	
											}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
			 buttons: [
			 	{ extend: 'print', className: 'btn default' },
                { extend: 'pdf', className: 'btn default' },
                { extend: 'csv', className: 'btn default' }
            ],

            "order": [
                [0, 'desc']
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
