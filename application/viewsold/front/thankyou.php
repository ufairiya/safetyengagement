<div class="container">
    <div class="row">
		<section class="job-form thankpg">
	   <div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead">Please wait <strong>3 secounds</strong> redirect send proposals page  .......</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
	  <a  href="<?php echo $base_url; ?>" class="btndesign button margin-top-15" value="Save Changes" style="margin-left:44%;">Continue to homepage</a>
<!--
    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">
-->
  </p>
</div>
</section>
</div></div>
<style>
.thankpg .jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: inherit;
    background-color: #ddd;
}
.thankpg .jumbotron h1
{
	    color: #EB5A1D;
} 

.thankpg p
{
color:#000;	
	}
</style>
<script>
    var timer = setTimeout(function() {
		var pid ="<?php echo $_GET['pid']?>";
        window.location='<?php echo $base_url; ?>/bids/select_job/'+pid
    }, 3000);
</script>
