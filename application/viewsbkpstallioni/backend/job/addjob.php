<?php global $mobile_country_code,$singapour_country;?>
<div class="dashboard-content">
	<div class="">
	<div class="row">
		<div class="col-lg-12 col-md-12 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>Job Management</h2>
				</div>
			</div>
		</div>
<style>
.job-form input[type="file"]
{
color: #000;
}
</style>
<div class="wrapper">
   <section class="job-form">
      <header class="job-form__header">
         <h1 class="job-form__title">Get your Job Done!</h1>
         <p class="job-form__text">Post a Job for Free - Start receiving proposals within minutes</p>
      </header>
      <form id="post_a_job" action="<?php echo $base_url?>admin/job/save_post_job" name="post_a_job" enctype="multipart/form-data" method="POST" >
         <!--
            <form id="post_a_job" action="#" name="post_a_job" enctype="multipart/form-data" method="POST" >
            -->
					 <div class="job-form__box">
            <div class="job-form__list">
               <div>	
				     <label for="done" class="job-form__list__label">Company Users <span class="redman">*</span></label>
				   <select name="companyid" id="companyid" class="compid job-form__list__select">
						 <option value="">--Please Choose an Option--</option>
						 <?php
						  $get_companyid = $this->users_model->get_usermastercompany();
						 foreach($get_companyid as $get_companyidval)
						 { ?>
							 <option value="<?php echo $get_companyidval->id_user_master ; ?>"><?php echo $get_companyidval->first_name ; ?></option>
						 <?php
						 }
						 ?>
                       </select> 
                       </div>
                      </div>
                    </div>
         <div class="job-form__box">
            <div class="job-form__list">
               <div>
                  <label for="done" class="job-form__list__label">Job Title <span class="redman">*</span></label>
					<input type="text" name="job_title" id="job_title" value="" class="job-form__list__input" >
               </div>
               <div>
                  <label for="done" class="job-form__list__label">High Level job description  <span class="redman">*</span></label>
                  <textarea rows="4" cols="50" name="highleveljobdesc" id="highleveljobdesc" class="job-form__list__textarea error"></textarea>
               </div>
              
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Detailed Job deliverables (what is the task and what deliverables do you require)<span class="redman">*</span></label>
                  <textarea rows="4" cols="50" name="job_description" id="job_description" class="job-form__list__textarea" ></textarea>
                  <br>
                 <input type="file" name="detailed_pic" id="detailed_pic" value="" multiple />
                                     

               </div>
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Special Equipment Required for the job (Training rooms, projectors, Air monitors, Lifts, forktrucks, other)</label>
                  <input type="text" name="equipment" id="equipment" value="" class="job-form__list__input" >

                  <br>
                      <input type="file" name="equipment_pic" id="equipment_pic" multiple />

               </div>
               
               <div>
                  <label for="job_description" class="job-form__list__label">Is a final Report required</label>
                   <input type="text" name="finalrep" id="finalrep" value="" class="job-form__list__input" >
                  <br>
                   <input type="file" name="finalrep_pic" id="finalrep_pic" multiple />

               </div>
               
              

            <div class="job-form__budget">
<!--
				 <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">Job Information<span class="redman">*</span></label>
                  <input type="text" id="information" name="information" value="" class="job-form__list__input job-form__budget__input">
               </div>
--> 			 <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">Zip Code<span class="redman">*</span></label>
                  <input type="text" id="zipcode" name="zipcode" value="" class="job-form__list__input job-form__budget__input">
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">City<span class="redman">*</span></label>
                  <input type="text" id="city" name="city" value="" class="job-form__list__input job-form__budget__input" readonly>
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">State<span class="redman">*</span></label>
<!--
                                    <input type="text" id="state" name="state" value="" class="job-form__list__input job-form__budget__input">
-->

                  <select readonly="readonly" id="state" name="state" value="" class="job-form__list__input job-form__budget__input">
	<option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="DistrictofColumbia">District Of Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="NewHampshire">New Hampshire</option>
	<option value="NewJersey">New Jersey</option>
	<option value="NewMexico">New Mexico</option>
	<option value="NewYork">New York</option>
	<option value="NorthCarolina">North Carolina</option>
	<option value="NorthDakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="RhodeIsland">Rhode Island</option>
	<option value="SouthCarolina">South Carolina</option>
	<option value="SouthDakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia">Virginia</option>
	<option value="Washington">Washington</option>
	<option value="WestVirginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
</select>
<!--
                  <input type="text" id="state" name="state" value="" class="job-form__list__input job-form__budget__input">
-->
               </div>
             
              
            </div>
            

               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Industry</label>
               
                     
                     <select name="se_industry" id="industry" class="industrysel job-form__list__select">
						 <option value="">--Please Choose an Option--</option>
						 <?php
						  $get_industrys = $this->postjob_model->get_industry();
						 foreach($get_industrys as $get_industry)
						 { ?>
							 <option value="<?php echo $get_industry->industry_name ; ?>"><?php echo $get_industry->industry_name ; ?></option>
						 <?php
						 }
						 ?>
                        <option value="other">Other</option>
                       
                     </select> 
                      
                     <input type="text" id="industryinp"  name="industry" class="job-form__list__input job-form__budget__input valid industryinp" style="display:none; width:90%" /><span id="removeindustry" class="removeindustry" style="display:none;">X</span>
                  </div>
                  <div class="job-form__list__box1">
                      <div class="certificates-div">
                  <h2 class="certificate_title">Is this only for students</h2>
                  <div class="">
                     <input type="checkbox" id="internship" name="internship" value="internship">
                     <label for="budget" class="checkbox-titles">Internship/Co-op Only</label>
                  </div>
               </div> 
                  </div>
               </div>

<div>
                  <label for="job_description" class="job-form__list__label">Project Files: Prints, Pictures, Quotes, Links, documents, specifications or proposals can be attached Here</label>
                   <input type="text" name="project" id="project" value="" class="job-form__list__input" >
                  <br>
                                       <input type="file" name="project_pic" id="project_pic" multiple />

               </div>
               
               
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Start date Needed (calendar)  End Date:<span class="redman">*</span></label>
                   <span class="starterr"> <input type="date" name="start_date" id="start_date" value="" class="job-form__list__input" ></span>
                      <span class="enderr">  <input type="date" name="end_date" id="end_date" value="" class="job-form__list__input" ></span>
                  </div>
                  <div class="job-form__list__box1 emergency">
                      <label for="Industry" class="job-form__list__label">Job is an emergency Job: (needs filled in less than 48 hours)<span class="redman">*</span></label>
                    <div class="jobemgerr"> <label><input type="radio" name="jobemergency" id="jobemergency" value="1" class="" >Yes</label>
                     <label> <input type="radio" name="jobemergency" id="jobemergency" value="2" class="" checked>No </label></div>
               </div> 
                  </div>
                   <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Job Location: <span class="redman">*</span></label>
                      <select id="stateloc" name="joblocation"  id="joblocation" class="job-form__list__input job-form__budget__input">
	<option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="DistrictofColumbia">District Of Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="NewHampshire">New Hampshire</option>
	<option value="NewJersey">New Jersey</option>
	<option value="NewMexico">New Mexico</option>
	<option value="NewYork">New York</option>
	<option value="NorthCarolina">North Carolina</option>
	<option value="NorthDakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="RhodeIsland">Rhode Island</option>
	<option value="SouthCarolina">South Carolina</option>
	<option value="SouthDakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia">Virginia</option>
	<option value="Washington">Washington</option>
	<option value="WestVirginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
</select>

                  </div>
           
                  </div>
              
               </div>
               
                <div class="job-form__upload form-job">
                  <h3 class="job-form__upload__title">Work Type Specific Safety Qualifications and Experience you Require for this Job</h3>
                  <div class="copy-wrapper">
                     <div class="copy">
                        <input class="file-upload-input file-input" name="job_file[]" type="file">
                        <textarea rows="4" cols="50" name="worktype_desc[]" id="worktype_desc" class="job-form__list__textarea file-text-area" ></textarea>
                        <br>
                     </div>
                  </div>
                  <input type="button" value="Add more files" class="btndesign" id="add_uploaddesc" >
               </div>
               <div class="job-form__upload" style="display:none;">
                  <div class="job-form__upload__box" <!-- onclick="document.getElementById('hide').click()"-->>
                     <input type="file" name="job_image" id="hide" onchange="$('.file_description_div').show()">
                     <p class="job-form__upload__text"><span class="job-form__upload__link">Browse</span> to add attachments</p>
                  </div> </div>
             
         
           <label for="budget" class="job-form__list__label">Experience Level Required for the job</label>

 <div class="job-form__budget">
				 <div class="job-form__budget__box3 box3">
                  <label for="explevel1" class="job-form__list__label">Experience Level</label>
                 <input type="radio" name="explevel1" value="Experience" checked> 
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="explevel2" class="job-form__list__label">Intermediate Level</label>
                 <input type="radio" name="explevel1" value="Intermediate" >
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="explevel3" class="job-form__list__label">Expert Level</label>
                 <input type="radio" name="explevel1" value="Expert" > 
               </div>
               
              
            </div>
             <label for="budget" class="job-form__list__label"><h2>Additional Job Requirements</h2></label>
           <div class="chk_std" >
			   <label for="budget" class="job-form__list__label">Contractor 3rd Party Approval Requirements</label>  
             <div class="job-form__budget">
				

				 <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">Avetta</label>           
                 <input type="radio" name="thirdpartapprov" value="1" checked> 
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">Browz</label>
                 <input type="radio" name="thirdpartapprov" value="2" >
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">ISNetWorld</label>
                 <input type="radio" name="thirdpartapprov" value="3" > 
               </div>
                <div class="job-form__budget__box3 box3">
                  <label for="thirdpartapprov" class="job-form__list__label">other</label>
                 <input type="radio" id="chkother" name="thirdpartapprov" value="4" >
<div id="dvother" style="display: none">
    <input type="text" id="txtPassportNumber" name ="othertxt" />
</div> 
               </div>


              
            </div>			  <div class="requ3partap" ><label for="budget" class="job-form__list__label">  upload files</label>
            <label><input type="radio" name="job3party" id="job3party" value="1" class="" checked >Yes</label>
                     <label> <input type="radio" name="job3party" id="job3party" value="2" class="">No </label></div> 
            <input type="file" name="certificates_pic" id="certificates_pic">
</div>  
            <div class="job-form__upload chk_std">
               <h3 class="job-form__upload__title">Liability Insurance Requirements</h3>
                 <input type="text" name="insurance" id="insurance" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
				   <div class="requinsu" > <label for="budget" class="job-form__list__label"> upload files</label>
				   <label><input type="radio" name="jobinsurence"  id="jobinsurence" value="1" class=""  checked >Yes</label>
                     <label> <input type="radio" name="jobinsurence" id="jobinsurence" value="2" class="">No </label>
                     </div> 
                     
                  <input type="file" name="insurance_certificate" id="insurance_certificate">
                  
               </div>
            </div>
             <div class="job-form__upload">
               <h3 class="job-form__upload__title">Budget (pay by the hour or fixed price)<span class="redman">*</span></h3>
               <label><input type="radio" name="hourorfix" id="hourorfix" value="hour"  class="">Hour price</label>
               <label><input type="radio" name="hourorfix" id="hourorfix" value="fixed" class="">Fixed price</label>

                 <input type="text" name="budget" id="budget" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
                  <input type="file" name="budget_img" id="budget_img" />
                  
               </div>
            </div>
<!--
                  <section class="experience">
            <h2 class="experience__title">Experience Level</h2>
            <div class="experience__row">
               <div class="experience__box selected" id="entry">
                  <h3 class="experience__box__title">Entry</h3>
                  <div class="experience__box--inside">
                     <p class="experience__box__text">Freelancers with lower rates and less experience</p>
                     <p class="experience__box__money">$</p>
                     <input type="radio" name="experience_level" value="entry" class="entry" checked="">
                  </div>
               </div>
               <div class="experience__box" id="intermediate">
                  <h3 class="experience__box__title">Intermediate</h3>
                  <div class="experience__box--inside">
                     <p class="experience__box__text">Freelancers with average rates and experience
                     </p>
                     <p class="experience__box__money">$$</p>
                     <input type="radio" name="experience_level" value="intermediate" class="intermediate">
                  </div>
               </div>
               <div class="experience__box" id="expert">
                  <h3 class="experience__box__title">Expert</h3>
                  <div class="experience__box--inside">
                     <p class="experience__box__text">Freelancers with higher rates and more experience
                     </p>
                     <p class="experience__box__money">$$$</p>
                     <input type="radio" name="experience_level" value="expert" class="expert">
                  </div>
               </div>
            </div>
         </section>
-->
         
            <div class="jobs_submit_button">
            <input type="submit" name="submit_job" value="Submit Your Job" class="btndesign" id="submit_job">               
         </div>
         </div>
         

         
      </form>
   </section>
   <article class="useful-article">
      <h3 class="useful-article__title">Useful Tips</h3>
      <p class="useful-article__text">1. Describe your Job in as much detail as you can comfortably
         reveal - it will increase the quality of proposals you receive and shorten the selection process.
      </p>
      <p class="useful-article__text">2. Upload as much relevant information (pictures, documents,specifications, links, etc) as possible to get a realistic quote.
      </p>
      <p class="useful-article__text">3. Match the experience level to your requirements – remember, you’re looking for the best you can afford, not the cheapest you can get.
      </p>
   </article>
</div></div></div>
<style>
.removeindustry {
    border: 1px solid black;
    padding: 12px;
        color: #000;
        cursor:pointer;
}
.starterr{
	display: table;
    float: left;
}
.starterr #start_date {
    width: 100%;
    float: left;
}
.enderr #end_date {
    color: #808080;
    width: 100%;
    float: left;
}
.enderr{
	display: table;
    float: left;
}
.emergency {    
	    background: rgba(243, 90, 1, 0.40);
    padding: 5px 15px
    }
.emergency label {color: red}
.jobemgerr label {color: #000}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&callback=initMap">
    </script>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jobregform.css" type="text/css">

<script type="text/javascript">
    $(function () {
       
        $('input[name="thirdpartapprov"]').on('click', function() {
        if ($(this).val() == '4') {
            $('#dvother').show();
        }
        else {
            $('#dvother').hide();
        }
    });
    });
</script>


<script type="text/javascript">
   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('#add_uploaddesc'); //Add button selector
       var wrapper = $('.copy-wrapper'); //Input field wrapper
       var fieldHTML = '<div class="copy-wrapper"><div class="copy"><input class="file-upload-input file-input" name="job_file[]" type="file"><textarea rows="4" cols="50" name="file_description[]" id="file_description" class="job-form__list__textarea file-text-area" placeholder=""></textarea><br></div></div>'; //New input field html 
       var x = 1; //Initial field counter is 1
       $(addButton).click(function(){
   		//alert('sfdf'); //Once add button is clicked
           if(x < maxField){ //Check maximum number of input fields
               x++; //Increment field counter
               $(wrapper).append(fieldHTML); // Add field html
           }
       });
       $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
           e.preventDefault();
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
       
       
   });  
   
   		
   		$('.experience__box').click(function(){
   			
   			var boxid = $(this).attr('id');
   			
   			$('.experience__box').each(function(){
   				
   				$(this).removeClass('selected');
   				
   			});
   			
   			$(this).addClass('selected');
   			
   			$('.'+boxid).prop('checked', true);
   			
   		});
   		
   		//~ $('#submit_job').click(function() border: 1px solid black;
   	//~ {
   		
   		
   		//~ var form1 = $('#post_a_job');
   		//~ var error1 = $('.alert-danger', form1);
   		//~ var success1 = $('.alert-success', form1);
   
           //~ form1.validate({
               //~ errorElement: 'span', //default input error message container
               //~ errorClass: 'help-block help-block-error', // default input error message class
               //~ focusInvalid: false, // do not focus the last invalid input
               //~ ignore: "", // validate all fields including form hidden input
               //~ messages: {              
                  
   				 //~ 'job_title': {
                       //~ required: 'Job Title is required',
   					
   					 
   					
                   //~ },
   				
   				
   				 //~ 'txt_email': {
                       //~ required: 'Email is required',
   					//~ email: 'Invalid Email',
   					//~ remote : "Email is already registered"
                   //~ },
   				 
   				 //~ 'txt_password': {
                       //~ required: 'Password is required',
                        //~ minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),					
                   //~ },
   			 //~ 'txt_confirm_password': {
                      //~ required: "Confirm password required",
                      //~ minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),	
                      //~ equalTo: "Entry does not match with password",
   			   //~ },
   				 //~ 'txt_utype': {
                       //~ required: 'Please Enter the user type',
                   //~ },
           
   	
            
               //~ },
               //~ rules: {
               //~ job_title: {
                       //~ required: true,
                     
                   //~ },
                    
                   //~ txt_confirm_password : {
   			//~ required: true,
   			 //~ minlength: 8,
                  //~ equalTo : "#txt_password",
                   //~ }
         
   
               //~ },
   
               //~ highlight: function(element) { // hightlight error inputs
                   //~ $(element)
                       //~ .closest('.form-group').addClass('has-error'); // set error class to the control group
               //~ },
   
               //~ unhighlight: function(element) { // revert the change done by hightlight
                   //~ $(element)
                       //~ .closest('.form-group').removeClass('has-error'); // set error class to the control group
               //~ },
   
               //~ success: function(label) {
                   //~ label
                       //~ .closest('.form-group').removeClass('has-error'); // set success class to the control group
               //~ },
   
               //~ submitHandler: function(form) {
      //~ $( "#submit_job" ).submit();
   
   				//~ }
   			//~ });
   	//~ });
   	$(document).ready(function() {
    $("input[name$='job3party']").click(function() {
        var test = $(this).val();
		if(test == 2)
		{
        $("#certificates_pic").hide();
		}
		else
		{
		  $("#certificates_pic").show();	
		}
    });
    $("input[name$='jobinsurence']").click(function() {
        var test = $(this).val();
		if(test == 2)
		{
        $("#insurance_certificate").hide();
		}
		else
		{
		  $("#insurance_certificate").show();	
		}
    });
});
   	</script>
   	<script type="text/javascript">
$(document).ready(function () {

  $("#post_a_job").validate({
    rules: {
			job_title: "required",
			highleveljobdesc: "required",
			job_description: "required",
			information: "required",
			city: "required",
			state: "required",
			zipcode: "required",
			start_date: "required",
			end_date: "required",
			jobemergency: "required",
			joblocation: "required",
			budget: "required",
			job3party: "required",
			jobinsurence: "required",
			companyid: "required",
			
     
    
    },
    // Specify validation error messages
    messages: {
	job_title: "Please fill in this field",
	job_description:  "Please fill in this field",
	highleveljobdesc :  "Please fill in this in field",
	city:  "Please fill in this in field",
	state:  "Please fill in this field",
	zipcode:  "Please fill in this field",
	information:  "Please fill in this field",
	start_date:  "Please fill in this field",
	end_date:  "Please fill in this field",
	jobemergency:  "Please choose one",
	joblocation:  "Please fill in this field",
	budget:  "Please fill in this field",
	job3party:  "Please fill in this field",
	jobinsurence:  "Please fill in this field",
	companyid:  "Please fill in this field",
    },
 errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.requ3partap').after() );
            }
             else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.requinsu').after() );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.jobemgerr').after() );
            }
            else 
            { 
                error.insertAfter( element );
            }
           
         },
    submitHandler: function(form) {
	
      form.submit();
    }
  });
});
    
</script>
<script>
  function setfilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
    document.getElementById("uploadFile").value = fileName;
  }
</script>
<!--
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#joblocation")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                //console.log(place.address_components);
            });
        </script>
-->
	<script type='text/javascript'>
		   $("#internship").change(function() {
   	       $('.chk_std').show();
   
       if(this.checked) {
          $('.chk_std').hide();
       }
       else
       {
   			       $('.chk_std').show();
   
   		}
   });
   
   $('.removeindustry').click(function() {
	       $('select.industrysel option:nth-child(1)').prop("selected", true);


	   $('.removeindustry').hide();
        $('.industryinp').hide();
        $('.industrysel').show();
   });
   $('#industry').change(function() {
    if($(this).val() == 'other')
    {
        $('.removeindustry').show();
        $('.industryinp').show();
        $('.industrysel').hide();
  
	}
    else{
        $('.removeindustry').hide();
        $('.industryinp').hide();
        $('.industrysel').show();
    

        } });
 $( document ).ready(function() {
    $.support.cors = true;
    $.ajaxSetup({ cache: false });
    var city = '';
    var hascity = 0;
    var hassub = 0;
    var state = '';
    var nbhd = '';
    var subloc = '';
 
    $('#zipcode').keyup(function() {
      $zval = $('#zipcode').val();
 
      if($zval.length == 5){
         $jCSval = getCityState($zval, true); 
      }
    });
  
  function getCityState($zip, $blnUSA) {
 var date = new Date();
 $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $zip + '&key=AIzaSyBSozVGtc8_fEpHPr9F0IGG7cxH5Wlv44Y&type=json&_=' + date.getTime(), function(response){
         //find the city and state
 var address_components = response.results[0].address_components;
 $.each(address_components, function(index, component){
 var types = component.types;
 $.each(types, function(index, type){
 if(type == 'locality') {
   city = component.long_name;
   hascity = 1;
 }
 if(type == 'administrative_area_level_1') {
   state = component.long_name;
 }
 if(type == 'neighborhood') {
   nbhd = component.long_name;
 }
 if(type == 'sublocality') {
   subloc = component.long_name;
   hassub = 1;
 }
 });
 });
 
 //pre-fill the city and state
        if(hascity == 1){
 $('#city').val(city);
        } else if(hassub == 1) {
            $('#city').val(subloc);
        } else {
     $('#city').val(nbhd);
 }
 //~ $('#state').val(state);
 var statetr =state.replace(/ /g,'');


 $('#state').val(statetr).trigger('change');
 $('#stateloc').val(statetr).trigger('change');

   //reset
 var hascity = 0;
 var hassub = 0;
    });
  }
});
</script>


		