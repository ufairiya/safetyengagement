 <style>
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
    overflow: hidden;
    border: 1px solid #e0e0e0;
    margin-top: -1px;
}
.managejobposts span
{
	    padding: 0 12px;
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
/**********/
	 .propossub:hover +.freelancer-totle-area{
display : block;
background:green;
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


</style>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
  <div class="container">
    <div class="row">
  

      <div class="managejobposts jobposts">
                                   <h2 class="headh2">My Jobs lists</h2>

        <div class="">
         
          <div class="col-md-12 ">
	
	<!-- Recent Jobs -->
  <div  class="tab-pane">
                                 <h4 class="headtitbid">Manage Jobs( <?php echo count($get_postjoball); ?> )</h4>
                                  <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
											    <?php if(count($get_postjoball) > 0)
							 { ?> 
                                             <ul class="list-group">
												 
												 <?php foreach($get_postjoball as $get_postjoballval)
			{ ?>
<!--
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="col-md-12 sell__section__row__list">	<h5 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo$get_postjoballval->job_title; ?></a></h5><p class="pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="col-md-12 sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>8 months ago</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo$get_postjoballval->joblocation; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span><?php echo $get_postjoballval->weblink; ?></span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form> </div></div></section></li>
-->
			
			   <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" >
                                       <div class="sell__section__row__list">
                                          <h4 class="pull-left sell__section__row__title"><label><?php echo $get_postjoballval->highleveljobdesc; ?></label></h4>
                                          <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
                                       </div>
                                       <div class="clear"></div>
                                       <label><?php echo$get_postjoballval->job_description; ?></label>
                                       <div class=" sell__section__row__list">
                                          <div class=" sell__section__row__list__child">
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
                                                if( !empty($get_postjoballval->posteddate))
                                                {
                                                	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
                                                	$lengths = array("60","60","24","7","4.35","12","10");
                                                
                                                	$now = time();
                                                
                                                	$difference     = $now - strtotime($get_postjoballval->posteddate);
                                                	$tense         = "ago";
                                                
                                                	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
                                                	{
                                                		$difference /= $lengths[$j];
                                                	}
                                                
                                                	$difference = round($difference);
                                                
                                                	if($difference != 1) 
                                                	{
                                                		$periods[$j].= "s";
                                                	}
                                                
                                                	echo $difference.' '.$periods[$j].' ago';
                                                }
                                                
                                                ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postjoballval->joblocation.' ,'.$get_postjoballval->city.' ,'.$get_postjoballval->state; ?></span></div>
                                             <div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div>
                                             <div class="sell__section__row__list__child__note"></div>
                                             <div class="sell__section__row__list__child__note rulehover">
                                                <div class="number-of-freelancer">
                                                   <?php $get_postprosaldetails = $this->postjob_model->get_active_post($get_postjoballval->po_id);   ?>
                                                   <i class="fa fa-dot-circle-o"></i><span class="headtitbid propossub">Saftety Bidders  ( <?php echo count($get_postprosaldetails); ?> )</span>
                                                   <p class="headtitbid fa fa-chevron-down"></p>
                                                   <div class="freelancer-totle-area" >
                                                      <ul>
                                                         <?php $c=0;  foreach($get_postprosaldetails as $get_postproposalsdata ){   if($c < 3) { ?>  
                                                         <li>
                                                            <div class="perposal-img-client" >
                                                               <?php if($get_postproposalsdata->profile_image == ""){ ?><img  style="width: 30px;" src="<?php echo $base_url.'assets/img/default_avatar.png'?>" alt=""><?php } else{ ?><img style="width: 30px;" src="<?php echo $base_url.'uploads/'.$get_postproposalsdata->profile_image; ?>" alt=""><?php } ?>
                                                               <a href="<?php echo $base_url; ?>home/profile/<?php echo $get_postproposalsdata->id_user_master.'/'.$get_postjoballval->po_id; ?>"> <?php echo $get_postproposalsdata->first_name; ?></a>
                                                               <img class="usr" src="https://app.test.safetyengagement.com/wp-content/plugins/universal-star-rating/includes/image.php?img=01.png&amp;px=12&amp;max=5&amp;rat=0" style="height: 12px !important;"> (0 / 5)   
                                                            </div>
                                                           
                                                        
                                                         </li>
                                                         <?php }else{ echo '<a href="'.$base_url.'job/listofSF/'.$get_postjoballval->po_id.'">See more</a>'; } $c++; } ?>
                                                      </ul>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         <div class="sell__section__row__list__child"> <a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Edit Job</a> </div>
                                       </div>
                                       </a>
                                    </section>
                                 </li>
                              
			  <?php } ?> 
                                             </ul>
                                             
                                             <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         


  <div class="tab-pane">
                                 <h4 class="headtitbid">Expirted Jobs ( <?php echo count($get_postjobexpired); ?> )</h4>
                               
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                        <div class="listings-container">
											 <?php if(count($get_postjobexpired) > 0)
							 { ?> 
                                             <ul class="list-group">
												 
												 <?php foreach($get_postjobexpired as $get_postjoballval)
			{ ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="sell__section__row__list">	<h5 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></h5><p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="clear"></div><label><?php echo$get_postjoballval->job_description; ?></label><div class=" sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>	<?php //echo $get_postjoballval->start_date; 
					if( !empty($get_postjoballval->posteddate))
					{
						$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
						$lengths = array("60","60","24","7","4.35","12","10");

						$now = time();

						$difference     = $now - strtotime($get_postjoballval->posteddate);
						$tense         = "ago";

						for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) 
						{
							$difference /= $lengths[$j];
						}

						$difference = round($difference);

						if($difference != 1) 
						{
							$periods[$j].= "s";
						}

						echo $difference.' '.$periods[$j].' ago';
					}

					?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo $get_postjoballval->joblocation.' ,'.$get_postjoballval->city.' ,'.$get_postjoballval->state; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span></span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form><a href="<?php echo $base_url; ?>job/re_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Re-post Job</a></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                             
                                             <?php } 
                                 else
                                 {
									 
									echo '<h4><label class="no_data">no data found</label></h4>'; 
								 }
                                 
                                 
                                 ?> 
                                          </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>

</div>
       <!-- Widgets -->
	<div class="col-md-4 five columns">




	</div>
	<!-- Widgets / End --> </div>
      </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>

		
<script type="text/javascript">
  jQuery(document).ready(function($){ 


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
  jQuery(document).ready(function($){
  
    $('.list-groupaccons').paginathing({
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
