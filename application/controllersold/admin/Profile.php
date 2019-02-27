<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
	}
		
	public function index()
	{
		$user_id = get_active_user_id();
		
		$data['base_url'] = base_url();
		$data['view_file']  = "user/profile";
		$data['current_menu']  = "profile";		
		$data['user_information']  = getUserBasicDetails(array('id_user_master'=>$user_id),'',array('image'=>TRUE));		
		$this->template->load_frontend_template($data);
	}
	
	public function update(){
		
		
		if ($this->input->is_ajax_request()){
			
			$data["first_name"] = $this->input->post('first_name');
			$data["last_name"] = $this->input->post('last_name');
			$data["country_code"] = $this->input->post('country_code');
			$data["profile_image"] = $this->input->post('img_link');
			$data["phone"] = $this->input->post('phone');
			$this->users_model->update($data, array('id_user_master'=>get_active_user_id()));
			echo  'true';
			exit;			
		}	
	}
	
	public function checkcurrentpassword(){
		var_dump($this->input->post());
		exit;
		
	}
	public function changepassword(){
		
		
		if ($this->input->is_ajax_request()){
						
			$current_password  = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$get_user = getUserBasicDetails(array('password'=>md5($current_password),'id_user_master'=>get_active_user_id()));
			//~ var_dump($get_user);
			//~ exit;
			if($get_user == FALSE){
				echo 'current_fail';
				//~ exit;
			}
			$data['password'] = md5($new_password);
			$this->users_model->update($data, array('id_user_master'=>get_active_user_id()));
			echo  'true';
			//~ exit;			
		}	
	}
	
	public function profile_image_update(){
				if ($this->input->is_ajax_request()){						

		 $output = '';
   $config["upload_path"] = './uploads/';
  $config['overwrite'] = TRUE;
   $config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
   $this->load->library('upload', $config);
   $this->upload->initialize($config);


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
					$output .= $data['upload_data']['file_name'];
			} 
  
     echo $output;   
    }
      
  
	}
}
