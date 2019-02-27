<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaseorder extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		//$this->load->model('property_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');	
		$this->load->model('purchaseorder_model');

	}
	public function createpurchaseorder()
	{
		
		$data['base_url'] = base_url();
		$data['admin_of_appointments']  = $this->purchaseorder_model->get_purchaseorder();		
		$data['view_file']  = "purchaseorder/purchase_order";
		$data['current_menu']  = "purchaseorder";
		$data['sub_menu']  = "purchaseorder";		
		$this->template->load_frontend_template($data);
	}
	
	public function sendpurchaseorder()
	{
		$taskid = $this->input->get('taskid');
		
		$data['base_url'] = base_url();
		$data['view_file']  = "purchaseorder/purchaseorderdoc";
		$data['current_menu']  = "purchaseorderdoc";
		$data['sub_menu']  = "purchaseorderdoc";
		$data['taskid'] = $taskid;	
		$purchase_order = $this->purchaseorder_model->get_purchaseorder_details($taskid);
		$data['purchase_order_details'] = $purchase_order[0];
		$this->template->load_frontend_template($data);
	}
	
	public function changestatustoawaiting()
	{
		$taskid = $this->input->post('id_val');		
		$taskchangetoawaiting = $this->purchaseorder_model->changeawaiting($taskid);
		
	}
	
	
	

}
