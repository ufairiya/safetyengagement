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
                                        <h3><?php echo $allproperty->property_name;?></h3>
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
				<h4 class="gray">Add Apartment</h4>
				<div class="dashboard-list-box-static">
				
					<div class="my-profile">
                    	<form name="add-apartment-frm" action="<?php echo $base_url.'admin/apartment/save_apartment_admin';?>" method="POST">
                            <label>User Name</label>
                            <select name="users_name" id="users_name">
                                <option value="">Select User</option>
                                <?php foreach($app_users_list as $users)
                                { ?>
                                    <option value="<?php echo $users->id_user_master;?>"><?php echo $users->username;?></option>	
                                <?php }?>
                            </select>
                            
                            <label>Apartment Title</label>
                            <input type="text" placeholder="Punggol View Apartment" name="apartment_name"/>
                            
                            <label>Address</label>
                            <textarea cols="30" rows="2" placeholder="Punggol View Ln Blk 321 #11-11, Singapore 530321" name="apartment_address"></textarea>
                            <button type="submit" class="button margin-top-15" value="Add">Add</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
