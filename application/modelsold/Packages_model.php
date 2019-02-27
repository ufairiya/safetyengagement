<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model{
    
	public $table = "packages";
	
	   // Create New User
	public function insert_package_admin($data)
	{
		$this->db->insert($this->table, $data);	
		return $this->db->insert_id();
		
	}
	public function delete_packages_list($p_id)
	{
		$this->db->where('pkgid',$p_id);
		return $this->db->delete($this->table);	
	}
	public function update_package_admin($data,$p_id)
	{
		$this->db->where('pkgid',$p_id);
		return $this->db->update($this->table, $data);	
	}
	public function get_packages_list()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('package_name','asc');
		$query =$this->db->get();
		$result = $query->result();
		return $result;
	}
	public function get_packages_pkgid($pkgid)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('pkgid',$pkgid);
		$this->db->order_by('package_name','asc');
		$query =$this->db->get();
		$result = $query->row();
		return $result;
		
	}
	public function get_user_single_price($pri_id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$pri_id);
		$query =$this->db->get();
		$result = $query->result();
		return $result;
	}
	public function getcate_price($pri_id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('categoriesid',$pri_id);
		$query =$this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function package_ins($data)
	{
		$this->db->insert('subscription_package', $data);	
		return $this->db->insert_id();
		
	}
	public function get_subscription_package($user_id)
	{
		$this->db->select('*');
		$this->db->from('subscription_package');
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$query =$this->db->get();
		$result = $query->row();
		return $result;
	}
	public function get_sub_package($pkgid)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('pkgid',$pkgid);
		$query =$this->db->get();
		$result = $query->row();
		return $result;
	}
	public function get_packages($last_insert_id)
	{
		$this->db->select('*');
		$this->db->from('subscription_package');
		$this->db->where('id',$last_insert_id);
		$query =$this->db->get();
		$result = $query->row();
		return $result;

	}
	public function update_jobbid($data_pkg,$package_id)
	{
		$this->db->where('id',$package_id);
		return $this->db->update('subscription_package', $data_pkg);	
	}
}
