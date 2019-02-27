
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


   

.jobposts .dropdownmenu {
    display: none;
    position: absolute;
    background-color: #36454f;
    min-width: 160px;
        padding: 12px;
}

.jobposts .dropdownmenu a {
  
    text-decoration: none;
    display: block;
        font-size: 12px;
}

.jobposts .dropdownmenu a:hover {
        font-size: 12px;
    color: #ed7c31;   
}
.jobposts .dropdownmenu a.sent-offer:hover {
    background: #fff;
        font-size: 12px;
    color: #ed7c31;   
}

.jobposts  .dropdowncls ul li {
    display: block;
    color: #000000;
    padding: 0px;
    text-decoration: none;
    text-align: left;
    padding-left: 5px;
}

.jobposts .dropdowncls ul li:hover .dropdownmenu {
    display: block;
}
.jobposts .dropdowncls button:hover{
	
	    background-color: #ED7D31;
	    color: #fff;

	}
</style>			
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
  <div class="container">
    <div class="row">

      <div class="jobposts">
                                   <h2 class="headh2">Job Posts </h2>

        <div class="">
         
          <div class="col-md-12 ">
	
	<!-- Recent Jobs -->
  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Active Candidacies ( 1 )</h4>
                                 <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Received</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										
										<div class="clearfix"></div>
								    </a>
                                 </li>
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
											 
                                             <ul class="list-group">
												 
	<?php	
	
	

	foreach ($get_postjoball as $get_postjoballval) { ?>

		<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
			<a href="#" class="listing full-time"><div class="recent-job-list-home">
				<div class="job-list-location col-md-3 ">
					<h6>
						<i class="fa fa-calendar"></i>
						<?php echo $get_postjoballval->start_date; 
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

						echo '<br> '.$difference.' '.$periods[$j].' ago';
					}

					?>
					</h6>
					</div>
					<div class="col-md-5 job-list-desc">
						<h6>
					<?php echo $get_postjoballval->first_name; ?></h6>
					<p>
					<?php echo $get_postjoballval->job_description; ?></p></div><div class="clearfix"></div>
				</div>
			</a>
		</li>

	<?php } ?>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         


  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Submitted Proposals ( 2 )</h4>
                                 <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Received</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">

                                             <ul class="list-group">
												 <?php	
		
	foreach ($get_postproposals as $get_postjoballval) { 

		
	 $get_postprosal = $this->postjob_model->get_postprosal($get_postjoballval->po_id);
	 if(!empty($get_postprosal))
{
					

?>
 
		<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
		<div class="listing full-time"><div class="recent-job-list-home">
				<div class="job-list-location col-md-3 ">
						  	
					<h6>
						<i class="fa fa-calendar"></i>
						<?php echo $get_postjoballval->start_date; 
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

						echo '<br> '.$difference.' '.$periods[$j].' ago';
					}

					?>
					</h6>
					</div>
					<div class="col-md-5 job-list-desc">
							<a href="#" ><h6>
					<?php echo $get_postjoballval->job_title	; ?></h6>
					<p>
					<?php echo $get_postjoballval->job_description; ?></p>
					</a>
					</div>
					
					<div class="job-list-type col-md-4 ">	 <div class="dropdown">
   
     <div class="dropdowncls">
  <ul>
    <li>
 <button class="btn"  type="button" >Saftety Bidders <?php
					 $get_postcountprosal = count($this->postjob_model->get_postprosal($get_postjoballval->po_id));
					 echo '('.$get_postcountprosal.')';
					?>
	
    <span class="caret"></span></button>      
    <div class="dropdownmenu">
			<?php
			 $get_postcountprosaldetail = $this->postjob_model->get_postprosaldetails($get_postjoballval->po_id);
			if(!empty($get_postcountprosaldetail)){
			 foreach( $get_postcountprosaldetail as $get_postcountprosalval){  //echo "<pre>"; var_dump($get_postcountprosalval); ?>
    
	<div class="perposal-img-client" style="width: 18%;float: left; padding: 7px;" ><?php if(!empty($get_postcountprosalval->profile_image)){ ?><img src="<?php echo $base_url.'uploads/'.$get_postcountprosalval->profile_image; ?>" alt=""> <?php }else{ ?><img src="<?php echo $base_url; ?>assets/img/default_avatar.png" alt=""> 
		<?php } ?>
		</div>
	                                                    	                                                    
                                                           <p><a href="#"><?php echo $get_postcountprosalval->first_name; ?></a>
														<img class="usr" src="https://app.test.safetyengagement.com/wp-content/plugins/universal-star-rating/includes/image.php?img=01.png&px=12&max=5&rat=0" style="height: 12px !important;"> (0 / 5)                                                            <a class="col-md-6 sent-offer" href="#">Award Offer</a>
															<a class="col-md-6 sent-offer mar-left-zero" onclick="$('#p-form-37162').submit();">Message</a>
															</p>
															
															<form id="p-form-37162" style="display: none;" method="post" action="#">
																<input name="job" value="69">
																
																<input type="submit" class="submit">
														   </form>
														<hr>
														  <?php } ?>	
				<?php } else{ ?>	
					<div class="perposal-img-client" style="" > <h6>Not found </h6>
	  </div><?php } ?>
    </li>
   
  </ul>
</div>
   
    </div>
    <h6>	
					</h6></div><div class="clearfix"></div>
				

				</div>
			</div>
		</li>

	<?php } 
	} ?>
                                             </ul>

                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         

  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Active Contracts ( 2 )</h4>
                                 <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Received</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
<!--
                                             <ul class="list-group">
                                             </ul>
-->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         

  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Completed Contracts ( 17 )</h4>
                                 <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="#" class="listing full-time">
                                    	<div class="job-list-location borderjobrt col-md-3 ">
											<p>Received</p>
										</div>
										<div class="col-md-5 borderjobrt job-list-desc">
											<p>Jobs</p>
										</div>
										<div class="job-list-type borderjobrt col-md-4 ">
											<p>Saftety Bidders</p>
										</div>
										<div class="clearfix"></div>
								    </a>
                                 </li>
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
<!--
                                             <ul class="list-group">
                                             </ul>
-->
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
    for (var i = 1; i <= 100; i++) {
      $('.list-groupaccons').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="recent-job-list-home"><div class="col-md-5 job-list-desc"><p><h5><a href="#">Need scaffolding built</a></h5> </p><p>I need Professional scaffolding company to buil....</p></div><div class="job-list-location col-md-3 "><h6><h5>2500 $</h5> <i class="fa fa-calendar"></i>07-11-2017</h6></div><div class="job-list-type col-md-4 "><h6><i class="fa fa-bullhorn"></i>Emergency-Jobs</h6></div><div class="clearfix"></div></div></a></li>');
    }

    $('.list-groupaccons').paginathing({
      perPage: 5,
      limitPagination: 9,
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

