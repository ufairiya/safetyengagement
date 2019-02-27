<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
include( APPPATH . '/libraries/REST_Controller.php');


class Registration extends REST_Controller 
{
	function __construct()
    {
		 // Construct the parent class
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Employee_Model');
		$this->load->library('email');

    }
   
    
	public function signup_post()
    {
		$output = '';
					$config["upload_path"] = './uploads/';
					$config["allowed_types"] = 'gif|jpg|png|jpeg|pdf';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					$path = '';
					
					if($this->upload->do_upload('profileimage'))
					{
					$data = $this->upload->data();
					$output .= $data["file_name"];
					$path = $output;
					}
				
		$four_digit_random_number = mt_rand(1000, 9999);
		
		$data = array(
			'first_name' => $this->input->post('txt_empname'),
			'user_type' =>'application_user',
			//~ 'address' => $this->input->post('txt_emp_addr'),
			'Phone' => $this->input->post('txt_phone'),
			'profile_image' => $path,
			'email' => $this->input->post('txt_email'),
			'username' => $this->input->post('txt_empname'),
			'auth_key' =>  $four_digit_random_number,
			'created_on' => date('Y-m-d h:i:sa'),
			'password' => trim(md5($this->input->post('txt_password'))),
			'status' => 0
		);

		$username 			= 	$this->input->post('txt_empname');		
		$details 			= 	$this->Employee_Model->checkuniqueemail_api($this->input->post('txt_email'));

		if(empty($details))
		{
			$lastid =$this->Employee_Model->insertEmployee($data);
						
			if(!empty($lastid))
			{           
				if($this->Employee_Model->sendEmail_api($this->input->post('txt_email'),$four_digit_random_number))
				{
					 $user_details = $this->users_model->getUserBasicDetails_apibyid($lastid );	
					print json_encode(array('status_code'=> '200', 'status'=>'success. please check email for auth key'));
				}
				else
				{                   
					print json_encode(array('status_code'=> '400','status'=>'failed'));			                  
				}                               
			}
			else
			{
				print json_encode(array('status_code'=> '400','status'=>'failed'));								
			}
		}
		else
		{
			print json_encode(array('status_code'=> '409','status'=>'username or email already exist'));
		}

    }
    
    public function authentication_afterregister_post()
    {
		
		$auth = $this->input->post('auth_key');
		$details 			= 	$this->Employee_Model->uniquecheckauth_api($auth);
		if(!empty($details))
		{
			$auth_key = "";
			$characters = array_merge(range('a','z'), range('0','9'));
			$max = count($characters) - 1;
			for ($i = 0; $i < $max; $i++) 
			{
				$rand = mt_rand(0, $max);
				$auth_key .= $characters[$rand];
			}
			
			/*update user master*/
			$res_user = $this->Employee_Model->loginUserauth_api($auth,$auth_key);

			if(!empty($res_user))
			{
				/*insert user authkey*/
				$res_user1 = $this->Employee_Model->loginnewUser_api( $res_user->id_user_master, $auth_key);	
			
				/*get user details*/
			    $user_details = $this->users_model->getUserBasicDetailsnew_api($res_user->id_user_master);	
			    $user_detail = get_object_vars($user_details);
										
				//array_push($user_detail,$auth);
			
				$user_detail['auth_key'] = $auth_key;
			    
				print json_encode(array('status_code'=> '200','status'=>'success','user_details'=>$user_detail));
			}
			else
			{
				print json_encode(array('status_code'=> '409','status'=>'already authenticated.please login'));
			}
		}
		else
		{
			print json_encode(array('status_code'=> '400','status'=>'invalid auth key'));
		}
		
	}
	
	public function unquie_fro_val_post()
	{
		if ($this->input->is_ajax_request()){
		
			$type = $this->input->post('type');		
				
			if($type == 'username'){
				$username = $this->input->post('username');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getUseruniqueDetails(array('username'=>$username,'id_user_master !='=>$u_key));
					exit;
				}
				
				echo getUseruniqueDetails(array('username'=>$username));
				exit;
				
			}
	
			
			if($type == 'email'){
				$useremail = $this->input->post('useremail');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getUseruniqueDetails(array('email'=>$useremail,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('email'=>$useremail));
				exit;
			}
		}
	}
	
       

}
