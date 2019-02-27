<?php $title = isset($title) ? $title  :FALSE;?>
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> <?php echo $title;?></h1>
    
    <div class="page-content-inner">
      <div class="note note-warning">
        <h2>Access Denied</h2>
        <h3> You do not have enough privileges to access this page.</h3>
        <p>Please Contact the Administrator if you think there has been an error. <a class="btn red btn-outline" href="<?php echo base_url();?>">Home Page</a> </p>
      </div>
    </div>
  </div>
</div>
