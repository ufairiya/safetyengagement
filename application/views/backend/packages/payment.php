<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">
	<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Apartment Management</h2>
				</div>
			</div>
		</div>
		
		<!-- Apartment List -->
		<div class="col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Payment Listings</h4>
<?php 
									//~ echo '<pre>';
									 //~ print_r($get_all);
									//~ exit;
									?>

<div class="my-profile">
                    	<table class="table table-hover table-bordered table-striped" id="privileges_list">
								<thead>
									<tr>
									<th>List #</th>
									<th><?php echo 'Professional'; ?></th>
									<th><?php echo 'Package Name'; ?></th>
									<th><?php echo 'Remaining Count'; ?></th>
									<th><?php echo 'Package Type'; ?></th>
									<th><?php echo 'Created On'; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									
									if($get_all != FALSE){
									$i =1;
									foreach($get_all as $privileges_key => $privileges_value){
									
									$user_data = $this->users_model->user_data($privileges_value->user_id);  
									$package_data = $this->packages_model->get_sub_package($privileges_value->package_id);  
									echo '<tr>
									<td>'.$i.'</td>
									<td>'.$user_data->first_name.' '.$user_data->last_name.'</td>
									<td>'.$package_data->package_name.' </td>
									<td>'.$privileges_value->package_count.' </td>
									<td>'.$privileges_value->pkg_type.' </td>
									<td>'.$privileges_value->created_on.' </td>
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

"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
});
});

</script>
