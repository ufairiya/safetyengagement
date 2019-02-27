<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
		$this->load->model('prices_model');
		$this->load->model('packages_model');
		$this->load->model('bids_model');
		$this->load->model('property_model');
		$this->load->model('task_model');
		$this->load->model('users_model');
		$this->load->model('purchaseorder_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');
	}
	public function index()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "packages/packages";
			$data['current_menu']  = "appointment";			
			$data['get_packages_list']  = $this->packages_model->get_packages_list();
			$this->template->load_frontend_template($data);		
	}

	public function bidjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/bidjob_list";
			$data['current_menu']  = "bidpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allbidjob();
			$this->template->load_frontend_template($data);		
	}
	public function postjob_list()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "job/postjob_list";
			$data['current_menu']  = "jobpost";			
			$data['get_allpostjob']  = $this->bids_model->get_allpostjob();
			$this->template->load_frontend_template($data);		
	}
	
}
