<div class="container">
    <div class="row">
        <br>
        <div class="col-xs-12 .col-md-8-centered well">
            <?php echo form_open('Signup_controller/signup') ?>
            <fieldset>
                <legend class="text-center"> Registration</legend>
                <!--  name -->
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_empname" class="control-label">Name</label>
                            <input class="form-control" id="txt_empname" name="txt_empname" placeholder="Name" type="text" value="<?php echo set_value('txt_empname'); ?>" /> 
                            <span class="text-danger"><?php echo form_error('txt_empname'); ?></span>
                        </div>
                    </div>
                </div>
         
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_empname" class="control-label">User type </label>
                      <?php     $salutationOptions = array(
                  ''  => '-------User Type--------',
                  'Contractor'  => 'Contractor',
                  'User'    => 'User',
                 
                );
                
    echo form_dropdown('txt_utype', $salutationOptions, '', 'required="required" id="txt_utype" class="form-control" placeholder="User Type" ');
    ?>
                          
                            <span class="text-danger"><?php echo form_error('txt_utype'); ?></span>
                        </div>
                    </div>
                </div>
                <!--  address -->
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_emp_addr" class="control-label">Contact</label>
                            <input class="form-control" id="txt_emp_cnt" name="txt_emp_addr" placeholder="Address" type="text" value="<?php echo set_value('txt_emp_cnt'); ?>" />  
                            <span class="text-danger"><?php echo form_error('txt_emp_cnt'); ?></span>
                        </div>
                    </div>
                </div>
             
                <!--  email -->
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_email" class="control-label">Email</label>
                            <input class="form-control" id="txt_email" name="txt_email" placeholder="Email" value="<?php echo set_value('txt_email'); ?>" type="email" />  
                            <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
                        </div>
                    </div>
                </div>
                
               <!--  password -->
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_password" class="control-label"> Password</label>
                            <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>"/>  
                            <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                        </div>
                    </div>
                </div>
                
                <!--  confirm password -->
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <label for="txt_confirm_password" class="control-label">Confirm Password</label>
                            <input class="form-control" id="txt_confirm_password" name="txt_confirm_password" placeholder="Confirm Password" type="password" value="<?php echo set_value('txt_confirm_password'); ?>"/> 
                            <span class="text-danger"><?php echo form_error('txt_confirm_password'); ?></span>
                        </div>
                    </div>
                </div>
                <br>
                <!-- sigup button -->
                <div class="form-gruop">
                    <div class="row colbox">
                        <div class="col-xs-12 .col-md-8">
                            <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-primary col-xs-12 .col-md-8" value="Signup" />
                            <br><br>
                            <input type="reset" id="btn_reset" name="btn_reset" class="btn btn-default col-xs-12 .col-md-8" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
             <div class="text-center">
                 <br>
                <a href="<?php echo site_url(); ?>Login_controller/" >Already signed up, Login</a>
            </div>
            
        </div>
    </div>

</div>
