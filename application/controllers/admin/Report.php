<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('property_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	
		$this->load->model('task_model');
	}
		
	
	public function index()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "report/report_list";
		$data['current_menu']  = "report";
		//~ $data['sub_menu']  = "report";		
		$this->template->load_frontend_template($data);
	}
	
	
	

}
