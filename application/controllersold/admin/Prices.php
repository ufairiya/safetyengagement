<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prices extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		$this->load->model('prices_model');
		$this->load->model('property_model');
		$this->load->model('task_model');
		$this->load->model('users_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');


	}
	
	public function index()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "prices/create_price";
		$data['current_menu']  = "prices";
		$data['sub_menu']  = "create_price";		
				$data['task_type']  = $this->task_model->get_user_task_category();

		$this->template->load_frontend_template($data);
	}
	public function price_list()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "prices/price_list";
		$data['current_menu']  = "prices";
		$data['sub_menu']  = "list_price";		
				$data['get_price_list']  = $this->prices_model->get_price_list();

		$this->template->load_frontend_template($data);
	}
	
	public function addprice()
	{					

					if ($this->input->is_ajax_request()){
					
$pricename = array_filter($this->input->post('cate_price_name'));

$price= array_filter($this->input->post('cate_price'));
$desciption= array_filter($this->input->post("desc"));
		$data = array('sub_title'=>$this->input->post("sub_title"),
						    'pricename'=>serialize($pricename),
						    'price'=>serialize($price),
							'categoriesname'=>$this->input->post("task_catname"),
							'categoriesid'=>$this->input->post("task_catid"),
							'description'=>serialize($desciption),
							'status'=>$this->input->post("status"),
			);
			$insert_id = $this->prices_model->price_insert($data);
	}	
	
	}
	public function update_price()
	{					

					if ($this->input->is_ajax_request()){
					$p_id = $this->input->post("id");

$pricename = array_filter($this->input->post('cate_price_name'));

$price= array_filter($this->input->post('cate_price'));
$desciption= array_filter($this->input->post("desc"));

		$data = array('sub_title'=>$this->input->post("sub_title"),
						    'pricename'=>serialize($pricename),
						    'price'=>serialize($price),
							'categoriesname'=>$this->input->post("task_catname"),
							'categoriesid'=>$this->input->post("task_catid"),
							'description'=>serialize($desciption),
							'status'=>$this->input->post("status"),
			);
			$update_price = $this->prices_model->update_price($data,$p_id);
	}	
	
	}
	
	public function edit_price($price_id = 0)
	{
			
			$data['base_url'] = base_url();
			 $task_det_data = $this->prices_model->get_user_single_price($price_id);
		//echo $this->db->last_query();
			 if(!empty($task_det_data))
			 {
			 foreach($task_det_data as $task_det_data_val )
			 {
			$data['getlistpricedetails'] = 	$task_det_data_val;
			 
			 }
			
			 }
			 		$data['task_type']  = $this->task_model->get_user_task_category();

			// print_r($data);
					$data['current_menu']  = "prices";
		

		$data['view_file']  = "prices/edit_price";

		$this->template->load_frontend_template($data);	
		
}
	
}
