<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('task_model');
		$this->load->model('service_model');
		$this->load->model('property_model');
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	

	}
	public function index()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "invoice/invoice";
		$data['current_menu']  = "invoice";
		$data['get_service_report_details']  = $this->service_model->getinvoicereport_list_view();		
		$this->template->load_frontend_template($data);
	}
	
}
