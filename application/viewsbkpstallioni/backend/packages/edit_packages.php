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
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Packages Listings</h4>

				<ul>
                	<?php foreach($get_packages_list as $allpackages)
					{ ?>
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h4><?php echo $allpackages->package_name;?></h4>
                                        <span><?php echo $allpackages->pkg_desc;?></span>
                                        <span>$<?php echo $allpackages->pkg_amt;?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <a href="<?php echo $base_url.'admin/packages/update_packages/'.$allpackages->pkgid; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                <a href="<?php echo $base_url.'admin/packages/delete_packages/'.$allpackages->pkgid;?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                            </div>
                        </li>
                    <?php }?>
				</ul>

			</div>
		</div>
		
		<!-- New Apartment -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Update Packages</h4>
				<div class="dashboard-list-box-static">
				
					<div class="my-profile">
                    	<form name="add-package-frm" action="<?php echo $base_url.'admin/packages/update_package_admin';?>" method="POST">
                             <label>Package Name*</label>
                            <input type="hidden"name="pkgid" value="<?php echo $get_packages_pkgid->pkgid; ?>"/>
                            <input type="text" required placeholder="Package Name" name="package_name" value="<?php echo $get_packages_pkgid->package_name; ?>"/>
                             <label>Package Type*</label>
                            <select name="package_month_count" id="package_month_count" class="col-md-6" required>
                               <option value="">Choose anyone</option>
                               <option <?php if( $get_packages_pkgid->package_month_count == 1){ echo 'selected="selected"'; } ?> value="1">1</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 2){ echo 'selected="selected"'; } ?> value="2">2</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 3){ echo 'selected="selected"'; } ?> value="3">3</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 4){ echo 'selected="selected"'; } ?> value="4">4</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 5){ echo 'selected="selected"'; } ?> value="5">5</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 6){ echo 'selected="selected"'; } ?> value="6">6</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 7){ echo 'selected="selected"'; } ?> value="7">7</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 8){ echo 'selected="selected"'; } ?> value="8">8</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 9){ echo 'selected="selected"'; } ?> value="9">9</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 10){ echo 'selected="selected"'; } ?> value="10">10</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 11){ echo 'selected="selected"'; } ?> value="11">11</option>	
                               <option <?php if( $get_packages_pkgid->package_month_count== 12){ echo 'selected="selected"'; } ?> value="12">12</option>	
                               </select>
                              <select name="package_month_name" id="package_month_name" class="col-md-6" required>
                               <option  value="">Choose anyone</option>
                               <option <?php if( $get_packages_pkgid->package_month_name== 'month'){ echo 'selected="selected"'; } ?> value="month">Month</option>	
                               <option <?php if( $get_packages_pkgid->package_month_name== 'year'){ echo 'selected="selected"'; } ?> value="year">Year</option>	
                              
                            </select>
                             <label>Bid Count*</label>
                             <?php 		$package_data = count($this->packages_model->get_sub_package($get_packages_pkgid->pkgid));
                             
                             ?>
                            <input type="number" required  placeholder="Amount" name="pkg_count" value="<?php echo $get_packages_pkgid->pkg_count; ?>"/>
                             <label>Amount*</label>
                            <input type="number" required  placeholder="Amount" name="pkg_amt" value="<?php echo $get_packages_pkgid->pkg_amt; ?>"/>
                            <label>Description*</label>
                            <textarea name="pkg_desc" required placeholder="Description"><?php echo $get_packages_pkgid->pkg_desc; ?></textarea>
                           
                            <label>Status*</label>
                            <select name="status" id="status" required>
                               <option value="">Choose anyone</option>
                               <option <?php if( $get_packages_pkgid->status== '1'){ echo 'selected="selected"'; } ?> value="1">active</option>	
                               <option <?php if( $get_packages_pkgid->status== '2'){ echo 'selected="selected"'; } ?> value="2">deactive</option>	
                              
                            </select>
                            
                        
                            <button type="submit" class="button margin-top-15" value="Add">Update</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
