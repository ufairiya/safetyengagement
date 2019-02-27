<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">
	<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<p>Packages Management</p>
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
                                        <p><?php echo $allpackages->package_name;?></p>
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
				<h4 class="gray">Add Packages</h4>
				<div class="dashboard-list-box-static">
				
					<div class="my-profile">
                    	<form name="add-package-frm" action="<?php echo $base_url.'admin/packages/save_package_admin';?>" method="POST">
                             <label>Package Name*</label>
                            <input type="text" required placeholder="Package Name" name="package_name"/>
                             <label>Package Type*</label>
                            <select name="package_month_count" id="package_month_count" class="col-md-6" required>
                               <option value="">Choose anyone</option>
                               <option value="1">1</option>	
                               <option value="2">2</option>	
                               <option value="3">3</option>	
                               <option value="4">4</option>	
                               <option value="5">5</option>	
                               <option value="6">6</option>	
                               <option value="7">7</option>	
                               <option value="8">8</option>	
                               <option value="9">9</option>	
                               <option value="10">10</option>	
                               <option value="11">11</option>	
                               </select>
                              <select name="package_month_name" id="package_month_name" class="col-md-6" required>
                               <option value="">Choose anyone</option>
                               <option value="month">Month</option>	
                               <option value="year">Year</option>	
                              
                            </select>
                            <label>Bid Count*</label>
                            <input type="number" required  placeholder="Bid Count" name="pkg_count"/ >
                             <label>Amount*</label>
                            <input type="number" required placeholder="Amount" name="pkg_amt"/>
                            <label>Description*</label>
                            <textarea name="pkg_desc" required  placeholder="Description"></textarea>
                           
                            <label>Status*</label>
                            <select name="status" id="status" required>
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
