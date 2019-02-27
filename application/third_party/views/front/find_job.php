 <style>
	 
@media (min-width: 768px) and (max-width: 1024px) {
	
.input-group {

    width: 100% !important;  
}
}
@media (min-width: 360px) and (max-width: 650px) {
	
.input-group {

    width: 100%;
}
.listing-type {
	
        margin-left: 20px !imporant;
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
  <div class="container">
    <div class="row">
  <div class="col-md-12 homecontent">
<!--
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
-->

  
	     <h2 class="headh2">FIND JOBS BY STATE</h2>
	<div class="container">

    <!-- Map html - add the below to your page -->
    <div class="jsmaps-wrapper" id="usa-map"></div>
    <!-- End Map html -->
  
  <div class="text-center">
										
                                 
                                       <div class="stl_pf_m">
										 	 <div class="sliderTxt">
									

      	<div class="findsecclass">  
        <form>
          <div class="">
            <div class="col-lg-2 col-md-12">
              <div class="input-group">
                <input type="text" name="job_title" placeholder="Job title or skills" class="form-control">
              </div>
            </div>
            <div class="col-lg-2 col-md-12">
              <div class="input-group">
                <input type="text" name="findindustry" placeholder="Industry" class="form-control">
              </div>
            </div>
            <div class="col-lg-2 col-md-12">
              <div class="input-group">
                	  <input type="text" name="findlocation" placeholder="Location" class="form-control">

              </div>
            </div>
            <div class="col-lg-2 col-md-12">
              <div class="input-group">
				                  <input type="text" name="findzipcode" placeholder="Zip Code" class="form-control">
          </div>   </div>
            <div class="col-md-2">
              <div class="input-btn">
                <input type="submit" class="sbutn" value="Find a Job ">
              </div>
            </div>
          </div>
        </form>
     
    </div>
										 </div>

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
  


<!-- -- -- -- ---  - - MAP SECTION complete- -- -- --- -- - - -->




   <div class="">
                                   <h2 class="headh2">JOBS </h2>

        <div class="">
         
          <div class="col-md-12 ">
	
	<!-- Recent Jobs -->
	<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			
          <ul class="list-group">
		<?php foreach($get_postjoball as $get_postjoballval)
			{ ?>
			  <li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="<?php echo $base_url; ?>bids/select_job/<?php echo $get_postjoballval->po_id; ?>" class="listing full-time"><div class="listing-title"><h4><?php echo$get_postjoballval->job_title; ?><span class="listing-type"><?php echo $get_postjoballval->jobemergency; ?></span></h4><button type="button" class="appybtn btn btn-warning waves-effect waves-light">Apply</button><ul class="listing-icons"><li><i class="fa fa-briefcase"></i> <?php echo $get_postjoballval->explevel1; ?></li><li><i class="fa fa-address-card" aria-hidden="true"></i> <?php echo $get_postjoballval->joblocation; ?></li><li><i class="fa fa-money"></i><?php echo $get_postjoballval->budget; ?></li><li><div class="listing-date new">new</div></li></ul></div></a></li>
			  <?php } ?> 
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

		


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
