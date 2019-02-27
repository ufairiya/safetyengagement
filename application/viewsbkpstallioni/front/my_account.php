<div class="page-loading">
	<div class="loadery"></div>
</div>
<div class="theme-layout">

	<div class="responive-header">
		<div class="logo"><a href="index.html" title=""><img src="images/resource/logo.png" alt="" /></a></div>
		<span class="open-responsive-btn"><i class="la la-bars"></i><i class="la la-close"></i></span>
		<div class="resp-btn-sec">
			<div class="acount-header-btn">
	                <?php

				                if($this->session->has_userdata('id_user_master') != '')
				                {
				                 echo form_open('Home/logout'); ?>
                        <input type="submit" class="btn btn-primary logoutbtn" id="btn_logout" name="btn_logout" value="LOGOUT"/>
                        <?php echo form_close(); } else { ?>
				<span class="register-btn">Register</span>/
				<span class="login-btn">LogIn</span>
				<?php } ?>
			</div>
			<a href="add-listing.html" title="" class="add-listing-btn"><i class="la la-plus"></i>Add Your Listing</a>
			<div class="search-header">
				<span class="open-search"><i class="la la-search"></i><i class="la la-close"></i></span>
				<form>
					<input type="text" placeholder="Search">
				</form>
			</div>
		</div>
		<div class="responisve-menu">
			<span class="close-reposive"><i class="la la-close"></i></span>
			<div class="logo"><a href="index.html" title=""><img src="images/resource/logo.png" alt="" /></a></div>
			<ul>
				<li class="menu-item-has-children">
					<a href="#" title="">Home</a>
					<ul>
						<li><a href="index.html" title="">Home 1</a></li>
						<li><a href="index2.html" title="">Home 2</a></li>
						<li><a href="index3.html" title="">Home 3</a></li>
						<li><a href="index4.html" title="">Home 4</a></li>
						<li><a href="index5.html" title="">Home 5</a></li>
					</ul>
				</li>
				<li class="menu-item-has-children">
					<a href="#" title="">Listings</a>
					<ul>
						<li><a href="columns-list.html" title="">Column Listings</a></li>
						<li><a href="columns-list2.html" title="">Column Listings 2</a></li>
						<li><a href="left-sidebar-list.html" title="">Left Sidebar List</a></li>
						<li><a href="right-sidebar-list.html" title="">Right Sidebar List</a></li>
						<li><a href="list-view.html" title="">Listing List View</a></li>
						<li><a href="map-list1.html" title="">Map Listing 1</a></li>
						<li><a href="map-list2.html" title="">Map Listing 2</a></li>
						<li><a href="map-list3.html" title="">Map Listing 3</a></li>
						<li><a href="list-detail.html" title="">List Details</a></li>
						<li><a href="list-detail2.html" title="">List Details 2</a></li>
					</ul>
				</li>
				<li class="menu-item-has-children">
					<a href="#" title="">Pages</a>
					<ul>
						<li><a href="my-listing.html" title="">My Listings</a></li>
						<li><a href="add-listing.html" title="">Add Listings</a></li>
						<li><a href="edit-profile.html" title="">Edit Profile</a></li>
						<li><a href="register.html" title="">Register</a></li>
						<li><a href="singin.html" title="">Sign In</a></li>
					</ul>
				</li>
				<li class="menu-item-has-children">
					<a href="#" title="">Extras</a>
					<ul>
						<li><a href="404.html" title="">Error 404</a></li>
						<li><a href="blog.html" title="">Blog</a></li>
						<li><a href="blog2.html" title="">Blog 2</a></li>
						<li><a href="blog-detail.html" title="">Blog Detail</a></li>
						<li><a href="faq.html" title="">FAQ's</a></li>
						<li><a href="how-it-works.html" title="">How it works</a></li>
						<li><a href="pricing.html" title="">Pricings</a></li>
						<li><a href="terms.html" title="">Terms & Condition</a></li>
					</ul>
				</li>
				<li class="menu-item-has-children">
					<a href="#" title="">Shop</a>
					<ul>
						<li><a href="shop.html" title="">Shop</a></li>
						<li><a href="cart.html" title="">Cart</a></li>
						<li><a href="checkout.html" title="">Checkout</a></li>
						<li><a href="shopping-detail.html" title="">Shop Detail</a></li>
					</ul>
				</li>
				<li><a href="contact.html" title="">Contact Us</a></li>
			</ul>
		</div>
	</div><!-- Responsive-header -->
	
	<header class="on-top dark">
		<div class="logo"><a href="index.html" title=""><img src="images/resource/logo.png" alt="" /></a></div>
		<div class="menu-sec">
			<div class="acount-header-btn">
       <?php

				                if($this->session->has_userdata('id_user_master') != '')
				                {
				                 echo form_open('Home/logout'); ?>
                        <input type="submit" class="btn btn-primary logoutbtn" id="btn_logout" name="btn_logout" value="LOGOUT"/>
                        <?php echo form_close(); } else { ?>
				<span class="register-btn">Register</span>/
				<span class="login-btn">LogIn</span>
				<?php } ?>
			</div>
			<a href="<?php echo site_url(); ?>home/my_account" title="" class="add-listing-btn"><i class="la la-plus"></i>Add Your Listing</a>
			<div class="search-header">
				<span class="open-search"><i class="la la-search"></i><i class="la la-close"></i></span>
				<form>
					<input type="text" placeholder="Search">
				</form>
			</div>
			<nav class="header-menu">
				<ul>
					<li class="menu-item-has-children">
						<a href="#" title="">Home</a>
					
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Listings</a>
<!--
						<ul>
							<li><a href="columns-list.html" title="">Column Listings</a></li>
							<li><a href="columns-list2.html" title="">Column Listings 2</a></li>
							<li><a href="left-sidebar-list.html" title="">Left Sidebar List</a></li>
							<li><a href="right-sidebar-list.html" title="">Right Sidebar List</a></li>
							<li><a href="list-view.html" title="">Listing List View</a></li>
							<li><a href="map-list1.html" title="">Map Listing 1</a></li>
							<li><a href="map-list2.html" title="">Map Listing 2</a></li>
							<li><a href="map-list3.html" title="">Map Listing 3</a></li>
							<li><a href="list-detail.html" title="">List Details</a></li>
							<li><a href="list-detail2.html" title="">List Details 2</a></li>
						</ul>
-->
					</li>
<!--
					<li class="menu-item-has-children">
						<a href="#" title="">Pages</a>
						<ul>
							<li><a href="my-listing.html" title="">My Listings</a></li>
							<li><a href="add-listing.html" title="">Add Listings</a></li>
							<li><a href="edit-profile.html" title="">Edit Profile</a></li>
							<li><a href="register.html" title="">Register</a></li>
							<li><a href="singin.html" title="">Sign In</a></li>
						</ul>
					</li>
-->
					<li class="menu-item-has-children">
						<a href="#" title="">Blog</a>
<!--
						<ul>
							<li><a href="404.html" title="">Error 404</a></li>
							<li><a href="blog.html" title="">Blog</a></li>
							<li><a href="blog2.html" title="">Blog 2</a></li>
							<li><a href="blog-detail.html" title="">Blog Detail</a></li>
							<li><a href="faq.html" title="">FAQ's</a></li>
							<li><a href="how-it-works.html" title="">How it works</a></li>
							<li><a href="pricing.html" title="">Pricings</a></li>
							<li><a href="terms.html" title="">Terms & Condition</a></li>
						</ul>
-->
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Shop</a>
<!--
						<ul>
							<li><a href="shop.html" title="">Shop</a></li>
							<li><a href="cart.html" title="">Cart</a></li>
							<li><a href="checkout.html" title="">Checkout</a></li>
							<li><a href="shopping-detail.html" title="">Shop Detail</a></li>
						</ul>
-->
					</li>
					<li><a href="contact.html" title="">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section>
		<div class="block no-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-header">
							<h2>Edit Profile</h2>
							<ul class="breadcrumbs">
								<li><a href="#" title="">Home</a></li>
								<li><a href="#" title="">Page</a></li>
								<li>Edit Profile</li>
							</ul>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0">
						<div class="edit-profile-sec">
							
            <?php 
            $attributes = array('id' => 'profileupdate');
            echo form_open('Signup_controller/updateprofile') ?>

								<?php
								foreach($profile_details as $profile_details_val)
								{						
								?>
							<div class="notificmsg_log"></div>
							<div class="form-profile">
								<div class="row">
								<div class="col-md-6">

									
										<div class="col-md-12">
											<div class="change-my-dp">
												<img src="images/resource/ep.jpg" alt="" />
												<a href="#" title="">Change</a>
											</div>
										</div>
										<div class="col-md-12">
											<h3>About You</h3>
										</div>
										<div class="col-md-12">
											<label for="txt_empname" class="control-label">Name</label>
											<input class="form-control" id="txt_empname" name="txt_empname" Readonly placeholder="Name" type="text" value="<?php echo $profile_details_val->first_name; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_empname'); ?></span>
										</div>
										<div class="col-md-12">
												<label for="txt_utype" class="control-label">User Type</label>
											<input class="form-control" id="txt_utype" name="txt_utype" placeholder="Name" type="text" value="<?php echo $profile_details_val->user_type; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_utype'); ?></span>
										</div>
										<div class="col-md-12">
											<label for="txt_phone" class="control-label">Phone Number</label>
											<input class="form-control" id="txt_phone" name="txt_phone" placeholder="Phone number" type="text" value="<?php echo $profile_details_val->phone; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_phone'); ?></span>
										</div>
							 			
										<div class="col-md-12">
											<label for="txt_email" class="control-label">Email</label>
											<input class="form-control" id="txt_email" name="txt_email" Readonly placeholder="Email" type="text" value="<?php echo $profile_details_val->email; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_email'); ?></span>
										</div>
										<div class="col-md-12">
											<label for="txt_state" class="control-label">State</label>
											<input class="form-control" id="txt_state" name="txt_state" placeholder="State" type="text" value="<?php echo $profile_details_val->state; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_state'); ?></span>
										</div>
										<div class="col-md-12">
											<label for="txt_city" class="control-label">City</label>
											<input class="form-control" id="txt_city" name="txt_city" placeholder="City" type="text" value="<?php echo $profile_details_val->city; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_city'); ?></span>
										</div>
									
										<div class="col-md-12">
											<label for="txt_landmark" class="control-label">Landmark</label>
											<input class="form-control" id="txt_landmark" name="txt_landmark" placeholder="Landmark" type="text" value="<?php echo $profile_details_val->landmark; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_landmark'); ?></span>
										</div>
									
										<div class="col-md-12">
											<label for="txt_host_no" class="control-label">House number/Street number</label>
											<input class="form-control" id="txt_host_no" name="txt_host_no" placeholder="House number/Street number" type="text" value="<?php echo $profile_details_val->house_str_no; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_host_no'); ?></span>
										</div>	  
								   </div>  
								    <div class="col-md-6">
										<div class="col-md-12">
											<label for="txt_pincode" class="control-label">Pincode</label>
											<input class="form-control" id="txt_pincode" name="txt_pincode" placeholder="Pincode" type="text" value="<?php echo $profile_details_val->pincode; ?>" /> 
											<span class="text-danger"><?php echo form_error('txt_pincode'); ?></span>
										</div>
							            <div class="col-md-12">
							              <label for="txt_address" class="control-label"> Address</label>
							              <textarea class="form-control" id="txt_address" name="txt_address" placeholder="Address"><?php echo $profile_details_val->address; ?></textarea>
							              <span class="text-danger"><?php echo form_error('txt_address'); ?></span>

								     	</div> 
								

<!--
										<div class="col-md-12">
											<h3>Social</h3>
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Facebook" />
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Youtube" />
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Twitter" />
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Linkedin" />
										</div>
-->

										<div class="col-md-12">
											<h3>Change Your Password</h3>
										</div>
										<div class="col-md-12">
											   <label for="txt_curr_pass" class="control-label"> Current Password</label>
							              <input type="text" class="form-control" id="txt_curr_pass" name="txt_curr_pass" placeholder="Current Password" value="">
							              <span class="text-danger"><?php echo form_error('txt_curr_pass'); ?></span>

										</div>
										<div class="col-md-12">
											   <label for="txt_new_pass" class="control-label"> New Password</label>
							              <input type="text" class="form-control" id="txt_new_pass" name="txt_new_pass" placeholder="New Password" value="">
							              <span class="text-danger"><?php echo form_error('txt_new_pass'); ?></span>

										</div>
										<div class="col-md-12">
													   <label for="txt_conf_newpass" class="control-label"> Confirm New Password</label>
							              <input type="text" class="form-control" id="txt_conf_newpass" name="txt_conf_newpass" placeholder="Confirm New Password" value="">
							              <span class="text-danger"><?php echo form_error('txt_conf_newpass'); ?></span>

										</div>
									</div>
								</div>
								<div class="submission-btns">
									<button type="submit" id="profileupdate-but">Save Changes</button>
<!--
									<a href="#" title="">Cancel</a>
-->
								</div>
								</div>
								
								<?php } ?>
            <?php echo form_close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	


</div>

<script type="application/javascript">

jQuery(document).ready(function(e) 
{
	$('#update_profile').click(function() 
	{
		var form1 = $('#profileupdate');
		var error1 = $('.alert-danger', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "", // validate all fields including form hidden input
			messages: {              
				'txt_empname': {
					required: 'Please Enter the first name',
				},
				'txt_utype': {
					required: 'Please Enter the User type',
				},
				'txt_phone': {
					required: 'Please Enter the last name',
				},

				'txt_empname': {
					required: 'Please Enter the username',
					remote : " Username already taken"
				},

				'txt_email': {
					required: 'Please Enter the email',
					email: 'Please Enter valid email',
					remote : " Email already taken"
				},
				'txt_password': {
					required: 'Password should not empty',					
				},
					txt_utype: {
					required: 'Please Enter the user type',
				},
					txt_phone: 'Please Enter phone Number',
			},
			rules: {
				txt_empname: {
					required: true
				},
				txt_utype: {
					required: true
				},
				//~ txt_empname: {
					//~ required: true,
					//~ remote: {
						//~ url: "<?php echo $base_url; ?>Signup_controller/unquie_fro_val",
						//~ type: "post",
						//~ data: {
							//~ type:'username',
							//~ username: function() {
							//~ return $( "#txt_empname" ).val();
							//~ }
						//~ }
					//~ }
				//~ },
				txt_phone: {
					required: true,
				},
				//~ txt_email: {
					//~ required: true,
					//~ email:true,
					//~ remote: {
						//~ url: "<?php echo $base_url?>Signup_controller/unquie_fro_val",
						//~ type: "post",
						//~ data: {
							//~ type:'email',
							//~ useremail: function() {
							//~ return $( "#txt_email" ).val();
							//~ }
						//~ }
					//~ }
				//~ },
				txt_password: {
				required: true,
				minlength: 6
				},

			},

			highlight: function(element) { // hightlight error inputs
			$(element)
			.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			unhighlight: function(element) { // revert the change done by hightlight
			$(element)
			.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

			success: function(label) {
			label
			.closest('.form-group').removeClass('has-error'); // set success class to the control group
			},

			submitHandler: function(form) {
				//event.preventDefault();
				jQuery.ajax({
				url : '<?php echo $base_url?>Signup_controller/updateprofile',
				type: 'POST',
				data: jQuery(form).serialize(),
					success:function(response){ 
					$('.notificmsg').html(response);
					setTimeout(function() {
						$(".notificmsg").fadeOut().empty();
					}, 15000);   
					}
				});
			}
		});
	});
});


		    

</script>
