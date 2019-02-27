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
      <form id="post_a_job" action="<?php echo $base_url?>job/save_post_job" name="post_a_job" enctype="multipart/form-data" method="POST" >
         <!--
            <form id="post_a_job" action="#" name="post_a_job" enctype="multipart/form-data" method="POST" >
            -->
         <div class="job-form__box">
            <div class="job-form__list">
               <div>
                  <label for="done" class="job-form__list__label">Job Title</label>
					<input type="text" name="job_title" id="job_title" value="" class="job-form__list__input" placeholder="Jobs title">
               </div>
               <div>
                  <label for="done" class="job-form__list__label">High Level job description</label>
                  <textarea name="highleveljobdesc" id="highleveljobdesc" value="" class="job-form__list__input" ></textarea>
               </div>
              
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Detailed Job deliverables (what is the task and what deliverables do you require)</label>
                  <textarea rows="4" cols="50" name="job_description" id="job_description" class="job-form__list__textarea" placeholder="Provide a more detailed description to help you get better proposals"></textarea>
                  <br>
                                       <input type="file" name="detailed_pic" id="detailed_pic" value="" multiple />
                                     

               </div>
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Special Equipment Required for the job (Training rooms, projectors, Air monitors, Lifts, forktrucks, other)</label>
                  <input type="text" name="equipment" id="equipment" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">

                  <br>
                                       <input type="file" name="equipment_pic" id="equipment_pic" multiple />

               </div>
               
               <div>
                  <label for="job_description" class="job-form__list__label">Is a final Report required</label>
                   <input type="text" name="finalrep" id="finalrep" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                  <br>
                                       <input type="file" name="finalrep_pic" id="finalrep_pic" multiple />

               </div>
               
              

            <div class="job-form__budget">
				 <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">Job Information</label>
                  <input type="text" id="information" name="information" value="" class="job-form__list__input job-form__budget__input">
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">City</label>
                  <input type="text" id="city" name="city" value="" class="job-form__list__input job-form__budget__input">
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">State</label>
                  <input type="text" id="state" name="state" value="" class="job-form__list__input job-form__budget__input">
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">Zip Code</label>
                  <input type="text" id="zipcode" name="zipcode" value="" class="job-form__list__input job-form__budget__input">
               </div>
              
            </div>
            

               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Industry</label>
                     <select name="industry" id="industry" class="job-form__list__select">
                        <option value="18">Manufacturing</option>
                        <option value="10">Construction</option>
                        <option value="6">Oil and gas</option>
                        <option value="5">Energy</option>
                        <option value="8">College</option>
                        <option value="14">Military</option>
                        <option value="21">Paper</option>
                        <option value="16">Government</option>
                        <option value="20">Hospitals</option>
                        <option value="13">Airlines</option>
                        <option value="4">Chemical</option>
                        <option value="23">Other</option>
                       
                     </select>
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
                   <input type="text" name="project" id="project" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                  <br>
                                       <input type="file" name="project_pic" id="project_pic" multiple />

               </div>
               
               
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Start date Needed (calendar)  End Date:</label>
                     <input type="date" name="start_date" id="start_date" value="" class="job-form__list__input" >
                      <input type="date" name="end_date" id="end_date" value="" class="job-form__list__input" >
                  </div>
                  <div class="job-form__list__box1">
                      <label for="Industry" class="job-form__list__label">Job is an emergency Job: (needs filled in less than 48 hours)</label>
                     <input type="checkbox" name="jobemergency" id="jobemergency" value="1" class="">
               </div> 
                  </div>
                   <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Job Location:</label>
                     <input type="text" name="joblocation" id="joblocation" value="" class="job-form__list__input" >
                  </div>
           
                  </div>
              
               </div>
               
                <div class="job-form__upload form-job">
                  <h3 class="job-form__upload__title">Work Type (now says Pick Category) Type of safety Qualifications you require</h3>
                  <div class="copy-wrapper">
                     <div class="copy">
                        <input class="file-upload-input file-input" name="job_file[]" type="file">
                        <textarea rows="4" cols="50" name="worktype_desc[]" id="worktype_desc" class="job-form__list__textarea file-text-area" placeholder="Provide a more detailed description of your file"></textarea>
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
             
         
           <label for="budget" class="job-form__list__label">            Experience Level Required for the job
</label>

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


              
            </div>  
            <input type="file" name="certificates_pic" id="certificates_pic">
</div>  
            <div class="job-form__upload chk_std">
               <h3 class="job-form__upload__title">Liability Insurance Requirements</h3>
                 <input type="text" name="insurance" id="insurance" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
                  <input type="file" name="insurance_certificate" id="insurance_certificate">
                  
               </div>
            </div>
             <div class="job-form__upload">
               <h3 class="job-form__upload__title">Budget (pay by the hour or fixed price)</h3>
                 <input type="text" name="budget" id="budget" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
                  <input type="file" name="budget_img" id="budget_img" />
                  
               </div>
            </div>
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
</div>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jobregform.css" type="text/css">
<script type="text/javascript">
   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('#add_uploaddesc'); //Add button selector
       var wrapper = $('.copy-wrapper'); //Input field wrapper
       var fieldHTML = '<div class="copy-wrapper"><div class="copy"><input class="file-upload-input file-input" name="job_file[]" type="file"><textarea rows="4" cols="50" name="file_description[]" id="file_description" class="job-form__list__textarea file-text-area" placeholder="Provide a more detailed description of your file"></textarea><br></div></div>'; //New input field html 
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
   		
   		//~ $('#submit_job').click(function() 
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
   	</script>
   	<script type="text/javascript">
$(document).ready(function () {

  $("#post_a_job").validate({
    rules: {
		 job_title: "required",
      highleveljobdesc: "required",
   
job_description: "required",
equipment: "required",
finalrep: "required",
information: "required",
city: "required",
state: "required",
zipcode: "required",
industry: "required",
project: "required",
start_date: "required",
end_date: "required",
jobemergency: "required",
joblocation: "required",
companysite: "required",
explevel1: "required",
thirdpartapprov: "required",
insurance: "required",
budget: "required",
     
    
    },
    // Specify validation error messages
    messages: {
      job_title: "Please fill in this field",
     job_description:  "Please fill in this field",
equipment:  "Please fill in this field",
finalrep:  "Please fill in this field",
information:  "Please fill in this field",
city:  "Please fill in this in field",
state:  "Please fill in this field",
zipcode:  "Please fill in this field",
industry:  "Please fill in this field",
project:  "Please fill in this field",
start_date:  "Please fill in this field",
end_date:  "Please fill in this field",
jobemergency:  "Please fill in this field",
joblocation:  "Please fill in this field",
companysite:  "Please fill in this field",
explevel1:  "Please fill in this field",
thirdpartapprov:  "Please in fill this field",
insurance:  "Please fill in this field",
budget:  "Please fill in this field"
    },
   
    submitHandler: function(form) {
		alert('hi');
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
       $('.chk_std input').prop("disabled", true);
	   $('.chk_std').hide();
    }
    else
    {
       $('.chk_std input').prop("disabled", false);
       $('.chk_std').show();

	}
});

</script>
