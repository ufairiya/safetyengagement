 <style>

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
  

      <div class="">
                                   <h2 class="headh2">JOBS </h2>

        <div class="">
         
          <div class="col-md-8 ">
	
	<!-- Recent Jobs -->
	<div class="findjobstop eleven columns">
	<div class="padding-right">
		<div class="listings-container">
			
          <ul class="list-group">
          </ul>
          </div>
		</div>
	</div>
	


</div>
       <!-- Widgets -->
	<div class="col-md-4 five columns">

		<!-- Sort by -->
	
<!--
		<div class="widget">
			<h4>Date</h4>

			<select data-placeholder="Choose Category" class="chosen-select-no-single">
				<option selected="selected" value="recent">Newest</option>
				<option value="oldest">Oldest</option>
				<option value="expiry">Expiring Soon</option>
				<option value="ratehigh">Hourly Rate – Highest First</option>
				<option value="ratelow">Hourly Rate – Lowest First</option>
			</select>

		</div>

-->
		<div class="widget">
			<h4>Date</h4>

			<!-- Select -->
					<input id="booking-date" class="booking-date" type="text" data-large-mode="true" data-large-default="true" name="booking-date" value="" >
		</div>

	 
	<!-- Job Type -->
		   
		<div class="widget">
			 <div class="headerexpendcoll1"><h4 class="pull-left">Job Type</h4>
			 <span class="pull-right expcoll"><i class="fa fa-minus"></i>
			</span></div>

			<ul class="checkboxes">
				<li>
					<input id="check-1" type="checkbox" name="check" value="check-1" checked>
					<label for="check-1">Any Type</label>
				</li>
				
				<li>
					<input id="check-3" type="checkbox" name="check" value="check-3">
					<label for="check-3">Contract <span>(269)</span></label>
				</li>
				<li>
					<input id="check-4" type="checkbox" name="check" value="check-4">
					<label for="check-4">Internship <span>(46)</span></label>
				</li>
				<li>
					<input id="check-5" type="checkbox" name="check" value="check-5">
					<label for="check-5">Temporary <span>(119)</span></label>
				</li>
				<li>
					<input id="check-5" type="checkbox" name="check" value="check-5">
					<label for="check-5">Others <span>(500)</span></label>
				</li>
			</ul>

		</div>

		<!-- Rate/Hr -->
		<div class="widget">
			<div class="headerexpendcoll2"><h4 class="pull-left">Budget</h4>
			 <span class="pull-right expcoll"><i class="fa fa-plus"></i>
			</span></div>

			<ul class="checkboxes" style="display: none;">
				<li>
					<input id="check-6" type="checkbox" name="check" value="check-6" checked>
					<label for="check-6">Any Rate</label>
				</li>
				<li>
					<input id="check-7" type="checkbox" name="check" value="check-7">
					<label for="check-7">$0 - $25 <span>(231)</span></label>
				</li>
				<li>
					<input id="check-8" type="checkbox" name="check" value="check-8">
					<label for="check-8">$25 - $50 <span>(297)</span></label>
				</li>
				<li>
					<input id="check-9" type="checkbox" name="check" value="check-9">
					<label for="check-9">$50 - $100 <span>(78)</span></label>
				</li>
				<li>
					<input id="check-10" type="checkbox" name="check" value="check-10">
					<label for="check-10">$100 - $200 <span>(98)</span></label>
				</li>
				<li>
					<input id="check-11" type="checkbox" name="check" value="check-11">
					<label for="check-11">$200+ <span>(21)</span></label>
				</li>
			</ul>

		</div>
		<!-- Rate/Hr -->
		<div class="widget">
		 <div class="headerexpendcoll3"><h4 class="pull-left">Industry</h4>
			 <span class="pull-right expcoll"><i class="fa fa-plus"></i>
			</span></div>
			<ul class="checkboxes" style="display: none;">
				<li>
					<input id="check-6" type="checkbox" name="check" value="check-6" checked>
					<label for="check-6">Any Rate</label>
				</li>
				<li>
					<input id="check-7" type="checkbox" name="check" value="check-7">
					<label for="check-7">$0 - $25 <span>(231)</span></label>
				</li>
				<li>
					<input id="check-8" type="checkbox" name="check" value="check-8">
					<label for="check-8">$25 - $50 <span>(297)</span></label>
				</li>
				<li>
					<input id="check-9" type="checkbox" name="check" value="check-9">
					<label for="check-9">$50 - $100 <span>(78)</span></label>
				</li>
				<li>
					<input id="check-10" type="checkbox" name="check" value="check-10">
					<label for="check-10">$100 - $200 <span>(98)</span></label>
				</li>
				<li>
					<input id="check-11" type="checkbox" name="check" value="check-11">
					<label for="check-11">$200+ <span>(21)</span></label>
				</li>
			</ul>

		</div>

		<div class="widget">
		 <div class="headerexpendcoll4"><h4 class="pull-left">Work Type</h4>
			 <span class="pull-right expcoll"><i class="fa fa-plus"></i>
			</span></div>
			<ul class="checkboxes" style="display: none;">
				<li>
					<input id="check-6" type="checkbox" name="check" value="check-6" checked>
					<label for="check-6">Any Work Type</label>
				</li>
				<li>
					<input id="check-7" type="checkbox" name="check" value="check-7">
					<label for="check-7">Safety <span>(231)</span></label>
				</li>
				<li>
					<input id="check-8" type="checkbox" name="check" value="check-8">
					<label for="check-8">Environmental<span>(297)</span></label>
				</li>
				<li>
					<input id="check-9" type="checkbox" name="check" value="check-9">
					<label for="check-9">Rental<span>(78)</span></label>
				</li>
				<li>
					<input id="check-10" type="checkbox" name="check" value="check-10">
					<label for="check-10">Others <span>(98)</span></label>
				</li>
				
			</ul>

		</div>

		<div class="widget">
		 <div class="headerexpendcoll5"><h4 class="pull-left">Experience Level</h4>
			 <span class="pull-right expcoll"><i class="fa fa-plus"></i>
			</span></div>
			<ul class="checkboxes" style="display: none;">

				<li>
					<input id="check-6" type="checkbox" name="check" value="check-6" checked>
					<label for="check-6">Any Experience Level</label>
				</li>
				<li>
					<input id="check-7" type="checkbox" name="check" value="check-7">
					<label for="check-7">Expert level<span>(231)</span></label>
				</li>
				<li>
					<input id="check-8" type="checkbox" name="check" value="check-8">
					<label for="check-8">Mid level <span>(297)</span></label>
				</li>
				<li>
					<input id="check-9" type="checkbox" name="check" value="check-9">
					<label for="check-9"> Entry level <span>(78)</span></label>
				</li>
				
			</ul>

		</div>



	</div>
	<!-- Widgets / End --> </div>
      </div>
  </div>
</div>


		


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/pagin/paginathing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    for (var i = 1; i <= 150; i++) {
      $('.list-group').append('<li class="list-group-item featured job-result-item" data-disciplines="corporate-hse"><a href="#" class="listing full-time"><div class="listing-title"><h4>Marketing Coordinator - SEO / SEM Experience <span class="listing-type">Emergency-Jobs</span></h4><button type="button" class="appybtn btn btn-warning waves-effect waves-light">Apply</button><ul class="listing-icons"><li><i class="ln ln-icon-Management"></i> King</li><li><i class="ln ln-icon-Map2"></i> Sydney</li><li><i class="ln ln-icon-Money-2"></i> $5000 - $7000</li><li><div class="listing-date new">new</div></li></ul></div></a></li>');
    }

    $('.list-group').paginathing({
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
