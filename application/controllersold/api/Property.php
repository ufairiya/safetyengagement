<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
include( APPPATH . '/libraries/REST_Controller.php');


class Property extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('property_model');		
		$this->load->model('task_model');		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');				
	}
	
	public function add_new_apartment_post()
	{
		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));		
		
			if(!empty($user_details))
			{
				$view_listofproperties  = $this->property_model->checkproperty_list_api($user_details->id_user_master,$this->input->post('apart_title'),$this->input->post('apartment_addr')); 
				
				
				$count_apartment = count($view_listofproperties);
				if($count_apartment < 1)
				{					
					$property_details= array( 
					'property_user_id'=> $user_details->id_user_master,
					'user_email'=> $user_details->email,
					'property_address'=> $this->input->post('apartment_addr'),
					'property_name'=> $this->input->post('apart_title'),
					'created_on'=>getCurrentDateTime(),
					'property_status'=> 'active'
					);		
					$property_id = $this->property_model->property_insert($property_details);
					$get_prop =	$this->property_model->getpropertybyid_api($property_id);		
				
					print json_encode(array('status_code'=> '200','status'=>'successfully inserted','apartment_details'=>$get_prop));
				}
				else
				{
					 print json_encode(array('status_code'=> '409','status'=>'already exist same apartment with same address'));
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
			}
		}
		else
		{
			print json_encode(array('status_code'=> '400','status'=>'please login'));
		}
		
		
	}
	public function list_property_post()
	{
		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));		
			if(!empty($user_details))
			{		
				$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));								
				$view_listofproperties  	= $this->property_model->getproperty_list_api($user_details->id_user_master); 
				print json_encode(array('status_code'=> '200','status'=>'success','propertylist' => $view_listofproperties));
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
			}				
		}
		else
		{
			print json_encode(array('status_code'=> '500','status'=>'please login'));
		}
	}
	public function update_apartment_post()
	{
		
		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));		
		 
			if(!empty($user_details))
			{
				$apart_id = $this->input->post('apart_id');	
				
				$getproperty = $this->property_model->getproperty_api($apart_id, $user_details->id_user_master);
				if(!empty($getproperty))
				{				
					$property_details= array( 'property_address'=> $this->input->post('apartment_addr'),'property_name'=> $this->input->post('apart_title'),'modify_on'=>getCurrentDateTime(),'property_status'=> 'active');
					$property_id = $this->property_model->property_update_api($property_details,$apart_id,$user_details->id_user_master);
					$get_prop =	$this->property_model->getpropertybyid_api($apart_id);	
													
					print json_encode(array('status_code'=> '200','status'=>'apartment updated successfully','update_apartment_details'=>$get_prop));				
				}
				else
				{
					print json_encode(array('status_code'=> '400','status'=>'apartment not updated. please check your apartment id.'));				
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
			}
		
		}
		else
		{
			
			print json_encode(array('status_code'=> '500','status'=>'please login'));
		}
	}
	public function delete_apartment_post()
	{		
		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));		
		 
			if(!empty($user_details))
			{
				$apart_id =$this->input->post('apart_id');
				$getproperty = $this->property_model->getproperty_api($apart_id, $user_details->id_user_master);
				if(!empty($getproperty))
				{
					$del_prop =	$this->property_model->deleteproperty_api($apart_id, $user_details->id_user_master);						
					print json_encode(array('status_code'=> '200','status'=>'apartment deleted successfully'));			
				}
				else
				{
					print json_encode(array('status_code'=> '400','status'=>'apartment not deleted.please check your apartment id'));
				}
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
			}	
		}
		else
		{		
			print json_encode(array('status_code'=> '500','status'=>'please login'));
		}
	}
	public function get_apartment_post()
	{
		if(!empty($this->input->post('auth_key')))
		{
			$user_details = $this->users_model->getUserBasicDetails_api($this->input->post('auth_key'));		
		 
			if(!empty($user_details))
			{
				$apart_id =$this->input->post('apart_id');
				$get_prop =	$this->property_model->getproperty_row_api($apart_id,$user_details->id_user_master );			
				print json_encode(array('status_code'=> '200','status'=> 'success','apartment_details'=> $get_prop));	
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
			}
		}
		else
		{		
			print json_encode(array('status_code'=> '500','status'=>'please login'));
		}
	}

}
	
	
	
	
?>
