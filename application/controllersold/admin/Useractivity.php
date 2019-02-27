<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useractivity extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('admin/login');
		}
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
	}
		
	public function index()
	{
		if(is_admin()== FALSE)
		{
			$data['base_url'] = base_url();
			$data['view_file']  = "access_denied/access_denied";
			$data['current_menu']  = "";
			
			$this->template->load_frontend_template($data);
			return FALSE;
			
		}
		
		$data['base_url'] = base_url();
		$data['view_file']  = "user_activity/user_activity_list";
		$data['current_menu']  = "user";
			$data['sub_menu']  = "user_activity";
		$data['list_of_users']  = $this->users_model->getUsers($where = array(),'result',TRUE);
		$this->usertracking->track_this("Viewing User Activity List");
		$this->template->load_frontend_template($data);
	}
	
	public function view($user_id)
	{
		if(is_admin()== FALSE)
		{
			$data['base_url'] = base_url();
			$data['view_file']  = "access_denied/access_denied";
			$data['current_menu']  = "";
			$this->template->load_frontend_template($data);
			return FALSE;
		}
		
		$user_id;
		$data['base_url'] = base_url();
		$data['view_file']  = "user_activity/user_activity_view";
		$data['current_menu']  = "user";
		$data['user_activity']  = $this->users_model->getUserActivity(array('user_identifier'=>$user_id));
		$this->usertracking->track_this("Viewing User Activity");
		$this->template->load_frontend_template($data);
	}
}
