<div class="container">
    <div class="row">
  <div class="col-md-12 homecontent">
   
         <h2 class="headh2">Packages history</h2>

          <div class="col-md-12 ">
	<!-- Recent Jobs -->
	<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			<div class="listing-title">
		  <div class="findjobstop eleven columns">
                    <div class="">
                        <div class="listings-container">
                            <ul class="list-group">
                                <?php  if(!empty($getallpackagedetailsdata)){ 
									foreach($getallpackagedetailsdata as $getallpackagedetailsdataval)
                                    {  
								
                                    	 ?>
                               
                                <li class="list-group-item featured job-result-item col-md-12 col-sm-12 col-lg-12" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                        <div class="">
                                            <h4></h4> 
                                            
                                                       <div class="pull-right listing-date new">
														
                                                     
                                                        <span id="demo_<?php //echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php //echo $c_dat; ?>"></span>
                                                  
                                                    </div>
                                         <?php           $get_sub_package  = $this->packages_model->get_sub_package($getallpackagedetailsdataval->package_id);
			$d_c = $get_sub_package->package_month_count;
			$d_p = $get_sub_package->package_month_name;
			$data_dfff = '+'.$d_c.' '.$d_p.'s';
			
			$Package_expiry = strtotime($data_dfff, strtotime($getallpackagedetailsdataval->created_on)); 
			$Package_expiry_date =  date('Y-m-d',$Package_expiry); 
			$Package_date = date("Y-m-d", strtotime($getallpackagedetailsdataval->created_on) );
?>
			<h4>Package Name : <?php echo $get_sub_package->package_name;?> </h4>
			<div class="col-md-6 ">
			<p>Package Amount : <?php echo $get_sub_package->pkg_amt.'$';?> </p>
			<p>Package Date : <?php echo $Package_date; ?> </p>
			<p>Bid Count : <?php echo $get_sub_package->pkg_count;?> </p></div>
			<div class="col-md-6 ">
			<p>Package Type : <?php echo $d_c.' '.$d_p;?> </p> 
			<p>Package Expiry Date : <?php echo $Package_expiry_date;?> </p>
			<p>Remaining Count : <?php echo $getallpackagedetailsdataval->package_count;?> </p>
			</div>
			<?php  if($getallpackagedetailsdataval->status == 1){ ?>
					<div class="pull-right currentpkg">
					<span>Current</span>
					</div>
					<?php } else if($getallpackagedetailsdataval->status == 2 || $getallpackagedetailsdataval->status == 0){ ?>
					<div class="pull-right inactivepkg"> 
					<span>Canceled</span>
					</div>
					<?php } else if($getallpackagedetailsdataval->status == 3){ ?>
					<div class="pull-right completedpkg">
					<span>Completed</span>
					</div>
					<?php } ?>
                                             
                                        
                                        </div>
                                     
                                    </a>
                                </li>
                                <?php } }  else
                                    {
                                    
                                    echo '<h4><label class="no_data">no data found</label></h4>'; 
                                    } ?> 
                            </ul>
                        </div>
                    </div>
                </div>
        
			
       	</div>
         	</div>
</div>
		</div>
	</div>
    </div>
    <footer class="footer-strip-dark"><a href="<?php echo $base_url; ?>package" class="btn ">Package  >></a></footer>

     
  </div>
</div>
</div>

<style>
.currentpkg
{   
	    border: 2px solid #23adff;
    padding: 5px;
    font-weight: 800;
    color: #23adff;
}
.inactivepkg
{
	    border: 2px solid #f93650;
    padding: 5px;
    font-weight: 800;
    color: #f93650;

}
.completedpkg
{       border: 2px solid #1e7328;
    padding: 5px;
    font-weight: 800;
    color: #1e7328;
}
    
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
