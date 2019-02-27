<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sentitems extends CI_Controller {

	public function __construct(){
        parent::__construct();    
        //~ $this->load->model('user_model');
        $this->load->model('message_model');
        $this->level = $this->session->userdata('user_level');
        if($this->level != 'admin'){
            $this->className = 'hide';   
        }
        $this->message_model->count_messages();
    }
        function index(){
         $msg = $this->message_model;
        
         $data['record'] = $msg->get_messages_sent();  
         if(!$data['record']){
             $data['nodata'] = TRUE;   
        }
        $data['contacts'] = $msg->get_contacts();
        		$data['base_url'] = base_url();

        $data['title'] = 'Messages';
        //~ $data['user'] = $this->user_model->user_info();
        $data['main'] = 'sentitems';
		$data['view_file']  = "message/sentitems";
		$data['current_menu']  = "dashboard";
	$this->template->load_front_home_template($data);
    }
    
    function search(){
        $msg = $this->message_model;
        $data['record'] = $msg->get_messages_sent_by_search();
        if(!$data['record']){
            $data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search Message';
        $data['user'] = $this->user_model->user_info();
        $data['main'] = 'sentitems';
		$this->load->view('include/template',$data);
    }
    
    
    function trash(){
        $msg = $this->message_model;
        
        $data['record'] = $msg->get_messages_trash();  
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->user_model->user_info();
		$this->load->view('inbox/trash',$data);
    }
    
    function read_message(){
        $id = $this->input->post('id');
        $data['msg'] = $this->message_model->get_message_sent_by_id($id);
        echo json_encode($data['msg']); 
    }
    function delete(){
        $msg = $this->message_model;        
        $msg->delete_message_sent();
        redirect('sentitems?delete');
    }
   
}
