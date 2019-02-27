<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Privileges_model extends CI_Model{
    
	public $table_privileges = "access_privileges";  

	/*Privileges*/
	public function privileges_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_privileges, $data);
    }
	
	public function privileges_insert($data)
    {
       $this->db->insert($this->table_privileges, $data);
        return $this->db->insert_id();
    }
	
	public function privileges_delete($where = array())
    {     
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table_privileges);
    }	
	
	public function get_privileges($where = array(),$option_type = "result")
    {   
		$this->db->select('*');
    	$this->db->where($where);
		$result = $this->db->get($this->table_privileges);
     	if($result != FALSE && $result->num_rows()>0) {
			return $result->$option_type();
		}
		return FALSE;
    }
}