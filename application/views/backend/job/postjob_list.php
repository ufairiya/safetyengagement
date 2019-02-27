<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">
	<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Job Management</h2>
				</div>
			</div>
		</div>
		
		<!-- Apartment List -->
		<div class="col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Post Job List<span class="pull-right"><a href="<?php echo $base_url; ?>admin/job/addjob" > <button class="btn" ><i class="fa fa-plus mr-1"></i> Add Project</button></a></span></h4>


<div class="my-profile">
                    	<table class="table table-hover table-bordered table-striped" id="privileges_list">
								<thead>
									<tr>
									<th>List #</th>
									<th><?php echo 'Job Title'; ?> </th>
									<th><?php echo 'Description'; ?></th>
									<th><?php echo 'Job Location'; ?></th>
									<th><?php echo 'Budget'; ?></th>
									<th><?php echo 'Post Date'; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									if($get_allpostjob != FALSE){
									$i =1;
									foreach($get_allpostjob as $privileges_value){
									
									//~ $user_data = $this->users_model->user_data($privileges_value->user_id);  
									//~ $com_data = $this->users_model->user_data($privileges_value->com_id);  
									//~ $pro_data = $this->users_model->pro_data($privileges_value->pro_id); 
//print_r($privileges_value);									
									echo '<tr>
									<td>'.$i.'</td>
									<td>'.$privileges_value->job_title.'</td>
									<td>'.$privileges_value->highleveljobdesc.'</td>
									<td>'.$privileges_value->joblocation.'</td>
									<td>'.$privileges_value->budget.'</td>
									<td>'.$privileges_value->posteddate.'</td>
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
</div></div>
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

"dom": "<'row' <'col-md-12'B>><'col-md-2 col-sm-12'l><'col-md-8 col-sm-12'f><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
});
});

</script>
