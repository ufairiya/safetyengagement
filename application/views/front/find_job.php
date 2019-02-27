 <style>
	 
@media (min-width: 768px) and (max-width: 1024px) {
	
.input-group {

    width: 100% !important;  
}
}
@media (min-width: 328px) and (max-width: 650px) {
	
.input-group {

    width: 100%;
}
.listing-type {
	
    left: 10px !imporant;
}
}
#usa-map
{
color:#000;	
}
 .sectionpt130px .form-wrap{  background: rgba(255, 255, 255, 0.14);
    padding: 20px;
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
	    width: 200px;

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
  
.margin-ten-bottom
{
	    margin-bottom: 0;
}
.chosen-container-single .chosen-single div b
{
	    display: none !important;
	}

 
.input-group .plsholdcol::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #ffffff;
    opacity: 1; /* Firefox */
}

.input-group .plsholdcol:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #ffffff;
}

.input-group .plsholdcol::-ms-input-placeholder { /* Microsoft Edge */
    color: #ffffff;
}
.input-group input.plsholdcol:hover {
    background-color: #f56733;
        color: #fff;

}
 .input-group input.plsholdcol:active {
	    color: #000;
    background-color: #f7f7f7;
}

</style>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/job/green.css" id="colors">
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
            $('html,body').animate({scrollTop: $(".homecontent").offset().top},'slow');
            });
            
         </script>
      </div>
   </div>
</section>
<div class="container " id="messagewindow">
<div class="row">
    <div class="col-md-12 homecontent">
       
        <?php if(!empty($fullstate)){ ?>
        <h2 class="headh2">FIND JOBS BY <?php echo $fullstate; ?></h2>
        <?php } ?>
        <!-- -- -- -- ---  - - MAP SECTION complete- -- -- --- -- - - -->
        <div class="">
            <h2 class="headh2">JOBS </h2>
            <div class=" ">
                <!-- Recent Jobs -->
                <div class="findjobstop eleven columns">
                    <div class="">
                        <div class="listings-container">
                            <ul class="list-group">
                                <?php  if(!empty($get_postjoball)){ foreach($get_postjoball as $get_postjoballval)
                                    {  
										$check_bidjob = $this->postjob_model->check_bidjob($get_postjoballval->po_id,$get_postjoballval->company_userid);
										                                    	                                   	
                                    $check_awardedjob = $this->postjob_model->check_awardedjob($get_postjoballval->po_id,$get_postjoballval->company_userid);
                                    	 ?>
                               
                                <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse">
                                    <a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" class="listing full-time">
                                        <div class="listing-title">
                                            <h4><?php echo  substr($get_postjoballval->job_title,0,90).'....'; ?></h4>  <?php
                                              if(!empty($get_postjoballval->umstatus) && $get_postjoballval->jobemergency == 1 && $get_postjoballval->job_status != 3 && $get_postjoballval->umstatus != 2){  ?>
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
                                                    
                                                    else{
														?>
														
														   <div class="pull-right listing-date new">
														<?php 
															$date=date_create($get_postjoballval->posteddate);
															date_add($date,date_interval_create_from_date_string("21 days"));
															$c_dat = date_format($date,"M d, Y H:i:s A");
															?>
                                                        <span class="fa fa-clock-o"></span>
                                                        <span id="demo_<?php echo $get_postjoballval->po_id; ?>" class="demopo" data-demopoid="<?php echo $c_dat; ?>"></span>
                                                  
                                                   </div>
														<?php
														
														
														}  
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
                                            <p><?php echo substr($get_postjoballval->highleveljobdesc,0,100).'....'; ?></p>
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
            </div>
        </div>
    </div>
</div>
		


<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<script>
$(document).ready(function() {
	
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
    console.log(distance);
if (distance > 0) {
  // Display the result in the element with id="demo"
  document.getElementById(proid).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

}
 else
  {
       clearInterval(x);
       document.getElementById(proid).innerHTML = "EXPIRED";
      jQuery.ajax({
		url : '<?php echo $base_url?>bids/expired',
		type: 'POST',
		data:{ proid : proid },
		success:function(data){
			if(data == 'false')
			{
			
			}
			else
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
  $(".headerexpendcoll1").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
			$('.headerexpendcoll1>span').empty();
            //change text based on condition
             $content.is(":visible") ? $('.headerexpendcoll1>span').append("<i class='fa fa-minus'></i>") : $('.headerexpendcoll1>span').append("<i class='fa fa-plus'></i>");
        });
       });   });
 $(".headerexpendcoll2").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        $header.text(function () {
			$('.headerexpendcoll2>span').empty();
            //change text based on condition
             $content.is(":visible") ? $('.headerexpendcoll2>span').append("<i class='fa fa-minus'></i>") : $('.headerexpendcoll2>span').append("<i class='fa fa-plus'></i>");
        });
     
     });  });
   $(".headerexpendcoll3").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {   
        $header.text(function () {
			$('.headerexpendcoll3>span').empty();
            //change text based on condition
             $content.is(":visible") ? $('.headerexpendcoll3>span').append("<i class='fa fa-minus'></i>") : $('.headerexpendcoll3>span').append("<i class='fa fa-plus'></i>");
        });
     
     
     });  });
   $(".headerexpendcoll4").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {   
        $header.text(function () {
			$('.headerexpendcoll4>span').empty();
            //change text based on condition
             $content.is(":visible") ? $('.headerexpendcoll4>span').append("<i class='fa fa-minus'></i>") : $('.headerexpendcoll4>span').append("<i class='fa fa-plus'></i>");
        });
   });  
   });
   $(".headerexpendcoll5").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () { 
        $header.text(function () {
			$('.headerexpendcoll5>span').empty();
            //change text based on condition
             $content.is(":visible") ? $('.headerexpendcoll5>span').append("<i class='fa fa-minus'></i>") : $('.headerexpendcoll5>span').append("<i class='fa fa-plus'></i>");
        });
    });

});

</script>
