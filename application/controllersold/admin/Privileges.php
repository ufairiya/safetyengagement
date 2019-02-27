<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privileges extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
		$this->load->model('privileges_model');	
		$access_right = user_access_permission('view_privileges');
		if($access_right != TRUE){
			redirect('dashboard');
		}
	}
		
	public function index()
	{
		$data['user_add_access'] = user_access_permission('create_privileges');
		$data['user_edit_access'] = user_access_permission('editing_privileges');
		$data['user_delete_access'] = user_access_permission('deleting_privileges');


		$data['base_url'] = base_url();
		$data['view_file']  = "privileges/privileges";
		$data['current_menu']  = "privileges";
		$data['list_of_privileges']  =  $this->privileges_model->get_privileges();
		$this->template->load_frontend_template($data);
	}
	
	public function create()
	{
		$access_right = user_access_permission('create_privileges');
		
		$data['base_url'] = base_url();
		$data['view_file']  = ($access_right == TRUE) ? "privileges/privileges_create" : "access_denied/access_denied";
		$data['current_menu']  = "privileges";
		$this->template->load_frontend_template($data);
	}
	
	public function privileges_save()
	{
		if ($this->input->is_ajax_request()){
			
			$privileges_id 		= trim($this->input->post('privileges_key_id'));
			$privileges 		= trim($this->input->post('privileges_name'));
			$privileges_key 	= slugify($privileges);
			$privileges_desc 	= trim($this->input->post('privileges_desc'));
			$action_type 		= $this->input->post('action_type');
			
			if($privileges_id == "" && $action_type == 'insert'){
				
				$data['access_privileges_name'] = $privileges;
				$data['access_privileges_key'] = $privileges_key;	
				$data['access_privileges_desc'] = $privileges_desc;		
				
				//tracking code
				$this->usertracking->track_this("New Privilege Created");	
					
				$result = $this->privileges_model->privileges_insert($data);
				echo TRUE;
				exit;
			}
			
			if($privileges_id != "" && $action_type == 'update'){
								
				$data['access_privileges_name'] = $privileges;
				$data['access_privileges_key'] = $privileges_key;	
				$data['access_privileges_desc'] = $privileges_desc;		
				//tracking code
				$this->usertracking->track_this("Privilege Updated");	
	
					
				$result = $this->privileges_model->privileges_update($data,array("id_access_privileges"=>$privileges_id));
				echo TRUE;
				exit;
			}		
		}
	}
	

	public function delete_privileges()
	{
		if ($this->input->is_ajax_request()){
		
			$privileges_id 	= $this->input->post('key');
			$task 			= $this->input->post('task');
			
			if($task  == 'd'){
				$this->usertracking->track_this("Privilege Deleted");
				$this->privileges_model->privileges_update(array("status"=>"2"),array("id_access_privileges"=>$privileges_id));
			}
			if($task  == 'p'){
					$this->usertracking->track_this("Privilege Deleted Permentally");
					$this->privileges_model->privileges_delete(array("id_access_privileges"=>$privileges_id));
			}
			echo TRUE;
			exit;
		}
	}
	
	
	public function get_privilege_edit_template($id_access_privileges = 0)
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['get_of_privileges'] =  $this->privileges_model->get_privileges(array("id_access_privileges"=>$id_access_privileges),"row");
			$this->load->view('backend/privileges/privileges_edit',$data);		
		}
	}

	public function privileges_unquie(){
		
		if ($this->input->is_ajax_request()){			
			$privilege_name = trim($this->input->post('priv_name'));
			$priv_key = trim($this->input->post('priv_key'));
			if( $priv_key != "")
			{
				echo getPrivilegeuniqueDetails(array("access_privileges_name"=>$privilege_name,"id_access_privileges !="=>$priv_key));
				exit;
			}		
			echo getPrivilegeuniqueDetails(array("access_privileges_name"=>$privilege_name));
			exit;
		}
	}	
}
