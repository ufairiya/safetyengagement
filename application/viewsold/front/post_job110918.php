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
                  <label for="done" class="job-form__list__label">High Level job description</label>
                  <input type="text" name="job_title" id="job_title" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
               </div>
              
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Detailed Job Description (what is the task and what deliverables do you require)</label>
                  <textarea rows="4" cols="50" name="job_description" id="job_description" class="job-form__list__textarea" placeholder="Provide a more detailed description to help you get better proposals"></textarea>
                  <br>
                                       <input type="file" name="detailed_pic" id="detailed_pic">

               </div>
               
                 <div>
                  <label for="job_description" class="job-form__list__label">Special Equipment Required for the job (Training rooms, projectors, Air monitors, Lifts, forktrucks, other)</label>
                  <input type="text" name="equipment" id="equipment" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">

                  <br>
                                       <input type="file" name="equipment_pic" id="equipment_pic">

               </div>
               
               <div>
                  <label for="job_description" class="job-form__list__label">Is a final Report required</label>
                   <input type="text" name="final" id="final" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                  <br>
                                       <input type="file" name="final_pic" id="final_pic">

               </div>
               
               <div>
                  <label for="job_description" class="job-form__list__label">Is a final Report required</label>
                   <input type="text" name="final" id="final" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                  <br>
                                       <input type="file" name="final_pic" id="final_pic">

               </div>
<!--
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="job_category" class="job-form__list__label">Pick Category</label>
                     <select name="job_category" id="job_category" class="job-form__list__select">
                        <option value="18">Airports</option>
                        <option value="10">Cleanup Services</option>
                        <option value="6">DOT Professionals</option>
                        <option value="5">Engineering Professionals</option>
                        <option value="8">Environmental Professionals</option>
                        <option value="14">Equipment Services</option>
                        <option value="21">Government</option>
                        <option value="16">Hospitals</option>
                        <option value="20">Hotels</option>
                        <option value="13">Maintenance Services</option>
                        <option value="22">Military</option>
                        <option value="4">Mines Professionals</option>
                        <option value="23">Other</option>
                        <option value="11">Paper waste disposal</option>
                        <option value="15">Power Plant outage safety professionals</option>
                        <option value="7">Quality Control Professional</option>
                        <option value="19">Restaurant chains</option>
                        <option value="17">School systems</option>
                        <option value="12">Security Professionals</option>
                     </select>
                  </div>
                  <div class="job-form__list__box1">
                     <label for="job_subcategory" class="job-form__list__label">Subcategory</label>
                     <select name="job_subcategory" id="job_subcategory" class="job-form__list__select">
                        <option value="Temporary staffing (safety/environmental)">Temporary Staffing (safety/environmental)</option>
                        <option value="Union qualified">Union qualified</option>
                     </select>
                  </div>
               </div>
-->
             
<!--
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="job_category" class="job-form__list__label">Type of resources</label>
                     <select name="resource_type" id="resource_type" class="job-form__list__select">
                        <option value="Temporary staffing (safety/environmental)">Temporary Staffing (safety/environmental)</option>
                        <option value="Union qualified">Union qualified</option>
                        <option value="Consulting jobs, specific tasks">Consulting jobs, specific tasks</option>
                        <option value="Full time employment">Full time employment</option>
                        <option value="Senior level, mid level, entry level">Senior level, mid level, entry level</option>
                        <option value="Site project leaders">Site project leaders</option>
                        <option value="Site Superintendents">Site Superintendents</option>
                     </select>
                  </div>
                  <div class="job-form__list__box1">
                     <label for="job_category" class="job-form__list__label">Length of assignment</label>
                     <input type="text" name="length_assignment" placeholder="Length of assignment" id="length_assignment" class="job-form__list__input">
                  </div>
                  <div class="job-form__list__box1">
                     <label for="job_category" class="job-form__list__label">Numer Of Hires</label>
                     <input type="text" name="hires" id="hires" class="job-form__list__input">
                  </div>
               </div>
-->
<!--
               <div class="job-form__upload form-job">
                  <h3 class="job-form__upload__title">Upload samples and other helpful material</h3>
                  <div class="copy-wrapper">
                     <div class="copy">
                        <input class="file-upload-input file-input" name="job_file[]" type="file">
                        <textarea rows="4" cols="50" name="file_description[]" id="file_description" class="job-form__list__textarea file-text-area" placeholder="Provide a more detailed description of your file"></textarea>
                        <br>
                     </div>
                  </div>
                  <input type="button" value="Add more files" class="btndesign" id="add_uploaddesc" >
               </div>
               <div class="job-form__upload" style="display:none;">
                  <div class="job-form__upload__box" <!-- onclick="document.getElementById('hide').click()">
                     <input type="file" name="job_image" id="hide" onchange="$('.file_description_div').show()">
                     <p class="job-form__upload__text"><span class="job-form__upload__link">Browse</span> to add attachments</p>
                  </div>
               </div>
            </div>
-->
<!--
            <div class="job-form__budget">
               <div class="job-form__budget__box1">
                  <label for="type" class="job-form__list__label">Work Type</label>
                  <select name="price_type" id="price_type" class="job-form__list__select">
                     <option value="fixed">Fixed Price</option>
                     <option value="hourly">Hourly Price</option>
                  </select>
               </div>
               <div class="job-form__budget__box2">
                  <label for="currency" class="job-form__list__label">Currency</label>
                  <select name="currency" id="currency" class="job-form__list__select">
                     <option value="USD">$USD</option>
                     <option value="GBP">£GBP</option>
                  </select>
               </div>
               <div class="job-form__budget__box2">
                  <label for="currency" class="job-form__list__label">Duration</label>
                  <select name="duration" id="duration" class="job-form__list__select">
                     <option value="hours">24 Hours</option>
                     <option value="days">15/30 Days</option>
                  </select>
               </div>
               <div class="job-form__budget__box3">
                  <label for="budget" class="job-form__list__label">Budget</label>
                  <input type="text" id="budget" name="budget" value="" class="job-form__list__input job-form__budget__input">
               </div>
               <div class="job-form__budget__box3 box4">
                  <label for="budget" class="job-form__list__label">Job Location</label>
                  <input type="text" id="location" name="location" value="" class="job-form__list__input job-form__budget__input">
               </div>
            </div>
-->
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
                                       <input type="file" name="project_pic" id="project_pic">

               </div>
               
               
               <div class="job-form__list__box">
                  <div class="job-form__list__box1">
                     <label for="Industry" class="job-form__list__label">Start date Needed (calendar)  End Date:</label>
                     <input type="date" name="project" id="start_date" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                      <input type="date" name="project" id="end_date" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
                  </div>
                  <div class="job-form__list__box1">
                      <label for="Industry" class="job-form__list__label">Job is an emergency Job: (needs filled in less than 48 hours)</label>
                     <input type="text" name="project" id="project" value="" class="job-form__list__input" placeholder="e.g. I need a professional website design">
               </div> 
                  </div>
               </div>
               
                <div class="job-form__upload form-job">
                  <h3 class="job-form__upload__title">Work Type (now says Pick Category)     Type of safety Qualifications  you require</h3>
                  <div class="copy-wrapper">
                     <div class="copy">
                        <input class="file-upload-input file-input" name="job_file[]" type="file">
                        <textarea rows="4" cols="50" name="file_description[]" id="file_description" class="job-form__list__textarea file-text-area" placeholder="Provide a more detailed description of your file"></textarea>
                        <br>
                     </div>
                  </div>
                  <input type="button" value="Add more files" class="btndesign" id="add_uploaddesc" >
               </div>
               <div class="job-form__upload" style="display:none;">
                  <div class="job-form__upload__box" <!-- onclick="document.getElementById('hide').click()"-->>
                     <input type="file" name="job_image" id="hide" onchange="$('.file_description_div').show()">
                     <p class="job-form__upload__text"><span class="job-form__upload__link">Browse</span> to add attachments</p>
                  </div>
               </div>
            </div>
           <label for="budget" class="job-form__list__label">            Experience Level Required for the job
</label>

 <div class="job-form__budget">
				 <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">Experience Level</label>
                 <input type="radio" name="gender" value="male" checked> 
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">Intermediate Level</label>
                 <input type="radio" name="gender" value="male" checked>
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">Expert Level</label>
                 <input type="radio" name="gender" value="male" checked> 
               </div>
               
              
            </div>
             <label for="budget" class="job-form__list__label"><h2>Additional Job Requirements</h2></label>
             <label for="budget" class="job-form__list__label">Contractor 3rd Party Approval Requirements</label>
             <div class="job-form__budget">
				

				 <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">Avetta</label>           
                 <input type="radio" name="gender" value="male" checked> 
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">Browz</label>
                 <input type="radio" name="gender" value="male" checked>
               </div>
               <div class="job-form__budget__box3 box3">
                  <label for="budget" class="job-form__list__label">ISNetWorld</label>
                 <input type="radio" name="gender" value="male" checked> 
               </div>


              
            </div>  
            <input type="file" name="certificates_pic" id="certificates_pic">
<!--
            <div class="certificates-div">
               <h2 class="certificate_title">Contractor Approval Prequalification</h2>
               <div class="job-form__upload">
                  <h3 class="job-form__upload__title">Avetta <input type="checkbox"></h3>
                  <div class="job-form__upload__box" ">
                     <input type="file" name="avetta_certificate" id="avetta" >
                   
                  </div>
               </div>
               <div class="job-form__upload">
                  <h3 class="job-form__upload__title">Browz <input type="checkbox"> </h3>
                  <div class="job-form__upload__box">
                     <input type="file" name="isnet_certificate" id="isnet">
                    
                  </div>
               </div>
               <div class="job-form__upload">
                  <h3 class="job-form__upload__title">ISNetWorld <input type="checkbox"></h3>
                  <div class="job-form__upload__box">
                     <input type="file" name="browz_certificate" id="browz" >
                     
                  </div>
               </div>
               <br><br>
               <div class="job-form__certificates__box4">
                  <input type="text" placeholder="Write if any other" id="certified_other" name="certified_other" class="job-form__list__input job-form__budget__input">
               </div>
            </div>
            <br><br>
-->
            <div class="job-form__upload">
               <h3 class="job-form__upload__title">Liability Insurance Requirements</h3>
                 <input type="text" name="insurance" id="certificate" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
                  <input type="file" name="insurance_certificate" id="certificate_pic">
                  
               </div>
            </div>
             <div class="job-form__upload">
               <h3 class="job-form__upload__title">Budget (pay by the hour or fixed price)</h3>
                 <input type="text" name="insurance" id="certificate" class="job-form__list__input"> <br>

               <div class="job-form__upload__box" >
                  <input type="file" name="insurance_certificate" id="certificate_pic">
                  
               </div>
            </div>
            <div class="jobs_submit_button">
            <input type="submit" name="submit_job" value="Submit Your Job" class="btndesign" id="submit_job">               
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
                  <h3 class="experience__box__title">Intermediate Level</h3>
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
   		
   		$('#submit_job').click(function() 
   	{
   		
   		
   		var form1 = $('#post_a_job');
   		var error1 = $('.alert-danger', form1);
   		var success1 = $('.alert-success', form1);
   
           form1.validate({
               errorElement: 'span', //default input error message container
               errorClass: 'help-block help-block-error', // default input error message class
               focusInvalid: false, // do not focus the last invalid input
               ignore: "", // validate all fields including form hidden input
               messages: {              
                  
   				 'txt_phone': {
                       required: 'Mobile No is required',
   					minlength: jQuery.validator.format("Invalid Mobile No"),
   					remote : "Mobile No is already registered",
   					 
   					
                   },
   				
   				 'txt_empname': {
                       required: 'Username is required',
   					remote : "Username is in use"
                   },
   				
   				 'txt_email': {
                       required: 'Email is required',
   					email: 'Invalid Email',
   					remote : "Email is already registered"
                   },
   				 
   				 'txt_password': {
                       required: 'Password is required',
                        minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),					
                   },
   			 'txt_confirm_password': {
                      required: "Confirm password required",
                      minlength: jQuery.validator.format("Password must be at least 8 characters long with at least a number and an alphabet"),	
                      equalTo: "Entry does not match with password",
   			   },
   				 'txt_utype': {
                       required: 'Please Enter the user type',
                   },
           
   	
            
               },
               rules: {
               txt_password: {
                       required: true,
                        minlength: 8,
                   },
                    
                   txt_confirm_password : {
   			required: true,
   			 minlength: 8,
                  equalTo : "#txt_password",
                   }
         
   
               },
   
               highlight: function(element) { // hightlight error inputs
                   $(element)
                       .closest('.form-group').addClass('has-error'); // set error class to the control group
               },
   
               unhighlight: function(element) { // revert the change done by hightlight
                   $(element)
                       .closest('.form-group').removeClass('has-error'); // set error class to the control group
               },
   
               success: function(label) {
                   label
                       .closest('.form-group').removeClass('has-error'); // set success class to the control group
               },
   
               submitHandler: function(form) {
      $( "#submit_job" ).submit();
   
   				}
   			});
   	});
    
</script>
