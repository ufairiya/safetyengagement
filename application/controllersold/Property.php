<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('property_model');		
		$this->load->model('task_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');				
	}
	public function index()
	{
		if($this->session->user_type_fr == 'application_user' || $this->session->user_type_fr == 'superuser' || $this->session->user_type_fr == 'contractor'){
			$data['base_url'] 		= base_url();
			$data['get_property_list']  	=  $this->property_model->getproperty_list(); 
			$data['current_menu']  	= "property";
			$data['sub_menu']  		= "view_property";
			$data['view_file']  	= "create_apartment";
			$this->template->load_front_home_template($data);
		}
		else
		{
			
			redirect('Home');
		}
		
	}
	public function list_property()
	{
		if($this->session->user_type_fr == 'application_user' || $this->session->user_type_fr == 'superuser' || $this->session->user_type_fr == 'contractor'){	
		$data['base_url'] 		= site_url();
		$data['view_listofproperties']  	= $this->property_model->getproperty_list(); 
		$data['view_file']  	= "property/view_property";
		$data['current_menu']  	= "property";
		$data['sub_menu']  		= "list_property";	
		$this->template->load_front_home_template($data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function edit_property($property_id = 0)
	{
		$user_type = $this->session->user_type_fr;
		$user_master = $this->session->id_user_master;
					

		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			$data['current_menu']  	= "property";
			$data['sub_menu']  		= "edit_property";
			 $pro_det_data = $this->property_model->geteditproperty_list($property_id);
			 if(!empty($pro_det_data))
			 {
			 foreach($pro_det_data as $pro_det_data_val )
			 {
				 			$data['getpropertydetails'] = 	$pro_det_data_val;
				 }
			 }
			 			$this->load->view('front/property/user_edit_property',$data);		

			 
		}
	}
	


	public function add_new_property()
	{
		if ($this->input->is_ajax_request()){
						 $user_type = $this->session->user_type_fr;

			// $email = $this->session->email;
		if($this->session->user_type_fr == 'application_user' || $this->session->user_type_fr == 'superuser' || $this->session->user_type_fr == 'contractor'){							
			 $user_master_id = $this->session->id_user_master;	

				$property_details = array(
					'property_user_id'=> $user_master_id,					
					'property_name'=>$this->input->post("property_name"),					
					'property_type'=>$this->input->post("property_type"),					
					'property_landmark'=>$this->input->post("property_landmark"),
					'property_street'=>$this->input->post("property_street"),
					'property_city'=>$this->input->post("property_city"),
					'property_state'=>$this->input->post("property_state"),					
					'property_postcode'=>$this->input->post("property_postcode"),
					'property_country' => $this->input->post("property_country"),					
					'property_phone'=>$this->input->post("property_phone"),
					'property_status'=>$this->input->post("property_status"),
					'created_on'=>getCurrentDateTime(),
					'user_email' => $this->input->post("user_email"),
					
			    );
			    $property_id = $this->property_model->property_insert($property_details);
			}
			
			
		}
	}
	


	

	
	public function unquie_property()
	{
		if ($this->input->is_ajax_request())
		{
		
			$type = $this->input->post('type');		
				
			if($type == 'propertyname'){
				$property_name = $this->input->post('property_name');							
					echo getPropertyuniqueDetails(array('property_name'=>$property_name));
					exit;
			}
	
			
			
		}
	}
		

		public function update_property()
		{	
			
			$property_id = $this->input->post("property_id");
				$property_details = array(
					'property_name'=>$this->input->post("property_name"),					
					'property_type'=>$this->input->post("property_type"),					
					'property_landmark'=>$this->input->post("property_landmark"),
					'property_street'=>$this->input->post("property_street"),
					'property_city'=>$this->input->post("property_city"),
					'property_state'=>$this->input->post("property_state"),					
					'property_postcode'=>$this->input->post("property_postcode"),
					'property_country' => $this->input->post("property_country"),					
					'property_phone'=>$this->input->post("property_phone"),
					'property_status'=>$this->input->post("property_status"),
					
			    );
			
		$property_id = $this->property_model->property_update($property_details,$property_id);

			exit;	

		
    }
		public function property_delete()
	{
	
			if ($this->input->is_ajax_request()){
			$property_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->property_model->property_delete(array("property_status"=>"deactive"),array("ID"=>$property_id));
			}
			if($task  == 'p'){
					$this->property_model->property_delete_permanently(array("ID"=>$property_id));
			}
			echo TRUE;
			exit;
		}
	}
	
	
	
	
	public function add_new_apartment()
	{
		
		
		if ($this->input->is_ajax_request()){
			if(!empty($this->input->post()))
			{
			
			$property_details= array( 'property_user_id'=> $this->session->userdata('id_user_master'),'user_email'=> $this->session->userdata('email'),
			'property_address'=> $this->input->post('apartment_addr'),
			'property_name'=> $this->input->post('apart_title'),'property_name'=> $this->input->post('apart_title'),'created_on'=>getCurrentDateTime(),
'property_status'=> 'active');
//$this->session->set_flashdata('updateapartment','<div class="alert alert-success alert-dismissable">  <a class="close" data-dismiss="alert" aria-label="close">×</a>  Added New Apartment Succesfully .</div>');
		 $property_id = $this->property_model->property_insert($property_details);

		
		}
			
		}
	}
		public function update_apartment()
	{
		
		if($this->session->user_type_fr == 'application_user' || $this->session->user_type_fr == 'superuser' || $this->session->user_type_fr == 'contractor'){
			$apart_id =$this->input->get('apart_id');
			$data['base_url'] 		= base_url();
			$data['current_menu']  	= "property";
			$data['sub_menu']  		= "update_apartment";
			$data['get_property_list']  	=  $this->property_model->getproperty_list(); 
			$data['get_property_row']  	=  $this->property_model->getproperty_row($apart_id ); 
			$data['view_file']  	= "update_apartment";
			$this->template->load_front_home_template($data);
		}
		else
		{
			
			redirect('Home');
		}
	}
		public function update_apartment_details()
	{
		
		if ($this->input->is_ajax_request()){
			$apart_id = $this->input->post('apart_id');
			$property_details= array( 'property_user_id'=> $this->session->userdata('id_user_master'),'user_email'=> $this->session->userdata('email'),
			'property_address'=> $this->input->post('apartment_addr'),
			'property_name'=> $this->input->post('apart_title'),'property_name'=> $this->input->post('apart_title'),'modify_on'=>getCurrentDateTime(),
'property_status'=> 'active');
  //~ $this->task_model->property_title_update_task($apart_id,array('property_name' => $this->input->post('apart_title')));
  ///$this->session->set_flashdata('updateapartment','<div class="alert alert-success alert-dismissable">  <a class="close" data-dismiss="alert" aria-label="close">×</a>  Apartment Updated Successfully .</div>');
			  
		 $property_id = $this->property_model->property_update_fr($property_details,$apart_id);

	
			
		}
	}
		public function delete_apartment()
	{
		
		if($this->session->user_type_fr == 'application_user' || $this->session->user_type_fr == 'superuser' || $this->session->user_type_fr == 'contractor'){
					$apart_id =$this->input->get('apart_id');
				$del_prop =	$this->property_model->deleteproperty_row($apart_id );
			
		if($this->property_model->deleteproperty_row($apart_id ))
		{
		$this->session->set_flashdata('updateapartment','<div class="alert alert-success alert-dismissable">  <a class="close" data-dismiss="alert" aria-label="close">×</a>  Apartment Deleted Successfully .</div>');
		
		}	$data['base_url'] 		= base_url();
			$data['current_menu']  	= "property";
			$data['sub_menu']  		= "delete_apartment";
			$data['get_property_list']  	=  $this->property_model->getproperty_list(); 
			$data['get_property_row']  	=  $this->property_model->getproperty_row($apart_id ); 
			$data['view_file']  	= "create_apartment";
			  

			$this->template->load_front_home_template($data);
		
		}
		else
		{
			
			redirect('Home');
		}
	}
	public function check_properity()
	{
	if ($this->input->is_ajax_request()){
			$check_properity = $this->task_model->getcheck_properity($this->input->post('pid'));
			 if(!empty($check_properity))
			 {
				echo 'success';
				}
				else{
					
				echo 'failed';

					}
		}
	}
}
?>
