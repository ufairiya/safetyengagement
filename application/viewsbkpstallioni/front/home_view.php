<style>
@media (min-width: 322px) and (max-width: 728px) {
	.featured .listing-type 
	{
		margin-left:22px !imporant;
	}
	.findjobstop .padding-right
	{
		padding-right: 0px;
	}
}
@media (min-width:768px) and (max-width:1024px){
	.feature{
	
		margin-top:-100px;
	}
}

.findjobstop .list-group-item {
    width: 100%; display: table;
}
.findjobstop .pagination>li>a:hover, .pagination>li>span:hover {
    background-color: #EB5A1D;
    border-color: #EAEAC5;
    color: #fff;
}
</style>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">

<div class="homeviewaltfont">
   <section class="sectionpt130px wow fadeIn no-padding parallax xs-background-image-center" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>assets/images/parallax-bg4.jpg');">
      <div class="opacity-extra-medium bg-black"></div>
      <div class="container-fluid padding-five-lr one-fourth-screen xs-padding-15px-lr">
         <div class="row height-100">
            <div class="container position-relative height-100">
               <div class="slider-typography">
                  <div class="slider-text-middle-main">
                     <div class="slider-text-bottom">
                        <div class="col-lg-12 bgcolorhome text-center">
                           <div class="stl_pf_m">
                              <div class="sliderTxt">
                                <div class="findsecclass">
                                   <div class="form-wrap">
                                       <div class="pstsecclass">
                                          <h4 class="text-white alt-font font-weight-300 width-60 center-col margin-ten-bottom md-margin-fifteen-bottom md-width-80 sm-margin-twenty-bottom xs-width-100 xs-margin-100px-bottom">
                                             <p><strong>Your One Stop.</strong></p>
                                             <p><strong>Safety Resource Site. </strong></p>
                                          </h4>
                                       </div>
                                       <ul class="tabshome">
                                          <li class="tab-link current " data-tab="findjob"><span>Find Job</span></li>
                                          <li class="tab-link " data-tab="postjob"><span>Post A Job</span></li>
                                       </ul>
                                       <div id="findjob" class="tab-contenthome current">
                                          <form id="hbz-searchbox" action="<?php echo $base_url; ?>bids/find_job" method="post">
                                             <input type="text" id="hbz-input" class="col-lg-8 col-md-12 col-sm-12" name="finddata" placeholder="ENTER ZIP CODE, INDUSTRY, STATE BELOW OR TYPE ANY" /> 
                                             <button id="hbz-submit" class="col-lg-4 col-md-12 col-sm-12" type="submit">Find Job</button>    <input type="hidden" name="max-results" value="8" />
                                          </form>
                                       </div>
                                       <div id="postjob" class="tab-contenthome">
                                          <form id="hbz-searchbox" action="#" method="post">
                                             <a href="<?php echo $base_url; ?>/job" id="hbz-submit"  class="col-lg-12 col-md-12 col-sm-12" type="submit">Post A Job</a><input type="hidden" name="max-results" value="8" />
                                          </form>
                                       </div>
                                    </div>
                                    <!-- container -->
                                    <form>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
<!-- end parallax hero section -->
<!-- Top Section -->
<section class="pt-60 sectionother wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url();?>assets/images/parallax-bg18.jpg&quot;); background-position: 0px -329.444px; visibility: visible; animation-name: fadeIn;">
   <div class="container">
      <div class="row">
         <h2 class="headh2">FIND JOBS BY STATE</h2>
         <!-- Map html - add the below to your page -->
         <div class="jsmaps-wrapper" id="usa-map"></div>
         <!-- End Map html -->
         <div class="text-center">
            <div class="stl_pf_m">
               <div class="sliderTxt">
               </div>
            </div>
         </div>
         <script type="text/javascript">
            $(function() {
              
              $('#usa-map').JSMaps({
                map: 'usa'
              });
            
            });
            
         </script>
      </div>
   </div>
</section>
<!-- Top Section -->
<section class="pt-60 sectionother wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url();?>assets/images/parallax-bg18.jpg&quot;); background-position: 0px -329.444px; visibility: visible; animation-name: fadeIn;margin-top:-75px;">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-40px-bottom xs-margin-40px-bottom">
            <div class="position-relative overflow-hidden width-100">
               <h4 class="alt-font font-weight-300 center-col margin-ten-bottom md-margin-fifteen-bottom sm-margin-twenty-bottom xs-width-100 xs-margin-100px-bottom"><strong>How It Works</strong> </h4>
            </div>
         </div>
         <div class="row equalize xs-equalize-auto">
            <!-- start features box item -->
            <div class="col col-md-3 col-sm-3 col-xs-12 sm-margin-four-bottom xs-margin-30px-bottom wow fadeInUp feature" style="visibility: visible; animation-name: fadeInUp;height:unset;padding: 12px;">
               <div class="bg-white text-center " >
                  <a href="./services-simple.html"><img src="<?php echo base_url();?>assets/img/latest-blog6.jpg" alt="" data-no-retina=""></a>
                  <div class="padding-20px-all sm-padding-15px-all inner-match-height">
                     <span class="text-extra-dark-gray font-weight-500 display-block alt-font margin-10px-bottom">COMPANIES</span>
                     <p class="box-height" >Define Safety Projects & Fill Your Current
                        Positions Now..
                     </p>
                  </div>
                  <a href="<?php echo $base_url;?>/job" class="btn btn-small btn-rounded btn-transparent-dark-gray postbox1">POST JOBS NOW <i class="ti-arrow-right"></i></a>
               </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col col-md-3 col-sm-3 col-xs-12 sm-margin-four-bottom xs-margin-30px-bottom wow fadeInUp feature" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; height: unset;padding: 12px;">
               <div class="bg-white text-center ">
                  <a href="#"><img src="<?php echo base_url();?>assets/img/latest-blog7.jpg" alt="" data-no-retina=""></a>
                  <div class="padding-20px-all sm-padding-15px-all inner-match-height">
                     <span class="text-extra-dark-gray font-weight-500 display-block alt-font margin-10px-bottom">SAFETY FREELANCERS</span>
                     <p class="box-height">Qualified Safety Professionals Explore & Find Jobs Meeting your Needs.</p>
                  </div>
                  <a href="<?php echo $base_url;?>bids/find_job" class="btn btn-small btn-rounded btn-transparent-dark-gray postbox2">FIND JOBS <i class="ti-arrow-right"></i></a>
               </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col col-md-3 col-sm-3 col-xs-12 sm-margin-four-bottom xs-no-margin-bottom wow fadeInUp feature" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp; height: unset;padding: 12px;">
               <div class="bg-white text-center ">
                  <a href="#"><img src="<?php echo base_url();?>assets/img/latest-blog5.jpg" alt="" data-no-retina=""></a>
                  <div class="padding-20px-all sm-padding-15px-all inner-match-height">
                     <span class="text-extra-dark-gray font-weight-500 display-block alt-font margin-10px-bottom">INDUSTRIES WE COVER</span>
                     <p class="box-height">Construction,Oil & Gas, Mining, & much more....</p>
                  </div>
                  <a href="<?php echo $base_url; ?>home/industrieswecover" class="btn btn-small btn-rounded btn-transparent-dark-gray postbox3">READ MORE <i class="ti-arrow-right"></i></a>
               </div>
            </div>
            <!-- end features box item -->
            <!-- start features box item -->
            <div class="col col-md-3 col-sm-3 col-xs-12 sm-margin-four-bottom xs-no-margin-bottom wow fadeInUp feature" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp; height: unset;padding: 12px;">
               <div class="bg-white text-center ">
                  <a href="#"><img src="<?php echo base_url();?>assets/images/latest-blog77.jpg" alt="" data-no-retina=""></a>
                  <div class="padding-20px-all sm-padding-15px-all inner-match-height">
                     <span class="text-extra-dark-gray font-weight-500 display-block alt-font margin-10px-bottom">ENGAGEMENT </span>
                     <p class="box-height">Connect With Other Safety Professionals,Expand Your Knowledge,& Get Questions Answered.</p>
                  </div>
                  <a href="<?php echo $base_url; ?>home/engagement" class="btn btn-small btn-rounded btn-transparent-dark-gray postbox4">ENGAGE NOW <i class="ti-arrow-right"></i></a>
               </div>
            </div>
            <!-- end features box item -->
         </div>
      </div>
   </div>
</section>
<section class=" wow fadeIn bg-deep-pink" style="visibility: visible; animation-name: fadeIn;margin-top:-50px;">
   <div class="container">
      <div class="row">
         <div class="row equalize sm-equalize-auto">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center display-table sm-margin-50px-bottom xs-margin-30px-bottom" style="height: 370px;">
               <div class="display-table-cell vertical-align-middle">
                  <img src="<?php echo $base_url; ?>assets/images/blog-img114.jpg" alt="" class="width-100" data-no-retina="">
               </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 display-table last-paragraph-no-margin" style="height: 370px;">
               <div class="display-table-cell vertical-align-middle padding-twelve-left sm-text-center sm-no-padding-lr">
                  <h4 class="text-white font-weight-300 width-100">Safety Engagement</h4>
                  <p class="width-80 text-white md-width-90 sm-width-100">Safety Engagement is a community of independent and company-based Safety Professionals dedicated to creating the safest, regulatory-compliant work places. Safety Engagement connects Companies with Safety Projects with the Safety Professionals that make those projects successful.</p>
                  <a href="<?php echo $base_url; ?>home/history" class="btn btn-small btn-rounded btn-transparent-white margin-30px-top">Company History</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Top Section -->
<section class="sectionother pb-60 slice pt-60 ">
   <div class="container bg-white">
      <!-- Recent Jobs -->
      <div class="eleven columns">
         <div class="padding-right">
            <h3 class="margin-bottom-25 text-center"><strong>Recent Jobs</strong></h3>
            <div class="listings-container">
               <!-- Recent Jobs -->
               <div class="findjobstop homepgdetail eleven columns">
                  <div class="padding-right">
                     <ul class="list-group">
                        <?php  if(!empty($get_postjoball)){ foreach($get_postjoball as $get_postjoballval)
                           {   $check_bidjob = $this->postjob_model->check_bidjob($get_postjoballval->po_id,$get_postjoballval->company_userid);
                           	$check_awardedjob = $this->postjob_model->check_awardedjob($get_postjoballval->po_id,$get_postjoballval->company_userid); ?>
                        <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"> 
                                    <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" class="listing full-time">
                                        <div class="listing-title">
                                            <h4><?php echo  substr($get_postjoballval->highleveljobdesc,0,90).'....'; ?></h4>  <?php
                                              if(!empty($get_postjoballval->status) && $get_postjoballval->jobemergency == '1' && $get_postjoballval->job_status != 3 && $get_postjoballval->status != 2){  ?>
                                                       <div class="pull-right listing-date new">
														<?php 
															$date=date_create($get_postjoballval->posteddate);
															date_add($date,date_interval_create_from_date_string("2 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span id="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                  
                                                    </div>
                                                    <?php }  
                                                           if(!empty($check_awardedjob) && $check_awardedjob->status == 2 && !empty($check_bidjob) && $check_bidjob->status == 2){ ?>
														     <div class="pull-right listing-date new">
                                                    <span>Awarded</span>
                                                </div>
													<?php	}   
														  
                                                         if(empty($check_awardedjob)){  
													
													
											
                                             if(!empty($check_bidjob) && $check_bidjob->status == 1 ){ ?>
                                        
                                             
                                                <div class="pull-right listing-date new">
														
                                                        <span>Bidded</span>
                                                    </div>
                                             
                                   
                                        <?php } 
                                            else if(!empty($check_bidjob) && $check_bidjob->status == 2){
                                            ?>
                                                 <div class="pull-right listing-date new">
														
                                                        <span>Send proposal</span>
                                            </div>
                                        <?php }  }
                                          $cityval = (!empty($get_postjoballval->city)) ? $get_postjoballval->city.',' :'';
                                         ?>
                                            <p><?php echo substr($get_postjoballval->job_description,0,100).'....'; ?></p>
                                            <ul class="listing-icons">
                                                <li><i class="fa fa-briefcase"></i> <?php echo $get_postjoballval->explevel1; ?></li>
                                                <li><i class="fa fa-address-card" aria-hidden="true"></i> <?php echo $cityval.''.$get_postjoballval->joblocation; ?></li>
                                                <li><i class="fa fa-money"></i><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span"> ( <?php echo $get_postjoballval->hourorfix; ?> price )</span></li>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $get_postjoballval->posteddate; ?>
                                                </li>
                                                <li>
                                                  
                                                </li>
                                            </ul>
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
            <a href="<?php echo $base_url; ?>bids/find_job" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
         </div>
      </div>
   </div>
</section>
<!-- start services section -->
<section class="sectionpt130px wow fadeIn parallax xs-background-image-center  xs-padding-50px-bottom" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>assets/images/homepage-9-parallax-img5.jpg');">
   <div class="opacity-extra-medium bg-black"></div>
   <div class="container-fluid padding-thirteen-lr md-padding-six-lr position-relative xs-padding-15px-lr">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-12 text-center center-col">
            <h4 style="line-height: 40px;" class="text-white alt-font font-weight-300 xs-margin-5px-bottom">Providing Simple, Secure, and Successful Connections between Qualified Safety Professionals and Companies in need World Wide.</h4>
         </div>
      </div>
   </div>
</section>
<!-- end services section -->
<!-- start contact -->
<section class=" parallax" data-stellar-background-ratio="0.1" style="background-image:url('<?php echo base_url();?>assets/images/parallax-bg11.jpg');">
   <div class="container" style="background: #7b777785;padding: 10px;">
      <div class="row sm-col-2-nth">
         <div class="col-md-3 col-sm-6 col-xs-12 text-center sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s" style="color: #fff;">
            <i class="icon-chat icon-medium margin-25px-bottom sm-margin-15px-bottom"></i>
            <div class="text-uppercase text-small font-weight-500 alt-font margin-5px-bottom">Let's Talk</div>
            <p class="center-col">Phone: (606) 407-0766. <br /></p>
            <a href="<?php echo $base_url; ?>home/emailus" class="text-decoration-line-through-deep-pink text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">call us</a>
         </div>
         <!-- start contact item -->
         <div class="col-md-3 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="color: #fff;">
          
         </div>
         <div class="col-md-3 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="color: #fff;">
          
         </div>
         <div class="col-md-3 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s" style="color: #fff;">
            <i class="icon-envelope icon-medium margin-25px-bottom sm-margin-15px-bottom"></i>
            <div class="text-uppercase text-small font-weight-500 alt-font margin-5px-bottom">E-mail Us</div>
            <p class="center-col"><a style="color: #fff;" href="mailto:info@yourdomain.com">Info@safetyengagement.com</a></p>
            <a  href="<?php echo $base_url; ?>home/letstalk" class="text-decoration-line-through-deep-pink text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">send e-mail</a>
         </div>
         <!-- end contact item -->
      </div>
   </div>
</section>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/homesection.css" type="text/css">

<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<?php

if($this->session->flashdata('showpopup')){
	
	 ?>


<script type="text/javascript">
  var myTimeout;
   clearTimeout( myTimeout );

 setTimeout(function() {
	
    $('#signregpage').click();
    $('a[href="#tab1"]').click();
}, 1000);
</script>	
<?php } ?>
<script>
// Set the date we're counting down to
$(document).ready(function() {
	function formatDate(date) {
		  var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear(),
         hour = d.getHours(),
		mins= d.getMinutes(),
		sec= d.getSeconds(),
		 amOrPm = (d.getHours() < 12) ? "AM" : "PM";


     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [month, day, year].join('/')+' '+[hour, mins,sec].join(':');
 }

 $('[data-demopoid]').each(function () { 
            var proid = $(this).attr('id');
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
  document.getElementById(proid).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
}
 else
  {
      //~ clearInterval(x);
       document.getElementById(proid).innerHTML = "EXPIRED";
      jQuery.ajax({
		url : '<?php echo $base_url?>bids/expired',
		type: 'POST',
		data:{ proid : proid },
		success:function(data){
			if(data == 'false')
			{
				
			}else
			{
				location.reload();
			}
		}
	});
   
  
  }
 
 
}, 1000);
 
 }); 

 
 });
</script>
	<script type="text/javascript">
  jQuery(document).ready(function($){
	  
	  
	      //~ jQuery.ajax({
		//~ url : '<?php echo $base_url?>/job/expiredday',
		//~ type: 'POST',
		//~ success:function(data){

		//~ }
	//~ });
   
	  
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
  	$('ul.tabshome li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabshome li').removeClass('current');
		$('.tab-contenthome').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})


 </script>
