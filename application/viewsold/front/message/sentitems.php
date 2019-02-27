<style>
.tabs-left {
  border-bottom: none;
  border-right: 1px solid #ddd;
}

.tabs-left>li {
  float: none;
 margin:0px;
  
}

.tabs-left>li.active>a,
.tabs-left>li.active>a:hover,
.tabs-left>li.active>a:focus {
  border-bottom-color: #ddd;
  border-right-color: transparent;
  background:#ED7D31;
  border:none;
  border-radius:0px;
  margin:0px;
}
.nav-tabs>li>a:hover {
    /* margin-right: 2px; */
    line-height: 1.42857143;
    border: 1px solid transparent;
    /* border-radius: 4px 4px 0 0; */
}
.tabs-left>li.active>a::after{content: "";
    position: absolute;
    top: 10px;
    right: -10px;
    border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  
  border-left: 10px solid #ED7D31;
    display: block;
    width: 0;}
    
    .tab-content {
    padding: 0 33px !impotant;
    position: relative;
    z-index: 10;
    display: inline-block;
    width: 100%;
}
.composebtn{
	    padding: 12px;
	       
	}
.composebtn button{
	 background-color: #ED7D31;
	    padding: 12px;
	}
.composebtn button:hover{
	 background-color: #ED7D31;
	    padding: 12px;
	}
	.messagesys li.active a {
    border-left: 4px solid #ED7D31;
    background: #ED7D318c;
    color: #fff;
    border-bottom: unset;
}
</style><section >
    <!-- Main content -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
			  
			  
        <h3><i class="fa fa-envelope" aria-hidden="true"></i>
Message</h3>
        <hr/>
        			<div class="composebtn col-md-12"><button type="button" class="btn btn-info" data-target="#compose_mail" data-toggle="modal">Compose Mail</button></div>

        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left messagesys sideways">
            <li class="headtitbid active"><a href="#home-v" data-toggle="tab"><i class="fa fa-inbox"></i>Inbox</a></li>
            <li class="headtitbid"><a href="#profile-v" data-toggle="tab"><i class="fa fa-paper-plane" aria-hidden="true"></i>Sent</a></li>
<!--
            <li><a href="#settings-v" data-toggle="tab"><i class="fa fa-gear"></i>
Settings</a></li>
-->
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home-v">   <div class="box-body">
                
        <?php echo form_open('messages/delete'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#search_admin_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" style="color: #000;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Sender</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($record as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                            $date = date('M d, Y h:i:s A',strtotime($row->date)); 
                            echo $date; 
                        ?>  
                    </td>
                    <td class="mailbox-name">
                        <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_from);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                      
                      <td class="mailbox-name">
                        <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_to);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>        
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->message_model->string_limit_words($row->content,10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->message_model->time_diff($row->date); ?></td>
                    
                  </tr>                      
                  <?php endforeach; ?>
                    
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! No messages in this section! | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>messages">refresh this page</a> or try using the <a href="#search_admin_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>messages/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
            </div><!-- /.box-body --></div>
            <div class="tab-pane" id="profile-v">
            <!-- Titlebar -->
			  <div class="box-body">
                
        <?php echo form_open('sentitems/delete'); ?>
            <?php $this->load->view('front/message/modal/confirm'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#sent_search_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" style="color: #000;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($record as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                          $date = date('M d, Y h:i:s A',strtotime($row->date)); 
                            echo $date; 
                        ?>  
                    </td>
                    <td class="mailbox-name">
                        <a href="#read_sent_mail" data-toggle="modal" class="read_sent_message" data-id="<?php //echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->message_model->get_username($row->user_to);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->message_model->string_limit_words($row->content,10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->message_model->time_diff($row->date); ?></td>
                    
                  </tr>                      
                  <?php endforeach; ?>
                    
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! You don't have any messages in your sent items | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>sentitems">refresh this page</a> or try using the <a href="#sent_search_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>sentitems/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
            </div><!-- /.box-body --></div>
<!--
            <div class="tab-pane" id="settings-v">Settings Tab.</div>
-->
          </div>
     

        <div class="clearfix"></div>

      </div>

      
          </div><!-- /.box -->              
        </div><!-- /.col -->
     
    </div><!-- /.content -->
</section>
</div><div class="clear"></div>
<?php $this->load->view('front/message/modal/read'); ?>
<?php $this->load->view('front/message/modal/search'); ?>
<?php $this->load->view('front/message/script/message'); ?>
<?php if(isset($_GET['delete'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Deleted Successfully!'
        });
    </script>
<?php endif; ?>
<div class="modal fade" id="compose_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> New Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('inbox/send'); ?>
                <div class="form-group">
                    <label for="send_to">Send To:</label>
                    <select name="send_to" class="form-control" readonly>
                        <?php foreach($contacts as $row): ?>
                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->username.'('.$row->id_no.')'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject">
                </div>   
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" cols="40" rows="10" class="form-control" placeholder="Your Message Here" style="resize: none;"></textarea>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="send" value="1" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
