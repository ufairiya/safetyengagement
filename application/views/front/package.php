<div class="container">
    <div class="row">
  <div class="col-md-12 homecontent">
   
         <h2 class="headh2">Packages </h2>
       
          <div class="col-md-12 ">
	<!-- Recent Jobs -->
	<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			<div class="listing-title">
			<?php 
			
			if(!empty($get_subscription_package))
			{ 
				
				if($get_subscription_package)
			{
			 $por_r = $get_subscription_package->package_id;
			}
			else{
				$por_r = 0;
				}
			$get_sub_package  = $this->packages_model->get_sub_package($get_subscription_package->package_id);
			$d_c = $get_sub_package->package_month_count;
			$d_p = $get_sub_package->package_month_name;
			$data_dfff = '+'.$d_c.' '.$d_p.'s';
			
			$Package_expiry = strtotime($data_dfff, strtotime($get_subscription_package->created_on)); 
			$Package_expiry_date =  date('Y-m-d',$Package_expiry); 
			$Package_date = date("Y-m-d", strtotime($get_subscription_package->created_on) );
?>
			<h3>Package Name : <?php echo $get_sub_package->package_name;?> </h3>
			<div class="col-md-6">
			<p>Package Amount : <?php echo $get_sub_package->pkg_amt.'$';?> </p>
			<p>Package Date : <?php echo $Package_date; ?> </p>
			<p>Bid Count : <?php echo $get_sub_package->pkg_count;?> </p></div>
			<div class="col-md-6 ">
			<p>Package Type : <?php echo $d_c.' '.$d_p;?> </p> 
			<p>Package Expiry Date : <?php echo $Package_expiry_date;?> </p>
			<p>Remaining Count : <?php echo $get_subscription_package->package_count;?> </p>
			</div>
			<hr>
			<br>
			<h2>Updating Package List</h2>
			<hr>
			
			<?php
			$n_free_package  = $this->packages_model->n_free_package();

			foreach($n_free_package as $get_postjoballval)
    			{  
									

					 ?>
		 <div class="col-md-4">
			 <div class="pkg_list">
			<div class="pkg_heading"> <?php echo $get_postjoballval->package_name; ?>  </div>
			<div class="packInfoDetailOuter">
				<p class="recommendPacksTitle"> <?php echo $get_postjoballval->pkg_desc?>  </p>
				<p class="recommendValidity"> <?php echo 'Validity   '.$get_postjoballval->package_month_count.' '.$get_postjoballval->package_month_name; ?> <br>  <?php echo 'Bid Count   '.$get_postjoballval->pkg_count; ?> </p>
				<p class="recRecharge"> <?php echo '$ '.$get_postjoballval->pkg_amt; ?>  </p>
				<p> 			
						<input type="hidden" name="p_id_r" value="<?php echo $get_postjoballval->pkgid; ?> ">

					
					<input type="submit"  data-amt = "<?php echo $get_postjoballval->pkg_amt;  ?>" data-con = "<?php echo $get_postjoballval->pkg_count;  ?>" data-id = "<?php echo $get_postjoballval->pkgid;?>" class="btndesign button margin-top-15" value="Buy Packages">  </p>
		</div>
		</div>
		</div>
			   <?php }	
			 }
			else
			{
				?> 
			<div class="col-md-12 ">
				<?php 
								
				
		$use_package  = $this->packages_model->use_package();
				?>
         <?php foreach($get_packages_list as $get_postjoballval)
    			{  
											
if(!empty($use_package))
{
						if($get_postjoballval->pkgid == $use_package->package_id)
						{
							
							
						
						}
					
						else
						{
						
					 ?>
		 <div class="col-md-4">
			 <div class="pkg_list">
			<div class="pkg_heading"> <?php echo $get_postjoballval->package_name; ?>  </div>
			<div class="packInfoDetailOuter">
				<p class="recommendPacksTitle"> <?php echo $get_postjoballval->pkg_desc?>  </p>
				<p class="recommendValidity"> <?php echo 'Validity   '.$get_postjoballval->package_month_count.' '.$get_postjoballval->package_month_name; ?> <br>  <?php echo 'Bid Count   '.$get_postjoballval->pkg_count; ?> </p>
				<p class="recRecharge"> <?php echo '$ '.$get_postjoballval->pkg_amt; ?>  </p>
				<p> 			
						<input type="hidden" name="p_id_r" value="<?php echo $get_postjoballval->pkgid; ?> ">

					
					<input type="submit"  data-amt = "<?php echo $get_postjoballval->pkg_amt;  ?>" data-con = "<?php echo $get_postjoballval->pkg_count;  ?>" data-id = "<?php echo $get_postjoballval->pkgid;?>" class="btndesign button margin-top-15" value="Buy Packages">  </p>
		</div>
		</div>
		</div>
			   <?php }
			   }
		   
		   else
		   {
		    ?>
		 <div class="col-md-4">
			 <div class="pkg_list">
			<div class="pkg_heading"> <?php echo $get_postjoballval->package_name; ?>  </div>
			<div class="packInfoDetailOuter">
				<p class="recommendPacksTitle"> <?php echo $get_postjoballval->pkg_desc?>  </p>
				<p class="recommendValidity"> <?php echo 'Validity   '.$get_postjoballval->package_month_count.' '.$get_postjoballval->package_month_name; ?> <br>  <?php echo 'Bid Count   '.$get_postjoballval->pkg_count; ?> </p>
				<p class="recRecharge"> <?php echo '$ '.$get_postjoballval->pkg_amt; ?>  </p>
				<p> 			
						<input type="hidden" name="p_id_r" value="<?php echo $get_postjoballval->pkgid; ?> ">

					
					<input type="submit"  data-amt = "<?php echo $get_postjoballval->pkg_amt;  ?>" data-con = "<?php echo $get_postjoballval->pkg_count;  ?>" data-id = "<?php echo $get_postjoballval->pkgid;?>" class="btndesign button margin-top-15" value="Buy Packages">  </p>
		</div>
		</div>
		</div>
			   <?php }
			  
			   
			   ?> 
         <?php } }?> 
         	</div>
         	</div>
</div>
		</div>
	</div>
</div>
    
<!--
      <h2 class="headh2">Packages history</h2>
-->
<footer class="footer-strip-dark"><a href="<?php echo $base_url; ?>package/packagelist" class="btn ">Package history >></a></footer>
  </div>
</div>
</div>

 <style>
	 .listing-title{color: #000;}
	 table {
    width: 100%;
}
.pkg_heading {background: #ed7d30 none repeat scroll 0 0;
    box-sizing: border-box;
    color: #fff;
    float: left;
    font-size: 18px;
    padding: 10px 18px;
    text-transform: uppercase;
    width: 100%;
    text-align: center;}
    
    
 .pkg_list   {
        border-bottom: 2px solid #9c9c9c;
    position: relative;
    float: left;
    max-width: 292px;
    width: 100%;
    cursor: pointer;
    box-sizing: border-box;
    z-index: 5;
    min-height: 180px;
    -moz-box-shadow: 0 5px 10px #9c9c9c;
    -webkit-box-shadow: 0 5px 10px #9c9c9c;
    -ms-box-shadow: 0 5px 10px #9c9c9c;
    box-shadow: 0 5px 10px #9c9c9c;
        margin-bottom: 15px;
} 
   .packInfoDetailOuter {width: 100%;
    float: left;
    padding: 10px 18px;
    box-sizing: border-box;
    position: relative;}
    .recommendPacksTitle {color: #494d50;
    font-size: 16px;
    width: 100%;
    position: relative;
    line-height: 20px}
    .recommendValidity{  
		  float: left;
    width: 100%;
    padding: 15px 0 10px 0;
    color: #797b7a;
    font-size: 15px; }
    
    
    
   .recRecharge {
		background: #fff;
    border: 1px solid #ed7d30;
    border-radius: 5px;
    box-sizing: border-box;
    color: #ed7d30;
    cursor: pointer;
    float: right;
    font-size: 20px;
    line-height: 20px;
    padding: 8px 12px;
    text-align: center;
    width: auto;
    position: absolute;
    bottom: 100px;
    right: 18px;
    font-weight: 600;
		
		}
	 </style>	

<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    for (var i = 1; i <= 150; i++) {
      $('.list-group').append('');
    }

    $('.list-group').paginathing({
      perPage: 5,
      limitPagination: 0,
      containerClass: 'panel-footer',
      pageNumbers: true
    })

    $('.table tbody').paginathing({
      perPage: 2,
      insertAfter: '.table',
      pageNumbers: true
    });
  });
  


</script>


<script type="application/javascript">
				$('.btndesign').click(function(){
					
					var data_id = $(this).attr("data-id"); 
					var data_con = $(this).attr("data-con"); 
					var data_amt = $(this).attr("data-amt"); 
					
				$.ajax({
				url: '<?php echo $base_url?>package/package_update',
				 method: "POST",  
            data:{id:data_id,con:data_con},  
				success:function(data)
				{  
				
					toastr.options = {
									"closeButton": true,
							}
							toastr.success("Package Selected Successfully", "Notifications");	
							setTimeout(function(){
							
						
					  
					if(0 < data_amt)
					
					{
						window.location.replace("<?php echo base_url(); ?>package/package_payment/"+data);
					}
					else{
						
						window.location.replace("<?php echo base_url(); ?>bids/updatefreebid/"+data);
						}
							}, 3000); 	
 
				}
				})


				});
	</script>
