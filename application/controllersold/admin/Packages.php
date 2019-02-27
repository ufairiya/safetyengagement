<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
		$this->load->model('prices_model');
		$this->load->model('packages_model');
		$this->load->model('bids_model');
		$this->load->model('property_model');
		$this->load->model('task_model');
		$this->load->model('users_model');
		$this->load->model('purchaseorder_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('session');
	}
	public function index()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "packages/packages";
			$data['current_menu']  = "appointment";			
			$data['get_packages_list']  = $this->packages_model->get_packages_list();
			$this->template->load_frontend_template($data);		
	}
	public function package_list()
	{
		$data['base_url'] = base_url();		
		$data['view_file']  = "prices/price_list";
		$data['current_menu']  = "prices";
		$data['sub_menu']  = "list_price";		
		$data['get_price_list']  = $this->prices_model->get_price_list();
		$this->template->load_frontend_template($data);
	}
	public function save_package_admin()
	{					
		$package_name = $this->input->post('package_name');
		$package_month_count= $this->input->post('package_month_count');
		$pkg_count= $this->input->post('pkg_count');
		$package_month_name= $this->input->post('package_month_name');
		$pkg_amt= $this->input->post("pkg_amt");
		$pkg_desc= $this->input->post("pkg_desc");
		$data = array('package_name'=>$package_name,
		'package_month_count'=>$package_month_count,
		'pkg_count'=>$pkg_count,
		'package_month_name'=>$package_month_name,
		'pkg_amt'=>$pkg_amt,
		'pkg_desc'=>$pkg_desc,
		'status'=>$this->input->post("status"));
		$insert_id = $this->packages_model->insert_package_admin($data);
		redirect("admin/packages");
		}
	public function update_package_admin()
	{					
		$package_name = $this->input->post('package_name');
		$package_month_count= $this->input->post('package_month_count');
		$pkg_count= $this->input->post('pkg_count');
		$package_month_name= $this->input->post('package_month_name');
		$pkg_amt= $this->input->post("pkg_amt");
		$pkg_desc= $this->input->post("pkg_desc");
		$data = array('package_name'=>$package_name,
				'package_month_count'=>$package_month_count,
				'pkg_count'=>$pkg_count,
				'package_month_name'=>$package_month_name,
				'pkg_amt'=>$pkg_amt,
				'pkg_desc'=>$pkg_desc,
				'status'=>$this->input->post("status"));
		$insert_id = $this->packages_model->update_package_admin($data,$this->input->post('pkgid'));
		redirect("admin/packages/update_packages/".$this->input->post('pkgid'));
			
	}
	
	public function update_packages($pkgid = 0)
	{
		$data['base_url'] = base_url();
		$data['get_packages_list']  = $this->packages_model->get_packages_list($pkgid);
		$data['get_packages_pkgid']  = $this->packages_model->get_packages_pkgid($pkgid);
		$data['current_menu']  = "packages";
		$data['view_file']  = "packages/edit_packages";
		$this->template->load_frontend_template($data);	

	}
	public function delete_packages($pkgid = 0)
	{
		$data['base_url'] = base_url();
		$delete_packages_list  = $this->packages_model->delete_packages_list($pkgid);
		redirect("admin/packages");
	}
	public function payment()
	{
		    $data['base_url'] = base_url();
			$data['view_file']  = "packages/payment";
			$data['current_menu']  = "payment";			
			$data['get_all']  = $this->bids_model->get_all();
			$this->template->load_frontend_template($data);		
	}
	
}
