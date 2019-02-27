<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Prices_model extends CI_Model{
    
	public $table = "prices";
	
	   // Create New User
	public function price_insert($data)
	{
			$this->db->insert($this->table, $data);	
			return $this->db->insert_id();
		
	}
	public function update_price($data,$p_id)
	{
					$this->db->where('id',$p_id);
					
				
			return $this->db->update($this->table, $data);	
		
	}
	public function get_price_list()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('sub_title','asc');
		$query =$this->db->get();
		$result = $query->result();
//~ var_dump($result);
//~ exit;
			return $result;
		
	}
	public function get_user_single_price($pri_id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$pri_id);
		$query =$this->db->get();
		$result = $query->result();
//~ var_dump($result);
//~ exit;
			return $result;
		}
	public function getcate_price($pri_id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('categoriesid',$pri_id);
		$query =$this->db->get();
		$result = $query->result();
//~ var_dump($result);
//~ exit;
			return $result;
		
	}
	
}
