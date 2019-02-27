<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Property_model extends CI_Model{
    
	public $table 				  = "user_property";
	
   // Create New User
	public function property_insert($data)
	{
			$this->db->insert($this->table, $data);	
			
			return $this->db->insert_id();
		
	}
	public function getproperty_list()
	{
				$user_master_id = $this->session->id_user_master;

		$this->db->select('*');
		$this->db->from($this->table);
		//$this->db->where('user_email',$email);			
		$this->db->where('property_user_id',$user_master_id);	
		$this->db->where('property_status','active');	        
        $result = $this->db->get();
		$results =$result->result();
		return $results;
	}

	public function getpropertyall_list()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from($this->table);
		//$this->db->where('property_user_id',$user_id);	   					   
		$result = $this->db->get();
		$results =$result->result();
		return $results;
	}
	
	public function geteditproperty_list($property_id)
	{
			 $user_type = $this->session->user_type;
			if($user_type == 'application_user')
			{				
				$uemail = $this->session->email;	

			}
			elseif($user_type == 'superuser')
			{
				$uemail = $this->session->user_email;	

			}
	
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('ID',$property_id);
		$result = $this->db->get();
		$results =$result->result();

		return $results;
		
	}
	public function getproperty_curruserlist_($property_id)
	{
	
	
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('property_user_id',$property_id);
		$result = $this->db->get();
		$results =$result->result();

		return $results;
		
	}

 public function property_update($data,$property_id)
	{
		

		$this->db->where('ID',$property_id);
		$results =$this->db->update($this->table, $data);		
	
		return  $results ;
		
	}
		public function property_delete($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
	}
	public function property_delete_permanently($where = array())
	{
		
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table);
	}
		public function getproperty_row($aprt_id)
	{
				
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('ID',$aprt_id);	        
		$result = $this->db->get();
		$results =$result->row();
		return $results;
		
	}
	public function deleteproperty_row($aprt_id)
	{
		if (count($aprt_id) > 0)
        $this->db->where('ID',$aprt_id);
        $delres = $this->db->update($this->table,array('property_status'=>2));	
	}
	public function deleteproperty($aprt_id)
	{
		if (count($aprt_id) > 0)
        $this->db->where('ID',$aprt_id);
        $delres = $this->db->update($this->table,array('property_status'=>2));	
        return $this->db->affected_rows();
	}
	public function property_update_fr($data,$property_id)
	{
		$this->db->where('ID',$property_id);
		$results =$this->db->update($this->table, $data);			
		return  $results ;
		
	}
	
	public function checkproperty_list_api($user_master_id,$propertyname,$property_address)
	{
		
		$this->db->select('ID,property_user_id,property_name,property_address,user_email');
		$this->db->from($this->table);
		$this->db->where('property_name',$propertyname);		
		$this->db->where('property_user_id',$user_master_id);					
		$this->db->where('property_address',$property_address);	  		   
		$result = $this->db->get();
		$results =$result->result();
	
		return $results;
	}
	public function getproperty_list_api($id_user_master)
	{	
		$this->db->select('ID,property_user_id,property_name,property_address,user_email');
		$this->db->from($this->table);
		//$this->db->where('user_email',$email);			
		$this->db->where('property_user_id',$id_user_master);	        
		$this->db->where('property_status','active');	        
		$result = $this->db->get();
		$results =$result->result();
		return $results;
	}
	public function getproperty_curruserlistapi_($property_id)
	{
		$this->db->select('ID,property_name');
		$this->db->from($this->table);
		$this->db->where('property_user_id',$property_id);
		$result = $this->db->get();
		$results =$result->result();
		return $results;
	}
	public function getproperty_row_api($aprt_id,$userid)
	{
				
		$this->db->select('ID,property_user_id,property_name,property_address,user_email');
		$this->db->from($this->table);
		$this->db->where('ID',$aprt_id);
		$this->db->where('property_user_id',$userid);	        
		$result = $this->db->get();
		return $results =$result->row();
	}
	public function getpropertybyid_api($aprt_id)
	{
		$this->db->select('ID,property_user_id,property_name,property_address,user_email');
		$this->db->from($this->table);
		$this->db->where('ID',$aprt_id);    
		$result = $this->db->get();
		return $results =$result->row();
	}
	public function deleteproperty_api($property_id,$userid)
	{
		
		$this->db->where('ID',$property_id);
		$this->db->where('property_user_id',$userid);
		return $results = $this->db->delete($this->table);		
	}
	public function  property_update_api($data,$property_id,$userid)
	{
		$this->db->where('ID',$property_id);
		$this->db->where('property_user_id',$userid);
		return $results =$this->db->update($this->table, $data);		
	}
	public function getproperty_api($property_id,$userid)
	{
		$this->db->select('ID,property_user_id,property_name,property_address,user_email');
		$this->db->from($this->table);
		$this->db->where('ID',$property_id);
		$this->db->where('property_user_id',$userid);	        
		$result = $this->db->get();
		return $results =$result->row();
	}


}
