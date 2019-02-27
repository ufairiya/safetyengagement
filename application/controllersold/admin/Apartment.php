<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment extends CI_Controller {
	
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
		
	//~ public function index()
	//~ {
		//~ $data['base_url'] = base_url();
		//~ $data['view_file']  = "apartment/property_list";
		//~ $data['current_menu']  = "apartment";
		//~ $data['sub_menu']  = "propertylist";
		//~ $data['list_of_properties']  = $this->property_model->getproperty_list();
		
		//~ $this->template->load_frontend_template($data);
	//~ }
	public function propertylist()
	{
		$data['base_url'] = base_url();
		$data['admin_of_properties']  = $this->property_model->getpropertyall_list();
		$data['view_file']  = "apartment/property_list";
		$data['current_menu']  = "apartment";
		$data['sub_menu']  = "propertylist";		
		$this->template->load_frontend_template($data);
	}
	public function add_new_property()
	{
		if ($this->input->is_ajax_request()){
			
			 $user_type = $this->session->user_type;
	
			
		if(($this->input->post("user_email") != '') && (($user_type = 'superuser') || ($user_type = 'application_user'))){							
				 //$user_master_id = $this->session->user_id;	
					if($this->session->userdata('user_type') == 'superuser')
					{
						$user_master_id = $this->session->userdata('user_id');
					}	
					elseif($this->session->userdata('user_type') == 'application_user')
					{
						$user_master_id = $this->session->userdata('id_user_master');
					}	
				$property_details = array(
					'property_user_id'=> $this->input->post("p_uid"),					
					'property_name'=>$this->input->post("property_name") ,					
					'property_type'=>$this->input->post("property_type"),					
					'property_landmark'=>$this->input->post("property_landmark"),
					'property_address'=>$this->input->post("property_address"),
					//~ 'property_street'=>$this->input->post("property_street"),
					//~ 'property_city'=>$this->input->post("property_city"),
					'property_country'=>$this->input->post("property_country"),					
					//~ 'property_postcode'=>$this->input->post("property_postcode"),
					//'property_country' => $this->input->post("property_country"),					
					//~ 'property_phone'=>$this->input->post("property_phone"),
					'property_status'=>$this->input->post("property_status"),
					'created_on'=>getCurrentDateTime(),
					'user_email' => $this->input->post("property_email"),
					
			    );
			    $property_id = $this->property_model->property_insert($property_details);
			}
		}
	}
	
	public function save_apartment_admin()
	{
		$apartment_details	=	array(
					'property_user_id'=> $this->input->post("users_name"),					
					'property_name'=>$this->input->post("apartment_name"),
					'property_type'=>'apartment',
					'property_address'=>$this->input->post("apartment_address")
					);
		$apartment_id 	=	$this->property_model->property_insert($apartment_details);
		if($apartment_id)
		{
			redirect('propertycreate');
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
		
public function update_apartment()
	{
		
		if($this->session->user_type == 'superuser')		{
			$apart_id =$this->input->get('apart_id');
			
			$data['base_url'] 		= base_url();
			$data['current_menu']  = "apartment";
			$data['sub_menu']  = "propertylist";
			$data['get_property_list']  	=  $this->property_model->getproperty_list(); 
			$data['get_property_row']  	=  $this->property_model->getproperty_row($apart_id ); 
			$data['view_file']  	= "apartment/update_apartment";
			$this->template->load_frontend_template($data);
		}
		else
		{
			
			redirect('admin');
		}
	}
			public function deleteaprt()
	{
		$pid = $this->input->post('pid');
		
		$resdelete = $this->property_model->deleteproperty($pid );
if(!empty($resdelete))
{
	echo "success";
}
else
{
	echo "notsucess";
	}


		
	}
		public function delete_apartment()
	{
		
		if($this->session->user_type == 'superuser')		{
					$apart_id =$this->input->get('apart_id');
		$this->property_model->deleteproperty_row($apart_id );
		
			$data['base_url'] 		= base_url();
		$data['current_menu']  = "apartment";
		$data['sub_menu']  = "propertycreate";
			$data['get_property_list']  	=  $this->property_model->getproperty_list(); 
			$data['get_property_row']  	=  $this->property_model->getproperty_row($apart_id ); 
		$data['view_file']  = "apartment/create_apartment";
			$this->template->load_frontend_template($data);
		
		}
		else
		{
			
			redirect('admin');
		}
	}
			public function update_apartment_details()
	{
		
		if ($this->input->is_ajax_request()){
			$apart_id = $this->input->post('apart_id');
			$property_details= array( 'property_user_id'=> $this->session->userdata('id_user_master'),'user_email'=> $this->session->userdata('email'),
			'property_address'=> $this->input->post('apartment_addr'),'property_type'=> $this->input->post('apart_type'),
			'property_name'=> $this->input->post('apart_title'),'property_landmark'=> $this->input->post('apart_land'),'property_country'=> $this->input->post('apart_country'),'property_name'=> $this->input->post('apart_title'),'modify_on'=>getCurrentDateTime(),
'property_status'=> 'active');
		  //~ $this->task_model->property_title_update_task($apart_id,array('property_name' => $this->input->post('apart_title')));
//~ exit;
		 $property_id = $this->property_model->property_update_fr($property_details,$apart_id);

	
			
		}
	}
			public function updateprpropertydetails()
	{
		
		if ($this->input->is_ajax_request()){
			$apart_id = $this->input->post('aptid');
			$property_details= array( 'property_address'=> $this->input->post('aptaddress'),'property_name'=> $this->input->post('aptname'));
		  //~ $this->task_model->property_title_update_task($apart_id,array('property_name' => $this->input->post('apart_title')));
//~ exit;
		 $property_id = $this->property_model->property_update_fr($property_details,$apart_id);
		if(!empty($property_id))
	{
	echo json_encode(array('success' => 'success'));
	}


	
			
		}
	}
	public function update_property()
	{			
		$uemail = $this->session->user_email;	
		
		$property_id = $this->input->post("property_id");
			$property_details = array(
				'property_name'=>$this->input->post("property_name"),					
				'property_type'=>$this->input->post("property_type"),					
				'property_landmark'=>$this->input->post("property_landmark"),
				'property_address'=>$this->input->post("property_address"),
				//~ 'property_street'=>$this->input->post("property_street"),
				//~ 'property_city'=>$this->input->post("property_city"),
				//~ 'property_state'=>$this->input->post("property_state"),					
				//~ 'property_postcode'=>$this->input->post("property_postcode"),
				//'property_country' => $this->input->post("property_country"),					
				//~ 'property_phone'=>$this->input->post("property_phone"),
				'property_status'=>$this->input->post("property_status"),
				
			);
		
		$property_id = $this->property_model->property_update($property_details,$property_id);

		exit;

		
    }
	public function edit_property($property_id = 0)
	{
		

		$user_type = $this->session->user_type;
		$user_master = $this->session->id_user_master;
					

		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();
			 $pro_det_data = $this->property_model->geteditproperty_list($property_id);
			 if(!empty($pro_det_data))
			 {
			 foreach($pro_det_data as $pro_det_data_val )
			 {
				 			$data['getpropertydetails'] = 	$pro_det_data_val;
				 }
			 }
			 			$this->load->view('backend/apartment/user_edit_property',$data);		
			}
	}
	

	public function propertycreate()
	{
		$data['base_url'] = base_url();
		$data['user_type'] = $this->users_model->getUserLevel(array("status"=>'1'));
		$data['profile_details']  = $this->task_model->get_user_details();
		$data['app_users_list']	=	get_users_list(array('user_type'=>'application_user','status'=>'1'));
		$data['propertyall_list'] = $this->property_model->getpropertyall_list();
		$data['current_menu']  = "apartment";
		$data['sub_menu']  = "propertycreate";
		$data['view_file']  = "apartment/create_apartment";
		$this->template->load_frontend_template($data);
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
	
	

}
