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
  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Manage Jobs( 1 )</h4>
                                  <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-group">
												 
												 <?php foreach($get_postjoball as $get_postjoballval)
			{ ?>
			  <li class="col-md-12 list-group-item featured job-result-item" data-disciplines="corporate-hse"><section class="sell__section__row"><div class="col-md-12 sell__section__row__list">	<h5 class="pull-left sell__section__row__title"><a href="#" title="I need dot training next week"><?php echo$get_postjoballval->job_title; ?></a></h5><p class="pull-right sell__section__row__text"><?php echo $get_postjoballval->budget; ?><span class="sell__section__row__span">(Fixed price)</span></p></div><div class="col-md-12 sell__section__row__list"><div class=" sell__section__row__list__child"><div class="sell__section__row__list__child__note"><i class="fa fa-clock-o"></i><span>8 months ago</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-map-marker"></i><span><?php echo$get_postjoballval->joblocation; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-building"></i> &nbsp;&nbsp;<span><?php echo $get_postjoballval->weblink; ?></span></div><div class="sell__section__row__list__child__note"><i class="fa fa-dot-circle-o"></i><span>Proposal  1</span></div><div class="sell__section__row__list__child__note"><i class="fa fa-heart"></i><span>10</span></div></div><div class="sell__section__row__list__child"> <form class="pull-left  form-146" method="post" action="#"><input type="hidden" name="post" value="146"></form><a href="<?php echo $base_url; ?>job/edit_postjobs/<?php echo $get_postjoballval->po_id; ?>"  title="I need dot training next week" class="pull-right sell__section__row__list__button">Edit Job</a></div></div></section></li>
			  <?php } ?> 
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         


  <div id="events" class="tab-pane">
                                 <h4 class="headtitbid">Expirted Jobs ( 2 )</h4>
                               
                                 <div id="subpro" class="active" style="display: block;">
                                    <div class="eleven columns">
                                       <div class="">
                                          <div class="listings-container">
                                             <ul class="list-group">
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
