<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		if(empty($this->session->userdata('id_user_master')))
		{
			redirect('');
		}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');     	
			$this->load->library('email');
			$this->load->helper('url');	
			$this->load->database();
			$this->load->model('Employee_Model');
			$this->load->library('email');	
			$this->load->model('task_model');
			$this->load->model('property_model');
			$this->load->model('prices_model');
			$this->load->model('purchaseorder_model');
			$this->load->model('service_model');
			$this->load->model('postjob_model');
			$this->load->model('bids_model');
			$this->load->model('packages_model');
	}
	public function index()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "package";
		$data['current_menu']  = "package";
		$user_id = $this->session->userdata('id_user_master');
		$data['get_packages_list']  = $this->packages_model->get_packages_list();

										
		$data['get_subscription_package']  = $this->packages_model->get_subscription_package($user_id);
	
		$data['getpackagedetailsdata'] = $this->Packages_model->getpackagedetailsdata();
		$this->template->load_front_home_template($data);		
	}
	
		public function packagelist()
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "package_list";
		$data['current_menu']  = "package";
			$data['getpackagedetailsdata'] = $this->Packages_model->getpackagedetailsdata();
			$data['getallpackagedetailsdata'] = $this->Packages_model->getallpackagedetailsdata();
                                             //~ var_dump($getpackagedetailsdata);
                                            //~ var_dump($getallpackagedetailsdata);
		$user_id = $this->session->userdata('id_user_master');
		$data['get_packages_list']  = $this->packages_model->get_packages_list();

		
		$data['get_subscription_package']  = $this->packages_model->get_subscription_package($user_id);
	
	
		$this->template->load_front_home_template($data);		
	
	}
	public function package_update()
	{
		$pag_id = $this->input->post('id');	
		$pag_con = $this->input->post('con');	
		$user_id = $this->session->userdata('id_user_master');
		$current_date = date("Y-m-d");
		$package_ins = array('package_id'=>$pag_id, 'package_count'=>$pag_con,'user_id'=>$user_id);		
		echo $insert_package = $this->packages_model->package_ins($package_ins);
	}
	public function package_payment($last_insert_id = 0)
	{
		$data['base_url'] = base_url();
		$data['view_file']  = "package_payment";
		$data['current_menu']  = "package";
		
		$user_id = $this->session->userdata('id_user_master');
		$data['get_packages']  = $this->packages_model->get_packages($last_insert_id);
		$this->template->load_front_home_template($data);		
	}
}
