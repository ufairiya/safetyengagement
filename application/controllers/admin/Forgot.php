<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	}
		
	public function index()
	{
		redirect('login');	
	}
	
    public function unquie_email(){	
		if ($this->input->is_ajax_request()){
			
			$type = $this->input->post('type');		
				
			if($type == 'email'){
				$useremail = $this->input->post('useremail');			
				$validate= getUseruniqueDetails(array('email'=>$useremail));
				if($validate == 'false'){
					echo  'true';
				}else
				{
					echo 'false';
				}
				exit;
			}
		}
	
	}
	public function password($user_key){
		if($user_key == ''){
			$this->session->set_flashdata('error_msg', '<p>Password Link is not valid</p>');
			redirect('login');
			exit;
		}
		
		$result = getUserBasicDetails(array('reset_pwd'=>$user_key),'',array('image'=>FALSE));
		
		if($result == FALSE){
			$this->session->set_flashdata('error_msg', '<p>Password Link is not valid</p>');
			$this->users_model->update(array('reset_pwd'=>''), array('id_user_master'=>$result->id_user_master));
			redirect('login');
		}
		
		$data['base_url'] = base_url();
		$data['user_key'] =$user_key;
		$data['view_file']  = "forgot_password";
		$this->template->load_admin_login_template($data);
		
	}
	public function reset_password($user_key){	
	
		if ($this->input->is_ajax_request()){
			
			$result = getUserBasicDetails(array('reset_pwd'=>$user_key),'',array('image'=>FALSE));
			
			if($result == FALSE){
				$this->session->set_flashdata('error_msg', '<p>Not Vaild Password reset link . Please check on that</p>');
				$this->users_model->update(array('reset_pwd'=>''), array('id_user_master'=>$result->id_user_master));
				echo "fail";
				exit;
			}
			
			$password = $this->input->post("password");
			if($password == ''){
				$this->session->set_flashdata('error_msg', 'p>Not Vaild Password reset link . Please check on that</p>');
				$this->users_model->update(array('reset_pwd'=>''), array('id_user_master'=>$result->id_user_master));
				echo "fail";
				exit;
			}	
			
			
			$this->users_model->update(array('password'=>sha1($password),'reset_pwd'=>''), array('id_user_master'=>$result->id_user_master));
			$this->session->set_flashdata('error_msg', '<p>Password reset successfully</p>');			
			echo "success";
			exit;
		}
	}
	
	
	public function process_forgot(){	
	
		if ($this->input->is_ajax_request()){
			$this->load->model('email_model');
			$this->load->helper('string');
			
			$useremail = $this->input->post('useremail');
			
			$password_reset =  random_string('alnum',10);
			
			$this->users_model->update(array('reset_pwd'=>$password_reset), array('email'=>$useremail));

			$result = getUserBasicDetails(array('email'=>$useremail),'',array('image'=>FALSE));
			
			
			$forgot_password_id = $this->email_model->get_email_template_settings(array('email_template_name'=>'forgot_password'),'row');
						
			$forgot_password_template = $this->email_model->get_email_template(array('id_email_template'=>$forgot_password_id->id_email_template),'row');
			
			$data['view_file'] = "forgotpassword";
			$data['message'] = $forgot_password_template->email_template_body;
			$data['password_link'] = base_url()."forgot/password/".$password_reset;
			$data['username'] = $result->first_name.' '.$result->last_name;		
			
			$mailTo  = $useremail;
			$nameTo = $result->first_name.' '.$result->last_name;
			
			$mailFrom  ="v@stallioni.com";
			$nameFrom  = "Arya project Board";
			
			$subject  ="Forgot Password Reset Link";
			$body 	  = $this->template->load_email_template($data);			

			$this->mail_model->htmlEmail($mailTo, $nameTo ,$mailFrom, $nameFrom, $subject, $body);
			$this->session->set_flashdata('error_msg', '<p>Reset link send successfully to your mail id </p>');			
			echo "success";
			exit;
		}	
	}
}
