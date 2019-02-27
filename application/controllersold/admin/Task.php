<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('task_model');
		$this->load->model('property_model');
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');


	}
	public function createtaskcategory()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "task/create_taskcategory";
		$data['current_menu']  = "task_categories";
		$data['sub_menu']  = "createtaskcategories";		
		$this->template->load_frontend_template($data);
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
	public function unquie_taskcategoryshortcode()
	{
		if ($this->input->is_ajax_request())
		{
				

				$tcatshort_name = $this->input->post('taskcatshort_name');							
					echo $this->task_model->taskcategoryshortcode(array('taskcatshort_code'=>$tcatshort_name));
					
			}

		}
	

	public function task_categories_insert()  
      {  
		  
		  //~ $config = array(
//~ 'upload_path' => "./uploads/",
//~ 'allowed_types' => "gif|jpg|png|jpeg|pdf",
//~ 'overwrite' => TRUE,
//~ 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
//~ 'max_height' => "768",
//~ 'max_width' => "1024"
//~ );
//~ $this->load->library('upload', $config);

  
                //~ if(!$this->upload->do_upload('taskcat_img'))  
                //~ {  
                     //~ echo $this->upload->display_errors();  
                //~ }  
                //~ else  
                //~ {                       $data = $this->upload->data();  

  //~ $imgval = array('success' => 'success' ,'data_image' => $data["file_name"]);  
                     //~ echo json_encode($imgval );
                         //~ var_dump($this->input->post());
                         //~ exit;
                     //~ $data = $this->upload->data();  
                     
                     $user_type = $this->session->user_type;
                     $user_master_id = $this->session->user_id;
					$user_master_id = $this->session->userdata('user_id');
				//	echo "<pre>";
				
 
				//~ $vars	= $this->input->post('cate_price_name') ;
			//	print_r($vars);
 				//~ $keys =$this->input->post('cate_price');
					//~ $i=0;
//~ foreach (array_combine($vars, $keys) as $var => $key)
//~ {
//~ $i=$i;

//~ $vars[]= $var;
//~ $keys[]= $key;
//~ }
//~ print_r(array_combine($vars,$keys));

                     //~ exit;
                     
                  
                     $data = array(
              'user_id'=> $user_master_id,
			'taskcategory_name '=>$this->input->post("taskcat_name"),
			'taskcatshort_code '=>$this->input->post("taskcatshort_name"),
			'description '=>$this->input->post("taskcat_desc"),
			'status'=>$this->input->post("status"),
			  'image_path' =>  $this->input->post("img_link")
			);
			$insert_id = $this->task_model->taskcategory_insert($data);
                    
                }  
             
 public function taskcategorieslist()
	{
		$data['base_url'] = base_url();
		$data['admin_of_task']  = $this->task_model->get_task_details();
		$data['view_file']  = "task/list_taskcategory";
		$data['current_menu']  = "task_categories";
		$data['sub_menu']  = "list_taskcategory";		
		$this->template->load_frontend_template($data);
	}
	public function update_taskcategory()
	{
                    $user_type = $this->session->user_type;
                     $user_master_id = $this->session->user_id;
					$user_master_id = $this->session->userdata('user_id');
	$task_id = $this->input->post("id");
		 $data = array(
			'taskcategory_name '=>$this->input->post("taskcat_name"),
			'description '=>$this->input->post("taskcat_desc"),
			'taskcatshort_code '=>$this->input->post("taskcatshort_name"),
			'id' => $this->input->post("id"),
			'status'=>$this->input->post("status")
			);	
			$task_id = $this->task_model->task_update($data,array("id"=>$task_id));
    
}
		public function edit_taskcategory($user_id = 0)
	{  
		$user_type = $this->session->user_type;
		$user_master = $this->session->id_user_master;
		if ($this->input->is_ajax_request()){
		
			$data['base_url'] = base_url();
			 $task_det_data = $this->task_model->getedittask_list($user_id);

		//echo $this->db->last_query();
			 if(!empty($task_det_data))
			 {
		
										$data['gettaskdetails'] = 	$task_det_data;

			 
			 

			 }
			// print_r($data);
			$this->load->view('backend/task/edit_taskcategory',$data);		
		}
}
		
		public function task_delete()
	{
	
			if ($this->input->is_ajax_request()){
			$user_id = $this->input->post('key');
			$task = $this->input->post('task');
			//~ print_r($task);
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
	
	/*Task*/
	
	public function createtask()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "task/create_task";
		$data['current_menu']  = "task";
		$data['sub_menu']  = "createtask";		
		 //~ $data['aparment_id']  = $this->property_model->getpropertyall_list();
					$data['get_apartment']  = $this->property_model->getproperty_list();

		$data['profile_details']  = $this->task_model->get_user_details();
		$data['task_type']  = $this->task_model->get_user_task_category();
		 //~ print_r($data['task_type']);
		$this->template->load_frontend_template($data);
	}
public function task()  
      {  
  
				
             $data = array(
               'user_id'=> $this->input->post("puser_id"),
               'property_name '=>$this->input->post("property_name") ,
			// 'task_name '=>$this->input->post("task_name"),
			 'email '=>$this->input->post("email"),
			'description '=>$this->input->post("description"),
			'apartment_id '=>$this->input->post("p_pid"),
			//'address '=>$this->input->post("address"),
			//'phone_number '=>$this->input->post("phone"),
			//'alternative_phone_number '=>$this->input->post("phone_number"),
			//'username '=>$this->input->post("username"),
			'status'=>$this->input->post("status"),
			'task_catname'=>$this->input->post("task_catname"),
			'task_catid'=>$this->input->post("task_catid"),
			'task_cat_shotname'=>$this->input->post("shotname"),
			  'image_path' =>  $this->input->post("img_val_gally")
			);
			$insert_id = $this->task_model->task_insert($data);
                    
                  
           }  
public function tasklist()
	{
		$data['base_url'] = base_url();
		$data['get_task_list']  = $this->task_model->get_task1_details();
		$data['view_file']  = "task/list_task";
		$data['current_menu']  = "task";
		$data['sub_menu']  = "list_task";
		$this->template->load_frontend_template($data);
	}
public function task1_delete()
	{
	
			if ($this->input->is_ajax_request()){
			$user_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->task_model->task1_delete(array("status"=>"deactive"),array("ID"=>$user_id));
			}
			if($task  == 'p'){
					$this->task_model->task1_delete_permanently(array("ID"=>$user_id));
			}
			echo TRUE;
		}
	}
		
//~ public function edit_task($task_id = 0)
	//~ {
			
			//~ $data['base_url'] = base_url();
			 //~ $task_det_data = $this->task_model->get_list_task($task_id);
		
			 //~ if(!empty($task_det_data))
			 //~ {
			 //~ foreach($task_det_data as $task_det_data_val )
			 //~ {
			//~ $data['getlisttaskdetails'] = 	$task_det_data_val;
			 
			 //~ }
			
			 //~ }
			 		//~ $data['aparment_id']  = $this->property_model->getpropertyall_list();

					//~ $data['current_menu']  = "task";
		//~ $data['get_taskimage']  = $this->task_model->get_taskimage($task_id);		
		//~ $data['task_type']  = $this->task_model->get_user_task_category();

		//~ $data['view_file']  = "task/edit_task";

		//~ $this->template->load_frontend_template($data);	
		
//~ }


	public function edit_task($task_id = 0)
	{
		$taskid = $_GET['taskid'];					
		$data['base_url'] = base_url();
		$task_det_data = $this->task_model->get_list_task($taskid);
		
		//~ echo '<pre>';
		//~ print_r($task_det_data);
		//~ echo '</pre>';
		//~ exit;
		
		//echo $this->db->last_query();
		//~ if(!empty($task_det_data))
		//~ {
			//~ foreach($task_det_data as $task_det_data_val )
			//~ {
			

			//~ }
		//~ }
		
		$data['aparment_id']  		= $this->property_model->getpropertyall_list();
		$data['current_menu']  		= "task";
		$data['get_taskimage']  	= $this->task_model->get_taskimage($task_id);		
		$data['task_type']  		= $this->task_model->get_user_task_category();
		$data['view_file']  		= "task/edit_task";
		$data['get_task_list']  	= $task_det_data;
		$data['getlisttaskdetails'] = $task_det_data[0];		
		//$data['getproperty'] 		= $this->task_model->get_property_task($task_det_data[0]->apartment_id);
		
		$var						= $this->task_model->get_property_task($task_det_data[0]->apartment_id);
		
		//~ echo '<pre>';
		//~ print_r($var);
		//~ echo '</pre>';
		//~ exit;
		
		$this->template->load_frontend_template($data);	
			
	}

	public function edit_booking($task_id = 0)
	{
	
		$user_id = $this->session->userdata('id_user_master');
		
		$data['base_url'] = base_url();
		$data['view_file']  = "booking_update";
		$data['get_task']  = $this->task_model->get_task_details();
		$data['get_apartment']  = $this->property_model->getproperty_list();
		$data['get_task_update']  = $this->task_model->get_front_edit_details($task_id,$user_id);
	
		$this->template->load_front_home_template($data);
	
	}
	
	public function update_task_list()
	{	
		if ($this->input->is_ajax_request())
		{
			$data = array(	
			'email '=>$this->input->post("email"),
			'description '=>$this->input->post("description"),
			'apartment_id '=>$this->input->post("property_type"),
			'task_catname '=>$this->input->post("task_catname"),
			'property_name '=>$this->input->post("property_name"),
			'status'=>$this->input->post("status"),
			'image_path' =>  $this->input->post("img_link")
			);
			
			$this->task_model->update_t($data,array("id"=>$this->input->post("task_id")));	
		} 
	}
	

	public function img_update_task_list()
	{
		if ($this->input->is_ajax_request())
		{
			$output = '';
			$config["upload_path"] = './uploads/';
			$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if($this->upload->do_upload('file'))
			{				
				$data = $this->upload->data();
				$output .= $data["file_name"];
				echo $output;   
			}
			else
			{				
					echo $this->upload->display_errors();  
			} 
		}     
	} 
	
	
	//~ public function cate_icon_upload(){
		//~ if ($this->input->is_ajax_request()){
			//~ $config['upload_path']          = FCPATH.'assets/images/icons';
			//~ $config['allowed_types']        = 'gif|jpg|png';
			//~ $this->load->library('upload', $config);
			//~ if ( ! $this->upload->do_upload('file')){				
				//~ echo "fail";
				//~ exit;
			//~ }
			//~ else{
				//~ $data =  $this->upload->data();			
				//~ echo "assets/images/icons/".$data['file_name'];
				//~ exit;
			//~ }		
		//~ }
	//~ }
	
	public function task_image()
	{
		if ($this->input->is_ajax_request())
		{
			$output = '';
			$config["upload_path"] = './uploads/';
			$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file'))
			{
			$data = $this->upload->data();
			$output .= $data["file_name"];
			}
			echo $output;   
		}     
	}


}
