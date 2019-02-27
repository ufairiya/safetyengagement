<style>
  .sectionpt130px .form-wrap {
	background: rgba(255, 255, 255, 0.14);
	padding: 20px;
}

.jobposts h6 {
	font-size: 16px;
	margin: 0;
	font-weight: 600;
}

.jobposts p {
	margin: 0;
}

.jobposts a.listing {
	padding: 7px;
	border-left: 2px solid #eee;
}

.managejobposts .sell__section__row i {
	color: #eb5a1c;
}



.managejobposts span {
	padding: 0 12px;
	color: #000;
}

.managejobposts .sell__section__row__list__child__note {
	float: left;
}

.eleven .pagination>li>a:hover {}

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

.eleven {
	width: 100%;
}

.eleven .listing li {
	width: 118px;
	border: unset;
}

.listing.full-time {
	width: 100%;
}

input.sbutn {
	padding: 11px 18px;
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

.col-md-4 .input-group,
.col-md-3 .input-group {
	width: 100%;
}

.input-group input,
.input-group textarea,
.input-group select {
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

.sectionpt130px h1,
h2,
h3,
h4,
h5,
h6 {
	color: #EB5A1D;
	text-transform: none;
}

.margin-ten-bottom {
	margin-bottom: 0;
}

.chosen-container-single .chosen-single div b {
	display: none !important;
}


/**********/

.propossub:hover+.freelancer-totle-area {
	display: block;
	background: green;
}

.jobposts a.listing {
	padding: 7px;
	border-left: 2px solid #eee;
}

.managejobposts .sell__section__row i {
	color: #eb5a1c;
}

.managejobposts section {
	border-radius: 0;
	padding: 25px;
	transition: .3s;
	position: relative;
	overflow: unset;
	border: unset;
	margin-top: -1px;
	display: table;
	width: 100%;
		border-left: 4px solid #ED7D31

}

.chosen-container-single .chosen-single div b {
	display: none !important;
}

.managejobposts span.my-earing {
	font-size: 15px;
	padding: 12px;
}

.perposal-img-client img {
	width: 16%;
}

.perposal-img-client {
	background: #EB5A1D;
	color: #fff;
	padding: 5px;
	width: 100%;
}

.perposal-img-client a {
	color: #fff;
}

.awarmeg hr {
	margin-top: 5px;
	margin-bottom: 2px;
	border: 0;
	border-top: 1px solid #eee;
}

.awarmeg a {
	background: #fff;
	font-size: 14px;
	padding: 5px;
}

.number-of-freelancer:hover {
	cursor: pointer;
}

.number-of-freelancer:hover .freelancer-totle-area {
	width: 19%;
	display: block;
	position: absolute;
	z-index: 999;
}

.freelancer-totle-area div.awarmeg {
	margin: 0 !important;
	padding: 5px;
	background: #36454f;
	font-size: 14px;
}

.freelancer-totle-area {
	display: none;
}

.propossub {
	background: #ed7d312b;
}

.perposal-img-client span {
	padding: 0 0px;
	font-size: 24px;
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
									  <ul class="dashboard-list-box list-group">
										 <?php foreach($get_postjoball as $get_postjoballval)
											{ ?>
										<li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
											<section class="sell__section__row">
											 
												  <div class="sell__section__row__list">
													 <h4 class="pull-left sell__section__row__title"> <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" > <?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>
													 <p class=" pull-right sell__section__row__text"><?php if(!empty($get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget.'<span class="sell__section__row__span">(Fixed price)</span>';}else { echo "To be negotiated"; } ?></p>
													    <span class="pull-right"> <?php if($get_postjoballval->jobemergency == 1 ){  ?>
                                                    <div class="listing-date new ">
														<?php 
															$date=date_create($get_postjoballval->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span class="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                    </div>
                                                    <?php }else{ echo ''; } ?></span>
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
														    </div>
                                       <div class="sell__section__row__list__child"> <a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Edit Job</a> </div>
                                       </div>
                                       
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
                  <h4 class="headtitbid">Expired Jobs ( <?php echo count($get_postjobexpired); ?> )</h4>
                  <div id="subpro" class="active" style="display: block;">
                     <div class="eleven columns">
                        <div class="">
                           <div class="listings-container">
                              <?php if(count($get_postjobexpired) > 0)
                                 { ?> 
                              <ul class="dashboard-list-box list-group">
                                 <?php foreach($get_postjobexpired as $get_postjoballval)
                                    { ?>
                                 <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <section class="sell__section__row">
                                       <div class="sell__section__row__list">
                                             <h4 class="pull-left sell__section__row__title"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" ><?php echo $get_postjoballval->highleveljobdesc; ?></a></h4>
<!--
                                             <p class=" pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p>
-->
                                              <p class=" pull-right sell__section__row__text"><?php if(!empty($get_postjoballval->budget)){ echo '$'.$get_postjoballval->budget.'<span class="sell__section__row__span">(Fixed price)</span>';}else { echo "To be negotiated"; } ?></p>
                                                 <span class="pull-right">
                                                    <div class="listing-date new ">
														
                                                        <span >Closed</span>
                                                    </div>
                                                  </span>
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
                                          </div>
                                          <div class="sell__section__row__list__child">
                                             <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form>
                                             <a href="<?php echo $base_url; ?>job/re_postjobs/<?php echo $get_postjoballval->po_id; ?>"   class="pull-right sell__section__row__list__button">Re-post Job</a>
                                          </div>
                                       </div>
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
  
	
 $('[data-demopoid]').each(function () { 
		var proid = $(this).attr('class');
		
		var demopoid = $(this).data('demopoid');
		
var countDownDatep =  new Date(demopoid);


// Update the count down every 1 second
var x = setInterval(function() {
  // Get todays date and time
  var d = new Date();
  var n = d.getTimezoneOffset();
	var ans = new Date(d.getTime() + n * 60 * 1000);
//console.log(ans.getHours()+':'+ans.getMinutes()+':'+ans.getSeconds());
var s_now = ans;
  // Find the distance between now and the count down date
  var distance = countDownDatep - s_now;
//alert(new Date());

 // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
if (distance > 0) {
  // Display the result in the element with id="demo"
  $('.'+proid).empty();
  $('.'+proid).append(days + "d " + hours + "h "  + minutes + "m " + seconds + "s ");
}
 else
  {
      //~ clearInterval(x);
        $('.'+proid).empty();
$('.'+proid).append("EXPIRED");
      jQuery.ajax({
		url : '<?php echo $base_url?>bids/expired',
		type: 'POST',
		data:{ proid : proid },
		success:function(data){
			location.reload();

		}
	});
   
  
  }
 
 
}, 1000);
 
 }); 

 

   
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
