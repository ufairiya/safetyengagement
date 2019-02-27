<?php

class Employee_Model extends CI_Model{

    function __construct()
    {
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    public function insertEmployee($data)
    {       
        $this->db->insert('user_master',$data);  
        return $this->db->insert_id();   
    }
    public function loginUser($username, $password)
    {	
        $query = $this->db->get_where('user_master', array('email' => $username, 'password' => $password,'status'=> 1));   //status sholud be 1
        if($query->num_rows() == 1)
        {           
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->id_user_master;
                $userArr[1] = $row->first_name;
                $userArr[2] = $row->user_type;
                $userArr[3] = $row->companyname;
                
            }
            $userData = array(
                'id_user_master' => $userArr[0],
                'username' => $userArr[1],
                'email' => $username,
                'user_type_fr' => $userArr[2],
                'user_company' => $userArr[3],
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userData);           
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    public function sendEmail($receiver,$uname,$lastid)
    {
		$baseurl = base_url();
        $from = "omaraw1965@gmail.com";    //senders email address
        $subject = 'Verify email address';  //email subject
        $message = 'hi';
		$this->load->library('email');
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.example.com',
			'smtp_port' => 465,
			'smtp_user' => 'email@example.com',
			'smtp_pass' => 'email_password',
			'mailtype'  => 'html',
			'wordwrap'  => TRUE,
			'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

				//send email
				$this->email->from($from);
				$this->email->cc('test.stallioni@gmail.com,surya@stallioni.com');
				$this->email->to($receiver);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
		 echo  $this->email->print_debugger();
    }
	function getactivedata($key)
    {   
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('md5(email)',$key);
		$result =  $this->db->get(); 
		return $result->row();

    }
    function verifyEmail($key)
    {
        $data = array('status' => 1);
        $this->db->where('id_user_master',$key);
        return  $this->db->update('user_master', $data);    //update status as 1 to make active user
    }
    
    public function checkuniqueemail_api($email)
    {
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('email',$email); 
		$query = $this->db->get();
		return $query->row();
	}
	public function logoutUser_api($key)
    {
		$query = $this->db->get_where('user_master', array('auth_key' =>$key));
	
		if($query->num_rows() == 1)
        { 
			$data = array('auth_key' => '');
			$this->db->where('auth_key',$key); 			
			$update = $this->db->update('user_master', $data);
			return true;
		}
		else
		{
			return false;
		}
	}
	public function uniquecheckauth_api($auth)
	{
		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('auth_key',$auth); 
		$query = $this->db->get();
		return $query->row();
	}
	public function loginUserauth_api($auth,$auth_key)
	{
		$query = $this->db->get_where('user_master', array('auth_key' => $auth,'status'=> 0));   //status sholud be 1
     
        if($query->num_rows() == 1)
        { 
			$data = array('status' => '1','auth_key' => $auth_key);
			$this->db->where('auth_key',$auth); 
			$this->db->where('status',0); 			
			$update = $this->db->update('user_master', $data);
			if ($update == 1)
			{
				$this->db->select('id_user_master,first_name,last_name,username,user_workpermitno,workexpirydate,companyname,email,password,phone,user_type,profile_image,auth_key');
				$this->db->from('user_master');
				$this->db->where('auth_key',$auth_key);	        
				$result = $this->db->get();
				return $results =$result->row();
				
			}		
			else
			{
				return false;
			}
		}
	}
    public function loginnewUser_api($userid,$auth)
    {
		$data = array('user_id'=>$userid,'authkey'=>$auth);
		$this->db->insert('user_authkey', $data);

		if (!empty($this->db->insert_id()))
		{
			return $userid;
		}
		
		else
		{
			return false;
		}

	}
    public function loginUser_api($username, $password,$auth)
    {
		$query = $this->db->get_where('user_master', array('email' => $username, 'password' => $password,'status'=> 1));   //status sholud be 1
     
        if($query->num_rows() == 1)
        { 
			$data = array('auth_key' => $auth);
			$this->db->where('email',$username); 
			$this->db->where('password',$password);
			$this->db->where('status','1');			
			$update = $this->db->update('user_master', $data);

			if ($update == 1)
			{
				return $auth;
			}
			
			else
			{
				return false;
			}
			
        }
        else
        {
			return false;
		}
       
	}
    public function sendEmail_api($receiver,$radno)
    {
	
        $from = "test.stallioni@gmail.com";    //senders email address
        $subject = 'Verify email address';  //email subject
       //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Your verification code is: '.$radno.'<br><br>
        <br><br>Thanks';
		//config email settings
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()){
			return true;
        }
        else
        {
            echo "email send failed";
            return false;
        }

    }
}

?>
