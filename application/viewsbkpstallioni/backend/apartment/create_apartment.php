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
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Apartment Listings</h4>
				<ul>
                	<?php foreach($propertyall_list as $allproperty)
					{ ?>
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h4><?php echo $allproperty->property_name;?></h4>
                                        <span><?php echo $allproperty->property_address;?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <a href="<?php echo $base_url.'admin/apartment/update_apartment?apart_id='.$allproperty->ID; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                <a href="<?php echo $base_url.'admin/apartment/delete_apartment?apart_id='.$allproperty->ID;?>" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                            </div>
                        </li>
                    <?php }?>
				</ul>
			</div>
		</div>
		
		<!-- New Apartment -->
		<div class="col-lg-6 col-md-12 padding-right-30 margin-bottom-30">
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Add Packages</h4>
				<div class="dashboard-list-box-static">
				
					<div class="my-profile">
                    	<form name="add-package-frm" action="<?php echo $base_url.'admin/packages/save_package_admin';?>" method="POST">
                             <label>Package Name</label>
                            <input type="text" placeholder="Package Name" name="package_name"/>
                             <label>Package Type</label>
                            <input type="text" placeholder="Package Type" name="package_type"/>
                             <label>Ampount</label>
                            <input type="text" placeholder="Amount" name="pkg_amt"/>
                           
                            <label>Status</label>
                            <select name="users_name" id="users_name">
                               <option value="">Choose anyone</option>
                               <option value="1">active</option>	
                               <option value="2">deactive</option>	
                              
                            </select>
                            
                        
                            <button type="submit" class="button margin-top-15" value="Add">Add</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
