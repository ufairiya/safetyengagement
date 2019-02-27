<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Employee_Model');
    }
    
    public function index(){
		$this->load->view('front/header');
        $this->load->view('front/signup_view');
        $this->load->view('front/footer');
	}
    
    
     public function signup()
    {
		$jobtravel_distance = ($this->input->post('jobtravel_distance')) ? $this->input->post('jobtravel_distance') : ''	;
		$company_name = ($this->input->post('company_name')) ? $this->input->post('company_name') : '';
		$data = array(
				'first_name' => $this->input->post('jobfirst'),
				'last_name' => $this->input->post('joblastname'),
				'user_type' => $this->input->post('registration_type'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('jobemail'),
				'username' => $this->input->post('jobfirst'),
				'travel_distance' => $jobtravel_distance,
				'zip_code' => $this->input->post('jobzip_code'),
				'companyname' => $company_name, 
				'newsletter' => $this->input->post('newsletter'),
				'created_on' => date('Y-m-d h:i:sa'),
				'status' => 1
		);
$lastid =$this->Employee_Model->insertEmployee($data);
			
		  if($lastid){           
			//$this->email->set_header($header, $value);

				$this->load->library('email');
				$subject = 'Regitration | Satety Engagement';
				$message = '<p>Thank you for registering by Safety Engagement.</p>';
				// Get full html:
				$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
					<title>' . html_escape($subject) . '</title>
					<style type="text/css">
					body {
					font-family: Arial, Verdana, Helvetica, sans-serif;
					font-size: 16px;
					}
					</style>
					</head>
					<body>
					' . $message . '
					</body>
					</html>';


					$result = $this->email->set_header('hello', 'test')
					->set_newline("\r\n")
					->from('admin@safetyengagement.com','omaraw')
					->to($this->input->post('jobemail'))
					->subject($subject)
					->message($body)
					->send();

if($result == true)
{			

			print json_encode(array('status'=>'success'));
	 }
	 else
	{
			 print json_encode(array('status'=>'failed'));

		}
	}
		 else
	{
			 print json_encode(array('status'=>'failed'));
		}
    }
    
    function updateaccount(){

        $this->form_validation->set_rules('txt_empname','Name', 'trim|required');
        $this->form_validation->set_rules('txt_utype','User Type','trim|required');
        $this->form_validation->set_rules('txt_phone','Phone Number', 'trim|required');
        $this->form_validation->set_rules('txt_email','Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txt_new_pass','New Password', 'trim|required');
        $this->form_validation->set_rules('txt_conf_newpass', 'Confirm New Password', 'trim|required|matches[txt_new_pass]');
        var_dump($this->form_validation->run());
        exit;
        if($this->form_validation->run() == false){
	
			         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Not registeration. </div>');

            $this->load->view('front/_blocks/header');
            $this->load->view('front/signup_view');
            $this->load->view('front/_blocks/footer');
            
        }else{
            //call db
            $data = array(
                'user_type' => $this->input->post('txt_utype'),
                'address' => $this->input->post('txt_emp_addr'),
                'email' => $this->input->post('txt_email'),
                'username' => $this->input->post('txt_empname'),
                'created_on' => date('Y-m-d h:i:sa'),
                'password' => trim(md5($this->input->post('txt_password'))),
                'status' => 0
            );
            
            
            if($this->Employee_Model->insertEmployee($data)){
                
                //send confirm mail
                if($this->Employee_Model->sendEmail($this->input->post('txt_email'))){
                    //redirect('Login_Controller/index');
                    //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');

                    $this->load->view('front/_blocks/header');
                    $this->load->view('front/signup_view');
                    $this->load->view('front/_blocks/footer');
                }else{
                    
                  //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
                    $this->load->view('front/_blocks/header');
                    $this->load->view('front/signup_view');
                    $this->load->view('front/_blocks/footer');
                }
                
                
            }
        }
        }
        public function check_email()
	{
					$type = $this->input->post('type');		

		if($type == 'email'){
				$useremail = $this->input->post('useremail');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
				echo $this->users_model->getUsernotexistDetails(array('email'=>$useremail,'id_user_master !='=>$u_key));
					
					
				}
			echo $this->users_model->getUsernotexistDetails(array('email'=>$useremail));
				
				exit;
			}
		
	}
 
        public function unquie_fro_val()
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
	
			
			if($type == 'phone'){
				$userphone = $this->input->post('userphone');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getUseruniqueDetails(array('phone'=>$userphone,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('phone'=>$userphone));
				exit;
			}
			if($type == 'email'){
				$useremail = $this->input->post('useremail');
				
				$u_key = $this->input->post('u_key');
				if($u_key != ""){
					echo getUseruniqueDetails(array('emai'=>$useremail,'id_user_master !='=>$u_key));
					exit;
				}
				echo getUseruniqueDetails(array('email'=>$useremail));
				exit;
			}
		}
	}
       public function user_rating()
       	{
			
		$ratdata =	array('po_id'=>$this->input->post('poid'),'userid'=>$this->input->post('sfuid'),'comid'=>$this->input->post('comid'),'countrating'=>$this->input->post('count'));
		
	$this->users_model->insertrating($ratdata);

	}
       public function user_ratingcompany()
       	{

		$ratdata =	array('po_id'=>$this->input->post('poid'),'usid'=>$this->input->post('sfuid'),'comid'=>$this->input->post('comid'),'countrating'=>$this->input->post('count'));
		
		$this->users_model->insertratingcompany($ratdata);

	}
    
}
