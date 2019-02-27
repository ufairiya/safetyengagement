<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		//~ if($this->session->userdata('id_user_master') == "" )
		//~ {
			//~ redirect('home');			
		//~ }
		$this->load->model('task_model');
		$this->load->model('purchaseorder_model');		
		$this->load->model('notification_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	

	}
	
	public function createtaskcategory()
	{
		
		//~ print_r($this->input->post());
		$data['base_url'] = base_url();		
		
		$data['view_file']  = "task/create_taskcategory";
		$data['current_menu']  = "task";
		$data['sub_menu']  = "createtask";		
		$this->template->load_frontend_template($data);
		
		//~ if ($this->input->is_ajax_request())
		//~ {		
			//~ $user_type = $this->session->user_type;					
			//~ //$user_master_id = $this->session->user_id;	
			
				//~ $user_master_id = $this->session->userdata('user_id');
									
			//~ $data = array(
			//~ 'user_id'=> $user_master_id,					
			//~ 'taskcategory_name '=>$this->input->post("taskcat_name"),	
			 //~ 'image_path' => ''
			//~ );
			 //~ print_r($data);
			//~ $task_id = $this->task_model->taskcategory_insert($data);
		//~ }
		
		
	}
	
	public function unquie_taskcategory()
	{
		if ($this->input->is_ajax_request())
		{
			$type = $this->input->post('taskcat_name');		
				
			if($type == 'taskcat_name'){
				$tcat_name = $this->input->post('taskcat_name');							
					echo getPropertyuniqueDetails(array('taskcat_name'=>$tcat_name));
			}

		}
	}

	public function ajax_upload()  
    {  	  
		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);


		if(!$this->upload->do_upload('taskcat_img'))  
		{  
			echo $this->upload->display_errors();  
		}  
		else  
		{                   
			$data = $this->upload->data();  
			$imgval = array('success' => 'success' ,'data_image' => $data["file_name"]);  
			echo json_encode($imgval );

			$data = $this->upload->data();  
			$user_type = $this->session->user_type;
			$user_master_id = $this->session->user_id;
			$user_master_id = $this->session->userdata('user_id');
			$data = array(
			'user_id'=> $user_master_id,
			'taskcategory_name '=>$this->input->post("taskcat_name"),
			'status'=>$this->input->post("status"),
			//~ 'image_path' =>  $data["full_path"]
			'image_path' =>  $data["file_name"]
			);
			$insert_id = $this->task_model->taskcategory_insert($data);
		}  
                
    }  
	public function tasklist()
	{
		$data['base_url'] = base_url();
		$data['admin_of_task']  = $this->task_model->get_task_details();
		$data['view_file']  = "task/list_taskcategory";
		$data['current_menu']  = "task";
		$data['sub_menu']  = "list_taskcategory";		
		$this->template->load_frontend_template($data);
	}
	
	public function update_taskcategory()
	{	
		$user_type = $this->session->user_type;
		$user_master_id = $this->session->user_id;
		$user_master_id = $this->session->userdata('user_id');
		$data = array(
		'taskcategory_name '=>$this->input->post("taskcat_name"),
		'status'=>$this->input->post("status")
		//~ 'ID'=>$this->input->post("id")
		//~ 'image_path' =>  $data["file_name"]
		);	
		$task_id = $this->task_model->task_update($data);
    }
	public function edit_taskcategory($user_id = 0)
	{
		

		$user_type = $this->session->user_type;
		$user_master = $this->session->id_user_master;
					

		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
				$data['current_menu']  = "";
		$data['sub_menu']  = "";
			 $task_det_data = $this->task_model->getedittask_list($user_id);
			  //~ print_r($task_det_data);
			 if(!empty($task_det_data))
			 {
			 foreach($task_det_data as $task_det_data_val )
			 {
				 			$data['gettaskdetails'] = 	$task_det_data_val;
				 }
				
			 }
			 			$this->load->view('front/task/edit_taskcategory',$data);		

			 
		}
	}
	
	public function task_delete()
	{
	
			if ($this->input->is_ajax_request()){
			$user_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->task_model->task_delete(array("status"=>"deactive"),array("ID"=>$user_id));
			}
			if($task  == 'p'){
					$this->task_model->task_delete_permanently(array("ID"=>$user_id));
			}
			echo TRUE;
			exit;
		}
	}
		
	public function task_image()
	{
		if ($this->input->is_ajax_request())
		{
				
		    $config['upload_path'] = './uploads/';
		    $config['overwrite'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file'))
			{
				$error = array('error' => $this->upload->display_errors());
			  echo   $error['error'] ;
			  exit;
			} else 
			{
					$config = array();
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/' . $data['upload_data']['file_name'];
					$config['maintain_ratio'] = TRUE;
					$config['width']         = 1050;
					$config['height']       = 500;
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$config = array();
			} 
			echo json_encode(array('fullimg'=> $data['upload_data']['file_name']));  
					
		}
			  
	}     
	
			

	public function purchase_order()
	{
			$taskid = $this->input->get('taskid');			
			$data['base_url'] 		= base_url();
			$purchase_order = $this->purchaseorder_model->get_purchaseorder_details($taskid);
			$data['purchase_order_details'] = $purchase_order[0];
			$data['taskid'] = $taskid;
			$data['current_menu']  = "";
			$data['sub_menu']  = "";
			$data['view_file']  	= "purchase_order";
			$this->template->load_front_home_template($data);
		
	}
	public function view_order()
	{
			$taskid = $this->input->get('taskid');			
			$data['base_url'] 		= base_url();
			$purchase_order = $this->purchaseorder_model->get_purchaseorder_details($taskid);
			$data['purchase_order_details'] = $purchase_order[0];
			$data['taskid'] = $taskid;
			$data['current_menu']  = "";
			$data['sub_menu']  = "";
			$data['view_file']  	= "view_order";
			$this->template->load_front_home_template($data);
		
	}
	public function changestatustocofirm()
	{
				$taskid = $this->input->post('id_val');		

		
		$taskchangetoawaiting = $this->purchaseorder_model->changeconfirm($taskid);
		//~ $taskchangetoawaiting ='test';
		
		if(!empty($taskchangetoawaiting))
		{
			//$this->session->set_flashdata('success', '<div class="notification success closeable"><p>Success! Your confirmation have been updated in our system.</p><a class="close"></a></div>');
			
						//$data['current_menu']  = "";
						echo json_encode(array('success' =>'success'));

		}else
		{						echo json_encode(array('failed' =>'failed'));

			}
		
		//~ $data['current_menu']  = "booking";
		//~ $data['sub_menu']  = "active_request";
		//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "upcoming_request";
			//~ $this->template->load_front_home_template($data);
		
	}
	public function changestatustodecline()
	{
		$taskid = $this->input->post('id_val');		
		$taskchangetoawaiting = $this->purchaseorder_model->changedecline($taskid);
		
		//~ $taskchangetoawaiting ='test';
		if(!empty($taskchangetoawaiting))
		{
						echo json_encode(array('success' =>'success'));

			//$this->session->set_flashdata('success', '<div class="notification success closeable"><p>Success! Your decline have been updated in our system.</p><a class="close"></a></div>');
		}
		else
		{
			echo json_encode(array('failed' =>'failed'));
			
			}
	}
	public function requestcount()
	{	$id = $this->session->userdata('id_user_master');
		if(!empty($id))
		{		
			$details_notification_upcom = $this->task_model->get_front_upcoming_task_details($this->session->userdata('id_user_master')); 
			$count = count($details_notification_upcom);

			if($count == 0)
			{
				echo '0';
			}
			else
			{
				echo $count;
			}
		}
		else
		{
			echo 'no';
		}

	}

	public function assignment()
	{
		$id = $this->session->userdata('id_user_master');
		if(!empty($id))
		{
			$Service_schedule = $this->Service_model->get_schedule_events($this->session->userdata('id_user_master'));
			$schedule_count = count($Service_schedule); 
						
			if($schedule_count == 0)
			{
				echo '0';
			}
			else
			{
				echo $schedule_count;
			}			
		}
		else
		{
			echo 'no';
		}
	}
	
		public function webpush()
		{
		$data['base_url'] = base_url();		
		
		$data['view_file']  = "weppush";
		$data['current_menu']  = "weppush";
		$data['sub_menu']  = "weppush";		
			$this->template->load_front_home_template($data);		
		}
	
		public function insertcomments()
		{
		$commentsdata = array('comment_subject'=>$this->input->post('subject'),'comment_text'=>$this->input->post('comment'));
		
			$details_notification_upcom = $this->notification_model->insertcommentsdata($commentsdata );
		}
			public function updatecomments()
		{
		
 
// $con = mysqli_connect("localhost", "root", "", "notif");
 
if($this->input->post("view") != '')
 
{
   $update_query = $this->notification_model->updatecommentsdata();
   //~ "UPDATE comments SET comment_status = 1 WHERE comment_status=0";
}
  $get_query = $this->notification_model->getcommentsdata();
//~ $query = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
$output = '';
 
if(!empty($get_query))
{
 
foreach($get_query as $get_querydata)
{
 
  $output .= '<li>
  <a href="#">
  <strong>'.$get_querydata->comment_subject.'</strong><br />
  <small><em>'.$get_querydata->comment_text.'</em></small>
  </a>
  </li>';
}
}
 
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
   $status_query = $this->notification_model->getcommentsdatanot();

//~ $status_query = "SELECT * FROM comments WHERE comment_status=0";
//~ $result_query = mysqli_query($con, $status_query);
//~ $count = mysqli_num_rows($result_query);
 $count =$status_query;

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
 
echo json_encode($data);
}
		
}
