<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller {
 	public function __construct()
        {
                parent::__construct();
				$this->load->model(['ChatModel','OuthModel','UserModel','SeesionModel']);
             //   $this->SeesionModel->not_logged_in();
				$this->load->helper('string');
        }
	public function index(){
		
		$data['strTitle']='';
		$data['strsubTitle']='';
		$list=[];
		if($this->session->userdata['Admin']['role'] == 'Client_cs'){
			$list = $this->UserModel->VendorsList();
			$data['strTitle']='All Vendors';
			$data['strsubTitle']='Vendors';
			$data['chatTitle']='Select Vendor with Chat';
		}else{
			$list = $this->UserModel->ClientsListCs();
			$data['strTitle']='All Connected Clients';
			$data['strsubTitle']='Clients';
			$data['chatTitle']='Select Client with Chat';
 
		}
		$vendorslist=[];
		foreach($list as $u){
			$vendorslist[]=
			[
				'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
				'name' => $u['name'],
				'picture_url' => $this->UserModel->PictureUrlById($u['id']),
			];
		}
		$data['vendorslist']=$vendorslist;
		 
		 
 		$this->parser->parse('construction_services/chat_template',$data);
    }
	
	
	public function send_text_message(){
		$post = $this->input->post();
			$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	
		 
				$data=[
 					'sender_id' => $this->session->userdata('id_user_master'),
					'receiver_id' => $post['receiver_id'],
					'poid' => $post['poid'],
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
					'read_unread_msg' => 1,
				];
	
 				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	public function ChatAttachmentUpload(){
		 
		
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	public function get_chat_history_by_vendor(){
		
	
		//~ $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$Logged_sender_id = $this->session->userdata('id_user_master');
		 
		$history = $this->ChatModel->GetReciverChatHistory($this->input->get('receiver_id'));
					$userPicrec = $this->UserModel->PictureUrlByIdrec($this->input->get('receiver_id'));
					$userPicrecfirstname = $this->UserModel->PictureUrlByIdrecfirstname($this->input->get('receiver_id'));
					$userPicrecemail = $this->UserModel->PictureUrlByIdrecemail($this->input->get('receiver_id'));

	
		foreach($history as $chat)
			{
			
		//	$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
			$sender_id = $chat['sender_id'];
			$userName = $this->UserModel->GetName($chat['sender_id']);
			$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);
			$PictureUrlByIdsenfirstname = $this->UserModel->PictureUrlByIdsenfirstname($chat['sender_id']);
			$PictureUrlByIdsenemail = $this->UserModel->PictureUrlByIdsenemail($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
			
 		?>
        	<?php
				$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if($Logged_sender_id==$sender_id){$classBtn = 'left';}
					
					$attachment_name = $chat['attachment_name'];
					$file_ext = $chat['file_ext'];
					$mime_type = explode('/',$chat['mime_type']);
					
					$document_url = base_url('uploads/attachment/'.$attachment_name);
					
				  if($mime_type[0]=='image'){
 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				  }else{
					$messageBody='';
					 $messageBody.='<div class="attachment">';
                          $messageBody.='<h4></h4>';
                           $messageBody.='<div class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</div>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<div><a download href="'.$document_url.'"><button type="button" id="" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a></div>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
                        
                        
					}
						
								
				}else{
					$messageBody = $message;
				}
				
			?>
            
	
			
             <?php if($Logged_sender_id!=$sender_id){ ?>    
				 <li class="replies">
<!--
					<img title="<?=$userPicrecfirstname.'( '.$userPicrecemail.' )';?>" src="<?php echo $userPicrec; ?>" alt="">    
-->
					<img title="<?=$userPicrecfirstname;?>" src="<?php echo $userPicrec; ?>" alt="">    
					  <div class="stmsgdate"><div><?=$messageBody;?></div><span class="datetimecolor"><?=$messagedatetime;?></span></div>

					
				</li> 
            
                    <!-- /.direct-chat-msg -->
			<?php }else{?>
                    <!-- Message to the right -->
               <li class="sent">
<!--
					<img  title="<?=$PictureUrlByIdsenfirstname.'( '.$PictureUrlByIdsenemail.' )';?>" src="<?php echo $userPic; ?>" alt="">
-->
					<img  title="<?=$PictureUrlByIdsenfirstname; ?>" src="<?php echo $userPic; ?>" alt="">
					  <div class="stmsgdate"><div><?=$messageBody;?></div><span class="datetimecolor"><?=$messagedatetime;?></span></div>
					 

				</li> 
                    <!-- /.direct-chat-msg -->
             <?php }
             
        
   
			} 		
	}

		public function chat_clear_client_cs(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);
		
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
		
		$this->ChatModel->TrashById($receiver_id); 
 
 		
	}
		public function updatestatusmessage(){
			$poid  = $this->input->post('poid');
			$Sender_Id = $this->input->post('Sender_Id');
				$messagelist = $this->ChatModel->updatestatusmessage($poid ,$Sender_Id);

	}
		public function getchatcountbadge(){
								if($this->session->userdata('id_user_master'))
                                 { 
									$count_inbox = $this->message_model->count_inbox(); 
									$dataval = "";
									
									$dataval = '<i onclick="myFunction()" class="dropbtn fa fa-bell" aria-hidden="true"></i><span class="badge">'.count($count_inbox).'</span>';
									echo json_encode($dataval);	
								}
								
							}
	public function getchatcountbadgedropdown()
	{
		if($this->session->userdata('id_user_master'))
		{ 	
		 	$count_inbox = $this->message_model->count_inbox(); 
		 $dataval = "";	
		$dataval .= '<h3 class="noti_headss">Notifications</h3><div class="noti_middle">';
		if(!empty($count_inbox)){foreach($count_inbox as $count_inboxs ){ 
						$getsenderdetails = $this->users_model->getsenderdetails($count_inboxs->sender_id); 
																			$getjobdetails = $this->postjob_model->getjobdetails($count_inboxs->poid);

						$dataval .=  '<div class="col-md-12 col-sm-12 col-xs-12">';
						 if($this->session->userdata("user_type_fr") == "company"){
							$dataval .= '<a class="msg_text" href="'.base_url()."home/profile/".$count_inboxs->sender_id.'/'.$count_inboxs->poid .'">
							<div class="col-md-3 col-sm-3 col-xs-3">';
							if(!empty($getsenderdetails->profile_image)){ 
							$dataval .= '<img src="'.base_url().'uploads/'.$getsenderdetails->profile_image.'" alt="" class="img-responsive" style="width:40px;height:40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);" >'; 
							} else { 
							$dataval .= '<img src="'.base_url().'uploads/default17.jpg" class="img-responsive" style="width: 40px;height: 40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);">';
								}
							 $dataval .= '</div><div class="col-md-9 col-sm-9 col-xs-9"><p><b>'.$getsenderdetails->first_name.'</b> sent to message<br><span><i>'.$count_inboxs->message.'</i></span><div><i><b>JobTitle:'.$getjobdetails->job_title.'</b></i></div>
</p></div></a>';
							 } else {
								  $dataval .= '<a class="msg_text" href="'.base_url()."bids/select_job/".$count_inboxs->poid.'"><div class="col-md-3 col-sm-3 col-xs-3">';
								  if(!empty($getsenderdetails->profile_image)){ 
									  $dataval .= '<img src="'.base_url().'uploads/<?php echo $getsenderdetails->profile_image; ?>" alt="" class="img-responsive" style="width:40px;height:40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);">';
									  } else { 
										  $dataval .= '<img src="https://stallioni.net/B289a/uploads/default17.jpg" class="img-responsive" style="width: 40px;height: 40px;border-radius: 25px;border: 1px solid rgba(0,0,0,0.1);">';
							}
							$dataval .= '</div><div class="col-md-9 col-sm-9 col-xs-9"><p><b>'.$getsenderdetails->first_name.'</b> sent to message <br><span><i>'.$count_inboxs->message.'</i></span><div><i><b>JobTitle:'.$getjobdetails->job_title.'</b></i></div></p></div></a>'; } 
							$dataval .= '</div><div class="clear"></div><hr class="msg_hr">';
						}	$dataval .= '</div>	</div>';
						} 
				echo json_encode($dataval);		
	

		}
	}
}
