<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		//$this->load->view('admin/upload/json');
	}

	public function json()
	{
		$options = [
			'script_url' => site_url('admin/upload/json'),
			'upload_dir' => APPPATH . '../uploads/files/',
			'upload_url' => site_url('uploads/files/')
		];
		$this->load->library('UploadHandler', $options);
	}
}
