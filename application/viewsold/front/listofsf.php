                                 
 <style>
	 .propossub:hover +.freelancer-totle-area{
display : block;
background:green;
}
 .sectionpt130px .form-wrap{  background: rgba(255, 255, 255, 0.14);
    padding: 20px;
}
.jobposts h6
{
	    font-size: 16px;
	    margin: 0;
	    font-weight:600;
}
.jobposts p {
    margin: 0;
}

.jobposts a.listing
{
	    padding: 7px;
	    	border-left: 2px solid #eee;

}
.managejobposts .sell__section__row i
{
	
	color:#eb5a1c;
	}

.managejobposts section {
border-radius: 0;
    padding: 25px;
    border-left: 4px solid #eee;
    transition: .3s;
    position: relative;
    overflow: unset;
    border: 1px solid #e0e0e0;
    margin-top: -1px;
    display: table;
    width: 100%;
}
.managejobposts span
{
	    padding: 0 0px;
	color:#000;
	}
.managejobposts .sell__section__row__list__child__note
{
	float:left;
	
	}
.eleven .pagination>li>a:hover{
	
	
}
	.eleven .pagination>li>a {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #EB5A1D;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.eleven{width: 100%;}

.eleven .listing li{
	    width: 118px;

border: unset; 
	}
	.listing.full-time
	{
		    width: 100%;
		}
input.sbutn
{    padding: 11px 18px;
	    width: 100%;
	        background-color: #f36c37;
    top: 0;
   
    color: #fff;
    position: relative;
    font-size: 15px;
    font-weight: 600;
    display: inline-block;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
    margin-right: 6px;
    overflow: hidden;
    border-radius: 0px !important;
        line-height: 40px;
	}
.input-group .form-control {
      border-right: 1px solid #EB5A1D;
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    border-radius: 0 !important;
    height: 60px;
}
.sectionpt130px .col-md-3 {
    width: 25%;

}
.sectionpt130px .col-md-4 {
    width: 33.33333333%;
  
}
.col-md-4 .input-group,.col-md-3 .input-group{
	width:100%;
	}
	.input-group input, .input-group textarea, .input-group select {
    margin: 0;

     border-radius: 0;
         border-color: #fff;
    /* padding: 19px 25px; */
    height: 60px;
    width: 100%;
        border-right: 1px solid #EB5A1D;

    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
}
.sectionpt130px h1, h2, h3, h4, h5, h6 {
    color: #EB5A1D;
    text-transform: none;
  }
.margin-ten-bottom
{
	    margin-bottom: 0;
}
.chosen-container-single .chosen-single div b
{
	    display: none !important;
	}
 .managejobposts span.my-earing{   font-size: 15px;
    padding: 12px;}
.perposal-img-client img
{
	    width: 16%;
	}
.perposal-img-client{
	    background: #EB5A1D;
    color: #fff;
    padding: 5px;
    width: 100%;
	
	}
	.perposal-img-client a{
		 color: #fff;
	}
.awarmeg hr {
    margin-top: 5px;
    margin-bottom: 2px;
    border: 0;
    border-top: 1px solid #eee;
}

.awarmeg a
{
	    background: #fff;
    font-size: 14px;
    padding: 5px;
}
.number-of-freelancer:hover{
	
	 cursor:pointer;
	}
.number-of-freelancer:hover .freelancer-totle-area
{
	    width: 19%;
	    display: block;
	        position: absolute;
	            z-index: 999;
	           

	}
.freelancer-totle-area div.awarmeg
{    margin: 0 !important;
	    padding: 5px;
	  background: #36454f;
	  font-size:14px;
	}
	

.freelancer-totle-area{ 
display: none;
}
.propossub
{
	    background: #ed7d312b;
	}
	.jqEmoji {
   
       font-size: 24px !important;
}

.form-group {
    margin-bottom: 0px;
}
	
</style>			
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
<div class="container">
   <div class="row">
      <div class="managejobposts jobposts">
         <h2 class="headh2 ">List Of Safety Professional </h2>
         <div class="">
            <div class="col-md-12 ">
               <div id="events" class="tab-pane">
                  <h4 class="headtitbid"><?php echo $get_singleproject->highleveljobdesc; ?> List( <?php echo  count($get_postprosaldetails); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
                              <ul class="dashboard-list-box list-groupactcand list-group">
                                 <?php   foreach($get_postprosaldetails as $get_postproposalsdata)
                                    {  ?>
											<li class="col-md-12 list-group-item featured job-result-item"><a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_singleproject->po_id; ?>">
											<div class="" >
											<?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
											<?php echo $get_postproposalsdata->first_name; 
																				
													
										$get_rating  = $this->postjob_model->get_rating($get_postproposalsdata->id_user_master);
//print_r($get_rating);
?>
										
										
											<label for="fname" >
											<div class="form-group" id="rating"> 
											
											</div>
											</label>
											
									
								

										
										<label for="fname" ><?php   foreach($get_rating as $get_ratingval){   ?>
										<div class="job-head-info">
										<p><i class="la la-unlink"></i> <?php //echo $profile_user->companyname; ?></p>
										
										
										<input type="hidden"  class="getcount" name="getcount"  value="<?php 
										if(!empty($get_ratingval->countrating)) 
										{ 		echo round($get_ratingval->countrating/$get_ratingval->ra_id);
											 } ?>" />
										</div>

										<?php	}
										?>
										</label>
										
								
							</div>
											<div class="awarmeg">
											<!--
											<a class="sent-offer" href="<?php echo $base_url; ?>">Award Offer</a>
											-->
											</div>
											</a>
											</li>
                                 <?php   } ?> 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                 </div>
            <!-- Widgets -->
            <div class="col-md-4 five columns">
            </div>
            <!-- Widgets / End --> 
         </div>
      </div>
   </div>
</div>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupsubpro').paginathing({
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
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupactcand').paginathing({
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
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupactcint').paginathing({
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
  jQuery(document).ready(function($){
    //~ for (var i = 1; i <= 100; i++) {
      //~ $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    //~ }

    $('.list-groupcompl').paginathing({
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

<script src="<?php echo $base_url; ?>assets/js/jquery.emojiRatings.min.js"></script>
		<script>
			$("#rating").emojiRating({
				fontSize: 32,
							});
			
		</script>
