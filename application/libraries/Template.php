<?php
class Template{
	private $CI;
	
	public function __construct(){
		$this->CI = & get_instance();
	}
	
	public function load_admin_login_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('login/header', $data);
		$this->CI->load->view('login/'. $data['view_file'], $data);
		$this->CI->load->view('login/footer', $data);
	}
	
	public function load_admin_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('admin/header', $data);
		$this->CI->load->view('admin/'. $data['view_file'], $data);
		$this->CI->load->view('admin/footer', $data);
	}
	public function load_frontend_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('backend/_blocks/header', $data);
		$this->CI->load->view('backend/_blocks/top_menu', $data);
		$this->CI->load->view('backend/'. $data['view_file'], $data);
		$this->CI->load->view('backend/_blocks/footer', $data);
	}
	public function load_front_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('front/_blocks/header', $data);
		$this->CI->load->view('front/'. $data['view_file'], $data);
		$this->CI->load->view('front/_blocks/footer', $data);
	}
	public function load_front_home_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('front/_blocks/header_home', $data);
		$this->CI->load->view('front/'. $data['view_file'], $data);
		$this->CI->load->view('front/_blocks/footer', $data);
	}
	public function load_front_homepreview_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('front/_blocks/header_preview', $data);
		$this->CI->load->view('front/'. $data['view_file'], $data);
		$this->CI->load->view('front/_blocks/footer', $data);
	}
	
	
	public function load_frontend_print_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$this->CI->load->view('backend/'. $data['view_file'], $data);
	}
	
	public function load_email_template($data = array('content' => '', 'title' => '', 'current_menu' => '', 'view_file' => '')){
		$return = $this->CI->load->view('email/template/email_header', $data,TRUE);
		$return .= $this->CI->load->view('email/'. $data['view_file'], $data, TRUE);
		$return .= $this->CI->load->view('email/template/email_footer', $data, TRUE);
		return $return ;
	}
}
