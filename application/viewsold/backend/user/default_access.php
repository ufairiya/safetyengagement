<?php
$user_types_custom_values = "";
if($user_type != FALSE)
{
	$k=1;
	foreach($user_type as $user_type_key=>$user_type_value){
		$user_types_custom_values[$k] =$user_type_value->level_key;
		$k++;
	}
}
 ?>
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo $this->lang->line('user access'); ?> </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">

              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $this->lang->line('user access'); ?></span> </li>
            </ul>
         </div>
              <div class="row">
                <div class="col-md-12"> 
                  <div class="portlet light portlet-fit portlet-datatable ">
                    <div class="portlet-title">
                      <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase"> <?php echo $this->lang->line('user access page'); ?></span> </div>
                      <div class="actions"></div>
                    </div>
                    <div class="portlet-body">
                      <div class="row">
                        <div class="col-md-12 col-sm-12"> 
                      	<form id="user_access_create" method="post" >
                                    <table class="table table-striped table-bordered table-hover" id="users_list">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('access privileges name'); ?></th>
                                                <?php if($user_type != FALSE){ 
													foreach($user_type as $key=>$val){?>                                                
                                                		<th><?php echo $val->level_name;?></th>
                                                <?php } 
												}?>             
                                            </tr>
                                             </thead>
                                            <tbody>
                                            <?php 
											if($user_privileges != FALSE){
												//~ echo '<pre>';
												//~ print_r($user_privileges);
												//~ exit;
												foreach($user_privileges as $k => $v){
													$uesr_var = $v->access_privileges_name;
													echo "<tr>";
													//~ echo "<td>".$v->access_privileges_name."</td>";
													echo '<td>'.$uesr_var.'</td>';
													for($i=1;$i<=count($user_type);$i++){
													$selected = (default_privilges_check($user_types_custom_values[$i],$v->id_access_privileges) == TRUE ) ? 'checked="checked"' : '' ;
														
														echo '<td><label class="mt-checkbox mt-checkbox-outline">
                                                                                <input type="checkbox" value="'.$v->id_access_privileges.'" name="'.$user_types_custom_values[$i].'[]" '.$selected.'>                                                                                 <span></span>
                                                                            </label></td>';
													}
													echo "</tr>";
												}
												
											}
											
											?>
                                            </tbody>
                                    </table>   
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-7">
                                        <button type="submit" class="btn green" id="save_user_access"><?php echo $this->lang->line('save access'); ?></button>
                                    </div>
                                </div>
                            </div>
                          </form>                           
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
<script type="application/javascript">
jQuery(document).ready(function(e) {
	jQuery(document).on("click","#save_user_access",function(event){
		event.preventDefault();
		var form = jQuery("#user_access_create");       
		jQuery.ajax({
		 type: "POST",
		 url: "<?php echo $base_url;?>admin/user/save_default_access", 
		 data: form.serialize(),
		 success: 
			  function(data){
				  if(data){
					toastr.options = {
						"closeButton": true,
					}
					toastr.success("Users Priviliges Updated Successfully", "Notifications");
				  }
			  }
		  });
		return false;
	});
});
</script>
