<?php global $mobile_country_code,$country_array;?>

<script>  
   $(document).ready(function()
   {  
        $('#new_taskupdate').on('submit', function(e)
        {  
             e.preventDefault();  
             //~ if($('#taskcat_img').val() == '')  
             //~ {  
                  //~ alert("Please Select the File");  
             //~ }  
             //~ else  
             //~ {  
                  $.ajax({  
                       url:"<?php echo base_url(); ?>admin/task/update_task_list",   
                       method:"POST",  
                       data:new FormData(this),  
                       contentType: false,  
                       cache: false,  
                       processData:false, 
                       dataType : 'json', 
                       success:function(data)  
                       { 
							if(data.success  == 'success')
							{
								$("#uploaded_image").html("");
								$(".imag_val").val('<?php echo base_url(); ?>uploads/'+data.data_image);
								$('#uploaded_image').html('<img src="<?php echo base_url(); ?>uploads/'+data.data_image+'" width="300" height="225" class="img-thumbnail" />');  
							}
							else
							{
								$('#uploaded_image').html('<img src="<?php echo base_url(); ?>assets/images/default.jpg">');
							}					
                     
                       }  
                       location.reload();
                  });  
             //~ }  
        });
          
        $('#imgupload').on('submit', function(e)
        {  
            e.preventDefault();  
            if($('#taskcat_img').val() == '')  
            {  
                  alert("Please Select the File");  
            }  
            else  
            {  
                  $.ajax({  
                       url:"<?php echo base_url(); ?>admin/task/img_update_task_list",   
                       method:"POST",  
                       data:new FormData(this),  
                       contentType: false,  
                       cache: false,  
                       processData:false, 
                       dataType : 'json', 
                       success:function(data)  
                       { 
							if(data.success  == 'success')
							{
								$("#uploaded_image").html("");
								$(".imag_val").val('<?php echo base_url(); ?>uploads/'+data.data_image);
								$('#uploaded_image').html('<img src="<?php echo base_url(); ?>uploads/'+data.data_image+'" width="300" height="225" class="img-thumbnail" />');  
							}
							else
							{
								$('#uploaded_image').html('<img src="<?php echo base_url(); ?>assets/images/default.jpg">');
							}					
                     
                       }  
                  });  
            }  
        });  
   });  
</script>

<!-- BEGIN CONTENT -->
<div class="dashboard-content">
	
<?php
//~ echo '<pre>';
//~ print_r($getlisttaskdetails); 
//~ echo '</pre>';
?> 
            <div class="">
                <!-- BEGIN CONTENT BODY -->
                <div class="">

   <div class="row">
      <div class="col-md-12 form">
         <?php 
            if($getlisttaskdetails != FALSE){ 
            ?>
                           <div class="form-group col-md-12">
                  <div class=""> <?php
                  if($this->session->flashdata('success'))
                  {
                   echo $this->session->flashdata('success'); } ?> </div>
                  <label class="col-md-3 control-label"> Image</label>
                  <div class="col-md-9">
                     <div id="imgContainer">
                        <div id="uploaded_image"></div>
							
<div class="">

    <h3></h3>

    <form action="<?php echo $base_url; ?>admin/task/img_update_task_list" class="form-image-upload" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="taskcat_img"  >
                <input type="hidden" name="taskcat_img_id" id="taskcat_img_id" value="<?php echo $getlisttaskdetails->id; ?>">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" id="imgupload" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form> 


    <div class="row">
    <div class='list-group gallery'>

        <?php 
        
        //~ if(!empty($getlisttaskdetails->image_path))
        //~ {
			//~ $img_path = explode(',', $getlisttaskdetails->image_path);
		//~ }
		//~ else
		//~ {
			//~ $img_path = '';
		//~ }
		
		if(!empty($img_path))
		{
			foreach($img_path as $img_path_sep)
			{
            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                       <img class="fs-gal img-responsive" src="<?php echo $base_url; ?>uploads/<?php echo $img_path_sep; ?>"  data-url="<?php echo $base_url; ?>uploads/<?php echo $img_path_sep; ?>" />
                        <div class='text-center'>
                            <small class='text-muted'></small>
                        </div> <!-- text-center / end -->
              
                    <form action="" method="POST">
						<input type="hidden" name="id" value="">
						<input type="hidden" name="taskcat_img" id="taskcat_img" value="<?php echo $getlisttaskdetails->id; ?>">
						<button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </div> <!-- col-6 / end -->
            <?php 
            }
        } ?>

        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
    <div class="fs-gal-view">
      <h1></h1>
      <img class="fs-gal-prev fs-gal-nav" src="<?php echo $base_url; ?>assets/phogallery/img/prev.svg" alt="Previous picture" title="Previous picture" />
      <img class="fs-gal-next fs-gal-nav" src="<?php echo $base_url; ?>assets/phogallery/img/next.svg" alt="Next picture" title="Next picture" />
      <img class="fs-gal-close" src="<?php echo $base_url; ?>assets/phogallery/img/close.svg" alt="Close gallery" title="Close gallery" />
    </div>
</div>
</div>
	</div>
 </div>

</div>

 
         <form id="new_taskupdate" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id" id="id" value="<?php echo $getlisttaskdetails->id;?>">
            <div class="form-body ">
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Name</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="task_name" id="taskcat_name" value="<?php if(!empty($getlisttaskdetails->property_name)) { echo $getlisttaskdetails->property_name; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Description</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="description" id="description" value="<?php if(!empty($getlisttaskdetails->description)){ echo $getlisttaskdetails->description; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Email</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="email" id="email" value="<?php  if(!empty($getlisttaskdetails->email)) { echo $getlisttaskdetails->email; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Username</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="username" id="username" value="<?php if(!empty($getlisttaskdetails->user_id)) { echo $getlisttaskdetails->user_id; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Property Id</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="property_type" id="property_type" value="<?php if(!empty($getlisttaskdetails->apartment_id)){ echo $getlisttaskdetails->apartment_id; } ?>"> 		
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Property name</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="property_name" id="property_name" value="<?php if(!empty($getlisttaskdetails->property_name)) { echo $getlisttaskdetails->property_name; } ?>"> 		
                  </div>
               </div>

               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Address</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="address" id="address" value="<?php if(!empty($getlisttaskdetails->address)) { echo $getlisttaskdetails->address; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Phone number</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" name="phone" id="phone" value="<?php if(!empty($getlisttaskdetails->phone_number)) { echo $getlisttaskdetails->phone_number; } ?>"> 
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label class="col-md-3 control-label"> Status</label>
                  <div class="col-md-9">
                     <select class="form-control" name="status" id="status">
                        <option value="active" <?php echo ($getlisttaskdetails->status == 'active') ? 'selected="selected"' : "";?>  >Active</option>
                        <option value="deactive" <?php echo ($getlisttaskdetails->status == 'deactive') ? 'selected="selected"' : "";?> >Deactive</option>
                     </select>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                           <button type="submit"  style="float:right" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <?php } ?>
              </div>
   </div>
</div></div>

<style>
	#open-popup {padding:20px}
.white-popup {
  position: relative;
  background: #FFF;
  padding: 40px;
  width: auto;
  max-width: 200px;
  margin: 20px auto;
  text-align: center;
}

   img.task_editimg {
   width: 50%;
   height: 50%;
   margin: 12px 0px;
   }
</style>
    <!-- References: https://github.com/fancyapps/fancyBox -->

    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
         .fs-gal {
        width: 100px;
        height: auto;
        float: left;
      }
    </style>



